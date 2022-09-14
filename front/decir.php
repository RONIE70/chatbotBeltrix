<?php

include_once("../clases/AccesoDatos.php");
include_once ("../clases/MenuOpcion.php");


?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> 
    
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="./estilos/estiloLogin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
    

    <div class="form">
            <div class="bot-inbox inbox">
            
                    <div class="msg-header">
                
                    <!--    <form enctype="multipart/form-data" action="./back/decirHacer.php" method="POST">-->

                        <?php 
                        foreach ($menuDecir as $row) {
                        ?>
                        
                        <div class="option">
                            <?php echo $row [0];
                            echo" - ";
                            ?>
                            <?php echo $row [1];
                            ?></div>
                            <?php
                            }
                            ?>
                            <div class="option">
                            <?php echo "0- Volver al Menú Principal";?></div>
                      <!--  </form>-->
                    </div>
            </div> 
                             
    </div>