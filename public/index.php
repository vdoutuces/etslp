<?php
require_once(__DIR__."/../app/Config/site.conf");

use App\Http\Request;

if ( session_status() == PHP_SESSION_NONE )
{
    session_start();
}

require_once __DIR__ . "/../vendor/autoload.php";


$rq = new Request();

$rq->send();

