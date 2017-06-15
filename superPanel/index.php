<?php
session_start();
session_destroy(); 
?>
<!doctype html>
<!-- Create by: Reyna Maria Martinez Vazquez-->
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
    <meta name="msapplication-tap-highlight" content="no"/>

     <link rel="stylesheet" href="../assets/css/login_page.min.css" />
	 <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'> 
    <link rel="stylesheet" href="../bower_components/uikit/css/uikit.almost-flat.min.css"/>

    <!-- altair admin login page -->
    <link rel="stylesheet" href="../assets/css/login_page.min.css" />
   <link rel="stylesheet" href="../assets/css/colorPanel.css" media="all">
    <?php include("../codigo_general/minimagenPanel.php"); ?>
   
   <title>BePickler</title>
    
	
</head>
<body class="login_page">


    <div class="login_page_wrapper">
      <div class="md-card" id="login_card">
        <div class="md-card-content large-padding" id="login_form">
          <div class="login_heading">           
            <img src="../assets/img/bepickler.png">
          </div>
          <form id="formInicio">
           <div class="uk-form-row">
              <label for="login_username">Dirección de correo electrónico</label>
              <input class="md-input" type="text" id="emailUsuario" name="emailUsuario" />
            </div>
            <div class="uk-form-row">
              <label for="login_password">Contraseña</label>
              <input class="md-input" type="password" id="passwordUsuario" name="passwordUsuario" />
            </div>
            <div class="uk-margin-medium-top ">
              <a id="sigIn" class="md-btn md-btn-block md-btn-large ye" onclick="iniciar();">Iniciar sesión</a>
            </div>
						
            <div class="uk-margin-top">
              <a href="#" id="login_help_show" class="uk-float-right colorB" >¿Has olviado tu contraseña?</a>
             
            </div>

			<div class="uk-text-center" id="respuesta">
			
           </div>
		   
		   <div class="uk-text-center oculto" id="EsperacargarInicio">
                 <label> Procesando... </label>
				  <img src="cargando.gif" />
           </div>    
		  </form>
        </div>
        <div class="md-card-content large-padding uk-position-relative" id="login_help" style="display: none">
          <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
          <h2 class="heading_b colorB">Lamentamos que tuvieras problemas para acceder</h2>
          <p>Los usuarios y contraseñas son sensibles a mayúsculas, minúsculas, puntos y comas.</p>
          <p>Primero, intenta lo mas sencillo: Si tu recuerdas tu constraseña pero no funciona, revisa si tu usuario este escrito correctamente, luego intenta de nuevo.</p>
          <p>Si aún no puedes acceder, puedes <a class="" onclick="lim();" id="password_reset_show"> cambiar la contraseña</a>.</p>
        </div>
        <div class="md-card-content large-padding" id="login_password_reset" style="display: none">
          <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
          <h2 class="heading_a uk-margin-large-bottom">Cambiar Contraseña</h2>
          <form id="formCambCont">
            <div class="uk-form-row">
              <label for="login_email_reset">Ingresa tu Dirección de correo electrónico:</label>
              <input class="md-input" type="text" id="login_email_reset" name="login_email_reset" />
            </div>
			
			
            <div class="uk-margin-medium-top">
              <a id="Solicitar_soporte" class="md-btn md-btn-primary md-btn-block" onClick="FX_passGenerator();">Cambiar contraseña</a>             
            </div>
			<div class="uk-text-center oculto" id="Esperacargarenvio">
                 <label> Procesando... </label>
				  <img src="cargando.gif" />
           </div> 		
          

          </form>
        </div>
      </div>
    </div>
    <!-- common functions   href="index.php"-->
    <script src="../assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="../assets/js/uikit_custom.min.js"></script>
    <!-- altair core functions -->
    <script src="../assets/js/altair_admin_common.min.js"></script>

    <!-- altair login page functions -->
    <script src="../assets/js/pages/login.min.js"></script>

    <script>
    // Create by: Reyna Maria Martinez Vazquez	
		function iniciar(){
	  usuario =$("#emailUsuario").val();
	     pass =$("#passwordUsuario").val();
     
	
	
		   $("#respuesta").html("");
		  
		if( $('#emailUsuario').val()==""   ) { 
		UIkit.modal.alert('Es necesario ingresar Dirección de correo electrónico.');	
		}		
       else if( $('#passwordUsuario').val()==""){			  
		UIkit.modal.alert('Es necesario ingresar la contraseña.');		
		     } 
	  		 
				
	 else  {		
					 $.ajax({ 
                               method: "POST",dataType: "json",
							   url: "../../../controllers/getTblusuariosmountUsuario.php", 
							   data: {solicitadoBy:"WEB",email:usuario,							   
							   pass:pass},
							   beforeSend: function(){
                              $('#EsperacargarInicio').css('display','inline');
                                                 }
							   }) 

							   
                                                                                                             
							   .done(function(ms){
                                  
                                 if(parseInt(ms.success)==1){
									 
									$('#formInicio')[0].reset(); 
   $("#respuesta").append('<span class="uk-badge uk-badge-success"> Iniciando Sesion...</span>');	
																	
                                    window.location.href = "index2.php";
									  
                                    }else {
						$("#respuesta").append('<span class="uk-badge uk-badge-warning"> Correo o contraseña incorrectos.</span>');				
                       
                                    }                          
                                  })
                              .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                              .always(function(){  $("#EsperacargarInicio").hide();
							                       });	
						  
	  } 
	
	
}//fin de la funcion

  function lim(){
 $("#Solicitar_soporte").removeClass('oculto');
  $("#formCambCont")[0].reset();
  }
function FX_passGenerator() {
	
	
	     correo =$("#login_email_reset").val();
    
		if( $('#login_email_reset').val()==""   ) { 
		UIkit.modal.alert('Es necesario ingresar Dirección de correo electrónico.');	
		}
   else{		
	
  $("#Solicitar_soporte").addClass('oculto');
       $.ajax({ 
                   method: "POST",dataType: "json",url: "../../../controllers/setUpdateTblusuariosmountPass.php", 				  
				    data: {solicitadoBy:"WEB",login_email_reset:correo}		   })
                  .done(function(mg){					 
                            if(parseInt(mg.success)==1){  							 
                              UIkit.modal.alert('Nueva contraseña enviada a tu dirección de correo electronico.'); 
							   $("#formCambCont")[0].reset(); 
							  $("#Solicitar_soporte").removeClass('oculto');
								 
							} else{
                              UIkit.modal.alert('Ocurrio un error, vuelva intentarlo. Verifique su dirección de correo electronico.');
                                $("#Solicitar_soporte").removeClass('oculto');
							   }     
								 }) 	  
                  .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
               
  
   }//fin del else 
	   
} //fin de la funcion
    </script>

</body>
</html>