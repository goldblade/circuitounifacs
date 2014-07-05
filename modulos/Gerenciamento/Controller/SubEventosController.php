<?php
namespace modulos\Gerenciamento\Controller;

use Unifacs\Core\Controller\ActionController;
use modulos\Eventos\Model\Evento;
use modulos\Eventos\Model\EdicaoCircuito;
use modulos\Eventos\Model\TipoEvento;
use Unifacs\Core\Db\Conexao;

class SubEventosController extends ActionController
{
	public function indexAction()
	{	
		$eventoId = (int) $this->getParam('evento');				
		$eventos = new EdicaoCircuito;
		$evento = $eventos->getById($eventoId);			
		if (!$evento){
			$this->mensagem(array(
			'error' => 'Evento não encontrado no sistema!'
			));				
			header("Location: /gerenciamento/eventos", true, 301);
		}			
		$dados = new Evento;
		$dados = $dados->getAll();

		return self::renderHtml(array(
			'dados' => $dados,
			'evento' => $evento->toArray()
		));
	}	

	public function saveAction()
	{
		$id = (int) $this->getParam('id');
		$eventoId = (int) $this->getParam('evento');
		$eventos = new EdicaoCircuito;
		$evento = $eventos->getById($eventoId);
		if (!$evento){
			$this->mensagem(array(
			'error' => 'Evento não encontrado no sistema!'
			));				
			header("Location: /gerenciamento/eventos", true, 301);
		}
		$dados = null;
		$tipoEvento = new TipoEvento;
		$tipoEvento = $tipoEvento->getAll();		
		if ($id > 0){
			$subevento = new Evento;
			$dados = $subevento->getById($id);
		}

		$mensagem = array();

		if ($_POST){
			$validado = true;

			if (count($tipoEvento) == 0){
				$this->mensagem(array(
					'error' => 'Nenhum tipo de evento cadastrado, por favor cadastre um!'
				));
				$validado = false;
			}

			if ( ($_POST['tipoEvento'] == "") && (count($tipoEvento) != 0) ){
				$this->mensagem(array(
					'error' => 'Por favor selecione um tipo de evento'
				));
				$validado = false;
			}

			if ($_POST['nome'] == ""){
				$this->mensagem(array(
					'error' => 'Por favor preencha o campo nome'
				));
				$validado = false;
			}

			if ($_POST['cargahoraria'] == ""){
				$this->mensagem(array(
					'error' => 'Por favor entre com a Carga horária do evento'
				));
				$validado = false;
			}

			if ($validado){

				try {
					if ($_POST['id'] != ""){
						//update
						$evento = new Evento;
						$updateRegistro = $evento->getById($_POST['id']);
						if (isset($_POST['nome'])){
							$updateRegistro->set('nome', $_POST['nome']);
						}						
						if (isset($_POST['cargahoraria'])){
							$updateRegistro->set('cargahoraria', $_POST['cargahoraria']);
						}
						if (isset($_POST['tipoEvento'])){
							$updateRegistro->set('tipoEvento_id', $_POST['tipoEvento']);
						}
						if (isset($_POST['detalhes'])){
							$updateRegistro->set('detalhes', $_POST['detalhes']);
						}						
						$updateRegistro->save();
					} else {
						//insert
						$evento = new Evento;
						$novoRegistro = $evento->createRow(array(
							'nome' => (isset($_POST['nome']) ? $_POST['nome'] : null),
							'cargahoraria' => (isset($_POST['cargahoraria']) ? $_POST['cargahoraria'] : null),
							'tipoEvento_id' => (isset($_POST['tipoEvento']) ? $_POST['tipoEvento'] : null),
							'detalhes' => (isset($_POST['detalhes']) ? $_POST['detalhes'] : null),
							'edicaoCircuito_id' => $eventoId
						));
						$novoRegistro->save();
					}
					$this->mensagem(array(
						'success' => 'Sub Evento Salvo com sucesso!'
					));
					header("Location: /gerenciamento/subeventos/index/evento/" . $eventoId, true, 301);

				} catch (\Exception $e){
					$this->mensagem(array(
						'error' => $e
					));
					session_name('form');
					session_start();
					$_SESSION['id'] = $_POST['id'];
					$_SESSION['nome'] = $_POST['nome'];
					$_SESSION['cargahoraria'] = $_POST['cargahoraria'];
					$_SESSION['tipoEvento'] = $_POST['tipoEvento'];
					$_SESSION['detalhes'] = $_POST['detalhes'];
				}

			} else {
				//nao validado
				session_name('form');
				session_start();
				$_SESSION['id'] = $_POST['id'];
				$_SESSION['nome'] = $_POST['nome'];
				$_SESSION['cargahoraria'] = $_POST['cargahoraria'];
				$_SESSION['tipoEvento'] = $_POST['tipoEvento'];
				$_SESSION['detalhes'] = $_POST['detalhes'];
			}
		}

		return self::renderHtml(array(
			'dados' => $dados,
			'evento' => $evento->toArray(),
			'tipoEvento' => $tipoEvento
		));
	}

	public function buscaAction()
	{
		//pega a query passada pelo post
		$q = $_POST['q'];
		$eventoId = (int) $this->getParam('evento');		
		// $eventos = new EdicaoCircuito;
		// $evento = $eventos->getById($eventoId);		
		$con = new Conexao;
		$dados = $con->query("SELECT * FROM evento WHERE nome LIKE ? AND edicaoCircuito_id = ?", 
			array( '%'.$q.'%', $eventoId ));		
		$dados = $con->fetchAll();

		// var_dump($dados);
		
		$this->setTerminal(true);
		return self::renderHtml(array(
			'dados' => $dados			
		));
	}

	public function apagarAction()
	{
		$id = (int) $this->getParam('id');
		$eventoId = (int) $this->getParam('evento');
		$evento = new Evento;
		try {
			$row = $evento->getById($id);
			$row->delete();
			$this->mensagem(array(
				'success' => 'Sub Evento Deletado com sucesso!!'
			));				
		
			header("Location: /gerenciamento/subeventos/index/evento/" . $eventoId, true, 301);
		} catch (\Exception $e) {
			$this->mensagem(array(
				'error' => 'Sub Evento não encontrado!'
			));				
			header("Location: /gerenciamento/subeventos/index/evento/" . $eventoId, true, 301);
		}
	}

	public function alocarAction()
	{
		/**
		 * Verificando se existem salas cadastradas no sistema, se salas nao tiverem cadastradas redirecionar 
		 * para tela de cadastro de predios.
		 */
		// $salas = new Salas;
		// $salas = $salas->getAll();
		// if (count($salas) <= 0){
		// 	$this->mensagem(array(
		// 		'error' => 'Não existem salas cadastradas no sistema, por favor cadastre uma'
		// 	));
		// 	header("Location: /gerenciamento/dddddd", true, 301);
		// }
		$id = (int) $this->getParam('id');
		$eventoId = (int) $this->getParam('evento');
		return self::renderHtml(array(

		));
	}

}