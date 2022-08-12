    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> 
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
    <link rel="stylesheet" href="stylesign.css">



<div class="container bootstrap snippets bootdey">
    
        
            
            <div class="account-wall">
                <img class="profile-img" src="https://bootdey.com/img/Content/avatar/avatar7.png"
                    alt="">
                <form id="formingreso" class="form-signin" method="POST">
                <input name="email" id="email" type="text" class="form-control" placeholder="Email" required autofocus>
                <input name="password" id="password" type="password" class="form-control" placeholder="Clave" required>
                <button id="ingresar" class="btn btn-lg btn-primary btn-block" type="submit">
                    Ingresar</button>
                <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">
                    Recordarme
                </label>
                <a href="#" class="pull-right need-help">Ayuda? </a><span class="clearfix"></span>
                </form>
            </div>
            
        
    
    
</div>

           
<script type="text/javascript">
             $(document).ready(function(){        
                $("#ingresar").click(function(){
                
                var datos= $('#formingreso').serialize();
//alert(datos);
//return false;
                $.ajax({
                    type: 'POST',
                    url: 'loginUsuarioHacer.php',
                    data: datos,
                    success:function(resp){
                        //alert(resp)
                        if(resp==1){
                            alert("usuario admitido");
                        }else{
                            alert("no se encuentra el usuario");
                        }
                    }
 
            });   
             return false;   
        }); 
    });  
</script>

    <!--<div class="typing-field">
                <div class="input-data">
                    <input name="data" id="data3" placeholder="Escribe aqui.." required>
                    <button id="send-btn">Enviar</button>
                </div>
                
    </div>-->
    