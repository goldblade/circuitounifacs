<?php
namespace Unifacs\Core\Db\TableGateway;

use Unifacs\Core\Db\Conexao;

class TableGateway
{
	private $conn;

	public function __construct(Conexao $conn)
	{
		//var_dump($conn);
		var_dump("carregou table gateway");		
		var_dump($conn->getConn());
	}
}