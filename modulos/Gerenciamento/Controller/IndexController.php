<?php
namespace modulos\Gerenciamento\Controller;

use Unifacs\Core\Controller\ActionController;

class IndexController extends ActionController
{

	public function indexAction()
	{			
		$admin = (int) $this->getParam('admin');
		return self::renderHtml(array(
			'admin' => $admin
		));
	}
	
}