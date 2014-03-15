<?php
namespace modulos\Aplicacao\Controller;

use modulos\Aplicacao\Entity\Aplicacao;

class IndexController
{
	public function __construct()
	{
		var_dump("controller index");
		$app = new Aplicacao();
	}
}