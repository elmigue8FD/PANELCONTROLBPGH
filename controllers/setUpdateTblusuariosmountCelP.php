<?php
/**
 * Recursos utilizados
 */
require './../models/FuncionesBePickler.php';
require './InfoSolicitadaBy.php';
/**
 * Variables Utilizadas
 */
$solicitadoBy= '';
$idusuario='';
$cel='';
$emailmodifico='';
$pass='';
$resultado= '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $idusuario=$_POST["idusuario"];
    $cel=$_POST["cel"];   
    $emailmodifico=$_POST["emailmodifico"];
	$pass=$_POST["pass"];
	$pass = hash("sha256",$pass);
	
	
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setUpdateTblusuariosmountCelP($idusuario,$cel,$emailmodifico,$pass);

    if($resultado)
    {
        /**
         * Si es éxitos le mandamos los resultados a quien lo solicito.
         */
    	InfoSolicitadaBy::solicitadaby($solicitadoBy, $resultado);

    }else
    {
        /**
         * Si fallo manda a la función de fallo a quien lo solicito.
         */
    	InfoSolicitadaBy::sinDatos($solicitadoBy);
    }
}
/**
 * Desctruimos las variables para liberar memoria
 */
unset($solicitadoBy);
unset($idusuario);
unset($cel);
unset($emailmodifico);
unset($pass);
unset($resultado);
?>