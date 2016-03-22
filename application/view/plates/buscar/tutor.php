<?php $this->layout('layout-dos') ?>

<div class="container">
    
  
	<?php foreach($tutores as $value): ?>

		<?php if ($value->dniTutor == $_POST['idTutor']) : ?>
		   <ul> 
		   		<li> 
		   				Nombre del Tutor: <strong>  
		   											<?php echo $value->nombreTutor ?> 
		   											<?php echo $value->apellidosTutor ?>
		   								  </strong>  
		   			<ul>	

		   					<li> DNI : <?php echo $value->dniTutor ?>  </li>	   					
		   					<li> Direccion : <?php echo $value->domicilioTutor ?>  </li>
		   					<li> Telefono: +34 <?php echo $value->telefonoTutor ?>  </li>   					
		   			</ul> 
		   		</li>

		   </ul>

		<?php endif ?>

	<?php endforeach ?>

	
</div>