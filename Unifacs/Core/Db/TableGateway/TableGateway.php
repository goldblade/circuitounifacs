<?php
namespace Unifacs\Core\Db\TableGateway;

use Unifacs\Core\Db\Conexao;

class TableGateway
{
	private $conn;

	//public function __construct(Conexao $conn)
	//{
		//var_dump($conn);
		//var_dump("carregou table gateway");		
		//var_dump($conn->getConn());
	//	$this->conn = $conn;
		//parent::__construct(new Conexao());
	//}

	/**
	 * O nome da tabela
	 * @var string
	 */
	private $name;

	/**
	 * O driver MySQLi para a execução dos statements.
	 * @var MySQLi
	 */
	private $driver;
	
	/**
	 * O statement a ser executado no banco de dados.
	 * @var MySQLi_Stmt
	 */
	private $stmt;

	/**
	 * Mapa dos campos da tabela. 
	 * Cada campo é da seguinte forma:
	 * 	array (
	 *		name => 'nome do campo',
	 * 		type => 'tipo SQL do campo',	
	 *		is_primary => 'se o campo é parte da chave primária da tabela (boolean)'
	 *	)
	 * 
	 * Por simplicidade, não consideraremos tabelas com chaves compostas.
	 * @var array
	 */
	private $colMap = array();
	
	/**
	 * Armazena os nomes dos campos da tabela.
	 * É obtido a partir de $colMap.
	 * @var array
	 */
	private $cols = array();
		
	/**
	 * O nome da coluna que é a chave primária da tabela
	 * @var string
	 */
	private $idColName;
	
	/**
	 * Checar ou não a integridade dos dados ao criar objetos Row desta tabela.
	 * Desabilitar a checagem de integridade é útil para JOINs.
	 */
	private $integrityCheck = true;

	/**
	 * Construtor.
	 * 
	 * @param string $name: o nome da tabela
	 * @param Driver $driver : o driver para o banco de dados 
	 * @param array $map : um "mapa" para os campos da tabela, da forma:
	 * 	array (
	 *		name => 'nome do campo',
	 * 		type => 'tipo SQL do campo',	
	 *		is_primary => 'se o campo é parte da chave primária da tabela (boolean)'
	 *	)
	 */ 
	public function __construct($name, Conexao $driver, array $map) {		
		$this->setName($name);
		$this->setDriver($driver);
		$this->setColMap($map);
	}

	private function setName($name) {
		$this->name = $name;
	}

	public function getName() {
		return $this->name;
	}

	public function setDriver(Conexao $driver) {
		$this->driver = $driver;	
		return $this;
	}
	
	public function getDriver() {
		return $this->driver;
	}
	
	/**
	 * Seta um mapa de colunas da tabela.
	 * Adicionalmente, com base no mapa, seta o array de colunas da tabela.
	 *
	 * @param array $map : um "mapa" para os campos da tabela, da forma:
	 * 	array (
	 *		name => 'nome do campo',
	 * 		type => 'tipo SQL do campo',	
	 *		is_primary => 'se o campo é parte da chave primária da tabela (boolean)'
	 *	)
	 * @throws Exception : caso nenhuma chave primária seja informada
	 */
	private function setColMap(array $map) {
		$this->colMap = $map;
		$hasPrimary = false;
		// Identifica o campo de ID da tabela
		foreach($map as $column){
			$this->cols[] = strtolower($column['name']);
			if(array_key_exists('is_primary', $column) && 
				(bool) $column['is_primary'] == true) {
				$this->idColName = $column['name'];
				$hasPrimary = true;
			}
		}
	
		if($hasPrimary === false) {
			throw new \Exception(sprintf('Não é possível criar a tabela "%s" sem uma chave primária!', $this->name));		
		}
	}

	/**
	 * Setando a checagem de integridade para false, é possível utilizar 
	 * o método createRow com dados não pertencentes à tabela. (Ex.: JOINs e alias).
	 *
	 * @param bool $opt
	 * @return Table : fluent interface
	 */
	public function setIntegrityCheck($opt) {
		$this->integrityCheck = (bool) $opt;
		return $this;
	}

	/**
	 * Retorna o nome da coluna que é a chave primária da tabela;
	 *
	 * @return string
	 */
	public function getIdColName() {
		return $this->idColName;
	}
	
	/**
	 * Retorna um array contendo os nomes das colunas da tabela.
	 *
	 * @return array
	 */
	public function getCols() {
		return $this->cols;
	}
	
	/**
	 * Salva os dados em $data no banco de dados.
	 * A decisão por inserção ou atualização é feita automaticamente.
	 * 
	 * @param $data : os dados a inserir ou atualizar
	 * @return int : o número de linhas afetadas
	 */
	public function save(array $data) {
		if(!array_key_exists($this->idColName, $data)
			|| $data[$this->idColName] === null) {
			return $this->insert($data);
		} else {
			return $this->update($data);
		}
	}

