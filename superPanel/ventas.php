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
	
 <!--  <link href="http://getuikit.com/docs/css/uikit.docs.min.css" rel="stylesheet" >-->

  
  <link type="text/css" rel="stylesheet" href="../bower_components/jquery-ui/themes/base/jquery-ui.css" />
 
 <!--
  <link type="text/css" rel="stylesheet" href="../bower_components/jquery-ui/themes/smoothness/jquery-ui.css" />
 <link rel="stylesheet" src="../bower_components/jquery-ui/themes/cupertino/jquery-ui.css">
 
 
 -->

</head>
<body class="sidebar_main_open sidebar_main_swipe" >
    <!-- main header -->
  	
	<?php include("../codigo_general/menuPanel.php"); ?>
   
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
                                   
									<li class="uk-active"><a href="#"> Carritos</a></li>
                                    <li><a href="#"> Órdenes </a></li>
                                   <li><a href="#"> Pagos </a></li>
								   <li><a href="#" onclick="resetCamp();"> Reporte </a></li>
                                     
								</ul>
								
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
							
							
							
								<div id="settings_users" class="uk-switcher uk-margin">
								
								
      <!-- ****************************** inicio pag1 *****************************  -->
							   <div> 
							   <div class="md-card">
					               <div class="md-card-content">
									<div>           
                                    <h2>Ventas</h2>
									<span class="uk-text-upper uk-text-small">Órdenes no Concretadas por el Cliente</span> 
                                    </div>	
					
					              
									
							       <div class="uk-grid" data-uk-grid-margin>
                                   <div class="uk-width-medium-1-3">
                                   <span class="uk-text-small">Selecciona una ciudad: </span>
                                   <select id="SelectCiudadesCarritos" name="selectColonia" class="uk-button uk-form-select" data-uk-form-select  onchange="javascript:mostrarCarritosTabla();cantidadCarritos();" >
                                     <option value="" disabled selected readonly >Selecciona...</option> 
                                   </select>                            
                                  </div>
					                </div>  
					
					               <div>
								   <br/>
								   <h4> Para más información, haz clic en el Registro. </h4>
								    <label class="uk-float-right" id="numeroCarritos"> </label> 
									<br/>
									
									<div class="uk-text-center oculto" id="esperarMostrarCarritos" >
                                      <label> Procesando... </label>
				                       <img src="cargando.gif" /> 				 
                                           </div>
								   </div>
								  </div>   
					            </div>

						
			<div class="md-card">
                <div class="md-card-content">
                    <div class="uk-overflow-container uk-margin-bottom">
                       <!-- <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair ts_issues2" id="tablaCarritos" >
                       --> <table class="uk-table uk-table-nowrap table_check uk-table-hover tablesorter tablesorter-altair " id="tablaCarritos">
                           
						  <thead>
                                <tr>
                                    									 
									<th class="uk-text-center">N° de Orden</th>
									<th class="uk-text-center">Fecha de creación</th>
									                                    
                                </tr>
                            </thead>
                            
                            <tbody id="mostrarCarritosBody">
                               <!-- mostrar carritos -->
                            </tbody>
							
                        </table>
						<div id="noHayCarritos"> </div>
		<div id="pagerCarritos" class="pager oculto">
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
            </div> <!-- cierre del mdcard -->
					
					 
		<!-- aqui va el vercarrito-->
			<!-- ver datos PUPOP carrito-->
	<div class="uk-modal" id="vercarrito">
          
		  <div class="uk-modal-dialog uk-modal-dialog-large">
            <button type="button" class="uk-modal-close uk-close uk-close-alt"></button>
			
            <div class="uk-modal-header">
             <h3 class="uk-modal-title"><i class="material-icons" >&#xE878;</i>&nbsp;Detalle de Orden No Concretada</h3>
            </div>
					
            
            <form id="form_detalleOrden" name="form_detalleOrden" class="uk-form-stacked"  >
             <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
              <div class="uk-width-1-1">
               <div class="md-card">
			   
			    <div class="md-card-toolbar">
				<h2 class=" uk-text-large uk-text-middle uk-text-bold">
				<span id="carrito_numdeorden"></span></h2> <!--AJAX PARA NUMERO DE ORDEN-->
                </div>
				
               
                <div class="md-card-content large-padding">
              
                 <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>
                  <div class="uk-width-large-1-3">
                   <h4 class="heading_c uk-margin-small-bottom">Información de Cliente </h4>
                    <div class="uk-form-row">
                     <ul class="md-list md-list-addon" id="datoscliente2">
                      <li>
                       <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE7FD;</i></div>
                       <div class="md-list-content" >
                        <div class="md-list-heading"><span class="md-list-heading" id="carrito_nombrecliente"><!--AJAX PARA NOMBRE--></span>
                        </div><span class="uk-text-small uk-text-muted">Nombre Completo</span></div>
                      </li>
                      <li>
                       <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE158;</i></div>
                       <div class="md-list-content">
                        <div class="md-list-heading">
                        <span class="md-list-heading" id="carrito_emailcliente"><!--AJAX PARA EMAIL--></span>                         
                        </div><span class="uk-text-small uk-text-muted">Email</span></div>
                      </li>
                      <li>
                       <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE0CD;</i></div>
                       <div class="md-list-content">
                        <div class="md-list-heading">
                         <span class="md-list-heading" id="carrito_telcliente"><!--AJAX PARA TELEFONO--></span>                         
                         </div><span class="uk-text-small uk-text-muted">Celular</span></div>
                      </li>
                      <li>
                       
                      </li>
                    </ul>
                   
                  </div>
                </div>				
								
				
                <div class="uk-width-large-1-3">
                 <h4 class="heading_c uk-margin-small-bottom">Datos de Pedido </h4>
                  <ul class="md-list md-list-addon">
                   <li>
                    <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE916;</i></div>
                    <div class="md-list-content">
                    <div class="md-list-heading" id="carrito_fdecompra">
                     
                     </div>	
                     <span class="uk-text-small uk-text-muted">Fecha de Compra</span>
                    </div>
                   </li>
				   
				 				  
                   </ul><br>				   
				    <h5 class="heading_c uk-margin-small-bottom uk-h6">Producto(s)</h5>				  
                    <ul class="md-list md-list-addon" id="carrito_productos">
                     <!--Lista de Productos por AJAX-->
                    </ul>
					
                  
				  
                   <h5 class="heading_c uk-margin-small-bottom uk-h6">Pago</h5>
                    <ul class="md-list md-list-addon">
                     <li>
                      <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE227;</i></div>
                      <div class="md-list-content">
                       <div class="md-list-heading" >
                        <span class="md-list-heading" id="carrito_totalcompra">						
                          <!--AJAX PARA TOTAL DE COMPRA-->
                        </span>
                       </div>
                       <span class="uk-text-small uk-text-muted">Total de Compra</span>
                      </div>
                     </li>
                    </ul>
                   </div>
                   <div class="uk-width-large-1-3">
                    <h4 class="heading_c uk-margin-small-bottom">Datos de Envío </h4>
                     <div class="uk-form-row">
                      <ul class="md-list md-list-addon">
                       <li>
                        <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE614;</i></div>
                        <div class="md-list-content">
                         <div class="md-list-heading" >
                         <span class="md-list-heading" id="carrito_fchagendado">
						 
                          <!--AJAX PARA LA FECHA DE ENTREGA-->
                         </span>
                         </div>
                         <span class="uk-text-small uk-text-muted">Fecha de Entrega</span>
                        </div>
                       </li>
                       <li>
                       <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE858;</i></div>
                       <div class="md-list-content">
                        <div class="md-list-heading">
                         <span class="md-list-heading" id="carrito_horaentrega">
                          <!--AJAX PARA LA HORA DE ENTREGA-->
                         </span>
                        </div>
                        <span class="uk-text-small uk-text-muted">Hora de Entrega</span>
                       </div>
                      </li>
                      <li>
                       <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE558;</i></div>
                       <div class="md-list-content">
                        <div class="md-list-heading">
                         <span class="md-list-heading" id="carrito_tipodeservicio">
						 
                          <!--AJAX PARA LA TIPO DE SERVICIO DE ENTREGA-->
                         </span>
                        </div>
						
						<span class="uk-text-small uk-text-muted">Tipo de Servicio</span>
                       </div>
                      </li>
                     </ul>
					 
					 <ul class="md-list md-list-addon" id="carrito_datosclienteEnvio">
					
					 <!--AJAX PARA DIRECCION DE ENVIO--></ul>
                    
                    </div>
						
						
											
					<!--- ------------- -->
					 <h4 class="heading_c uk-margin-small-bottom"><br/>Información de Quien Recibe </h4>
                    <div class="uk-form-row">
                     <ul class="md-list md-list-addon">
                      <li>
                       <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE87C;</i></div>
                       <div class="md-list-content">
                       <div class="md-list-heading">
                        <span class="md-list-heading" id="carrito_personarecibentrega">
                        </span>                        
                       </div>
                       <span class="uk-text-small uk-text-muted">Nombre Completo</span>
                      </div>
                     </li>
                     <li>
                      <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE0CF;</i></div>
                      <div class="md-list-content">
                       <div class="md-list-heading">
                        <span class="md-list-heading" id="carrito_telefonorecibeentrega">
                       
                        </span>          
                       </div>
                       <span class="uk-text-small uk-text-muted">Celular</span>
                      </div>
                     </li>
                    </ul>
                   </div>
					
					<!-- ......... --> 				   
                  </div>
                 </div>
                </div>
               </div>
              </div>
             </div>
             </form>
            
            </div>
     
	 </div> <!-- fin pupop -->

					 <!-- ....  cierre de ver ordenes no concretadas... -->		 
					
			<!-- termina ver carrito -->		 
                                    </div> <!-- fin pag1 -->
									
									
									
    <!-- **********************************  inicio pag 2 ********************************* -->
													
				              <div> 
							   <div class="md-card">
					               <div class="md-card-content">
									<div>    <!-- id="page_heading" -->         
                                    <h2>Ventas</h2>
									<span class="uk-text-upper uk-text-small">Órdenes</span> 
                                  </div>	
					
					                
									
									<div class="uk-grid" data-uk-grid-margin>
                                   <div class="uk-width-medium-1-3">
                                     <span class="uk-text-small">Selecciona una ciudad: </span>
                                   <select id="SelectCiudadesOrdenes" name="SelectCiudadesOrdenes" class="uk-button uk-form-select" data-uk-form-select  onchange="javascript:mostrarDatos_OrdenesPorEntregar();cantidadOrdenes();" >
                                     <option value="" disabled selected readonly >Selecciona...</option>  
                                   </select>                        
                                  </div>
					                </div>
									<br/><br/>
					               <div>								  
								   <h4> Para más información de la orden, haz clic en el Registro. </h4>
								    
									<label class="uk-float-right" id="numeroOrdenes"> </label> 
									<br/>
									<div class="uk-text-center oculto" id="esperarMostrarOrdenes" >
                                      <label> Procesando... </label>
				                       <img src="cargando.gif" /> 				 
                                           </div>
								   </div>
								   
								   
								   
								   
								  </div> 
					            </div>
								
					<br/>				
				<div class="md-card">
                <div class="md-card-content">
                    <div class="uk-overflow-container uk-margin-bottom">
					   <h3> Órdenes por entregar </h3>
                      <!--  <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair ts_issues2" id="tablaOrdenesPorEntregar">
                           -->
                          <table class="uk-table uk-table-nowrap table_check uk-table-hover tablesorter tablesorter-altair " id="tablaOrdenesPorEntregar">
               
						   <thead>
                                <tr>
                                    <!--<th class="uk-text-center">N°</th> -->
									
                                     <th class="uk-text-center">N° de orden</th>
									<th class="uk-text-center">Proveedor </th>
									<th class="uk-text-center">Fecha de entrega</th> 
									
									
                                    
                                </tr>
                            </thead>
                            
                            <tbody id="bodyTabla_OrdenesEntregar">
                                                 
                               
                            </tbody>
                        </table>
						<div id="noHayOrdenes"> </div>
		<div id="pagerOrdenesPorEntregar" class="pager oculto">
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
			
			 <!-- ..............  ordenes pendientes -->
			 <br/>
			 <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-overflow-container uk-margin-bottom">
					   <h3> Órdenes pendientes de entrega por caso de incidentes </h3>
                      <!--  <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair ts_issues2" id="tablaOrdenesEntregarPendientes">
                          -->
                                <table class="uk-table uk-table-nowrap table_check uk-table-hover tablesorter tablesorter-altair " id="tablaOrdenesEntregarPendientes">
               
						  <thead>
                                <tr>
                                    <!--<th class="uk-text-center">N°</th> -->
									
                                    <th class="uk-text-center">N° de orden</th>
									<th class="uk-text-center">Proveedor </th>
									<th class="uk-text-center">Fecha de entrega</th>
									
									
                                    
                                </tr>
                            </thead>
                            
                            <tbody id="bodyTabla_OrdenesEntregarPendientes"> 

                               
                            </tbody>
                        </table>
						<div id="noHayOrdenesPendientes"> </div>
			<div id="pagerOrdenesPendientes" class="pager oculto">
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
			
			
			
			 
			 <!-- ..........Historial de ordenes.......... -->
				<div class="md-card">
                <div class="md-card-content">
                    <div class="uk-overflow-container uk-margin-bottom">
					   <h3> Órdenes entregadas (Historial) </h3>
                      <!-- <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair ts_issues2" id="tabla_OrdenesHistorial">
                          -->
                          <table class="uk-table uk-table-nowrap table_check uk-table-hover tablesorter tablesorter-altair " id="tabla_OrdenesHistorial">
               
						  <thead>
                                <tr>
                                    <!--<th class="uk-text-center">N°</th> -->
									
                                    <th class="uk-text-center">N° de orden</th>	
									<th class="uk-text-center">Proveedor </th>
									<th class="uk-text-center">Total de compra</th>
									<th class="uk-text-center">Fecha para depósito</th>
									<th class="uk-text-center">Estatus del depósito</th> 									
                                    
                                </tr>
                            </thead>
                           
                            <tbody id="bodyTabla_OrdenesHistorial"> 
                                  
                                          
                               
                            </tbody>
                        </table>
						<div id="noHayOrdenesEnHistorial"> </div>
			<div id="pagerOrdenesHistorial" class="pager oculto">
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
					
				<!-- ............... VER ORDENES POR ENTREGAR......... -->	 
					  
	<div class="uk-modal" id="porentregar">
           <div class="uk-modal-dialog uk-modal-dialog-large">
            <button type="button" class="uk-modal-close uk-close uk-close-alt"></button>
			
            <div class="uk-modal-header">
             <h3 class="uk-modal-title"><i class="material-icons" >&#xE878;</i>&nbsp;Detalle de Orden </h3>
            </div>
			
			<div class="uk-grid">
             <div class="uk-width-large-1-2" id="marcarorden"></div>
             <div  class="uk-width-large-1-2" id="botondeubicacion">
			 <!--Se agregara el boton, para visualizar el mapa, desde AJAX si el servicio es a domicilio -->
             </div>
            </div>
			
            
            <form id="form_detalleOrden" name="form_detalleOrden" class="uk-form-stacked"  >
             <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
              <div class="uk-width-1-1">
               <div class="md-card">
               
			   <div class="md-card-toolbar">
				<h2 class=" uk-text-large uk-text-middle uk-text-bold">
				<span id="ordenPorEntregar_numdeorden"></span></h2> <!--AJAX PARA NUMERO DE ORDEN-->
                </div>
				
                <div class="md-card-content large-padding">
                <!-- <div class="uk-grid "></div> -->
                 <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>
                  <div class="uk-width-large-1-3">
                   <h4 class="heading_c uk-margin-small-bottom">Información de Cliente </h4>
                    <div class="uk-form-row">
                     <ul class="md-list md-list-addon" id="datoscliente">
                      <li>
                       <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE7FD;</i></div>
                       <div class="md-list-content" >
                        <div class="md-list-heading"><span class="md-list-heading" id="ordenPorEntregar_nombrecliente"><!--AJAX PARA NOMBRE--></span>
                        </div><span class="uk-text-small uk-text-muted">Nombre Completo</span></div>
					
                      </li>
                      <li>
                       <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE158;</i></div>
                       <div class="md-list-content">
                        <div class="md-list-heading">
                        <span class="md-list-heading" id="ordenPorEntregar_emailcliente"><!--AJAX PARA EMAIL--></span>                         
                        </div><span class="uk-text-small uk-text-muted">Email</span></div>
                      </li>
                      <li>
                       <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE0CD;</i></div>
                       <div class="md-list-content">
                        <div class="md-list-heading">
                         <span class="md-list-heading" id="ordenPorEntregar_telcliente"><!--AJAX PARA TELEFONO--></span>                         
                         </div><span class="uk-text-small uk-text-muted">Celular</span></div>
                      </li>
                      <li>
                       <div class="md-list-content" >
                        <span class="md-color-red-A700 uk-text-bold" id="ordenPorEntregar_factura">
                        <!--AJAX PARA FACTURACION-->                         
                        </span>
                       </div>
                      </li>
                    </ul>
                    <ul  class="md-list md-list-addon" id="ordenPorEntregar_datosfactura">
                      <!--SI SE REQUIERE FACTURA SE MUESTRAN LOS DATOS RESTANTE CON AJAX PARA FACTURACION-->
                    </ul>
                  </div>
                </div>
                <div class="uk-width-large-1-3">
                 <h4 class="heading_c uk-margin-small-bottom">Datos de Pedido </h4>
                  <ul class="md-list md-list-addon">
                   <li>
                    <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE916;</i></div>
                    <div class="md-list-content">
                     <div class="md-list-heading" id="ordenPorEntregar_fdecompra">
                     
                     </div>	
                				 
                     <span class="uk-text-small uk-text-muted">Fecha de Compra</span>
                    </div>
                   </li>
				    
				   	<li>			 
				   <div class="md-list-content">
				   <span class="md-list-heading" id="ordenPorEntregar_nombreProveedor">
				     </span> </div>
				   <span class="uk-text-small uk-text-muted">Nombre del Proveedor</span>
				  </li> 
				
				
				
                   </ul><br>
				   <h5 class="heading_c uk-margin-small-bottom uk-h6">Producto(s)</h5>
				  
                    <ul class="md-list md-list-addon" id="ordenPorEntregar_productos">
                     <!--Lista de Productos por AJAX-->
                    </ul>
					
                  
                   <h5 class="heading_c uk-margin-small-bottom uk-h6">Pago</h5>
                    <ul class="md-list md-list-addon">
                     <li>
                      <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE227;</i></div>
                      <div class="md-list-content">
                       <div class="md-list-heading" >
                        <span class="md-list-heading" id="ordenPorEntregar_totalcompra">
                          <!--AJAX PARA TOTAL DE COMPRA-->
                        </span>
                       </div>
                       <span class="uk-text-small uk-text-muted">Total de Compra</span>
                      </div>
                     </li>
                    </ul>
                   </div>
				   
                   <div class="uk-width-large-1-3">
                    <h4 class="heading_c uk-margin-small-bottom">Datos de Envio </h4>
                     <div class="uk-form-row">
                      <ul class="md-list md-list-addon">
                       <li>
                        <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE614;</i></div>
                        <div class="md-list-content">
                         <div class="md-list-heading" >
                         <span class="md-list-heading" id="ordenPorEntregar_fechaagendada">
                          
                         </span>
                         </div>
                         <span class="uk-text-small uk-text-muted">Fecha de Entrega</span>
                        </div>
                       </li>
                       <li>
                       <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE858;</i></div>
                       <div class="md-list-content">
                        <div class="md-list-heading">
                         <span class="md-list-heading" id="ordenPorEntregar_horaentrega">
                         
                         </span>
                        </div>
                        <span class="uk-text-small uk-text-muted">Hora de Entrega</span>
                       </div>
                      </li>
                      <li>
                       <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE558;</i></div>
                       <div class="md-list-content">
                        <div class="md-list-heading">
                         <span class="md-list-heading" id="ordenPorEntregar_tipodeservicio">
                          
                         </span>
                        </div>
                        <span class="uk-text-small uk-text-muted">Tipo de Servicio</span>
                       </div>
                      </li>
                     </ul>
					 
					 <ul class="md-list md-list-addon" id="ordenPorEntregar_datoscliente_envio">
					 <!--AJAX PARA DIRECCION DE ENVIO--></ul>
                    
                    </div>
					
                   <h4 class="heading_c uk-margin-small-bottom"><br/>Información de Quien Recibe </h4>
                    <div class="uk-form-row">
                     <ul class="md-list md-list-addon">
                      <li>
                       <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE87C;</i></div>
                       <div class="md-list-content">
                       <div class="md-list-heading">
                        <span class="md-list-heading" id="ordenPorEntregar_personarecibentrega">
                        </span>                        
                       </div>
                       <span class="uk-text-small uk-text-muted">Nombre Completo</span>
                      </div>
                     </li>
                     <li>
                      <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE0CF;</i></div>
                      <div class="md-list-content">
                       <div class="md-list-heading">
                        <span class="md-list-heading" id="ordenPorEntregar_telefonorecibeentrega">
                       
                        </span>          
                       </div>
                       <span class="uk-text-small uk-text-muted">Celular</span>
                      </div>
                     </li>
                    </ul>
                   </div>
				   
				   
				   
                  </div>
                 </div>
                </div>
               </div>
              </div>
             </div>
             </form>
             <form class="uk-form-stacked" id="entregaEvidencia"></form>
			 <form class="uk-form-stacked" id="entregaEvidenciaHistorial"></form>
            </div>
           </div>
	<!-- cierre  -->
	
	 
	  
	  <!-- ........................................ -->
	  
	  <!-- ........................................  -->
	  
	  
	  <!-- ........................................ -->

                                    </div>  <!-- fin pag 2 -->
									
									
		<!-- ****************************** inicio pag3 *****************************  -->
							   <div> 
							   <div class="md-card">
					               <div class="md-card-content">
									<div>           
                                    <h2>Pagos</h2>
									<!--<span class="uk-text-upper uk-text-small">Ordes no Concretadas por el Cliente</span> -->
                                    </div>	
									
									<div class="uk-grid" data-uk-grid-margin>
                                   <div class="uk-width-medium-1-3">
								   
                                   <span class="uk-text-small">Selecciona una ciudad: </span>
                                   <select id="SelectCiudadesPagos" name="SelectCiudadesPagos" class="uk-button uk-form-select" data-uk-form-select  onchange="javascript:mostrarDatos_Pagos();cantidadOrdenesposPagar();" >
                                   <option value="" disabled selected readonly >Selecciona...</option>  
                                   </select>   
								   
                                  </div>
					                </div>
					                 <br/>
					                <label class="uk-float-right" id="numeroPagar"> </label> 
									<br/>
									<div class="uk-text-center oculto" id="esperarMostrarPagos" >
                                      <label> Procesando... </label>
				                       <img src="cargando.gif" /> 				 
                                           </div>
								  </div>   
					            </div>

						
						
					<!-- ..........Ordenes pendientes de pago.......... -->
				<div class="md-card">
                <div class="md-card-content">
                    <div class="uk-overflow-container uk-margin-bottom">
					   <h3> Órdenes pendientes de pago </h3>
                       <!-- <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair ts_issues2" id="tabla_PagosPendientes">
                           -->
                          <table class="uk-table uk-table-nowrap table_check uk-table-hover tablesorter tablesorter-altair " id="tabla_PagosPendientes">
               
						   <thead>
                                <tr>
                                    <!--<th class="uk-text-center">N°</th> -->
									
                                    <th class="uk-text-center">N° de orden</th>
									<th class="uk-text-center">Proveedor</th>								  
									<!--<th class="uk-text-center">Cantidad de Productos</th> -->
									<th class="uk-text-center">Total a depositar</th>
									<!--<th class="uk-text-center">Total de compra</th> -->
									<th class="uk-text-center">Fecha de corte</th>
									
									
									
                                    
                                </tr>
                            </thead>
                            
                            <tbody id="bodyTabla_PendientesPago">                                          
                               
                            </tbody>
							
                        </table>
			<div id="pagerPagoPend" class="pager oculto">
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
					
					 
					<!-- ..........  ORDENES YA DEPOSITADAS.... -->
									
					<div class="md-card">
                <div class="md-card-content">
                    <div class="uk-overflow-container uk-margin-bottom">
					   <h3> Historial de pagos </h3>
                        <!--<table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair ts_issues2" id="tabla_PagosHistorial">
                            -->
							<table class="uk-table uk-table-nowrap table_check uk-table-hover tablesorter tablesorter-altair" id="tabla_PagosHistorial">
                               <thead>
                                <tr>						 
									<th class="uk-text-center">N° de Orden</th>
									<th class="uk-text-center">Proveedor</th>								  
									<th class="uk-text-center">Total de depósito</th>
									<th class="uk-text-center">Fecha de corte</th>								
                                    
                                </tr>
                            </thead>
                            
                            <tbody id="bodyTabla_HistorialPagos">                                   
                               
                            </tbody>
                        </table>
			<div id="pagerPagoHist" class="pager oculto">
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
            </div> <!-- cierre del mdcard -->
					
					
                                         			 
				
	  
	  <!-- ........................................ -->	 
					
					 
                                    </div> <!-- fin pag3 -->	
   
		<!-- ****************************** inicio pag4 *****************************  -->
							   <div> 
							   <div class="md-card">
					               <div class="md-card-content">
									<div>           
                                    <h2>Generar Reportes</h2>
									 </div>	
								  </div>   
					            </div>

						
						
					
				<!-- ---------------- <div class="uk-width-medium-1-1 uk-container-center"> --------------- -->
			   <br/>
			   <div id="paraInicial">				
               <div class="md-card"> 
			   <div class="md-card-content"> 
			   <div class="uk-grid uk-grid-divider" data-uk-grid-margin>
			   <div class="uk-width-medium-1-1 uk-container-center">
			   <span class="uk-text-medium">Generar Reporte de ventas:</span>                    
			
			  <form class="uk-form-stacked" id="formuEnvRepo" method="post" action="reporteVentas.php" > 
                     <div class="uk-grid" data-uk-grid-margin>
							
							 
                        <div class="uk-width-medium-1-4"></br></br>						   							 
                             <select id="selectCiudadG" name="selectCiudadG" class="uk-button uk-form-select" data-uk-form-select >
                             </select>
				         
                        </div>
					
                                <div class="uk-width-medium-1-4"></br>	
								   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								   <label>Fecha Inicial</label>
                                    <div class="uk-input-group"> 
                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                     
									 <input placeholder="dia/mes/año" class="calendarioReporte md-input" type="text" id="fecha_inicialRango" name="fecha_inicialRango"  /> 
                                     
									 
                                   
									</div> 
                                </div>
                                <div class="uk-width-medium-1-4"></br>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								   								
								<label>Fecha Final </label>
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                       <input placeholder="dia/mes/año" class="calendarioReporte md-input" type="text" id="fecha_finalRango" name="fecha_finalRango"> 
                                    </div>
                                </div>
								
								<div class="uk-width-medium-1-4"> </br></br>  
								<button type="submit" class="md-btn md-btn-flat ye" id="generar100" name="generar100" onclick="paraPdf(event);">Generar PDF</button>
                             </div>  <!--<input type="hidden" name="generar_factura" value="true">paraPdf(evt) --> 
                            </div> 
							     </form>
			   
			   </div> 
			 
			   </div>
			   </div></div>   <!-- fin del pdf --> 
			   
			   
			    <div class="md-card"> 
			   <div class="md-card-content"> 
			   <div class="uk-grid uk-grid-divider" data-uk-grid-margin>
			   <div class="uk-width-medium-1-1 uk-container-center">
			   <span class="uk-text-medium">Generar Reporte de Ordenes:</span>                    
			
			  <form class="uk-form-stacked" id="formuEnvRepoD1" method="post" action="reporte.php" > 
                     <div class="uk-grid" data-uk-grid-margin>
							
							 
                        <div class="uk-width-medium-1-4"></br></br>						   							 
                             <select id="selectCiudadGD1" name="selectCiudadGD1" class="uk-button uk-form-select" data-uk-form-select >
                             </select>
				         
                        </div>
					
                                <div class="uk-width-medium-1-4"></br>	
								   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								   <label>Fecha Inicial</label>
                                    <div class="uk-input-group"> 
                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                     
									 <input placeholder="dia/mes/año" class="calendarioReporte md-input" type="text" id="fecha_inicialRangoD1" name="fecha_inicialRangoD1"  /> 
                                     
									 
                                   
									</div> 
                                </div>
                                <div class="uk-width-medium-1-4"></br>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								   								
								<label>Fecha Final </label>
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                       <input placeholder="dia/mes/año" class="calendarioReporte md-input" type="text" id="fecha_finalRangoD1" name="fecha_finalRangoD1"> 
                                    </div>
                                </div>
								
								<div class="uk-width-medium-1-4"> </br></br>  
								<button type="submit" class="md-btn md-btn-flat ye" id="generar101" name="generar101" onclick="paraExcel1(event);">Generar Excel</button>
                             </div>  <!--<input type="hidden" name="generar_factura" value="true">-->
                            </div> 
							     </form>
			   
			   </div> 
			 
			   </div>
			   </div></div>   <!-- fin del excel doc1 -->
			   
			    <div class="md-card"> 
			   <div class="md-card-content"> 
			   <div class="uk-grid uk-grid-divider" data-uk-grid-margin>
			   <div class="uk-width-medium-1-1 uk-container-center">
			   <span class="uk-text-medium">Generar Reporte de productos vendidos:</span>                    
			
			  <form class="uk-form-stacked" id="formuEnvRepoD2" method="post" action="reporteProductos.php" > 
                     <div class="uk-grid" data-uk-grid-margin>
							
							 
                        <div class="uk-width-medium-1-4"></br></br>						   							 
                             <select id="selectCiudadGD2" name="selectCiudadGD2" class="uk-button uk-form-select" data-uk-form-select >
                             </select>
				         
                        </div>
					
                                <div class="uk-width-medium-1-4"></br>	
								   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								   <label>Fecha Inicial</label>
                                    <div class="uk-input-group"> 
                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                     
									 <input placeholder="dia/mes/año" class="calendarioReporte md-input" type="text" id="fecha_inicialRangoD2" name="fecha_inicialRangoD2"  /> 
                                     
									 
                                   
									</div> 
                                </div>
                                <div class="uk-width-medium-1-4"></br>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								   								
								<label>Fecha Final </label>
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                       <input placeholder="dia/mes/año" class="calendarioReporte md-input" type="text" id="fecha_finalRangoD2" name="fecha_finalRangoD2"> 
                                    </div>
                                </div>
								
								<div class="uk-width-medium-1-4"> </br></br>  
								<button type="submit" class="md-btn md-btn-flat ye" id="generar102" name="generar102" onclick="paraExcel2(event);">Generar Excel</button>
                             </div>  <!--<input type="hidden" name="generar_factura" value="true">-->  
                            </div> 
							     </form>
			   
			   </div> 
			 
			   </div>
			   </div></div>   <!-- fin del excel doc2 -->


			   
               </div>
				
					
	 
	  <!-- ........................................ -->
	  
                                    </div> <!-- fin pag4 -->							
									
                                
	<div class="uk-modal" id="mapa"><!--Mapa-->
     <div class="uk-modal-dialog">
      <button type="button" class="uk-modal-close uk-close uk-close-alt"></button>
       <div class="uk-modal-header">
        <h4 class="md-card-toolbar-heading-text" id="direccionMapa"></h4>
       </div>  
       <div class="md-card"><div id="gmap" class="gmap" style="width:100%;height:400px;"></div></div>
     </div>
    </div><!--end Mapa-->					
              <!-- ....... -->
				</div>								
                </div>
            </div>
                 
	
	
	
	
	 <!-- </div>
	</div>  -->
	<!-- ::::::::::::::::::::::::::::::::::::::::::::::::::::::::  -->
   

    <?php include('../codigo_general/script_commonPB.php'); ?>  <!-- llamada para ejecutar el jquery -->
    <script src="../assets/js/pages/forms_advanced2.js"></script>
     <!--page specific plugins -->
	
	  <script src="../bower_components/jquery-ui/jquery-ui.js"></script> 
	  <script src="../bower_components/jquery-ui/jquery-ui.min.js"></script> 
   
	<script src="../bower_components/tablesorter/dist/js/jquery.tablesorter.js"></script>
    <script src="../bower_components/tablesorter/dist/js/jquery.tablesorter.min.js"></script>
    <script src="../bower_components/tablesorter/dist/js/jquery.tablesorter.widgets.min.js"></script>
    <script src="../bower_components/tablesorter/dist/js/widgets/widget-alignChar.min.js"></script>
    <script src="../bower_components/tablesorter/dist/js/extras/jquery.tablesorter.pager.min.js"></script>
	
	<script src="../bower_components/tablesorter/dist/js/widgets/widget-columnSelector.min.js"></script>
    <script src="../bower_components/tablesorter/dist/js/widgets/widget-print.min.js"></script>
    <!--  issues list functions 
   <script src="../assets/js/pages/pages_issues.min.js"></script>  
   
    
  <!--  kendoui functions -->
  <script src="../bower_components/ion.rangeslider/js/ion.rangeSlider.min.js"></script>
	
 
    <script src="../bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.js"></script>
  
   
	<script src="../assets/js/kendoui_custom.min.js"></script> 
  <!--  kendoui functions -->
  <script src="../assets/js/pages/kendoui.min.js"></script>
  <!--page_contact_list-->
  <script src="../assets/js/pages/page_contact_list.min.js"></script>
    

	<!-- archivos JS-->
  <script type="text/javascript" >
    
	 
	  
	$( window ).ready(function()
    {
	
             $(".calendarioReporte").datepicker( {dayNamesMin: [ "Dom","Lun","Mar","Mie","Jue","Vie","Sáb" ],
                                     monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo",
                                         "Junio", "Julio", "Agosto", "Septiembre", "Octubre",
                                         "Noviembre", "Diciembre" ],
                                     firstDay: 1,
                                     dateFormat: "dd/mm/yy"
	                             });
								 
             $(".calendarioReporte").datepicker( { dayNamesMin: [ "Dom","Lun","Mar","Mie","Jue","Vie","Sáb" ],
                                     monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo",
                                         "Junio", "Julio", "Agosto", "Septiembre", "Octubre",
                                         "Noviembre", "Diciembre" ],
                                     firstDay: 1,
                                     dateFormat: "dd/mm/yy"
                });

		 mostrarCiudadesCarrito();  //se cargar automaticamente cuando carge la pagina
         mostrarCiudadesOrdenes();	
         mostrarCiudadesPagos();
         mostrarCiudadesU();
		 
		 
      });  
	   /* Create by: Reyna Maria Martinez Vazquez*/
	  
     
	  function resetCamp(){
		   $('#formuEnvRepo')[0].reset(); 
		   $('#formuEnvRepoD1')[0].reset(); 
		   $('#formuEnvRepoD2')[0].reset(); 
	  }
	  
	  
	   
	   function paraPdf(evt) { 
   
	var ciudad= document.getElementById("selectCiudadG").value;
   var feInicial= document.getElementById("fecha_inicialRango").value;
   var feFinal = document.getElementById("fecha_finalRango").value;
  
	
	  var formato= /^[0-9][0-9]\/[0-9][0-9]\/[0-9][0-9][0-9][0-9]$/;
	          	
   if(ciudad ==""){
    UIkit.modal.alert("Por favor, seleccione una Ciudad.");
   evt.preventDefault();
    return false;
     }
   
   if(feInicial == ""){
    UIkit.modal.alert("Por favor, complete el campo Fecha Inicial.");
   evt.preventDefault();
    return false;
     }
  
   if(feFinal =="") {
    UIkit.modal.alert("Por favor, complete el campo Fecha Final.");
	evt.preventDefault();
    return false;
     } 
	
 
 //.............validacion.............................................
	
    if(!formato.test(feInicial))
    { 
     UIkit.modal.alert("Fecha Inicial es incorrecto, ejemplo dia/mes/año."); 
    evt.preventDefault();}
	
  if(!formato.test(feFinal))
    { 
     UIkit.modal.alert("Fecha Final es incorrecto, ejemplo dia/mes/año."); 
    evt.preventDefault();
              }
      
    
	
}  //fin para pdf



