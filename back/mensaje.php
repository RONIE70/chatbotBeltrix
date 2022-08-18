<?php
//session_destroy();
session_start();

include_once("../clases/AccesoDatos.php");


$getMesg = mysqli_real_escape_string($conn, $_POST['text']);
$_SESSION['nroOpcion'] = $_POST['text'];

if(!isset($_SESSION['superior'])){
    $_SESSION['superior']='is null';
}else{
    if ("0" == $_POST['text']) {
        $_SESSION['superior']='is null';
    }
}

if ("0" != $_POST['text']) {
    $check_data = "SELECT
                        mo.*
                    FROM 
                        menuOpciones mo 
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

$run_query = mysqli_query($conn, $check_data);

if ($run_query == false){

    $check_data =  "SELECT
                    palabraClave 
                    FROM
    (
    select palabraClave, 1 orden from (
    select palabraClave from preguntas p 
    where palabraClave  like '%.$getMesg.%'
    limit 1) v1
    union 
    select palabraClave, 2 orden from (
    select palabraClave from preguntas p 
    order by LEVENSHTEIN('.$getMesg.', palabraClave) asc
    limit 1) v2
    order by orden
    ) r
    limit 1";

    $run_query = mysqli_query($conn, $check_data);

    if(mysqli_num_rows($run_query) > 0){
        while
        ($fetch_data = mysqli_fetch_array($run_query, MYSQLI_ASSOC)){
            //var_dump ($run_query);
            $palabra_original = $getMesg;
            $palabra_actual = $fetch_data['palabraClave'];
            $distancia_mas_corta = -1;

            // Recorrer $palabras para encontrar la mas corta
            if($palabra_original !== $palabra_actual) {

                // Calcular la distancia entre la $palabra_original y la $palabra_actual
                $lev = levenshtein($palabra_actual, $palabra_original);

                // comprobar si son iguales (distancia 0)
                if ($lev == 0) {
                        // se trata de la palabra mas proxima (de hecho, las 2 coinciden)
                        $palabra_mas_cercana = $palabra_actual;
                        $distancia_mas_corta = 0;
                        // salir porque ya se ha encontrado una coincidencia
                
                }

                // si la distancia es menor que la siguiente distancia mas corta encontrada, o si 
                // si no se ha encontrado la palabra con la distancia mas corta
                if ($lev <= $distancia_mas_corta || $distancia_mas_corta < 0) {
                    // establece la palabra mas cercana y la distancia mas corta
                    $palabra_mas_cercana  = $palabra_actual;
                    $distancia_mas_corta = $lev;
                }
            }

                //echo "Palabra introducida: $palabra_original\n";
                if ($distancia_mas_corta == 0) {
                    echo "Se ha encontrado una coincidencia exacta: $palabra_mas_cercana\n";
                    } else {
                    echo "Quisiste decir . . . "."<br>";
                    echo '<a href= "https://www.ibeltran.com.ar" target=”_blank” style="color:#FF0000">'.$palabra_mas_cercana ."?".'</a>'."<br>";
                }
        }
    }

}


if(mysqli_num_rows($run_query) > 0){
    while
    ($fetch_data = mysqli_fetch_array($run_query, MYSQLI_ASSOC)){
        
        if ("0" == $_POST['text']) {
            $_SESSION['superior']='is null';
        }else{
            $_SESSION['superior']='='.$fetch_data['idSuperior'];
        }
        $replay = $fetch_data['nroOpcion']."- ".$fetch_data['descripcion']."<br>";
        echo $replay;
        }
        echo "0- Volver al Menú Principal";
}else{

    if ("0" != $_POST['text']) {
        $check_data = "SELECT
                            mo.*
                        FROM 
                            menuOpciones mo 
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
   
   $sql = "SELECT
                    idMenu
                    FROM 
                    menuOpciones mo 
                    WHERE 
                    idSuperior ".$_SESSION['superior']." 
                        AND nroOpcion = ".$_POST['text'];
    
    $run_query = mysqli_query($conn, $sql) or die("Disculpa... no entendí ,
    queres hacer una pregunta?");
    
    if(mysqli_num_rows($run_query) > 0){
        while
        ($fetch_menuid = mysqli_fetch_array($run_query, MYSQLI_ASSOC)){
            //echo('aca va una accion: '.$fetch_menuid['idMenu']);
            switch ($fetch_menuid['idMenu']) {
                case 35:
                    echo 'Ingresá al link, <br> elegí cómo pagar, ¡y listo!<br>'; 
                    echo '<a href= "https://mpago.la/1WiSDNC" style="color:#FF0000">mercadopago</a><br>';
                    echo 'Sino te pasamos un <br> cbu 59852136984122396';
                    break;
                case 36:
                    echo 'Lee o Descarga QR, <br> y elegí cómo pagar, ¡y listo!<br>'; 
                    echo '<a href= "./generaPDFpago.php" style="color:#FF0000">Descarga ticket de pago</a><br>';
                    echo '<a href="./imagenes/qr.png" download="./imagenes/qr.pdf ">
                    <img src="./imagenes/qr.png" heigh=30% width=30% align="middle" style="max-width:100%;width:auto;height:auto;">
                    </a>';
                    break;
                case 23:
                    echo 'Ingresa los datos con los que <br>te inscribiste en el instituto<br>'; 
                    include("../front/loginUsuario.php");
                    break;
                
         
        
                
        
         }
            
        }
    }else{
        echo "Disculpa, no entendi!";
    }

}


?>