<?php

class Messages
{
    private $id;
    private $fecha;


   /* public static function sesionMenu() 
    {
          $_SESSION['nroOpcion'] = $_POST['text'];

          if(!isset($_SESSION['superior'])){
            $_SESSION['superior']='is null';
        }else{
            if ("0" == $_POST['text']) {
                $_SESSION['superior']='is null';
            }
        }
          $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
          if ("0" != $_POST['text']) {
          $check_data =$objetoAccesoDato->RetornarConsulta(
            "SELECT
            mo.*
            FROM 
            menuOpciones mo 
            WHERE                    
            idSuperior = 
                (SELECT idMenu FROM menuopciones o 
                WHERE o.idsuperior ".$_SESSION['superior']."
                AND nroOpcion = ".$_SESSION['nroOpcion'].")");
          $check_data->execute(); 
        }else{
            $check_data = $objetoAccesoDato->RetornarConsulta(
                            "SELECT
                                *
                            FROM 
                                menuOpciones 
                            WHERE 
                                idSuperior is null");
        $check_data->execute(); 
        }
         
        return $check_data; 
      }*/    
}
?>