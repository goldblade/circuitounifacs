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
		
		// $usuarioteste = new Usuario;
		// $newRow = $usuarioteste->createRow(array(
		// 	'nome' => 'teste'
		// ));
		// $newRow->save();
		// $usuarioteste->setNome('gold');
		// $rows = $usuarioteste->getAll();
		// var_dump($rows);
		// var_dump($rows->data);
		// foreach ($rows as $row) {
		// 	var_dump($row->toArray()['nome']);
		// }
		// $usuarioteste->insert();
		
		
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