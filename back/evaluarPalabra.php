<?php
//session_destroy();
session_start();

include_once "../db/consultas.php";
include_once "../funciones/menu.php";

$getMesg = $_POST['texto'];
//var_dump($_POST['text']);
$_SESSION['nroOpcion'] = $_POST['texto'];

if ("0" != $_POST['texto']) {
    $cantidadOpciones = "SELECT idMenu,descripcion,nroOpcion,(
                    SELECT count(1) FROM menuopciones p
                    WHERE p.idSuperior=
                    mo.idMenu limit 1) as cantidad
                    FROM menuopciones mo WHERE idMenu = $getMesg";

}
$resultadoOpcionEnMenu = ejecutarConsulta($cantidadOpciones);
//echo $cantidadOpciones;
if ($resultadoOpcionEnMenu) {
    foreach ($resultadoOpcionEnMenu as $ocpcionMenu) {
        $idInferior = $ocpcionMenu['nroOpcion'];
        $descripcion = $ocpcionMenu['descripcion'];
        $cantidad = $ocpcionMenu['cantidad'];
        echo "" .$idInferior . "-" . $descripcion . "<br>";
    }

    if ($cantidad > 0) {
        $resultadoCantidadOpciones = "SELECT * from menuopciones
                  where idSuperior = $getMesg";

    } else {
        $resultadoCantidadOpciones = "SELECT * from menuopciones
                  where idMenu = $getMesg";

    }

    $opcionesMenu = ejecutarConsulta($resultadoCantidadOpciones);

    $opciones = "<div class='options-wrapper'>";
    foreach ($opcionesMenu as $opcion) {
        $opciones .= "
                                    <div class='option'>
                                        $opcion[3] - $opcion[1]
                                    </div>
                                ";
    }
    $opciones .= "<div class='option'>
                                            0- Volver al Menú Principal
                                        </div>
                                    </div>";

    actualizarIDsuperior($opcion['idSuperior']);
    echo $opciones;

}
