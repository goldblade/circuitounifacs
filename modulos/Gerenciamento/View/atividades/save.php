<div class="container">
	<ol class="breadcrumb">
  		<li><a href="/">Ínicio</a></li>
  		<li><a href="/gerenciamento/index/index/usuario/1">Gerenciamento</a></li>
  		<li><a href="/gerenciamento/eventos/index/usuario/1">Eventos</a></li>
  		<li><a href="/gerenciamento/atividades/index/evento/x/usuario/1">Atividade para o evento X</a></li>
  		<li class="active">Nova atividade para o evento X</li>
	</ol>
	<div class="page-header">
		<h1>
			Nova <small>atividade</small></h1>
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-12 col-sm-12">
			<form class="form-horizontal" role="form" action="/gerenciamento/atividades/confirmacao/usuario/1" method="post">
				<input type="hidden" name="evento" value="x">
				<div class="form-group">
					<label for="nome" class="col-xs-12 col-md-2 col-sm-3 control-label">Nome</label>
					<div class="col-xs-12 col-md-4 col-sm-9">
						<input type="text" class="form-control" id="nome" placeholder="Nome da atividade"/>
					</div>
				</div>
				<div class="form-group">
    				<label for="tipo" class="col-xs-12 col-sm-3 col-md-2 control-label">Tipo de Atividade</label>
    				<div class="col-xs-12 col-sm-9 col-md-3">
    					<select name="status" id="status" class="form-control">
    						<option value="palestra">Palestra</option>
    						<option value="mini-curso">Mini-curso</option>
    						<option value="workshop">Workshop</option>    						]
    						<option value="mesa-redonda">Mesa redonda</option>
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