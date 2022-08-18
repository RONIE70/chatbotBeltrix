<?php

class Usuario
{
    public $id;
 	  public $nombre;
 	  public $email;    
  	public $password; 
  	public $idcategoria; 
  	public $foto_usuario;


    public static function ValidarUsuarioLogin($pEmail, $pPassword) 
    {
          $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
          $consulta =$objetoAccesoDato->RetornarConsulta(
          "SELECT id,nombre,foto_usuario from usuarios 
          where email='".$pEmail."' AND password='".$pPassword."'");
          $consulta->execute(); 
          
          if($consulta->rowCount() > 0){
          $fila = $consulta->fetch();
          
          $_SESSION['usuario_id']=$fila['id'];
          $_SESSION['usuario_nombre']=$fila['nombre'];
          $_SESSION['usuario_foto']=$fila['foto_usuario'];

            echo $fila['nombre'];
            echo '<br><br><img class="profile-img" src="'.$fila['foto_usuario'].'"  
            style="align:center;border-radius: 100px;max-width:50%;width:70px;height:70px;">';
           
          $ArraysResultante= MenuOpcion::TraerOpcionLogin();
                
            foreach ($ArraysResultante as $fila) {
                echo "<br>";
                echo $fila [0];
                echo" - ";
                echo $fila [1];
            }
                echo "<br>";
                echo "0- Volver al Menú Principal";
                 
        }
        else
        {
            $_SESSION['usuario_id']='';
            $_SESSION['usuario_nombre']='';
            echo '';
        }
        return true; 
      }
    
public static function fotoLogin($pEmail){
  $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
  $consulta = $objetoAccesoDato->RetornarConsulta(
  "SELECT id,foto_usuario FROM usuarios WHERE
   email='".$pEmail."'");
  
  $consulta->execute();
      
  if($consulta->rowCount() > 0){ 
        $fila = $consulta->fetch();
        $foto = $_SESSION['usuario_foto'];
        
        //'+ $value +'
        echo '<div class="user-inbox inbox"><div class="icon">
        <img style="align:center;border-radius:100px;max-width:50%;width:38px;height:28px;" src='."$foto".'></div><div class="msg-header"><p></p></div>';                               
        return $foto;
        
       }
      }  
    

    public static function GenerarConsultasUsuario($miConsulta) 
    {
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta($miConsulta);
		$consulta->execute();			
		return $consulta->fetchall(); 
  	}

    

    public static function EncontrarUnUsuario($pEmail) 
    {
		$ArraysResultante=Usuario::GenerarConsultasUsuario("SELECT id from usuarios where email='$pEmail'");

		return $ArraysResultante[0]["id"];		
	}
  
    


  
}
?>