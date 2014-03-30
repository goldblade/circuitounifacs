<?php
namespace Unifacs\Core\Controller;

class ActionController 
{
	private $layout = "layout.php";

	private $uri = array();

	private $terminal = false;

	private $conteudo;

	private $titulo = "Circuito Unifacs";

	public function setUri($value)
	{
		$this->uri = $value;
	}

	/**
	 * Class controller
	 */
	public function renderHtml($dados)
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
					return include getcwd() . "/modulos/Aplicacao/View/layout/" . $this->layout;
					
					//$teste = include getcwd() . "/modulos/" . $this->uri['modulo'] . "/View/layout/" . $this->layout;
					//var_dump($variavel);
				} else {
					echo "arquivo nao existe";
				}
			}
		//} 		
		//var_dump($dados);

		//return "renderizando o template passando parametros";
	}

	private function getFile($nomeArquivo, $dados)
	{
		extract($dados);//extraindo dados e transformando em variaveis
		ob_start();
		require($nomeArquivo);
		return ob_get_clean();
	}
}