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

	public function __construct()
	{		
		parent::__construct();
	}
}