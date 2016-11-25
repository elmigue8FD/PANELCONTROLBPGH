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
$nombre='';
$email='';
$telefono='';
$ciudad='';
$telefono='';
$pais='';
$emailmodifico='';
$resultado='';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

    $solicitadoBy=$_POST["solicitadoBy"];
    $idtblordencotizador=$_POST["idtblordencotizador"];
    $nombre=$_POST["nombre"];
    $email=$_POST["email"];
    $telefono=$_POST["telefono"];
    $ciudad=$_POST["ciudad"];
    $pais=$_POST["pais"];
    $emailmodifico=$_POST["emailmodifico"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setUpdateTblordencotizador($idtblordencotizador,$nombre,$email,$telefono,$ciudad,$pais,$emailmodifico);

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
unset($idtblordencotizador);
unset($nombre);
unset($email);
unset($telefono);
unset($ciudad);
unset($pais);
unset($emailmodifico);
unset($resultado);
?>