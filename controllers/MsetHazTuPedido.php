<?php
session_start();
date_default_timezone_set('America/Mexico_City');
//print_r(getdate());
/**
 * Recursos utilizados
 */
require './../models/FuncionesBePickler.php';
require './InfoSolicitadaBy.php';
/**
 * Variables Utilizadas
 */
$solicitadoBy= '';
$pais='';
$ciudad='';
$tipoServicio='';
$fecha= '';
$hora= '';
$colonia='';
$cp='';
$numint='';
$numext='';
$calle='';
$municipio='';
$resultado='';
/**
 * Validamos que el array $_POST no es null.
 */
/*
$fecha='17/3/2017';
$fecha=str_replace("/", "-", $fecha);
echo 'fecha::'.$fecha;
$fecha_actual = strtotime(date("d-m-Y"));
$fecha_entrada = strtotime($fecha);
echo '<br/>fecha_actual::'.$fecha_actual.' fecha_entrada::'.$fecha_entrada;
if($fecha_actual > $fecha_entrada){
        echo "La fecha entrada ya ha pasado";
}else{
        echo "Aun falta algun tiempo";
}
*/
if (!empty($_POST)){
    //DATOS OBLIGATORIOS PARA CUALQUIER HAZ TU PEDIDO
    //CIUDAD, TIPO DE SERIVICIO, FECHA, HORA    
	$solicitadoBy=$_POST["solicitadoBy"];
    $pais=$_POST["pais"];
    $ciudad=$_POST["ciudad"];
    $tipoServicio=$_POST["tipoServicio"];
    $fecha=$_POST["fecha"];
    $hora=$_POST["hora"];
    //$diferenciaDias=$_POST["diferenciaDias"];
    

    
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
   
        if(!empty($solicitadoBy) && !empty($pais)  && !empty($ciudad) && !empty($tipoServicio) && !empty($fecha) && !empty($hora))
        {
            $fechaPHP=str_replace("/", "-", $fecha);
            $fecha_actual = new DateTime("now", new DateTimeZone('America/Mexico_City'));
            $fecha_hora = $fecha." ".$hora;
            $fecha_entrada = new DateTime($fecha_hora, new DateTimeZone('America/Mexico_City'));

            //se obtiene las horas por transcurrir
            $horastrascurrir =  $fecha_actual->diff($fecha_entrada)->format('%H');//horas
            $diasMinimos= $fecha_actual->diff($fecha_entrada)->format('%d');//dias       
            $totalHoras= ($diasMinimos*24)+($horastrascurrir);

            if($totalHoras<24){             
                $diferenciaDias=0;
            }else{                
                $diferenciaDias=$diasMinimos;
            }
            //echo json_encode(date("l", strtotime($fecha)).'<br/>fecha::'.$fecha.' fechaPHP::'.$fechaPHP.' fecha_actual::'.$fecha_actual.' fecha_entrada::'.$fecha_entrada);
            if($fecha_entrada >= $fecha_actual)
            {
                if($tipoServicio==1)
                {
                    $colonia=$_POST["colonia"];
                    if(!empty($colonia))
                    {
                        $_SESSION['sesion_activa_ecommerce'] = "1";        
                        //$_SESSION['idusuario'] = $row['idtblusuarioproveedor'];
                        $_SESSION['pais'] =$pais;
                        $_SESSION['ciudad'] = $ciudad;
                        $_SESSION['colonia'] = $colonia;
                        $_SESSION['tipoServicio'] = $tipoServicio;
                        $_SESSION['fecha'] =$fecha;
                        $_SESSION['hora'] = $hora;
                        $_SESSION['diferenciaDias'] = $diferenciaDias;
                        $_SESSION['diasemana'] = date("N", strtotime($fecha));
                        $resultado="exito"; 
                        /**
                         * Si es éxitos le mandamos los resultados a quien lo solicito.
                         */
                        //echo json_encode($resultado);
                        InfoSolicitadaBy::solicitadaby($solicitadoBy, $resultado);
                    }else
                    {
                        $resultado= 'error2';
                        /**
                         * Si fallo manda a la función de fallo a quien lo solicito.
                         */
                        
                        //echo json_encode($resultado);
                        InfoSolicitadaBy::solicitadaby($solicitadoBy, $resultado);
                    }
                }elseif ($tipoServicio==2) {  
                    /*
                    $cp=$_POST['cp'];
                    $numint=$_POST['numint'];
                    $numext=$_POST['numext'];
                    $calle=$_POST['calle'];
                    $colonia=$_POST['colonia'];
                    */

                    $cp=!empty($_POST['cp']) ? $_POST['cp'] : '';
                    $numint=!empty($_POST['numint']) ? $_POST['numint'] : '';
                    $numext=!empty($_POST['numext']) ? $_POST['numext'] : '';
                    $calle=!empty($_POST['calle']) ? $_POST['calle'] : '';
                    $colonia=!empty($_POST['colonia']) ? $_POST['colonia'] : '';
                    $municipio=!empty($_POST['municipio']) ? $_POST['municipio'] : '';

                    $_SESSION['sesion_activa_ecommerce'] = "1"; 

                    $_SESSION['pais'] =$pais;
                    $_SESSION['ciudad'] = $ciudad;
                    //$_SESSION['colonia'] = '';
                    $_SESSION['tipoServicio'] = $tipoServicio;
                    $_SESSION['fecha'] =$fecha;
                    $_SESSION['diferenciaDias'] = $diferenciaDias;
                    $_SESSION['diasemana'] = date("N", strtotime($fecha));
                    $_SESSION['cp']=$cp;
                    $_SESSION['numint']=$numint;
                    $_SESSION['numext']=$numext;
                    $_SESSION['calle']=$calle;
                    $_SESSION['colonia']=$colonia;
                    $_SESSION['municipio']=$municipio;
                    $resultado="exito"; 
                    
                    InfoSolicitadaBy::solicitadaby($solicitadoBy, $resultado);
                }else
                {
                    $resultado= 'error3';
                /**
                 * Si fallo manda a la función de fallo a quien lo solicito.
                 */
                
                //echo json_encode($resultado);
                InfoSolicitadaBy::solicitadaby($solicitadoBy, $resultado);
                }
            }else{
                $resultado= 'error4';
                InfoSolicitadaBy::solicitadaby($solicitadoBy, $resultado);
            }
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
/**
 * Desctruimos las variables para liberar memoria
 */
unset($solicitadoBy);
unset($pais);
unset($ciudad);
unset($tipoServicio);
unset($fecha);
unset($hora);
unset($colonia);
unset($cp);
unset($numint);
unset($numext);
unset($calle);
unset($municipio);
unset($resultado);
?>