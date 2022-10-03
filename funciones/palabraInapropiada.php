<?php

function validarPalabraInapropiada($mensaje){
$consulta = "SELECT insulto FROM lenguajeinapropiado 
             WHERE Match(insulto) Against('$mensaje')";
$resultado = ejecutarConsulta($consulta);
return $resultado;
}

function generarHTMLBloqueo(){
    $html = '<div style="background-color: red;
    color: white;
    height: 400px;
    font-size: 2rem;
    display: flex;
    text-align: center;
    flex-direction: column;
    justify-content: center;
    align-items: center;"><h1>BLOQUEADO</h1>
    <h2>Por utilizar Lenguaje Inapropiado</h2></div>';
    return $html;
}