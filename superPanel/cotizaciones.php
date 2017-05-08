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
		
	<!-- dropify -->
    <link rel="stylesheet" href="../assets/skins/dropify/css/dropify.css">


</head>
<body class=" sidebar_main_open sidebar_main_swipe" >
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
                                   
									<li class="uk-active"><a href="#">Productos  </a></li>
                                    <li><a href="#"> Productos nuevos </a></li>
                                   <!-- <li><a href="#"><font size="3">author </font></a></li> -->
                                     
								</ul>								
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
								<div id="settings_users" class="uk-switcher uk-margin">								
								
   <!--********************** inicio pag1 -->
							   <div> 							  
							   <div class="md-card">
					               <div class="md-card-content">
									<div>    <!-- id="page_heading" -->         
                                    <h2>Cotizaciones</h2>
									<span class="uk-text-upper uk-text-small">Productos de Proveedor</span> 
                                    </div>
									
									<div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3">
                                    <span class="uk-text-small">Selecciona una ciudad: </span>
                             <select id="selectProducto" name="selectProducto" class="uk-button uk-form-select" data-uk-form-select  onchange="javascript:mostrarCotizaciones();cantidadCotizacionProductos();">
                             <!-- <option value="" disabled selected readonly >Selecciona...</option> -->							 
                             </select>                        
                                    </div>
					                </div>
					
					               <div>
								   <br/><br/>
								   <h4> Para mas informaci&oacute;n, haz clic en el Número de Orden. </h4>
								   <label class="uk-float-right" id="numeroCotiProductos"> </label> 
								   <br/>
								   </div>
								   
									  <div class="uk-text-center oculto" id="esperarMostrarCotiProdu" >
                                      <label> Procesando... </label>
				                       <img src="cargando.gif" /> 				 
                                           </div> 
								   
								  </div>   
					            </div>
              
						
				<div class="md-card">
                <div class="md-card-content">
                    <div class="uk-overflow-container uk-margin-bottom">
					  <h3>Cotizaciones No Contestadas</h3>
                      <!--  <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="tabla_productos_NoCotContestadas">
                          
                            <table class="uk-table uk-table-nowrap table_check uk-table-hover tablesorter tablesorter-altair" id="tabla_productos_NoCotContestadas">
                            <table class="uk-table uk-table-nowrap table_check uk-table-hover tablesorter tablesorter-altair" id="tabla_productos_NoCotContestadas">
                          -->     
						   <table class="uk-table uk-table-nowrap table_check uk-table-hover tablesorter tablesorter-altair" id="tabla_productos_NoCotContestadas">
                         
						   <thead>
                                <tr>
									 
									<th class="uk-text-center">N° Orden Cotizaci&oacute;n</th>
									<th class="uk-text-center">Producto</th>
									<th class="uk-text-center">Fecha de evento</th>	
									<th class="uk-text-center">Tipo de evento</th>	
									
                                    
                                </tr>
                            </thead>
                            
                            <tbody id="body_productos_noContestados">
								   
                                          
                               
                            </tbody>
                        </table>
                    </div>					
                </div>
            </div>
					
					<!-- tabla de cotizaciones no contestadas -->
					<div class="md-card">
                <div class="md-card-content">
                    <div class="uk-overflow-container uk-margin-bottom">
					  <h3>Cotizaciones Contestadas</h3>
                       <!-- <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair ts_issues2" id="tabla_productos_CotContestadas">
                           -->
                             <table class="uk-table uk-table-nowrap table_check uk-table-hover tablesorter tablesorter-altair" id="tabla_productos_CotContestadas">
                         
						   <thead>
                                <tr>
									 
									<th class="uk-text-center">N° Orden Cotizaci&oacute;n</th>
									<th class="uk-text-center">Producto</th>
									<th class="uk-text-center">Fecha de evento</th>	
									<th class="uk-text-center">Tipo de evento</th>	
									
                                    
                                </tr>
                            </thead>
                            
                            <tbody id="body_productosContestados">
								   
                                          
                               
                            </tbody>
                        </table>
                    </div>					
                </div>
            </div>
					 
					<!-- ..........  Cotizacion de productos.... -->
                                         			 
	<div class="uk-modal" id="productosi">
           <div class="uk-modal-dialog uk-modal-dialog-large">
            <button type="button" class="uk-modal-close uk-close uk-close-alt"></button>
			
            <div class="uk-modal-header">
             <h3 class="uk-modal-title"><i class="material-icons" >&#xE878;</i>&nbsp;Detalle de Cotizaci&oacute;n de Productos</h3>
            </div>
			<div class="uk-grid">
           <div class="uk-width-large-1-2"></div>
           <div class="uk-width-large-1-2" id="cotizacion_botondeubicacion"> ----</div>
            </div>
            <form id="form_detalleCotizacionProducto" name="form_detalleCotizacionProducto" class="uk-form-stacked"  >
             <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
              <div class="uk-width-1-1">
               <div class="md-card">
                <div class="md-card-toolbar">
                 <h3 class="md-card-toolbar-heading-text" id="contestada_idordencotizador"></h3>
                  </div>
                <div class="md-card-content large-padding">
                <!-- <div class="uk-grid "></div> -->
                 <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>
                  <div class="uk-width-large-1-3">
                   <h4 class="heading_c uk-margin-small-bottom">Informaci&oacute;n de Cliente </h4>
                  <div class="uk-form-row">
                  <ul class="md-list md-list-addon">
                   <li>
                    <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE7FD;</i></div>
					<div class="md-list-content" id="contestada_nombrecliente"></div>
                   </li>
                   <li>
                    <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE158;</i></div>
					<div class="md-list-content" id="contestada_email"></div>
                   </li>
                   <li>
                    <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE0CD;</i></div>
					<div class="md-list-content" id="contestada_telef"></div>
                   </li>
                   <li>
                    <div class="md-list-addon-element"><i class="md-list-addon-icon  material-icons">&#xE55F;</i></div>
					<div class="md-list-content" id="contestada_direccion"></div>
                   </li><br/>
                  </ul>
                  
                  </div>
                </div>
                <div class="uk-width-large-1-3" id="espacio_datosevento_cotiProducto">
                 
                   <h5 class="heading_c uk-margin-small-bottom uk-h6">Datos del Evento</h5>
				     <ul class="md-list md-list-addon" id="detallecotizador_datosevento">
                  <li>
                   <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE8B1;</i></div><div class="md-list-content" id="contestada_tipoevento"></div>
                  </li>
                  <li>
                   <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE916;</i></div><div class="md-list-content" id="contestada_fchevento"></div>
                  </li>
                  <li>
                   <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE7FB;</i></div><div class="md-list-content" id="contestada_numinvitados"></div>
                  </li>
                  <li>
                   <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE7E9;</i></div>
				   <div class="md-list-content" id="contestada_nomproducto"></div>
                  </li>
                 </ul>
				 
                 <ul class="uk-grid uk-grid-width-1-1 uk-container-center" data-uk-grid-margin id="contestada_imgOrdenCotizador"></ul>
                   </div>
                   <div class="uk-width-large-1-3">
                    <!--<h4 class="heading_c uk-margin-small-bottom">Datos del proveedor </h4>-->
                  <div class="uk-form-row">
                  <ul class="md-list md-list-addon" id="respuestaCotizaciondeProductoNormal">
                   
                   
                  </ul>
                  
                  </div>
                    
                  </div>
                 </div>
                </div>
               </div>
              </div>
             </div>
             </form>
             
            </div>
           </div>

					 <!-- ....... -->
					 			
					 <!-- ....... -->
					
					 
                                    </div> <!-- fin pag1 -->
									
									
									
                                    <div>  <!-- inicio pag 2 -->
													
				
							   <div class="md-card">
					               <div class="md-card-content">
									<div>    <!-- id="page_heading" -->         
                                    <h2>Cotizaciones</h2>
									<span class="uk-text-upper uk-text-small">Productos nuevos</span> 
                                  </div>
									
									<div class="uk-grid" data-uk-grid-margin>
                                   <div class="uk-width-medium-1-3">
                                    <span class="uk-text-small">Selecciona una ciudad: </span>
                             <select id="selectProductoNuevo" name="selectProductoNuevo" class="uk-button uk-form-select" data-uk-form-select  onchange="javascript:mostrarCotizacionesProductosNuevos();cantidadCotizacionProductosNuevos();">
							 
                             </select>                            
                                  </div>
					                </div>
					
					               <div>
								   <br/><br/>
								   <h4> Para mas informaci&oacute;n, haz clic en el registro Número de Orden. </h4>
								   <label class="uk-float-right" id="numeroCotiProductosNuevos"> </label> 
								   <br/>
								   </div>
								   
								   <div class="uk-text-center oculto" id="esperarMostrarCotiProduNuevo" >
                                      <label> Procesando... </label>
				                       <img src="cargando.gif" /> 				 
                                           </div>
								  </div>   
					            </div>
								
					<br/>
					
				<div class="md-card">
                <div class="md-card-content">
                    <div class="uk-overflow-container uk-margin-bottom">
					   <h3> Cotizaciones No Contestadas de Productos Nuevos </h3>
                      <!--  <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="ts_issues">
                          -->
                           <table class="uk-table uk-table-nowrap table_check uk-table-hover tablesorter tablesorter-altair" id="tablaProductoNuevo_NoCont" >
                         
						  <thead>
                                <tr>
                                    <th class="uk-text-center">N° Orden Cotizaci&oacute;n</th>
									<th class="uk-text-center">Fecha de evento</th>
									<th class="uk-text-center">Tipo de evento</th>
									
									
                                    
                                </tr>
                            </thead>
                            
                            <tbody id="body_PNuevo_noContestadas">
                                                                  
                            </tbody>
                        </table>
                    </div>
					
                </div>
            </div>
			<!-- cotizaciones de productos nuevos no contestadas -->
			<div class="md-card">
                <div class="md-card-content">
                    <div class="uk-overflow-container uk-margin-bottom">
					   <h3> Cotizaciones Contestadas de Productos Nuevos </h3>
                      <!--  <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="ts_issues">
                          -->
                         <table class="uk-table uk-table-nowrap table_check uk-table-hover tablesorter tablesorter-altair" id="tablaProductoNuevo_Cont">
                         
						  <thead>
                                <tr>
                                    <th class="uk-text-center">N° Orden Cotizaci&oacute;n</th>									
									<th class="uk-text-center">Proveedor</th>
									<th class="uk-text-center">Fecha de evento</th>
									<th class="uk-text-center">Tipo de evento</th>
                                </tr>
                            </thead>
                            
                            <tbody id="body_PNuevo_Contestadas"> 
                               
                            </tbody>
                        </table>
                    </div>
					
                </div>
            </div>
			
					
				<!-- .............  Cotizacion productos nuevos........... -->	 
					  
	
                                         			 
	<div class="uk-modal" id="productonuevo">
           <div class="uk-modal-dialog uk-modal-dialog-large">
            <button type="button" class="uk-modal-close uk-close uk-close-alt"></button>			
            <div class="uk-modal-header">
             <h3 class="uk-modal-title"><i class="material-icons" >&#xE878;</i>&nbsp;Detalle de Cotizaci&oacute;n de Productos Nuevos</h3>
            </div>
			<div class="uk-grid">
           <div class="uk-width-large-1-2"></div>
           <div class="uk-width-large-1-2" id="cotizacionnueva_botondeubicacion2"></div>
            </div>
			
            
            <form id="form_detalleOrden" name="form_detalleOrden" class="uk-form-stacked"  >
             <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
              <div class="uk-width-1-1">
               <div class="md-card">
                <div class="md-card-toolbar">
                 <h3 class="md-card-toolbar-heading-text" id="productoNuevo_idordencotizador"></h3>
                  </div>
                <div class="md-card-content large-padding">
                <!-- <div class="uk-grid "></div> -->
                 <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>
                  <div class="uk-width-large-1-3">
                   <h4 class="heading_c uk-margin-small-bottom">Informaci&oacute;n de Cliente </h4>
                         <div class="uk-form-row">
                  <ul class="md-list md-list-addon" >
                   <li>
                    <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE7FD;</i></div>
					<div class="md-list-content" id="productnuevo_nombrecliente"></div>
                   </li>
                   <li>
                    <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE158;</i></div>
					<div class="md-list-content" id="productnuevo_email"></div>
                   </li>
                   <li>
                    <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE0CD;</i></div>
					<div class="md-list-content" id="productnuevo_telef"></div>
                   </li>
                   <li>
                    <div class="md-list-addon-element"><i class="md-list-addon-icon  material-icons">&#xE55F;</i></div>
					<div class="md-list-content" id="productnuevo_direccion"></div>
                   </li><br/>
                  </ul>                  
                  
                </div>
                </div>
                <div id="espacio_datosevento" class="uk-width-large-1-3">
                 
                   <h5 class="heading_c uk-margin-small-bottom uk-h6">Datos del Evento</h5>
				   <ul class="md-list md-list-addon">
                   <li>
                    <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE8B1;</i>
					</div><div class="md-list-content" id="productnuevo_tipoevento"></div>
                   </li>
                   <li>
                    <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE916;</i>
					</div><div class="md-list-content" id="productnuevo_fchevento"></div>
                   </li>
                   <li>
                    <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE7FB;</i>
					</div><div class="md-list-content" id="productnuevo_numinvitados"></div>
                   </li>
                   <li>
                    <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE7E9;</i>
					</div><div class="md-list-content" id="productnuevo_nomproducto"></div>
                   </li>
                  </ul> 
				  <ul class="uk-grid uk-grid-width-1-1 uk-container-center" data-uk-grid-margin id="productnuevo_imgOrdenCotizadorproductnuevo"></ul>
                
                   </div>
                   <div class="uk-width-large-1-3">
                    <!--<h4 class="heading_c uk-margin-small-bottom">Datos del proveedor </h4>-->
                     <div class="uk-form-row">
                      <ul class="md-list md-list-addon" id="respuestaDeCotizacionNuevoProducto">
                  
                   
                     </ul>
				  
                    </div>
					
									    					 
					 
					 <!-- ......................... -->
					
                    
                  </div>
                 </div>
                </div>
               </div>
              </div>
             </div>
             </form>
             
            </div>
           </div>

					 <!-- ....... -->
	
	
	
	<!-- cierre de cotizaciones de productos nuevos no contestadas -->

                                    </div>  
									
									<!-- fin pag 2 -->
									
	<div class="uk-modal" id="mapa"><!--Mapa-->
     <div class="uk-modal-dialog">
      <button type="button" class="uk-modal-close uk-close uk-close-alt"></button>
       <div class="uk-modal-header">
        <h4 class="md-card-toolbar-heading-text" id="direccionMapa"></h4>
       </div>  
       <div class="md-card"><div id="gmap" class="gmap" style="width:100%;height:400px;"></div></div>
     </div>
    </div><!--end Mapa-->					
                                   
									
              <!-- </ul> -->
				</div>								
                </div>
            </div>
                 
	
	
	
	
	<!-- </div>
	</div> -->
	<!-- ::::::::::::::::::::::::::::::::::::::::::::::::::::::::  -->
     <?php include('../codigo_general/script_commonPB.php'); ?>  <!-- librerias -->

    

    <!-- page specific plugins -->
    <!-- tablesorter -->
    <script src="../bower_components/tablesorter/dist/js/jquery.tablesorter.min.js"></script>
    <script src="../bower_components/tablesorter/dist/js/jquery.tablesorter.widgets.min.js"></script>
    <script src="../bower_components/tablesorter/dist/js/widgets/widget-alignChar.min.js"></script>
    <script src="../bower_components/tablesorter/dist/js/extras/jquery.tablesorter.pager.min.js"></script>
 
	<script src="../bower_components/tablesorter/dist/js/widgets/widget-columnSelector.min.js"></script>
    <script src="../bower_components/tablesorter/dist/js/widgets/widget-print.min.js"></script>
    <!--  issues list functions 
   <script src="../assets/js/pages/pages_issues.min.js"></script>  -->
	 <script src="../assets/js/kendoui_custom.min.js"></script> 
  <!--  kendoui functions -->
  <script src="../assets/js/pages/kendoui.min.js"></script>
  <!--page_contact_list
  <script src="../assets/js/pages/page_contact_list.min.js"></script> -->
  
  
	<!--  dropify -->
    <script src="../assets/js/custom/dropify/dist/js/dropify.min.js"></script>
    <!--  form file input functions -->
    <script src="../assets/js/pages/forms_file_input.min.js"></script>
   
   
   <!-- archivo JS-->
   <script type="text/javascript" >
     
 /* Create by: Reyna Maria Martinez Vazquez */ 
 $(window).ready(function()
    {  //console.log('pagina lista');
       mostrarCiudades();
    });
	var idmapaCotizaciones=2;
	var idmapaCotizacionesNuevas=3;
	
	
	function inicializarTablas(){
  $("#tabla_productos_CotContestadas").tablesorter({
    sortList: [[1,0]], //ordenar por de inicio esa columna 
    headers: {1: { sorter: "shortDate", dateFormat: "ddmmyyyy" } }, //cambio de formato de fecha 
    widgets: ['filter']//activar el widget de filtro de busqueda
		 }); 
		 
		  $("#tabla_productos_NoCotContestadas").tablesorter({
    sortList: [[1,0]], //ordenar por de inicio esa columna 
    headers: {1: { sorter: "shortDate", dateFormat: "ddmmyyyy" } }, //cambio de formato de fecha 
    widgets: ['filter']//activar el widget de filtro de busqueda
		 }); 
		 
	}//fin d ela funcion

    function cantidadCotizacionProductos(){	  //muestra cantidad de cotizaciones de productos             
	     
		 var nomCiudad=$("#selectProducto").val();	//nombre de la ciudad del select
     $.ajax({     
       method: "POST",dataType: "json",
	   url: "../../../controllers/getCountAllTblordenescotizadorBynombreCiudad.php", 
	   data: {solicitadoBy:"WEB",nombreciudad:nomCiudad}})
            .done(function(mcc){				   
                     if(parseInt(mcc.success)==1){ 
			$("#numeroCotiProductos").text('Cantidad de cotizaciones en esta ciudad: '+mcc.datos);				 
					 }						
               //....
				 else{ 	  $("#numeroCotiProductos").text("No hay Ordenes de cotización en esta ciudad");		} 
				 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      //.always(function(){  console.log("always");});
   } //fin de la funcion

   function cantidadCotizacionProductosNuevos(){	  //muestra cantidad de cotizaciones de productos nuevos	             
	     
		 var nomCiudad=$("#selectProductoNuevo").val();	//nombre de la ciudad del select
     $.ajax({     
       method: "POST",dataType: "json",
	   url: "../../../controllers/getCountAlltblcarritoproductnuevcotizadorByCiudad.php", 
	   data: {solicitadoBy:"WEB",nombreciudad:nomCiudad}})
            .done(function(mcc){				   
                     if(parseInt(mcc.success)==1){ 
			$("#numeroCotiProductosNuevos").text('Cantidad de cotizaciones en esta ciudad: '+mcc.datos);				 
					 }						
               //....
				 else{ 	  $("#numeroCotiProductosNuevos").text("No hay Ordenes de cotización en esta ciudad");		} 
				 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      //.always(function(){  console.log("always");});
   } //fin de la funcion   
	
	function mostrarCiudades(){	
      
     $.ajax({     
     method: "POST",dataType: "json",url: "../../../controllers/getAllTblciudadAct.php", data: {solicitadoBy:"WEB"}})
            .done(function(mostC){				
				$("#selectProducto").append('<option value="" disabled selected readonly >Selecciona...</option>'); 
				$("#selectProductoNuevo").append('<option value="" disabled selected readonly >Selecciona...</option>'); 
				
                $.each(mostC.datos, function(i,item)				
				 {	  
				     nombre_ciudad=item.tblciudad_nombre;	
				 
				 //muestra ciudades en el encabezado de la interfaz principal
                 $("#selectProducto").append('<option value="' + nombre_ciudad +'">' +nombre_ciudad + '</option>');
				  $("#selectProductoNuevo").append('<option value="' + nombre_ciudad +'">' +nombre_ciudad + '</option>');
				
				});	
					
                                 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      //.always(function(){  console.log("always");});
   } //fin de la funcion
   
   
   
   //muestra en tablas las cotizaciones de productos normales
   function mostrarCotizaciones(){
         
		var nomCiudad=$("#selectProducto").val();	//se recibe el id que seleciono el usuario del select de Ciudades            
            
  nombreIdPupop ="'#productosi'";
            inicializarTablas();
  $.ajax({
    method: "POST",  
    dataType: "json",  
    url: "../../../controllers/getAllTblordenescotizadorBynombreCiudad.php",  
    data: {solicitadoBy:"WEB",nombreciudad:nomCiudad},
	 beforeSend: function(){
				   $('#esperarMostrarCotiProdu').css('display','inline');}	
	
	})
    .done(function( msg){ 
        if(msg.success==1){  hh=true;
        $.each(msg.datos, function(i,item)
        {

          //cambio de formato de fecha 
          
        
		if(msg.datos[i].tblmotivocotizacion_idtblmotivocotizacion=="2" ){
			   fchentrega= msg.datos[i].tblcarritoproductcotizador_fchentrega;
               fchentrega = fchentrega.split("-");
               fchentrega = fchentrega[2]+"/"+fchentrega[1]+"/"+fchentrega[0];  
        //body de tabla de productos
        $("#body_productosContestados").append(  
        '<tr data-uk-modal="{target:'+nombreIdPupop+',bgclose:false,modal:false}" '+
		'onclick="detalleCotizacion('+msg.datos[i].idtblordencotizador+','+msg.datos[i].idtblcarritoproductcotizador+')"> '+
		'<td class="uk-text-center">'+msg.datos[i].idtblordencotizador+'</td>'+                                                                     
		'<td class="uk-text-center">'+msg.datos[i].tblproductcotizador_nombre+'</td>'+
        '<td class="uk-text-center">'+fchentrega+'</td>'+
        '<td class="uk-text-center">'+msg.datos[i].tblevento_nombre+'</td>'+
       // '<td class="uk-text-center"><span  class="uk-text-bold" id="statusCotizacion'+i+'"></span></td>'+
		'</tr>');
        $("#tabla_productos_CotContestadas").trigger('updateAll', [true]);//actualiza tabla
        
		 //statusCotizacion(msg.datos[i].tblmotivocotizacion_idtblmotivocotizacion,i);
		}else{
			   fchentrega= msg.datos[i].tblcarritoproductcotizador_fchentrega;
               fchentrega = fchentrega.split("-");
               fchentrega = fchentrega[2]+"/"+fchentrega[1]+"/"+fchentrega[0];  
        //body de tabla de productos
        $("#body_productos_noContestados").append(  
        '<tr data-uk-modal="{target:'+nombreIdPupop+',bgclose:false,modal:false}" '+
		'onclick="detalleCotizacion('+msg.datos[i].idtblordencotizador+','+msg.datos[i].idtblcarritoproductcotizador+')"> '+
		'<td class="uk-text-center">'+msg.datos[i].idtblordencotizador+'</td>'+                                                                     
		'<td class="uk-text-center">'+msg.datos[i].tblproductcotizador_nombre+'</td>'+
        '<td class="uk-text-center">'+fchentrega+'</td>'+
        '<td class="uk-text-center">'+msg.datos[i].tblevento_nombre+'</td>'+
       // '<td class="uk-text-center"><span  class="uk-text-bold" id="statusCotizacion'+i+'"></span></td>'+
		'</tr>');
        $("#tabla_productos_NoCotContestadas").trigger('updateAll', [true]);//actualiza tabla
			
			
			
		}
		 
        }); //fin del each
		}else{hh=false;    
		 $("#body_productos_noContestados").empty();
 		 $("#body_productosContestados").empty();  }
             

      }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  
	  })
	  
	   .always(function(){ $("#esperarMostrarCotiProdu").hide(); });
	  //.always(function(){  console.log("always");});

}  //fin d ela funcion

  //muestra detalle de cotizaciones de productos normales
function detalleCotizacion(idtblordencotizador,idtblcarritoproductcotizador){

   $("#contestada_idordencotizador").empty();
   $("#contestada_tipoevento").empty();
   $("#contestada_fchevento").empty();
   $("#contestada_numinvitados").empty();
   $("#contestada_nomproducto").empty();
   $("#contestada_nombrecliente").empty();
   $("#contestada_telef").empty();
   $("#contestada_email").empty();
   $("#contestada_nombreproveedor").empty();
   $("#contestada_imgOrdenCotizador").empty();
   $("#contestada_direccion").empty();
   $("#cotizacion_botondeubicacion").empty();
   $("#contestada_costoTienda").empty();
   $("#contestada_costoDomicilio").empty();
   $("#respuestaCotizaciondeProductoNormal").empty();

  $.ajax({
    method: "POST",   
    dataType: "json",  
    url: "../../../controllers/getTblordenescotizadorByTblcarritocotizador2.php",  
    data: {solicitadoBy:"WEB",idtblordencotizador:idtblordencotizador,
	idtblcarritoproductcotizador:idtblcarritoproductcotizador}})
    .done(function(msg1){ 
           if(msg1.success==1){
             produNormal=true;
       $.each(msg1.datos, function(x,item)
        {  idtblmotivoo  = item.tblmotivocotizacion_idtblmotivocotizacion;
			   
		  fchentrega= item.tblcarritoproductcotizador_fchentrega;
          fchentrega = fchentrega.split("-");
          fchentrega = fchentrega[2]+"/"+fchentrega[1]+"/"+fchentrega[0];
          
          $("#contestada_idordencotizador").append('# '+item.idtblordencotizador+' Cotización<span style="display:none" id="cotizacion_idtblordencotizacion">'+item.idtblordencotizador+'</span>');
          $("#contestada_nombrecliente").append('<span class="md-list-heading">'+item.tblordencotizador_nombre+'</span><span class="uk-text-small uk-text-muted">Nombre Completo</span>');
          $("#contestada_email").append('<span class="md-list-heading">'+item.tblordencotizador_email+'</span><span class="uk-text-small uk-text-muted">Email</span>');
          $("#contestada_telef").append('<span class="md-list-heading">'+item.tblordencotizador_telefono+'</span><span class="uk-text-small uk-text-muted">Telefono</span>');
          $("#contestada_tipoevento").append('<span class="md-list-heading">'+item.tblevento_nombre+'</span><span class="uk-text-small uk-text-muted">Tipo de Evento</span>');
          $("#contestada_fchevento").append('<span class="md-list-heading" id="cotizacion_fchevento">'+fchentrega+'</span><span class="uk-text-small uk-text-muted">Fecha de Evento</span>');
          $("#contestada_numinvitados").append('<span class="md-list-heading" id="cotizacion_numpersonas">'+item.tblcarritoproductcotizador_numpersonas+'</span><span class="uk-text-small uk-text-muted"># Número de Invitados</span>');
          $("#contestada_nomproducto").append('<span class="md-list-heading">'+item.tblproductcotizador_nombre+'</span><span class="uk-text-small uk-text-muted">Nombre Producto</span><span style="display:none" id="cotizacion_idproductcotizador">'+item.tblproductcotizador_idtblproductcotizador+'</span>');
          
            if(idtblmotivoo==2){ //cotizaciones contestadas
		     $("#espacio_datosevento_cotiProducto").removeClass("uk-width-large-1-2");
			 $("#espacio_datosevento_cotiProducto").addClass( "uk-width-large-1-3" );
			 $("#respuestaCotizaciondeProductoNormal").append('<li>'+
                  '  <div class="md-list-addon-element">'+
				  '<i class="md-list-addon-icon material-icons">&#xE7E9;</i></div>'+
					'<div class="md-list-content" >'+
					'<span class="md-list-heading">'+item.tblproveedor_nombre +'</span>'+
					 '<span class="uk-text-small uk-text-muted">Nombre del proveedor</span>'+
					'</div>'+
                   '</li>'+
                   '<li>'+
                    '<div class="md-list-addon-element">'+
					'<i class="md-list-addon-icon material-icons">&#xe263;</i></div>'+
					'<div class="md-list-content" >'+
					'<span class="md-list-heading">'+item.tblcarritoproductcotizador_costotienda+'</span>'+
					 '<span class="uk-text-small uk-text-muted">Costo con Servicio en Tienda</span>'+
					'</div>'+
                   '</li>'+
                   '<li>'+
                   ' <div class="md-list-addon-element">'+
				   '<i class="md-list-addon-icon material-icons">&#xe263;</i></div>'+
				'<div class="md-list-content" >'+
				'<span class="md-list-heading">'+item.tblcarritoproductcotizador_costodomicilio+'</span>'+
			   '<span class="uk-text-small uk-text-muted">Costo con Servicio a Domicilio</span>'+
				'</div>'+
                 '  </li>');
         
			 } else{			 
			   $("#espacio_datosevento_cotiProducto").removeClass( "uk-width-large-1-3" );
			  $("#espacio_datosevento_cotiProducto").addClass("uk-width-large-1-2");
			  
			  }
   
 
          if(item.tblcarritoproductcotizador_srcimg==null || item.tblcarritoproductcotizador_srcimg==""){
			  $("#contestada_imgOrdenCotizador").append('<span style="display:none" id="cotizacion_srimg"></span>');
              } else {
				$("#contestada_imgOrdenCotizador").append('<li><img id="tama3" src="../../assests_general/productos/imgcotizadornuevo/'+item.tblcarritoproductcotizador_srcimg+'" alt="" /></li>'+
				'<span style="display:none" id="cotizacion_srimg">'+item.tblcarritoproductcotizador_srcimg+'</span>');
                     }

         $("#contestada_direccion").append('<span class="md-list-heading" id="dirCompletaCotizacion">'+
		 item.tblordencotizador_pais+", "+item.tblordencotizador_ciudad+", "+item.tblordencotizador_direccion+
		 '</span><span class="uk-text-small uk-text-muted">Dirección de Evento</span>');

         $("#cotizacion_botondeubicacion").append('<button id="ye" class="md-btn md-btn-block ye"'+
	          ' onclick="mapaGeo('+2+','+idmapaCotizaciones+')" type="button"  data-uk-modal="{target:'+
	  "'#mapa'"+',modal: false,bgclose:false}"> Ubicacion de Entrega en Mapa</button>'); 
	  
       	  
	  
    });  //fin del each
	
		   }else{ produNormal=false;}
  }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
  //.always(function(){  console.log("always");});
  
} //fin de la funcion




//muestra en tablas las cotizaciones de productos nuevos....................................
function mostrarCotizacionesProductosNuevos(){
	
             var nombreCiudad=$("#selectProductoNuevo").val();
                    idpopupNuevo = "'#productonuevo'";

  $.ajax({
    method: "POST",  
    dataType: "json",  
    url: "../../../controllers/getAlltblcarritoproductnuevcotizadorByCiudad.php",  
    data: {solicitadoBy:"WEB",nombreciudad:nombreCiudad},
	 beforeSend: function(){
				   $('#esperarMostrarCotiProduNuevo').css('display','inline');}	
	})
    .done(function( msg){      
        if(msg.success==1){ 
      $.each(msg.datos, function(i,item){ 
       	   
	  if(msg.datos[i].tblmotivocotizacion_idtblmotivocotizacion=="2"){
			      
      //idtblcarritoproductnuevocotizador=msg.datos[i].idtblcarritoproductnuevcotiza;
      fchentrega= msg.datos[i].tblcarritoproductnuevcotiza_fchentrega ;
      fchentrega = fchentrega.split("-");
      fchentrega = fchentrega[2]+"/"+fchentrega[1]+"/"+fchentrega[0];

      
      $("#body_PNuevo_Contestadas").append(
        '<tr data-uk-modal="{target:'+idpopupNuevo+' ,bgclose:false,modal:false}" '+
		'onclick="detalleCtizacionProductNuevo('+msg.datos[i].tblordencotizador_idtblordencotizador+','+msg.datos[i].idtblcarritoproductnuevcotiza+','+msg.datos[i].idtblproveedor+')">  '+
		'<td class="uk-text-center">'+msg.datos[i].tblordencotizador_idtblordencotizador+'</td>'+ //orden
		'<td class="uk-text-center">'+msg.datos[i].tblproveedor_nombre+'</td>'+ //proveedor
        '<td class="uk-text-center">'+fchentrega+'</td>'+  //fecha
        '<td class="uk-text-center">'+msg.datos[i].tblcarritoproductnuevcotiza_tipodeevento+'</td>'+ //evento
        '</tr>');

      $("#tablaProductoNuevo_Cont").trigger('updateAll', [true]);//actualiza tabla
	  }else{    
		   fchentrega= msg.datos[i].tblcarritoproductnuevcotiza_fchentrega ;
      fchentrega = fchentrega.split("-");
      fchentrega = fchentrega[2]+"/"+fchentrega[1]+"/"+fchentrega[0];

      
      $("#body_PNuevo_noContestadas").append(
        '<tr data-uk-modal="{target:'+idpopupNuevo+' ,bgclose:false,modal:false}" '+
		'onclick="detalleCtizacionProductNuevo('+msg.datos[i].tblordencotizador_idtblordencotizador+','+msg.datos[i].idtblcarritoproductnuevcotiza+','+msg.datos[i].idtblproveedor+')">  '+
		'<td class="uk-text-center">'+msg.datos[i].tblordencotizador_idtblordencotizador+'</td>'+ //orden		
        '<td class="uk-text-center">'+fchentrega+'</td>'+  //fecha
        '<td class="uk-text-center">'+msg.datos[i].tblcarritoproductnuevcotiza_tipodeevento+'</td>'+ //evento
        '</tr>');

      $("#tablaProductoNuevo_NoCont").trigger('updateAll', [true]);//actualiza tabla
		  
		  
	  }
      
    }); //fin del each
		}else{ $("#body_PNuevo_noContestadas").empty();  $("#body_PNuevo_Contestadas").empty(); }

    }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
	.always(function(){ $("#esperarMostrarCotiProduNuevo").hide(); });
	//.always(function(){  console.log("always");  });
}  //fin de la funcion


function detalleCtizacionProductNuevo(idtblordencotizador,idtblcarritoproductnuevocotizador,idtblproveedor){
  
  
   $("#productoNuevo_idordencotizador").empty();   
   $("#productnuevo_tipoevento").empty();
   $("#productnuevo_fchevento").empty();  
   $("#productnuevo_numinvitados").empty(); 
   $("#productnuevo_nomproducto").empty();   
   $("#productnuevo_nombrecliente").empty();
   $("#productnuevo_email").empty();
   $("#productnuevo_telef").empty();
   $("#productnuevo_direccion").empty();
   $("#productnuevo_imgOrdenCotizadorproductnuevo").empty();   
   $("#cotizacionnueva_botondeubicacion2").empty();
  $("#respuestaDeCotizacionNuevoProducto").empty();
   
  $.ajax({
    method: "POST",  
    dataType: "json",  
    url: "../../../controllers/gettblcarritoproductnuevcotiza.php",  
    data: {solicitadoBy:"WEB",idtblcarritoproductnuevcotiza:idtblcarritoproductnuevocotizador}})
      .done(function(msg2){  
        if(msg2.success==1){ re=true; 
      $.each(msg2.datos, function(z,item)
      {  

        fchentrega=  item.tblcarritoproductnuevcotiza_fchentrega;
        fchentrega = fchentrega.split("-");
        fchentrega = fchentrega[2]+"/"+fchentrega[1]+"/"+fchentrega[0];

       $("#productoNuevo_idordencotizador").append('#'+item.tblordencotizador_idtblordencotizador+' Cotización');
       $("#productnuevo_fchevento").append('<span class="md-list-heading">'+fchentrega+'</span><span class="uk-text-small uk-text-muted">Fecha de Evento</span>');
       $("#productnuevo_tipoevento").append('<span class="md-list-heading">'+item.tblcarritoproductnuevcotiza_tipodeevento+'</span><span class="uk-text-small uk-text-muted">Tipo de Evento</span>');
       $("#productnuevo_numinvitados").append('<span class="md-list-heading">'+item.tblcarritoproductnuevcotiza_numpersonas+'</span><span class="uk-text-small uk-text-muted"># Número de Invitados</span>');
       $("#productnuevo_nomproducto").append('<span class="md-list-heading">'+item.tblcarritoproductnuevcotiza_sabores+'</span><span class="uk-text-small uk-text-muted">Sabores</span><span class="md-list-heading">'+item.tblcarritoproductnuevcotiza_comentarios  +'</span><span class="uk-text-small uk-text-muted">Comentarios</span>');
       $("#productnuevo_imgOrdenCotizadorproductnuevo").append('<div><img id="tama" src="../../assests_general/productos/imgcotizadornuevo/'+item.tblcarritoproductnuevcotiza_srcimg +'" alt="" /></div>');
		}); }else{re=false;}
  }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
  //.always(function(){  console.log("always");});

  
  $.ajax({
      method: "POST",  
      dataType: "json",  
      url: "../../../controllers/getTblordencotizador.php",  
      data: {solicitadoBy:"WEB",idtblordencotizador:idtblordencotizador}})
        .done(function(msg3) 
      { 
        
        $.each(msg3.datos, function(x,item2)
        {  
          $("#productnuevo_nombrecliente").append('<span class="md-list-heading">'+item2.tblordencotizador_nombre+'</span><span class="uk-text-small uk-text-muted">Nombre Completo</span>');
          $("#productnuevo_email").append('<span class="md-list-heading">'+item2.tblordencotizador_email+'</span><span class="uk-text-small uk-text-muted">Email</span>');
          $("#productnuevo_telef").append('<span class="md-list-heading">'+item2.tblordencotizador_telefono+'</span><span class="uk-text-small uk-text-muted">Telefono</span>');
          $("#productnuevo_direccion").append('<span class="md-list-heading" id="dirCompletaCotizacionNueva">'+item2.tblordencotizador_pais+", "+item2.tblordencotizador_ciudad+", "+item2.tblordencotizador_direccion+'</span><span class="uk-text-small uk-text-muted">Dirección de Evento</span>');
          $("#cotizacionnueva_botondeubicacion2").append('<button id="ye" class="md-btn md-btn-block ye" type="button"  data-uk-modal="{target:'+"'#mapa'"+',modal: false,bgclose:false}" onclick="mapaGeo('+3+','+idmapaCotizacionesNuevas+')"> Ubicacion de Entrega en Mapa</button>');
        
   
		    });
         }).fail(function( jqXHR, textStatus ) {console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
        //.always(function(){console.log("always");});


    
  $.ajax({    //obtiene datos de contestacion del proveedor
    method: "POST",  
    dataType: "json",  
    url: "../../../controllers/getTblcostocotizacionproductnuevoDatos.php",  
    data: {solicitadoBy:"WEB",idtblcarritoproductnuevocotizador:idtblcarritoproductnuevocotizador,idtblproveedor:idtblproveedor}}) 
    .done(function(msg){ 
        if(msg.success==1){
			contesto=true;
          $.each(msg.datos, function(i,item){
               idtblmotivo  = item.tblmotivocotizacion_idtblmotivocotizacion;
			   
            if(idtblmotivo==2){                 
			   $("#espacio_datosevento").removeClass("uk-width-large-1-2");
			   $("#espacio_datosevento").addClass( "uk-width-large-1-3" );
           $("#respuestaDeCotizacionNuevoProducto").append('<li id="productonuevo_nombreproveedor">'+
                  '  <div class="md-list-addon-element">'+
				  '<i class="md-list-addon-icon material-icons">&#xE7E9;</i></div>'+
					'<div class="md-list-content" id="productonuevo_nombreproveedor">'+
					'<span class="md-list-heading">'+item.tblproveedor_nombre +'</span>'+
					 '<span class="uk-text-small uk-text-muted">Nombre del proveedor</span>'+
					'</div>'+
                   '</li>'+
                   '<li>'+
                    '<div class="md-list-addon-element">'+
					'<i class="md-list-addon-icon material-icons">&#xe263;</i></div>'+
					'<div class="md-list-content" id="productonuevo_costoTienda">'+
					'<span class="md-list-heading">'+item.tblcostocotizacionproductnuevo_costotienda+'</span>'+
					 '<span class="uk-text-small uk-text-muted">Costo con Servicio en Tienda</span>'+
					'</div>'+
                   '</li>'+
                   '<li>'+
                   ' <div class="md-list-addon-element">'+
				   '<i class="md-list-addon-icon material-icons">&#xe263;</i></div>'+
				'<div class="md-list-content" id="productonuevo_costoDomicilio">'+
				'<span class="md-list-heading">'+item.tblcostocotizacionproductnuevo_costodomicilio+'</span>'+
			   '<span class="uk-text-small uk-text-muted">Costo con Servicio a Domicilio</span>'+
				'</div>'+
                 '  </li>');

              } else{ 
			  //id="" class="uk-width-large-1-3">
			   $("#espacio_datosevento").removeClass( "uk-width-large-1-3" );
			   $("#espacio_datosevento").addClass("uk-width-large-1-2");
			  }
          }); //fin del each
        }else{
           contesto=false;
		  
		      }
      }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  }) 
	  //.always(function(){  console.log("always");});

	  
	  } //fin de la funcion

  
  
  //-------------------------------------------------------------------------------------
  
  //funcion para visualizar el mapa 
function mapaGeo(x,id){
 var geocoder = new google.maps.Geocoder();
 var direccionCompleta; 
 /*if(id==1){
  direccionCompleta = document.getElementById("dirCompletaOrden").innerHTML;
 }else  */
	 if (id==2){
  direccionCompleta = document.getElementById("dirCompletaCotizacion").innerHTML;
  }else {direccionCompleta = document.getElementById("dirCompletaCotizacionNueva").innerHTML;}
 
 $("#direccionMapa").empty();
 $("#direccionMapa").append('<span>'+direccionCompleta+'</span>');                    
 geocoder.geocode({ 'address': direccionCompleta}, geocodeResult);

}

var map;
function initMap() {
  map = new google.maps.Map(document.getElementById('gmap'), {
      center: {lat: -34.397, lng: 150.644},
      zoom: 15
      });
}


//funcion necesaria para procesar el resultado del mapa 
function geocodeResult(results, status) {
    // Verificamos el estatus
    if (status == 'OK') {
        // Si hay resultados encontrados, centramos y repintamos el mapa
        // esto para eliminar cualquier pin antes puesto
        var mapOptions = {
          center: results[0].geometry.location,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map($("#gmap").get(0), mapOptions);
        // fitBounds acercar el mapa con el zoom adecuado de acuerdo a lo buscado
        map.fitBounds(results[0].geometry.viewport);
        // Dibujamos un marcador con la ubicación del primer resultado obtenido
        var markerOptions = { position: results[0].geometry.location }
        var marker = new google.maps.Marker(markerOptions);
        marker.setMap(map);
      } else {
        // En caso de no haber resultados o que haya ocurrido un error
        // lanzamos un mensaje con el error
        UIkit.modal.alert('Busqueda Fallida'); 
      }
    }   
   </script> 
   
   <!-- google-->
<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjeDznrCqVmUmnPkqY34STkSMsV2RvFok&callback=initMap" ></script>
 
 
</body>
</html>