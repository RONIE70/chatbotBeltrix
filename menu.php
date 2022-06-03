
<?php
//sesion start conservar la opcion superior

include("AccesoDatos.php");
date_default_timezone_set("America/Argentina/Buenos_Aires");
$server_time = date ('Y-m-d H:i:s');

if(isset($_POST['data']))
var_dump($_POST['data']);
    {
      $data = $_POST ['data'];
  
      if ($_POST['data'] !=NULL) 
      {
        $menu = "SELECT * FROM menuopciones WHERE idsuperior = $data";// $data
        $resultado = mysqli_query($conn,$menu);
       
          while ($row = mysqli_fetch_array($resultado)) 
          {
            echo $row [0];
            echo $row [1];
          }
          
      }
    } 
     //header(Location:index.p)

?>
