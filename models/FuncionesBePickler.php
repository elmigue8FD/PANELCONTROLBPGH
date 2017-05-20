<?php
require './../db/ConexionDB.php';
//falta requiere 
class FuncionesBePickler{

	function _constructu(){}


///// FUNCIONES REFRENTE A TABLA tblpais/////////
	/*Insertar un pais*/
	public static function setTblpais($nombrepais, $idioma, $activado, $srcimgbandera,$emailcreo){

		$insert ="INSERT INTO tblpais (tblpais_nombre, tblpais_idioma, tblpais_activado, tblpais_fchmodificacion,tblpais_fchcreacion, tblpais_emailusuacreo, tblpais_emailusuamodifico) VALUES (?,?,?,NOW(), NOW(),?,?)";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombrepais,PDO::PARAM_STR);
			$resultado->bindParam(2,$idioma,PDO::PARAM_STR);
			$resultado->bindParam(3,$activado,PDO::PARAM_INT);
			$resultado->bindParam(4,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(5,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}

	}

	/*Verificar si existe un pais */
	public static function getCheckTblpais($nombrepais){

		$check = "SELECT COUNT(*) FROM tblpais WHERE tblpais_nombre = ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$nombrepais,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->fetchColumn();//retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
	}

	/*Actualizar Pais*/
	public static function setUpdateTblpais($idtblpais, $nombrepais, $idioma, $activado,$srcimgbandera, $emailmodifico){
	    //funcion de llama a setTblhistoricoodif

		$update = "UPDATE tblpais SET tblpais_nombre = ?, tblpais_idioma=?, tblpais_activado = ?, tblpais_fchmodificacion = NOW(), tblpais_emailusuamodifico= ? WHERE idtblpais = ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$nombrepais,PDO::PARAM_STR);
			$resultado->bindParam(2,$idioma,PDO::PARAM_STR);
			$resultado->bindParam(3,$activado,PDO::PARAM_INT);
			$resultado->bindParam(4,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(5,$idtblpais,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el update
		}catch(PDOException $e){
			return false;
		}
	}

	/*Consultar un pais (Este Activo o Inactivo)*/
	public static function getTblpais($idtblpais){

		$consulta = "SELECT * FROM tblpais WHERE idtblpais= ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblpais,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}

	}

	/*Consultar todos los pais (Este Activo o Inactivo)**/
	public static function getAllTblpais(){
		
		$consulta = "SELECT * FROM tblpais";
		
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos de todos los registro 
		} catch(PDOException $e){
			return false;
		}
	}

	/*Consultar todos los pais (Activos)**/
	public static function getAllTblpaisAct(){
	    
		$activado = 1;
		$consulta = "SELECT * FROM tblpais WHERE tblpais_activado = ?";
		
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$activado,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos de todos los registro 
		} catch(PDOException $e){
			return false;
		}
	}

	/*Eliminar un pais*/
	public static function setDeleteTblpais($idtblpais){
		
		$delete = "DELETE FROM tblpais WHERE idtblpais = ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblpais,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount();  //retorna el numero de registros afectado por el delete
		}catch(PDOException $e){
			return false;
		}

	}
	
	/*Eliminar todos los pais*/
	public static function setDeleteAllTblpais(){
		//funcion para inserta en eliminacion con ciclo 
		$delete = "DELETE FROM tblpais";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
			return $resultado->rowCount();  //retorna el numero de registros afectado por el delete
		}catch(PDOException $e){
			return false;
		}

	}

///// FUNCIONES REFRENTE A TABLA tblciudad/////////

	/*Insertar un ciudad*/
	public static function setTblciudad($nombreciudad, $activado, $idtblpais, $emailcreo){

		$insert ="INSERT INTO tblciudad (tblciudad_nombre, tblciudad_activado, tblpais_idtblpais,tblciudad_fchmodificacion, tblciudad_fchcreacion, tblciudad_emailusuacreo, tblciudad_emailusuamodifico) VALUES (?,?,?,NOW(),NOW(),?,?)";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombreciudad,PDO::PARAM_STR);
			$resultado->bindParam(2,$activado,PDO::PARAM_INT);
			$resultado->bindParam(3,$idtblpais,PDO::PARAM_INT);
			$resultado->bindParam(4,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(5,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}

	}

	/*Verificar si existe un Ciudad */
	public static function getCheckTblciudad($nombreciudad, $idtblpais){

		$check = "SELECT COUNT(*) FROM tblciudad WHERE tblciudad_nombre = ? AND tblpais_idtblpais = ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$nombreciudad,PDO::PARAM_STR);
			$resultado->bindParam(2,$idtblpais,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
	}

	/*Actualizar Ciudad*/
	public static function setUpdateTblciudad($idtblciudad, $nombreciudad, $activado,$idtblpais, $emailmodifico){

		$update = "UPDATE tblciudad SET tblciudad_nombre = ?, tblciudad_activado = ?,tblpais_idtblpais = ?, tblciudad_fchmodificacion = NOW(), tblciudad_emailusuamodifico= ? WHERE idtblciudad = ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$nombreciudad,PDO::PARAM_STR);
			$resultado->bindParam(2,$activado,PDO::PARAM_INT);
			$resultado->bindParam(3,$idtblpais,PDO::PARAM_INT);
			$resultado->bindParam(4,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(5,$idtblciudad,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el update
		}catch(PDOException $e){
			return false;
		}
	}
	
	/*Consultar una Ciudad (Este Activa o Inactiva)*/
	public static function getTblciudad($idtblciudad){
	    
		$consulta = "SELECT * FROM tblciudad WHERE idtblciudad= ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblciudad,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Consultar todas las Ciudades (Este Activo o Inactivo)**/
	public static function getAllTblciudad(){
		
		$consulta = "SELECT * FROM tblciudad";
		
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos de todos los registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Consultar todas las Ciudades (Activas)**/
	public static function getAllTblciudadAct(){
		
		$activado=1;
		$consulta = "SELECT * FROM tblciudad WHERE tblciudad_activado = ?";
		
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$activado,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos de todos los registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Eliminar una ciudad*/
	public static function setDeleteTblciudad($idtblciudad){
		
		$delete = "DELETE FROM tblciudad WHERE idtblciudad = ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblciudad,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount();  //retorna el numero de registros afectado por el delete
		}catch(PDOException $e){
			return false;
		}

	}
	
	/*Eliminar todas las ciudad*/
	public static function setDeleteAllTblciudad(){
		
		$delete = "DELETE FROM tblciudad";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
			return $resultado->rowCount();  //retorna el numero de registros afectado por el delete
		}catch(PDOException $e){
			return false;
		}

	}
	
///// FUNCIONES REFRENTE A TABLA tblcolonia/////////

	/*Insertar una Colonia*/
	public static function setTblcolonia($nombrecolonia,$codipost, $activado, $idtblciudad, $emailcreo){

		$insert ="INSERT INTO tblcolonia (tblcolonia_nombre, tblcolonia_codipost, tblcolonia_activado, tblciudad_idtblciudad, tblcolonia_fchmodificacion, tblcolonia_fchcreacion, tblcolonia_emailusuacreo, tblcolonia_emailusuamodifico) VALUES (?,?,?,?,NOW(), NOW(),?,?)";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombrecolonia,PDO::PARAM_STR);
			$resultado->bindParam(2,$codipost,PDO::PARAM_INT);
			$resultado->bindParam(3,$activado,PDO::PARAM_INT);
			$resultado->bindParam(4,$idtblciudad,PDO::PARAM_INT);
			$resultado->bindParam(5,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(6,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Verificar si existe un Colonia en Ciudad*/
	public static function getCheckTblcolonia($nombrecolonia, $idtblciudad){

		$check = "SELECT COUNT(*) FROM tblcolonia WHERE tblcolonia_nombre = ? AND tblciudad_idtblciudad= ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$nombrecolonia,PDO::PARAM_STR);
			$resultado->bindParam(2,$idtblciudad,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
	}
	
	/*Actualizar Colonia*/
	public static function setUpdateTblcolonia($idtblcolonia, $nombrecolonia,$codipost, $activado,$idtblciudad, $emailmodifico){

		$update = "UPDATE tblcolonia SET tblcolonia_nombre = ?,tblcolonia_codipost = ?, tblcolonia_activado = ?, tblciudad_idtblciudad = ?, tblcolonia_fchmodificacion = NOW(), tblcolonia_emailusuamodifico= ? WHERE idtblcolonia = ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$nombrecolonia,PDO::PARAM_STR);
			$resultado->bindParam(2,$codipost,PDO::PARAM_INT);
			$resultado->bindParam(3,$activado,PDO::PARAM_INT);
			$resultado->bindParam(4,$idtblciudad,PDO::PARAM_INT);
			$resultado->bindParam(5,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(6,$idtblcolonia,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el update
		}catch(PDOException $e){
			return false;
		}
	}
	
	/*Consultar una Colonia (Este Activa o Inactiva)*/
	public static function getTblcolonia($idtblcolonia){
	    
		$consulta = "SELECT * FROM tblcolonia WHERE idtblcolonia= ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblcolonia,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Consultar todas las  Colonia (Esten Activa o Inactiva)*/
	public static function getAllTblcolonia(){
	    
		$consulta = "SELECT * FROM tblcolonia ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Consultar todas las  Colonia (Activas)*/
	public static function getAllTblcoloniaAct(){
	    
	    $activado=1;
		$consulta = "SELECT * FROM tblcolonia WHERE tblcolonia_activado=?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$activado,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Eliminar una colonia*/
	public static function setDeleteTblcolonia($idtblcolonia){
		
		$delete = "DELETE FROM tblcolonia WHERE idtblcolonia = ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblcolonia,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount();  //retorna el numero de registros afectado por el delete
		}catch(PDOException $e){
			return false;
		}

	}
	
	/*Eliminar todas colonias*/
	public static function setDeleteAllTblcolonia(){
		
		$delete = "DELETE FROM tblcolonia";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
			return $resultado->rowCount();  //retorna el numero de registros afectado por el delete
		}catch(PDOException $e){
			return false;
		}

	}

///// FUNCIONES REFRENTE A TABLA tblcarritoproduct /////////

    /*Insertar un carritodeproducto*/
    public static function setTblcarritoproduct($cantidad,$nombreproduct,$nombreproveedor,$precioreal,$preciobp,$personalizar,$msjtarjeta,$calif,$emailcreo,$idtblordencompra,$idtblproductdetalle){
        
        $insert ="INSERT INTO tblcarritoproduct (tblcarritoproduct_cantidad, tblcarritoproduct_nombreproducto,tblcarritoproduct_nombreproveedor,tblcarritoproduct_precioreal,tblcarritoproduct_preciobp,tblcarritoproduct_personalizar,tblcarritoproduct_mensajetarjeta,tblcarritoproduct_calificacion,tblcarritoproduct_fchmodificacion,tblcarritoproduct_fchcreacion,tblcarritoproduct_emailusuacreo,tblcarritoproduct_emailusuamodifico,tblcarritoproduct_idtblordencompra,tblcarritoproduct_idtblproductdetalle) VALUES (?,?,?,?,?,?,?,?,NOW(),Now(),?,?,?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$cantidad,PDO::PARAM_INT);
			$resultado->bindParam(2,$nombreproduct,PDO::PARAM_STR);
			$resultado->bindParam(3,$nombreproveedor,PDO::PARAM_STR);
			$resultado->bindParam(4,$precioreal,PDO::PARAM_STR);
			$resultado->bindParam(5,$preciobp,PDO::PARAM_STR);
			$resultado->bindParam(6,$personalizar,PDO::PARAM_STR);
			$resultado->bindParam(7,$msjtarjeta,PDO::PARAM_STR);
			$resultado->bindParam(8,$calif,PDO::PARAM_STR);
			$resultado->bindParam(9,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(10,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(11,$idtblordencompra,PDO::PARAM_INT);
			$resultado->bindParam(12,$idtblproductdetalle,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
        
    }
    
    /*Verificar si existe un carrito*/
    public static function getCheckTblcarritoproduct($idtblordencompra,$idtblproductdetalle){
        
		$check = "SELECT COUNT(*) FROM tblcarritoproduct WHERE tblcarritoproduct_idtblordencompra = ? AND tblcarritoproduct_idtblproductdetalle = ? ";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$idtblordencompra,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblproductdetalle,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
        
    }
    
    /*Actualizar carritoproduct*/
	public static function setUpdateTblcarritoproduct($idtblcarritoproduct,$cantidad,$nombreproduct,$nombreproveedor,$precioreal,$preciobp,$personalizar,$msjtarjeta,$calif,$emailmodifico,$idtblordencompra,$idtblproductdetalle){

		$update = "UPDATE tblcarritoproduct SET tblcarritoproduct_cantidad = ?, tblcarritoproduct_nombreproducto = ?,tblcarritoproduct_nombreproveedor = ?,tblcarritoproduct_precioreal = ?,tblcarritoproduct_preciobp = ?,tblcarritoproduct_personalizar = ?,tblcarritoproduct_mensajetarjeta = ?,tblcarritoproduct_calificacion = ?,tblcarritoproduct_fchmodificacion = NOW(),tblcarritoproduct_emailusuamodifico = ? , tblcarritoproduct_idtblordencompra = ?,tblcarritoproduct_idtblproductdetalle = ? WHERE idtblcarritoproduct = ?";
		
	
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$cantidad,PDO::PARAM_INT);
			$resultado->bindParam(2,$nombreproduct,PDO::PARAM_STR);
			$resultado->bindParam(3,$nombreproveedor,PDO::PARAM_STR);
			$resultado->bindParam(4,$precioreal,PDO::PARAM_STR);
			$resultado->bindParam(5,$preciobp,PDO::PARAM_STR);
			$resultado->bindParam(6,$personalizar,PDO::PARAM_STR);
			$resultado->bindParam(7,$msjtarjeta,PDO::PARAM_STR);
			$resultado->bindParam(8,$calif,PDO::PARAM_STR);
			$resultado->bindParam(9,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(10,$idtblordencompra,PDO::PARAM_INT);
			$resultado->bindParam(11,$idtblproductdetalle,PDO::PARAM_INT);
			$resultado->bindParam(12,$idtblcarritoproduct,PDO::PARAM_INT);
			
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el update
		}catch(PDOException $e){
			return false;
		}
	}
	
	/*Consultar un carritoproduct*/
	public static function getTblcarritoproduct($idtblcarritoproduct){
	    
		$consulta = "SELECT * FROM tblcarritoproduct WHERE idtblcarritoproduct = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblcarritoproduct,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Consulta todos los carritosproduct*/
	public static function getAllTblcarritoproduct(){
	    
		$consulta = "SELECT * FROM tblcarritoproduct";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina un carritoproduct*/
	public static function setDeleteTblcarritoproduct($idtblcarritoproduct){
		
		$delete = "DELETE FROM tblcarritoproduct WHERE idtblcarritoproduct = ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblcarritoproduct,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount();  //retorna el numero de registros afectado por el delete
		}catch(PDOException $e){
			return false;
		}

	}
	
	/*Elimina todos carritoproduct*/
	public static function setDeleteAllTblcarritoproduct(){
		
		$delete = "DELETE FROM tblcarritoproduct ";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
			return $resultado->rowCount();  //retorna el numero de registros afectado por el delete
		}catch(PDOException $e){
			return false;
		}

	}

///// FUNCIONES REFRENTE A TABLA tblcarritoproductcomplem ////////
	
	 /*Insertar un carritodeproducto*/
    public static function setTblcarritoproductcomplem($cantidad,$nombreproductcom,$nombreproveedor,$precioreal,$preciobp,$emailcreo,$idtblordencompra,$idtblproductcomplem){
        
        $insert ="INSERT INTO tblcarritoproductcomplem (tblcarritoproductcomplem_cantidad, tblcarritoproductcomplem_nombreproducto, tblcarritoproductcomplem_nombreproveedor, tblcarritoproductcomplem_precioreal, tblcarritoproductcomplem_preciobp,  tblcarritoproductcomplem_fchmodificacion, tblcarritoproductcomplem_fchcreacion, tblcarritoproductcomplem_emailusuacreo, tblcarritoproductcomplem_emailusuamodifico,tblcarritoproductcomplem_idtblordencompra, tblcarritoproductcomplem_idtblproductcomplem) VALUES (?,?,?,?,?,NOW(),NOW(),?,?,?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$cantidad,PDO::PARAM_INT);
			$resultado->bindParam(2,$nombreproductcom,PDO::PARAM_STR);
			$resultado->bindParam(3,$nombreproveedor,PDO::PARAM_STR);
			$resultado->bindParam(4,$precioreal,PDO::PARAM_STR);
			$resultado->bindParam(5,$preciobp,PDO::PARAM_STR);
			$resultado->bindParam(6,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(7,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(8,$idtblordencompra,PDO::PARAM_INT);
			$resultado->bindParam(9,$idtblproductcomplem,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
        
    }
    
    /*Verificar si existe un carrito de productcomplementario*/
    public static function getCheckTblcarritoproductcomplem($idtblordencompra,$idtblproductcomplem){
        
		$check = "SELECT COUNT(*) FROM tblcarritoproductcomplem WHERE tblcarritoproductcomplem_idtblordencompra = ? AND tblcarritoproductcomplem_idtblproductcomplem= ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$idtblordencompra,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblproductcomplem,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
        
    }
    
     /*Actualizar carritoproductcomple*/
	public static function setUpdateTblcarritoproductcomplem ($idtblcarritoproductcomplem,$cantidad,$nombreproductcom,$nombreproveedor,$precioreal,$preciobp,$emailmodifico,$idtblordencompra,$idtblproductcomplem){

		$update = "UPDATE tblcarritoproductcomplem SET tblcarritoproductcomplem_cantidad = ?, tblcarritoproductcomplem_nombreproducto = ?, tblcarritoproductcomplem_nombreproveedor = ?, tblcarritoproductcomplem_precioreal = ?, tblcarritoproductcomplem_preciobp = ?, tblcarritoproduct_fchmodificacion = NOW(), tblcarritoproductcomplem_emailusuamodifico = ?,tblcarritoproductcomplem_idtblordencompra = ?, tblcarritoproductcomplem_idtblproductcomplem = ? WHERE idtblcarritoproductcomplem = ?";
		
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(2,$nombreproductcom,PDO::PARAM_STR);
			$resultado->bindParam(3,$nombreproveedor,PDO::PARAM_STR);
			$resultado->bindParam(4,$precioreal,PDO::PARAM_STR);
			$resultado->bindParam(5,$preciobp,PDO::PARAM_STR);
			$resultado->bindParam(6,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(7,$idtblordencompra,PDO::PARAM_INT);
			$resultado->bindParam(8,$idtblproductcomplem,PDO::PARAM_INT);
			$resultado->bindParam(9,$idtblcarritoproductcomplem,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el update
		}catch(PDOException $e){
			return false;
		}
	}
	
	/*Consultar un carritoproductcomple*/
	public static function getTblcarritoproductcomplem($idtblcarritoproductcomplem){
	    
		$consulta = "SELECT * FROM tblcarritoproductcomplem WHERE idtblcarritoproductcomplem = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblcarritoproductcomplem,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
    
    /*Consultar un carritoproductcomple*/
	public static function getAllTblcarritoproductcomplem(){
	    
		$consulta = "SELECT * FROM tblcarritoproductcomplem ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina un carritoproductcomplem*/
	public static function setDeleteTblcarritoproductcomplem($idtblcarritoproductcomplem){
		
		$delete = "DELETE FROM tblcarritoproductcomplem WHERE idtblcarritoproductcomplem = ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblcarritoproductcomplem,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount();  //retorna el numero de registros afectado por el delete
		}catch(PDOException $e){
			return false;
		}

	}
	
	/*Elimina todos los  carritoproductcomplem*/
	public static function setDeleteAllTblcarritoproductcomplem(){
		
		$delete = "DELETE FROM tblcarritoproductcomplem";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
			return $resultado->rowCount();  //retorna el numero de registros afectado por el delete
		}catch(PDOException $e){
			return false;
		}

	}

///// FUNCIONES REFRENTE A TABLA tblcategproduct /////////

    /*Insertar una categoria de producto */
    public static function setTblcategproduct($nombrecategproduct, $srcimg, $activado, $idtblclasifcategproduct, $emailcreo){
        
        $insert ="INSERT INTO tblcategproduct (tblcategproduct_nombre, tblcategproduct_srcimg, tblcategproduct_activado,tblclasifcategproduct_idtblclasifcategproduct,tblcategproduct_fchmodificacion,tblcategproduct_fchcreacion,tblcategproduct_emailusuacreo,tblcategproduct_emailusuamodifico) VALUES (?,?,?,?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombrecategproduct,PDO::PARAM_STR);
			$resultado->bindParam(2,$srcimg,PDO::PARAM_STR);
			$resultado->bindParam(3,$activado,PDO::PARAM_INT);
			$resultado->bindParam(4,$idtblclasifcategproduct,PDO::PARAM_INT);
			$resultado->bindParam(5,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(6,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
        
    }
	
	/*Verificar si existe una categoria de producto*/
    public static function getCheckTblcategproduct($nombrecategproduct,$idtblclasifcategproduct){
        
		$check = "SELECT COUNT(*) FROM tblcategproduct WHERE tblcategproduct_nombre = ? AND tblclasifcategproduct_idtblclasifcategproduct= ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$nombrecategproduct,PDO::PARAM_STR);
			$resultado->bindParam(2,$idtblclasifcategproduct,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
        
    }
    
    /*Actualizar una categoria de producto*/
	public static function setUpdateTblcategproduct($idtblcategproduct,$nombrecategproduct, $srcimg, $activado, $idtblclasifcategproduct, $emailmodif){

		$update = "UPDATE tblcategproduct SET tblcategproduct_nombre = ? , tblcategproduct_srcimg = ? , tblcategproduct_activado = ?, tblclasifcategproduct_idtblclasifcategproduct = ? , tblcategproduct_fchmodificacion = NOW(), tblcategproduct_emailusuamodifico = ?  WHERE idtblcategproduct = ?";
		
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$nombrecategproduct,PDO::PARAM_STR);
			$resultado->bindParam(2,$srcimg,PDO::PARAM_STR);
			$resultado->bindParam(3,$activado,PDO::PARAM_INT);
			$resultado->bindParam(4,$idtblclasifcategproduct,PDO::PARAM_INT);
			$resultado->bindParam(5,$emailmodif,PDO::PARAM_STR);
			$resultado->bindParam(6,$idtblcategproduct,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el update
		}catch(PDOException $e){
			return false;
		}
	}
	
	/*Consultar una categoria de producto*/
	public static function getTblcategproduct($idtblcategproduct){
	    
		$consulta = "SELECT * FROM tblcategproduct WHERE idtblcategproduct = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblcategproduct,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Consultar todas las  categoria de producto*/
	public static function getAllTblcategproduct(){
	    
		$consulta = "SELECT * FROM tblcategproduct ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
    
    /*Consultar todas las  categoria de producto activas */
	public static function getAllTblcategproductAct(){
	    
	    $activado=1;
		$consulta = "SELECT * FROM tblcategproduct WHERE tblcategproduct_activado = ? ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$activado,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina una categoria de producto*/
	public static function setDeleteTblcategproduct($idtblcategproduct){
		
		$delete = "DELETE FROM tblcategproduct WHERE idtblcategproduct = ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblcategproduct,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount();  //retorna el numero de registros afectado por el delete
		}catch(PDOException $e){
			return false;
		}

	}
    
    /*Elimina todas las categoria de producto*/
	public static function setDeleteAllTblcategproduct(){
		
		$delete = "DELETE FROM tblcategproduct";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete); 
			$resultado->execute();
			return $resultado->rowCount();  //retorna el numero de registros afectado por el delete
		}catch(PDOException $e){
			return false;
		}

	}
	
///// FUNCIONES REFRENTE A TABLA tblclasifcategproduct /////////

    /*Insertar una clasificacion de categoria */
    public static function setTblclasifcategproduct($nombreclasifcategproduct,$emailcreo){
        
        $insert ="INSERT INTO tblclasifcategproduct (tblclasifcategproduct_nombre, tblclasifcategproduct_fchmodificacion,tblclasifcategproduct_fchcreacion,tblclasifcategproduct_emailusuacreo,tblclasifcategproduct_emailusuamodifico) VALUES (?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombreclasifcategproduct,PDO::PARAM_STR);
			$resultado->bindParam(2,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(3,$emailcreo,PDO::PARAM_STR);
			
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Verificar si existe una clasificacion de categoria*/
    public static function getCheckTblclasifcategproduct($nombreclasifcategproduct){
        
		$check = "SELECT COUNT(*) FROM tblclasifcategproduct WHERE tblclasifcategproduct_nombre = ? ";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bind_param('s',$nombreclasifcategproduct);
			$resultado->bindParam(1,$nombreclasifcategproduct,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
        
    }
    
    /*Actualizar una clasificacion de categoria */
    public static function setUpdateTblclasifcategproduct($idclasifcategproduct,$nombreclasifcategproduct,$emailmodifico){
        
        $update ="UPDATE tblclasifcategproduct SET tblclasifcategproduct_nombre = ?, tblclasifcategproduct_fchmodificacion = NOW() , tblclasifcategproduct_emailusuamodifico = ? WHERE idtblclasifcategproduct = ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$nombreclasifcategproduct,PDO::PARAM_STR);
			$resultado->bindParam(2,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(3,$idclasifcategproduct,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Consultar una clasificacion de categoria */
	public static function getTblclasifcategproduct($idclasifcategproduct){
	    
		$consulta = "SELECT * FROM blclasifcategproduct WHERE idtblclasifcategproduct = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idclasifcategproduct,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Consultar todas las clasificacion de categoria */
	public static function getAllTblclasifcategproduct(){
	    
		$consulta = "SELECT * FROM tblclasifcategproduct";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina una clasificacion de categoria */
	public static function setDeleteTblclasifcategproduct($idclasifcategproduct){
	    
		$delete = "DELETE FROM blclasifcategproduct WHERE idtblclasifcategproduct = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idclasifcategproduct,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina todas las clasificacion de categoria */
	public static function setDeleteAllTblclasifcategproduct(){
	    
		$delete = "DELETE FROM tblclasifcategproduct ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
			return $resultado->rowCount(); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}

///// FUNCIONES REFRENTE A TABLA tblclasifproduct /////////

    /*Insertar una clasificacion de producto */
    public static function setTblclasifproduct($nombreclasifproduct,$activado,$emailcreo){
        
        $insert ="INSERT INTO tblclasifproduct (tblclasifproduct_nombre,tblclasifproduct_activado, tblclasifproduct_fchmodificacion, tblclasifproduct_fchcreacion, tblclasifproduct_emailusuacreo, tblclasifproduct_emailusuamodifico) VALUES (?,?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombreclasifproduct,PDO::PARAM_STR);
			$resultado->bindParam(2,$activado,PDO::PARAM_INT);
			$resultado->bindParam(3,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(4,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectados por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Verificar si existe una clasificacion de producto*/
    public static function getCheckTblclasifproduct($nombreclasifproduct){
        
		$check = "SELECT COUNT(*) FROM tblclasifproduct WHERE tblclasifproduct_nombre = ? ";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$nombreclasifproduct,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
        
    }
    
    /*Actualizar una clasificacion de producto */
    public static function setUpdateTblclasifproduct($idtblclasifproduct,$nombreclasifproduct,$activado,$emailmodifico){
        
        $update ="UPDATE tblclasifproduct SET tblclasifproduct_nombre = ? , tblclasifproduct_activado = ? ,tblclasifproduct_fchmodificacion = NOW() , tblclasifproduct_emailusuamodifico = ?  WHERE idtblclasifproduct = ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$nombreclasifproduct,PDO::PARAM_STR);
			$resultado->bindParam(2,$activado,PDO::PARAM_INT);
			$resultado->bindParam(3,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(4,$idtblclasifproduct,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el update
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Consultar una clasificacion de producto */
	public static function getTblclasifproduct($idtblclasifproduct){
	    
		$consulta = "SELECT * FROM tblclasifproduct WHERE idtblclasifproduct = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblclasifproduct,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Consultar todas las clasificacion de producto */
	public static function getAllTblclasifproduct(){
	    
		$consulta = "SELECT * FROM tblclasifproduct ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Consultar todas las clasificacion de producto */
	public static function getAllTblclasifproductAct(){
	    
	    $activado=1;
		$consulta = "SELECT * FROM tblclasifproduct WHERE  tblclasifproduct_activado= ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$activado,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
    
    /*Elimina una clasificacion de producto */
	public static function setDeleteTblclasifproduct($idtblclasifproduct){
	    
		$delete = "DELETE FROM tblclasifproduct WHERE idtblclasifproduct = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblclasifproduct,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina todas las  clasificacion de producto */
	public static function setDeleteAllTblclasifproduct(){
	    
		$delete = "DELETE FROM tblclasifproduct ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}

///// FUNCIONES REFRENTE A TABLA tblcliente /////////

    /*Insertar un cliente */
    public static function setTblcliente($clientenombre, $clienteapellidos,$clientecallenum,$clientecolonia,$clientecodipost,$clientenacimiento,$clientesexo,$clientetelf,$clienteext,$clientecel,$clienterfc,$cedulafiscal,$clienteciudad,$clientepais,$nombencargadoemp,$clienteemail,$clienteactivado,$clientepasswd,$emailcreo,$recibirinfo,$idtipocliente){

    	$conexionPDO = ConexionDB::getInstance()->getDb();
        
        $insert ="INSERT INTO tblcliente (tblcliente_nombre, tblcliente_apellidos,tblcliente_callenum,tblcliente_colonia,tblcliente_codipost,tblcliente_fchnacimiento,tblcliente_sexo,tblcliente_telefono,tblcliente_extencion,tblcliente_celular,tblcliente_rfc,tblcliente_cedulafiscal,tblcliente_ciudad,tblcliente_pais,tblcliente_nombencargadoempresa,tblcliente_email,tblcliente_activado,tblcliente_fchmodificacion,tblcliente_password,tblcliente_fchcreacion,tblcliente_emailusuacreo,tblcliente_emailusuamodifico,tblcliente_recibirInfo,tbltipocliente_idtbltipocliente) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW(),?,NOW(),?,?,?,?)"; 
        
        try{
			$resultado = $conexionPDO->prepare($insert);
			$resultado->bindParam(1,$clientenombre,PDO::PARAM_STR);
			$resultado->bindParam(2,$clienteapellidos,PDO::PARAM_STR);
			$resultado->bindParam(3,$clientecallenum,PDO::PARAM_STR);
			$resultado->bindParam(4,$clientecolonia,PDO::PARAM_STR);
			$resultado->bindParam(5,$clientecodipost,PDO::PARAM_INT);
			$resultado->bindParam(6,$clientenacimiento,PDO::PARAM_STR);
			$resultado->bindParam(7,$clientesexo,PDO::PARAM_STR);
			$resultado->bindParam(8,$clientetelf,PDO::PARAM_STR);
			$resultado->bindParam(9,$clienteext,PDO::PARAM_STR);
			$resultado->bindParam(10,$clientecel,PDO::PARAM_STR);
			$resultado->bindParam(11,$clienterfc,PDO::PARAM_STR);
			$resultado->bindParam(12,$cedulafiscal,PDO::PARAM_STR);
			$resultado->bindParam(13,$clienteciudad,PDO::PARAM_STR);
			$resultado->bindParam(14,$clientepais,PDO::PARAM_STR);
			$resultado->bindParam(15,$nombencargadoemp,PDO::PARAM_STR);
			$resultado->bindParam(16,$clienteemail,PDO::PARAM_STR);
			$resultado->bindParam(17,$clienteactivado,PDO::PARAM_INT);
			$resultado->bindParam(18,$clientepasswd,PDO::PARAM_STR);
			$resultado->bindParam(19,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(20,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(21,$recibirinfo,PDO::PARAM_INT);
			$resultado->bindParam(22,$idtipocliente,PDO::PARAM_INT);
		    $resultado->execute();
		    
			if($resultado->rowCount()>0){

				$idCliente = $conexionPDO->lastInsertId();
				
				return $idCliente;

			}else{
				return $resultado->rowCount();
			}
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Verificar si existe un cliente*/
    public static function getCheckTblcliente($emailcliente){
        
		$check = "SELECT COUNT(*) FROM tblcliente WHERE tblcliente_email = ? ";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$emailcliente,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
        
    }
    
    /*Actualizar un cliente */
    public static function setUpdateTblcliente($idtblcliente,$clientenombre, $clienteapellidos,$clientecallenum,$clientecolonia,$clientecodipost,$clientenacimiento,$clientesexo,$clientetelf,$clienteext,$clientecel,$clienterfc,$cedulafiscal,$clienteciudad,$clientepais,$nombencargadoemp,$clienteemail,$clienteactivado,$clientepasswd,$emailmodifico,$recibirinfo,$idtipocliente){
        
        $update ="UPDATE tblcliente SET tblcliente_nombre = ?, tblcliente_apellidos = ?,tblcliente_callenum = ?,tblcliente_colonia = ?,tblcliente_codipost = ?,tblcliente_fchnacimiento = ?,tblcliente_sexo = ?,tblcliente_telefono = ?,tblcliente_extencion = ?,tblcliente_celular = ?,tblcliente_rfc = ?,tblcliente_cedulafiscal =?,tblcliente_ciudad = ?,tblcliente_pais = ?,tblcliente_nombencargadoempresa = ?,tblcliente_email = ?,tblcliente_activado = ?,tblcliente_fchmodificacion = NOW(),tblcliente_password = ?,tblcliente_emailusuamodifico = ?,tblcliente_recibirInfo = ? ,tbltipocliente_idtbltipocliente = ? WHERE idtblcliente = ? "; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$clientenombre,PDO::PARAM_STR);
			$resultado->bindParam(2,$clienteapellidos,PDO::PARAM_STR);
			$resultado->bindParam(3,$clientecallenum,PDO::PARAM_STR);
			$resultado->bindParam(4,$clientecolonia,PDO::PARAM_STR);
			$resultado->bindParam(5,$clientecodipost,PDO::PARAM_INT);
			$resultado->bindParam(6,$clientenacimiento,PDO::PARAM_STR);
			$resultado->bindParam(7,$clientesexo,PDO::PARAM_STR);
			$resultado->bindParam(8,$clientetelf,PDO::PARAM_STR);
			$resultado->bindParam(9,$clienteext,PDO::PARAM_STR);
			$resultado->bindParam(10,$clientecel,PDO::PARAM_STR);
			$resultado->bindParam(11,$clienterfc,PDO::PARAM_STR);
			$resultado->bindParam(12,$cedulafiscal,PDO::PARAM_STR);
			$resultado->bindParam(13,$clienteciudad,PDO::PARAM_STR);
			$resultado->bindParam(14,$clientepais,PDO::PARAM_STR);
			$resultado->bindParam(15,$nombencargadoemp,PDO::PARAM_STR);
			$resultado->bindParam(16,$clienteemail,PDO::PARAM_STR);
			$resultado->bindParam(17,$clienteactivado,PDO::PARAM_INT);
			$resultado->bindParam(18,$clientepasswd,PDO::PARAM_STR);
			$resultado->bindParam(19,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(20,$recibirinfo,PDO::PARAM_INT);
			$resultado->bindParam(21,$idtipocliente,PDO::PARAM_INT);
			$resultado->bindParam(22,$idtblcliente,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectados por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Consultar un cliente*/
	public static function getTblcliente($idtblcliente){
	    
		$consulta = "SELECT * FROM tblcliente WHERE idtblcliente = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblcliente,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Consultar todos los  clientes (Activos o Inactivos)*/
	public static function getAllTblcliente($idtblcliente){
	    
		$consulta = "SELECT * FROM tblcliente";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}

    /*Consultar todos los  clientes (Activos)*/
	public static function getAllTblclienteAct($idtblcliente){
	    
	    $activado=1;
		$consulta = "SELECT * FROM tblcliente WHERE tblcliente_activado= ? ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$activado,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina un cliente */
	public static function setDeleteTblcliente($idtblcliente){
	    
		$delete = "DELETE FROM tblcliente WHERE idtblcliente = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblcliente,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina todos los  cliente */
	public static function setDeleteAllTblcliente(){
	    
		$delete = "DELETE FROM tblcliente ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
///// FUNCIONES REFRENTE A TABLA tblcoloniaprovservicio /////////
	
	/*Insertar una colonia que un provedor de servicio*/
	 public static function setTblcoloniaprovservicio($idtblproveedor, $idtblcolonia ,$emailcreo){
        
        $insert ="INSERT INTO tblcoloniaprovservicio (tblproveedor_idtblproveedor, tblcolonia_idtblcolonia, tblcoloniaprovservicio_fchmodificacion,tblcoloniaprovservicio_fchcreacion,tblcoloniaprovservicio_emailusuacreo, tblcoloniaprovservicio_emailusuamodifico) VALUES (?,?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblcolonia,PDO::PARAM_INT);
			$resultado->bindParam(3,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(4,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Verifica que no este dado de alta una colonia con el mismo proveedor */
    public static function setCheckTblcoloniaprovservicio($idtblproveedor, $idtblcolonia){
        
        $check = "SELECT COUNT(*) FROM tblcoloniaprovservicio WHERE tblproveedor_idtblproveedor= ? AND tblcolonia_idtblcolonia = ? ";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblcolonia,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
        
    }
    
    /*Actualiza una colonia que un provedor de servicio*/
	 public static function setUpdateTblcoloniaprovservicio($idtblcoloniprovserv,$idtblproveedor, $idtblcolonia ,$emailmodifico){
        
        $update ="UPDATE tblcoloniaprovservicio SET tblproveedor_idtblproveedor = ?, tblcolonia_idtblcolonia = ?, tblcoloniaprovservicio_fchmodificacion = NOW(), tblcoloniaprovservicio_emailusuamodifico = ? WHERE idtblcoloniaprovservicio = ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblcolonia,PDO::PARAM_INT);
			$resultado->bindParam(3,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(4,$idtblcoloniprovserv,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Obtiene un registro de tblcoloniaprovservicio*/
    public static function getTblcoloniaprovservicio($idtblcoloniprovserv){
	    
		$consulta = "SELECT * FROM tblcoloniaprovservicio WHERE idtblcoloniaprovservicio = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblcoloniprovserv,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	/*Obtiene los registro de tblcoloniaprovservicio de un provedor */
    public static function getAllTblcoloniaprovservicio1($idtblproveedor){
	    
		$consulta = "SELECT * FROM tblcoloniaprovservicio WHERE tblproveedor_idtblproveedor = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
    
    /*Obtiene todas los registro de tblcoloniaprovservicio*/
    public static function getAllTblcoloniaprovservicio(){
	    
		$consulta = "SELECT * FROM tblcoloniaprovservicio";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina un registro de tblcoloniaprovservicio*/
    public static function setDeleteTblcoloniaprovservicio($idtblcoloniprovserv){
	    
		$delete = "DELETE FROM tblcoloniaprovservicio WHERE idtblcoloniaprovservicio = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblcoloniprovserv,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina todos los registro de tblcoloniaprovservicio*/
    public static function setDeleteAllTblcoloniaprovservicio(){
	    
		$delete = "DELETE FROM tblcoloniaprovservicio";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}

	/*Elimina todos los registro de tblcoloniaprovservicio*/
    public static function setDeleteAllTblcoloniaprovservicioOfProveedor($idtblproveedor){
	    
		$delete = "DELETE FROM tblcoloniaprovservicio WHERE tblproveedor_idtblproveedor = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina  una colonia de un  proveedor */
    public static function setDeleteTblcoloniaprovservicio1($idtblproveedor, $idtblcolonia){
        
        $check = "DELETE FROM tblcoloniaprovservicio WHERE tblproveedor_idtblproveedor= ? AND tblcolonia_idtblcolonia = ? ";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblcolonia,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectados
		}catch(PDOException $e){
			return false;
		}
        
    }
	
	
///// FUNCIONES REFRENTE A TABLA tblcupondescuento /////////	

    /*Insertdear un cupon descuento*/
	 public static function setTblcupondescuento($codigo, $descuento , $puntoscliente, $activado, $idtblcliente,$emailcreo){
        
        $insert ="INSERT INTO tblcupondescuento (tblcupondescuento_codigo, tblcupondescuento_descuento, tblcupondescuento_puntoscliente, tblcupondescuento_activado, tblcliente_idtblcliente, tblcupondescuento_fchmodificacion, tblcupondescuento_fchcreacion, tblcupondescuento_emailusuacreo, tblcupondescuento_emailusuamodifico) VALUES (?,?,?,?,?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$codigo,PDO::PARAM_STR);
			$resultado->bindParam(2,$descuento,PDO::PARAM_INT);
			$resultado->bindParam(3,$puntoscliente,PDO::PARAM_INT);
			$resultado->bindParam(4,$activado,PDO::PARAM_INT);
			$resultado->bindParam(5,$idtblcliente,PDO::PARAM_INT);
			$resultado->bindParam(6,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(7,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Verifica si existe un cupon con de un cliente  */
    public static function setCheckTblcupondescuento($cuponcodigo, $idtblcliente){
        
        $check = "SELECT COUNT(*) FROM tblcupondescuento WHERE tblcupondescuento_codigo= ? AND tblcliente_idtblclientes = ? ";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$cuponcodigo,PDO::PARAM_STR);
			$resultado->bindParam(2,$idtblcliente,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
        
    }
    
    /*Actulizar un cupon descuento*/
	 public static function setUpdateTblcupondescuento($idcodigo, $codigo, $descuento, $puntoscliente, $activado, $idtblcliente, $emailmodifico){
        
        $insert ="UPDATE tblcupondescuento SET tblcupondescuento_codigo =?, tblcupondescuento_descuento=?, tblcupondescuento_puntoscliente=?, tblcupondescuento_activado=?, tblcliente_idtblcliente=?, tblcupondescuento_fchmodificacion = NOW(), tblcupondescuento_emailusuamodifico =? WHERE idtblcupondescuento = ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$codigo,PDO::PARAM_STR);
			$resultado->bindParam(2,$descuento,PDO::PARAM_INT);
			$resultado->bindParam(3,$puntoscliente,PDO::PARAM_INT);
			$resultado->bindParam(4,$activado,PDO::PARAM_INT);
			$resultado->bindParam(5,$idtblcliente,PDO::PARAM_INT);
			$resultado->bindParam(6,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(7,$idcodigo,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Obtiene un registro de tblcupondescuento*/
    public static function getTblcupondescuento($idcodigodesc){
	    
		$consulta = "SELECT * FROM tblcupondescuento WHERE idtblcupondescuento = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idcodigodesc,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
    
    /*Obtiene todos los registro de tblcupondescuento*/
    public static function getAllTblcupondescuento(){
	    
		$consulta = "SELECT * FROM tblcupondescuento ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene todos los registro de tblcupondescuento Activos*/
    public static function getAllTblcupondescuentoAct(){
	    
	    $activado=1;
		$consulta = "SELECT * FROM tblcupondescuento WHERE tblcupondescuento_activado = ? ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$activado,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina un registro de tblcupondescuento */
	public static function setDeleteTblcupondescuento($idcodigodesc){
	    
		$delete = "DELETE FROM tblcupondescuento WHERE idtblcupondescuento = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idcodigodesc,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina todos registro de tblcupondescuento */
	public static function setDeleteAllTblcupondescuento(){
		$delete = "DELETE FROM tblcupondescuento ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}

///// FUNCIONES REFRENTE A TABLA tbldatosenvio ///////

    /*Insertdear un registro en tbldatosenvio*/
	 public static function setTtbldatosenvio($tipodepedido,$tiposervicio,$calle,$numint,$fchagendado,$hragendado,$numext,$colonia,$ciudad,$pais,$codipost,$nombreempresa,$rfc,$nombrerecibe,$celularrecibe,$referencia1,$referencia2,$emailcreo,$idtblordencompra){
        
        $insert ="INSERT INTO tbldatosenvio (tbldatosenvio_tipodepedido,tbldatosenvio_tipodeservicio,tbldatosenvio_calle,tbldatosenvio_numint,tbldatosenvio_fchagendado,tbldatosenvio_horaagendado,tbldatosenvio_numext,tbldatosenvio_colonia,tbldatosenvio_ciudad,tbldatosenvio_pais,tbldatosenvio_codipost,tbldatosenvio_nombreempresa,tbldatosenvio_rfc,tbldatosenvio_nombrerecibe,tbldatosenvio_celularrecibe,tbldatosenvio_referencia1,tbldatosenvio_referencia2,tbldatosenvio_fchmodificacion,tbldatosenvio_fchcreacion,tbldatosenvio_emailusuacreo,tbldatosenvio_emailusuamodifico,tbldatosenvio_idtblordencompra) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW(),NOW(),?,?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$tipodepedido,PDO::PARAM_STR);
			$resultado->bindParam(2,$tiposervicio,PDO::PARAM_STR);
			$resultado->bindParam(3,$calle,PDO::PARAM_STR);
			$resultado->bindParam(4,$numint,PDO::PARAM_STR);
			$resultado->bindParam(5,$fchagendado,PDO::PARAM_STR);
			$resultado->bindParam(6,$hragendado,PDO::PARAM_STR);
			$resultado->bindParam(7,$numext,PDO::PARAM_STR);
			$resultado->bindParam(8,$colonia,PDO::PARAM_STR);
			$resultado->bindParam(9,$ciudad,PDO::PARAM_STR);
			$resultado->bindParam(10,$pais,PDO::PARAM_STR);
			$resultado->bindParam(11,$codipost,PDO::PARAM_INT);
			$resultado->bindParam(12,$nombreempresa,PDO::PARAM_STR);
			$resultado->bindParam(13,$rfc,PDO::PARAM_STR);
			$resultado->bindParam(14,$nombrerecibe,PDO::PARAM_STR);
			$resultado->bindParam(15,$celularrecibe,PDO::PARAM_STR);
			$resultado->bindParam(16,$referencia1,PDO::PARAM_STR);
			$resultado->bindParam(17,$referencia2,PDO::PARAM_STR);
			$resultado->bindParam(18,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(19,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(20,$idtblordencompra,PDO::PARAM_INT);
			
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    
    /*Verifica si existe un registro en tbldatosenvio  */
    public static function setCheckTbldatosenvio($idtblordencompra){
        
        $check = "SELECT COUNT(*) FROM tbldatosenvio WHERE tbldatosenvio_idtblordencompra = ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$idtblordencompra,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
        
    }
    
    /*Actualizar un registro en tbldatosenvio*/
	 public static function setUpdateTtbldatosenvio($tipodepedido,$tiposervicio,$calle,$numint,$fchagendado,$hragendado,$numext,$colonia,$ciudad,$pais,$codipost,$nombreempresa,$rfc,$nombrerecibe,$celularrecibe,$referencia1,$referencia2,$emailmodifo,$idtblordencompra){
        
        $insert ="UPDATE tbldatosenvio SET tbldatosenvio_tipodepedido = ?,tbldatosenvio_tipodeservicio = ?,tbldatosenvio_calle = ?,tbldatosenvio_numint = ?,tbldatosenvio_fchagendado = ?,tbldatosenvio_horaagendado = ?,tbldatosenvio_numext = ?,tbldatosenvio_colonia = ?,tbldatosenvio_ciudad = ?,tbldatosenvio_pais = ?,tbldatosenvio_codipost = ?,tbldatosenvio_nombreempresa = ?,tbldatosenvio_rfc = ?,tbldatosenvio_nombrerecibe = ?,tbldatosenvio_celularrecibe = ?,tbldatosenvio_referencia1 = ?,tbldatosenvio_referencia2 = ?,tbldatosenvio_fchmodificacion = NOW(),tbldatosenvio_emailusuamodifico = ? WHERE tbldatosenvio_idtblordencompra  = ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$tipodepedido,PDO::PARAM_STR);
			$resultado->bindParam(2,$tiposervicio,PDO::PARAM_STR);
			$resultado->bindParam(3,$calle,PDO::PARAM_STR);
			$resultado->bindParam(4,$numint,PDO::PARAM_STR);
			$resultado->bindParam(5,$fchagendado,PDO::PARAM_STR);
			$resultado->bindParam(6,$hragendado,PDO::PARAM_STR);
			$resultado->bindParam(7,$numext,PDO::PARAM_STR);
			$resultado->bindParam(8,$colonia,PDO::PARAM_STR);
			$resultado->bindParam(9,$ciudad,PDO::PARAM_STR);
			$resultado->bindParam(10,$pais,PDO::PARAM_STR);
			$resultado->bindParam(11,$codipost,PDO::PARAM_INT);
			$resultado->bindParam(12,$nombreempresa,PDO::PARAM_STR);
			$resultado->bindParam(13,$rfc,PDO::PARAM_STR);
			$resultado->bindParam(14,$nombrerecibe,PDO::PARAM_STR);
			$resultado->bindParam(15,$celularrecibe,PDO::PARAM_STR);
			$resultado->bindParam(16,$referencia1,PDO::PARAM_STR);
			$resultado->bindParam(17,$referencia2,PDO::PARAM_STR);
			$resultado->bindParam(18,$emailmodifo,PDO::PARAM_STR);
			$resultado->bindParam(20,$idtblordencompra,PDO::PARAM_INT);
			
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
     /*Obtiene un registro de tbldatosenvio*/
    public static function getTbldatosenvio($idtblordencompra){
	    
		$consulta = "SELECT * FROM tbldatosenvio WHERE tbldatosenvio_idtblordencompra = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblordencompra,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	 /*Obtiene todos los registros de tbldatosenvio*/
    public static function getAllTbldatosenvio(){
	    
		$consulta = "SELECT * FROM tbldatosenvio";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina un registro de tbldatosenvio */
	public static function setDeleteTbldatosenvio($idtblordencompra){
	    
		$delete = "DELETE FROM tbldatosenvio WHERE tbldatosenvio_idtblordencompra = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblordencompra,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina todos los registros de tbldatosenvio */
	public static function setDeleteAllTbldatosenvio(){
	    
		$delete = "DELETE FROM tbldatosenvio ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	
///// FUNCIONES REFRENTE A TABLA tbldiaprovservicio ///////

    /*Insertar un registro en tbldiaprovservicio*/
	 public static function setTbldiaprovservicio($idtblproveedor,$idtbldiasemana,$emailcreo){
        
        $insert ="INSERT INTO tbldiaprovservicio (tblproveedor_idtblproveedor,tbldiasemana_idtbldiasemana,tbldiaprovservicio_fchmodificacion,tbldiaprovservicio_fchcreacion,tbldiaprovservicio_emailusuacreo,tbldiaprovservicio_emailusuamodifico) VALUES (?,?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtbldiasemana,PDO::PARAM_INT);
			$resultado->bindParam(3,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(4,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Verifica si existe un registro en tbldiaprovservicio  */
    public static function setCheckTbldiaprovservicio($idtblproveedor,$idtbldiasemana){
        
        $check = "SELECT COUNT(*) FROM tbldiaprovservicio WHERE tblproveedor_idtblproveedor = ? AND tbldiasemana_idtbldiasemana = ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtbldiasemana,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
        
    }
    
    /*Actualizar un registro en tbldiaprovservicio*/
	 public static function setUpdateTbldiaprovservicio($idtbldiaprovservicio,$idtblproveedor,$idtbldiasemana,$emailmodifico){
        
        $insert ="UPDATE tbldiaprovservicio SET tblproveedor_idtblproveedor = ?,tbldiasemana_idtbldiasemana= ?,tbldiaprovservicio_fchmodificacion= NOW(),tbldiaprovservicio_emailusuamodifico= ? WHERE idtbldiaprovservicio = ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtbldiasemana,PDO::PARAM_INT);
			$resultado->bindParam(3,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(4,$idtbldiaprovservicio,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
	
	/*Obtiene todos los  registro de tbldiaprovservicio de un proveeedor */
    public static function getTbldiaprovservicio($idtbldiaprovservicio){
	    
		$consulta = "SELECT * FROM tbldiaprovservicio WHERE tbldiaprovservicio_idtbldiaprovservicio = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblordencompra,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene todos los  registro de tbldiaprovservicio */
    public static function getAllTbldiaprovservicio(){
	    
		$consulta = "SELECT * FROM tbldiaprovservicio";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}

	/*Obtiene todos los  registro de tbldiaprovservicio */
    public static function getAllTbldiaprovservicioOfProveedor($idtblproveedor){
	    
		$consulta = "SELECT * FROM tbldiaprovservicio WHERE tblproveedor_idtblproveedor = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina un registro de tbldiaprovservicio */
	public static function setDeleteTbldiaprovservicio($idtbldiaprovservicio,$idtblproveedor){
	    
		$delete = "DELETE FROM tbldiaprovservicio WHERE tblproveedor_idtblproveedor = ? AND tbldiasemana_idtbldiasemana = ? ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtbldiaprovservicio,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Elimina un registro de tbldiaprovservicio */
	public static function setDeleteAllTbldiaprovservicio(){
	    
		$delete = "DELETE FROM tbldiaprovservicio ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}

	/*Elimina un registro de tbldiaprovservicio */
	public static function setDeleteAllTbldiaprovservicioOfProveedor($idtblproveedor){
	    
		$delete = "DELETE FROM tbldiaprovservicio WHERE tblproveedor_idtblproveedor = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	
		
///// FUNCIONES REFRENTE A TABLA tbldiasemana ///////

    /*Insertar un registro en tbldiasemana*/
	 public static function setTbldiasemana($diasemana,$emailcreo){
        
        $insert ="INSERT INTO tbldiasemana (tbldiasemana_dia,tbldiasemana_fchmodificacion,tbldiasemana_fchcreacion,tbldiasemana_emailusuacreo, tbldiasemana_emailusuamodifico) VALUES (?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$diasemana,PDO::PARAM_STR);
			$resultado->bindParam(2,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(3,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Verifica si existe un registro en tbldiasemana  */
    public static function setCheckTbldiasemana($diasemana){
        
        $check = "SELECT COUNT(*) FROM tbldiasemana WHERE tbldiasemana_dia = ? ";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$diasemana,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
        
    }
    
    /*Actualizar un registro en tbldiasemana*/
	 public static function setUpdateTbldiasemana($iddiasemana,$diasemana,$emailmodifico){
        
        $update ="UPDATE tbldiasemana  SET tbldiasemana_dia = ? , tbldiasemana_fchmodificacion= NOW(), tbldiasemana_emailusuamodifico= ? WHERE idtbldiasemana = ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$diasemana,PDO::PARAM_STR);
			$resultado->bindParam(2,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(3,$iddiasemana,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Obtiene un registro de tbldiasemana  */
    public static function getTbldiasemana($iddiasemana){
	    
		$consulta = "SELECT * FROM tbldiasemana WHERE idtbldiasemana = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$iddiasemana,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene un registro de tbldiasemana  */
    public static function getAllTbldiasemana(){
	    
		$consulta = "SELECT * FROM tbldiasemana ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Elimina un registro de tbldiasemana  */
    public static function setDeleteTbldiasemana($iddiasemana){
	    
		$consulta = "DELETE FROM tbldiasemana WHERE idtbldiasemana = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$iddiasemana,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina todos los  registro de tbldiasemana  */
    public static function setDeleteAllTbldiasemana(){
	    
		$consulta = "DELETE FROM tbldiasemana";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}

///// FUNCIONES REFRENTE A TABLA tblentregacomplem ///////

     /*Insertar un registro en tblentregacomplem*/
	 public static function setTblentregacomplem($nombreproveedor, $fchentre,$numproductpedidos,$numproductentregados,$status,$fchpagoproveedor,$srcimg1,$srcimg2,$emailcreo,$idtblordencompra,$idtblproveedor){
        
        $insert ="INSERT INTO tblentregacomplem (tblentregacomplem_nombreproveedor,tblentregacomplem_fchentrega,tblentregacomplem_numproductpedidos,tblentregacomplem_numproductentregados,tblentregacomplem_status,tblentregacomplem_fchpagoproveedor,tblentregacomplem_srcimgevidencia1,tblentregacomplem_srcimgevidencia2,tblentregacomplem_fchmodificacion,tblentregacomplem_fchcreacion,tblentregacomplem_emailusuacreo,tblentregacomplem_emailusuamodifico,tblentregacomplem_idtblordencompra,tblentregacomplem_idtblproveedor) VALUES (?,?,?,?,?,?,?,?,NOW(),NOW(),?,?,?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombreproveedor,PDO::PARAM_STR);
			$resultado->bindParam(2,$fchentre,PDO::PARAM_STR);
			$resultado->bindParam(3,$numproductpedidos,PDO::PARAM_INT);
			$resultado->bindParam(4,$numproductentregados,PDO::PARAM_INT);
			$resultado->bindParam(5,$status,PDO::PARAM_STR);
			$resultado->bindParam(6,$fchpagoproveedor,PDO::PARAM_STR);
			$resultado->bindParam(7,$srcimg1,PDO::PARAM_STR);
			$resultado->bindParam(8,$srcimg2,PDO::PARAM_STR);
			$resultado->bindParam(9,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(10,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(11,$idtblordencompra,PDO::PARAM_INT);
			$resultado->bindParam(12,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Verifica si existe un registro en tblentregacomplem  */
    public static function setCheckTblentregacomplem($idtblordencompra,$idtblproveedor){
        
        $check = "SELECT COUNT(*) FROM tblentregacomplem WHERE tblentregacomplem_idtblordencompra = ? AND tblentregacomplem_idtblproveedor = ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$idtblordencompra,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
        
    }
    
     /*Actualizar un registro en tblentregacomplem*/
	 public static function setUpdateTtblentregacomplem($nombreproveedor,$fchentrega,$numproductpedidos,$numproductentregados,$status,$fchpagoproveedor,$srcimg1,$srcimg2,$emailmodifico,$idtblordencompra,$idtblproveedor){
        
        $insert ="UPDATE tblentregacomplem SET tblentregacomplem_nombreproveedor = ?,tblentregacomplem_fchentrega  = ?,tblentregacomplem_numproductpedidos = ?,tblentregacomplem_numproductentregados = ?,tblentregacomplem_status = ?,tblentregacomplem_fchpagoproveedor = ?,tblentregacomplem_srcimgevidencia1 = ?,tblentregacomplem_srcimgevidencia2 = ?,tblentregacomplem_fchmodificacion =NOW(),tblentregacomplem_emailusuamodifico = ? WHERE tblentregacomplem_idtblordencompra = ? AND tblentregacomplem_idtblproveedor = ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombreproveedor,PDO::PARAM_STR);
			$resultado->bindParam(2,$fchentre,PDO::PARAM_STR);
			$resultado->bindParam(3,$numproductpedidos,PDO::PARAM_INT);
			$resultado->bindParam(4,$numproductentregados,PDO::PARAM_INT);
			$resultado->bindParam(5,$status,PDO::PARAM_STR);
			$resultado->bindParam(6,$fchpagoproveedor,PDO::PARAM_STR);
			$resultado->bindParam(7,$srcimg1,PDO::PARAM_STR);
			$resultado->bindParam(8,$srcimg2,PDO::PARAM_STR);
			$resultado->bindParam(9,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(10,$idtblordencompra,PDO::PARAM_INT);
			$resultado->bindParam(11,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
	/*Obtiene un registro de tblentregacomplem  por ordencompra y proveedor*/
    public static function getTblentregacomplem($idtblordencompra,$idtblproveedor){
	    
		$consulta = "SELECT * FROM tblentregacomplem WHERE tblentregacomplem_idtblordencompra = ? AND tblentregacomplem_idtblproveedor = ?";
		
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
	
	 /*Obtiene los registro de tblentregacomplem  por ordencompra */
    public static function getAllTblentregacomplem1($idtblordencompra){
	    
		$consulta = "SELECT * FROM tblentregacomplem WHERE tblentregacomplem_idtblordencompra = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblordencompra,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	/*Obtiene un registro de tblentregacomplem  por ordencompra */
    public static function getAllTblentregacomplem(){
	    
		$consulta = "SELECT * FROM tblentregacomplem ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina un registro de tblentregacomplem  por ordencompra y proveedor*/
    public static function setDeleteTblentregacomplem($idtblordencompra,$idtblproveedor){
	    
		$delete = "DELETE FROM tblentregacomplem WHERE tblentregacomplem_idtblordencompra = ? AND tblentregacomplem_idtblproveedor = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblordencompra,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el delete 
		} catch(PDOException $e){
			return false;
		}
	}


    /*Elimina los registros de tblentregacomplem  por ordencompra */
    public static function setDeleteAllTblentregacomplem1($idtblordencompra){
	    
		$delete = "DELETE FROM tblentregacomplem WHERE tblentregacomplem_idtblordencompra = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblordencompra,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el delete 
		} catch(PDOException $e){
			return false;
		}
	}	
	
	/*Elimina todos los registro de tblentregacomplem */
    public static function setDeleteAllTblentregacomplem2(){
	    
		$delete = "DELETE FROM tblentregacomplem ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el delete 
		} catch(PDOException $e){
			return false;
		}
	}

	


///// FUNCIONES REFRENTE A TABLA tblentregaproducto ///////
	
	/*Insertar un registro en tblentregaproducto*/
	 public static function setTblentregaproducto($nombreproveedor, $fchentre,$numproductpedidos,$numproductentregados,$status,$descripcion,$statusdeposito,$fchpagoproveedor,$srcimg1,$srcimg2,$emailcreo,$idtblordencompra,$idtblproveedor){
	 	
        
        $insert ="INSERT INTO tblentregaproducto (tblentregaproducto_nombreproveedor,tblentregaproducto_fchentrega,tblentregaproducto_numproductpedidos,tblentregaproducto_numproductentregados,tblentregaproducto_status,tblentregaproducto_descripcion,tblentregaproducto_statusdeposito,tblentregaproducto_fchpagoproveedor,tblentregaproducto_srcimgevidencia1,tblentregaproducto_srcimgevidencia2,tblentregaproducto_fchmodificacion,tblentregaproducto_fchcreacion,tblentregaproducto_emailusuacreo,tblentregaproducto_emailusuamodifico,tblentregaproducto_idtblordencompra,tblentregaproducto_idtblproveedor) VALUES (?,?,?,?,?,?,?,?,?,?,NOW(),NOW(),?,?,?,?)"; 

        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombreproveedor,PDO::PARAM_STR);
			$resultado->bindParam(2,$fchentre,PDO::PARAM_STR);
			$resultado->bindParam(3,$numproductpedidos,PDO::PARAM_INT);
			$resultado->bindParam(4,$numproductentregados,PDO::PARAM_INT);
			$resultado->bindParam(5,$status,PDO::PARAM_STR);
			$resultado->bindParam(6,$descripcion,PDO::PARAM_STR);
			$resultado->bindParam(7,$statusdeposito,PDO::PARAM_STR);
			$resultado->bindParam(8,$fchpagoproveedor,PDO::PARAM_STR);
			$resultado->bindParam(9,$srcimg1,PDO::PARAM_STR);
			$resultado->bindParam(10,$srcimg2,PDO::PARAM_STR);
			$resultado->bindParam(11,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(12,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(13,$idtblordencompra,PDO::PARAM_INT);
			$resultado->bindParam(14,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    
    /*Verifica si existe un registro en tblentregaproducto  */
    public static function setCheckTblentregaproducto($idtblordencompra,$idtblproveedor){
        
        $check = "SELECT COUNT(*) FROM tblentregaproducto WHERE tblentregaproducto_idtblordencompra = ? AND tblentregaproducto_idtblproveedor = ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$idtblordencompra,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(0); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
        
    }
    
    /*Actualizar un registro en tblentregaproducto*/
	 public static function setUpdateTblentregaproducto($nombreproveedor,$fchentrega,$numproductpedidos,$numproductentregados,$status,$statusdeposito,$fchpagoproveedor,$srcimg1,$srcimg2,$emailmodifico,$idtblordencompra,$idtblproveedor){
        
        $insert ="UPDATE tblentregaproducto SET tblentregaproducto_nombreproveedor = ?, tblentregaproducto_fchentrega  = ?, tblentregaproducto_numproductpedidos = ?, tblentregaproducto_numproductentregados = ?, tblentregaproducto_status = ?, tblentregaproducto_statusdeposito = ?,tblentregaproducto_fchpagoproveedor = ?, tblentregaproducto_srcimgevidencia1 = ?, tblentregaproducto_srcimgevidencia2 = ?, tblentregaproducto_fchmodificacion = NOW(), tblentregaproducto_emailusuamodifico = ? WHERE tblentregaproducto_idtblordencompra = ? AND tblentregaproducto_idtblproveedor = ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombreproveedor,PDO::PARAM_STR);
			$resultado->bindParam(2,$fchentrega,PDO::PARAM_STR);
			$resultado->bindParam(3,$numproductpedidos,PDO::PARAM_INT);
			$resultado->bindParam(4,$numproductentregados,PDO::PARAM_INT);
			$resultado->bindParam(5,$status,PDO::PARAM_STR);
			$resultado->bindParam(6,$statusdeposito,PDO::PARAM_STR);
			$resultado->bindParam(7,$fchpagoproveedor,PDO::PARAM_STR);
			$resultado->bindParam(8,$srcimg1,PDO::PARAM_STR);
			$resultado->bindParam(9,$srcimg2,PDO::PARAM_STR);
			$resultado->bindParam(10,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(11,$idtblordencompra,PDO::PARAM_INT);
			$resultado->bindParam(12,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Obtiene un registro de tblentregaproducto  por ordencompra y proveedor*/
    public static function getTblentregaproducto($idtblordencompra,$idtblproveedor){
	    
		$consulta = "SELECT * FROM tblentregaproducto WHERE tblentregaproducto_idtblordencompra = ? AND tblentregaproducto_idtblproveedor = ?";
		
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
	
	 /*Obtiene los registro de tblentregaproducto  por ordencompra */
    public static function getAllTblentregaproducto1($idtblordencompra){
	    
		$consulta = "SELECT * FROM tblentregaproducto WHERE tblentregaproducto_idtblordencompra = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblordencompra,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
		
	}
	
	/*Obtiene un registro de tblentregaproducto  por ordencompra */
    public static function getAllTblentregaproducto2(){
	    
		$consulta = "SELECT * FROM tblentregaproducto ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Elimina un registro de tblentregaproducto  por ordencompra y proveedor*/
    public static function setDeleteTblentregaproducto($idtblordencompra,$idtblproveedor){
	    
		$delete = "DELETE FROM tblentregaproducto WHERE tblentregaproducto_idtblordencompra = ? AND tblentregaproducto_idtblproveedor = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblordencompra,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el delete 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Elimina un registro de tblentregaproducto  por ordencompra */
    public static function setDeleteAllTblentregaproducto1($idtblordencompra){
	    
		$delete = "DELETE FROM tblentregaproducto WHERE tblentregaproducto_idtblordencompra = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblordencompra,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el delete 
		} catch(PDOException $e){
			return false;
		}
	}	
	
	/*Elimina todos registro de tblentregaproducto*/
    public static function setDeleteAllTblentregacomplem(){
	    
		$delete = "DELETE FROM tblentregacomplem ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el delete 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	///// FUNCIONES REFRENTE A TABLA tblhistoricoelimi ///////
	public static function tblhistoricodeelimi($email,$nombre,$apellido,$nivel,$tabla,$registro,$idRegistro,$fchcreacion,$emailusuacreo,$emailusuaelimino){

	 	//??OBTENER TODO EL REGISTRO QUE SE VA A ELIMINAR
	 	/*
	 	$consulta = "SELECT * FROM $tabla WHERE $nombreIdRegistro = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idRegistro,PDO::PARAM_INT);
			$resultado->execute();
			$registroCompleto= $resultado->fetchAll(PDO::FETCH_ASSOC);
			foreach ($resultado as $row) {
		    	$row["Id"];
		    }

		} catch(PDOException $e){
			return false;
		}
		*/
	 	
	 	//
        
        $insert ="INSERT INTO tblhistoricodeelimi (tblhistoricodeelimi_email,tblhistoricodeelimi_nombre,tblhistoricodeelimi_apellido,tblhistoricodeelimi_nivel,tblhistoricodeelimi_tabla,tblhistoricodeelimi_registro,tblhistoricodeelimi_idRegistro,tblhistoricodeelimi_fchcreacion,tblhistoricodeelimi_fchelimino,tblhistoricodeelimi_emailusuacreo,tblhistoricodeelimi_emailusuaelimino) VALUES (?,?,?,?,?,?,?,?,NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$email,PDO::PARAM_STR);
			$resultado->bindParam(2,$nombre,PDO::PARAM_STR);
			$resultado->bindParam(3,$apellido,PDO::PARAM_STR);
			$resultado->bindParam(4,$nivel,PDO::PARAM_STR);
			$resultado->bindParam(5,$tabla,PDO::PARAM_STR);
			$resultado->bindParam(6,$registro,PDO::PARAM_STR);
			$resultado->bindParam(7,$idRegistro,PDO::PARAM_INT);
			$resultado->bindParam(8,$fchcreacion,PDO::PARAM_STR);
			$resultado->bindParam(9,$emailusuacreo,PDO::PARAM_STR);
			$resultado->bindParam(10,$emailusuaelimino,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
	
	
	
	///// FUNCIONES REFRENTE A TABLA tblhistoricomodifi ///////
	public static function setTblhistoricodemodifi($email,$nombre,$apellido,$nivel,$tabla,$registroAnterior,$registroActual){
        
        $insert ="INSERT INTO tblhistoricodemodifi (tblhistoricodemodifi_emailusuario, tblhistoricodemodifi_nombre, tblhistoricodemodifi_apellido, tblhistoricodemodifi_nivel, tblhistoricodemodifi_tabla, tblhistoricodemodifi_fecha, tblhistoricodemodifi_registroanterior, tblhistoricodemodifi_registroactual) VALUES (?,?,?,?,?,NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$email,PDO::PARAM_STR);
			$resultado->bindParam(2,$nombre,PDO::PARAM_STR);
			$resultado->bindParam(3,$apellido,PDO::PARAM_STR);
			$resultado->bindParam(4,$nivel,PDO::PARAM_STR);
			$resultado->bindParam(5,$tabla,PDO::PARAM_STR);
			$resultado->bindParam(6,$registroAnterior,PDO::PARAM_STR);
			$resultado->bindParam(7,$registroActual,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
	
	


///// FUNCIONES REFRENTE A TABLA tblhora ///////

    /*Insertar un registro en tblhora*/
	 public static function setTblhora($hora,$emailcreo){
        
        $insert ="INSERT INTO tblhora (tblhora_hora,tblhora_fchmodificacion,tblhora_fchcreacion,tblhora_emailusuacreo,tblhora_emailusuamodifico) VALUES (?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$hora,PDO::PARAM_STR);
			$resultado->bindParam(2,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(3,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Verifica si existe un registro en tblhora  */
    public static function setCheckTblhora($hora){
        
        $check = "SELECT COUNT(*) FROM tblhora WHERE tblhora_hora = ? ";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$hora,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
        
    }
    
    /*Actualizar un registro en tblhora*/
	 public static function setUpdateTblhora($idhora,$hora,$emailmodifico){
        
        $update ="UPDATE tblhora  SET tblhora_hora = ? , tblhora_fchmodificacion= NOW(), tblhora_emailusuamodifico= ? WHERE idtbldiasemana = ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$hora,PDO::PARAM_STR);
			$resultado->bindParam(2,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(3,$idhora,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Obtiene un registro de tblhora  */
    public static function getTblhora($idhora){
	    
		$consulta = "SELECT * FROM tblhora WHERE idtblhora = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idhora,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene todos registro de tblhora  */
    public static function getAllTblhora(){
	    
		$consulta = "SELECT * FROM tblhora ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Elimina un registro de tblhora  */
    public static function setDeleteTblhora($idhora){
	    
		$consulta = "DELETE FROM tblhora WHERE idtblhora = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idhora,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina todos los  registro de tblhora  */
    public static function setDeleteAlltblhora(){
	    
		$consulta = "DELETE FROM tblhora";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
    
    
///// FUNCIONES REFRENTE A TABLA tblhraabre 
    
    /*Insertar un registro en tblhraabre*/
	 public static function setTblhraabre($idtblhora,$emailcreo){
        
        $insert ="INSERT INTO tblhraabre (tblhora_idtblhora,tblhraabre_fchmodificacion,tblhraabre_fchcreacion,tblhraabre_emailusuacreo,tblhraabre_emailusuamodifico) VALUES (?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$idtblhora,PDO::PARAM_INT);
			$resultado->bindParam(2,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(3,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Verifica si existe un registro en tblhraabre  */
    public static function setCheckTblhraabre($idtblhora){
        
        $check = "SELECT COUNT(*) FROM tblhraabre WHERE tblhora_idtblhora = ? ";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$idtblhora,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
        
    }
    
    /*Actualizar un registro en tblhraabre*/
	 public static function setUpdateTblhraabre($idtblhoraabre,$idtblhora,$emailmodifico){
        
        $insert ="UPDATE tblhraabre SET tblhora_idtblhora = ?,tblhraabre_fchmodificacion= NOW(),tblhraabre_usuamodifico = ? WHERE idtblhoraabre = ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$idtblhora,PDO::PARAM_INT);
			$resultado->bindParam(2,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(3,$idtblhoraabre,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Obtiene un registro de tblhraabre  */
    public static function getTblhraabre($idtblhoraabre){
	    
		$consulta = "SELECT * FROM tblhraabre WHERE idtblhoraabre = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblhoraabre,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene todos los  registro de tblhraabre  */
    public static function getAllTblhraabre(){
	    
		$consulta = "SELECT * FROM tblhraabre ORDER BY tblhora_idtblhora ASC";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}

	/*Obtiene todos los  registro de tblhraabre  */
    public static function getAllTblhraabreWithHora(){
	    
		$consulta = "SELECT * FROM tblhraabre as hraabre INNER JOIN tblhora as hora ON hraabre.tblhora_idtblhora = hora.idtblhora ORDER BY tblhora_idtblhora ASC";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina un registro de tblhraabre  */
    public static function setDeleteTblhraabre($idtblhoraabre){
	    
		$consulta = "DELETE FROM tblhraabre WHERE idtblhoraabre = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblhoraabre,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina todos los  registro de tblhraabre  */
    public static function setDeleteAllTblhraabre(){
	    
		$consulta = "DELETE FROM tblhraabre";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
    


///// FUNCIONES REFRENTE A TABLA tblhracierra 
    
    /*Insertar un registro en tblhracierra*/
	 public static function setTblhracierra($idtblhora,$emailcreo){
        
        $insert ="INSERT INTO tblhracierra (tblhora_idtblhora,tblhracierra_fchmodificacion,tblhracierra_fchcreacion,tblhracierra_emailusuacreo,tblhracierra_usuamodifico) VALUES (?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$idtblhora,PDO::PARAM_INT);
			$resultado->bindParam(2,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(3,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Verifica si existe un registro en tblhracierra  */
    public static function setCheckTblhracierra($idtblhora){
        
        $check = "SELECT COUNT(*) FROM tblhracierra WHERE tblhora_idtblhora = ? ";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$idtblhora,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
        
    }
    
    /*Actualizar un registro en tblhracierra*/
	 public static function setUpdateTblhracierra($idtblhoracierra,$idtblhora,$emailmodifico){
        
        $insert ="UPDATE tblhracierra SET tblhora_idtblhora = ?,tblhracierra_fchmodificacion= NOW(),tblhracierra_usuamodifico = ? WHERE idtblhracierra = ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$idtblhora,PDO::PARAM_INT);
			$resultado->bindParam(2,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(3,$idtblhoracierra,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Obtiene un registro de tblhracierra  */
    public static function getTblhracierra($idtblhoracierra){
	    
		$consulta = "SELECT * FROM tblhracierra WHERE idtblhracierra = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblhoracierra,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene todos los  registro de tblhracierra  */
    public static function getAllTblhracierra(){
	    
		$consulta = "SELECT * FROM tblhracierra ORDER BY tblhora_idtblhora ASC";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	/*Obtiene todos los  registro de tblhracierra  */
    public static function getAllTblhracierraWithHora(){
		$consulta = "SELECT * FROM tblhracierra as hracierra INNER JOIN tblhora as hora ON hracierra.tblhora_idtblhora = hora.idtblhora ORDER BY tblhora_idtblhora ASC";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina un registro de tblhracierra  */
    public static function setDeleteTblhracierra($idtblhoracierra){
	    
		$consulta = "DELETE FROM tblhracierra WHERE idtblhracierra = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblhoracierra,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina todos los  registro de tblhracierra  */
    public static function setDeleteAllTblhracierra(){
	    
		$consulta = "DELETE FROM tblhracierra";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
    

///// FUNCIONES REFRENTE A TABLA tblhrsprovdom 
    
    /*Insertar un registro en tblhrsprovdom*/
	 public static function setTblhrsprovdom($idtblproveedor,$idtblhora,$emailcreo){
        
        $insert ="INSERT INTO tblhrsprovdom (tblproveedor_idtblproveedor, tblhora_idtblhora, tblhrsprovdom_fchmodificacion,tblhrsprovdom_fchcreacion,tblhrsprovdom_emailusuacreo,tblhrsprovdom_emailusuamodifico) VALUES (?,?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblhora,PDO::PARAM_INT);
			$resultado->bindParam(3,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(4,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
	
	
	/*Verifica que no este dado de alta una hora con el mismo proveedor */
    public static function setCheckTblhrsprovdom($idtblproveedor, $idtblhora){
        
        $check = "SELECT COUNT(*) FROM tblhrsprovdom WHERE tblproveedor_idtblproveedor= ? AND tblhora_idtblhora = ? ";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblhora,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
        
    }
    
    /*Actualiza una hora que un provedor de servicio*/
	 public static function setUpdateTblhrsprovdom($idtblhrsprovserv,$idtblproveedor, $idtblhora ,$emailmodifico){
        
        $update ="UPDATE tblhrsprovdom SET tblproveedor_idtblproveedor = ?, tblhora_idtblhora = ?, tblhrsprovdom_fchmodificacion = NOW(), tblhrsprovdom_emailusuamodifico = ? WHERE idtblhrsprovdom = ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblhora,PDO::PARAM_INT);
			$resultado->bindParam(3,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(4,$idtblhrsprovserv,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Obtiene un registro de tblhrsprovdom*/
    public static function getTblhrsprovdom($idtblhrsprovserv){
	    
		$consulta = "SELECT * FROM tblhrsprovdom WHERE idtblhrsprovdom = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblhrsprovserv,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene los registro de tblhrsprovdom de un provedor */
    public static function getAllTblhrsprovdom1($idtblproveedor){
	    
		$consulta = "SELECT * FROM tblhrsprovdom WHERE tblproveedor_idtblproveedor = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}

	/*Obtiene los registro de tblhrsprovdom junto con horas de un provedor */
    public static function getAllTblhrsprovdomWithTblhora($idtblproveedor){
		//$consulta = "SELECT * FROM tblhrsprovdom WHERE tblproveedor_idtblproveedor = ?";
		$consulta = "SELECT horadomprov.tblhora_idtblhora,tblhora_hora  FROM tblhrsprovdom as horadomprov INNER JOIN tblhora as hora ON horadomprov.tblhora_idtblhora=hora.idtblhora WHERE tblproveedor_idtblproveedor = ?";
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
    
    /*Obtiene todas los registro de tblhrsprovdom*/
    public static function getAllTblhrsprovdom(){
	    
		$consulta = "SELECT * FROM tblhrsprovdom";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina un registro de tblhrsprovdom pro proveedor*/
    public static function setDeleteTblhrsprovdom($idtblhrsprovdom){
	    
		$delete = "DELETE FROM tblhrsprovdom WHERE idtblhrsprovdom = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblhrsprovdom,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina todos los registro de tblhrsprovdom*/
    public static function setDeleteAllTblhrsprovdom(){
	    
		$delete = "DELETE FROM tblhrsprovdom";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina una hora de un proveedor  */
    public static function setDeleteTblhrsprovdom1($idtblproveedor, $idtblhora){
        
        $check = "DELETE FROM tblhrsprovdom WHERE tblproveedor_idtblproveedor= ? AND tblhora_idtblhora = ? ";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblhora,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectadoscount
		}catch(PDOException $e){
			return false;
		}
        
    }

    /*Elimina todas hora de un proveedor  */
    public static function setDeleteTblhrsprovdomOfProveedor($idtblproveedor){
        
        $check = "DELETE FROM tblhrsprovdom WHERE tblproveedor_idtblproveedor= ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectadoscount
		}catch(PDOException $e){
			return false;
		}
        
    }

///// FUNCIONES REFRENTE A TABLA tblhrsprovtienda 
    
    /*Insertar un registro en tblhrsprovtienda*/
	 public static function setTblhrsprovtienda($idtblproveedor,$idtblhraabre,$idtblhracierra,$emailcreo){
        
        $insert ="INSERT INTO tblhrsprovtienda (tblproveedor_idtblproveedor,tblhraabre_idtblhraabre,tblhracierra_idtblhracierra,tblhrsprovtienda_fchmodificacion,tblhrsprovtienda_fchcreacion,tblhrsprovtienda_emailusuacreo,tblhrsprovtienda_emailusuamodifico) VALUES (?,?,?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblhraabre,PDO::PARAM_INT);
			$resultado->bindParam(3,$idtblhracierra,PDO::PARAM_INT);
			$resultado->bindParam(4,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(5,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Verifica que no este dado de alta una hora de abrir y cerrar  con el mismo proveedor */
    public static function setCheckTblhrsprovtienda($idtblproveedor,$idtblhraabre,$idtblhracierra){
        
        $check = "SELECT COUNT(*) FROM tblhrsprovtienda WHERE tblproveedor_idtblproveedor= ? AND tblhraabre_idtblhraabre = ?  AND tblhracierra_idtblhracierra = ? ";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblhraabre,PDO::PARAM_INT);
			$resultado->bindParam(3,$idtblhracierra,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
        
    }
    
    /*Actualiza un registro en tblhrsprovtienda*/
	 public static function setUpdateTblhrsprovtienda($idtblproveedor,$idtblhraabre,$idtblhracierra,$emailmodifico){
        
        $insert ="UPDATE tblhrsprovtienda SET tblhraabre_idtblhraabre = ?,tblhracierra_idtblhracierra = ?,tblhrsprovtienda_fchmodificacion = NOW(),tblhrsprovtienda_emailusuamodifico = ? WHERE tblproveedor_idtblproveedor = ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$idtblhraabre,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblhracierra,PDO::PARAM_INT);
			$resultado->bindParam(3,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(4,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Obtiene un registro de tblhrsprovtienda de proveedor*/
    public static function getTblhrsprovtienda($idtblproveedor){
	    
		$consulta = "SELECT * FROM tblhrsprovtienda WHERE tblproveedor_idtblproveedor = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
     /*Obtiene todos los  registro de tblhrsprovtienda */
    public static function getAllTblhrsprovtienda(){
	    
		$consulta = "SELECT * FROM tblhrsprovtienda";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina un registro de tblhrsprovtienda por proveedor */
    public static function setDeleteTblhrsprovtienda($idtblproveedor){
	    
		$delete = "DELETE FROM tblhrsprovtienda WHERE tblproveedor_idtblproveedor = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
    
    /*Elimina todos los registros tblhrsprovtienda*/
    public static function setDeleteAllTblhrsprovtienda($idtblhrsprovdom){
	    
		$delete = "DELETE FROM tblhrsprovtienda ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}


///// FUNCIONES REFRENTE A TABLA tblniveleacceso 
    
    /*Insertar un registro en tblniveleacceso*/
	 public static function setTblnivelacceso($nombrenivel,$descripcionnivel,$activado,$emailcreo){
        
        $insert ="INSERT INTO tblniveleacceso (tblniveleacceso_nombre,tblniveleacceso_descripcion,tblniveleacceso_activado,tblniveleacceso_fchmodificacion, tblniveleacceso_fchcreacion, tblniveleacceso_emailusuamodifico, tblniveleacceso_emailusuacreo) VALUES (?,?,?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombrenivel,PDO::PARAM_STR);
			$resultado->bindParam(2,$descripcionnivel,PDO::PARAM_STR);
			$resultado->bindParam(3,$activado,PDO::PARAM_INT);
			$resultado->bindParam(4,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(5,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Verifica que no exista un registro en tblnivelacceso */
    public static function setCheckTblnivelacceso($nombrenivel){
        
        $check = "SELECT COUNT(*) FROM tblniveleacceso WHERE tblniveleacceso_nombre = ? ";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$nombrenivel,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
        
    }
    
    /*Actualizar un registro en tblnivelacceso*/
	 public static function setUpdateTblnivelacceso($idnivelacceso, $nombrenivel,$descripcionnivel,$activado,$emailmodifico){
        
        $update ="UPDATE tblniveleacceso SET tblniveleacceso_nombre = ?,tblniveleacceso_descripcion= ?,tblniveleacceso_activado= ?,tblniveleacceso_fchmodificacion= ?, tblniveleacceso_emailusuamodifico= ? WHERE idtblniveleacceso=?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$nombrenivel,PDO::PARAM_STR);
			$resultado->bindParam(2,$descripcionnivel,PDO::PARAM_STR);
			$resultado->bindParam(3,$activado,PDO::PARAM_INT);
			$resultado->bindParam(4,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(5,$idnivelacceso,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    
    /*Obtiene un registro de tblniveleacceso*/
    public static function getTblnivelacceso($idnivelacceso){
	    
		$consulta = "SELECT * FROM tblniveleacceso WHERE idtblniveleacceso = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idnivelacceso,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene todos los registros  de tblniveleacceso*/
    public static function getAllTblnivelacceso(){
	    
		$consulta = "SELECT * FROM tblniveleacceso ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene todos los registros tblniveleacceso Activos */
    public static function getAllTblnivelaccesoAct(){
	    
	    $activado=1;
		$consulta = "SELECT * FROM tblniveleacceso WHERE tblniveleacceso_activado = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$activado,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Elimina un registro de tblniveleacceso */
    public static function setDeleteTblnivelacceso($idnivelacceso){
	    
		$delete = "DELETE FROM tblniveleacceso WHERE idtblniveleacceso = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idnivelacceso,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina todo de tblniveleacceso */
    public static function setDeleteAllTblnivelacceso(){
	    
		$delete = "DELETE FROM tblniveleacceso";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}

///// FUNCIONES REFRENTE A TABLA tblordencompra	


    /*Insertar un registro en tblordencompra*/
	 public static function setTblordencompra($fchordencompra, $toralorden,$totaldelivery,$statuspagado,$nombrecliente,$sistemapago,$facturacion,$devolucion,$stripentoken,$emailstripe,$calif,$ordencompracliente,$idtblcliente,$idtblsistpago,$emailcreo){
        
        $conexionPDO = ConexionDB::getInstance()->getDb();
        
        $insert ="INSERT INTO tblordencompra (tblordencompra_fchordencompra,tblordencompra_totalordencompra,tblordencompra_totaldelivery,tblordencompra_statuspagado,tblordencompra_nombrecliente,tblordencompra_sistemapago,tblordencompra_facturacion,tblordencompra_devolucion,tblordencompra_stripetoken,tblordencompra_stripeemail,tblordencompra_calificacion,tblordencompra_ordencompracliente,tblcliente_idtblcliente,tblsistemapago_idtblsistemapago,tblordencompra_fchmodificacion,tblordencompra_fchcreacion,tblordencompra_emailusuacreo,tblordencompra_emailusuamodifico) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = $conexionPDO->prepare($insert);
			$resultado->bindParam(1,$fchordencompra,PDO::PARAM_STR);
			$resultado->bindParam(2,$toralorden,PDO::PARAM_STR);
			$resultado->bindParam(3,$totaldelivery,PDO::PARAM_STR);
			$resultado->bindParam(4,$statuspagado,PDO::PARAM_INT);
			$resultado->bindParam(5,$nombrecliente,PDO::PARAM_STR);
			$resultado->bindParam(6,$sistemapago,PDO::PARAM_STR);
			$resultado->bindParam(7,$facturacion,PDO::PARAM_INT);
			$resultado->bindParam(8,$devolucion,PDO::PARAM_INT);
			$resultado->bindParam(9,$stripentoken,PDO::PARAM_STR);
			$resultado->bindParam(10,$emailstripe,PDO::PARAM_STR);
			$resultado->bindParam(11,$calif,PDO::PARAM_STR);
			$resultado->bindParam(12,$ordencompracliente,PDO::PARAM_STR);
			$resultado->bindParam(13,$idtblcliente,PDO::PARAM_INT);
			$resultado->bindParam(14,$idtblsistpago,PDO::PARAM_INT);
			$resultado->bindParam(15,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(16,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();

			if($resultado->rowCount()>0){

				$id = $conexionPDO->lastInsertId();
				
				return $id;

			}else{
				return $resultado->rowCount();
			}
			
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Verifica que no exista un registro en tblordencompra */
    public static function setCheckTblordencompra($idtblordencompra){
        
        $check = "SELECT COUNT(*) FROM tblordencompra WHERE idtblordencompra = ? ";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$idtblordencompra,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
        
    }
    
     /*Actualizar un registro en tblordencompra*/
	 public static function setUpdateTblordencompra($fchordencompra, $toralorden,$totaldelivery,$statuspagado,$nombrecliente,$sistemapago,$facturacion,$devolucion,$stripentoken,$emailstripe,$calif,$ordencompracliente,$idtblcliente,$idtblsistpago,$emailmodificacion,$idtblordencompra){
        
        $insert ="UPDATE tblordencompra SET tblordencompra_fchordencompra = ?, tblordencompra_totalordencompra= ?,tblordencompra_totaldelivery= ? ,tblordencompra_statuspagado = ?,tblordencompra_nombrecliente= ? ,tblordencompra_sistemapago = ?,tblordencompra_facturacion = ?,tblordencompra_devolucion = ?,tblordencompra_stripetoken = ?,tblordencompra_stripeemail = ?,tblordencompra_calificacion= ? , tblordencompra_ordencompracliente = ?,tblcliente_idtblcliente = ?,tblsistemapago_idtblsistemapago = ?,tblordencompra_fchmodificacion= NOW(), tblordencompra_emailusuamodifico = ? WHERE idtblordencompra = ? "; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$fchordencompra,PDO::PARAM_STR);
			$resultado->bindParam(2,$toralorden,PDO::PARAM_STR);
			$resultado->bindParam(3,$totaldelivery,PDO::PARAM_STR);
			$resultado->bindParam(4,$statuspagado,PDO::PARAM_INT);
			$resultado->bindParam(5,$nombrecliente,PDO::PARAM_STR);
			$resultado->bindParam(6,$sistemapago,PDO::PARAM_STR);
			$resultado->bindParam(7,$facturacion,PDO::PARAM_INT);
			$resultado->bindParam(8,$devolucion,PDO::PARAM_INT);
			$resultado->bindParam(9,$stripentoken,PDO::PARAM_STR);
			$resultado->bindParam(10,$emailstripe,PDO::PARAM_STR);
			$resultado->bindParam(11,$calif,PDO::PARAM_STR);
			$resultado->bindParam(12,$ordencompracliente,PDO::PARAM_STR);
			$resultado->bindParam(13,$idtblcliente,PDO::PARAM_INT);
			$resultado->bindParam(14,$idtblsistpago,PDO::PARAM_INT);
			$resultado->bindParam(15,$emailmodificacion,PDO::PARAM_STR);
			$resultado->bindParam(16,$idtblordencompra,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    
    /*Obtiene un registro de tblordencompra*/
    public static function getTblordencompra($idtblordencompra){
	    
		$consulta = "SELECT * FROM tblordencompra WHERE idtblordencompra = ? ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblordencompra,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene todos registro de tblordencompra*/
    public static function getAllTblordencompra(){
	    
		$consulta = "SELECT * FROM tblordencompra ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina un registro de tblordencompra */
    public static function setDeleteTblordencompra($idtblordencompra){
	    
		$delete = "DELETE FROM tblordencompra WHERE idtblordencompra = ? ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblordencompra,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina un registro de tblordencompra */
    public static function setDeleteAllTblordencompra(){
	    
		$delete = "DELETE FROM tblordencompra ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
///// FUNCIONES REFRENTE A TABLA tblproductcomplem	

    /*Insertar un registro en tblproductcomplem*/
	 public static function setTblproductcomplem($nombreproductcomplem, $descripcion, $seo, $precioreal, $preciobp, $srcimg,$activado,$idtblproveedor,$stock,$emailcreo){
        
        $insert ="INSERT INTO tblproductcomplem (tblproductcomplem_nombre,tblproductcomplem_descripcion,tblproductcomplem_seo,tblproductcomplem_precioreal,tblproductcomplem_preciobp,tblproductcomplem_srcimg,tblproductcomplem_activado,tblproveedor_idtblproveedor,tblproductcomplem_stock,tblproductcomplem_fchmodificacion,tblproductcomplem_fchcreacion,tblproductcomplem_emailusuacreo,tblproductcomplem_emailusuamodifico) VALUES (?,?,?,?,?,?,?,?,?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombreproductcomplem,PDO::PARAM_STR);
			$resultado->bindParam(2,$descripcion,PDO::PARAM_STR);
			$resultado->bindParam(3,$seo,PDO::PARAM_STR);
			$resultado->bindParam(4,$precioreal,PDO::PARAM_STR);
			$resultado->bindParam(5,$preciobp,PDO::PARAM_STR);
			$resultado->bindParam(6,$srcimg,PDO::PARAM_STR);
			$resultado->bindParam(7,$activado,PDO::PARAM_INT);
			$resultado->bindParam(8,$idtblproveedor,PDO::PARAM_INT);
			$resultado->bindParam(9,$stock,PDO::PARAM_INT);
			$resultado->bindParam(10,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(11,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Verifica que no exista un registro en tblproductcomplem */
    public static function setCheckTblproductcomplem($nombreproductcomp, $idtblproveedor){
        
        $check = "SELECT COUNT(*) FROM tblproductcomplem WHERE tblproductcomplem_nombre = ? AND tblproveedor_idtblproveedor = ? ";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$nombreproductcomplem,PDO::PARAM_STR);
			$resultado->bindParam(2,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
        
    }
    
    /*Actualizar un registro en tblproductcomplem*/
	 public static function setUpdateTblproductcomplem($idtblproductcomplem,$nombreproductcomplem, $descripcion, $seo, $precioreal, $preciobp, $srcimg,$activado,$idtblproveedor,$stock,$emailmodifico){
        
        $insert ="UPDATE tblproductcomplem SET tblproductcomplem_nombre = ?,tblproductcomplem_descripcion= ?,tblproductcomplem_seo= ?,tblproductcomplem_precioreal = ?,tblproductcomplem_preciobp= ?,tblproductcomplem_srcimg= ?,tblproductcomplem_activado= ?,tblproveedor_idtblproveedor= ?,tblproductcomplem_stock= ?,tblproductcomplem_fchmodificacion= NOW(),tblproductcomplem_emailusuamodifico= ? WHERE idtblproductcomplem = ? "; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombreproductcomplem,PDO::PARAM_STR);
			$resultado->bindParam(2,$descripcion,PDO::PARAM_STR);
			$resultado->bindParam(3,$seo,PDO::PARAM_STR);
			$resultado->bindParam(4,$precioreal,PDO::PARAM_STR);
			$resultado->bindParam(5,$preciobp,PDO::PARAM_STR);
			$resultado->bindParam(6,$srcimg,PDO::PARAM_STR);
			$resultado->bindParam(7,$activado,PDO::PARAM_INT);
			$resultado->bindParam(8,$idtblproveedor,PDO::PARAM_INT);
			$resultado->bindParam(9,$stock,PDO::PARAM_INT);
			$resultado->bindParam(10,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(11,$idtblproductcomplem,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    /*Actualizar un registro en tblproductcomplem*/
	 public static function setUpdateTblproductcomplemImg($idtblproductcomplem, $srcimg,$emailmodifico){
        
        $insert ="UPDATE tblproductcomplem SET tblproductcomplem_srcimg= ?,tblproductcomplem_fchmodificacion= NOW(),tblproductcomplem_emailusuamodifico= ? WHERE idtblproductcomplem = ? "; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);			
			$resultado->bindParam(1,$srcimg,PDO::PARAM_STR);
			$resultado->bindParam(2,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(3,$idtblproductcomplem,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }

    /*Actualizar un stock en tblproductcomplem*/
	 public static function setUpdateTblproductcomplemStock($idtblproductcomplem,$stock,$emailusuamodifico){
        
        $insert ="UPDATE tblproductcomplem SET tblproductcomplem_stock = ?,tblproductcomplem_fchmodificacion = NOW(),tblproductcomplem_emailusuamodifico = ? WHERE idtblproductcomplem = ? "; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$stock,PDO::PARAM_INT);
			$resultado->bindParam(2,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(3,$idtblproductcomplem,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Obtiene un registro de tblproductcomplem*/
    public static function getTblproductcomplem($idtblproductcomplem){
	    
		$consulta = "SELECT * FROM tblproductcomplem WHERE idtblproductcomplem = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproductcomplem,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}

	/*Obtiene un Id registro de tblproductcomplem*/
    public static function getTblproductoComplementarioId($nombreproductcomplem, $descripcion, $seo, $precioreal, $preciobp, $srcimg,$activado,$idtblproveedor,$stock,$emailcreo){
	    
		//$consulta = "SELECT * FROM tblproductcomplem WHERE idtblproductcomplem = ?";
		
		$consulta = "SELECT idtblproductcomplem FROM tblproductcomplem WHERE tblproductcomplem_nombre = ? AND tblproductcomplem_descripcion = ? AND tblproductcomplem_seo = ? AND tblproductcomplem_precioreal = ? AND 	tblproductcomplem_preciobp = ? AND tblproductcomplem_srcimg = ? AND tblproductcomplem_activado = ? AND tblproveedor_idtblproveedor = ? AND tblproductcomplem_stock = ? AND tblproductcomplem_emailusuacreo = ? ORDER BY idtblproductcomplem DESC LIMIT 1";
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$nombreproductcomplem,PDO::PARAM_STR);
			$resultado->bindParam(2,$descripcion,PDO::PARAM_STR);
			$resultado->bindParam(3,$seo,PDO::PARAM_STR);
			$resultado->bindParam(4,$precioreal,PDO::PARAM_STR);
			$resultado->bindParam(5,$preciobp,PDO::PARAM_STR);
			$resultado->bindParam(6,$srcimg,PDO::PARAM_STR);
			$resultado->bindParam(7,$activado,PDO::PARAM_INT);
			$resultado->bindParam(8,$idtblproveedor,PDO::PARAM_INT);
			$resultado->bindParam(9,$stock,PDO::PARAM_INT);
			$resultado->bindParam(10,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Obtiene todos los  registro de tblproductcomplem*/
    public static function getAllTblproductcomplem(){
	    
		$consulta = "SELECT * FROM tblproductcomplem";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);			
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}

	/*Obtiene todos los  registro de tblproductcomplem*/
    public static function getAllTblproductcomplemOfProveedor($idtblproveedor){
	    
		$consulta = "SELECT * FROM tblproductcomplem WHERE tblproveedor_idtblproveedor = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
    
    
    /*Obtiene todos los  registro de tblproductcomplem Activos*/
    public static function getAllTblproductcomplemAct(){
	    
	    $activado=1;
		$consulta = "SELECT * FROM tblproductcomplem WHERE tblproductcomplem_activado= ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
    		$resultado->bindParam(1,$activado,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene todos los  registro de tblproductcomplem Activos de un proveedor */
    public static function getAllTblproductcomplemAct2($idtblproveedor){
	    
	    $activado=1;
		$consulta = "SELECT * FROM tblproductcomplem TPC 
					  INNER JOIN tblproveedor TP ON TPC.tblproveedor_idtblproveedor = TP.idtblproveedor
					  WHERE tblproveedor_idtblproveedor= ? AND tblproductcomplem_activado= ? ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
    		$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
    		$resultado->bindParam(2,$activado,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina un registro de tblproductcomplem */
    public static function setDeleteTblproductcomplem($idtblproductcomplem){
	    
		$delete = "DELETE FROM tblproductcomplem WHERE idtblproductcomplem = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblproductcomplem,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
    
    /*Elimina todos los registro de tblproductcomplem */
    public static function setDeleteAllTblproductcomplem(){
	    
		$delete = "DELETE FROM tblproductcomplem ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}


///// FUNCIONES REFRENTE A TABLA tblproducto	

    /*Insertar un registro en tblproducto*/
	 public static function setTblproducto($nombreproduct, $descripcion,$ingredientes,$seo,$promcalif,$activado,$idtblproveedor,$idtblcategproduc,$idtblclasifproduct,$emailcreo){
        
        $insert ="INSERT INTO tblproducto (
        tblproducto_nombre,
        tblproducto_descripcion,
        tblproducto_ingredientes,
        tblproducto_seo,
        tblproducto_promcalificacion,
        tblproducto_activado,
        tblproveedor_idtblproveedor,
        tblcategproduct_idtblcategproduct,
        tblclasifproduct_idtblclasifproduct,
        tblproducto_fchmodificacion,
        tblproducto_fchcreacion,
        tblproducto_emailusuacreo,
        tblproducto_emailusuamodifico) VALUES (?,?,?,?,?,?,?,?,?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombreproduct,PDO::PARAM_STR);
			$resultado->bindParam(2,$descripcion,PDO::PARAM_STR);
			$resultado->bindParam(3,$ingredientes,PDO::PARAM_STR);
			$resultado->bindParam(4,$seo,PDO::PARAM_STR);
			$resultado->bindParam(5,$promcalif,PDO::PARAM_STR);
			$resultado->bindParam(6,$activado,PDO::PARAM_INT);
			$resultado->bindParam(7,$idtblproveedor,PDO::PARAM_INT);
			$resultado->bindParam(8,$idtblcategproduc,PDO::PARAM_INT);
			$resultado->bindParam(9,$idtblclasifproduct,PDO::PARAM_INT);
			$resultado->bindParam(10,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(11,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Verifica que no exista un registro en tblproduct */
    public static function setCheckTblproducto($nombreproduct,$idtblproveedor,$idtblcategproduct,$idtblclasifproduct){
        
        $check = "SELECT COUNT(*) FROM tblproducto WHERE tblproducto_nombre = ? AND tblproveedor_idtblproveedor = ? AND tblcategproduct_idtblcategproduct = ? AND tblclasifproduct_idtblclasifproduct";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$nombreproduct,PDO::PARAM_STR);
			$resultado->bindParam(2,$idtblproveedor,PDO::PARAM_INT);
			$resultado->bindParam(3,$idtblcategproduc,PDO::PARAM_INT);
			$resultado->bindParam(4,$idtblclasifproduct,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
        
    }
    
    
    /*Actualiza un registro en tblproducto*/
	 public static function setUpdateTblproducto($idtblproducto,$nombreproduct,$descripcion,$ingredientes,$seo,$promcalif,$activado,$idtblproveedor,$idtblcategproduc,$idtblclasifproduct,$emailmodifico){
        
        $insert ="UPDATE tblproducto SET tblproducto_nombre = ?,tblproducto_descripcion = ?,tblproducto_ingredientes = ?,tblproducto_seo = ?,tblproducto_promcalificacion = ?,tblproducto_activado = ?,tblproveedor_idtblproveedor = ?,tblcategproduct_idtblcategproduct = ?,tblclasifproduct_idtblclasifproduct = ?,tblproducto_fchmodificacion = NOW(),tblproducto_emailusuamodifico = ? WHERE idtblproducto = ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombreproduct,PDO::PARAM_STR);
			$resultado->bindParam(2,$descripcion,PDO::PARAM_STR);
			$resultado->bindParam(3,$ingredientes,PDO::PARAM_STR);
			$resultado->bindParam(4,$seo,PDO::PARAM_STR);
			$resultado->bindParam(5,$promcalif,PDO::PARAM_STR);
			$resultado->bindParam(6,$activado,PDO::PARAM_INT);
			$resultado->bindParam(7,$idtblproveedor,PDO::PARAM_INT);
			$resultado->bindParam(8,$idtblcategproduc,PDO::PARAM_INT);
			$resultado->bindParam(9,$idtblclasifproduct,PDO::PARAM_INT);
			$resultado->bindParam(10,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(11,$idtblproducto,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
     /*Obtiene un registro de tblproduct*/
    public static function getTblproducto($idtblproduct){
	    
		$consulta = "SELECT * FROM tblproducto WHERE idtblproducto = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproduct,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}

	public static function getTblproductoId($nombreproduct, $descripcion,$ingredientes,$seo,$promcalif,$activado,$idtblproveedor,$idtblcategproduc,$idtblclasifproduct,$emailcreo){
	    
		$consulta = "SELECT idtblproducto FROM tblproducto WHERE tblproducto_nombre = ? AND tblproducto_descripcion = ? AND tblproducto_ingredientes = ? AND tblproducto_seo = ? AND tblproducto_promcalificacion = ? AND tblproducto_activado = ? AND tblproveedor_idtblproveedor = ? AND tblcategproduct_idtblcategproduct = ? AND tblclasifproduct_idtblclasifproduct = ? AND tblproducto_emailusuacreo = ? ORDER BY idtblproducto DESC LIMIT 1";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$nombreproduct,PDO::PARAM_STR);
			$resultado->bindParam(2,$descripcion,PDO::PARAM_STR);
			$resultado->bindParam(3,$ingredientes,PDO::PARAM_STR);
			$resultado->bindParam(4,$seo,PDO::PARAM_STR);
			$resultado->bindParam(5,$promcalif,PDO::PARAM_STR);
			$resultado->bindParam(6,$activado,PDO::PARAM_INT);
			$resultado->bindParam(7,$idtblproveedor,PDO::PARAM_INT);
			$resultado->bindParam(8,$idtblcategproduc,PDO::PARAM_INT);
			$resultado->bindParam(9,$idtblclasifproduct,PDO::PARAM_INT);
			$resultado->bindParam(10,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	/*Obtiene todos los registros de tblproduct*/
    public static function getAllTblproducto(){
	    
		$consulta = "SELECT * FROM tblproducto ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Obtiene todos los registros de tblproduct Activos */
    public static function getAllTblproductoAct(){
        
	    $activado=1;
		$consulta = "SELECT * FROM tblproducto WHERE tblproducto_activado = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$activado,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}

	/*Obtiene todos los registros de tblproduct Activos */
    public static function getAllTblproductoActAllDataByTblclasifproduct($idtblclasifproduct){
        
        $idtblproducto=0;        
	    $activado=1;
		$consulta = "SELECT * FROM tblproducto as producto INNER JOIN tblproductdetalle as detalle ON producto.idtblproducto = detalle.tblproducto_idtblproducto INNER JOIN tblproductimg as img ON producto.idtblproducto = img.tblproducto_idtblproducto INNER JOIN tblespecificingrediente as especificingrediente ON detalle.tblespecificingrediente_idtblespecificingrediente = especificingrediente.idtblespecificingrediente WHERE producto.idtblproducto > ? AND producto.tblproducto_activado = ? AND producto.tblclasifproduct_idtblclasifproduct = ? GROUP BY producto.idtblproducto ORDER BY producto.tblproducto_nombre";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproducto,PDO::PARAM_INT);
			$resultado->bindParam(2,$activado,PDO::PARAM_INT);
			$resultado->bindParam(3,$idtblclasifproduct,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
    
    
    /*Obtiene todos los registros de tblproduct Activos  de un proveedor */
    public static function getAllTblproductoAct2($idtblproveedor){
	    
	    $activado=1;
		$consulta = "SELECT * FROM tblproducto WHERE  tblproveedor_idtblproveedor = ? AND tblproducto_activado = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->bindParam(2,$activado,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}

	/*Obtiene todos los registros de tblproduct Activos  de un proveedor */
    public static function getAllTblproductoOfProveedor($idtblproveedor){
    	
		$consulta = "SELECT * FROM tblproducto WHERE  tblproveedor_idtblproveedor = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}

	/*Obtiene todos los registros de tblproduct Activos  de un proveedor */
    public static function getAllTblproductoTblproductoDetalleOfProveedor($idtblproveedor){
    	
		//$consulta="SELECT producto.idtblproducto as idProducto, producto.tblproducto_nombre as nombre, detalle.tblproductdetalle_diaselaboracion as diaselaboracion,detalle.idtblproductdetalle as idProductoDetalle,detalle.tblproductdetalle_stock as stock,detalle.tblproductdetalle_precioreal as precioreal,detalle.tblproductdetalle_diametro as diamentro, detalle.tblproductdetalle_largo as largo, detalle.tblproductdetalle_ancho as ancho, detalle.tblproductdetalle_piezas as piezas, detalle.tblproducto_activado as activado, especificingrediente.tblespecificingrediente_nombre as nombreIngrediente FROM tblproducto as producto INNER JOIN tblproductdetalle as detalle ON producto.idtblproducto=detalle.tblproducto_idtblproducto INNER JOIN tblespecificingrediente as especificingrediente ON detalle.tblespecificingrediente_idtblespecificingrediente=especificingrediente.idtblespecificingrediente WHERE producto.tblproveedor_idtblproveedor=? ORDER BY producto.idtblproducto";
		$consulta="SELECT producto.idtblproducto as idProducto, producto.tblproducto_nombre as nombre, producto.tblproducto_descripcion as descripcion, producto.tblproducto_ingredientes as ingredientes, producto.tblproducto_seo as seo, producto.tblproducto_activado as activadoGeneral, producto.tblcategproduct_idtblcategproduct as idtblcategproduct, producto.tblclasifproduct_idtblclasifproduct as idtblclasifproduct, detalle.tblproductdetalle_diaselaboracion as diaselaboracion,detalle.idtblproductdetalle as idProductoDetalle,detalle.tblproductdetalle_stock as stock,detalle.tblproductdetalle_precioreal as precioreal,detalle.tblproductdetalle_diametro as diamentro, detalle.tblproductdetalle_largo as largo, detalle.tblproductdetalle_ancho as ancho, detalle.tblproductdetalle_piezas as piezas, detalle.tblproductdetalle_activado as activado, especificingrediente.tblespecificingrediente_nombre as nombreIngrediente FROM tblproducto as producto INNER JOIN tblproductdetalle as detalle ON producto.idtblproducto=detalle.tblproducto_idtblproducto INNER JOIN tblespecificingrediente as especificingrediente ON detalle.tblespecificingrediente_idtblespecificingrediente=especificingrediente.idtblespecificingrediente WHERE producto.tblproveedor_idtblproveedor=? ORDER BY producto.idtblproducto";
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
    
    /*Elimina un registro de tblproduct */
    public static function setDeleteTblproducto($idtblproduct){
	    
		$delete = "DELETE FROM tblproducto WHERE idtblproducto = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblproduct,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina todos los registros de tblproduct*/
    public static function setDeleteAllTblproducto(){
	    
		$delete = "DELETE FROM tblproducto ";
		
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	
///// FUNCIONES REFRENTE A TABLA tblproductdetalle	

    /*Insertar un registro en tblproductdetalle*/
	 public static function setTblproductDetalle($diaselaboracion,$stock,$precioreal,$preciobp,$diametro,$largo,$ancho,$porciones,$piezas,$activado,$idtblproducto,$idtblespecificingrediente,$emailcreo){
        
        $insert ="INSERT INTO tblproductdetalle (tblproductdetalle_diaselaboracion,tblproductdetalle_stock,tblproductdetalle_precioreal,tblproductdetalle_preciobepickler,tblproductdetalle_diametro,tblproductdetalle_largo,tblproductdetalle_ancho,tblproductdetalle_porciones,tblproductdetalle_piezas,tblproductdetalle_activado,tblproducto_idtblproducto,tblespecificingrediente_idtblespecificingrediente,tblproductdetalle_fchmodificacion,tblproductdetalle_fchcreacion,tblproductdetalle_emailusuacreo,tblproductdetalle_emailusuamodifico) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$diaselaboracion,PDO::PARAM_INT);
			$resultado->bindParam(2,$stock,PDO::PARAM_INT);
			$resultado->bindParam(3,$precioreal,PDO::PARAM_STR);
			$resultado->bindParam(4,$preciobp,PDO::PARAM_STR);
			$resultado->bindValue(5,$diametro,PDO::PARAM_STR);
			$resultado->bindValue(6,$largo,PDO::PARAM_STR);
			$resultado->bindValue(7,$ancho,PDO::PARAM_STR);
			$resultado->bindParam(8,$porciones,PDO::PARAM_INT);
			$resultado->bindValue(9,$piezas,PDO::PARAM_STR);
			$resultado->bindParam(10,$activado,PDO::PARAM_INT);
			$resultado->bindParam(11,$idtblproducto,PDO::PARAM_INT);
			$resultado->bindParam(12,$idtblespecificingrediente,PDO::PARAM_INT);
			$resultado->bindParam(13,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(14,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*NO FUNCIONAL 
    Verifica que no exista un registro en tblproductdetalle 
    public static function setCheckTblproductDetalle(){
        
        $check = "SELECT COUNT(*) FROM tblproductdetalle";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bind_param('',);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
    }*/
    
    
    /*Actualizar un registro en tblproductdetalle*/
	 public static function setUpdateTblproductDetalle($idtblproductdetalle,$diaselaboracion,$stock,$precioreal,$preciobp,$diametro,$largo,$ancho,$porciones,$piezas,$activado,$idtblproducto,$idtblespecifingrediente,$emailmodifico){

	 	$insert="UPDATE tblproductdetalle SET tblproductdetalle_diaselaboracion=?,tblproductdetalle_stock=?,tblproductdetalle_precioreal=?,tblproductdetalle_preciobepickler=?,tblproductdetalle_diametro=?,tblproductdetalle_largo=?,tblproductdetalle_ancho=?,tblproductdetalle_porciones=?,tblproductdetalle_piezas=?,tblproductdetalle_activado=?,tblproducto_idtblproducto=?,tblespecificingrediente_idtblespecificingrediente=?,tblproductdetalle_fchmodificacion=NOW(),tblproductdetalle_emailusuamodifico=? WHERE idtblproductdetalle= ?";
        
        //$insert ="UPDATE tblproductdetalle SET tblproductdetalle_diaselaboracion = ?,tblproductdetalle_stock = ?,tblproductdetalle_precioreal = ?,tblproductdetalle_bepickler = ?,tblproductdetalle_diametro = ?,tblproductdetalle_largo = ?,tblproductdetalle_ancho = ?,tblproductdetalle_porciones = ?,tblproductdetalle_piezas = ?,tblproducto_idtblproducto = ?,tblespecificingrediente_idtblespecificingrediente= ? ,tblproductdetalle_fchmodificacion = NOW(),tblproductdetalle_emailusuamodifico = ? WHERE idtblproductdetalle = ? "; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$diaselaboracion,PDO::PARAM_INT);
			$resultado->bindParam(2,$stock,PDO::PARAM_INT);
			$resultado->bindParam(3,$precioreal,PDO::PARAM_STR);
			$resultado->bindParam(4,$preciobp,PDO::PARAM_STR);
			$resultado->bindParam(5,$diametro,PDO::PARAM_STR);
			$resultado->bindParam(6,$largo,PDO::PARAM_STR);
			$resultado->bindParam(7,$ancho,PDO::PARAM_STR);
			$resultado->bindParam(8,$porciones,PDO::PARAM_INT);
			$resultado->bindParam(9,$piezas,PDO::PARAM_INT);
			$resultado->bindParam(10,$activado,PDO::PARAM_INT);
			$resultado->bindParam(11,$idtblproducto,PDO::PARAM_INT);
			$resultado->bindParam(12,$idtblespecifingrediente,PDO::PARAM_INT);
			$resultado->bindParam(13,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(14,$idtblproductdetalle,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }

    /*Actualizar un registro en tblproductdetalle*/
	public static function setUpdateTblproductDetalleActivar($idtblproductdetalle,$activado,$emailmodifico){
        
    	$insert ="UPDATE tblproductdetalle SET tblproductdetalle_activado = ?,tblproductdetalle_fchmodificacion = NOW(),tblproductdetalle_emailusuamodifico = ? WHERE idtblproductdetalle = ? "; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$activado,PDO::PARAM_INT);
			$resultado->bindParam(2,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(3,$idtblproductdetalle,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }

    /*Actualizar un registro en tblproductdetalle*/
	public static function setUpdateTblproductDetalleStock($idtblproductdetalle,$stock,$emailmodifico){
        
    	$insert ="UPDATE tblproductdetalle SET tblproductdetalle_stock = ?,tblproductdetalle_fchmodificacion = NOW(),tblproductdetalle_emailusuamodifico = ? WHERE idtblproductdetalle = ? "; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$stock,PDO::PARAM_INT);
			$resultado->bindParam(2,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(3,$idtblproductdetalle,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Obtiene un registro de tblproductdetalle*/
    public static function getTblproductoDetalle($idtblproductdetalle){
	    
		$consulta = "SELECT * FROM tblproductdetalle WHERE idtblproductdetalle = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproductdetalle,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	/*Obtiene un registro de tblproductdetalle*/
    public static function getTblproductoDetalleProducto($idtblproducto){
	    
		$consulta = "SELECT * FROM tblproductdetalle WHERE tblproducto_idtblproducto = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproducto,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene todos los  registro de tblproduct*/
    public static function getAllTblproductoDetalle(){
	    
		$consulta = "SELECT * FROM tblproductdetalle ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}

	/*Obtener todos los registros de tblproductDetalle por producto*/
	 public static function getAllTblproductoDetalleOfIdProducto($idtblproducto){
	    
		$consulta = "SELECT COUNT(*) FROM tblproductdetalle WHERE tblproducto_idtblproducto=?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproducto,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina un registro de tblproductdetalle */
    public static function setDeleteTblproductDetalle($idtblproductdetalle){
	    
		$delete = "DELETE FROM tblproductdetalle WHERE idtblproductdetalle = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblproductdetalle,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
    
	/*Elimina todos los  registro de tblproductdetalle */
    public static function setDeleteAllTblproductDetalle(){
	    
		$delete = "DELETE FROM tblproductdetalle ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	

///// FUNCIONES REFRENTE A TABLA tblproductimg	

    /*Insertar un registro en tblproductimg*/
	 public static function setTblproductImg($srcimg,$idtblproducto,$emailcreo){
        
        $insert ="INSERT INTO tblproductimg (tblproductimg_srcimg,tblproducto_idtblproducto,tblproductimg_fchmodificacion,tblproductimg_fchcreacion,tblproductimg_emailusuacreo,tblproductimg_emailusuamodifico) VALUES (?,?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$srcimg,PDO::PARAM_STR);
			$resultado->bindParam(2,$idtblproducto,PDO::PARAM_INT);
			$resultado->bindParam(3,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(4,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*NO FUNCIONAL 
    Verifica que no exista un registro en tblproductimg 
    public static function setCheckTblproductImg(){
        
        $check = "SELECT COUNT(*) FROM tblproductimg";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bind_param('',);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
    }*/
    
    /*Actualiza un registro en tblproductimg*/
	 public static function setUpdateTblproductImg($idtblproductimg,$srcimg,$idtblproducto,$emailmodifico){
        
        $insert ="UPDATE tblproductimg  SET tblproductimg_srcimg = ?,tblproducto_idtblproducto= ?,tblproductimg_fchmodificacion= NOW(),tblproductimg_emailusuamodifico= ? WHERE idtblproductimg = ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$srcimg,PDO::PARAM_STR);
			$resultado->bindParam(2,$idtblproducto,PDO::PARAM_INT);
			$resultado->bindParam(3,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(4,$idtblproductimg,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Obtiene un registro de tblproductimg*/
    public static function getTblproductImg($idtblproductimg){
	    
		$consulta = "SELECT * FROM tblproductimg WHERE idtblproductimg = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproductimg,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}

	/*Obtiene el Id un registro de tblproductimg*/
    public static function getTblproductImgIdtblproductimg($srcimg,$idtblproducto,$emailcreo){
	    
		$consulta = "SELECT * FROM tblproductimg WHERE tblproductimg_srcimg = ? AND tblproducto_idtblproducto = ? AND tblproductimg_emailusuacreo = ? ORDER BY idtblproductimg DESC LIMIT 1";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$srcimg,PDO::PARAM_STR);
			$resultado->bindParam(2,$idtblproducto,PDO::PARAM_INT);
			$resultado->bindParam(3,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
    
     /*Obtiene todas los registro de tblproductimg*/
    public static function getAllTblproductImg(){
	    
		$consulta = "SELECT * FROM tblproductimg ";
		
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}

	/*Obtiene todas los registro de tblproductimg de un producto*/
    public static function getAllTblproductImgProducto($idtblproducto){
	    
		$consulta = "SELECT * FROM tblproductimg WHERE tblproducto_idtblproducto = ?";
		
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproducto,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Elimina un registro de tblproductimg */
    public static function setDeleteTblproductImg($idtblproductimg){
	    
		$delete = "DELETE FROM tblproductimg WHERE idtblproductimg = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblproductimg,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}

	/*Elimina un registro de tblproductimg */
    public static function setDeleteTblproductImgOfProducto($idtblproducto){
	    
		$delete = "DELETE FROM tblproductimg WHERE tblproducto_idtblproducto = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblproducto,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Elimina todos registro de tblproductimg */
    public static function setDeleteAllTblproductImg(){
	    
		$delete = "DELETE FROM tblproductimg ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}


///// FUNCIONES REFRENTE A TABLA tblproveedor 
    
    /*Insertar un registro en tblproveedor*/
	 public static function setTblproveedor($nombreprov,$srclogo,$descripcion,$direccion,$seo,$telftienda,$extencion,$celular,$email,$activado,$idtbltipopedido,$idtbltiposervicio,$idtblcolonia,$idtblpaquete,$emailcreo){
        
        $insert ="INSERT INTO tblproveedor (tblproveedor_nombre,tblproveedor_srclogo,tblproveedor_descripcion,tblproveedor_direccion,tblproveedor_seo,tblproveedor_telefonotienda,tblproveedor_extencion,tblproveedor_celular,tblproveedor_email,tblproveedor_activado,tbltipopedido_idtbltipopedido,tbltiposervicio_idtbltiposervicio,tblcolonia_idtblcolonia,tblpaquete_idtblpaquete,tblproveedor_fchmodificacion,tblproveedor_fchcreacion,tblproveedor_emailusuacreo,tblproveedor_emailusuamodifico) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombreprov,PDO::PARAM_STR);
			$resultado->bindParam(2,$srclogo,PDO::PARAM_STR);
			$resultado->bindParam(3,$descripcion,PDO::PARAM_STR);
			$resultado->bindParam(4,$direccion,PDO::PARAM_STR);
			$resultado->bindParam(5,$seo,PDO::PARAM_STR);
			$resultado->bindParam(6,$telftienda,PDO::PARAM_STR);
			$resultado->bindParam(7,$extencion,PDO::PARAM_STR);
			$resultado->bindParam(8,$celular,PDO::PARAM_STR);
			$resultado->bindParam(9,$email,PDO::PARAM_STR);
			$resultado->bindParam(10,$activado,PDO::PARAM_INT);
			$resultado->bindParam(11,$idtbltipopedido,PDO::PARAM_INT);
			$resultado->bindParam(12,$idtbltiposervicio,PDO::PARAM_INT);
			$resultado->bindParam(13,$idtblcolonia,PDO::PARAM_INT);
			$resultado->bindParam(14,$idtblpaquete,PDO::PARAM_INT);
			$resultado->bindParam(15,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(16,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }


    /*Verifica que no exista un registro en tblproveedor  */
    public static function setCheckTblproveedor($nombreprov,$idtblcolonia){
        
        $check = "SELECT COUNT(*) FROM tblproveedor WHERE tblproveedor_nombre AND tblcolonia_idtblcolonia";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$nombreprov,PDO::PARAM_STR);
			$resultado->bindParam(2,$idtblcolonia,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
    }
    
    /*Actualizar un registro en tblproveedor*/
	 public static function setUpdateTblproveedor($idtblproveedor,$nombreprov,$srclogo,$descripcion,$direccion,$seo,$telftienda,$extencion,$celular,$email,$activado,$idtbltipopedido,$idtbltiposervicio,$idtblcolonia,$idtblpaquete,$emailmodifico){
        
        $insert ="UPDATE tblproveedor SET tblproveedor_nombre = ?,tblproveedor_srclogo = ?,tblproveedor_descripcion = ?,tblproveedor_direccion = ?,tblproveedor_seo = ?,tblproveedor_telefonotienda = ?,tblproveedor_extencion = ?,tblproveedor_celular = ?,tblproveedor_email = ?,tblproveedor_activado = ?,tbltipopedido_idtbltipopedido = ?,	tbltipopedido_idtbltipopedido = ?,tblcolonia_idtblcolonia = ?,tblpaquete_idtblpaquete = ?,tblproveedor_fchmodificacion = NOW(),tblproveedor_emailusuamodifico = ? WHERE 	idtblproveedor  = ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombreprov,PDO::PARAM_STR);
			$resultado->bindParam(2,$srclogo,PDO::PARAM_STR);
			$resultado->bindParam(3,$descripcion,PDO::PARAM_STR);
			$resultado->bindParam(4,$direccion,PDO::PARAM_STR);
			$resultado->bindParam(5,$seo,PDO::PARAM_STR);
			$resultado->bindParam(6,$telftienda,PDO::PARAM_STR);
			$resultado->bindParam(7,$extencion,PDO::PARAM_STR);
			$resultado->bindParam(8,$celular,PDO::PARAM_STR);
			$resultado->bindParam(9,$email,PDO::PARAM_STR);
			$resultado->bindParam(10,$activado,PDO::PARAM_INT);
			$resultado->bindParam(11,$idtbltipopedido,PDO::PARAM_INT);
			$resultado->bindParam(12,$idtbltiposervicio,PDO::PARAM_INT);
			$resultado->bindParam(13,$idtblcolonia,PDO::PARAM_INT);
			$resultado->bindParam(14,$idtblpaquete,PDO::PARAM_INT);
			$resultado->bindParam(15,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(16,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }

    /*Obtiene un registro de tblproveedor*/
    public static function getTblproveedor($idtblproveedor){
	    
		$consulta = "SELECT TPV.*,THa.tblhora_hora as tblhoraabre,THc.tblhora_hora as tblhoracierra 
				FROM tblproveedor TPV
				INNER JOIN tblhrsprovtienda THP ON THP.tblproveedor_idtblproveedor = TPV.idtblproveedor
	     		INNER JOIN tblhraabre TA ON THP.tblhraabre_idtblhraabre = TA.idtblhraabre
	     		INNER JOIN tblhracierra TC ON THP.tblhracierra_idtblhracierra = TC.idtblhracierra
	     		INNER JOIN tblhora THa ON THa.idtblhora = TA.tblhora_idtblhora 
	     		INNER JOIN tblhora THc ON THc.idtblhora = TC.tblhora_idtblhora
				WHERE TPV.idtblproveedor = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene un registro de tblproveedor*/
    public static function getAllTblproveedor(){
	    
		$consulta = "SELECT * FROM tblproveedor";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene un registro de tblproveedor Activos*/
    public static function getAllTblproveedoraAct(){
	    
	    $activado=1;
		$consulta = "SELECT * FROM tblproveedor WHERE tblproveedor_activado = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$activado,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina un registro de tblproveedor */
    public static function setDeleteTblproveedor($idtblproveedor){
	    
		$delete = "DELETE FROM tblproveedor WHERE idtblproveedor = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina todos los  registro de tblproveedor */
    public static function setDeleteAllTblproveedor(){
	    
		$delete = "DELETE FROM idtblproveedor";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	
///// FUNCIONES REFRENTE A TABLA tblproveedoreliminado 
    
    /*Insertar un registro en tblproveedoreliminado*/
	 public static function setTblproveedorEliminado($nombreprov,$motivo,$emailusuacreo){
        
        $insert ="INSERT INTO tblproveedoreliminado (tblproveedoreliminado_nombre,tblproveedoreliminado_motivo,tblproveedoreliminado_fchcreacion,tblproveedoreliminado_fchmodificacion,tblproveedoreliminado_emailusuacreo,tblproveedoreliminado_emailusuamodifico) VALUES (?,?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombreprov,PDO::PARAM_STR);
			$resultado->bindParam(2,$motivo,PDO::PARAM_STR);
			$resultado->bindParam(3,$emailusuacreo,PDO::PARAM_STR);
			$resultado->bindParam(4,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*
    Verifica que no exista un registro en tblproveedoreliminado */
    public static function setCheckTblproveedorEliminado($nombreprov){
        
        $check = "SELECT COUNT(*) FROM tblproveedoreliminado WHERE tblproveedoreliminado_nombre";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$nombreprov,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
    }
    
    
    /*Actualizar un registro en tblproveedoreliminado*/
	 public static function setUpdateTblproveedorEliminado($idtbloproveedoreliminado,$nombreprov,$motivo,$emailusuamodifico){
        
        $insert ="UPDATE tblproveedoreliminado  SET tblproveedoreliminado_nombre = ?,tblproveedoreliminado_motivo= ?,tblproveedoreliminado_fchmodificacion= NOW(),tblproveedoreliminado_emailusuamodifico= ? WHERE idtblproveedoreliminado = ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombreprov,PDO::PARAM_STR);
			$resultado->bindParam(2,$motivo,PDO::PARAM_STR);
			$resultado->bindParam(3,$emailusuamodifico,PDO::PARAM_STR);
			$resultado->bindParam(4,$idtbloproveedoreliminado,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Obtiene un registro de tblproveedoreliminado*/
    public static function getTblproveedoreliminado($idtbloproveedoreliminado){
	    
		$consulta = "SELECT * FROM tblproveedoreliminado WHERE idtblproveedoreliminado = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtbloproveedoreliminado,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene todos los registro de tblproveedoreliminado*/
    public static function getAllTblproveedoreliminado(){
	    
		$consulta = "SELECT * FROM tblproveedoreliminado";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina un registro de tblproveedoreliminado */
    public static function setDeleteTblproveedorEliminado($idtbloproveedoreliminado){
	    
		$delete = "DELETE FROM tbloproveedoreliminado WHERE idtbloproveedoreliminado = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtbloproveedoreliminado,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina todo los  registro de tblproveedoreliminado */
    public static function setDeleteAllTblproveedorEliminado(){
	    
		$delete = "DELETE FROM tbloproveedoreliminado WHERE idtbloproveedoreliminado = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}

///// FUNCIONES REFRENTE A TABLA tblsistemapago 
    
    /*Insertar un registro en tblsistemapago*/
	 public static function setTblsistemapago($nombresistemapago,$comision,$llavepu,$llavepr,$activado,$emailcreo){
        
        $insert ="INSERT INTO tblsistemapago (tblsistemapago_nombre,tblsistemapago_comision,tblsistemapago_llavepu,tblsistemapago_llavepr,tblsistemapago_activado,tblsistemapago_fchmodificacion,tblsistemapago_fchcreacion,tblsistemapago_emailusuacreo,tblsistemapago_emailusuamodifico) VALUES (?,?,?,?,?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombresistemapago,PDO::PARAM_STR);
			$resultado->bindParam(2,$comision,PDO::PARAM_STR);
			$resultado->bindParam(3,$llavepu,PDO::PARAM_STR);
			$resultado->bindParam(4,$llavepr,PDO::PARAM_STR);
			$resultado->bindParam(5,$activado,PDO::PARAM_INT);
			$resultado->bindParam(6,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(7,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /* Verifica que no exista un registro en tblsistemapago */
    public static function setCheckTblsistemapago($nombresistemapago){
        
        $check = "SELECT COUNT(*) FROM tblsistemapago WHERE tblsistemapago_nombre = ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$nombresistemapago,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
    }
    
     /*Actualizar un registro en tblsistemapago*/
	 public static function setUpdateTblsistemapago($idsistemapago,$nombresistemapago,$comision,$llavepu,$llavepr,$activado,$emailmodifico){
        
        $insert ="UPDATE tblsistemapago SET tblsistemapago_nombre = ?,tblsistemapago_comision = ?,tblsistemapago_llavepu = ?,tblsistemapago_llavepr = ?,tblsistemapago_activado = ?,tblsistemapago_fchmodificacion = NOW(),tblsistemapago_emailusuamodifico = ?  WHERE idtblsistemapago = ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombresistemapago,PDO::PARAM_STR);
			$resultado->bindParam(2,$comision,PDO::PARAM_STR);
			$resultado->bindParam(3,$llavepu,PDO::PARAM_STR);
			$resultado->bindParam(4,$llavepr,PDO::PARAM_STR);
			$resultado->bindParam(5,$activado,PDO::PARAM_INT);
			$resultado->bindParam(6,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(7,$idsistemapago,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    
    /*Obtiene un registro de tblsistemapago*/
    public static function getTblsistemapago($idsistemapago){
	    
		$consulta = "SELECT * FROM tblsistemapago WHERE idtblsistemapago = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idsistemapago,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene todos los registro de tblsistemapago*/
    public static function getAllTblsistemapago(){
	    
		$consulta = "SELECT * FROM tblsistemapago ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene todo los  registro de tblsistemapago Activos */
    public static function getAllTblsistemapagoAct(){
	    
	    $activado=1;
		$consulta = "SELECT * FROM tblsistemapago WHERE tblsistemapago_activado = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$activado,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina un registro de tblsistemapago */
    public static function setDeleteTblsistemapago($idsistemapago){
	    
		$delete = "DELETE FROM tblsistemapago WHERE idtblsistemapago = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idsistemapago,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
    
    /*Elimina todo los registro de tblsistemapago */
    public static function setDeleteAllTblsistemapago(){
	    
		$delete = "DELETE FROM tblsistemapago";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}

///// FUNCIONES REFRENTE A TABLA tbltipocliente 
    
    /*Insertar un registro en tbltipocliente*/
	 public static function setTbltipocliente($nombretipo,$emailcreo){
        
        $insert ="INSERT INTO tbltipocliente (tbltipocliente_nombre,tbltipocliente_fchmodificacion,tbltipocliente_fchcreacion,tbltipocliente_emailusuacreo,tbltipocliente_emailusuamodifico) VALUES (?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombretipo,PDO::PARAM_STR);
			$resultado->bindParam(2,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(3,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /* Verifica que no exista un registro en tbltipocliente */
    public static function setCheckTbltipocliente($nombretipo){
        
        $check = "SELECT COUNT(*) FROM tbltipocliente WHERE tbltipocliente_nombre = ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$nombretipo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
    }

    /*Actualizar un registro en tbltipocliente*/
	 public static function setUpdateTbltipocliente($idtipocliente,$nombretipo,$emailmodifico){
        
        $insert ="UPDATE tbltipocliente  SET tbltipocliente_nombre = ?,tbltipocliente_fchmodificacion = NOW(),tbltipocliente_emailusuamodifico = ? WHERE idtbltipocliente = ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombretipo,PDO::PARAM_STR);
			$resultado->bindParam(2,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(3,$idtipocliente,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Obtiene un registro de tbltipocliente*/
    public static function getTbltipocliente($idtipocliente){
	    
		$consulta = "SELECT * FROM tbltipocliente WHERE idtbltipocliente = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtipocliente,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene todos los registro de tbltipocliente*/
    public static function getAllTbltipocliente(){
	    
		$consulta = "SELECT * FROM tbltipocliente ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina un registro de tbltipocliente */
    public static function setDeleteTbltipocliente($idtipocliente){
	    
		$delete = "DELETE FROM tbltipocliente WHERE idtbltipocliente = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtipocliente,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina todo los registro de tbltipocliente */
    public static function setDeleteAllTbltipocliente(){
	    
		$delete = "DELETE FROM tbltipocliente";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}

///// FUNCIONES REFRENTE A TABLA tbltipopedido 
    
    /*Insertar un registro en tbltipopedido*/
	 public static function setTbltipopedido($nombretipopedido,$emailcreo){
        
        $insert ="INSERT INTO tbltipopedido (tbltipopedido_nombre,tbltipopedido_fchmodificacion,tbltipopedido_fchcreacion,tbltipopedido_emailusuacreo,tbltipopedido_emailusuamodifico) VALUES (?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombretipopedido,PDO::PARAM_STR);
			$resultado->bindParam(2,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(3,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /* Verifica que no exista un registro en tbltipopedido */
    public static function setCheckTbltipopedido($nombretipopedido){
        
        $check = "SELECT COUNT(*) FROM tbltipopedido WHERE tbltipopedido_nombre = ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$nombretipopedido,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
    }
    
    /*Actualizar un registro en tbltipopedido*/
	 public static function setUpdateTbltipopedido($idtbltipopedido,$nombretipopedido,$emailmodifico){
        
        $insert ="UPDATE tbltipopedido SET tbltipopedido_nombre = ? ,tbltipopedido_fchmodificacion = NOW(),tbltipopedido_emailusuamodifico = ? WHERE idtbltipopedido = ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombretipopedido,PDO::PARAM_STR);
			$resultado->bindParam(2,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(3,$idtbltipopedido,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Obtiene un registro de tbltipopedido*/
    public static function getTbltipopedido($idtbltipopedido){
	    
		$consulta = "SELECT * FROM tbltipopedido WHERE idtbltipopedido = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtbltipopedido,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
    
    /*Obtiene todos los registro de tbltipopedido*/
    public static function getAllTbltipopedido(){
	    
		$consulta = "SELECT * FROM tbltipopedido";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina un registro de tbltipopedido */
    public static function setDeleteTbltipopedido($idtbltipopedido){
	    
		$delete = "DELETE FROM tbltipopedido WHERE idtbltipopedido = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtbltipopedido,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
    
	/*Elimina todo los  registro de tbltipopedido */
    public static function setDeleteAllTbltipopedido(){
	    
		$delete = "DELETE FROM tbltipopedido ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
    


///// FUNCIONES REFRENTE A TABLA tbltiposervicio 
    
    /*Insertar un registro en tbltiposervicio*/
	 public static function setTbltiposervicio($nombretiposervicio,$emailcreo){
        
        $insert ="INSERT INTO tbltiposervicio (tbltiposervicio_nombre,tbltiposervicio_fchmodificacion,tbltiposervicio_fchcreacion,tbltiposervicio_emailusuacreo,tbltiposervicio_emailusuamodifico) VALUES (?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombretiposervicio,PDO::PARAM_STR);
			$resultado->bindParam(2,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(3,$emailcreo,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /* Verifica que no exista un registro en tbltiposervicio */
    public static function setCheckTbltiposervicio($nombretiposervicio){
        
        $check = "SELECT COUNT(*) FROM tbltiposervicio WHERE tbltiposervicio_nombre = ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$nombretiposervicio,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
    }
    
    /*Actualizar un registro en tbltiposervicio*/
	 public static function setUpdateTbltiposervicio($idtbltiposervicio,$nombretiposervicio,$emailmodifico){
        
        $insert ="UPDATE tbltiposervicio SET tbltiposervicio_nombre = ? ,tbltiposervicio_fchmodificacion = NOW(),tbltiposervicio_emailusuamodifico = ? WHERE idtbltiposervicio = ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombretiposervicio,PDO::PARAM_STR);
			$resultado->bindParam(2,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(3,$idtbltiposervicio,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Obtiene un registro de tbltiposervicio*/
    public static function getTbltiposervicio($idtbltiposervicio){
	    
		$consulta = "SELECT * FROM tbltiposervicio WHERE idtbltiposervicio = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtbltiposervicio,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
    
    /*Obtiene todos los registro de tbltiposervicio*/
    public static function getAllTbltiposervicio(){
	    
		$consulta = "SELECT * FROM tbltiposervicio";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina un registro de tbltiposervicio */
    public static function setDeleteTbltiposervicio($idtbltiposervicio){
	    
		$delete = "DELETE FROM tbltiposervicio WHERE idtbltiposervicio = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtbltiposervicio,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
    
	/*Elimina todo los  registro de tbltiposervicio */
    public static function setDeleteAllTbltiposervicio(){
	    
		$delete = "DELETE FROM tbltiposervicio";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	
///// FUNCIONES REFRENTE A TABLA tblusuarioproveedor 
    
    /*Insertar un registro en tblusuarioproveedor*/
	 public static function setTblusuarioproveedor($nombreproveedor, $apellidoproveedor, $emailproveedor, $celularproveedor,$activado,$idtblproveedor,$idtblnivelacceso,$password,$emailcreo){
        
        $insert ="INSERT INTO tblusuarioproveedor (tblusuarioproveedor_nombre,tblusuarioproveedor_apellido,tblusuarioproveedor_email,tblusuarioproveedor_celular,tblusuarioproveedor_activado,tblproveedor_idtblproveedor,tblniveleacceso_idtblniveleacceso,tblusuarioproveedor_password,tblusuarioproveedor_fchmodificacion,tblusuarioproveedor_fchcreacion,tblusuarioproveedor_emailusuacreo,tblusuarioproveedor_emailusuamodifico) VALUES (?,?,?,?,?,?,?,?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombreproveedor,PDO::PARAM_STR);
			$resultado->bindParam(2,$apellidoproveedor,PDO::PARAM_STR);
			$resultado->bindParam(3,$emailproveedor,PDO::PARAM_STR);
			$resultado->bindParam(4,$celularproveedor,PDO::PARAM_STR);
			$resultado->bindParam(5,$activado,PDO::PARAM_INT);
			$resultado->bindParam(6,$idtblproveedor,PDO::PARAM_INT);
			$resultado->bindParam(7,$idtblnivelacceso,PDO::PARAM_INT);
			$resultado->bindParam(8,$password,PDO::PARAM_STR);
			$resultado->bindParam(9,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(10,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /* Verifica que no exista un registro en tblusuarioproveedor */
    public static function setCheckTblusuarioproveedor($emailproveedor,$idtblproveeedor){
        
        $check = "SELECT COUNT(*) FROM tblusuarioproveedor WHERE tblusuarioproveedor_email = ? AND tblproveedor_idtblproveedor = ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$emailproveedor,PDO::PARAM_STR);
			$resultado->bindParam(2,$idtblproveeedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
    }

    /* Verifica que no exista un registro en tblusuarioproveedor */
    public static function setCheckTblusuarioproveedorLogin($emailproveedor,$passwordproveedor){
        
        $consulta = "SELECT * FROM tblusuarioproveedor WHERE tblusuarioproveedor_email = ? AND tblusuarioproveedor_password=?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$emailproveedor,PDO::PARAM_STR);
			$resultado->bindParam(2,$passwordproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro
		}catch(PDOException $e){
			return false;
		}
    }
    
    /*Actualizar un registro en tblusuarioproveedor*/
	 public static function setUpdateTblusuarioproveedor($idtblusuarioproveedor,$nombreproveedor, $apellidoproveedor, $emailproveedor, $celularproveedor,$activado,$idtblproveedor,$idtblnivelacceso,$password,$emailmodifico){
        
        $update ="UPDATE tblusuarioproveedor SET tblusuarioproveedor_nombre = ?,tblusuarioproveedor_apellido = ?,tblusuarioproveedor_email = ?,tblusuarioproveedor_celular = ?,tblusuarioproveedor_activado = ?,tblproveedor_idtblproveedor = ?,tblniveleacceso_idtblniveleacceso = ?,tblusuarioproveedor_password = ?,tblusuarioproveedor_fchmodificacion = NOW(),tblusuarioproveedor_emailusuamodifico = ? WHERE idtblusuarioproveedor = ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$nombreproveedor,PDO::PARAM_STR);
			$resultado->bindParam(2,$apellidoproveedor,PDO::PARAM_STR);
			$resultado->bindParam(3,$emailproveedor,PDO::PARAM_STR);
			$resultado->bindParam(4,$celularproveedor,PDO::PARAM_STR);
			$resultado->bindParam(5,$activado,PDO::PARAM_INT);
			$resultado->bindParam(6,$idtblproveedor,PDO::PARAM_INT);
			$resultado->bindParam(7,$idtblnivelacceso,PDO::PARAM_INT);
			$resultado->bindParam(8,$password,PDO::PARAM_STR);
			$resultado->bindParam(9,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(10,$idtblusuarioproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Obtiene un registro de tblusuarioproveedor*/
    public static function getTblusuarioproveedor($idtblusuarioproveedor){
	    
		$consulta = "SELECT * FROM tblusuarioproveedor WHERE idtblusuarioproveedor = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblusuarioproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene todos los registro de tblusuarioproveedor*/
    public static function getAllTblusuarioproveedor(){
	    
		$consulta = "SELECT * FROM tblusuarioproveedor ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene todos los registro de tblusuarioproveedor Activo*/
    public static function getAllTblusuarioproveedorAct(){
	    
	    $activado=1;
		$consulta = "SELECT * FROM tblusuarioproveedor WHERE tblusuarioproveedor_activado = ? ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$activado,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina un registro de tblusuarioproveedor */
    public static function setDeleteTblusuarioproveedor($idtblusuarioproveedor){
	    
		$delete = "DELETE FROM tblusuarioproveedor WHERE idtblusuarioproveedor = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblusuarioproveedor,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina todos los registro de tblusuarioproveedor */
    public static function setDeleteAllTblusuarioproveedor(){
	    
		$delete = "DELETE FROM tblusuarioproveedor";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	

///// FUNCIONES REFRENTE A TABLA tblcarritoproductcotizador (donde se guardan las cotizaciones de los productos del cotizador) 
    
    /*Insertar un registro en tblcarritoproductcotizador*/
	 public static function setTblcarritoproductcotizador($numpersonas,$fchentrega,$srcimgproducto,$idtblordencotizador,$idtblproductcotizador,$costotienda,$costodomicilio,$emailcreo, $idtblmotivocotizacion){
        
        $insert ="INSERT INTO tblcarritoproductcotizador (tblcarritoproductcotizador_numpersonas,tblcarritoproductcotizador_fchentrega,tblcarritoproductcotizador_srcimg,tblordencotizador_idtblordencotizador,tblproductcotizador_idtblproductcotizador,tblcarritoproductcotizador_costotienda,tblcarritoproductcotizador_costodomicilio,tblcarritoproductcotizador_fchmodificacion,tblcarritoproductcotizador_fchcreacion,tblcarritoproductcotizador_emailusuacreo,tblcarritoproductcotizador_emailusuamodifico, tblmotivocotizacion_idtblmotivocotizacion) VALUES (?,?,?,?,?,?,?,NOW(),NOW(),?,?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$numpersonas,PDO::PARAM_INT);
			$resultado->bindParam(2,$fchentrega,PDO::PARAM_STR);
			$resultado->bindParam(3,$srcimgproducto,PDO::PARAM_STR);
			$resultado->bindParam(4,$idtblordencotizador,PDO::PARAM_INT);
			$resultado->bindParam(5,$idtblproductcotizador,PDO::PARAM_INT);
			$resultado->bindParam(6,$costotienda,PDO::PARAM_STR);
			$resultado->bindParam(7,$costodomicilio,PDO::PARAM_STR);
			$resultado->bindParam(8,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(9,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(10,$idtblmotivocotizacion,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    
    /* Verifica que no exista un registro en tblcarritoproductcotizador */
    public static function setCheckTblcarritoproductcotizador($idtblordencotizador,$idtblproductcotizador){
        
        $check = "SELECT COUNT(*) FROM tblcarritoproductcotizador WHERE tblordencotizador_idtblordencotizador = ? AND tblproductcotizador_idtblproductcotizador = ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$idtblordencotizador,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblproductcotizador,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
    }
    
     /*Actualiza un registro en tblcarritoproductcotizador*/
	 public static function setUpdateTblcarritoproductcotizador($idtblcarritoproductcotizador,$numpersonas,$fchentrega,$srcimgproducto,$idtblordencotizador,$idtblproductcotizador,$costotienda,$costodomicilio,$emailmodifico,$idtblmotivocotizacion){
        
        $update ="UPDATE tblcarritoproductcotizador SET tblcarritoproductcotizador_numpersonas = ? , tblcarritoproductcotizador_fchentrega = ?,tblcarritoproductcotizador_srcimg = ?,tblordencotizador_idtblordencotizador= ? ,tblproductcotizador_idtblproductcotizador = ?,tblcarritoproductcotizador_costotienda = ?,tblcarritoproductcotizador_costodomicilio = ?,tblcarritoproductcotizador_fchmodificacion= NOW(),tblcarritoproductcotizador_emailusuamodifico = ? , tblmotivocotizacion_idtblmotivocotizacion = ? WHERE idtblcarritoproductcotizador = ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$numpersonas,PDO::PARAM_INT);
			$resultado->bindParam(2,$fchentrega,PDO::PARAM_STR);
			$resultado->bindParam(3,$srcimgproducto,PDO::PARAM_STR);
			$resultado->bindParam(4,$idtblordencotizador,PDO::PARAM_INT);
			$resultado->bindParam(5,$idtblproductcotizador,PDO::PARAM_INT);
			$resultado->bindParam(6,$costotienda,PDO::PARAM_STR);
			$resultado->bindParam(7,$costodomicilio,PDO::PARAM_STR);			
			$resultado->bindParam(8,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(9,$idtblmotivocotizacion,PDO::PARAM_INT);
			$resultado->bindParam(10,$idtblcarritoproductcotizador,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    
     /*Obtiene un registro de tblcarritoproductcotizador*/
    public static function getTblcarritoproductcotizador($idtblcarritoproductcotizador){
	    
		$consulta = "SELECT * FROM tblcarritoproductcotizador WHERE idtblcarritoproductcotizador = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblcarritoproductcotizador,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene todos los  registros de tblcarritoproductcotizador de una tblordencotizador*/
    public static function getAllTblcarritoproductcotizador($idtblordencotizador){
	    
		$consulta = "SELECT * FROM tblcarritoproductcotizador WHERE tblordencotizador_idtblordencotizador = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblordencotizador,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene todos los registros de tblcarritoproductcotizador*/
    public static function getAllTblcarritoproductcotizador2(){
	    
		$consulta = "SELECT * FROM tblcarritoproductcotizador";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina un registro de tblcarritoproductcotizador */
    public static function setDeleteTblcarritoproductcotizador($idtblcarritoproductcotizador){
	    
		$delete = "DELETE FROM tblcarritoproductcotizador WHERE idtblcarritoproductcotizador = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblcarritoproductcotizador,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina todos los registro de tblcarritoproductcotizador de una ordencotizador*/
    public static function setDeleteAllTblcarritoproductcotizador($idtblordencotizador){
	    
		$delete = "DELETE FROM tblcarritoproductcotizador WHERE tblordencotizador_idtblordencotizador = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblordencotizador,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina todos los registro de tblcarritoproductcotizador */
    public static function setDeleteAllTblcarritoproductcotizador2(){
	    
		$delete = "DELETE FROM tblcarritoproductcotizador";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
    
///// FUNCIONES REFRENTE A TABLA tblcarritoproductnuevcotiza (donde se guardan las cotizaciones de productos nuevos del cotizador) 
    
    /*Insertar un registro en tblcarritoproductnuevcotiza*/
	 public static function settblcarritoproductnuevcotiza($numpersonas,$fchentrega,$srcimgproducto,$tipoevento,$sabores,$comentarios,$idtblordencotizador,$emailcreo){
        
        $insert ="INSERT INTO tblcarritoproductnuevcotiza (tblcarritoproductnuevcotiza_numpersonas,tblcarritoproductnuevcotiza_fchentrega,tblcarritoproductnuevcotiza_srcimg,tblcarritoproductnuevcotiza_tipodeevento,tblcarritoproductnuevcotiza_sabores,tblcarritoproductnuevcotiza_comentarios,tblordencotizador_idtblordencotizador,tblcarritoproductnuevcotiza_fchmodificacion,tblcarritoproductnuevcotiza_fchcreacion,tblcarritoproductnuevcotiza_emailusuacreo,tblcarritoproductnuevcotiza_emailusuamodifico) VALUES (?,?,?,?,?,?,?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$numpersonas,PDO::PARAM_INT);
			$resultado->bindParam(2,$fchentrega,PDO::PARAM_STR);
			$resultado->bindParam(3,$srcimgproducto,PDO::PARAM_STR);
			$resultado->bindParam(4,$tipoevento,PDO::PARAM_STR);
			$resultado->bindParam(5,$sabores,PDO::PARAM_STR);
			$resultado->bindParam(6,$comentarios,PDO::PARAM_STR);
			$resultado->bindParam(7,$idtblordencotizador,PDO::PARAM_INT);
			$resultado->bindParam(8,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(9,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    } 
    
    /* Verifica que no exista un registro en tblcarritoproductnuevcotiza 
    public static function setChecktblcarritoproductnuevcotiza(){
        
        $check = "SELECT COUNT(*) FROM tblcarritoproductnuevcotiza WHERE ";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
    }
    */
    
     /*Actualizar un registro en tblcarritoproductnuevcotiza*/
	 public static function setUpdatetblcarritoproductnuevcotiza($idtblcarritoproductnuevcotiza,$numpersonas,$fchentrega,$srcimgproducto,$tipoevento,$sabores,$comentarios,$idtblordencotizador,$emailmodifico){
        
        $update ="UPDATE tblcarritoproductnuevcotiza  SET tblcarritoproductnuevcotiza_numpersonas = ? ,tblcarritoproductnuevcotiza_fchentrega = ? ,tblcarritoproductnuevcotiza_srcimg = ? ,tblcarritoproductnuevcotiza_tipodeevento = ? ,tblcarritoproductnuevcotiza_sabores = ? ,tblcarritoproductnuevcotiza_comentarios = ? ,tblordencotizador_idtblordencotizador = ? ,tblcarritoproductnuevcotiza_fchmodificacion = NOW(),tblcarritoproductnuevcotiza_emailusuamodifico = ? WHERE idtblcarritoproductnuevcotiza = ? "; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$numpersonas,PDO::PARAM_INT);
			$resultado->bindParam(2,$fchentrega,PDO::PARAM_STR);
			$resultado->bindParam(3,$srcimgproducto,PDO::PARAM_STR);
			$resultado->bindParam(4,$tipoevento,PDO::PARAM_STR);
			$resultado->bindParam(5,$sabores,PDO::PARAM_STR);
			$resultado->bindParam(6,$comentarios,PDO::PARAM_STR);
			$resultado->bindParam(7,$idtblordencotizador,PDO::PARAM_INT);
			$resultado->bindParam(8,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(9,$idtblcarritoproductnuevcotiza,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
     /*Obtiene un registro de tblcarritoproductnuevcotiza*/
    public static function gettblcarritoproductnuevcotiza($idtblcarritoproductnuevcotiza){
	    
		$consulta = "SELECT * FROM tblcarritoproductnuevcotiza WHERE idtblcarritoproductnuevcotiza = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblcarritoproductnuevcotiza,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene todos los  registros de tblcarritoproductnuevcotiza de una tblordencotizador*/
    public static function getAlltblcarritoproductnuevcotiza($idtblordencotizador){
	    
		$consulta = "SELECT * FROM tblcarritoproductnuevcotiza WHERE tblordencotizador_idtblordencotizador = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblordencotizador,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene todos los registros de tblcarritoproductnuevcotiza*/
    public static function getAlltblcarritoproductnuevcotiza2(){
	    
		$consulta = "SELECT * FROM tblcarritoproductnuevcotiza TCNC 
						INNER JOIN tblordencotizador TOC ON TOC.idtblordencotizador = TCNC.tblordencotizador_idtblordencotizador";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
    
    /*Elimina un registro de tblcarritoproductnuevcotiza */
    public static function setDeletetblcarritoproductnuevcotiza($idtblcarritoproductnuevcotiza){
	    
		$delete = "DELETE FROM tblcarritoproductnuevcotiza WHERE idtblcarritoproductnuevcotiza = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblcarritoproductnuevcotiza,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina todos los registro de tblcarritoproductnuevcotiza de una ordencotizador*/
    public static function setDeleteAlltblcarritoproductnuevcotiza($idtblordencotizador){
	    
		$delete = "DELETE FROM tblcarritoproductnuevcotiza WHERE tblordencotizador_idtblordencotizador = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblordencotizador,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina todos los registro de tblcarritoproductnuevcotiza */
    public static function setDeleteAlltblcarritoproductnuevcotiza2(){
	    
		$delete = "DELETE FROM tblcarritoproductnuevcotiza";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
    
///// FUNCIONES REFRENTE A TABLA tbldetallepaquete
    
    /*Insertar un registro en tbldetallepaquete*/
	 public static function setTbldetallepaquete($numproductos,$arealimitada,$hrsdeentrega,$numproductcomplem,$imgsproductos,$idtblpaquete,$emailcreo){
        
        $insert ="INSERT INTO tbldetallepaquete (tbldetallepaquete_productos,tbldetallepaquete_arealimitada,tbldetallepaquete_horadeentrega,tbldetallepaquete_productcomple,tbldetallepaquete_imgproducto,tblpaquete_idtblpaquete,tbldetallepaquete_fchmodificacion,tbldetallepaquete_fchcreacion,tbldetallepaquete_emailusuacreo,tbldetallepaquete_emailusuamodifico) VALUES (?,?,?,?,?,?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$numproductos,PDO::PARAM_STR);
			$resultado->bindParam(2,$arealimitada,PDO::PARAM_STR);
			$resultado->bindParam(3,$hrsdeentrega,PDO::PARAM_STR);
			$resultado->bindParam(4,$numproductcomplem,PDO::PARAM_STR);
			$resultado->bindParam(5,$imgsproductos,PDO::PARAM_STR);
			$resultado->bindParam(6,$idtblpaquete,PDO::PARAM_INT);
			$resultado->bindParam(7,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(8,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    
    /* Verifica que no exista un registro en tbldetallepaquete */
    public static function setCheckTbldetallepaquete($idtblpaquete){
        
        $check = "SELECT COUNT(*) FROM tbldetallepaquete WHERE tblpaquete_idtblpaquete = ? ";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$idtblpaquete,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
    }
    
    /*Actualizar un registro en tbldetallepaquete*/
	 public static function setUpdateTbldetallepaquete($idtbldetallepaquete,$numproductos,$arealimitada,$hrsdeentrega,$numproductcomplem,$imgsproductos,$idtblpaquete,$emailmodifico){
        
        $update ="UPDATE tbldetallepaquete SET tbldetallepaquete_productos = ? ,tbldetallepaquete_arealimitada = ? ,tbldetallepaquete_horadeentrega = ? ,tbldetallepaquete_productcomple = ? ,tbldetallepaquete_imgproducto = ? ,tblpaquete_idtblpaquete = ? ,tbldetallepaquete_fchmodificacion = NOW(), tbldetallepaquete_emailusuamodifico  = ? WHERE idtbldetallepaquete = ? "; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$numproductos,PDO::PARAM_STR);
			$resultado->bindParam(2,$arealimitada,PDO::PARAM_STR);
			$resultado->bindParam(3,$hrsdeentrega,PDO::PARAM_STR);
			$resultado->bindParam(4,$numproductcomplem,PDO::PARAM_STR);
			$resultado->bindParam(5,$imgsproductos,PDO::PARAM_STR);
			$resultado->bindParam(6,$idtblpaquete,PDO::PARAM_INT);
			$resultado->bindParam(7,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(8,$idtbldetallepaquete,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
     /*Obtiene un registro de tbldetallepaquete por su idtblpaquete*/
    public static function getTbldetallepaquete($idtblpaquete){
	    
		$consulta = "SELECT * FROM tbldetallepaquete WHERE tblpaquete_idtblpaquete = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblpaquete,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
    
     /*Obtiene todos los registro de tbldetallepaquete*/
    public static function getAllTbldetallepaquete(){
	    
		$consulta = "SELECT * FROM tbldetallepaquete ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Elimina un registro de tbldetallepaquete*/
    public static function setDeleteTbldetallepaquete($idtblpaquete){
	    
		$delete = "DELETE FROM tbldetallepaquete WHERE tblpaquete_idtblpaquete = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblpaquete,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina todos los registros de tbldetallepaquete*/
    public static function setDeleteAllTbldetallepaquete(){
	    
		$delete = "DELETE FROM tbldetallepaquete";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
///// FUNCIONES REFRENTE A TABLA tblespecificingrediente
    
    /*Insertar un registro en tblespecificingrediente*/
	 public static function setTblespecificingrediente($nombreingrediente,$descripcion,$emailcreo){
        
        $insert ="INSERT INTO tblespecificingrediente (tblespecificingrediente_nombre,tblespecificingrediente_descripcion,tblespecificingrediente_fchmodificacion,tblespecificingrediente_fchcreacion,tblespecificingrediente_emailusuacreo,tblespecificingrediente_emailusuamodifico) VALUES (?,?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombreingrediente,PDO::PARAM_STR);
			$resultado->bindParam(2,$descripcion,PDO::PARAM_STR);
			$resultado->bindParam(3,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(4,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    
    /* Verifica que no exista un registro en tblespecificingrediente */
    public static function setCheckTblespecificingrediente($nombreingrediente){
        
        $check = "SELECT COUNT(*) FROM tblespecificingrediente WHERE tblespecificingrediente_nombre = ? ";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$nombreingrediente,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
    }
    
    /*Actualiza un registro en tblespecificingrediente*/
	 public static function setUpdateTblespecificingrediente($idtblespecificingrediente,$nombreingrediente,$descripcion,$emailmodifico){
        
        $update ="UPDATE tblespecificingrediente SET tblespecificingrediente_nombre = ? ,tblespecificingrediente_descripcion = ?,tblespecificingrediente_fchmodificacion = NOW(),tblespecificingrediente_emailusuamodifico = ? WHERE idtblespecificingrediente = ? "; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$nombreingrediente,PDO::PARAM_STR);
			$resultado->bindParam(2,$descripcion,PDO::PARAM_STR);
			$resultado->bindParam(3,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(4,$idtblespecificingrediente,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el update
		} catch(PDOException $e){
			return false;
		}
    }
    
     /*Obtiene un registro de tblespecificingrediente*/
    public static function getTblespecificingrediente($idtblespecificingrediente){
	    
		$consulta = "SELECT * FROM tblespecificingrediente WHERE idtblespecificingrediente = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblespecificingrediente,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
    
     /*Obtiene todos los registro de tblespecificingrediente*/
    public static function getAllTblespecificingrediente(){
	    
		$consulta = "SELECT * FROM tblespecificingrediente ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Elimina un registro de tblespecificingrediente*/
    public static function setDeleteTblespecificingrediente($idtblespecificingrediente){
	    
		$delete = "DELETE FROM tblespecificingrediente WHERE idtblespecificingrediente = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblespecificingrediente,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina todos los registros de tblespecificingrediente*/
    public static function setDeleteAllTblespecificingrediente(){
	    
		$delete = "DELETE FROM tblespecificingrediente";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}    


///// FUNCIONES REFRENTE A TABLA tblevento
    
    /*Insertar un registro en tblevento*/
	 public static function setTblevento($nombreevento,$descripcion,$srcimg,$activado,$emailcreo){
        
        $insert ="INSERT INTO tblevento (tblevento_nombre,tblevento_descripcion,tblevento_srcimg,tblevento_activado,tblevento_fchmodificacion,tblevento_fchcreacion,tblevento_emailusuacreo,tblevento_emailusuamodifico) VALUES (?,?,?,?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombreevento,PDO::PARAM_STR);
			$resultado->bindParam(2,$descripcion,PDO::PARAM_STR);
			$resultado->bindParam(3,$srcimg,PDO::PARAM_STR);
			$resultado->bindParam(4,$activado,PDO::PARAM_INT);
			$resultado->bindParam(5,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(6,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
     /* Verifica que no exista un registro en tblevento */
    public static function setCheckTblevento($nombreevento){
        
        $check = "SELECT COUNT(*) FROM tblevento WHERE tblevento_nombre = ? ";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$nombreevento,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
    }
    
    /*Actualiza un registro en tblevento*/
	 public static function setUpdateTblevento($idtblevento,$nombreevento,$descripcion,$srcimg,$activado,$emailmodifico){
        
        $insert ="UPDATE tblevento SET tblevento_nombre =  ? ,tblevento_descripcion = ? ,tblevento_srcimg = ? ,tblevento_activado = ?,tblevento_fchmodificacion = NOW(), tblevento_emailusuamodifico= ? WHERE idtblevento = ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombreevento,PDO::PARAM_STR);
			$resultado->bindParam(2,$descripcion,PDO::PARAM_STR);
			$resultado->bindParam(3,$srcimg,PDO::PARAM_STR);
			$resultado->bindParam(4,$activado,PDO::PARAM_INT);
			$resultado->bindParam(5,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(6,$idtblevento,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
     /*Obtiene un registro de tblevento*/
    public static function getTblevento($idtblevento){
	    
		$consulta = "SELECT * FROM tblevento WHERE idtblevento = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblevento,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene tood los registroa de tblevento*/
    public static function getAllTblevento(){
	    
		$consulta = "SELECT * FROM tblevento ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene tood los registroa de tblevento Activos*/
    public static function getAllTbleventoAct(){
	    
	    $activado = 1;
		$consulta = "SELECT * FROM tblevento WHERE tblevento_activado = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$activado,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina un registro de tblevento*/
    public static function setDeleteTblevento($idtblevento){
	    
		$delete = "DELETE FROM tblevento WHERE idtblevento = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblevento,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina un registro de tblevento*/
    public static function setDeleteAllTblevento(){
	    
		$delete = "DELETE FROM tblevento ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}


///// FUNCIONES REFRENTE A TABLA tblmoduloventabp
    
    /*Insertar un registro en tblmoduloventabp*/
	 public static function setTblmoduloventabp($nombremodulov,$descripcion,$activado,$emailcreo){
        
        $insert ="INSERT INTO tblmoduloventabp (tblmoduloventabp_nombre,tblmoduloventabp_descripcion,tblmoduloventabp_activado,tblmoduloventabp_fchmodificacion,tblmoduloventabp_fchcreacion,tblmoduloventabp_emailusuacreo,tblmoduloventabp_emailusuamodifico) VALUES (?,?,?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombremodulov,PDO::PARAM_STR);
			$resultado->bindParam(2,$descripcion,PDO::PARAM_STR);
			$resultado->bindParam(3,$activado,PDO::PARAM_STR);
			$resultado->bindParam(4,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(5,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /* Verifica que no exista un registro en tblmoduloventabp */
    public static function setCheckTblmoduloventabp($nombremodulov){
        
        $check = "SELECT COUNT(*) FROM tblmoduloventabp WHERE tblmoduloventabp_nombre = ? ";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$nombremodulov,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
    }
    
    
     /*Actualiza un registro en tblmoduloventabp*/
	 public static function setUpdateTblmoduloventabp($idtblmoduloventabp,$nombremodulov,$descripcion,$activado,$emailmodifico){
        
        $update ="UPDATE tblmoduloventabp SET tblmoduloventabp_nombre = ? ,tblmoduloventabp_descripcion = ?,tblmoduloventabp_activado = ?,tblmoduloventabp_fchmodificacion = NOW(),tblmoduloventabp_emailusuamodifico = ? WHERE idtblmoduloventabp = ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$nombremodulov,PDO::PARAM_STR);
			$resultado->bindParam(2,$descripcion,PDO::PARAM_STR);
			$resultado->bindParam(3,$activado,PDO::PARAM_STR);
			$resultado->bindParam(4,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(5,$idtblmoduloventabp,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el update
		} catch(PDOException $e){
			return false;
		}
    }
    
     /*Obtiene un registro de tblmoduloventabp*/
    public static function getTblmoduloventabp($idtblmoduloventabp){
	    
		$consulta = "SELECT * FROM tblmoduloventabp WHERE idtblmoduloventabp = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblmoduloventabp,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Obtiene todos los registros de tblmoduloventabp*/
    public static function getAllTblmoduloventabp(){
	    
		$consulta = "SELECT * FROM tblmoduloventabp ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene todos los registro de tblmoduloventabp Activos*/
    public static function getAllTblmoduloventabpAct(){
	    
	    $activado = 1;
		$consulta = "SELECT * FROM tblmoduloventabp WHERE tblmoduloventabp_activado = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$activado,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina un registro de tblmoduloventabp*/
    public static function setDeleteTblmoduloventabp($idtblmoduloventabp){
	    
		$delete = "DELETE FROM tblmoduloventabp WHERE idtblmoduloventabp = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblmoduloventabp,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina todos los registro de tblmoduloventabp*/
    public static function setDeleteAllTblmoduloventabp(){
	    
		$delete = "DELETE FROM tblmoduloventabp ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}


///// FUNCIONES REFRENTE A TABLA tblordencotizador
    
    /*Insertar un registro en tblordencotizador*/
	 public static function setTblordencotizador($nombre,$email,$telefono,$ciudad,$pais,$emailcreo){
        
        $insert ="INSERT INTO tblordencotizador (tblordencotizador_nombre,tblordencotizador_email,tblordencotizador_telefono,tblordencotizador_ciudad,tblordencotizador_pais,tblordencotizador_fchmodificacion,tblordencotizador_fchcreacion,tblordencotizador_emailusuacreo,tblordencotizador_emailusuamodifico) VALUES (?,?,?,?,?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombre,PDO::PARAM_STR);
			$resultado->bindParam(2,$email,PDO::PARAM_STR);
			$resultado->bindParam(3,$telefono,PDO::PARAM_STR);
			$resultado->bindParam(4,$ciudad,PDO::PARAM_STR);
			$resultado->bindParam(5,$pais,PDO::PARAM_STR);
			$resultado->bindParam(6,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(7,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /* Verifica que no exista un registro en tblordencotizador */
    public static function setCheckTblordencotizador($email){
        
        $check = "SELECT COUNT(*) FROM tblordencotizador WHERE tblordencotizador_email = ? ";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$email,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
    }
    
    /*Actilizar un registro en tblordencotizador*/
	 public static function setUpdateTblordencotizador($idtblordencotizador,$nombre,$email,$telefono,$ciudad,$pais,$emailmodifico){
        
        $update ="UPDATE tblordencotizador SET tblordencotizador_nombre = ? ,tblordencotizador_email = ?,tblordencotizador_telefono = ?,tblordencotizador_ciudad = ? ,tblordencotizador_pais= ? ,tblordencotizador_fchmodificacion = NOW() tblordencotizador_emailusuamodifico = ? WHERE idtblordencotizador = ? "; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$nombre,PDO::PARAM_STR);
			$resultado->bindParam(2,$email,PDO::PARAM_STR);
			$resultado->bindParam(3,$telefono,PDO::PARAM_STR);
			$resultado->bindParam(4,$ciudad,PDO::PARAM_STR);
			$resultado->bindParam(5,$pais,PDO::PARAM_STR);
			$resultado->bindParam(6,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(7,$idtblordencotizador,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Obtiene un registro de tblordencotizador*/
    public static function getTblordencotizador($idtblordencotizador){
	    
		$consulta = "SELECT * FROM tblordencotizador WHERE idtblordencotizador = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblordencotizador,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Obtiene un registro de tblordencotizador*/
    public static function getAllTblordencotizador(){
	    
		$consulta = "SELECT * FROM tblordencotizador";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblordencotizador,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
    /*Elimina un registro de tblordencotizador*/
    public static function setDeleteTblordencotizador($idtblordencotizador){
	    
		$delete = "DELETE FROM tblordencotizador WHERE idtblordencotizador = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblordencotizador,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Elimina todos registro de tblordencotizador*/
    public static function setDeleteAllTblordencotizador(){
	    
		$delete = "DELETE FROM tblordencotizador";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
///// FUNCIONES REFRENTE A TABLA tblordenpaquete
    
    /*Insertar un registro en tblordenpaquete*/
	 public static function setTblordenpaquete($nombremodulo,$nombrepaquete,$precipoaquete,$statuspagado,$sistemapago,$facturacion,$token,$emailtoken,$nombreusuarioprov,$direccionusuarioprov,$email,$ciudad,$telefono,$idtblpaquete,$idtblpreproveedor,$emailcreo){
        
        $insert ="INSERT INTO tblordenpaquete (tblordenpaquete_nombremodulo,tblordenpaquete_nombrepaquete,tblordenpaquete_preciopaquete,tblordenpaquete_statuspagado,tblordenpaquete_sistemapagado,tblordenpaquete_facturacion,tblordenpaquete_token,tblordenpaquete_emailtoken,tblordenpaquete_nombreusuarioprov,tblordenpaquete_direccionusuarioprov,tblordenpaquete_email,tblordenpaquete_ciudad,tblordenpaquete_telefono,tblpaquete_idtblpaquete,tblpreproveedor_idtblpreproveedor,tblordenpaquete_fchmodificacion,tblordenpaquete_fchcreacion,tblordenpaquete_emailusuacreo,tblordenpaquete_emailusuamodifico) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombremodulo,PDO::PARAM_STR);
			$resultado->bindParam(2,$nombrepaquete,PDO::PARAM_STR);
			$resultado->bindParam(3,$precipoaquete,PDO::PARAM_STR);
			$resultado->bindParam(4,$statuspagado,PDO::PARAM_INT);
			$resultado->bindParam(5,$sistemapago,PDO::PARAM_STR);
			$resultado->bindParam(6,$facturacion,PDO::PARAM_INT);
			$resultado->bindParam(7,$token,PDO::PARAM_STR);
			$resultado->bindParam(8,$emailtoken,PDO::PARAM_STR);
			$resultado->bindParam(9,$nombreusuarioprov,PDO::PARAM_STR);
			$resultado->bindParam(10,$direccionusuarioprov,PDO::PARAM_STR);
			$resultado->bindParam(11,$email,PDO::PARAM_STR);
			$resultado->bindParam(12,$ciudad,PDO::PARAM_STR);
			$resultado->bindParam(13,$telefono,PDO::PARAM_STR);
			$resultado->bindParam(14,$idtblpaquete,PDO::PARAM_INT);
			$resultado->bindParam(15,$idtblpreproveedor,PDO::PARAM_INT);
			$resultado->bindParam(16,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(17,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /* Verifica que no exista un registro en tblordenpaquete */
    public static function setCheckTblordenpaquete($idtblpreproveedor){
        
        $check = "SELECT COUNT(*) FROM tblordenpaquete WHERE tblpreproveedor_idtblpreproveedor = ? ";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$idtblpreproveedor,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
    }
    
    /*Actuliza un registro en tblordenpaquete*/
	 public static function setUpdateTblordenpaquete($idtblordenpaquete,$nombremodulo,$nombrepaquete,$precipoaquete,$statuspagado,$sistemapago,$facturacion,$token,$emailtoken,$nombreusuarioprov,$direccionusuarioprov,$email,$ciudad,$telefono,$idtblpaquete,$idtblpreproveedor,$emailcreo){
        
        $update ="UPDATE tblordenpaquete SET tblordenpaquete_nombremodulo = ?,tblordenpaquete_nombrepaquete = ?,tblordenpaquete_preciopaquete = ?,tblordenpaquete_statuspagado = ?,tblordenpaquete_sistemapagado = ?,tblordenpaquete_facturacion = ?,tblordenpaquete_token = ?,tblordenpaquete_emailtoken = ?,tblordenpaquete_nombreusuarioprov = ?,tblordenpaquete_direccionusuarioprov = ?,tblordenpaquete_email = ? ,tblordenpaquete_ciudad = ?,tblordenpaquete_telefono = ?,tblpaquete_idtblpaquete = ?,tblpreproveedor_idtblpreproveedor = ?,tblordenpaquete_fchmodificacion = NOW(),tblordenpaquete_emailusuamodifico = ? WHERE idtblordenpaquete = ? "; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$nombremodulo,PDO::PARAM_STR);
			$resultado->bindParam(2,$nombrepaquete,PDO::PARAM_STR);
			$resultado->bindParam(3,$precipoaquete,PDO::PARAM_STR);
			$resultado->bindParam(4,$statuspagado,PDO::PARAM_INT);
			$resultado->bindParam(5,$sistemapago,PDO::PARAM_STR);
			$resultado->bindParam(6,$facturacion,PDO::PARAM_INT);
			$resultado->bindParam(7,$token,PDO::PARAM_STR);
			$resultado->bindParam(8,$emailtoken,PDO::PARAM_STR);
			$resultado->bindParam(9,$nombreusuarioprov,PDO::PARAM_STR);
			$resultado->bindParam(10,$direccionusuarioprov,PDO::PARAM_STR);
			$resultado->bindParam(11,$email,PDO::PARAM_STR);
			$resultado->bindParam(12,$ciudad,PDO::PARAM_STR);
			$resultado->bindParam(13,$telefono,PDO::PARAM_STR);
			$resultado->bindParam(14,$idtblpaquete,PDO::PARAM_INT);
			$resultado->bindParam(15,$idtblpreproveedor,PDO::PARAM_INT);
			$resultado->bindParam(16,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(17,$idtblordenpaquete,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Obtiene un registro de tblordenpaquete*/
    public static function getTblordenpaquete($idtblordenpaquete){
	    
		$consulta = "SELECT * FROM tblordenpaquete WHERE idtblordenpaquete = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblordenpaquete,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
    
    
    /*Obtiene todos los registro de tblordenpaquete*/
    public static function getAllTblordenpaquete(){
	    
		$consulta = "SELECT * FROM tblordenpaquete ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblordenpaquete,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	 /*Elimina un registro de tblordenpaquete*/
    public static function setDeleteTblordenpaquete($idtblordenpaquete){
	    
		$delete = "DELETE FROM tblordenpaquete WHERE idtblordenpaquete = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblordenpaquete,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina un registro de tblordenpaquete*/
    public static function setDeleteAllTblordenpaquete(){
	    
		$delete = "DELETE FROM tblordenpaquete ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}

///// FUNCIONES REFRENTE A TABLA tblpaquete
    
    /*Insertar un registro en tblpaquete*/
	 public static function setTblpaquete($nombrepaquete,$descripcion,$preciopaquete,$activado,$idtblmoduloventabp,$emailcreo){
        
        $insert ="INSERT INTO tblpaquete (tblpaquete_nombre,tblpaquete_descripcion,tblpaquete_precio,tblpaquete_activado,tblmoduloventabp_idtblmoduloventabp,tblpaquete_fchmodificacion,tblpaquete_fchcreacion,tblpaquete_emailusuacreo,tblpaquete_emailusuamodifico) VALUES (?,?,?,?,?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombrepaquete,PDO::PARAM_STR);
			$resultado->bindParam(2,$descripcion,PDO::PARAM_STR);
			$resultado->bindParam(3,$preciopaquete,PDO::PARAM_STR);
			$resultado->bindParam(4,$activado,PDO::PARAM_INT);
			$resultado->bindParam(5,$idtblmoduloventabp,PDO::PARAM_INT);
			$resultado->bindParam(6,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(7,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    } 
    
    /* Verifica que no exista un registro en tblpaquete */
    public static function setCheckTblpaquete($nombrepaquete,$idtblmoduloventabp){
        
        $check = "SELECT COUNT(*) FROM tblpaquete WHERE tblpaquete_nombre = ? AND tblmoduloventabp_idtblmoduloventabp = ? ";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$nombrepaquete,PDO::PARAM_STR);
			$resultado->bindParam(2,$idtblmoduloventabp,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
    }
    
    
    /*Actilizar un registro en tblpaquete*/
	 public static function setUpdateTblpaquete($idtblpaquete,$nombrepaquete,$descripcion,$preciopaquete,$activado,$idtblmoduloventabp,$emailmodifico){
        
        $update ="UPDATE tblpaquete SET tblpaquete_nombre = ?,tblpaquete_descripcion = ?,tblpaquete_precio = ?,tblpaquete_activado = ?,tblmoduloventabp_idtblmoduloventabp = ?,tblpaquete_fchmodificacion = NOW(),tblpaquete_emailusuamodifico = ? WHERE idtblpaquete = ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$nombrepaquete,PDO::PARAM_STR);
			$resultado->bindParam(2,$descripcion,PDO::PARAM_STR);
			$resultado->bindParam(3,$preciopaquete,PDO::PARAM_STR);
			$resultado->bindParam(4,$activado,PDO::PARAM_INT);
			$resultado->bindParam(5,$idtblmoduloventabp,PDO::PARAM_INT);
			$resultado->bindParam(6,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(7,$idtblpaquete,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    } 
    
    /*Obtiene un registro de tblpaquete*/
    public static function getTblpaquete($idtblpaquete){
	    
		$consulta = "SELECT * FROM tblpaquete WHERE idtblpaquete = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblpaquete,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene todos los  registro de tblpaquete*/
    public static function getAllTblpaquete(){
	    
		$consulta = "SELECT * FROM tblpaquete ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene todos los  registro de tblpaquete*/
    public static function getAllTblpaqueteAct(){
	    
	    $activado = 1;
		$consulta = "SELECT * FROM tblpaquete  WHERE tblpaquete_activado = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$activado,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina un registro de tblpaquete*/
    public static function setDeleteTblpaquete($idtblpaquete){
	    
		$delete = "DELETE FROM tblpaquete WHERE idtblpaquete = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblpaquete,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina todos los  registros de tblpaquete*/
    public static function setDeleteAllTblpaquete(){
	    
		$delete = "DELETE FROM tblpaquete";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
///// FUNCIONES REFRENTE A TABLA tblpreproveedor
    
    /*Insertar un registro en tblpreproveedor*/
	 public static function setTblpreproveedor($nombreusuarioproveedor,$srcidentificacion,$direccionusuario,$telefono1,$telefeno2,$email,$nombre,$direccion,$ciudad,$tipopedido,$hrasprovtienda,$hrasprovdom,$emailcreo){
        
        $insert ="INSERT INTO tblpreproveedor (tblpreproveedor_nombreusuarioproveedor,tblpreproveedor_srcimgidentificacion,tblpreproveedor_direccionusuarioproveedor,tblpreproveedor_telefonocontacto1,tblpreproveedor_telefonocontacto2,tblpreproveedor_email,tblpreproveedor_nombre,tblpreproveedor_direccion,tblpreproveedor_ciudad,tblpreproveedor_tipodepedido,tblpreproveedor_hrsprovtienda,tblpreproveedor_hrsprovdom,tblpreproveedor_fchmodificacion,tblpreproveedor_creacion,tblpreproveedor_emailusuacreo,tblpreproveedor_emailusuamodifico) VALUES (?,?,?,?,?,?,?,?,?,?,?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombreusuarioproveedor,PDO::PARAM_STR);
			$resultado->bindParam(2,$srcidentificacion,PDO::PARAM_STR);
			$resultado->bindParam(3,$direccionusuario,PDO::PARAM_STR);
			$resultado->bindParam(4,$telefono1,PDO::PARAM_STR);
			$resultado->bindParam(5,$telefeno2,PDO::PARAM_STR);
			$resultado->bindParam(6,$email,PDO::PARAM_STR);
			$resultado->bindParam(7,$nombre,PDO::PARAM_STR);
			$resultado->bindParam(8,$direccion,PDO::PARAM_STR);
			$resultado->bindParam(9,$ciudad,PDO::PARAM_STR);
			$resultado->bindParam(10,$tipopedido,PDO::PARAM_STR);
			$resultado->bindParam(11,$hrasprovtienda,PDO::PARAM_STR);
			$resultado->bindParam(12,$hrasprovdom,PDO::PARAM_STR);
			$resultado->bindParam(13,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(14,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /* Verifica que no exista un registro en tblpreproveedor */
    public static function setCheckTblpreproveedor($email){
        
        $check = "SELECT COUNT(*) FROM tblpreproveedor WHERE tblpreproveedor_email = ? ";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$email,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
    }
    
    
    /*Actulizar un registro en tblpreproveedor*/
	 public static function setUpdateTblpreproveedor($idtblpreproveedor,$nombreusuarioproveedor,$srcidentificacion,$direccionusuario,$telefono1,$telefeno2,$email,$nombre,$direccion,$ciudad,$tipopedido,$hrasprovtienda,$hrasprovdom,$emailmodifico){
        
        $update ="UPDATE tblpreproveedor  SET tblpreproveedor_nombreusuarioproveedor = ?,tblpreproveedor_srcimgidentificacion = ?,tblpreproveedor_direccionusuarioproveedor = ?,tblpreproveedor_telefonocontacto1 = ?,tblpreproveedor_telefonocontacto2 = ?,tblpreproveedor_email = ?,tblpreproveedor_nombre = ?,tblpreproveedor_direccion = ?,tblpreproveedor_ciudad = ?,tblpreproveedor_tipodepedido = ?,tblpreproveedor_hrsprovtienda = ?,tblpreproveedor_hrsprovdom = ?,tblpreproveedor_fchmodificacion = NOW(),tblpreproveedor_emailusuamodifico = ? WHERE  idtblpreproveedor= ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$nombreusuarioproveedor,PDO::PARAM_STR);
			$resultado->bindParam(2,$srcidentificacion,PDO::PARAM_STR);
			$resultado->bindParam(3,$direccionusuario,PDO::PARAM_STR);
			$resultado->bindParam(4,$telefono1,PDO::PARAM_STR);
			$resultado->bindParam(5,$telefeno2,PDO::PARAM_STR);
			$resultado->bindParam(6,$email,PDO::PARAM_STR);
			$resultado->bindParam(7,$nombre,PDO::PARAM_STR);
			$resultado->bindParam(8,$direccion,PDO::PARAM_STR);
			$resultado->bindParam(9,$ciudad,PDO::PARAM_STR);
			$resultado->bindParam(10,$tipopedido,PDO::PARAM_STR);
			$resultado->bindParam(11,$hrasprovtienda,PDO::PARAM_STR);
			$resultado->bindParam(12,$hrasprovdom,PDO::PARAM_STR);
			$resultado->bindParam(13,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(14,$idtblpreproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Obtiene un registro de tblpreproveedor*/
    public static function getTblpreproveedor($idtblpreproveedor){
	    
		$consulta = "SELECT * FROM tblpreproveedor WHERE idtblpreproveedor = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblpreproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
    /*Obtiene todos los registros de tblpreproveedor*/
    public static function getAllTblpreproveedor(){
	    
		$consulta = "SELECT * FROM tblpreproveedor ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Elimina un registro de tblpreproveedor*/
    public static function setDeleteTblpreproveedor($idtblpreproveedor){
	    
		$delete = "DELETE FROM tblpreproveedor WHERE idtblpreproveedor = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblpreproveedor,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Elimina un registro de tblpreproveedor*/
    public static function setDeleteAllTblpreproveedor(){
	    
		$delete = "DELETE FROM tblpreproveedor";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	
///// FUNCIONES REFRENTE A TABLA tblproductcotimg
    
    /*Insertar un registro en tblproductcotimg*/
	 public static function setTblproductcotimg($srcimg,$idtblproductcotizador,$emailcreo){
        
        $insert ="INSERT INTO tblproductcotimg (tblproductcotimg_srcimg,tblproductcotizador_idtblproductcotizador,tblproductcotimg_fchmodificacion,tblproductcotimg_fchcreacion,tblproductcotimg_emailusuacreo,tblproductcotimg_emailusuamodifico) VALUES (?,?,NOW(),NOW(),?,?)"; 	
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$srcimg,PDO::PARAM_STR);
			$resultado->bindParam(2,$idtblproductcotizador,PDO::PARAM_INT);
			$resultado->bindParam(3,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(4,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }

    /*Obtiene el Id un registro de tblproductimg*/
    public static function getTblproductcotimgIdtblproductcotimg($srcimg,$idtblproductcotimg,$emailcreo){
	    
		$consulta = "SELECT * FROM tblproductcotimg WHERE tblproductcotimg_srcimg = ? AND tblproductcotizador_idtblproductcotizador = ? AND tblproductcotimg_emailusuacreo = ? ORDER BY 	idtblproductcotimg DESC LIMIT 1";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$srcimg,PDO::PARAM_STR);
			$resultado->bindParam(2,$idtblproductcotimg,PDO::PARAM_INT);
			$resultado->bindParam(3,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
    
    
    /* Verifica que no exista un registro en tblproductcotimg */
    public static function setCheckTblproductcotimg($srcimg,$idtblproductcotizador){
        
        $check = "SELECT COUNT(*) FROM tblproductcotimg WHERE tblproductcotimg_srcimg = ? AND tblproductcotizador_idtblproductcotizador = ? ";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$srcimg,PDO::PARAM_STR);
			$resultado->bindParam(2,$idtblproductcotizador,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
    }
    
    
     /*Actualiza un registro en tblproductcotimg*/
	 public static function setUpdateTblproductcotimg($idtblproductcotimg,$srcimg,$idtblproductcotizador,$emailmodifico){
        
        $update ="UPDATE tblproductcotimg SET tblproductcotimg_srcimg = ?,tblproductcotizador_idtblproductcotizador = ?,tblproductcotimg_fchmodificacion = NOW(),tblproductcotimg_emailusuamodifico = ? WHERE idtblproductcotimg = ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$srcimg,PDO::PARAM_STR);
			$resultado->bindParam(2,$idtblproductcotizador,PDO::PARAM_INT);
			$resultado->bindParam(3,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(4,$idtblproductcotimg,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    
    /*Obtiene un registro de tblproductcotimg*/
    public static function getTblproductcotimg($idtblproductcotimg){
	    
		$consulta = "SELECT * FROM tblproductcotimg WHERE idtblproductcotimg = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproductcotimg,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene todo los  registro de tblproductcotimg de un producto del cotizador*/
    public static function getAllTblproductcotimg($idtblproductcotizador){
	    
		$consulta = "SELECT * FROM tblproductcotimg WHERE tblproductcotizador_idtblproductcotizador = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproductcotizador,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene todo los  registro de tblproductcotimg*/
    public static function getAllTblproductcotimg2(){
	    
		$consulta = "SELECT * FROM tblproductcotimg ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproductcotizador,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina un registro de tblproductcotimg*/
    public static function setDeleteTblproductcotimg($idtblproductcotimg){
	    
		$delete = "DELETE FROM tblproductcotimg WHERE idtblproductcotimg = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblproductcotimg,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina un registro de tblproductcotimg*/
    public static function setDeleteTblproductcotimgOfProducto($idtblproductcotizador){
	    
		$delete = "DELETE FROM tblproductcotimg WHERE tblproductcotizador_idtblproductcotizador = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblproductcotizador,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina toos los registroa de tblproductcotimg de un producto de cotizador */
    public static function setDeleteAllTblproductcotimg($idtblproductcotizador){
	    
		$delete = "DELETE FROM tblproductcotimg WHERE tblproductcotizador_idtblproductcotizador = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblproductcotizador,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina toos los registroa de tblproductcotimg */
    public static function setDeleteAllTblproductcotimg2(){
	    
		$delete = "DELETE FROM tblproductcotimg ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	
///// FUNCIONES REFRENTE A TABLA tblproductcotizador
    
    /*Insertar un registro en tblproductcotizador*/
	 public static function setTblproductcotizador($nombreproductcotizador,$descripcion,$ingrediente,$promcalificacion,$diaselaboracion,$activado,$idtblevento,$idtblproveedor,$emailcreo){
        
        $insert ="INSERT INTO tblproductcotizador (tblproductcotizador_nombre,tblproductcotizador_descripcion,tblproductcotizador_ingrediente,tblproductcotizador_promcalificacion,tblproductcotizador_diaselaboracion,tblproductcotizador_activado,tblevento_idtblevento,tblproveedor_idtblproveedor,tblproductcotizador_fchmodificacion,tblproductcotizador_fchcreacion,tblproductcotizador_emailusuacreo,tblproductcotizador_emailusuamodifico) VALUES (?,?,?,?,?,?,?,?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombreproductcotizador,PDO::PARAM_STR);
			$resultado->bindParam(2,$descripcion,PDO::PARAM_STR);
			$resultado->bindParam(3,$ingrediente,PDO::PARAM_STR);
			$resultado->bindParam(4,$promcalificacion,PDO::PARAM_STR);
			$resultado->bindParam(5,$diaselaboracion,PDO::PARAM_INT);
			$resultado->bindParam(6,$activado,PDO::PARAM_INT);
			$resultado->bindParam(7,$idtblevento,PDO::PARAM_INT);
			$resultado->bindParam(8,$idtblproveedor,PDO::PARAM_INT);
			$resultado->bindParam(9,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(10,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }	
    
    
     /* Verifica que no exista un registro en tblproductcotizador */
    public static function setCheckTblproductcotizador($nombreproductcotizador,$idtblevento,$idtblproveedor){
        
        $check = "SELECT COUNT(*) FROM tblproductcotizador WHERE tblproductcotizador_nombre = ? AND tblevento_idtblevento = ?  AND tblproveedor_idtblproveedor = ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$srcimg,PDO::PARAM_STR);
			$resultado->bindParam(2,$idtblevento,PDO::PARAM_INT);
			$resultado->bindParam(3,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
    }
	
	 /*Actualizar un registro en tblproductcotizador*/
	 public static function setUpdateTblproductcotizador($idtblproductcotizador,$nombreproductcotizador,$descripcion,$ingrediente,$promcalificacion,$diaselaboracion,$activado,$idtblevento,$idtblproveedor,$emailmodifico){
        
        $update ="UPDATE tblproductcotizador SET tblproductcotizador_nombre = ?,tblproductcotizador_descripcion = ? ,tblproductcotizador_ingrediente = ? ,tblproductcotizador_promcalificacion = ? ,tblproductcotizador_diaselaboracion = ? ,tblproductcotizador_activado = ? ,tblevento_idtblevento = ? ,tblproveedor_idtblproveedor = ? ,tblproductcotizador_fchmodificacion = NOW() ,tblproductcotizador_emailusuamodifico = ?  WHERE idtblproductcotizador = ? "; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$nombreproductcotizador,PDO::PARAM_STR);
			$resultado->bindParam(2,$descripcion,PDO::PARAM_STR);
			$resultado->bindParam(3,$ingrediente,PDO::PARAM_STR);
			$resultado->bindParam(4,$promcalificacion,PDO::PARAM_STR);
			$resultado->bindParam(5,$diaselaboracion,PDO::PARAM_INT);
			$resultado->bindParam(6,$activado,PDO::PARAM_INT);
			$resultado->bindParam(7,$idtblevento,PDO::PARAM_INT);
			$resultado->bindParam(8,$idtblproveedor,PDO::PARAM_INT);
			$resultado->bindParam(9,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(10,$idtblproductcotizador,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }	
    
    /*Obtiene un registro de tblproductcotizador*/
    public static function getTblproductcotizador($idtblproductcotizador){
	    
		$consulta = "SELECT * FROM tblproductcotizador WHERE idtblproductcotizador = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproductcotizador,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}

	/*Obtiene un id del registro de tblproductcotizador*/
    public static function getTblproductoCotizadorId($nombreproductcotizador, $descripcion,$ingrediente,$promcalificacion,$diaselaboracion,$activado,$idtblevento,$idtblproveedor,$emailcreo){
	    
		//$consulta = "SELECT * FROM tblproductcotizador WHERE idtblproductcotizador = ?";
		$consulta = "SELECT idtblproductcotizador FROM tblproductcotizador WHERE tblproductcotizador_nombre = ? AND tblproductcotizador_descripcion = ? AND tblproductcotizador_ingrediente = ? AND tblproductcotizador_promcalificacion = ? AND tblproductcotizador_diaselaboracion = ? AND tblproductcotizador_activado = ? AND tblevento_idtblevento = ? AND tblproveedor_idtblproveedor = ? AND tblproductcotizador_emailusuacreo = ? ORDER BY idtblproductcotizador DESC LIMIT 1";
		
		try{


			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$nombreproductcotizador,PDO::PARAM_STR);
			$resultado->bindParam(2,$descripcion,PDO::PARAM_STR);
			$resultado->bindParam(3,$ingrediente,PDO::PARAM_STR);
			$resultado->bindParam(4,$promcalificacion,PDO::PARAM_STR);
			$resultado->bindParam(5,$diaselaboracion,PDO::PARAM_INT);
			$resultado->bindParam(6,$activado,PDO::PARAM_INT);
			$resultado->bindParam(7,$idtblevento,PDO::PARAM_INT);
			$resultado->bindParam(8,$idtblproveedor,PDO::PARAM_INT);
			$resultado->bindParam(9,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene todos los registro de tblproductcotizador de un proveedor */
    public static function getAllTblproductcotizador($idtblproveedor){
	    
		$consulta = "SELECT * FROM tblproductcotizador WHERE tblproveedor_idtblproveedor = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene todos los registro de tblproductcotizador */
    public static function getAllTblproductcotizador2(){
	    
		$consulta = "SELECT * FROM tblproductcotizador";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
    
    /*Obtiene todos los registro de tblproductcotizador Activados */
    public static function getAllTblproductcotizadorAct(){
	    
	    $activado=1;
		$consulta = "SELECT * FROM tblproductcotizador WHERE tblproductcotizador_activado = ? ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$activado,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina toos los registro de tblproductcotizador */
    public static function setDeleteTblproductcotizador($idtblproductcotizador){
	    
		$delete = "DELETE FROM tblproductcotizador WHERE idtblproductcotizador = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblproductcotizador,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina toos los registro de tblproductcotizador de un proveedor  */
    public static function setDeleteAllTblproductcotizador($idtblproveedor){
	    
		$delete = "DELETE FROM tblproductcotizador WHERE  tblproveedor_idtblproveedor = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina toos los registro de tblproductcotizador */
    public static function setDeleteAllTblproductcotizador2(){
	    
		$delete = "DELETE FROM tblproductcotizador ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}

///// FUNCIONES REFRENTE A TABLA tblproveedorstatuspaquete
    
    /*Insertar un registro en tblproveedorstatuspaquete*/
	 public static function setTblproveedorstatuspaquete($diaspaquete,$diastranscurridos,$nummaxaltaproduct,$numaltaproduct,$nummaxaltaproductcomple,$numaltaproductcomple,$nummaxproductcot,$numproductcot,$idtblpaquete,$idtblproveedor,$emailcreo){
        
        $insert ="INSERT INTO tblproveedorstatuspaquete (tblproveedorstatuspaquete_diaspaquete,tblproveedorstatuspaquete_diastranscurridos,tblproveedorstatuspaquete_nummaxaltaproduct,tblproveedorstatuspaquete_numaltaproduct,tblproveedorstatuspaquete_nummaxproductcompl,tblproveedorstatuspaquete_numproductcompl,tblproveedorstatuspaquete_nummaxproductcot,tblproveedorstatuspaquete_numproductcot,tblpaquete_idtblpaquete,tblproveedor_idtblproveedor,tblproveedorstatuspaquete_fchmodificacion,tblproveedorstatuspaquete_fchcreacion,tblproveedorstatuspaquete_emailusuacreo,tblproveedorstatuspaquete_emailusuamodifico) VALUES (?,?,?,?,?,?,?,?,?,?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$diaspaquete,PDO::PARAM_INT);
			$resultado->bindParam(2,$diastranscurridos,PDO::PARAM_INT);
			$resultado->bindParam(3,$nummaxaltaproduct,PDO::PARAM_INT);
			$resultado->bindParam(4,$numaltaproduct,PDO::PARAM_INT);
			$resultado->bindParam(5,$nummaxaltaproductcomple,PDO::PARAM_INT);
			$resultado->bindParam(6,$numaltaproductcomple,PDO::PARAM_INT);
			$resultado->bindParam(7,$nummaxproductcot,PDO::PARAM_INT);
			$resultado->bindParam(8,$numproductcot,PDO::PARAM_INT);
			$resultado->bindParam(9,$idtblpaquete,PDO::PARAM_INT);
			$resultado->bindParam(10,$idtblproveedor,PDO::PARAM_INT);
			$resultado->bindParam(11,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(12,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }		
	
	
	 /* Verifica que no exista un registro en tblproveedorstatuspaquete */
    public static function setCheckTblproveedorstatuspaquete($idtblproveedor){
        
        $check = "SELECT COUNT(*) FROM tblproveedorstatuspaquete WHERE tblproveedor_idtblproveedor = ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
    }
    
    
    /*Actualiza un registro en tblproveedorstatuspaquete*/
	 public static function setUpdateTblproveedorstatuspaquete($idtblproveedorstatuspaquete,$diaspaquete,$diastranscurridos,$nummaxaltaproduct,$numaltaproduct,$nummaxaltaproductcomple,$numaltaproductcomple,$numproductcot,$idtblpaquete,$idtblproveedor,$emailmodifico){
        
        $update ="UPDATE tblproveedorstatuspaquete SET tblproveedorstatuspaquete_diaspaquete = ?,tblproveedorstatuspaquete_diastranscurridos= ?,tblproveedorstatuspaquete_nummaxaltaproduct= ? ,tblproveedorstatuspaquete_numaltaproduct= ?,tblproveedorstatuspaquete_nummaxproductcompl= ?,tblproveedorstatuspaquete_numproductcompl= ?,tblproveedorstatuspaquete_nummaxproductcot= ? ,tblproveedorstatuspaquete_numproductcot= ?,tblpaquete_idtblpaquete= ?,tblproveedor_idtblproveedor= ?,tblproveedorstatuspaquete_fchmodificacion= NOW(),tblproveedorstatuspaquete_emailusuamodifico= ? WHERE idtblproveedorstatuspaquete = ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$diaspaquete,PDO::PARAM_INT);
			$resultado->bindParam(2,$diastranscurridos,PDO::PARAM_INT);
			$resultado->bindParam(3,$nummaxaltaproduct,PDO::PARAM_INT);
			$resultado->bindParam(4,$numaltaproduct,PDO::PARAM_INT);
			$resultado->bindParam(5,$nummaxaltaproductcomple,PDO::PARAM_INT);
			$resultado->bindParam(6,$numaltaproductcomple,PDO::PARAM_INT);
			$resultado->bindParam(7,$nummaxproductcot,PDO::PARAM_INT);
			$resultado->bindParam(8,$numproductcot,PDO::PARAM_INT);
			$resultado->bindParam(9,$idtblpaquete,PDO::PARAM_INT);
			$resultado->bindParam(10,$idtblproveedor,PDO::PARAM_INT);
			$resultado->bindParam(11,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(12,$idtblproveedorstatuspaquete,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
    
    /*Obtiene un registro de tblproveedorstatuspaquete*/
    public static function getTblproveedorstatuspaquete($idtblproveedorstatuspaquete){
	    
		$consulta = "SELECT * FROM tblproveedorstatuspaquete WHERE idtblproveedorstatuspaquete = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproveedorstatuspaquete,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene un registro de tblproveedorstatuspaquete por proveedor */
    public static function getTblproveedorstatuspaquete2($idtblproveedor){
	    
		$consulta = "SELECT * FROM tblproveedorstatuspaquete WHERE tblproveedor_idtblproveedor= ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene todo los  registro de tblproveedorstatuspaquete */
    public static function getAllTblproveedorstatuspaquete(){
	    
		$consulta = "SELECT * FROM tblproveedorstatuspaquete ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Elimina  un registro de tblproveedorstatuspaquete */
    public static function setDeleteTblproveedorstatuspaquete($idtblproveedorstatuspaquete){
	    
		$delete = "DELETE FROM tblproveedorstatuspaquete WHERE idtblproveedorstatuspaquete = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idtblproveedorstatuspaquete,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}

	/*Elimina toos los registro de tblproveedorstatuspaquete */
    public static function setDeleteAllTblproveedorstatuspaquete(){
	    
		$delete = "DELETE FROM tblproveedorstatuspaquete";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}	
	
	
///OTRA FUNCIONES 
	/*Funcion para obtener datos sobre los pedidos pendiente*/
    public static function getAllTblordencompraByTbldatosenvioByTblentrega($idtblproveedor){
        
        $consulta = "SELECT TOC.*, TDE.*, TEP.* FROM tblordencompra TOC
        						INNER JOIN tbldatosenvio TDE ON TOC.idtblordencompra = TDE.tbldatosenvio_idtblordencompra 
        						INNER JOIN tblentregaproducto TEP ON TOC.idtblordencompra = TEP.tblentregaproducto_idtblordencompra
        						WHERE TEP.tblentregaproducto_idtblproveedor	= ?";
        
        try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
        
    }

    /*Funcion para obtener todas las ordenes */
    public static function getAllTblordencompraByTbldatosenvio($idtblproveedor){
        
        $consulta = "SELECT TOC.*, TDE.* FROM tblordencompra TOC
      		INNER JOIN tbldatosenvio TDE ON TOC.idtblordencompra = TDE.tbldatosenvio_idtblordencompra
      		INNER JOIN tblcarritoproduct TCP ON  TCP.tblcarritoproduct_idtblordencompra = TOC.idtblordencompra  
      		INNER JOIN tblproductdetalle TPD ON TPD.idtblproductdetalle = TCP.tblcarritoproduct_idtblproductdetalle
      		INNER JOIN tblproducto TP ON TP.idtblproducto = TPD.tblproducto_idtblproducto
      		WHERE TP.tblproveedor_idtblproveedor = ?
      		GROUP BY TOC.idtblordencompra ORDER BY TOC.idtblordencompra ASC";
        
        try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
        
    }

    /*Consultar un carritoproduct por idtblordencompra y proveedor */
	public static function getAllTblcarritoproductByTblordencompra($idtblordencompra,$idtblproveedor){
	    
		$consulta = "SELECT TCP.* FROM tblcarritoproduct TCP
       				  INNER JOIN tblordencompra TOC ON  TCP.tblcarritoproduct_idtblordencompra = TOC.idtblordencompra  
      				  INNER JOIN tblproductdetalle TPD ON TPD.idtblproductdetalle = TCP.tblcarritoproduct_idtblproductdetalle
      				  INNER JOIN tblproducto TP ON TP.idtblproducto = TPD.tblproducto_idtblproducto
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

	/*Consultar todos los reistrps de tblcarritoproduct  por idtblordencompra y proveedor */
	public static function getAllTblcarritoproductcomplemByTblordencompra($idtblordencompra,$idtblproveedor){
	    
		$consulta = "SELECT TCPC.* FROM tblcarritoproductcomplem TCPC
       		INNER JOIN tblordencompra TOC ON  TCPC.tblcarritoproductcomplem_idtblordencompra = TOC.idtblordencompra  
      		INNER JOIN tblproductcomplem TPC ON TPC.idtblproductcomplem = TCPC.tblcarritoproductcomplem_idtblproductcomplem
      		WHERE TCPC.tblcarritoproductcomplem_idtblordencompra = ? AND TPC.tblproveedor_idtblproveedor = ?";
		
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

	/*Verificar si existe un carrito de productcomplementario por ordendecompra*/
    public static function getCheckTblcarritoproductcomplemByTblordencompra($idtblordencompra){
        
		$check = "SELECT COUNT(*) FROM tblcarritoproductcomplem WHERE tblcarritoproductcomplem_idtblordencompra = ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$idtblordencompra,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(0); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
        
    }

    /* Funcion para obtener las ordenes de cotizaciones de proveedor por producto*/
    public static function getAllTblordenescotizadorByTblcarritocotizadorByTblproveedor($idtblproveedor){
        
	$consulta = "SELECT TOC.* , TCPC.* , TPC.* ,TE.* FROM tblordencotizador TOC
		   INNER JOIN tblcarritoproductcotizador TCPC ON TCPC.tblordencotizador_idtblordencotizador = TOC.idtblordencotizador
		   INNER JOIN tblproductcotizador TPC ON TCPC.tblproductcotizador_idtblproductcotizador = TPC.idtblproductcotizador
		   INNER JOIN tblevento TE ON TPC.tblevento_idtblevento = TE.idtblevento  
		     WHERE TPC.tblproveedor_idtblproveedor = ? 
		     ORDER BY TCPC.tblcarritoproductcotizador_costotienda";

        try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
    }

    /*Insertar un registro en tblcostocotizacionproductnuevo*/
	 public static function setTblcostocotizacionproductnuevo($costotienda,$costodomicilio,$idtblcarritoproductnuevcotiza,$idtblproveedor,$emailcreo,$idtblmotivocotizacion){
        
        $insert ="INSERT INTO tblcostocotizacionproductnuevo (tblcostocotizacionproductnuevo_costotienda,tblcostocotizacionproductnuevo_costodomicilio,tblcostocotizacionproductnuevo_fchmodificacion,tblcostocotizacionproductnuevo_fchcreacion,tblcostocotizacionproductnuevo_emailusuacreo,tblcostocotizacionproductnuevo_emailusuamodifico,tblcarritoproductnuevcotiza_idtblcarritoproductnuevcotiza,tblproveedor_idtblproveedor, tblmotivocotizacion_idtblmotivocotizacion) VALUES (?,?,NOW(),NOW(),?,?,?,?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$costotienda,PDO::PARAM_STR);
			$resultado->bindParam(2,$costodomicilio,PDO::PARAM_STR);
			$resultado->bindParam(3,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(4,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(5,$idtblcarritoproductnuevcotiza,PDO::PARAM_INT);
			$resultado->bindParam(6,$idtblproveedor,PDO::PARAM_INT);
			$resultado->bindParam(7,$idtblmotivocotizacion,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }

    /*Obtiene un registro de tblcostocotizacionproductnuevo*/
    public static function getTblcostocotizacionproductnuevo($idtblcarritoproductnuevcotiza,$idtblproveedor){
	    
		$consulta = "SELECT * FROM tblcostocotizacionproductnuevo WHERE tblcarritoproductnuevcotiza_idtblcarritoproductnuevcotiza = ? AND tblproveedor_idtblproveedor	 = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblcarritoproductnuevcotiza,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}

	/*Verifica si existe un registro en tblcostocotizacionproductnuevo  */
    public static function setCheckTblcostocotizacionproductnuevo($idtblcarritoproductnuevcotiza,$idtblproveedor){
        
        $check = "SELECT COUNT(*) FROM tblcostocotizacionproductnuevo WHERE tblcarritoproductnuevcotiza_idtblcarritoproductnuevcotiza = ? AND tblproveedor_idtblproveedor= ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$idtblcarritoproductnuevcotiza,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(0); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
        
    }

	/*Insertar un registro en tblnotificacion*/
	public static function setTblnotificacion1($tipo,$asunto,$mensaje,$emisor,$emailcreo,$idredireccion){
        
        $insert ="INSERT INTO tblnotificacion (tblnotificacion_tipo, tblnotificacion_asunto,tblnotificacion_mensaje,tblnotificacion_emisor,tblnotificacion_fchmodificacion,tblnotificacion_fchcreacion,tblnotificacion_emailusuacreo,tblnotificacion_emailusuamodifico, tblnotificacionredireccion_idtblnotificacionredireccion) VALUES (?,?,?,?,NOW(),NOW(),?,?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$tipo,PDO::PARAM_INT);
			$resultado->bindParam(2,$asunto,PDO::PARAM_STR);
			$resultado->bindParam(3,$mensaje,PDO::PARAM_STR);
			$resultado->bindParam(4,$emisor,PDO::PARAM_STR);
			$resultado->bindParam(5,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(6,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(7,$idredireccion,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }

    /*Obtiene todos los  registro de tblnotificacion */
    public static function getAllTblnotificacion(){
	    
		$consulta = " SELECT * FROM tblnotificacion ORDER BY tblnotificacion_fchcreacion ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}

	/*Insertar un registro en tblnotificacionvista*/
	public static function setTblnotificacionvista($destino,$status,$emailcreo,$idtblnotificacion){

      $insert ="INSERT INTO tblnotificacionvista (tblnotificacionvista_destino,tblnotificacionvista_status,tblnotificacionvista_fchmodificacion,tblnotificacionvista_fchcreacion,tblnotificacionvista_emailusuacreacion,tblnotificacionvista_emailusuamodifico,tblnotificacion_idtblnotificacion) VALUES (?,?,NOW(),NOW(),?,?,?)"; 
       
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$destino,PDO::PARAM_STR);
			$resultado->bindParam(2,$status,PDO::PARAM_STR);
			$resultado->bindParam(3,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(4,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(5,$idtblnotificacion,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }

    /*Obtiene todos los  registro de tblnotificacionvisto */
    public static function getTblnotificacionvistobyTblnotificacion($idtblnotificacion){
	    
		$consulta = " SELECT * FROM tblnotificacionvista WHERE tblnotificacion_idtblnotificacion = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblnotificacion,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}

	/*Obtiene todos los  registro de tblnotificacion y tblnotificacionvisto by destinatario*/
    public static function getAllTblnotificacionbyTblnotificacionvista($idproveedor){
	    
		$consulta = " SELECT TN.* , TNV.* FROM tblnotificacion TN 
					INNER JOIN tblnotificacionvista TNV ON TNV.tblnotificacion_idtblnotificacion = TN.idtblnotificacion WHERE TNV.tblnotificacionvista_destino = ? ORDER BY TNV.tblnotificacionvista_status, TN.tblnotificacion_fchcreacion DESC";  
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}

	/*Actualiza un registro en tblnotificacionvista*/
	 public static function setUpdateTblnotificacionvista($idtblnotificacionvista,$emailproveedor){
        
        $status = 1;
        $insert ="UPDATE tblnotificacionvista SET tblnotificacionvista_status = ?, tblnotificacionvista_fchmodificacion= NOW(), tblnotificacionvista_emailusuamodifico =? WHERE idtblnotificacionvista = ? "; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$status,PDO::PARAM_INT);
			$resultado->bindParam(2,$emailproveedor,PDO::PARAM_STR);
			$resultado->bindParam(3,$idtblnotificacionvista,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }

 //FUNCIONES DE tblmotivocotizacion
	public static function getTblmotivocotizacion($idtblmotivocotizacion){
	    
		$consulta = " SELECT * FROM tblmotivocotizacion WHERE idtblmotivocotizacion = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblmotivocotizacion,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	} 


	public static function getAllTblmotivocotizacion(){
	    
		$consulta = " SELECT * FROM tblmotivocotizacion";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	} 

    /*Funcion para contar las ordenes hechas en el año */
    public static function getNumeroOrdenes($idtblproveedor){
        
         $consulta = "SELECT * FROM tblordencompra TOC
      		INNER JOIN tbldatosenvio TDE ON TOC.idtblordencompra = TDE.tbldatosenvio_idtblordencompra
      		INNER JOIN tblcarritoproduct TCP ON  TCP.tblcarritoproduct_idtblordencompra = TOC.idtblordencompra  
      		INNER JOIN tblproductdetalle TPD ON TPD.idtblproductdetalle = TCP.tblcarritoproduct_idtblproductdetalle
      		INNER JOIN tblproducto TP ON TP.idtblproducto = TPD.tblproducto_idtblproducto
      		WHERE TP.tblproveedor_idtblproveedor = ?
      		GROUP BY TOC.idtblordencompra ";
        
        try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
        
    }

    /*Funcion para contar las cotizaciones de sus productos hechas en el año */
    public static function getNumeroCotizaciones($idtblproveedor){
        
        $consulta = "SELECT COUNT(*) FROM tblordencotizador TOC
		   INNER JOIN tblcarritoproductcotizador TCPC ON TCPC.tblordencotizador_idtblordencotizador = TOC.idtblordencotizador
		   INNER JOIN tblproductcotizador TPC ON TCPC.tblproductcotizador_idtblproductcotizador = TPC.idtblproductcotizador
		   INNER JOIN tblevento TE ON TPC.tblevento_idtblevento = TE.idtblevento  
		     WHERE TPC.tblproveedor_idtblproveedor = ?";
        
        try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(0); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
        
    }

    /*Funcion para contar las cotizaciones de sus productos hechas en el año */
    public static function getNumeroCotizacionesNuevos(){
        
        $consulta = "SELECT COUNT(*) FROM tblcarritoproductnuevcotiza";
        
        try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchColumn(0); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
        
    }

    /*Funcion para obtener registros para numero de ventas  */
    public static function getNumeroVentas($idproveedor){

	$status = "ENTREGADO";
        
        $consulta = "SELECT * FROM tblordencompra TOC
      		INNER JOIN tblcarritoproduct TCP ON  TCP.tblcarritoproduct_idtblordencompra = TOC.idtblordencompra  
      		INNER JOIN tblproductdetalle TPD ON TPD.idtblproductdetalle = TCP.tblcarritoproduct_idtblproductdetalle
      		INNER JOIN tblproducto TP ON TP.idtblproducto = TPD.tblproducto_idtblproducto
      		INNER JOIN tblentregaproducto TEP ON TOC.idtblordencompra = TEP.tblentregaproducto_idtblordencompra
      		WHERE TP.tblproveedor_idtblproveedor = ?  AND TEP.tblentregaproducto_status = ? ";
        
        try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idproveedor,PDO::PARAM_INT);
			$resultado->bindParam(2,$status,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
        
    }

     /*Funcion para obtener registros para numero de ventas productos complementarios*/
    public static function getNumeroVentasComplementarios($idproveedor){

    	$status = "ENTREGADO";
        
        $consulta = "SELECT * FROM tblordencompra TOC
        			 INNER JOIN tblentregaproducto TEP ON TOC.idtblordencompra = TEP.tblentregaproducto_idtblordencompra
        			 INNER JOIN tblcarritoproductcomplem TCPC ON TOC.idtblordencompra =TCPC.tblcarritoproductcomplem_idtblordencompra
        			 WHERE TEP.tblentregaproducto_idtblproveedor	= ? AND TEP.tblentregaproducto_status = ? ";
        
        try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idproveedor,PDO::PARAM_INT);
			$resultado->bindParam(2,$status,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
        
    }

    /*Obtiene todos los  registro de tblfotografo */
    public static function getAllTblfotografobyTblciudad($idtblciudad){
	    
		$consulta = " SELECT * FROM tblfotografo WHERE tblciudad_idtblciudad = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblciudad,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}

	//FUNCIONES PARA tblfotografocatologo	 
	public static function getAllTblfotografocatalogobyTblfotografo($idtblfotografo){
	    
		$consulta = " SELECT * FROM tblfotografocatalogo WHERE tblfotografo_idtblfotografo = ? ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblfotografo,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}

	/*Obtiene todos los registro de tblusuarioproveedor por proveedor */
    public static function getAllTblusuarioproveedorbyTblproveedor($idtblproveedor){
	    
		$consulta = "SELECT * FROM tblusuarioproveedor WHERE tblproveedor_idtblproveedor =? ";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}

	/* Funcion para obtener las ordenes de cotizaciones de proveedor por producto*/
    public static function getTblordenescotizadorByTblcarritocotizador($idtblordencotizador, $idtblcarritoproductcotizador){
        
	$consulta = "SELECT * FROM tblordencotizador TOC
		   INNER JOIN tblcarritoproductcotizador TCPC ON TCPC.tblordencotizador_idtblordencotizador = TOC.idtblordencotizador
		   INNER JOIN tblproductcotizador TPC ON TCPC.tblproductcotizador_idtblproductcotizador = TPC.idtblproductcotizador
		   INNER JOIN tblevento TE ON TPC.tblevento_idtblevento = TE.idtblevento  
		     WHERE TOC.idtblordencotizador= ? AND TCPC.idtblcarritoproductcotizador = ?";

        try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblordencotizador,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblcarritoproductcotizador,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
    }
  

    /*Funcion para obtener todos los paises dependiendo de un pais */
    public static function getTblciudadByTblpais($idtblpais){
        
        $activado = 1;
        $consulta = "SELECT TCs.* FROM tblciudad TCs
        						INNER JOIN tblpais TPs ON TCs.tblpais_idtblpais = TPs.idtblpais 
        						WHERE TCs.tblpais_idtblpais = ? 
        						AND TPs.tblpais_activado = ?
        						AND TCs.tblciudad_activado = ?";
        
        try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblpais,PDO::PARAM_INT);
			$resultado->bindParam(2,$activado,PDO::PARAM_INT);
			$resultado->bindParam(3,$activado,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
    }

    /*Funcion Especifica para obtener la direccion del proveedor */
    public static function getTblproveedordireccion($idtblproveedor){

    	$consulta = "SELECT TPR.tblproveedor_nombre,TPR.tblproveedor_direccion, TCL.tblcolonia_nombre , TC.tblciudad_nombre,TP.tblpais_nombre FROM tblproveedor TPR
				INNER JOIN tblcolonia TCL on TPR.tblcolonia_idtblcolonia = TCL.idtblcolonia
    			INNER JOIN tblciudad TC on TCL.tblciudad_idtblciudad = TC.idtblciudad
    			INNER JOIN tblpais TP on TC.tblpais_idtblpais = TP.idtblpais
    			WHERE TPR.idtblproveedor = ?";
        
        try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}

    }


    
    
    /*Consulta las Colonias (depende de la ciudad, el tipo de servicio y los dias de pedido)*/
    public static function getTblcoloniaByTblproveedor($idtblciudad,$idtbltipodeservicio,$fechapedido,$codipost){

    	date_default_timezone_set("America/Monterrey");
        $activado=1;
        $fechapedidoingresada = new DateTime($fechapedido);
        $fechahoy = new DateTime(date("d-m-Y"));
        $interval= $fechahoy->diff($fechapedidoingresada);
  		$diasMinimos= $interval->format('%d');
  		
  		$diasemana= $fechapedidoingresada->format('l');

  		
  		$tipopedidoCompleto=3;
        $tipodeservicioCompleto=3;
        

       if($fechapedidoingresada == $fechahoy)
       { 
            $tipodepedido= 1; //pedidoparahoy
            $stock=1;
       	}else
       	{
       		$tipodepedido= 2; //pedidoparaotrodia
       		$stock=0;
       	}
        
        
        if($idtbltipodeservicio==1){ //Entrega en Pasteleria
            $consulta = "SELECT TC.* FROM tblcolonia TC
			INNER JOIN tblproveedor TP ON TC.idtblcolonia = TP.tblcolonia_idtblcolonia 
			INNER JOIN tblproducto TPR ON TPR.tblproveedor_idtblproveedor = TP.idtblproveedor 
			INNER JOIN tblproductdetalle TPRD ON TPR.idtblproducto = TPRD.tblproducto_idtblproducto 
            INNER JOIN tbldiaprovservicio TDP ON TDP.tblproveedor_idtblproveedor = TP.idtblproveedor
            INNER JOIN tbldiasemana TDS ON TDS.idtbldiasemana = TDP.tbldiasemana_idtbldiasemana
			    WHERE TC.tblciudad_idtblciudad = ?		
                	AND TP.tblproveedor_activado = ?
                	AND TPR.tblproducto_activado = ?
                	AND (TP.tbltiposervicio_idtbltiposervicio = ? OR TP.tbltiposervicio_idtbltiposervicio = ? ) 
                	AND TPRD.tblproductdetalle_activado = ?
                	AND TPRD.tblproductdetalle_stock >= ?
                	AND TPRD.tblproductdetalle_diaselaboracion <= ?
                    AND TDS.tbldiasemana_dia = ?
                	GROUP BY TC.idtblcolonia";
					    
			try{
			    $resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			    $resultado->bindParam(1,$idtblciudad,PDO::PARAM_INT);
			    $resultado->bindParam(2,$activado,PDO::PARAM_INT);
			    $resultado->bindParam(3,$activado,PDO::PARAM_INT);
			    $resultado->bindParam(4,$idtbltipodeservicio,PDO::PARAM_INT);
			    $resultado->bindParam(5,$tipodeservicioCompleto,PDO::PARAM_INT);
			    $resultado->bindParam(6,$activado,PDO::PARAM_INT);
			    $resultado->bindParam(7,$stock,PDO::PARAM_INT);
			    $resultado->bindParam(8,$diasMinimos,PDO::PARAM_INT);
			    $resultado->bindParam(9,$diasemana,PDO::PARAM_STR);
			    $resultado->execute();
			    return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro
			    } catch(PDOException $e){
			        return false;
			        
			    }
        
            
        }else {//Entrega en Domicilio
            $consulta = "SELECT TC.* FROM tblcolonia TC, tblproveedor TP 
                                        INNER JOIN tblcoloniaprovservicio TCPS ON TP.idtblproveedor = TCPS.tblproveedor_idtblproveedor
				                        INNER JOIN tblproducto TPR ON TPR.tblproveedor_idtblproveedor = TP.idtblproveedor 
				                        INNER JOIN tblproductdetalle TPRD ON TPR.idtblproducto = TPRD.tblproducto_idtblproducto
                                        INNER JOIN tbldiaprovservicio TDP ON TDP.tblproveedor_idtblproveedor = TP.idtblproveedor
                                        INNER JOIN tbldiasemana TDS ON TDS.idtbldiasemana = TDP.tbldiasemana_idtbldiasemana 
			                        WHERE TC.tblciudad_idtblciudad = ?
										 AND TC.idtblcolonia = TCPS.tblcolonia_idtblcolonia	
                				         AND TP.tblproveedor_activado = ?
                				         AND TPR.tblproducto_activado = ?
                				         AND TPRD.tblproductdetalle_activado = ?
                				         AND TPRD.tblproductdetalle_stock >= ?
                				         AND TPRD.tblproductdetalle_diaselaboracion <= ?
                				         AND TDS.tbldiasemana_dia = ?
				                         AND TC.tblcolonia_codipost = ?
					                GROUP BY TC.idtblcolonia";	 
					    
			try{
			    $resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			    $resultado->bindParam(1,$idtblciudad,PDO::PARAM_INT);
			    $resultado->bindParam(2,$activado,PDO::PARAM_INT);
			    $resultado->bindParam(3,$activado,PDO::PARAM_INT);
			    $resultado->bindParam(4,$activado,PDO::PARAM_INT);
			    $resultado->bindParam(5,$stock,PDO::PARAM_INT);
			    $resultado->bindParam(6,$diasMinimos,PDO::PARAM_INT);
			    $resultado->bindParam(7,$diasemana,PDO::PARAM_STR);
			    $resultado->bindParam(8,$codipost,PDO::PARAM_INT);
			    $resultado->execute();
			    return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro
			} catch(PDOException $e){
			        return false;      
        	}            
        }									
    }
    
    /*Consulta las Horas (depende de la colona, el tipo de servicio y los dias de pedido)*/
    public static function getTblhorasByTblProveedor($idtblcolonia,$idtbltipodeservicio,$fechapedido){
                
        date_default_timezone_set("America/Monterrey");
        $activado=1;
        $fechapedidoingresada = new DateTime($fechapedido);
        $fechahoy = new DateTime(date("d-m-Y"));
        $interval= $fechahoy->diff($fechapedidoingresada);
  		$diasMinimos= $interval->format('%d');
  		
  		$diasemana= $fechapedidoingresada->format('l');
  		
  		$tipopedidoCompleto=3;
        $tipodeservicioCompleto=3;
        
        $timefinal = date("H:i:s");
	    $nuevotime = strtotime('+1 hour', strtotime($timefinal));
		$nuevotime = date("H:i:s", $nuevotime);
        
        
       if($fechapedidoingresada == $fechahoy){ 
            $tipodepedido= 1; //pedidoparahoy
            $stock=1;
       	}else{
       		$tipodepedido= 2; //pedidoparaotrodia
       		$stock=0;
       	}

           	
       	
       	if($idtbltipodeservicio==1){ //Entrega en Pasteleria 
       	
       	    if($tipodepedido==1){ // Caso para hoy (Regresa las horas entre el horario de las pastelerias mayores a la hora actual)
       	        
       	        $consulta = " SELECT THs.* FROM tblhora THs , tblproveedor TP  
        		  INNER JOIN tblhrsprovtienda TTP ON TTP.tblproveedor_idtblproveedor = TP.idtblproveedor	
        		  INNER JOIN tblhraabre TA ON TTP.tblhraabre_idtblhraabre = TA.idtblhraabre
                  INNER JOIN tblhracierra TC ON TTP.tblhracierra_idtblhracierra = TC.idtblhracierra
                  INNER JOIN tblcolonia TCL ON TP.tblcolonia_idtblcolonia = TCL.idtblcolonia 
        		  INNER JOIN tblproducto TPR ON TPR.tblproveedor_idtblproveedor = TP.idtblproveedor 
        		  INNER JOIN tblproductdetalle TPRD ON TPR.idtblproducto = TPRD.tblproducto_idtblproducto
                  INNER JOIN tbldiaprovservicio TDP ON TDP.tblproveedor_idtblproveedor = TP.idtblproveedor
                  INNER JOIN tbldiasemana TDS ON TDS.idtbldiasemana = TDP.tbldiasemana_idtbldiasemana
                  INNER JOIN tblhora THa ON THa.idtblhora = TA.tblhora_idtblhora
                  INNER JOIN tblhora THc ON THc.idtblhora = TC.tblhora_idtblhora 
                WHERE THs.tblhora_hora > CAST( ? AS TIME)
                  AND THs.tblhora_hora BETWEEN THa.tblhora_hora AND THc.tblhora_hora
                  AND TCL.idtblcolonia = ?    
		          AND TP.tblproveedor_activado = ?
		          AND TPR.tblproducto_activado = ? 
	              AND TPRD.tblproductdetalle_activado = ?		          
		          AND TPRD.tblproductdetalle_stock >= ?
		          AND TPRD.tblproductdetalle_diaselaboracion <= ?
		          AND TDS.tbldiasemana_dia = ?
                GROUP BY THs.tblhora_hora ASC";
                try{
    			    $resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
    			    $resultado->bindParam(1,$nuevotime,PDO::PARAM_STR);
    			    $resultado->bindParam(2,$idtblcolonia,PDO::PARAM_INT);
    			    $resultado->bindParam(3,$activado,PDO::PARAM_INT);
    			    $resultado->bindParam(4,$activado,PDO::PARAM_INT);
    			    $resultado->bindParam(5,$activado,PDO::PARAM_INT);
    			    $resultado->bindParam(6,$stock,PDO::PARAM_INT);
    			    $resultado->bindParam(7,$diasMinimos,PDO::PARAM_INT);
    			    $resultado->bindParam(8,$diasemana,PDO::PARAM_STR);
    			    $resultado->execute();
    			    return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro
			       } catch(PDOException $e){
			        return false;      
        	       }
                
       	        
       	        
       	    }else {// Caso para otro día (Regresa las horas entre el horario de las pastelerias)
       	    
       	            $consulta = " SELECT THs.* FROM tblhora THs , tblproveedor TP  
	        		  INNER JOIN tblhrsprovtienda TTP ON TTP.tblproveedor_idtblproveedor = TP.idtblproveedor
	        		  INNER JOIN tblhraabre TA ON TTP.tblhraabre_idtblhraabre = TA.idtblhraabre
	                  INNER JOIN tblhracierra TC ON TTP.tblhracierra_idtblhracierra = TC.idtblhracierra
	                  INNER JOIN tblcolonia TCL ON TP.tblcolonia_idtblcolonia = TCL.idtblcolonia 
	        		  INNER JOIN tblproducto TPR ON TPR.tblproveedor_idtblproveedor = TP.idtblproveedor 
	        		  INNER JOIN tblproductdetalle TPRD ON TPR.idtblproducto = TPRD.tblproducto_idtblproducto
	                  INNER JOIN tbldiaprovservicio TDP ON TDP.tblproveedor_idtblproveedor = TP.idtblproveedor
	                  INNER JOIN tbldiasemana TDS ON TDS.idtbldiasemana = TDP.tbldiasemana_idtbldiasemana
                  	  INNER JOIN tblhora THa ON THa.idtblhora = TA.tblhora_idtblhora
                  	  INNER JOIN tblhora THc ON THc.idtblhora = TC.tblhora_idtblhora 
	                WHERE  TCL.idtblcolonia = ?    
			          AND TP.tblproveedor_activado = ?
			          AND TPR.tblproducto_activado = ? 
			          AND TPRD.tblproductdetalle_activado = ?
			          AND TPRD.tblproductdetalle_stock >= ?
			          AND TPRD.tblproductdetalle_diaselaboracion <= ?
			          AND TDS.tbldiasemana_dia = ?
			          AND THs.tblhora_hora BETWEEN THa.tblhora_hora AND THc.tblhora_hora
	                GROUP BY THs.tblhora_hora ASC";
                try{
    			    $resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
    			    $resultado->bindParam(1,$idtblcolonia,PDO::PARAM_INT);
    			    $resultado->bindParam(2,$activado,PDO::PARAM_INT);
    			    $resultado->bindParam(3,$activado,PDO::PARAM_INT);
    			    $resultado->bindParam(4,$activado,PDO::PARAM_INT);
    			    $resultado->bindParam(5,$stock,PDO::PARAM_INT);
    			    $resultado->bindParam(6,$diasMinimos,PDO::PARAM_INT);
    			    $resultado->bindParam(7,$diasemana,PDO::PARAM_STR);
    			    $resultado->execute();
    			    return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro
			       } catch(PDOException $e){
			        return false;      
        	       }
       	    }
       	
       	}
        else {//Entrega en Domicilio 
        
            if($tipodepedido==1){ // Caso para hoy (Regresa las horas de servicio a domicilio mayores a la hora actual)
            
            
                    $consulta= "SELECT THs.*  FROM tblhora THs  
	    			  INNER JOIN tblhrsprovdom THPS ON THs.idtblhora = THPS.tblhora_idtblhora
	                  INNER JOIN tblproveedor TP ON THPS.tblproveedor_idtblproveedor = TP.idtblproveedor
	                  INNER JOIN tblcoloniaprovservicio TCPS ON TCPS.tblproveedor_idtblproveedor = TP.idtblproveedor
	                  INNER JOIN tblproducto TPR ON TPR.tblproveedor_idtblproveedor = TP.idtblproveedor 
	    			  INNER JOIN tblproductdetalle TPRD ON TPR.idtblproducto = TPRD.tblproducto_idtblproducto
	                  INNER JOIN tbldiaprovservicio TDP ON TDP.tblproveedor_idtblproveedor = TP.idtblproveedor
	                  INNER JOIN tbldiasemana TDS ON TDS.idtbldiasemana = TDP.tbldiasemana_idtbldiasemana  
	              WHERE THs.tblhora_hora > CAST(? AS TIME)
	                AND TCPS.tblcolonia_idtblcolonia = ?
		            AND TP.tblproveedor_activado = ?
		            AND TPR.tblproducto_activado = ? 
		            AND TPRD.tblproductdetalle_activado = ?
		            AND TPRD.tblproductdetalle_stock >= ?
		            AND TPRD.tblproductdetalle_diaselaboracion <= ?
		            AND TDS.tbldiasemana_dia = ?
	              GROUP BY THs.tblhora_hora ASC ";
			         try{
        			    $resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
        			    $resultado->bindParam(1,$nuevotime,PDO::PARAM_STR);
        			    $resultado->bindParam(2,$idtblcolonia,PDO::PARAM_INT);
        			    $resultado->bindParam(3,$activado,PDO::PARAM_INT);
        			    $resultado->bindParam(4,$activado,PDO::PARAM_INT);
        			    $resultado->bindParam(5,$activado,PDO::PARAM_INT);
        			    $resultado->bindParam(6,$stock,PDO::PARAM_INT);
        			    $resultado->bindParam(7,$diasMinimos,PDO::PARAM_INT);
        			    $resultado->bindParam(8,$diasemana,PDO::PARAM_STR);
        			    $resultado->execute();
        			    return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro
			       } catch(PDOException $e){
			        return false;      
        	       }
            
            
            }else { // Caso para otro dia (Regresa las horas de servicio a domicilio)
            
                    $consulta= "SELECT THs.*  FROM tblhora THs  
                                    			  INNER JOIN tblhrsprovdom THPS ON THs.idtblhora = THPS.tblhora_idtblhora
                                                  INNER JOIN tblproveedor TP ON THPS.tblproveedor_idtblproveedor = TP.idtblproveedor
                                                  INNER JOIN tblcoloniaprovservicio TCPS ON TCPS.tblproveedor_idtblproveedor = TP.idtblproveedor
                                                  INNER JOIN tblproducto TPR ON TPR.tblproveedor_idtblproveedor = TP.idtblproveedor 
                                    			  INNER JOIN tblproductdetalle TPRD ON TPR.idtblproducto = TPRD.tblproducto_idtblproducto
                                                  INNER JOIN tbldiaprovservicio TDP ON TDP.tblproveedor_idtblproveedor = TP.idtblproveedor
                                                  INNER JOIN tbldiasemana TDS ON TDS.idtbldiasemana = TDP.tbldiasemana_idtbldiasemana  
                                              WHERE TCPS.tblcolonia_idtblcolonia = ?
                    				            AND TP.tblproveedor_activado = ?
                    				            AND TPR.tblproducto_activado = ?
                    				            AND TPRD.tblproductdetalle_activado = ?
                    				            AND TPRD.tblproductdetalle_stock >= ?
                    				            AND TPRD.tblproductdetalle_diaselaboracion <= ?
                    				            AND TDS.tbldiasemana_dia = ?
			                                  GROUP BY THs.tblhora_hora";
			         try{
        			    $resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
        			    $resultado->bindParam(1,$idtblcolonia,PDO::PARAM_INT);
        			    $resultado->bindParam(2,$activado,PDO::PARAM_INT);
        			    $resultado->bindParam(3,$activado,PDO::PARAM_INT);
        			    $resultado->bindParam(4,$activado,PDO::PARAM_INT);
        			    $resultado->bindParam(5,$stock,PDO::PARAM_INT);
        			    $resultado->bindParam(6,$diasMinimos,PDO::PARAM_INT);
        			    $resultado->bindParam(7,$diasemana,PDO::PARAM_STR);
        			    $resultado->execute();
        			    return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro
			       } catch(PDOException $e){
			        return false;      
        	       }
                
            }
            
        }
        
    }
    
    
    /*Consulta los productos dependiendo de su categoria,clasificacion y el ingrediente mas aparte los ids del filtro */
    public static function getTblproductoByFiltros($idtblcolonia,$idtbltipodeservicio,$fechapedido,$hora,$idtblcategproduct,$idtblclasifproduct,$ingrediente){
        
        $activado=1;
        
        $fechapedidoingresada = new DateTime($fechapedido);
        $fechahoy = new DateTime("now");
        $interval= $fechahoy->diff($fechapedidoingresada);
        $diasMinimos= $interval->format('%d');
        
        $diasemana= $fechapedidoingresada->format('l');
        
        $tipopedidoCompleto=3;
        $tipodeservicioCompleto=3;
        
        
       if($fechapedidoingresada == $fechahoy){ 
            $tipodepedido= 1; //pedidoparahoy
            $stock=1;
        }else{
            $tipodepedido= 2; //pedidoparaotrodia
            $stock=0;
        }
        
        
        if($idtbltipodeservicio==1){ //Entrega en Pasteleria
            
            $consulta = "SELECT TPR.*, TPI.* FROM tblproducto TPR
                                             INNER JOIN tblproveedor TP ON TP.idtblproveedor = TPR.tblproveedor_idtblproveedor
                                             INNER JOIN tblproductdetalle TPRD ON TPRD.tblproducto_idtblproducto = TPR.idtblproducto
                                             INNER JOIN tblcategproduct TCP ON TCP.idtblcategproduct = TPR.tblcategproduct_idtblcategproduct
                                             INNER JOIN tblclasifproduct TCLP ON TCLP.idtblclasifproduct = TPR.tblclasifproduct_idtblclasifproduct
                                             INNER JOIN tblhrsprovtienda THP ON THP.tblproveedor_idtblproveedor = TP.idtblproveedor
                                             INNER JOIN tbldiaprovservicio TDP ON TDP.tblproveedor_idtblproveedor = TP.idtblproveedor
                                             INNER JOIN tbldiasemana TDS ON TDS.idtbldiasemana = TDP.tbldiasemana_idtbldiasemana
                                             INNER JOIN tblhraabre TA ON THP.tblhraabre_idtblhraabre = TA.idtblhraabre
                                             INNER JOIN tblhracierra TC ON THP.tblhracierra_idtblhracierra = TC.idtblhracierra
                                             INNER JOIN tblhora THa ON THa.idtblhora = TA.tblhora_idtblhora 
                                             INNER JOIN tblhora THc ON THc.idtblhora = TC.tblhora_idtblhora
                                             INNER JOIN tblproductimg TPI ON TPI.tblproducto_idtblproducto = TPR.idtblproducto
                                             WHERE TP.tblproveedor_activado = ?  
                                             AND TP.tblcolonia_idtblcolonia = ?
                                             AND TPR.tblproducto_activado = ?
                                             AND TCP.tblcategproduct_activado = ?
                                             AND TCLP.tblclasifproduct_activado = ?
                                             AND TPR.tblcategproduct_idtblcategproduct = ?
                                             AND TPR.tblclasifproduct_idtblclasifproduct= ?
                                             AND TPRD.tblproductdetalle_activado = ?
                                             AND TPRD.tblproductdetalle_stock >= ?
                                             AND TPRD.tblproductdetalle_diaselaboracion <= ?
                                             AND TPRD.tblespecificingrediente_idtblespecificingrediente = ?
                                             AND TDS.tbldiasemana_dia = ?
                                             AND CAST(? AS TIME ) BETWEEN THa.tblhora_hora AND THc.tblhora_hora
                                             GROUP BY TPR.idtblproducto";
            try{
                        $resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
                        $resultado->bindParam(1,$activado,PDO::PARAM_INT);
                        $resultado->bindParam(2,$idtblcolonia,PDO::PARAM_INT);
                        $resultado->bindParam(3,$activado,PDO::PARAM_INT);
                        $resultado->bindParam(4,$activado,PDO::PARAM_INT);
                        $resultado->bindParam(5,$activado,PDO::PARAM_INT);
                        $resultado->bindParam(6,$idtblcategproduct,PDO::PARAM_INT);
                        $resultado->bindParam(7,$idtblclasifproduct,PDO::PARAM_INT);
                        $resultado->bindParam(8,$activado,PDO::PARAM_INT);
                        $resultado->bindParam(9,$stock,PDO::PARAM_INT);
                        $resultado->bindParam(10,$diasMinimos,PDO::PARAM_INT);
                        $resultado->bindParam(11,$ingrediente,PDO::PARAM_INT);
                        $resultado->bindParam(12,$diasemana,PDO::PARAM_STR);
                        $resultado->bindParam(13,$hora,PDO::PARAM_STR);
                        $resultado->execute();
                        return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro
                   } catch(PDOException $e){
                    return false;      
                   }
        
        } else{//Entrega en Domicilio
        
        
             $consulta="SELECT TPR.*, PRI.* FROM tblproducto TPR
                                         INNER JOIN tblproveedor TP ON TP.idtblproveedor = TPR.tblproveedor_idtblproveedor
                                         INNER JOIN tblproductdetalle TPRD ON TPRD.tblproducto_idtblproducto = TPR.idtblproducto
                                         INNER JOIN tblcategproduct TCP ON TCP.idtblcategproduct = TPR.tblcategproduct_idtblcategproduct
                                         INNER JOIN tblclasifproduct TCLP ON TCLP.idtblclasifproduct = TPR.tblclasifproduct_idtblclasifproduct
                                         INNER JOIN tblcoloniaprovservicio TCPS ON TCPS.tblproveedor_idtblproveedor = TP.idtblproveedor
                                         INNER JOIN tblhrsprovdom THS ON THS.tblproveedor_idtblproveedor = TP.idtblproveedor
                                         INNER JOIN tbldiaprovservicio TDP ON TDP.tblproveedor_idtblproveedor = TP.idtblproveedor
                                         INNER JOIN tbldiasemana TDS ON TDS.idtbldiasemana = TDP.tbldiasemana_idtbldiasemana
                                         INNER JOIN tblhora TH ON TH.idtblhora = THS.tblhora_idtblhora
                                         INNER JOIN tblproductimg TPI ON TPI.tblproducto_idtblproducto = TPR.idtblproducto
                                      WHERE TP.tblproveedor_activado = ?  
                                         AND TCPS.tblcolonia_idtblcolonia=?
                                         AND TH.tblhora_hora = ?
                                         AND TPR.tblproducto_activado = ?
                                         AND TCP.tblcategproduct_activado = ?
                                         AND TCLP.tblclasifproduct_activado = ?
                                         AND TPR.tblcategproduct_idtblcategproduct = ?
                                         AND TPR.tblclasifproduct_idtblclasifproduct= ?             
                                         AND TPRD.tblproductdetalle_activado = ?
                                         AND TPRD.tblproductdetalle_stock >= ?
                                         AND TPRD.tblproductdetalle_diaselaboracion <= ?
                                         AND TPRD.tblespecificingrediente_idtblespecificingrediente = ?
                                         AND TDS.tbldiasemana_dia = ?
                                       GROUP BY TPR.idtblproducto";
            try{
                        $resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
                        $resultado->bindParam(1,$activado,PDO::PARAM_INT);
                        $resultado->bindParam(2,$idtblcolonia,PDO::PARAM_INT);
                        $resultado->bindParam(3,$hora,PDO::PARAM_STR);
                        $resultado->bindParam(4,$activado,PDO::PARAM_INT);
                        $resultado->bindParam(5,$activado,PDO::PARAM_INT);
                        $resultado->bindParam(6,$activado,PDO::PARAM_INT);
                        $resultado->bindParam(7,$idtblcategproduct,PDO::PARAM_INT);
                        $resultado->bindParam(8,$idtblclasifproduct,PDO::PARAM_INT);
                        $resultado->bindParam(9,$activado,PDO::PARAM_INT);
                        $resultado->bindParam(10,$stock,PDO::PARAM_INT);
                        $resultado->bindParam(11,$diasMinimos,PDO::PARAM_INT);
                        $resultado->bindParam(12,$ingrediente,PDO::PARAM_INT);
                        $resultado->bindParam(13,$diasemana,PDO::PARAM_STR);
                        $resultado->execute();
                        return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro
                   } catch(PDOException $e){
                    return false;      
                   }
        
        }
        
    }
    
    //obtiene los productos todos por categoria y clasificacion de cuerdo al filtro
    public static function getTblproductoByFiltrosAll($idtblcolonia,$idtbltipodeservicio,$fechapedido,$hora,$idtblcategproduct,$idtblclasifproduct){
        
        $activado=1;
        
        $fechapedidoingresada = new DateTime($fechapedido);
        $fechahoy = new DateTime("now");
        $interval= $fechahoy->diff($fechapedidoingresada);
        $diasMinimos= $interval->format('%d');
        
        $diasemana= $fechapedidoingresada->format('l');
        
        $tipopedidoCompleto=3;
        $tipodeservicioCompleto=3;
        
        
       if($fechapedidoingresada == $fechahoy){ 
            $tipodepedido= 1; //pedidoparahoy
            $stock=1;
        }else{
            $tipodepedido= 2; //pedidoparaotrodia
            $stock=0;
        }
        
        
        if($idtbltipodeservicio==1){ //Entrega en Pasteleria
            
            $consulta = "SELECT TPR.*,TP.*,TPI.*, TPRD.* FROM tblproducto TPR
		             INNER JOIN tblproveedor TP ON TP.idtblproveedor = TPR.tblproveedor_idtblproveedor
		             INNER JOIN tblproductdetalle TPRD ON TPRD.tblproducto_idtblproducto = TPR.idtblproducto
		             INNER JOIN tblcategproduct TCP ON TCP.idtblcategproduct = TPR.tblcategproduct_idtblcategproduct
		             INNER JOIN tblclasifproduct TCLP ON TCLP.idtblclasifproduct = TPR.tblclasifproduct_idtblclasifproduct
		             INNER JOIN tblhrsprovtienda THP ON THP.tblproveedor_idtblproveedor = TP.idtblproveedor
		             INNER JOIN tbldiaprovservicio TDP ON TDP.tblproveedor_idtblproveedor = TP.idtblproveedor
		             INNER JOIN tbldiasemana TDS ON TDS.idtbldiasemana = TDP.tbldiasemana_idtbldiasemana
		             INNER JOIN tblhraabre TA ON THP.tblhraabre_idtblhraabre = TA.idtblhraabre
		             INNER JOIN tblhracierra TC ON THP.tblhracierra_idtblhracierra = TC.idtblhracierra
		             INNER JOIN tblhora THa ON THa.idtblhora = TA.tblhora_idtblhora 
		             INNER JOIN tblhora THc ON THc.idtblhora = TC.tblhora_idtblhora
		             INNER JOIN tblproductimg TPI ON TPI.tblproducto_idtblproducto = TPR.idtblproducto
		             WHERE TP.tblproveedor_activado = ?
		             	AND (TP.tbltiposervicio_idtbltiposervicio = ? OR TP.tbltiposervicio_idtbltiposervicio = ? )  
			             AND TP.tblcolonia_idtblcolonia = ?
			             AND TPR.tblproducto_activado = ?
			             AND TCLP.tblclasifproduct_activado = ?
			             AND TPR.tblcategproduct_idtblcategproduct = ?
			             AND TPR.tblclasifproduct_idtblclasifproduct= ?
			             AND TPRD.tblproductdetalle_activado = ?
			             AND TPRD.tblproductdetalle_stock >= ?
			             AND TPRD.tblproductdetalle_diaselaboracion <= ?
			             AND TDS.tbldiasemana_dia = ?
			             AND CAST(? AS TIME ) BETWEEN THa.tblhora_hora AND THc.tblhora_hora
			             GROUP BY TPR.idtblproducto";
            try{
                        $resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
                        $resultado->bindParam(1,$activado,PDO::PARAM_INT);
                        $resultado->bindParam(2,$idtbltipodeservicio,PDO::PARAM_INT);
                        $resultado->bindParam(3,$tipodeservicioCompleto,PDO::PARAM_INT);
                        $resultado->bindParam(4,$idtblcolonia,PDO::PARAM_INT);
                        $resultado->bindParam(5,$activado,PDO::PARAM_INT);
                        $resultado->bindParam(6,$activado,PDO::PARAM_INT);
                        $resultado->bindParam(7,$idtblcategproduct,PDO::PARAM_INT);
                        $resultado->bindParam(8,$idtblclasifproduct,PDO::PARAM_INT);
                        $resultado->bindParam(9,$activado,PDO::PARAM_INT);
                        $resultado->bindParam(10,$stock,PDO::PARAM_INT);
                        $resultado->bindParam(11,$diasMinimos,PDO::PARAM_INT);
                        $resultado->bindParam(12,$diasemana,PDO::PARAM_STR);
                        $resultado->bindParam(13,$hora,PDO::PARAM_STR);
                        $resultado->execute();
                        return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro
                   } catch(PDOException $e){
                    return false;      
                   }
        
        }else{//Entrega en Domicilio
        
        
             $consulta="SELECT TPR.*, TP.* ,TPI.*,TPRD.* FROM tblproducto TPR
	            INNER JOIN tblproveedor TP ON TP.idtblproveedor = TPR.tblproveedor_idtblproveedor
	            INNER JOIN tblproductdetalle TPRD ON TPRD.tblproducto_idtblproducto = TPR.idtblproducto
	            INNER JOIN tblcategproduct TCP ON TCP.idtblcategproduct = TPR.tblcategproduct_idtblcategproduct
	            INNER JOIN tblclasifproduct TCLP ON TCLP.idtblclasifproduct = TPR.tblclasifproduct_idtblclasifproduct
	            INNER JOIN tbldiaprovservicio TDP ON TDP.tblproveedor_idtblproveedor = TP.idtblproveedor
	            INNER JOIN tbldiasemana TDS ON TDS.idtbldiasemana = TDP.tbldiasemana_idtbldiasemana
	            INNER JOIN tblproductimg TPI ON TPI.tblproducto_idtblproducto = TPR.idtblproducto
	                WHERE TP.tblproveedor_activado = ? 
                        AND TPR.tblproducto_activado = ?
                        AND TCLP.tblclasifproduct_activado = ?
                        AND TPR.tblcategproduct_idtblcategproduct = ?
                        AND TPR.tblclasifproduct_idtblclasifproduct= ?
                        AND TPRD.tblproductdetalle_activado = ?
                        AND TPRD.tblproductdetalle_stock >= ?
                        AND TPRD.tblproductdetalle_diaselaboracion <= ?
                        AND TDS.tbldiasemana_dia = ?
                    GROUP BY TPR.idtblproducto";
            try{
                        $resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
                        $resultado->bindParam(1,$activado,PDO::PARAM_INT);
                        $resultado->bindParam(2,$activado,PDO::PARAM_INT);
                        $resultado->bindParam(3,$activado,PDO::PARAM_INT);
                        $resultado->bindParam(4,$idtblcategproduct,PDO::PARAM_INT);
                        $resultado->bindParam(5,$idtblclasifproduct,PDO::PARAM_INT);
                        $resultado->bindParam(6,$activado,PDO::PARAM_INT);
                        $resultado->bindParam(7,$stock,PDO::PARAM_INT);
                        $resultado->bindParam(8,$diasMinimos,PDO::PARAM_INT);
                        $resultado->bindParam(9,$diasemana,PDO::PARAM_STR);
                        $resultado->execute();
                        return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro
                   } catch(PDOException $e){
                    return false;      
                   }
        
        }
        
    }
    
    
    
    public static function getFecha(){
        $zona = new DateTimeZone('America/Monterrey');
        $fechahoy= new DateTime();
        $fechahoy->setTimezone($zona);
        $fechafinal=$fechahoy->format('Y/m/d');
        return $fechafinal;
        
    }

    //Funcion para el control de rango de horarios
    public static function getRangoshorarios($fechapedido){

		$arrayCompleto=[];
		$arrayRango1 = [
		                "idRango" => '1',
		                "idtblhora_menor" => '1',
		                "tblhora_menor"=>'9:00',
		                "idtblhora_mayor" => '4',
		                "tblhora_mayor"=>'12:00',		                
		                "rango_hora" => '9:00 a 12:00'
		                ];  
		

		$arrayRango2 = [
		                "idRango" => '2',
		                "idtblhora_menor" => '4',
		                "tblhora_menor"=>'12:00',
		                "idtblhora_mayor" => '7',
		                "tblhora_mayor"=>'15:00',		                
		                "rango_hora" => '12:00 a 15:00'
		                ];  
		

		$arrayRango3 = [
		                "idRango" => '3',
		                "idtblhora_menor" => '7',
		                "tblhora_menor"=>'15:00',
		                "idtblhora_mayor" => '10',
		                "tblhora_mayor"=>'18:00',		                
		                "rango_hora" => '15:00 a 18:00'
		                ];  
		

		$arrayRango4 = [
		                "idRango" => '4',
		                "idtblhora_menor" => '10',
		                "tblhora_menor"=>'18:00',
		                "idtblhora_mayor" => '13',
		                "tblhora_mayor"=>'21:00',		                
		                "rango_hora" => '18:00 a 21:00'
		                ];  
		

		date_default_timezone_set("America/Monterrey");
        $fechapedidoingresada = new DateTime($fechapedido);
        $fechahoy = new DateTime(date("d-m-Y"));


        if($fechapedidoingresada == $fechahoy){ 
            $tipodepedido= 1; //pedidoparahoy
        }else{
            $tipodepedido= 2; //pedidoparaotrodia
        }

        if($tipodepedido==1){

        	$timefinal = date("H:i");

			if($timefinal>='00:00' && $timefinal<'09:00'){
				array_push($arrayCompleto,$arrayRango1);
        		array_push($arrayCompleto,$arrayRango2);
        		array_push($arrayCompleto,$arrayRango3);
        		array_push($arrayCompleto,$arrayRango4);

			}
			else if($timefinal>='09:00' && $timefinal<'12:00'){
				
        		array_push($arrayCompleto,$arrayRango2);
        		array_push($arrayCompleto,$arrayRango3);
        		array_push($arrayCompleto,$arrayRango4);

			}
			else if($timefinal>='12:00' && $timefinal<'15:00'){ 

        		array_push($arrayCompleto,$arrayRango3);
        		array_push($arrayCompleto,$arrayRango4);
			
			}
			else if($timefinal>='15:00' && $timefinal<'18:00'){ 

        		array_push($arrayCompleto,$arrayRango4);
			
			}else{}
        	

        }else {
        	array_push($arrayCompleto,$arrayRango1);
        	array_push($arrayCompleto,$arrayRango2);
        	array_push($arrayCompleto,$arrayRango3);
        	array_push($arrayCompleto,$arrayRango4);
        }

    	return $resultado=$arrayCompleto;
    }


     //Obtener informacion del producto y del proveedor 
    public static function getTblproductoAndTblproveedor($idtblproduct){

    	$consulta = "SELECT TP.*,TPV.*,THa.tblhora_hora as tblhoraabre,THc.tblhora_hora as tblhoracierra    FROM tblproducto TP 
				INNER JOIN tblproveedor TPV ON TPV.idtblproveedor = TP.tblproveedor_idtblproveedor
				INNER JOIN tblhrsprovtienda THP ON THP.tblproveedor_idtblproveedor = TPV.idtblproveedor
	     		INNER JOIN tblhraabre TA ON THP.tblhraabre_idtblhraabre = TA.idtblhraabre
	     		INNER JOIN tblhracierra TC ON THP.tblhracierra_idtblhracierra = TC.idtblhracierra
	     		INNER JOIN tblhora THa ON THa.idtblhora = TA.tblhora_idtblhora 
	     		INNER JOIN tblhora THc ON THc.idtblhora = TC.tblhora_idtblhora
					WHERE TP.idtblproducto = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproduct,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
    }


    //obtiene los detalles de un producto 
    public static function getTblproductoDetalleByTblproducto($idtblproduct){

    	$consulta = "SELECT * FROM tblproductdetalle WHERE tblproducto_idtblproducto = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproduct,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
    }

    //obtiene las imagenes de un producto 
    public static function getTblproductImgByTblproducto($idtblproduct){

    	$consulta = "SELECT * FROM tblproductimg WHERE tblproducto_idtblproducto = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproduct,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
    }

    //funcion especifica para actualizar stock
    public static function setUpdateStockTblproductdetalle($idtblproductdetalle,$cantidad,$casoAddDiss){

    	if($casoAddDiss==1){

    		$update ="UPDATE tblproductdetalle SET tblproductdetalle_stock = tblproductdetalle_stock+ (?)  WHERE idtblproductdetalle = ? ";

    	}else {

    		$update ="UPDATE tblproductdetalle SET tblproductdetalle_stock = tblproductdetalle_stock-(?)  WHERE idtblproductdetalle = ? ";

    	}

    	 try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$cantidad,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblproductdetalle,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}

    }


    //Funcion especifica para actualizar la cantidad de un producto
    public static function setUpdateTblcarritoproductCantidad($casoAddDiss,$cantidad,$emailmodifico, $idtblordencompra,$idtblproductdetalle){

    	if($casoAddDiss==1){ //Caso cuando se aumente la cantidad 

    		$update = "UPDATE tblcarritoproduct SET tblcarritoproduct_cantidad = tblcarritoproduct_cantidad +(?),tblcarritoproduct_fchmodificacion = NOW(),tblcarritoproduct_emailusuamodifico = ? WHERE tblcarritoproduct_idtblordencompra = ? AND tblcarritoproduct_idtblproductdetalle = ?";

    	}else { //Casi cuando se disminuya la cantidad

    		$update = "UPDATE tblcarritoproduct SET tblcarritoproduct_cantidad = tblcarritoproduct_cantidad -(?),tblcarritoproduct_fchmodificacion = NOW(),tblcarritoproduct_emailusuamodifico = ? WHERE tblcarritoproduct_idtblordencompra = ? AND tblcarritoproduct_idtblproductdetalle = ?";

    	}

		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$cantidad,PDO::PARAM_INT);
			$resultado->bindParam(2,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(3,$idtblordencompra,PDO::PARAM_INT);
			$resultado->bindParam(4,$idtblproductdetalle,PDO::PARAM_INT);
			
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el update
		}catch(PDOException $e){
			return false;
		}

    
     }


    /*Consultar un todos los carritoproduct por idtblordencompra */
	public static function getAllTblcarritoproductByTblordencompra2($idtblordencompra){
	    
		$consulta = "SELECT TCP.*, TPD.*, TP.*,TPI.* FROM tblcarritoproduct TCP
       				  INNER JOIN tblordencompra TOC ON TCP.tblcarritoproduct_idtblordencompra = TOC.idtblordencompra  
      				  INNER JOIN tblproductdetalle TPD ON TPD.idtblproductdetalle = TCP.tblcarritoproduct_idtblproductdetalle
      				  INNER JOIN tblproducto TP ON TP.idtblproducto = TPD.tblproducto_idtblproducto
      				  INNER JOIN tblproductimg TPI ON TP.idtblproducto = TPI.tblproducto_idtblproducto
      				  WHERE TCP.tblcarritoproduct_idtblordencompra = ? 
      				  GROUP BY TCP.idtblcarritoproduct";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblordencompra,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}



	/*
    TCPC: tblcarritoporductcomplem
    TPC: tblproductcomplem
    Funcion que se encarga de llevar a cabo el agregar y/o actualiza TCPC y TPC
    */
    public static function setTCPCsetUpdateTCPCAndsetUpdateTPC($tipodepedido,$cantidad,$nombreproductcom,$nombreproveedor,$precioreal,$preciobp,$emailcreo,$idtblordencompra,$idtblproductcomplem){

    	$conexionPDO = ConexionDB::getInstance()->getDb(); 

      	if($tipodepedido==1){ //CASO PARA HOY 

			//Verificamos el stock para comparar con la cantidad añadir 
	    	$consultaStock= "SELECT * FROM tblproductcomplem WHERE idtblproductcomplem = ?";
			$resultado = $conexionPDO->prepare($consultaStock);
			$resultado->bindParam(1,$idtblproductcomplem,PDO::PARAM_INT);
			$resultado->execute();
			$registro = $resultado->fetchAll(PDO::FETCH_ASSOC);
			
			//obtiene el stock del productocomplem
			foreach ($registro as $row) {$stock = $row['tblproductcomplem_stock'];} 
    		
			if($cantidad<=$stock){

				//consulta para identificar si exite el carrito o no 
	    		$consulta = "SELECT * FROM tblcarritoproductcomplem TCPC WHERE TCPC.tblcarritoproductcomplem_idtblordencompra = ? AND TCPC.tblcarritoproductcomplem_idtblproductcomplem = ?";
		    	$resultado = $conexionPDO->prepare($consulta);
				$resultado->bindParam(1,$idtblordencompra,PDO::PARAM_INT);
				$resultado->bindParam(2,$idtblproductcomplem,PDO::PARAM_INT);
				$resultado->execute();
				$existeCarrito = $resultado->rowCount();

				if($existeCarrito>0){ //Se actualizara carrito y el stock del productocomplem con el trigger

	    			$trigger = 
	    				"DROP TRIGGER IF EXISTS actualizarstockUpdate".";".
	    				"CREATE TRIGGER actualizarstockUpdate BEFORE UPDATE ON tblcarritoproductcomplem FOR EACH ROW UPDATE tblproductcomplem  TPC SET TPC.tblproductcomplem_stock = TPC.tblproductcomplem_stock-?, TPC.tblproductcomplem_fchmodificacion =NOW(), TPC.tblproductcomplem_emailusuamodifico = NEW.tblcarritoproductcomplem_emailusuamodifico WHERE TPC.idtblproductcomplem = NEW.tblcarritoproductcomplem_idtblproductcomplem";
	    			$resultado = $conexionPDO->prepare($trigger);
	    			$resultado->bindParam(1,$cantidad,PDO::PARAM_INT);
	    			$resultado->execute();

	    			$update = "UPDATE tblcarritoproductcomplem SET tblcarritoproductcomplem_cantidad = tblcarritoproductcomplem_cantidad + ? , tblcarritoproductcomplem_fchmodificacion = NOW(), tblcarritoproductcomplem_emailusuamodifico = ? 
	    				WHERE tblcarritoproductcomplem_idtblordencompra = ? AND tblcarritoproductcomplem_idtblproductcomplem = ?";

	    			$resultado = $conexionPDO->prepare($update);
					$resultado->bindParam(1,$cantidad,PDO::PARAM_INT);
					$resultado->bindParam(2,$emailcreo,PDO::PARAM_STR);
					$resultado->bindParam(3,$idtblordencompra,PDO::PARAM_INT);
					$resultado->bindParam(4,$idtblproductcomplem,PDO::PARAM_INT);
					$resultado->execute();	

	    			return $resultado->rowCount();

    			}else{ //se crea carrito y se actualiza stock del producto con trigger 
	    			$trigger = "DROP TRIGGER IF EXISTS actualizarstock".";".
	    				"CREATE TRIGGER actualizarstock BEFORE INSERT ON tblcarritoproductcomplem FOR EACH ROW UPDATE tblproductcomplem TPC SET TPC.tblproductcomplem_stock = TPC.tblproductcomplem_stock-(NEW.tblcarritoproductcomplem_cantidad), TPC.tblproductcomplem_fchmodificacion =NOW(), TPC.tblproductcomplem_emailusuamodifico = NEW.tblcarritoproductcomplem_emailusuamodifico WHERE TPC.idtblproductcomplem = NEW.tblcarritoproductcomplem_idtblproductcomplem";
	    			$resultado = $conexionPDO->prepare($trigger);
	    			$resultado->execute();

	    			$insertUpdate =    				
	    				"INSERT INTO tblcarritoproductcomplem (tblcarritoproductcomplem_cantidad, tblcarritoproductcomplem_nombreproducto,	tblcarritoproductcomplem_nombreproveedor,tblcarritoproductcomplem_precioreal,
	    					tblcarritoproductcomplem_preciobp,tblcarritoproductcomplem_fchmodificacion,tblcarritoproductcomplem_fchcreacion,tblcarritoproductcomplem_emailusuacreo, tblcarritoproductcomplem_emailusuamodifico,tblcarritoproductcomplem_idtblordencompra,tblcarritoproductcomplem_idtblproductcomplem) VALUES(?,?,?,?,?,NOW(),NOW(),?,?,?,?)";

	    			$resultado = $conexionPDO->prepare($insertUpdate);
					$resultado->bindParam(1,$cantidad,PDO::PARAM_INT);
					$resultado->bindParam(2,$nombreproductcom,PDO::PARAM_STR);
					$resultado->bindParam(3,$nombreproveedor,PDO::PARAM_STR);
					$resultado->bindParam(4,$precioreal,PDO::PARAM_STR);
					$resultado->bindParam(5,$preciobp,PDO::PARAM_STR);
					$resultado->bindParam(6,$emailcreo,PDO::PARAM_STR);
					$resultado->bindParam(7,$emailcreo,PDO::PARAM_STR);
					$resultado->bindParam(8,$idtblordencompra,PDO::PARAM_INT);
					$resultado->bindParam(9,$idtblproductcomplem,PDO::PARAM_INT);
					$resultado->execute();

					return $resultado->rowCount();
    			}
			}
			else{
				return "2";//regresara un valor 2 para saber que el stock es menor que la cantidad a ingresa
			}
    	}else{//CASO SOBREPEDIDO

    		//consulta para identificar si exite el carrito o no 
    		$consulta = "SELECT * FROM tblcarritoproductcomplem TCPC WHERE TCPC.tblcarritoproductcomplem_idtblordencompra = ? AND TCPC.tblcarritoproductcomplem_idtblproductcomplem = ?";
	    	$resultado = $conexionPDO->prepare($consulta);
			$resultado->bindParam(1,$idtblordencompra,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblproductcomplem,PDO::PARAM_INT);
			$resultado->execute();
			$existeCarrito = $resultado->rowCount();

    		if($existeCarrito>0){  //actualiza la cantidad del carrito
    			//Se elimina el trigger para no actualizar el stock
    			$triggerEliminar= "DROP TRIGGER IF EXISTS actualizarstockUpdate";
    			$resultado = $conexionPDO->prepare($triggerEliminar);
    			$resultado->execute();	

    			$update = "UPDATE tblcarritoproductcomplem SET tblcarritoproductcomplem_cantidad = tblcarritoproductcomplem_cantidad + ? , tblcarritoproductcomplem_fchmodificacion = NOW(), tblcarritoproductcomplem_emailusuamodifico = ? 
    				WHERE tblcarritoproductcomplem_idtblordencompra = ? AND tblcarritoproductcomplem_idtblproductcomplem = ? ";

    			$resultado = $conexionPDO->prepare($update);
				$resultado->bindParam(1,$cantidad,PDO::PARAM_INT);
				$resultado->bindParam(2,$emailcreo,PDO::PARAM_STR);
				$resultado->bindParam(3,$idtblordencompra,PDO::PARAM_INT);
				$resultado->bindParam(4,$idtblproductcomplem,PDO::PARAM_INT);
				$resultado->execute();	

    			return $resultado->rowCount();

				
    		}else{ //creo

    			//Se elimina el trigger para no actualizar el stock
    			$triggerEliminar= "DROP TRIGGER IF EXISTS actualizarstock";
    			$resultado = $conexionPDO->prepare($triggerEliminar);
    			$resultado->execute();

    			$insertUpdate = "INSERT INTO tblcarritoproductcomplem (tblcarritoproductcomplem_cantidad, tblcarritoproductcomplem_nombreproducto,	tblcarritoproductcomplem_nombreproveedor,tblcarritoproductcomplem_precioreal,
    					tblcarritoproductcomplem_preciobp,tblcarritoproductcomplem_fchmodificacion,tblcarritoproductcomplem_fchcreacion,tblcarritoproductcomplem_emailusuacreo, tblcarritoproductcomplem_emailusuamodifico,tblcarritoproductcomplem_idtblordencompra,tblcarritoproductcomplem_idtblproductcomplem) VALUES(?,?,?,?,?,NOW(),NOW(),?,?,?,?)";

    			$resultado = $conexionPDO->prepare($insertUpdate);
				$resultado->bindParam(1,$cantidad,PDO::PARAM_INT);
				$resultado->bindParam(2,$nombreproductcom,PDO::PARAM_STR);
				$resultado->bindParam(3,$nombreproveedor,PDO::PARAM_STR);
				$resultado->bindParam(4,$precioreal,PDO::PARAM_STR);
				$resultado->bindParam(5,$preciobp,PDO::PARAM_STR);
				$resultado->bindParam(6,$emailcreo,PDO::PARAM_STR);
				$resultado->bindParam(7,$emailcreo,PDO::PARAM_STR);
				$resultado->bindParam(8,$idtblordencompra,PDO::PARAM_INT);
				$resultado->bindParam(9,$idtblproductcomplem,PDO::PARAM_INT);
				$resultado->execute();

				return $resultado->rowCount();	
    		}
    	}
    } 


    /*Consultar todos los reistros de tblcarritoproductcomplem  por idtblordencompra*/
	public static function getAllTblcarritoproductcomplemByTblordencompra2($idtblordencompra){
	    
		$consulta = "SELECT * FROM tblcarritoproductcomplem TCPC
				INNER JOIN tblproductcomplem TPC ON TPC.idtblproductcomplem = TCPC.tblcarritoproductcomplem_idtblproductcomplem
      		WHERE TCPC.tblcarritoproductcomplem_idtblordencompra = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblordencompra,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}


	/*
    TCP: tblcarritoproduct
    TP: tblproductdetalle
    Funcion que se encarga de llevar a cabo el agregar y/o actualiza TCPC y TPC
    */
    public static function setTCPsetUpdateTCPAndsetUpdateTP($tipodepedido,$cantidad,$nombreproduct,$nombreproveedor,$precioreal,$preciobp,$personalizar,$msjtarjeta,$calif,$emailcreo,$idtblordencompra,$idtblproductdetalle){

    	$conexionPDO = ConexionDB::getInstance()->getDb(); 

      	if($tipodepedido==1){ //CASO PARA HOY 

			//Verificamos el stock para comparar con la cantidad añadir 
	    	$consultaStock= "SELECT * FROM tblproductdetalle WHERE idtblproductdetalle = ?";
			$resultado = $conexionPDO->prepare($consultaStock);
			$resultado->bindParam(1,$idtblproductdetalle,PDO::PARAM_INT);
			$resultado->execute();
			$registro = $resultado->fetchAll(PDO::FETCH_ASSOC);
			
			//obtiene el stock del productocomplem
			foreach ($registro as $row) {$stock = $row['tblproductdetalle_stock'];} 
    		
			if($cantidad<=$stock){

				//consulta para identificar si exite el carrito o no 
	    		$consulta = "SELECT * FROM tblcarritoproduct TCP WHERE TCP.tblcarritoproduct_idtblordencompra = ? AND TCP.tblcarritoproduct_idtblproductdetalle = ?";
		    	$resultado = $conexionPDO->prepare($consulta);
				$resultado->bindParam(1,$idtblordencompra,PDO::PARAM_INT);
				$resultado->bindParam(2,$idtblproductdetalle,PDO::PARAM_INT);
				$resultado->execute();
				$existeCarrito = $resultado->rowCount();

				if($existeCarrito>0){ //Se actualizara carrito y el stock del productocomplem con el trigger

	    			$trigger = 
	    				"DROP TRIGGER IF EXISTS actualizarstocProductkUpdate".";".
	    				"CREATE TRIGGER actualizarstocProductkUpdate BEFORE UPDATE ON tblcarritoproduct FOR EACH ROW UPDATE tblproductdetalle  TPD SET TPD.tblproductdetalle_stock = TPD.tblproductdetalle_stock-?, TPD.tblproductdetalle_fchmodificacion =NOW(), TPD.tblproductdetalle_emailusuamodifico = NEW.tblcarritoproduct_emailusuamodifico WHERE TPD.idtblproductdetalle = NEW.tblcarritoproduct_idtblproductdetalle";
	    			$resultado = $conexionPDO->prepare($trigger);
	    			$resultado->bindParam(1,$cantidad,PDO::PARAM_INT);
	    			$resultado->execute();

	    			$update = "UPDATE tblcarritoproduct SET tblcarritoproduct_cantidad = tblcarritoproduct_cantidad + ? , tblcarritoproduct_fchmodificacion = NOW(), tblcarritoproduct_emailusuamodifico = ? 
	    				WHERE tblcarritoproduct_idtblordencompra = ? AND tblcarritoproduct_idtblproductdetalle = ?";

	    			$resultado = $conexionPDO->prepare($update);
					$resultado->bindParam(1,$cantidad,PDO::PARAM_INT);
					$resultado->bindParam(2,$emailcreo,PDO::PARAM_STR);
					$resultado->bindParam(3,$idtblordencompra,PDO::PARAM_INT);
					$resultado->bindParam(4,$idtblproductdetalle,PDO::PARAM_INT);
					$resultado->execute();	

	    			return $resultado->rowCount();

    			}else{ //se crea carrito y se actualiza stock del producto con trigger 
	    			$trigger = "DROP TRIGGER IF EXISTS actualizarstockProduct".";".
	    				"CREATE TRIGGER actualizarstockProduct BEFORE INSERT ON tblcarritoproduct FOR EACH ROW UPDATE tblproductdetalle TPD SET TPD.tblproductdetalle_stock = TPD.tblproductdetalle_stock-(NEW.tblcarritoproduct_cantidad), TPD.tblproductdetalle_fchmodificacion =NOW(), TPD.tblproductdetalle_emailusuamodifico = NEW.tblcarritoproduct_emailusuamodifico WHERE TPD.idtblproductdetalle = NEW.tblcarritoproduct_idtblproductdetalle";
	    			$resultado = $conexionPDO->prepare($trigger);
	    			$resultado->execute();

	    			$insert ="INSERT INTO tblcarritoproduct (tblcarritoproduct_cantidad, tblcarritoproduct_nombreproducto,tblcarritoproduct_nombreproveedor,tblcarritoproduct_precioreal,tblcarritoproduct_preciobp,tblcarritoproduct_personalizar,tblcarritoproduct_mensajetarjeta,tblcarritoproduct_calificacion,tblcarritoproduct_fchmodificacion,tblcarritoproduct_fchcreacion,tblcarritoproduct_emailusuacreo,tblcarritoproduct_emailusuamodifico,tblcarritoproduct_idtblordencompra,tblcarritoproduct_idtblproductdetalle) VALUES (?,?,?,?,?,?,?,?,NOW(),NOW(),?,?,?,?)"; 

	    			$resultado = $conexionPDO->prepare($insert);
					$resultado->bindParam(1,$cantidad,PDO::PARAM_INT);
					$resultado->bindParam(2,$nombreproduct,PDO::PARAM_STR);
					$resultado->bindParam(3,$nombreproveedor,PDO::PARAM_STR);
					$resultado->bindParam(4,$precioreal,PDO::PARAM_STR);
					$resultado->bindParam(5,$preciobp,PDO::PARAM_STR);
					$resultado->bindParam(6,$personalizar,PDO::PARAM_STR);
					$resultado->bindParam(7,$msjtarjeta,PDO::PARAM_STR);
					$resultado->bindParam(8,$calif,PDO::PARAM_STR);
					$resultado->bindParam(9,$emailcreo,PDO::PARAM_STR);
					$resultado->bindParam(10,$emailcreo,PDO::PARAM_STR);
					$resultado->bindParam(11,$idtblordencompra,PDO::PARAM_INT);
					$resultado->bindParam(12,$idtblproductdetalle,PDO::PARAM_INT);
					$resultado->execute();
					return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
    			}
			}
			else{
				return "2";//regresara un valor 2 para saber que el stock es menor que la cantidad a ingresa
			}
    	}else{//CASO SOBREPEDIDO

    		//consulta para identificar si exite el carrito o no 
    		$consulta = "SELECT * FROM tblcarritoproduct TCP WHERE TCP.tblcarritoproduct_idtblordencompra = ? AND TCP.tblcarritoproduct_idtblproductdetalle = ?";
	    	$resultado = $conexionPDO->prepare($consulta);
			$resultado->bindParam(1,$idtblordencompra,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblproductdetalle,PDO::PARAM_INT);
			$resultado->execute();
			$existeCarrito = $resultado->rowCount();

    		if($existeCarrito>0){  //actualiza la cantidad del carrito
    			//Se elimina el trigger para no actualizar el stock
    			$triggerEliminar= "DROP TRIGGER IF EXISTS actualizarstocProductkUpdate";
    			$resultado = $conexionPDO->prepare($triggerEliminar);
    			$resultado->execute();	

    			$update = "UPDATE tblcarritoproduct SET tblcarritoproduct_cantidad = tblcarritoproduct_cantidad + ? , tblcarritoproduct_fchmodificacion = NOW(), tblcarritoproduct_emailusuamodifico = ? 
    				WHERE tblcarritoproduct_idtblordencompra = ? AND tblcarritoproduct_idtblproductdetalle = ? ";

    			$resultado = $conexionPDO->prepare($update);
				$resultado->bindParam(1,$cantidad,PDO::PARAM_INT);
				$resultado->bindParam(2,$emailcreo,PDO::PARAM_STR);
				$resultado->bindParam(3,$idtblordencompra,PDO::PARAM_INT);
				$resultado->bindParam(4,$idtblproductdetalle,PDO::PARAM_INT);
				$resultado->execute();	

    			return $resultado->rowCount();

				
    		}else{ //creo

    			//Se elimina el trigger para no actualizar el stock
    			$triggerEliminar= "DROP TRIGGER IF EXISTS actualizarstockProduct";
    			$resultado = $conexionPDO->prepare($triggerEliminar);
    			$resultado->execute();

    			$insert ="INSERT INTO tblcarritoproduct (tblcarritoproduct_cantidad, tblcarritoproduct_nombreproducto,tblcarritoproduct_nombreproveedor,tblcarritoproduct_precioreal,tblcarritoproduct_preciobp,tblcarritoproduct_personalizar,tblcarritoproduct_mensajetarjeta,tblcarritoproduct_calificacion,tblcarritoproduct_fchmodificacion,tblcarritoproduct_fchcreacion,tblcarritoproduct_emailusuacreo,tblcarritoproduct_emailusuamodifico,tblcarritoproduct_idtblordencompra,tblcarritoproduct_idtblproductdetalle) VALUES (?,?,?,?,?,?,?,?,NOW(),NOW(),?,?,?,?)"; 

	    			$resultado = $conexionPDO->prepare($insert);
					$resultado->bindParam(1,$cantidad,PDO::PARAM_INT);
					$resultado->bindParam(2,$nombreproduct,PDO::PARAM_STR);
					$resultado->bindParam(3,$nombreproveedor,PDO::PARAM_STR);
					$resultado->bindParam(4,$precioreal,PDO::PARAM_STR);
					$resultado->bindParam(5,$preciobp,PDO::PARAM_STR);
					$resultado->bindParam(6,$personalizar,PDO::PARAM_STR);
					$resultado->bindParam(7,$msjtarjeta,PDO::PARAM_STR);
					$resultado->bindParam(8,$calif,PDO::PARAM_STR);
					$resultado->bindParam(9,$emailcreo,PDO::PARAM_STR);
					$resultado->bindParam(10,$emailcreo,PDO::PARAM_STR);
					$resultado->bindParam(11,$idtblordencompra,PDO::PARAM_INT);
					$resultado->bindParam(12,$idtblproductdetalle,PDO::PARAM_INT);
					$resultado->execute();
					return $resultado->rowCount();	
    		}
    	}
    }

    /*
    TCP: tblcarritoproduct
    TP: tblproductdetalle
    Funcion que se encarga de llevar a cabo el eliminar un carrito  y/o actualizar el stock de un productodetalle 
    */
    public static function setDeleteTCPAndsetUpdateTP($tipodepedido,$cantidad,$idtblcarritoproduct,$idtblproductdetalle,$emailmodifico){

    	$conexionPDO = ConexionDB::getInstance()->getDb(); 


    	//si el tipo de servicio es para hoy se elimina carrito y se actualiza el 
    	if($tipodepedido==1){

    		$trigger = "DROP TRIGGER IF EXISTS actualizarstockProductDelete".";".
	    				"CREATE TRIGGER actualizarstockProductDelete AFTER DELETE ON tblcarritoproduct FOR EACH ROW UPDATE tblproductdetalle TPD SET TPD.tblproductdetalle_stock = TPD.tblproductdetalle_stock+(?), TPD.tblproductdetalle_fchmodificacion =NOW(), TPD.tblproductdetalle_emailusuamodifico = ? WHERE TPD.idtblproductdetalle =?";
	    	$resultado = $conexionPDO->prepare($trigger);
	    	$resultado->bindParam(1,$cantidad,PDO::PARAM_INT);
	    	$resultado->bindParam(2,$emailmodifico,PDO::PARAM_STR);
	    	$resultado->bindParam(3,$idtblproductdetalle,PDO::PARAM_INT);
	    	$resultado->execute();

	    	$delete = "DELETE FROM tblcarritoproduct WHERE idtblcarritoproduct = ?";
	    	$resultado = $conexionPDO->prepare($delete);
	    	$resultado->bindParam(1,$idtblcarritoproduct,PDO::PARAM_INT);
	    	$resultado->execute();

	    	return $resultado->rowCount();


    	}else{

    		//Se elimina el trigger para no actualizar el stock
    		$triggerEliminar= "DROP TRIGGER IF EXISTS actualizarstockProductDelete";
    		$resultado = $conexionPDO->prepare($triggerEliminar);
    		$resultado->execute();

    		$delete = "DELETE FROM tblcarritoproduct WHERE idtblcarritoproduct = ?";
	    	$resultado = $conexionPDO->prepare($delete);
	    	$resultado->bindParam(1,$idtblcarritoproduct,PDO::PARAM_INT);
	    	$resultado->execute();

	    	return $resultado->rowCount();
    	}


    }

    /*
    TCPC: tblcarritoproductcomplem
    TPC: tblproductcomplem
    Funcion que se encarga de llevar a cabo el eliminar un carrito  y/o actualizar el stock de  productos complementarios
    */
    public static function setDeleteTCPCAndsetUpdateTPC($tipodepedido,$cantidad,$idtblcarritoproductcomplem,$idtblproductcomplem,$emailmodifico){

    	$conexionPDO = ConexionDB::getInstance()->getDb(); 


    	//si el tipo de servicio es para hoy se elimina carrito y se actualiza el 
    	if($tipodepedido==1){

    		$trigger = "DROP TRIGGER IF EXISTS actualizarstockProductCompleDelete".";".
	    				"CREATE TRIGGER actualizarstockProductCompleDelete AFTER DELETE ON tblcarritoproductcomplem FOR EACH ROW UPDATE tblproductcomplem TPC SET TPC.tblproductcomplem_stock = TPC.tblproductcomplem_stock+(?), TPC.tblproductcomplem_fchmodificacion =NOW(), TPC.tblproductcomplem_emailusuamodifico = ? WHERE TPC.idtblproductcomplem =?";
	    	$resultado = $conexionPDO->prepare($trigger);
	    	$resultado->bindParam(1,$cantidad,PDO::PARAM_INT);
	    	$resultado->bindParam(2,$emailmodifico,PDO::PARAM_STR);
	    	$resultado->bindParam(3,$idtblproductcomplem,PDO::PARAM_INT);
	    	$resultado->execute();

	    	$delete = "DELETE FROM tblcarritoproductcomplem WHERE idtblcarritoproductcomplem = ?";
	    	$resultado = $conexionPDO->prepare($delete);
	    	$resultado->bindParam(1,$idtblcarritoproductcomplem,PDO::PARAM_INT);
	    	$resultado->execute();

	    	return $resultado->rowCount();


    	}else{

    		//Se elimina el trigger para no actualizar el stock
    		$triggerEliminar= "DROP TRIGGER IF EXISTS actualizarstockProductCompleDelete";
    		$resultado = $conexionPDO->prepare($triggerEliminar);
    		$resultado->execute();

    		$delete = "DELETE FROM tblcarritoproductcomplem WHERE idtblcarritoproductcomplem = ?";
	    	$resultado = $conexionPDO->prepare($delete);
	    	$resultado->bindParam(1,$idtblcarritoproductcomplem,PDO::PARAM_INT);
	    	$resultado->execute();

	    	return $resultado->rowCount();
    	}


    }
 
 	public static function MgetAllTblciudadByTblproducto($idtblpais){
    	$activado=1;
    	$consulta="SELECT tblciudad.* FROM tblciudad WHERE tblciudad.tblciudad_activado=? AND EXISTS
			(SELECT idtblpais FROM tblpais where tblpais.idtblpais=tblciudad.tblpais_idtblpais AND tblpais.tblpais_activado=? AND tblpais.idtblpais=?
			and EXISTS
			(SELECT idtblcolonia FROM tblcolonia WHERE tblciudad.idtblciudad=tblcolonia.tblciudad_idtblciudad AND tblcolonia.tblcolonia_activado=?
			and EXISTS
			(SELECT idtblproveedor FROM tblproveedor WHERE tblcolonia.idtblcolonia=tblproveedor.tblcolonia_idtblcolonia AND tblproveedor.tblproveedor_activado=?
			and EXISTS
			(SELECT idtblproducto FROM tblproducto WHERE tblproveedor.idtblproveedor=tblproducto.tblproveedor_idtblproveedor AND tblproducto.tblproducto_activado=?))))";
		 try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$activado,PDO::PARAM_INT);
			$resultado->bindParam(2,$activado,PDO::PARAM_INT);
			$resultado->bindParam(3,$idtblpais,PDO::PARAM_INT);
			$resultado->bindParam(4,$activado,PDO::PARAM_INT);
			$resultado->bindParam(5,$activado,PDO::PARAM_INT);
			$resultado->bindParam(6,$activado,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
    }

    public static function MgetAllTblserviciosByTblproducto(){
    	$activado=1;
    	$consulta="SELECT * FROM tbltiposervicio AS tts WHERE exists
		(SELECT idtblproveedor FROM tblproveedor AS tpr WHERE tts.idtbltiposervicio=tpr.tbltiposervicio_idtbltiposervicio 
		AND tpr.tblproveedor_activado=?
		AND EXISTS
		(SELECT idtblproducto FROM tblproducto AS tpo WHERE tpr.idtblproveedor=tpo.tblproveedor_idtblproveedor
		AND tpo.tblproducto_activado=?))";
		 try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$activado,PDO::PARAM_INT);
			$resultado->bindParam(2,$activado,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
    }
 	
 	public static function MgetAllTblcoloniaByTblproducto($tblciudad,$diferenciaDias){
    	$activado=1;
    	$consulta="SELECT tblcolonia.* FROM tblcolonia WHERE tblcolonia.tblcolonia_activado=? AND exists
			(SELECT idtblciudad FROM tblciudad WHERE tblciudad.idtblciudad=tblcolonia.tblciudad_idtblciudad AND tblciudad.tblciudad_activado=? AND tblciudad.idtblciudad=?
			and EXISTS
			(SELECT idtblproveedor FROM tblproveedor WHERE tblcolonia.idtblcolonia=tblproveedor.tblcolonia_idtblcolonia AND tblproveedor.tblproveedor_activado=?
			and EXISTS
			(SELECT idtblproducto FROM tblproducto WHERE tblproveedor.idtblproveedor=tblproducto.tblproveedor_idtblproveedor AND tblproducto.tblproducto_activado=?
			AND EXISTS
			(select idtblproductdetalle from tblproductdetalle WHERE tblproductdetalle_activado=? AND tblproductdetalle_diaselaboracion<=?))))";
		 try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$activado,PDO::PARAM_INT);
			$resultado->bindParam(2,$activado,PDO::PARAM_INT);
			$resultado->bindParam(3,$tblciudad,PDO::PARAM_INT);
			$resultado->bindParam(4,$activado,PDO::PARAM_INT);
			$resultado->bindParam(5,$activado,PDO::PARAM_INT);
			$resultado->bindParam(6,$activado,PDO::PARAM_INT);
			$resultado->bindParam(7,$diferenciaDias,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
    }

    public static function MgetAllTblcategproductByTblproducto($idtblciudad,$idtbltiposervicio,$diaselaboracion,$idtblcolonia){
    	$activado=1;
    	$tipodeservicioDefault=3;
    	if($idtbltiposervicio==1)
    	{
	    	$consulta="SELECT * FROM tblcategproduct WHERE tblcategproduct_activado = ?
			AND EXISTS 
			(SELECT idtblciudad FROM tblciudad WHERE tblciudad.tblciudad_activado=? AND tblciudad.idtblciudad=?
			AND EXISTS
			(SELECT idtblcolonia FROM tblcolonia WHERE tblcolonia.tblcolonia_activado=? AND tblcolonia.idtblcolonia=?
			AND EXISTS
			(SELECT idtblproveedor FROM tblproveedor WHERE tblproveedor.tblproveedor_activado=? AND tblproveedor.tblcolonia_idtblcolonia=tblcolonia.idtblcolonia AND (tblproveedor.tbltiposervicio_idtbltiposervicio=? OR tblproveedor.tbltiposervicio_idtbltiposervicio=?)
			AND EXISTS
			(SELECT idtblproducto FROM tblproducto WHERE tblproveedor.idtblproveedor=tblproducto.tblproveedor_idtblproveedor AND tblproducto.tblproducto_activado=?
			AND EXISTS
			(SELECT idtblproductdetalle FROM tblproductdetalle WHERE tblproductdetalle.tblproducto_idtblproducto=tblproducto.idtblproducto AND tblproductdetalle_activado=? AND tblproductdetalle_diaselaboracion<=?)))))";			
			 try{
				$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
				$resultado->bindParam(1,$activado,PDO::PARAM_INT);
				$resultado->bindParam(2,$activado,PDO::PARAM_INT);
				$resultado->bindParam(3,$idtblciudad,PDO::PARAM_INT);
				$resultado->bindParam(4,$activado,PDO::PARAM_INT);
				$resultado->bindParam(5,$idtblcolonia,PDO::PARAM_INT);
				$resultado->bindParam(6,$activado,PDO::PARAM_INT);
				$resultado->bindParam(7,$idtbltiposervicio,PDO::PARAM_INT);
				$resultado->bindParam(8,$tipodeservicioDefault,PDO::PARAM_INT);
				$resultado->bindParam(9,$activado,PDO::PARAM_INT);
				$resultado->bindParam(10,$activado,PDO::PARAM_INT);
				$resultado->bindParam(11,$diaselaboracion,PDO::PARAM_INT);
				$resultado->execute();
				return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
			} catch(PDOException $e){
				return false;
			}
		}
		elseif($idtbltiposervicio==2)
		{
			$consulta="SELECT * FROM tblcategproduct WHERE tblcategproduct_activado = ?
				AND EXISTS 
				(SELECT idtblciudad 
				FROM tblciudad 
				WHERE tblciudad.tblciudad_activado=?
				AND tblciudad.idtblciudad=?
				AND EXISTS
				(SELECT idtblproveedor 
				FROM tblproveedor 
				WHERE tblproveedor.tblproveedor_activado=? 
				AND (tblproveedor.tbltiposervicio_idtbltiposervicio=? OR tblproveedor.tbltiposervicio_idtbltiposervicio=?)
				AND EXISTS
				(SELECT idtblproducto 
				FROM tblproducto 
				WHERE tblproveedor.idtblproveedor=tblproducto.tblproveedor_idtblproveedor 
				AND tblproducto.tblproducto_activado=?
				AND EXISTS
				(SELECT idtblproductdetalle 
				FROM tblproductdetalle 
				WHERE tblproductdetalle.tblproducto_idtblproducto=tblproducto.idtblproducto 
				AND tblproductdetalle_activado=? 
				AND tblproductdetalle_diaselaboracion<=?))))";			
			 try{
				$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
				$resultado->bindParam(1,$activado,PDO::PARAM_INT);
				$resultado->bindParam(2,$activado,PDO::PARAM_INT);
				$resultado->bindParam(3,$idtblciudad,PDO::PARAM_INT);
				$resultado->bindParam(4,$activado,PDO::PARAM_INT);
				$resultado->bindParam(5,$idtbltiposervicio,PDO::PARAM_INT);
				$resultado->bindParam(6,$tipodeservicioDefault,PDO::PARAM_INT);
				$resultado->bindParam(7,$activado,PDO::PARAM_INT);
				$resultado->bindParam(8,$activado,PDO::PARAM_INT);
				$resultado->bindParam(9,$diaselaboracion,PDO::PARAM_INT);
				$resultado->execute();
				return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
			} catch(PDOException $e){
				return false;
			}
		}
    }
    public static function MgetAllTblproveedorByTblproducto($idtblciudad,$idtbltiposervicio,$diaselaboracion,$idtblcolonia){
    	$activado=1;
    	$tipodeservicioDefault=3;
    	if($idtbltiposervicio==1)
    	{
	    	$consulta="SELECT * FROM tblproveedor WHERE tblproveedor.tblproveedor_activado=? AND tblproveedor.tblcolonia_idtblcolonia=? AND (tblproveedor.tbltiposervicio_idtbltiposervicio=? OR tblproveedor.tbltiposervicio_idtbltiposervicio=?)
				AND EXISTS 
				(SELECT idtblciudad FROM tblciudad WHERE tblciudad.tblciudad_activado=? AND tblciudad.idtblciudad=?
				AND EXISTS
				(SELECT idtblcolonia FROM tblcolonia WHERE tblcolonia.tblcolonia_activado=? AND tblcolonia.idtblcolonia=?
				AND EXISTS
				(SELECT idtblproducto FROM tblproducto WHERE tblproveedor.idtblproveedor=tblproducto.tblproveedor_idtblproveedor AND tblproducto.tblproducto_activado=?
				AND EXISTS
				(SELECT idtblproductdetalle FROM tblproductdetalle WHERE tblproductdetalle.tblproducto_idtblproducto=tblproducto.idtblproducto AND tblproductdetalle_activado=? AND tblproductdetalle_diaselaboracion<=?))))";			
			 try{
				$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
				$resultado->bindParam(1,$activado,PDO::PARAM_INT);
				$resultado->bindParam(2,$idtblcolonia,PDO::PARAM_INT);
				$resultado->bindParam(3,$idtblciudad,PDO::PARAM_INT);
				$resultado->bindParam(4,$tipodeservicioDefault,PDO::PARAM_INT);
				$resultado->bindParam(5,$activado,PDO::PARAM_INT);
				$resultado->bindParam(6,$idtblciudad,PDO::PARAM_INT);
				$resultado->bindParam(7,$activado,PDO::PARAM_INT);
				$resultado->bindParam(8,$idtblcolonia,PDO::PARAM_INT);
				$resultado->bindParam(9,$activado,PDO::PARAM_INT);
				$resultado->bindParam(10,$activado,PDO::PARAM_INT);
				$resultado->bindParam(11,$diaselaboracion,PDO::PARAM_INT);
				$resultado->execute();
				return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
			} catch(PDOException $e){
				return false;
			}
		}
		elseif($idtbltiposervicio==2)
		{
			$consulta="SELECT * FROM tblproveedor WHERE tblproveedor.tblproveedor_activado=? AND (tblproveedor.tbltiposervicio_idtbltiposervicio=? OR tblproveedor.tbltiposervicio_idtbltiposervicio=?)
			AND EXISTS 
			(SELECT idtblciudad FROM tblciudad WHERE tblciudad.tblciudad_activado=? AND tblciudad.idtblciudad=?
			AND EXISTS
			(SELECT idtblproducto FROM tblproducto WHERE tblproveedor.idtblproveedor=tblproducto.tblproveedor_idtblproveedor AND tblproducto.tblproducto_activado=?
			AND EXISTS
			(SELECT idtblproductdetalle FROM tblproductdetalle WHERE tblproductdetalle.tblproducto_idtblproducto=tblproducto.idtblproducto AND tblproductdetalle_activado=? AND tblproductdetalle_diaselaboracion<=?)))";			
			 try{
				$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
				$resultado->bindParam(1,$activado,PDO::PARAM_INT);
				$resultado->bindParam(2,$idtbltiposervicio,PDO::PARAM_INT);
				$resultado->bindParam(3,$tipodeservicioDefault,PDO::PARAM_INT);
				$resultado->bindParam(4,$activado,PDO::PARAM_INT);
				$resultado->bindParam(5,$idtblciudad,PDO::PARAM_INT);
				$resultado->bindParam(6,$activado,PDO::PARAM_INT);
				$resultado->bindParam(7,$activado,PDO::PARAM_INT);
				$resultado->bindParam(8,$diaselaboracion,PDO::PARAM_INT);
				$resultado->execute();
				return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
			} catch(PDOException $e){
				return false;
			}
		}
    }
    public static function MgetAllTblproducto($idtblpais,$idtblciudad,$idtblcolonia,$idtblsemana,$diaselaboracion,$idtbltiposervicio,$hora){
    	$activado=1;
    	$tipodeservicioDefault=3;
    	$idtblproductoDefault=0;
    	$idtblsemanaDefault=0;
    	/*
    	activadi    	disaelaboracion    	idpais    	activado    	idciuad    	activado    	idcolonia    	activado    	actviado    	tipodeservicio     	defaultservicio    	defaultsemana    	idseamana?    	hora?    	 */

    	if($idtbltiposervicio==1)
    	{
    		/*
    		$consulta="
SELECT * FROM tblproducto INNER JOIN tblproductdetalle ON tblproductdetalle.tblproducto_idtblproducto INNER JOIN tblproductimg ON tblproductimg.tblproducto_idtblproducto=tblproducto.idtblproducto WHERE tblproducto.idtblproducto>0 AND tblproductdetalle.tblproductdetalle_activado=1 AND tblproductdetalle.tblproductdetalle_diaselaboracion<=99
AND EXISTS
(SELECT * FROM tblpais WHERE tblpais.idtblpais=1 AND tblpais.tblpais_activado=1
AND exists
(SELECT * FROM tblciudad WHERE tblciudad.idtblciudad=1 AND tblciudad.tblciudad_activado=1 AND tblciudad.tblpais_idtblpais=tblpais.idtblpais
AND exists 
(SELECT * FROM tblcolonia WHERE tblcolonia.idtblcolonia=1 AND tblcolonia.tblcolonia_activado=1 AND tblcolonia.tblciudad_idtblciudad=tblciudad.idtblciudad
AND exists
(SELECT * FROM tblproveedor WHERE tblproveedor.tblproveedor_activado=1 AND tblproveedor.tblcolonia_idtblcolonia=tblcolonia.idtblcolonia AND (tblproveedor.tbltiposervicio_idtbltiposervicio=1 or tblproveedor.tbltiposervicio_idtbltiposervicio=3) AND tblproducto.tblproveedor_idtblproveedor=tblproveedor.idtblproveedor
AND exists
(SELECT * FROM tbldiasemana WHERE idtbldiasemana>0 
AND exists
(SELECT * FROM tbldiaprovservicio WHERE tbldiaprovservicio.tbldiasemana_idtbldiasemana=1 
AND exists
(SELECT * FROM tblhrsprovtienda INNER JOIN tblhraabre ON tblhrsprovtienda.tblhraabre_idtblhraabre=tblhraabre.idtblhraabre INNER JOIN tblhracierra ON tblhrsprovtienda.tblhracierra_idtblhracierra=tblhracierra.idtblhracierra INNER JOIN tblhora ON tblhraabre.tblhora_idtblhora=tblhora.idtblhora INNER JOIN tblhora as tblhoraxcierra ON tblhracierra.tblhora_idtblhora=tblhoraxcierra.idtblhora WHERE tblhrsprovtienda.tblproveedor_idtblproveedor=tblproveedor.idtblproveedor AND CAST('16:00' AS TIME ) BETWEEN tblhora.tblhora_hora AND tblhoraxcierra.tblhora_hora ))))))) GROUP BY tblproducto.idtblproducto";
*/
		$consulta="SELECT * FROM tblproducto INNER JOIN tblproductdetalle ON tblproductdetalle.tblproducto_idtblproducto=tblproducto.idtblproducto INNER JOIN tblproductimg ON tblproductimg.tblproducto_idtblproducto=tblproducto.idtblproducto INNER JOIN tblproveedor ON tblproducto.tblproveedor_idtblproveedor=tblproveedor.idtblproveedor WHERE tblproducto.idtblproducto>? AND tblproductdetalle.tblproductdetalle_activado=? AND tblproductdetalle.tblproductdetalle_diaselaboracion<=?
			AND EXISTS
			(SELECT * FROM tblpais WHERE tblpais.idtblpais=? AND tblpais.tblpais_activado=?
			AND exists
			(SELECT * FROM tblciudad WHERE tblciudad.idtblciudad=? AND tblciudad.tblciudad_activado=? AND tblciudad.tblpais_idtblpais=tblpais.idtblpais
			AND exists 
			(SELECT * FROM tblcolonia WHERE tblcolonia.idtblcolonia=? AND tblcolonia.tblcolonia_activado=? AND tblcolonia.tblciudad_idtblciudad=tblciudad.idtblciudad
			AND exists
			(SELECT * FROM tblproveedor WHERE tblproveedor.tblproveedor_activado=? AND tblproveedor.tblcolonia_idtblcolonia=tblcolonia.idtblcolonia AND (tblproveedor.tbltiposervicio_idtbltiposervicio=? OR tblproveedor.tbltiposervicio_idtbltiposervicio=?) AND tblproducto.tblproveedor_idtblproveedor=tblproveedor.idtblproveedor
			AND exists
			(SELECT * FROM tbldiasemana WHERE idtbldiasemana>?
			AND exists
			(SELECT * FROM tbldiaprovservicio WHERE tbldiaprovservicio.tbldiasemana_idtbldiasemana=? 
			AND exists
			(SELECT * FROM tblhrsprovtienda INNER JOIN tblhraabre ON tblhrsprovtienda.tblhraabre_idtblhraabre=tblhraabre.idtblhraabre INNER JOIN tblhracierra ON tblhrsprovtienda.tblhracierra_idtblhracierra=tblhracierra.idtblhracierra INNER JOIN tblhora ON tblhraabre.tblhora_idtblhora=tblhora.idtblhora INNER JOIN tblhora as tblhoraxcierra ON tblhracierra.tblhora_idtblhora=tblhoraxcierra.idtblhora WHERE tblhrsprovtienda.tblproveedor_idtblproveedor=tblproveedor.idtblproveedor AND CAST( SEC_TO_TIME(?*60*60*24) AS TIME ) BETWEEN tblhora.tblhora_hora AND tblhoraxcierra.tblhora_hora ))))))) GROUP BY tblproducto.idtblproducto";

			 try{
				$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
				$resultado->bindParam(1,$idtblproductoDefault,PDO::PARAM_INT);
				$resultado->bindParam(2,$activado,PDO::PARAM_INT);
				$resultado->bindParam(3,$diaselaboracion,PDO::PARAM_INT);
				$resultado->bindParam(4,$idtblpais,PDO::PARAM_INT);
				$resultado->bindParam(5,$activado,PDO::PARAM_INT);
				$resultado->bindParam(6,$idtblciudad,PDO::PARAM_INT);
				$resultado->bindParam(7,$activado,PDO::PARAM_INT);
				$resultado->bindParam(8,$idtblcolonia,PDO::PARAM_INT);
				$resultado->bindParam(9,$activado,PDO::PARAM_INT);
				$resultado->bindParam(10,$activado,PDO::PARAM_INT);
				$resultado->bindParam(11,$idtbltiposervicio,PDO::PARAM_INT);
				$resultado->bindParam(12,$tipodeservicioDefault,PDO::PARAM_INT);
				$resultado->bindParam(13,$idtblsemanaDefault,PDO::PARAM_INT);
				$resultado->bindParam(14,$idtblsemana,PDO::PARAM_INT);
				$resultado->bindParam(15,$hora,PDO::PARAM_STR);
				//$resultado->bindParam(15,$hora,PDO::PARAM_STR);
				$resultado->execute();
				return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
			} catch(PDOException $e){
				return false;
			}
    		/*

	    	$consulta="SELECT * FROM tblproducto INNER JOIN tblproductdetalle ON tblproductdetalle.tblproducto_idtblproducto=tblproducto.idtblproducto AND tblproductdetalle_activado=? AND tblproductdetalle_diaselaboracion<=? WHERE tblproducto.tblproducto_activado=?
				AND EXISTS 
				(SELECT idtblciudad FROM tblciudad WHERE tblciudad.tblciudad_activado=? AND tblciudad.idtblciudad=?
				AND EXISTS
				(SELECT idtblcolonia FROM tblcolonia WHERE tblcolonia.tblcolonia_activado=? AND tblciudad.idtblciudad=tblcolonia.tblciudad_idtblciudad AND tblcolonia.idtblcolonia=?
				AND EXISTS
				(SELECT idtblproveedor FROM tblproveedor WHERE tblproveedor.tblproveedor_activado=? AND tblproveedor.tblcolonia_idtblcolonia=tblcolonia.idtblcolonia AND tblproveedor.idtblproveedor=tblproducto.tblproveedor_idtblproveedor AND (tblproveedor.tbltiposervicio_idtbltiposervicio=? OR tblproveedor.tbltiposervicio_idtbltiposervicio=?))))";
			 try{
				$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
				$resultado->bindParam(1,$activado,PDO::PARAM_INT);
				$resultado->bindParam(2,$diaselaboracion,PDO::PARAM_INT);
				$resultado->bindParam(3,$activado,PDO::PARAM_INT);
				$resultado->bindParam(4,$activado,PDO::PARAM_INT);
				$resultado->bindParam(5,$idtblciudad,PDO::PARAM_INT);
				$resultado->bindParam(6,$activado,PDO::PARAM_INT);
				$resultado->bindParam(7,$idtblcolonia,PDO::PARAM_INT);
				$resultado->bindParam(8,$activado,PDO::PARAM_INT);
				$resultado->bindParam(9,$idtbltiposervicio,PDO::PARAM_INT);
				$resultado->bindParam(10,$tipodeservicioDefault,PDO::PARAM_INT);
				$resultado->execute();
				return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
			} catch(PDOException $e){
				return false;
			}
			*/
		}
		elseif($idtbltiposervicio==2)
		{
			/*
			$consulta="SELECT * FROM tblproducto INNER JOIN tblproductdetalle ON tblproductdetalle.tblproducto_idtblproducto=tblproducto.idtblproducto AND tblproductdetalle_activado=? AND tblproductdetalle_diaselaboracion<=? WHERE tblproducto.tblproducto_activado=?
			AND EXISTS 
			(SELECT idtblciudad FROM tblciudad WHERE tblciudad.tblciudad_activado=? AND tblciudad.idtblciudad=?
			AND EXISTS
			(SELECT idtblcolonia FROM tblcolonia WHERE tblcolonia.tblcolonia_activado=? AND tblciudad.idtblciudad=tblcolonia.tblciudad_idtblciudad
			AND EXISTS
			(SELECT idtblproveedor FROM tblproveedor WHERE tblproveedor.tblproveedor_activado=? AND tblproveedor.tblcolonia_idtblcolonia=tblcolonia.idtblcolonia AND tblproveedor.idtblproveedor=tblproducto.tblproveedor_idtblproveedor AND (tblproveedor.tbltiposervicio_idtbltiposervicio=? OR tblproveedor.tbltiposervicio_idtbltiposervicio=?))))";*/
			/*$consulta="SELECT * FROM tblproducto INNER JOIN tblproductdetalle ON tblproductdetalle.tblproducto_idtblproducto INNER JOIN tblproductimg ON tblproductimg.tblproducto_idtblproducto=tblproducto.idtblproducto INNER JOIN tblproveedor ON tblproducto.tblproveedor_idtblproveedor=tblproveedor.idtblproveedor WHERE tblproducto.idtblproducto>? AND tblproductdetalle.tblproductdetalle_activado=? AND tblproductdetalle.tblproductdetalle_diaselaboracion<=?
			AND EXISTS
			(SELECT * FROM tblpais WHERE tblpais.idtblpais=? AND tblpais.tblpais_activado=?
			AND exists
			(SELECT * FROM tblciudad WHERE tblciudad.idtblciudad=? AND tblciudad.tblciudad_activado=? AND tblciudad.tblpais_idtblpais=tblpais.idtblpais
			AND exists 
			(SELECT * FROM tblcolonia WHERE tblcolonia.idtblcolonia=? AND tblcolonia.tblcolonia_activado=? AND tblcolonia.tblciudad_idtblciudad=tblciudad.idtblciudad
			AND exists
			(SELECT * FROM tblproveedor WHERE tblproveedor.tblproveedor_activado=? AND tblproveedor.tblcolonia_idtblcolonia=tblcolonia.idtblcolonia AND (tblproveedor.tbltiposervicio_idtbltiposervicio=? OR tblproveedor.tbltiposervicio_idtbltiposervicio=?) AND tblproducto.tblproveedor_idtblproveedor=tblproveedor.idtblproveedor
			)))) GROUP BY tblproducto.idtblproducto";
			*/
			$consulta="SELECT * FROM tblproducto INNER JOIN tblproductdetalle ON tblproductdetalle.tblproducto_idtblproducto=tblproducto.idtblproducto INNER JOIN tblproductimg ON tblproductimg.tblproducto_idtblproducto=tblproducto.idtblproducto INNER JOIN tblproveedor ON tblproducto.tblproveedor_idtblproveedor=tblproveedor.idtblproveedor WHERE tblproducto.idtblproducto>? AND tblproductdetalle.tblproductdetalle_activado=? AND tblproductdetalle.tblproductdetalle_diaselaboracion<=?
			AND EXISTS
			(SELECT * FROM tblpais WHERE tblpais.idtblpais=? AND tblpais.tblpais_activado=?
			AND exists
			(SELECT * FROM tblciudad WHERE tblciudad.idtblciudad=? AND tblciudad.tblciudad_activado=? AND tblciudad.tblpais_idtblpais=tblpais.idtblpais
			AND exists
			(SELECT * FROM tblproveedor WHERE tblproveedor.tblproveedor_activado=? AND (tblproveedor.tbltiposervicio_idtbltiposervicio=? OR tblproveedor.tbltiposervicio_idtbltiposervicio=?) AND tblproducto.tblproveedor_idtblproveedor=tblproveedor.idtblproveedor
			))) GROUP BY tblproducto.idtblproducto";
			 try{
				$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
				$resultado->bindParam(1,$idtblproductoDefault,PDO::PARAM_INT);
				$resultado->bindParam(2,$activado,PDO::PARAM_INT);
				$resultado->bindParam(3,$diaselaboracion,PDO::PARAM_INT);
				$resultado->bindParam(4,$idtblpais,PDO::PARAM_INT);
				$resultado->bindParam(5,$activado,PDO::PARAM_INT);
				$resultado->bindParam(6,$idtblciudad,PDO::PARAM_INT);
				$resultado->bindParam(7,$activado,PDO::PARAM_INT);
				$resultado->bindParam(8,$activado,PDO::PARAM_INT);
				$resultado->bindParam(9,$idtbltiposervicio,PDO::PARAM_INT);
				$resultado->bindParam(10,$tipodeservicioDefault,PDO::PARAM_INT);
				$resultado->execute();
				return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
			} catch(PDOException $e){
				return false;
			}
		}
    }
    public static function MgetAllTblproductcomplem($idtblpais,$idtblciudad,$idtblcolonia,$idtblsemana,$diaselaboracion,$idtbltiposervicio,$hora)
    {
    	$activado=1;
    	$tipodeservicioDefault=3;
    	$idtblproductoDefault=0;
    	$idtblsemanaDefault=0;
    	if($idtbltiposervicio==1)
    	{

		}
		elseif($idtbltiposervicio==2)
		{
			$consulta="SELECT * FROM tblproductcomplem INNER JOIN tblproveedor ON tblproductcomplem.tblproveedor_idtblproveedor=tblproveedor.idtblproveedor WHERE tblproductcomplem.idtblproductcomplem>? AND tblproductcomplem.tblproductcomplem_activado=?
			AND EXISTS
			(SELECT * FROM tblpais WHERE tblpais.idtblpais=? AND tblpais.tblpais_activado=?
			AND exists
			(SELECT * FROM tblciudad WHERE tblciudad.idtblciudad=? AND tblciudad.tblciudad_activado=? AND tblciudad.tblpais_idtblpais=tblpais.idtblpais
			AND exists
			(SELECT * FROM tblproveedor WHERE tblproveedor.tblproveedor_activado=? AND (tblproveedor.tbltiposervicio_idtbltiposervicio=? OR tblproveedor.tbltiposervicio_idtbltiposervicio=?) AND tblproductcomplem.tblproveedor_idtblproveedor=tblproveedor.idtblproveedor
			))) GROUP BY tblproductcomplem.idtblproductcomplem";
			try{
				$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
				$resultado->bindParam(1,$idtblproductoDefault,PDO::PARAM_INT);
				$resultado->bindParam(2,$activado,PDO::PARAM_INT);
				$resultado->bindParam(3,$idtblpais,PDO::PARAM_INT);
				$resultado->bindParam(4,$activado,PDO::PARAM_INT);
				$resultado->bindParam(5,$idtblciudad,PDO::PARAM_INT);
				$resultado->bindParam(6,$activado,PDO::PARAM_INT);
				$resultado->bindParam(7,$activado,PDO::PARAM_INT);
				$resultado->bindParam(8,$idtbltiposervicio,PDO::PARAM_INT);
				$resultado->bindParam(9,$tipodeservicioDefault,PDO::PARAM_INT);
				$resultado->execute();
				return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
			} catch(PDOException $e){
				return false;
			}
		}
		else
		{
			return false;
		}
	}
	public static function MgetAllTblpaisANDTblciuad($idtblpais,$idtblciudad)
	{
		$consulta="SELECT * FROM tblpais 
		INNER JOIN tblciudad ON tblciudad.tblpais_idtblpais=tblpais.idtblpais 
		WHERE tblpais.idtblpais=? AND tblciudad.idtblciudad=?";
			try{
				$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
				$resultado->bindParam(1,$idtblpais,PDO::PARAM_INT);
				$resultado->bindParam(2,$idtblciudad,PDO::PARAM_INT);
				$resultado->execute();
				return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
			} catch(PDOException $e){
				return false;
			}
	}

    //obtiene los productos todos sin el ingrediente especifico y solo de un proveedor
    public static function getTblproductoByTblproveedorAndTblclasifproduct($fechapedido,$idtblproveedor,$idtblclasifproduct){
        
        $activado=1;
        
        $fechapedidoingresada = new DateTime($fechapedido);
        $fechahoy = new DateTime("now");
        $interval= $fechahoy->diff($fechapedidoingresada);
        $diasMinimos= $interval->format('%d');
        
        $diasemana= $fechapedidoingresada->format('l');        
        
       if($fechapedidoingresada == $fechahoy){ 
            $tipodepedido= 1; //pedidoparahoy
            $stock=1;
        }else{
            $tipodepedido= 2; //pedidoparaotrodia
            $stock=0;
        }
            
        $consulta = "SELECT TPR.*, TP.*,TPI.* ,TPRD.* FROM tblproducto TPR 
        INNER JOIN tblproveedor TP ON TP.idtblproveedor = TPR.tblproveedor_idtblproveedor
        INNER JOIN tblproductdetalle TPRD ON TPRD.tblproducto_idtblproducto = TPR.idtblproducto
        INNER JOIN tblclasifproduct TCLP ON TCLP.idtblclasifproduct = TPR.tblclasifproduct_idtblclasifproduct
        INNER JOIN tblproductimg TPI ON TPI.tblproducto_idtblproducto = TPR.idtblproducto
        WHERE TP.idtblproveedor = ?  
	        AND TPR.tblproducto_activado = ?
	        AND TCLP.tblclasifproduct_activado = ?
	        AND TPR.tblclasifproduct_idtblclasifproduct= ?
	        AND TPRD.tblproductdetalle_activado = ?
	        AND TPRD.tblproductdetalle_stock >= ?
	        AND TPRD.tblproductdetalle_diaselaboracion <= ?
	        GROUP BY TPR.idtblproducto";

            try{
                
                $resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
                $resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
                $resultado->bindParam(2,$activado,PDO::PARAM_INT);
                $resultado->bindParam(3,$activado,PDO::PARAM_INT);
                $resultado->bindParam(4,$idtblclasifproduct,PDO::PARAM_INT);
                $resultado->bindParam(5,$activado,PDO::PARAM_INT);
                $resultado->bindParam(6,$stock,PDO::PARAM_INT);
                $resultado->bindParam(7,$diasMinimos,PDO::PARAM_INT);
                $resultado->execute();
                return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro
            }catch(PDOException $e){
                return false;      
            }   
    }

    // Funcion para obtener Rangos de Precios para el Filtro
     public static function getAllRangoPrecios(){
    	$arrayCompleto=[];

    	$arrayRango0 = [
		                "idRangoPrecio" => '0',
		                "rangovalor" => '0',		                
		                "rango_precio" => 'Rango de Precio'
		                ]; 
		$arrayRango1 = [
		                "idRangoPrecio" => '1',
		                "rangovalor" => '150.00',		                
		                "rango_precio" => 'menor a $150.00'
		                ];  
		

		$arrayRango2 = [
		                "idRangoPrecio" => '2',
		                "rangovalor" => '250.00',		                
		                "rango_precio" => '$150.00 - $250.00'
		                ];  
		

		$arrayRango3 = [
		                "idRangoPrecio" => '3',
		                "rangovalor" => '350.00',		                
		                "rango_precio" => '$250.00 - $350.00' 
		                ];  
		

		$arrayRango4 = [
		                "idRangoPrecio" => '4',
		                "rangovalor" => '351.00',		                
		                "rango_precio" => 'mayor a $350.00'
		                ];

		array_push($arrayCompleto,$arrayRango0);
		array_push($arrayCompleto,$arrayRango1);
        array_push($arrayCompleto,$arrayRango2);
        array_push($arrayCompleto,$arrayRango3);
        array_push($arrayCompleto,$arrayRango4);

        return $resultado=$arrayCompleto;                  

    }



    //Funcion para obtener los datos de un cupon, siempre y cuando el cliente no lo haya utilizado
    //tblcupondescuento TBCD
    //tblhistcupondescuento TBHCD
    /*Verifica si existe un cupon con de un cliente  */
    public static function getTBCDAndsetCheckTBHCD($cupondescuento, $idtblcliente){

    	$conexionPDO = ConexionDB::getInstance()->getDb(); 
    	$activado =1;
        
        $check = "SELECT COUNT(*) FROM tblhistcupondescuento WHERE tblhistcupondescuento_cupon = ? AND tblhistcupondescuento_idtblcliente = ? ";

		try{
			$resultado = $conexionPDO->prepare($check);
			$resultado->bindParam(1,$cupondescuento,PDO::PARAM_STR);
			$resultado->bindParam(2,$idtblcliente,PDO::PARAM_INT);
			$resultado->execute();
			$existe = $resultado->fetchColumn(); //retorna el numero de count

			if($existe>0){ //Existe un registro de uso de codigo con el cliente
				return false;
			}else{

				$consulta = "SELECT * FROM tblcupondescuento WHERE tblcupondescuento_codigo = ? AND tblcupondescuento_activado = ?";

				$resultado = $conexionPDO->prepare($consulta);
				$resultado->bindParam(1,$cupondescuento,PDO::PARAM_STR);
				$resultado->bindParam(2,$activado,PDO::PARAM_INT);
				$resultado->execute();
				return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 

			}

		}catch(PDOException $e){
			return false;
		}
        
    }

    /*Insertar un registro en el historico de cupon descuento*/
	 public static function setTblhistcupondescuento($cupondescuento, $descuento,$idtblcliente,$idtblordencompra,$emailcreo){
        
        $insert ="INSERT INTO  tblhistcupondescuento (tblhistcupondescuento_cupon,tblhistcupondescuento_descuento, tblhistcupondescuento_idtblcliente, tblhistcupondescuento_idtblordencompra, tblhistcupondescuento_fchmodificacion, tblhistcupondescuento_fchcreacion, tblhistcupondescuento_emailusuacreo, tblhistcupondescuento_emailusuamodifico) VALUES (?,?,?,?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$cupondescuento,PDO::PARAM_STR);
			$resultado->bindParam(2,$descuento,PDO::PARAM_INT);
			$resultado->bindParam(3,$idtblcliente,PDO::PARAM_INT);
			$resultado->bindParam(4,$idtblordencompra,PDO::PARAM_INT);
			$resultado->bindParam(5,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(6,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }

    /*Se inserta u obtiene un cliente para el manejo de Fb(Redes Sociales)*/
    public static function getTblclienteORsetTblcliente($clientenombre, $clienteapellidos,$clientecallenum,$clientecolonia,$clientecodipost,$clientenacimiento,$clientesexo,$clientetelf,$clienteext,$clientecel,$clienterfc,$cedulafiscal,$clienteciudad,$clientepais,$nombencargadoemp,$clienteemail,$clienteactivado,$clientepasswd,$emailcreo,$recibirinfo,$idtipocliente){

    	$conexionPDO = ConexionDB::getInstance()->getDb();

    	$consulta = "SELECT * FROM tblcliente WHERE tblcliente_email = ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$clienteemail,PDO::PARAM_STR);
			$resultado->execute();
			$existe= $resultado->rowCount(); //retorna el numero de registros

			if($existe>0){

				$idtblcliente = $resultado->fetchAll(PDO::FETCH_COLUMN, 0); //retorna los campos del registro de la primera columna 

				return $idtblcliente[0];

			}else{				
		        $insert ="INSERT INTO tblcliente (tblcliente_nombre, tblcliente_apellidos,tblcliente_callenum,tblcliente_colonia,tblcliente_codipost,tblcliente_fchnacimiento,tblcliente_sexo,tblcliente_telefono,tblcliente_extencion,tblcliente_celular,tblcliente_rfc,tblcliente_cedulafiscal,tblcliente_ciudad,tblcliente_pais,tblcliente_nombencargadoempresa,tblcliente_email,tblcliente_activado,tblcliente_fchmodificacion,tblcliente_password,tblcliente_fchcreacion,tblcliente_emailusuacreo,tblcliente_emailusuamodifico,tblcliente_recibirInfo,tbltipocliente_idtbltipocliente) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW(),?,NOW(),?,?,?,?)"; 
		        
		        try{
					$resultado = $conexionPDO->prepare($insert);
					$resultado->bindParam(1,$clientenombre,PDO::PARAM_STR);
					$resultado->bindParam(2,$clienteapellidos,PDO::PARAM_STR);
					$resultado->bindParam(3,$clientecallenum,PDO::PARAM_STR);
					$resultado->bindParam(4,$clientecolonia,PDO::PARAM_STR);
					$resultado->bindParam(5,$clientecodipost,PDO::PARAM_INT);
					$resultado->bindParam(6,$clientenacimiento,PDO::PARAM_STR);
					$resultado->bindParam(7,$clientesexo,PDO::PARAM_STR);
					$resultado->bindParam(8,$clientetelf,PDO::PARAM_STR);
					$resultado->bindParam(9,$clienteext,PDO::PARAM_STR);
					$resultado->bindParam(10,$clientecel,PDO::PARAM_STR);
					$resultado->bindParam(11,$clienterfc,PDO::PARAM_STR);
					$resultado->bindParam(12,$cedulafiscal,PDO::PARAM_STR);
					$resultado->bindParam(13,$clienteciudad,PDO::PARAM_STR);
					$resultado->bindParam(14,$clientepais,PDO::PARAM_STR);
					$resultado->bindParam(15,$nombencargadoemp,PDO::PARAM_STR);
					$resultado->bindParam(16,$clienteemail,PDO::PARAM_STR);
					$resultado->bindParam(17,$clienteactivado,PDO::PARAM_INT);
					$resultado->bindParam(18,$clientepasswd,PDO::PARAM_STR);
					$resultado->bindParam(19,$emailcreo,PDO::PARAM_STR);
					$resultado->bindParam(20,$emailcreo,PDO::PARAM_STR);
					$resultado->bindParam(21,$recibirinfo,PDO::PARAM_INT);
					$resultado->bindParam(22,$idtipocliente,PDO::PARAM_INT);
				    $resultado->execute();
				    
					if($resultado->rowCount()>0){

						$id = $conexionPDO->lastInsertId();
						
						return $id;

					}else{
						return $resultado->rowCount();
					}
				} catch(PDOException $e){
					return false;
				}

			}

		}catch(PDOException $e){
			return false;
		}  
    }

    /*se obtiene el registro del cliente por emial y password */
	public static function getTblclienteBySession($clienteemail,$clientepassword){
	    
	    $activado=1;
		$consulta = "SELECT * FROM tblcliente WHERE tblcliente_email = ? AND tblcliente_password = ? AND tblcliente_activado = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$clienteemail,PDO::PARAM_STR);
			$resultado->bindParam(2,$clientepassword,PDO::PARAM_STR);
			$resultado->bindParam(3,$activado,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}

	/*Funcion para obtener todas la ordenes hechas por el cliente */
	public static function getAllTblordencompraByidcliente($idtblcliente){
		
		$pagado=1;
		$consulta = "SELECT * FROM tblordencompra TOC WHERE TOC.tblordencompra_statuspagado = ? AND TOC.tblcliente_idtblcliente = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$pagado,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblcliente,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}

	/*Funcion que se obtiene el historial de los cupones usados por el cliente*/
	public static function getAllTblhistcupondescuentoByidcliente($idtblcliente){

		$consulta = "SELECT * FROM tblhistcupondescuento WHERE tblhistcupondescuento_idtblcliente = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblcliente,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}

	/*Funcion que se obtiene  los cupones no usados por el cliente y activos */
	public static function getAllTblcuponesdescuentoNuevosByidcliente($idtblcliente){

		$activado=1;
		$consulta = "SELECT * FROM tblcupondescuento TCD LEFT JOIN tblhistcupondescuento THCD ON TCD.tblcupondescuento_codigo = THCD.tblhistcupondescuento_cupon WHERE THCD.tblhistcupondescuento_idtblcliente= ? is NULL and TCD.tblcupondescuento_activado= ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblcliente,PDO::PARAM_INT);
			$resultado->bindParam(2,$activado,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}

	/*Funcion que se obtiene  los cupones no usados por el cliente y no activos */
	public static function getAllTblcuponesdescuentoObsoletosByidcliente($idtblcliente){

		$activado=0;
		$consulta = "SELECT * FROM tblcupondescuento TCD LEFT JOIN tblhistcupondescuento THCD ON TCD.tblcupondescuento_codigo = THCD.tblhistcupondescuento_cupon WHERE THCD.tblhistcupondescuento_idtblcliente= ? is NULL and TCD.tblcupondescuento_activado= ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblcliente,PDO::PARAM_INT);
			$resultado->bindParam(2,$activado,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
		
	}
	

	/*Funcion para obtner los productos complementarios para carrito */
	public static function getAllTblproductcomplemByTblordencompra($idtblordencompra,$fechapedido){

		$fechapedidoingresada = new DateTime($fechapedido);
        $fechahoy = new DateTime("now");
        $interval= $fechahoy->diff($fechapedidoingresada);
        $diasMinimos= $interval->format('%d');
        
        $diasemana= $fechapedidoingresada->format('l');        
        
       if($fechapedidoingresada == $fechahoy){ 
            $tipodepedido= 1; //pedidoparahoy
            $stock=1;
        }else{
            $tipodepedido= 2; //pedidoparaotrodia
            $stock=0;
        }


		$activado=1;
		$consulta = "SELECT TPC.*, TPV.* FROM tblproductcomplem TPC
			INNER JOIN tblproveedor TPV ON TPC.tblproveedor_idtblproveedor = TPV.idtblproveedor
			INNER JOIN tblproducto TP ON TPV.idtblproveedor = TP.tblproveedor_idtblproveedor 
			INNER JOIN tblproductdetalle TPD ON TP.idtblproducto = TPD.tblproducto_idtblproducto
			INNER JOIN tblcarritoproduct TCP ON TPD.idtblproductdetalle = TCP.tblcarritoproduct_idtblproductdetalle
				WHERE TCP.tblcarritoproduct_idtblordencompra = ? AND 
					  TPC.tblproductcomplem_activado = ? AND 
					  TPC.tblproductcomplem_stock >= ? 
				GROUP BY TPC.idtblproductcomplem";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblordencompra,PDO::PARAM_INT);
			$resultado->bindParam(2,$activado,PDO::PARAM_INT);
			$resultado->bindParam(3,$stock,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	

	//obtiene los proveedores de acuerdo a los datos ingresados por el cliente 
    public static function getAllTblproveedorByFiltro($idtblcolonia,$idtbltipodeservicio,$fechapedido,$hora){
        
        $activado=1;
        
        $fechapedidoingresada = new DateTime($fechapedido);
        $fechahoy = new DateTime("now");
        $interval= $fechahoy->diff($fechapedidoingresada);
        $diasMinimos= $interval->format('%d');
        
        $diasemana= $fechapedidoingresada->format('l');
        
        $tipopedidoCompleto=3;
        $tipodeservicioCompleto=3; 
        
        
       if($fechapedidoingresada == $fechahoy){ 
            $tipodepedido= 1; //pedidoparahoy
            $stock=1;
        }else{
            $tipodepedido= 2; //pedidoparaotrodia
            $stock=0;
        }
        
        
        if($idtbltipodeservicio==1){ //Entrega en Pasteleria
            
            $consulta = "SELECT TP.* FROM tblproveedor TP 
		             INNER JOIN tblproducto TPR ON TP.idtblproveedor = TPR.tblproveedor_idtblproveedor
		             INNER JOIN tblproductdetalle TPRD ON TPRD.tblproducto_idtblproducto = TPR.idtblproducto
		             INNER JOIN tblhrsprovtienda THP ON THP.tblproveedor_idtblproveedor = TP.idtblproveedor
		             INNER JOIN tbldiaprovservicio TDP ON TDP.tblproveedor_idtblproveedor = TP.idtblproveedor
		             INNER JOIN tbldiasemana TDS ON TDS.idtbldiasemana = TDP.tbldiasemana_idtbldiasemana
		             INNER JOIN tblhraabre TA ON THP.tblhraabre_idtblhraabre = TA.idtblhraabre
		             INNER JOIN tblhracierra TC ON THP.tblhracierra_idtblhracierra = TC.idtblhracierra
		             INNER JOIN tblhora THa ON THa.idtblhora = TA.tblhora_idtblhora 
		             INNER JOIN tblhora THc ON THc.idtblhora = TC.tblhora_idtblhora
		             WHERE TP.tblproveedor_activado = ? 
		             	AND (TP.tbltiposervicio_idtbltiposervicio = ? OR TP.tbltiposervicio_idtbltiposervicio = ? )
			             AND TP.tblcolonia_idtblcolonia = ?
			             AND TPR.tblproducto_activado = ?
			             AND TPRD.tblproductdetalle_activado = ?
			             AND TPRD.tblproductdetalle_stock >= ?
			             AND TPRD.tblproductdetalle_diaselaboracion <= ?
			             AND TDS.tbldiasemana_dia = ?
			             AND CAST(? AS TIME ) BETWEEN THa.tblhora_hora AND THc.tblhora_hora
			             GROUP BY TP.idtblproveedor";
            try{
                        $resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
                        $resultado->bindParam(1,$activado,PDO::PARAM_INT);
                        $resultado->bindParam(2,$idtbltipodeservicio,PDO::PARAM_INT);
                        $resultado->bindParam(3,$tipodeservicioCompleto,PDO::PARAM_INT);
                        $resultado->bindParam(4,$idtblcolonia,PDO::PARAM_INT);
                        $resultado->bindParam(5,$activado,PDO::PARAM_INT);
                        $resultado->bindParam(6,$activado,PDO::PARAM_INT);
                        $resultado->bindParam(7,$stock,PDO::PARAM_INT);
                        $resultado->bindParam(8,$diasMinimos,PDO::PARAM_INT);
                        $resultado->bindParam(9,$diasemana,PDO::PARAM_STR);
                        $resultado->bindParam(10,$hora,PDO::PARAM_STR);
                        $resultado->execute();
                        return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro
                   } catch(PDOException $e){
                    return false;      
                   }
        
        }else{//Entrega en Domicilio
        
        
             $consulta="SELECT TP.* FROM tblproveedor TP 
		       INNER JOIN tblproducto TPR ON TP.idtblproveedor = TPR.tblproveedor_idtblproveedor
               INNER JOIN tblproductdetalle TPRD ON TPRD.tblproducto_idtblproducto = TPR.idtblproducto
               INNER JOIN tbldiaprovservicio TDP ON TDP.tblproveedor_idtblproveedor = TP.idtblproveedor
                INNER JOIN tbldiasemana TDS ON TDS.idtbldiasemana = TDP.tbldiasemana_idtbldiasemana
                    WHERE TP.tblproveedor_activado = ? 
                    	AND (TP.tbltiposervicio_idtbltiposervicio = ? OR TP.tbltiposervicio_idtbltiposervicio = ? )
                         AND TPR.tblproducto_activado = ?
                         AND TPRD.tblproductdetalle_activado = ?
                         AND TPRD.tblproductdetalle_stock >= ?
                         AND TPRD.tblproductdetalle_diaselaboracion <= ?
                         AND TDS.tbldiasemana_dia = ?
                       GROUP BY TP.idtblproveedor";
            try{
                        $resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
                        $resultado->bindParam(1,$activado,PDO::PARAM_INT);
                        $resultado->bindParam(2,$idtbltipodeservicio,PDO::PARAM_INT);
                        $resultado->bindParam(3,$tipodeservicioCompleto,PDO::PARAM_STR);
                        $resultado->bindParam(4,$activado,PDO::PARAM_INT);
                        $resultado->bindParam(5,$activado,PDO::PARAM_INT);
                        $resultado->bindParam(6,$stock,PDO::PARAM_INT);
                        $resultado->bindParam(7,$diasMinimos,PDO::PARAM_INT);
                        $resultado->bindParam(8,$diasemana,PDO::PARAM_STR);
                        $resultado->execute();
                        return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro
                   } catch(PDOException $e){
                    return false;      
                   }
        
        }
        
    }



    //Obtiene las categorias por los datos ingresados por el cliente
    public static function getAllTblcategproductByFiltro($idtblcolonia,$idtbltipodeservicio,$fechapedido,$hora){
        
        $activado=1;
        
        $fechapedidoingresada = new DateTime($fechapedido);
        $fechahoy = new DateTime("now");
        $interval= $fechahoy->diff($fechapedidoingresada);
        $diasMinimos= $interval->format('%d');
        
        $diasemana= $fechapedidoingresada->format('l');
        
        $tipopedidoCompleto=3;
        $tipodeservicioCompleto=3; 
        
        
       if($fechapedidoingresada == $fechahoy){ 
            $tipodepedido= 1; //pedidoparahoy
            $stock=1;
        }else{
            $tipodepedido= 2; //pedidoparaotrodia
            $stock=0;
        }
        
        
        if($idtbltipodeservicio==1){ //Entrega en Pasteleria
            
            $consulta = "SELECT TCP.* FROM tblcategproduct TCP
            			INNER JOIN	tblproducto TPR ON TCP.idtblcategproduct = TPR.tblcategproduct_idtblcategproduct		              
		             INNER JOIN tblproveedor TP ON TP.idtblproveedor = TPR.tblproveedor_idtblproveedor
		             INNER JOIN tblproductdetalle TPRD ON TPRD.tblproducto_idtblproducto = TPR.idtblproducto
		             INNER JOIN tblhrsprovtienda THP ON THP.tblproveedor_idtblproveedor = TP.idtblproveedor
		             INNER JOIN tbldiaprovservicio TDP ON TDP.tblproveedor_idtblproveedor = TP.idtblproveedor
		             INNER JOIN tbldiasemana TDS ON TDS.idtbldiasemana = TDP.tbldiasemana_idtbldiasemana
		             INNER JOIN tblhraabre TA ON THP.tblhraabre_idtblhraabre = TA.idtblhraabre
		             INNER JOIN tblhracierra TC ON THP.tblhracierra_idtblhracierra = TC.idtblhracierra
		             INNER JOIN tblhora THa ON THa.idtblhora = TA.tblhora_idtblhora 
		             INNER JOIN tblhora THc ON THc.idtblhora = TC.tblhora_idtblhora
		             WHERE TP.tblproveedor_activado = ? 
		             	AND (TP.tbltiposervicio_idtbltiposervicio = ? OR TP.tbltiposervicio_idtbltiposervicio = ? )
			             AND TP.tblcolonia_idtblcolonia = ?
			             AND TPR.tblproducto_activado = ?
			             AND TPRD.tblproductdetalle_activado = ?
			             AND TPRD.tblproductdetalle_stock >= ?
			             AND TPRD.tblproductdetalle_diaselaboracion <= ?
			             AND TDS.tbldiasemana_dia = ?
			             AND CAST(? AS TIME ) BETWEEN THa.tblhora_hora AND THc.tblhora_hora
			             AND TCP.tblcategproduct_activado = ?
			             GROUP BY TCP.idtblcategproduct";
            try{
                        $resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
                        $resultado->bindParam(1,$activado,PDO::PARAM_INT);
                        $resultado->bindParam(2,$idtbltipodeservicio,PDO::PARAM_INT);
                        $resultado->bindParam(3,$tipodeservicioCompleto,PDO::PARAM_INT);
                        $resultado->bindParam(4,$idtblcolonia,PDO::PARAM_INT);
                        $resultado->bindParam(5,$activado,PDO::PARAM_INT);
                        $resultado->bindParam(6,$activado,PDO::PARAM_INT);
                        $resultado->bindParam(7,$stock,PDO::PARAM_INT);
                        $resultado->bindParam(8,$diasMinimos,PDO::PARAM_INT);
                        $resultado->bindParam(9,$diasemana,PDO::PARAM_STR);
                        $resultado->bindParam(10,$hora,PDO::PARAM_STR);
                        $resultado->bindParam(11,$activado,PDO::PARAM_INT);
                        $resultado->execute();
                        return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro
                   } catch(PDOException $e){
                    return false;      
                   }
        
        }else{//Entrega en Domicilio
        
        
             $consulta="SELECT TCP.* FROM tblcategproduct TCP
            			INNER JOIN	tblproducto TPR ON TCP.idtblcategproduct = TPR.tblcategproduct_idtblcategproduct		              
		             INNER JOIN tblproveedor TP ON TP.idtblproveedor = TPR.tblproveedor_idtblproveedor
               INNER JOIN tblproductdetalle TPRD ON TPRD.tblproducto_idtblproducto = TPR.idtblproducto
               INNER JOIN tbldiaprovservicio TDP ON TDP.tblproveedor_idtblproveedor = TP.idtblproveedor
                INNER JOIN tbldiasemana TDS ON TDS.idtbldiasemana = TDP.tbldiasemana_idtbldiasemana
                    WHERE TP.tblproveedor_activado = ? 
                    	AND (TP.tbltiposervicio_idtbltiposervicio = ? OR TP.tbltiposervicio_idtbltiposervicio = ? )
                         AND TPR.tblproducto_activado = ?
                         AND TPRD.tblproductdetalle_activado = ?
                         AND TPRD.tblproductdetalle_stock >= ?
                         AND TPRD.tblproductdetalle_diaselaboracion <= ?
                         AND TDS.tbldiasemana_dia = ?
                         AND TCP.tblcategproduct_activado = ?
			             GROUP BY TCP.idtblcategproduct";
            try{
                        $resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
                        $resultado->bindParam(1,$activado,PDO::PARAM_INT);
                        $resultado->bindParam(2,$idtbltipodeservicio,PDO::PARAM_INT);
                        $resultado->bindParam(3,$tipodeservicioCompleto,PDO::PARAM_STR);
                        $resultado->bindParam(4,$activado,PDO::PARAM_INT);
                        $resultado->bindParam(5,$activado,PDO::PARAM_INT);
                        $resultado->bindParam(6,$stock,PDO::PARAM_INT);
                        $resultado->bindParam(7,$diasMinimos,PDO::PARAM_INT);
                        $resultado->bindParam(8,$diasemana,PDO::PARAM_STR);
                        $resultado->bindParam(9,$activado,PDO::PARAM_INT);
                        $resultado->execute();
                        return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro
                   } catch(PDOException $e){
                    return false;      
                   }
        
        }
        
    }

    /*Funcion para obtner las novedades activas por una intervalo de 1 mes*/
	public static function getAllTblnovedadesAct(){

		$fechahoy = new DateTime("now");
		$fechahoyformato = $fechahoy->format('Y-m-d');
		$fechainicio = $fechahoy->sub(new DateInterval('P30D'));
		$fechainicioformato = $fechainicio->format('Y-m-d');
		$activado=1;
		$consulta = "SELECT * FROM tblnovedades 
						WHERE tblnovedades_activado =?
						AND ((tblnovedades_fchcreacion BETWEEN ? AND ?) 
						  OR (tblnovedades_fchmodificacion BETWEEN ? AND ?) 
						)
						";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$activado,PDO::PARAM_INT);
			$resultado->bindParam(2,$fechainicioformato,PDO::PARAM_STR);
			$resultado->bindParam(3,$fechahoyformato,PDO::PARAM_STR);
			$resultado->bindParam(4,$fechainicioformato,PDO::PARAM_STR);
			$resultado->bindParam(5,$fechahoyformato,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}

	/*Funcion para obtner los testimonios activas */
	public static function getAllTbltestimonioAct(){

		
		$activado=1;
		$consulta = "SELECT * FROM tbltestimonio WHERE tbltestimonio_activado =?	";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$activado,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}


	 /*Muestra en numero el total de las colonias registradas en base a una ciudad en especifica */
    public static function getCountAllTblcoloniasByTblCiudad($tblciudad_idtblciudad){
        
        $consulta = "SELECT COUNT(*) FROM tblcolonia WHERE tblciudad_idtblciudad =?"; 
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);			
			$resultado->bindParam(1,$tblciudad_idtblciudad,PDO::PARAM_INT);
			$resultado->execute();
		   return $resultado->fetchColumn(0); //retorna el numero de count		
		}catch(PDOException $e){
			return false;
		}
    }
	
	/*Muestra en numero el total ciudades registradas */
    public static function getCountAllTblCiudad(){ 
        
        $consulta = "SELECT COUNT(*) FROM tblciudad "; 
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);			
			$resultado->execute();
		   return $resultado->fetchColumn(0); //retorna el numero de count		
		}catch(PDOException $e){
			return false;
		}
    }

    /*Consultar todas las Ciudades (Este Activo o Inactivo) con nombre del pais al que pertenecen**/
	public static function getAllTblciudadByTblPais(){
		
		$consulta = "SELECT TC.*,TP.* FROM tblciudad TC 
                     INNER JOIN tblpais TP ON TP.idtblpais=TC.tblpais_idtblpais
					 ORDER BY TC.tblciudad_nombre ASC";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos de todos los registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Actualizar el estatus de un registro en tblciudad*/
	 public static function setUpdateTblCiudadEstatus($idtblciudad,$activado,$emailmodifico){
        
        $insert ="UPDATE tblciudad SET tblciudad_activado = ?,tblciudad_fchmodificacion = NOW(),
		          tblciudad_emailusuamodifico = ? WHERE idtblciudad= ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);			
			$resultado->bindParam(1,$activado,PDO::PARAM_INT);			
			$resultado->bindParam(2,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(3,$idtblciudad,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }

	 /*Actualizar Ciudad pero no el estatus*/
	public static function setUpdateTblCiudadSinEst($idtblciudad, $nombreciudad,$idtblpais, $emailmodifico){

		$update = "UPDATE tblciudad SET tblciudad_nombre = ?,tblpais_idtblpais = ?, 
		          tblciudad_fchmodificacion = NOW(), tblciudad_emailusuamodifico= ? WHERE idtblciudad = ?";
      
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$nombreciudad,PDO::PARAM_STR);			
			$resultado->bindParam(2,$idtblpais,PDO::PARAM_INT);
			$resultado->bindParam(3,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(4,$idtblciudad,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el update
		}catch(PDOException $e){
			return false;
		}
	}

	
	 /*Obtiene todas las colonias (activo o inactivo) en base a la ciudad a la que pertenece*/
    public static function getAllTblcoloniaByTblciudadPertenecen($tblciudad_idtblciudad){       
         $consulta = "SELECT TC.*,TD.* FROM tblcolonia TC
               INNER JOIN tblciudad TD ON TD.idtblciudad = TC.tblciudad_idtblciudad               
               WHERE TC.tblciudad_idtblciudad= ? ORDER BY TC.tblcolonia_nombre ASC;";
		
            
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$tblciudad_idtblciudad,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Actualizar el estatus de un registro en tblcolonia*/
	 public static function setUpdateTblColoniaEstatus($idtblcolonia,$activado,$emailmodifico){
        
        $insert ="UPDATE tblcolonia SET tblcolonia_activado = ?,tblcolonia_fchmodificacion = NOW(),
		         tblcolonia_emailusuamodifico = ? WHERE idtblcolonia= ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);			
			$resultado->bindParam(1,$activado,PDO::PARAM_INT);			
			$resultado->bindParam(2,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(3,$idtblcolonia,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
	
	/*Actualizar Colonia pero no el estatus*/
	public static function setUpdateTblcoloniaSinEst($idtblcolonia, $nombrecolonia,$codipost,$idtblciudad, $emailmodifico){

		$update = "UPDATE tblcolonia SET tblcolonia_nombre = ?,tblcolonia_codipost = ?, tblciudad_idtblciudad = ?, tblcolonia_fchmodificacion = NOW(), tblcolonia_emailusuamodifico= ? WHERE idtblcolonia = ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$nombrecolonia,PDO::PARAM_STR);
			$resultado->bindParam(2,$codipost,PDO::PARAM_INT);			
			$resultado->bindParam(3,$idtblciudad,PDO::PARAM_INT);
			$resultado->bindParam(4,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(5,$idtblcolonia,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el update
		}catch(PDOException $e){
			return false;
		}
	}

    /*Muestra en numero el total de los proveedores registrados en base a una ciudad en especifica */
    public static function getCountAllTblproveedorByTblCiudad($tblciudad_idtblciudad){
        $inactivado=2;
        $consulta = "SELECT COUNT(*) FROM tblproveedor TP
                 INNER JOIN tblcolonia TC ON TP.tblcolonia_idtblcolonia=TC.idtblcolonia
                 WHERE NOT TP.tblproveedor_activado=? AND TC.tblciudad_idtblciudad =?";
			 
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);			
			$resultado->bindParam(1,$inactivado,PDO::PARAM_INT);
			$resultado->bindParam(2,$tblciudad_idtblciudad,PDO::PARAM_INT);
			$resultado->execute();
		   return $resultado->fetchColumn(0); //retorna el numero de count		
		}catch(PDOException $e){
			return false;
		}
    }
	
	
	/*Muestra todas las Ciudades (Activas) y que tengan colonias **/
	public static function getAllTblciudadActAByColonia(){
		
		$activado=1;
		$consulta = "SELECT Distinct(DA.tblciudad_nombre),DA.idtblciudad 
		             FROM tblciudad DA 
	INNER JOIN tblcolonia TC ON DA.idtblciudad=TC.tblciudad_idtblciudad       
                     WHERE DA.tblciudad_activado = ?";						  
		
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$activado,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos de todos los registro 
		} catch(PDOException $e){
			return false;
		}
	}

	
	
	/*Consulta todas las Colonias (activas) en base a la ciudad a la que pertenecen*/
	public static function getAllTblcoloniaByTblCiudad($idtblciudad){	             
		$activo=1;
		$consulta = "SELECT TCO.* FROM tblcolonia TCO 
                    INNER JOIN tblciudad TCD ON TCO.tblciudad_idtblciudad=TCD.idtblciudad
                    WHERE TCO.tblcolonia_activado=? AND TCD.idtblciudad =?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$activo,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblciudad,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Obtiene todos los proveedores en base a la ciudad a la que pertenece*/
    public static function getAllTblproveedorbyTblciudad($tblciudad_idtblciudad){       
         $consulta = "SELECT TP.*,TC.*,TPED.*,TS.*,
                      TA.*,TCDD.* FROM tblproveedor TP                      
               INNER JOIN tblcolonia TC ON TP.tblcolonia_idtblcolonia=TC.idtblcolonia
			   INNER JOIN tblciudad TCDD ON TCDD.idtblciudad=TC.tblciudad_idtblciudad
               INNER JOIN tbltipopedido TPED ON TP.tbltipopedido_idtbltipopedido=TPED.idtbltipopedido
               INNER JOIN tbltiposervicio TS ON TP.tbltiposervicio_idtbltiposervicio = TS.idtbltiposervicio
               INNER JOIN tblpaquete TA ON TP.tblpaquete_idtblpaquete = TA.idtblpaquete
               WHERE TC.tblciudad_idtblciudad= ? ORDER BY TP.tblproveedor_nombre ASC";		

		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$tblciudad_idtblciudad,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Borrar datos del proveedor */
	public static function setDeleteTblproveedor1($id,$email,$cel,$banco,$clave,$titular,$rfc,$tel,$ext,$dire,$emailmodifico,$estatus){
                                                 
		$update = "UPDATE tblproveedor SET 		
		tblproveedor_direccion=?,tblproveedor_telefonotienda=?,tblproveedor_extencion=?,
		tblproveedor_celular=?,tblproveedor_email=?,
		tblproveedor_rfc=?,tblproveedor_claveintban=?,tblproveedor_banco=?,tblproveedor_nombretitucuen=?,
		tblproveedor_fchmodificacion = NOW(), tblproveedor_emailusuamodifico =?,tblproveedor_activado=?
		WHERE idtblproveedor = ?";
     	
		
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);			
			$resultado->bindParam(1,$dire,PDO::PARAM_STR);			
			$resultado->bindParam(2,$tel,PDO::PARAM_STR);
            $resultado->bindParam(3,$ext,PDO::PARAM_STR);
            $resultado->bindParam(4,$cel,PDO::PARAM_STR);
            $resultado->bindParam(5,$email,PDO::PARAM_STR);           
            $resultado->bindParam(6,$rfc,PDO::PARAM_STR);
            $resultado->bindParam(7,$clave,PDO::PARAM_STR);
            $resultado->bindParam(8,$banco,PDO::PARAM_STR);	
            $resultado->bindParam(9,$titular,PDO::PARAM_STR);            		
			$resultado->bindParam(10,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(11,$estatus,PDO::PARAM_INT);
			$resultado->bindParam(12,$id,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el update
		}catch(PDOException $e){
			return false;
		}
	}
	
	/*muestra los datos del proveedor para posteriormente modificar sus datos */
    public static function getTblproveedorByCiudad($idtblproveedor){
	    
		$consulta = "SELECT TBP.*,TBCO.* FROM tblproveedor TBP
                    INNER JOIN tblcolonia TBCO ON TBCO.idtblcolonia=TBP.tblcolonia_idtblcolonia   
                    WHERE TBP.idtblproveedor = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Actualizar el estatus de un registro en tblproveedor*/
	 public static function setUpdateTblproveedorEstatus($idtblproveedor,$activado,$emailmodifico){
        
        $insert ="UPDATE tblproveedor SET tblproveedor_activado = ?,tblproveedor_fchmodificacion = NOW(),tblproveedor_emailusuamodifico = ? WHERE 	idtblproveedor  = ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);			
			$resultado->bindParam(1,$activado,PDO::PARAM_INT);			
			$resultado->bindParam(2,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(3,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
	
	
	/*Insertar un registro en tblproveedor*/
	 public static function setTblproveedor2($nombreprov,$srclogo,$descripcion,$direccion,$seo,$telftienda,$extencion,$celular,$email,$rfc,$clave,$banco,$titular,$activado,$idtbltipopedido,$idtbltiposervicio,$idtblcolonia,$idtblpaquete,$emailcreo){
                    
        $insert ="INSERT INTO tblproveedor (tblproveedor_nombre,tblproveedor_srclogo,tblproveedor_descripcion,tblproveedor_direccion,tblproveedor_seo,tblproveedor_telefonotienda,tblproveedor_extencion,tblproveedor_celular,tblproveedor_email,tblproveedor_rfc,tblproveedor_claveintban,tblproveedor_banco,tblproveedor_nombretitucuen,tblproveedor_activado,tbltipopedido_idtbltipopedido,tbltiposervicio_idtbltiposervicio,tblcolonia_idtblcolonia,tblpaquete_idtblpaquete,tblproveedor_fchmodificacion,tblproveedor_fchcreacion,tblproveedor_emailusuacreo,tblproveedor_emailusuamodifico) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW(),NOW(),?,?)"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombreprov,PDO::PARAM_STR);
			$resultado->bindParam(2,$srclogo,PDO::PARAM_STR);
			$resultado->bindParam(3,$descripcion,PDO::PARAM_STR);
			$resultado->bindParam(4,$direccion,PDO::PARAM_STR);
			$resultado->bindParam(5,$seo,PDO::PARAM_STR);
			$resultado->bindParam(6,$telftienda,PDO::PARAM_STR);
			$resultado->bindParam(7,$extencion,PDO::PARAM_STR);
			$resultado->bindParam(8,$celular,PDO::PARAM_STR);
			$resultado->bindParam(9,$email,PDO::PARAM_STR); 
			$resultado->bindParam(10,$rfc,PDO::PARAM_STR);
			$resultado->bindParam(11,$clave,PDO::PARAM_STR);
			$resultado->bindParam(12,$banco,PDO::PARAM_STR);
			$resultado->bindParam(13,$titular,PDO::PARAM_STR);
			$resultado->bindParam(14,$activado,PDO::PARAM_INT);
			$resultado->bindParam(15,$idtbltipopedido,PDO::PARAM_INT);
			$resultado->bindParam(16,$idtbltiposervicio,PDO::PARAM_INT);
			$resultado->bindParam(17,$idtblcolonia,PDO::PARAM_INT);
			$resultado->bindParam(18,$idtblpaquete,PDO::PARAM_INT);
			$resultado->bindParam(19,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(20,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
	
	
	
	/*Actualizar un registro en tblproveedor (aqui no cambia el estatus)*/
	 public static function setUpdateTblproveedor2($idtblproveedor,$nombreprov,$srclogo,$descripcion,$direccion,$seo,$telftienda,$extencion,$celular,$email,$rfc,$clave,$banco,$titular,$idtbltipopedido,$idtbltiposervicio,$idtblcolonia,$idtblpaquete,$emailmodifico){
        
        $insert ="UPDATE tblproveedor SET tblproveedor_nombre = ?,
		tblproveedor_srclogo = ?,tblproveedor_descripcion = ?,tblproveedor_direccion = ?,
		tblproveedor_seo = ?,tblproveedor_telefonotienda = ?,tblproveedor_extencion = ?,
		tblproveedor_celular = ?,tblproveedor_email = ?, tblproveedor_rfc = ?,
        tblproveedor_claveintban = ?, tblproveedor_banco = ?,tblproveedor_nombretitucuen = ?,		
		tbltipopedido_idtbltipopedido = ?,	tbltiposervicio_idtbltiposervicio = ?,
		tblcolonia_idtblcolonia = ?,tblpaquete_idtblpaquete = ?,
		tblproveedor_fchmodificacion = NOW(),tblproveedor_emailusuamodifico = ? WHERE 	idtblproveedor  = ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombreprov,PDO::PARAM_STR);
			$resultado->bindParam(2,$srclogo,PDO::PARAM_STR);
			$resultado->bindParam(3,$descripcion,PDO::PARAM_STR);
			$resultado->bindParam(4,$direccion,PDO::PARAM_STR);
			$resultado->bindParam(5,$seo,PDO::PARAM_STR);
			$resultado->bindParam(6,$telftienda,PDO::PARAM_STR);
			$resultado->bindParam(7,$extencion,PDO::PARAM_STR);
			$resultado->bindParam(8,$celular,PDO::PARAM_STR);
			$resultado->bindParam(9,$email,PDO::PARAM_STR);			
			$resultado->bindParam(10,$rfc,PDO::PARAM_STR);	
			$resultado->bindParam(11,$clave,PDO::PARAM_STR);	
			$resultado->bindParam(12,$banco,PDO::PARAM_STR);	
			$resultado->bindParam(13,$titular,PDO::PARAM_STR);			
			$resultado->bindParam(14,$idtbltipopedido,PDO::PARAM_INT);
			$resultado->bindParam(15,$idtbltiposervicio,PDO::PARAM_INT);
			$resultado->bindParam(16,$idtblcolonia,PDO::PARAM_INT);
			$resultado->bindParam(17,$idtblpaquete,PDO::PARAM_INT);
			$resultado->bindParam(18,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(19,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
	
	
	
	/*Muestra en numero el total de productos registrados en base a un proveedor en especifico */
    public static function getCountAllProductosByProveedor($iddeproveedor){
        
        $consulta = "SELECT COUNT(*) FROM tblproducto P
               INNER JOIN tblproveedor PRO ON PRO.idtblproveedor = P.tblproveedor_idtblproveedor
               INNER JOIN tblcategproduct C ON C.idtblcategproduct = P.tblcategproduct_idtblcategproduct
               INNER JOIN tblproductdetalle D ON D.tblproducto_idtblproducto = P.idtblproducto
               WHERE P.tblproveedor_idtblproveedor=?";			   	       
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);			
			$resultado->bindParam(1,$iddeproveedor,PDO::PARAM_INT);
			$resultado->execute();
		   return $resultado->fetchColumn(0); //retorna el numero de count		
		}catch(PDOException $e){
			return false;
		}
    }
	
	/*Consultar todas las Ciudades (Activas) que tengan con colonias dadas de alta y que tengan proveedores **/
	public static function getAllTblciudadActAByProveedor(){
		
		$activado=1;
		$consulta = "SELECT Distinct(DA.tblciudad_nombre),
                     DA.idtblciudad FROM tblciudad DA 
                     INNER JOIN tblcolonia TC ON DA.idtblciudad=TC.tblciudad_idtblciudad 
                     INNER JOIN tblproveedor PRO ON PRO.tblcolonia_idtblcolonia = TC.idtblcolonia     
                     WHERE DA.tblciudad_activado =  ?";						  
		
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$activado,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos de todos los registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Consulta los proveedores en base a la ciudad a la que pertenecen*/
	public static function getAllProveedorByCiudad($idtblciudad){	             
		$consulta = "SELECT TP.*
                     FROM tblproveedor TP                      
                     INNER JOIN tblcolonia TC ON TP.tblcolonia_idtblcolonia=TC.idtblcolonia
                     INNER JOIN tblciudad TCDD ON TCDD.idtblciudad=TC.tblciudad_idtblciudad               
                     WHERE TC.tblciudad_idtblciudad= ? ORDER BY TP.tblproveedor_nombre ASC";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblciudad,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	/*Consultar todas las categorias en base a proveedor **/
	public static function getAllTblCategoriasByProveedor($idproveedor){		
		
		$consulta = "SELECT Distinct(C.tblcategproduct_nombre),
                     C.idtblcategproduct,PRO.idtblproveedor
                     FROM tblcategproduct C 
              INNER JOIN tblproducto P ON P.tblcategproduct_idtblcategproduct = C.idtblcategproduct
              INNER JOIN tblproveedor PRO ON PRO.idtblproveedor = P.tblproveedor_idtblproveedor 
			  WHERE P.tblproveedor_idtblproveedor=?";						  
		
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos de todos los registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Consultar todos los productos en base a categoria y por proveedor y muestra los ingredientes**/
	public static function getAllTblProductosByProvAndCategIngred($idproveedor,$idcategoria){		
		
		$consulta = "SELECT Distinct(I.tblespecificingrediente_nombre),I.idtblespecificingrediente
                     FROM tblcategproduct C
       INNER JOIN tblproducto P ON P.tblcategproduct_idtblcategproduct = C.idtblcategproduct
       INNER JOIN tblproveedor PRO ON PRO.idtblproveedor = P.tblproveedor_idtblproveedor
       INNER JOIN tblproductdetalle D ON D.tblproducto_idtblproducto = P.idtblproducto
       INNER JOIN tblespecificingrediente I ON I.idtblespecificingrediente= D.tblespecificingrediente_idtblespecificingrediente
       WHERE P.tblproveedor_idtblproveedor=? AND C.idtblcategproduct=?";						  
		
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idproveedor,PDO::PARAM_INT);
			$resultado->bindParam(2,$idcategoria,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos de todos los registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	
	/*Consultar todos los productos (activos o inactivos) en base a proveedor **/
	public static function getAllTblProductosByProveedor($idproveedor){		
		
		$consulta = "SELECT PRO.*,C.*,D.*,P.* FROM tblproducto P					 
               INNER JOIN tblproveedor PRO ON PRO.idtblproveedor = P.tblproveedor_idtblproveedor
               INNER JOIN tblcategproduct C ON C.idtblcategproduct = P.tblcategproduct_idtblcategproduct
               INNER JOIN tblproductdetalle D ON D.tblproducto_idtblproducto = P.idtblproducto
               WHERE P.tblproveedor_idtblproveedor=?";						  
		
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos de todos los registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Consultar imagenes de todos los productos en base a proveedor **/
	public static function getAllProductosImagByProveedor($producto,$detalle){		
		
		$consulta = "SELECT I.*,PRO.* FROM tblproductimg I
                    INNER JOIN tblproducto P ON I.tblproducto_idtblproducto = P.idtblproducto
                      INNER JOIN tblproveedor PRO ON PRO.idtblproveedor = P.tblproveedor_idtblproveedor 
                      INNER JOIN tblproductdetalle D ON D.tblproducto_idtblproducto = P.idtblproducto
                    WHERE P.idtblproducto= ? AND D.idtblproductdetalle= ? LIMIT 3"; 						  
		 
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);			
			$resultado->bindParam(1,$producto,PDO::PARAM_INT);
			$resultado->bindParam(2,$detalle,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos de todos los registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Actualizar el estatus de un producto */
	 public static function setUpdateTblproductoEstatus($idtblproducto,$activado,$emailmodifico){
        
        $insert ="UPDATE tblproductdetalle SET tblproductdetalle_activado = ?,
		     tblproductdetalle_fchmodificacion = NOW(),
		    tblproductdetalle_emailusuamodifico = ? WHERE idtblproductdetalle = ?";  

        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);			
			$resultado->bindParam(1,$activado,PDO::PARAM_INT);			
			$resultado->bindParam(2,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(3,$idtblproducto,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
	
	
	/*Consultar todos los productos en base a categoria y por proveedor **/
	public static function getAllTblProductosByProvAndCateg($idproveedor,$idcategoria){		
		
		$consulta = "SELECT PRO.*,C.*,P.*,D.* FROM tblproducto P
               INNER JOIN tblproveedor PRO ON PRO.idtblproveedor = P.tblproveedor_idtblproveedor
               INNER JOIN tblcategproduct C ON C.idtblcategproduct = P.tblcategproduct_idtblcategproduct
               INNER JOIN tblproductdetalle D ON D.tblproducto_idtblproducto = P.idtblproducto
			    WHERE P.tblproveedor_idtblproveedor=? AND C.idtblcategproduct=?";						  
		
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idproveedor,PDO::PARAM_INT);
			$resultado->bindParam(2,$idcategoria,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos de todos los registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene un registro de tblproductdetalle*/
    public static function getTblproductoDetalle2($idtblproductdetalle){
	    
		$consulta = "SELECT D.*,I.* FROM tblproductdetalle D
		INNER JOIN tblespecificingrediente I ON I.idtblespecificingrediente= D.tblespecificingrediente_idtblespecificingrediente
          WHERE D.idtblproductdetalle = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproductdetalle,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Consultar todos los productos en base a categoria,proveedor e ingrediente**/
	public static function getAllTblProductosByProvAndCategIngrediente($idproveedor,$idcategoria,$ingre){		
		
		$consulta = "SELECT PRO.*,C.*, P.*,D.* FROM tblproducto P
               INNER JOIN tblproveedor PRO ON PRO.idtblproveedor = P.tblproveedor_idtblproveedor
               INNER JOIN tblcategproduct C ON C.idtblcategproduct = P.tblcategproduct_idtblcategproduct
               INNER JOIN tblproductdetalle D ON D.tblproducto_idtblproducto = P.idtblproducto			   
               INNER JOIN tblespecificingrediente I ON I.idtblespecificingrediente= D.tblespecificingrediente_idtblespecificingrediente
               WHERE P.tblproveedor_idtblproveedor=? AND C.idtblcategproduct=? AND I.idtblespecificingrediente=?";						  
		
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idproveedor,PDO::PARAM_INT);
			$resultado->bindParam(2,$idcategoria,PDO::PARAM_INT);
			$resultado->bindParam(3,$ingre,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos de todos los registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Cuenta el numero de clientes invitados*/
	public static function getCountAllTblclientesInvitados(){ 
		$invitado=2;
		$check = "SELECT COUNT(*) FROM tblcliente WHERE tbltipocliente_idtbltipocliente= ? ";

		try{                                         
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$invitado,PDO::PARAM_INT);			
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Cuenta el numero de clientes registrados*/
	public static function getCountAllTblclientesRegistrados(){ 
		$invitado=1;
		$check = "SELECT COUNT(*) FROM tblcliente WHERE tbltipocliente_idtbltipocliente= ? ";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$invitado,PDO::PARAM_INT);			
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Obtiene todos los clientes invitados */
    public static function getAllTblclienteInvitados(){ 
     $invitado=2;	
         $consulta = "SELECT * FROM tblcliente
                     WHERE tbltipocliente_idtbltipocliente=? ORDER BY tblcliente_apellidos ASC";		

		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$invitado,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Obtiene todos los clientes registrados*/
    public static function getAllTblclienteRegistrados(){ 
      $registrado=1;	
         $consulta = "SELECT * FROM tblcliente
                     WHERE tbltipocliente_idtbltipocliente=? ORDER BY tblcliente_apellidos ASC";		

		try{       

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);			
			$resultado->bindParam(1,$registrado,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*cuenta el numero de ordenes compradas por un cliente*/
	public static function getCountAllOrdenesbyCliente($cliente){ 
		$check = "SELECT COUNT(*) FROM tblordencompra WHERE tblcliente_idtblcliente = ? ";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$cliente,PDO::PARAM_INT);			
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
	}
	
	/* cuenta el numero de cotizaciones que hay en una ciudad por producto normal*/
	public static function getCountAllTblordenescotizadorBynombreCiudad($nombreciudad){
      
	$consulta = "SELECT COUNT(*) FROM tblordencotizador TOC
		   INNER JOIN tblcarritoproductcotizador TCPC ON TCPC.tblordencotizador_idtblordencotizador = TOC.idtblordencotizador
		   INNER JOIN tblproductcotizador TPC ON TCPC.tblproductcotizador_idtblproductcotizador = TPC.idtblproductcotizador
		   INNER JOIN tblevento TE ON TPC.tblevento_idtblevento = TE.idtblevento  
		  WHERE TOC.tblordencotizador_ciudad = ? ";
      
        try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);			
			$resultado->bindParam(1,$nombreciudad,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		} catch(PDOException $e){
			return false;
		}
    }
	
	 /* Funcion para obtener las ordenes de cotizaciones de producto contestadas por ciudad */
    public static function getAllTblordenescotizadorBynombreCiudad($nombreciudad){
      
	$consulta = "SELECT TOC.*,TCPC.*,TPC.* ,TE.* FROM tblordencotizador TOC
		   INNER JOIN tblcarritoproductcotizador TCPC ON TCPC.tblordencotizador_idtblordencotizador = TOC.idtblordencotizador
		   INNER JOIN tblproductcotizador TPC ON TCPC.tblproductcotizador_idtblproductcotizador = TPC.idtblproductcotizador
		   INNER JOIN tblevento TE ON TPC.tblevento_idtblevento = TE.idtblevento  
		  WHERE TOC.tblordencotizador_ciudad = ? ";
      
        try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);			
			$resultado->bindParam(1,$nombreciudad,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
    }
	
	/* Funcion para obtener las ordenes de cotizaciones de productos detalle*/
    public static function getTblordenescotizadorByTblcarritocotizador2($idtblordencotizador,$idtblcarritoproductcotizador){
        
	$consulta = "SELECT TOC.*,TE.*,TCPC.*,TPC.*,PR.* FROM tblordencotizador TOC
		   INNER JOIN tblcarritoproductcotizador TCPC ON TCPC.tblordencotizador_idtblordencotizador = TOC.idtblordencotizador
		   INNER JOIN tblproductcotizador TPC ON TCPC.tblproductcotizador_idtblproductcotizador = TPC.idtblproductcotizador
		   INNER JOIN tblproveedor PR ON PR.idtblproveedor = TPC.tblproveedor_idtblproveedor
		   INNER JOIN tblevento TE ON TPC.tblevento_idtblevento = TE.idtblevento  
		   WHERE TOC.idtblordencotizador= ? AND TCPC.idtblcarritoproductcotizador = ?";   
        try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblordencotizador,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblcarritoproductcotizador,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
    }
	
	/*Obtiene todos los registros de tblcarritoproductnuevcotiza por ciudad*/
    public static function getAlltblcarritoproductnuevcotizadorByCiudad($nombreciudad){	    
		$consulta = "SELECT TCNC.*,COS.*,P.* FROM tblcarritoproductnuevcotiza TCNC		              
	     INNER JOIN tblordencotizador TOC ON TOC.idtblordencotizador = TCNC.tblordencotizador_idtblordencotizador
         INNER JOIN tblcostocotizacionproductnuevo COS ON COS.tblcarritoproductnuevcotiza_idtblcarritoproductnuevcotiza=TCNC.idtblcarritoproductnuevcotiza
         INNER JOIN tblproveedor P ON P.idtblproveedor=COS.tblproveedor_idtblproveedor
                     WHERE TOC.tblordencotizador_ciudad=?";		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);			
			$resultado->bindParam(1,$nombreciudad,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene un registro de tblcostocotizacionproductnuevo con nombre del proveedor*/
    public static function getTblcostocotizacionproductnuevoDatos($idtblcarritoproductnuevcotiza,$idtblproveedor){
	    
		$consulta = "SELECT N.*,P.* FROM tblcostocotizacionproductnuevo N 		             
					 INNER JOIN tblproveedor P ON P.idtblproveedor=N.tblproveedor_idtblproveedor         
					 WHERE N.tblcarritoproductnuevcotiza_idtblcarritoproductnuevcotiza = ? 
					 AND N.tblproveedor_idtblproveedor = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblcarritoproductnuevcotiza,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/* cuenta el numero de cotizaciones que hay en una ciudad por producto nuevo*/
	public static function getCountAlltblcarritoproductnuevcotizadorByCiudad($nombreciudad){
      
	$consulta = "SELECT COUNT(*) FROM tblcarritoproductnuevcotiza TCNC 
	     INNER JOIN tblordencotizador TOC ON TOC.idtblordencotizador = TCNC.tblordencotizador_idtblordencotizador
         INNER JOIN tblcostocotizacionproductnuevo COS ON COS.tblcarritoproductnuevcotiza_idtblcarritoproductnuevcotiza=TCNC.idtblcarritoproductnuevcotiza
         INNER JOIN tblproveedor P ON P.idtblproveedor=COS.tblproveedor_idtblproveedor
                     WHERE TOC.tblordencotizador_ciudad= ? ";
      
        try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);			
			$resultado->bindParam(1,$nombreciudad,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		} catch(PDOException $e){
			return false;
		}
    }
	
	
	/*Muestra el total de los cupones registrados en base a una ciudad en especifico */
    public static function getCountAllTblcupondescuentoByTblCiudad($tblciudad_idtblciudad){
        
        $consulta = "SELECT COUNT(*) FROM tblcupondescuento WHERE tblciudad_idtblciudad =?"; 
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);			
			$resultado->bindParam(1,$tblciudad_idtblciudad,PDO::PARAM_INT);
			$resultado->execute();
		   return $resultado->fetchColumn(0); //retorna el numero de count		
		}catch(PDOException $e){
			return false;
		}
    }
	
	/*Muestra el total de los cupones utilizados en base a una ciudad en especifica */
    public static function getCountAllTblcupondescuentoByTblCiudadHisto($tblciudad_idtblciudad){
        
        $consulta = "SELECT COUNT(*) FROM tblhistcupondescuento H
		            INNER JOIN tblcliente C ON C.idtblcliente = H.tblhistcupondescuento_idtblcliente
                INNER JOIN tblcupondescuento D ON D.idtblcupondescuento = H.tblcupondescuento_idtblcupondescuento   
                WHERE D.tblciudad_idtblciudad = ?";
		
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);			
			$resultado->bindParam(1,$tblciudad_idtblciudad,PDO::PARAM_INT);
			$resultado->execute();
		   return $resultado->fetchColumn(0); //retorna el numero de count		
		}catch(PDOException $e){
			return false;
		}
    }
	
	/*Consultar una Cupon (Este Activo o Inactivo) en una ciudad   */
	public static function getTblcupon1($idcupon){
	    
		$consulta = "SELECT C.* FROM tblcupondescuento C 
                    INNER JOIN tblciudad CD ON CD.idtblciudad = C.tblciudad_idtblciudad                    
                      WHERE C.idtblcupondescuento=?";		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idcupon,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Actualizar Cupon pero no el estatus*/
	public static function setUpdateTblcupondescuentoSinEst($idcupon,$nombre,$valor,$idciudad,$emailmodifico){

		$update = "UPDATE tblcupondescuento SET tblcupondescuento_codigo = ?,
		  tblcupondescuento_descuento = ?, tblciudad_idtblciudad = ?, 
		  tblcupondescuento_fchmodificacion = NOW(), tblcupondescuento_emailusuamodifico= ? 
		  WHERE idtblcupondescuento = ?";
      
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$nombre,PDO::PARAM_STR);
			$resultado->bindParam(2,$valor,PDO::PARAM_INT);			
			$resultado->bindParam(3,$idciudad,PDO::PARAM_INT);
			$resultado->bindParam(4,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(5,$idcupon,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el update
		}catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Consultar historial de Cupones */
	public static function getTblhistcupondescuento1($idciudad){
	    
		$consulta = "SELECT DATE(H.tblhistcupondescuento_fchcreacion) AS fecha,
		H.tblhistcupondescuento_cupon,C.*                   
                    FROM tblhistcupondescuento H
                INNER JOIN tblcliente C ON C.idtblcliente = H.tblhistcupondescuento_idtblcliente
                INNER JOIN tblcupondescuento D ON D.idtblcupondescuento = H.tblcupondescuento_idtblcupondescuento   
                WHERE D.tblciudad_idtblciudad=? ORDER BY fecha";		
		try{ 

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idciudad,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Obtiene todos los cupones en base a la ciudad a la que pertenecen*/
    public static function getAllTblcupondescuentoByTblciudadPertenecen($tblciudad_idtblciudad){       
         $consulta = "SELECT C.* FROM tblcupondescuento C
                      INNER JOIN tblciudad CD ON CD.idtblciudad = C.tblciudad_idtblciudad
                      WHERE C.tblciudad_idtblciudad=? ";
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$tblciudad_idtblciudad,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Actualizar el estatus de un cupon*/
	 public static function setUpdateTblcupondescuentoEstatus($idcupon,$activado,$emailmodifico){
        
        $insert ="UPDATE tblcupondescuento SET tblcupondescuento_activado = ?,
		         tblcupondescuento_fchmodificacion = NOW(),
		         tblcupondescuento_emailusuamodifico = ? WHERE idtblcupondescuento= ?"; 
        
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);			
			$resultado->bindParam(1,$activado,PDO::PARAM_INT);			
			$resultado->bindParam(2,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(3,$idcupon,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
	
	/*Verificar si existe un Cupon en una Ciudad*/
	public static function getCheckTblcuponDesc($nombre,$ciudad){

		$check = "SELECT COUNT(*) FROM tblcupondescuento WHERE tblcupondescuento_codigo = ? 
		         AND tblciudad_idtblciudad= ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$nombre,PDO::PARAM_STR);
			$resultado->bindParam(2,$ciudad,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Insertar una Cupon*/
	public static function setTblcuponparaDescuento($nombre,$valor,$estatus,$ciudad,$emailcreo){

		$insert ="INSERT INTO tblcupondescuento (tblcupondescuento_codigo,
                    tblcupondescuento_descuento,tblcupondescuento_activado,tblciudad_idtblciudad,
					tblcupondescuento_fchmodificacion, 
                    tblcupondescuento_fchcreacion,tblcupondescuento_emailusuacreo,
                     tblcupondescuento_emailusuamodifico) VALUES (?,?,?,?,NOW(),NOW(),?,?)";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombre,PDO::PARAM_STR);
			$resultado->bindParam(2,$valor,PDO::PARAM_INT);
			$resultado->bindParam(3,$estatus,PDO::PARAM_INT);
			$resultado->bindParam(4,$ciudad,PDO::PARAM_INT);
			$resultado->bindParam(5,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(6,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Consultar una usuario (Este Activo o Inactivo)*/
	public static function getTblUsuario($idtblusuario){
	    
		$consulta = "SELECT U.*,A.* FROM tblusuariosmount U 
                     INNER JOIN tblniveleacceso A ON A.idtblniveleacceso=U.tblniveleacceso_idtblniveleacceso
					 WHERE U.idtblusuariosmount=?";		   
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblusuario,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Actualizar Usuario pero no el estatus*/
	public static function setUpdateTblusuarioSinEst($nombre,$ap,$am,$email,$ciudad,$cel,$puesto,$emailmodifico,$id){

		$update = "UPDATE tblusuariosmount SET 
		tblusuariosmount_nombre =?,tblusuariosmount_apellidoPaterno =?,tblusuariosmount_apellidoMaterno=?,
		tblusuariosmount_email=?,tblciudad_idtblciudad=?,tblusuariosmount_celular=?,tblniveleacceso_idtblniveleacceso=?,
		tblusuariosmount_fchmodificacion = NOW(), tblusuariosmount_emailusuamodifico =? 
		WHERE idtblusuariosmount = ?";		
		
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$nombre,PDO::PARAM_STR);
			$resultado->bindParam(2,$ap,PDO::PARAM_STR);			
			$resultado->bindParam(3,$am,PDO::PARAM_STR);
			$resultado->bindParam(4,$email,PDO::PARAM_STR);
			$resultado->bindParam(5,$ciudad,PDO::PARAM_INT);
			$resultado->bindParam(6,$cel,PDO::PARAM_STR);
			$resultado->bindParam(7,$puesto,PDO::PARAM_INT);
			$resultado->bindParam(8,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(9,$id,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el update
		}catch(PDOException $e){
			return false;
		}
	}
	
	/*Verificar si existe un usuario ya registrado por email y telefono*/
	public static function getCheckTblusuario($email,$cel){

		$check = "SELECT COUNT(*) FROM tblusuariosmount WHERE tblusuariosmount_email = ? 
		          AND tblusuariosmount_celular= ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$email,PDO::PARAM_STR);
			$resultado->bindParam(2,$cel,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Consultar todos los Usuarios (Este Activo o Inactivo) con su puesto**/
	public static function getAllTblusuariosmount($ciudad){ 
		
		$consulta = "SELECT U.*,A.*,P.*,C.* FROM tblusuariosmount U 
                     INNER JOIN tblniveleacceso A ON A.idtblniveleacceso=U.tblniveleacceso_idtblniveleacceso
					 INNER JOIN tblciudad C ON C.idtblciudad=U.tblciudad_idtblciudad
					INNER JOIN tblpais P ON P.idtblpais=C.tblpais_idtblpais
					WHERE U.tblciudad_idtblciudad= ?";
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$ciudad,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos de todos los registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Borrar datos del usuario */
	public static function setDeleteTblusuariomount($email,$cel,$emailmodifico,$id){

		$update = "UPDATE tblusuariosmount SET 		
		tblusuariosmount_email=?,tblusuariosmount_celular=?,
		tblusuariosmount_fchmodificacion = NOW(), tblusuariosmount_emailusuamodifico =? 
		WHERE idtblusuariosmount = ?";		
		
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);			
			$resultado->bindParam(1,$email,PDO::PARAM_STR);			
			$resultado->bindParam(2,$cel,PDO::PARAM_STR);			
			$resultado->bindParam(3,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(4,$id,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el update
		}catch(PDOException $e){
			return false;
		}
	}
	
	
	
	/*Actualizar el estatus de un usuario*/
	 public static function setUpdateUsuario($idusuario,$activado,$emailmodifico){
        
        $insert ="UPDATE tblusuariosmount SET tblusuariosmount_activado = ?,
		          tblusuariosmount_fchmodificacion = NOW(),
		         tblusuariosmount_emailusuamodifico = ? WHERE idtblusuariosmount= ?"; 

        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);			
			$resultado->bindParam(1,$activado,PDO::PARAM_INT);			
			$resultado->bindParam(2,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(3,$idusuario,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
	
	/*Insertar un usuario*/
	public static function setTblusuariosmount($nombre,$apaterno,$amaterno,$email,$ciudad,$cel,$puesto,$pass,$estatus,$emailcreo){

		$insert ="INSERT INTO tblusuariosmount (tblusuariosmount_nombre,tblusuariosmount_apellidoPaterno,
		          tblusuariosmount_apellidoMaterno,tblusuariosmount_email,
		          tblciudad_idtblciudad,tblusuariosmount_celular,tblniveleacceso_idtblniveleacceso,
		          tblusuariosmount_password,tblusuariosmount_activado,tblusuariosmount_fchmodificacion,
                  tblusuariosmount_fchcreacion,tblusuariosmount_emailusuacreo,tblusuariosmount_emailusuamodifico) 
				  VALUES (?,?,?,?,?,?,?,?,?,NOW(),NOW(),?,?)";
          
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombre,PDO::PARAM_STR);
			$resultado->bindParam(2,$apaterno,PDO::PARAM_STR);
			$resultado->bindParam(3,$amaterno,PDO::PARAM_STR);
			$resultado->bindParam(4,$email,PDO::PARAM_STR);
			$resultado->bindParam(5,$ciudad,PDO::PARAM_INT);
			$resultado->bindParam(6,$cel,PDO::PARAM_STR);
			$resultado->bindParam(7,$puesto,PDO::PARAM_INT);
			$resultado->bindParam(8,$pass,PDO::PARAM_STR);
			$resultado->bindParam(9,$estatus,PDO::PARAM_INT);
			$resultado->bindParam(10,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(11,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}

	}
	
	
	/*Insertar una notificacion*/
	public static function setTblnotificacionAlta($tipoN,$asunto,$mensaje,$emisor,$idSeccion,$emailcreo){
       
		$insert ="INSERT INTO tblnotificacion (tblnotificacion_tipo,tblnotificacion_asunto,
                   tblnotificacion_mensaje,tblnotificacion_emisor,
                   tblnotificacionredireccion_idtblnotificacionredireccion,
                   tblnotificacion_fchmodificacion,tblnotificacion_fchcreacion,
                   tblnotificacion_emailusuacreo,tblnotificacion_emailusuamodifico) 
				   VALUES (?,?,?,?,?,NOW(),NOW(),?,?)";
        
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$tipoN,PDO::PARAM_INT);
			$resultado->bindParam(2,$asunto,PDO::PARAM_STR);
			$resultado->bindParam(3,$mensaje,PDO::PARAM_STR);
			$resultado->bindParam(4,$emisor,PDO::PARAM_STR);
			$resultado->bindParam(5,$idSeccion,PDO::PARAM_INT);
			$resultado->bindParam(6,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(7,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Obtiene el maximo id de la tabla tblnotificacion*/
    public static function getAllTblnotificacionMax(){       
         $consulta = "SELECT MAX(idtblnotificacion) AS id FROM tblnotificacion ";
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);			
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	
	
	
	/*Consultar todas las secciones del panel de proveedor**/
	public static function getAllTbltblnotificacionredireccionPP(){		
		
		$consulta = "SELECT N.idtblnotificacionredireccion,N.tblnotificacionredireccion_nombre 
		             FROM tblnotificacionredireccion N";		
		
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);			
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos de todos los registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Obtiene todos los  registro de tblnotificacion y tblnotificacionvisto by destinatario*/
    public static function getAllTblnotificacionbyTblnotificacionvistaPanel(){
	    
		$consulta = " SELECT TN.idtblnotificacion,TN.tblnotificacion_tipo,TN.tblnotificacion_asunto,
                       TN.tblnotificacion_mensaje,TN.tblnotificacion_emisor,DATE(TN.tblnotificacion_fchcreacion) AS fecha,
                       TN.tblnotificacionredireccion_idtblnotificacionredireccion, 
                       TNV.idtblnotificacionvista,TNV.tblnotificacionvista_destino,
                       TNV.tblnotificacionvista_status,TNV.tblnotificacion_idtblnotificacion, 
					   P.tblproveedor_nombre
					   FROM tblnotificacion TN 
		INNER JOIN tblnotificacionvista TNV ON TNV.tblnotificacion_idtblnotificacion = TN.idtblnotificacion
        INNER JOIN tblproveedor P ON P.idtblproveedor = TNV.tblnotificacionvista_destino		
		ORDER BY TNV.tblnotificacionvista_status, TN.tblnotificacion_fchcreacion DESC";  
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);			
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	// muestra detalle de la notificacion
	 public static function getAllTblnotificacionbyTblnotificacionvistaDetalle($idnot,$destino){
	    
		$consulta = " SELECT TN.*, TNV.*,P.* FROM tblnotificacion TN 
		INNER JOIN tblnotificacionvista TNV ON TNV.tblnotificacion_idtblnotificacion = TN.idtblnotificacion
        INNER JOIN tblproveedor P ON P.idtblproveedor = TNV.tblnotificacionvista_destino		
		 WHERE TN.idtblnotificacion = ? AND TNV.tblnotificacionvista_destino=?";
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idnot,PDO::PARAM_INT);
			$resultado->bindParam(2,$destino,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Muestra en numero el total de las ordenes registradas en base a una ciudad en especifica */
    public static function getCountAllOrdenesByTblCiudad($nameCiudad){
        
        $consulta = "SELECT COUNT(*) FROM tblordencompra OC                                        
        INNER JOIN tbldatosenvio ENV ON ENV.tbldatosenvio_idtblordencompra = OC.idtblordencompra
        WHERE OC.tblordencompra_statuspagado=1 AND ENV.tbldatosenvio_ciudad=?"; 
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);			
			$resultado->bindParam(1,$nameCiudad,PDO::PARAM_STR);
			$resultado->execute();
		   return $resultado->fetchColumn(0); //retorna el numero de count		
		}catch(PDOException $e){
			return false;
		}
    }
	
	
	/*Muestra en numero el total de las ordenes registradas en base a una ciudad en especifica */
    public static function getCountAllOrdenesCarritosByCiudad($nameCiudad){
        
        $consulta = "SELECT COUNT(*) FROM tblordencompra OC                                        
        INNER JOIN tbldatosenvio ENV ON ENV.tbldatosenvio_idtblordencompra = OC.idtblordencompra
        WHERE OC.tblordencompra_statuspagado=0 AND ENV.tbldatosenvio_ciudad=?"; 
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);			
			$resultado->bindParam(1,$nameCiudad,PDO::PARAM_STR);
			$resultado->execute();
		   return $resultado->fetchColumn(0); //retorna el numero de count		
		}catch(PDOException $e){
			return false;
		}
    }
	
	/*Muestra en numero el total de las ordenes pendientes por pagar en una ciudad en especifica */
    public static function getCountAllOrdenesPendientesByCiudad($nameCiudad){
        
        $consulta = "SELECT COUNT(*) FROM tblordencompra OC                                        
        INNER JOIN tblentregaproducto TE ON TE.tblentregaproducto_idtblordencompra = OC.idtblordencompra
        INNER JOIN tbldatosenvio ENV ON ENV.tbldatosenvio_idtblordencompra = OC.idtblordencompra
        WHERE TE.tblentregaproducto_statusdeposito='Pendiente' AND TE.tblentregaproducto_status='Entregado'
		AND ENV.tbldatosenvio_ciudad=?"; 
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);			
			$resultado->bindParam(1,$nameCiudad,PDO::PARAM_STR);
			$resultado->execute();
		   return $resultado->fetchColumn(0); //retorna el numero de count		
		}catch(PDOException $e){
			return false;
		}
    }
	
	/*Actualizar orden pendiente a orden ya pagada(historial)*/
	public static function setUpdateTblentregaproductoPagada($statusdeposito,$emailmodifico,$idtblentregaproducto){
				  
		$update = "UPDATE tblentregaproducto SET tblentregaproducto_statusdeposito = ?,
		          tblentregaproducto_fchmodificacion = NOW(), tblentregaproducto_emailusuamodifico= ? WHERE idtblentregaproducto = ?";
      
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$statusdeposito,PDO::PARAM_STR);
			$resultado->bindParam(2,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(3,$idtblentregaproducto,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el update
		}catch(PDOException $e){
			return false;
		}
	}
	
	/*Muestra orden pagada con tblcarritoproduct*/
	public static function getAllTblordencompraDatos($nameCiudad){ 
	        
			$consulta = "SELECT Distinct(PRO.tblproveedor_nombre),PRO.idtblproveedor,
                        OC.idtblordencompra,ENV.tbldatosenvio_fchagendado,ENV.tbldatosenvio_ciudad
                        FROM tblordencompra OC                                        
   INNER JOIN tblcarritoproduct CA ON  CA.tblcarritoproduct_idtblordencompra = OC.idtblordencompra 
   INNER JOIN tbldatosenvio ENV ON ENV.tbldatosenvio_idtblordencompra = OC.idtblordencompra
   INNER JOIN tblproductdetalle TPD ON TPD.idtblproductdetalle = CA.tblcarritoproduct_idtblproductdetalle
   INNER JOIN tblproducto TP ON TP.idtblproducto = TPD.tblproducto_idtblproducto
   INNER JOIN tblproveedor PRO ON PRO.idtblproveedor = TP.tblproveedor_idtblproveedor      		    
   WHERE OC.tblordencompra_statuspagado=1 AND ENV.tbldatosenvio_ciudad= ? ";
   	  	
				
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$nameCiudad,PDO::PARAM_STR);			
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Obtiene los registros de tblentregaproducto en base status entregado*/
    public static function getTblentregaproductoStatus($idtblordencompra,$idtblproveedor){
	    
		$consulta = "SELECT * FROM tblentregaproducto WHERE tblentregaproducto_idtblordencompra = ? 
		            AND tblentregaproducto_idtblproveedor = ? AND tblentregaproducto_status='Entregado' 
					ORDER BY tblentregaproducto_fchcortepago";
		
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
	public static function getAllTblcarritoproductByidorden($idtblordencompra,$idtblproveedor){
	    
		$consulta = "SELECT TP.*,TCP.*,TPD.* FROM tblcarritoproduct TCP		             
       				 INNER JOIN tblordencompra TOC ON  TCP.tblcarritoproduct_idtblordencompra = TOC.idtblordencompra  
      				 INNER JOIN tblproductdetalle TPD ON TPD.idtblproductdetalle = TCP.tblcarritoproduct_idtblproductdetalle
      				 INNER JOIN tblproducto TP ON TP.idtblproducto = TPD.tblproducto_idtblproducto      				 
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
	
	/* muestra productos complementarios por orden de compra*/
	public static function getAllTblordencompraProComp2($orden){
	    
   $consulta = "SELECT OC.*,PCOM.*,ENV.* FROM tblcarritoproductcomplem PCOM  
           INNER JOIN tblordencompra OC ON PCOM.tblcarritoproductcomplem_idtblordencompra = OC.idtblordencompra
		   INNER JOIN tbldatosenvio ENV ON ENV.tbldatosenvio_idtblordencompra = OC.idtblordencompra
           WHERE OC.idtblordencompra= ? "; 
	
				
		try{   

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$orden,PDO::PARAM_INT);		
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Obtiene un registro de tblentregaproducto  por ordencompra y proveedor*/
    public static function getTblentregaproductoByOrdenProveedor($idtblordencompra,$idtblproveedor){
	    
		$consulta = "SELECT * FROM tblentregaproducto WHERE tblentregaproducto_idtblordencompra = ? 
		            AND tblentregaproducto_idtblproveedor = ?
					ORDER BY tblentregaproducto_fchpagoproveedor DESC"; 
		
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
	
	
	/*  ...  muestra datos de carrito complementario y su producto*/
	public static function getAllTblordencompraProComp($orden,$prove){	    
		$consulta = "SELECT OC.*,ENV.*,PC.*,PCOM.* FROM tblcarritoproductcomplem PCOM  
           INNER JOIN tblordencompra OC ON PCOM.tblcarritoproductcomplem_idtblordencompra = OC.idtblordencompra
		   INNER JOIN tbldatosenvio ENV ON ENV.tbldatosenvio_idtblordencompra = OC.idtblordencompra
           INNER JOIN  tblproductcomplem PC ON PC.idtblproductcomplem = PCOM.tblcarritoproductcomplem_idtblproductcomplem
      	  WHERE OC.idtblordencompra= ? AND PC.tblproveedor_idtblproveedor=?";
		   			
				
		try{   

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$orden,PDO::PARAM_INT);
			$resultado->bindParam(2,$prove,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Verificar si existe un carrito de producto complementario por orden y proveedor*/
    public static function getCheckTblordencompraProComp($orden1,$prove1){
        
		$check = "SELECT COUNT(*) FROM tblcarritoproductcomplem PCOM  
           INNER JOIN tblordencompra OC ON PCOM.tblcarritoproductcomplem_idtblordencompra = OC.idtblordencompra
		   INNER JOIN tbldatosenvio ENV ON ENV.tbldatosenvio_idtblordencompra = OC.idtblordencompra
           INNER JOIN  tblproductcomplem PC ON PC.idtblproductcomplem = PCOM.tblcarritoproductcomplem_idtblproductcomplem
      	   INNER JOIN tblproveedor PROV ON PROV.idtblproveedor = PC.tblproveedor_idtblproveedor
      	   WHERE OC.idtblordencompra= ? AND PROV.idtblproveedor=? ";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$orden1,PDO::PARAM_INT);
			$resultado->bindParam(2,$prove1,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(0); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
        
    }
	
	/*Consultar carritos por ciudad de envio */
	public static function getAllTblcarritoCiudad($str_ciudad){
	    
		$consulta = "SELECT OC.* FROM tblordencompra OC               
                INNER JOIN tbldatosenvio ENV ON ENV.tbldatosenvio_idtblordencompra = OC.idtblordencompra                
                WHERE OC.tblordencompra_statuspagado=0 AND ENV.tbldatosenvio_ciudad= ? 
                GROUP BY OC.idtblordencompra ORDER BY OC.tblordencompra_fchordencompra DESC";	
					 
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$str_ciudad,PDO::PARAM_STR);			
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Consultar detelle de una orden en carrito producto normal y estatus no pagado en orden*/
	public static function getAllTblcarritoproduByOrden($idorden){
	    
		$consulta = "SELECT CA.*,OC.* FROM tblcarritoproduct CA                                        
   INNER JOIN tblordencompra OC ON  CA.tblcarritoproduct_idtblordencompra = OC.idtblordencompra 
   INNER JOIN tblproductdetalle TPD ON TPD.idtblproductdetalle = CA.tblcarritoproduct_idtblproductdetalle       		    
   WHERE OC.tblordencompra_statuspagado=0 AND OC.idtblordencompra= ?
	ORDER BY CA.tblcarritoproduct_fchcreacion ASC";
	
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idorden,PDO::PARAM_INT);			
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*    verifica si hay carrito complementario por orden de compra*/
	 public static function getCheckTblordencompraProComp2($orden1){
        
		$check = "SELECT COUNT(*) FROM tblcarritoproductcomplem PCOM  
           INNER JOIN tblordencompra OC ON PCOM.tblcarritoproductcomplem_idtblordencompra = OC.idtblordencompra
		   INNER JOIN tbldatosenvio ENV ON ENV.tbldatosenvio_idtblordencompra = OC.idtblordencompra
           INNER JOIN  tblproductcomplem PC ON PC.idtblproductcomplem = PCOM.tblcarritoproductcomplem_idtblproductcomplem
      	   INNER JOIN tblproveedor PROV ON PROV.idtblproveedor = PC.tblproveedor_idtblproveedor
      	   WHERE OC.idtblordencompra= ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$orden1,PDO::PARAM_INT);			
			$resultado->execute();
			return $resultado->fetchColumn(0); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
        
    }
	
	
	
	/*Obtiene todos los  registro de tblfotografo con nombre de la ciudad*/
    public static function getAllTblfotografobyTblciudad2($idtblciudad){
	    $activado=1;  
		$consulta = "SELECT F.*,C.* FROM tblfotografo F 
		INNER JOIN tblciudad C ON C.idtblciudad = F.tblciudad_idtblciudad
		WHERE tblfotografo_activado=? AND tblciudad_idtblciudad = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$activado,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblciudad,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	 /*Obtiene un registro de tblfotografo */
    public static function getTblfotografobyId($idtblfotografo){
	    
		$consulta = " SELECT * FROM tblfotografo WHERE idtblfotografo = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblfotografo,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	
	/*Insertar un Fotografo*/
	public static function setTblfotografo($nombre,$direcc,$tel,$precio,$idciudad,$estatus,$emailcreo){

		$insert ="INSERT INTO tblfotografo (tblfotografo_nombre,tblfotografo_direccion,
                  tblfotografo_contacto,tblfotografo_preciofoto,tblciudad_idtblciudad,tblfotografo_activado,
                  tblfotografo_fchmodificacion,tblfotografo_fchcreacion,tblfotografo_emailusuacreo,
                   tblfotografo_emailusuamodifico) VALUES (?,?,?,?,?,?,NOW(), NOW(),?,?)";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$nombre,PDO::PARAM_STR);
			$resultado->bindParam(2,$direcc,PDO::PARAM_STR);
			$resultado->bindParam(3,$tel,PDO::PARAM_STR);
			$resultado->bindParam(4,$precio,PDO::PARAM_STR);
			$resultado->bindParam(5,$idciudad,PDO::PARAM_INT);
			$resultado->bindParam(6,$estatus,PDO::PARAM_INT);
			$resultado->bindParam(7,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(8,$emailcreo,PDO::PARAM_STR);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Verificar si existe un Colonia en Ciudad*/
	public static function getCheckTblfotografo($tel,$idtblciudad){

		$check = "SELECT COUNT(*) FROM tblfotografo WHERE tblfotografo_contacto = ? AND tblciudad_idtblciudad = ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$tel,PDO::PARAM_STR);
			$resultado->bindParam(2,$idtblciudad,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Obtiene el maximo id de la tabla tblnotificacion*/
    public static function getAllTblfotografoMax(){       
         $consulta = "SELECT MAX(idtblfotografo) AS id FROM tblfotografo";
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);			
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Insertar un registro en tblnotificacionvista*/
	public static function setTblfotografocatalogo1($imag,$idfotog,$emailcreo){
                            
      $insert ="INSERT INTO tblfotografocatalogo (tblfotografocatalogo_srcimg,
                 tblfotografo_idtblfotografo,tblfotografocatalogo_fchmodificacion,
                 tblfotografocatalogo_fchcreacion,tblfotografocatalogo_emailusuacreo,
                 tblfotografocatalogo_emailusuamodifico) VALUES (?,?,NOW(),NOW(),?,?)";       
				  
	    
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$imag,PDO::PARAM_STR);
			$resultado->bindParam(2,$idfotog,PDO::PARAM_INT);
			$resultado->bindParam(3,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(4,$emailcreo,PDO::PARAM_STR);					
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }
	
	
	
	/*Actualizar Fotografo*/
	public static function setUpdateTblfotografo1($nombre,$ciudad,$direccion,$tel,$precio,$emailmodifico,$idfotografo){

		$update = "UPDATE tblfotografo SET  tblfotografo_nombre=?,tblciudad_idtblciudad=?, tblfotografo_direccion=?,
                   tblfotografo_contacto =?, tblfotografo_preciofoto=?,tblfotografo_fchmodificacion = NOW(),
                   tblfotografo_emailusuamodifico =?  WHERE idtblfotografo =? ";
              
		try{ 
			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$nombre,PDO::PARAM_STR);
			$resultado->bindParam(2,$ciudad,PDO::PARAM_INT);
			$resultado->bindParam(3,$direccion,PDO::PARAM_STR);
			$resultado->bindParam(4,$tel,PDO::PARAM_STR);
			$resultado->bindParam(5,$precio,PDO::PARAM_STR);
			$resultado->bindParam(6,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(7,$idfotografo,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el update
		}catch(PDOException $e){
			return false;
		}
	}
	
	
	
	
	/*Elimina un registro de tblfotografocatalogo*/
    public static function setDeleteTblfotografocatalogo1($idfotografo){
	    
		$delete = "DELETE FROM tblfotografocatalogo WHERE tblfotografo_idtblfotografo= ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($delete);
			$resultado->bindParam(1,$idfotografo,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	/*Elimina un registro de tblfotografo*/
    public static function setDeleteTblfotografo1($id,$cel,$dire,$estatus,$emailmodifico){
	    
		$update = "UPDATE tblfotografo SET tblfotografo_direccion=?,
                   tblfotografo_contacto =?,tblfotografo_activado=?,tblfotografo_fchmodificacion = NOW(),
                   tblfotografo_emailusuamodifico =?  WHERE idtblfotografo =? ";
		      
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($update);
			$resultado->bindParam(1,$dire,PDO::PARAM_STR);
			$resultado->bindParam(2,$cel,PDO::PARAM_STR);
			$resultado->bindParam(3,$estatus,PDO::PARAM_INT);
			$resultado->bindParam(4,$emailmodifico,PDO::PARAM_STR);
			$resultado->bindParam(5,$id,PDO::PARAM_INT);
			$resultado->execute();
	     	return $resultado->rowCount(); //retorna el numero de registros afectados
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Muestra en numero el total de los proveedores registrados en base a una ciudad en especifica */
    public static function getCountAllTblfotografoByTblCiudad($tblciudad_idtblciudad){
        $activado=1;
        $consulta = "SELECT COUNT(*) FROM tblfotografo WHERE tblfotografo_activado=? AND tblciudad_idtblciudad =?";                  
                  
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);			
			$resultado->bindParam(1,$activado,PDO::PARAM_INT);
			$resultado->bindParam(2,$tblciudad_idtblciudad,PDO::PARAM_INT);
			$resultado->execute();
		   return $resultado->fetchColumn(0); //retorna el numero de count		
		}catch(PDOException $e){
			return false;
		}
    }


    /*Funcion para obtner las direcciones de los proveedores en carritos*/
	public static function getAllDireccionProveedorByidordencompra($idtblordencompra){

		
		$consulta = "SELECT TPR.idtblproveedor,TPR.tblproveedor_direccion, TCL.tblcolonia_nombre , TC.tblciudad_nombre, TPS.tblpais_nombre FROM tblproveedor TPR
			 INNER JOIN tblproducto TP ON TP.tblproveedor_idtblproveedor = TPR.idtblproveedor
			 INNER JOIN tblproductdetalle TPD ON TPD.tblproducto_idtblproducto = TP.idtblproducto
			 INNER JOIN tblcarritoproduct TCP ON TCP.tblcarritoproduct_idtblproductdetalle = TPD.idtblproductdetalle
			 INNER JOIN tblcolonia TCL ON TPR.tblcolonia_idtblcolonia = TCL.idtblcolonia
			 INNER JOIN tblciudad TC ON TCL.tblciudad_idtblciudad = TC.idtblciudad
			 INNER JOIN tblpais TPS ON TC.tblpais_idtblpais = TPS.idtblpais
			 WHERE TCP.tblcarritoproduct_idtblordencompra = ?
			 GROUP BY TPR.idtblproveedor";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblordencompra,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}

      /*Obtiene un  registro de tblfotografo con nombre de la ciudad*/
    public static function getAllTblfotografobyidTblfotografo($idtblfotografo){
	    $activado=1;
		$consulta = "SELECT F.*,C.* FROM tblfotografo F 
		INNER JOIN tblciudad C ON C.idtblciudad = F.tblciudad_idtblciudad
		WHERE tblfotografo_activado=? AND idtblfotografo = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$activado,PDO::PARAM_INT);
			$resultado->bindParam(2,$idtblfotografo,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	/*Obtiene a un proveedor en base a la ciudad a la que pertenece*/
	   
    public static function getAllTblproveedorbyidTblproveedor2($idtblproveedor){       
         $consulta = "SELECT TP.*,TC.*,TPED.*,TS.*,
                      TA.*,TCDD.* FROM tblproveedor TP                      
               INNER JOIN tblcolonia TC ON TP.tblcolonia_idtblcolonia=TC.idtblcolonia
			   INNER JOIN tblciudad TCDD ON TCDD.idtblciudad=TC.tblciudad_idtblciudad
               INNER JOIN tbltipopedido TPED ON TP.tbltipopedido_idtbltipopedido=TPED.idtbltipopedido
               INNER JOIN tbltiposervicio TS ON TP.tbltiposervicio_idtbltiposervicio = TS.idtbltiposervicio
               INNER JOIN tblpaquete TA ON TP.tblpaquete_idtblpaquete = TA.idtblpaquete
               WHERE TP.idtblproveedor= ?";		

		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblproveedor,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}		
	
	
	/*Verificar si existe un Ciudad */
	public static function getCheckTblciudad1($nombreciudad,$idtblpais){

		$check = "SELECT COUNT(*) FROM tblciudad WHERE tblciudad_nombre = ? AND tblpais_idtblpais = ?";

		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$nombreciudad,PDO::PARAM_STR);
			$resultado->bindParam(2,$idtblpais,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
	}

    /*Verifica que no exista un registro en tblproveedor  */
    public static function setCheckTblproveedor1($nombreprov,$idtblcolonia){
        
        $check = "SELECT COUNT(*) FROM tblproveedor WHERE tblproveedor_nombre=? AND tblcolonia_idtblcolonia=?";
                 
		try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($check);
			$resultado->bindParam(1,$nombreprov,PDO::PARAM_STR);
			$resultado->bindParam(2,$idtblcolonia,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchColumn(); //retorna el numero de count
		}catch(PDOException $e){
			return false;
		}
    }
	
	/*Obtiene un registro de tblcarritoproductnuevcotiza*/
    public static function gettblcarritoproductnuevcotiza1($idtblcarritoproductnuevcotiza){
	    
		$consulta = "SELECT * FROM tblcarritoproductnuevcotiza WHERE idtblcarritoproductnuevcotiza = ?";
		
		try{

			$resultado = ConexionDB::getInstance()->getDb()->prepare($consulta);
			$resultado->bindParam(1,$idtblcarritoproductnuevcotiza,PDO::PARAM_INT);
			$resultado->execute();
			return $resultado->fetchAll(PDO::FETCH_ASSOC); //retorna los campos del registro 
		} catch(PDOException $e){
			return false;
		}
	}
	
	
	
	
	/*Insertar un registro en tblnotificacionvista*/
	public static function setTblnotificacionvista1($destino,$status,$emailcreo,$idtblnotificacion){
                            
      $insert ="INSERT INTO tblnotificacionvista (tblnotificacionvista_destino,tblnotificacionvista_status,
	  tblnotificacionvista_fchmodificacion,tblnotificacionvista_fchcreacion,
	  tblnotificacionvista_emailusuacreo,tblnotificacionvista_emailusuamodifico,
	  tblnotificacion_idtblnotificacion) VALUES (?,?,NOW(),NOW(),?,?,?)";       
				  
	    
        try{
			$resultado = ConexionDB::getInstance()->getDb()->prepare($insert);
			$resultado->bindParam(1,$destino,PDO::PARAM_INT);
			$resultado->bindParam(2,$status,PDO::PARAM_INT);
			$resultado->bindParam(3,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(4,$emailcreo,PDO::PARAM_STR);
			$resultado->bindParam(5,$idtblnotificacion,PDO::PARAM_INT);			
			$resultado->execute();
			return $resultado->rowCount(); //retorna el numero de registros afectado por el insert
		} catch(PDOException $e){
			return false;
		}
    }

     /*Muestra orden pagada en base a un rango d efachas*/
	public static function getAllTblordencompraDatosbyFechas($nameCiudad,$fechaIni,$fechaFin){ 
	                       
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
    public static function getTblentregaproductoByOrdenProveedorFechas($idtblordencompra,$idtblproveedor){
	    
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
	public static function getAllTblcarritoproductByidorden3($idtblordencompra,$idtblproveedor){
	    
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
	public static function getAllTblordencompraProCompR($idtblordencompra,$idtblproveedor){	    
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
}
?>




