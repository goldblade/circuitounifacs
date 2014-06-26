<?php
foreach ($dados as $key => $dado):
	foreach ($dado as $key2 => $value2):
?>
	<tr>
		<td>
			<?php
			// var_dump($dado[0]['nome']);
			// echo $dado[$i]['nome'];
			echo $value2['nome'];
			?>
		</td>
		<td class="text-center">						
			<a href="/gerenciamento/usuario/save/id/<?php
			echo $value2['id'];
			?>" 
			class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> Editar</a>
			<a href="/gerenciamento/usuario/apagar/id/<?php 
			echo $value2['id'];?>" 
			class="btn btn-danger btnapagar"><i class="glyphicon glyphicon-trash"></i> Apagar</a>
		</td>
	</tr>
<?php
	endforeach;
endforeach;
?>