<?php
include_once 'FuncionesReporte.php';
include_once 'mPDF/mpdf.php';

if (isset($_POST["generar100"])) 
{
          
		    $nameCiudad=$_POST["selectCiudadG"]; 
	       $fechaInicial=$_POST["fecha_inicialRango"];
	       $fechaFinal=$_POST["fecha_finalRango"];
		   
		
		   $fecha = explode ("/",$fechaInicial);
		   $fechaIni = $fecha[2]."-".$fecha[1]."-".$fecha[0];
		   
		   $fechaF = explode ("/",$fechaFinal);
		   $fechaFin = $fechaF[2]."-".$fechaF[1]."-".$fechaF[0];
		   	
	  
$cuerpo= utf8_encode($cuerpo); 
$cuerpo .= "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title></title>
</head>
<body> 
<h3 class='texCen'>Reporte de ventas</h3>
<table class='table1'>
<tr> 
<td class='neg'>Ventas por BePickler Online</td>  <td></td>  <td class='ta1'>Desde:".$fechaInicial." - Hasta:".$fechaFinal."</td>
</tr>
</table>

"; 


//----------------
 
$respuesta = FuncionesReporte::getAllTblordencompraDatosbyFechas($nameCiudad,$fechaIni,$fechaFin);              
              
          foreach( $respuesta as $res1){     		  
		  $idtblordencompra =$res1['idtblordencompra']; 
          $idtblproveedor=	$res1['idtblproveedor'];  
        // $costoServDom = $res1['tblordencompra_precioServicioDomicilio']; ya no cuenta este campo
         $costoServDom1 = $res1['tblordencompra_totaldelivery'];  

         if($costoServDom1==null || $costoServDom1=="" || $costoServDom1=="0.0" || $costoServDom1=="0"){
			 $costoServDom = 0;          
		                    } else
		{ $costoServDom = $costoServDom1;  }					
							
			 
	 if($costoServDom==0){
	    $comisionXservDomic = 0;
		}else{			
		$comisionXservDomic = $costoServDom*0.15*1.16;  }                
			  
		       $respuesta2 = FuncionesReporte::getTblentregaproductoByOrdenProveedorFechas($idtblordencompra,$idtblproveedor);
		       foreach( $respuesta2 as $res2){				                                
					
                            $fCompra=$res1['tblordencompra_fchordencompra'];
							$fEntrega=$res2['tblentregaproducto_fchentrega'];
							$fcor= $res2['tblentregaproducto_fchcortepago'];
							
							$fco = explode ("-",$fCompra);
		                    $fdeCompra = $fco[2]."-".$fco[1]."-".$fco[0];
							
							$fen = explode ("-",$fEntrega);
		                    $fdeEntrega = $fen[2]."-".$fen[1]."-".$fen[0];
							
							$fcort = explode ("-",$fcor);
		                    $fdeCorte = $fcort[2]."-".$fcort[1]."-".$fcort[0];
							
							
							$sistemaPago = $res1['tblordencompra_sistemapago'];
								 
						
							
$cuerpo .= "<br><br/> 
<table class='table1' style='page-break-inside: avoid'>      
<tr><td class='neg'>Número de venta:".$res2['idtblentregaproducto']."</td>                   <td></td>    <td></td> </tr> 
<tr> <td>Núm de orden:".$res1['idtblordencompra']."</td>                       <td></td>    <td class='ta1'>Proveedor:".$res1['tblproveedor_nombre']."</td>  </tr>
<tr> <td>Fecha de Compra:".$fdeCompra."</td>                 <td></td>    <td class='ta1'>Fecha de Corte:".$fdeCorte."</td></tr> 
<tr> <td>Fecha de Entrega:".$fdeEntrega."</td>                <td></td>    <td class='ta1'>Estatus del Deposito:".$res2['tblentregaproducto_statusdeposito']."</td></tr>
<tr><td>Tipo de Entrega:".$res1['tbldatosenvio_tipodeservicio']."</td>  <td></td>   <td></td>  </tr>
<tr><td>Precio por Servicio a Domicilio:$".$costoServDom."</td>   <td></td>   <td></td> </tr>
<tr><td>Comision por Servicio a Domicilio:$".$comisionXservDomic."</td> <td></td>   <td></td> </tr>
<tr><td>Forma de Pago:".$sistemaPago."</td>                  <td></td>   <td></td> </tr>
</table> <br></br>
<span class='neg'>Producto (s) </span>
";



$cuerpo .= "<table class='table2'>
<tr class='rell'><td>Categoria:</td><td>Nombre del Producto:</td>  <td>Caracteristicas</td>  <td>Cantidad</td> <td>Precio Original Unitario </td></tr>
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

         		  
$cuerpo .= "
<tr><td>".$resP['tblcategproduct_nombre']."</td>  <td>".$resP['tblcarritoproduct_nombreproducto']."</td>   <td>".$caracteristica."-".$resP['tblespecificingrediente_nombre']."</td>    <td>".$resP['tblcarritoproduct_cantidad']."</td> <td>".$resP['tblcarritoproduct_precioreal']."</td></tr>
";  
                     //.................Total de productos normales precio Real.........
                         $cant = $resP['tblcarritoproduct_cantidad'];
						 $pReal = $resP['tblcarritoproduct_precioreal'];
						 
			             $subtotal = $cant*$pReal;            			
		                 $totalCompra= $totalCompra + $subtotal; 
			        //....................Total de productos normales precio BP
					  $precioBP =$resP['tblcarritoproduct_preciobp'];
                      $subtotalBP = $cant*$precioBP;            			
		              $totalCompraBP= $totalCompraBP + $subtotalBP; 					  
			
}  
           
         
//Productos complementarios------------
$productosComplementarios = FuncionesReporte::getAllTblordencompraProCompR($idtblordencompra,$idtblproveedor);  
               foreach( $productosComplementarios as $resPCom){	
                     
$cuerpo .= "
<tr><td>Producto Complementario</td> <td colspan='2'>".$resPCom['tblcarritoproductcomplem_nombreproducto']."</td>    <td>".$resPCom['tblcarritoproductcomplem_cantidad']."</td> <td>".$resPCom['tblcarritoproductcomplem_precioreal']."</td></tr>
";     
                   $subtotalcomplem = $resPCom['tblcarritoproductcomplem_cantidad']*$resPCom['tblcarritoproductcomplem_precioreal'];
                   $totalCompra = $totalCompra + $subtotalcomplem;

                     //........precio BP
                   $subtotalcomplemBP = $resPCom['tblcarritoproductcomplem_cantidad']*$resPCom['tblcarritoproductcomplem_preciobp'];
                   $totalCompraBP = $totalCompraBP + $subtotalcomplemBP;					 
}
                  
//fin Productos complementarios ---------  
		
		$comisionBP = $totalCompra*0.10*1.16; //comision	
		$canParaDepositar = $totalCompra-$comisionBP; //cantidad a depositar
		
		$descuento =$res1['tblhistcupondescuento_descuento'];
		if($descuento=="" || $descuento==null){
			$desc='No aplica';
		   }else 
		  { $desc= '$'.$descuento;}	
                    
                 $precioTotal=$costoServDom+$totalCompraBP;				  
				 $precioFinal = $precioTotal-$descuento; 
				 
				  $sistemaPago = $res1['tblordencompra_sistemapago'];
				 
                 if($sistemaPago=='PayPal'){			          
                       //[Precio final o total de compra con el descuento   x   3.95%   +   4.00 ] x   1.16					   
		                  $comRetenida= ($precioFinal*0.0395+4)*1.16;            
							 }
					  	 
					else if($sistemaPago=='Stripe'){			          
                       //[Precio final o total de compra con el descuento   x   3.6%   +   3.00 ] x   1.16	 				   
		                   $comRetenida= ($precioFinal*0.036+3)*1.16;            
							 }	
                  else if($sistemaPago=='Conekta' || $sistemaPago=='Coneckta'){			          
                       //[Precio final o total de compra con el descuento   x   2.95%   +   2.00 ] x   1.16			   
		                 $comRetenida= ($precioFinal*0.0295+2)*1.16;            
							 }
				else{    $comRetenida = 0; }			 
                 
											 
                 $precioPagado = $precioFinal-$comRetenida;	
                $utilidadesBrutas=$comisionBP+$precioPagado+$comisionXservDomic;
				$utilidadesNetas = $utilidadesBrutas/1.16;
				$utilidadesNetas1 = round($utilidadesNetas,5);
				
$cuerpo .= " 
 <tr> <td colspan='4' class='ta1'>Total de Compra (Productos por Precio Original):</td>              <td class='ta2'> $".$totalCompra."</td>  </tr>
<tr> <td colspan='4' class='ta1'>Comision BePickler:</td>           <td class='ta2'> $".$comisionBP."</td> </tr>
<tr> <td colspan='4' class='ta1'>Cantidad a Depositar:</td>        <td class='ta2'>$".$canParaDepositar."</td> </tr>
<tr> <td colspan='4' class='ta1'>Total de Compra a público:</td> <td class='ta2'>$".$totalCompraBP."</td></tr>
<tr> <td colspan='4' class='ta1'>Descuento:</td>                   <td class='ta2'>".$desc."</td></tr>
<tr> <td colspan='4' class='ta1'>Precio Total (servicio + Total Compra a público ):</td> <td class='ta2'>$".$precioTotal."</td></tr>
<tr> <td colspan='4' class='ta1'>Precio Final con Descuento:</td>  <td class='ta2'>$".$precioFinal."</td></tr>
<tr><td colspan='4' class='ta1'>Comision retenida por el Sistema de Pago:</td><td class='ta2'>$".$comRetenida."</td></tr>
<tr> <td colspan='4' class='ta1'>Precio Final menos comisiones del sistema de pago:</td>  <td class='ta2'>$".$precioPagado."</td></tr>
<tr> <td colspan='4' class='ta1'>Utilidaddes Brutas:</td> <td class='ta2'>$".$utilidadesBrutas."</td></tr>
<tr> <td colspan='4' class='ta1'>Utilidades Netas:</td> <td class='ta2'>$".$utilidadesNetas1."</td></tr>
</table> <pagebreak />
</body>
		  </html>";  
		                       
		  
		  }  
 
unset($subtotal);  	
unset($subtotalcomplem);
unset($totalCompra);


unset($subtotalBP);
unset($subtotalcomplemBP);
unset($totalCompraBP);	  
unset($sistemaPago); //$comRetenida
unset($comRetenida);
		  }

  $archivo='ReporteVentas.pdf';
  $archivo_de_salida = $archivo;
  $mpdf  =  new mPDF('c','letter','','',24,24,34,24);
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

//Eliminación del archivo en el servidor
unlink($archivo); 
	
}
unset($nameCiudad);
unset($fechaInicial);
unset($fechaFinal);

?>
