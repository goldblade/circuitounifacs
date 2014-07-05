<div class="container">
	<ol class="breadcrumb">
  		<li><a href="/">Ínicio</a></li>
  		<li><a href="/gerenciamento/index/index">Gerenciamento</a></li>  		
  		<li><a href="/gerenciamento/index/index">Eventos</a></li> 
  		<li><a href="/gerenciamento/index/index">Sub Eventos</a></li> 
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
	<div class="row-fluid">
		
	</div>	
</div>	