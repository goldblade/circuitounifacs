<?php
namespace modulos\Gerenciamento\Controller;

use Unifacs\Core\Controller\ActionController;

class LocaisController extends ActionController
{

	public function indexAction()
	{			
		$admin = (int) $this->getParam('admin');
		return self::renderHtml(array(
			'admin' => $admin
		));
	}

	public function saveAction()
	{		
		$admin = (int) $this->getParam('admin');
		return self::renderHtml(array(
			'admin' => $admin
		));
	}

	public function localsalvoAction()
	{
		$admin = (int) $this->getParam('admin');
		return self::renderHtml(array(
			'admin' => $admin
		));
	}
	
}