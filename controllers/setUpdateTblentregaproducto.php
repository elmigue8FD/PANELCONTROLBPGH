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
$nombreproveedor='';
$fchentrega='';
$numproductpedidos='';
$numproductentregados='';
$status='';
$fchpagoproveedor='';
$fchcorte='';
$srcimg1='';
$srcimg2='';
$emailmodifico='';
$idtblordencompra='';
$idtblproveedor='';
$resultado='';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $nombreproveedor=$_POST["nombreproveedor"];
    $fchentrega=$_POST["fchentrega"];
    $numproductpedidos=$_POST["numproductpedidos"];
    $numproductentregados=$_POST["numproductentregados"];
    $status=$_POST["status"];
    $statusdeposito=$_POST["statusdeposito"];
   // $fchpagoproveedor=$_POST["fchpagoproveedor"];
    $srcimg1=$_POST["srcimg1"];
    $srcimg2=$_POST["srcimg2"];
    $emailmodifico=$_POST["emailmodifico"];
    $idtblordencompra=$_POST["idtblordencompra"];
    $idtblproveedor=$_POST["idtblproveedor"];

    $emailmodificohis=$_POST['emailmodificohis'];
    $apellido=$_POST['apellido'];
    $nivel=$_POST['nivel'];

    $tabla='Tblentregaproducto';

