<!--pre>
	<?php print_r($dados); ?>
</pre-->
<?php
foreach ($dados as $dado) {
	foreach ($dado as $row) {
	?>
	<tr>
		<td><?php echo $row['nome'] ?></td>
		<td><?php echo $row['endereco'] ?></td>
		<td><?php echo $row['telefone'] ?></td>					
		<td class="text-center">
			<a href="/gerenciamento/salas/index/campi/<?php echo $row['id'] ?>" class="btn btn-info"><i class="glyphicon glyphicon-home"></i> Salas</a>
			<a href="/gerenciamento/locais/save/id/<?php echo $row['id'] ?>" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> Editar</a>
			<a href="/gerenciamento/locais/apagar/id/<?php echo $row['id'] ?>" class="btn btn-danger btnapagar"><i class="glyphicon glyphicon-trash"></i> Apagar</a>
		</td>
	</tr>
	<?php
	}	
}
?>