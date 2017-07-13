<?php 
//Recursos utilizados
require './../models/FuncionesBePickler.php';  //lLama el modelo
require './InfoSolicitadaBy.php'; //Este info es el encargado de retornar tal cual la respuesta
/**
 * Variables Utilizadas
 */
$solicitadoBy= ''; //Esta SIEMPRE va
$fchinicio='';
$fchfinal='';
$resultado= ''; //Siempre se queda
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){ //Valida la funci�n que no est� vac�a

	$solicitadoBy=$_POST["solicitadoBy"]; //Siempre va
    $fchinicio=$_POST["fchinicio"]; //El que lleva $ es el que est� dentro del archivo, el otro es c�mo va en el post
	$fchfinal=$_POST["fchfinal"];
    
    $resultado = FuncionesBePickler::getTblClienteGrafico($fchinicio, $fchfinal);

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
