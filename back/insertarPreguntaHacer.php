<?php
include_once ("../clases/Pregunta.php");
include_once ("../clases/AccesoDatos.php");

var_dump($_POST['data']);
if(isset($_POST["data"])){
    
$cadena = $_POST["data"];

Pregunta::insertarPregunta($cadena);

}

?>