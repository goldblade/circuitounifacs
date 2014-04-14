<?php
namespace modulos\Gerenciamento\Controller;

use Unifacs\Core\Controller\ActionController;

class AtividadesController extends ActionController
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

	public function confirmacaoAction()
	{
		$usuario = (int) $this->getParam('usuario');
		
		return self::renderHtml(array(
			'usuario' => $usuario
		));
	}

	public function agendamentoAction()
	{
		$usuario = (int) $this->getParam('usuario');
		
		return self::renderHtml(array(
			'usuario' => $usuario
		));
	}

	public function saveagendamentoAction()
	{
		$usuario = (int) $this->getParam('usuario');
		
		return self::renderHtml(array(
			'usuario' => $usuario
		));	
	}

}