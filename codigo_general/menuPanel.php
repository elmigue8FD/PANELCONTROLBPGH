<?php
require_once '../php/seguridad.php'; 
?>
 <!doctype html>
<html lang="en">
<!-- Create by: Reyna Maria Martinez Vazquez-->
<head>
    <meta charset="UTF-8">

 <link rel="stylesheet" href="../assets/css/colorPanel.css" media="all"> 
 
</head>
 <header id="header_main">
        <div class="header_main_content">
            <nav class="uk-navbar">
                                
                <!-- main sidebar switch -->
                <a href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left">
                    <span class="sSwitchIcon"></span>
                </a>
                
                <!-- secondary sidebar switch -->
                <a href="#" id="sidebar_secondary_toggle" class="sSwitch sSwitch_right sidebar_secondary_check">
                    <span class="sSwitchIcon"></span>
                </a>
				
				
				
                <div class="uk-navbar-flip">
                    <ul class="uk-navbar-nav user_actions">       
		
                        <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                            <a class="user_action_image"><img class="md-user-image" src="../assets/img/delPanel/pk.jpg" alt=""/></a>
                            <div class="uk-dropdown uk-dropdown-small">
                                <ul class="uk-nav js-uk-prevent">
                                    <li><a data-uk-modal="{target:'#modificarPerfil',bgclose:false,modal:false,modal:false}" onclick="perfilUsuario();devCel();">Mi perfil</a></li>
                                    <li><a id="logOut" >Cerrar sesión</a></li>                                                        
                                </ul>
                            </div>
                        </li>  
                    </ul>
                </div>
            </nav>
        </div>
		
		
		<!-- ---------------------------------------------- -->
		<div class="uk-modal" id="modificarPerfil"> 
        <div class="uk-modal-dialog uk-modal-dialog-small">
		<button type="button"  class="uk-modal-close uk-close uk-close-alt"></button>
            <form class="uk-form-stacked" id="modificar_formu">
			 <h3 class="heading_b uk-margin-bottom">Mi Perfil</h3>
			<div class="uk-grid uk-margin-medium-top uk-margin-large-bottom" data-uk-grid-margin>             
			 <div class="uk-width-large-1-2">
			 <ul class="md-list md-list-addon">
			 			   
				<label class="uk-text-muted uk-text-small" >Nombre:</label> 
				<span id="idusuario" class="uk-text-large oculto"> </span>
			          <div class="uk-margin-medium-bottom">                  
                   <!-- <input type="text" class="md-input" id="nombres"  disabled name="snippet_title" />
					-->
					
					<span id="nombres" class="uk-text-large"> </span>
                       </div>
					   
					<label class="uk-text-muted uk-text-small">Apellido Paterno:</label> 
			          <div class="uk-margin-medium-bottom">                   
                   
					<span id="apat" class="uk-text-large"> </span>
                       </div>
					   
					   <label class="uk-text-muted uk-text-small">Apellido Materno:</label> 
			          <div class="uk-margin-medium-bottom">                 
                   
					<span id="amat" class="uk-text-large"> </span>
                       </div>
				  
					<label class="uk-text-muted uk-text-small">Email:</label>
				    <div class="uk-margin-medium-bottom">                   
                
					<span id="email" class="uk-text-large"> </span>
            
                     </div>
				   <label class="uk-text-muted uk-text-small">Contacto:</label>
                <div class="uk-margin-medium-bottom"> 
				<input type="text" class="md-input" id="cel" maxlength="10" />
              </div>
				 </ul> </div>
				 
				 <div class="uk-width-large-1-2">
			      <ul class="md-list md-list-addon">
				 <label for="task_title">¿Cambiar contraseña?</label>
				<div class="uk-margin-medium-bottom">                    					   
                         <div>	</br>				    
							<span class="icheck-inline">							
                                <input type="radio" name="preguntaPass" checked value="1" id="no" onclick="mostrarMas();"  /> 
                                <label>No.</label> 
                            </span>
						</div>
						<div>	
							<span class="icheck-inline">
                                <input type="radio" name="preguntaPass" value="2" id="si"  onclick="mostrarMas();"/> 
                                <label>Si.</label> 
                            </span>
						</div>
						
                </div>
				
		   <!--<div class="uk-width-large-1-2"  id="verificarPass">
			 <ul class="md-list md-list-addon"> </ul> </div> -->
				<div class="uk-margin-medium-bottom oculto" id="verificarPass">
                    <label for="task_title">Ingrese contraseña actual:</label>
                    <input type="password" class="md-input" id="password_actual" name="snippet_title" />
					
			<div class="uk-modal-footer uk-text-right">                   
			     <button type="button" class="md-btn md-btn-flat ye" id="boton_modificar" onclick="verificar();">Siguiente</button>
            </div>
                </div>
				<div  id="resp" class="uk-text-center"></div>
				
		    <!-- <div class="uk-width-large-1-2"  >
			 <ul class="md-list md-list-addon">  </ul> </div> -->
			    <div class="oculto" id="CambiarPass">
				<div class="uk-margin-medium-bottom">
                    <label for="task_title">Nueva contraseña:</label>
                    <input type="password" class="md-input" id="password" name="snippet_title" />
                </div>
				<div class="uk-margin-medium-bottom">
                    <label for="task_title">Repetir contraseña:</label>
                    <input type="password" class="md-input" id="password2" name="snippet_title" />
                </div>
				</div>
				
				 </ul>             
				</div>
				
				 <div class="uk-text-center oculto" id="cargarModificarUsuario" >
                <label> Procesando... </label>
				  <img src="cargando.gif" /> 				 
                 </div>
				 
				
                </div>   
				<div class="uk-modal-footer uk-text-right">
                    <!--  onclick="" -->
			     <button type="button" class="md-btn md-btn-flat ye" id="boton_modificar" onclick="actualizarDatos();">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
		
		<!-- ----------------------------- -->
		
        
    </header><!-- main header end -->
 
 <aside id="sidebar_main">       
         <div class="sidebar_main_header">
          <a class="Sidebar_hide sidebar_logo_large">
         <img class="logo_regular" src="../assets/img/bepickler.png" alt="" height="200" width="200"/>
         </div>
         
		
		
		<!-- empieza el menu -->  
        <div class="menu_section">
            <ul>
				  
				  <li title="Inicio">
                    <a href="index2.php">
                        <span class="menu_icon"><i class="material-icons">&#xe88a;</i></span>
                        <span class="menu_title">Inicio</span>
                    </a>
                    
                    </li>
					  
                <li title="Ubicacion">
                    <a href="ubicacion.php">
                        <span class="menu_icon"><i class="material-icons">&#xe55f;</i></span>
                        <span class="menu_title">Ubicaci&oacute;n</span>
                    </a>
                    
                
                </li>
                
				
				    <li title="Horas">
                    <a href="horas.php">
                        <span class="menu_icon"><i class="material-icons">&#xe8ae;</i></span>
                        <span class="menu_title">Horas</span>
                    </a>
                    
                   </li>
				
				     <li title="Proveedor">
                    <a href="proveedor.php">
                        <span class="menu_icon"><i class="material-icons">&#xe7e9;</i></span>
                        <span class="menu_title">Proveedor</span>
                    </a>
                    
                      </li>
					  
					  
					  <li title="Productos">
                    <a href="productos.php">
                        <span class="menu_icon"><i class="material-icons">&#xe8cc;</i></span>
                        <span class="menu_title">Productos</span>
                    </a>
                    
                      </li>
					  
					  <li title="Fot&oacute;grafos">
                    <a href="fotografos.php">
                        <span class="menu_icon"><i class="material-icons">&#xe412;</i></span>
                        <span class="menu_title">Fot&oacute;grafos</span>
                    </a>
                    
                      </li>
					
					
					
				
                <li title="Clientes">
                    <a href="cliente.php">
                        <span class="menu_icon"><i class="material-icons">&#xe851;</i></span>
                        <span class="menu_title">Clientes</span>
                    </a>
                    
                
                </li>
				
                <li title="Ventas">
                    <a href="ventas.php">
                        <span class="menu_icon"><i class="material-icons">&#xe263;</i></span>
                        <span class="menu_title">Ventas</span>
                    </a>
                   
                
                </li>
				
                <li title="Cotizaciones">
                    <a href="cotizaciones.php">
                        <span class="menu_icon"><i class="material-icons">&#xe14f;</i></span>
                        <span class="menu_title">Cotizaciones</span>
                    </a>
                    
                
                </li>
                <li title="Cupones">
                    <a href="cupones.php">
                        <span class="menu_icon"><i class="material-icons">&#xe553;</i></span>
                        <span class="menu_title">Cupones</span>
                    </a>
                   
                
                </li>
				
				
                  <li title="Usuarios">
                    <a href="usuario.php">
                        <span class="menu_icon"><i class="material-icons">&#xe7ef;</i></span>
                        <span class="menu_title">Usuarios</span>
                    </a>
                    
                
                  </li>
                
				<li title="Notificaciones">
                    <a href="notificaciones.php">
                        <span class="menu_icon"><i class="material-icons">&#xe7f4;</i></span>
                        <span class="menu_title">Notificaciones</span>
                    </a>
                    
                
                  </li>
                
            </ul>
        </div>
    </aside>
	
   <script src="../assets/js/common.min.js"></script>
   
    <script src="../assets/js/uikit_custom.min.js"></script>
    
    <script src="../assets/js/altair_admin_common.min.js"></script>
	 <!--altair core functions -->
	 
	 
