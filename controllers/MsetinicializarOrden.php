<?php
require './Msession.php';
//session_start();
require './../models/FuncionesBePickler.php';
require './InfoSolicitadaBy.php';
//date_default_timezone_set('America/Monterrey');
/**
 * Variables Utilizadas
 */
$solicitadoBy= '';
$resultado='';

if (!empty($_POST)){
    //DATOS OBLIGATORIOS PARA CUALQUIER HAZ TU PEDIDO
    //CIUDAD, TIPO DE SERIVICIO, FECHA, HORA    
	$solicitadoBy=$_POST["solicitadoBy"];
    

    
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
   
        if(!empty($solicitadoBy))
        {
            
                        unset($_SESSION['sesion_activa_ecommerce'])       ;
                        //$_SESSION['idusuario'] = $row['idtblusuarioproveedor'];
                        unset($_SESSION['idtblordencompra']);
                        $resultado="exito";  
                        /**
                         * Si es éxitos le mandamos los resultados a quien lo solicito.
                         */
                        //echo json_encode($resultado);
                        InfoSolicitadaBy::solicitadaby($solicitadoBy, $resultado);
        }else
        {
            $resultado= 'error1';
            /**
             * Si fallo manda a la función de fallo a quien lo solicito.
             */
            
            //echo json_encode($resultado);
            InfoSolicitadaBy::solicitadaby($solicitadoBy, $resultado);
        }
    
}
//print_r($_SESSION);
/**
 * Desctruimos las variables para liberar memoria
 */
unset($solicitadoBy);

unset($resultado);
?>