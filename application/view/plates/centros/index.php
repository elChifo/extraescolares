<?php $this->layout('layout') ?>

<div class="container">

	<?php if(count($centros) == 0): ?>

        <p>No se encuentran Centros en la Base de Datos</p>

    <?php else: ?>
		   	
        <h2>Disponemos de <?= count($centros) ?> centros en la ciudad.</h2>       

		<?php foreach($centros as $value): ?>
		   <ul> 
		   		<li> 
		   				Nombre Centro: <strong> <?php echo $value->nombreCentro ?> </strong>  
		   			<ul>		   					
		   					<li> Direccion : <?php echo $value->domicilioCentro ?>  </li>
		   					<li> Telefono: +34 <?php echo $value->telefonoCentro ?>  </li>
		   					<li> Contacto: <?php echo $value->contactoCentro ?>  </li>		   					
		   			</ul> 
		   		</li>

		   </ul>
		   
		<?php endforeach ?>
    <?php endif ?>
</div>