function paraExcel1(evt) { 
   
	var ciudad= document.getElementById("selectCiudadGD1").value;
   var feInicial= document.getElementById("fecha_inicialRangoD1").value;
   var feFinal = document.getElementById("fecha_finalRangoD1").value;
  
	
	  var formato= /^[0-9][0-9]\/[0-9][0-9]\/[0-9][0-9][0-9][0-9]$/;
	          	
   if(ciudad ==""){
    UIkit.modal.alert("Por favor, seleccione una Ciudad.");
   evt.preventDefault();
    return false;
     }
   
   if(feInicial == ""){
    UIkit.modal.alert("Por favor, complete el campo Fecha Inicial.");
   evt.preventDefault();
    return false;
     }
  
   if(feFinal =="") {
    UIkit.modal.alert("Por favor, complete el campo Fecha Final.");
	evt.preventDefault();
    return false;
     } 
	
 
 //.............validacion.............................................
	
    if(!formato.test(feInicial))
    { 
     UIkit.modal.alert("Fecha Inicial es incorrecto, ejemplo dia/mes/año."); 
    evt.preventDefault();}
	
  if(!formato.test(feFinal))
    { 
     UIkit.modal.alert("Fecha Final es incorrecto, ejemplo dia/mes/año."); 
    evt.preventDefault();
              }
      
    /*if(ciudad !="" && feInicial != "" && feFinal !="" && formato.test(feInicial) && formato.test(feFinal))
	{    
		$("#cargarVerReporte").removeClass("oculto"); 
	}*/
	
}  //fin para excel1------------------------------------------------------

