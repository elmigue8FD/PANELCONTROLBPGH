<?php
$tblproductimg_srcimg=$_POST["tblproductimg_srcimg"];
unlink('./../views/assests_general/productos/linea/'.$tblproductimg_srcimg);

$resultado["success"] = 2;
$resultado["datos"] = $tblproductimg_srcimg; 
echo json_encode($resultado);
?>