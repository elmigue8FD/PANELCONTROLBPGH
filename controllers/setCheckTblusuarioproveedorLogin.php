<?php
session_start();
/**
 * Recursos utilizados
 */
require './../models/FuncionesBePickler.php';
require './InfoSolicitadaBy.php';
/**
 * Variables Utilizadas
 */
$solicitadoBy= '';
$passwordproveedor='';
$emailproveedor='';
$resultado= '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $passwordproveedor=$_POST["passwordproveedor"];
    $emailproveedor=$_POST["emailproveedor"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setCheckTblusuarioproveedorLogin($emailproveedor,$passwordproveedor);
    if($resultado)
    {   
        $_SESSION['sesion_activa1'] = "1";
        foreach( $resultado as $row )  
        {
            $_SESSION['idusuario'] = $row['idtblusuarioproveedor'];

            $_SESSION['nombre'] = $row['tblusuarioproveedor_nombre'];
            $_SESSION['apellido'] = $row['tblusuarioproveedor_apellido'];
            $_SESSION['celular'] = $row['tblusuarioproveedor_celular'];
            $_SESSION['password'] = $row['tblusuarioproveedor_password'];

            $_SESSION['idtblproveedor']=$row['tblproveedor_idtblproveedor'];
            $_SESSION['usuario'] = $row['tblusuarioproveedor_email'];
            $_SESSION['nivel'] = $row['tblniveleacceso_idtblniveleacceso'];
        }
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
unset($passwordproveedor);
unset($emailproveedor);
unset($resultado);
?>