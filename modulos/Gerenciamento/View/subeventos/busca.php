<?php
foreach ($dados['dados'] as $dado):	
	// foreach ($dado as $key => $value):	
?>
	<tr>
		<td>
			<?php
			echo $dado['nome'];
			?>
		</td>	
		<td>
			<?php
			echo $dado['detalhes'];
			?>
		</td>
		<td>
			<?php
			echo $dado['cargahoraria'];
			?>
		</td>					
		<td class="text-center">							
			<a href="/gerenciamento/subeventos/save/id/<?php
			echo $dado['id'];
			?>/evento/<?php echo $dado['edicaoCircuito_id'];?>" 
			class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> Editar</a>
			<a href="/gerenciamento/subeventos/apagar/id/<?php 
			echo $dado['id'];?>/evento/<?php echo $dado['edicaoCircuito_id'];?>" 
			class="btn btn-danger btnapagar"><i class="glyphicon glyphicon-trash"></i> Apagar</a>
		</td>
	</tr>
<?php
	// endforeach;
endforeach;
?>