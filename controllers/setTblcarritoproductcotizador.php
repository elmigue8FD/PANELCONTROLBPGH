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
$numpersonas    = '';
$fchentrega     = '';
$srcimgproducto = '';
$idtblordencotizador = '';
$idtblproductcotizador = '';
$emailcreo      = '';
$idtblmotivocotizacion = '';
$resultado      = '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){
    $solicitadoBy           = $_POST["solicitadoBy"];
    $numpersonas            = $_POST['numpersonas'];
    $fchentrega             = $_POST['fchentrega'];
    $srcimgproducto         = $_POST['srcimgproducto'];
    $idtblordencotizador    = $_POST['idtblordencotizador'];
    $idtblproductcotizador  = $_POST['idtblproductcotizador'];
    $emailcreo              = $_POST['emailcreo'];
    $idtblmotivocotizacion  = $_POST['idtblmotivocotizacion'];
    /**
     * 
     */
    
   
        $resultado = FuncionesBePickler::setTblcarritoproductcotizador($numpersonas, $fchentrega, $srcimgproducto, $idtblordencotizador, $idtblproductcotizador, $emailcreo, $idtblmotivocotizacion);
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
unset($numpersonas);
unset($fchentrega);
unset($srcimgproducto);
unset($idtblordencotizador);
unset($idtblproductcotizador);
unset($emailcreo);
unset($idtblmotivocotizacion);
unset($resultado);
unset($_POST);
?>