//*****************************
   //******************** fecha de corte************************
  
    date_default_timezone_set("America/Monterrey");
	$dia = date("d");
	
	//_______________entre 31 y 10__________
	if ($dia>=30 && $dia<=31)
	{ //30,31
        
        
		//$diaqueEsHoy= date("d");
		
	 $diaqueEsHoy=30;
	  switch($diaqueEsHoy){
      case 30: 
	  
	  //__________saber cantidad de dias del mes ______	 
		// $cantDiasMesActual = date("t");
		 $cantDiasMesActual=31;
		 if ($cantDiasMesActual==30)
		 { 
				
	         $fechaH= date("Y/m/d");			
             $mod_fechaH =strtotime($fechaH."+ 10 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);	   //fecha dia 10 del mes -fecha de corte 
             
             $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago	

			  //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");					 
                     $mod_fechaH2 =strtotime($fechaH2."+ 10 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 10 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 13
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");					
                     $mod_fechaH2 =strtotime($fechaH2."+ 10 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 10 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 13
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			       $fechaHoy= date("Y/m/d");				   				
                    $mod_fechaHoy =strtotime($fechaHoy."+ 10 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 10 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 13 fecha de pago a proveedor
			      }
       
          } //fin del else si fuera 30 dias del mes

		else if ($cantDiasMesActual==31)
		{
			   
	         $fechaH= date("Y/m/d");			
             $mod_fechaH =strtotime($fechaH."+ 11 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);	   //fecha dia 10 del mes -fecha de corte 
             
             $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago	

			  //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");                      				 
                     $mod_fechaH2 =strtotime($fechaH2."+ 11 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 10 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 13
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			        $fechaH2= date("Y/m/d");					
                     $mod_fechaH2 =strtotime($fechaH2."+ 11 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 10 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 13
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			     }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");					
                    $mod_fechaHoy =strtotime($fechaHoy."+ 11 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 10 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 13 fecha de pago a proveedor
			      }       
	     }//fin de 31
	//____________________________________________
	     break;	
		 
		 case 31:
		 
		     $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 10 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);	   //fecha dia 10 del mes -fecha de corte 
             
             $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago	

			  //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 10 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 10 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 13
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 10 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 10 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 13
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			     }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 10 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 10 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 13 fecha de pago a proveedor
			      } 
	     //____________________________________________
	     break; 
	       } //fin switch
	  
	  }  //fin del if
	 else if ($dia>=01 && $dia<10)
	{ 
         $diaqueEsHoy= date("d");	
	     
	  switch($diaqueEsHoy){
         case 01: 
	         $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 9 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH); //fecha dia 10 del mes -fecha de corte
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			 
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 9 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 10 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 13
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 9 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 10 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 13
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 9 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 10 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 13 fecha de pago a proveedor
			      }
       //____________________________________________
    break;	
	case 02: 
	        
	         $fechaH= date("Y/m/d");  //fecha actual
             $mod_fechaH =strtotime($fechaH."+ 8 days");
			 $fchacorte= date("Y/m/d",$mod_fechaH); //fecha dia 10 del mes -fecha de corte
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 8 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 10 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 13
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 8 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 10 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 13
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 8 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 10 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 13 fecha de pago a proveedor
			      }
       //____________________________________________
    break;
	case 03: 
	         $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 7 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 7 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 10 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 13
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 7 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 10 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 13
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 7 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 10 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 13 fecha de pago a proveedor
			      }
       //____________________________________________
    break;
	case 04: 
	         $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 6 days"); //fecha del dia 10 -fecha de corte
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 6 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 10 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 13
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 6 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 10 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 13
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 6 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 10 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 13 fecha de pago a proveedor
			      }
       //____________________________________________
    break;
	case 05: 
	         $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 5 days"); //fecha del dia 10 -fecha de corte
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 5 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 10 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 13
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 5 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 10 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 13
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 5 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 10 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 13 fecha de pago a proveedor
			      }
       //____________________________________________
    break;
	case 06: 
	         $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 4 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 4 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 10 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 13
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 4 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 10 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 13
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 4 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 10 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 13 fecha de pago a proveedor
			      }
       //____________________________________________
    break;
	case 07: 
	         $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 3 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 3 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 10 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 13
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 3 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 10 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 13
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 3 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 10 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 13 fecha de pago a proveedor
			      }
       //____________________________________________
    break;
	case 08: 
	         $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 2 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 2 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 10 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 13
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 2 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 10 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 13
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 2 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 10 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 13 fecha de pago a proveedor
			      }
       //____________________________________________
    break;
	case 09: 
	         $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 1 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 1 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 10 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 13
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 1 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 10 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 13
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 1 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 10 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 13 fecha de pago a proveedor
			      }
       //____________________________________________
    break;
     

		 
	} //fin del switch      *******
		
	}//fin del else 31 y 10  *****
    
	//_________________entre 10 y 20__________
	else if ($dia>=10 && $dia<20)
	{    //10,11,12,13,14,15,16,17,18,19  dias
          $diaqueEsHoy= date("d");
	
	switch($diaqueEsHoy){
    case 10: 
	         $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 10 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);	   //fecha dia 20 del mes -fecha de corte 
             
             $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago	

			  //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 10 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 20 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 22
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 10 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 20 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 22
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 10 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 20 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 23 fecha de pago a proveedor
			      }
       //____________________________________________
			 
			 
			 
    break;	
    case 11: 
	         $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 9 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH); //fecha dia 20 del mes -fecha de corte
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			 
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 9 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 20 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 22
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 9 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 20 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 22
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 9 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 20 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 23 fecha de pago a proveedor
			      }
       //____________________________________________
    break;	
	case 12: 
	        
	         $fechaH= date("Y/m/d");  //fecha actual
             $mod_fechaH =strtotime($fechaH."+ 8 days");
			 $fchacorte= date("Y/m/d",$mod_fechaH); //fecha dia 20 del mes -fecha de corte
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 8 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 20 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 22
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 8 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 20 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 22
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 8 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 20 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 23 fecha de pago a proveedor
			      }
       //____________________________________________
    break;
	case 13: 
	         $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 7 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 7 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 20 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 22
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 7 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 20 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 22
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 7 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 20 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 23 fecha de pago a proveedor
			      }
       //____________________________________________
    break;
	case 14: 
	         $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 6 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 6 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 20 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 22
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 6 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 20 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 22
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 6 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 20 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 23 fecha de pago a proveedor
			      }
       //____________________________________________
    break;
	case 15: 
	         $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 5 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 5 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 20 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 22
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 5 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 20 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 22
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 5 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 20 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 23 fecha de pago a proveedor
			      }
       //____________________________________________
    break;
	case 16: 
	         $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 4 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 4 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 20 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 22
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 4 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 20 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 22
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 4 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 20 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 23 fecha de pago a proveedor
			      }
       //____________________________________________
    break;
	case 17: 
	         $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 3 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 3 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 20 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 22
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 3 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 20 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 22
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 3 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 20 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 23 fecha de pago a proveedor
			      }
       //____________________________________________
    break;
	case 18: 
	         $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 2 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 2 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 20 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 22
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 2 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 20 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 22
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 2 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 20 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 23 fecha de pago a proveedor
			      }
       //____________________________________________
    break;
	case 19: 
	         $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 1 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 1 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 20 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 22
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 1 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 20 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 22
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 1 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 20 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 23 fecha de pago a proveedor
			      }
       //____________________________________________
    break;
	} //fin del switch *****
	

        
	}//fin
	
	
	
	//_____________entre 20 y 31_____________
	else if ($dia>=20 && $dia<30)
	{ //20,21,22,23,24,25,26,27,28,29 
        $diaqueEsHoy= date("d");
		 
	
	switch($diaqueEsHoy){
    case 20: 
	
	       $cantDiasMesActual = date("t");
		 
		 if ($cantDiasMesActual==28)
		 { 
	         $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 8 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);	   //fecha dia 28 del mes -fecha de corte 
             
             $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago	

			  //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 8 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 28 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 8 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 28 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 8 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 28 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
	 
	     }//fin de mes 28
		 else if($cantDiasMesActual==29)
		 {
			 $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 9 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);	   //fecha dia 29 del mes -fecha de corte 
             
             $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago	

			  //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 9 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 29 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 9 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 29 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 9 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 29 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
			 
		 }	//fin mes 29 
		 else if ($cantDiasMesActual==30)
		 {
			 $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 10 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);	   //fecha dia 30 del mes -fecha de corte 
             
             $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago	

			  //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 10 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 10 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 10 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 30 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
			 
		 }	//fin mes 30
		 else if ($cantDiasMesActual==31)
		 { 
	         $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 10 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);	   //fecha dia 30 del mes -fecha de corte 
             
             $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago	

			  //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 10 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 10 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 10 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 30 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
       //____________________________________________
		 
		 } //fin mes 31 
			 
			 
    break;	
     case 21: 
	 
	         $cantDiasMesActual = date("t");
		 
		 if ($cantDiasMesActual==28)
		 { 
	         $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 7 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH); //fecha dia 28 del mes -fecha de corte
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			 
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 7 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 28 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 7 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 28 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 7 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 28 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
	     } //fin mes 28
		 
	    else if ($cantDiasMesActual==29)
		{
			  $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 8 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH); //fecha dia 29 del mes -fecha de corte
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			 
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 8 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 29 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 8 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 29 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 8 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 29 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
			
		} //fin mes 29
		
		else if ($cantDiasMesActual==30)
	    {     $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 9 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH); //fecha dia 30 del mes -fecha de corte
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			 
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 9 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 9 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 9 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 30 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
		}//fin mes 30
		
		else if ($cantDiasMesActual==31)
		{
			  $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 9 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH); //fecha dia 30 del mes -fecha de corte
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			 
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 9 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 9 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 9 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 30 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
			
		} //fin mes 31
       //____________________________________________
    break;	
	
	case 22: 
	
	        $cantDiasMesActual = date("t");
		 
		 if ($cantDiasMesActual==28)
		 { 
	        $fechaH= date("Y/m/d");  //fecha actual
             $mod_fechaH =strtotime($fechaH."+ 6 days");
			 $fchacorte= date("Y/m/d",$mod_fechaH); //fecha dia 28 del mes -fecha de corte
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 6 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 28 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 6 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 28 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 6 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 28 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
	     }//fin mes 28
		 
	     else if ($cantDiasMesActual==29)
		 {
			 $fechaH= date("Y/m/d");  //fecha actual
             $mod_fechaH =strtotime($fechaH."+ 7 days");
			 $fchacorte= date("Y/m/d",$mod_fechaH); //fecha dia 29 del mes -fecha de corte
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 7 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 29 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 7 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 29 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 7 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 29 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
			 
		 } //fin mes 

          else if ($cantDiasMesActual==30)
		 {
			 $fechaH= date("Y/m/d");  //fecha actual
             $mod_fechaH =strtotime($fechaH."+ 8 days");
			 $fchacorte= date("Y/m/d",$mod_fechaH); //fecha dia 30 del mes -fecha de corte
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 8 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 8 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 8 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 30 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
			 
		 } //fin mes

         else if ($cantDiasMesActual==31)
		 {
			 $fechaH= date("Y/m/d");  //fecha actual
             $mod_fechaH =strtotime($fechaH."+ 8 days");
			 $fchacorte= date("Y/m/d",$mod_fechaH); //fecha dia 30 del mes -fecha de corte
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 8 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 8 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 8 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 30 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
			 
		 }//fin de mes
	         
       //____________________________________________
    break;
	case 23: 
	
	      $cantDiasMesActual = date("t");
		 
		 if ($cantDiasMesActual==28)
		 { 
	        $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 5 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 5 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 28 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 5 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 28 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 5 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 28 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
	     }//fin mes
		 
		 else if ($cantDiasMesActual==29)
		 { 
	        $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 6 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 6 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 29 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 6 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 29 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 6 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 29 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
	     }//fin mes
		 
		 else if ($cantDiasMesActual==30)
		 { 
	         $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 7 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 7 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 7 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 7 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 30 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
	     }//fin mes
		 
		 else if ($cantDiasMesActual==31)
		 { 
	         $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 7 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 7 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 7 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 7 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 30 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
	     }//fin mes
	       
       //____________________________________________
    break;
	case 24: 
	
	      $cantDiasMesActual = date("t");
		 
		 if ($cantDiasMesActual==28)
		 { 
	          $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 4 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 4 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 28 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 4 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 28 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 4 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 28 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
	     }//fin mes
		 
		 else if ($cantDiasMesActual==29)
		 { 
	       $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 5 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 5 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 29 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 5 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 29 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 5 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 29 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
	     }//fin mes
		 
		 else if ($cantDiasMesActual==30)
		 { 
	      $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 6 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 6 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 6 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 6 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 30 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
	     }//fin mes
		 
		 else if ($cantDiasMesActual==31)
		 { 
	        $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 6 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 6 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 6 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 6 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 30 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
	  
	     }//fin mes
		 
	        
       //____________________________________________
    break;
	
	
	case 25: 
	
	     $cantDiasMesActual = date("t");
		 
		 if ($cantDiasMesActual==28)
		 { 
	        $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 3 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 3 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 28 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 3 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 28 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 3 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 28 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
	     }//fin mes
		 
		 else if ($cantDiasMesActual==29)
		 { 
	      $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 4 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 4 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 29 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 4 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 29 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 4 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 29 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
	  
	     }//fin mes
		 
		 else if ($cantDiasMesActual==30)
		 { 
	         $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 5 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 5 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 5 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 5 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 30 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
	     
	     }//fin mes
		 else if ($cantDiasMesActual==31)
		 { 
	        $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 5 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 5 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 5 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 5 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 30 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
	     }//fin mes
	        
       //____________________________________________
    break;
	case 26: 
	
	$cantDiasMesActual = date("t");
		 
		 if ($cantDiasMesActual==28)
		 { 
	        $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 2 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 2 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 28 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 2 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 28 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 2 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 28 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
	     }//fin mes
		 
		 
		 else if ($cantDiasMesActual==29)
		 { 
	        $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 3 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 3 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 29 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 3 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 29 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 3 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 29 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
	     }//fin mes
		 
		 else if ($cantDiasMesActual==30)
		 { 
	          $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 4 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 4 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 4 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 4 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 30 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
	     }//fin mes
		 
		 else if ($cantDiasMesActual==31)
		 { 
	        $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 4 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 4 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 4 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 4 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 30 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
	     }//fin mes
	        
       //____________________________________________
    break;
	case 27: 
	
	  $cantDiasMesActual = date("t");
		 
		 if ($cantDiasMesActual==28)
		 { 
	       $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 1 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 1 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 28 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 1 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 28 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 1 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 28 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
	     }//fin mes
		 
		 else if ($cantDiasMesActual==29)
		 { 
	        $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 2 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 2 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 29 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 2 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 29 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 2 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 29 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
	     
	     }//fin mes
		 
		 
		 else if ($cantDiasMesActual==30)
		 { 
	       $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 3 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 3 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 3 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 3 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 30 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
	     }//fin mes
		 
		 
		 else if ($cantDiasMesActual==31)
		 { 
	        $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 3 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 3 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 3 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 3 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 30 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
	     }//fin mes
		 
	        
       //____________________________________________
    break;
	
	
	
	case 28: 
	     
	$cantDiasMesActual = date("t");
	
	
		 
		 if ($cantDiasMesActual==28)
		 { 
	        $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 10 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 10 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 10 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 10 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 10 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 10 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 10 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
	     }//fin mes
		 
		 else if ($cantDiasMesActual==29)
		 { 
	         $fechaH= date("Y/m/d");			 
             $mod_fechaH =strtotime($fechaH."+ 1 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		    $fechaH2= date("Y/m/d");					 
                     $mod_fechaH2 =strtotime($fechaH2."+ 1 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 29 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			          $fechaH2= date("Y/m/d");					  
                     $mod_fechaH2 =strtotime($fechaH2."+ 1 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 29 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");					
                    $mod_fechaHoy =strtotime($fechaHoy."+ 1 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 29 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
	     }//fin mes
		 
		 else if ($cantDiasMesActual==30)
		 { 
	       $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 2 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 2 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 2 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 2 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 30 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
	     }//fin mes
		 
		 else if ($cantDiasMesActual==31)
		 { 
	      $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 2 days");
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 2 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 2 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 03
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 2 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 30 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 03 fecha de pago a proveedor
			      }
	     
	     }//fin mes
	       
       //____________________________________________
    break;
	
	
	
	case 29: 
	        $cantDiasMesActual = date("t");
		 
		 if ($cantDiasMesActual==29)
		 { 
	        $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 10 days"); //fecha corte 10
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 10 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 10 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 13
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 10 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 10 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 13
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 10 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 10 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 13 fecha de pago a proveedor
			      }
	     }//fin mes
		 else if ($cantDiasMesActual==30)
		 { 
	       $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 1 days"); //fecha corte 30
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 1 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 13
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 1 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 13
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 1 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 30 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 13 fecha de pago a proveedor
			      }
	     }//fin mes
		 else if ($cantDiasMesActual==31)
		 { 
	      $fechaH= date("Y/m/d");
             $mod_fechaH =strtotime($fechaH."+ 1 days"); //fecha corte 30
			 $fchacorte = date("Y/m/d",$mod_fechaH);
			 
			 $mod_fechaProv =strtotime($fchacorte."+ 3 days"); //sumar 3 dias para obtener fecha pago
		     $fchparaPago = date("Y/m/d",$mod_fechaProv); //fecha para pago
			
			 //__________si cae en fin de semana el dia de pago a proveedor ______	 
	         /*sabado=6         lunes=1
  		       domingo=7        date("N"); */
		    
			//saber el dia de la semana que cae la fecha de pago 
			$fchparaPagar = date("N",strtotime($fchparaPago)); 
				 
              if ($fchparaPagar==6) //si cae en sabado
		      { 
           		     $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 1 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 13
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 2 days"); //sumar 2 dias para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);
				   
   		      }	  
			  else if($fchparaPagar==7) //si cae en domingo
			  {  
			         $fechaH2= date("Y/m/d");
                     $mod_fechaH2 =strtotime($fechaH2."+ 1 days");
			         $fchcorte= date("Y/m/d",$mod_fechaH2); //fecha del dia 30 -fecha de corte
					
                     $mod_fecha2 =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		             $fchpagoproveedor1 = date("Y/m/d",$mod_fecha2); //seria el 13
					 
					 $mod_fecha3 =strtotime($fchpagoproveedor1."+ 1 days"); //sumar 1 dia para que sea lunes
		             $fchpagoproveedor = date("Y/m/d",$mod_fecha3);

			  }
							  
			  else{  
			        $fechaHoy= date("Y/m/d");
                    $mod_fechaHoy =strtotime($fechaHoy."+ 1 days");
			        $fchcorte = date("Y/m/d",$mod_fechaHoy);  //fecha del dia 30 -fecha de corte
					
					$mod_fechac =strtotime($fchcorte."+ 3 days"); //sumar 3 dias para que obtener fecha pago
		            $fchpagoproveedor = date("Y/m/d",$mod_fechac); //seria el 13 fecha de pago a proveedor
			      }
	    
	     }//fin mes
		 
	        
       //____________________________________________
    break;
	
	
	
	} //fin del switch        *****	
	  
	} //fin del else 20 y 31  ****
   
   
   
   //*********************************************
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setUpdateTblentregaproducto($nombreproveedor,$fchentrega,$numproductpedidos,$numproductentregados,$status,$statusdeposito,$fchpagoproveedor,$srcimg1,$srcimg2,$emailmodifico,$fchcorte,$idtblordencompra,$idtblproveedor);

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
unset($nombreproveedor);
unset($fchentrega);
unset($numproductpedidos);
unset($numproductentregados);
unset($status);
unset($fchpagoproveedor);
unset($srcimg1);
unset($srcimg2);
unset($emailmodifico);
unset($idtblordencompra);
unset($idtblproveedor);
unset($fchparaPago);
unset($mod_fechaProv);
unset($fchacorte);
unset($mod_fechaH2);
unset($resultado);
?>