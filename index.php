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

//var_dump("TOTAL DE URI = " . $countUri);

/**
 * Verificando se existe o modulo requisitado no sistema
 */
//var_dump(getcwd());var_dump(ucfirst($modulo));
if (is_dir( getcwd() . "/modulos/" . ucfirst($modulo) ) && ($modulo != ucfirst($modulo)) ) {
	var_dump("modulo existe");
} else {
	//echo "modulo nao existe, carregando modulo padrao do site";
	$app = new IndexController();
	$app->setUri(array(
		'modulo' => 'Aplicacao',
		'controller' => 'index',
		'action' => 'index'
	));
	$app->indexAction();
}


if ($countUri >= 5) {
	//existem parametros 
	//verificando se o parametro esta vazio
	if ($quebrandoUri[4] === ""){
		var_dump("parametro vazio carrega acao index action do modulo e controller corrente");
	}
}
//echo "nome do modulo => ". $modulo . " Controller => " . $controller . " ACAO => " . $acao;

/*$controller = $uri[0] . '.php';

if( file_exists( $filename ) === TRUE )
    require( $filename );
else
    print "Not found: $filename";*/

//$teste = new Inicio();
