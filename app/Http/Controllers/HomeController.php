<?php


namespace App\http\Controllers;


class  HomeController
{


    public function index()
    {

        
        $dat = [
            "UTU" => "Escuela Técnica las Piedras",
            "Materia" => "PROGRAMACION III",
            "Proyecto" => "Gestión de eventos y Marketing"
            
        ];

        return $dat;
    }


}