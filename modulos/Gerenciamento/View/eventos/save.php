<script type="text/javascript">
	$(function() {
    	$( ".data" ).datepicker({
    		dateFormat: 'dd/mm/yy',
		    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
		    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
		    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
		    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
		    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
		    nextText: 'Próximo',
		    prevText: 'Anterior',
		    changeMonth: true,
        	changeYear: true
    	});
  	});
</script>
<div class="container">
	
	<ol class="breadcrumb">
  		<li><a href="/">Ínicio</a></li>
  		<li><a href="/gerenciamento/index/index">Gerenciamento</a></li>
  		<li><a href="/gerenciamento/eventos/index">Eventos</a></li>
  		<li class="active">Novo evento</li>
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
		<h1>Novo <small>evento</small></h1>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-offset-2">
			<p>Campos com * são de preenchimento obrigatórios</p>
		</div>
		<div class="col-xs-12 col-md-12 col-sm-12">
			<form class="form-horizontal" role="form" action="/gerenciamento/eventos/save" method="post">
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
					<label for="data_inicio" class="col-xs-12 col-md-2 col-sm-3 control-label">Data Início <small>*</small></label>
					<div class="col-xs-12 col-md-3 col-sm-9">
						<input type="date" name="data_inicio" class="form-control data" id="data_inicio" 
						placeholder="Escolha a data de início" required value="<?php
						if (isset($_SESSION['data_inicio'])){
							echo $_SESSION['data_inicio'];
							unset($_SESSION['data_inicio']);
						} else {
							if ($dados){
								$dataInicio = new \DateTime($dados->toArray()['data_inicio']);
								$dataInicio = $dataInicio->format('d/m/Y');
								echo $dataInicio;
							}
						}
						?>">						
					</div>
				</div>
				<div class="form-group">
					<label for="data_final" class="col-xs-12 col-md-2 col-sm-3 control-label">Data Final</label>
					<div class="col-xs-12 col-md-3 col-sm-9">
						<input type="date" class="form-control data" id="data_final" name="data_final" 
						placeholder="Escolha a data de término" value="<?php
						if (isset($_SESSION['data_final'])){
							echo $_SESSION['data_final'];
							unset($_SESSION['data_final']);
						} else {
							if ($dados){
								$dataFinal = new \DateTime($dados->toArray()['data_final']);
								$dataFinal = $dataFinal->format('d/m/Y');
								echo $dataFinal;
							}
						}
						?>">
					</div>
				</div>								
  				<div class="form-group">
    				<label for="status" class="col-xs-12 col-sm-3 col-md-2 control-label">Status</label>
    				<div class="col-xs-12 col-sm-9 col-md-3">
    					<select name="status" id="status" class="form-control">
    						<?php
    						$status = array(
    							'ativo' => 'Ativo',
    							'finalizado' => 'Finalizado',
    							'cancelado' => 'Cancelado'
    						);
    						foreach ($status as $key => $value):
    						?>
    							<option value="<?php echo $key?>" <?php
    							if (isset($_SESSION['status'])){    								
    								if ($_SESSION['status'] == $key){
    									echo "selected=selected"; 
    								}
    								unset($_SESSION['status']);
    							} else {
    								if ($dados){    									
    									if ($dados->toArray()['status'] == $key){    										
    										echo "selected=selected";
    									}
    								}
    							}
    							?>><?php echo $value?></option>
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