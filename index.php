

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Chatbot Instituto Beltran</title>
    <link rel="stylesheet" href="style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> 
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
	</head>
    <style>
    .menu{
    position: relative;
    top: 150px;
    width: 100%;
}
    </style>

<body>
    <div class="wrapper">
        <div class="title">
                <div class="titulo">
                    <div class="beltran">INSTITUTO TECNOLOGICO BELTRAN</div>
                </div>
                <!--<div> 
                    <img src="./images/beltran.png" alt="">
                </div>-->
        </div>
        
        <div class="form">
            <div class="bot-inbox inbox">
                    <div class="icon">
                        <img src="./images/chat.png" >
                    </div>
                    <div class="msg-header">
                        <p>Soy Beltrix,
                        tu asistente virtual...
                        Elegi una opción?</p>
                    
                        <form enctype="multipart/form-data" action="message.php" method="POST">
                   
                            <?php
                            include ("AccesoDatos.php");
                            $menu = "SELECT * FROM menuOpciones WHERE idSuperior IS NULL";
                            $resultado = mysqli_query($conn,$menu);
                            while ($row = mysqli_fetch_array($resultado)) 
                            {?>
                            <div class="option">
                            <?php echo $row [3];
                            echo" - ";
                            echo $row [1]."<br>";?></div>
                            <?php } mysqli_free_result ($resultado)?>
                            <div class="option">
                            <?php echo "0- Volver al Menú Principal";?></div>
                        </form>
                    </div>
            </div>
        
                        
            
            
                            
    </div>

    <script>
        $(document).ready(function(){
            $("#send-btn").on("click", function(){
                $value = $("#data").val();
               
                $(".form").append('<div class="user-inbox inbox"><div class="icon"><img src="./images/usuarios.jpg" ></div><div class="msg-header"><p>'+ $value +'</p></div>');//$msg
                $("#data").val('');
                
                // iniciar el código ajax 
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: 'text='+$value,
                    
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><img src="./images/chat.png" ></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        //console.log($replay);
                        // cuando el chat baja, la barra de desplazamiento llega automáticamente al final
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>
    <div class="typing-field">
                <div class="input-data">
                    <input name="data" id="data" placeholder="Escribe aqui.." required>
                    <button id="send-btn">Enviar</button>
                </div>
                
    </div>
    <div class="boton"><a href="./logout.php">X</a></div>
</body>
</html>