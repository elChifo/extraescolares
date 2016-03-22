<?php

class Login extends Controller
{
    public function index()    
    {
        $this->view->addData(['titulo' => 'Actividades Extraescolares']);    

        echo $this->view->render('login/index');
    }

    public function logueado()
    {
        $this->view->addData(['titulo' => 'Actividades Extraescolares']);
       
        if(LoginModel::logueado($_POST)) {
            $privado = LoginModel::logueado($_POST);

            if($privado == '00000000A') {

                $centros = LoginModel::getCentro();
                $actividades = LoginModel::getActividad();

                echo $this->view->render('login/privado', [
                        'privado' => $privado,
                        'centros' => $centros,
                        'actividades' => $actividades
                    ]);
            }
            else {
                    $alumnos = LoginModel::getAlumno();
                    $tutores = LoginModel::getTutor();

                    echo $this->view->render('login/logueado', [
                            'alumnos' => $alumnos,
                            'tutores' => $tutores,
                            'privado' => $privado
                    ]);
            }          
        } 
        else {
            echo $this->view->render('login/index');
        }
    }

    public function salir()
    {
        Session::destroy();
        header('location: /');
        exit();
    }

    public static function espacio($num)
    {       
        for ($i=0; $i<$num; $i++) {
            echo '&nbsp;';
        }
    }
}