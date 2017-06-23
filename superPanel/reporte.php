<?php
header('Content-type: txt/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Reporte_Ordenes.csv');
header('Pragma: no-cache');
header('Expires: 0');

include_once 'FuncionesReporte.php';
if (isset($_POST["generar101"])) 
{
	
	       $nameCiudad=$_POST["selectCiudadGD1"]; 
	       $fechaInicial=$_POST["fecha_inicialRangoD1"];
	       $fechaFinal=$_POST["fecha_finalRangoD1"];
		   
		
		   $fecha = explode ("/",$fechaInicial);
		   $fechaIni = $fecha[2]."-".$fecha[1]."-".$fecha[0];
		   
		   $fechaF = explode ("/",$fechaFinal);
		   $fechaFin = $fechaF[2]."-".$fechaF[1]."-".$fechaF[0];
		   
		   
		   
		   ?>	
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />  
</head> 
<h5>Reporte sobre las ordenes en la ciudad de <?php echo $nameCiudad;?> durante el periodo <?php echo $fechaInicial;?> - <?php echo $fechaFinal;?>.</h5> </br>



<table border="1">
<tr bgcolor="#CCCCCC"> 
<td>Mes</td>
<td>Orden</td>
<td>Fecha de compra</td>
<td>Fecha de entrega</td>
<td>Subtotal de Productos BP</td>
<td>Subtotal de Servicio a Domicilio BP</td>
<td>Descuento</td>
<td>Total de la orden</td>
<td>Sistema de Pago</td>
<td>Comisión que cobra el sistema de pago</td>
<td>Total después del sistema de pago</td> 
<td>Servicio a Domicilio sin fórmula</td>
<td>Comisión del servicio a domicilio</td>
<td>Pago del piloto</td>
<td>Diferencia del servicio a domicilio</td>
<td>Precio reales de productos</td>
<td>Comisión del subtotal de productos</td>  
<td>Pago a Proveedor</td>
<td>Utilidades antes de impuestos</td>
<td>Diferencia de los sistemas de pago</td>
<td>Utilidades después de impuestos (IVA)</td>
<td>Utilidades después de impuestos (ISR)</td>
</tr>  
<?php
           $orden = FuncionesReporte::getAllTblordencompraDatosbyFechas($nameCiudad,$fechaIni,$fechaFin);		 
		      foreach( $orden as $res1){
				  
				  
				$idtblordencompra = $res1['idtblordencompra']; 
                  $idtblproveedor =	$res1['idtblproveedor'];  
       
                   $costoServDom1 = $res1['tblordencompra_totaldelivery']; 

           if($costoServDom1==null || $costoServDom1=="" || $costoServDom1=="0.0" || $costoServDom1=="0"){
			      $costoServDom = 0;          
		                    } else
		      {    $costoServDom = $costoServDom1;  } //subtotal servicio a domicilio 					
							
			 
	      if($costoServDom==0){
	      $servDomicSinFormula = 0;
	      	}else{			
	    	$servDomicSinFormula = ($costoServDom-4.64)/ 1.0522;  } //servicio a domicilio sin formula

          if($servDomicSinFormula==0){
	      $comisionXservDomic = 0;
	      	}else{			
	    	$comisionXservDomic = $servDomicSinFormula*0.15*1.16;  } //Comisión del servicio a domicilio		
			
   $pagoPiloto=$servDomicSinFormula-$comisionXservDomic;
  
     $respuesta2 = FuncionesReporte::getTblentregaproductoByOrdenProveedorFechas($idtblordencompra,$idtblproveedor);
		       foreach( $respuesta2 as $res2){				                                
					  $subtotalCompraBP=0;
					  $subtotalReal=0;
                            $fCompra=$res1['tblordencompra_fchordencompra']; 
							$fEntrega=$res2['tblentregaproducto_fchentrega']; 
							$fcor= $res2['tblentregaproducto_fchcortepago'];
							
							$fco = explode ("-",$fCompra);
		                    $fdeCompra = $fco[2]."-".$fco[1]."-".$fco[0];   //fecha de compra
							
							$fen = explode ("-",$fEntrega);
		                    $fdeEntrega = $fen[2]."-".$fen[1]."-".$fen[0];  //fecha de entrega
							
							/*$fcort = explode ("-",$fcor);
		                    $fdeCorte = $fcort[2]."-".$fcort[1]."-".$fcort[0]; */
							
							
							$sistemaPago = $res1['tblordencompra_sistemapago'];
							
		          
				   //-------------------------------mes
				   $fco3 = explode ("-",$fCompra);
		          $resMes = $fco3[1]; //fecha de compra mes
				  
	switch($resMes){
    case 01: 
            $mes="Enero";
    break;
	
    case 02: $mes="Febrero";
    break;
	
    case 03: $mes="Marzo";
    break;
	
    case 04: $mes="Abril";
    break;
	
    case 05: $mes="Mayo";
    break;
	
    case 06: $mes="Junio";
    break;
	
    case 07: $mes="Julio";
    break;
	
    case 08: 
            $mes="Agosto";
    break;
	
    case 09: $mes="Septiembre";
    break;
	
    case 10: $mes="Octubre";
    break;
	
    case 11: $mes="Noviembre";
    break;
    case 12: $mes="Diciembre";
    break;    
    //default: $mes="Enero";;//General queda en Notificaciones
  }
	
	
				  $productos = FuncionesReporte::getAllTblcarritoproductByidorden3($idtblordencompra,$idtblproveedor);		 
		      foreach( $productos as $resP){
				  
				  
				  $diametro =$resP['tblproductdetalle_diametro'];
                  $largo =$resP['tblproductdetalle_largo'];
                  $ancho =$resP['tblproductdetalle_ancho'];
                  $piezas =$resP['tblproductdetalle_piezas'];				  
				  
                          if($diametro!=null){
			$caracteristica= $diametro.' cm';          
		                    }
        if($largo!=null && $ancho!=null){
			$caracteristica= $largo.' cm x '.$ancho.'cm';
                       }
        if($piezas!=null){
			$caracteristica= $piezas.' piezas';         
                   }	

				   
				   
				   //....................Total de productos normales precio Real
				         $cant = $resP['tblcarritoproduct_cantidad'];
						 $pReal = $resP['tblcarritoproduct_precioreal'];
						 
			             $subtotal = $cant*$pReal;            			
		                 $subtotalReal = $subtotalReal + $subtotal; 
						 
						 
				  //....................Total de productos normales precio BP
				     // $cant = $resP['tblcarritoproduct_cantidad'];
					  $precioBP =$resP['tblcarritoproduct_preciobp'];
					  
                      $subtotalBP = $cant*$precioBP;            			
		              $subtotalCompraBP= $subtotalCompraBP + $subtotalBP;
					  
					  $totalCompraBPOK= $subtotalCompraBP + $costoServDom; 					    
							
           }  //cierre de resP
		   
//-------------Productos complementarios------------
$productosComplementarios = FuncionesReporte::getAllTblordencompraProCompR($idtblordencompra,$idtblproveedor);  
               foreach( $productosComplementarios as $resPCom){	
                     
       //........precio real
    $subtotalcomplem = $resPCom['tblcarritoproductcomplem_cantidad']*$resPCom['tblcarritoproductcomplem_precioreal'];
    $subtotalReal = $subtotalReal + $subtotalcomplem;
     
                     //........precio BP
    $subtotalcomplemBPan = $resPCom['tblcarritoproductcomplem_cantidad']*$resPCom['tblcarritoproductcomplem_preciobp'];
    $subtotalCompraBP = $subtotalCompraBP + $subtotalcomplemBPan;	

    $totalCompraBPOK= $subtotalCompraBP + $costoServDom; 	
}
                  
//fin Productos complementarios ---------  

 $comisionSubtotalProductos = $subtotalReal*0.10* 1.16;
				  
				$PagoAproveedor = $subtotalReal-$comisionSubtotalProductos; 
				
				
				
		$descuento =$res1['tblhistcupondescuento_descuento'];
		if($descuento=="" || $descuento==null){
			$desc='No aplica';
		   }else 
		  { $desc= '$'.$descuento;}	
	  
	  
	  
	             $sistemaPago = $res1['tblordencompra_sistemapago'];
				 
                 if($sistemaPago=='PayPal'){			          
                       //[Precio final o total de compra con el descuento   x   3.95%   +   4.00 ] x   1.16					   
		                  $comRetenida= ($totalCompraBPOK*0.0395+4)*1.16;            
							          
							 }				
				
					else if($sistemaPago=='Stripe'){			          
                       //[Precio final o total de compra con el descuento   x   3.6%   +   3.00 ] x   1.16	 				   
		                   $comRetenida= ($totalCompraBPOK*0.036+3)*1.16;            
							 }	 
							 
							 
                  else if($sistemaPago=='Conekta' || $sistemaPago=='Coneckta'){			          
                       //[Precio final o total de compra con el descuento   x   2.95%   +   2.00 ] x   1.16			   
		                 $comRetenida= ($totalCompraBPOK*0.0295+2.50)*1.16;  
    						  
							 }
				else{    $comRetenida = 0; }
				 	
             $totalDespuesdelSistPag= $totalCompraBPOK-$comRetenida;
		 
		$diferenciaServDom= $costoServDom-$comisionXservDomic-$pagoPiloto; 
		$utilidadesAntesImpuestos = $totalDespuesdelSistPag - $pagoPiloto - $PagoAproveedor;
				
				
				$diferenciaDeLoSistemasPago = $totalDespuesdelSistPag-$utilidadesAntesImpuestos;
				
				$utilidadesDespImpuestosIVA = $utilidadesAntesImpuestos / 1.16;
				
				
				$utilidadesDespImpuestosISR = $utilidadesDespImpuestosIVA / 1.30;
                				  	   
?>	
<tr>
<td><?php echo $mes;?></td>
<td><?php echo $idtblordencompra;?></td>
<td><?php echo $fdeCompra;?></td>
<td><?php echo $fdeEntrega;?></td>	   
<td>$<?php echo $subtotalCompraBP;?></td>   
<td><?php echo $costoServDom;?></td>
<td><?php echo $desc;?></td>  
<td>$<?php echo $totalCompraBPOK;?></td>
<td><?php echo $sistemaPago;?></td>
<td>$<?php echo $comRetenida;?></td>   
<td>$<?php echo $totalDespuesdelSistPag;?></td>  
<td>$<?php echo $servDomicSinFormula;?></td>
<td>$<?php echo $comisionXservDomic;?></td>
<td>$<?php echo $pagoPiloto;?></td>
<td>$<?php echo $diferenciaServDom;?></td>
<td>$<?php echo $subtotalReal;?></td>
<td>$<?php echo $comisionSubtotalProductos;?></td>
<td>$<?php echo $PagoAproveedor;?></td>
<td>$<?php echo $utilidadesAntesImpuestos;?></td>
<td>$<?php echo $diferenciaDeLoSistemasPago;?></td>
<td>$<?php echo $utilidadesDespImpuestosIVA;?></td>
<td>$<?php echo $utilidadesDespImpuestosISR;?></td>
</tr>	   
<?php		   
     } //cierre de res2
	 
	  
unset($subtotalBP);  	
unset($subtotalCompraBP);
unset($totalCompraBPOK);
unset($costoServDom);
unset($totalCompraBPOK);
unset($desc);
unset($comRetenida);
unset($totalDespuesdelSistPag);
unset($servDomicSinFormula);
unset($comisionXservDomic);
unset($pagoPiloto);
unset($diferenciaServDom);
unset($subtotal);
unset($subtotalReal);    
unset($comisionSubtotalProductos);
unset($PagoAproveedor);
unset($utilidadesAntesImpuestos);
unset($diferenciaDeLoSistemasPago);
unset($utilidadesDespImpuestosIVA);
unset($utilidadesDespImpuestosISR);

} //cierre de res1


?> 
 </table> 
</html>
<?php                  				  
			
}  //del principio
?> 