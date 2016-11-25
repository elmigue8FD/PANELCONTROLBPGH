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
$idtblproductdetalle='';
$gluten='';
$diaselaboracion='';
$stock='';
$precioreal='';
$preciobp='';
$diametro='';
$largo='';
$ancho='';
$porciones='';
$piezas='';
$idtblproducto='';
$emailmodifico= '';
$resultado= '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $idtblproductdetalle=$_POST["idtblproductdetalle"];
    $diaselaboracion=$_POST["diaselaboracion"];
    $stock=$_POST["stock"];
    $precioreal=$_POST["precioreal"];
    //$preciobp=round([($precioreal*.045)+3.0]*1.16);
    $preciobp=$_POST["preciobp"];
    $diametro=$_POST["diametro"];
    if($diametro=='')
        $diametro=null;
    $largo=$_POST["largo"];
    if($largo=='')
        $largo=null;
    $ancho=$_POST["ancho"];
    if($ancho=='')
        $ancho=null;
    $porciones=$_POST["porciones"];
    $piezas=$_POST["piezas"];
    if($piezas=='')
        $piezas=null;
    $activado=$_POST["activado"];
    $idtblproducto=$_POST["idtblproducto"];
    $idtblespecifingrediente=$_POST['idtblespecifingrediente'];
    $emailmodifico=$_POST["emailmodifico"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setUpdateTblproductDetalle($idtblproductdetalle,$diaselaboracion,$stock,$precioreal,$preciobp,$diametro,$largo,$ancho,$porciones,$piezas,$activado,$idtblproducto,$idtblespecifingrediente,$emailmodifico);

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
unset($idtblproductdetalle);
unset($gluten);
unset($diaselaboracion);
unset($stock);
unset($precioreal);
unset($preciobp);
unset($diametro);
unset($largo);
unset($ancho);
unset($porciones);
unset($piezas);
unset($idtblproducto);
unset($emailmodifico);
unset($resultado);
?>