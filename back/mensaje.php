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

    $check_data =  "SELECT palabraClave,idPalClave,palRespuestas,idMenu,descripcion 
    FROM ( select palabraClave,idPalClave,palRespuestas, 1 orden 
    from ( select palabraClave,idPalClave,palRespuestas 
    from preguntas p where palabraClave like '%.$getMesg.%' limit 1) v1 
    union select palabraClave,idPalClave,palRespuestas, 2 orden 
    from ( select palabraClave,idPalClave,palRespuestas 
    from preguntas p order by LEVENSHTEIN('.$getMesg.', palabraClave) limit 1) v2 
    order by orden ) as r 
    inner join ( select idMenu,descripcion, 1 orden, 'opcion' 
    from ( select idMenu,descripcion 
    from menuopciones m where descripcion like '%.$getMesg.%' limit 1) v1 
    union select idMenu,descripcion, 2 orden, 'clave' 
    from ( select idMenu,descripcion from menuopciones m 
    order by LEVENSHTEIN('.$getMesg.', descripcion) asc limit 1) v2
    order by orden ) q limit 1;";
    //echo $check_data;
    
    $run_query = mysqli_query($conn, $check_data);
    
    if(mysqli_num_rows($run_query) > 0){
    while
    ($fetch_data = mysqli_fetch_array($run_query, MYSQLI_ASSOC)){
       //var_dump ($run_query);
       $palabra_original = $getMesg;
       $palabras = $fetch_data['palabraClave'];
       $id = $fetch_data['idPalClave'];
       $respuesta = $fetch_data['palRespuestas'];
       $idMenu = $fetch_data['idMenu'];
       $descripcion = $fetch_data['descripcion'];
       echo "Quisiste decir . . . "."<br>";
    
    }
    
    
    
    
    
       //echo($fetch_pal['idPalClave']);
       //echo $respuesta;
       switch ($id) {
           

             default: 
             $check_dataD = "SELECT
                       idMenu
                    FROM 
                        menuOpciones
                    WHERE 
                        idMenu = $idMenu";

//var_dump($check_dataD);
                   echo '<a href="#" id="idMenu" onclick="clickDecir('.$idMenu.')" style="color:#FF0000">'.$descripcion ."?".'</a>'."<br>";
                   //echo $respuesta."<br>";  
                    
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
                        echo 'Sino te pasamos un <br> cbu 59852136984122396<br><br>';
                        echo "0- Volver al Menú Principal";
                        break;
                    case 36:
                        echo 'Lee o Descarga QR, <br> y elegí cómo pagar, ¡y listo!<br>'; 
                        echo '<a href= "./front/generaPDFpago.php" style="color:#FF0000">Descarga ticket de pago</a><br>';
                        echo '<a href="./imagenes/qr.png" download="./imagenes/qr.pdf ">
                        <img src="./imagenes/qr.png" heigh=30% width=30% align="middle" style="max-width:100%;width:auto;height:auto;">
                        </a>';
                        echo '<br><br>';
                        echo "0- Volver al Menú Principal";
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