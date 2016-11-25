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
$nombreproductcotizador='';
$descripcion='';
$ingrediente='';
$promcalificacion='';
$diaselaboracion='';
$activado='';
$idtblevento='';
$idtblproveedor='';
$emailcreo='';
$resultado='';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

    $solicitadoBy=$_POST["solicitadoBy"];
    $nombreproductcotizador=$_POST["nombreproductcotizador"];
    $descripcion=$_POST["descripcion"];
    $ingrediente=$_POST["ingrediente"];
    $promcalificacion=$_POST["promcalificacion"];
    $diaselaboracion=$_POST["diaselaboracion"];
    $activado=$_POST["activado"];
    $idtblevento=$_POST["idtblevento"];
    $idtblproveedor=$_POST["idtblproveedor"];
    $emailcreo=$_POST["emailcreo"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setTblproductcotizador($nombreproductcotizador,$descripcion,$ingrediente,$promcalificacion,$diaselaboracion,$activado,$idtblevento,$idtblproveedor,$emailcreo);

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
unset($nombreproductcotizador);
unset($descripcion);
unset($ingrediente);
unset($promcalificacion);
unset($diaselaboracion);
unset($activado);
unset($idtblevento);
unset($idtblproveedor);
unset($emailcreo);
unset($resultado);
?>