<?php
    require 'phpqrcode/qrlib.php';
    include_once ("Cliente.php");
   

  $dir = 'temp/';
  
  if(!file_exists($dir))
    mkdir($dir);
  
  $filename = $dir.'test.png';
  
  $tamanio = 8;
  $level = 'M';
  $frameSize = 1;
  $contenido = "telefono";

  QRcode::png($contenido, $filename, $level, $tamanio, $frameSize);
  
  echo '<img src="'.$filename.'" />';
  ?>







<?php/*
	
	require 'phpqrcode/qrlib.php';
	
	$dir = 'temp/';
	
	if(!file_exists($dir))
		mkdir($dir);
	
	$filename = $dir.'test.png';
	
	$tamanio = 15;
	$level = 'H';
	$frameSize = 1;
	$contenido = 'Hola Mundo';

	QRcode::png($contenido, $filename, $level, $tamanio, $frameSize);
	
	echo '<img src="'.$filename.'" />';

?>