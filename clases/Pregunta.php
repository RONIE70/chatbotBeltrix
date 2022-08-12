<?php

class Pregunta{
    public $id;
    public $codRespuesta;
    public $cadena;
    public $fecha;

    public static function insertarPregunta($cadena) 
    {
          $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
          $consulta =$objetoAccesoDato->RetornarConsulta(
          "INSERT INTO `preguntas`(`descripcion`) VALUES (.'$cadena'.)");
          $consulta->execute();
          
    }       

}

?>