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
$idtblproduct='';
$resultado= '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $idRegistro=$_POST["idtblproduct"];
    $email=$_POST["email"];
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $nivel=$_POST["nivel"];
    $tabla='Tblproducto';
    $nombreIdRegistro='idtblproduct';
    $emailusuaelimino=$email;
    $idtblproduct=$idRegistro;
    //OBTENEMOS TODOS LOS DATOS FALTANTES DEL REGISTRO A ELIMINAR
    $resultadoRegistro = FuncionesBePickler::getTblproducto($idtblproduct);
    //SI EL RESULTADO ES EXITOSO SEGUIMOS CON EL PASO DE EXTRACCION DE DATOS
    if($resultadoRegistro)
    {
        //RECORREMOS EL ARREGLO QUE CONTIENE LA INFORMACION 
        foreach ($resultadoRegistro as $row)
        {
            //CONCATENAMOS LA INFORMACION PARA OBTENER EL CAMPO DE REGISTRO
            $registro='id:'.$row["idtblproducto"].
            ' nombre:'.$row["tblproducto_nombre"].
            ' descripcion:'.$row["tblproducto_descripcion"].
            ' ingredientes:'.$row["tblproducto_ingredientes"].
            ' seo:'.$row["tblproducto_seo"].
            ' promcalificacion:'.$row["tblproducto_promcalificacion"].
            ' activado:'.$row["tblproducto_activado"].
            ' idtblproveedor:'.$row["tblproveedor_idtblproveedor"].
            ' idtblcategproduct:'.$row["tblcategproduct_idtblcategproduct"].
            ' idtblclasifproduct:'.$row["tblclasifproduct_idtblclasifproduct"].
            ' fchmodificacion:'.$row["tblproducto_fchmodificacion"].
            ' fchcreacion:'.$row["tblproducto_fchcreacion"].
            ' emailusuacreo:'.$row["tblproducto_emailusuacreo"].
            ' emailusuamodifico:'.$row["tblproducto_emailusuamodifico"];
            //ASIGAMOS A LAS VARIABLES LOS CAMPOS ULTIMOS DOS CAMPOS FALTANTES PARA COMPLETAR EL REGISTRO DE ELIMINACION
            $fchcreacion=$row["tblproducto_fchcreacion"];
            $emailusuacreo=$row["tblproducto_emailusuacreo"];
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
        $resultado = FuncionesBePickler::setDeleteTblproducto($idtblproduct);

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
unset($idtblproduct);
unset($resultado);
?>