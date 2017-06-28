<?php
include_once 'FuncionesReporte.php';
include_once 'mPDF/mpdf.php';

if (isset($_POST["generar100H"])) {
		   
		   $idtblProveedorSelec=$_POST["SelectProveedor"];
		    
          
		  
		  
 if($idtblProveedorSelec=="todos"){
	         $nameCiudad  =$_POST["selectCiudadG"]; 
	       $fechaInicial =$_POST["fecha_inicialRango"];
	       $fechaFinal   =$_POST["fecha_finalRango"];
//----------------------------------------------------------			  
		  
		   $fecha = explode ("/",$fechaInicial);
		   $fechaIni = $fecha[2]."-".$fecha[1]."-".$fecha[0];
		   
		   $fechaF = explode ("/",$fechaFinal);
		   $fechaFin = $fechaF[2]."-".$fechaF[1]."-".$fechaF[0];
		   	
	  
$cuerpo= utf8_encode($cuerpo); 


//----------------------------------------------------------
	    $respuesta2 = FuncionesReporte::getAllTblordencompraDatosbyFechasDos($nameCiudad,$fechaIni,$fechaFin);
		     foreach( $respuesta2 as $res2){
                $idtblproveedore = $res2['idtblproveedor'];  
                $tblproveedornombre = $res2['tblproveedor_nombre'];				
					
			
			  
$cuerpo .= "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title></title>
</head>
<body>

<table class='table1'>
<tr> 
<td class='neg'>Proveedor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;
".$tblproveedornombre."</td>  <td></td> <td></td>  <td></td><td></td>
</tr>

<tr> 
<td>&nbsp;</td>
<td></td><td></td> <td></td> <td></td>
</tr>

<tr> 
<td>&nbsp;</td>
<td></td><td></td> <td></td> <td></td>
</tr>

<tr> 
<td></td> 
<td></td> 
<td></td> 
<td></td> <td></td>
</tr>

<tr> 
<td></td> 
<td>Reporte de Ventas</td> 
<td></td>
<td></td>
<td></td>
</tr>
</table><br><br>

"; 	

$cuerpo .= "<table class='table2'>
<tr>
<td class='rell'>Orden</td>
<td class='rell'>Fecha de Corte</td>
<td class='rell'>Fecha de Pago</td>
<td class='rell'>Descripción</td>
<td class='rell'>Tamaño</td>
<td class='rell'>Cantidad</td>
<td class='rell'>Precio Unitario</td>
<td class='rell'>Importe</td>
<td class='rell'>Comisión</td>
<td class='rell'>Total del importe</td>
<td class='rell'>Importe de comisiones</td>
<td class='rell'>Total a depositar</td>
<td class='rell'>Fecha de compra</td>
<td class='rell'>Fecha de entrega</td>
</tr>
<tr>
";

                    $productos11 = FuncionesReporte::getTblentregaproductoByOrdenProveedorFechasH($idtblproveedore);		 
		      foreach( $productos11 as $resP11){
				  
				  $iddeorden = $resP11['tblentregaproducto_idtblordencompra'];
				  $iddeprovee = $resP11['tblentregaproducto_idtblproveedor'];
				 
				           $fEntrega =$resP11['tblentregaproducto_fchentrega'];
						       $fcor =$resP11['tblentregaproducto_fchcortepago'];							
							   $fpag =$resP11['tblentregaproducto_fchpagoproveedor'];							  
							   							
							$fen = explode ("-",$fEntrega);
		                    $fdeEntrega = $fen[2]."-".$fen[1]."-".$fen[0];
							
							$fcort = explode ("-",$fcor);
		                    $fdeCorte = $fcort[2]."-".$fcort[1]."-".$fcort[0];
							
							$fpago = explode ("-",$fpag);
			                $fdePago = $fpago[2]."-".$fpago[1]."-".$fpago[0]; 
							
							
							//------------------solo para totales-----------------
							$productosNormaT = FuncionesReporte::getAllTblcarritoproductByidorden3($iddeprovee,$iddeorden);		 
		                    foreach( $productosNormaT as $resPNormaT){
				                   //  $iddeorden = $resPNormaT['idtblordencompra'];
				  
                                   $cantT = $resPNormaT['tblcarritoproduct_cantidad'];
						           $pRealT = $resPNormaT['tblcarritoproduct_precioreal'];
						 
			                       $subtotalT = $cantT*$pRealT;            			
		                           $totalCompraT= $totalCompraT + $subtotalT; 
			       				   
                                    $comisioNT= ($subtotalT*0.10)*1.16;  //$comisioN= ($pReal*0.10)*1.16;
						           $totaldecomisionesT=$totaldecomisionesT+$comisioNT;
				  	
		                 }  //fin producto normal
		
		                 $productosComplementariosT = FuncionesReporte::getAllTblordencompraProCompR2($iddeprovee,$iddeorden);  
                         foreach( $productosComplementariosT as $resPComT){	
			   
			              $a1T= $resPComT['tblcarritoproductcomplem_cantidad'];
				          $a2T= $resPComT['tblcarritoproductcomplem_precioreal'];
                          $subtotalcomplemT = $a1T*$a2T;
                          $totalCompraT = $totalCompraT + $subtotalcomplemT;

				          $comisioNCT= ($subtotalcomplemT*0.10)*1.16;
					     $totaldecomisionesT=$totaldecomisionesT+$comisioNCT;
                  			
                           }//fin complementarios
			//--------------------------------------------------------
			
			$totalImporte=$totalCompraT;  //total importe
			$totalComisiones=$totaldecomisionesT;   //total comisiones
			
			$totalaDepositar= $totalImporte-$totalComisiones;
			//------------------------------------------------------------
			
				 
			  $productosNorma = FuncionesReporte::getAllTblcarritoproductByidorden3($iddeprovee,$iddeorden);		 
		      foreach( $productosNorma as $resPNorma){
				  
				  
				  $iddeorden = $resPNorma['idtblordencompra'];
				  
				  
				  //-------------fecha de compra---------
				    $fCompra =$resPNorma['tblordencompra_fchordencompra'];
				        $fco = explode ("-",$fCompra);
		          $fdeCompra = $fco[2]."-".$fco[1]."-".$fco[0];
				  //------------fin fecha de compra---------
				   
				  //--------------------------------
				  $diametro =$resPNorma['tblproductdetalle_diametro'];
                     $largo =$resPNorma['tblproductdetalle_largo'];
                     $ancho =$resPNorma['tblproductdetalle_ancho'];
                    $piezas =$resPNorma['tblproductdetalle_piezas'];				  
				  
                          if($diametro!=null){
			         $caracteristica= $diametro.' cm';          
		                    }
                    if($largo!=null && $ancho!=null){
			        $caracteristica= $largo.' cm x '.$ancho.'cm';
                       }
                    if($piezas!=null){
			        $caracteristica= $piezas.' piezas';         
                         }

                    //.................Total de productos normales precio Real.........
                         $cant = $resPNorma['tblcarritoproduct_cantidad'];
						 $pReal = $resPNorma['tblcarritoproduct_precioreal'];
						 
			             $subtotal = $cant*$pReal;            			
		                 $totalCompra= $totalCompra + $subtotal; 
			       				   
                         $comisioN= ($subtotal*0.10)*1.16;  //$comisioN= ($pReal*0.10)*1.16;
						// $totaldecomisiones=$totaldecomisiones+$comisioN;
						 
						 			  
				  //---------------------------------------------

$cuerpo .= "
<tr>				  
<td>".$iddeorden."</td>
<td>".$fdeCorte."</td>
<td>".$fdePago."</td>   
<td>".$resPNorma['tblcarritoproduct_nombreproducto']."-".$resPNorma['tblespecificingrediente_nombre']."</td>
<td>".$caracteristica."</td>    
<td>".$resPNorma['tblcarritoproduct_cantidad']."</td>
<td>$".$resPNorma['tblcarritoproduct_precioreal']."</td>
<td>$".$subtotal."</td> 
<td>$".$comisioN."</td> 
<td>$".$totalImporte."</td>
<td>$".$totalComisiones."</td>
<td>$".$totalaDepositar."</td>
<td>".$fdeCompra."</td>
<td>".$fdeEntrega."</td>
</tr>
";	
		                       
		  
		}  //fin producto normal
		
		$productosComplementarios = FuncionesReporte::getAllTblordencompraProCompR2($iddeprovee,$iddeorden);  
               foreach( $productosComplementarios as $resPCom){	
			   
			       $a1= $resPCom['tblcarritoproductcomplem_cantidad'];
				   $a2= $resPCom['tblcarritoproductcomplem_precioreal'];
                   $subtotalcomplem = $a1*$a2;
                   $totalCompra = $totalCompra + $subtotalcomplem;

				     $comisioNC= ($subtotalcomplem*0.10)*1.16;
					// $totaldecomisiones=$totaldecomisiones+$comisioNC;
                   	
$cuerpo .= "
<tr>
<td>".$resPCom['idtblordencompra']."</td>
<td>".$fdeCorte."</td>
<td>".$fdePago."</td>  
<td colspan='2'>".$resPCom['tblcarritoproductcomplem_nombreproducto']."</td>    
<td>".$resPCom['tblcarritoproductcomplem_cantidad']."</td> 
<td>$".$resPCom['tblcarritoproductcomplem_precioreal']."</td> 
<td>$".$subtotalcomplem."</td> 
<td>$".$comisioNC."</td> 
<td>$".$totalImporte."</td>
<td>$".$totalComisiones."</td>
<td>$".$totalaDepositar."</td>
<td>".$fdeCompra."</td>
<td>".$fdeEntrega."</td>
</tr>
";     
                  				 
}//fin complementarios

//-----------------------
	
unset($totalImporte); 
unset($totalCompraT); 
unset($subtotalT); 
unset($subtotalcomplemT);

unset($totalCompra);
unset($subtotal);
unset($comisioN);
unset($subtotalcomplemT);
unset($totaldecomisiones);	
unset($subtotalcomplemT);
unset($subtotalcomplem);
unset($comisioNC);  
unset($totalComisiones);
unset($totaldecomisiones); 
unset($totaldecomisionesT); 
unset($comisioNCT); 
unset($comisioNT);  
unset($totalaDepositar);

	
	
//------------------solo para totales-----------------
							$productosNormaT200 = FuncionesReporte::getAllTblcarritoproductByidorden3($iddeprovee,$iddeorden);		 
		                    foreach( $productosNormaT200 as $resPNormaT200){
				                   //  $iddeorden = $resPNormaT['idtblordencompra'];
				  
                                   $cantT2 = $resPNormaT200['tblcarritoproduct_cantidad'];
						           $pRealT2 = $resPNormaT200['tblcarritoproduct_precioreal'];
						 
			                       $subtotalT2 = $cantT2*$pRealT2;            			
		                           $totalCompraT2= $totalCompraT2 + $subtotalT2; 
			       				   
                                    $comisioNT2= ($subtotalT2*0.10)*1.16;  //$comisioN= ($pReal*0.10)*1.16;
						           $totaldecomisionesT2=$totaldecomisionesT2+$comisioNT2;
				  	
		                 }  //fin producto normal
		
		                 $productosComplementariosT200 = FuncionesReporte::getAllTblordencompraProCompR2($iddeprovee,$iddeorden);  
                         foreach( $productosComplementariosT200 as $resPComT200){	
			   
			              $a1T2= $resPComT200['tblcarritoproductcomplem_cantidad'];
				          $a2T2= $resPComT200['tblcarritoproductcomplem_precioreal'];
                          $subtotalcomplemT2 = $a1T2*$a2T2;
                          $totalCompraT2 = $totalCompraT2 + $subtotalcomplemT2;

				          $comisioNCT2= ($subtotalcomplemT2*0.10)*1.16;
					     $totaldecomisionesT2=$totaldecomisionesT2+$comisioNCT2;
                  			
                           }//fin complementarios
			//--------------------------------------------------------
			
			$totalImporte2=$totalCompraT2;  //total importe
			$totalComisiones2=$totaldecomisionesT2;   //total comisiones
			
			$totalaDepositar2= $totalImporte2-$totalComisiones2;
			//------------------------------------------------------------
			
			$totalImporteGeneral=$totalImporte2;  //total importe general
			$totalComisionesGeneral=$totalComisiones2;  //total comisiones general
			
			$totalaDepositarGeneral=$totalImporteGeneral-$totalComisionesGeneral;  //total comisiones general
			
			//--------------------------	
			  }	
//--------------------
$cuerpo .= "
</table>";

$cuerpo .= "<br>
<table class='table1'>      
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>Total del Importe</td>
<td class='ta1'>$ &nbsp;&nbsp;".$totalImporteGeneral."</td>  
 </tr> 
 
 
 <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>Importe de comisiones</td>
<td class='ta1'>$ &nbsp;&nbsp;".$totalComisionesGeneral."</td>
 </tr> 
 
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td class='rell'>Total a depositar en Pesos</td>
<td class='ta1 rell'>$ &nbsp;&nbsp;".$totalaDepositarGeneral."</td>
 </tr> 
</table>";			  	
		//--------------------------------------------------
 $cuerpo .= "
<pagebreak />
</body>
</html>";

  
			       				   
                                    
						          
								   
unset($totalCompraT2); 
unset($subtotalT2); 
unset($comisioNT2); 
unset($totaldecomisionesT2); 
unset($subtotalcomplemT2); 
unset($totalImporte2); 
unset($comisioNCT2);
unset($totalComisiones2);
unset($totalaDepositar2);
unset($totalImporteGeneral);    
unset($totalaDepositarGeneral);
	 
		  } //fin de peticion x ciudad
 
			 
  $archivo='ReporteVentas.pdf';
  $archivo_de_salida = $archivo;
  $mpdf  =  new mPDF('c','letter','','',19,21,36,24);
  $mpdf->SetDisplayMode('fullpage');  // ()decidir como se va a mostrar el PDF
  $mpdf->SetAuthor("BePickler"); //poner autor al pdf, puede ser puesto de varias maneras
  $stylesheet = file_get_contents('colorPdfH.css');
    $mpdf->AddPage('L');  
  $mpdf->WriteHTML ($stylesheet,1);
 // $mpdf->WriteHTML ($stylesheet2,2);
  $mpdf->WriteHTML($cuerpo,2);
  //$mpdf->AddPage('L');
  //$mpdf->Output($filename,'I'); //sacar lo que el objeto en writehtml tiene y lo mostrara en pantalla	
	$mpdf->Output($archivo_de_salida); 

//Creacion de las cabeceras que generarán el archivo pdf
header ("Content-Type: application/download");
header ("Content-Disposition: attachment; filename=$archivo");
header("Content-Length: " . filesize("$archivo"));
$fp = fopen($archivo, "r");
fpassthru($fp);
fclose($fp);


unlink($archivo); 

	
//**************************************** fin todos ********************************
}//fin de todos
else{
	//**************************************** UNO ********************************
	      $idtblProveedorSelec=$_POST["SelectProveedor"];
	        $nameCiudad  =$_POST["selectCiudadG"]; 
	       $fechaInicial =$_POST["fecha_inicialRango"];
	       $fechaFinal   =$_POST["fecha_finalRango"];
//----------------------------------------------------------			  
		  
		   $fecha = explode ("/",$fechaInicial);
		   $fechaIni = $fecha[2]."-".$fecha[1]."-".$fecha[0];
		   
		   $fechaF = explode ("/",$fechaFinal);
		   $fechaFin = $fechaF[2]."-".$fechaF[1]."-".$fechaF[0];
		   	
	  
$cuerpo2= utf8_encode($cuerpo2); 



//-----------------------------
 
$respuestaA1 = FuncionesReporte::getAllTblordencompraDatosbyFechasUno2($nameCiudad,$fechaIni,$fechaFin,$idtblProveedorSelec);              
              
          foreach( $respuestaA1 as $res1){     		  
		  $idtblordencompra =$res1['idtblordencompra']; 
          $idtblproveedore=	$res1['idtblproveedor']; 
          $tblproveedornombre=	$res1['tblproveedor_nombre']; 		  
                 
			  
$cuerpo2 .= "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title></title>
</head>
<body>

<table class='table1'>
<tr> 
<td class='neg'>Proveedor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;
".$tblproveedornombre."</td>  <td></td> <td></td>  <td></td><td></td>
</tr>

<tr> 
<td>&nbsp;</td>
<td></td><td></td> <td></td> <td></td>
</tr>

<tr> 
<td>&nbsp;</td>
<td></td><td></td> <td></td> <td></td>
</tr>

<tr> 
<td></td> 
<td></td> 
<td></td> 
<td></td> <td></td>
</tr>

<tr> 
<td></td> 
<td>Reporte de Ventas</td> 
<td></td>
<td></td>
<td></td>
</tr>
</table><br><br>

"; 	

$cuerpo2 .= "<table class='table2'>
<tr>
<td class='rell'>Orden</td>
<td class='rell'>Fecha de Corte</td>
<td class='rell'>Fecha de Pago</td>
<td class='rell'>Descripción</td>
<td class='rell'>Tamaño</td>
<td class='rell'>Cantidad</td>
<td class='rell'>Precio Unitario</td>
<td class='rell'>Importe</td>
<td class='rell'>Comisión</td>
<td class='rell'>Total del importe</td>
<td class='rell'>Importe de comisiones</td>
<td class='rell'>Total a depositar</td>
<td class='rell'>Fecha de compra</td>
<td class='rell'>Fecha de entrega</td>
</tr>
<tr>
";

                    $productos11 = FuncionesReporte::getTblentregaproductoByOrdenProveedorFechasH($idtblproveedore);		 
		      foreach( $productos11 as $resP11){
				  
				  $iddeorden = $resP11['tblentregaproducto_idtblordencompra'];
				  $iddeprovee = $resP11['tblentregaproducto_idtblproveedor'];
				 
				           $fEntrega =$resP11['tblentregaproducto_fchentrega'];
						       $fcor =$resP11['tblentregaproducto_fchcortepago'];							
							   $fpag =$resP11['tblentregaproducto_fchpagoproveedor'];							  
							   							
							$fen = explode ("-",$fEntrega);
		                    $fdeEntrega = $fen[2]."-".$fen[1]."-".$fen[0];
							
							$fcort = explode ("-",$fcor);
		                    $fdeCorte = $fcort[2]."-".$fcort[1]."-".$fcort[0];
							
							$fpago = explode ("-",$fpag);
			                $fdePago = $fpago[2]."-".$fpago[1]."-".$fpago[0]; 
							
							
							//------------------solo para totales-----------------
							$productosNormaT = FuncionesReporte::getAllTblcarritoproductByidorden3($iddeprovee,$iddeorden);		 
		                    foreach( $productosNormaT as $resPNormaT){
				                   //  $iddeorden = $resPNormaT['idtblordencompra'];
				  
                                   $cantT = $resPNormaT['tblcarritoproduct_cantidad'];
						           $pRealT = $resPNormaT['tblcarritoproduct_precioreal'];
						 
			                       $subtotalT = $cantT*$pRealT;            			
		                           $totalCompraT= $totalCompraT + $subtotalT; 
			       				   
                                    $comisioNT= ($subtotalT*0.10)*1.16;  //$comisioN= ($pReal*0.10)*1.16;
						           $totaldecomisionesT=$totaldecomisionesT+$comisioNT;
				  	
		                 }  //fin producto normal
		
		                 $productosComplementariosT = FuncionesReporte::getAllTblordencompraProCompR2($iddeprovee,$iddeorden);  
                         foreach( $productosComplementariosT as $resPComT){	
			   
			              $a1T= $resPComT['tblcarritoproductcomplem_cantidad'];
				          $a2T= $resPComT['tblcarritoproductcomplem_precioreal'];
                          $subtotalcomplemT = $a1T*$a2T;
                          $totalCompraT = $totalCompraT + $subtotalcomplemT;

				          $comisioNCT= ($subtotalcomplemT*0.10)*1.16;
					     $totaldecomisionesT=$totaldecomisionesT+$comisioNCT;
                  			
                           }//fin complementarios
			//--------------------------------------------------------
			
			$totalImporte=$totalCompraT;  //total importe
			$totalComisiones=$totaldecomisionesT;   //total comisiones
			
			$totalaDepositar= $totalImporte-$totalComisiones;
			//------------------------------------------------------------
			
				 
			  $productosNorma = FuncionesReporte::getAllTblcarritoproductByidorden3($iddeprovee,$iddeorden);		 
		      foreach( $productosNorma as $resPNorma){
				  
				  
				  $iddeorden = $resPNorma['idtblordencompra'];
				  
				  
				  //-------------fecha de compra---------
				    $fCompra =$resPNorma['tblordencompra_fchordencompra'];
				        $fco = explode ("-",$fCompra);
		          $fdeCompra = $fco[2]."-".$fco[1]."-".$fco[0];
				  //------------fin fecha de compra---------
				   
				  //--------------------------------
				  $diametro =$resPNorma['tblproductdetalle_diametro'];
                     $largo =$resPNorma['tblproductdetalle_largo'];
                     $ancho =$resPNorma['tblproductdetalle_ancho'];
                    $piezas =$resPNorma['tblproductdetalle_piezas'];				  
				  
                          if($diametro!=null){
			         $caracteristica= $diametro.' cm';          
		                    }
                    if($largo!=null && $ancho!=null){
			        $caracteristica= $largo.' cm x '.$ancho.'cm';
                       }
                    if($piezas!=null){
			        $caracteristica= $piezas.' piezas';         
                         }

                    //.................Total de productos normales precio Real.........
                         $cant = $resPNorma['tblcarritoproduct_cantidad'];
						 $pReal = $resPNorma['tblcarritoproduct_precioreal'];
						 
			             $subtotal = $cant*$pReal;            			
		                 $totalCompra= $totalCompra + $subtotal; 
			       				   
                         $comisioN= ($subtotal*0.10)*1.16;  //$comisioN= ($pReal*0.10)*1.16;
						// $totaldecomisiones=$totaldecomisiones+$comisioN;
						 
						 			  
				  //---------------------------------------------

$cuerpo2 .= "
<tr>				  
<td>".$iddeorden."</td>
<td>".$fdeCorte."</td>
<td>".$fdePago."</td>   
<td>".$resPNorma['tblcarritoproduct_nombreproducto']."-".$resPNorma['tblespecificingrediente_nombre']."</td>
<td>".$caracteristica."</td>    
<td>".$resPNorma['tblcarritoproduct_cantidad']."</td>
<td>$".$resPNorma['tblcarritoproduct_precioreal']."</td>
<td>$".$subtotal."</td> 
<td>$".$comisioN."</td> 
<td>$".$totalImporte."</td>
<td>$".$totalComisiones."</td>
<td>$".$totalaDepositar."</td>
<td>".$fdeCompra."</td>
<td>".$fdeEntrega."</td>
</tr>
";	
		                       
		  
		}  //fin producto normal
		
		$productosComplementarios = FuncionesReporte::getAllTblordencompraProCompR2($iddeprovee,$iddeorden);  
               foreach( $productosComplementarios as $resPCom){	
			   
			       $a1= $resPCom['tblcarritoproductcomplem_cantidad'];
				   $a2= $resPCom['tblcarritoproductcomplem_precioreal'];
                   $subtotalcomplem = $a1*$a2;
                   $totalCompra = $totalCompra + $subtotalcomplem;

				     $comisioNC= ($subtotalcomplem*0.10)*1.16;
					// $totaldecomisiones=$totaldecomisiones+$comisioNC;
                   	
$cuerpo2 .= "
<tr>
<td>".$resPCom['idtblordencompra']."</td>
<td>".$fdeCorte."</td>
<td>".$fdePago."</td>  
<td colspan='2'>".$resPCom['tblcarritoproductcomplem_nombreproducto']."</td>    
<td>".$resPCom['tblcarritoproductcomplem_cantidad']."</td> 
<td>$".$resPCom['tblcarritoproductcomplem_precioreal']."</td> 
<td>$".$subtotalcomplem."</td> 
<td>$".$comisioNC."</td> 
<td>$".$totalImporte."</td>
<td>$".$totalComisiones."</td>
<td>$".$totalaDepositar."</td>
<td>".$fdeCompra."</td>
<td>".$fdeEntrega."</td>
</tr>
";     
                  				 
}//fin complementarios

//-----------------------
	
unset($totalImporte); 
unset($totalCompraT); 
unset($subtotalT); 
unset($subtotalcomplemT);

unset($totalCompra);
unset($subtotal);
unset($comisioN);
unset($subtotalcomplemT);
unset($totaldecomisiones);	
unset($subtotalcomplemT);
unset($subtotalcomplem);
unset($comisioNC);  
unset($totalComisiones);
unset($totaldecomisiones); 
unset($totaldecomisionesT); 
unset($comisioNCT); 
unset($comisioNT);  
unset($totalaDepositar);

	
	
//------------------solo para totales-----------------
							$productosNormaT200 = FuncionesReporte::getAllTblcarritoproductByidorden3($iddeprovee,$iddeorden);		 
		                    foreach( $productosNormaT200 as $resPNormaT200){
				                   //  $iddeorden = $resPNormaT['idtblordencompra'];
				  
                                   $cantT2 = $resPNormaT200['tblcarritoproduct_cantidad'];
						           $pRealT2 = $resPNormaT200['tblcarritoproduct_precioreal'];
						 
			                       $subtotalT2 = $cantT2*$pRealT2;            			
		                           $totalCompraT2= $totalCompraT2 + $subtotalT2; 
			       				   
                                    $comisioNT2= ($subtotalT2*0.10)*1.16;  //$comisioN= ($pReal*0.10)*1.16;
						           $totaldecomisionesT2=$totaldecomisionesT2+$comisioNT2;
				  	
		                 }  //fin producto normal
		
		                 $productosComplementariosT200 = FuncionesReporte::getAllTblordencompraProCompR2($iddeprovee,$iddeorden);  
                         foreach( $productosComplementariosT200 as $resPComT200){	
			   
			              $a1T2= $resPComT200['tblcarritoproductcomplem_cantidad'];
				          $a2T2= $resPComT200['tblcarritoproductcomplem_precioreal'];
                          $subtotalcomplemT2 = $a1T2*$a2T2;
                          $totalCompraT2 = $totalCompraT2 + $subtotalcomplemT2;

				          $comisioNCT2= ($subtotalcomplemT2*0.10)*1.16;
					     $totaldecomisionesT2=$totaldecomisionesT2+$comisioNCT2;
                  			
                           }//fin complementarios
			//--------------------------------------------------------
			
			$totalImporte2=$totalCompraT2;  //total importe
			$totalComisiones2=$totaldecomisionesT2;   //total comisiones
			
			$totalaDepositar2= $totalImporte2-$totalComisiones2;
			//------------------------------------------------------------
			
			$totalImporteGeneral=$totalImporte2;  //total importe general
			$totalComisionesGeneral=$totalComisiones2;  //total comisiones general
			
			$totalaDepositarGeneral=$totalImporteGeneral-$totalComisionesGeneral;  //total comisiones general
			
			//--------------------------	
			  }	
//--------------------
$cuerpo2 .= "
</table>";

$cuerpo2 .= "<br>
<table class='table1'>      
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>Total del Importe</td>
<td class='ta1'>$ &nbsp;&nbsp;".$totalImporteGeneral."</td>  
 </tr> 
 
 
 <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>Importe de comisiones</td>
<td class='ta1'>$ &nbsp;&nbsp;".$totalComisionesGeneral."</td>
 </tr> 
 
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td class='rell'>Total a depositar en Pesos</td>
<td class='ta1 rell'>$ &nbsp;&nbsp;".$totalaDepositarGeneral."</td>
 </tr> 
</table>";			  	
		//--------------------------------------------------
 $cuerpo2 .= "
<pagebreak />
</body>
</html>";

  
			       				   
                                    
						          
								   
unset($totalCompraT2); 
unset($subtotalT2); 
unset($comisioNT2); 
unset($totaldecomisionesT2); 
unset($subtotalcomplemT2); 
unset($totalImporte2); 
unset($comisioNCT2);
unset($totalComisiones2);
unset($totalaDepositar2);
unset($totalImporteGeneral);    
unset($totalaDepositarGeneral);
		  
		  } //fin por ciudad y prov

  $archivo2='ReporteVentas.pdf';
  $archivo_de_salida2 = $archivo2;
  $mpdf2  =  new mPDF('c','letter','','',19,21,36,24);
  $mpdf2->SetDisplayMode('fullpage');  // ()decidir como se va a mostrar el PDF
  $mpdf2->SetAuthor("BePickler"); //poner autor al pdf, puede ser puesto de varias maneras
  $stylesheet2 = file_get_contents('colorPdfH.css'); 
  $mpdf2->AddPage('L'); 
  $mpdf2->WriteHTML ($stylesheet2,1);
 // $mpdf->WriteHTML ($stylesheet2,2);
  $mpdf2->WriteHTML($cuerpo2,2);
  //$mpdf->Output($filename,'I'); //sacar lo que el objeto en writehtml tiene y lo mostrara en pantalla	
	$mpdf2->Output($archivo_de_salida2); 

//Creacion de las cabeceras que generarán el archivo pdf
header ("Content-Type: application/download");
header ("Content-Disposition: attachment; filename=$archivo2");
header("Content-Length: " . filesize("$archivo2"));
$fp2 = fopen($archivo2, "r");
fpassthru($fp2);
fclose($fp2);


unlink($archivo2); 
	
	
	//**************************************** fin UNO ********************************
 
} //fin del else porque selecciono un proveedor

 }//fin del boton   en horizontal
 
 //_______________________________________________________________________________________________
 if (isset($_POST["generar100"])) {
		   
		   $idtblProveedorSelec=$_POST["SelectProveedor"];
		    
          
		  
		  
 if($idtblProveedorSelec=="todos"){
	         $nameCiudad  =$_POST["selectCiudadG"]; 
	       $fechaInicial =$_POST["fecha_inicialRango"];
	       $fechaFinal   =$_POST["fecha_finalRango"];
//----------------------------------------------------------			  
		  
		   $fecha = explode ("/",$fechaInicial);
		   $fechaIni = $fecha[2]."-".$fecha[1]."-".$fecha[0];
		   
		   $fechaF = explode ("/",$fechaFinal);
		   $fechaFin = $fechaF[2]."-".$fechaF[1]."-".$fechaF[0];
		   	
	  
$cuerpo1V= utf8_encode($cuerpo1V); 



//----------------
 
$respuesta = FuncionesReporte::getAllTblordencompraDatosbyFechasV($nameCiudad,$fechaIni,$fechaFin);              
              
          foreach( $respuesta as $res1){     		  
		  $idtblordencompra =$res1['idtblordencompra']; 
          $idtblproveedor=	$res1['idtblproveedor'];  
                 
			  
		       $respuesta2 = FuncionesReporte::getTblentregaproductoByOrdenProveedorFechasV($idtblordencompra,$idtblproveedor);
		       foreach( $respuesta2 as $res2){				                                
					
                            $fCompra=$res1['tblordencompra_fchordencompra'];
							$fEntrega=$res2['tblentregaproducto_fchentrega'];
							$fcor= $res2['tblentregaproducto_fchcortepago'];
							
							$fpag= $res2['tblentregaproducto_fchpagoproveedor'];
							
							
							
							$fco = explode ("-",$fCompra);
		                    $fdeCompra = $fco[2]."-".$fco[1]."-".$fco[0];
							
							$fen = explode ("-",$fEntrega);
		                    $fdeEntrega = $fen[2]."-".$fen[1]."-".$fen[0];
							
							$fcort = explode ("-",$fcor);
		                    $fdeCorte = $fcort[2]."-".$fcort[1]."-".$fcort[0];
							
							$fpago = explode ("-",$fpag);
		                    $fdePago = $fpago[2]."-".$fpago[1]."-".$fpago[0];
							
							
	
	
$cuerpo1V .= "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title></title>
</head>
<body> 

<table class='table1' style='page-break-inside: avoid'>
<tr> 
<td class='neg'>Proveedor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;
 ".$res1['tblproveedor_nombre']."</td>  <td></td> <td></td>  <td></td><td></td>
</tr>

<tr> 
<td>&nbsp;</td>
<td></td><td></td> <td></td> <td></td>
</tr>

<tr> 
<td>&nbsp;</td>
<td></td><td></td> <td></td> <td></td>
</tr>

<tr> 
<td></td> 
<td></td> 
<td></td> 
<td></td> <td></td>
</tr>

<tr> 
<td></td> 
<td>Reporte de Ventas</td> 
<td></td>
<td></td>
<td></td>
</tr>
</table> <br><br>

"; 									
							
$cuerpo1V .= "
<table class='table1' >      
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>Orden</td>
<td class='ta1'>".$res1['idtblordencompra']."</td>
 </tr> 

<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>Fecha de Compra</td>
<td class='ta1'>".$fdeCompra."</td>
 </tr> 
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>Fecha de Entrega</td>
<td class='ta1'>".$fdeEntrega."</td>
 </tr> 
 
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>Fecha de Corte</td>
<td class='ta1'>".$fdeCorte."</td>
 </tr> 
 
 
 <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>Fecha de Pago</td>
<td class='ta1'>".$fdePago."</td>
 </tr> 
 
</table> <br> <br>";	



$cuerpo1V .= "<table class='table2'>
<tr>
<td class='rell'>Descripción</td> 
<td class='rell'>Tamaño</td> 
<td class='rell'>Cantidad</td> 
<td class='rell'>Precio Unitario </td>
<td class='rell'>Importe</td> 
<td class='rell'>Comisión</td> 
</tr>
"; 
           $productos = FuncionesReporte::getAllTblcarritoproductByidorden3V($idtblordencompra,$idtblproveedor);		 
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

    //.................Total de productos normales precio Real.........
                         $cant = $resP['tblcarritoproduct_cantidad'];
						 $pReal = $resP['tblcarritoproduct_precioreal'];
						 
			             $subtotal = $cant*$pReal;            			
		                 $totalCompra= $totalCompra + $subtotal; 
			       				   
                         $comisioN= ($subtotal*0.10)*1.16;  //$comisioN= ($pReal*0.10)*1.16;
						 $totaldecomisiones=$totaldecomisiones+$comisioN;
         		  
$cuerpo1V .= "<tr>
<td>".$resP['tblcarritoproduct_nombreproducto']."-".$resP['tblespecificingrediente_nombre']."</td>
<td>".$caracteristica."</td>    
<td>".$resP['tblcarritoproduct_cantidad']."</td>
<td>$".$resP['tblcarritoproduct_precioreal']."</td>
<td>$".$subtotal."</td> 
<td>$".$comisioN."</td> 
</tr>
";  
                    				  
			
}  

    

           
         
//Productos complementarios------------
$productosComplementarios = FuncionesReporte::getAllTblordencompraProCompRV($idtblordencompra,$idtblproveedor);  
               foreach( $productosComplementarios as $resPCom){	
			   
			       $a1= $resPCom['tblcarritoproductcomplem_cantidad'];
				   $a2= $resPCom['tblcarritoproductcomplem_precioreal'];
                   $subtotalcomplem = $a1*$a2;
                   $totalCompra = $totalCompra + $subtotalcomplem;

				     $comisioNC= ($a2*0.10)*1.16;
					 $totaldecomisiones=$totaldecomisiones+$comisioNC;
                   	
$cuerpo1V .= "
<tr>
<td colspan='2'>".$resPCom['tblcarritoproductcomplem_nombreproducto']."</td>    
<td>".$resPCom['tblcarritoproductcomplem_cantidad']."</td> 
<td>$".$resPCom['tblcarritoproductcomplem_precioreal']."</td> 
<td>$".$subtotalcomplem."</td> 
<td>$".$comisioNC."</td> 
</tr>
";     
                  				 
}
                  
//fin Productos complementarios ---------  
		
				$totalImporte=$totalCompra;
				
				$totalComisiones=$totaldecomisiones;
				$totalaDepositar= $totalImporte-$totalComisiones;
$cuerpo1V .= " 
 </table> ";  


$cuerpo1V .= "<br>
<table class='table1'>      
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>Total del Importe</td>
<td class='ta1'>$ &nbsp;&nbsp; ".$totalImporte."</td>
 </tr> 
 
 
 <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>Importe de comisiones</td>
<td class='ta1'>$ &nbsp;&nbsp; ".$totalComisiones."</td>
 </tr> 
 
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td class='rell'>Total a depositar en Pesos</td>
<td class='ta1 rell'>$ &nbsp;&nbsp; ".$totalaDepositar."</td>
 </tr> 
 
 
</table> <pagebreak />
</body>
		  </html>";	
		                       
		  
		  }  
 
unset($subtotal);  	
unset($subtotalcomplem);
unset($totalCompra);

unset($subtotalD);  	
unset($subtotalcomplemD);
unset($totalCompraD);   
unset($comisioN);  
unset($comisioNC);
unset($totalImporte); 

unset($totaldecomisiones);
unset($totalComisiones);  
unset($totalaDepositar); 


		  }

  $archivo1V='ReporteVentas.pdf';
  $archivo_de_salida1V = $archivo1V;
  $mpdf1V  =  new mPDF('c','letter','','',19,21,36,24);
  $mpdf1V->SetDisplayMode('fullpage');  // ()decidir como se va a mostrar el PDF
  $mpdf1V->SetAuthor("BePickler"); 
  $stylesheet1V = file_get_contents('colorPdf.css'); 
  $mpdf1V->WriteHTML ($stylesheet1V,1); 
  $mpdf1V->WriteHTML($cuerpo1V,2);  
  $mpdf1V->Output($archivo_de_salida1V); 

//Creacion de las cabeceras que generarán el archivo pdf
header ("Content-Type: application/download");
header ("Content-Disposition: attachment; filename=$archivo1V");
header("Content-Length: " . filesize("$archivo1V"));
$fp1V = fopen($archivo1V, "r");
fpassthru($fp1V);
fclose($fp1V);


unlink($archivo1V); 

	
//**************************************** fin todos ********************************
}//fin de todos
else{
	//**************************************** UNO ********************************
	      $idtblProveedorSelec=$_POST["SelectProveedor"];
	        $nameCiudad  =$_POST["selectCiudadG"]; 
	       $fechaInicial =$_POST["fecha_inicialRango"];
	       $fechaFinal   =$_POST["fecha_finalRango"];
//----------------------------------------------------------			  
		  
		   $fecha = explode ("/",$fechaInicial);
		   $fechaIni = $fecha[2]."-".$fecha[1]."-".$fecha[0];
		   
		   $fechaF = explode ("/",$fechaFinal);
		   $fechaFin = $fechaF[2]."-".$fechaF[1]."-".$fechaF[0];
		   	
	  
$cuerpo2V= utf8_encode($cuerpo2V); 



//---------------- $idtblProveedorSelec=$_POST["SelectProveedor"];
 
$respuestaA1 = FuncionesReporte::getAllTblordencompraDatosbyFechasUnoV($nameCiudad,$fechaIni,$fechaFin,$idtblProveedorSelec);              
              
          foreach( $respuestaA1 as $res1){     		  
		  $idtblordencompra =$res1['idtblordencompra']; 
          $idtblproveedor=	$res1['idtblproveedor'];  
                 
			  
		       $respuesta2A = FuncionesReporte::getTblentregaproductoByOrdenProveedorFechasV($idtblordencompra,$idtblproveedor);
		       foreach( $respuesta2A as $res2){				                                
					
                            $fCompra=$res1['tblordencompra_fchordencompra'];
							$fEntrega=$res2['tblentregaproducto_fchentrega'];
							$fcor= $res2['tblentregaproducto_fchcortepago'];
							
							$fpag= $res2['tblentregaproducto_fchpagoproveedor'];
							
							
							
							$fco = explode ("-",$fCompra);
		                    $fdeCompra = $fco[2]."-".$fco[1]."-".$fco[0];
							
							$fen = explode ("-",$fEntrega);
		                    $fdeEntrega = $fen[2]."-".$fen[1]."-".$fen[0];
							
							$fcort = explode ("-",$fcor);
		                    $fdeCorte = $fcort[2]."-".$fcort[1]."-".$fcort[0];
							
							$fpago = explode ("-",$fpag);
		                    $fdePago = $fpago[2]."-".$fpago[1]."-".$fpago[0];
							
							
	
	
$cuerpo2V .= "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title></title>
</head>
<body> 

<table class='table1' style='page-break-inside: avoid'>
<tr> 
<td class='neg'>Proveedor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;
 ".$res1['tblproveedor_nombre']."</td>  <td></td> <td></td>  <td></td><td></td>
</tr>

<tr> 
<td>&nbsp;</td>
<td></td><td></td> <td></td> <td></td>
</tr>

<tr> 
<td>&nbsp;</td>
<td></td><td></td> <td></td> <td></td>
</tr>

<tr> 
<td></td> 
<td></td> 
<td></td> 
<td></td> <td></td>
</tr>

<tr> 
<td></td> 
<td>Reporte de Ventas</td> 
<td></td>
<td></td>
<td></td>
</tr>
</table> <br><br>

"; 									
							
$cuerpo2V .= "
<table class='table1' >  
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>Orden</td>
<td class='ta1'>".$res1['idtblordencompra']."</td>
 </tr> 



<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>Fecha de Compra</td>
<td class='ta1'>".$fdeCompra."</td>
 </tr> 
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>Fecha de Entrega</td>
<td class='ta1'>".$fdeEntrega."</td>
 </tr> 




    
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>Fecha de Corte</td>
<td class='ta1'>".$fdeCorte."</td>
 </tr> 
 
 
 <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>Fecha de Pago</td>
<td class='ta1'>".$fdePago."</td>
 </tr> 
 
 
</table> <br> <br>";	


$cuerpo2V .= "<table class='table2'>
<tr>
<td class='rell'>Descripción</td> 
<td class='rell'>Tamaño</td> 
<td class='rell'>Cantidad</td> 
<td class='rell'>Precio Unitario </td>
<td class='rell'>Importe</td> 
<td class='rell'>Comisión</td> 
</tr>
"; 
           $productosA3 = FuncionesReporte::getAllTblcarritoproductByidorden3V($idtblordencompra,$idtblproveedor);		 
		      foreach( $productosA3 as $resP){
				  
				  
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

    //.................Total de productos normales precio Real.........
                         $cant = $resP['tblcarritoproduct_cantidad'];
						 $pReal = $resP['tblcarritoproduct_precioreal'];
						 
			             $subtotal = $cant*$pReal;            			
		                 $totalCompra= $totalCompra + $subtotal; 
			       	
					     
                         $comisioN= ($subtotal*0.10)*1.16;
						            // $comisioN= ($pReal*0.10)*1.16;
						
               $totaldecomisiones=$totaldecomisiones+$comisioN;
						 
      		  
$cuerpo2V .= "
<tr>
<td>".$resP['tblcarritoproduct_nombreproducto']."-".$resP['tblespecificingrediente_nombre']."</td>
<td>".$caracteristica."</td>    
<td>".$resP['tblcarritoproduct_cantidad']."</td>
<td>$".$resP['tblcarritoproduct_precioreal']."</td>
<td>$".$subtotal."</td> 
<td>$".$comisioN."</td> 
<tr>
";  
                    				  
			
}  
  
     
         
//Productos complementarios------------
$productosComplementariosA1 = FuncionesReporte::getAllTblordencompraProCompRV($idtblordencompra,$idtblproveedor);  
               foreach( $productosComplementariosA1 as $resPCom){	
			      $a1= $resPCom['tblcarritoproductcomplem_cantidad'];
			       $a2= $resPCom['tblcarritoproductcomplem_precioreal'];
                   $subtotalcomplem = $a1*$a2;
                   $totalCompra = $totalCompra + $subtotalcomplem;

                   	 $comisioNC= ($subtotalcomplem*0.10)*1.16;
					 //$comisioNC= ($a2*0.10)*1.16;
					  $totaldecomisiones=$totaldecomisiones+$comisioNC;
					 
$cuerpo2V .= "
<tr>
<td colspan='2'>".$resPCom['tblcarritoproductcomplem_nombreproducto']."</td>    
<td>".$resPCom['tblcarritoproductcomplem_cantidad']."</td> 
<td>$".$resPCom['tblcarritoproductcomplem_precioreal']."</td> 
<td>$".$subtotalcomplem."</td> 
<td>$".$comisioNC."</td> 
</tr>
";     
              				 
}
                  
//fin Productos complementarios ---------  
		
				$totalImporte=$totalCompra;
				$totalComisiones=$totaldecomisiones;
				$totalaDepositar= $totalImporte-$totalComisiones;
$cuerpo2V .= " 
 </table> ";  


$cuerpo2V .= "<br>
<table class='table1'>      
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>Total del Importe</td>
<td class='ta1'>$ &nbsp;&nbsp; ".$totalImporte."</td>
 </tr> 
 
 
 <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>Importe de comisiones</td>
<td class='ta1'>$ &nbsp;&nbsp; ".$totalComisiones."</td>
 </tr> 
 
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td class='rell'>Total a depositar en Pesos</td>
<td class='ta1 rell'>$ &nbsp;&nbsp; ".$totalaDepositar."</td>
 </tr> 
 
 
</table> <pagebreak />
</body>
		  </html>";	
		                       
		  
		  }  
 
unset($subtotal);  	
unset($subtotalcomplem);
unset($totalCompra);

unset($comisioN);
unset($comisioNC); 
unset($subtotalD);  	
unset($subtotalcomplemD);
unset($totalCompraD); 

unset($totalImporte);  

unset($totaldecomisiones);
unset($totalComisiones);
unset($totalaDepositar);


		  }

  $archivo2V='ReporteVentas.pdf';
  $archivo_de_salida2V = $archivo2V;
  $mpdf2V  =  new mPDF('c','letter','','',19,21,36,24);
  $mpdf2V->SetDisplayMode('fullpage');  // ()decidir como se va a mostrar el PDF
  $mpdf2V->SetAuthor("BePickler"); //poner autor al pdf, puede ser puesto de varias maneras
  $stylesheet2V = file_get_contents('colorPdf.css'); 
  $mpdf2V->WriteHTML ($stylesheet2V,1);
  $mpdf2V->WriteHTML($cuerpo2V,2);  
  $mpdf2V->Output($archivo_de_salida2V); 

//Creacion de las cabeceras que generarán el archivo pdf
header ("Content-Type: application/download");
header ("Content-Disposition: attachment; filename=$archivo2V");
header("Content-Length: " . filesize("$archivo2V"));
$fp2V = fopen($archivo2V, "r");
fpassthru($fp2V);
fclose($fp2V);


unlink($archivo2V); 
	
	
	//**************************************** fin UNO ********************************
 
} //fin del else porque selecciono un proveedor

}//fin del boton vertical
 
 
 //____________________________________________________________________________________________________
unset($nameCiudad);
unset($fechaInicial);
unset($fechaFinal);  
unset($idtblProveedorSelec);

?>
