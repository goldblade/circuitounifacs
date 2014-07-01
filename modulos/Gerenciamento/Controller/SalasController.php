<?php
namespace modulos\Gerenciamento\Controller;

use Unifacs\Core\Controller\ActionController;
use modulos\Locais\Model\Campi;
use modulos\Locais\Model\Sala;
use modulos\Locais\Model\SalaTipo;
use Unifacs\Core\Db\Conexao;

class SalasController extends ActionController
{

	public function indexAction()
	{			
		$campiId = (int) $this->getParam('campi');
		$campi = new Campi();
		$dados[] = $campi->getById($campiId);
		$con = new Conexao;
		$salas = $con->query("SELECT * FROM sala WHERE campi_id = ? ", array($campiId));
		$salas = $con->fetchAll();
		//$this->setTerminal(true);
		$dados[] = $salas;
		//echo '<pre>';
		//var_dump($dados);
		//echo '</pre>';
		return self::renderHtml(array(
			'dados' => $dados
		));
	}

	public function saveAction()
	{		
		$id = @(int) $this->getParam('id');
		$campiId = @(int) $this->getParam('campi');
		
		$salaTipo = new SalaTipo();
		$dados[] = $salaTipo->getAll();
		$campi = new Campi();
		$dados[] = $campi->getById($campiId);
		if($id > 0){
			$sala = new Sala();
			$dados[] = $sala->getById($id);
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
}