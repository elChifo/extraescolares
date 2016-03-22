<?php

class Tutores extends Controller
{
    public function index()
    {            
        $this->view->addData(['titulo' => 'Actividades Extraescolares']);

        $alumnos = TutoresModel::getAlumno();

        if (!$_POST) {
            echo $this->view->render('tutores/index', [
            'alumnos' => $alumnos]);
        } 
        else {

            if(!isset($_POST["nombreTutor"])) {
                $_POST["nombreTutor"] = "";
            }
            if(!isset($_POST["apellidosTutor"])) {
                $_POST["apellidosTutor"] = "";
            }
            if(!isset($_POST["dniTutor"])) {
                $_POST["dniTutor"] = "";
            }
            if(!isset($_POST["passLogin"])) {
                $_POST["passLogin"] = "";
            }
            if(!isset($_POST["domicilioTutor"])) {
                $_POST["domicilioTutor"] = "";
            }
            if(!isset($_POST["telefonoTutor"])) {
                $_POST["telefonoTutor"] = "";
            }

            $datos = array(
                'nombreTutor' => $_POST["nombreTutor"],
                'apellidosTutor' => $_POST["apellidosTutor"],
                'dniTutor' => $_POST["dniTutor"],
                'passLogin' => $_POST["passLogin"],
                'domicilioTutor' => $_POST["domicilioTutor"],
                'telefonoTutor' => $_POST["telefonoTutor"]
            );

            if(TutoresModel::insertar($datos)) {

            } 
            else {
                echo $this->view->render('tutores/index',array(
                        'errores' => array('Error al insertar')
                ));
            }
        }
    }


    public function editar($id = 0)
    {
        if(!$_POST){

            $this->view->addData(['titulo' => 'Actividades Extraescolares']);

            $centros = ActividadesModel::getCentro();
            $idActividad = ActividadesModel::getIdActividad($id);

            if($idActividad) {
                echo $this->view->render('actividades/formulario', array(
                        'idActividad' => get_object_vars($idActividad),
                        'accion' => 'editar',
                        'centros' => $centros
                 ));
            } 
            else {
                header("location: /actividades");
            }
        } 
        else {
            $datos = array(
                'nombreActividad' => (isset($_POST["nombreActividad"])) ? $_POST["nombreActividad"] : "",
                'monitor' => (isset($_POST["monitor"])) ? $_POST["monitor"] : "",
                'descripcion' => (isset($_POST["descripcion"])) ? $_POST["descripcion"] : "",
                'idCentro' => (isset($_POST["idCentro"])) ? $_POST["idCentro"] : "",
                'idActividad' => (isset($_POST["idActividad"])) ? $_POST["idActividad"] : ""
            );

            if(ActividadesModel::editar($datos)) {
                
                header('location: /actividades');
            } 
            else {
                echo $this->view->render('actividades/formulario', array(
                    'errores' => array('Error al editar'),
                    'datos'   => $_POST,
                    'accion'  => 'editar'
                ));
            }
        }
    }

    public function privado()
    {
        $this->view->addData(['titulo' => 'Actividades Extraescolares']);

        $actividades = ActividadesModel::getActividad();
        $centros = ActividadesModel::getCentro();
      
        echo $this->view->render("actividades/privado", [
                'actividades' => $actividades,
                'centros'     => $centros
        ]);
    }





    
}