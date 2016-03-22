<?php $this->layout('layout') ?>

<div class="container">

    <?php if(count($actividades) == 0): ?>

        <p>No se encuentran Actividades en la Base de Datos</p>

    <?php else: ?>

        <h2>Disponemos de <?= count($actividades) ?> Actividades Extraescolares en los centros de la ciudad.</h2>  

		<?php foreach($actividades as $value): ?>
			
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
		
		<?php endforeach ?>
    <?php endif ?>
</div>

