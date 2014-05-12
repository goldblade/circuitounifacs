<div class="container">
	<ol class="breadcrumb">
  		<li><a href="/">Ínicio</a></li>
  		<li><a href="/gerenciamento/index/index/usuario/1">Gerenciamento</a></li>
  		<li><a href="/gerenciamento/eventos/index/usuario/1">Eventos</a></li>
  		<li><a href="/gerenciamento/atividades/index/evento/x/usuario/1">Atividades para o evento X</a></li>  		
  		<li class="active">Agendamento para atividade X</li>
	</ol>
	<div class="page-header">
		<h1>Agenda <small>atividade</small></h1>
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-12 col-sm-12">
			<form class="form-horizontal" role="form" action="/gerenciamento/atividades/saveagendamento/usuario/1" method="post">
				<input type="hidden" name="espaco_id">				
				<div class="form-group">
    				<label for="data_inicio" class="col-xs-12 col-sm-3 col-md-2 control-label">Data/Hora Início</label>
    				<div class="col-xs-12 col-sm-9 col-md-3">
    					<input type="datetime-local" name="data_inicio" id="data_inicio" class="form-control">
					</div>
  				</div>
  				<div class="form-group">
    				<label for="data_inicio" class="col-xs-12 col-sm-3 col-md-2 control-label">Data/Hora Fim</label>
    				<div class="col-xs-12 col-sm-9 col-md-3">
    					<input type="datetime-local" name="data_fim" id="data_fim" class="form-control">
					</div>
  				</div>
  				<div class="form-group">
    				<label for="espaco" class="col-xs-12 col-sm-3 col-md-2 control-label">Espaço</label>
    				<div class="col-xs-12 col-sm-9 col-md-3">
    					<select name="status" id="status" class="form-control">
    						<option value="salaid">Prédio A - Sala X</option>
    						<option value="salaid">Prédio B - Sala Y</option>
    						<option value="salaid">Prédio C - Sala Z</option>    						
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