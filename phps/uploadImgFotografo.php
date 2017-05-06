<?php
/**
 * 
 */
 
$success = "success";
$success1= FALSE;
$success2= FALSE;


if (isset($_FILES["foto1"]))
{
    $file = $_FILES["foto1"];
    $nombre = $_POST["foto1BD"];
    $tipo = $file["type"];
    $ruta_provisional = $file["tmp_name"];
    $size = $file["size"];
    $dimensiones = getimagesize($ruta_provisional);
    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "../assets/img/fotografos/";
	
    
    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
    {  $success1= FALSE;
      //echo "Error, el archivo no es una imagen"; 
    }
    else if ($size > 1024*9999)
    { $success1= FALSE; 
     // echo "Error, el tamaño máximo permitido es un 1MB";
    }
    else if ($width > 9999 || $height > 9999)
    {  $success1= FALSE; 
       // echo "Error la anchura y la altura maxima permitida es 500px";
    }
    else if($width < 0 || $height < 0)
    {   $success1= FALSE; 
        //echo "Error la anchura y la altura mínima permitida es 60px";
    }
    else
    {  $success1= TRUE;
        $src = $carpeta.$nombre;
        move_uploaded_file($ruta_provisional, $src);
        //echo "<img src='$src'>";
		
		
    }
}
else
{   $success1= FALSE; 
    echo 'Error no tiene datos file';
}


/**
 * 
 */

if (isset($_FILES["foto2"]))
{
		
    $file2 = $_FILES["foto2"];
    $nombre2 = $_POST["foto2BD"];
    $tipo2 = $file2["type"];
    $ruta_provisional2 = $file2["tmp_name"];
    $size2 = $file2["size"];
    $dimensiones2 = getimagesize($ruta_provisional2);
    $width2 = $dimensiones2[0];
    $height2 = $dimensiones2[1];
    $carpeta2 = "../assets/img/fotografos/";    
    if ($tipo2 != 'image/jpg' && $tipo2 != 'image/jpeg' && $tipo2 != 'image/png' && $tipo2 != 'image/gif')
    {
      $success2= FALSE;
      echo "Error, el archivo no es una imagen"; 
          }
    else if ($size2 > 1024*9999)
    {
      $success2= FALSE;
      echo "Error, el tamaño máximo permitido es un 1MB";
    }
    else if ($width2 > 9999 || $height2 > 9999)
    {
        $success2= FALSE;
        echo "Error la anchura y la altura maxima permitida es 500px";
    }
    else if($width2 < 0 || $height2 < 0)
    {
        $success2= FALSE;
       echo "Error la anchura y la altura mínima permitida es 60px";
    }
    else
    {
        $success2= TRUE;
        $src2 = $carpeta2.$nombre2;
        move_uploaded_file($ruta_provisional2, $src2);
    }
}
else
{
    $success2= FALSE;
    echo "Error no tiene datos file";
}

if($success1 && $success2){echo "$success";}else{
	echo "Verifique el tipo de imagenes, las dimensiones (min: 60px, max:500px) y/o el tamaño maximo (1MB) ";
	} 
 


?>