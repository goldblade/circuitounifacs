<?php
namespace modulos\Gerenciamento\Controller;
use Unifacs\Core\Controller\ActionController;
use modulos\Locais\Model\Campi;
use Unifacs\Core\Db\Conexao;

class LocaisController extends ActionController
{

	public function indexAction()
	{			
		$usuario = (int) $this->getParam('usuario');
		$campi = new Campi;
		$dados = $campi->getAll();
		return self::renderHtml(array(
			'dados' => $dados
		));
	}

	public function saveAction()
	{		
		$id = (int) $this->getParam('id');
		$dados = null;
		if($id > 0){
			$campi = new Campi();
			$dados = $campi->getById($id);
			return self::renderHtml(array(
				'dados' => $dados
			));
		}
		if($_POST){
			if($_POST['id'] != ""){
				$campi = new Campi();
				$updateCampi = $campi->getById($_POST['id']);
				$updateCampi->set('nome', $_POST['nome']);
				$updateCampi->set('endereco', $_POST['endereco']);
				$updateCampi->set('telefone', $_POST['telefone']);
				$updateCampi->save();
				header('location: /gerenciamento/locais/index');
			} else {
				$campi = new Campi();
				$newCampi = $campi->createRow(
					array(
						'nome' => $_POST['nome'],
						'endereco' => $_POST['endereco'],
						'telefone' => $_POST['telefone']
						)
					);
				$newCampi->save();
				header('location: /gerenciamento/locais/index');
			}
		}
		return self::renderHtml(array(
				'dados' => $dados
			));
	}

	public function apagarAction()
	{
		$id = (int) $this->getParam('id');
		$campi = new Campi();
		$campiApagar = $campi->getById($id);
		$campiApagar->delete();
		header('location: /gerenciamento/locais/index');
	}

	public function buscaAction()
	{
		$q = $_POST['q'];
		$con = new Conexao;
		$dados = $con->query("SELECT * FROM Campi WHERE nome LIKE ? OR endereco LIKE ? ", array( '%'.$q.'%', '%'.$q.'%' ));
		$dados = $con->fetchAll();
		$this->setTerminal(true);
		return self::renderHtml(array(
			'dados' => $dados
		));
	}

	public function localsalvoAction()
	{
		$usuario = (int) $this->getParam('usuario');
		return self::renderHtml(array(
			'usuario' => $usuario
		));
	}
	
}