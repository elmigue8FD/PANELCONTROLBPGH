<?php
include_once 'FuncionesReporte.php';
include_once 'mPDF/mpdf.php';

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
		   	
	  
$cuerpo= utf8_encode($cuerpo); 



//----------------
 
$respuesta = FuncionesReporte::getAllTblordencompraDatosbyFechas($nameCiudad,$fechaIni,$fechaFin);              
              
          foreach( $respuesta as $res1){     		  
		  $idtblordencompra =$res1['idtblordencompra']; 
          $idtblproveedor=	$res1['idtblproveedor'];  
                 
			  
		       $respuesta2 = FuncionesReporte::getTblentregaproductoByOrdenProveedorFechas($idtblordencompra,$idtblproveedor);
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
							
							
							$sistemaPago = $res1['tblordencompra_sistemapago'];
	//-----------------para tl a depos	
     //producto normal	
	 $productos = FuncionesReporte::getAllTblcarritoproductByidorden3($idtblordencompra,$idtblproveedor);		 
		      foreach( $productos as $resP){
				  

                     //.................Total de productos normales precio Real.........
                         $cant = $resP['tblcarritoproduct_cantidad'];
						 $pReal = $resP['tblcarritoproduct_precioreal'];
						 
			             $subtotalD = $cant*$pReal*0.884;            			
		                 $totalCompraD= $totalCompraD + $subtotalD; 
								  
			
         }  //fin proucto normal	
 
 //Productos complementarios-----------------------------------
$productosComplementarios = FuncionesReporte::getAllTblordencompraProCompR($idtblordencompra,$idtblproveedor);  
               foreach( $productosComplementarios as $resPCom){	
                 $cantPC = $resPCom['tblcarritoproductcomplem_cantidad'];
                 $precPC = $resPCom['tblcarritoproductcomplem_precioreal'];
   $subtotalcomplemD = $cantPC*$precPC*0.884;
   $totalCompraD = $totalCompraD + $subtotalcomplemD;

                     					 
}
                  
//fin Productos complementarios ---------  		 
	//------------------------
                $totalDepositar=$totalCompraD;
	
$cuerpo .= "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
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
							
$cuerpo .= "
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
 
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td class='rell'>Total del deposito</td>
<td class='ta1 rell'>
 $ &nbsp;&nbsp; ".$totalDepositar."</td>
 </tr> 
 
</table> <br> <br>";	

$cuerpo .= "<table class='table2'>
<tr>
<td class='rell'>Descripción</td> 
<td class='rell'>Tamaño</td> 
<td class='rell'>Cantidad</td> 
<td class='rell'>Precio Unitario </td>
<td class='rell'>Importe</td> 
<td class='rell'>Comisión</td> 
</tr>
"; 
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

    //.................Total de productos normales precio Real.........
                         $cant = $resP['tblcarritoproduct_cantidad'];
						 $pReal = $resP['tblcarritoproduct_precioreal'];
						 
			             $subtotal = $cant*$pReal;            			
		                 $totalCompra= $totalCompra + $subtotal; 
			       				   
                         $comisioN= ($pReal*0.10)*1.16;
						 $totaldecomisiones=$totaldecomisiones+$comisioN;
         		  
$cuerpo .= "<tr>
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
$productosComplementarios = FuncionesReporte::getAllTblordencompraProCompR($idtblordencompra,$idtblproveedor);  
               foreach( $productosComplementarios as $resPCom){	
			   
			       $a1= $resPCom['tblcarritoproductcomplem_cantidad'];
				   $a2= $resPCom['tblcarritoproductcomplem_precioreal'];
                   $subtotalcomplem = $a1*$a2;
                   $totalCompra = $totalCompra + $subtotalcomplem;

				     $comisioNC= ($a2*0.10)*1.16;
					 $totaldecomisiones=$totaldecomisiones+$comisioNC;
                   	
$cuerpo .= "
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
$cuerpo .= " 
 </table> ";  


$cuerpo .= "<br>
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

  $archivo='ReporteVentas.pdf';
  $archivo_de_salida = $archivo;
  $mpdf  =  new mPDF('c','letter','','',19,21,36,24);
  $mpdf->SetDisplayMode('fullpage');  // ()decidir como se va a mostrar el PDF
  $mpdf->SetAuthor("BePickler"); //poner autor al pdf, puede ser puesto de varias maneras
  $stylesheet = file_get_contents('colorPdf.css'); 
  $mpdf->WriteHTML ($stylesheet,1);
 // $mpdf->WriteHTML ($stylesheet2,2);
  $mpdf->WriteHTML($cuerpo,2);
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



//---------------- $idtblProveedorSelec=$_POST["SelectProveedor"];
 
$respuestaA1 = FuncionesReporte::getAllTblordencompraDatosbyFechasUno($nameCiudad,$fechaIni,$fechaFin,$idtblProveedorSelec);              
              
          foreach( $respuestaA1 as $res1){     		  
		  $idtblordencompra =$res1['idtblordencompra']; 
          $idtblproveedor=	$res1['idtblproveedor'];  
                 
			  
		       $respuesta2A = FuncionesReporte::getTblentregaproductoByOrdenProveedorFechas($idtblordencompra,$idtblproveedor);
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
							
							
							$sistemaPago = $res1['tblordencompra_sistemapago'];
	//-----------------para tl a depos	
     //producto normal	
	 $productosA1 = FuncionesReporte::getAllTblcarritoproductByidorden3($idtblordencompra,$idtblproveedor);		 
		      foreach( $productosA1 as $resP){
				  

                     //.................Total de productos normales precio Real.........
                         $cant = $resP['tblcarritoproduct_cantidad'];
						 $pReal = $resP['tblcarritoproduct_precioreal'];
						 
			             $subtotalD = $cant*$pReal*0.884;            			
		                 $totalCompraD= $totalCompraD + $subtotalD; 
								  
			
         }  //fin proucto normal	
 
 //Productos complementarios-----------------------------------
$productosComplementariosA1 = FuncionesReporte::getAllTblordencompraProCompR($idtblordencompra,$idtblproveedor);  
               foreach( $productosComplementariosA1 as $resPCom){	
                 $cantPC = $resPCom['tblcarritoproductcomplem_cantidad'];
                 $precPC = $resPCom['tblcarritoproductcomplem_precioreal'];
   $subtotalcomplemD = $cantPC*$precPC*0.884;
   $totalCompraD = $totalCompraD + $subtotalcomplemD;

                     					 
}
                  
//fin Productos complementarios ---------  		 
	//------------------------
                $totalDepositar=$totalCompraD;
	
$cuerpo2 .= "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
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
							
$cuerpo2 .= "
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
 
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td class='rell'>Total del deposito</td>
<td class='ta1 rell'>
 $ &nbsp;&nbsp; ".$totalDepositar."</td>
 </tr> 
 
 
</table> <br> <br>";	

/*<td class='rell'>Orden</td>
<td class='rell'>Fecha de Compra</td>  
<td class='rell'>Fecha de Entrega</td> */
$cuerpo2 .= "<table class='table2'>
<tr>
<td class='rell'>Descripción</td> 
<td class='rell'>Tamaño</td> 
<td class='rell'>Cantidad</td> 
<td class='rell'>Precio Unitario </td>
<td class='rell'>Importe</td> 
<td class='rell'>Comisión</td> 
</tr>
"; 
           $productosA3 = FuncionesReporte::getAllTblcarritoproductByidorden3($idtblordencompra,$idtblproveedor);		 
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
			       				   
                          $comisioN= ($pReal*0.10)*1.16;
						 
						 $totaldecomisiones=$totaldecomisiones+$comisioN;
/*<tr><td>".$res1['idtblordencompra']."</td> 
<td>".$fdeCompra ."</td>
<td>".$fdeEntrega."</td> */      		  
$cuerpo2 .= "
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
$productosComplementariosA1 = FuncionesReporte::getAllTblordencompraProCompR($idtblordencompra,$idtblproveedor);  
               foreach( $productosComplementariosA1 as $resPCom){	
			      $a1= $resPCom['tblcarritoproductcomplem_cantidad'];
			       $a2= $resPCom['tblcarritoproductcomplem_precioreal'];
                   $subtotalcomplem = $a1*$a2;
                   $totalCompra = $totalCompra + $subtotalcomplem;

                   	 $comisioNC= ($a2*0.10)*1.16;
					  $totaldecomisiones=$totaldecomisiones+$comisioNC;
$cuerpo2 .= "
<tr>
<td colspan='2'>".$resPCom['tblcarritoproductcomplem_nombreproducto']."</td>    
<td>".$resPCom['tblcarritoproductcomplem_cantidad']."</td> 
<td>$".$resPCom['tblcarritoproductcomplem_precioreal']."</td> 
<td>$".$subtotalcomplem."</td> 
<td>$".$comisioNC."</td> 
</tr>
";     
 /* <td>".$res1['idtblordencompra']."</td> 
<td>".$fdeCompra ."</td>
<td>".$fdeEntrega."</td> */               				 
}
                  
//fin Productos complementarios ---------  
		
				$totalImporte=$totalCompra;
				$totalComisiones=$totaldecomisiones;
				$totalaDepositar= $totalImporte-$totalComisiones;
$cuerpo2 .= " 
 </table> ";  


$cuerpo2 .= "<br>
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

  $archivo2='ReporteVentas.pdf';
  $archivo_de_salida2 = $archivo2;
  $mpdf2  =  new mPDF('c','letter','','',19,21,36,24);
  $mpdf2->SetDisplayMode('fullpage');  // ()decidir como se va a mostrar el PDF
  $mpdf2->SetAuthor("BePickler"); //poner autor al pdf, puede ser puesto de varias maneras
  $stylesheet2 = file_get_contents('colorPdf.css'); 
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

}//fin del boton
unset($nameCiudad);
unset($fechaInicial);
unset($fechaFinal);  
unset($idtblProveedorSelec);

?>
