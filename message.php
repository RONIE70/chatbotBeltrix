<?php
// coneccion a la base 
$conn = mysqli_connect("localhost", "root", "", "chatbot") or die("Database Error");

// traigo mensaje con ajax
$getMesg = mysqli_real_escape_string($conn, $_POST['text']);

//saludo
/*$saludo = "SELECT saludos FROM tipoMensajes WHERE saludos <> ''";
$run_query = mysqli_query($conn, $saludo) or die("Error");
$replay = $fetch_data['saludos'];
echo $replay;*/

//check user con base  LIKE '%$getMesg%'
$check_data = "SELECT * FROM menuOpciones WHERE nroOpcion = 1 AND idSuperior = 1";
$run_query = mysqli_query($conn, $check_data) or die("Error");

// si la consulta del usuario coincide con la consulta de la base de datos, mostraremos la respuesta; de lo contrario, irá a disculpa
if(mysqli_num_rows($run_query) > 0){
    //recuperando la reproducción de la base de datos de acuerdo con la consulta del usuario
    $fetch_data = mysqli_fetch_assoc($run_query);
    //almacenando la reproducción en una variable que enviaremos a ajax
    $replay = $fetch_data['nroOpcion'];
    echo $replay;
}else{
    echo "Disculpa, no entendi!";
}

?>