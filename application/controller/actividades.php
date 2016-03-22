<?php

class Actividades extends Controller
{
   	public function index()
   	{
        $this->view->addData(['titulo' => 'Actividades Extraescolares']);

        $actividades = ActividadesModel::getActividad();
		$centros = ActividadesModel::getCentro();
      
        echo $this->view->render("actividades/index", [
        		'actividades' => $actividades,
                'centros'     => $centros
        ]);
    }

    public function insertar()
    {                   
        $this->view->addData(['titulo' => 'Actividades Extraescolares']);

        $centros = ActividadesModel::getCentro();

        if(!$_POST) {
            echo $this->view->render('actividades/insertar', [
                    'centros' => $centros
            ]);            
        } 
        else {

            if(!isset($_POST["nombreActividad"])) {
                $_POST["nombreActividad"] = "";
            }
            if(!isset($_POST["monitor"])) {
                $_POST["monitor"] = "";
            }
            if(!isset($_POST["descripcion"])) {
                $_POST["descripcion"] = "";
            }
         
            $datos = array(
                'nombreActividad' => $_POST["nombreActividad"],
                'monitor' => $_POST["monitor"],
                'descripcion' => $_POST["descripcion"],
                'idCentro' => $_POST["idCentro"]
            );

            if(ActividadesModel::insertar($datos)) {
                echo $this->view->render('login/privado');
            } 
            else {
                echo $this->view->render('actividades/insertar',array(
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
