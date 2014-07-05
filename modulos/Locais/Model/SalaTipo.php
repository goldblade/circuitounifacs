<?php
namespace modulos\Locais\Model;
use Unifacs\Core\Db\TableGateway\TableGateway;
use Unifacs\Core\Entity\Entity;

class SalaTipo extends Entity
{
	/**
	 * Nome da tabela
	 * $name
	 */
	//private $name = 'campi';

	protected $tableName = 'tipoSala';

	/**
	 * Chave primaria
	 */
	protected $idColName = 'id';

	/**
	 * nome
	 */	
	protected $nome;

	/**
	 * detalhes
	 */	
	protected $detalhes;
}
