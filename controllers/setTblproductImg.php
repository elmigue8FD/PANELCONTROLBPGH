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
$srcimg='';
$idtblproducto='';
$emailcreo='';
$resultado= '';
$resultadoId='';
$row='';
$idtblproductimg='';
$emailmodifico='';
$resultadoUpdateNombreImg='';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $srcimg=$_POST["srcimg"];
    $idtblproducto=$_POST["idtblproducto"];
    $emailcreo=$_POST["emailcreo"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setTblproductImg($srcimg,$idtblproducto,$emailcreo);

    if($resultado)
    {
        /**
         * Buscamos el registro para obtener el id del ultimo registro
         */
        $resultadoId =TRUE;
        $resultadoId = FuncionesBePickler::getTblproductImgIdtblproductimg($srcimg,$idtblproducto,$emailcreo);
        if($resultadoId)
        {
            /**
             * Obtenemos el id del ultimo registro insertado con los nombres el idproducto y emailcreo dados
             */
            foreach ($resultadoId as $row) {
                $idtblproductimg= $row["idtblproductimg"];
            }
            /**
             * [$srcimg Modificamos el valor para que el nombre sea unico]
             */
            $srcimg="i_".$idtblproductimg."_".$srcimg;
            $emailmodifico=$emailcreo;
            $resultadoUpdateNombreImg=  FuncionesBePickler::setUpdateTblproductImg($idtblproductimg,$srcimg,$idtblproducto,$emailmodifico);
            if($resultadoUpdateNombreImg)
            {
                /**
                * Si es éxitos le mandamos los resultados a quien lo solicito.
                */
                InfoSolicitadaBy::solicitadaby($solicitadoBy, $srcimg);
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
            * Si fallo manda a la función de fallo a quien lo solicito.
            */
            InfoSolicitadaBy::sinDatos($solicitadoBy);
        }
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
    * Si fallo manda a la función de fallo a quien lo solicito.
    */
    InfoSolicitadaBy::sinDatos($solicitadoBy);
}
/**
 * Desctruimos las variables para liberar memoria
 */
unset($solicitadoBy);
unset($srcimg);
unset($idtblproducto);
unset($emailcreo);
unset($resultado);
?>