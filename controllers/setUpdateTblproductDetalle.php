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
$tamanio='';
$diaselaboracion='';
$stock='';
$precioreal='';
$preciobp1='';
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
	
    $preciobp1=$_POST["preciobp"];
	$preciobp2=($preciobp1*0.045+4)*1.16;	
    $preciobp=$precioreal+round($preciobp2);
	if($_POST["diametro"]!='')
    {  
        $diametro=$_POST["diametro"];
       $largo=NULL;
        $ancho=NULL;
        $piezas=NULL;
    }
    else
    {
        $diametro=NULL;
    }
    if($_POST["largo"]!=''&&$_POST["ancho"]!='')
    { 
        $largo=$_POST["largo"];
        $ancho=$_POST["ancho"];
        $diametro=NULL;
        $piezas=NULL;
    }
    else
    {
        $largo=NULL;
        $ancho=NULL;
    } 
    
    if($_POST["piezas"]!='')
    {  
        $piezas=$_POST["piezas"];
        $diametro=NULL;
        $largo=NULL;
        $ancho=NULL;
    }
    else
    {
        $piezas=NULL;
    } 
    
	/*$diametro=$_POST["diametro"];
    if($diametro=='')
        $diametro=null;
    $largo=$_POST["largo"];
    if($largo=='')
        $largo=null;
    $ancho=$_POST["ancho"];
    if($ancho=='')
        $ancho=null;
    
    $piezas=$_POST["piezas"];
    if($piezas=='')
        $piezas=null;*/
	
	$porciones=$_POST["porciones"];
	$tamanio=$_POST["tamanio"];
    $activado=$_POST["activado"];
    $idtblproducto=$_POST["idtblproducto"];
    $idtblespecifingrediente=$_POST['idtblespecifingrediente'];
    $emailmodifico=$_POST["emailmodifico"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setUpdateTblproductDetalle($idtblproductdetalle,$diaselaboracion,$stock,$precioreal,$preciobp,$diametro,$largo,$ancho,$porciones,$tamanio,$piezas,$activado,$idtblproducto,$idtblespecifingrediente,$emailmodifico);

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
unset($tamanio);
unset($diaselaboracion);
unset($stock);
unset($precioreal);
unset($preciobp);
unset($preciobp1);
unset($preciobp2);
unset($diametro);
unset($largo);
unset($ancho);
unset($porciones);
unset($piezas);
unset($idtblproducto);
unset($emailmodifico);
unset($resultado);
?>