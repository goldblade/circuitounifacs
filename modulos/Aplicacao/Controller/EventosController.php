<?php
namespace modulos\Aplicacao\Controller;

use Unifacs\Core\Controller\ActionController;
use modulos\Aplicacao\Entity\Aplicacao;

class EventosController extends ActionController
{
	public function __construct()
	{

	}

	public function indexAction()
	{
		//$usuario = isset($_SESSION) ? $_SESSION['id_usuario'] : ""; //'$_SESSION["id_usuario"]';
		$usuario = (int) $this->getParam('usuario');
		$hoje = new \DateTime('NOW');
		$data = isset($data) ? $data[0]: $hoje->format('d/m/Y');
		return self::renderHtml(array(
			"usuario" => $usuario,
			"data" => $data
		));
	}
	public function saveAction(){
		$usuario = (int) $this->getParam('usuario');
		return self::renderHtml(array(
			"usuario" => $usuario,
		));
	}
	public function inscricoesAction(){
		$usuario = (int) $this->getParam('usuario');
		return self::renderHtml(array(
			"usuario" => $usuario,
		));
	}
}
