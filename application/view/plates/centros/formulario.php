<?php $this->layout('layout-dos') ?>

<div class="container">
    <?php $this->insert('partials/feedback') ?>
   
    <h2>EDITAR UN CENTRO</h2>

    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">

        <fieldset>
            <legend>
                <h2> Datos del Centro </h2>
            </legend>         

            <?php if(isset($accion) && $accion == "editar"): ?>
            
                <input type="hidden" name="idCentro" value="<?= $idCentro['idCentro'] ?>">            
            
            <?php endif ?>

            <p>
            <label for="nombreCentro">Nombre Centro</label>
            <input type="text" name="nombreCentro" 
                    value="<?= (isset($datos['nombreCentro'])) ? $datos['nombreCentro'] : "" ?>">
            </p>

            <p>
            <label for="domicilioCentro">Domicilio</label>
            <input type="text" name="domicilioCentro" 
                    value="<?= (isset($datos['domicilioCentro'])) ? $datos['domicilioCentro'] : "" ?>">
            </p>

            <p>
            <label for="telefonoCentro">Teléfono</label>
            <input type="date" name="telefonoCentro" 
                    value="<?= (isset($datos['telefonoCentro'])) ? $datos['telefonoCentro'] : "" ?>">
            </p>

            <p>
            <label for="contactoCentro">Contacto</label>
            <input type="text" name="contactoCentro" 
                    value="<?= (isset($datos['contactoCentro'])) ? $datos['contactoCentro'] : "" ?>">
            </p>
            
                <input type="submit" value="Guardar">                  
            
        </fieldset> 

    </form>

</div>

    