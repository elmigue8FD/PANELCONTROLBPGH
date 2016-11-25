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
$idtblcategproduct='';
$nombrecategproduct= '';
$srcimg= '';
$activado= '';
$idtblclasifcategproduct= '';
$emailmodif= '';
$resultado='';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $idtblcategproduct=$_POST["idtblcategproduct"];
    $nombrecategproduct=$_POST['nombrecategproduct'];
	$srcimg=$_POST['srcimg'];
	$activado=$_POST['activado'];
	$idtblclasifcategproduct=$_POST['idtblclasifcategproduct'];
    $emailmodif=$_POST['emailmodif'];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setUpdateTblcategproduct($idtblcategproduct,$nombrecategproduct, $srcimg, $activado, $idtblclasifcategproduct, $emailmodif);

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
unset($idtblcategproduct);
unset($nombrecategproduct);
unset($srcimg);
unset($activado);
unset($idtblclasifcategproduct);
unset($emailmodif);
unset($resultado);
?>