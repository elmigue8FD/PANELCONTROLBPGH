<?php
require_once '../php/seguridad.php'; 
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
    <link rel="stylesheet" href="../bower_components/uikit/css/uikit.almost-flat.min.css" media="all" >
    <!-- flag icons -->
    <link rel="stylesheet" href="../assets/icons/flags/flags.min.css" media="all" >
    <!-- style switcher --> 
    <link rel="stylesheet" href="../assets/css/style_switcher.min.css" media="all" >   
    <!-- altair admin -->
    <link rel="stylesheet" href="../assets/css/mainPanel.css" media="all" id="dep">
    <!-- themes 	-->
    <link rel="stylesheet" href="../assets/css/themes/themes_combined.min.css" media="all" >
	<link rel="stylesheet" href="../assets/css/colorPanel.css" media="all"> 	
	 <!-- htmleditor (codeMirror) -->
    <link rel="stylesheet" href="../bower_components/codemirror/lib/codemirror.css">
	 <!-- dropify -->
    <link rel="stylesheet" href="../assets/skins/dropify/css/dropify.css">	

   
</head>
<body class=" sidebar_main_open sidebar_main_swipe">
    <!-- main header -->
   <?php include("../codigo_general/menuPanel.php"); ?>
   
   <!-- main sidebar end -->

   <div id="page_content">
        <div id="page_content_inner">

           
			<div class="md-card">
					    <div class="md-card-content">
									<div>         
                                    <h2>Fotógrafos</h2>                                   
                                    </div>									
				
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-3">
                             <span class="uk-text-small">Selecciona una ciudad: </span>
                             <select id="selectCiudad" name="selectCiudad" class="uk-button uk-form-select" data-uk-form-select  onchange="javascript:mostrarFotografo();cantidadFotografos();seleccFotografo();">
                            <option value="" disabled selected hidden>Selecciona...</option>
						   </select>  
                        </br>
							
						 
						   </br>
						   <div class="uk-text-center oculto" id="esperarMostrarfotografo" >
                                      <label> Procesando... </label>
				                       <img src="cargando.gif" /> 				 
                                           </div> 
                        </div>
						<div class="uk-width-medium-1-3"> </div>
						
						<div id="selMuestFoto" class="uk-width-medium-1-3 uk-float-right oculto">
                            <span class="uk-text-small">Ver solo Fotógrafo: </span> <!-- datos del -->
                                   <select id="SelectFotografo" name="SelectFotografo" class="uk-button uk-form-select" data-uk-form-select  onchange="javascript:especificoFotografo();" >
                                    <option value="" disabled selected readonly >Selecciona...</option>
                                   </select>                             
                        </div>
					</div>
					
					<label class="uk-float-right" id="numeroFotografos"> </label>
					</br>
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
							<!-- ............... empieza tarjeta ................ -->
				  <div id="listarFotografo">
				 </div>
				<!-- muestra fotografos-->
				
				
			<!-- ------------------------------- -->
	    </div ><!-- de  id="page_content" -->
        </div> <!-- id="page_content_inner" -->

	 <!-- icono agregar mas-->
	
   <div class="md-fab-wrapper" data-uk-dropdown="{pos:'bottom-right'}">
        <a class="md-fab md-fab-accent" href="#altaf" data-uk-modal="{target:'#altaf',bgclose:false, center:true }">
            <i class="material-icons">&#xE145;</i>
        </a>
    </div> 
	
	
	<!-- modificar pasteleria  :::::::::::::::::::::::::::::::::::::: -->
	 <!-- alta fotografos -->
	  <div class="uk-modal" id="altaf">
        <div class="uk-modal-dialog uk-modal-dialog-large">
		 <button type="button"  class="uk-modal-close uk-close uk-close-alt"></button>
            <form enctype="multipart/form-data" method="POST" class="uk-form-stacked" id="formuAlta">
			  <h3 class="heading_b uk-margin-bottom">Agregar nuevo fot&oacute;grafo </h3>
			    
				<div class="uk-grid uk-margin-medium-top uk-margin-large-bottom" data-uk-grid-margin>
             
			 <div class="uk-width-large-1-2">
			 <ul class="md-list md-list-addon">
                <div class="uk-margin-medium-bottom">
                   <label for="task_title">Nombre del fot&oacute;grafo</label>
                    <input type="text" class="md-input" id="foto_nombre" name="snippet_title"/>
                </div>
				<div class="uk-margin-medium-bottom">
                    <label for="task_title">Ciudad</label>
                    <select id="foto_Ciudad" name="foto_Ciudad" class="uk-button uk-form-select" data-uk-form-select >
                   <option value="" disabled selected hidden>Selecciona...</option>
					     <optgroup label="Selecciona.." disabled selected>
                   </select>
                </div>
				<div class="uk-margin-medium-bottom">
                    <label for="task_title">Dirección (Calle y Número)</label>
                    <input type="text" class="md-input" id="foto_direccion" name="snippet_title"/>
                </div>
				
				<div class="uk-margin-medium-bottom">
                    <label for="task_title">Teléfono</label>
                    <input id="foto_tel" type="text" class="md-input" minlength="7" maxlength="10" />
                       
                </div>
				<div class="uk-margin-medium-bottom">
                    <label for="task_title">Precio por foto (00.00)</label>
					<div class="uk-input-group">
                                <span class="uk-input-group-addon">$</span>                               
                                <input type="text" id="foto_precio" class="md-input" />
                            </div>  
                </div>				
				</ul>
				</div>
				 <div class="uk-width-large-1-2">
			 <ul class="md-list md-list-addon">
				
				
				
				<div class="uk-margin-medium-bottom uk-text-center">
                            <label for="task_title">Subir fotograf&iacute;as</label>
                            <input type="file" id="foto1" name="foto1" class="dropify" data-max-file-size="1000K" accept="image/jpg,jpeg,png,gif" />
						    <input type="hidden" id="fotoUnoBD" name="foto1BD" />
							<label for="task_priority" class="uk-form-label">Foto 1</label>
                                          
                            <input type="file" id="foto2" name="foto2" class="dropify" data-max-file-size="1000K" accept="image/jpg,jpeg,png,gif" />
							 <input type="hidden" id="fotoDosBD" name="foto2BD" />
							<label for="task_priority" class="uk-form-label">Foto 2</label>
                   </div>
				 
                 </ul>
				 </div>
				 </div>
				 
				  <div class="uk-text-center oculto" id="esperarAgregarFotografo" >
                <label > Procesando... </label>
				  <img src="cargando.gif" /> 				 
                 </div>
				
				
                <div class="uk-modal-footer uk-text-right">                   
			  <button type="button" class="md-btn md-btn-flat ye" id="agFotografo" onclick="agregarFotografo();">Agregar</button>
                </div>
            </form>
        </div>
    </div>
	
	
	
	
	
       <!-- modificar estados  :::::::::::::::::::::::::::::::::::::: -->
	<div class="uk-modal" id="modificar2"> 
        <div class="uk-modal-dialog uk-modal-dialog-large">
		 <button type="button"  class="uk-modal-close uk-close uk-close-alt"></button>
            <form class="uk-form-stacked" id="formModificar">
			   <!--<label for="task_title">Modificar</label> -->
			    <h3 class="heading_b uk-margin-bottom">Modificar Datos</h3>
			   
			   <div class="uk-grid uk-margin-medium-top uk-margin-large-bottom" data-uk-grid-margin>
             
			 <div class="uk-width-large-1-2">
			 <ul class="md-list md-list-addon">
			   <label for="task_title">Fotógrafo</label>
                <div class="uk-margin-medium-bottom">    
                  <span class="oculto" id="mod_idFotografo"></span>				
                    <input type="text" class="md-input" id="mod_nombre" name="snippet_title" />
                </div>
				 <label for="task_title">Ciudad</label>
				<div class="uk-margin-medium-bottom">                   
                    <select id="mod_ciudad" class="uk-button uk-form-select" data-uk-form-select >
                   <option value="" disabled selected hidden>Selecciona...</option>					    
                   </select>
                </div>
				<label for="task_title">Dirección (Calle y Número)</label>
				<div class="uk-margin-medium-bottom">                    
                 <input type="text" class="md-input" id="mod_direcc" name="snippet_title" />
                </div>
				  <label for="task_title">Contacto</label> <!-- minlength="7"  maxlength="10" -->
                <div class="uk-margin-medium-bottom">                  
                      <input type="text" class="md-input" id="mod_tel" name="snippet_title" minlength="7"  maxlength="10" /> 
                        </div>
			     <label for="task_title">Precio por foto</label>
				<div class="uk-margin-medium-bottom">                   
                   <div class="uk-input-group">
                                <span class="uk-input-group-addon">$</span>                               
                                <input type="text" id="mod_precio" class="md-input" />
                            </div> 
                </div>
               </ul>
			   
			                            
			  
			   </div>
			   
			    <div class="uk-width-large-1-2">
			     <ul class="md-list md-list-addon">                
				
				   <h4 class="uk-text-center">Fotografías actuales</h4>
                                        <div  id="fotosActuales" class="uk-grid" data-uk-grid-margin>
                                        </div>
                                        
                                      <div class="uk-grid" > 
                                        <div class="uk-width-medium-1-2 uk-text-center">
                                        
                                            <span class="uk-text-muted">Fotografía 1</span>                                             
                                              <input type="file" id="nuevaFoto1" name="nuevaFoto1Name"  accept="image/jpeg,jpg,png,gif" class="dropify" data-max-file-size="1000K" />
                                              <input type="hidden" id="nuFoto1BD" name="nuFoto1BDName" />
                                          
                                        </div>
                                        <div class="uk-width-medium-1-2 uk-text-center">
                                        <!--  <div class="md-card">
                                            <div class="md-card-content"> -->
                                             <span class="uk-text-muted">Fotografía 2</span>                                              
                                              <input type="file" id="nuevaFoto2" name="nuevaFoto2Name"  accept="image/jpeg,jpg,png,gif" class="dropify" data-max-file-size="1000K" />
                                              <input type="hidden" id="nuFoto2BD" name="nuFoto2BDName" />
                                           <!-- </div>
                                          </div> -->
                                        </div>
                                        
                                      </div> 
				   
				   </ul>
				   </div>
				   </div>
				   <div class="uk-text-center oculto" id="esperarModificarFotografo" >
                <label > Procesando... </label>
				  <img src="cargando.gif" /> 				 
                 </div>
				   
                <div class="uk-modal-footer uk-text-right">
                    
			  <button type="button" class="md-btn md-btn-flat ye" id="btModificar" onclick="actualizarFotografo();" >Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>

   
    <!-- page specific plugins -->
  <?php include('../codigo_general/script_commonPB.php'); ?>  <!-- llamada para ejecutar el jquery -->
	 
	<!--  dropify -->
    <script src="../assets/js/custom/dropify/dist/js/dropify.min.js"></script>
    <!--  form file input functions -->
    <script src="../assets/js/pages/forms_file_input.min.js"></script>		
    <!-- ionrangeslider -->
    <script src="../bower_components/ion.rangeslider/js/ion.rangeSlider.min.js"></script>
    <!-- htmleditor (codeMirror) -->
    <script src="../assets/js/uikit_htmleditor_custom.min.js"></script>
    <!-- inputmask-->
    <script src="../bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.js"></script>
    <!--  forms advanced functions -->
    <script src="../assets/js/pages/forms_advanced.min.js"></script>
	
    <script>
	 $( window ).ready(function()
    {
        //console.log('pagina lista');
	mostrarCiudades();  //se cargar automaticamente cuando carge la pagina	
	
	}); 
	
	function especificoFotografo(){
		var idtblfotografo= $("#SelectFotografo").val();
		
		if(idtblfotografo=="todos"){   
		                            var idtblciudad= $("#selectCiudad").val();
                                      $("#selectCiudad").val(idtblciudad);				                
                                      $("#listarFotografo").html("");								
				                        mostrarFotografo(); 
  		
		}else{
	
	$.ajax({ 
        method: "POST",dataType: "json",url: "../../../controllers/getAllTblfotografobyidTblfotografo.php", 
		data: {solicitadoBy:"WEB",idtblfotografo:idtblfotografo}, 
		beforeSend: function(){     
           $('#esperarMostrarfotografo').css('display','inline');								  
                                                 }
		
		})
          .done(function(mprov){
				
				 if(parseInt(mprov.success)==1){
					 nohaypp=true;
                    // $("#paraInicial").addClass('oculto'); 
					 
				     $('#listarFotografo').html("");                   
                  $.each(mprov.datos, function(g,item)
				 {	
			         idfo=item.idtblfotografo;
				  $("#listarFotografo").append(
				 '<div class="md-card">'+
                '<div class="md-card-content">'+
				'<div class="uk-grid " data-uk-grid-margin>'+	
				 '  <div class="md-card-head-menu" >'+
                  '    <a id="bbMod'+g+'" class="md-fab md-fab-small md-fab-accent uk-float-right" href="#modificar2"'+
				  ' data-uk-modal="{target:"#modificar2",bgclose:false, center:true }" '+
				  'onclick="mostrarDatosFotografo('+idfo+');">'+
                   '   <i class="material-icons">&#xe254;</i>'+
                    '            </a>'+
					'<button type="button" class="md-fab md-fab-small md-fab-accent uk-float-left" onclick="eliminarFotografo('+idfo+')" '+
				       'id="botonEliminarFotografo'+g+'">'+ ' <i class="material-icons">&#xE872;</i>'+   
					   '</button>'+  //' </div>'+
								
                     '        </div>'+
					 '  <div class="uk-width-large-1-4" id="parafoto'+mprov.datos[g].idtblfotografo+'">	 '+
						
						
						'	</div>	'+
						
						'<div class="uk-width-large-3-4"> '+
					 	'<div class="uk-text-center"> 	'+			   
                        '<div class="md-card-content">'+
                          '  <ul class="md-list">'+
							'    <li> <div class="md-list-content">'+
                             '           <h3 class="uk-text-bold">Fot&oacute;grafo</h3>'+
                              '          <span>'+item.tblfotografo_nombre+'</span>'+
                               '     </div> '+
                               ' </li></ul></div></div> '+
					 '<div class="uk-grid"> '+
					 '<div class="uk-width-large-2-4">  '+        			 
                      '  <div class="md-card-content"> '+
                       '     <ul class="md-list"> '+
						'	 <li>'+
                         '           <div class="md-list-content">'+
                          '              <span class="uk-text-small uk-text-muted">Ciudad</span>'+
                           '             <span >'+item.tblciudad_nombre+'</span> '+  
						    '        </div> '+
                             '   </li><li> '+
                              '      <div class="md-list-content"> '+
                               '         <span class="uk-text-small uk-text-muted">Direcci&oacute;n</span> '+
                                '        <span id="dirr'+idfo+'">'+item.tblfotografo_direccion+'</span> '+
                                 '   </div> '+
                                '</li>'+
								
								'</ul></div></div> '+
					 '<div class="uk-width-large-2-4"> '+
                      '  <div class="md-card-content"> '+
                       '     <ul class="md-list"> '+
					   '<li> '+
                                 '   <div class="md-list-content"> '+
                                  '      <span class="uk-text-small uk-text-muted">Tel&eacute;fono</span> '+
                                   '     <span id="contacto'+idfo+'">'+item.tblfotografo_contacto+'</span> '+
                                    '</div> '+
                                '</li>'+
						'	<li> '+
                         '           <div class="md-list-content"> '+
                          '              <span class="uk-text-small uk-text-muted">Precio por foto</span> '+
                           '         <label>$<span>'+item.tblfotografo_preciofoto+'</span> </label> '+
                            '        </div> '+
                             '   </li>'+
							 
                               ' </ul>'+
                        '</div> </div> </div> </div> </div> </div></div> '									 
									);									
							     
			            									
							
								  
								  
								  	//___________________________________			
			                     $.ajax({ 
                                 method: "POST",dataType: "json",
		                         url: "../../../controllers/getAllTblfotografocatalogobyTblfotografo.php", 
		                         data: {solicitadoBy:"WEB",idtblfotografo:idfo}}) 
                                 .done(function(ab){
				                 if(parseInt(ab.success)==1){					             
                                 imagen=true; 
                                 $.each(ab.datos, function(x,item)
				                 {	
								
			 $("#parafoto"+mprov.datos[g].idtblfotografo).append('<div class="uk-width-large-1-1 uk-container-center">'+	
			' <img id="ta" class="tama" src="../assets/img/fotografos/'+ab.datos[x].tblfotografocatalogo_srcimg +'" />  </div>');
                                  }); //fin del each
                           
                               } else { imagen=false;  } 
							  
	            }) .fail(function( jqXHR, textStatus ) { console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})	
					  
					//-----------------
							//........................
                            } ); // fin del each				     
                            //----------------------
                                      }
							else 
						{     nohaypp=false; 
					// $("#paraInicial").removeClass('oculto');
					$('#listarFotografo').html(""); 
				
					  }
			 
              })
			 
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      .always(function(){ $("#esperarMostrarfotografo").hide();  });
		}
	  
   } //fin de la funcion
	function seleccFotografo(){		
	 var idtblciudad= $("#selectCiudad").val();
          $("#SelectFotografo").html("");
      $.ajax({     
     method: "POST",dataType: "json",url: "../../../controllers/getAllTblfotografobyTblciudad2.php", 
	 data: {solicitadoBy:"WEB",idtblciudad:idtblciudad}})
            .done(function(mostF){
			   if(parseInt(mostF.success)==1){
				   $("#selMuestFoto").removeClass('oculto');
				   
				$("#SelectFotografo").append('<option value="" disabled selected readonly >Selecciona...</option>');
				 $("#SelectFotografo").append('<option value="todos">Todos</option>');   
                $.each(mostF.datos, function(i,item)
				 {	idtblfo=item.idtblfotografo;	
				 //muestra ciudades en el encabezado de la interfaz principal
                 $("#SelectFotografo").append('<option value="' + idtblfo +'">' + item.tblfotografo_nombre + '</option>');
				  			 
                      });	 
				}else{ $("#selMuestFoto").addClass('oculto');}             
              
			  })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})	 
	
	}//fin d ela funcion
	
	 function cantidadFotografos(){
	   var idtblciudad=$("#selectCiudad").val(); 
	   //se recibe el id del select de la ciudad que selecciono el usuario en la pantalla principal
	     
		             	 
     $.ajax({     
       method: "POST",dataType: "json",
	   url: "../../../controllers/getCountAllTblfotografoByTblCiudad.php", 
	   data: {solicitadoBy:"WEB",tblciudad_idtblciudad:idtblciudad}})
            .done(function(mc){  
				   
                     if(parseInt(mc.success)==1){ 
			$("#numeroFotografos").text('Fotografos registrados en esta ciudad: '+mc.datos);		
				 
					 }
						
               //....
				 else{ 
				
				  $("#numeroFotografos").text("No tienes Fotografos en esta ciudad ");	
				        
						} 
				 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      
   }  // fin de la funcion
   
	function agregarFotografo(){	  
	  
	 nombre = $("#foto_nombre").val();  
	 ciudad=$("#foto_Ciudad").val();
	 direccion =$("#foto_direccion").val();    
     telefono= $("#foto_tel").val();    
     precio =$("#foto_precio").val();
     estatus=1;	 
     
	 var emailUsuario = "<?php echo $_SESSION['email']; ?>";		 
	 
	  srcimg1=$('#foto1').val().replace(/C:\\fakepath\\/i, '');  //id del input visible
      srcimg2=$('#foto2').val().replace(/C:\\fakepath\\/i, '');
	  
	        srcimg1='foto_'+srcimg1;
            srcimg2='foto_'+srcimg2;
		  $('#fotoUnoBD').val(srcimg1);  //input oculto
		  $('#fotoDosBD').val(srcimg2);  //input oculto
		  
		 
		
		 if( $('#foto_nombre').val()==""){			  
		UIkit.modal.alert('Es necesario completar el campo de Nombre.');		
		     } 
      else if( $('#foto_Ciudad').val()==null){
			UIkit.modal.alert('Es necesario escoger una ciudad.');
		       }			 
        else if	(  $('#foto_direccion').val()=="" ){
			UIkit.modal.alert('Es necesario completar el campo de Dirección.');
		     }
          else if	(  $('#foto_tel').val()=="" ){
			UIkit.modal.alert('Es necesario completar el campo de Teléfono.');
		     }			 
	     else if ( !(/^\d{7,10}$/.test(telefono)) ){
			UIkit.modal.alert('Es necesario que el Teléfono contenga 7 o 10 Digitos.');
		     }
			 else if	(  $('#foto_precio').val()=="" ){
			UIkit.modal.alert('Es necesario completar el campo de Precio.');
		     }
			 else if ( !(/^\d+(?:\.\d{0,2})$/.test(precio)) ){
			UIkit.modal.alert('Verifique el Precio (Ejemplo: 22.50) con solo dos decimales despues del Punto.');
		          }  
           else if ( $('#foto1').val()=="" )
		     { UIkit.modal.alert('Es necesario subir una imagen en el campo Fotografia 1.');
		           }
		else if ( $('#foto2').val()=="" )
		     { UIkit.modal.alert('Es necesario subir una imagen en el campo Fotografia 2.');
		           }				  
		 else{
		     
			
		 $.ajax({    
       method: "POST",dataType: "json",url: "../../../controllers/getCheckTblfotografo.php",
	   data: {solicitadoBy:"WEB",tel:telefono,idtblciudad:ciudad}	         
	              })  
            .done(function(mpa2){   
                 if(parseInt(mpa2.datos)==1){
                      UIkit.modal.alert('Este Fotografo en esta Ciudad ya esta registrado.');
                                              }
							else 
						{   //UIkit.modal.alert('adelante.');								
				
				
				
				//-----------------subor fotos-------------------***************
    var formData = new FormData($("#formuAlta")[0]);	
			
			            
			$.ajax({  method: "POST",
		               url: "../phps/uploadImgFotografo.php", 
		               data: formData ,contentType: false,
                       processData: false, })
                      .done(function( datos ){
						  
                      		if(datos=="success"){	
							subioNuevaFoto=true;							
							
							    
								$("#agFotografo").addClass("oculto");
				
				//------------------------------------------------******************
				             $.ajax({ 
                               method: "POST",dataType: "json",
							   url: "../../../controllers/setTblfotografo.php", 
							   data: {solicitadoBy:"WEB",nombre:nombre,
							  direcc:direccion,tel:telefono,estatus:estatus,
							   precio:precio,idciudad:ciudad,emailcreo:emailUsuario},
							 beforeSend: function(){
                              $('#esperarAgregarFotografo').css('display','inline'); }
	
							       })                                                                                                                                                                                               
                                                                                                      
							   .done(function(ms){
                                    if(parseInt(ms.success)==1){
										
									//--------------
									$.ajax({method: "POST",dataType: "json",
							   url: "../../../controllers/getAllTblfotografoMax.php", 
							   data: {solicitadoBy:"WEB"} })					                                                
							   .done(function(ms2){
									 if(parseInt(ms2.success)==1){
										 
								$.each(ms2.datos, function(i,item)
				              { 
										 idInsertado=item.id;
										
										 //------------------------
										  $.ajax({     
                                           method: "POST",dataType: "json",
										   url: "../../../controllers/setTblfotografocatalogo1.php", 
	                                       data: {solicitadoBy:"WEB",imag:srcimg1,idfotog:idInsertado,emailcreo:emailUsuario }}) 
                                          .done(function(mostC){
				                          if(parseInt(mostC.success)==1){
										
										   
										   //------------subir foto 2--------------
								                  $.ajax({     
                                           method: "POST",dataType: "json",
										   url: "../../../controllers/setTblfotografocatalogo1.php", 
	                                       data: {solicitadoBy:"WEB",imag:srcimg2,idfotog:idInsertado,emailcreo:emailUsuario }}) 
                                          .done(function(mostC2){				   
                  
				                          if(parseInt(mostC2.success)==1){
										
										     $("#formuAlta")[0].reset(); //vaciar el formulario
                                      UIkit.modal("#altaf").hide();  //oculta el pupop  
                                      								  
                                      UIkit.modal.alert('Fotógrafo Registrado con éxito');
                                     
									  
                                      $("#selectCiudad").val(ciudad);				                
                                      $("#listarFotografo").html("");								
				                        mostrarFotografo();  
								        cantidadFotografos();
										seleccFotografo();  
								      
										  
										 }else {
                                        UIkit.modal.alert('Ocurrio un error, vuelva intentarlo.');
                                        } 	
					
                                 
                                            }) 
                                        .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
     
										 
								
										  //-------------------------------
										 }else {
                                        UIkit.modal.alert('Ocurrio un error, vuelva intentarlo.');
                                        } 	
					
                                 
                                            }) 
                                        .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
     
										 
										 
										 //-----------------------
							  }); //fin del each
									 }else{ UIkit.modal.alert('Ocurrio un error, vuelva intentarlo.'); }
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      //.always(function(){  console.log("always");});
   	
										
										//-----------------
									  
									
                                    }else {
                                      UIkit.modal.alert('Ocurrio un error, vuelva intentarlo.');
                                    }                          
                                  })
                              .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                              .always(function(){  $("#esperarAgregarFotografo").hide(); });	
							  
						 

         //------------------------------------***************				
							} else { subioNuevaFoto=false;
							     UIkit.modal.alert(datos);   
							
							}
            
      }).fail(function( jqXHR, textStatus )  {console.log("fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
                        
											
							
	}  // cierra la validacion de no otro igual 
				
				
              
     })    .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
	   
	  }  //aqui termina el else despues d elas validaciones

	
} // fin de la funcion
	
	function mostrarCiudades(){		  
		                
    
     $.ajax({     
     method: "POST",dataType: "json",url: "../../../controllers/getAllTblciudadAct.php", 
	 data: {solicitadoBy:"WEB"}})
            .done(function(mostCiud){
				   
                $.each(mostCiud.datos, function(i,item)
				 {	idtblciudad=item.idtblciudad;	
				 //muestra ciudades en el encabezado de la interfaz principal
                 $("#selectCiudad").append('<option value="' + idtblciudad +'">' + item.tblciudad_nombre + '</option>');
				   $("#foto_Ciudad").append('<option value="' + idtblciudad +'">' + item.tblciudad_nombre + '</option>');
				 	$("#mod_ciudad").append('<option value="' + idtblciudad +'">' + item.tblciudad_nombre + '</option>');
				 				 
                      });	 
                                 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      
   } // fin de la funcion
   
    function mostrarFotografo(){  //muestra todos los fotografos
			
		    var tblciudad_idtblciudad=$("#selectCiudad").val();	//se recibe el id que seleciono el usuario del select de Ciudades            
          
			 
         $.ajax({ 
        method: "POST",dataType: "json",url: "../../../controllers/getAllTblfotografobyTblciudad2.php", 
		data: {solicitadoBy:"WEB",idtblciudad:tblciudad_idtblciudad},
		beforeSend: function(){   
           $('#esperarMostrarfotografo').css('display','inline');								  
                                                 }
		
		})
          .done(function(mprov){
				
				 if(parseInt(mprov.success)==1){
					 nohaypp=true;
                     $("#paraInicial").addClass('oculto'); 
					 
				     $('#listarFotografo').html("");                   
                  $.each(mprov.datos, function(g,item)
				 {	
			         idfo=item.idtblfotografo;	
				      
				     
				    		
				  
				  $("#listarFotografo").append(
				 '<div class="md-card">'+
                '<div class="md-card-content">'+
				'<div class="uk-grid " data-uk-grid-margin>'+	
				 '  <div class="md-card-head-menu" >'+
                  '    <a id="bbMod'+g+'" class="md-fab md-fab-small md-fab-accent uk-float-right" href="#modificar2"'+
				  ' data-uk-modal="{target:"#modificar2",bgclose:false, center:true }" '+
				  'onclick="mostrarDatosFotografo('+idfo+');">'+
                   '   <i class="material-icons">&#xe254;</i>'+
                    '            </a>'+
					'<button type="button" class="md-fab md-fab-small md-fab-accent uk-float-left" onclick="eliminarFotografo('+idfo+')" '+
				       'id="botonEliminarFotografo'+g+'">'+ ' <i class="material-icons">&#xE872;</i>'+   
					   '</button>'+  //' </div>'+
								
                     '        </div>'+
					 '  <div class="uk-width-large-1-4" id="parafoto'+mprov.datos[g].idtblfotografo+'">	 '+
						
						
						'	</div>	'+
						
						'<div class="uk-width-large-3-4"> '+
					 	'<div class="uk-text-center"> 	'+			   
                        '<div class="md-card-content">'+
                          '  <ul class="md-list">'+
							'    <li> <div class="md-list-content">'+
                             '           <h3 class="uk-text-bold">Fot&oacute;grafo</h3>'+
                              '          <span>'+item.tblfotografo_nombre+'</span>'+
                               '     </div> '+
                               ' </li></ul></div></div> '+
					 '<div class="uk-grid"> '+
					 '<div class="uk-width-large-2-4">  '+        			 
                      '  <div class="md-card-content"> '+
                       '     <ul class="md-list"> '+
						'	 <li>'+
                         '           <div class="md-list-content">'+
                          '              <span class="uk-text-small uk-text-muted">Ciudad</span>'+
                           '             <span >'+item.tblciudad_nombre+'</span> '+  
						    '        </div> '+
                             '   </li><li> '+
                              '      <div class="md-list-content"> '+
                               '         <span class="uk-text-small uk-text-muted">Direcci&oacute;n</span> '+
                                '        <span id="dirr'+idfo+'">'+item.tblfotografo_direccion+'</span> '+
                                 '   </div> '+
                                '</li>'+
								
								'</ul></div></div> '+
					 '<div class="uk-width-large-2-4"> '+
                      '  <div class="md-card-content"> '+
                       '     <ul class="md-list"> '+
					   '<li> '+
                                 '   <div class="md-list-content"> '+
                                  '      <span class="uk-text-small uk-text-muted">Tel&eacute;fono</span> '+
                                   '     <span id="contacto'+idfo+'">'+item.tblfotografo_contacto+'</span> '+
                                    '</div> '+
                                '</li>'+
						'	<li> '+
                         '           <div class="md-list-content"> '+
                          '              <span class="uk-text-small uk-text-muted">Precio por foto</span> '+
                           '         <label>$<span>'+item.tblfotografo_preciofoto+'</span> </label> '+
                            '        </div> '+
                             '   </li>'+
							 
                               ' </ul>'+
                        '</div> </div> </div> </div> </div> </div></div> '									 
									);									
							     
			            			
                                	
						
										   
						          if(parseInt(item.tblfotografo_activado)!=0){
                                          $("#estatusFotog"+idfo).prop("checked", true);										 
										 
                                           }
						                  else {
                                          $("#estatusFotog"+idfo).prop("checked", false);
                                           										  
										    } 
								  
								  
								  	//___________________________________			
			                     $.ajax({ 
                                 method: "POST",dataType: "json",
		                         url: "../../../controllers/getAllTblfotografocatalogobyTblfotografo.php", 
		                         data: {solicitadoBy:"WEB",idtblfotografo:idfo}}) 
                                 .done(function(ab){
				                 if(parseInt(ab.success)==1){					             
                                 imagen=true; 
                                 $.each(ab.datos, function(x,item)
				                 {	
								
			 $("#parafoto"+mprov.datos[g].idtblfotografo).append('<div class="uk-width-large-1-1 uk-container-center">'+	
			' <img id="ta" class="tama" src="../assets/img/fotografos/'+ab.datos[x].tblfotografocatalogo_srcimg +'" />  </div>');
                                  }); //fin del each
                           
                               } else { imagen=false;  } 
							  
	            }) .fail(function( jqXHR, textStatus ) { console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})	
					  
					//-----------------
							//........................
                            } ); // fin del each				     
                            //----------------------
                                      }
							else 
						{     nohaypp=false; 
					 $("#paraInicial").removeClass('oculto');
					$('#listarFotografo').html(""); 
				
					  }
			 
              })
			 
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      .always(function(){ $("#esperarMostrarfotografo").hide();  });
	  
   } //fin de la funcion
   
      function eliminarFotografo(idfo){  
   
                        ciudad = $("#selectCiudad").val();
						direcc = $("#dirr"+idfo).val();						
				           cel = $("#contacto"+idfo).val();	 
					   //estatus = $("#estatusFotog"+idfo).val();
                     estatus = 0;					   
	           
                               						   
		             
             var emaildeUsuario = "<?php echo $_SESSION['email']; ?>";		 
	 					 
					 
           UIkit.modal.confirm('Si desea eliminar al Fotografo, presione Ok', function(){                      
			     
			   
		          $.ajax({ 
                   method: "POST",dataType:"json",
				   url: "../../../controllers/setDeleteTblfotografo1.php", 				  
				   data:{solicitadoBy:"WEB",id:idfo,cel:cel,				 
				   dire:direcc,estatus:estatus,emailmodifico:emaildeUsuario} })    
                  .done(function(mgg){
                    			  
					 if(parseInt(mgg.success)==1){ 					 
							//UIkit.modal("#modificar").hide(); //se oculta el pupop de Modificar usuario 
                                								
                              UIkit.modal.alert('Fotografo Eliminado con Éxito'); 
							  
							 $('#selectCiudad').val(ciudad);					           
				             $('#listarFotografo').html("");					
				            mostrarFotografo();
							seleccFotografo(); 
							cantidadFotografos();
                                       }
							else{
                              UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');
                                 }
								 
								 }) 	  
                  .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      });	 
	}// fin de la funcion
	  
	  
	  
	  
	    //--------- mostrar datos del fotografo en pupop para despues modificarlos
 function mostrarDatosFotografo(idfo){
             $("#fotosActuales").empty();
    $.ajax({ 
       method: "POST",dataType: "json",url: "../../../controllers/getTblfotografobyId.php", 
	   data: {solicitadoBy:"WEB",idtblfotografo:idfo}}) 
            .done(function(msg){
               
               
				$.each(msg.datos, function(x,item){
				  $("#mod_idFotografo").text(item.idtblfotografo );
				  $("#mod_nombre").val(item.tblfotografo_nombre );			 
				  $("#mod_ciudad").val(item.tblciudad_idtblciudad); 
				  $("#mod_direcc").val(item.tblfotografo_direccion); 
                  $("#mod_tel").val(item.tblfotografo_contacto);
				  $("#mod_precio").val(item.tblfotografo_preciofoto);
				  
				  
				                 $.ajax({   //mostrar fotos actuales
                                 method: "POST",dataType: "json",
		                         url: "../../../controllers/getAllTblfotografocatalogobyTblfotografo.php", 
		                         data: {solicitadoBy:"WEB",idtblfotografo:idfo}}) 
                                 .done(function(ab){
				                 if(parseInt(ab.success)==1){					             
                                 imagen=true; 
                                 $.each(ab.datos, function(x,item)
				                 {	       idff= item.idtblfotografocatalogo;
								  //id="mar'+idproveedor+'"  
			                     $("#fotosActuales").append('<div class="uk-width-medium-1-2 uk-container-center ">'+	
			                      ' <img id="tama55" class="tama" src="../assets/img/fotografos/'+ab.datos[x].tblfotografocatalogo_srcimg +'" />  </div>');
                                  }); //fin del each     
                           
                                  } else { imagen=false;   } 
							  
	                               }) .fail(function( jqXHR, textStatus ) { console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})	
					  
				        })// fin del each
                   })              
          .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
          //.always(function(){  console.log("always");});				  
	}	// fin de la funcion
	
	
	//.............actualizar fotografo
	function actualizarFotografo(){
	     
                  idfotografo = $('#mod_idFotografo').text(); 			   
	           nombre= $("#mod_nombre").val();				  
               ciudad= $("#mod_ciudad").val();
               direccion= $("#mod_direcc").val();
               tel= $("#mod_tel").val();
			   precio= $("#mod_precio").val();
			  
			   
			 var emaildeUsuario = "<?php echo $_SESSION['email']; ?>";		 
	 			   
   	
	  var arregloIddeFotografo=[];
      var arregloImagenes=[];
    
  
     // foto 1
    srcimg1=$("#nuevaFoto1").val().replace(/C:\\fakepath\\/i, ''); //id input visible    
   
     // foto 2
    srcimg2=$("#nuevaFoto2").val().replace(/C:\\fakepath\\/i, ''); //id input visible
   
   
   
       
			 
	      if ( $('#mod_nombre').val()=="" )
		      { UIkit.modal.alert('Es necesario completar el campo Nombre.'); }		   
		
	    else if ( $('#mod_ciudad').val()==null)	
		       { UIkit.modal.alert('Es necesario escoger una Ciudad.');   }
		   
	  else if ( $('#mod_direcc').val()=="" )
	           {  UIkit.modal.alert('Es necesario completar el campo de Dirección.'); } 
		   
	 else if  ( $('#mod_tel').val()=="" )   
	          { UIkit.modal.alert('Es necesario completar el campo de Contacto.');  }
      
	  else if ( !(/^\d{7,10}$/.test(tel)) ){
			UIkit.modal.alert('Es necesario que el Teléfono contenga de 7 a 10 Digitos.');
		     }
		  
	else if ( $('#mod_precio').val()=="" )
	        { UIkit.modal.alert('Es necesario completar el campo de Precio.');     }
		
    else if ( !(/^\d+(?:\.\d{0,2})$/.test(precio)) )  {
			   UIkit.modal.alert('Verifique el Precio (Ejemplo: 22.50) con solo dos decimales despues del Punto.');
		          }                   	         
		
              //si contine fotos los dos input nuevos, le asignamos el nombre de la nueva imagen
	else if( srcimg1!='' && srcimg2!='' ){  //--------si tiene foto el input------------------------------------------------- 

        
	    //else{
                     
					   
					   /*-------------  Para borrar imagenes del S-------------------------*/
		         	           $.ajax({   //mostrar fotos actuales
                                 method: "POST",dataType: "json",
		                         url: "../../../controllers/getAllTblfotografocatalogobyTblfotografo.php", 
		                         data: {solicitadoBy:"WEB",idtblfotografo:idfotografo}}) 
                                 .done(function(ab){
				                 if(parseInt(ab.success)==1){					             
                                 imagen=true; 
                                 $.each(ab.datos, function(x,item)
				                 {	       
			                     arregloIddeFotografo.push(ab.datos[x].idtblfotografocatalogo); //id de la tabla tblfotografocatalogo         
                                 arregloImagenes.push(ab.datos[x].tblfotografocatalogo_srcimg);  //nombre del la imagen guardada
								  }); //fin del each 
                 
                      
		                          $.each(arregloIddeFotografo, function(x,item){
                                  //borramos los archivos actuales de las fotografias en el servidor 
                                  $.ajax({ method: "POST",  dataType: "json", 
			                       url: "../phps/setDeleteFileImgFotografo.php",  
			                       data: {solicitadoBy:"WEB",tblfotografocatalogo_img:arregloImagenes[x]} })
                                  .done(function( datos ){  borroo=true;
                                        })
                                     .fail(function( jqXHR, textStatus ) {  console.log("setDeleteFileImg  fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
              
                                       });  // fin del each 
								  
                                
					   
					//....-------.....
	  
                        srcimg1='foto_'+idfotografo+'_'+srcimg1;  //asignamos nombre
                       $('#nuFoto1BD').val(srcimg1);  //id input oculto
					   
					   srcimg2='foto_'+idfotografo+'_'+srcimg2;  //asignamos nombre
                       $('#nuFoto2BD').val(srcimg2);  //id input oculto
		
		  
            
                       //subimos la nueva fotografia al servidor
                       var formData = new FormData($("#formModificar")[0]);

                       $.ajax({  method: "POST",
		               url: "../phps/subirImgFotografo.php", 
		               data: formData ,contentType: false,
                       processData: false, })
                      .done(function( datos ){
						  
                      		if(datos=="success"){	
							subioNuevaFoto=true;
							//--------actualiza datos en fotografo
                   $.ajax({ method: "POST",dataType: "json",url: "../../../controllers/setUpdateTblfotografo1.php", 				  
				   data:{solicitadoBy:"WEB",idfotografo:idfotografo,
				   nombre:nombre,ciudad:ciudad,				   
				   direccion:direccion,tel:tel,precio:precio,
				   emailmodifico:emaildeUsuario},
				   beforeSend: function(){
				   $('#esperarModificarFotografo').css('display','inline');}	})
                   .done(function(ad){      //se hace si  se subio nuevas fotos
	        
                
				
				                       $.ajax({   //------------borrar Fotos en B--------------  
                                           method: "POST",dataType: "json",
										   url: "../../../controllers/setDeleteTblfotografocatalogo1.php", 
	                                       data: {solicitadoBy:"WEB",idfotografo:idfotografo}}) 
                                          .done(function(vv){  
				                          if(parseInt(vv.success)==1){
											 
										 //------------------------actualiza en catalogo ----------------------------------				               
										  $.ajax({     
                                           method: "POST",dataType: "json",
										   url: "../../../controllers/setTblfotografocatalogo1.php", 
	                                       data: {solicitadoBy:"WEB",imag:srcimg1,idfotog:idfotografo,emailcreo:emaildeUsuario }}) 
                                          .done(function(mostC){
				                          if(parseInt(mostC.success)==1){
										
										   
										   //------------subir foto 2--------------
								                  $.ajax({     
                                           method: "POST",dataType: "json",
										   url: "../../../controllers/setTblfotografocatalogo1.php", 
	                                       data: {solicitadoBy:"WEB",imag:srcimg2,idfotog:idfotografo,emailcreo:emaildeUsuario }}) 
                                          .done(function(mostC2){				   
                  
				                          if(parseInt(mostC2.success)==1){										     
                                      UIkit.modal("#modificar2").hide();  //oculta el pupop                                      								  
                                      UIkit.modal.alert('Fotógrafo Actualizado con éxito');
                                     
									  
                                      $("#selectCiudad").val(ciudad);				                
                                      $("#listarFotografo").html("");								
				                       mostrarFotografo();
										seleccFotografo();  
										 }else {  UIkit.modal.alert('Ocurrio un error, vuelva intentarlo'); }                                
                                            
                                           })   .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
     
								 //---------------------------------------------------------- 
									
										  }else {
                                        UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');
                                        } 					
                                 
                                            }) .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                              //------------------------Fin actualiza en catalogo ---------------------------------- 
                                           }else {  UIkit.modal.alert('Ocurrio un error, vuelva intentarlo'); }                                
                                            
                                           })   .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
     
                      //----------fin borrar en bd
		 
		 
		 })
        .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
        .always(function(){ $("#esperarModificarFotografo").hide(); });
	//---------finaliza actualizar registro en  fotografo--------

	
	         
                       
							} else { subioNuevaFoto=false;
							     UIkit.modal.alert(datos);   }
                      }).fail(function( jqXHR, textStatus )  {console.log("fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
                        
	//.........................   finaliza donde subio
	                   //-----------------------        
                                  } else { imagen=false;   } 
							  
	                               }) .fail(function( jqXHR, textStatus ) { console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})	
					
				/*-------------  Fin Para borrar imagenes del S-------------------------*/
           // finaliza el else donde actualiza porque encontro fotos en los input  
		  
		  
	  } else if (srcimg1=='' && srcimg2=='')
	  
	  {  //si no tiene foto el input nuevo solo asignamos  el mismo nombre que tenia anteriormente
      
		
	     //console.log('id: '+idfotografo+' nom:'+nombre+'ciudad'+ciudad+'di:'+direccion+'tel'+tel+'precio'+precio+'email:'+emaildeUsuario);
	               $.ajax({ method: "POST",dataType: "json",url: "../../../controllers/setUpdateTblfotografo1.php", 				  
				   data:{solicitadoBy:"WEB",idfotografo:idfotografo,
				   nombre:nombre,ciudad:ciudad,				   
				   direccion:direccion,tel:tel,precio:precio,
				   emailmodifico:emaildeUsuario},
				   beforeSend: function(){
				   $('#esperarModificarFotografo').css('display','inline');}	})
                   .done(function(ad){      //se hace si NO se subio nuevas fotos
	        
                        UIkit.modal("#modificar2").hide(); //se oculta el pupop                        
                        UIkit.modal.alert('Fotografo Modificado con &eacute;xito');                             
						
						$("#selectCiudad").val(ciudad);
				        $('#listarFotografo').html("");					
				         mostrarFotografo();
                          seleccFotografo();						 
                       $('#formModificar')[0].reset(); //limpia el form 
                   
        
         })
        .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
        .always(function(){ $("#esperarModificarFotografo").hide(); });
		      //  } //cierre del else 
		
		} // cierre del else
   else      // else if ( $('#nuevaFoto1').val()!="" )  //
	             {   UIkit.modal.alert('Es necesario completar el Campo Fotografia 1 y Fotografia 2.');  }    			
  
  } //fin de la funcion
	</script>
	
  

</body>
</html>