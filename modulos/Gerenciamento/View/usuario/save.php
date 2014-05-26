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
				?>			
					<div class="alert alert-<?php
					if ($key == 'error') {
						echo 'danger';
					}
					if ($key == 'warning') {
						echo 'warning';
					}
					if ($key == 'info'){
						echo 'info';
					}
					if ($key == 'success'){
						echo 'success';
					}
					?>"><?php echo $value;?></div>
				<?php
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
				<div class="form-group">
					<label for="nome" class="col-xs-12 col-sm-3 col-md-2 control-label">Nome <small>*</small></label>
					<div class="col-xs-12 col-sm-9 col-md-4">						
						<input type="text" name="nome" class="form-control" id="nome" placeholder="Nome do local" required autofocus>						
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="col-xs-12 col-md-2 col-sm-3 control-label">E-mail <small>*</small></label>
					<div class="col-xs-12 col-md-4 col-sm-9">
						<input type="email" name="email" class="form-control" id="email" placeholder="Digite o e-mail" required>
					</div>
				</div>
				<div class="form-group">
					<label for="senha" class="col-xs-12 col-md-2 col-sm-3 control-label">Senha <small>*</small></label>
					<div class="col-xs-12 col-md-4 col-sm-9">
						<input type="password" class="form-control" id="senha" name="senha" placeholder="Digite uma senha" required>
					</div>
				</div>
				<div class="form-group">
					<label for="repetirsenha" class="col-xs-12 col-md-2 col-sm-3 control-label">Repetir Senha <small>*</small></label>
					<div class="col-xs-12 col-md-4 col-sm-9">
						<input type="password" class="form-control" id="repetirsenha" name="repetirsenha" placeholder="Repita a senha" required>
					</div>
				</div>
				<div class="form-group">
  					<label for="telefone" class="col-xs-12 col-md-2 col-sm-3 control-label">Telefone</label>
  					<div class="col-xs-7 col-md-3 col-sm-4">
  						<input type="tel" class="form-control" id="telefone" placeholder="Digite o telefone" name="telefone">
  					</div>
  				</div>
  				<div class="form-group">
    				<label for="matricula" class="col-xs-12 col-sm-3 col-md-2 control-label">Tipo de usuário</label>
    				<div class="col-xs-12 col-sm-9 col-md-3">
    					<select name="perfil" id="perfil" class="form-control">
    						<option value="1">Admin</option>
    						<option value="2">Ouvinte</option>
    						<option value="3">Palestrante</option>
    						<option value="4">Coordenador</option>
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