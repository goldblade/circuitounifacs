<?php
$i = 0;
foreach ($dados as $key => $dado):
?>
	<tr>
		<td>
			<?php
			// var_dump($dado[0]['nome']);
			echo $dado[$i]['nome'];
			?>
		</td>
		<td class="text-center">						
			<a href="/gerenciamento/usuario/save/id/<?php
			echo $dado[$i]['id'];
			?>" 
			class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> Editar</a>
			<a href="/gerenciamento/usuario/apagar/id/<?php 
			echo $dado[$i]['id'];?>" 
			class="btn btn-danger btnapagar"><i class="glyphicon glyphicon-trash"></i> Apagar</a>
		</td>
	</tr>
<?php
	$i++;
endforeach;
?>