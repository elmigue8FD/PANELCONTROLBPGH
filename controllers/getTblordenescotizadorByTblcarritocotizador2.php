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
$idtblordencotizador='';
$idtblcarritoproductcotizador='';
$resultado='';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

    $solicitadoBy=$_POST["solicitadoBy"];
    $idtblordencotizador=$_POST["idtblordencotizador"];
    $idtblcarritoproductcotizador = $_POST["idtblcarritoproductcotizador"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::getTblordenescotizadorByTblcarritocotizador2($idtblordencotizador,$idtblcarritoproductcotizador);

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
unset($idtblevento);
unset($resultado);
?>