<?php
/**
 * Recursos utilizados
 */
require './../models/FuncionesBePickler.php';
require './InfoSolicitadaBy.php';
/**
 * Variables Utilizadas
 */
$solicitadoBy   = '';
$nombre      = '';
$ciudad     = '';
$direccion      = '';
$tel  = '';
$precio ='';
$emailmodifico  = ''; 
$idfotografo ='';
$resultado         = '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy	= $_POST["solicitadoBy"];
    $nombre      = $_POST['nombre'];
	$ciudad		= $_POST['ciudad'];
	$direccion			= $_POST['direccion'];	
    $tel        = $_POST['tel'];
	$precio       = $_POST['precio'];
	$emailmodifico	= $_POST['emailmodifico'];
	$idfotografo        = $_POST['idfotografo'];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setUpdateTblfotografo1($nombre,$ciudad,$direccion,$tel,$precio,$emailmodifico,$idfotografo);
                                    
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
unset($nombre);
unset($ciudad);
unset($direccion);
unset($tel);
unset($precio);
unset($emailmodifico);
unset($idfotografo);
unset($resultado);
?>