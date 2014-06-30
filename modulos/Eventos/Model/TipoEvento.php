<?php
namespace modulos\Eventos\Model;

use Unifacs\Core\Db\TableGateway\TableGateway;
use Unifacs\Core\Entity\Entity;

class TipoEvento extends Entity
{
	/**
	 * Nome da tabela
	 * $name
	 */	

	protected $tableName = 'tipoEvento';

	/**
	 * Chave primaria
	 */
	protected $idColName = 'id';

}