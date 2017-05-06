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
$nombre= '';
$direcc= '';
$tel= '';
$precio= '';
$idciudad='';
$emailcreo= '';
$resultado= '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy	= $_POST["solicitadoBy"];
    $nombre      = $_POST['nombre'];
	$direcc		= $_POST['direcc'];
	$tel			= $_POST['tel'];
	$precio		= $_POST['precio'];
	$idciudad		= $_POST['idciudad'];
	$emailcreo	= $_POST['emailcreo'];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setTblfotografo($nombre,$direcc,$tel,$precio,$idciudad,$emailcreo);

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
unset($direcc);
unset($tel);
unset($precio);
unset($idciudad);
unset($emailcreo);
unset($resultado);
?>