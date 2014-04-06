<style type="text/css">
.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
<div class="container">	
    <div class="page-header">
        <h1>Login <small>do sistema</small></h1>
    </div>
	<form class="form-signin" role="form" method="post" action="/gerenciamento/index/index/admin/1">
  <!-- <form class="form-signin" role="form" method="post" action="/auth/login"> -->
        <!-- <h2 class="form-signin-heading">Digite as credenciais</h2> -->
        <input type="email" class="form-control" placeholder="Seu Email" required autofocus>
        <input type="password" class="form-control" placeholder="Sua Senha" required>        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Logar</button>
        <a href="/usuario/cadastro" class="btn btn-lg btn-primary btn-block cadastro">Registre-se</a>        
    </form>
</div>