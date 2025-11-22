<?php
$conex = mysqli_connect("localhost","root","","minecraft");
 
//error x las dudas si falla la bd 
if(!$conex){
    die('Error de Conexión: ' . mysqli_connect_error());
}

 
 
session_start();
 ?>