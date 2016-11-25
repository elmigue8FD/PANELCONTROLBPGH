<?php
require 'constantes.php';
/**
* Clase que trata la informacion dependiendo de que sistema fue solicitada
*/
class InfoSolicitadaBy 
{
	function __construct(){}
	public static function solicitadaby($solicitadoBy, $datos)
    {
		if($solicitadoBy=="APP")
        {
            $resultado["success"] = 1;
    		$resultado["datos"] = $datos;
        	echo  json_encode($resultado);

    	}elseif($solicitadoBy=="WEB"){
            
    		//TRATAR LA INFO CON WEB
            $resultado["success"] = 1;
            $resultado["datos"] = $datos; 
            echo json_encode($resultado);
    	}else{
            $resultado["success"] = 2;
            $resultado["datos"] = $datos; 
            echo json_encode($resultado);
        }
	}
	public static function sinDatos($solicitadoBy)
    {

		if($solicitadoBy=="APP")
        {
    		$resultado["success"] = 0;
			$resultado["message"] = "Hubo algun error, vuelve a intentarlo";
        	echo  json_encode($resultado);

    	}elseif($solicitadoBy=="WEB")
        {
    		$resultado["success"] = 0;
            $resultado["datos"] = 'Hubo algun error, vuelve a intentarlo WEB';
            echo json_encode($resultado);
    	}else{
            $resultado["success"] = 0;
            $resultado["datos"] = 'Hubo algun error, vuelve a intentarlo NI WEB NI APP';
            echo json_encode($resultado);
        }

	}
    public static function registroRepetido($solicitadoBy){
       if($solicitadoBy=="APP")
        {
            $resultado["success"] = 0;
            $resultado["message"] = "El registro ya existe favor de verificar";
            echo  json_encode($resultado);

        }elseif($solicitadoBy=="WEB")
        {
            $resultado["success"] = 0;
            $resultado["datos"] = 'El registro ya existe favor de verificar';
            echo json_encode($resultado);
        }else{
            $resultado["success"] = 0;
            $resultado["datos"] = 'El registro ya existe favor de verificar';
            echo json_encode($resultado);
        } 
    }


}

?>