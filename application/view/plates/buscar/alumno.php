<?php $this->layout('layout-dos') ?>

<div class="container">
    
  
	<?php foreach($alumnos as $value): ?>

		<?php if ($value->idAlumno == $_POST['idAlumno']) : ?>

           <ul>
                <li> NOMBRE: 
                    <strong> 
                        <?php
                            echo $value->nombreAlumno; echo ' ';                            
                            echo $value->apellidosAlumno; 
                        ?> 
                    </strong> &nbsp;&nbsp;&nbsp; # &nbsp;&nbsp;&nbsp;

                    ACTIVIDAD: 
                    <strong>
                        <?php 
                            foreach ($actividades  as $key) {

                                if($value->idAlumno == $key->idActividad) {
                                    echo $key->nombreActividad;
                                }
                            }                                 
                        ?> 
                    </strong>                                       
                </li>

                    <ul>                            
                        <li> Fecha Nacimiento: <?php echo $value->fechaNac ?></li>

                        <li> Curso: <?php echo $value->curso ?>  </li>
                                    
                            <?php if (!empty($value->observaciones)): ?>

                        <li> Observaciones: <?php echo $value->observaciones ?>  </li>

                            <?php endif ?>

                    </ul> 

                </li>
           </ul>
           
		<?php endif ?>

        <?php endforeach ?>

	
</div>