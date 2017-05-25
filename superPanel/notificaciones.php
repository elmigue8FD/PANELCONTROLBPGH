<!doctype html>
<html lang="en">
<!-- Create by: Reyna Maria Martinez Vazquez-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <meta name="msapplication-tap-highlight" content="no"/>

     <?php include("../codigo_general/minimagenPanel.php"); ?>

    <title>BePickler</title>
	
	
	<!-- metrics graphics (charts) -->
        <link rel="stylesheet" href="../bower_components/metrics-graphics/dist/metricsgraphics.css">        
    <link rel="stylesheet" href="../bower_components/codemirror/lib/codemirror.css">    
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
<body class="sidebar_main_open sidebar_main_swipe">
    <!-- main header -->
    <!-- main header end -->
	
	<?php include("../codigo_general/menuPanel.php"); ?>
   
    <!-- main sidebar end  inicia aside-->
	<!-- fin del aside.............................  -->
	
   <!--  estas no van todavia-->
   <div id="page_content">
	<div id="page_content_inner"> 
	
								
	<div id="top_bar">
        <div class="md-top-bar ">
          <div class="uk-width-large-8-10 uk-container-center">
            <div class="md-card-content">
              <div class="uk-grid">
                <div class="uk-width-1-1">
                                
								
								<ul class="uk-tab" class="named_tab" data-uk-tab="{connect:'#settings_users', animation: 'slide-horizontal' }">
                                   
									<li class="uk-active"><a href="#">Notificaciones Enviadas</a></li>
                                    <li><a href="#" > Nueva Notificación </a></li>                                                                          
								</ul>
										
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
							
		
								<div id="settings_users" class="uk-switcher uk-margin">
								
								
                                    <div> <!-- inicio pag1 -->
									<div class="md-card">
					    <div class="md-card-content">
									<div>         
                                    <h2>Notificaciones</h2>
                                    </div>
									<div > 
									<h4>Para mas información del mensaje, hay clic en el destinatario.</h4>
									</div>
                    <br>
                  <div class="uk-text-center oculto" id="esperarMostrarNotifica" >
                                      <label> Procesando... </label>
				                       <img src="cargando.gif" /> 				 
                                           </div>
					<!--  ----  -->
					</div><!-- cierre del content-->
				</div> <!--  cierre del mcard-->
							
			 <div class="md-card">
				   <div class="md-card-content"> 
                    <div class="uk-overflow-container uk-margin-bottom">
                     <table class="uk-table uk-table-nowrap table_check uk-table-hover tablesorter tablesorter-altair" id="tabla_noti">
                              <thead>
                                <tr>
                                    <th class="uk-text-center">Destinatario</th>
                                    <th class="uk-text-center">Asunto</th>
									<th class="uk-text-center">Fecha</th>                                    
                                </tr>
                            </thead>
                        <tbody id="tblnotificacion" name="tblnotificacion">
                       </tbody>
                        </table>
						
		<div id="pagerNoti" class="pager oculto">
    	<form>
    		<img src="../bower_components/tablesorter/dist/css/images/first.png" class="first"/>
    		<img src="../bower_components/tablesorter/dist/css/images/prev.png" class="prev"/>
    		<input disabled type="text" class="pagedisplay"/>
    	    <img src="../bower_components/tablesorter/dist/css/images/next.png" class="next"/>
			<img src="../bower_components/tablesorter/dist/css/images/last.png" class="last"/>    		
    	</form>
    </div>	
                    </div>
					
					
					
					</div>
                </div>
				
				<!-- ................-->
		<div class="uk-modal" id="verMensaje" >
        <div class="uk-modal-dialog">           
		<button type="button"  class="uk-modal-close uk-close uk-close-alt"></button>
            <form>
			<div class="uk-modal-header">
                    <h3 class="uk-modal-title">Notificación</h3>
                </div>
				                                                          
				<div class="uk-width-large-1-2">
                <ul class="md-list md-list-addon">
				 <li>                                                      
				<div class="md-list-addon-element">                                                           
				<i class="md-list-addon-icon material-icons md-24">&#xe7fd;</i>
                </div>
                  
                <span class="uk-text-muted">Emisor:</span>
                <div class="uk-margin-medium-bottom">                    
                    <span id="mostrar_emisor"> </span>
                </div>
				</li>      
				
				<li>                                                      
				<div class="md-list-addon-element">                                                           
				<i class="md-list-addon-icon material-icons md-24">&#xe8d3;</i>
                </div>
				<span class="uk-text-muted">Destinatario:</span>
                <div class="uk-margin-medium-bottom">                    
                    <span id="mostrar_destinatario"> </span>
                </div>
				</li>
				
				<li>                                                      
				<div class="md-list-addon-element">                                                           
				<i class="md-list-addon-icon material-icons md-24">&#xe163;</i>
                </div>
				<span class="uk-text-muted">Asunto:</span>
				<div class="uk-margin-medium-bottom">                   
                   <span id="mostrar_asunto"> </span>
                </div> </li>
				 <li>
				 <div class="md-list-addon-element">                                                           
				<i class="md-list-addon-icon material-icons md-24">&#xe0d8;</i>
                </div>
				<span class="uk-text-muted">Mensaje:</span>               
				<div class="uk-margin-large-bottom">                    
                    <textarea name="mostrar_mensaje" maxlength="499" id="mostrar_mensaje" cols="30" rows="6" class="md-input"></textarea>
                </div> </li>
              		</ul></div>	
				
            </form>
        </div>
    </div>
				<!-- 
	
	.............................. -->					
					 
                                    </div> <!-- fin pag1 -->
									
									
									
                                    <div>  <!-- inicio pag 2  <form method="POST" id="formuEnviarMensaje" action="">-->
				
				   <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-large-9-10 uk-container-center">
					<div class="md-card">
				   <div class="md-card-content"> 
				<form method="POST" id="formuEnviarMensaje" action="">
                <div class="uk-modal-header">
                    <h3 class="uk-modal-title">Redactar Nueva Notificación</h3>
                </div>
				<span class="uk-text-muted">Nombre de quien envia la notificación:</span>
                <div class="uk-margin-medium-bottom">                    
                    <input type="text" class="md-input" id="enviarmensaje_nombre" name="enviarmensaje_nombre"/>
                </div>
			<span class="uk-text-muted">A quien va dirigida la notificación:</span> </br>
				<div class="uk-margin-medium-bottom">                    					   
                         <div>	</br>				    
							<span class="icheck-inline">							
                                <input type="radio" name="tipodeNotificacion" value="1" id="alta_especifico" onclick="mostrarMas();"  /> 
                                <label>Alguien en Especifico.</label> 
                            </span>
						</div>
						<div>	
							<span class="icheck-inline">
                                <input type="radio" checked name="tipodeNotificacion" value="2" id="alta_general"  onclick="mostrarMas();"/> 
                                <label>En General.</label> 
                            </span>
						</div>
						
                </div> 
				
				 <div class="oculto"  id="escogerDestinatario">
				    <div class="uk-width-medium-1-2">
				    <span class="uk-text-muted " >Secciona una ciudad:</span>
                     <select id="ciudades" name="ciudades" class="md-input" onchange="mostrar_provedores();">
                     <option value="" disabled selected hidden>Selecciona...</option>					  
                     </select>
				     </div>  
				  <div class="uk-width-medium-1-2"> </br>
				   <span class="uk-text-muted " >Secciona una proveedor:</span>
                     <select id="SelectProveedor" name="SelectProveedor" class="md-input">
                     <option value="" disabled selected hidden>Selecciona...</option>					  
                     </select>
					 </br>
				   </div>  
			 </div>
				 
				 
				 <div class="uk-width-medium-1-2"> 
				<span class="uk-text-muted " >Sección para la Notificación:</span>
                     <select id="seccion" name="seccion" class="md-input">
                     <option value="" disabled selected hidden>Selecciona...</option>					  
                     </select>
				 </div>    
				 </br>
				<span class="uk-text-muted">Asunto:</span>
				<div class="uk-margin-medium-bottom">                   
                    <input type="text" class="md-input" id="enviarmensaje_asunto" name="enviarmensaje_asunto"/>
                </div>
				<span class="uk-text-muted">Mensaje:</span>               
				<div class="uk-margin-large-bottom">                    
                    <textarea name="enviarmensaje_mensaje" maxlength="499" id="enviarmensaje_mensaje" cols="30" rows="6" class="md-input"></textarea>
                </div>
				
				<div class="uk-text-center oculto" id="enviandoMensaje" >
                <label > Procesando... </label>
				  <img src="cargando.gif" /> 				 
                 </div> 
               <div id="miresultado2" class="uk-text-muted"></div>
								
				</br>												
                                  
                       <!-- uk-modal-footer uk-text-right-->
             <div class="uk-text-right">
			    <button type="button" class="uk-button-right md-btn ye" id="enviarboton77" onclick="guardar();">Enviar</button>	
				
               </div>      
                    				
            </form>
			
	</div>
	</div>
	
	               
					<!-- .....<input type="submit" class="uk-button-right md-btn" id="enviarboton77" value="enviar" />............. -->
	</div>
	</div>

                                    </div>  <!-- fin pag 2  -->
									
									
									
				</div>								
                </div>
            </div>
			
	<!-- ::::::::::::::::::::::::::::::::::::::::::::::::::::::::  -->
   <?php include('../codigo_general/script_commonPB.php'); ?>    

   

    <!-- page specific plugins -->
     <!-- tablesorter -->
	 <script src="../bower_components/tablesorter/dist/js/jquery.tablesorter.js"></script>
    <script src="../bower_components/tablesorter/dist/js/jquery.tablesorter.min.js"></script>
    <script src="../bower_components/tablesorter/dist/js/jquery.tablesorter.widgets.min.js"></script>
    <script src="../bower_components/tablesorter/dist/js/widgets/widget-alignChar.min.js"></script>
    <script src="../bower_components/tablesorter/dist/js/extras/jquery.tablesorter.pager.min.js"></script>

    <!--  issues list functions -->
   <script src="../assets/js/pages/pages_issues.min.js"></script>
    <!-- page specific plugins -->
    <!-- ionrangeslider -->
    <script src="../bower_components/ion.rangeslider/js/ion.rangeSlider.min.js"></script>
    <!-- htmleditor (codeMirror) 
    <script src="../assets/js/uikit_htmleditor_custom.min.js"></script>  --> 
    <!-- inputmask-->
    <script src="../bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.js"></script>
    <!--  forms advanced functions -->
    <script src="../assets/js/pages/forms_advanced.min.js"></script>
   
	
	
    
    <script type="text/javascript" >
       $( window ).ready(function() {   
       mostrarNotificaciones();
       mostrarSecciones();
	   mostrarCiudades();
  });
   /* Create by: Reyna Maria Martinez Vazquez*/
 
		
	  
   function inicializarTablas(){
  $("#tabla_noti").tablesorter({
    //sortList: [[1,0]], //ordenar por de inicio esa columna 
    headers: {1: { sorter: "shortDate", dateFormat: "ddmmyyyy" } }, //cambio de formato de fecha 
    widgets: ['filter']//activar el widget de filtro de busqueda
		 }); 
   } 
   
   function inicializarPagNotifica(){  		
 		$("#tabla_noti")
		.tablesorterPager({container: $("#pagerNoti")})  ;
		 }
		 
    function mostrarMas(){
		  $("input[name='tipodeNotificacion']").html("");
    tipo= $("input[name='tipodeNotificacion']:checked").val();
	  
	  
	  if(tipo=="1"){		                
           //console.log("alguien es especifico");	
		  $("#escogerDestinatario").removeClass("oculto");
			   }
		if(tipo=="2"){	
			//console.log("general");  
			$("#escogerDestinatario").addClass("oculto");
		    }
	 } // fin de la funcion
	 
	 
	 function guardar(){
		 
		tipoN= $("input[name='tipodeNotificacion']:checked").val();
		asunto= $("#enviarmensaje_asunto").val();
		mensaje= $("#enviarmensaje_mensaje").val();
		emisor= $("#enviarmensaje_nombre").val();
		idSeccion= $("#seccion").val();
		idProveedor= $("#SelectProveedor").val();
		emailUsuario="reyna@gmail.com"; 
		estatus=0;
		
		
		if( $('#enviarmensaje_nombre').val()==""){
			UIkit.modal.alert('Es necesario completar el campo Nombre de quien envia.');
		       }
		  else if( $('#seccion').val()==null){			  
		UIkit.modal.alert('Es necesario escoger una Sección.');		
		     } 
        else if( $('#enviarmensaje_asunto').val()==""){			  
		UIkit.modal.alert('Es necesario completar el campo Asunto.');		
		     } 
      else if( $('#enviarmensaje_mensaje').val()==""){			  
		UIkit.modal.alert('Es necesario completar el campo Mensaje.');		
		     }
		else{	 
			 
			 
		                     $.ajax({method: "POST",dataType: "json",
							   url: "../../../controllers/setTblnotificacion1.php", 
							   data: {solicitadoBy:"WEB",tipo:tipoN,asunto:asunto, 
							   mensaje:mensaje,emisor:emisor,idredireccion:idSeccion,
							   emailcreo:emailUsuario},
							   beforeSend: function(){
                                       $('#enviandoMensaje').css('display','inline'); }
							   })                
							  .done(function(ms){
								 //  console.log(ms);
            if(parseInt(ms.success)==1){ tabla1=true;
							//---------------------
                                $.ajax({method: "POST",dataType: "json",
							   url: "../../../controllers/getAllTblnotificacionMax.php", 
							   data: {solicitadoBy:"WEB"},
							   beforeSend: function(){
                                       $('#enviandoMensaje').css('display','inline'); }
							   })					                                                
							   .done(function(ms2){
									 if(parseInt(ms2.success)==1){
								$.each(ms2.datos, function(i,item)
				              { 
										 idInsertado=item.id;
										 
										 if(tipoN=="1") { //UIkit.modal.alert('especifico escogio');
										 //--------------------Alta notificacionvista ----------------------
								         $.ajax({method:"POST",dataType:"json",
							             url: "../../../controllers/setTblnotificacionvista1.php", 
							             data: {solicitadoBy:"WEB",destino:idProveedor,status:estatus,
										 emailcreo:emailUsuario,idtblnotificacion:idInsertado},
										 beforeSend: function(){
                                       $('#enviandoMensaje').css('display','inline'); }
										 })					                                                
							             .done(function(ms2){  
									    if(parseInt(ms2.success)==1){										
										 UIkit.modal.alert('Mensaje Enviado.');
										 $('#formuEnviarMensaje')[0].reset();
										 $("#escogerDestinatario").addClass("oculto");
										 mostrarNotificaciones();
										 }else {
                                        UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');
                                        }                          
                                       })
                                      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                                       .always(function(){  $("#enviandoMensaje").hide(); 	});						 
							   			}						 
										 //----------------------------------------------
										 
										 if(tipoN=="2") { //____________________________________________
										//UIkit.modal.alert('genenal escogio');
										
	$.ajax({     
     method: "POST",dataType: "json",url: "../../../controllers/getAllTblproveedor.php", 
	 data: {solicitadoBy:"WEB"},
	 beforeSend: function(){ $('#enviandoMensaje').css('display','inline'); }
	 }) 
            .done(function(con){				
				   if (parseInt(con.success)==1) {
								consulto=true;
						 $.each(con.datos, function(g,item)
				        {	
				 	    idp= con.datos[g].idtblproveedor;		 
                      //console.log('prove:'+idp);
					  //.....
				         $.ajax({method:"POST",dataType:"json",
							             url: "../../../controllers/setTblnotificacionvista1.php", 
							             data: {solicitadoBy:"WEB",idtblnotificacion:idInsertado,status:estatus,
										 destino:idp,emailcreo:emailUsuario},
										 beforeSend: function(){ $('#enviandoMensaje').css('display','inline'); }
										 })					                                                
							             .done(function(ms22){
											 		 
									    if(parseInt(ms22.success)==1){	
                                            $('#formuEnviarMensaje')[0].reset();										
										     varios=true;
										 }else {
                                            varios=false;
                                        }                          
                                       })
                                      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                                      .always(function(){  $("#enviandoMensaje").hide(); 	});						 
				        //.....	
				
				        });//fin del each
						
								     UIkit.modal.alert('Mensajes Enviados');
									 mostrarNotificaciones();
									 
										}
						else{ consulto=false;	 UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');}				
				 
    })  .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
		.always(function(){  $("#enviandoMensaje").hide(); 	});									
						}	 
			//____________________________________________________________________________________
										 
						});	//fin del each							 	 
									}else {
                                      UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');
                                        }                          
                                  })
                              .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                              .always(function(){  $("#enviandoMensaje").hide(); 							 
							  });

               //-----------------------							  
                                                              
									
			}else { tabla1=false;}                          
                                  })
                              .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                              .always(function(){  $("#enviandoMensaje").hide(); 							 
							  });	
							  
	     }
	 } // fin de la funcion
	 
	 
    function mostrarCiudades(){	 //muestra ciudades en select en seccion Redactar Notificacion	  
		                
    
     $.ajax({     
     method: "POST",dataType: "json",url: "../../../controllers/getAllTblciudadAct.php", 
	 data: {solicitadoBy:"WEB"}})
            .done(function(mostCiud){
				   
                $.each(mostCiud.datos, function(i,item)
				 {	idtblciudad=item.idtblciudad;	
				 //muestra ciudades en el encabezado de la interfaz principal
                 $("#ciudades").append('<option value="' + idtblciudad +'">' + item.tblciudad_nombre + '</option>');
				  				 
                      });
					  
					  //-------------
					 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      
   }  //fin de la funcion
   
         	   
		          
     //muestra proveedores en select en seccion Redactar Notificacion
   function mostrar_provedores(){

	      var idtblciudad=$("#ciudades").val();	//se recibe el id que seleciono el usuario del select de Ciudades            
          
     $.ajax({     
     method: "POST",dataType: "json",url: "../../../controllers/getAllProveedorByCiudad.php", 
	 data: {solicitadoBy:"WEB",idtblciudad:idtblciudad }}) 
            .done(function(mf){				
				   if (parseInt(mf.success)==1) {				   
				  
				   $("#SelectProveedor").html("");	
				  $("#SelectProveedor").append('<option value="" disabled selected readonly >Selecciona...</option>'); 
				
                $.each(mf.datos, function(i,item)
				 {	idtblproveedor=item.idtblproveedor;
				           estatus=item.tblproveedor_activado;
						                //tblproveedor_activado
					if(estatus=="1"){ es=true;
				 //muestra ciudades en el encabezado de la interfaz principal 
                 $("#SelectProveedor").append('<option value="' + idtblproveedor +'">' + item.tblproveedor_nombre + '</option>');
				  	            }	
								else{es=false;}		 
				   });
				   
				   }else{ 
				    $("#SelectProveedor").html("");
					$("#SelectProveedor").append('<option value="" disabled selected readonly >Selecciona...</option>'); 
				} 
                                 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      
   }  //fin de la funcion
   
    function mostrarSecciones(){	 //muestra secciones para la noti en select en seccion Redactar Notificacion	  
		                
    
     $.ajax({     
     method: "POST",dataType: "json",url: "../../../controllers/getAllTbltblnotificacionredireccionPP.php", 
	        data: {solicitadoBy:"WEB"}})
            .done(function(secc){
				   
                $.each(secc.datos, function(i,item)
				 {	idDirecc=item.idtblnotificacionredireccion;	
				 //muestra ciudades en el encabezado de la interfaz principal
                 $("#seccion").append('<option value="' + idDirecc +'">' + item.tblnotificacionredireccion_nombre + '</option>');
				  			
 	 
                      });	
                                 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      
   } 
   
         
		//muestra notificaciones enviadas 
  function mostrarNotificaciones(){ 
 var clase;
    inicializarTablas()
  $.ajax({ 
      method: "POST",dataType: "json",
	  url: "../../../controllers/getAllTblnotificacionbyTblnotificacionvistaPanel.php", 
	  data: {solicitadoBy:"WEB"},
	   beforeSend: function(){
				   $('#esperarMostrarNotifica').css('display','inline');}	
	  }) 
        .done(function(notif){
			if(parseInt(notif.success)==1){
				
				$("#tblnotificacion").html("");
            $.each(notif.datos, function(i,item){
				
              if(parseInt(notif.datos[i].tblnotificacionvista_status)!=1){
                clase="uk-text-bold ";
              }else{clase= "uk-text-muted";}
			  
			       fecha= item.fecha;
                    fecha = fecha.split("-");                 
				    fecha = fecha[2]+"/"+fecha[1]+"/"+fecha[0];
                   idnot=item.idtblnotificacion;
				      destino =item.tblnotificacionvista_destino;
					  
				$("#pagerNoti").removeClass('oculto');	
				   
				   
               $("#tblnotificacion").append(
            '<tr class="'+clase+'" >'+
			'<td class="uk-width-medium-1-3 uk-text-center"  '+
		    ' data-uk-modal="{target:'+"'#verMensaje'"+',bgclose:false, center:true }" onclick="detalleNotifi('+idnot+','+destino+');">'+
			'<a>'+notif.datos[i].tblproveedor_nombre+'</a></td>'+			
			'<td><a>'+notif.datos[i].tblnotificacion_asunto+'</a></td>'+ 
			'<td>'+fecha+'</td>'+         
			'</tr>');
			$("#tabla_noti").trigger('updateAll', [true]);//actualiza tabla 
				inicializarPagNotifica();
          }); //fin del each
		  
			}else{  $("#pagerNoti").addClass('oculto');	
				   
		           $("#tblnotificacion").html("");
		       }
        
      }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
     .always(function(){ $("#esperarMostrarNotifica").hide(); });
} // fin


 function detalleNotifi(idnot,destino){ //muestra detalle de la Notificacion enviada
		
		
    	$.ajax({ 
       method: "POST",
       dataType:"json",
      url: "../../../controllers/getAllTblnotificacionbyTblnotificacionvistaDetalle.php",
	  data: {solicitadoBy:"WEB",idnot:idnot,destino:destino}	 
	  })
            .done(function(msg){
			//console.log(msg);
			$("#mostrarhoras").html("");
                 $.each(msg.datos, function (i,item)
     {       
      $("#mostrar_emisor").text(item.tblnotificacion_emisor);
	  $("#mostrar_destinatario").text(item.tblproveedor_nombre);
	  $("#mostrar_asunto").text(item.tblnotificacion_asunto);
	  $("#mostrar_mensaje").text(item.tblnotificacion_mensaje);	  
	  
                                                                                                                                                                                                                   
				 });                 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      //.always(function(){  console.log("always");});
    }		
		
    </script> 


    
</body>
</html>