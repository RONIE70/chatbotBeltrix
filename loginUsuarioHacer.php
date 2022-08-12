<?php

//include_once ("AccesoDatos.php"); 
//include_once ("Usuarios.php");
$conn = mysqli_connect("localhost", "root", "", "chatbot") or die("Database Error");

 
        $pEmail= $_POST['email'];
        $pPassword = $_POST['password'];
        //var_dump($pEmail,$pPassword);
        
        $check_data = "SELECT id 
        from usuarios where email='$pEmail' 
        and clave='$pPassword'";
        
        $datos= mysqli_query ($conn, $check_data);
        if ($datos = 1){
            echo $datos;
        }
    /*else
    {
        die();
    }
    
    $existeUsuario = Usuario::ExisteusuarioLogin($mail,$clave);
    if ($existeUsuario==1)
    {
        //setcookie("USUARIO",$mail);
        header('Location:message.php');
    }

    else
    {
        header('Location:error.php');
    }*/

?>