function paraExcel2(evt) { 
   
	var ciudad= document.getElementById("selectCiudadGD2").value;
   var feInicial= document.getElementById("fecha_inicialRangoD2").value;
   var feFinal = document.getElementById("fecha_finalRangoD2").value;
  
	
	  var formato= /^[0-9][0-9]\/[0-9][0-9]\/[0-9][0-9][0-9][0-9]$/;
	          	
   if(ciudad ==""){
    UIkit.modal.alert("Por favor, seleccione una Ciudad.");
   evt.preventDefault();
    return false;
     }
   
   if(feInicial == ""){
    UIkit.modal.alert("Por favor, complete el campo Fecha Inicial.");
   evt.preventDefault();
    return false;
     }
  
   if(feFinal =="") {
    UIkit.modal.alert("Por favor, complete el campo Fecha Final.");
	evt.preventDefault();
    return false;
     } 
	
 
 //.............validacion.............................................
	
    if(!formato.test(feInicial))
    { 
     UIkit.modal.alert("Fecha Inicial es incorrecto, ejemplo dia/mes/año."); 
    evt.preventDefault();}
	
  if(!formato.test(feFinal))
    { 
     UIkit.modal.alert("Fecha Final es incorrecto, ejemplo dia/mes/año."); 
    evt.preventDefault();
              }
      
    
	
}  //fin para excel 2--------------------------------
	   
	   function mostrarCiudadesU(){ //muestra las ciudades activas 	
      
     $.ajax({     
     method: "POST",dataType: "json",url: "../../../controllers/getAllTblciudadAct.php", 
	 data: {solicitadoBy:"WEB"}})
            .done(function(mostC){
				//console.log(mcol); 
				 
				$("#selectCiudadG").append('<option value="" disabled selected readonly >Selecciona...</option>'); //pdf
				$("#selectCiudadGD1").append('<option value="" disabled selected readonly >Selecciona...</option>'); //excel 1
				$("#selectCiudadGD2").append('<option value="" disabled selected readonly >Selecciona...</option>'); //excel 2
				
                $.each(mostC.datos, function(i,item)				
				 {	  
				 idtblciudad=item.idtblciudad;	
				 
				 //muestra ciudades en el encabezado de la interfaz principal
                 $("#selectCiudadG").append('<option value="' +item.tblciudad_nombre+'">' + item.tblciudad_nombre + '</option>');
                  $("#selectCiudadGD1").append('<option value="' +item.tblciudad_nombre+'">' + item.tblciudad_nombre + '</option>');
				  $("#selectCiudadGD2").append('<option value="' +item.tblciudad_nombre+'">' + item.tblciudad_nombre + '</option>');
				 				 
				 });	
					
                                 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      //.always(function(){  console.log("always");});
   } 
	   
	   //.-----mostrar cantidad de ordenes en base a la ciudad en la que esta----------------------------------------------------------------
	  function cantidadOrdenes(){
		  
	   var idtblciudad=$("#SelectCiudadesOrdenes").val(); 
	   //se recibe el id del select de la ciudad que selecciono el usuario en la pantalla principal
	     
		                
     	 
     $.ajax({     
       method: "POST",dataType: "json",
	   url: "../../../controllers/getCountAllOrdenesByTblCiudad.php", 
	   data: {solicitadoBy:"WEB",nameCiudad:idtblciudad}})
            .done(function(mc){				   
                     if(parseInt(mc.success)==1){ 
			$("#numeroOrdenes").text('Ordenes en esta ciudad: '+mc.datos);		
				 
			 }  else{ $("#numeroOrdenes").text("No hay ordenes"); } 					        
						//nombre del span que mostrara el numero de ordenes
				 
    }) .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      
   } 
   
   //.-----mostrar cantidad de carritos olvidados en base a la ciudad en la que esta----------------------------------------------------------------
	  function cantidadCarritos(){
		  
	   var idtblciudad=$("#SelectCiudadesCarritos").val(); 
	   //se recibe el id del select de la ciudad que selecciono el usuario en la pantalla principal
	     
		                
      
     $.ajax({     
       method: "POST",dataType: "json",
	   url: "../../../controllers/getCountAllOrdenesCarritosByCiudad.php", 
	   data: {solicitadoBy:"WEB",nameCiudad:idtblciudad}})
            .done(function(mc){				   
                     if(parseInt(mc.success)==1){ 
			$("#numeroCarritos").text('Ordenes no concluidas en esta ciudad: '+mc.datos);		
				 
			 }  else{ $("#numeroCarritos").text("No hay ordenes no concluidas."); } 					        
						//nombre del span que mostrara el numero de ordenes olvidadas
				 
    }) .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      
   } 
   
   //.-----mostrar cantidad de ordenes por pagar en base a la ciudad en la que esta----------------------------------------------------------------
	  function cantidadOrdenesposPagar(){
		  
	   var idtblciudad=$("#SelectCiudadesPagos").val(); 
	   //se recibe el id del select de la ciudad que selecciono el usuario en la pantalla principal
	     
		                
    
     $.ajax({     
       method: "POST",dataType: "json",
	   url: "../../../controllers/getCountAllOrdenesPendientesByCiudad.php", 
	   data: {solicitadoBy:"WEB",nameCiudad:idtblciudad}})
            .done(function(mc){				   
                     if(parseInt(mc.success)==1){ 
			$("#numeroPagar").text('Ordenes pendientes en esta ciudad: '+mc.datos);		
				 
			 }  else{ $("#numeroPagar").text("No hay ordenes pendientes por pagar"); } 					        
					//nombre del span que mostrara el numero de ordenes por pagar
				 
    }) .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      
   } 
		 
		 
	 //Variables para saber que tabla hace referencia en Ordenes 
var tabla1_Ordenes=1;
var tabla2_OrdenesPendiente=2;
var tabla3_OrdenesHistorial=3; 

	  
	 function inicializarTablas(){	 
	
	  $("#tablaCarritos").tablesorter({
    sortList: [[2,0]], //ordenar por de inicio esa columna 
    headers: {1: { sorter: "shortDate", dateFormat: "ddmmyyyy" } }, //cambio de formato de fecha 
    widgets: ['filter']//activar el widget de filtro de busqueda
      });
	  
	 }
	 
	  function inicializarPagCarrio(){  		
 		$("#tablaCarritos")
		.tablesorterPager({container: $("#pagerCarritos")})  ;
		 }
		 
		 
		 
	  //-----tablas pestaña ordenes-----
	  function inicializarTablas_ordenes(){
	  
	  $("#tablaOrdenesPorEntregar").tablesorter({ 
    sortList: [[3,0]], //ordenar por de inicio esa columna 
    headers: {1: { sorter: "shortDate", dateFormat: "ddmmyyyy" } }, //cambio de formato de fecha 
    widgets: ['filter']//activar el widget de filtro de busqueda
     });
  
  
    $("#tablaOrdenesEntregarPendientes").tablesorter({
    sortList: [[3,0]], //ordenar por de inicio esa columna 
    headers: {1: { sorter: "shortDate", dateFormat: "ddmmyyyy" } }, //cambio de formato de fecha 
    widgets: ['filter']//activar el widget de filtro de busqueda
     });    
	 
	 $("#tabla_OrdenesHistorial").tablesorter({
    sortList: [[5,0]], //ordenar por de inicio esa columna 
    headers: {1: { sorter: "shortDate", dateFormat: "ddmmyyyy" } }, //cambio de formato de fecha 
    widgets: ['filter']//activar el widget de filtro de busqueda
     });
	 
	 }
	 
	 function inicializarPagOrdenEntreg(){  		
 		$("#tablaOrdenesPorEntregar")
		.tablesorterPager({container: $("#pagerOrdenesPorEntregar")})  ;
		 }
		 
	 function inicializarPagOrdenPend(){  		
 		$("#tablaOrdenesEntregarPendientes")
		.tablesorterPager({container: $("#pagerOrdenesPendientes")})  ;
		 }
		 
   function inicializarPagOrdenHis(){  		
 		$("#tabla_OrdenesHistorial")
		.tablesorterPager({container: $("#pagerOrdenesHistorial")})  ;
		 }		 
		 
	 
	 //-----tablas de la pestaña Pagos
	 function inicializarTablas_Pagos(){	 
	
	  $("#tabla_PagosPendientes").tablesorter({
   // sortList: [[5,0]], //ordenar por de inicio esa columna 
    headers: {1: { sorter: "shortDate", dateFormat: "ddmmyyyy" } }, //cambio de formato de fecha 
    widgets: ['filter']//activar el widget de filtro de busqueda
      });
	  
	  $("#tabla_PagosHistorial").tablesorter({
   // sortList: [[5,0]], //ordenar por de inicio esa columna 
    headers: {1: { sorter: "shortDate", dateFormat: "ddmmyyyy" } }, //cambio de formato de fecha 
    widgets: ['filter']//activar el widget de filtro de busqueda
      });
	  
	 }
	 
	  function inicializarPagPagosPendientes(){  		
 		$("#tabla_PagosPendientes")
		.tablesorterPager({container: $("#pagerPagoPend")})  ;
		 }

  function inicializarPagPagosHistorico(){  		
 		$("#tabla_PagosHistorial")
		.tablesorterPager({container: $("#pagerPagoHist")})  ;
		 }		 
	 
	 
	 
	 //xxxxxxxxxxxxx--- PESTAÑA PAGOS ---xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	 
	  //-------------------- mostrar ciudades en select en pastaña pagos
	  function mostrarCiudadesPagos(){	
      
     $.ajax({     
     method: "POST",dataType: "json",url: "../../../controllers/getAllTblciudadAct.php",
	 data: {solicitadoBy:"WEB"}})
            .done(function(cp){
				
                $.each(cp.datos, function(i,item)				
				 {	
				    nombreciudad=item.tblciudad_nombre;
				    //muestra ciudades en el encabezado de la interfaz principal
                    $("#SelectCiudadesPagos").append('<option value="' + nombreciudad +'">' + nombreciudad + '</option>');  				    
				 });					
                                 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      
   } 
	 
	 //------------------------------------------------------------------- 
	 function pagarDeposito(idtblproveedor,idtblordencompra,identrega){			
                   		
			    identregaproducto= $('#spanIdentregaPend'+identrega).text();				
	            statusdeposito="Pagado";	
			     envioCiudad = $("#spanCiudadEnvio").text();
			   
				 var emaildeUsuario = "<?php echo $_SESSION['email']; ?>";		 
				
		tipoN= 1;
		asunto= "Orden Depositada";
		mensaje= "Ya se Deposito la Orden Número: "+ idtblordencompra;
		emisor= "Ventas BePickler";
		idSeccion= 3;
		idProveedor= $("#idd"+idtblproveedor).val();		
		var emailUsuario = "<?php echo $_SESSION['email']; ?>";	
		estatus=0;
				
				UIkit.modal.confirm('Si desea confirmar Orden ya Depositada, presione Ok', function(){ 
   //console.log('identregaproducto: '+identregaproducto+'estatus: '+statusdeposito+'ciudad: '+envioCiudad);				
		           $.ajax({ 
                   method: "POST", dataType: "json",
				   url: "../../../controllers/setUpdateTblentregaproductoPagada.php", 				  
				   data:{solicitadoBy:"WEB",idtblentregaproducto:identregaproducto,				  
				   statusdeposito:statusdeposito,emailmodifico:emaildeUsuario}})			  
				   
                  .done(function(mg){
              			  
					 if(parseInt(mg.success)==1){ 
					 
						   
		            //--------------------------------------------------
					    $.ajax({method: "POST",dataType: "json",
							   url: "../../../controllers/setTblnotificacion1.php", 
							   data: {solicitadoBy:"WEB",tipo:tipoN,asunto:asunto, 
							   mensaje:mensaje,emisor:emisor,idredireccion:idSeccion,
							   emailcreo:emailUsuario} })                
							  .done(function(ms){
								 //  console.log(ms);
                    if(parseInt(ms.success)==1){ tabla1=true;
							//---------------------
                                $.ajax({method: "POST",dataType: "json",
							   url: "../../../controllers/getAllTblnotificacionMax.php", 
							   data: {solicitadoBy:"WEB"} })					                                                
							   .done(function(ms2){
									 if(parseInt(ms2.success)==1){
								$.each(ms2.datos, function(i,item)
				              { 
										idInsertado=item.id;
										 //--------------------Alta notificacionvista ----------------------
								         $.ajax({method:"POST",dataType:"json",
							             url: "../../../controllers/setTblnotificacionvista1.php", 
							             data: {solicitadoBy:"WEB",destino:idtblproveedor,status:estatus,
										 emailcreo:emailUsuario,idtblnotificacion:idInsertado} })					                                                
							             .done(function(ms3){  
									    if(parseInt(ms3.success)==1){
										
										 // UIkit.modal.alert('Se Notifico al Proveedor que ya se le Deposito.');
							UIkit.modal.alert('Orden Registrada como ya depositada,ya se le Notifico al Proveedor.'); 
							
							$('#bodyTabla_PendientesPago').empty(); 
							
							$("#SelectCiudadesPagos").val(envioCiudad); //carga							
							   mostrarDatos_Pagos();    //ejecuta
							   
						     $("#SelectCiudadesOrdenes").val(envioCiudad); //carga							
							   mostrarDatos_OrdenesPorEntregar();    //ejecuta 
							  
							  $("#SelectCiudadesPagos").val(envioCiudad); //carga							  
							   cantidadOrdenesposPagar();
										 
										 }else {
                                        UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');
                                        }                          
                                       })
                                      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                    	//____________________________________________________________________________________
										 
						    });	//fin del each							 	 
									}else {
                                      UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');
                                        }                          
                                  })
                              .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                   //-----------------------							  
                   }else {UIkit.modal.alert('Ocurrio un error, vuelva intentarlo'); }
			                        
                  })
       .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
							
	  //--------------------------Fin del N------------------------------
	  
                                       }
					 else{  UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');  }
								 
								 }) 	  
                  .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                 
	    });	
	
	} // fin de la funcion	
	
	 
 //-------------------------------------------------------------------
	 function mostrarDatos_Pagos(){  //funcion mostrar datos en tablas
		 
		 var nameCiudad=$("#SelectCiudadesPagos").val();	
	 
	   inicializarTablas_Pagos();
	   
	   
	    $.ajax({     
      method: "POST",dataType: "json",
	  url: "../../../controllers/getAllTblordencompraDatos.php", 
	  data: {solicitadoBy:"WEB",nameCiudad:nameCiudad},
	   beforeSend: function(){
				   $('#esperarMostrarPagos').css('display','inline');}	
	  }) 
            .done(function(o1){					 
	  if(parseInt(o1.success)==1){	
                
				
				 $("#bodyTabla_HistorialPagos").empty(); 
				 $("#bodyTabla_PendientesPago").empty(); 
				 
				     
				 $.each(o1.datos, function(s,item)
                    {				
					id_orden=item.idtblordencompra;
					id_pro= item.idtblproveedor;
					cdad= item.tbldatosenvio_ciudad;
					
					    fagendado= o1.datos[s].tbldatosenvio_fchagendado;
                        fagendado = fagendado.split("-");                 
				        fagendado = fagendado[2]+"/"+fagendado[1]+"/"+fagendado[0];
					   
					 
					
					
					
					//........... ................. .................. ........
				
			          //---------------------------------------------empieza
                             $.ajax({//Checar para ver si existe un registro de tblentregaprodruct
                              method: "POST",  
                              dataType: "json",  
                              url: "../../../controllers/getTblentregaproductoStatus.php",  
                              data: {solicitadoBy:"WEB",idtblordencompra:id_orden,idtblproveedor:id_pro}})
                             .done(function( mg3 ){
						   
						   
                             if(parseInt(mg3.success)==1){//si es exitoso entonces esta entregado
			                        pagos=true;
									 
			                  $.each(mg3.datos, function(u,item){
					            identrega=item.idtblentregaproducto;          
						     //---- --------- -----  ---
				if(mg3.datos[u].tblentregaproducto_statusdeposito=="Pendiente" || mg3.datos[u].tblentregaproducto_statusdeposito=="PENDIENTE"){
			       			
				 $("#pagerPagoPend").removeClass('oculto');	
                 $("#bodyTabla_PendientesPago").append(
				 ' <tr>'+				
               	 '<td class="uk-width-medium-1-3 uk-text-center"  >'+
                 '<span>'+ o1.datos[s].idtblordencompra +'</span>'+
				 '<span class="oculto" id="spanIdentregaPend'+identrega+'">'+ mg3.datos[u].idtblentregaproducto+'</span>'+				
				 '<span class="oculto" id="spanCiudadEnvio">'+ o1.datos[s].tbldatosenvio_ciudad +'</span>'+ 
               	 '</td>'+ 
				 '<td class="uk-width-medium-1-3 uk-text-center" >'+
			 ' <span class="oculto" id="idd'+o1.datos[s].idtblproveedor+'">'+ o1.datos[s].idtblproveedor+'</span>'+
				 '<span>'+ o1.datos[s].tblproveedor_nombre+'</span>'+ 
               	 ' </td>'+					  
			     '<td class="uk-text-center">'+
		         '$<span name="totaltabla1'+s+'" id="totaltabla1'+s+'"></span></td>'+	
			     '<td class="uk-width-medium-1-3 uk-text-center" >'+			                      
                 '<span id="f_corte'+identrega+'"></span>'+				 
                 '</td>'+
			     '<td class="uk-text-center">'+
			     '<button type="button" class="md-btn md-btn-flat ye" onclick="pagarDeposito('+o1.datos[s].idtblproveedor+','+o1.datos[s].idtblordencompra+','+identrega+');" id="botPag'+u+'">Pagar</button>'+
                 '</td>'+
			     '</tr>'							
								
				 );
				        
                      if(mg3.datos[u].tblentregaproducto_fchcortepago==null || mg3.datos[u].tblentregaproducto_fchcortepago=="")
					 {    $('#f_corte'+identrega).text('---'); 
					 } 
					 else { 
					 fchcortepago= mg3.datos[u].tblentregaproducto_fchcortepago;
                        fchcortepago = fchcortepago.split("-"); 
                        fchcortepago = fchcortepago[2]+"/"+fchcortepago[1]+"/"+fchcortepago[0];
					   $('#f_corte'+identrega).text(fchcortepago); 
					
					       }						
				 
				   	$("#tabla_PagosPendientes").trigger('updateAll', [true]);//actualiza tabla 	
                    totalCompra_pagos(o1.datos[s].idtblordencompra,s,o1.datos[s].idtblproveedor);
				  inicializarPagPagosPendientes();
				  //--------------------------------------------------------------
			  			  
			                } 
							
				else{	
                  $("#pagerPagoHist").removeClass('oculto');	
				$("#bodyTabla_HistorialPagos").append(
				 ' <tr>'+
                 '<td class="uk-width-medium-1-3 uk-text-center"   >'+ 
                 '<span>'+ o1.datos[s].idtblordencompra +'<span/>'+								    
               	 ' </td>'+      
				 '<td class="uk-width-medium-1-3 uk-text-center" >'+	
				 ' <span class="oculto" >'+ o1.datos[s].idtblproveedor+'</span>'+
                 ' <span >'+ o1.datos[s].tblproveedor_nombre+'</span>'+
               	 ' </td>'+               								  
		         '<td class="uk-text-center">'+
		         '$<span name="totaltabla1'+s+'" id="totaltabla1'+s+'"></span></td>'+
		         '<td class="uk-width-medium-1-3 uk-text-center" >'+			                      
                 '<span id="f_corte2'+identrega+'"></span>'+ 
               	 '</td>'+						
				 '</tr>'
				             );	
							 
                    if(mg3.datos[u].tblentregaproducto_fchcortepago==null || mg3.datos[u].tblentregaproducto_fchcortepago=="")
					 {  
				        $('#f_corte2'+identrega).text('---');
					 } 
					 else { 
					
					  fchcortepago2= mg3.datos[u].tblentregaproducto_fchcortepago;
                        fchcortepago2 = fchcortepago2.split("-"); 
                        fchcortepago2 = fchcortepago2[2]+"/"+fchcortepago2[1]+"/"+fchcortepago2[0];
					   $('#f_corte2'+identrega).text(fchcortepago2); 
					 
					       }							 
				                   
				 
				   	$("#tabla_PagosHistorial").trigger('updateAll', [true]);//actualiza tabla 					
					 //funcion para calcular el Total de la Orden 
                     totalCompra_pagos(o1.datos[s].idtblordencompra,s,o1.datos[s].idtblproveedor);
				 inicializarPagPagosHistorico();
				    				           
                                 }  //termina el else  
							 
							 //---- ------  -----  ---
			     
				            });  //cierra el each				 
                           
						         }else{ 								 
			         
					     pagos=false;
								 }
			           //--------------------------------
								 }) 	  
                    .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
              
	      //-------------------------------------------------------termina
		 });  //cierra el each		

		 //--------------------------------	
			
            } else{	
           $("#pagerPagoPend").addClass('oculto');
           $("#pagerPagoHist").addClass('oculto');			   
				//tabla ordenes pendientes				  
			    $("#bodyTabla_PendientesPago").empty(); 				
				
				//tabla ordenes historial				  
			    $("#bodyTabla_HistorialPagos").empty(); 
							 
					 }     
   })  .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      .always(function(){ $("#esperarMostrarPagos").hide(); }); 
				  
   }	//fin del la funcion		
	   
	 
	 
	//.................................................................
     
	
	 //......
	function totalCompra_pagos(idtblordencompra,u,idtblproveedor){   
    var totalproveedor =0;
    var subtotal=0;
    var subtotalcomplem=0;
   
      $.ajax({
      method: "POST",  
      dataType: "json",  
      url: "../../../controllers/getAllTblcarritoproductByidorden.php",  
      data: {solicitadoBy:"WEB",idtblordencompra:idtblordencompra,idtblproveedor:idtblproveedor}})
      .done(function(msg4) { 
      $.each(msg4.datos, function(i4,item){
      subtotal = (parseInt(msg4.datos[i4].tblcarritoproduct_cantidad))*(parseFloat(msg4.datos[i4].tblproductdetalle_precioreal))*(0.884);
      totalproveedor = totalproveedor + subtotal;
         
        });

      $('#totaltabla1'+u).text(totalproveedor);
      $("#tabla_PagosHistorial").trigger('updateAll', [true]);  
	  
	   $('#totaltabla2'+u).text(totalproveedor);
       $("#tabla_PagosPendientes").trigger('updateAll', [true]);  
	  
    }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
	 
	
	  	
	     //..........		 
	
          $.ajax({
            method: "POST",  
            dataType: "json",   
            url: "../../../controllers/getAllTblordencompraProComp.php",  
            data: {solicitadoBy:"WEB",orden:idtblordencompra,prove:idtblproveedor}})
              .done(function(msg7) {
				  
				  if (parseInt(msg7.success)==1) {
					  conprovee=true;
        $.each(msg7.datos, function(i,item){
       subtotalcomplem = (parseInt(msg7.datos[i].tblcarritoproductcomplem_cantidad))*(parseFloat(msg7.datos[i].tblproductcomplem_precioreal))*(0.884);
            
		 totalproveedor = totalproveedor + subtotalcomplem;
         
                                   });
          
		   $('#totaltabla1'+u).text(totalproveedor);
           $("#tabla_PagosHistorial").trigger('updateAll', [true]); 
		   
		   
		   $('#totaltabla2'+u).text(totalproveedor);
           $("#tabla_PagosPendientes").trigger('updateAll', [true]);  

         } 
		else{ 
		conprovee=false;	}	
		 //....
          })
		 		  
		  //....
		  .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
		  

	}	// fin de la funcion
	
	
	
	
	
	
	
	
	
	 
	//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	
	
	
	 //--------------PESTAÑA Ordenes
	 
	  //-------------------- mostrar ciudades en select en pastaña ordenes
	  function mostrarCiudadesOrdenes(){	
      
     $.ajax({     
     method: "POST",dataType: "json",url: "../../../controllers/getAllTblciudadAct.php",
	 data: {solicitadoBy:"WEB"}})
            .done(function(mostCi){
				
                $.each(mostCi.datos, function(i,item)				
				 {	
				    nombreciudad=item.tblciudad_nombre;
				 //muestra ciudades en el encabezado de la interfaz principal
                $("#SelectCiudadesOrdenes").append('<option value="' + nombreciudad +'">' + nombreciudad + '</option>');  				    
				 });					
                                 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      
   } 
   
   
   
   
   
   //--------------- Mostrar datos para tablas de ordenes por entregar
   function mostrarDatos_OrdenesPorEntregar(){ 
   
     var nombredeCiudad=$("#SelectCiudadesOrdenes").val();	
	 
	   inicializarTablas_ordenes();
	   
	
			//-----------------------------mostramos tabla productos normales---------------------------
			
	   $.ajax({     
      method: "POST",dataType: "json",
	  url: "../../../controllers/getAllTblordencompraDatos.php", 
	  data: {solicitadoBy:"WEB",nameCiudad:nombredeCiudad},
	   beforeSend: function(){
				   $('#esperarMostrarOrdenes').css('display','inline');}	
	  
	  }) 
            .done(function(o1){					 
	if(parseInt(o1.success)==1){
              	     $("#bodyTabla_OrdenesEntregar").empty(); 
					 $("#bodyTabla_OrdenesEntregarPendientes").empty(); 
					 $("#bodyTabla_OrdenesHistorial").empty(); 
				 $.each(o1.datos, function(s,item)
                    {				
					id_orden=item.idtblordencompra;
					id_pro= item.idtblproveedor;
					cdad= item.tbldatosenvio_ciudad;
					
					fagendado= o1.datos[s].tbldatosenvio_fchagendado;
                    fagendado = fagendado.split("-");                 
				    fagendado = fagendado[2]+"/"+fagendado[1]+"/"+fagendado[0];
					
					//........... ................. .................. ........
				
			          //---------------------------------------------empieza
                             $.ajax({//Checar para ver si existe un registro de tblentregaprodruct
                              method: "POST",  
                              dataType: "json",  
                              url: "../../../controllers/getTblentregaproductoByOrdenProveedor.php",  
                              data: {solicitadoBy:"WEB",idtblordencompra:id_orden,idtblproveedor:id_pro}})
                             .done(function( mg3 ){
						   
						   
                             if(parseInt(mg3.success)==1){//si es exitoso entonces esta entregado
			                         //entrega=true;
													                    
				                     
			                  $.each(mg3.datos, function(u,item){
					                   
						     //---- --------- -----  ---
				if(mg3.datos[u].tblentregaproducto_status=="Entregado" || mg3.datos[u].tblentregaproducto_status=="ENTREGADO"){
			       
				  fchpagoproveedor= mg3.datos[u].tblentregaproducto_fchpagoproveedor;
                  fchpagoproveedor = fchpagoproveedor.split("-");
                  fchpagoproveedor = fchpagoproveedor[2]+"/"+fchpagoproveedor[1]+"/"+fchpagoproveedor[0];
               // $("#bodyTabla_OrdenesHistorial").html("");
			   $("#pagerOrdenesHistorial").removeClass('oculto');
			   
				$("#bodyTabla_OrdenesHistorial").append(
				 ' <tr onclick="pupopOrdenEntregar('+
				              o1.datos[s].idtblordencompra+','+o1.datos[s].idtblproveedor
							  +','+tabla3_OrdenesHistorial+');"'+	
				'data-uk-modal="{target:'+"'#porentregar'"+',bgclose:false, center:true }"  >'+
                 
				'<td class="uk-width-medium-1-3 uk-text-center" >'+
                                 '<span id="mostrarOrden">'+ o1.datos[s].idtblordencompra +'<span/>'+
               					  ' </td>'+      
				'<td class="uk-width-medium-1-3 uk-text-center" >'+	
				      ' <span class="oculto" >'+ o1.datos[s].idtblproveedor+'</span>'+
                                  ' <span >'+ o1.datos[s].tblproveedor_nombre+'</span>'+
               					  ' </td>'+	  
		'<td class="uk-text-center">'+
		'$<span name="totaltabla'+s+'" id="totaltabla'+s+'"></span></td>'+
		
					 '<td class="uk-width-medium-1-3 uk-text-center" >'+			                      
                                  ' <span>'+ fchpagoproveedor +'</span>'+   
               					  ' </td>'+						
				 '</td><td class="uk-text-center" id="tblstatusdeposito'+s+'"></td>'+
                                '</tr>'
				             );							
				                   
				 
				   	$("#tabla_OrdenesHistorial").trigger('updateAll', [true]);//actualiza tabla 
					inicializarPagOrdenHis();
					
					if(mg3.datos[u].tblentregaproducto_statusdeposito!="Pendiente" || mg3.datos[u].tblentregaproducto_statusdeposito!="pendiente" || mg3.datos[u].tblentregaproducto_statusdeposito!="PENDIENTE"){
                    $('#tblstatusdeposito'+s).append('<span class="uk-badge uk-badge-success">'+mg3.datos[u].tblentregaproducto_statusdeposito+'</span>');
                    }else { 
                    $('#tblstatusdeposito'+s).append('<span class="uk-badge uk-badge-warning">'+mg3.datos[u].tblentregaproducto_statusdeposito+'</span>');
                     }
					
					
					 //funcion para calcular el Total de la Orden 
                  totalCompra(o1.datos[s].idtblordencompra,s,o1.datos[s].idtblproveedor);
				 
				  //--------------------------------------------------------------
			  			  
			                } 
							
				else{				
				//$("#bodyTabla_OrdenesEntregarPendientes").html("");
                    $("#pagerOrdenesPendientes").removeClass('oculto');				
                 $("#bodyTabla_OrdenesEntregarPendientes").append(
				 ' <tr onclick="pupopOrdenEntregar('+
				 o1.datos[s].idtblordencompra+','+o1.datos[s].idtblproveedor+
				 ','+tabla2_OrdenesPendiente+');"'+
				 ' data-uk-modal="{target:'+"'#porentregar'"+',bgclose:false, center:true }" >'+
				 
                 '<td class="uk-width-medium-1-3 uk-text-center" >'+
                 '<span id="mostrarOrden">'+ o1.datos[s].idtblordencompra +'<span/>'+
               	 ' </td>'+
				 '<td class="uk-width-medium-1-3 uk-text-center" >'+	
				 ' <span class="oculto" >'+ o1.datos[s].idtblproveedor+'</span>'+
                 ' <span >'+ o1.datos[s].tblproveedor_nombre+'</span>'+
               	 ' </td>'+	
				 '<td class="uk-width-medium-1-3 uk-text-center" >'+			                      
                 ' <span>'+ fagendado+'</span>'+
               	 ' </td>'+				  
                 '</tr>'							
								
				 );
				                   
				 
				$("#tablaOrdenesEntregarPendientes").trigger('updateAll', [true]);//actualiza tabla 	
                        inicializarPagOrdenPend();      
                   }  //termina el else  
							 
							 //---- ------  -----  ---
			     
			      });  //cierra el each				 
                           
				}else{ 								 
			         //$("#bodyTabla_OrdenesEntregar").html("");
                     $("#pagerOrdenesPorEntregar").removeClass('oculto');					 
					$("#bodyTabla_OrdenesEntregar").append(
				      ' <tr onclick="pupopOrdenEntregar('+
                      o1.datos[s].idtblordencompra+','+o1.datos[s].idtblproveedor
					  +','+tabla1_Ordenes +');"'+
				     ' data-uk-modal="{target:'+"'#porentregar'"+',bgclose:false, center:true }" >'+
					 
                      '<td class="uk-width-medium-1-3 uk-text-center" >'+
                     '<span id="mostrarOrden">'+ o1.datos[s].idtblordencompra +'<span/>'+
               	     ' </td>'+
				     '<td class="uk-width-medium-1-3 uk-text-center" >'+	
				     ' <span class="oculto" >'+ o1.datos[s].idtblproveedor+'</span>'+
                     ' <span >'+ o1.datos[s].tblproveedor_nombre +'</span>'+
               		 ' </td>'+	
					 '<td class="uk-width-medium-1-3 uk-text-center" >'+			                      
                     ' <span>'+ fagendado+'</span>'+
               		 ' </td>'+				  
                     '</tr>'	
				 );
				                   
				 
				$("#tablaOrdenesPorEntregar").trigger('updateAll', [true]);//actualiza tabla  
					  inicializarPagOrdenEntreg();
								 
								 }
			           //--------------------------------
								 }) 	  
                    .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
              
	             //-------------------------------------------------------termina
		 });  //cierra el each	se movio arriba	
		 //--------------------------------	
			
                            } 
				else{
                 $("#pagerOrdenesPorEntregar").addClass('oculto');
                 $("#pagerOrdenesPendientes").addClass('oculto');
                 $("#pagerOrdenesHistorial").addClass('oculto');
				 
                  //tabla ordenes por entregar				  
			    $("#bodyTabla_OrdenesEntregar").empty(); 
				
				//tabla ordenes pendientes				  
			    $("#bodyTabla_OrdenesEntregarPendientes").empty(); 				
				
				//tabla ordenes historial				  
			    $("#bodyTabla_OrdenesHistorial").empty(); 
								 
								 }     
	})  .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
       .always(function(){ $("#esperarMostrarOrdenes").hide(); });    				  
		  
				  
   }	//fin del ajax		  
	//........................
	
	
	
	function totalCompra(idtblordencompra,u,idtblproveedor){
   var totalproveedor =0;
   var subtotal=0;
   var subtotalcomplem=0;

  $.ajax({
      method: "POST",  
     dataType: "json",  
      url: "../../../controllers/getAllTblcarritoproductByidorden.php",  
      data: {solicitadoBy:"WEB",idtblordencompra:idtblordencompra,idtblproveedor:idtblproveedor}})
        .done(function(msg4) { 
        $.each(msg4.datos, function(i4,item){
          subtotal = (parseInt(msg4.datos[i4].tblcarritoproduct_cantidad))*(parseFloat(msg4.datos[i4].tblproductdetalle_preciobepickler));
          totalproveedor = totalproveedor + subtotal;
          
        });

      $('#totaltabla'+u).text(totalproveedor);
      $("#tabla_OrdenesHistorial").trigger('updateAll', [true]);  
    }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
	  
	
	   	
	     //..........
		 		
          $.ajax({
            method: "POST",  
            dataType: "json",   
            url: "../../../controllers/getAllTblordencompraProComp.php",  
            data: {solicitadoBy:"WEB",orden:idtblordencompra,prove:idtblproveedor}})
              .done(function(msg7) {				  
				  if (parseInt(msg7.success)==1) {
					  conproveedor=true;
					  
       $.each(msg7.datos, function(i,item){
       subtotalcomplem = (parseInt(msg7.datos[i].tblcarritoproductcomplem_cantidad))*(parseFloat(msg7.datos[i].tblproductcomplem_preciobp));
            
				 
        totalproveedor = totalproveedor + subtotalcomplem;
         // console.log("TOTAL"+totalproveedor); 
        });
           
		   $('#totaltabla'+u).text(totalproveedor);
           $("#tabla_OrdenesHistorial").trigger('updateAll', [true]); 

		    }  else{ conproveedor=false;}
          //-----		   
          })
		  .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
		     

	}	
	 
	//--------------
  
	 //..............muestra pupop detalle ordenes por entregar......................................
   function pupopOrdenEntregar(idtblordencompra,idtblproveedor,idTabla){
	  var idmapaOrdenes=1;
      var subtotal=0;
	  var subtotall=0;
	  var totalproveedor =0;
      var subtotalcomplem=0;
	  tieneProductosComplementarios=false;	 
	  
						 $("#ordenPorEntregar_numdeorden").empty(); 
						 $("#ordenPorEntregar_nombrecliente").empty(); 
				         $("#ordenPorEntregar_emailcliente").empty(); 
				         $("#ordenPorEntregar_telcliente").empty(); 
						 $("#ordenPorEntregar_factura").empty(); 
                         $("#ordenPorEntregar_datosfactura").empty(); 
						 $("#ordenPorEntregar_fechaagendada").empty(); 
                         $("#ordenPorEntregar_horaentrega").empty(); 
		                 $("#ordenPorEntregar_tipodeservicio").empty(); 
						 $("#ordenPorEntregar_nombreProveedor").empty(); 
			             $("#ordenPorEntregar_productos").empty(); 
						 $("#ordenPorEntregar_totalcompra").empty(); 
						 $("#ordenPorEntregar_fdecompra").empty(); 
		                 $("#ordenPorEntregar_datoscliente_envio").empty(); 
		                 $("#ordenPorEntregar_personarecibentrega").empty(); 
                         $("#ordenPorEntregar_telefonorecibeentrega").empty(); 
						$("#entregaEvidencia").empty();  
						  $("#entregaEvidenciaHistorial").empty();
						 $("#botondeubicacion").empty(); 
						 
		   $.ajax({    
         method: "POST",  
        dataType: "json",  
         url: "../../../controllers/getTblordencompra.php",  
        data: {solicitadoBy:"WEB",idtblordencompra:idtblordencompra}}) 
        .done(function(msg7) {  
			
        $.each(msg7.datos, function(c,item){
        
		 idcliente = item.tblcliente_idtblcliente;
		 facturacion = item.tblordencompra_facturacion;
		 
		           fagendado= msg7.datos[c].tblordencompra_fchordencompra;
                   fagendado = fagendado.split("-");                 
				   fagendado = fagendado[2]+"/"+fagendado[1]+"/"+fagendado[0];
		
		$("#ordenPorEntregar_fdecompra").append( '<span class="md-list-heading" >'+
                        fagendado+ '</span>'   ); 
		           
		  $("#ordenPorEntregar_numdeorden").text('Orden No.'+ item.idtblordencompra);
		  
		   
		  
		   $("#ordenPorEntregar_nombrecliente").text(item.tblordencompra_nombrecliente);	
		
                  });  //cierre del each
	 
	 
	 //----------------mostrar datos del cliente-----------------------------------				 
					$.ajax({ 
        method: "POST",dataType: "json",
	    url: "../../../controllers/getTblcliente.php",  
        data: {solicitadoBy:"WEB",idtblcliente:idcliente} })
            .done(function(ms){	
			
			   
			         $.each(ms.datos, function(i,item){
			
                //  $("#ordenPorEntregar_nombrecliente").text(item.tblcliente_nombre+' '+item.tblcliente_apellidos);				 
				  
                  $("#ordenPorEntregar_emailcliente").text(item.tblcliente_email);				 
				  
                  $("#ordenPorEntregar_telcliente").text(item.tblcliente_celular);
				  
				   //-------------------------------------------------
		   if(facturacion==1){//datos que se requieren para facturacion
            $("#ordenPorEntregar_factura").text("Requiere Factura");
              //ciudad
              $("#ordenPorEntregar_datosfactura").append('<li><div class="md-list-addon-element">'+
			  '<i class="md-list-addon-icon material-icons">&#xE7f1;</i></div>'+
			  '<div class="md-list-content"><span class="md-list-heading">'+
		      ms.datos[i].tblcliente_ciudad+
		     '</span><span class="uk-text-small uk-text-muted">Ciudad</span></div></li>');
		  
              //direccion, colonia y codipostal
              $("#ordenPorEntregar_datosfactura").append('<li><div class="md-list-addon-element">'+
			  '<i class="md-list-addon-icon material-icons">&#xE88A;</i></div>'+
			  '<div class="md-list-content"><span class="md-list-heading">Domicilio: #'+
			  ms.datos[i].tblcliente_callenum+'</span>'+
			  '<span class="md-list-heading">Colonia: '+ms.datos[i].tblcliente_colonia+
			  '</span><span class="md-list-heading">CodigoPostal: '+ms.datos[i].tblcliente_codipost+
			  '</span><span class="uk-text-small uk-text-muted">Dirección</span></div></li>');
             
			  
		if(ms.datos[i].tblcliente_rfc=="" || ms.datos[i].tblcliente_rfc==null){
        
		 rfc=false;
             }else { 
	       $("#ordenPorEntregar_datosfactura").append('<li><div class="md-list-addon-element">'+
			  '<i class="md-list-addon-icon material-icons">&#xE90D;</i></div><div class="md-list-content">'+
			  '<span class="md-list-heading">'+ms.datos[i].tblcliente_rfc+
			  '</span><span class="uk-text-small uk-text-muted">RFC</span></div></li>');
	        }  
			  
          }else {  
		  $("#ordenPorEntregar_factura").text("NO Requiere Factura");
		  }
		  
		  
		  //----------------------------------------------------
				 				  
				  });//fin del each

          })
          .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
          			   
		//cierra mostrar datos cliente
  }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
  //.always(function(){  console.log("always");  });
  
	 
       
	 //--------------------------------------- muestra datos de productos normales...........
	 
	 $.ajax({
      method: "POST",  
      dataType: "json",  
      url: "../../../controllers/getAllTblcarritoproductByidorden.php",  
      data: {solicitadoBy:"WEB",idtblordencompra:idtblordencompra,idtblproveedor:idtblproveedor}})
	                                      
        .done(function(msg4) {
          $.each(msg4.datos, function(i4,item){ 
		  $("#ordenPorEntregar_nombreProveedor").text(item.tblcarritoproduct_nombreproveedor);	
		   
		   
          subtotal=0;
           $("#ordenPorEntregar_productos").append('<br/><li><div class="md-list-addon-element">'+
		  '<i class="md-list-addon-icon material-icons">&#xE7E9;</i></div><div class="md-list-content">'+
		  '<span class="md-list-heading">'+ msg4.datos[i4].tblproducto_nombre +
		  '</span><span class="uk-text-small uk-text-muted">Nombre de Producto</span></div></li>'+
		  '<li id="prod'+i4+'"><span class="uk-text-small uk-text-muted">Caracteristicas</span><br/></li>'+
		  '<li id="personali'+i4+'"></li>'+
		   '<li id="mensajito'+i4+'"></li>'+
		  '<li>'+
		  '<div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>'+
		  '<div class="uk-width-large-1-2">'+
		  '<div class="md-list-content" id="cantidadP'+i4+'"></div></div>'+
		  '<div class="uk-width-large-1-2">'+
		  '<div class="md-list-content" id="precioIndividual'+i4+'"></div></div></li>');

           iddetalleproducto = msg4.datos[i4].tblcarritoproduct_idtblproductdetalle.toString();

            $.ajax({//detalle de cada producto 
      method: "POST",  
      dataType: "json",  
      url: "../../../controllers/getTblproductoDetalle2.php",  
      data: {solicitadoBy:"WEB", idtblproductdetalle:iddetalleproducto}  })
     .done(function( msg5 ) {
      
      $.each(msg5.datos, function(i5,item5){
        if(msg5.datos[i5].tblproductdetalle_diametro!=null){
          $("#prod"+i4).append('<span class="md-list-heading">'+
		  msg5.datos[i5].tblproductdetalle_diametro+' cm</span><br/>');
		  
        }
        if(msg5.datos[i5].tblproductdetalle_largo!=null && msg5.datos[i5].tblproductdetalle_ancho!=null){
          $("#prod"+i4).append('<span class="md-list-heading">'+
		  msg5.datos[i5].tblproductdetalle_largo+' cm x '+ msg5.datos[i5].tblproductdetalle_ancho+
		  ' cm </span><br/>');
        }
        if(msg5.datos[i5].tblproductdetalle_piezas!=null){
          $("#prod"+i4).append('<span class="md-list-heading">'+msg5.datos[i5].tblproductdetalle_piezas+
		  ' piezas</span><br/>');
        }

        idtblespecificingre = msg5.datos[i5].tblespecificingrediente_idtblespecificingrediente.toString();
		
                 $.ajax({//muestra el ingrediente especifico del producto 
                 method: "POST",  
                 dataType: "json",  
                 url: "../../../controllers/getTblespecificingrediente.php",  
                 data: {solicitadoBy:"WEB",idtblespecificingrediente:idtblespecificingre}  })
                .done(function( msg6) {   
                 $.each(msg6.datos, function(i6,item6){
                 $("#prod"+i4).append('<span class="md-list-heading">Especificaci&oacute;n: '+
		         msg6.datos[i6].tblespecificingrediente_nombre+' </span><br/>')}
                  );
                  })
                .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
                
		         //-------

      });  //cierre del each
    })
     .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
     

     if(msg4.datos[i4].tblcarritoproduct_personalizar=="" || msg4.datos[i4].tblcarritoproduct_personalizar==null){
       $("#personali"+i4).remove();
    }else { 
	$("#personali"+i4).append('<span class="uk-text-small uk-text-muted">Personalizaci&oacute;n: </span>'+
	  '<br/><span class="md-list-heading">'+msg4.datos[i4].tblcarritoproduct_personalizar+'</span>');
	  }  
	
	if(msg4.datos[i4].tblcarritoproduct_mensajetarjeta=="" || msg4.datos[i4].tblcarritoproduct_mensajetarjeta==null){
      $("#mensajito"+i4).remove();
    }else {  
	$("#mensajito"+i4).append('<span class="uk-text-small uk-text-muted">Mensaje: </span>'+
	  '<br/><span class="md-list-heading">'+msg4.datos[i4].tblcarritoproduct_mensajetarjeta+'</span>');
	}

    $("#cantidadP"+i4).append('<span class="md-list-heading">'+msg4.datos[i4].tblcarritoproduct_cantidad+
	'</span><br/><span class="uk-text-small uk-text-muted">'+
	'<i class="md-list-addon-icon material-icons">&#xE547;</i>Cantidad</span>');
    $("#precioIndividual"+i4).append('<span class="md-list-heading">'+
	msg4.datos[i4].tblproductdetalle_preciobepickler +'</span><br/><span class="uk-text-small uk-text-muted">'+
	'<i class="material-icons">&#xE263;</i>Precio Unitario</span>');

    subtotal = (parseInt(msg4.datos[i4].tblcarritoproduct_cantidad))*(parseFloat(msg4.datos[i4].tblproductdetalle_preciobepickler));
    totalproveedor = totalproveedor + subtotal; 
	
        });
    $("#ordenPorEntregar_totalcompra").text((totalproveedor).toFixed(2));
    }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
	
	
	
	//............checar datos para pupop de productos complementarios *****
      $.ajax({
      method: "POST", dataType: "json",  
      url: "../../../controllers/getCheckTblordencompraProComp.php",  
      data: {solicitadoBy:"WEB",orden1:idtblordencompra,prove1:idtblproveedor}})  
	  
      .done(function(h1) {
      if (parseInt(h1.success)==1) {
      tieneProductosComplementarios=true;	 
	      //------------------
	 		  
               $.ajax({ 
               method: "POST", dataType: "json",
	           url: "../../../controllers/getAllTblordencompraProComp.php", 
	           data: {solicitadoBy:"WEB",orden:idtblordencompra,prove:idtblproveedor}})
               .done(function(men){
                								 	
				 $.each(men.datos, function(i,item){
					 subtotalcomplem=0; 
			   $("#ordenPorEntregar_nombreProveedor").text(item.tblproveedor_nombre);		 
					   
		       $("#ordenPorEntregar_productos").append('<br/>'+	 	        
		       '<li><div class="md-list-addon-element">'+
				'<i class="md-list-addon-icon material-icons">&#xE146;</i>'+
				'</div><div class="md-list-content"><span class="md-list-heading">'+
				
				men.datos[i].tblproductcomplem_nombre +
				'</span><span class="uk-text-small uk-text-muted">Nombre de Producto Complementario</span>'+
				'</div></li>'+
				'<li><div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>'+
				'<div class="uk-width-large-1-2"><div class="md-list-content"><span class="md-list-heading">'+
				men.datos[i].tblcarritoproductcomplem_cantidad+
				'</span><br/><span class="uk-text-small uk-text-muted">'+
				'<i class="md-list-addon-icon material-icons">&#xE547;</i>Cantidad</span>'+
				'</div></div>'+
				'<div class="uk-width-large-1-2"><div class="md-list-content" >'+
				'<span class="md-list-heading">'+men.datos[i].tblproductcomplem_preciobp+
				'</span><br/><span class="uk-text-small uk-text-muted">'+
				'<i class="material-icons">&#xE263;</i>Precio Unitario</span></div></div></li>');  
				
               
			   subtotalcomplem = (parseInt(men.datos[i].tblcarritoproductcomplem_cantidad))*(parseFloat(men.datos[i].tblproductcomplem_preciobp));
               totalproveedor = totalproveedor + subtotalcomplem;				 
					
			
							 }); //cierra el each
			  $("#ordenPorEntregar_totalcompra").text((totalproveedor).toFixed(2)); 
							
              })
              .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
        
	//........
	} else{
          tieneProductosComplementarios=false;
                                 }     
 })  .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      	
  //............................................................................
    

  //---------------------  Datos de envio-----------------------------------------------------
	 $.ajax({//datos de envio de la orden (general)
      method: "POST",  
      dataType: "json",  
      url: "../../../controllers/getTbldatosenvio.php",  
      data: {solicitadoBy:"WEB",idtblordencompra:idtblordencompra}  }) 
     .done(function( msg3 ) {	  
      $.each(msg3.datos, function(i3,item3){

      fchagendado= msg3.datos[i3].tbldatosenvio_fchagendado;
      fchagendado = fchagendado.split("-");
      fchagendado = fchagendado[2]+"/"+fchagendado[1]+"/"+fchagendado[0];

      $("#ordenPorEntregar_fechaagendada").text(fchagendado);  //fecha agendada
      $("#ordenPorEntregar_horaentrega").text(msg3.datos[i3].tbldatosenvio_horaagendado); //hora agendada

       nombreservicioTienda="Entrega en tienda";//para hacer una comparacion con el tipo de servicio
	   nombreservicioTienda2="Entrega en Tienda";//para hacer una comparacion con el tipo de servicio
	   nombreservicioEsta="Recoger en Establecimient";//para hacer una comparacion con el tipo de servicio
        
      //entregaentienda    
      if( msg3.datos[i3].tbldatosenvio_tipodeservicio == nombreservicioEsta || msg3.datos[i3].tbldatosenvio_tipodeservicio == nombreservicioTienda2 || msg3.datos[i3].tbldatosenvio_tipodeservicio == nombreservicioTienda){
         $("#ordenPorEntregar_tipodeservicio").text(msg3.datos[i3].tbldatosenvio_tipodeservicio);
            }
	  else{
		
      $("#ordenPorEntregar_tipodeservicio").text(msg3.datos[i3].tbldatosenvio_tipodeservicio);
      
	  $("#ordenPorEntregar_datoscliente_envio").append('<li><div class="md-list-addon-element">'+
	  '<i class="md-list-addon-icon  material-icons">&#xE55F;</i></div>'+
	  '<div class="md-list-content"><span class="md-list-heading" id="dirCompletaOrden">'+
	  msg3.datos[i3].tbldatosenvio_pais+", "+msg3.datos[i3].tbldatosenvio_ciudad+", "+
	  msg3.datos[i3].tbldatosenvio_calle+" "+msg3.datos[i3].tbldatosenvio_numint+
	  //",Col."+
	 // msg3.datos[i3].tbldatosenvio_colonia+", C&oacute;digo postal "+msg3.datos[i3].tbldatosenvio_codipost+
	  '</span><span class="uk-text-small uk-text-muted">Dirección</span></div></li>');
	  
      $("#botondeubicacion").append('<button id="ye" class="md-btn md-btn-block ye"'+
	  ' onclick="mapaGeo('+0+','+idmapaOrdenes+')" type="button"  data-uk-modal="{target:'+
	  "'#mapa'"+',modal: false,bgclose:false}"> Ubicación de Entrega en Mapa</button>'); 
	 //class="md-btn md-btn-primary md-btn-block md-btn-wave-light"class="md-btn md-btn-flat " 
          }

    $("#ordenPorEntregar_personarecibentrega").text(msg3.datos[i3].tbldatosenvio_nombrerecibe);
    $("#ordenPorEntregar_telefonorecibeentrega").text(msg3.datos[i3].tbldatosenvio_celularrecibe);  
                        	
    });
	
  }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
  
		
		
		
		
		
		
		 if(idTabla==tabla2_OrdenesPendiente){ 
            // console.log("TABLA ORDENES PENDIENTE");
  
             $.ajax({//se obtiene datos del producto
             method: "POST",  
             dataType: "json",  
             url: "../../../controllers/getTblentregaproductoByOrdenProveedor.php",  
             data: {solicitadoBy:"WEB",idtblordencompra:idtblordencompra,idtblproveedor:idtblproveedor}})
            .done(function( msg9) {
           // console.log("ENTREGA");
            //console.log(msg9);
            $.each(msg9.datos, function(i,item3){
                       

      //se añade al popupdedetalleorden la visualizacion de los datos de evidencias (imgs)
      $("#entregaEvidencia").append('<div class="uk-grid uk-grid-medium" data-uk-grid-margin>'+
	  '<div class="uk-width-1-1"><div class="md-card"><div class="md-card-toolbar">'+
	  '<h2 class=" uk-text-large uk-text-middle uk-text-bold">Evidencias de Orden Entregada</h2>'+
	  '</div><div class="md-card-content large-padding"><div class="uk-grid "></div>'+
	  '<div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>'+
	  '<div class="uk-width-large-1-2"><h4 class="heading_c uk-margin-small-bottom"> Información </h4>'+
	  '<div class="uk-form-row"><ul class="md-list md-list-addon"><li><div class="md-list-addon-element">'+
	  '<i class="md-list-addon-icon material-icons">&#xE877;</i></div><div class="md-list-content">'+
	  '<span class="md-list-heading">'+
	  msg9.datos[i].tblentregaproducto_status+
	  ' </span><span class="uk-text-small uk-text-muted">Status del Pedido</span></div></li>'+
	  '<li><div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE002;</i>'+
	  '</div><div class="md-list-content"><span class="md-list-heading">'+
	 msg9.datos[i].tblentregaproducto_descripcion+
	  ' </span><span class="uk-text-small uk-text-muted">Observaci&oacute;n de Entrega</span></div></li>'+
	  '</ul></div></div><div class="uk-width-large-1-2">'+
	  '<h4 class="heading_c uk-margin-small-bottom">Evidencias de Entrega </h4>'+
	  '<div class="uk-grid uk-grid-medium" data-uk-grid-margin>'+
	  '<div class="uk-width-large-1-2" id="imgcomplem1">'+
	  '<div class="md-card-head uk-text-center uk-position-relative">'+
	  '<div class="md-card-head uk-text-center uk-position-relative">'+
	  '<img class="md-card-head-img" src="../assets/img/evidencias/'+
	  msg9.datos[i].tblentregaproducto_srcimgevidencia1+'" /></div></div></div>'+
	  
	 '<div class="uk-width-large-1-2" id="imgcomplem22">'+
	 /*'<div class="md-card-head uk-text-center uk-position-relative">'+
	  '<img class="md-card-head-img" src="assets/img/evidencias/'+
	  msg9.datos[i].tblentregaproducto_srcimgevidencia2+'" /></div>'+  */
	  '</div>' +'</div>'+
	  '</div></div></div>'+
	  '</div></div></div>');
      });
	  
	  //.............
	  
	  if(tieneProductosComplementarios=true){
      $.ajax({
        method: "POST",  
        dataType: "json",  
        url: "../../../controllers/getTblentregacomplem.php",  
        data: {solicitadoBy:"WEB",idtblordencompra:idtblordencompra,idtblproveedor:idtblproveedor}})
       .done(function( msg10) {
		    if(parseInt(msg10.success)==1){ ggu=true;
           $.each(msg10.datos, function(i,item){
			   
             $("#imgcomplem22").append('<div class="md-card-head uk-text-center uk-position-relative" >'+
			 //'<div class="md-card-head uk-text-center uk-position-relative">'+
			 '<img class="md-card-head-img" src="../assets/img/evidencias/'+
			 msg10.datos[i].tblentregacomplem_srcimgevidencia1+'" /></div>');
			 
           /*  $("#imgcomplem2").append('<div class="md-card-head uk-text-center uk-position-relative" >'+
			 '<div class="md-card-head uk-text-center uk-position-relative">'+
			 '<img class="md-card-head-img" src="../assets/img/evidencias/'+
			 msg10.datos[i].tblentregacomplem_srcimgevidencia2+'" /></div></div>');*/
			}); }else {ggu=false;}
        })
        .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
        //.always(function(){  console.log("always");  });
     }
	  //.............	  
}).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
//.always(function(){  console.log("always");  });
	  
}


//-----------------------empieza if para tabla historial
  if(idTabla==tabla3_OrdenesHistorial){
  //console.log("TABLA ORDENES HISTORIAL");

  $.ajax({//se obtiene datos del producto
    method: "POST",  
    dataType: "json",  
    url: "../../../controllers/getTblentregaproductoByOrdenProveedor.php",  
    data: {solicitadoBy:"WEB",idtblordencompra:idtblordencompra,idtblproveedor:idtblproveedor}})	
    .done(function( msg9) {      
      $.each(msg9.datos, function(i,item3){
      //cambio de formato de fechas
      fchpagoproveedor= msg9.datos[i].tblentregaproducto_fchpagoproveedor;
      fchpagoproveedor = fchpagoproveedor.split("-");
      fchpagoproveedor = fchpagoproveedor[2]+"/"+fchpagoproveedor[1]+"/"+fchpagoproveedor[0];


      //se añade al popupdedetalleorden la visualizacion de los datos de evidencias (imgs)
      $("#entregaEvidenciaHistorial").append('<div class="uk-grid uk-grid-medium" '+
	  'data-uk-grid-margin><div class="uk-width-1-1"><div class="md-card">'+
	  '<div class="md-card-toolbar">'+
	  '<h2 class=" uk-text-large uk-text-middle uk-text-bold">Evidencias de Orden Entregada</h2>'+
	  '</div><div class="md-card-content large-padding"><div class="uk-grid ">'+
	  '</div><div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>'+
	  '<div class="uk-width-large-1-2"><h4 class="heading_c uk-margin-small-bottom"> Información </h4>'+
	  '<div class="uk-form-row"><ul class="md-list md-list-addon"><li><div class="md-list-addon-element">'+
	  '<i class="md-list-addon-icon material-icons">&#xE877;</i></div><div class="md-list-content">'+
	  '<span class="md-list-heading">'+msg9.datos[i].tblentregaproducto_status+' </span>'+
	  '<span class="uk-text-small uk-text-muted">Status del Pedido</span></div></li><li>'+
	  '<div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE8DF;</i>'+
	  '</div><div class="md-list-content"><span class="md-list-heading">'+fchpagoproveedor+' </span>'+
	  '<span class="uk-text-small uk-text-muted">Fecha para Depósito </span></div></li><li>'+
	  '<div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE002;</i>'+
	  '</div><div class="md-list-content"><span class="md-list-heading uk-float-left" id="statusdeposito_historial">'+
	  '</span><br/><span class="uk-text-small uk-text-muted">Status de Deposito</span></div></li></ul>'+
	  '</div></div><div class="uk-width-large-1-2">'+
	  '<h4 class="heading_c uk-margin-small-bottom">Evidencias de Entrega </h4>'+
	  '<div class="uk-grid uk-grid-medium" data-uk-grid-margin>'+
	  '<div class="uk-width-large-1-2" id="imgcomplem1_historial">'+
	  '<div class="md-card-head uk-text-center uk-position-relative">'+
	  '<div class="md-card-head uk-text-center uk-position-relative">'+
	  '<img class="md-card-head-img" src="../assets/img/evidencias/'+
	  msg9.datos[i].tblentregaproducto_srcimgevidencia1+'" /></div></div></div>'+
	 '<div class="uk-width-large-1-2" id="imgcomplem2_historial">'+
	 // '<div class="md-card-head uk-text-center uk-position-relative">'+
	 // '<img class="md-card-head-img" src="assets/img/evidencias/'+
	 // msg10.datos[i].tblentregaproducto_srcimgevidencia2+'" /></div>'+
	  '</div>'+
	  '</div></div></div></div>'+
	  '</div></div></div>');

      if(msg9.datos[i].tblentregaproducto_statusdeposito!="Pendiente" || msg9.datos[i].tblentregaproducto_statusdeposito!="pendiente" || msg9.datos[i].tblentregaproducto_statusdeposito!="PENDIENTE"){
        $('#statusdeposito_historial').append('<span class="uk-badge uk-badge-success">'+
		msg9.datos[i].tblentregaproducto_statusdeposito+'</span>');
      }else {
		  $('#statusdeposito_historial').append('<span class="uk-badge uk-badge-warning">'+
	       msg9.datos[i].tblentregaproducto_statusdeposito+'</span>');}


      });
	  //......
	  
	  if(tieneProductosComplementarios=true){ 
      $.ajax({
        method: "POST",  
        dataType: "json",  
        url: "../../../controllers/getTblentregacomplem.php",  
        data: {solicitadoBy:"WEB",idtblordencompra:idtblordencompra,idtblproveedor:idtblproveedor}})
       .done(function( msg10) { 
		   //console.log("entro a historial imagnes");
		   //console.log(msg10);
		   if(parseInt(msg10.success)==1){ nohayrespuest=true;
           $.each(msg10.datos, function(i,item){
             $("#imgcomplem2_historial").append('<div class="md-card-head uk-text-center uk-position-relative" >'+
			// '<div class="md-card-head uk-text-center uk-position-relative">'+
			 '<img class="md-card-head-img" src="../assets/img/evidencias/'+
			 msg10.datos[i].tblentregacomplem_srcimgevidencia1+'" /></div>');                             
            
       	//$("#imgcomplem2").append('<div class="md-card-head uk-text-center uk-position-relative" >'+
			// '<div class="md-card-head uk-text-center uk-position-relative">'+
			// '<img class="md-card-head-img" src="assets/img/evidencias/'+
			// msg10.datos[i].tblentregacomplem_srcimgevidencia2+'" />'+
			// '</div></div>');  
           });
		   }else{nohayrespuest=false;}
        })
        .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
        //.always(function(){  console.log("always");  });
     }   //cierra si complementarios
	  //......

}).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
  // .always(function(){  console.log("always");  });
	  
} //cierra si para tabla historial
	
  
  } //fin de la funcion
 //---------------------------------------------		


  //funcion para visualizar el mapa 
function mapaGeo(x,id){
 var geocoder = new google.maps.Geocoder();
 var direccionCompleta; 
 if(id==1){
  direccionCompleta = document.getElementById("dirCompletaOrden").innerHTML;
 }else if (id==2){
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
   
   
   
   
   
   
   
   
   
//__________________________________________________   
	 
	 
	 
	 
	 /*................................PESTAÑA CARRITOS...................................*/
	 //---------------------mostrar ciudades activas -----------------------------
	 function mostrarCiudadesCarrito(){	
      
     $.ajax({     
     method: "POST",dataType: "json",url: "../../../controllers/getAllTblciudadAct.php",
	 data: {solicitadoBy:"WEB"}})
            .done(function(mostCi){
				
                $.each(mostCi.datos, function(i,item)				
				 {	
				    nombreciudad=item.tblciudad_nombre;
				   //muestra ciudades en el encabezado de la interfaz principal
                   $("#SelectCiudadesCarritos").append('<option value="' + nombreciudad +'">' + nombreciudad + '</option>');  				    
				 });					
                                 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
     
   } 
   
   //----------- mostrar tabla carritos olvidados-----------------------------------
   
   
    function mostrarCarritosTabla(){  
   
       var nombreCiudadCarritos=$("#SelectCiudadesCarritos").val();	
	   
	   inicializarTablas();
	   
	 $.ajax({     
     method: "POST",dataType: "json",
	 url: "../../../controllers/getAllTblcarritoCiudad.php", 
	 data: {solicitadoBy:"WEB",str_ciudad:nombreCiudadCarritos},
	  beforeSend: function(){
				   $('#esperarMostrarCarritos').css('display','inline');}	
	 })
     .done(function(mo){
				                 			
                if(parseInt(mo.success)==1){				
				$("#pagerCarritos").removeClass('oculto');
				$("#mostrarCarritosBody").empty(); 
				
                $.each(mo.datos, function(i,item)
               {				   
			      
					iddeorden=item.idtblordencompra;  
					
				fchagendado= mo.datos[i].tblordencompra_fchordencompra;
                fchagendado = fchagendado.split("-");                 
				fchagendado = fchagendado[2]+"/"+fchagendado[1]+"/"+fchagendado[0];
					 
				
				 //muestra ciudades en la tabla 
                 $("#mostrarCarritosBody").append(
				 ' <tr onclick="mostrarDatosdeOrden('+iddeorden+');" data-uk-modal="{target:'+"'#vercarrito'"+',bgclose:false, center:true }">'+
                 '<td class="uk-width-medium-1-3 uk-text-center" >'+
                 '<span id="mostrarOrden">'+ iddeorden +'<span/>'+
               	 ' </td>'+
				 '<td class="uk-width-medium-1-3 uk-text-center" >'+			                      
                 ' <span id="mostrarFechaAgregado">'+fchagendado+'</span>'+
               	 ' </td>'+				
                 '</tr>'
				 );
				                   
				 
				   	$("#tablaCarritos").trigger('updateAll', [true]);//actualiza tabla 
					 inicializarPagCarrio();
             });	//cierre del each
			 
			 //---------------------
			      }
							else 
						{  	
					$("#pagerCarritos").addClass('oculto');				
					  $("#mostrarCarritosBody").empty(); 
				      			
					    }	
			 
			 //------------
                                 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
	  .always(function(){ $("#esperarMostrarCarritos").hide(); });
       
   } //fin d ela funcion
   
   //---------------mostrar detalle de carrito olvidado
    
	function mostrarDatosdeOrden(iddeorden){
     var subtotal=0;
	 var subtotall=0;
	 var totalproveedor = 0;
	 
		    
			$("#carrito_fdecompra").empty(); 		           
		    $("#carrito_numdeorden").empty(); 
			$("#carrito_nombrecliente").empty(); 
		    $("#carrito_emailcliente").empty(); 
		    $("#carrito_telcliente").empty(); 
			$("#carrito_productos").html(""); 
            $("#carrito_totalcompra").empty(); 
            $("#carrito_fchagendado").empty(); 
            $("#carrito_horaentrega").empty(); 
            $("#carrito_tipodeservicio").empty(); 
            $("#carrito_datosclienteEnvio").empty(); 
            $("#carrito_personarecibentrega").empty();  
            $("#carrito_telefonorecibeentrega").empty(); 
			
		   $.ajax({    
         method: "POST",  
        dataType: "json",  
         url: "../../../controllers/getTblordencompra.php",  
        data: {solicitadoBy:"WEB",idtblordencompra:iddeorden}})
        .done(function(mu22) { 
						
        $.each(mu22.datos, function(c22,item){   
        
		 idcliente = item.tblcliente_idtblcliente;
		 id_decompra =item.idtblordencompra;
		 
		 fagendado= mu22.datos[c22].tblordencompra_fchordencompra;
         fagendado = fagendado.split("-");                 
		 fagendado = fagendado[2]+"/"+fagendado[1]+"/"+fagendado[0];
		
		  $("#carrito_fdecompra").append( '<span class="md-list-heading" >'+
                        fagendado+ '</span>'   ); 
		           
		  $("#carrito_numdeorden").text('Orden No.'+ item.idtblordencompra);
		  
		   $("#carrito_nombrecliente").append('<span class="md-list-heading">'+
				  item.tblordencompra_nombrecliente+' </span>'				  
				  );
		 
                  });  //cierre del each
	 
	 
	 //----------------mostrar datos del cliente-----------------------------------				 
					$.ajax({ 
                    method: "POST",dataType: "json",
	                url: "../../../controllers/getTblcliente.php",  
                    data: {solicitadoBy:"WEB",idtblcliente:idcliente} })
                   .done(function(cli23){	
			        if (parseInt(cli23.success)==1) {
			      $.each(cli23.datos, function(h23,item){
				  
                  $("#carrito_emailcliente").append('<span class="md-list-heading">'+
				  item.tblcliente_email+' </span>');
				  
                  $("#carrito_telcliente").append('<span class="md-list-heading">'+
				  item.tblcliente_celular+' </span>');
					});//fin del each 
					}else{nph=false;}

                      })
          .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
          			   
			
	 //---------------------------------------ciera mostrar datos del cliente
	 })
          .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
         
		  
	 //________________________________________
	
	
	$.ajax({
      method: "POST",  
      dataType: "json",  
      url: "../../../controllers/getAllTblcarritoproduByOrden.php",  
      data: {solicitadoBy:"WEB",idorden:iddeorden}}) 
      .done(function(msg44) {
        $.each(msg44.datos, function(i44,item){		
		 
		   
          subtotal=0;
           $("#carrito_productos").append('<br/><li><div class="md-list-addon-element">'+
		  '<i class="md-list-addon-icon material-icons">&#xE7E9;</i></div><div class="md-list-content">'+
		  '<span class="md-list-heading">'+ msg44.datos[i44].tblcarritoproduct_nombreproducto +
		  '</span><span class="uk-text-small uk-text-muted">Nombre de Producto</span></div></li>'+
		  '<br/><li>'+
		   '<div class="md-list-content">'+
		  '<span class="md-list-heading">'+ msg44.datos[i44].tblcarritoproduct_nombreproveedor +
		  '</span><span class="uk-text-small uk-text-muted">Nombre del proveedor</span></div></li>'+
		  '<li id="carriro_prod'+i44+'"><span class="uk-text-small uk-text-muted">Caracteristicas</span><br/></li>'+
		  '<li id="carrito_personali'+i44+'"></li>'+
		   '<li id="carrito_mensajito'+i44+'"></li>'+
		  '<li>'+
		  '<div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>'+
		  '<div class="uk-width-large-1-2">'+
		  '<div class="md-list-content" id="carrito_cantidadP'+i44+'"></div></div>'+
		  '<div class="uk-width-large-1-2">'+
		  '<div class="md-list-content" id="carrito_precioIndividual'+i44+'"></div></div></li>');

           iddetalleproducto = msg44.datos[i44].tblcarritoproduct_idtblproductdetalle.toString();
		   
                                              
            $.ajax({//detalle de cada producto de acuerdo
      method: "POST",  
      dataType: "json",  
      url: "../../../controllers/getTblproductoDetalle2.php",  
      data: {solicitadoBy:"WEB", idtblproductdetalle:iddetalleproducto}  })
     .done(function( msg55 ) {
      
      $.each(msg55.datos, function(i55,item55){
        if(msg55.datos[i55].tblproductdetalle_diametro!=null){
          $("#carriro_prod"+i44).append('<span class="md-list-heading">'+
		  msg55.datos[i55].tblproductdetalle_diametro+' cm</span><br/>');
		  
         }
        if(msg55.datos[i55].tblproductdetalle_largo!=null && msg55.datos[i55].tblproductdetalle_ancho!=null){
          $("#carriro_prod"+i44).append('<span class="md-list-heading">'+
		  msg55.datos[i55].tblproductdetalle_largo+' cm x '+ msg55.datos[i55].tblproductdetalle_ancho+
		  ' cm </span><br/>');
        }
        if(msg55.datos[i55].tblproductdetalle_piezas!=null){
          $("#carriro_prod"+i44).append('<span class="md-list-heading">'+msg55.datos[i55].tblproductdetalle_piezas+
		  ' piezas</span><br/>');
        }

        idtblespecificingre = msg55.datos[i55].tblespecificingrediente_idtblespecificingrediente.toString();
		
                 $.ajax({//muestra el ingrediente especifico 
                 method: "POST",  
                 dataType: "json",  
                 url: "../../../controllers/getTblespecificingrediente.php",  
                 data: {solicitadoBy:"WEB",idtblespecificingrediente:idtblespecificingre}  })
                .done(function( msg88) {  
                 $.each(msg88.datos, function(i8,item88){
                 $("#carriro_prod"+i44).append('<span class="md-list-heading">Especificaci&oacute;n: '+
		         msg88.datos[i8].tblespecificingrediente_nombre+' </span><br/>')}
                  );
                  })
                .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
               
		//-------

      });  //cierre del each
    })
     .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
      

     if(msg44.datos[i44].tblcarritoproduct_personalizar=="" || msg44.datos[i44].tblcarritoproduct_personalizar==null){ 
        $("#carrito_personali"+i44).remove();
    }else {   
	   $("#carrito_personali"+i44).append('<span class="uk-text-small uk-text-muted">Personalizaci&oacute;n: </span>'+
	  '<br/><span class="md-list-heading">'+msg44.datos[i44].tblcarritoproduct_personalizar+'</span>');     }   
	  
	
	if(msg44.datos[i44].tblcarritoproduct_mensajetarjeta=="" || msg44.datos[i44].tblcarritoproduct_mensajetarjeta==null){ 
	$("#carrito_mensajito"+i44).remove();     
    }else {  
     $("#carrito_mensajito"+i44).append('<span class="uk-text-small uk-text-muted">Mensaje: </span>'+
	  '<br/><span class="md-list-heading">'+msg44.datos[i44].tblcarritoproduct_mensajetarjeta+'</span>');	}

    $("#carrito_cantidadP"+i44).append('<span class="md-list-heading">'+msg44.datos[i44].tblcarritoproduct_cantidad+
	'</span><br/><span class="uk-text-small uk-text-muted">'+
	'<i class="md-list-addon-icon material-icons">&#xE547;</i>Cantidad</span>');
    $("#carrito_precioIndividual"+i44).append('<span class="md-list-heading">'+
	msg44.datos[i44].tblcarritoproduct_preciobp +'</span><br/><span class="uk-text-small uk-text-muted">'+
	'<i class="material-icons">&#xE263;</i>Precio Unitario</span>');

    subtotal = (parseInt(msg44.datos[i44].tblcarritoproduct_cantidad))*(parseFloat(msg44.datos[i44].tblcarritoproduct_preciobp));
    totalproveedor = totalproveedor + subtotal; 	
	
        });
    $("#carrito_totalcompra").text((totalproveedor).toFixed(2));
    }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
	
	 
	
	//............ datos para pupop Productos complementarios *****
      $.ajax({
      method: "POST", dataType: "json",  
      url: "../../../controllers/getCheckTblordencompraProComp2.php",  
      data: {solicitadoBy:"WEB",orden1:iddeorden}})  
	  
        .done(function(h12) {
        if (parseInt(h12.success)==1) {
        tieneProductosComplementarios=true;	
       	 //------------------
	 		  
       $.ajax({ 
       method: "POST", dataType: "json",
	   url: "../../../controllers/getAllTblordencompraProComp2.php", 
	   data: {solicitadoBy:"WEB",orden:iddeorden}})
       .done(function(men77){
                							 	
		$.each(men77.datos, function(i,item){
					 subtotalcomplem=0; 
			//$("#carrito_nombreProveedor").text(item.tblproveedor_nombre);		 
					   
		  $("#carrito_productos").append('<br/>'+	 	        
		       '<li><div class="md-list-addon-element">'+
				'<i class="md-list-addon-icon material-icons">&#xE146;</i>'+
				'</div><div class="md-list-content"><span class="md-list-heading">'+				
				men77.datos[i].tblcarritoproductcomplem_nombreproducto +
				'</span><span class="uk-text-small uk-text-muted">Nombre de Producto Complementario</span>'+
				'</div></li>'+
				
				'<li><div class="md-list-content"><span class="md-list-heading">'+				
				men77.datos[i].tblcarritoproductcomplem_nombreproveedor +
				'</span><span class="uk-text-small uk-text-muted">Nombre del Proveedor</span>'+
				'</div></li>'+
				
				'<li><div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>'+
				'<div class="uk-width-large-1-2"><div class="md-list-content"><span class="md-list-heading">'+
				men77.datos[i].tblcarritoproductcomplem_cantidad+
				'</span><br/><span class="uk-text-small uk-text-muted">'+
				'<i class="md-list-addon-icon material-icons">&#xE547;</i>Cantidad</span>'+
				'</div></div>'+
				'<div class="uk-width-large-1-2"><div class="md-list-content" >'+
				'<span class="md-list-heading">'+men77.datos[i].tblcarritoproductcomplem_preciobp+
				'</span><br/><span class="uk-text-small uk-text-muted">'+
				'<i class="material-icons">&#xE263;</i>Precio Unitario</span></div></div></li>');  
				
               
			   subtotalcomplem = (parseInt(men77.datos[i].tblcarritoproductcomplem_cantidad))*(parseFloat(men77.datos[i].tblcarritoproductcomplem_preciobp));
               totalproveedor = totalproveedor + subtotalcomplem;				 
					
			
							 }); //cierra el each
			 $("#carrito_totalcompra").text((totalproveedor).toFixed(2)); 
							
              })
          .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
         
		//........
		  } else{
                  tieneProductosComplementarios=false;
                                 }     
								 }) 	  
          .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
         
		
	 //____________________________________________
	 //---------------------  Datos de envio-----------------------------------------------------
		$.ajax({//datos de envio de la orden (general)
      method: "POST",  
      dataType: "json",  
      url: "../../../controllers/getTbldatosenvio.php",  
      data: {solicitadoBy:"WEB", idtblordencompra:iddeorden}  }) 
     .done(function( msg33 ) { 
	  
	
      $.each(msg33.datos, function(i3,item3){

      fchagendado= msg33.datos[i3].tbldatosenvio_fchagendado;
      fchagendado = fchagendado.split("-");
      fchagendado = fchagendado[2]+"/"+fchagendado[1]+"/"+fchagendado[0]; 

      $("#carrito_fchagendado").text(fchagendado);  //fecha agendada
      $("#carrito_horaentrega").text(msg33.datos[i3].tbldatosenvio_horaagendado); //hora agendada

       nombreservicioTienda="Entrega en tienda";//para hacer una comparacion con el tipo de servicio
        estable="Recoger en Establecimient"; 
      //entregaentienda    
      if(msg33.datos[i3].tbldatosenvio_tipodeservicio == nombreservicioTienda || msg33.datos[i3].tbldatosenvio_tipodeservicio == estable){
         $("#carrito_tipodeservicio").text(msg33.datos[i3].tbldatosenvio_tipodeservicio);
            }
	  else{
		
      $("#carrito_tipodeservicio").text(msg33.datos[i3].tbldatosenvio_tipodeservicio);
      
	  $("#carrito_datosclienteEnvio").append('<li><div class="md-list-addon-element">'+
	  '<i class="md-list-addon-icon  material-icons">&#xE55F;</i></div>'+
	  '<div class="md-list-content"><span class="md-list-heading" id="dirCompletaOrden">'+
	  msg33.datos[i3].tbldatosenvio_pais+", "+msg33.datos[i3].tbldatosenvio_ciudad+", "+
	  msg33.datos[i3].tbldatosenvio_calle+" "+msg33.datos[i3].tbldatosenvio_numint+
	  //",Col."+
	 // msg33.datos[i3].tbldatosenvio_colonia+", C&oacute;digo postal "+msg33.datos[i3].tbldatosenvio_codipost+
	  '</span><span class="uk-text-small uk-text-muted">Dirección</span></div></li>');
	  
      
          }

    $("#carrito_personarecibentrega").text(msg33.datos[i3].tbldatosenvio_nombrerecibe);
    $("#carrito_telefonorecibeentrega").text(msg33.datos[i3].tbldatosenvio_celularrecibe);  
                     	
    });
	
  }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
 	 
  } //fin de la funcion
	  
  </script> 
  
 
<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjeDznrCqVmUmnPkqY34STkSMsV2RvFok&callback=initMap" ></script>
 	
    
</body>
</html>