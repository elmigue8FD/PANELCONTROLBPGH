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
$idtblproveedorstatuspaquete='';
$diaspaquete='';
$diastranscurridos='';
$nummaxaltaproduct='';
$numaltaproduct='';
$nummaxaltaproductcomple='';
$numaltaproductcomple='';
$nummaxproductcot='';
$numproductcot='';
$idtblpaquete='';
$idtblproveedor='';
$emailmodifico='';
$resultado='';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

    $solicitadoBy=$_POST["solicitadoBy"];
    $idtblproveedorstatuspaquete=$_POST["idtblproveedorstatuspaquete"];
    $diaspaquete=$_POST["diaspaquete"];
    $diastranscurridos=$_POST["diastranscurridos"];
    $nummaxaltaproduct=$_POST["nummaxaltaproduct"];
    $numaltaproduct=$_POST["numaltaproduct"];
    $nummaxaltaproductcomple=$_POST["nummaxaltaproductcomple"];
    $numaltaproductcomple=$_POST["numaltaproductcomple"];
    $nummaxproductcot=$_POST["nummaxproductcot"];
    $numproductcot=$_POST["numproductcot"];
    $idtblpaquete=$_POST["idtblpaquete"];
    $idtblproveedor=$_POST["idtblproveedor"];
    $emailmodifico=$_POST["emailmodifico"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setUpdateTblproveedorstatuspaquete($idtblproveedorstatuspaquete,$diaspaquete,$diastranscurridos,$nummaxaltaproduct,$numaltaproduct,$nummaxaltaproductcomple,$numaltaproductcomple,$numproductcot,$idtblpaquete,$idtblproveedor,$emailmodifico);

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
unset($idtblproveedorstatuspaquete);
unset($diaspaquete);
unset($diastranscurridos);
unset($nummaxaltaproduct);
unset($numaltaproduct);
unset($nummaxaltaproductcomple);
unset($numaltaproductcomple);
unset($nummaxproductcot);
unset($numproductcot);
unset($idtblpaquete);
unset($idtblproveedor);
unset($emailmodifico);
unset($resultado);
?>