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

<!-- htmleditor (codeMirror) -->
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
<body class=" sidebar_main_open sidebar_main_swipe" >
    <!-- main header -->
 
	<?php include("../codigo_general/menuPanel.php"); ?>
   
    <!-- main sidebar end  inicia aside-->
	
	
	<!-- fin del aside.............................  -->
	
  
   <div id="page_content">
	<div id="page_content_inner"> 
	
								
	<div id="top_bar">
        <div class="md-top-bar ">
          <div class="uk-width-large-8-10 uk-container-center">
            <div class="md-card-content">
              <div class="uk-grid">
                <div class="uk-width-1-1">
                                
								
								<ul class="uk-tab" class="named_tab" data-uk-tab="{connect:'#settings_users', animation: 'slide-horizontal' }">
                                   
									<li class="uk-active"><a href="#"> Clientes </a></li>
                                    <li><a href="#"> Clientes Registrados </a></li>
                                   <!-- <li><a href="#"><font size="3">author </font></a></li> -->
                                     
								</ul>
								
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
							
							
							<!--<div class="md-card">
                            <div class="md-card-content"> -->
							
								
                               <!-- <ul id="settings_users" class="uk-switcher uk-margin"> -->
								<div id="settings_users" class="uk-switcher uk-margin">
								
								
                                    <div> <!-- inicio pag1 -->
							   <div class="md-card">
					               <div class="md-card-content">
									<div>    <!-- id="page_heading" -->         
                                    <h2>Clientes invitados</h2>
									
									<label class="uk-float-right" id="numeroInvitados"> </label> 
									<br/>
                                  </div>
								  
								   </br>
									  <div class="uk-text-center oculto" id="esperarMostrarInvitados" >
                                      <label> Procesando... </label>
				                       <img src="cargando.gif" /> 				 
                                           </div> 

				
					
					</div>
				 </div>

						
					<div class="md-card">
                <div class="md-card-content">
                    <div class="uk-overflow-container uk-margin-bottom">
                        <!-- <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair ts_issues2" id="tabla_invitados">
                        -->
						<table class="uk-table uk-table-nowrap table_check uk-table-hover tablesorter tablesorter-altair" id="tabla_invitados">
                            
						<thead>
                                <tr>
                                                                    
								      <th class="uk-text-center">Nombre</th>
								      <th class="uk-text-center">Correo</th>
									  <th class="uk-text-center">Celular</th>
									  <th class="uk-text-center">Fecha de Nacimiento</th>
									 
                                </tr>
                            </thead>
                            
                            <tbody id="body_tablaInvitados">
                               
                            </tbody>
                        </table>
                    </div>					
                </div>
            </div>
					
					 
					 
					 
					
					 
                                    </div> <!-- fin pag1 -->
									
									
									
                                    <div>  <!-- inicio pag 2 -->
													
				<div class="md-card">
					    <div class="md-card-content">
									<div>    <!-- id="page_heading" -->         
                                    <h2>Datos de Clientes Registrados</h2>                                    
                                    </div>									
				
                  
					              
								   
								   <h4> Para mas informaci&oacute;n, haz clic en el nombre del cliente. </h4>
								    <label class="uk-float-right" id="numeroRegistrados"> </label> 
									<br/>
									
									  <div class="uk-text-center oculto" id="esperarMostrarRegistrados" >
                                      <label> Procesando... </label>
				                       <img src="cargando.gif" /> 				 
                                           </div> 
					
					</div><!-- cierre del content-->
				</div> <!-- cierre del mcard-->
					<br/>				
				<div class="md-card">
                <div class="md-card-content">
                    <div class="uk-overflow-container uk-margin-bottom">
                       <!-- <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair ts_issues2" id="tabla_registrados">
                           -->
                              <table class="uk-table uk-table-nowrap table_check uk-table-hover tablesorter tablesorter-altair" id="tabla_registrados">
                              
						   <thead>
                                <tr>
                                    <th class="uk-text-center">Nombre</th>
									<th class="uk-text-center">Email</th>
									<th class="uk-text-center">Celular</th>
									<!--<th class="uk-text-center">Fecha de nacimiento</th>-->
									<th class="uk-text-center">Ordenes</th> 
									<th class="uk-text-center">Ciudad</th> 
                                </tr>
                            </thead>
                            
                            <tbody id="body_tablaRegistrados">
                                                                                   
                               
                            </tbody>
                        </table>
                    </div>
					
                </div>
            </div>
					
					
					 
					  <!-- ver datos-->
	<div class="uk-modal" id="detalleDatosCliente">
	<div class="uk-modal-dialog uk-modal-dialog-medium"> 
        
             <button type="button"  class="uk-modal-close uk-close uk-close-alt"></button>
          
			<form class="uk-form-stacked">
			
			<h3 class="heading_b uk-margin-bottom">Datos del cliente </h3>
                
				<div class="uk-grid uk-margin-medium-top uk-margin-large-bottom" data-uk-grid-margin>
                                     
				                             <div class="uk-width-large-1-2">
                                         
                                           
											<ul class="md-list md-list-addon">
											  <li>                                                      
														<div class="md-list-addon-element">                                                           
													    <i class="md-list-addon-icon material-icons md-24">&#xe7fd;</i>
                                                           </div>
														<div class="md-list-content"> 
                                                        <span class="uk-text-small uk-text-muted">Nombre:</span>                                                       
														<span id="cliente_nombre"> </span>
                                                        </div>
													 </li>                                                     
													   <li>                                                      
														<div class="md-list-addon-element">                                                             
															<i class="md-list-addon-icon material-icons md-24">&#xe158;</i>
                                                        </div> 
													  <div class="md-list-content">
                                                      <span class="uk-text-small uk-text-muted">Email</span>  
                                                      <span id="cliente_email"> </span> 
													  </div>
													  </li>  
													<li>                                                      
														<div class="md-list-addon-element"> 
															<i class="md-list-addon-icon material-icons md-24">&#xe330;</i>
                                                           </div> 
														   <div class="md-list-content">													
                                                        <span class="uk-text-small uk-text-muted">Celular </span>                                                       
														<span id="cliente_cel"> </span>
													      </div>
													   </li>													  
													   <li id="espacio_fechaNac">                                                      
														<div class="md-list-addon-element"> 
															<i class="md-list-addon-icon material-icons md-24">&#xe63d;</i>
                                                            </div> 
														   <div class="md-list-content">														
                                                        <span class="uk-text-small uk-text-muted">Sexo</span>                                                       
														<span id="cliente_sexo"> </span>
													   </div>
													   </li>     
													   <li id="espacio_fechaNac">                                                      
														<div class="md-list-addon-element"> 
															<i class="md-list-addon-icon material-icons md-24">&#xe24f;</i>
                                                            </div> 
														   <div class="md-list-content">														
                                                        <span class="uk-text-small uk-text-muted">Fecha de Nacimiento</span>                                                       
														<span id="cliente_FechaNaci"> </span> 
													   </div>
													   </li> 
													   
                                            </ul>
											
										</div>
										
                                        <div class="uk-width-large-1-2">                                         
                                           
											<ul class="md-list md-list-addon" >
											          <li >                                                      
														<div class="md-list-addon-element"> 
															<i class="md-list-addon-icon material-icons md-24">&#xe0cd;</i>
                                                            </div> 
														   <div class="md-list-content">														
                                                        <span class="uk-text-small uk-text-muted">Teléfono</span>                                                       
														<span id="cliente_telefono"> </span>
													   </div>
													   </li> 
											          <li>                                                      
														<div class="md-list-addon-element"> 
															<i class="md-list-addon-icon material-icons md-24">&#xe7f1;</i>
                                                            </div> 
														   <div class="md-list-content">														
                                                        <span class="uk-text-small uk-text-muted">País</span>                                                       
														<span id="cliente_pais"> </span>
													   </div>
													   </li>   	
													   
											             <li>                                                      
														<div class="md-list-addon-element"> 
															<i class="md-list-addon-icon material-icons md-24">&#xe7f1;</i>
                                                             </div> 
														   <div class="md-list-content">													
                                                        <span class="uk-text-small uk-text-muted">Ciudad</span>                                                       
														<span id="cliente_ciudad"> </span>
													   </div>
													   </li>													   
                                               
                                                       <li>                                                      
														<div class="md-list-addon-element"> 
															<i class="md-list-addon-icon material-icons md-24">&#xe88a;</i>
                                                             </div> 
														   <div class="md-list-content">
                                                      <span class="uk-text-small uk-text-muted">Dirección</span>  
                                                      <span id="cliente_direccion"> </span> </div>
													   </li>
													   <li>                                                      
														<div class="md-list-addon-element"> 
															<i class="md-list-addon-icon material-icons md-24">&#xe7f1;</i>
                                                             </div> 
														   <div class="md-list-content">
                                                      <span class="uk-text-small uk-text-muted">RFC</span>  
                                                      <span id="cliente_rfc"> </span> </div>
													   </li>
													   
                                            </ul>  
											  
										</div>
							</div>  
                      
            </form>
        </div>
    </div>
  </div>
	
	<!-- ................... -->

                                    </div>  <!-- fin pag 2 -->
									
									
                                   
									
             
				</div>								
                </div>
            </div>
                 
	
	<!-- ................................................... -->

 <?php include('../codigo_general/script_commonPB.php'); ?>    

    <!-- page specific plugins -->
    <!-- tablesorter -->
    <script src="../bower_components/tablesorter/dist/js/jquery.tablesorter.min.js"></script>
    <script src="../bower_components/tablesorter/dist/js/jquery.tablesorter.widgets.min.js"></script>
    <script src="../bower_components/tablesorter/dist/js/widgets/widget-alignChar.min.js"></script>
    <script src="../bower_components/tablesorter/dist/js/extras/jquery.tablesorter.pager.min.js"></script>  
	<script src="../bower_components/tablesorter/dist/js/widgets/widget-columnSelector.min.js"></script>
    <script src="../bower_components/tablesorter/dist/js/widgets/widget-print.min.js"></script>

    <!--  issues list functions 
   <script src="../assets/js/pages/pages_issues.min.js"></script>
   <script src="../assets/js/pages/pages_issuesPru2.js"></script> -->
   <script src="../assets/js/kendoui_custom.min.js"></script> 
  <!--  kendoui functions -->
  <script src="../assets/js/pages/kendoui.min.js"></script>
  <!--page_contact_list-->
  <script src="../assets/js/pages/page_contact_list.min.js"></script>
	
	<!-- archivo JS-->
	<script type="text/javascript">
