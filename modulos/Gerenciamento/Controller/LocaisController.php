<?php
namespace modulos\Gerenciamento\Controller;

use Unifacs\Core\Controller\ActionController;

class LocaisController extends ActionController
{

	public function indexAction()
	{			
		$usuario = (int) $this->getParam('usuario');
		return self::renderHtml(array(
			'usuario' => $usuario
		));
	}

	public function saveAction()
	{		
		$usuario = (int) $this->getParam('usuario');
		return self::renderHtml(array(
			'usuario' => $usuario
		));
	}

	public function localsalvoAction()
	{
		$usuario = (int) $this->getParam('usuario');
		return self::renderHtml(array(
			'usuario' => $usuario
		));
	}
	
}