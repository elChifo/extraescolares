<?php $this->layout('layout-dos') ?>

<div class="container">
    
  
	<?php foreach($actividades as $value): ?>

		<?php if ($value->idActividad == $_POST['idActividad']) : ?>
			
		   <ul>
		   		<li> ACTIVIDAD: 
		   			<strong> 
		   				<?php echo $value->nombreActividad ?> 
		   			</strong>  &nbsp;&nbsp;&nbsp; # &nbsp;&nbsp;&nbsp;

		   			CENTRO: 
		   			<strong> 
					   	<?php 
				        	foreach($centros as $key) {

				        		if($value->idCentro == $key->idCentro) { 

									echo $key->nombreCentro;
								}
							}
						?>         			
					</strong>					
		   			<ul>		   					
		   					<li> Descripción: <?php echo $value->descripcion ?>  </li>
		   					<li> Monitor: <?php echo $value->monitor ?>  </li>
		   			</ul> 
		   		</li>
		   </ul>

		<?php endif ?>
		
		<?php endforeach ?>

	
</div>