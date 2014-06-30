<?php
namespace modulos\Gerenciamento\Controller;

use Unifacs\Core\Controller\ActionController;
use modulos\Eventos\Model\EdicaoCircuito;
use Unifacs\Core\Db\Conexao;

class EventosController extends ActionController
{
	public function indexAction()
	{					
		$dados = new EdicaoCircuito;
		$dados = $dados->getAll();
		
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
			$edicaocircuito = new EdicaoCircuito;
			$dados = $edicaocircuito->getById($id);			
		}
		
		

		$mensagem = array();
		if ($_POST){
			$validado = true;
			if ($_POST['nome'] == ''){
				$this->mensagem(array(
					'error' => 'Campo Nome não pode ficar vazio'
				));
				$validado = false;
			}
			if ($_POST['data_inicio'] == ''){
				$this->mensagem(array(
					'error' => 'Data de inicio não pode ficar vazio'
				));
				$validado = false;
			}
			if ($validado){
				try {
					if ($_POST['id'] != ""){
						//tem id é um update
						$edicaocircuito = new EdicaoCircuito;
						$updateRegistro = $edicaocircuito->getById($_POST['id']);
						if (isset($_POST['nome'])){
							$updateRegistro->set('nome', $_POST['nome']);
						}
						if (isset($_POST['data_inicio'])){
							$data = explode('/',$_POST['data_inicio']);
							$datacerta = $data[2].'-'.$data[1].'-'.$data[0];
							$dataInicio = new \DateTime($datacerta);
							$dataInicio = $dataInicio->format('Y-m-d');							
							$updateRegistro->set('data_inicio', $dataInicio);
						}
						if (isset($_POST['data_final'])){
							$data = explode('/',$_POST['data_final']);
							$datacerta = $data[2].'-'.$data[1].'-'.$data[0];
							$dataFinal = new \DateTime($datacerta);
							$dataFinal = $dataFinal->format('Y-m-d');
							$updateRegistro->set('data_final', $dataFinal);
						}
						if (isset($_POST['status'])){
							$updateRegistro->set('status', $_POST['status']);
						}
						$updateRegistro->save();
					} else {
						//nao tem id é um insert
						$edicaocircuito = new EdicaoCircuito;
						if (isset($_POST['data_inicio'])){
							$data = explode('/',$_POST['data_inicio']);
							$datacerta = $data[2].'-'.$data[1].'-'.$data[0];
							$dataInicio = new \DateTime($datacerta);
							$dataInicio = $dataInicio->format('Y-m-d');							
						} else {
							$dataInicio = null;
						}
						if ((isset($_POST['data_final'])) && $_POST['data_final'] != "" ){
							$data = explode('/',$_POST['data_final']);
							$datacerta = $data[2].'-'.$data[1].'-'.$data[0];
							$dataFinal = new \DateTime($datacerta);
							$dataFinal = $dataFinal->format('Y-m-d');
						} else {
							$dataFinal = null;
						}
						$novoRegistro = $edicaocircuito->createRow(array(
							'nome' => (isset($_POST['nome']) ? $_POST['nome'] : null),
							'data_inicio' => $dataInicio,
							'data_final' => $dataFinal,
							'status' => (isset($_POST['status']) ? $_POST['status'] : null)
						));
						$novoRegistro->save();
					}

					$this->mensagem(array(
						'success' => 'Evento Salvo com sucesso!'
					));
					header("Location: /gerenciamento/eventos", true, 301);

				} catch (\Exception $e) {
					$this->mensagem(array(
						'error' => $e
					));
					session_name('form');
					session_start();
					$_SESSION['id'] = $_POST['id'];
					$_SESSION['nome'] = $_POST['nome'];
					$_SESSION['data_inicio'] = $_POST['data_inicio'];
					$_SESSION['data_final'] = $_POST['data_final'];
					$_SESSION['status'] = $_POST['status'];
				}
			} else {
				//nao foi validado
				session_name('form');
				session_start();
				$_SESSION['id'] = $_POST['id'];
				$_SESSION['nome'] = $_POST['nome'];
				$_SESSION['data_inicio'] = $_POST['data_inicio'];
				$_SESSION['data_final'] = $_POST['data_final'];
				$_SESSION['status'] = $_POST['status'];
			}
		}
		
		return self::renderHtml(array(
			'dados' => $dados			
		));
	}

	public function buscaAction()
	{
		//pega a query passada pelo post
		$q = $_POST['q'];

		$con = new Conexao;
		$dados = $con->query("SELECT * FROM edicaoCircuito WHERE nome LIKE ? ", array( '%'.$q.'%' ));
		$dados = $con->fetchAll();
		
		$this->setTerminal(true);
		return self::renderHtml(array(
			'dados' => $dados
		));
	}

	public function apagarAction()
	{
		$id = (int) $this->getParam('id');
		$eventos = new EdicaoCircuito;
		try {
			$row = $eventos->getById($id);
			$row->delete();
			$this->mensagem(array(
				'success' => 'Evento Deletado com sucesso!!'
			));				
		
			header("Location: /gerenciamento/eventos", true, 301);
		} catch (\Exception $e) {
			$this->mensagem(array(
				'error' => 'Evento não encontrado!'
			));				
			header("Location: /gerenciamento/eventos", true, 301);
		}
	}

}