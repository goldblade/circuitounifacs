<?php
require_once('autoload.php');
//use Unifacs\Core\Inicio;
use modulos\Aplicacao\Controller\IndexController;

$uri = $_SERVER['REQUEST_URI'];

$quebrandoUri = explode("/", $uri);
$countUri = count($quebrandoUri);
//var_dump($countUri);
//var_dump($quebrandoUri);
$modulo = $quebrandoUri[1];

if ($countUri == 3)
	$controller = $quebrandoUri[2];

if ($countUri == 4)
	$acao = $quebrandoUri[3];

if ($countUri >= 5) {
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
//var_dump(getcwd());var_dump(ucfirst($modulo));
var_dump(ucfirst($modulo));
var_dump($modulo);
if (is_dir( getcwd() . "/modulos/" . ucfirst($modulo) ) && ($modulo != "") ) {
//if (is_dir( getcwd() . "/modulos/" . ucfirst($modulo) ) ) {
	//var_dump("modulo existe");
	// instanciar o controller do modulo requisitado e executar a acao
	$controllerInstancia = "modulos\\" . ucfirst($modulo);	
	if (isset($controller)){
		//tem controller na requisicao
		$controllerInstancia .= "\\" . ucfirst($controller);
	} else {
		//nao tem controller, tenta instanciar o controller IndexController.php 
		//se ocorrer algum erro, manda para o controller de erro
		$controllerInstancia .= "\\Controller\\IndexController";		
		if (class_exists($controllerInstancia)){
			$app = new $controllerInstancia();
			//verificar se existe uma acao requisitada
			$app->setUri(array(
				'modulo' => ucfirst($modulo),
				'controller' => 'index',
				'action' =>	$acao
			));
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
	var_dump($controllerInstancia);
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
