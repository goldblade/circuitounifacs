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

    require_once($nomeClasse);
}
spl_autoload_register('autoload');
