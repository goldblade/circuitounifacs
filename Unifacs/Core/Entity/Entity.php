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
		echo "CARREGOU CLASSE ENTITY";
		parent::__construct(new Conexao());
	}
}