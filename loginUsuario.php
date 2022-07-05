<link rel="stylesheet" href="stylesign.css">

<div class="container bootstrap snippets bootdey">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            
            <div class="account-wall">
                <img class="profile-img" src="https://bootdey.com/img/Content/avatar/avatar7.png"
                    alt="">
                <form class="form-signin" action="loginUsuarioHacer.php" method="POST">
                <input name="email" type="text" class="form-control" placeholder="Email" required autofocus>
                <input name="password" type="password" class="form-control" placeholder="Clave" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Ingresar</button>
                <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">
                    Recordarme
                </label>
                <a href="#" class="pull-right need-help">Ayuda? </a><span class="clearfix"></span>
                </form>
            </div>
        
        </div>
    </div>
</div>

<script>
        $(document).ready(function(){
            $("#send-btn").on("click", function(){
                $value = $("#email").val();
                $value = $("#password").val();
               
                $(".form").append('<div class="user-inbox inbox"><div class="icon"><img src="./images/usuarios.jpg" ></div><div class="msg-header"><p>'+ $value +'</p></div>');//$msg
                $("#email").val('');
                $("#password").val('');
                
                // iniciar el código ajax 
                $.ajax({
                    url: 'loginUsuarioHacer.php',
                    type: 'POST',
                    data: 'text='+$value,
                    
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><img src="./images/chat.png" ></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        //$(".form").append($server_time);
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