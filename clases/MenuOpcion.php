<?php 
include_once ("AccesoDatos.php");

class MenuOpcion{

    private $idMenu;
    private $descripcion;
    private $idSuperior;
    private $nroOpcion;


    public static function traerOpciones() {
			
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta =$objetoAccesoDato->RetornarConsulta(
      "SELECT * FROM menuOpciones WHERE idSuperior IS NULL");
        
      $consulta->execute(); 
      $idSuperior= $consulta->fetchall(); 
                
      return $idSuperior;		
    }

    public static function DecirOpciones($getMesg) {
			
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta(
        "SELECT
                        idMenu,descripcion
                    FROM 
                        menuOpciones
                    WHERE 
                        idMenu = $getMesg");
          
        $consulta->execute(); 
        $idMenuDecir= $consulta->fetchall(); 
                  
        return $idMenuDecir;		
      }

    public static function TraerOpcionLogin(){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta(
        "SELECT * FROM opcionesLogin WHERE idSuperior IS NULL");

        $consulta->execute(); 
        $ArraysResultante= $consulta->fetchall(); 
        
        return $ArraysResultante;
     
    }
      

    public function RetornarConsulta($sql)
    { 
        return $this->objetoPDO->prepare($sql); 
    }

    public static function RetornaColumnas()
    {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta = $objetoAccesoDato->RetornarConsulta( 
                "SELECT
                mo.*
            FROM 
                menuOpciones mo 
            WHERE 
                idSuperior = 
                    (SELECT idMenu FROM menuopciones o 
                    WHERE o.idsuperior ".$_SESSION['superior']." 
                    AND nroOpcion = ".$_SESSION['nroOpcion'].")");
            //echo 
            $consulta->execute();           
            $ArraysResultante= $consulta->fetchall(); 
			
			return $ArraysResultante;
           
    }    

    public static function RetornaColumna()
    {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta = $objetoAccesoDato->RetornarConsulta( 
                "SELECT
                                *
                            FROM 
                                menuOpciones 
                            WHERE 
                                idSuperior IS NULL");
            
            $consulta->execute();           
            $ArraysResultante= $consulta->fetchAll(); 
			
			return $ArraysResultante;
     }


    

    /*public static function TraeOpcionSegunda(){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            
    if($run_query > 0){
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
           // echo($_POST['text']. 'este es el numero ingresado');
           // echo($_SESSION['superior'].'este es el superior');
           $sql = "SELECT
                            idMenu
                            FROM 
                            menuOpciones mo 
                            WHERE 
                            idSuperior ".$_SESSION['superior']." 
                                AND nroOpcion = ".$_POST['text'];
            //echo $sql;
            $run_query = mysqli_query($conn, $sql) or die("No es una opción válida");
            
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
                            echo '<a href="./images/qr.png" download="./images/qr.pdf ">
                            <img src="./images/qr.png" heigh=30% width=30% align="middle" style="max-width:100%;width:auto;height:auto;">
                            </a>';
                            break;
                        case 23:
                                echo 'Ingresa los datos con los que <br>te inscribiste en el instituto<br>'; 
                                include "loginUsuario.php";
                                
                                break;
                        case 5:
                                include "bot.php";
                 
                
                        
                
                 }
                    
                }
            }else{
                echo "Disculpa, no entendi!";
            }
    
        }
    








    }*/
}

?>