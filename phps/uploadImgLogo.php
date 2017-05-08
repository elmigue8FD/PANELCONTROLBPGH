<?php
$version = $_POST["version"];
$success = "success";
$success1= FALSE;
//$success2= FALSE;

if (isset($_FILES["logoproveedor$version"]))
{
    $file = $_FILES["logoproveedor$version"];
    $nombre = $_POST["imglogo"];
    $tipo = $file["type"];
    $ruta_provisional = $file["tmp_name"];
    $size = $file["size"];
    $dimensiones = getimagesize($ruta_provisional);
    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "../../assests_general/proveedor/logoProveedor/"; 
   
    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
    {
      $success1= FALSE;
      echo "<p>Error, el archivo no es una imagen.</p>"; 

          }
    else if ($size > 1024*9999)
    {
      $success= FALSE;
      echo "Error, el tamaño máximo permitido es un 1MB";
    }
    else if ($width > 9999 || $height > 9999)
    {
      $success1= FALSE;        
     echo "Error la anchura y la altura maxima permitida es 500px";
    }
    else if($width < 0 || $height < 0)
    {
        $success1= FALSE;
       echo "Error la anchura y la altura mínima permitida es 60px";
    }
    else
    {   
        $success1 = TRUE;
        $src = $carpeta.$nombre;
        move_uploaded_file($ruta_provisional, $src);
        
    }
}
else
{
    $success1 = FALSE;
    echo "Error no tiene datos file";
}


if($success1){echo "$success";}else{echo "Verifique el tipo de imagenes, las dimensiones (min: 60px, max:500px) y/o el tamaño maximo (1MB) ";}
?>