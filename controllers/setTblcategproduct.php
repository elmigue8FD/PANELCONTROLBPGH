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
$nombrecategproduct= '';
$srcimg= '';
$activado= '';
$idtblclasifcategproduct= '';
$emailcreo= '';
$resultado='';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $nombrecategproduct=$_POST['nombrecategproduct'];
	$srcimg=$_POST['srcimg'];
	$activado=$_POST['activado'];
	$idtblclasifcategproduct=$_POST['idtblclasifcategproduct'];
    $emailcreo=$_POST['emailcreo'];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setTblcategproduct($nombrecategproduct, $srcimg, $activado, $idtblclasifcategproduct, $emailcreo);

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
unset($nombrecategproduct);
unset($srcimg);
unset($activado);
unset($idtblclasifcategproduct);
unset($emailcreo);
unset($resultado);
?>