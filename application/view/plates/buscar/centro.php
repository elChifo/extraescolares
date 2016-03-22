<?php $this->layout('layout-dos') ?>

<div class="container">
    
  
	<?php foreach($centros as $value): ?>

		<?php if ($value->idCentro == $_POST['idCentro']) : ?>
		   <ul> 
		   		<li> 
		   				NOMBRE CENTRO: <strong> <?php echo $value->nombreCentro ?> </strong>  
		   			<ul>		   					
		   					<li> Direccion : <?php echo $value->domicilioCentro ?>  </li>
		   					<li> Telefono: +34 <?php echo $value->telefonoCentro ?>  </li>
		   					<li> Contacto: <?php echo $value->contactoCentro ?>  </li>		   					
		   			</ul> 
		   		</li>

		   </ul>

		<?php endif ?>

	<?php endforeach ?>

	
</div>