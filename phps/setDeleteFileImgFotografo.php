<?php
$tblfotografocatalogo_img=$_POST["tblfotografocatalogo_img"];

unlink('../assets/img/fotografos/'.$tblfotografocatalogo_img); 
       
$resultado["success"] = 2;
$resultado["datos"] = $tblfotografocatalogo_img;   
echo json_encode($resultado); 
?>