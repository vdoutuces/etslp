<?php


namespace App\Http\Controllers;

class ErrorController
{


    public function index($error = "")
    {

        $status = "No se encuentra en el servidor la solicitud realizada ";
        if ( ! empty($error ))
        {
            $status .= " [-- $error --]" ;  
        }

        $status .= '<h5><a href="/home">ir al inicio</a></h5>';
        
        return [ $status ];
    }


}