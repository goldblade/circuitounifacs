<?php
namespace modulos\Eventos\Model;

use Unifacs\Core\Db\TableGateway\TableGateway;
use Unifacs\Core\Entity\Entity;

class Evento extends Entity
{
	/**
	 * Nome da tabela
	 * $name
	 */	

	protected $tableName = 'evento';

	/**
	 * Chave primaria
	 */
	protected $idColName = 'id';

}