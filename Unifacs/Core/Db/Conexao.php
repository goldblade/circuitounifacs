<?php
namespace Unifacs\Core\Db;

class Conexao
{
	protected $globalConf;

	protected $conn;	

	public function __construct()
	{		
		try {
			self::getGlobalConf();
		} catch (\Exception $e) {
			var_dump($e->getMessage());
		}

		/**
		 * Se arquivo de configuracao tiver ok, faz a conexao com o banco de dados
		 */
		if ($this->globalConf){			
			// var_dump($this->globalConf);
			$mysqli = new \mysqli($this->globalConf['db']['host'], $this->globalConf['db']['usuario'], $this->globalConf['db']['senha'], $this->globalConf['db']['database']);
			if (mysqli_connect_errno()) {				
				var_dump(mysqli_connect_error());
				// trigger_error(mysqli_connect_error());
			}
			$this->conn = $mysqli;
		}
	}

	private function getGlobalConf()
	{
		$root = realpath($_SERVER["DOCUMENT_ROOT"]);
		if (!file_exists($root . '/config/global.conf.php'))
			throw new \Exception("Arquivo de Configuração não existe", 1);
		
		$this->globalConf = include $root . '/config/global.conf.php';		
	}

	public function getConn()
	{
		return $this->conn;
	}

}