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
$idtblproductcotizador='';
$resultado='';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

    $solicitadoBy=$_POST["solicitadoBy"];
    $idRegistro=$_POST["idtblproductcotizador"];
    $email=$_POST["email"];
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $nivel=$_POST["nivel"];
    $tabla='Tblproductcotizador';
    $nombreIdRegistro='idtblproductcotizador';
    $emailusuaelimino=$email;
    $idtblproductcotizador=$idRegistro;
    //OBTENEMOS TODOS LOS DATOS FALTANTES DEL REGISTRO A ELIMINAR
    $resultadoRegistro = FuncionesBePickler::getTblproductcotizador($idtblproductcotizador);
    //SI EL RESULTADO ES EXITOSO SEGUIMOS CON EL PASO DE EXTRACCION DE DATOS
    if($resultadoRegistro)
    {
        //RECORREMOS EL ARREGLO QUE CONTIENE LA INFORMACION 
        foreach ($resultadoRegistro as $row)
        {
            //CONCATENAMOS LA INFORMACION PARA OBTENER EL CAMPO DE REGISTRO
            $registro='id:'.$row["idtblproductcotizador"].
            ' diaselaboracion:'.$row["tblproductcotizador_nombre"].
            ' stock:'.$row["tblproductcotizador_descripcion"].
            ' precioreal:'.$row["tblproductcotizador_ingrediente"].
            ' preciobepickler:'.$row["tblproductcotizador_promcalificacion"].
            ' diametro:'.$row["tblproductcotizador_diaselaboracion"].
            ' largo:'.$row["tblproductcotizador_activado"].
            ' ancho:'.$row["tblevento_idtblevento"].
            ' porciones:'.$row["tblproveedor_idtblproveedor"].
            ' fchmodificacion:'.$row["tblproductcotizador_fchmodificacion"].
            ' fchcreacion:'.$row["tblproductcotizador_fchcreacion"].
            ' emailusuacreo:'.$row["tblproductcotizador_emailusuacreo"].
            ' emailusuamodifico:'.$row["tblproductcotizador_emailusuamodifico"];
            //ASIGAMOS A LAS VARIABLES LOS CAMPOS ULTIMOS DOS CAMPOS FALTANTES PARA COMPLETAR EL REGISTRO DE ELIMINACION
            $fchcreacion=$row["tblproductcotizador_fchcreacion"];
            $emailusuacreo=$row["tblproductcotizador_emailusuacreo"];
        }
    }else
    {
        //SI NO OBTIENE LOS DATOS ASIGNAMOS LAS VARIBLES CON UN MENSAJE DE ERROR PARA QUE NO ESTEN VACIAS
        $registro="error en la consuta";
        $fchcreacion="error en la consuta";
        $emailusuacreo="error en la consuta";
    }
    /**
     * MANDAMOS LOS PARÁMETROS Y LLAMAMOS A LA FUNCIÓN QUE EJECUTARA LA SENTENCIA Y RETORNA EL RESULTADO.
     */
    $resultadoHistorico = FuncionesBePickler::tblhistoricodeelimi($email,$nombre,$apellido,$nivel,$tabla,$registro,$idRegistro,$fchcreacion,$emailusuacreo,$emailusuaelimino);
    if($resultadoHistorico)
    {
        /**
         * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
         */
        $resultado = FuncionesBePickler::setDeleteTblproductcotizador($idtblproductcotizador);

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
    }else
    {
        /**
        * SI FALLO MANDA A LA FUNCIÓN DE FALLO A QUIEN LO SOLICITO.
        */
        InfoSolicitadaBy::sinDatos($solicitadoBy);
    }
}
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
unset($idtblproductcotizador);
unset($resultado);
?>