	/**
	 * Insere os dados em $data no banco de dados.
	 *
	 * @param $data : os dados a inserir
	 * @return int : o número de linhas inseridas
	 */
	public function insert(array $data) {
		$data = $this->intersectData($data);
		return $this->driver->insert($this->getName(), $data);
	}
	
	/**
	 * Atualiza os dados em $data no banco de dados.
	 *
	 * @param $data : os dados para atualizar
	 * @param $cond : uma condicional para a atualização
	 * @param array $condParams : caso a condição seja parte de um 
	 *		prepared statement, estes são os parâmetros
	 * @return int : o número de linhas atualizadas
	 */
	public function update(array $data, $cond, array $condParams = array()) {
		$data = $this->intersectData($data);
		return $this->driver->update($this->getName(),$data, $cond, $condParams);
	}

	/**
	 * Deleta dados do banco.
	 *
	 * @param $cond : uma condicional para a atualização
	 * @param array $condParams : caso a condição seja parte de um 
	 *		prepared statement, estes são os parâmetros
	 * @return int : o número de linhas deletadas
	 */
	public function delete($cond, array $condParams = array()) {
		return $this->driver->delete($this->getName(), $cond, $condParams);
	}

	/**
	 * Retorna dados pela chave primária.
	 *
	 * @param mixed $id : o valor da chave primária do registro desejado
	 * @return Row|null
	 */
	public function getById($id) {
		$sql = 'SELECT * FROM ' . $this->getName()
			 . ' WHERE ' . $this->idColName . ' = ?';

		$params = array($this->idColName => $id);
		$this->driver->query($sql, $params);

		$data = $this->driver->fetchOne();
		if($data !== null) {
			return $this->doCreateRow($data, true);
		} else {
			return null;
		}
	}

	/**
	 * Retorna um conjunto de linhas da tabela.
	 *
	 * @param string|array|null $fields : os campos da tabela a serem retornados. 
	 *	Caso seja nulo, utilizamos o SQL wildcard '*', que retornará todos os campos.
	 * @param string $order : a ordenação da busca "{<nome_campo><ASC|DESC>}*"
	 * @param int count : a quantidade de linhas a retornar
	 * @param int offset : a linha inicial a partir da qual começar a buscar (0-based)
	 * @return array
	 */
	public function getAll($fields = null, $order = null, $count = null, $offset = null) {
		$this->driver->select($this->getName(), $order, $count, $offset, $fields);
		$ret = array();
		$result = $this->driver->fetchAll();

		foreach($result as $rowData) {
			$ret[] = $this->doCreateRow($rowData, true);
		}

		return $ret;
	}

	/**
	 * Método público para a criação de um objeto Row a partir de $data.
	 *
	 * @param $data : os dados para a criação do objeto
	 * @return Row
	 */
	public function createRow(array $data = array()) {
		return $this->doCreateRow($data, false);
	}

	/**
	 * Internamente, é possível configurar os dados como 'stored',
	 * o que indica que os dados são proveniente do banco, logo, são válidos. 
	 * Em chamadas externas, é não é possível garantir isso.
	 *
	 * @param array $data : os dados para a criação do objeot
	 * @param bool $stored : indica se os dados são ou não provenientes do banco.
	 */
	private function doCreateRow(array $data, $stored) {
		if($this->integrityCheck === false && !empty($data)) {
			// Se a checagem de integridade está desabilitada, removemos a permissão de escrita
			$newRow = new Row($this, array(				
				'readOnly' => true,
				'stored' => $stored,
				'data' => $data
			));
		} else {
			$cols = $this->cols;
			$defaults = array_combine($cols, array_fill(0, count($cols), null));
			$rowData = array_intersect_key(array_replace($defaults, $data),$defaults);

			$newRow = new Row($this, array(
				'readOnly' => false,
				'stored' => $stored,
				'data' => $rowData
			));
		}
		return $newRow;
	}

	/**
	 * Para operações de inserção e atualização, temos que garantir que
	 * entre os dados não haja campos inexistentes na tabela, 
	 * o que geraria um erro na execução do statement.
	 *
	 * @param array $data : os dados para a operação
	 * @return array : os dados filtrados, contendo apenas campos da tabela
	 */
	private function intersectData(array $data) {
		$dataCols = array_change_key_case($data, CASE_LOWER);
		$tableCols = array();
		foreach($this->colMap as $column) {
			$tableCols[strtolower($column['name'])] = $column['name'];
		}

		return array_intersect_key($dataCols, $tableCols);
	}

}