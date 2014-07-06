<?php
namespace modulos\Eventos\Model;

use Unifacs\Core\Db\TableGateway\TableGateway;
use Unifacs\Core\Entity\Entity;

class EventoPorSala extends Entity
{
	/**
	 * Nome da tabela
	 * $name
	 */	

	protected $tableName = 'eventoPorSala';

	/**
	 * Chave primaria
	 */
	protected $idColName = 'id';

}