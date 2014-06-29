<?php
foreach ($dados as $dado):
	foreach ($dado as $key => $value):
	// var_dump($value);	
?>
	<tr>
		<td>
			<?php
			echo $value['nome'];
			?>
		</td>
		<td>
			<?php
			$dataInicio = date("d-m-Y H:i:s", strtotime($value['data_inicio']));			
			$dataInicio = new \DateTime($dataInicio);
			echo $dataInicio->format('d/m/Y');
			if ($value['data_final']){
				$dataFinal = date("d-m-Y H:i:s", strtotime($value['data_final']));
				$dataFinal = new \DateTime($dataFinal);
				$dataFinal = $dataFinal->format('d/m/Y');
				echo " à " . $dataFinal;
			}
			?>							
		</td>
		<td>
			<?php
			switch ($value['status']) {
				case 'ativo':
					echo '<span class="label label-primary">Ativo</span>';
					break;
				case 'finalizado':
					echo '<span class="label label-success">Finalizado</span>';
					break;
				case 'cancelado':
					echo '<span class="label label-danger">Cancelado</span>';
					break;								
			}							
			?>
		</td>
		<td class="text-center">						
			<a href="/gerenciamento/eventos/save/id/<?php
			echo $value['id'];
			?>" 
			class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> Editar</a>
			<a href="/gerenciamento/eventos/apagar/id/<?php 
			echo $value['id'];?>" 
			class="btn btn-danger btnapagar"><i class="glyphicon glyphicon-trash"></i> Apagar</a>
		</td>
	</tr>
<?php
	endforeach;
endforeach;
?>