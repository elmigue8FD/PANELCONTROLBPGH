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
$nombrepais     = '';
$idioma         = '';
$srcimg         = '';
$activado       = '';
$emailcreo      = '';
$resultado      = '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){
	$solicitadoBy  = $_POST["solicitadoBy"];
	$nombrepais	   = $_POST['nombrepais'];
	$idioma        = $_POST['idioma'];
    $srcimg        = $_POST['srcimg'];
	$activado      = $_POST['activado'];
	$emailcreo     = $_POST['emailcreo'];
    /**
     * Validamos que el pais no este registrado
     */
    
    $resultado = FuncionesBePickler::getCheckTblpais($nombrepais);
    //echo '<br/>validacion de nombre repetido'.$resultado;
    //echo '<br/>'.gettype($resultado);
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    if($resultado==0)
    {
        $resultado = FuncionesBePickler::setTblpais($nombrepais, $idioma, $srcimg, $activado, $emailcreo);
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
unset($nombrepais);
unset($idioma);
unset($srcimg);
unset($activado);
unset($emailcreo);
unset($resultado);
unset($_POST);
?>