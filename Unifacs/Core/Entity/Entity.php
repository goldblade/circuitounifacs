<?php
namespace Unifacs\Core\Entity;
use Unifacs\Core\Db\TableGateway\TableGateway;
use Unifacs\Core\Db\Conexao;

/**
 * Class Entity
 */

abstract class Entity extends TableGateway
{
	

	protected $primaryKeyField = 'id';

	protected $tableName;

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

	public function __construct()
	{
		//echo "CARREGOU CLASSE ENTITY";
		//public function __construct($name, Driver $driver, array $map) {
		// $map = array(
		// 	name => 'id',
	 //  		type => 'int',	
	 // 		is_primary => true
		// );
		// $this->tableName = 'usuario';
		// var_dump($this->tableName);
		parent::__construct($this->tableName, new Conexao());
	}
}