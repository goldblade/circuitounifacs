<?php
namespace modulos\Usuario\Controller;

use Unifacs\Core\Controller\ActionController;
use modulos\Usuario\Model\Usuario;
use Unifacs\Core\Db\Conexao;

class CadastroController extends ActionController
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
		echo '<meta charset="UTF-8"/>';
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';
		if ($_POST){			
			$validado = true;
			if ($_POST['senha'] != $_POST['repetirsenha']){								
				$this->mensagem(array(
					'error' => 'Campo senha e repetir senha difererem'
				));				
				$validado = false;
			} 

			if ($_POST['senha'] == ''){
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
					$usuario = new Usuario;				
					$novoRegistro = $usuario->createRow(array(
						'nome' => (isset($_POST['nome']) ? $_POST['nome'] : null),
						'email' => (isset($_POST['email']) ? $_POST['email'] : null),
						'senha' => (isset($_POST['senha']) ? md5($_POST['senha']) : null),
						'telefone' => (isset($_POST['telefone']) ? $_POST['telefone'] : null),
						'perfil' => 'participante'
					));       			
        			$novoRegistro->save();
					$this->mensagem(array(
						'success' => 'Usuário Salvo com sucesso!!'
					));				
					header("Location: /auth/login", true, 301);
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
		return self::renderHtml(array(
			'dados' => $dados
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