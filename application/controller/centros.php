<?php

class Centros extends Controller
{
   	public function index()
    {
        $this->view->addData(['titulo' => 'Actividades Extraescolares']);

        $centros = CentrosModel::getCentro();

        echo $this->view->render("centros/index", [
        		'centros' => $centros
        ]);     
    }

    public function insertar()
    {            
        $this->view->addData(['titulo' => 'Actividades Extraescolares']);

        $centros = CentrosModel::getCentro();

        if (!$_POST) {
            echo $this->view->render('centros/insertar', [
            'centros' => $centros]);
        } 
        else {

            if(!isset($_POST["nombreCentro"])) {
                $_POST["nombreCentro"] = "";
            }
            if(!isset($_POST["domicilioCentro"])) {
                $_POST["domicilioCentro"] = "";
            }
            if(!isset($_POST["telefonoCentro"])) {
                $_POST["telefonoCentro"] = "";
            }
            if(!isset($_POST["contactoCentro"])) {
                $_POST["contactoCentro"] = "";
            }

            $datos = array(
                'nombreCentro' => $_POST["nombreCentro"],
                'domicilioCentro' => $_POST["domicilioCentro"],
                'telefonoCentro' => $_POST["telefonoCentro"],
                'contactoCentro' => $_POST["contactoCentro"],
            );

            if(CentrosModel::insertar($datos)) {
                echo $this->view->render('login/privado');
            } 
            else {
                echo $this->view->render('centros/insertar',array(
                        'errores' => array('Error al insertar'),
                        'datos' => $_POST
                ));
            }
        }
    }

                    
    public function editar($id = 0)
    {
        if(!$_POST){

            $this->view->addData(['titulo' => 'Actividades Extraescolares']);

            $idCentro = CentrosModel::getIdCentro($id);
            
            if($idCentro){
                echo $this->view->render('centros/formulario', array(
                        'idCentro' => get_object_vars($idCentro),
                        'accion' => 'editar',
                 ));
            } 
            else {
                header("location: /centros");
            }
        } 
        else {
            $datos = array(
                'nombreCentro' => (isset($_POST["nombreCentro"])) ? $_POST["nombreCentro"] : "",
                'domicilioCentro' => (isset($_POST["domicilioCentro"])) ? $_POST["domicilioCentro"] : "",
                'telefonoCentro' => (isset($_POST["telefonoCentro"])) ? $_POST["telefonoCentro"] : "",
                'contactoCentro' => (isset($_POST["contactoCentro"])) ? $_POST["contactoCentro"] : "",
                'idCentro' => (isset($_POST["idCentro"])) ? $_POST["idCentro"] : ""
            );

            if(CentrosModel::editar($datos)) {
                
                header('location: /centros');
            } 
            else {
                echo $this->view->render('centros/formulario', array(
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

        $centros = CentrosModel::getCentro();

        echo $this->view->render("centros/privado", [
                'centros' => $centros
        ]);     
    }


}
