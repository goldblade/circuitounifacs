<?php
namespace modulos\Locais\Model;
use Unifacs\Core\Db\TableGateway\TableGateway;
use Unifacs\Core\Entity\Entity;

class Campi extends Entity
{
	/**
	 * Nome da tabela
	 * $name
	 */
	//private $name = 'campi';

	protected $tableName = 'campi';

	/**
	 * Chave primaria
	 */
	protected $idColName = 'id';

	/**
	 * nome
	 */	
	protected $nome;

	/**
	 * endereco
	 */
	protected $endereco;

	/**
	 * telefone
	 */
	protected $telefone;

	/**
	 * maps
	 */
	protected $maps;

	public function setNome($value)
	{
		$this->nome = $value;
	}

	public function getNome()
	{
		return $this->nome;
	}

	public function setEndereco($value)
	{
		$this->endereco = $value;
	}

	public function getEndereco()
	{
		return $this->endereco;
	}

	public function setTelefone($value)
	{
		$this->telefone = $value;
	}

	public function getTelefone()
	{
		return $this->telefone;
	}

	public function setMaps($value)
	{
		$this->maps = $value;
	}

	public function getMaps()
	{
		return $this->maps;
	}
}