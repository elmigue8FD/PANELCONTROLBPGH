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
$idsistemapago='';
$nombresistemapago='';
$comision='';
$llavepu='';
$llavepr='';
$activado='';
$emailmodifico='';
$resultado= '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $idsistemapago=$_POST["idsistemapago"];
    $nombresistemapago=$_POST["nombresistemapago"];
    $comision=$_POST["comision"];
    $llavepu=$_POST["llavepu"];
    $llavepr=$_POST["llavepr"];
    $activado=$_POST["activado"];
    $emailmodifico=$_POST["emailmodifico"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setUpdateTblsistemapago($idsistemapago,$nombresistemapago,$comision,$llavepu,$llavepr,$activado,$emailmodifico);

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
unset($idsistemapago);
unset($nombresistemapago);
unset($comision);
unset($llavepu);
unset($llavepr);
unset($activado);
unset($emailmodifico);
unset($resultado);
?>