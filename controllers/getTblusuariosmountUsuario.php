<?php
session_start();
/**
 * Recursos utilizados
 */
require './../models/FuncionesBePickler.php';
require './InfoSolicitadaBy.php';
//class blog
//{
	//public function nueva_sesion()
	//{
/**
 * Variables Utilizadas
 */
$solicitadoBy= '';
$email = '';
$pass = '';
$resultado= '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
	$email=$_POST["email"];	
	$pass = hash("sha256",$_POST["pass"]);
	
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::getTblusuariosmountUsuario($email,$pass);

    if($resultado)
    {
        /**
         * Si es éxitos le mandamos los resultados a quien lo solicito.
         */
    	InfoSolicitadaBy::solicitadaby($solicitadoBy, $resultado);
		
		//----------------------------------------
        $_SESSION['nick'] = "1";
        foreach( $resultado as $row )  
        {
            $_SESSION['idusuario'] = $row['idtblusuariosmount'];

            $_SESSION['nombre'] = $row['tblusuariosmount_nombre'];
            $_SESSION['apellidoPaterno'] = $row['tblusuariosmount_apellidoPaterno'];
            $_SESSION['apellidoMaterno'] = $row['tblusuariosmount_apellidoMaterno'];
            $_SESSION['email'] = $row['tblusuariosmount_email'];
			$_SESSION['idciudad'] = $row['tblciudad_idtblciudad'];
            $_SESSION['celular']=$row['tblusuariosmount_celular'];
			$_SESSION['idtblniveleacceso']=$row['tblniveleacceso_idtblniveleacceso'];
			//$_SESSION['password']=$row['tblusuariosmount_password'];					
            //$_SESSION['usuario'] = $row['tblusuariosmount_emailusuamodifico'];
            
        }	
    







		
		//----------------------------------------
        
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
	//}
 //}	
unset($solicitadoBy);
unset($email);
unset($pass);
unset($resultado);
?>