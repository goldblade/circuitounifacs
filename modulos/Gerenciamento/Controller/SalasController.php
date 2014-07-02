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
		$salas = $con->query("SELECT s.*, t.nome FROM	sala AS s INNER JOIN tipoSala AS t ON s.tipoSala_id = t.id WHERE s.campi_id = ?", array($campiId));
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
				$sala = new Sala();
				$updateSala = $sala->getById($_POST['id']);
				$updateSala->set('descricao', $_POST['descricao']);
				$updateSala->set('capacidade_maxima', $_POST['capacidade_maxima']);
				$updateSala->set('tipoSala_id', $_POST['tipoSala_id']);
				$updateSala->set('campi_id', $_POST['campi_id']);
				$updateSala->save();
				header('location: /gerenciamento/salas/index/campi/'.$_POST['campi_id']);
			} else {
				
				echo '<pre>';
				var_dump($_POST);
				echo '</pre>'; //exit;
				$sala = new Sala();
				$newSala = $sala->createRow(
					array(
						'descricao' => $_POST['descricao'],
						'capacidade_maxima' => $_POST['capacidade_maxima'],
						'tipoSala_id' => $_POST['tipoSala_id'],
						'campi_id' => $_POST['campi_id']
						)
					);
				$newSala->save();
				header('location: /gerenciamento/salas/index/campi/'.$_POST['campi_id']);
			}
		}
		return self::renderHtml(array(
			'dados' => $dados
		));
	}
	public function apagarAction()
	{
		$campi_id = (int) $this->getParam('campi');
		$id = (int) $this->getParam('id');
		$sala = new Sala();
		$salaApagar = $sala->getById($id);
		$salaApagar->delete();
		header('location: /gerenciamento/salas/index/campi/'.$campi_id);
	}
	public function buscaAction()
	{
		$q = $_POST['q'];
		$c = $_POST['c'];
		$con = new Conexao;
		 $dados = $con->query(
		 	"SELECT s.*, t.nome FROM sala AS s INNER JOIN tipoSala AS t ON s.tipoSala_id = t.id WHERE " 
		 	. "(s.descricao LIKE ? OR t.nome LIKE ?) AND s.campi_id = ? ", array( '%'.$q.'%', '%'.$q.'%', $c ));
		$dados = $con->fetchAll();
		$this->setTerminal(true);
		return self::renderHtml(array(
			'dados' => $dados
		));
	}
}
