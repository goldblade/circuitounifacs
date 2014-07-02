<?php
namespace modulos\Locais\Model;
use Unifacs\Core\Db\TableGateway\TableGateway;
use Unifacs\Core\Entity\Entity;

class Sala extends Entity
{
	/**
	 * Nome da tabela
	 * $name
	 */
	//private $name = 'campi';

	protected $tableName = 'sala';

	/**
	 * Chave primaria
	 */
	protected $idColName = 'id';

	/**
	 * descricao
	 */	
	protected $descricao;

	/**
	 * capacidade_maxima
	 */	
	protected $capacidade_maxima;

	/**
	 * campi_id
	 */	
	protected $campi_id;

	/**
	 * sala_tipo_id
	 */	
	protected $tipoSala_id;

	public function setDescricao($value)
	{
		$this->descricao = $value;
	}

	public function getDescricao()
	{
		return $this->descricao;
	}

	public function setCapacidadeMaxima($value)
	{
		$this->capacidade_maxima = $value;
	}

	public function getCapacidadeMaxima()
	{
		return $this->capacidade_maxima;
	}

	public function setCampiId($value)
	{
		$this->campi_id = $value;
	}

	public function getCampiId()
	{
		return $this->campi_id;
	}

	public function setTipoSalaId($value)
	{
		$this->tipoSala_id = $value;
	}

	public function getTipoSalaId()
	{
		return $this->tipoSala_id;
	}	
}
