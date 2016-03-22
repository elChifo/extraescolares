<?php $this->layout('layout-dos') ?>

<div class="container">
    <?php $this->insert('partials/feedback') ?>
   
    <h2>INSCRIPCIÓN DE LOS ALUMNOS</h2>


    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">

        <fieldset>
            <legend>
                <h2> Datos del Alumno </h2>
            </legend> 
        
            <input type="hidden" name="idAlumno" value="<?= $datos['idAlumno'] ?>">

            <p>
            <label for="nombreAlumno">Nombre</label>
            <input type="text" name="nombreAlumno" 
                    value="<?= (isset($datos['nombreAlumno'])) ? $datos['nombreAlumno'] : "" ?>">
            </p>

            <p>
            <label for="apellidosAlumno">Apellidos</label>
            <input type="text" name="apellidosAlumno" 
                    value="<?= (isset($datos['apellidosAlumno'])) ? $datos['apellidosAlumno'] : "" ?>">
            </p>

            <p>
            <label for="fechaNac">Fecha Nacimiento</label>
            <input type="date" name="fechaNac" 
                    value="<?= (isset($datos['fechaNac'])) ? $datos['fechaNac'] : "" ?>">
            </p>

            <p>
            <label for="curso">Curso</label>
            <input type="text" name="curso" 
                    value="<?= (isset($datos['curso'])) ? $datos['curso'] : "" ?>">
            </p>

            <p>
            <label for="observaciones">Observaciones</label>
            <input type="text" name="observaciones" 
                    value="<?= (isset($datos['observaciones'])) ? $datos['observaciones'] : "" ?>">
            </p>

            <p>
            <label for="idActividad">Actividad a Realizar</label>
            <select name="idActividad">
                    
                <?php foreach($actividades as $value): ?>

                    <option value="<?php echo $value->idActividad ?>">
                            <?php echo $value->nombreActividad ?>
                    </option>

                <?php endforeach ?>

            </select> 
            </p> 

            <p>
                <input type="submit" value="Enviar">
            </p>      

        </fieldset> 

    </form>

</div>