<div class="container">
	
	<ol class="breadcrumb">
  		<li><a href="/">Ínicio</a></li>
  		<li><a href="#">Gerenciamento</a></li>
  		<li><a href="#">Locais</a></li>
  		<li class="active">Novo local</li>
	</ol>

	<div class="page-header">
		<h1>
			Novo <small>local</small></h1>
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-12 col-sm-12">
			<form class="form-horizontal" role="form" action="/gerenciamento/locais/localsalvo/admin/1" method="post">
				<div class="form-group">
					<label for="nome" class="col-xs-12 col-sm-3 col-md-2 control-label">Nome</label>
					<div class="col-xs-12 col-sm-9 col-md-4">
						<input type="text" class="form-control" id="nome" placeholder="Nome do local"/>
					</div>
				</div>
				<div class="form-group">
					<label for="endereco" class="col-xs-12 col-md-2 col-sm-3 control-label">Endereço</label>
					<div class="col-xs-12 col-md-4 col-sm-9">
						<input type="text" class="form-control" id="endereco" placeholder="Digite o endereço do local"/>
					</div>
				</div>
				<div class="form-group">
  					<label for="telefone" class="col-xs-12 col-md-2 col-sm-3 control-label">Telefone</label>
  					<div class="col-xs-7 col-md-3 col-sm-4">
  						<input type="tel" class="form-control" id="telefone" placeholder="Digite o telefone"/>
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