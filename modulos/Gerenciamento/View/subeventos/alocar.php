<style>	
</style>
<div class="container">
	<ol class="breadcrumb">
  		<li><a href="/">Ínicio</a></li>
  		<li><a href="/gerenciamento/index/index">Gerenciamento</a></li>  		
  		<li><a href="/gerenciamento/eventos/index">Eventos</a></li> 
  		<li><a href="/gerenciamento/subeventos/index/evento/<?php echo $idCircuito;?>">Sub Eventos</a></li> 
  		<li class="active">Alocamento</li>
	</ol>
	<?php	
	if ($this->temMensagem()){		
	?>
		<div class="row">
			<div class="col-md-12">
				<?php
				// var_dump($this->getMensagem()->mensagem);	
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
				// unset($_SESSION['mensagem']);
				?>
			</div>
		</div>
	<?php 
	}
	?>

	<div class="page-header">
		<h1>Alocamento </h1>
	</div>
	<input type="hidden" name="eventoId" value="<?php echo $idevento?>">		
	<?php		
	//se dados maior que 0 é que nao tem sala associada ao evento
	if ( (count($dados) == 0) || (count($dados) > 0 && $idalocamento > 0) ):
		/**
		 * @todo apresentar os campis, disponiveis para escolha
		 * @todo escolher a sala de acordo com o campi
		 * @todo escolher horario
		 * @todo checar se nao tem choque o horario escolhido, se ja tem outro evento no mesmo horario
		 */
	?>
		<div class="row">
			<div id="campi">
				<div class="col-xs-12 col-md-12 col-sm-12">
					<div class="panel panel-info">
						<div class="panel-heading">
				        	<h3 class="panel-title">Escolha o Local</h3>
				      	</div>
				      	<div class="panel-body">
				      		<div class="col-xs-12 col-sm-3 col-md-3">
					      		<form action="">
					      			<select name="campi" class="form-control campi">
					      				<option value="">  Escolha um Campi </option>
					      				<?php
							        	foreach ($campi as $camp):
							        	?>
							        		<option value="<?php echo $camp->toArray()['id']?>"><?php
							        		echo $camp->toArray()['nome'];?></option>
							        	<?php
							        	endforeach;?>
					      			</select>
					      		</form>
				      		</div>				        	
				      	</div>
				    </div>
				</div>
			</div>

			<div id="salas" style="display:none;">
				<div class="col-xs-12 col-md-12 col-sm-12">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title">Escolha a Sala</h3>
						</div>
						<div class="panel-body">
							<div class="col-xs-12 col-sm-3 col-md-3">
								<form action="">
									<select name="sala" class="form-control sala">
									</select>
								</form>
							</div>							
						</div>
					</div>
				</div>	

				<div id="hora" style="display:none;">
					<div class="col-xs-12 col-md-12 col-sm-12">
						<div class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title">Escolha a Data e o Horário</h3>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="form-group">
										<div class="col-xs-2">
											<label for="datainicio">
												DATA: 
											</label>
										</div>
										<div class="col-xs-2" style="z-index:9999999;">
											<input type="date" name="data_inicio" class="form-control data">
										</div>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="form-group">
										<div class="col-xs-2">
											<label for="hora_inicio">
												HORA INÍCIO:
											</label>
										</div>
										<div class="col-xs-2">
										    <div class="input-group bootstrap-timepicker">									      
											    <input id="timepicker1" class="form-control" type="text" 
											    name="hora_inicio">
											    <div class="input-group-addon">
											      	<i class="glyphicon glyphicon-time"></i>
											    </div>
										    </div>
									    </div>
									    <div class="col-xs-4">
									    	<!-- <a href="#" class="btn btn-primary">SETAR HORÁRIO DE ÍNICIO</a> -->
									    </div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-md-12 col-sm-12">
										<hr>	
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-xs-2">
											<label for="hora_final">
												HORA FINAL:
											</label>
										</div>									
										<div class="col-xs-2">
										    <div class="input-group bootstrap-timepicker">									      
											    <input id="timepicker2" class="form-control" type="text" 
											    name="hora_final">
											    <div class="input-group-addon">
											      	<i class="glyphicon glyphicon-time"></i>
											    </div>
										    </div>
									    </div>
									    <div class="col-xs-4">
									    	<!-- <a href="#" class="btn btn-primary">SETAR HORÁRIO DE FINAL</a> -->
									    </div>
									</div>
								</div>
								<!-- <div class="col-xs-12 col-sm-3 col-md-3"> -->
									<!-- <div class="input-append bootstrap-timepicker">
							            <input id="timepicker1" type="text" 
							            class="form-control">
							            <span class="add-on"><i class="glyphicon glyphicon-time"></i></span>
							        </div> -->
								<!-- </div>							 -->
							</div>
						</div>
					</div>	
				</div>
			</div>

		</div>
		<div class="row">
			<div class="col-xs-12 col-md-12 col-sm-12">
				<div class="progress">
					<div class="progress-bar progress-bar-striped active"  role="progressbar" aria-valuenow="45" 
					aria-valuemin="0" aria-valuemax="100" style="width: 0%">
				    	0% completo
				  	</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-12 col-sm-12">
				<ul class="pager">
					<!-- <li class="previous first" style="display:none;"><a href="javascript:;">First</a></li> -->
					<li class="previous first disabled"><a href="javascript:;">Anterior</a></li>
					<!-- <li class="next last" style="display:none;"><a href="javascript:;">Last</a></li> -->
				  	<li class="next last"><a href="javascript:;">Próximo</a></li>
				</ul>
			</div>
		</div>
	<?php
	else:		
	?>	
		<div class="row edit">
			<p><b>Local:</b> <?php echo $dados[0]['campiNome']?></p>
			<p><b>Sala:</b> <?php echo $dados[0]['descricaoSala']?></p>
			<p><b>Data:</b> <?php 
			$dataInicio = new \DateTime($dados[0]['data_inicio']);
			echo $dataInicio->format('d/m/Y');
			?></p>
			<p><b>Hora de Início:</b> <?php echo $dataInicio->format('H:i:s')?></p>
			<p><b>Hora de termíno:</b> <?php
			$dataFinal = new \DateTime($dados[0]['data_fim']);
			echo $dataFinal->format('H:i:s');
			?></p>
			<p>
				<a href="/gerenciamento/subeventos/index/evento/<?php echo $idCircuito;?>" class="btn btn-primary">
					<i class="glyphicon glyphicon-flag"></i> Voltar para Sub Eventos
				</a>
				<a href="/gerenciamento/subeventos/alocar/id/<?php echo $dados[0]['evento_id'];?>/evento/<?php 
				echo $dados[0]['idcircuito'];?>/idalocamento/<?php echo $dados[0]['id']?>" 
				class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> Editar?</a>
				<a href="/gerenciamento/subeventos/apagaralocamento/id/<?php echo $dados[0]['id']?>/evento/<?php echo $idCircuito;?>" 
				class="btn btn-danger btnapagar"><i class="glyphicon glyphicon-trash"></i> Apagar</a>
			</p>
		</div><!-- fim row -->
