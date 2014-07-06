<?php
namespace modulos\Auth\Controller;

use Unifacs\Core\Controller\ActionController;
use Unifacs\Core\Db\Conexao;
use modulos\Usuario\Model\Usuario;
//use modulos\Auth\Entity\Aplicacao;

class LoginController extends ActionController
{

	public function indexAction()
	{
		return self::renderHtml(array(
					
		));
	}

	public function autenticarAction(){
		$email = $_POST['email'];
		$senha = md5($_POST['senha']);
		$con = new Conexao();
		$con->query("SELECT id, nome, email, perfil FROM usuario WHERE email = ? AND senha = ?", array($email, $senha));
		$result = $con->fetchAll();
		if(!empty($result)){
			session_start();
			$_SESSION['id'] = $result[0]['id'];
			$_SESSION['nome'] = $result[0]['nome'];
			$_SESSION['email'] = $result[0]['email'];
			$_SESSION['perfil'] = $result[0]['perfil'];
			header('location: /');
		} else {
			header('location: /auth/login');
		}
	}
}