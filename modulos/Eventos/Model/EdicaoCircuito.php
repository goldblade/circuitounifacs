<?php
namespace modulos\Eventos\Model;

use Unifacs\Core\Db\TableGateway\TableGateway;
use Unifacs\Core\Entity\Entity;

class EdicaoCircuito extends Entity
{
	/**
	 * Nome da tabela
	 * $name
	 */	

	protected $tableName = 'edicaoCircuito';

	/**
	 * Chave primaria
	 */
	protected $idColName = 'id';

}