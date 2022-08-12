
<?php
//sesion start conservar la opcion superior

include("AccesoDato.php");
date_default_timezone_set("America/Argentina/Buenos_Aires");
$server_time = date ('Y-m-d H:i:s');

if(isset($_POST['data']))
var_dump($_POST['data']);
    {
      $data = $_POST ['data'];
  
      if ($_POST['data'] !=NULL) 
      {
        $menu = "SELECT * FROM menuopciones WHERE idsuperior = '$data'";// $data
        $resultado = mysqli_query($conn,$menu);
       
          while ($row = mysqli_fetch_array($resultado)) 
          {
            
            echo $row [1];
          }
          
      }
    } 
     //header(Location:index.p)

?>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
html,body{
    display: grid;
    height: 100%;
    place-items: center;
}

::selection{
    color: #fff;
    background: #007bff;
}

::-webkit-scrollbar{
    width: 3px;
    border-radius: 25px;
}
::-webkit-scrollbar-track{
    background: #f1f1f1;
}
::-webkit-scrollbar-thumb{
    background: #ddd;
}
::-webkit-scrollbar-thumb:hover{
    background: #ccc;
}

.wrapper{
    width: 370px;
    background: #fff;
    border-radius: 5px;
    border: 1px solid lightgrey;
    border-top: 0px;
}
.wrapper .title{
    background: #007bff;
    color: #fff;
    font-size: 20px;
    font-weight: 500;
    line-height: 60px;
    text-align: center;
    border-bottom: 1px solid #006fe6;
    border-radius: 5px 5px 0 0;
}

.wrapper .form{
    padding: 20px 15px;
    min-height: 500px;
    max-height: 300px;
    overflow-y: auto;
}
.wrapper .form .inbox{
    width: 100%;
    display: flex;
    align-items: baseline;
}
.wrapper .form .user-inbox{
    justify-content: flex-end;
    margin: 13px 0;
    background-color: #849dd7;
}
.wrapper .form .inbox .icon{
    height: 40px;
    width: 40px;
    color: #fff;
    text-align: center;
    line-height: 40px;
    border-radius: 50%;
    font-size: 18px;
    background: #007bff;
}
.input-data{
    background-color: #007bff;
}



.wrapper .form .inbox .msg-header{
    max-width: 70%;
    margin-left: 10px;
    background-color: #bbc9e9;
}
.form .inbox .msg-header p{
    color: #fff;
    background: #007bff;
    border-radius: 10px;
    border-color: #333;
    padding: 8px 10px;
    font-size: 14px;
    word-break: break-all;
}
.form .inbox .msg-header li{
    color: #fff;
    background: #007bff;
    border-radius: 10px;
    border-color: #333;
    padding: 8px 10px;
    font-size: 14px;
    
}
.menues {
    color: #fff;
    background: #007bff;
    border-radius: 10px;
    border-color: #333;
    padding: 8px 10px;
    font-size: 14px;
    word-break: break-all;
}
.form .user-inbox .msg-header p{
    color: #333;
    
}
.user-inbox .inbox{
    background-color: #ccc;
}

.user-inbox .msg-header {
 background-color: #d4922f;
}
.wrapper .typing-field{
    display: flex;
    height: 60px;
    width: 100%;
    align-items: center;
    justify-content: space-evenly;
    background: #674dcc;
    border-top: 1px solid #d9d9d9;
    border-radius: 0 0 5px 5px;
}
.wrapper .typing-field .input-data{
    height: 40px;
    width: 360px;
    position: relative;
    
}
.wrapper .typing-field .input-data input{
    height: 100%;
    width: 100%;
    outline: none;
    border: 2px solid transparent;
    padding: 0 80px 0 15px;
    border-radius: 3px;
    font-size: 15px;
    background: rgb(213, 213, 240);
    transition: all 0.3s ease;
    
}
.typing-field .input-data input:focus{
    border-color: rgba(92, 124, 158, 0.8);
    
}
.input-data input::placeholder{
    color: #0b0b0b26;
    transition: all 0.3s ease;
   
}
.input-data input:focus::placeholder{
    color: #6d83b6;
}
.wrapper .typing-field .input-data button{
    position: absolute;
    right: 5px;
    top: 50%;
    height: 30px;
    width: 65px;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    outline: none;
    opacity: 0;
    pointer-events: none;
    border-radius: 3px;
    background: #007bff;
    border: 1px solid #007bff;
    transform: translateY(-50%);
    transition: all 0.3s ease;
}
.wrapper .typing-field .input-data input:valid ~ button{
    opacity: 1;
    pointer-events: auto;
}
.typing-field .input-data button:hover{
    background: #0d417e;
}
.msg-header{
    font-size: small;
}
.beltran {
    display: flex;
    justify-content: space-around;
    
}
.menu{
    position: relative;
    top: 250px;
    width: 100%;
}
#menuone{
    background-color: #006fef;
}
