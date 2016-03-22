<?php

class Home extends Controller
{
    public function index()
    {
        $this->view->addData(['titulo' => 'Actividades Extraescolares',

        				'presentacion' => "'ACTIVA TU MUNDO' es una empresa dedicada a la educación no formal y 
        				 la intervención social, especialmente en el ocio y tiempo libre. A través de nuestras 
        				 actividades y proyectos pretendemos optimizar el proceso socializador y educativo de niños, 
        				 niñas y jóvenes.",

        				'objetivos' => "'ACTIVA TU MUNDO' plantea las Actividades Extraescolares para que el alumno
        				 aprenda y refuerce valores fundamentales como la solidaridad, el cooperativismo, 
        				 la tolerancia, la autoestima, la higiene personal, etc.",

        				'desarrollo' => 'Todas las actividades expuestas, se realizarán siempre en las instalaciones
        				 pertenecientes al centro docente donde estudien los alumnos. La actividad elegida será 
        				 desarrollada dos días a la semana, con una duración de una hora diaria'
        ]);

        echo $this->view->render("home/index"); 
    }  
}
