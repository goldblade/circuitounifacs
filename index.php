<?php
require_once('autoload.php');
use Unifacs\Core\Inicio;
use modulos\Aplicacao\Controller\IndexController;

// $inicio = new Inicio();
// $inicio->render();

$teste = new Inicio();
$app = new IndexController();