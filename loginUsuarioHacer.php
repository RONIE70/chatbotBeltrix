<?php

include_once ("AccesoDatos.php"); 
include_once ("Usuarios.php");



    if(isset($_POST['email']))
    {
      $mail=$_POST['email'];
      $clave = $_POST['password'];
     
    }
    else
    {
        die();
    }
    
    $existeUsuario = Usuario::ExisteusuarioLogin($mail,$clave);
    if ($existeUsuario==1)
    {
        setcookie("USUARIO",$mail);
        header('Location:message.php');
    }

    else
    {
        header('Location:error.php');
    }

 // traigo mensaje con ajax
$getMesg = mysqli_real_escape_string($conn, $_POST['text']);

//check user con base
$check_data = "SELECT respuestas FROM chatbot WHERE preguntas LIKE '%$getMesg%'";
$run_query = mysqli_query($conn, $check_data) or die("Error");

// si la consulta del usuario coincide con la consulta de la base de datos, mostraremos la respuesta; de lo contrario, irá a otra declaración
if(mysqli_num_rows($run_query) > 0){
    //recuperando la reproducción de la base de datos de acuerdo con la consulta del usuario
    $fetch_data = mysqli_fetch_assoc($run_query);
    //almacenando la reproducción en una variable que enviaremos a ajax
    $replay = $fetch_data['respuestas'];
    echo $replay;
}else{
    echo "Disculpa, no entendi!";
}

?>