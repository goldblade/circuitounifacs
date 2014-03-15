<?php 
namespace modulos\Aplicacao\Entity;

use Unifacs\Core\Entity\Entity;

class Aplicacao extends Entity
{
	public function __construct()
	{
		var_dump("entity aplicacao");		
		parent::__construct();
	}
}