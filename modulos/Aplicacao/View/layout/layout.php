<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title><?php echo $this->titulo;?></title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="/assets/css/bootstrap-theme.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<link rel="stylesheet" href="/assets/css/style.css">
	<script src="/assets/js/jquery-2.1.0.min.js"></script>
	<script src="/assets/js/bootstrap.min.js"></script>

</head>
<body>	
	<header>
		<nav class="navbar navbar-default" role="navigation">
			<div class="container container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
						<span class="icon-bar"></span>
			    	</button>
			    	<a class="navbar-brand" href="/">
			    		<img src="/assets/img/brandcircuitounifacs.png" alt="logo circuito unifacs">
			    	</a>
				</div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			    	<ul class="nav navbar-nav">
			    		<li><a href="/">Ínicio</a></li>
						<li class="active"><a href="#">Eventos</a></li>
						<li><a href="#">Locais</a></li>
						<li><a href="#">Inscritos</a></li>
						<li><a href="#">Usuários</a></li>
				        <!-- <li><a href="#">Link</a></li>
				        <li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
				        	<ul class="dropdown-menu">
					        	<li><a href="#">Action</a></li>
					            <li><a href="#">Another action</a></li>
					            <li><a href="#">Something else here</a></li>
					            <li class="divider"></li>
					            <li><a href="#">Separated link</a></li>
					            <li class="divider"></li>
					            <li><a href="#">One more separated link</a></li>
					        </ul>
				    	</li> -->
				    </ul>
				    <!-- <form class="navbar-form navbar-left" role="search">
				    	<div class="form-group">
				          <input type="text" class="form-control" placeholder="Search">
				        </div>
				        <button type="submit" class="btn btn-default">Submit</button>
					</form> -->
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	</header>
	<section>
		<?php echo $this->conteudo;?>
	</section>
	<footer class="img-rounded">
		<div class="container">			
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-4">
					<img src="/assets/img/unifacslogorodape.png" class="img-responsive" alt="Logo unifacs rodapé">					
				</div>
				<div class="col-xs-12 col-sm-6 col-md-8">
					<p>
						Endereço: Rua X da Esquina Y	
					</p>					
					<p>
						Telefone: (11) 2222-2222, 1122-3333
					</p>
				</div>
				<!-- <div class="clearfix visible-xs"></div> -->
			</div>
			
		</div>
	</footer>
</body>
</html>