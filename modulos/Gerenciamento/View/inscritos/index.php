<div class="container">
	<ol class="breadcrumb">
  		<li><a href="/">Ínicio</a></li>
  		<li><a href="/gerenciamento/index/index/usuario/1">Gerenciamento</a></li>
  		<li class="active">Inscritos</li>
	</ol>
	<div class="page-header">
		<h1>Inscritos</h1>
	</div>
	<div class="row">
		<div class="col-md-6">
			<form class="form-horizontal" method="post">
				<div class="form-group">
					<label for="evento" class="col-xs-12 col-sm-3 col-md-4 control-label">
						Evento
					</label>
					<div class="col-xs-12 col-sm-9 col-md-7">						
						<select name="evento" class="form-control" id="evento" >
							<option value"1">Circuito Unifacs 2014</option>
							<option value"2">Circuito Unifacs 2013</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="local" class="col-xs-12 col-sm-3 col-md-4 control-label">
						Local
					</label>
					<div class="col-xs-12 col-sm-9 col-md-7">						
						<select name="local" class="form-control" id="local" >
							<option value"1">PA8</option>
							<option value"2">PA7</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="atividade" class="col-xs-12 col-sm-3 col-md-4 control-label">
						Atividade
					</label>
					<div class="col-xs-12 col-sm-9 col-md-7">						
						<select name="atividade" class="form-control" id="atividade" >
							<option value"1">Palestra MVC</option>
							<option value"2">Palestra Andriod</option>
						</select>
					</div>
				</div>
				<div class="form-group">
    				<div class="col-sm-offset-4 col-xs-12 col-sm-10 ">
      					<button type="submit" class="btn btn-primary">Consultar</button>
    				</div>
  				</div>
			</form>	
		</div>
		<div class="col-md-6 table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th width="80%">Nome</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					<?php
					for ($row=0; $row < 15; $row++) { 
					?>
					<tr>
						<td>João <?php echo $row+1 ?></td>
						<td><a href="#" class="btn btn-info"><i class="glyphicon glyphicon-ok"></i></a></td>
					</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>