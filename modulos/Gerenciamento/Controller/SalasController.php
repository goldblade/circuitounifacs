<?php
namespace modulos\Gerenciamento\Controller;

use Unifacs\Core\Controller\ActionController;

class SalasController extends ActionController
{

	public function indexAction()
	{			
		return self::renderHtml(array(
		
		));
	}

	public function saveAction()
	{		
		return self::renderHtml(array(
		));
	}	
	
	public function salassaveAction()
	{
		return self::renderHtml();
	}
}