<?php
namespace modulos\Aplicacao\Controller;

use Unifacs\Core\Controller\ActionController;
use modulos\Aplicacao\Entity\Aplicacao;

class IndexController extends ActionController
{
	public function __construct()
	{
		//var_dump("controller index");
		//$app = new Aplicacao();
	}

	public function indexAction()
	{
		$teste = array('teste', '2', '3');
		$novoarray = array('2222', '3333', '4444', '5555');
		
		//$admin = (int) $this->getParam('admin');
		$usuario = (int) $this->getParam('usuario');

		return self::renderHtml(array(
			'gold' => $teste,
			'novoarray' => $novoarray,
			'usuario' => $usuario
		));
	}
	
	/**
	 * @todo verificar se o arquivo de view existe, caso nao exibir a mensagem pro usuario
	 */

	public function index2Action()
	{
		return self::renderHtml(array(
		));
	}

	public function saveAction()
	{
		return self::renderHtml(array(
		));	
	}
}
