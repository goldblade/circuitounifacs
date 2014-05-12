<?php
namespace modulos\Usuario\Controller;

use Unifacs\Core\Controller\ActionController;


class CadastroController extends ActionController
{

	public function indexAction()
	{			
		
		$admin = (int) $this->getParam('admin');
		return self::renderHtml(array(
			'admin' => $admin
		));
	}

	public function confirmacaoAction()
	{
		$admin = (int) $this->getParam('admin');

		return self::renderHtml(array(
			'admin' => $admin
		));
	}
	
}