<?php
namespace modulos\Error\Controller;

use Unifacs\Core\Controller\ActionController;


class IndexController extends ActionController
{
	/*
	 * Recebe a mensagem de erro
	 */
	private $errorMsg;

	public function __construct($errorMsg = null)
	{
		$this->errorMsg = $errorMsg;
	}

	public function indexAction()
	{		
		
		return self::renderHtml(array(
			'msgError' => $this->errorMsg,			
		));
	}
}