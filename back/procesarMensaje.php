<?php
//session_destroy();
session_start();

include_once "../db/AccesoDatos.php";
include_once "../funciones/mensaje.php";
include_once "../funciones/sesion.php";
include_once "../funciones/menu.php";
include_once "../funciones/palabraInapropiada.php";

$mensaje = $_POST['texto'];
$_SESSION['nroOpcion'] = $_POST['texto'];

inicializarIDsuperior(); // funciones/sesion.php

//Verificamos si el valor ingresado por el usuario es un numero.
if (is_numeric($mensaje)) {

    $opcionesMenu = buscarOpcionesMenu(); // funciones/menu.php

    //Si se encontraron opciones de menu se muestran y se retorna.
    if ($opcionesMenu) {
        $htmlOpcionesMenu = generarHtmlOpcionesMenu($opcionesMenu); // funciones/menu.php
        echo $htmlOpcionesMenu;
        die();
    }

    //Si no se encontraron opciones se verifica si el valor ingresado corresponde a una opcion final
    $idOpcionMenu = buscarIdOpcionMenu();//funciones menu
    $opcionFinal="";

    if ($idOpcionMenu) {

        $opcionFinal = obtenerOpcionFinal($idOpcionMenu[0]['idmenu']); // funciones/menu.php

    }

    if ($opcionFinal) {
        echo $opcionFinal[0]['opcionFinal'];
    
        die();
    } else {
        //Se indica que no se entendio el valor ingresado (el valor es numerico pero no corresponde a una opcion del menu)
        $_SESSION['nroOpcion'] = "0";
        echo "<div class='option'> Disculpa, no entendi! </div>";
        die();
    }
} else {
    $resultadoValidaPalabra = validarPalabraInapropiada($mensaje);
    //print_r($resultadoValidaPalabra);
    //mensaje.php
    if($resultadoValidaPalabra){
        $_SESSION['bloqueado'] = true;
        echo 'bloqueado';
    }else{
        $resultadoLevenshtein = ejecutarLevenshtein($mensaje);

    if ($resultadoLevenshtein) {
         //mensaje.php
        $htmlResultadoLevenshtein = generarHtmlResultadoLevenshtein($resultadoLevenshtein);
        echo $htmlResultadoLevenshtein;
    }
    
    }
    return;
}
