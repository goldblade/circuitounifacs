<div class="container">
	
	<ol class="breadcrumb">
  		<li><a href="/">Ínicio</a></li>
  		<li><a href="/gerenciamento/index/index/usuario/1">Gerenciamento</a></li>
  		<li><a href="/gerenciamento/usuario/index/usuario/1">Usuários</a></li>
  		<li class="active">Novo usuário</li>
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
		<h1>Novo usuário <small>do sistema</small></h1>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-offset-2">
			<p>Campos com * são de preenchimento obrigatórios</p>
		</div>
		<div class="col-xs-12 col-md-12 col-sm-12">			
			<form class="form-horizontal" role="form" action="/gerenciamento/usuario/save" method="post">
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
					<label for="email" class="col-xs-12 col-md-2 col-sm-3 control-label">E-mail <small>*</small></label>
					<div class="col-xs-12 col-md-4 col-sm-9">
						<input type="email" name="email" class="form-control" id="email" 
						placeholder="Digite o e-mail" required value="<?php
						if (isset($_SESSION['email'])){
							echo $_SESSION['email'];
							unset($_SESSION['email']);
						} else {
							if ($dados) {
								echo $dados->toArray()['email'];
							}
						}
						?>">
					</div>
				</div>
				<div class="form-group">
					<label for="senha" class="col-xs-12 col-md-2 col-sm-3 control-label">Senha <small>*</small></label>
					<div class="col-xs-12 col-md-4 col-sm-9">
						<input type="password" class="form-control" id="senha" name="senha" 
						placeholder="Digite uma senha" required>
					</div>
				</div>
				<div class="form-group">
					<label for="repetirsenha" class="col-xs-12 col-md-2 col-sm-3 
					control-label">Repetir Senha <small>*</small></label>
					<div class="col-xs-12 col-md-4 col-sm-9">
						<input type="password" class="form-control" id="repetirsenha" 
						name="repetirsenha" placeholder="Repita a senha" required>
					</div>
				</div>
				<div class="form-group">
  					<label for="telefone" class="col-xs-12 col-md-2 col-sm-3 control-label">Telefone</label>
  					<div class="col-xs-7 col-md-3 col-sm-4">
  						<input type="tel" class="form-control" id="telefone" placeholder="Digite o telefone" 
  						name="telefone" value="<?php
  						if (isset($_SESSION['telefone'])){
  							echo $_SESSION['telefone'];
  							unset($_SESSION['telefone']);
  						} else {
  							if ($dados){
  								echo $dados->toArray()['telefone'];
  							}
  						}
  						?>">
  					</div>
  				</div>
  				<div class="form-group">
    				<label for="matricula" class="col-xs-12 col-sm-3 col-md-2 control-label">Tipo de usuário</label>
    				<div class="col-xs-12 col-sm-9 col-md-3">    				
    					<select name="perfil" id="perfil" class="form-control">
    						<?php
    						$perfil = array(
    							1 => 'Admin',
    							2 => 'Ouvinte',
    							3 => 'Palestrante',
    							4 => 'Coordenador'
    						);    						
    						foreach ($perfil as $key => $value):
    						?>
    							<option value="<?php echo $key?>" <?php
    							if (isset($_SESSION['perfil'])){    								
    								if ($_SESSION['perfil'] == $key){
    									echo "selected=selected"; 
    								}
    								unset($_SESSION['perfil']);
    							} else {
    								if ($dados){    									
    									if ($dados->toArray()['perfil'] == $key){    										
    										echo "selected=selected";
    									}
    								}
    							}
    							?>><?php echo $value?></option>
    						<?php
    						endforeach;
    						?>
    						<!-- <option value="2">Ouvinte</option>
    						<option value="3">Palestrante</option>
    						<option value="4">Coordenador</option> -->
    					</select>
	    				<!-- <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Digite sua matrícula"> -->
	    				
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