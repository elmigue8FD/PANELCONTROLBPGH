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
$costotienda = '';
$costodomicilio= '';
$idtblcarritoproductnuevocotizador= '';
$idtblproveedor= '';
$emailcreo= '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

    $solicitadoBy   = $_POST["solicitadoBy"];
    $costotienda = $_POST['costotienda'];
    $costodomicilio= $_POST['costodomicilio'];
    $idtblcarritoproductnuevocotizador= $_POST['idtblcarritoproductnuevocotizador'];
    $idtblproveedor= $_POST['idtblproveedor'];
    $emailcreo= $_POST['emailcreo'];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setTblcostocotizacionproductnuevo($costotienda,$costodomicilio,$idtblcarritoproductnuevocotizador,$idtblproveedor,$emailcreo);

    if($resultado)
    {
        /**
         * Si es éxitos le mandamos los resultados a quien lo solicito.
         */
        InfoSolicitadaBy::solicitadaby($solicitadoBy, $resultado);

    }else{
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
unset($costotienda);
unset($costodomicilio);
unset($idtblcarritoproductnuevocotizador);
unset($idtblproveedor);
unset($emailcreo);
unset($resultado);
?>