$( window ).ready(function()
    {
        //console.log('pagina lista');	    	      
	     mostrarRegistradosTabla();
		  mostrarInvitados();
		  cantidadInvitados();
		  cantidadRegistrados();
    }); 
    
	 /* Create by: Reyna Maria Martinez Vazquez*/ 
		 function inicializarTablas(){
       $("#tabla_invitados").tablesorter({
    sortList: [[1,0]], //ordenar por de inicio esa columna 
    headers: {1: { sorter: "shortDate", dateFormat: "ddmmyyyy" } }, //cambio de formato de fecha 
    widgets: ['filter']//activar el widget de filtro de busqueda
		 }); 
		 
		 
		 $("#tabla_registrados").tablesorter({
    sortList: [[0,0]], //ordenar por de inicio esa columna 
    headers: {1: { sorter: "shortDate", dateFormat: "ddmmyyyy" } }, //cambio de formato de fecha 
    widgets: ['filter']//activar el widget de filtro de busqueda
		 }); 
		 
	}
	
	
	function cantidadInvitados(){	  //muestra cantidad de cientes del tipo invitados	             
	 
     $.ajax({     
       method: "POST",dataType: "json",
	   url: "./../../controllers/getCountAllTblclientesInvitados.php", 
	   data: {solicitadoBy:"WEB"}})
            .done(function(mcc){				   
                     if(parseInt(mcc.success)==1){ 
			$("#numeroInvitados").text('Clientes del tipo invitados: '+mcc.datos);				 
					 }						
               //....
				 else{ 	  $("#numeroInvitados").text("No hay clientes Tipo Invitados");		} 
				 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      //.always(function(){  console.log("always");});
   } 
   
   function cantidadRegistrados(){	  //muestra cantidad de clientes registrados 
	   
     $.ajax({     
       method: "POST",dataType: "json",
	   url: "./../../controllers/getCountAllTblclientesRegistrados.php", 
	   data: {solicitadoBy:"WEB"}})
            .done(function(mcc){				   
                     if(parseInt(mcc.success)==1){ 
			$("#numeroRegistrados").text('Clientes registrados: '+mcc.datos);				 
					 }						
               //....
				 else{ 	  $("#numeroRegistrados").text("No hay Clientes Registrados");		} 
				 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      //.always(function(){  console.log("always");});
   } 
	
	 //.-----mostrar ciudades----------------------------------------------------------------
	  function mostrarCiudades(){		  
		                
    
     $.ajax({     
     method: "POST",dataType: "json",url: "./../../controllers/getAllTblciudadAct.php", 
	 data: {solicitadoBy:"WEB"}})
            .done(function(mostCiud){
				   
                $.each(mostCiud.datos, function(i,item)
				 {	idtblciudad=item.idtblciudad;
				        ciudad=item.tblciudad_nombre; 
				 //muestra ciudades en el encabezado de la interfaz principal
                 $("#invitadoCiudad").append('<option value="' + ciudad +'">' +ciudad + '</option>');
				 $("#registradoCiudad").append('<option value="' + ciudad +'">' +ciudad + '</option>');
				  				 
                      });	
                                 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      
   } //fin de la funcion
   
   
   
    function mostrarInvitados(){
			
		   // var nombreCiudad=$("#invitadoCiudad").val();	//se recibe el id que seleciono el usuario del select de Ciudades            
             inicializarTablas();
			 
	   $.ajax({ 
        method: "POST",dataType: "json",url: "./../../controllers/getAllTblclienteInvitados.php", 
		data: {solicitadoBy:"WEB"},
		 beforeSend: function(){
				   $('#esperarMostrarInvitados').css('display','inline');}	
		})
          .done(function(inv){ 	
         //console.log(inv);		  
				 if(parseInt(inv.success)==1){                    					 
				         //$("#body_tablaInvitados").empty();             
                  $.each(inv.datos, function(g,item)
				 {	  id=item.idtblcliente;
			          
					 //-------------------------
			   
			  $("#body_tablaInvitados").append('<tr>'+                                 
				'<td class="uk-text-center">'+
                '<span>'+inv.datos[g].tblcliente_nombre+' '+inv.datos[g].tblcliente_apellidos+' </span>'+  //nombre
               	' </td>'+								  									
				'<td class="uk-text-center">'+
                '<span>'+ inv.datos[g].tblcliente_email +' </span>'+  //email                           
                '</td>'+
				'<td class="uk-text-center">'+
                '<span>'+ inv.datos[g].tblcliente_celular +'</span>'+ 	//celular			
                '</td>'+
				'<td class="uk-text-center">'+				
                '<span id="invitado'+g+'"> </span>'+ //fecha nacimiento			                
                '</td>'+                		
                '</tr>' 		 
					);									
					
					 if(inv.datos[g].tblcliente_fchnacimiento!=null)
					 {  fecha= inv.datos[g].tblcliente_fchnacimiento;
                        fecha = fecha.split("-");                 
					    fecha = fecha[2]+"/"+fecha[1]+"/"+fecha[0];
					  $('#invitado'+g).text(fecha); 
					 } else { $('#invitado'+g).text('---');  }
                                    							   
                                    
					$("#tabla_invitados").trigger('updateAll', [true]);//actualiza tabla 
			//........................
                  });	//fin del each			     
               //----------------------
                                      }
							else 
						{  				    
					$("#body_tablaInvitados").empty();					
				        }
			 
              })
			  
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})     
	   .always(function(){ $("#esperarMostrarInvitados").hide(); });
   } //fin de la funcion
   
   
   function mostrarRegistradosTabla(){
			
		    //var nombre_Ciudad=$("#registradoCiudad").val();	//se recibe el id que seleciono el usuario del select de Ciudades            
             inicializarTablas();
	   $.ajax({ 
        method: "POST",dataType: "json",url: "./../../controllers/getAllTblclienteRegistrados.php", 
		data: {solicitadoBy:"WEB"},
		 beforeSend: function(){
				   $('#esperarMostrarRegistrados').css('display','inline');}	
		})
          .done(function(reg){ 	
              //console.log(reg);		  
				 if(parseInt(reg.success)==1){                    					 
				     $('#body_tablaRegistrados').empty();
					 
                  $.each(reg.datos, function(r,item)
				 {	  id_cliente=item.idtblcliente;
			         
					 
					              $.ajax({     
                               method: "POST",dataType: "json",
	                           url: "./../../controllers/getCountAllOrdenesbyCliente.php", 
	                           data: {solicitadoBy:"WEB",cliente:id_cliente}}) 
                               .done(function(mc2){				
                                if(parseInt(mc2.success)==1){
                      
           $("#body_tablaRegistrados").append('<tr>'+
                '<td class="uk-width-medium-1-3" '+
				' onclick="mostrarDatosCiudad('+reg.datos[r].idtblcliente+');"'+
				'data-uk-modal="{target:'+"'#detalleDatosCliente'"+',bgclose:false, center:true }">'+
                '<span>'+reg.datos[r].tblcliente_nombre+' '+reg.datos[r].tblcliente_apellidos+' </span>'+ 
               	' </td>'+	
				'<td class="uk-text-center">'+
                '<span>'+reg.datos[r].tblcliente_email+' </span>'+  
               	' </td>'+
				'<td class="uk-text-center">'+
                '<span>'+reg.datos[r].tblcliente_celular+' </span>'+  
               	' </td>'+				
				'<td class="uk-text-center">'+
                '<span>'+mc2.datos+' </span>'+  
               	' </td>'+
				'<td class="uk-text-center">'+
                '<span>'+reg.datos[r].tblcliente_ciudad+' </span>'+  
               	' </td>'+
                '</tr> '  
				);									
					              	     
                     if(reg.datos[r].tblcliente_fchnacimiento!=null)
					 {  fecha= reg.datos[r].tblcliente_fchnacimiento;
                        fecha = fecha.split("-");                 
					    fecha = fecha[2]+"/"+fecha[1]+"/"+fecha[0];
					  $('#registrado'+r).text(fecha); 
					 } else { $('#registrado'+r).text('---');  }
					 
					$("#tabla_registrados").trigger('updateAll', [true]);//actualiza tabla 
					
								}else{
									
								$("#body_tablaRegistrados").append('<tr>'+
                '<td class="uk-width-medium-1-3" '+
				' onclick="mostrarDatosCiudad('+reg.datos[r].idtblcliente+');"'+
				'data-uk-modal="{target:'+"'#detalleDatosCliente'"+',bgclose:false, center:true }">'+
                '<span>'+reg.datos[r].tblcliente_nombre+' '+reg.datos[r].tblcliente_apellidos+' </span>'+ 
               	' </td>'+	
				'<td class="uk-text-center">'+
                '<span>'+reg.datos[r].tblcliente_email+' </span>'+  
               	' </td>'+
				'<td class="uk-text-center">'+
                '<span>'+reg.datos[r].tblcliente_celular+' </span>'+  
               	' </td>'+
				/*'<td class="uk-text-center">'+
                '<span id="registrado'+r+'"> </span>'+ 
               	' </td>'+*/
				'<td class="uk-text-center">'+
                '<span>0</span>'+  
               	' </td>'+
				'<td class="uk-text-center">'+
                '<span>'+reg.datos[r].tblcliente_ciudad+' </span>'+  
               	' </td>'+
                '</tr> '  
				);									
					              	     
                     if(reg.datos[r].tblcliente_fchnacimiento!=null)
					 {  fecha= reg.datos[r].tblcliente_fchnacimiento;
                        fecha = fecha.split("-");                 
					    fecha = fecha[2]+"/"+fecha[1]+"/"+fecha[0];
					  $('#registrado'+r).text(fecha); 
					 } else { $('#registrado'+r).text('---');  }
					 
					$("#tabla_registrados").trigger('updateAll', [true]);//actualiza tabla 	
									
									
								     }	
                             }) .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})  								
							
							
							
							//........................
                            });	//fin del each			     
                            //----------------------
                                      }
							else 
						{  				    
					$("#body_tablaRegistrados").empty();					
				        }
			 
     }) .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})     
	  .always(function(){ $("#esperarMostrarRegistrados").hide(); });
   } //fin de la funcion
    
   
   function mostrarDatosCiudad(idtblcliente){
               $("#cliente_nombre").empty();
			    $("#cliente_email").empty();
				 $("#cliente_cel").empty();
				 $("#cliente_ciudad").empty();
				  $("#cliente_pais").empty();
				  $("#cliente_sexo").empty();				 
				  $("#cliente_direccion").empty();
				  $("#cliente_FechaNaci").empty();
				  $("#cliente_rfc").empty();
				  $("#cliente_telefono").empty();
				  
    $.ajax({ 
       method: "POST",dataType: "json",url: "./../../controllers/getTblcliente.php", 
	   data: {solicitadoBy:"WEB",idtblcliente:idtblcliente}})   
            .done(function(msg){
				$.each(msg.datos, function(x,item){	 
				  //$("#paraIdCiudad").text(item.idtblciudad); 
				  $("#cliente_nombre").text(item.tblcliente_nombre+' '+item.tblcliente_apellidos); 
				  $("#cliente_email").text(item.tblcliente_email);  
				  $("#cliente_cel").text(item.tblcliente_celular);                   
				  $("#cliente_pais").text(item.tblcliente_pais);  
                  $("#cliente_ciudad").text(item.tblcliente_ciudad);
                  $("#cliente_sexo").text(item.tblcliente_sexo);               			  
				  $("#cliente_direccion").text(item.tblcliente_callenum+', Col:'+item.tblcliente_colonia+', CP:'+item.tblcliente_codipost);	
				  	
							
            
				
				    if(item.tblcliente_fchnacimiento==null || item.tblcliente_fchnacimiento=="")
					{  $("#cliente_FechaNaci").text("------");	    
				   }else { 
                           fecha= msg.datos[x].tblcliente_fchnacimiento;
                        fecha = fecha.split("-");                 
					    fecha = fecha[2]+"/"+fecha[1]+"/"+fecha[0];				   
				       $("#cliente_FechaNaci").text(fecha);				 
					 }
					 
					 
				 if(item.tblcliente_rfc==null || item.tblcliente_rfc=="")
				 { $("#cliente_rfc").text("------");    } 
				 else 
				 {  $("#cliente_rfc").text(item.tblcliente_rfc);
					  }
					
					
					if(item.tblcliente_telefono==null || item.tblcliente_telefono=="")
				 { $("#cliente_telefono").text("------"); } 
				 else 
				 {  $("#cliente_telefono").text(item.tblcliente_telefono);
				 }
				 
					//..........
				        })
                   })              
          .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
          //.always(function(){  console.log("always");});				  
	} //fin de la funcion	
	
		
    </script> 
    
</body>
</html>