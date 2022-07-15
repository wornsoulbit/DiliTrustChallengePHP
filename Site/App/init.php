<?php
session_start();
//looks for the phpSESSIONID cookie
//creates it if there is none
require "autoload.php";

$path = getcwd();
$path = preg_replace('/^.+\\\\Site\\\\/', '/', $path);
echo $path;
$path = str_replace('\\', '/', $path);
define("BASE", $path);


?>