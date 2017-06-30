<?php
require '../../../db/ConexionDB.php';
//falta requiere 
class FuncionesReporte{

	function _constructu(){}
	
	/*Muestra orden pagada en base a un rango d efachas*/
	public static function getAllTblordencompraDatosbyFechasDos($nameCiudad,$fechaIni,$fechaFin){ 
	                       
			$consulta = "SELECT Distinct(PRO.tblproveedor_nombre),PRO.idtblproveedor			             
                        FROM tblordencompra OC                                        
   INNER JOIN tblcarritoproduct CA ON  CA.tblcarritoproduct_idtblordencompra = OC.idtblordencompra 
   INNER JOIN tbldatosenvio ENV ON ENV.tbldatosenvio_idtblordencompra = OC.idtblordencompra
   INNER JOIN tblproductdetalle TPD ON TPD.idtblproductdetalle = CA.tblcarritoproduct_idtblproductdetalle
   INNER JOIN tblproducto TP ON TP.idtblproducto = TPD.tblproducto_idtblproducto
   INNER JOIN tblproveedor PRO ON PRO.idtblproveedor = TP.tblproveedor_idtblproveedor      
   INNER JOIN tblentregaproducto ET ON ET.tblentregaproducto_idtblordencompra = OC.idtblordencompra
   WHERE OC.tblordencompra_statuspagado=1 AND tblentregaproducto_status='entregado'
   AND tblentregaproducto_statusdeposito='pagado' 
   AND ENV.tbldatosenvio_ciudad=? 
   AND OC.tblordencompra_fchordencompra Between ? AND ?";
   	  	
				
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$nameCiudad,PDO::PARAM_STR);
            $resultado->bindParam(2,$fechaIni,PDO::PARAM_STR);
            $resultado->bindParam(3,$fechaFin,PDO::PARAM_STR);			
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene un registro de tblentregaproducto  por ordencompra y proveedor 2*/
    public static function getTblentregaproductoByOrdenProveedorFechasH($idtblproveedore){
	    
		$consulta = "SELECT * FROM tblentregaproducto WHERE tblentregaproducto_status='entregado'
                      AND tblentregaproducto_statusdeposito='pagado' AND					  
                      tblentregaproducto_idtblproveedor = ? "; 
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			//$resultado->bindParam(1,$iddeorden,PDO::PARAM_INT);
			$resultado->bindParam(1,$idtblproveedore,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Consultar un carritoproduct por idtblordencompra y proveedor */
	public static function getAllTblcarritoproductByidorden3($iddeprovee,$iddeorden){
	    
		$consulta = "SELECT Distinct(TP.tblproveedor_idtblproveedor),TCP.tblcarritoproduct_cantidad,TCP.tblcarritoproduct_nombreproducto,		              
                     TCP.tblcarritoproduct_precioreal,TCP.tblcarritoproduct_preciobp,I.tblespecificingrediente_nombre,
                     TPD.tblproductdetalle_diametro,TPD.tblproductdetalle_largo,TPD.tblproductdetalle_ancho,
					 TPD.tblproductdetalle_piezas,TOC.*
                     FROM tblcarritoproduct TCP		             
       				 INNER JOIN tblordencompra TOC ON  TCP.tblcarritoproduct_idtblordencompra = TOC.idtblordencompra  
      				 INNER JOIN tblproductdetalle TPD ON TPD.idtblproductdetalle = TCP.tblcarritoproduct_idtblproductdetalle
      				 INNER JOIN tblespecificingrediente I ON TPD.tblespecificingrediente_idtblespecificingrediente = I.idtblespecificingrediente
				 INNER JOIN tblproducto TP ON TP.idtblproducto = TPD.tblproducto_idtblproducto 
				INNER JOIN tblentregaproducto EN ON EN.tblentregaproducto_idtblordencompra = TOC.idtblordencompra
				 WHERE EN.tblentregaproducto_status='entregado'
                 AND EN.tblentregaproducto_statusdeposito='pagado' 
				 AND TP.tblproveedor_idtblproveedor = ? AND TCP.tblcarritoproduct_idtblordencompra = ?";
		           
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);			
			$resultado->bindParam(1,$iddeprovee,PDO::PARAM_INT);
			$resultado->bindParam(2,$iddeorden,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*---------reporte de productos complementarios*/
	public static function getAllTblordencompraProCompR2($iddeprovee,$iddeorden){	    
		$consulta = "SELECT OC.*,ENV.*,PC.*,PCOM.* FROM tblcarritoproductcomplem PCOM  
           INNER JOIN tblordencompra OC ON PCOM.tblcarritoproductcomplem_idtblordencompra = OC.idtblordencompra
		   INNER JOIN tbldatosenvio ENV ON ENV.tbldatosenvio_idtblordencompra = OC.idtblordencompra
		   INNER JOIN  tblproductcomplem PC ON PC.idtblproductcomplem = PCOM.tblcarritoproductcomplem_idtblproductcomplem
      	     WHERE PC.tblproveedor_idtblproveedor=? AND OC.idtblordencompra=?";
		 
		try{   

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);			
			$resultado->bindParam(1,$iddeprovee,PDO::PARAM_INT);
			$resultado->bindParam(2,$iddeorden,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Muestra orden pagada en base a un rango d efachas*/
	public static function getAllTblordencompraDatosbyFechasUno2($nameCiudad,$fechaIni,$fechaFin,$idtblProveedorSelec){ 
	                       
			$consulta = "SELECT Distinct(PRO.tblproveedor_nombre),PRO.idtblproveedor
                        FROM tblordencompra OC                                        
   INNER JOIN tblcarritoproduct CA ON  CA.tblcarritoproduct_idtblordencompra = OC.idtblordencompra 
   INNER JOIN tbldatosenvio ENV ON ENV.tbldatosenvio_idtblordencompra = OC.idtblordencompra
   INNER JOIN tblproductdetalle TPD ON TPD.idtblproductdetalle = CA.tblcarritoproduct_idtblproductdetalle
   INNER JOIN tblproducto TP ON TP.idtblproducto = TPD.tblproducto_idtblproducto
   INNER JOIN tblproveedor PRO ON PRO.idtblproveedor = TP.tblproveedor_idtblproveedor
   LEFT JOIN tblhistcupondescuento DC ON DC.tblhistcupondescuento_idtblordencompra =OC.idtblordencompra 
   INNER JOIN tblentregaproducto ET ON ET.tblentregaproducto_idtblordencompra = OC.idtblordencompra
   WHERE OC.tblordencompra_statuspagado=1 AND tblentregaproducto_status='entregado'
   AND tblentregaproducto_statusdeposito='pagado'    
   AND ENV.tbldatosenvio_ciudad=? AND PRO.idtblproveedor=? 
   AND OC.tblordencompra_fchordencompra Between ? AND ?";
   	  	
				
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$nameCiudad,PDO::PARAM_STR); 
			$resultado->bindParam(2,$idtblProveedorSelec,PDO::PARAM_INT);
            $resultado->bindParam(3,$fechaIni,PDO::PARAM_STR);
            $resultado->bindParam(4,$fechaFin,PDO::PARAM_STR);			
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	 /*Muestra orden pagada en base a un rango d efachas*/
	public static function getAllTblordencompraDatosbyFechasV($nameCiudad,$fechaIni,$fechaFin){ 
	                       
			$consulta = "SELECT Distinct(PRO.tblproveedor_nombre),PRO.idtblproveedor,
                        OC.*,ENV.*,DC.tblhistcupondescuento_descuento
                        FROM tblordencompra OC                                        
   INNER JOIN tblcarritoproduct CA ON  CA.tblcarritoproduct_idtblordencompra = OC.idtblordencompra 
   INNER JOIN tbldatosenvio ENV ON ENV.tbldatosenvio_idtblordencompra = OC.idtblordencompra
   INNER JOIN tblproductdetalle TPD ON TPD.idtblproductdetalle = CA.tblcarritoproduct_idtblproductdetalle
   INNER JOIN tblproducto TP ON TP.idtblproducto = TPD.tblproducto_idtblproducto
   INNER JOIN tblproveedor PRO ON PRO.idtblproveedor = TP.tblproveedor_idtblproveedor
   LEFT JOIN tblhistcupondescuento DC ON DC.tblhistcupondescuento_idtblordencompra =OC.idtblordencompra     
   WHERE OC.tblordencompra_statuspagado=1 AND ENV.tbldatosenvio_ciudad=? 
   AND OC.tblordencompra_fchordencompra Between ? AND ?";
   	  	
				
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$nameCiudad,PDO::PARAM_STR);
            $resultado->bindParam(2,$fechaIni,PDO::PARAM_STR);
            $resultado->bindParam(3,$fechaFin,PDO::PARAM_STR);			
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Obtiene un registro de tblentregaproducto  por ordencompra y proveedor 2*/
    public static function getTblentregaproductoByOrdenProveedorFechasV($idtblordencompra,$idtblproveedor){
	    
		$consulta = "SELECT * FROM tblentregaproducto WHERE tblentregaproducto_status='entregado'
                      AND tblentregaproducto_statusdeposito='pagado' AND
                 tblentregaproducto_idtblordencompra = ? AND tblentregaproducto_idtblproveedor = ? "; 
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblordencompra,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Consultar un carritoproduct por idtblordencompra y proveedor */
	public static function getAllTblcarritoproductByidorden3V($idtblordencompra,$idtblproveedor){
	    
		$consulta = "SELECT TCP.tblcarritoproduct_cantidad,TCP.tblcarritoproduct_nombreproducto,
                     TCP.tblcarritoproduct_precioreal,TCP.tblcarritoproduct_preciobp,I.tblespecificingrediente_nombre,
                     TPD.tblproductdetalle_diametro,TPD.tblproductdetalle_largo,TPD.tblproductdetalle_ancho,TPD.tblproductdetalle_piezas,CA.tblcategproduct_nombre
                     FROM tblcarritoproduct TCP		             
       				 INNER JOIN tblordencompra TOC ON  TCP.tblcarritoproduct_idtblordencompra = TOC.idtblordencompra  
      				 INNER JOIN tblproductdetalle TPD ON TPD.idtblproductdetalle = TCP.tblcarritoproduct_idtblproductdetalle
      				 INNER JOIN tblespecificingrediente I ON TPD.tblespecificingrediente_idtblespecificingrediente = I.idtblespecificingrediente
				 INNER JOIN tblproducto TP ON TP.idtblproducto = TPD.tblproducto_idtblproducto      				 
				 INNER JOIN tblcategproduct CA ON TP.tblcategproduct_idtblcategproduct = CA.idtblcategproduct
				 WHERE TCP.tblcarritoproduct_idtblordencompra = ? AND TP.tblproveedor_idtblproveedor = ? ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblordencompra,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*---------reporte de productos complementarios*/
	public static function getAllTblordencompraProCompRV($idtblordencompra,$idtblproveedor){	    
		$consulta = "SELECT OC.*,ENV.*,PC.*,PCOM.* FROM tblcarritoproductcomplem PCOM  
           INNER JOIN tblordencompra OC ON PCOM.tblcarritoproductcomplem_idtblordencompra = OC.idtblordencompra
		   INNER JOIN tbldatosenvio ENV ON ENV.tbldatosenvio_idtblordencompra = OC.idtblordencompra
		   INNER JOIN  tblproductcomplem PC ON PC.idtblproductcomplem = PCOM.tblcarritoproductcomplem_idtblproductcomplem
      	     WHERE OC.idtblordencompra= ? AND PC.tblproveedor_idtblproveedor=?";
		   
		try{   

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblordencompra,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Muestra orden pagada en base a un rango d efachas*/
	public static function getAllTblordencompraDatosbyFechasUnoV($nameCiudad,$fechaIni,$fechaFin,$idtblProveedorSelec){ 
	                       
			$consulta = "SELECT Distinct(PRO.tblproveedor_nombre),PRO.idtblproveedor,
                        OC.*,ENV.*,DC.tblhistcupondescuento_descuento
                        FROM tblordencompra OC                                        
   INNER JOIN tblcarritoproduct CA ON  CA.tblcarritoproduct_idtblordencompra = OC.idtblordencompra 
   INNER JOIN tbldatosenvio ENV ON ENV.tbldatosenvio_idtblordencompra = OC.idtblordencompra
   INNER JOIN tblproductdetalle TPD ON TPD.idtblproductdetalle = CA.tblcarritoproduct_idtblproductdetalle
   INNER JOIN tblproducto TP ON TP.idtblproducto = TPD.tblproducto_idtblproducto
   INNER JOIN tblproveedor PRO ON PRO.idtblproveedor = TP.tblproveedor_idtblproveedor
   LEFT JOIN tblhistcupondescuento DC ON DC.tblhistcupondescuento_idtblordencompra =OC.idtblordencompra     
   WHERE OC.tblordencompra_statuspagado=1 AND ENV.tbldatosenvio_ciudad=? AND PRO.idtblproveedor=? 
   AND OC.tblordencompra_fchordencompra Between ? AND ?";
   	  	
				
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$nameCiudad,PDO::PARAM_STR); 
			$resultado->bindParam(2,$idtblProveedorSelec,PDO::PARAM_INT);
            $resultado->bindParam(3,$fechaIni,PDO::PARAM_STR);
            $resultado->bindParam(4,$fechaFin,PDO::PARAM_STR);			
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	 
	
	
	
	
}//------
?>
