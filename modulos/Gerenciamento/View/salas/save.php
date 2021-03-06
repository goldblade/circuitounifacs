
<div class="container">
	<ol class="breadcrumb">
  		<li><a href="/">Ínicio</a></li>
  		<li><a href="/gerenciamento/index/index">Gerenciamento</a></li>
  		<li><a href="/gerenciamento/locais/index">Locais</a></li>
  		<li><a href="/gerenciamento/salas/index/campi/<?php echo $dados[1]->toArray()['id']; ?>">Salas do <?php echo $dados[1]->toArray()['nome']; ?></a></li>
  		<li class="active">Nova sala para do <?php echo $dados[1]->toArray()['nome']; ?></li>
	</ol>
	<div class="page-header">
		<h1>
			Nova <small>sala</small></h1>
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-12 col-sm-12">
			<form class="form-horizontal" role="form" action="/gerenciamento/salas/save" method="post">
				<input type="hidden" name="campi_id" value="<?php echo $dados[1]->toArray()['id']; ?>">
				<input type="hidden" name="id" value="<?php echo isset($dados[2]) ? $dados[2]->toArray()['id'] : ''; ?>">
				<div class="form-group">
					<label for="descricao" class="col-xs-12 col-md-2 col-sm-3 control-label">Nome</label>
					<div class="col-xs-12 col-md-4 col-sm-9">
						<input type="text" class="form-control" id="descricao" name="descricao" placeholder="Nome do local" value="<?php echo isset($dados[2]) ? $dados[2]->toArray()['descricao'] : ''; ?>" />
					</div>
				</div>
				<div class="form-group">
					<label for="capacidade_maxima" class="col-xs-12 col-md-2 col-sm-3 control-label">Qtd. Máxima</label>
					<div class="col-xs-12 col-md-4 col-sm-9">
						<input type="text" class="form-control" id="capacidade_maxima" name="capacidade_maxima" placeholder="Quantidade máxima de participantes" value="<?php echo isset($dados[2]) ? $dados[2]->toArray()['capacidade_maxima'] : ''; ?>" />
					</div>
				</div>
				<div class="form-group">
					<label for="tipoSala_id" class="col-xs-12 col-md-2 col-sm-3 control-label">Tipo</label>
					<div class="col-xs-12 col-md-4 col-sm-9">
						<select type="text" class="form-control" id="tipoSala_id" name="tipoSala_id" >
							<option>Selecione...</option>
							<?php
							foreach($dados[0] as $dado){
								?>
								<option <?php echo isset($dados[2]) && $dados[2]->toArray()['tipoSala_id'] ==  $dado->toArray()['id'] ? 'selected' : ''; ?> value="<?php echo $dado->toArray()['id']; ?>"><?php echo $dado->toArray()['nome']; ?></option>
								<?php
							}
							?>
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
