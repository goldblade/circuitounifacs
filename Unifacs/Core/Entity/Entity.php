<?php
namespace Unifacs\Core\Entity;
use Unifacs\Core\Db\TableGateway\TableGateway;
use Unifacs\Core\Db\Conexao;

/**
 * Class Entity
 */

class Entity extends TableGateway
{
	

	public function __construct()
	{
		//echo "CARREGOU CLASSE ENTITY";
		//public function __construct($name, Driver $driver, array $map) {
		$map = array(
			name => 'id',
	  		type => 'int',	
	 		is_primary => true
		);
		//$this->tableName = 'usuario';
		parent::__construct($this->tableName, new Conexao(), $map);
	}
}