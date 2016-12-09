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
$email='';
$nombre='';
$apellido='';
$nivel='';
$tabla='';
$idRegistro='';
$emailusuaelimino='';

$fchcreacion='';
$emailusuacreo='';

$idtblproductcomplem='';
$resultado= '';

$registro='';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    
    $email=$_POST["email"];
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $nivel=$_POST["nivel"];
    $idRegistro=$_POST["idtblproductcomplem"];
    $tabla='Tblproductcomplem';
    $nombreIdRegistro='idtblproductcomplem';
    $emailusuaelimino=$email;
    $idtblproductcomplem=$idRegistro;

    //OBTENEMOS TODOS LOS DATOS FALTANTES DEL REGISTRO A ELIMINAR
    $resultadoRegistro = FuncionesBePickler::getTblproductcomplem($idtblproductcomplem);
    //$json['resultadoRegistro']=$resultadoRegistro;
    //SI EL RESULTADO ES EXITOSO SEGUIMOS CON EL PASO DE EXTRACCION DE DATOS
    if($resultadoRegistro)
    {
        //RECORREMOS EL ARREGLO QUE CONTIENE LA INFORMACION 
        foreach ($resultadoRegistro as $row)
        {
            //CONCATENAMOS LA INFORMACION PARA OBTENER EL CAMPO DE REGISTRO
            $registro='id:'.$row["idtblproductcomplem"].
            ' nombre:'.$row["tblproductcomplem_nombre"].
            ' descripcion:'.$row["tblproductcomplem_descripcion"].
            ' seo:'.$row["tblproductcomplem_seo"].
            ' precioreal:'.$row["tblproductcomplem_precioreal"].
            ' preciobp:'.$row["tblproductcomplem_preciobp"].
            ' srcimg:'.$row["tblproductcomplem_srcimg"].
            ' activado:'.$row["tblproductcomplem_activado"].
            ' idtblproveedor:'.$row["tblproveedor_idtblproveedor"].
            ' stock:'.$row["tblproductcomplem_stock"].
            ' fchmodificacion:'.$row["tblproductcomplem_fchmodificacion"].
            ' fchcreacion:'.$row["tblproductcomplem_fchcreacion"].
            ' emailusuacreo:'.$row["tblproductcomplem_emailusuacreo"].
            ' emailusuamodifico:'.$row["tblproductcomplem_emailusuamodifico"];
            //ASIGAMOS A LAS VARIABLES LOS CAMPOS ULTIMOS DOS CAMPOS FALTANTES PARA COMPLETAR EL REGISTRO DE ELIMINACION
            $fchcreacion=$row["tblproductcomplem_fchcreacion"];
            $emailusuacreo=$row["tblproductcomplem_emailusuacreo"];
        }
    }else
    {
        //SI NO OBTIENE LOS DATOS ASIGNAMOS LAS VARIBLES CON UN MENSAJE DE ERROR PARA QUE NO ESTEN VACIAS
        //error en onbtener los datos
        $registro="error en la consuta";
        $fchcreacion="error en la consuta";
        $emailusuacreo="error en la consuta";
    }
    //$json['registro']=$registro;
    //$json['fchcreacion']=$fchcreacion;
    //$json['emailusuacreo']=$emailusuacreo;
    
    /**
     * MANDAMOS LOS PARÁMETROS Y LLAMAMOS A LA FUNCIÓN QUE EJECUTARA LA SENTENCIA Y RETORNA EL RESULTADO.
     */
    $resultadoHistorico = FuncionesBePickler::tblhistoricodeelimi($email,$nombre,$apellido,$nivel,$tabla,$registro,$idRegistro,$fchcreacion,$emailusuacreo,$emailusuaelimino);
    //$json['resultadoHistorico']=$resultadoHistorico;
    if($resultadoHistorico)
    {
        /**
         * MANDAMOS LOS PARÁMETROS Y LLAMAMOS A LA FUNCIÓN QUE EJECUTARA LA SENTENCIA Y RETORNA EL RESULTADO.
         */
        $resultado = FuncionesBePickler::setDeleteTblproductcomplem($idtblproductcomplem);
        if($resultado)
        {
            /**
             * SI ES ÉXITOS LE MANDAMOS LOS RESULTADOS A QUIEN LO SOLICITO.
             */
        	InfoSolicitadaBy::solicitadaby($solicitadoBy, $resultado);

        }else
        {
            /**
             * SI FALLO MANDA A LA FUNCIÓN DE FALLO A QUIEN LO SOLICITO.
             */
        	InfoSolicitadaBy::sinDatos($solicitadoBy);
        }
    }else
    {
        /**
        * SI FALLO MANDA A LA FUNCIÓN DE FALLO A QUIEN LO SOLICITO.
        */
        InfoSolicitadaBy::sinDatos($solicitadoBy);
    }
}
//echo  json_encode($json);
/**
 * Desctruimos las variables para liberar memoria
 */
unset($solicitadoBy);
unset($email);
unset($nombre);
unset($apellido);
unset($nivel);
unset($tabla);
unset($idRegistro);
unset($emailusuaelimino);
unset($fchcreacion);
unset($emailusuacreo);
unset($idtblproductcomplem);
unset($resultado);
?>