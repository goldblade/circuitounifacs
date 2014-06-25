<?php
namespace Unifacs\Core\Controller;

class ActionController 
{
	private $layout = "layout.php";

	private $uri = array();

	private $terminal = false;

	private $conteudo;

	private $titulo = "Circuito Unifacs";

	private $param;

	// private $mensagem;

	public function setUri($value)
	{
		$this->uri = $value;
	}

	/**
	 * Class controller
	 */
	public function renderHtml($dados = null)
	{
		//extract($dados);//extraindo dados e transformando em variaveis
		//var_dump($this->uri['modulo']);
		//if ($this->uri['modulo'] == "Aplicacao"){
			if ($this->terminal) {
				//carregando sem layout padrao
			} else {
				//carregando com layout padrao				
				//verificando se arquivo de layout padrao existe				
				//if (file_exists( getcwd() . "/modulos/" . $this->uri['modulo'] . "/View/layout/" . $this->layout )) {
				if (file_exists( getcwd() . "/modulos/Aplicacao/View/layout/" . $this->layout )) {
					//$this->conteudo = $dados; pegar o arquivo html de acordo com o modulo, controler e acao																		
					$this->conteudo = self::getFile(getcwd() . "/modulos/" . $this->uri['modulo'] . "/View/" . $this->uri['controller'] . "/" . $this->uri['action'] .".php", $dados);															
					//return include getcwd() . "/modulos/" . $this->uri['modulo'] . "/View/layout/" . $this->layout;
					
					/**
					 * Extraindo dados e transformando em variaveis
					 */
					if (isset($dados))
						extract($dados);
					
					return include getcwd() . "/modulos/Aplicacao/View/layout/" . $this->layout;
					
					//$teste = include getcwd() . "/modulos/" . $this->uri['modulo'] . "/View/layout/" . $this->layout;
					//var_dump($variavel);
				} else {
					echo "arquivo nao existe";
				}
				//destruir a sessao mensagem
				//session_destroy('msg');
			}
		//} 		
		//var_dump($dados);

		//return "renderizando o template passando parametros";
	}

	private function getFile($nomeArquivo, $dados = null)
	{
		if (isset($dados))
			extract($dados);//extraindo dados e transformando em variaveis
		ob_start();
		require($nomeArquivo);
		return ob_get_clean();
	}


	public function getParam($param = null)
	{
		if ($param) {
			//retorna o valor do parametro passado
			// var_dump($param);
			// var_dump($this->param);
			return $this->param[$param];
		} else {
			//retorna o array de parametros
			return $this->param;
		}
	}

	public function setParam($value)
	{
		$this->param = $value;
	}

	public function getUri()
	{
		return $this->uri;
	}

	/**
	 * Mensagens 
	 */
	// public function mensagem($mensagem = array())
	public function mensagem($mensagem = array())
	{
		ob_start();		
		//if (session_id() === "") { session_start(); }		
		session_name('msg1');
		session_start();			
		//$sid = session_id('msg');						
		$_SESSION["mensagem"][] = $mensagem;
		// array_unique($_SESSION["mensagem"]);
		// var_dump($_SESSION['mensagem']);
		// session_write_close();
	}

	public function getMensagem()
	{		
		if (isset($_SESSION["mensagem"])){	
			// var_dump($_SESSION["mensagem"]);
			// var_dump(array_unique($_SESSION["mensagem"]));
			$msg = self::super_unique($_SESSION["mensagem"]);
			if ($_SERVER['REQUEST_METHOD'] == 'GET')
				unset($_SESSION["mensagem"]);
			if ($_SERVER['REQUEST_METHOD'] == 'POST'){
				if ($_SESSION["mensagem"][0]['error']){
					// var_dump('existe erro, limpando as variaveis');
					unset($_SESSION["mensagem"]);
				}				
			}						
			return $msg;						
		}
	}

	public function temMensagem()
	{		
		if(session_status() != PHP_SESSION_ACTIVE){
			session_name('msg1');
			session_start();
			// var_dump("iniciando ");
		}
						
		if ( isset($_SESSION["mensagem"]) )
			return true;

		return false;
	}	

	public function super_unique($array)
	{
		$result = array_map("unserialize", array_unique(array_map("serialize", $array)));
		foreach ($result as $key => $value){
	    	if ( is_array($value) ){
	      		$result[$key] = self::super_unique($value);
	    	}
	  	}

	  	return $result;
	}
}