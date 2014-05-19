<div class="container">
	
	<ol class="breadcrumb">
  		<li><a href="/">Ínicio</a></li>
  		<li><a href="/gerenciamento/index/index">Gerenciamento</a></li>
  		<li class="active">Usuários</li>
	</ol>

	<?php	
	//var_dump($this->getMensagem());
	if (count($this->getMensagem()) > 0){
	?>
		<div class="row">
			<div class="col-md-12">
				<?php			
				foreach ($this->getMensagem() as $key => $value):				
				?>			
					<div class="alert alert-<?php
					if ($key == 'error') {
						echo 'danger';
					}
					if ($key == 'warning') {
						echo 'warning';
					}
					if ($key == 'info'){
						echo 'info';
					}
					if ($key == 'success'){
						echo 'success';
					}
					?>"><?php echo $value;?></div>
				<?php
				endforeach;
				?>
			</div>
		</div>
	<?php 
	}
	?>

	<div class="page-header">
		<h1>Usuários <small>do sistema</small></h1>
	</div>	
	<div class="row">
		<div class="col-xs-12 col-md-9 col-sm-6">			
			<a href="/gerenciamento/usuario/save" class="btn btn-primary">
				<strong><i class="glyphicon glyphicon-plus"></i> Novo usuário</strong>
			</a>
		</div>
		<div class="col-xs-12 col-md-3 col-sm-6">
			<form action="#" role="form" class="form-inline">
				<input type="text" class="form-control" placeholder="Pesquisar">
			</form>		
		</div>
		<hr class="clean">
	</div>
	<div class="row-fluid">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="col-sm-9">NOME</th>
					<th class="col-sm-3">AÇÕES</th>
				</tr>
				
			</thead>
			<tbody>
				<tr>
					<td>Admin</td>
					<td class="text-center">						
						<a href="#" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> Editar</a>
						<a href="#" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Apagar</a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="row-fluid">
		<div class="col-sm-12 text-center">
			<ul class="pagination ">
			  	<li><a href="#">&laquo;</a></li>
			  	<li><a href="#">1</a></li>
			  	<li><a href="#">2</a></li>
			  	<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#">&raquo;</a></li>
			</ul>
		</div>		
	</div>
</div>	