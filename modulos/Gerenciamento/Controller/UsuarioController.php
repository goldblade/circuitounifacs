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
		$id = (int) $this->getParam('id');
		$mensagem = array();

		if ($_POST){			
			if ($_POST['senha'] != $_POST['repetirsenha']){
				/*$mensagem = array(
					'error' => 'Campo senha e repetir senha difererem'
				);*/
				$this->mensagem(array(
					'error' => 'Campo senha e repetir senha difererem'
				));
			} else {
				$usuario = new Usuario;				
				$novoRegistro = $usuario->createRow(array(
					'nome' => (isset($_POST['nome']) ? $_POST['nome'] : null),
					'email' => (isset($_POST['email']) ? $_POST['email'] : null),
					'senha' => (isset($_POST['senha']) ? md5($_POST['senha']) : null),
					'telefone' => (isset($_POST['telefone']) ? $_POST['telefone'] : null),
					'perfil' => (isset($_POST['perfil']) ? $_POST['perfil'] : null)
				));
				$novoRegistro->save();
				$this->mensagem(array(
					'success' => 'Usuário Salvo com sucesso!!'
				));
				header("Location: /gerenciamento/usuario");
			}						
		}
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
			'mensagem' => $mensagem
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