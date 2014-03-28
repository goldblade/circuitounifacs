<?php
require_once('autoload.php');
//use Unifacs\Core\Inicio;
//use modulos\Aplicacao\Controller\IndexController;

$uri = $_SERVER['REQUEST_URI'];

$quebrandoUri = explode("/", $uri);
$countUri = count($quebrandoUri);
//var_dump($countUri);
//var_dump("---------------------------");
//var_dump($quebrandoUri);

$modulo = null;
$controller = null;
$acao = null;

if ($quebrandoUri[1] != ""){
	//echo "uri modulo nao esta vazio, modulo deve ser setado";
	$modulo = $quebrandoUri[1];
}

if ($countUri == 3){
	if ($quebrandoUri[2] != "")
		//echo "uri controller nao esta vazio, controller deve ser setado";
		$controller = $quebrandoUri[2];
}

if ($countUri == 4){
	$controller = $quebrandoUri[2];	
	if ($quebrandoUri[3] != "")
		//echo "uri acao nao esta vazio, acao deve ser setada";
		$acao = $quebrandoUri[3];
}		

if ($countUri >= 5) {
	$controller = $quebrandoUri[2];
	$acao = $quebrandoUri[3];
	//existem parametros 
	//verificando se o parametro esta vazio
	//@todo capturar parametros e seus valores 
	if ($quebrandoUri[4] === ""){
		var_dump("parametro vazio carrega acao index action do modulo e controller corrente");
	}
}

//var_dump("TOTAL DE URI = " . $countUri);

/**
 * Verificando se existe o modulo requisitado no sistema
 *
 * Se existir o modulo instancia o controler e a action requisitada
 * se nao existe o modulo e ele veio vazio carrega pagina inicial da app
 * se nao existe o modulo e nao veio vazio carrega tela de erro
 */

if (is_dir( getcwd() . "/modulos/" . ucfirst($modulo) ) && ($modulo != "") ) {
	// instanciar o controller do modulo requisitado e executar a acao
	
	if ($controller){
		$controllerInstancia = "modulos\\" . ucfirst($modulo) ."\\Controller\\" . ucfirst($controller . "Controller");
		//var_dump("tem controller");
		//tem controller na requisicao
		//$controllerInstancia .= "\\" . ucfirst($controller) . "Controller;
		//verificando se existe o controller no sistema
		if (class_exists($controllerInstancia)) {
			echo "controle existe";
			$app = new $controllerInstancia();
		} else {
			echo "esse controle nao existe";
		}
	} else {
		var_dump($controller);
		var_dump("nao tem controller ?");
		//nao tem controller, tenta instanciar o controller IndexController.php 
		//se ocorrer algum erro, manda para o controller de erro
		$controllerInstancia = "modulos\\Aplicacao\\Controller\\IndexController";		
		if (class_exists($controllerInstancia)){
			// instanciando controller IndexController
			// se nao tem controller tambem nao tem acao passada na url, 
			// tenta chamar a acao principal se nao existe exibe tela de erro
			$app = new $controllerInstancia();

			if (method_exists($app, 'indexAction')) {
				$app->setUri(array(
					'modulo' => ucfirst($modulo),
					'controller' => 'index',
					'action' => 'index'
				));
				$app->indexAction();
			} else {
				$error = new modulos\Error\Controller\IndexController('Ação requisitada não encontrada!');				
				$error->setUri(array(
					'modulo' => 'Error',
					'controller' => 'index',
					'action' => 'index'
				));
				$error->indexAction();
			}

			
		} else {
			$error = new modulos\Error\Controller\IndexController('Error, controller não localizado!');
			//var_dump($error);
			$error->setUri(array(
				'modulo' => 'Error',
				'controller' => 'index',
				'action' => 'index'
			));
			$error->indexAction();
		}		
	}
	//var_dump($controllerInstancia);
	//$app = new;
} else {	
	/**
	 * modulo nao existe e veio vazio no request do navegador, 
	 * carregando modulo, controller e action padrao do site
	 */
	if ($modulo == ""){
		$app = new IndexController();
		$app->setUri(array(
			'modulo' => 'Aplicacao',
			'controller' => 'index',
			'action' => 'index'
		));
		$app->indexAction();	
	} else {
		/**
		 * Carregando Modulo, controller e action de erro
		 */
		//echo "MODULO NAO EXISTE CARREGAR TELA DE ERRO";		
		$error = new modulos\Error\Controller\IndexController('Error 404, página não encontrada!');
		//var_dump($error);
		$error->setUri(array(
			'modulo' => 'Error',
			'controller' => 'index',
			'action' => 'index'
		));
		$error->indexAction();
	}
	
}



//echo "nome do modulo => ". $modulo . " Controller => " . $controller . " ACAO => " . $acao;

/*$controller = $uri[0] . '.php';

if( file_exists( $filename ) === TRUE )
    require( $filename );
else
    print "Not found: $filename";*/

//$teste = new Inicio();
