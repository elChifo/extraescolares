<?php $this->layout('layout-dos') ?>

<div class="container">
    
    <h2>LOGIN CORRECTO</h2>
    <p>
    	Bienvenido a la Página de Administración, 
    	<?= Session::get('nombreTutor') ?> <?= Session::get('apellidosTutor') ?>
    </p>
	<p>
    <a href="/centros/insertar"><h3>Registrar Un Centro</h3></a>

    <a href="/actividades/insertar"><h3>Registrar Una Actividad</h3></a>
	</p>

	<p>
    <a href="/centros/privado"><h3>Editar Un Centro</h3></a>

    <a href="/actividades/privado"><h3>Editar Una Actividad</h3></a>
	</p>

</div>