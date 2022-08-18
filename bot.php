<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Chatbot Instituto Beltran</title>
    <link rel="stylesheet" href="style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
	</head>

    <body>
    <div class="wrapper">
        
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                
                <div class="msg-header">

                <p>Te puedo ayudar?</p>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="Escribe aqui.." required>
                <button id="send-btn">Enviar</button>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#send-btn").on("click", function(){
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');
                
                // start ajax code
                $.ajax({
                    url: 'messagepreguntas.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>
    
</body>
</html>

