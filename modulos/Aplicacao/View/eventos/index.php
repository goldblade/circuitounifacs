<div class="container">
	<ol class="breadcrumb">
  		<li><a href="/aplicacao/index/index">Ínicio</a></li>  		
  		<li class="active">Eventos</li>
	</ol>
	<div class="page-header">
		<h1>Eventos <small>Programação para o dia <?php echo $data ?></small></h1>
	</div>
	<div class="row">
		<div id="calendar" class="col-md-5"></div>
		<div id="programacao" class="col-md-7 table-responsive">
			<form method="get" action="/aplicacao/eventos/save">
				<table class="table table-striped">
					<thead>
						<tr>
							<th width="30%">Horários</th>
							<th>Eventos</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td rowspan="3">19:00 às 20:15</td>
							<td>
								<div class="input-group">
									<span class="input-group-addon">
										<input type="radio" name="palestra" />
									</span>
									<label class="form-control">Palestra MVC</label>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="input-group">
									<span class="input-group-addon">
										<input type="radio" name="palestra"/>
									</span>
									<label class="form-control">Palestra Android</label>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<button type="submit" class="btn btn-dafault">Enviar</button>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</div>
</div>
