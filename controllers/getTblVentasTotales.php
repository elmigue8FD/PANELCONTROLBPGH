<?php
require './../models/FuncionesBePickler.php'; //lLama el modelo
require './InfoSolicitadaBy.php'; //Este info es el encargado de retornar tal cual la respuesta
$solicitadoBy= ''; //Esta SIEMPRE va
$fchinicio='';
$fchfinal='';
if (!empty($_POST)){ //Valida la funci�n que no est� vac�a

	$solicitadoBy=$_POST["solicitadoBy"]; //Siempre va
    $fchinicio=$_POST["fchinicio"]; //El que lleva $ es el que est� dentro del archivo, el otro es c�mo va en el post
	$fchfinal=$_POST["fchfinal"];
    
    $resultado = FuncionesBePickler::getTblVentasTotales($fchinicio, $fchfinal);

    if($resultado)
    {
        
    	InfoSolicitadaBy::solicitadaby($solicitadoBy, $resultado);

    }else
    {
        
    	InfoSolicitadaBy::sinDatos($solicitadoBy);
    }
}
unset($solicitadoBy);
unset($fchinicio);
unset($fchfinal);
unset($resultado);
?>
