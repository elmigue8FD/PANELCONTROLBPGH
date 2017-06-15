<?php
//require_once '../php/seguridad.php'; 
?>
<!doctype html>
<html lang="en">
<!-- Create by: Reyna Maria Martinez Vazquez-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <?php include("../codigo_general/minimagenPanel.php"); ?>

    <title>BePickler</title>


    <!-- uikit -->
    <link rel="stylesheet" href="../bower_components/uikit/css/uikit.almost-flat.min.css" media="all">
    <!-- flag icons -->
    <link rel="stylesheet" href="../assets/icons/flags/flags.min.css" media="all">
    <!-- style switcher -->
    <link rel="stylesheet" href="../assets/css/style_switcher.min.css" media="all">    
    <!-- altair admin -->
    <link rel="stylesheet" href="../assets/css/mainPanel.css" media="all">
    <!-- themes -->
    <link rel="stylesheet" href="../assets/css/themes/themes_combined.min.css" media="all">	
	<link rel="stylesheet" href="../assets/css/colorPanel.css" media="all"> 
	
   
</head>
<body class=" sidebar_main_open sidebar_main_swipe" >
    <!-- main header -->
  <?php include("../codigo_general/menuPanel.php"); ?>
   
   <!-- main sidebar end -->

   <div id="page_content">
        <div id="page_content_inner">

            <!--<h3 class="heading_b uk-margin-bottom">Pastelerias</h3> -->
			
			<div class="md-card">
					    <div class="md-card-content">
									<div>         
                                    <h2>Usuarios</h2>
                                  <span class="uk-text-upper uk-text-small">Empleados</span>
                                    </div>									
				
                          <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-3">
						    <form id="formMostrarCiudad">
							 <span class="uk-text-small">Selecciona una ciudad: </span>
                             <select id="selectciudad" name="selectciudad" class="uk-button uk-form-select" data-uk-form-select  onchange="javascript:mostrarUsuarios();">
                            <option value="" disabled selected readonly >Selecciona...</option>
                             </select>
				           </form>
                        </div>
					</div>
					
					 </br>
									  <div class="uk-text-center oculto" id="esperarMostrarUsuarios" >
                                      <label> Procesando... </label>
				                       <img src="cargando.gif" /> 				 
                                           </div> 
					
					</div><!-- cierre del content-->
				</div> <!--  cierre del mcard-->
				<br/>
				
				<!-- ----------------  Imagen de BePickler en la Interfaz Inicial--------------- -->
			   <div id="paraInicial">				
               <div class="md-card"> 
			   <div class="md-card-content"> 
			   <div class="uk-grid uk-grid-divider" data-uk-grid-margin>
			   <div class="uk-width-medium-1-3 uk-container-center">
			   <img id="logoBPP" name="logoBPP" src="../assets/img/delPanel/logoo.jpg" />	                                
			   </div>
			   </div>
			   </div></div>     				 
               </div>
				
				
              

           <!-- <div class="pricing_table pricing_table_a uk-grid uk-grid-small uk-grid-width-medium-1-3 uk-grid-width-large-1-3 uk-margin-large-bottom" data-uk-grid-margin id="tarjetaUsuario">
      
	       <div class="uk-grid uk-grid-medium uk-grid-width-medium-1-3 uk-grid-width-large-1-3" data-uk-grid-margin id="tarjetaUsuario">    data-uk-grid-match="{target:'.md-card-content'}"
         -->
		<!-- <div  class="uk-grid uk-grid-medium uk-grid-width-medium-1-2 uk-grid-width-large-1-3" data-uk-grid-margin>
            --> 		
		  
								 
				 <!-- del tamao tarjetas data-uk-grid-match="{target:'.md-card-content'}" -->		
				<div id="tarjetaUsuario" class="uk-grid uk-grid-width-small-1-3 uk-grid-width-medium-1-3 uk-grid-width-large-1-3 uk-grid-width-xlarge-1-3 " data-uk-grid-margin data-uk-grid-match="{target:'.md-card-content'}">			
			   
                </div>
				<h4 id="nohayUs"></h4>
			<!-- ------------------------------- -->
	    </div ><!-- de  id="page_content" -->
        </div> <!-- id="page_content_inner" -->

	 <!-- icono agregar mas-->
	
    <div class="md-fab-wrapper">
         <a class="md-fab md-fab-accent" id="bagregar" onclick="rCO();"  href="#altaem" data-uk-modal="{ target:'#altaem',bgclose:false, center:true }">
                    
           <i class="material-icons">&#xE145;</i>
        </a>
    </div>
	
	
	
	<!-- modificar pasteleria  :::::::::::::::::::::::::::::::::::::: -->
	<div class="uk-modal" id="modificar">
        <div class="uk-modal-dialog uk-modal-dialog-medium">
		<button type="button"  class="uk-modal-close uk-close uk-close-alt"></button>
            <form class="uk-form-stacked" id="modificar_formu">
			 <h3 class="heading_b uk-margin-bottom">Modificar Datos</h3>
			<div class="uk-grid uk-margin-medium-top uk-margin-large-bottom" data-uk-grid-margin>
             
			 <div class="uk-width-large-1-2">
			 <ul class="md-list md-list-addon">
			 			   
				<label class="uk-text-muted uk-text-small">Nombre (s):</label>
				 <div class="uk-margin-medium-bottom">
					<span class="oculto" id="modificar_idusuario"></span>
                    <input type="text" class="md-input" id="modificar_nombre" name="snippet_title" />
                </div>
				
			   <label class="uk-text-muted uk-text-small">Apellido Paterno:</label>                
			          <div class="uk-margin-medium-bottom">                   
                    <input type="text" class="md-input" id="modificar_apaterno" name="snippet_title" />
                </div>
				  <label class="uk-text-muted uk-text-small">Apellido Materno:</label>
				<div class="uk-margin-medium-bottom">                   
                    <input type="text" class="md-input" id="modificar_amaterno" name="snippet_title" />
                </div>
				</ul>
				</div>
				
				
				  <div class="uk-width-large-1-2">
                  <ul class="md-list md-list-addon">
				   <label class="uk-text-muted uk-text-small">Email:</label>
				    <div class="uk-margin-medium-bottom">                   
                   <!-- <input type="text" class="md-input" id="modificar_email" name="snippet_title" /> -->
				    <input class="md-input" id="modificar_email" name="modificar_email" type="text"  />
            
                     </div>
				   <label class="uk-text-muted uk-text-small">Celular (LADA + Número Celular):</label>
                <div class="uk-margin-medium-bottom">                    
                   <!-- <input type="text" class="md-input" id="modificar_celular" name="snippet_title" maxlength="10"/>
                -->
				<input type="text" class="md-input masked_input" id="modificar_celular" data-inputmask="'mask': '9999999999'" data-inputmask-showmaskonhover="false" />
              
				</div>
				  <label class="uk-text-muted uk-text-small">Puesto:</label>
				<div class="uk-margin-medium-bottom">                    
                   <select id="modificar_puesto"  class="md-input">
                   <option value="" disabled selected hidden>Selecciona una puesto...</option>					     
                   </select>
                </div>
				<label class="uk-text-muted uk-text-small">Ciudad:</label>
				<div class="uk-margin-medium-bottom">                    
                   <select id="modificar_ciudad"  class="md-input">
                   <option value="" disabled selected hidden>Selecciona una ciudad...</option>					     
                   </select>
                </div>
				
				  </ul>
				  </div>                 
				</div>
				 <div class="uk-text-center oculto" id="cargarModificarUsuario" >
                <label> Procesando... </label>
				  <img src="cargando.gif" /> 				 
                 </div> 
                
				<div class="uk-modal-footer uk-text-right">
                    <!--  onclick="" -->
			     <button type="button" class="md-btn md-btn-flat ye" id="boton_modificar" onclick="actualizarUsuario();">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
	<!-- agregar pasteleria -->
	<div class="uk-modal" id="altaem">
        <div class="uk-modal-dialog uk-modal-dialog-medium">
		   <button type="button"  class="uk-modal-close uk-close uk-close-alt"></button>
           <form class="uk-form-stacked" id="alta_formu" >
			  <h3 class="heading_b uk-margin-bottom">Agregar empleado </h3>
			  
			  <div class="uk-grid uk-margin-medium-top uk-margin-large-bottom" data-uk-grid-margin>
             
			 <div class="uk-width-large-1-2">
			 <ul class="md-list md-list-addon">
			  <div class="uk-margin-medium-bottom">
                    <label for="task_title">Nombre (s):</label>
                    <input type="text" class="md-input" id="alta_nombre" name="snippet_title" />
                </div>
				 <div class="uk-margin-medium-bottom">
                    <label for="task_title">Apellido Paterno:</label>
                    <input type="text" class="md-input" id="alta_apaterno" name="snippet_title" />
                </div>
				
				<div class="uk-margin-medium-bottom">
                    <label for="task_title">Apellido Materno:</label>
                    <input type="text" class="md-input" id="alta_amaterno" name="snippet_title" />
                </div>
				<div class="uk-margin-medium-bottom">
                    <label for="task_title">Email:</label>
              <!-- <input type="text" class="md-input" id="alta_email" name="alta_email" /> -->
			  <input class="md-input" id="alta_email" name="alta_email" type="text"  />
            
				   
                </div>
				
				</ul>
				</div>
				
				<div class="uk-width-large-1-2">
			   <ul class="md-list md-list-addon">
                <div class="uk-margin-medium-bottom">
                    <label for="task_title">Celular (LADA + Número Celular):</label>
                  <!--  <input type="text" class="md-input" id="alta_cel" name="snippet_title" maxlength="10" />-->
				  <input type="text" class="md-input masked_input" id="alta_cel"  data-inputmask="'mask': '9999999999'" data-inputmask-showmaskonhover="false" />
              
                </div>
				
				<div class="uk-margin-medium-bottom">
                    <label for="task_title">Password:</label>
                    <input type="password" class="md-input" id="alta_password" name="snippet_title" />
                </div>
				<div class="uk-margin-medium-bottom">
                    <label for="task_title">Repetir Password:</label>
                    <input type="password" class="md-input" id="alta_passwordDos" name="snippet_title" />
                </div>
				
				<div class="uk-margin-medium-bottom">
                    <label for="task_title">País al que pertenece:</label><br/>                   
					<input type="radio" name="alta_NombrePais" value="1" id="altaIdNombrePais" checked readonly   /> 
					 <label>México</label>
                </div>
				<div class="uk-margin-medium-bottom">                    
                    <select id="alta_puesto" class="uk-button uk-form-select" data-uk-form-select >
                    <option value="" disabled selected hidden>Selecciona una Puesto...</option>					     
                   </select>
                </div>
				<div class="uk-margin-medium-bottom">                    
                    <select id="alta_ciudad" class="uk-button uk-form-select" data-uk-form-select >
                    <option value="" disabled selected hidden>Selecciona una Ciudad...</option>					     
                   </select>
                </div>
                
                <div class="uk-margin-medium-bottom">  <!-- class="uk-form-label" -->
                    <!-- <label for="task_title" >Estatus</label> -->
					<span class="uk-text-medium uk-text-muted">Estatus</span>
                    <div>
                            <input type="checkbox" checked  id="alta_estatus"/>   
                           <label for="switch_demo_1" class="inline-label">Activo</label>  
                    </div>
                </div>
				</ul>
				</div>
				</div>
				<div class="uk-text-center oculto" id="cargarAltaUsuario">
                 <label > Procesando... </label>
				  <img src="cargando.gif" />
                 </div> 
				
				
                <div class="uk-modal-footer uk-text-right">                    
			 <!-- <input type="submit" class="md-btn md-btn-flat " id="ye22"  onclick="agregarUsuario(); che();" value="registrar"/>
              -->
			  <button type="button" class="md-btn md-btn-flat ye" id="agregarNUsuario"  onclick="agregarUsuario(); ">Agregar</button>
              
			<!-- <input type="submit" id="boton" value="registrar" />  -->
			   </div>
            </form>
        </div>
    </div> <!-- cierre agregar usuario-->

    <!--...... librerias -->
   <?php include('../codigo_general/script_commonPB.php'); ?>
   

    <!-- page specific plugins -->

    <!--  contact list functions -->
    <script src="../assets/js/pages/page_contact_list.min.js"></script>
	<!-- ionrangeslider -->
    <script src="../bower_components/ion.rangeslider/js/ion.rangeSlider.min.js"></script>
    <!-- htmleditor (codeMirror) 
    <script src="../assets/js/uikit_htmleditor_custom.min.js"></script> -->
    <!-- inputmask-->
    <script src="../bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.js"></script>
    <!--  forms advanced functions -->
    <script src="../assets/js/pages/forms_advanced.min.js"></script>
    
    <!-- archivo JS-->
	<script type="text/javascript" > 
      $( window ).ready(function()
    {
        //console.log('pagina lista');
	     //mostrarUsuarios();  //se cargar automaticamente cuando carge la pagina	
		 mostrarPuestos();	 
		 mostrarCiudades();
		// $("#tarjetaUsuario").jPaginate();
      }); 
	     /* Create by: Reyna Maria Martinez Vazquez*/ 
		
	//-----------------------------------Modificar Datos--------------------------------
   //..............Mostrar datos del usuario para posteriormente modificarlos ---------------------- 
     
	  
    function mostrarDatosUsuario(idu){
          
    $.ajax({ 
       method: "POST",dataType: "json",url: "../../../controllers/getTblUsuario.php", 
	   data: {solicitadoBy:"WEB",idtblusuario:idu}}) 
            .done(function(msg){ 
               
				$.each(msg.datos, function(x,item){			       				 
				  $("#modificar_idusuario").text(item.idtblusuariosmount); 
				  $("#modificar_nombre").val(item.tblusuariosmount_nombre); 
                  $("#modificar_apaterno").val(item.tblusuariosmount_apellidoPaterno);
				   $("#modificar_amaterno").val(item.tblusuariosmount_apellidoMaterno);
				   $("#modificar_email").val(item.tblusuariosmount_email);
				   $("#modificar_celular").val(item.tblusuariosmount_celular);
				    $("#modificar_puesto").val(item.idtblniveleacceso);
					 $("#modificar_ciudad").val(item.tblciudad_idtblciudad);
				  
				        })//fin del each
			   
                   })              
          .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
        //  .always(function(){  console.log("always");});				  
	}	//fin d ela funcion	 

	//---------actualizar datos del usuario
     function actualizarUsuario(){ 		
                
                       id=$("#modificar_idusuario").text();
				  nombre =$("#modificar_nombre").val();
                 apaterno= $("#modificar_apaterno").val();
				 amaterno=$("#modificar_amaterno").val();
				    email=$("#modificar_email").val();
				      cel= $("#modificar_celular").val();
				   puesto=$("#modificar_puesto").val();
				   ciudad=$("#modificar_ciudad").val();
		  
		   // var emaildeUsuario = "<?php echo $_SESSION['email']; ?>";
			var emaildeUsuario = "reyna";
				
		   if( $('#modificar_nombre').val()==""){			  
		UIkit.modal.alert('Es necesario completar el campo Nombre.');		
		     }       		                
        else if	(  $('#modificar_apaterno').val()=="" ){
			UIkit.modal.alert('Es necesario completar el campo Apellido Paterno.');
		     }
        else if	(  $('#modificar_amaterno').val()=="" ){
			UIkit.modal.alert('Es necesario completar el campo Apellido Materno.');
		     }
         else if	(  $('#modificar_email').val()=="" ){
			UIkit.modal.alert('Es necesario completar el campo Email.');
		     }
		else if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email)) ){
            UIkit.modal.alert('Verifique la dirección de correo electronico (ejemplo@ejemplo.com). ');
          }	 
           else if	(  $('#modificar_celular').val()=="" ){
			UIkit.modal.alert('Es necesario completar el campo Celular.');
		     }			 
	     else if ( !(/^\d{10}$/.test(cel)) ){
			UIkit.modal.alert('Es necesario que el Celular contenga 10 digitos.');
		     }
			 else if( $('#modificar_puesto').val()==null){
			UIkit.modal.alert('Es necesario escoger un puesto.');
		       }
			   else if( $('#modificar_ciudad').val()==null){
			UIkit.modal.alert('Es necesario escoger una ciudad.'); 
		       }
				
	   else{    
			   
		           $.ajax({ 
                   method: "POST",dataType: "json",url: "../../../controllers/setUpdateTblusuarioSinEst.php", 				  
				   data:{solicitadoBy:"WEB",nombre:nombre,				  
				   ap:apaterno,am:amaterno,email:email,
				   cel:cel,puesto:puesto,ciudad:ciudad,id:id, 
				   emailmodifico:emaildeUsuario},
				   beforeSend: function(){
                              $('#cargarModificarUsuario').css('display','inline');								  
                                                 }
				   })
                  .done(function(mg){					
					 if(parseInt(mg.success)==1){ 
					 
							UIkit.modal("#modificar").hide(); //se oculta el pupop de Modificar usuario                           
                              UIkit.modal.alert('Usuario Modificado con &eacute;xito'); 
							  
							
				              
								$('#selectciudad').val(ciudad);				            
				                 $('#tarjetaUsuario').html("");					
				                 mostrarUsuarios();
                                       }
							else{
                              UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');
                                 }
								 
								 }) 	  
                  .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                  .always(function(){ $("#cargarModificarUsuario").hide();  });
				    
				 
		  
	   }	 
	}// fin de la funcion
	
	
	
	function rCO(){
		 $("#agregarNUsuario").removeClass("oculto");
	}
	
	
   function agregarUsuario(){	  
	            
				
	   nombre_alta = $("#alta_nombre").val();  
	  paterno_alta =$("#alta_apaterno").val();
	  materno_alta =$("#alta_amaterno").val();
        email_alta =$("#alta_email").val();	
          cel_alta =$("#alta_cel").val();	
	   puesto_alta =$("#alta_puesto").val();
         pass_alta =$("#alta_password").val();	
         pass_alta2 =$("#alta_passwordDos").val();  
             ciudad =$("#alta_ciudad").val();		 
      estatus_alta = $("#alta_estatus").prop('checked'); 	    
      
	//var emailUsuario = "<?php echo $_SESSION['email']; ?>";	
	var emailUsuario = "reyna";	
	if(estatus_alta){
		   estatus_alta=1;		
		     }
		   else{
			 estatus_alta=0;
		   }  
		  
		  
		 if( $('#alta_nombre').val()==""){			  
		UIkit.modal.alert('Es necesario completar el campo Nombre.');		
		     }       		                
        else if	(  $('#alta_apaterno').val()=="" ){
			UIkit.modal.alert('Es necesario completar el campo Apellido Paterno.');
		     }
        else if	(  $('#alta_amaterno').val()=="" ){
			UIkit.modal.alert('Es necesario completar el campo Apellido Materno.');
		     }
         else if	(  $('#alta_email').val()=="" ){
			UIkit.modal.alert('Es necesario completar el campo Email.');
		     }
		else if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email_alta)) ){
            UIkit.modal.alert('Verifique la dirección de correo electronico (ejemplo@ejemplo.com). ');
          }	 
           else if	(  $('#alta_cel').val()=="" ){
			UIkit.modal.alert('Es necesario completar el campo Celular.');
		     }			 
	     else if ( !(/^\d{10}$/.test(cel_alta)) ){
			UIkit.modal.alert('Es necesario que el Celular contenga 10 digitos.');
		     }
			 
		else if	(  $('#alta_password').val()=="" ){
			UIkit.modal.alert('Es necesario completar el campo Password.');
		     }            
        else if	(  $('#alta_passwordDos').val()=="" ){
			UIkit.modal.alert('Es necesario completar el campo Repetir Password.');
		     }
         else if( (/\s/.test(pass_alta)) || (/\s/.test(pass_alta2)) ){ 
            UIkit.modal.alert('Ingrese un password sin espacios.');
          }		 
          	
          else if(pass_alta!=pass_alta2){
              UIkit.modal.alert('Los Password no son identicos, intentalo de nuevo.'); 
                   }
		else if( $('#alta_puesto').val()==null){
			UIkit.modal.alert('Es necesario escoger un puesto.');
		       }
		else if( $('#alta_ciudad').val()==null){
			UIkit.modal.alert('Es necesario escoger una ciudad.');
		       }
		
	   else{
		   
		 $.ajax({    //inicia ajax  
       method: "POST",dataType: "json",url: "../../../controllers/getCheckTblusuario.php",
	   data: {solicitadoBy:"WEB",email:email_alta,cel:cel_alta}	         
	          })
            .done(function(mpa){  
                 if(parseInt(mpa.datos)==1){
                      UIkit.modal.alert('Este usuario ya esta registrado.');
                                              }
							else 
						{  
					          $("#agregarNUsuario").addClass("oculto");
					 $.ajax({ 
                               method: "POST",dataType: "json",
							   url: "../../../controllers/setTblusuariosmount.php", 
							   data: {solicitadoBy:"WEB",
							   nombre:nombre_alta,
	                           apaterno:paterno_alta,
	                           amaterno:materno_alta,
                               email:email_alta,
							   ciudad:ciudad,
                               cel:cel_alta,	
	                           puesto:puesto_alta,
                               pass:pass_alta,        		 
                               estatus:estatus_alta,
							   emailcreo:emailUsuario},
							   beforeSend: function(){
                              $('#cargarAltaUsuario').css('display','inline');
                                                 }
							   })                                                                                                                                                                                                   
                                                                                                         
							   .done(function(ms){                                    
       
                                    if(parseInt(ms.success)==1){	
									
									   $('#alta_formu')[0].reset(); //vaciar el formulario
                                      UIkit.modal("#altaem").hide();  //oculta el pupop                                     
                                      UIkit.modal.alert('Usuario Registrado con éxito');
                                      
									  $("#paraInicial").remove();
									  
                               
								 $('#selectciudad').val(ciudad);				            
				                 $('#tarjetaUsuario').html("");					
				                 mostrarUsuarios();								
								 //cantidadColonias();   
									
                                    }else {
                                      UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');
                                    }                          
                               })
                              .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                              .always(function(){  $("#cargarAltaUsuario").hide(); //console.log("always");
							  });	
							
					} //cierra else
				
				
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      //.always(function(){  console.log("always");}); //fin ajax
	   }
}//fin de la funcion	



      /*......................mostrar puestos en select..........................*/		 
		function mostrarPuestos(){	
      
     $.ajax({     
     method: "POST",dataType: "json",url: "../../../controllers/getAllTblnivelaccesoAct.php", 
	 data: {solicitadoBy:"WEB"}}) 
            .done(function(mostC){
				 
				  $('#alta_puesto').html(""); 
				 $('#modificar_puesto').html(""); 
				  
				$("#alta_puesto").append('<option value="" disabled selected readonly >Selecciona un puesto...</option>'); 
				//$("#modificar_puesto").append('<option value="" disabled selected readonly >Selecciona un puesto...</option>'); 
				
                $.each(mostC.datos, function(i,item)				
				 {	  
				      idtblniveleacceso=item.idtblniveleacceso;
				 
				 	 
							 //muestra ciudades en el encabezado de la interfaz principal
                 $("#alta_puesto").append('<option  value="' + idtblniveleacceso +'">' + mostC.datos[i].tblniveleacceso_nombre + '</option>');
				 $('#alta_puesto > option[value="1"]' ).addClass('oculto');
				   
				 $("#modificar_puesto").append('<option value="' + idtblniveleacceso +'">' + item.tblniveleacceso_nombre + '</option>');  				    
				 $('#modificar_puesto > option[value="1"]' ).addClass('oculto');	
					});	
					
                                 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      //.always(function(){  console.log("always");});
   } //fin de la funcion
   
   function mostrarCiudades(){	
      
     $.ajax({     
     method: "POST",dataType: "json",url: "../../../controllers/getAllTblciudadAct.php", 
	 data: {solicitadoBy:"WEB"}})
            .done(function(mostC){
				//console.log(mcol);   
				  $('#alta_ciudad').html(""); 
				  $('#modificar_ciudad').html(""); 
				  
			$("#alta_ciudad").append('<option value="" disabled selected readonly >Selecciona una ciudad...</option>'); 
			//$("#modificar_ciudad").append('<option value="" disabled selected readonly >Selecciona una ciudad...</option>'); 
				//$("#modificarCiudadColonia").append('<option value="" disabled selected readonly >Selecciona...</option>');
				
                $.each(mostC.datos, function(i,item)				
				 {	  
				 idtblciudad=item.idtblciudad;	
				 
				 //muestra ciudades en el encabezado de la interfaz principal
                 $("#alta_ciudad").append('<option value="' + idtblciudad +'">' + item.tblciudad_nombre + '</option>');
			    $("#modificar_ciudad").append('<option value="' + idtblciudad +'">' + item.tblciudad_nombre + '</option>');  				 
                $("#selectciudad").append('<option value="' + idtblciudad +'">' + item.tblciudad_nombre + '</option>');  				    
					});	
					
                                 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      //.always(function(){  console.log("always");});
   } 
   
   
  //.................mostrar usuarios		 
       function mostrarUsuarios(){ 	      
               
			   var ciudad= $("#selectciudad").val();
			    
          $.ajax({     
          method: "POST",dataType: "json",
	      url: "../../../controllers/getAllTblusuariosmount.php", data: {solicitadoBy:"WEB",ciudad:ciudad},
		  beforeSend: function(){
				   $('#esperarMostrarUsuarios').css('display','inline');}	
		  })
          .done(function(mo){
			 
			  if(parseInt(mo.success)==1){ 
			   usu=true;
			      $("#paraInicial").remove();
						 $("#tarjetaUsuario").html("");
                       $("#nohayUs").empty();						 
                $.each(mo.datos, function(i,item)
               {				   
			      //asignamos nombres a las valores
			        Nombre=item.tblusuariosmount_nombre;
				    paterno=item.tblusuariosmount_apellidoPaterno; 
					materno=item.tblusuariosmount_apellidoMaterno; 
					email = item.tblusuariosmount_email;
					cel = item.tblusuariosmount_celular;
					pais=item.tblpais_nombre;
					ciudad=item.tblciudad_nombre; 
					puesto = item.tblniveleacceso_nombre;
                    idu=item.idtblusuariosmount;               
                    
				 //muestra ciudades en la tabla 
				                   
	                   if(item.tblusuariosmount_activado=="2"){ 
					   nousu=true}else{
                 $("#tarjetaUsuario").append(
                       
				' <div class="usuarios"><div class="md-card md-card-hover">'+
				                
                      ' <div class="md-card-head ye2 " >'+ //
                      
							 '<div class=""md-card-head-menu" >'+                      
						'<a class="md-fab md-fab-small md-fab-accent uk-float-right" id="botondemodi'+i+'" href="#modificar" '+
		   ' data-uk-modal="{target:"#modificar",bgclose:false, center:true }" onclick="mostrarDatosUsuario('+idu+'); " >'+  	                                                                            
							  ' <i class="material-icons">&#xe254;</i>'+            					  
                               '</a> '+	
                       '<button type="button" class="md-fab md-fab-small md-fab-accent uk-float-left" onclick="eliminarUsuario('+idu+')" '+
				       'id="botonEliminar'+i+'">'+ ' <i class="material-icons">&#xE872;</i>'+   
					   '</button>'+ 
					//	'<a class="md-fab md-fab-small md-fab-accent uk-float-left" id="botonEliminar'+i+'" '+
		              //        ' eliminarUsuario('+idu+'); " >'+  	                                                                            
						//	  ' <i class="material-icons">&#xE872;</i>'+            					  
                         //      '</a> '+	
                       
                    '</div>'+
						
                              '<div class="uk-text-center"> </br>'+ //
							  
                              '<img class="md-card-head-avatar" src="../assets/img/delPanel/pk.jpg" alt=""/>'+
                             ' </div>'+
							/* '<div class="uk-grid uk-grid-medium" >'+	  
						'<div class="uk-width-large-1-2">'+	  
                       '<button type="button" class="md-btn md-btn-flat ye" onclick="eliminarUsuario('+idu+')" '+
				       'id="botonEliminar'+i+'">Eliminar</button>'+ 	 
			           ' </div>'+
					   <button type="submit" id="user_edit_delete" data-uk-tooltip="{cls:'uk-tooltip-small',pos:'bottom'}" 
					   title="Delete"><i class="material-icons md-color-white">&#xE872;</i></button>*/
							 '</div>'+ 
                         '<div class="md-card-content">'+
                      '   <ul class="md-list md-list-addon">'+ //md-list-addon
						 '<li>'+
						 '<div class="md-list-addon-element">'+
                         '<i class="md-list-addon-icon material-icons">&#xE7fd;</i>'+
                         '</div>'+
                         '<div class="md-list-content">'+
                         '<span class="uk-text-small uk-text-muted">Nombre: </span>'+
                          '<span class="uk-text">'+Nombre+' '+paterno+' '+materno+'</span>'+
               			' </div>'+
						'</li>'+
						'<li>'+
						 '<div class="md-list-addon-element">'+
                         '<i class="md-list-addon-icon material-icons">&#xE158;</i>'+
                         '</div>'+		   
									'<div class="md-list-content">'+
                                        '<span class="uk-text-small uk-text-muted">Email:</span>'+
                                      '<span class="uk-text" id="m_email'+idu+'" >'+email+'</span>'+
               					   ' </div>'+
								   '</li>'+
					'<li>'+
						 '<div class="md-list-addon-element">'+
                         '<i class="md-list-addon-icon material-icons">&#xE32c;</i>'+
                         '</div>'+
									'<div class="md-list-content">'+
                                       ' <span class="uk-text-small uk-text-muted">Celular:</span>'+
                                   '<span class="uk-text" id="m_cel'+idu+'" >'+cel+'</span>'+
               					   '</div>'+ 
								  '</li>'+
								'<li>'+
						 '<div class="md-list-addon-element">'+
                         '<i class="md-list-addon-icon material-icons">&#xe7f1;</i>'+
                         '</div>'+
									'<div class="md-list-content">'+
                                       ' <span class="uk-text-small uk-text-muted">Ciudad:</span>'+
                                   '<span class="uk-text" id="ciudadNombre'+idu+'">'+ciudad+'</span>'+
               					   '</div>'+ 
								   '</li>'+  
                               '<li>'+
						 '<div class="md-list-addon-element">'+
                         '<i class="md-list-addon-icon material-icons">&#xe7f1;</i>'+
                         '</div>'+
									'<div class="md-list-content">'+
                                       ' <span class="uk-text-small uk-text-muted">País:</span>'+
                                   '<span class="uk-text">'+pais+'</span>'+
               					   '</div>'+ 
								   '</li>'+								   
					   '<li>'+
						 '<div class="md-list-addon-element">'+
                         '<i class="md-list-addon-icon material-icons">&#xE8f9;</i>'+
                         '</div>'+			   
									'<div class="md-list-content">'+
                                        '<span class="uk-text-small uk-text-muted">Puesto:</span>'+
                                    '<span class="uk-text">'+puesto+'</span>'+
               					   ' </div>'+ 
								   '</li>'+
					'<li>'+
						 '<div class="md-list-addon-element">'+
                         '<i class="md-list-addon-icon material-icons">&#xE88f;</i>'+
                         '</div>'+		   
									'<div class="md-list-content">'+
                                       '<span class="uk-text-small uk-text-muted">Estatus: </span>'+								  
									     '<span>'+       
					'<input type="checkbox" id="mostrarEstatus'+idu+'"  onclick="ModEstatusUsuario('+idu+');" class="checkbox" name="checkbox" '+						                                                   
								          item.tblusuariosmount_activado+'/> '+ 						
								  ' <span class="inline-label" id="estado'+idu+'"> </span>'+
								  
									' </span> '+ 
									'</div> '+
								'</li>'+
								'</ul>'+
									' </div></div> </div>'	
      									
				 );
				                      if(parseInt(item.tblusuariosmount_activado)!=0){
                                          $("#mostrarEstatus"+idu).prop("checked", true);
										 $("#estado"+idu).text("Activo");
										 
                                           }
						                  else {
                                          $("#mostrarEstatus"+idu).prop("checked", false);
										  $("#estado"+idu).text("Desactivado");
                                            } 
					   }		
				  
                      });	 //cierre del each
			  }else{   usu=false;  
			     $("#tarjetaUsuario").html("");
                  $("#nohayUs").text("No hay Usuarios registrados en esta ciudad.");   				 
			  }
                                 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      .always(function(){ $("#esperarMostrarUsuarios").hide(); });
   }  //fin d ela funcion
   
   
    function eliminarUsuario(idu){ 	
                   email=$("#m_email"+idu).val();
				      cel= $("#m_cel"+idu).val();
					estatus=2;  
                   //ciudad= $("ciudadNombre"+idu).val();
                    var ciudad= $("#selectciudad").val();				   
		            
					//var emaildeUsuario = "<?php echo $_SESSION['email']; ?>";
                    var emaildeUsuario = "reyna";
					
           UIkit.modal.confirm('Si desea eliminar al usuario,presione Ok', function(){                      
			     
			   
		          $.ajax({ 
                   method: "POST",dataType:"json",
				   url: "../../../controllers/setDeleteTblusuariomount.php", 				  
				   data:{solicitadoBy:"WEB",id:idu,email:email,
				   cel:cel,estatus:estatus,emailmodifico:emaildeUsuario} })
                  .done(function(mg){
                     				  
					 if(parseInt(mg.success)==1){ 					 
							//UIkit.modal("#modificar").hide(); //se oculta el pupop de Modificar usuario 
                                								
                              UIkit.modal.alert('Usuario Eliminado con &eacute;xito'); 
							  
							 $('#selectciudad').val(ciudad);	
				             $('#tarjetaUsuario').html("");					
				                mostrarUsuarios();
                                       }
							else{
                              UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');
                                 }
								 
								 }) 	  
                  .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                  
		  
	   });	 
	}// fin de la funcion
	
//------------- modifica el estatus de un usuario---------  
  function ModEstatusUsuario(idu){ 
		     activoModificar1 =  $("#mostrarEstatus"+idu).prop('checked');		
										
			
			// var emaildeUsuario = "<?php echo $_SESSION['email']; ?>";
			  var emaildeUsuario = "reyna";
			 
			if(activoModificar1){
		         activoModificar1=1; 
			     $("#estado"+idu).text("Activo");
			   }
		    else{ activoModificar1=0; 
			      $("#estado"+idu).text("Desactivado"); 
				}		   
		  
             $.ajax({ 
                   method:"POST",dataType: "json",url: "../../../controllers/setUpdateUsuario.php", 				  
				   data:{solicitadoBy:"WEB",idusuario:idu,activado:activoModificar1,
				   emailmodifico:emaildeUsuario}})
                  .done(function(mg){
					  
                            if(parseInt(mg.success)==1){  
							
                              UIkit.modal.alert('Estatus del Usuario modificado con &eacute;xito'); 
							   
							} else{
                              UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');
                                 }     
								 }) 	  
                  .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                  //.always(function(){  console.log("always");});
			 
	}//fin d ela funcion   
  	
    </script>



</body>
</html>