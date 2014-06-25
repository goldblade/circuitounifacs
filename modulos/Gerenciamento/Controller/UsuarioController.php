<?php
namespace modulos\Gerenciamento\Controller;

use Unifacs\Core\Controller\ActionController;
use modulos\Usuario\Model\Usuario;

class UsuarioController extends ActionController
{

	public function indexAction()
	{			
		$usuario = (int) $this->getParam('usuario');

		$dados = new Usuario;
		$dados = $dados->getAll();
		// var_dump($rows);
		// // var_dump($rows->data);
		// foreach ($rows as $row) {
		// 	var_dump($row->toArray()['nome']);
		// }

		return self::renderHtml(array(
			'dados' => $dados
		));
	}	

	public function saveAction()
	{			
		$id = (int) $this->getParam('id');
		$dados = null;
		if ($id > 0){
			//salvando e editando.. buscar dados no banco
			$usuario = new Usuario;
			$dados = $usuario->getById($id);			
		}
		$mensagem = array();

		if ($_POST){			

			// $teste = array();
			// $teste = array(
			// 	'a' => '1',
			// 	'b' => '2',
			// 	'c' => '3'
			// ); 
			// 
			// $teste['mensagem'][] = array();
			// var_dump($teste['mensagem']);
			// $teste['mensagem'][] = array('error' => 'Campo papapa');
			// $teste['mensagem'][] = array('error2' => 'Campo papapa222');
			// $teste['mensagem'][] = array('success3' => 'su1');
			// $teste['mensagem'][] = array('success3' => 'su1');
			// $teste['mensagem'][] = array('success5' => 'su3');
			
			// $testex = self::super_unique($teste);
			// var_dump($testex);
			// $_SESSION["mensagem"][] = $mensagem;

			// var_dump($teste);

			// $collection = array(); 			
			// $collection['error'][] = 'sdfsdf'; 
			// $collection['error'][] = 'xuxuxu'; 			

			// $teste['error'] = 'Campos senha';

			// $collection['error'][]
						

			//fazer validacoes backend se tiver tudo ok.. faz a insercao
			$validado = true;
			if ($_POST['senha'] != $_POST['repetirsenha']){								
				$this->mensagem(array(
					'error' => 'Campo senha e repetir senha difererem'
				));				
				$validado = false;
			} 

			if (($_POST['senha'] == '') && ($_POST['id'] == '')){
				$this->mensagem(array(
					'error' => 'Campo Senha não pode ficar vazio'
				));
				$validado = false;
			}
			
			if ($_POST['nome'] == ''){								
				$this->mensagem(array(
					'error' => 'Campo Nome não pode ficar vazio'
				));
				$validado = false;
			}

			if ($_POST['email'] == ''){				
				$this->mensagem(array(
					'error' => 'Campo Email não pode ficar vazio'
				));
				$validado = false;
			}

			if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
				$this->mensagem(array(
					'error' => 'Email não é válido'
				));
				$validado = false;
			}

			if ($validado){				
				try { 	

					if ($_POST['id'] != ""){
						//tem id é um update
						$usuario = new Usuario;
						$updateRegistro = $usuario->getById($_POST['id']);
						
						if (isset($_POST['nome'])) {
							$updateRegistro->set('nome', $_POST['nome']);
						}

						if (isset($_POST['email'])){
							$updateRegistro->set('email', $_POST['email']);
						}

						if (isset($_POST['senha'])){
							$updateRegistro->set('senha', md5($_POST['senha']));
						}

						if (isset($_POST['telefone'])){
							$updateRegistro->set('telefone', $_POST['telefone']);
						}

						if (isset($_POST['perfil'])){
							$updateRegistro->set('perfil', $_POST['perfil']);
						}
						
						$updateRegistro->save();

					} else {
						//nao tem id é um insert
						$usuario = new Usuario;				
						$novoRegistro = $usuario->createRow(array(
							'nome' => (isset($_POST['nome']) ? $_POST['nome'] : null),
							'email' => (isset($_POST['email']) ? $_POST['email'] : null),
							'senha' => (isset($_POST['senha']) ? md5($_POST['senha']) : null),
							'telefone' => (isset($_POST['telefone']) ? $_POST['telefone'] : null),
							'perfil' => (isset($_POST['perfil']) ? $_POST['perfil'] : null)
						));       			
	        			$novoRegistro->save();
					}	

        			$this->mensagem(array(
						'success' => 'Usuário Salvo com sucesso!!'
					));				
					// http_response_code(301);
					header("Location: /gerenciamento/usuario", true, 301);
    			} catch (\Exception $e) {
        			// var_dump($e->getMessage());
        			$this->mensagem(array(
        				'error' => $e
        			));
        			session_name('form');
					session_start();
					$_SESSION['id'] = $_POST['id'];
					$_SESSION['nome'] = $_POST['nome'];
					$_SESSION['email'] = $_POST['email'];
					$_SESSION['telefone'] = $_POST['telefone'];
					$_SESSION['perfil'] = $_POST['perfil'];
    			}								
			} else {
				//nao foi validado recuperar os dados que veio do post e gravar em uma session os valores e preencher
				//o value dos campos que foram preenchidos do form, menos senha e repetir senha
				session_name('form');
				session_start();
				$_SESSION['id'] = $_POST['id'];
				$_SESSION['nome'] = $_POST['nome'];
				$_SESSION['email'] = $_POST['email'];
				$_SESSION['telefone'] = $_POST['telefone'];
				$_SESSION['perfil'] = $_POST['perfil'];
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
			'dados' => $dados
		));
	}

	public function apagarAction()
	{
		$id = (int) $this->getParam('id');

		$usuario = new Usuario;
		try {
			$row = $usuario->getById($id);
			$row->delete();
			$this->mensagem(array(
				'success' => 'Usuário Deletado com sucesso!!'
			));				
		
			header("Location: /gerenciamento/usuario", true, 301);
		} catch (\Exception $e) {
			$this->mensagem(array(
				'error' => 'Usuário não encontrado!'
			));				
			header("Location: /gerenciamento/usuario", true, 301);
		}
	}


	public function confirmacaoAction()
	{			
		$usuario = (int) $this->getParam('usuario');
		
		return self::renderHtml(array(
			'usuario' => $usuario
		));
	}

}