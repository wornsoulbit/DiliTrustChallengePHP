<?php
session_start();
//looks for the phpSESSIONID cookie
//creates it if there is none
require "autoload.php";
require "core/phpqrcode/qrlib.php";

$path = getcwd();
$path = preg_replace('/^.+\\\\Site\\\\/', '/', $path);
$path = str_replace('\\', '/', $path);
define("BASE", $path);

?>