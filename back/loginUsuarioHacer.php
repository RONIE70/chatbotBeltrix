<?php
session_start();
include_once ("../clases/AccesoDatos.php"); 
include_once ("../clases/MenuOpcion.php");
include_once ("../clases/Usuario.php");


        if(isset ($_POST['email'])&& 
        isset($_POST['password'])){
        $pEmail= $_POST['email'];
        $pPassword = $_POST['password'];
        
        
        Usuario::ValidarUsuarioLogin($pEmail,$pPassword);
                
        $foto = Usuario::fotoLogin($pEmail);
        
   
    }   
?>
