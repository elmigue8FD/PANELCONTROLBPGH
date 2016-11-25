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
$idtblcarritoproductnuevocotizador    = '';
$numpersonas    = '';
$fchentrega     = '';
$srcimgproducto = '';
$tipoevento = '';
$sabores = '';
$comentarios = '';
$idtblordencotizador = '';
$emailcreo      = '';
$resultado      = '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){
    $solicitadoBy           = $_POST["solicitadoBy"];
    $idtblcarritoproductnuevocotizador            = $_POST['idtblcarritoproductnuevocotizador'];
    $numpersonas            = $_POST['numpersonas'];
    $fchentrega             = $_POST['fchentrega'];
    $srcimgproducto         = $_POST['srcimgproducto'];
    $tipoevento    = $_POST['tipoevento'];
    $sabores  = $_POST['sabores'];
    $comentarios  = $_POST['comentarios'];
    $idtblordencotizador  = $_POST['idtblordencotizador'];
    $emailcreo              = $_POST['emailcreo'];
    /**
     * Validamos que el pais no este registrado
     */
    
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    if($resultado==0)
    {
        $resultado = FuncionesBePickler::setUpdateTblcarritoproductnuevcotiza($idtblcarritoproductnuevocotizador,$numpersonas,$idtblcarritoproductnuevocotizador,$fchentrega,$srcimgproducto,$tipoevento,$sabores,$comentarios,$idtblordencotizador,$emailmodifico);
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
unset($idtblcarritoproductnuevocotizador);
unset($numpersonas);
unset($fchentrega);
unset($srcimgproducto);
unset($tipoevento);
unset($sabores);
unset($comentarios);
unset($idtblordencotizador);
unset($emailcreo);
unset($resultado);
unset($_POST);
?>