<div class="container">
	
	<ol class="breadcrumb">
  		<li><a href="/">Ínicio</a></li>
  		<li><a href="/gerenciamento/index/index">Gerenciamento</a></li>
  		<li><a href="/gerenciamento/eventos/index">Sub Eventos</a></li>
  		<li class="active">Novo Sub  Evento</li>
	</ol>
	<?php	
	//var_dump($this->getMensagem());
	if ($this->temMensagem()){		
	?>
		<div class="row">
			<div class="col-md-12">
				<?php							
				foreach ($this->getMensagem() as $key => $value):					
					foreach ($value as $key2 => $value2):
				?>			
					<div class="alert alert-<?php
					if ($key2 == 'error') {
						echo 'danger';
					}
					if ($key2 == 'warning') {
						echo 'warning';
					}
					if ($key2 == 'info'){
						echo 'info';
					}
					if ($key2 == 'success'){
						echo 'success';
					}
					?>"><?php echo $value2;?></div>
				<?php				
					endforeach;
				endforeach;				
				?>
			</div>
		</div>
	<?php 
	}
	?>

	<div class="page-header">
		<h1>Novo <small>sub-evento</small></h1>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-offset-2">
			<p>Campos com * são de preenchimento obrigatórios</p>
		</div>
		<div class="col-xs-12 col-md-12 col-sm-12">
			<form class="form-horizontal" role="form" action="/gerenciamento/subeventos/save/evento/<?php
			echo $evento['id'];
			?>" method="post">
				<input type="hidden" name="id" value="<?php
				if (isset($_SESSION['id'])){
					echo $_SESSION['id'];
					unset($_SESSION['id']);					
				} else {					
					if ($dados){
						echo $dados->toArray()['id'];
					}
				}
				?>">
				<?php
				if ($_POST){
					//se nao iniciada, iniciar a sessao form para recuperar os dados
					if(session_status() != PHP_SESSION_ACTIVE){
						session_name('form');
						session_start();					
					}				
				}
				?>
				<div class="form-group">
					<label for="nome" class="col-xs-12 col-sm-3 col-md-2 control-label">Nome <small>*</small></label>
					<div class="col-xs-12 col-sm-9 col-md-4">						
						<input type="text" name="nome" class="form-control" id="nome" 
						placeholder="Nome do local" required autofocus value="<?php
						if (isset($_SESSION['nome'])){
							echo $_SESSION['nome'];
							unset($_SESSION['nome']);
						} else {
							if ($dados){								
								echo $dados->toArray()['nome'];
							}
						}
						?>">						
					</div>
				</div>
				<div class="form-group">
					<label for="duracao" class="col-xs-12 col-sm-3 col-md-2 control-label">
						Duração <small>*</small>
					</label>
					<div class="col-xs-12 col-sm-9 col-md-2">
						<input type="text" name="duracao" class="form-control" placeholder="Duração do evento" 
						value="<?php
						if (isset($_SESSION['duracao'])){
							echo $_SESSION['duracao'];
							unset($_SESSION['duracao']);
						} else {
							if ($dados){
								echo $dados->toArray()['duracao'];
							}
						}
						?>">
					</div>
				</div>				
  				<div class="form-group">
    				<label for="detalhes" class="col-xs-12 col-sm-3 col-md-2 control-label">Detalhes</label>
    				<div class="col-xs-12 col-sm-9 col-md-9">
    					<textarea name="detalhes" id="detalhes" class="form-control col-md-12" rows="10"><?php
    					if (isset($_SESSION['detalhes'])){
    						echo $_SESSION['detalhes'];
    						unset($_SESSION['detalhes']);
    					} else {
    						if ($dados){
    							echo $dados->toArray()['detalhes'];
    						}
    					}
    					?>
    					</textarea>
					</div>
  				</div>
  				<div class="form-group">
  					<label for="tipoEvento" class="col-xs-12 col-sm-3 col-md-2 control-label">
  						Tipo de Evento <small>*</small>
  					</label>
  					<div class="col-xs-12 col-sm-9 col-md-2">  						
  						<select name="tipoEvento" id="tipoEvento" class="form-control">
  							<option value=""> Selecione um tipo</option>
  							<?php  							
  							foreach ($tipoEvento as $tipo):
  							?>  								
  								<option value="<?php echo $tipo->toArray()['id'];?>" <?php
    							if (isset($_SESSION['tipoEvento'])){    								
    								if ($_SESSION['tipoEvento'] == $tipo->toArray()['id']){
    									echo "selected=selected"; 
    								}
    								unset($_SESSION['tipoEvento']);
    							} else {
    								if ($dados){    									
    									if ($dados->toArray()['tipoEvento_id'] == $tipo->toArray()['id']){
    										echo "selected=selected";
    									}
    								}
    							}
    							?>><?php 
  								echo $tipo->toArray()['nome'];?></option>
  							<?php
  							endforeach;
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