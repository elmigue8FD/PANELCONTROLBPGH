<?php
error_reporting(0);
require './Msession.php';
date_default_timezone_set('America/Monterrey');
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
//$tipoServicio='';
$fecha= '';
$hora= '';
$colonia='';
$cp='';
$numint='';
$numext='';
$calle='';
$municipio='';
$nombreRecibe='';
$celularRecibe='';
$resultado='';
/**
 * Validamos que el array $_POST no es null.
 */

if (!empty($_POST)){
    //DATOS OBLIGATORIOS PARA CUALQUIER HAZ TU PEDIDO
    //CIUDAD, TIPO DE SERIVICIO, FECHA, HORA    
	$solicitadoBy=$_POST["solicitadoBy"];
    $calle=$_POST["calle"];
    $numext=$_POST["numext"];
    $numint=$_POST["numint"];
    $colonia=$_POST["colonia"];
    $codigoPostal=$_POST["codigoPostal"]; 
    $nombrerecibe=$_POST["nombreRecibe"];
    $celularrecibe=$_POST["celularRecibe"];
    $indicaciones=$_POST["indicaciones"];
    $direccion=$_POST["direccion"];

    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
   
        //if(!empty($solicitadoBy) && !empty($calle)  && !empty($numext) && !empty($colonia) && !empty($codigoPostal) && !empty($nombrerecibe) && !empty($celularrecibe))
        if(!empty($nombrerecibe) && !empty($celularrecibe)&& !empty($direccion))
        {
            //$_SESSION['idusuario'] = $row['idtblusuarioproveedor'];
            
            $diferenciaDias=(isset($_SESSION['diferenciaDias'])) ?  $_SESSION['diferenciaDias'] :  0;
            
            //$tiposervicio=(isset($_SESSION['tipoServicio'])) ?  $_SESSION['tipoServicio'] :  '';
            //echo 'antes de convertir::'.$_SESSION['tipoServicio'].'</br>';            
            //$tipoServicio=$_SESSION['tipoServicio'];
            $otraVairable=($_SESSION['tipoServicio']==1) ? "Recoger en Establecimiento" :  "Servicio a Domicilio";
            $tiposervicio=$otraVairable;
            //echo 'otraVairable::'.$otraVairable;
            $_SESSION['envio_nombre'] =$nombre;
            $_SESSION['envio_calle'] =$calle;
            $_SESSION['envio_numext'] = $numext;
            $_SESSION['envio_numint'] = $numint;
            $_SESSION['envio_colonia'] = $colonia;
            $_SESSION['envio_nombreRecibe'] = $nombrerecibe;
            $_SESSION['envio_celularRecibe'] = $celularrecibe;
            $_SESSION['envio_codigoPostal'] = $codigoPostal;
            $_SESSION['envio_indicaciones'] = $indicaciones;
            $_SESSION['envio_direccion'] = $direccion;
            $_SESSION['envio_ciudad'] = (isset($_SESSION['ciudad'])) ?  $_SESSION['ciudad'] :  '';
            $_SESSION['envio_pais'] = (isset($_SESSION['pais'])) ?  $_SESSION['pais'] :  '';

            $tipodepedido=($diferenciaDias>0) ? 'Sobre pedido' :  'Hoy';
            $idtblordencompra=(isset($_SESSION['idtblordencompra'])) ?  $_SESSION['idtblordencompra'] :  '';                        
          

            //$tipodepedido=$tipodepedido;
            //$tiposervicio=$tiposervicio;
            //$calle='';
            //$numint='';
            $fchagendado=(isset($_SESSION['fecha'])) ?  $_SESSION['fecha'] :  '';
            $hragendado=(isset($_SESSION['hora'])) ?  $_SESSION['hora'] :  '';
            //$numext='';
            //$colonia='';
            $ciudad=(isset($_SESSION['ciudad'])) ?  $_SESSION['ciudad'] :  '';
            $pais=(isset($_SESSION['pais'])) ?  $_SESSION['pais'] :  '';
            $codipost=(isset($_SESSION['cp'])) ?  $_SESSION['cp'] :  '';
            $nombreempresa='';
            $rfc='';
            //$nombrerecibe='';
            //$celularrecibe='';

            $referencia1=$indicaciones;
            $referencia2='';                       
            $emailcreo='miguel.salas@bepickler.com';
            //$idtblordencompra='123456';
            $resultado="exito"; 
            //echo ' tipodepedido::'.$tipodepedido.' tiposervicio::'.$tiposervicio.' calle::'.$calle.' numint::'.$numint.' fchagendado::'.$fchagendado.' hragendado::'.$hragendado.' numext::'.$numext.' colonia::'.$colonia.' ciudad::'.$ciudad.' pais::'.$pais.' codipost::'.$codipost.' nombreempresa::'.$nombreempresa.' rfc::'.$rfc.' nombrerecibe::'.$nombrerecibe.' celularrecibe::'.$celularrecibe.' referencia1::'.$referencia1.' referencia2::'.$referencia2.' emailcreo::'.$emailcreo.' idtblordencompra::'.$idtblordencompra;
            if(isset($_SESSION['idcliente']))
            {
                $resultado = FuncionesBePickler::setTtbldatosenvio($tipodepedido,$tiposervicio,$calle,$numint,$fchagendado,$hragendado,$numext,$colonia,$ciudad,$pais,$codipost,$nombreempresa,$rfc,$nombrerecibe,$celularrecibe,$referencia1,$referencia2,$emailcreo,$idtblordencompra);
                $_SESSION['iddatosenvio']=$resultado;
            }
            //var_dump($resultado);
            
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