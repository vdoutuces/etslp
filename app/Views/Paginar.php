<?php

namespace App\Views;


class Paginar
{
    private $ptotal;
    private $porpag;
    private $actual;
    private $maxbotones = 10;
    protected $pagina; 

    public function __construct()    
    {
    }

    public function setPagina($pg)
    {
        $this->pagina = $pg;
    }


    public function render($datospg)
    {
        $datos = $datospg['datos'];
        $paginas = $datospg['paginas'];
        $tbl = "";

        if ( $paginas['cantPaginas'] > 1)
        {
            $tbl = $this->botones($paginas);
        }

        $tbl .= '<div><a href="/"><img src="/images/flecha-cuadrado-izquierda.png" width=25/></a> </div>';

        $tbl .= '<table border = 1><tr>';

        if ( !empty( $datos[0]) )
        {
            $campos = array_keys($datos[0]);

            foreach( $campos as $th)
            {
                $tbl .= "<th>" . $th . "</th>";
            }   

        $tbl .= '</tr><tr>';
        }

        foreach( $datos as $i => $v )
        {
            $valores = array_values($v);
            $tbl .= '<tr>';

            foreach( $valores as $td)
            {
                $tbl .= "<td>" . $td . "</td>";
            }

            $tbl .= '</tr>';
        }        

        $tbl .= "</table>";

        return( $tbl);
    }


    private function botones($paginas )
    {

    $cant = $paginas['cantPaginas'];
    $aclase = explode('\\', $this->pagina );
    $clase = array_pop($aclase);   

    $bot = sprintf('<div class="paginar"> <ul>');
 
    for( $i=0; $i < $cant; $i++)
    {
     $bot .= sprintf('<li><a href=/%s/pagina/%s>%s</a></li>', $clase , $i+1, $i+1 );
    }
    $bot .= sprintf('</ul></div>');


        return $bot;
    }



}