<?php
namespace modulos\Gerenciamento\Controller;

use Unifacs\Core\Controller\ActionController;

class IndexController extends ActionController
{

	public function indexAction()
	{			
		$usuario = (int) $this->getParam('usuario');
		return self::renderHtml(array(
			'usuario' => $usuario
		));
	}
	
}