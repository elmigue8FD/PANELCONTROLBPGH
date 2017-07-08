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
$diaselaboracion='';
$stock='';
$precioreal='';
$preciobp1='';
$diametro='';
$largo='';
$ancho='';
$piezas='';
$tamanio='';
$activado='';
$porciones='';
$idtblespecificingrediente='';
$idtblproducto='';  
$emailcreo= '';
$resultado= '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $diaselaboracion=$_POST["diaselaboracion"];
    $stock=$_POST["stock"];
    $precioreal=$_POST["precioreal"];
    $preciobp1=$_POST["preciobp"];
	//$preciobp2=(($preciobp1*0.45+4)*1.16);
	//$preciobp=sprintf("%.2f",$preciobp2);
	//$preciobp2=round(($preciobp1*0.045+4)*1.16);
    $preciobp2=($preciobp1*0.045+4)*1.16;	
    $preciobp=$precioreal+round($preciobp2);
    //$preciobp=round($preciobp+0.55,0);//el precio que esta en bepickler
    
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
    $porciones=$_POST["porciones"];
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
    $tamanio=$_POST["tamanio"];
	$activado=$_POST["activado"];
    $idtblespecificingrediente=$_POST["idtblespecificingrediente"];
    $idtblproducto=$_POST["idtblproducto"];
    $emailcreo=$_POST["emailcreo"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setTblproductDetalle($diaselaboracion,$stock,$precioreal,$preciobp,$diametro,$largo,$ancho,$porciones,$piezas,$tamanio,$activado,$idtblproducto,$idtblespecificingrediente,$emailcreo);
                                     
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
unset($activado);
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
unset($tamanio);
unset($idtblproducto);
unset($idtblespecificingrediente);
unset($emailcreo);
unset($resultado);
?>