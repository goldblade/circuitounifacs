<div class="container">
	
	<ol class="breadcrumb">
  		<li><a href="/">Ínicio</a></li>
  		<li><a href="/gerenciamento/index/index/usuario/1">Gerenciamento</a></li>
  		<li><a href="/gerenciamento/eventos/index/usuario/1">Evento</a></li>
  		<li class="active">Novo evento</li>
	</ol>

	<div class="page-header">
		<h1>Novo <small>evento</small></h1>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-offset-2">
			<p>Campos com * são de preenchimento obrigatórios</p>
		</div>
		<div class="col-xs-12 col-md-12 col-sm-12">
			<form class="form-horizontal" role="form" action="/gerenciamento/eventos/confirmacao/usuario/1" method="post">
				<div class="form-group">
					<label for="nome" class="col-xs-12 col-sm-3 col-md-2 control-label">Nome <small>*</small></label>
					<div class="col-xs-12 col-sm-9 col-md-4">						
						<input type="text" name="nome" class="form-control" id="nome" placeholder="Nome do local" required autofocus>						
					</div>
				</div>
				<div class="form-group">
					<label for="data_inicio" class="col-xs-12 col-md-2 col-sm-3 control-label">Data Início <small>*</small></label>
					<div class="col-xs-12 col-md-4 col-sm-9">
						<input type="date" name="data_inicio" class="form-control" id="data_inicio" placeholder="Digite a data de início" required>
					</div>
				</div>
				<div class="form-group">
					<label for="data_final" class="col-xs-12 col-md-2 col-sm-3 control-label">Data Final</label>
					<div class="col-xs-12 col-md-4 col-sm-9">
						<input type="date" class="form-control" id="data_final" name="data_final" placeholder="Digite a data de término">
					</div>
				</div>								
  				<div class="form-group">
    				<label for="status" class="col-xs-12 col-sm-3 col-md-2 control-label">Status</label>
    				<div class="col-xs-12 col-sm-9 col-md-3">
    					<select name="status" id="status" class="form-control">
    						<option value="ativo">Ativo</option>
    						<option value="inativo">Inativo</option>
    						<option value="finalizado">Finalizado</option>
    						<option value="cancelado">Cancelado</option>    					
    					</select>
					</div>
  				</div>
				<div class="form-group">
    				<div class="col-sm-offset-2 col-xs-12 col-sm-10 ">
      					<button type="submit" class="btn btn-primary">Salvar</button>
    				</div>
  				</div>  				
			</form>
		</div>
	</div>	
</div>