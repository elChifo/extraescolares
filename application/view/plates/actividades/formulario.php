<?php $this->layout('layout-dos') ?>

<div class="container">
    <?php $this->insert('partials/feedback') ?>
   
    <h2>EDITAR UNA ACTIVIDAD</h2>
    
    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">

        <fieldset>
            <legend>
                <h2> Datos de la Actividad </h2>
            </legend> 

            <?php if(isset($accion) && $accion == "editar"): ?>
        
            <input type="hidden" name="idActividad" value="<?= $idActividad['idActividad'] ?>">          
            
            <?php endif ?>

            <p>
            <label for="nombreActividad">Nombre Actividad</label>
            <input type="text" name="nombreActividad" 
                    value="<?= (isset($datos['nombreActividad'])) ? $datos['nombreActividad'] : "" ?>">
            </p>

            <p>
            <label for="monitor">Nombre Monitor</label>
            <input type="text" name="monitor" 
                    value="<?= (isset($datos['monitor'])) ? $datos['monitor'] : "" ?>">
            </p>

            <p>
            <label for="descripcion">Descrición</label>
            <input type="date" name="descripcion" 
                    value="<?= (isset($datos['descripcion'])) ? $datos['descripcion'] : "" ?>">
            </p>

            <p>
            <label for="idCentro">Centro donde se Imparte</label>
            <select name="idCentro">
                    
                <?php foreach($centros as $value): ?>

                    <option value="<?php echo $value->idCentro ?>">
                            <?php echo $value->nombreCentro ?>
                    </option>

                <?php endforeach ?>

            </select> 
            </p> 
            
                <input type="submit" value="Guardar">                  
            

        </fieldset> 

    </form>

</div>