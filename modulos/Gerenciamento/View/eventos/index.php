<script type="text/javascript">
	$(document).ready(function() {
		$('.dados').on("click", ".btnapagar", function(event){
            event.preventDefault();
            url = $(this).attr('href');            
            var r = confirm("Tem certeza que deseja remover o registro?");
            if (r){            	
            	window.location.href = url;
            } 
        });
        $( "#busca" ).submit(function( event ) {            
            event.preventDefault();            
            var query = $("input[name=q]").val();
            $.ajax({
                type : "POST",
                data : { q:query },
                url : $(this).attr('action'),
                success : function(result){
                    $(".dados").html(result);
                },
                beforeSend : function(){
                    $(".dados").html('');
                    $(".dados").hide();
                    $(".loading").show();
                }, 
                complete : function(msg){                    
                    $(".loading").hide();
                    $(".dados").show();                    
                } 
            })
        });
        
	});
</script>

<div class="container">
	<ol class="breadcrumb">
  		<li><a href="/">Ínicio</a></li>
  		<li><a href="/gerenciamento/index/index">Gerenciamento</a></li>  		
  		<li class="active">Eventos</li>
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
		<h1>Eventos <small>do circuito</small></h1>
	</div>	
	<div class="row">
		<div class="col-xs-12 col-md-9 col-sm-6">			
			<a href="/gerenciamento/eventos/save" class="btn btn-primary">
				<strong><i class="glyphicon glyphicon-plus"></i> Novo Evento</strong>
			</a>
		</div>
		<div class="col-xs-12 col-md-3 col-sm-6">
			<form id="busca" action="/gerenciamento/eventos/busca" role="form" class="form-inline" method="post">
				<input type="text" class="form-control" placeholder="Pesquisar" name="q">
			</form>		
		</div>
		<hr class="clean">
	</div>
	<div class="row-fluid">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="col-sm-5">NOME</th>
					<th class="col-sm-2">DATA</th>
					<th class="col-sm-1">STATUS</th>
					<th class="col-sm-4">AÇÕES</th>
				</tr>
				
			</thead>
			<tbody class="dados">
				<?php
				foreach ($dados as $dado):
				?>
					<tr>
						<td>
							<?php
							echo $dado->toArray()['nome'];
							?>
						</td>
						<td>
							<?php
							$dataInicio = new \DateTime($dado->toArray()['data_inicio']);
							$dataInicio = $dataInicio->format('d/m/Y');
							echo $dataInicio; 
							if ($dado->toArray()['data_final']){
								$dataFinal = new \DateTime($dado->toArray()['data_final']);
								$dataFinal = $dataFinal->format('d/m/Y');
								echo " à " . $dataFinal;
							}
							?>							
						</td>
						<td>
							<?php
							switch ($dado->toArray()['status']) {
								case 'ativo':
									echo '<span class="label label-primary">Ativo</span>';
									break;
								case 'finalizado':
									echo '<span class="label label-success">Finalizado</span>';
									break;
								case 'cancelado':
									echo '<span class="label label-danger">Cancelado</span>';
									break;								
							}							
							?>
						</td>
						<td class="text-center">
							<a href="/gerenciamento/subeventos/index/evento/<?php echo $dado->toArray()['id'];?>" 
							class="btn btn-primary">
								<i class="glyphicon glyphicon-flag"></i> Sub Eventos
							</a>						
							<a href="/gerenciamento/eventos/save/id/<?php
							echo $dado->toArray()['id'];
							?>" 
							class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> Editar</a>
							<a href="/gerenciamento/eventos/apagar/id/<?php 
							echo $dado->toArray()['id'];?>" 
							class="btn btn-danger btnapagar"><i class="glyphicon glyphicon-trash"></i> Apagar</a>
						</td>
					</tr>
				<?php
				endforeach;
				?>
			</tbody>
		</table>
	</div>
	<div class="row-fluid">
		<div class="col-sm-12 text-center">
			<ul class="pagination ">
			  	<li><a href="#">&laquo;</a></li>
			  	<li><a href="#">1</a></li>
			  	<li><a href="#">2</a></li>
			  	<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#">&raquo;</a></li>
			</ul>
		</div>		
	</div>
</div>	