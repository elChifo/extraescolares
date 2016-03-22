<?php

class LoginModel
{
    public static function logueado($datos)
    {
        if(!$datos) {
            Session::add('feedback_negative', 'No tengo los datos de Login');
            return false;  
        }
        if(empty($datos['passLogin'])) {
            Session::add('feedback_negative', 'No se ha indicado la Contraseña');
        }
        if(empty($datos['dniTutor'])) {
            Session::add('feedback_negative', 'No se ha indicado el DNI');
        }
        if(Session::get('feedback_negative')) {
            return false;
        }

        $datos['dniTutor'] = trim($datos['dniTutor']);

        if(strlen($datos['dniTutor']) < 9) {
            Session::add('feedback_negative', 'El DNI debe tener 8 digitos + 1 letra');
        }
        if(strlen($datos['passLogin']) < 4) {
            Session::add('feedback_negative', 'La Contraseña debe tener 4 o más caracteres');
        }
        if(Session::get('feedback_negative')) {
            return false;
        }

        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Tutores WHERE dniTutor=:dniTutor";
        $query = $conn->prepare($ssql);
        $query->bindValue(':dniTutor', $datos['dniTutor'], PDO::PARAM_STR);
        $query->execute();

        $cuantos = $query->rowCount();
        if($cuantos != 1) {
            Session::add('feedback_negative', 'No estás registrado');
            return false;
        }

        $tutor = $query->fetch();

        if($tutor->passLogin != md5($datos['passLogin'])) {
            Session::add('feedback_negative', 'La Contraseña no coincide');
            return false;
        }

        Session::set('nombreTutor', $tutor->nombreTutor);
        Session::set('apellidosTutor', $tutor->apellidosTutor);
        return $datos['dniTutor'];
    }

     public static function getAlumno()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Alumnos";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }

     public static function getTutor()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Tutores";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }

     public static function getCentro()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Centros";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }
    public static function getActividad()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Actividades";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }
    


}