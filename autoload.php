<?php
/**
 * function autoload utilizando PSR-0
 */
function autoload($nomeClasse){

    $nomeClasse = trim($nomeClasse, '\\');// remove as contrabarras        

    // verificando se tem underscore
    if(strpos($nomeClasse, '_')) {
        $nomeClasse = str_replace('_', DIRECTORY_SEPARATOR, $nomeClasse) . '.php';        
    }

    // Verificando as contrabarras
    if(strpos($nomeClasse, '\\')) {
        $nomeClasse = str_replace('\\', DIRECTORY_SEPARATOR, $nomeClasse) . '.php';
    }
    
    $path = __DIR__ . DIRECTORY_SEPARATOR . $nomeClasse;
    
    try {
        checkFile($nomeClasse);
        require_once($nomeClasse);
    } catch (\Exception $e) {        
        $error = new \modulos\Error\Controller\IndexController('Ação não encontrada!');
        $error->setUri(array(
            'modulo' => 'Error',
            'controller' => 'index',
            'action' => 'index'
        ));
        $error->indexAction();
    }
}

function checkFile($arquivo)
{    
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    if (!file_exists($root . '/' . $arquivo))
        throw new \Exception("Arquivo de Classe não existe", 1);
       

}
spl_autoload_register('autoload');