<?php
	endif;
	?>
</div>
<script type="text/javascript">
$(document).ready(function() {
	var step = 0;
	var next = false;
	$('.pager').on("click", ".next", function(event){
        event.preventDefault();

        if (step == 2){
        	data_inicio = $("input[name='data_inicio']").val();
        	data_inicio = data_inicio.split("/");
    		data_inicio = data_inicio[2] + "/" + data_inicio[1] + "/" + data_inicio[0];

    		horario_inicio = $("input[name='hora_inicio']").val();
    		horario_final =  $("input[name='hora_final']").val();
        	data_horario_inicio = data_inicio + " " + $("input[name='hora_inicio']").val();
        	data_horario_final = data_inicio + " " + $("input[name='hora_final']").val();
        	// console.log(horario_inicio + " - " + horario_final);
        	   			
        	data_horario_inicio = new Date(data_horario_inicio).getTime();
        	data_horario_final = new Date(data_horario_final).getTime();
        	// console.log("hora_inicio: " + horario_inicio + " hora_final: " + horario_final);
        	if (data_horario_inicio > data_horario_final){
        		alert('Hora de início nao pode ser maior que hora final');
        	} else if (data_horario_inicio == data_horario_final) {
        		alert('Hora de Início não pode ser igual a hora final');
        	} else if (data_inicio == ""){
        		alert("É preciso escolher uma data");
        	} else {
        		// alert('HORA INICIO ' + horario_inicio + " HORA FINAL " + horario_final);
        		// alert("ID DA SALA: " + sala);
        		// alert("DATA ESCOLHIDA: " + data_inicio);
        		data_inicio = $("input[name='data_inicio']").val();
	        	data_inicio = data_inicio.split("/");
	    		data_inicio = data_inicio[2] + "-" + data_inicio[1] + "-" + data_inicio[0];
        		$.ajax({
	                type : "GET",	                
	                dataType : "json",
	                <?php
	                if ($idalocamento > 0){
	                
	                	echo "url : '/gerenciamento/subeventos/checkhora/data/' + data_inicio 
	                + '/horainicio/' + horario_inicio + '/horafinal/' + horario_final + '/sala/' + sala 
	                + '/idevento/'+ $(\"input[name='eventoId']\").val() + '/idalocamento/{$idalocamento}',";
	                
	                } else {
	                
	                	echo "url : '/gerenciamento/subeventos/checkhora/data/' + data_inicio 
	                + '/horainicio/' + horario_inicio + '/horafinal/' + horario_final + '/sala/' + sala 
	                + '/idevento/'+ $(\"input[name='eventoId']\").val(),";
	                
	                }
	                ?>	                
	                success : function(result){
	                	// alert(result.length);
	                	if (result.qtd > 0){
	                		alert("Horario já reservado, escolha outro");
	                	} else {
	                		$(".progress-bar" ).attr( "style", "width: 100%" );
        					$(".progress-bar").html("100% Completo");
	                		alert("Evento agendado!");
	                		window.location = "/gerenciamento/subeventos/index/evento/" 
	                		+ <?php echo $idCircuito;?>;
	                	}
	                	// alert(result.qtd);
	                },
	                // beforeSend : function(){
	                    
	                // }, 
	                complete : function(msg){                    
	                    
	                } 
	            })
        	}
        	
        }

        if (step == 1){
        	sala = $(".sala").val();
        	if (sala == ""){
        		alert("Por favor escolha uma sala, para continuar");
        	} else {
        		$("#hora").show();
        		$(".progress-bar" ).attr( "style", "width: 66%" );
        		$(".progress-bar").html("66% Completo");
        		step++;
        	}        	        	
        }        

        if (step == 0){
        	//passo inicial, verificar se campi foi selecionado
        	campi = $(".campi").val();
        	if (campi == ""){
        		alert("Por favor selecione um campi, para continuar");
        	} else {
        		$("#campi").hide();        		
        		$( ".previous" ).removeClass( "disabled" );
        		//$(".progress-bar")
        		$(".progress-bar" ).attr( "style", "width: 33%" );
        		$(".progress-bar").html("33% Completo");
        		step++;
        		$("#salas").show();
        		//campi foi selecionado, esconder div#campi, incrementar o step
        		//mostrar div#sala, exibindo as salas de acordo com o campi escolhido no passo anterior 
        		$.ajax({
	                type : "GET",
	                // data : { id:campi },
	                dataType : "json",
	                url : '/gerenciamento/subeventos/salas/campi/' + campi,
	                success : function(result){
	                	// alert(result.length);
	                	var html = "<option value=''> Selecione uma sala </option>";
	                   	for(var k in result) {
						   // console.log(k, result[k]);
						   // console.log(result[k].descricao);
						   html += "<option value='" + result[k].id + "'>" + result[k].descricao +  "</option>";
						}
						$(".sala").html(html);
	                },
	                // beforeSend : function(){
	                    
	                // }, 
	                // complete : function(msg){                    
	                    
	                // } 
	            })       		
        	}        	
        } 
        // console.log("STEP: " + step);

    });

    $('.pager').on("click", ".previous", function(event){
    	event.preventDefault();

    	if (step == 1){
    		$("#campi").show();
    		$("#salas").hide();
    		$(".previous").addClass('disabled');
    		$(".progress-bar" ).attr( "style", "width: 0%" );
    		$(".progress-bar").html("0% Completo");
    		step--;
    	}    

    	if (step == 2){
    		$("#hora").hide();
    		$(".progress-bar" ).attr( "style", "width: 33%" );
    		$(".progress-bar").html("33% Completo");
    		step--;
    	}
    	// console.log("STEP: " + step);
    });

 	$('#timepicker1').timepicker({
 		// minuteStep: 1,
	    // template: 'modal',
	    // appendWidgetTo: 'body',
        // showSeconds: true,
        showMeridian: false,
        // defaultTime: false
 	});
 	$('#timepicker2').timepicker({
 		// minuteStep: 1,
 		showMeridian: false,
 	});
 	

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


  	$('.edit').on("click", ".btnapagar", function(event){
            event.preventDefault();
            url = $(this).attr('href');            
            var r = confirm("Tem certeza que deseja remover o registro?");
            if (r){            	
            	window.location.href = url;
            } 
        });

});
</script>	