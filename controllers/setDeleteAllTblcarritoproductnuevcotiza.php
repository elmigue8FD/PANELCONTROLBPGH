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
$idtblordencotizador    = '';
$resultado      = '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){
    $solicitadoBy           = $_POST["solicitadoBy"];
    $idtblordencotizador            = $_POST['idtblordencotizador'];
    /**
     * Validamos que el pais no este registrado
     */
    
    //$resultado = FuncionesBePickler::setCheckTblcarritoproductcotizador($tipoevento,$sabores);
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    if($resultado==0)
    {
        $resultado = FuncionesBePickler::setDeleteAllTblcarritoproductnuevcotiza($idtblordencotizador);
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
    }else{
        InfoSolicitadaBy::registroRepetido($solicitadoBy);
    }    
}
/**
 * Desctruimos las variables para liberar memoria
 */
unset($solicitadoBy);
unset($idtblordencotizador);
unset($resultado);
unset($_POST);
?>