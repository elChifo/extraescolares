<?php $this->layout('layout') ?>

<div class="container">
    <?php $this->insert('partials/feedback') ?>

<h2>INSCRIPCIÓN DE PADRES O TUTORES</h2>
   
    <form  action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
        <fieldset> 
            <legend>
                <h2> Datos del Padre, Madre o Tutor legal </h2> 
            </legend>                   
              

            <p>
            <label for="nombreTutor">Nombre </label>
            <input type="text" name="nombreTutor" 
                    value="<?= (isset($datos['nombreTutor'])) ? $datos['nombreTutor'] : "" ?>">
            </p>

            <p>
            <label for="apellidosTutor">Apellidos</label>
            <input type="text" name="apellidosTutor" 
                    value="<?= (isset($datos['apellidosTutor'])) ? $datos['apellidosTutor'] : "" ?>">
            </p>

            <p>
            <label for="dniTutor">DNI</label>
            <input type="text" name="dniTutor" 
                    value="<?= (isset($datos['dniTutor'])) ? $datos['dniTutor'] : "" ?>">
            </p>

            <p>
            <label for="passLogin">Contraseña Login</label>
            <input type="password" name="passLogin" 
                    value="<?= (isset($datos['passLogin'])) ? $datos['passLogin'] : "" ?>">
            </p>

            <p>
            <label for="domicilioTutor">Domicilio</label>
            <input type="text" name="domicilioTutor" 
                    value="<?= (isset($datos['domicilioTutor'])) ? $datos['domicilioTutor'] : "" ?>">
            </p>

            <p>
            <label for="telefonoTutor">Telefono</label>
            <input type="text" name="telefonoTutor" 
                    value="<?= (isset($datos['telefonoTutor'])) ? $datos['telefonoTutor'] : "" ?>">
            </p>

            <p>
            <label for="idAlumno">Elegir un Alumno</label>
            <select name="idAlumno">
                   
                <?php foreach($alumnos as $value): ?>

                    <option value="<?php echo $value->idAlumno ?>">
                            <?php echo $value->apellidosAlumno ?>, <?php echo $value->nombreAlumno ?>
                    </option>
                <?php endforeach ?>

            </select>                    
            <p>
                <input type="submit" value="Enviar">
            </p>        
        </fieldset>   
    </form>
   
</div>