<?php include('script_commonPB.php'); ?>
<script>

  //Create by: Reyna Maria Martinez Vazquez
$(document).ready(function()
{

  
  $("#logOut").click(function(){
        cerrarSesion();
    });
 

});


function cerrarSesion(){
              $.ajax({
                    method: "POST",   
                    url: "../php/cerrarSessionP.php",
                    data: {}
                  })
                  .done(function( msg ) {
                   
				   window.location.href = "index.php";
				   
                  })
                  .fail(function( jqXHR, textStatus ) {
                    console.log("fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);
                  })   .always(function(){
                    console.log("always");
                  });
 }//fin de la funcion
 
   
  function perfilUsuario() {
	  
	          $('#idusuario').text("<?php echo $_SESSION['idusuario']; ?>");
              $('#nombres').text("<?php echo $_SESSION['nombre']; ?>");
              $('#apat').text("<?php echo $_SESSION['apellidoPaterno']; ?>");
              $('#amat').text("<?php echo $_SESSION['apellidoMaterno']; ?>");
            //  $('#cel').val("<?php echo $_SESSION['celular']; ?>");
              $('#email').text("<?php echo $_SESSION['email']; ?>");
			  
		
 } //fin de la funcion
 
 
 function mostrarMas(){
		  $("input[name='preguntaPass']").html("");
    tipo= $("input[name='preguntaPass']:checked").val();
	  
	  
	  
		if(tipo=="1"){	
			//console.log("no");  
			$("#verificarPass").addClass("oculto");
		    }
	    if(tipo=="2"){		                
           //console.log("si");	
		  $("#verificarPass").removeClass("oculto");
			   }
	 } // fin de la funcion
	 
function verificar(){
	
	  var email = "<?php echo $_SESSION['email']; ?>";		 
	var idusuario = <?php echo $_SESSION['idusuario']; ?>;
	 var pass =$("#password_actual").val(); 
	 
	if( $('#password_actual').val()==""){			  
	          	 UIkit.modal.alert('Es necesario ingresar la contraseña actual.');		
		           }  			
				
	         else {	 
     $.ajax({     
     method: "POST",dataType: "json",url: "./../../controllers/getTblusuariosmountUsuario1.php", 
	 data: {solicitadoBy:"WEB",email:email,pass:pass }}) 
            .done(function(mfe){			
				   if (parseInt(mfe.success)==1) {				   
				  $("#resp").html("");
				$("#CambiarPass").removeClass('oculto');
										
				   }else{ 
				   $("#resp").html("");
				 $("#resp").append('<span class="uk-badge uk-badge-warning">Contraseña incorrecta.</span>');
				$("#CambiarPass").addClass('oculto');
				    } 
                                 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
	   
			 }
}//fin

function devCel(){
	
	  
	var idusuario = <?php echo $_SESSION['idusuario']; ?>;
	
	     $.ajax({     
     method: "POST",dataType: "json",url: "./../../controllers/getTblUsuario.php", 
	 data: {solicitadoBy:"WEB",idtblusuario:idusuario}})  
            .done(function(mfe){			
				   if (parseInt(mfe.success)==1) {	
				   
				    $.each(mfe.datos, function(i,item)
                    {       cel=item.tblusuariosmount_celular;
				          $("#cel").html("");
				  
				          $('#cel').val(cel);
				   
					    });	 //cierre del each					
				   }else{ 
				    UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');				 
				    } 
                                 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
	   
			 
}//fin

function actualizarDatos(){
	
         var actual =$("#password_actual").val();
	     var pass1 =$("#password").val();
         var pass2 =$("#password2").val();		 
		 var cel= $("#cel").val(); 
           var email = "<?php echo $_SESSION['email']; ?>";		 
		 var idusuario = <?php echo $_SESSION['idusuario']; ?>;
         
		 
    tipo= $("input[name='preguntaPass']:checked").val();
     
      
    if (tipo=="1"){  //no
	 
	       if( $('#cel').val()==""){			  
	          	 UIkit.modal.alert('Es necesario completar el campo de Contacto.');		
		           }
	        else if ( !(/^\d{10}$/.test(cel)) ){
			UIkit.modal.alert('Es necesario que el Contacto solo contenga 10 digitos y sin espacios.');
		     }	
			 
	       else{
		  
	 $.ajax({     
     method: "POST",dataType: "json",url: "./../../controllers/setUpdateTblusuariosmountCel.php", 
	 data: {solicitadoBy:"WEB",idusuario:idusuario,cel:cel,emailmodifico:email}}) 
            .done(function(mf){			
				   if (parseInt(mf.success)==1) {	
				   
				             UIkit.modal("#modificarPerfil").hide(); //se oculta el pupop                           
                              UIkit.modal.alert('Datos Modificados con éxito.'); 						  
							  $('#modificar_formu')[0].reset(); //limpia el form
           
				            
				   }else{ 
				     UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');
				 
				    } 
                                 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
	} 
	  }  //fin del 1

	  
  if (tipo=="2"){
	  
	  
	       if (  $('#password_actual').val()=="" ){
			   UIkit.modal.alert('Escogiste cambiar contraseña. Es necesario ingresar contraseña actual.');
		         }		       
	     else if	(  $('#password').val()=="" ){
			UIkit.modal.alert('Es necesario completar el campo de Nueva Contraseña.');
		     }	
        else if	(  $('#password2').val()=="" ){
			UIkit.modal.alert('Es necesario completar el campo de Repetir contraseña.');
		     }
       else if( (/\s/.test(pass1)) || (/\s/.test(pass2)) ){ 
            UIkit.modal.alert('Ingrese un password sin espacios.');
          }	
	else if(!(/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/.test(pass1)) ){
            UIkit.modal.alert('La contraseña debe tener mínimo 8 caracteres, al menos una minúscula, al menos una mayúscula y al menos un número o caracter especial. Verifique campo Nueva Contraseña.');
          } 
		else if(!(/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/.test(pass2)) ){
            UIkit.modal.alert('La contraseña debe tener mínimo 8 caracteres, al menos una minúscula, al menos una mayúscula y al menos un número o caracter especial. Veifique campo Repetir Contraseña. ');
          } 
        else if(pass1!=pass2){
              UIkit.modal.alert('Los Password no son identicos, intentalo de nuevo.'); 
                   }				
	   else {	 
     $.ajax({     
     method: "POST",dataType: "json",url: "./../../controllers/setUpdateTblusuariosmountCelP.php", 
	 data: {solicitadoBy:"WEB",idusuario:idusuario,cel:cel,emailmodifico:email,pass:pass1 }}) 
            .done(function(mfe){			
				   if (parseInt(mfe.success)==1) {	
				   
				       UIkit.modal("#modificarPerfil").hide(); //se oculta el pupop                           
                              UIkit.modal.alert('Datos Modificados con éxito.'); 						  
							  $('#modificar_formu')[0].reset(); //limpia el form
				  
				  
				   }else{ 
				   UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');
				 
				    } 
                                 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
	   
	   } 
	  
     }//fin del 2
   } //fin de la funcion 

</script>	