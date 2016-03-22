<?php $this->layout('layout') ?>

<div class="container">
   
    <a href="/alumnos/insertar"><h2>Registrar Un Alumno</h2></a><br>

    <?php if(count($alumnos) == 0): ?>

        <p>No se encuentran Alumnos en la Base de Datos</p>

    <?php else: ?>
        
        <h2>Disponemos de <?= count($alumnos) ?> Alumnos inscritos en la Base de Datos.</h2> 

         <?php foreach($alumnos as $value): ?>
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
                        <li> Edad : <?php 

                            $año = substr($value->fechaNac, 0, 4);

                            $edad = ($fecha['year'])-($value->fechaNac);
                                        
                            echo $edad ?> años 
                        </li>

                        <li> Curso: <?php echo $value->curso ?>  </li>
                                    
                            <?php if (!empty($value->observaciones)): ?>

                        <li> Observaciones: <?php echo $value->observaciones ?>  </li>

                            <?php endif ?>

                    </ul> 

                </li>
           </ul>

        <?php endforeach ?> 

    <?php endif ?>

</div>
