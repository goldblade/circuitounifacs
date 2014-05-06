<?php
namespace modulos\Gerenciamento\Controller;

use Unifacs\Core\Controller\ActionController;
use modulos\Usuario\Model\Usuario;

class UsuarioController extends ActionController
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
		$usuarioteste = new Usuario;
		$usuarioteste->insert();
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

}