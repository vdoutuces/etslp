<?php


namespace App\Views;


class Error
{

        public function render($datos)
        {

            
            $html = sprintf("
                <h1> 404 </h1>
                <h3> %s </h3>",  implode(" ",$datos));

            return $html;

        }



}