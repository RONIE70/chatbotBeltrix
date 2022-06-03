<?php
//ession_destroy();
session_start();



include "AccesoDatos.php";

// traigo mensaje con ajax
$getMesg = mysqli_real_escape_string($conn, $_POST['text']);
$_SESSION['nroOpcion']=$_POST['text'];
//echo $_POST['text'];
if(!isset($_SESSION['superior'])){
    $_SESSION['superior']='is null';
}else{
    if ("0" == $_POST['text']) {
        $_SESSION['superior']='is null';
    }
}




//$check_data = "SELECT * FROM menuOpciones WHERE idSuperior = $getMesg";
if ("0" != $_POST['text']) {
    $check_data = "SELECT
                        *
                    FROM 
                        menuOpciones 
                    WHERE 
                        idSuperior = 
                            (SELECT idMenu FROM menuopciones o 
                            WHERE o.idsuperior ".$_SESSION['superior']." 
                            AND nroOpcion = ".$_SESSION['nroOpcion'].")";
}else{
    $check_data = "SELECT
                        *
                    FROM 
                        menuOpciones 
                    WHERE 
                        idSuperior is null";

}
//echo $check_data."<br>";
$run_query = mysqli_query($conn, $check_data) or die("No es una opción válida");
//Select CONCAT_WS(' ', 'nroOpcion', 'descripcion);

// si la consulta del usuario coincide con la consulta de la base de datos, mostraremos la respuesta; de lo contrario, irá a disculpa
if(mysqli_num_rows($run_query) > 0){
    while
    ($fetch_data = mysqli_fetch_array($run_query, MYSQLI_ASSOC)){
        //almacenando la reproducción en una variable que enviaremos a ajax
        if ("0" == $_POST['text']) {
            $_SESSION['superior']='is null';
        }else{
            $_SESSION['superior']='='.$fetch_data['idSuperior'];
        }
        $replay = $fetch_data['nroOpcion']."- ".$fetch_data['descripcion']."<br>";
        echo $replay;
        }
        echo "0- Volver al Menú Anterior";
}else{
    echo "Disculpa, no entendi!";
}

?>