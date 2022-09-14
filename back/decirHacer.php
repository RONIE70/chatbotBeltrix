<?php
//session_destroy();
session_start();

include_once("../clases/AccesoDatos.php");
include_once ("../clases/MenuOpcion.php");

$getMesg = mysqli_real_escape_string($conn, $_POST['text']);
//var_dump($_POST['text']);
$_SESSION['nroOpcion'] = $_POST['text'];


$menuDecir = MenuOpcion::DecirOpciones($_POST['text']);
include ("../front/decir.php");



?>