<?php

class Alumnos extends Controller
{
     public function index() 
     {        
        $this->view->addData(['titulo' => 'Actividades Extraescolares']);
        $alumnos = AlumnosModel::getAlumno();        
        $actividades = AlumnosModel::getActividad();

        $fecha = getdate();    

        echo $this->view->render('alumnos/index', [
                'alumnos'     => $alumnos,
                'actividades' => $actividades,
                'fecha'       => $fecha
                ]);
    }
 
    public function insertar()
    {                   
        $this->view->addData(['titulo' => 'Actividades Extraescolares']);

        $actividades = AlumnosModel::getActividad();

        if(!$_POST) {
            echo $this->view->render('alumnos/insertar', [
                    'actividades' => $actividades
            ]);            
        } 
        else {

            if(!isset($_POST["nombreAlumno"])) {
                $_POST["nombreAlumno"] = "";
            }
            if(!isset($_POST["apellidosAlumno"])) {
                $_POST["apellidosAlumno"] = "";
            }
            if(!isset($_POST["fechaNac"])) {
                $_POST["fechaNac"] = "";
            }
            if(!isset($_POST["curso"])) {
                $_POST["curso"] = "";
            }
            if(!isset($_POST["observaciones"])) {
                $_POST["observaciones"] = "";
            }
         
            $datos = array(
                'nombreAlumno' => $_POST["nombreAlumno"],
                'apellidosAlumno' => $_POST["apellidosAlumno"],
                'fechaNac' => $_POST["fechaNac"],
                'curso' => $_POST["curso"],
                'observaciones' => $_POST["observaciones"],
                'idActividad' => $_POST["idActividad"],
            );

            if(AlumnosModel::insertar($datos)) {
                echo $this->view->render('alumnos/alumnoinsertado');
            } 
            else {
                echo $this->view->render('alumnos/insertar',array(
                        'errores' => array('Error al insertar'),
                        'datos' => $_POST
                ));
            }
        }
    }
   



}