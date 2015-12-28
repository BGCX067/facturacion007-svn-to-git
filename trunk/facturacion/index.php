<?php
ini_set("error_reporting", E_ALL);
ini_set("display_error", TRUE);
//Librerias
require 'config/Constantes.php';
require 'config/paths.php';
require 'config/database.php';
require 'lib/tcpdf/config/lang/spa.php';
require 'lib/tcpdf/tcpdf.php';
require 'lib/tcpdf/htmlcolors.php';

// Autocarga

function __autoload($clase){
   require CORE .$clase. ".php";
}

$app=new Bootstrap();