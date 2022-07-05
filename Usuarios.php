<?php

class Usuario
{
    public $id;
 	  public $nombre;
 	  public $email;    
  	public $clave; 
  	public $rol_id; 
  	public $idMensaje;

      public static function GenerarConsultasUsuario($miConsulta) 
    {
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta($miConsulta);
		$consulta->execute();			
		return $consulta->fetchall(); 
  	}

      public static function ExisteusuarioLogin($pEmail, $pClave) 
    {
          $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
          $consulta =$objetoAccesoDato->RetornarConsulta("SELECT count(nombre) as nombre from usuarios where email='$pEmail' and clave='$pClave'");
          $consulta->execute(); 
          $ArraysResultante= $consulta->fetchall(); 
          return $ArraysResultante[0]["nombre"];		
    }

      public static function EncontrarUnUsuario($pEmail) 
    {
		$ArraysResultante=Usuario::GenerarConsultasUsuario("SELECT id from usuarios where email='$pEmail'");

		return $ArraysResultante[0]["id"];		
	}
}
?>