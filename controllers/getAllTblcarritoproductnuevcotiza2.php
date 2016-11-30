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
$resultado      = '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){
    $solicitadoBy           = $_POST["solicitadoBy"];
    /**
     * Validamos que el pais no este registrado
     */
    
    //$resultado = FuncionesBePickler::setCheckTblcarritoproductcotizador($tipoevento,$sabores);
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
        $resultado = FuncionesBePickler::getAlltblcarritoproductnuevcotiza2();
        if($resultado){
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
unset($resultado);
?>