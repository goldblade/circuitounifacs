<?php
namespace modulos\Usuario\Model;

use Unifacs\Core\Db\TableGateway\TableGateway;
use Unifacs\Core\Entity\Entity;

class Usuario extends Entity
{
	/**
	 * Nome da tabela
	 * $name
	 */
	//private $name = 'usuario';

	protected $tableName = 'usuario';

	/**
	 * Chave primaria
	 */
	protected $idColName = 'id';

	/**
	 * nome
	 */	
	protected $nome;

	/**
	 * email
	 */
	protected $email;

	public function getNome()
	{
		return $this->nome;
	}
	
	public function setNome($value)
	{
		$this->nome = $value;
	}

	public function getEmail()
	{
		return $this->email;
	}
	
	public function setEmail($value)
	{
		$this->email = $value;
	}
}