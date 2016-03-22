<?php $this->layout('layout-dos') ?>

<div class="container">
    
    <h2>Login Correcto</h2>
    <p>Bienvenid@ al sistema, <?= Session::get('nombreTutor') ?> <?= Session::get('apellidosTutor') ?></p>
	</br>

	<?php foreach($tutores as $value): ?>
			
		<?php if($privado == $value->dniTutor): ?>

				<h3> SUS DATOS: <?php Login::espacio(46); ?>

				</h3> 
					<ul>
						<li>NOMBRE:  <?php echo $value->nombreTutor; ?> </li>
						<li>APELLIDOS:  <?php echo $value->apellidosTutor; ?> </li>
						<li>DNI:  <?php echo $value->dniTutor; ?> </li>
						<li>DOMICILIO:  <?php echo $value->domicilioTutor; ?> </li>
						<li>TELÉFONO:  <?php echo $value->telefonoTutor; ?> </li>	
					</ul> <br>

		<?php endif ?>

	<?php endforeach ?>

	<?php foreach($tutores as $value): ?>

		<?php if($privado == $value->dniTutor): ?>

			<?php foreach($alumnos as $key): ?>

					<?php if($value->idAlumno == $key->idAlumno): ?>

						<h3> DATOS DEL ALUMNO: <?php Login::espacio(27); ?>

						</h3> 
							<ul>
								<li>NOMBRE:  <?php echo $key->nombreAlumno; ?> </li>
								<li>APELLIDOS:  <?php echo $key->apellidosAlumno; ?> </li>
								<li>FECHA NACIMIENTO:  <?php echo $key->fechaNac; ?> </li>
								<li>CURSO:  <?php echo $key->curso; ?> </li>

								<?php if (!empty($key->observaciones)): ?>

									<li>OBSERVACIONES:  <?php echo $key->observaciones; ?> </li>

								<?php endif ?>

					<?php endif ?>

			<?php endforeach ?>

		<?php endif ?>

	<?php endforeach ?>


</div>