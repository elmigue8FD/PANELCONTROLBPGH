<?php
/**
 * Recursos utilizados
 */
require './models/FuncionesBePickler.php';
require './InfoSolicitadaBy.php';
/**
 * Variables Utilizadas
 */
$solicitadoBy   = '';
$nombreingrediente   = '';
$descripcion   = '';
$emailcreo      = '';
$resultado         = '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

    $solicitadoBy   = $_POST["solicitadoBy"];
    $nombreingrediente   = $_POST['nombreingrediente'];
    $descripcion   = $_POST['descripcion'];
    $emailcreo      = $_POST['emailcreo'];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setTblespecificingrediente($nombreingrediente,$descripcion,$emailcreo);

    if($resultado)
    {
        /**
         * Si es éxitos le mandamos los resultados a quien lo solicito.
         */
        InfoSolicitadaBy::solicitadaby($solicitaBy, $resultado);

    }else{
        /**
         * Si fallo manda a la función de fallo a quien lo solicito.
         */
        InfoSolicitadaBy::sinDatos($solicitaBy);
    }
}
/**
 * Desctruimos las variables para liberar memoria
 */
unset($solicitadoBy);
unset($nombreingrediente);
unset($descripcion);
unset($emailcreo);
unset($resultado);
?>