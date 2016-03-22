<?php $this->layout('layout') ?>

<div class="container">
    <?php $this->insert('partials/feedback') ?>
    
    <h2>BUSQUEDA EN LA BASE DE DATOS</h2>
       
        <form  action="<?php $_SERVER['REQUEST_URI'] ?>" method="post">   
            <fieldset>   
                <p>
                    <label for="idCentro">Elegir un Centro</label>
                    <select name="idCentro">
                            
                        <?php foreach($centros as $centro): ?>

                            <option value="<?php echo $centro->idCentro ?>">
                                    <?php echo $centro->nombreCentro ?>
                            </option>

                        <?php endforeach ?>

                    </select> 
                </p>
                    <input type="submit" value="Buscar un Centro">  
            </fieldset>              
        </form><br>

        <form  action="<?php $_SERVER['REQUEST_URI'] ?>" method="post">   
            <fieldset>   
                <p>
                    <label for="idActividad">Elegir una Actividad</label>
                    <select name="idActividad">
                            
                        <?php foreach($actividades as $actividad): ?>

                            <option value="<?php echo $actividad->idActividad ?>">
                                    <?php echo $actividad->nombreActividad ?>
                            </option>

                        <?php endforeach ?>

                    </select> 
                </p>
                    <input type="submit" value="Buscar una Actividad">  
            </fieldset>              
        </form><br>

        <form  action="<?php $_SERVER['REQUEST_URI'] ?>" method="post">   
            <fieldset>   
                <p>
                    <label for="idAlumno">Elegir un Alumno</label>
                    <select name="idAlumno">
                            
                        <?php foreach($alumnos as $alumno): ?>

                            <option value="<?php echo $alumno->idAlumno ?>">
                                    <?php echo $alumno->nombreAlumno ?>
                                    <?php echo $alumno->apellidosAlumno ?>
                            </option>

                        <?php endforeach ?>

                    </select> 
                </p>
                    <input type="submit" value="Buscar un Alumno">  
            </fieldset>              
        </form><br>

       
</div>