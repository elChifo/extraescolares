<?php $this->layout('layout') ?>

<div class="container">
    <?php $this->insert('partials/feedback') ?>

    <h2>ACCESO DE PADRES O TUTORES</h2>

    <form  action="/login/logueado" method="post" class="login">
        <fieldset> 
            <legend>
                <h2> Datos del Padre, Madre o Tutor legal </h2> 
            </legend>             
            
            <section>
                <label>DNI:</label>
                <input type="text" name="dniTutor">
                
                <label>Contraseña:</label>
                <input type="password" name="passLogin">            
                
                <label>&nbsp;</label>
                <input type="submit" value="Acceder"> 
            </section>
        </fieldset>
    </form>

</div>