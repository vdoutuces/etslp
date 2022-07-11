<?php

namespace App\Http\Controllers;

class UserController
{
    private $dbUsr;
    private $usuarios=[];
//  private $archivo;
    private $datos = ["idUser" => -1, "usuario" => ""];

    function __construct( $arc="")
    {
        $lugar = __DIR__."/../Models/";

        if( empty($arch))
        {
            $this->archivo = $lugar . "usuarios.txt";

        }else{
            $this->archivo = "$lugar$arc";
        }

        if ( ! $this->usrlogin() ){
            $this->bdUsr = \App\Http\Models\DB::getInstance();
        }

        //$this->usuarios = file($this->archivo);
   }


    private function usrlogin()
    {
        $usr= false;
        if   ( isset($_SESSION["idUser"] ) ) 
        {
            $usr = true;
        }
        return $usr;
    }


    public function index()
    {
        $pag = "";

        if (  $this->usrlogin() || $this->buscar()  )
        {
            $pag = "/";

        }elseif ( isset($_POST["usuario"])){

            $pag = "/error";
        } else {

            return $this->datos;
        }
        redirect($pag);
    }

    
    public function buscar( )
    {
        $idusr = false;
        if ( isset($_POST["usuario"] ) &&  $_POST["clave"])
        {
            $usuario = $_POST["usuario"];
            $clave = $_POST["clave"];
                               
            $tmpdb = $this->bdUsr->search('usuarios', ['usuario' => $usuario, 'clave' => $clave ]);

            if ( ! empty($tmpdb[0] ) && isset($tmpdb[0]['idUser']) )
            {        
                $_SESSION["idUser"] = $tmpdb[0]['idUser'];
                $_SESSION["usuario"] = $tmpdb[0]['usuario'];
                $idusr = true;
            }

    /*      
      foreach( $this->usuarios as $usr )
            {
                 $usrbus = explode(":", $usr);

                if ( !empty($usrbus ))
                {
                    if ( trim($usrbus[1]) == $usuario && trim($usrbus[2]) == $clave  )
                    {                        

                        $_SESSION["idUser"] = $usrbus[0];
                        $_SESSION["usuario"] = $usuario;
 
                        $idusr = true;
                    }
                }
  
            }
            */

        }
        return $idusr;

    }

    public function logout()
    {
        if ( isset($_SESSION ))
        {
            session_destroy();
        }

    }

}