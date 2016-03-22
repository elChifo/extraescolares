<?php

class TutoresModel
{
    public static function getAlumno()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Alumnos ORDER BY apellidosAlumno ASC";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }

    public static function insertar($datos)
    {
        $conn = Database::getInstance()->getDatabase();

        $errores_validacion = false;
     
        if(empty($datos['nombreTutor'])){
            Session::add('feedback_negative', "No he recibido el Nombre del Tutor legal");
            $errores_validacion = true;
        }
        if(empty($datos['apellidosTutor'])){
            Session::add('feedback_negative', "No he recibido los Apellidos del Tutor legal");
            $errores_validacion = true;
        }
        if(empty($datos['dniTutor'])){
            Session::add('feedback_negative', "No he recibido el DNI del Tutor legal");
            $errores_validacion = true;
        }
        if(empty($datos['passLogin'])){
            Session::add('feedback_negative', "No he recibido la Contraseña de Login del Tutor legal");
            $errores_validacion = true;
        }
        if(empty($datos['domicilioTutor'])){
            Session::add('feedback_negative', "No he recibido el Domicilio del Tutor legal");
            $errores_validacion = true;
        }
        if(empty($datos['telefonoTutor'])){
            Session::add('feedback_negative', "No he recibido el Telefono del Tutor legal");
            $errores_validacion = true;
        }        
        
        if($errores_validacion) {
            return false;
        }
        else {
            $params = array(
                'nombreTutor' => $_POST["nombreTutor"],
                'apellidosTutor' => $_POST["apellidosTutor"],
                'dniTutor' => $_POST["dniTutor"],
                'passLogin' => md5($_POST["passLogin"]),
                'domicilioTutor' => $_POST["domicilioTutor"],
                'telefonoTutor' => $_POST["telefonoTutor"],
                'idAlumno' => $_POST["idAlumno"]
            );

            $ssql = "INSERT INTO Tutores (nombreTutor, apellidosTutor, dniTutor, passLogin, domicilioTutor, telefonoTutor, idAlumno)
                     VALUES (:nombreTutor, :apellidosTutor, :dniTutor, :passLogin, :domicilioTutor, :telefonoTutor, :idAlumno)";

            $query = $conn->prepare($ssql);
            $query->execute($params);
            $cuenta = $query->rowCount();
            if($cuenta == 1){
                return $conn->lastInsertId();
            }
            return false;
        }
    }    
}