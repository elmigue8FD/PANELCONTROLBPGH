<?php
$tblproveedorimg_srcimg=$_POST["tblproveedorimg_srcimg"];

unlink('../assests_general/proveedor/logoProveedor/'.$tblproveedorimg_srcimg);
       
$resultado["success"] = 2;
$resultado["datos"] = $tblproveedorimg_srcimg; 
echo json_encode($resultado); 
?>