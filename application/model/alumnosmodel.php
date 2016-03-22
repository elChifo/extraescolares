<?php

class AlumnosModel
{
    public static function getActividad()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Actividades";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }

        public static function getAlumno()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Alumnos ORDER BY nombreAlumno ASC";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }


    public static function insertar($datos)
    {
        $conn = Database::getInstance()->getDatabase();

        $errores_validacion = false;

        if(empty($datos['nombreAlumno'])) {
            Session::add('feedback_negative', "No he recibido el Nombre del Alumno");
            $errores_validacion = true;
        }
        if(empty($datos['apellidosAlumno'])) {
            Session::add('feedback_negative', "No he recibido los Apellidos del Alumno");
            $errores_validacion = true;
        }
        if(empty($datos['fechaNac'])) {
            Session::add('feedback_negative', "No he recibido la Fecha de Nacimiento del Alumno");
            $errores_validacion = true;
        }
        if(empty($datos['curso'])) {
            Session::add('feedback_negative', "No he recibido el Curso del Alumno");
            $errores_validacion = true;
        }
        if(empty($datos['idActividad'])) {
            Session::add('feedback_negative', "No he recibido la Actividad del Alumno");
            $errores_validacion = true;
        }

        if($errores_validacion) {
            return false;
        }
        else {
            $params = array(
                'nombreAlumno' => $_POST["nombreAlumno"],
                'apellidosAlumno' => $_POST["apellidosAlumno"],
                'fechaNac' => $_POST["fechaNac"],
                'curso' => $_POST["curso"],
                'observaciones' => $_POST["observaciones"],
                'idActividad' => $_POST["idActividad"]
            );

            $ssql = "INSERT INTO Alumnos (nombreAlumno, apellidosAlumno, fechaNac, curso, observaciones, idActividad)
                    VALUES (:nombreAlumno, :apellidosAlumno, :fechaNac, :curso, :observaciones, :idActividad)";

            $query = $conn->prepare($ssql);
            $query->execute($params);
            $cuenta = $query->rowCount();

            if($cuenta == 1) {
                return $conn->lastInsertId();
            }
            return false;
        }
    }

    
}