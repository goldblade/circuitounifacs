<!--pre>
	<?php print_r($dados); ?>
</pre-->
<?php
foreach ($dados as $dado) {
	foreach ($dado as $row) {
	?>
	<tr>
		<td><?php echo $row['descricao'] ?></td>
		<td><?php echo $row['capacidade_maxima'] ?></td>
		<td><?php echo $row['nome'] ?></td>
		<td class="text-center">
			<a href="/gerenciamento/salas/save/campi/<?php echo $row['campi_id']; ?>/id/<?php echo $row['id'] ?>" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> Editar</a>
			<a href="/gerenciamento/salas/apagar/campi/<?php echo $row['campi_id']; ?>/id/<?php echo $row['id'] ?>" class="btn btn-danger btnapagar"><i class="glyphicon glyphicon-trash"></i> Apagar</a>
		</td>
	</tr>
	<?php
	}	
}
?>
