<div class="container">
	<ol class="breadcrumb">
  		<li><a href="/">Ínicio</a></li>
  		<li><a href="#">Gerenciamento</a></li>
  		<li><a href="#">Locais</a></li>
  		<li><a href="#">Salas para prédio X</a></li>
  		<li class="active">Nova sala para prédio X</li>
	</ol>
	<div class="page-header">
		<h1>
			Nova <small>sala</small></h1>
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-12 col-sm-12">
			<form class="form-horizontal" role="form" action="/gerenciamento/salas/salassave/usuario/1" method="post">
				<input type="hidden" name="local" value="">
				<div class="form-group">
					<label for="nome" class="col-xs-12 col-md-2 col-sm-3 control-label">Nome</label>
					<div class="col-xs-12 col-md-4 col-sm-9">
						<input type="text" class="form-control" id="nome" placeholder="Nome do local"/>
					</div>
				</div>
				<div class="form-group">
					<label for="capacidade_maxima" class="col-xs-12 col-md-2 col-sm-3 control-label">Qtd. Máxima</label>
					<div class="col-xs-12 col-md-4 col-sm-9">
						<input type="text" class="form-control" id="capacidade_maxima" placeholder="Quantidade máxima de participantes"/>
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