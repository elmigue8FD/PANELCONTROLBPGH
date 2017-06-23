<?php
header('Content-type: txt/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Reporte_Productos.csv');
header('Pragma: no-cache');
header('Expires: 0');

include_once 'FuncionesReporte.php';
if (isset($_POST["generar102"])) 
{
	
	       $nameCiudad=$_POST["selectCiudadGD2"]; 
	       $fechaInicial=$_POST["fecha_inicialRangoD2"];
	       $fechaFinal=$_POST["fecha_finalRangoD2"];
		   
		
		   $fecha = explode ("/",$fechaInicial);
		   $fechaIni = $fecha[2]."-".$fecha[1]."-".$fecha[0];
		   
		   $fechaF = explode ("/",$fechaFinal);
		   $fechaFin = $fechaF[2]."-".$fechaF[1]."-".$fechaF[0];
?>	
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />  
</head> 
<h5>Reporte sobre los productos vendidos en la ciudad de <?php echo $nameCiudad;?> durante el periodo <?php echo $fechaInicial;?> - <?php echo $fechaFinal;?>.</h5> </br>



<table border="1">
<tr bgcolor="#CCCCCC"> 
<td>Mes</td>
<td>Procedencia de Compra</td>
<td>Orden</td>
<td>Fecha de compra</td>
<td>Fecha de entrega</td>
<td>Categoría</td>
<td>Proveedor</td>
<td>Producto</td>
<td>Tamaño</td>
<td>Tipo de producto</td>
<td>Cantidad</td>
<td>Precio Real</td> 
<td>Costo de compra por producto</td>
<td>Comisión por producto</td>
<td>Pago a proveedor </td>
<td>Comprador</td>
</tr>  
<?php
           $orden = FuncionesReporte::getAllTblordencompraDatosD2($nameCiudad,$fechaIni,$fechaFin);		 
		      foreach( $orden as $resO){
				  
				  
				$idtblordencompra = $resO['idtblordencompra'];
				  $idtblproveedor = $resO['idtblproveedor'];
				    $proveedorNombre = $resO['tblproveedor_nombre'];
					
					$ProcedenciaCompra = $resO['tblordencompra_medio'];
				  
				        
						 $fCompra = $resO['tblordencompra_fchordencompra'];
						  
						  $comprador = $resO['tblordencompra_nombrecliente']; 
				  
				  
				   //-------------------------------mes
				   $fco3 = explode ("-",$fCompra);
		          $resMes = $fco3[1]; //fecha de entrega
				  
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
					 
				  
				  
				  //------------------------------
				   
				   $fcom = explode ("-",$fCompra);
		          $fdeCompra = $fcom[2]."-".$fcom[1]."-".$fcom[0];  //fecha de compra	
				  
				$orden2 = FuncionesReporte::getTblentregaproductoByOrdenProveedorD2($idtblordencompra,$idtblproveedor);		 
		        foreach( $orden2 as $resO2){
					           $fEntrega=$resO2['tblentregaproducto_fchentrega']; 
			       $fco = explode ("-",$fEntrega);
		          $fdeEntrega = $fco[2]."-".$fco[1]."-".$fco[0]; //fecha de entrega

				  $orden3 = FuncionesReporte::getAllTblcarritoproductByidorden3($idtblordencompra,$idtblproveedor);		 
		          foreach( $orden3 as $resO3){
					  
					 $nombreProducto = $resO3['tblcarritoproduct_nombreproducto'];
					 
					 $diametro =$resO3['tblproductdetalle_diametro'];
                        $largo =$resO3['tblproductdetalle_largo'];
                        $ancho =$resO3['tblproductdetalle_ancho'];
                       $piezas =$resO3['tblproductdetalle_piezas'];				  
				  
                          if($diametro!=null){
			$caracteristica= $diametro.' cm';          
		                    }
        if($largo!=null && $ancho!=null){
			$caracteristica= $largo.' cm x '.$ancho.'cm';
                       }
        if($piezas!=null){
			$caracteristica= $piezas.' piezas';         
                   }

             $categoria = $resO3['tblcategproduct_nombre'];
        $especificacion	= $resO3['tblespecificingrediente_nombre'];	
		      $cantidad = $resO3['tblcarritoproduct_cantidad'];
			$precioReal = $resO3['tblcarritoproduct_precioreal'];
			
		   $costoCompra = $cantidad*$precioReal;
			  $comision = $costoCompra * 0.10 * 1.16;
		$pagoAproveedor = $costoCompra-$comision;
		
			
 ?>
<tr>
<td><?php echo $mes;?></td> 
<td><?php echo $ProcedenciaCompra;?></td> 
<td><?php echo $idtblordencompra;?></td>
<td><?php echo $fdeCompra;?></td>
<td><?php echo $fdeEntrega;?></td>
<td><?php echo $categoria;?></td> 
<td><?php echo $proveedorNombre;?></td>
<td><?php echo $nombreProducto;?></td>  
<td><?php echo $caracteristica;?></td>
<td><?php echo $especificacion;?></td>
<td><?php echo $cantidad;?></td>   
<td>$<?php echo $precioReal;?></td>   
<td>$<?php echo $costoCompra;?></td>
<td>$<?php echo $comision;?></td>
<td>$<?php echo $pagoAproveedor;?></td>
<td><?php echo $comprador;?></td>
</tr>
 
<?php  

                				  
			
           }  //cierre de 03
		   
	//-------------Productos complementarios------------
$productosComplementarios = FuncionesReporte::getAllTblordencompraProCompR($idtblordencompra,$idtblproveedor);  
               foreach( $productosComplementarios as $resPCom){	
          	   
	   $categoriaComp="Producto Complementario";
	   
	   $nombreProdComp = $resPCom['tblcarritoproductcomplem_nombreproducto'];
	   $cantProdComp = $resPCom['tblcarritoproductcomplem_cantidad'];
	  $precioRealProdComp = $resPCom['tblcarritoproductcomplem_precioreal'];
	  
	  
	   $costoCompraProdComp = $cantProdComp*$precioRealProdComp;
			  $comisionProdComp = $costoCompraProdComp * 0.10 * 1.16;
		$pagoAproveedorProComp = $costoCompraProdComp-$comisionProdComp;
	     
?>

<tr>
<td><?php echo $mes;?></td>
<td><?php echo $ProcedenciaCompra;?></td> 
<td><?php echo $idtblordencompra;?></td>
<td><?php echo $fdeCompra;?></td>
<td><?php echo $fdeEntrega;?></td>
<td><?php echo $categoriaComp;?></td> 
<td><?php echo $proveedorNombre;?></td>
<td colspan='3'><?php echo $nombreProdComp;?></td>
<td><?php echo $cantProdComp;?></td>   
<td>$<?php echo $precioRealProdComp;?></td>   
<td>$<?php echo $costoCompraProdComp;?></td>
<td>$<?php echo $comisionProdComp;?></td>
<td>$<?php echo $pagoAproveedorProComp;?></td>
<td><?php echo $comprador;?></td>
</tr>		   
<?php
     } //fin Productos complementarios ---------  
		   
     } //cierre de 02
} //cierre de 0
?> 
 </table> 
</html>
<?php                  				  
			
}  //del principio
?> 