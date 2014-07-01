<div class="container">
	<ol class="breadcrumb">
  		<li><a href="/">Ínicio</a></li>
  		<li><a href="/gerenciamento/index/index">Gerenciamento</a></li>
  		<li><a href="/gerenciamento/locais/index">Locais</a></li>
  		<li class="active">Salas do <?php echo $dados[0]->toArray()['nome']; ?></li>
	</ol>
	<div class="page-header">
		<h1>Salas <small>espaços físicos do <?php echo $dados[0]->toArray()['nome']; ?></small></h1>
	</div>	
	<div class="row">
		<div class="col-xs-12 col-md-9 col-sm-6">			
			<a href="/gerenciamento/salas/save/campi/<?php echo $dados[0]->toArray()['id']; ?>" class="btn btn-primary">
				<strong><i class="glyphicon glyphicon-plus"></i> Nova Sala</strong>
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
					<th class="col-sm-5">DESCRIÇÃO</th>
					<th class="col-sm-1">CAPACIDADE</th>
					<th class="col-sm-3">TIPO</th>
					<th class="col-sm-3">AÇÕES</th>
				</tr>
				
			</thead>
			<tbody>
				<?php
				foreach ($dados[1] as $value) {
					?>
					<tr>
						<td><?php echo $value['descricao'] ?></td>
						<td><?php echo $value['capacidade_maxima'] ?></td>
						<td><?php echo $value['sala_tipo_id'] ?></td>
						<td class="text-center">
							<a href="/gerenciamento/salas/save/campi/<?php echo $dados[0]->toArray()['id']; ?>/id/<?php echo $value['id'] ?>" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> Editar</a>
							<a href="/gerenciamento/salas/apagar/id/<?php echo $value['id'] ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Apagar</a>
						</td>
					</tr>
					<?php
				}
				?>
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