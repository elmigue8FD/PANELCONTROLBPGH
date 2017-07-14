<?php 
include('./php/seguridad_general.php'); 
?>
<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> 
<html lang="en"> <!--<![endif]-->

<head>
  <?php include("./codigo_general/head.php"); ?>
  <!-- additional styles for plugins -->
  <!-- fullcalendar -->
  <link rel="stylesheet" href="bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="./assets/skins/dropify/css/dropify.css">
  <link rel="stylesheet" href="./assets/css/estilo_miguel_inicio.css">
</head>

<body class=" sidebar_main_open sidebar_main_swipe">
  <!-- main header -->
  <header id="header_main">
    <?php include('./codigo_general/header_main.php'); ?>        
  </header><!-- main header end -->
  <!-- main sidebar -->
  <aside id="sidebar_main">
    <!-- sidebar_main_header -->
    <?php include('./codigo_general/sidebar_main_header.php'); ?>

    <div class="menu_section">
      <?php include('./codigo_general/menu_section.php'); ?>
    </div>
  </aside><!-- main sidebar end -->
  <div id="page_content">
    <div id="page_content_inner">
      <!-- SubMenu de INDEX -->
      <div id="top_bar">
        <div class="md-top-bar ">
          <div class="uk-width-large-8-10 uk-container-center">
            <div class="md-card-content">
              <div class="uk-grid">
                <div class="uk-width-1-1">
                  <ul class="uk-tab" data-uk-tab="{connect:'#tabs_1_content', swiping:false}" id="tabs_1">
                    <li class="named_tab" id="inicio"><a href="#" ><font size="3"> Inicio </font></a></li>
                    <li class="named_tab" id="ordenes"><a href="#" ><font size="3"> Ordenes </font></a></li>
                    <li class="named_tab" id="productos"><a href="#" ><font size="3"> Productos </font></a></li>
                    <li class="named_tab" id="cotizaciones"><a href="#" ><font size="3"> Cotizaciones </font></a></li>
                    <li class="named_tab" id="notif"><a href="#" ><font size="3"> Notificaciones </font></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- end SubMenu de INDEX -->
      <div>
        <div id="tabs_1_content" class="uk-switcher">
         <div id="contenido_Inicio"><!-- Contenido de Pestaña Inicio -->
          <!-- indicadores -->
          <div class="uk-grid uk-grid-width-large-1-3 uk-grid-width-medium-1-2 uk-grid-medium " data-uk-grid-margin>
            <div>
                <div class="md-card">
                 <div class="md-card-content">
                  <div class="md-list-content-horizontal">
                   <label class="md-list-heading uk-h3 "><i class="material-icons">&#xE875;</i>&nbsp;Pedidos</label>
                   <label class="md-list-heading uk-float-right uk-h2 uk-text-bold uk-text-middle" id="indicadorNumeroPedidos"></label>
                  </div>
                 </div>
                </div>
            </div>
            <div>
                 <div class="md-card">
                  <div class="md-card-content">
                   <div class="md-list-content-horizontal">
                    <label class="md-list-heading uk-h3"><i class="uk-icon-envelope"></i>&nbsp;Cotizaciones</label>
                    <label class="md-list-heading uk-float-right uk-h2 uk-text-bold uk-text-middle" id="indicadorNumeroCotizaciones"></label>
                   </div>
                  </div>
                 </div>
            </div>
            <div>
                 <div class="md-card">
                  <div class="md-card-content">
                   <div class="md-list-content-horizontal">
                    <label class="md-list-heading uk-h3"><i class="uk-icon-dollar"></i>&nbsp;Ventas</label>
                    <label class="md-list-heading uk-float-right uk-h2 uk-text-bold uk-text-middle" id="indicadorVentas"></label>
                   </div>
                  </div>
                 </div>
            </div>
            <!--<div>
                 <div class="md-card">
                  <div class="md-card-content">
                   <div class="md-list-content-horizontal">
                    <label class="md-list-heading uk-h3"><i class="uk-icon-clock-o"></i>&nbsp;Dís de Paquete</label>
                    <label class="md-list-heading uk-float-right uk-h2" id="idicadorDiasPaquete"></label>
                   </div>
                  </div>
                 </div>
            </div>-->
          </div>
          <div class="md-card"><br/>
           <div class="md-card-content">
            <div id="calendar_selectable"></div>
            <div><label><i class="uk-icon-hand-o-up"></i>&nbsp;Clic para visualizar Calendario  </label></div>
           </div>
          </div>           
         </div><!--  end Contenido de Pestaña Inicio -->
         
		 <div id="contenido_Ordenes"><!-- Contenido de Pestaña Ordenes -->
          <h3 class="heading_b uk-margin-bottom"> Ordenes Por Entregar </h3>
          <div class="md-card uk-margin-medium-bottom" >
            <div class="md-card-content">
              <div class="uk-overflow-container">
                <table class="uk-table uk-table-nowrap table_check uk-table-hover tablesorter tablesorter-altair" id="tbl_ordenes">
                  <thead >
                    <tr>
                      <th class="uk-width-2-10 uk-text-center" >No. Orden </th>
                      <th class="uk-width-2-10 uk-text-center" >Fecha de Entrega</th>
                    </tr>
                  </thead>
                  <tbody id="tblordenes_item" name="tblordenes_item">
                  </tbody>
                </table>
				<!-- -->
				<div id="pagerOrdenEntregar" class="pager">
    	<form>
    		<img src="bower_components/tablesorter/dist/css/images/first.png" class="first"/>
    		<img src="bower_components/tablesorter/dist/css/images/prev.png" class="prev"/>
    		<input disabled type="text" class="pagedisplay"/>
    	    <img src="bower_components/tablesorter/dist/css/images/next.png" class="next"/>
			<img src="bower_components/tablesorter/dist/css/images/last.png" class="last"/>    		
    	</form>
       </div>
				
				<!-- -->
              </div>
            </div>
          </div>
          <h3 class="heading_b uk-margin-bottom"> Ordenes Pendientes </h3>
          <div class="md-card uk-margin-medium-bottom" >
            <div class="md-card-content">
              <div class="uk-overflow-container">
                <table class="uk-table uk-table-nowrap table_check uk-table-hover tablesorter tablesorter-altair" id="tbl_ordenespendiente">
                  <thead >
                    <tr>
                      <th class="uk-width-2-10 uk-text-center">No. Orden </th>
                      <th class="uk-width-2-10 uk-text-center">Fecha de Entrega</th>
                    </tr>
                  </thead>
                  <tbody id="tblordenespendiente_item" name="tblordenespendiente_item">
                  </tbody>
                </table>
				<!--....-->
				<div id="pagerOrdenesPendientes" class="pager">
    	<form>
    		<img src="bower_components/tablesorter/dist/css/images/first.png" class="first"/>
    		<img src="bower_components/tablesorter/dist/css/images/prev.png" class="prev"/>
    		<input disabled type="text" class="pagedisplay"/>
    	    <img src="bower_components/tablesorter/dist/css/images/next.png" class="next"/>
			<img src="bower_components/tablesorter/dist/css/images/last.png" class="last"/>    		
    	</form>
       </div>
				
				<!--....--->
              </div>
            </div>
          </div>
         <h3 class="heading_b uk-margin-bottom"> Historial de Ordenes </h3>
         <div class="md-card uk-margin-medium-bottom">
          <div class="md-card-content">
           <div class="uk-overflow-container">
            <table class="uk-table uk-table-nowrap table_check uk-table-hover tablesorter tablesorter-altair" id="tbl_ordeneshistorial">
              <thead>
               <tr>
                <th class="uk-width-2-10 uk-text-center">No. Orden </th>
                <th class="uk-width-1-10 uk-text-center">Total de Compra</th>
                <th class="uk-width-2-10 uk-text-center">Fecha Deposito</th>
                <th class="uk-width-2-10 uk-text-center">Status Deposito</th>
               </tr>
              </thead>
             <tbody id="tblordeneshistorial_item" name="tblordeneshistorial_item">
            </tbody>
           </table>
		   
		   <!-- ..... -->
		   <div id="pagerOrdenesHistorial" class="pager">
    	<form>
    		<img src="bower_components/tablesorter/dist/css/images/first.png" class="first"/>
    		<img src="bower_components/tablesorter/dist/css/images/prev.png" class="prev"/>
    		<input disabled type="text" class="pagedisplay"/>
    	    <img src="bower_components/tablesorter/dist/css/images/next.png" class="next"/>
			<img src="bower_components/tablesorter/dist/css/images/last.png" class="last"/>    		
    	</form>
       </div>
		   <!--...-->
          </div>
         </div>
        </div>
        <div id="ordenes_add">
        <!--POPUP REGISTRANDO-->
              <div class="uk-modal" id="popup_spinner_registrandoOrdenCot">
                <div class="uk-modal-dialog">                  
                  <div class="uk-modal-spinner"></div>
                  <br>
                  <h4 class="uk-text-center"> Espere un momento </h4>
                </div>
              </div>
        <!--POP DETALLE DE ORDEN-->
          <div class="uk-modal" id="detalleOrdenPendiente">
           <div class="uk-modal-dialog uk-modal-dialog-large">
            <button type="button" class="uk-modal-close uk-close uk-close-alt"></button>
            <div class="uk-modal-header">
             <h3 class="uk-modal-title"><i class="material-icons" >&#xE878;</i>&nbsp;Detalle de Orden </h3>
            </div>
            <div class="uk-grid">
             <div class="uk-width-large-1-2" id="marcarorden"></div>
             <div  class="uk-width-large-1-2" id="botondeubicacion"><!--Se agregara el boton, para visualizar el mapa, desde AJAX si el servicio es a domicilio -->
             </div>
            </div>
            <form id="form_detalleOrden" name="form_detalleOrden" class="uk-form-stacked"  >
             <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
              <div class="uk-width-1-1">
               <div class="md-card">
                <div class="md-card-toolbar"><h2 class=" uk-text-large uk-text-middle uk-text-bold"><span id="numerodeordenpendiente"></span></h2> <!--AJAX PARA NUMERO DE ORDEN-->
                </div>
                <div class="md-card-content large-padding">
                 <div class="uk-grid "></div>
                 <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>
                  <div class="uk-width-large-1-3">
                   <h4 class="heading_c uk-margin-small-bottom">Información de Cliente </h4>
                    <div class="uk-form-row">
                     <ul class="md-list md-list-addon" id="datoscliente">
                      <li>
                       <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE7FD;</i></div>
                       <div class="md-list-content" >
                        <div class="md-list-heading"><span class="md-list-heading" id="ordenactual_nombrecliente"><!--AJAX PARA NOMBRE--></span>
                        </div><span class="uk-text-small uk-text-muted">Nombre Completo</span></div>
                      </li>
                      <li>
                       <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE158;</i></div>
                       <div class="md-list-content">
                        <div class="md-list-heading">
                        <span class="md-list-heading" id="ordenactual_emailcliente"><!--AJAX PARA EMAIL--></span>                         
                        </div><span class="uk-text-small uk-text-muted">Email</span></div>
                      </li>
                      <li>
                       <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE0CD;</i></div>
                       <div class="md-list-content">
                        <div class="md-list-heading">
                         <span class="md-list-heading" id="ordenactual_numtelcliente"><!--AJAX PARA TELEFONO--></span>                         
                         </div><span class="uk-text-small uk-text-muted">Telefóno</span></div>
                      </li>
                      <li>
                       <div class="md-list-content" >
                        <span class="md-color-red-A700 uk-text-bold" id="ordenactual_factura">
                        <!--AJAX PARA FACTURACION-->                         
                        </span>
                       </div>
                      </li>
                    </ul>
                    <ul  class="md-list md-list-addon" id="datosfactura">
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
                     <div class="md-list-heading">
                      <span class="md-list-heading" id="ordenactual_fchcompra">
                        <!--AJAX PARA FFCHCOMPRA-->
                      </span>
                     </div>
                     <span class="uk-text-small uk-text-muted">Fecha de Compra</span>
                    </div>
                   </li>
                   </ul><br>
                   <h5 class="heading_c uk-margin-small-bottom uk-h6">Producto(s)</h5>
                    <ul class="md-list md-list-addon" id="ordencompra_listaproductos">
                     <!--Lista de Productos por AJAX-->
                    </ul>
                   <h5 class="heading_c uk-margin-small-bottom uk-h6">Pago</h5>
                    <ul class="md-list md-list-addon">
                     <li>
                      <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE227;</i></div>
                      <div class="md-list-content">
                       <div class="md-list-heading" >
                        <span class="md-list-heading" id="ordenactual_totalcompra">
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
                         <span class="md-list-heading" id="ordenactual_fchagendado">
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
                         <span class="md-list-heading" id="ordenactual_horaentrega">
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
                         <span class="md-list-heading" id="ordenactual_tipodeentrega">
                          <!--AJAX PARA LA TIPO DE SERVICIO DE ENTREGA-->
                         </span>
                        </div>
                        <span class="uk-text-small uk-text-muted">Tipo de Servicio</span>
                       </div>
                      </li>
                     </ul>
                     <ul class="md-list md-list-addon" id="datoscliente_envio"><!--AJAX PARA DIRECCION DE ENVIO--></ul>
                    </div>
                    <h4 class="heading_c uk-margin-small-bottom"><br/>Información de Quien Recibe </h4>
                    <div class="uk-form-row">
                     <ul class="md-list md-list-addon">
                      <li>
                       <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE87C;</i></div>
                       <div class="md-list-content">
                       <div class="md-list-heading">
                        <span class="md-list-heading" id="ordenactual_personarecibeentrega">
                          <!--AJAX DE QUIEN RECIBE-->
                         </span>                        
                       </div>
                       <span class="uk-text-small uk-text-muted">Nombre Completo</span>
                      </div>
                     </li>
                     <li>
                      <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE0CF;</i></div>
                      <div class="md-list-content">
                       <div class="md-list-heading">
                        <span class="md-list-heading" id="ordenactual_telefonorecibeentrega">
                          <!--AJAX PARA LA TIPO DE SERVICIO DE ENTREGA-->
                        </span> 
                       </div>
                       <span class="uk-text-small uk-text-muted">Telefono</span>
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
            </div>
           </div>
        </div>
		
        <div id="marcarorden_add"><!--POP MARCAR ORDEN-->
          <div id="popup_marcarorden" class="uk-modal">
		  <div class="uk-modal-dialog">
           <button type="button" class="uk-modal-close uk-close uk-close-alt"></button>
            <div class="uk-modal-header">
             <h3 class="uk-modal-title"><i class="uk-icon-check-circle-o uk-icon-small"></i>&nbsp;Datos de Entrega</h3>
            </div>
            <form enctype="multipart/form-data" method="post" class="uk-form-horizontal" id="formevidenciaProductos" name="formevidenciaProductos">
             <div class="uk-form-row">
			 <h4 class="heading_c uk-margin-small-bottom">Evidencias de Productos </h4>
              <ul class="md-list md-list-addon">
               <li>
                <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>
                 <div class="uk-width-large-1-2">
                  <div class="md-list-content">
                   <div class="md-list-addon-element"><i class="material-icons">&#xE8D1;</i></div>
                    <div class="md-list-content">
                     <div class="md-list-heading">
                       <span class="md-list-heading" id="entrega_idorden"></span>
                     </div>
                     <span class="uk-text-small uk-text-muted">Número de Orden</span>
                    </div>
                  </div>
                </div>
                <div class="uk-width-large-1-2">
                 <div class="md-list-content">
                  <div class="md-list-heading">
                    <span class="md-list-heading" id="entrega_noproductpedido"></span>
                  </div>
                  <span class="uk-text-small uk-text-muted">No. Productos Pedidos</span>
                 </div>
                </div>
                </div>
               </li>
               <li>
                <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>
                 <div class="uk-width-large-1-2">
                  <div class="md-list-content">
                   <div class="md-list-addon-element"><i class="material-icons">&#xE877;</i></div>
                   <div class="md-list-content" >
                    <div class="md-list-heading">
                      <span class="md-list-heading" id="entrega_fchentrega"></span>
                    </div>
                    <span class="uk-text-small uk-text-muted">Fecha como Entregado</span>
                   </div>
                  </div>
                 </div>
                 <div class="uk-width-large-1-2">
                  <div class="md-list-content" >
                   <div class="md-list-heading" id="diventrega_statusentrega">
                    <select name="entrega_statusentrega" id="entrega_statusentrega" class="md-input" onChange="pendienteDesc()">
                      <option value="" disabled selected hidden>Status de Pedido</option>
                      <option value="ENTREGADO">ENTREGADO</option> 
                      <option value="PENDIENTE">PENDIENTE</option>
                    </select> 
                  </div>
                 </div>
                </div>
				
              </div> </li>
               <li>
                <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>
                 <div class="uk-width-large-1-2">
                  <label id="evidencia1Producto">1° Evidencia </label>
                  <input type="file" name="img1Productv1" id="img1Productv1" class="dropify" data-show-loader="false"  />
                 </div>
                 <div class="uk-width-large-1-2">
                  <label id="evidencia2Producto">2° Evidencia </label>
                  <input type="file" name="img2Productv1" id="img2Productv1" value="" class="dropify" />   
                 </div>
                </div>  
               </li>
               <li id="li_descripcionPendiente">
                <textarea cols="30" rows="2" class="md-input autosize" style="margin-top: 0px; margin-bottom: 0px; height: 2px;" placeholder="Descripción del porque el status es pendiente" id="descripcionpendiente"></textarea>
                </li>
              </ul>
             </div>
            </form><br>
			         
            <div class="uk-modal-footer"><!-- -->
             <button class="md-btn md-btn-block md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" type="button" onclick=marcarordenEntregada()>Enviar</button>
            </div>
           </div>
           </div></div>
		  
		  
		  
			
		   
          <!--MODIFICAR LA ORDEN DE ENTREGA -->  
          <div id="popupmodif_marcarorden" class="uk-modal"><div class="uk-modal-dialog">
           <button type="button" class="uk-modal-close uk-close uk-close-alt"></button>
            <div class="uk-modal-header">
             <h3 class="uk-modal-title"><i class="uk-icon-check-circle-o uk-icon-small"></i>&nbsp;Datos de Entrega</h3>
            </div>
            <form enctype="multipart/form-data" method="post" class="uk-form-horizontal" id="formevidenciaProductos_modif" name="formevidenciaProductos_modif">
             <div class="uk-form-row"><h4 class="heading_c uk-margin-small-bottom">Evidencias de Productos </h4>
              <ul class="md-list md-list-addon">
               <li>
                <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>
                 <div class="uk-width-large-1-2">
                  <div class="md-list-content">
                   <div class="md-list-addon-element"><i class="material-icons">&#xE8D1;</i></div>
                    <div class="md-list-content">
                     <div class="md-list-heading">
                       <span class="md-list-heading" id="entregamodif_idorden"></span>
                     </div>
                     <span class="uk-text-small uk-text-muted">Número de Orden</span>
                    </div>
                  </div>
                </div>
                <div class="uk-width-large-1-2">
                 <div class="md-list-content">
                  <div class="md-list-heading">
                    <span class="md-list-heading" id="entregamodif_noproductpedido"></span>
                  </div>
                  <span class="uk-text-small uk-text-muted">No. Productos Pedidos</span>
                 </div>
                </div>
                </div>
               </li>
               <li>
                <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>
                 <div class="uk-width-large-1-2">
                  <div class="md-list-content">
                   <div class="md-list-addon-element"><i class="material-icons">&#xE877;</i></div>
                   <div class="md-list-content" >
                    <div class="md-list-heading">
                      <span class="md-list-heading" id="entregamodif_fchentrega"></span>
                    </div>
                    <span class="uk-text-small uk-text-muted">Fecha Modificacion</span>
                   </div>
                  </div>
                 </div>
                 <div class="uk-width-large-1-2">
                  <div class="md-list-content" >
                   <div class="md-list-heading">
                    <select name="entregamodif_statusentrega" id="entregamodif_statusentrega" class="md-input">
                      <option value="" disabled selected hidden>Status de Pedido</option>
                      <option value="ENTREGADO">ENTREGADO</option> 
                      <option value="PENDIENTE">PENDIENTE</option>
                    </select> 
                  </div>
                 </div>
                </div> </div>
               </li>
               <li>
                <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>
                 <div class="uk-width-large-1-2">
                 <label id="evidencia1Productov2">1° Evidencia </label>
                  <input type="file" name="img1Productv2" id="img1Productv2"  value="" class="dropify" />
                 </div>
                 <div class="uk-width-large-1-2">
                  <label id="evidencia2Productov2">2° Evidencia </label>
                  <input type="file" name="img2Productv2" id="img2Productv2" value="" class="dropify" />   
                 </div>
                </div>  
               </li>
              </ul>
             </div>
            </form><br>
			
			
            <div class="uk-modal-footer"><!-- -->
             <button class="md-btn md-btn-block md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" type="button" onclick="marcarordenEntregadaModif()"> Modificar </button>
            </div>
           </div>
          </div>
		  
         
        </div><!-- end Contenido de Pestaña Ordenes -->

        <!--COMIENZA MIGUEL HTML -->
        <div id="contenido_Productos"><!-- Contenido de Pesta? Productos -->
          <!-- Contenido de Iitem de Producto en Linea -->
            <div id="productoslinea">
              <h3 class="heading_b uk-margin-bottom"> Productos de Línea </h3>
              <div id="productoslineaPlantilla" class="uk-grid uk-grid-medium uk-grid-width-medium-1-3 uk-grid-width-large-1-4" data-uk-grid-margin data-uk-grid-match="{target:'.md-card-content'}">
              </div>
              <!--/////////////////////////////////// -->
              <!--/////////////////////////////////// -->
              <!-- PopUp para eliminar de producto JS -->
              <div class="uk-width-medium-1-3" >
                <div class="uk-modal" id="popup_productEliminar" >
                  <div class="uk-modal-dialog">
                    <div class="uk-modal-header">
                      <h3 class="uk-modal-title" id="nombreEliminarH3">Usuario <i class="material-icons" data-uk-tooltip="{pos:'top'}" title="headline tooltip">&#xE8FD;</i></h3>
                    </div>
                    <div class="uk-grid" data-uk-grid-margin>
                      <div class="uk-width-medium-1-3">
                      </div>
                      <div class="uk-width-medium-1-3">
                      </div>                                      
                    </div>
                    <div class="uk-modal-footer uk-text-right">
                      <button type="button" class="md-btn md-btn-flat uk-modal-close">Cerrar</button><button data-uk-modal="{target:'#modal_new'}" type="button" class="md-btn md-btn-flat md-btn-flat-primary">Eliminar</button>
                    </div>
                  </div>
                </div>
                <div class="uk-modal" id="modal_new">
                  <div class="uk-modal-dialog">
                    <button type="button" class="uk-modal-close uk-close"></button>
                    <p class="uk-text-bold">Elimnacion Exitosa.</p>
                  </div>
                </div>
              </div>
              <!-- end PopUp para agregar un nuevo Producto Líea -->
              <!--uk-modal-dialog-blank uk-modal-dialog-large-->
              <div class="uk-modal" id="popup_nuevoproductolinea">
                <div class="uk-modal-dialog uk-modal-dialog-large">
                  <button type="button" class="uk-modal-close uk-close"></button>
                  <div class="uk-modal-header">
                    <h3 class="uk-modal-title"><i class="material-icons" data-uk-tooltip="{pos:'top'}">&#xE148;</i>&nbsp;&nbsp;Nuevo Producto en Línea</h3>
                  </div>
                  <div class="md-card">
                    <div class="md-card-content">
                      <form action="#" class="uk-form-stacked" id="altaproducto" name="altaproducto" novalidate>
                        <div class="md-card-content large-padding">
                          <div class="uk-grid uk-grid-divider uk-grid-collapse form_section form_section_separator" data-uk-grid-margin>
                            
                            <div class="uk-width-large-3-10">
                              <h4 class="heading_c uk-margin-small-bottom">1) Datos Generales </h4>
                              <ul class="md-list">
                                <li>
                                  <div class="uk-grid ">
                                    <div class="uk-width-large-1-1">
                                      <!--<div class="parsley-row">-->
                                        <!--<div class="md-input-wrapper">-->
                                          <label><span class="req"> * </span>Nombre del producto </label> <br/>
                                          <input type="text" name="alta_nombre_producto_linea" id="alta_nombre_producto_linea" required class="md-input" />
                                        <!--</div>-->
                                      <!--</div>-->
                                    </div> 
                                  </div>
                                  <br/>
                                </li>
                                <li>
                                  <div class="uk-grid ">
                                    <div class="uk-width-large-1-1">
                                      <label><span class="req"> * </span>Descripción</label> <br/>
                                      <textarea class="md-input" name="alta_descripcion_producto_linea" id="alta_descripcion_producto_linea" cols="30" rows="1"> </textarea>
                                    </div>                                    
                                  </div>
                                  <br/>
                                </li>
                                <li>
                                  <div class="uk-grid ">                                  
                                    <div id="ingredientesCheck" class="uk-width-large-1-1">
                                      <label><span class="req"> * </span>Ingredientes importantes</label> <br/>
                                      <!--<h5 class="heading_c uk-margin-small-bottom">Ingredientes importantes <span class="req"> * </span> </h5>-->
                                      <textarea class="md-input" name="alta_ingredientes_producto_linea" id="alta_ingredientes_producto_linea" cols="30" rows="1"></textarea>
                                    </div>
                                  </div>
                                  <br/>
                                </li>
                                <li>
                                  <div class="uk-grid">
                                    <div class="uk-width-large-1-1">
                                      <div class="uk-float-right"><!--data-switchery-->
                                        <input type="checkbox"  checked name="alta_activado_producto_linea" id="alta_activado_producto_linea" />
                                      </div>
                                      <label class="uk-display-block uk-margin-small-top uk-text-bold" for="product_edit_active_control">Activado</label>
                                    </div>
                                    <!--
                                    <div class="uk-width-medium-1-1 ">
                                      <label for="wizard_birth">SEO <span class="req"> * </span></label>
                                      <input type="text" name="alta_seo_producto_linea" id="alta_seo_producto_linea"  class="md-input" />
                                    </div>        
                                    -->
                                  </div>
                                  <br/>
                                </li>
                                <li>
                                  <div class="uk-grid">
                                    <div class="uk-width-medium-1-1">
                                      <h5 class="heading_c uk-margin-small-bottom">Tipo de producto </h5>
                                    </div>
                                    <div class="uk-width-medium-1-1 ">
                                      <div class="uk-input-group">
                                        <span class="uk-input-group-addon"> <i class="uk-icon-chevron-circle-right"> </i> </span>
                                        <div class="parsley-row">
                                          <label><span class="req"> * </span>Categoría</label> <br/>
                                          <!--<h5 class="heading_c uk-margin-small-bottom">Categoría <span class="req"> * </span></h5>-->

                                          <select id="alta_categoria_producto_linea" name="alta_categoria_producto_linea" class="md-input" data-uk-tooltip="{pos:'top'}" title="Select with tooltip">
                                            <option value="" disabled selected hidden></option>
                                          </select>
                                        </div>
                                      </div>        
                                    </div>
                                    <div class="uk-width-medium-1-1 ">
                                      <br/>
                                      <br/>
                                    </div>
                                    <div class="uk-width-medium-1-1 ">
                                      <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="uk-icon-chevron-circle-right"></i></span>
                                        <div class="parsley-row">
                                          <label><span class="req"> * </span>Clasificación</label> <br/>
                                          <!--<h5 class="heading_c uk-margin-small-bottom">Clasificación <span class="req"> * </span></h5>-->
                                          <select id="alta_clasificacion_producto_linea" name="alta_clasificacion_producto_linea" class="md-input" data-uk-tooltip="{pos:'top'}" title="Select with tooltip">
                                            <option value=""></option>
                                            <option value="" selected></option>
                                          </select>
                                        </div>
                                      </div>  
                                    </div>
                                  </div>
                                  
                                </li>                                
                              </ul>
                            </div>
                            <div class="uk-width-large-4-10">
                              <h4 class="heading_c uk-margin-small-bottom">2) Fotografías </h4>
                              <ul class="md-list">
                                <li>
                                  <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-1">
                                      <div class="md-card">
                                        <div class="md-card-content">
                                          <h5 id="alta_srcimg1_producto_linea_titulo">
                                              <span class="req"> * </span>Fotografía 1
                                          </h5>
                                          <input type="file" id="alta_srcimg1_producto_linea" name="srcimg1_producto" class="dropify" data-max-file-size="20000K" />
                                          <input type="hidden" id="alta_srcimg1_producto_lineaBD" name="srcimg1_productoBD" />
                                        </div>
                                      </div>
                                    </div>
                                    <div class="uk-width-medium-1-1">
                                      <div class="md-card">
                                        <div class="md-card-content">
                                          <h5 id="alta_srcimg2_producto_linea_titulo">
                                              <span class="req"> * </span>Fotografía 2 
                                          </h5>                                          
                                          <input type="file" id="alta_srcimg2_producto_linea" name="srcimg2_producto" class="dropify" data-max-file-size="20000K" />
                                          <input type="hidden" id="alta_srcimg2_producto_lineaBD" name="srcimg2_productoBD" />
                                        </div>
                                      </div>
                                    </div>
                                    <div class="uk-width-medium-1-1">
                                      <div class="md-card">
                                        <div class="md-card-content">
                                          <h5 id="alta_srcimg3_producto_linea_titulo">
                                              <span class="req"> * </span>Fotografía 3
                                          </h5>                                          
                                          <input type="file" id="alta_srcimg3_producto_linea" name="srcimg3_producto" class="dropify" data-max-file-size="20000K" />
                                          <input type="hidden" id="alta_srcimg3_producto_lineaBD" name="srcimg3_productoBD" />
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <br/>
                                </li>
                              </ul>
                            </div>

                            <div class="uk-width-large-3-10">
                              <h4 class="heading_c uk-margin-small-bottom">3) Detalles</h4>
                              <div class="uk-grid form_section" id="productdetalle">
                                <div class="uk-width-1-1">
                                  <div class="uk-grid">
                                    <div class="uk-width-large-1-2">                        
                                    </div>
                                    <div class="uk-width-large-1-2">
                                    </div>
                                  </div>
                                  <ul class="md-list">
                                    <li>
                                      <div class="uk-grid ">
                                        <div class="uk-width-large-1-1">
                                          <div class="uk-input-group">
                                            <span class="uk-input-group-addon"><i class="uk-icon-chevron-circle-right"></i></span>
                                            <div class="parsley-row">
                                              <label><span class="req"> * </span>Caract. Específica</label> <br/>
                                              <!--<h5 class="heading_c uk-margin-small-bottom"> Caract. Especifica</h5>-->
                                              <select id="alta_especificingredientes_producto_linea" name="alta_especificingredientes_producto_linea" class="md-input" data-uk-tooltip="{pos:'top'}" title="Select with tooltip">
                                                <option value="" disabled selected hidden></option>
                                              </select>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <br/>
                                    </li>
                                    <li>
                                      <div class="uk-grid">
                                        <div class="uk-width-medium-1-1">
                                          <h5 class="heading_c uk-margin-bottom" id="alta_forma_producto_linea_titulo">Forma del producto (elegir solo uno)</h5>
                                          <ul id="forma_producto" class="uk-subnav uk-subnav-pill" data-uk-switcher="{connect:'#switcher-content-a-fade', animation: 'fade'}">
                                            <li class="uk-active" onclick="activarModificarFormaProductoLinea('cuadrado');"> <a href="#"> Cuadrado </a> </li>
                                            <li> <a href="#" onclick="activarModificarFormaProductoLinea('circular');"> Circular </a> </li>
                                            <li> <a href="#" onclick="activarModificarFormaProductoLinea('piezas');"> Piezas </a> </li>
                                          </ul>
                                          <ul id="switcher-content-a-fade" class="uk-switcher uk-margin">
                                            <li>
                                              <div class="uk-width-1-1"> 
                                                <label><span class="req"> * </span>&nbsp;Largo(cm)</label>
                                                <br/>
                                                <input type="number" min="0" name="alta_clasifcateg_cuadrado_largo_producto_linea" id="alta_clasifcategproduct_cuadrado_largo_producto_linea" class="md-input" />
                                              </div>
                                              <div class="uk-width-1-1"> 
                                                <label><span class="req"> * </span>&nbsp;Ancho(cm)</label>
                                                <br/>
                                                <input type="number" min="0" name="alta_clasifcateg_cuadrado_ancho_producto_linea" id="alta_clasifcategproduct_cuadrado_ancho_producto_linea" class="md-input" />
                                              </div>
                                            </li>
                                            <li>
                                              <div class="uk-width-1-1">
                                                <label><span class="req"> * </span>&nbsp;Diámetro(cm)</label>
                                                <br/>
                                                <input type="number" min="0" name="alta_clasifcateg_circular_diametro_producto_linea" id="alta_clasifcategproduct_circular_diametro_producto_linea" class="md-input" />
                                              </div>
                                            </li>
                                            <li>
                                              <div class="uk-width-1-1">
                                                <label><span class="req"> * </span>&nbsp;Número de piezas</label>
                                                <br/>
                                                <input type="number" min="0" name="alta_clasifcateg_piezas_producto_linea" id="alta_clasifcategproduct_piezas_producto_linea" class="md-input" />
                                              </div>
                                            </li>
                                          </ul>
                                        </div>
                                      </div>
                                      <br/>
                                    </li>
                                    <li>
                                      <div class="uk-grid">
                                         <div class="uk-width-large-1-1">
                                          <h5 class="heading_c uk-margin-small-bottom">Otros Detalles</h5>
                                        </div>
										<div class="uk-width-large-1-1"><br/>
                                          <label><i class="material-icons md-10">&#xe541;</i> <span class="req"> * </span>&nbsp;Porciones </label><br/>
                                          <input type="number" class="md-input" min="0" name="alta_porciones_producto_linea" id="alta_porciones_producto_linea"  />
                                        </div>
										
										<div class="uk-width-large-1-1"><br/>
										
									
                                          <label><i class="material-icons md-10">&#xe89e;</i> <span class="req"> * </span>&nbsp;Tamaño </label><br/>
                                        <select id="alta_tamanio_producto_linea" name="alta_tamanio_producto_linea" class="md-input" data-uk-tooltip="{pos:'top'}" title="Select with tooltip">
                                           <option value="" disabled selected hidden>Selecciona...</option>
                                           </select> 
										   
											  </div>
										
                                        <div class="uk-width-large-1-1"><br/>
                                          <label><i class="uk-icon-calendar "></i><span class="req"> * </span>&nbsp;Días en elaborar </label><br/>
                                          <input type="number" class="md-input" min="0" name="alta_detalle_diasElborar_producto_linea" id="alta_detalle_diasElborar_producto_linea"  />
                                        </div>
                                        <div class="uk-width-large-1-1"><br/>
                                          <label><i class="uk-icon-usd"></i><span class="req"> * </span>&nbsp;Precio</label><br/>
                                          <input type="number" class="md-input" min="0" name="alta_detalle_precioreal_producto_linea" id="alta_detalle_precioreal_producto_linea" />
                                        </div>
                                        <div class="uk-width-large-1-1"><br/>
                                          <label><i class="uk-icon-cubes"></i><span class="req"> * </span>&nbsp;Stock</label><br/>
                                          <input type="number" class="md-input" min="0" name="alta_detalle_stock_producto_linea" id="alta_detalle_stock_producto_linea" />
                                        </div>
                                      </div>
                                      <br/>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div> 
                      </form>
                    </div>
                  </div>
                  <div class="uk-modal-footer uk-text-right">
                    <button type="button"  class="md-btn md-btn-flat md-btn-flat-primary" onclick="UIkit.modal.confirm('¿Desea Guardar y Registrar?', function(){ validarFormulario('form_alta_productos_linea');  });">Agregar Producto </button> 
                  </div>
                </div>  
              </div>
              <!--data-uk-modal="{target:'#popup_spinner_registrando_producto'}"-->
              <!--/////////////////////////////////// -->
              <!--/////////////////////////////////// -->              
              <!-- PopUp para alta de Producto Detalle-->
              <div class="uk-modal" id="popup_nuevoproductodetallelinea">
                <div class="uk-modal-dialog ">
                  <button type="button" class="uk-modal-close uk-close" onclick="">                    
                  </button>
                  <div class="uk-modal-header">
                    <h3 class="uk-modal-title">
                      <i class="material-icons" data-uk-tooltip="{pos:'top'}">
                        &#xE254;
                      </i>
                      &nbsp;&nbsp;Alta Producto Detalle
                    </h3>
                  </div>
                  <!--<form action="" class="uk-form-large" id="product_edit_form">-->
                  <form action="" class="uk-form-large" id="formAltaProductoDetalleLinea">
                    <div class="uk-grid uk-grid-medium" data-uk-grid-margin >
                      <div class="uk-width">
                        <div class="md-card">
                          <div class="md-card-content large-padding">
                            <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>
                              <div class="uk-width">
                                <div class="uk-form-row">
                                  <label for="product_edit_name_control"> 
                                    Solo lectura                                   
                                  </label>
                                  <br/>
                                  <input type="text" name="alta_nombre_producto_detalle_linea" id="alta_nombre_producto_detalle_linea" class="md-input md-bg-grey-300" readonly />
                                  <input type="hidden" name="alta_id_producto_detalle_linea" id="alta_id_producto_detalle_linea" class="md-input" readonly />
                                  <input type="hidden" name="alta_id_productoDetalle_detalle_linea" id="alta_id_productoDetalle_detalle_linea" class="md-input" readonly />
                                </div>
                                <div class="uk-form-row">
                                  <div class="uk-float-right" id="div_checkbox_alta_activado_producto_detalle_linea" name="div_checkbox_alta_activado_producto_detalle_linea">
                                    <input type="checkbox" name="alta_activado_producto_detalle_linea" id="alta_activado_producto_detalle_linea" />
                                  </div>
                                  <label class="uk-display-block uk-margin-small-top uk-text-bold" for="product_edit_active_control">
                                    Activado
                                  </label>                                  
                                  <br/>
                                </div>
                                <div class="uk-form-row">
                                  <label><!--class="uk-form-label" for="product_edit_memory_control"-->
                                    <span class="req"> * </span>
                                    Caract. Específica                                    
                                  </label><br/>
                                  <select id="alta_especificingredientes_producto_detalle_linea" name="alta_especificingredientes_producto_detalle_linea" class="md-input" data-uk-tooltip="{pos:'top'}" title="Select with tooltip">
                                    <option value="" disabled selected hidden></option>
                                  </select>
                                  <br/>
                                </div>
                                <div class="uk-form-row">
                                  <!--<div class="uk-input-group">-->
                                    <h5 class="heading_c uk-margin-bottom" id="alta_forma_producto_linea_detalle_titulo"><span class="req"> * </span>Forma del producto (elegir solo uno)</h5>
                                    <ul id="alta_forma_producto_detalle" class="uk-subnav uk-subnav-pill" data-uk-switcher="{connect:'#alta_switcher-content-a-fade', animation: 'fade'}">
                                      <li id="alta_tab_cuadrado_detalle" class="uk-active"> <a href="#" onclick="activarModificarFormaProductoLinea('cuadrado');"> Cuadrado </a> </li>
                                      <li id="alta_tab_circulo_detalle"> <a href="#" onclick="activarModificarFormaProductoLinea('circular');"> Circular </a> </li>
                                      <li id="alta_tab_piezas_detalle"> <a href="#" onclick="activarModificarFormaProductoLinea('piezas');"> Piezas </a> </li>
                                    </ul>
                                    <ul id="alta_switcher-content-a-fade" class="uk-switcher uk-margin">
                                      <li>
                                        <div class="uk-width-1-1"> 
                                          <label>&nbsp;Largo(cm)</label>
                                          <br/>
                                          <input type="number" min="0" name="alta_clasifcategproduct_cuadrado_largo_producto_detalle_linea" id="alta_clasifcategproduct_cuadrado_largo_producto_detalle_linea" class="md-input" />
                                        </div>
                                        <div class="uk-width-1-1"> 
                                          <label>&nbsp;Ancho(cm)</label>
                                          <br/>
                                          <input type="number" min="0" name="alta_clasifcategproduct_cuadrado_ancho_producto_detalle_linea" id="alta_clasifcategproduct_cuadrado_ancho_producto_detalle_linea" class="md-input" />
                                        </div>
                                      </li>
                                      <li>
                                        <div class="uk-width-1-1">
                                          <label>&nbsp;Diámetro(cm)</label>
                                          <br/>
                                          <input type="number" min="0" name="alta_clasifcategproduct_circular_diametro_producto_detalle_linea" id="alta_clasifcategproduct_circular_diametro_producto_detalle_linea" class="md-input" />
                                        </div>
                                      </li>
                                      <li>
                                        <div class="uk-width-1-1">
                                          <label>&nbsp;Número de piezas</label>
                                          <br/>
                                          <input type="number" min="0" name="alta_clasifcategproduct_piezas_producto_detalle_linea" id="alta_clasifcategproduct_piezas_producto_detalle_linea" class="md-input" />
                                        </div>
                                      </li>
                                    </ul>
                                    <br/>
                                  <!--</div>-->
                                </div>
								
								<!-- ....reyna--->
								<div class="uk-form-row">
                                  <div class="uk-input-group">
                                    <span class="uk-input-group-addon">
                                     <i class="material-icons md-10">&#xe541;</i>
                                    </span>
                                    <label for="product_edit_quantity_control">           
                                      <span class="req"> * </span>                          
                                      Porciones                                                       
                                    </label>
                                    <br/>
                                    <input type="number" min="0" class="md-input" name="alta_detalle_porciones_producto_detalle_linea" id="alta_detalle_porciones_producto_detalle_linea"  />
                                  </div>
                                </div>
								<div class="uk-form-row">
                                  <div class="uk-input-group">
                                     <span class="uk-input-group-addon">
									 <i class="material-icons md-10">&#xe89e;</i> 
									 </span>
									 <label for="product_edit_quantity_control">  
									 <span class="req"> * </span>Tamaño </label><br/>
                                     <select id="alta_detalle_tamanio_producto_detalle_linea" name="alta_detalle_tamanio_producto_detalle_linea" class="md-input" data-uk-tooltip="{pos:'top'}" title="Select with tooltip">
                                    <option value="" disabled selected hidden>Selecciona...</option>
                                        </select> 
								  </div>
                                </div>
								
								
								<!--........... -->
                                <div class="uk-form-row">
                                  <div class="uk-input-group">
                                    <span class="uk-input-group-addon">
                                      <i class="uk-icon-calendar"></i>
                                    </span>
                                    <label for="product_edit_quantity_control">           
                                      <span class="req"> * </span>                          
                                      Días de Elaboración                                                        
                                    </label>
                                    <br/>
                                    <input type="number" min="0" class="md-input" name="alta_detalle_diasElborar_producto_detalle_linea" id="alta_detalle_diasElborar_producto_detalle_linea"  />
                                  </div>
                                </div>
                                <div class="uk-form-row">
                                  <div class="uk-input-group">
                                    <span class="uk-input-group-addon">                                      
                                      <i class="uk-icon-usd"></i>
                                    </span>
                                    <label for="product_edit_quantity_control">
                                      <span class="req"> * </span>
                                      Precio                                      
                                    </label>
                                    <br/>
                                    <input type="number" min="0" class="md-input" name="alta_detalle_precio_producto_detalle_linea" id="alta_detalle_precio_producto_detalle_linea"  />
                                  </div>
                                </div>
                                <div class="uk-form-row">
                                  <div class="uk-input-group">
                                    <span class="uk-input-group-addon">
                                      <i class="uk-icon-cubes"></i>
                                    </span>
                                    <label for="product_edit_quantity_control">
                                      <span class="req"> * </span>
                                      Stock                                       
                                    </label>                                  
                                    <br/>
                                    <input type="number" min="0" class="md-input" name="alta_detalle_stock_producto_detalle_linea" id="alta_detalle_stock_producto_detalle_linea" />
                                  </div>
                                </div>
                                
                              </div>                              
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                  <div class="uk-modal-footer uk-text-right">
                    <!-- Boton  para abrir el PopUp de modificaci? de Datos Generales de un Producto -->
                    <!--<button type="button" class="md-btn md-btn-flat md-btn-small" data-uk-modal="{target:'#popup_modificarproductolineageneral',bgclose:false,modal:false,modal:false}">
                      Modif. Datos General
                    </button>-->
                    <!-- Boton para aceptar la actualizar de las modificaciones de Datos especificos de un Producto -->
                    <button type="button" class="md-btn md-btn-flat md-btn-small md-btn-flat-primary" onclick="UIkit.modal.confirm('¿Desea Guardar los Cambios?',  function(){ validarFormulario('form_alta_productos_linea_detalle'); });">
                      AGREGAR PRODUCTO
                    </button>
                  </div>
                </div>   
              </div>
              <!--</div>-->
              <!--</div>-->
              <!--end PopUp para alta de Producto Detalle--> 
              <!--/////////////////////////////////// -->              
              <!-- PopUp para modificación de Datos Especificos de un Producto -->
              <div class="uk-modal" id="popup_modificarproductolinea">
                <div class="uk-modal-dialog ">
                  <button type="button" class="uk-modal-close uk-close">                    
                  </button>
                  <div class="uk-modal-header">
                    <h3 class="uk-modal-title">
                      <i class="material-icons" data-uk-tooltip="{pos:'top'}">
                        &#xE254;
                      </i>
                      &nbsp;&nbsp;Detalles Específicos de Producto
                    </h3>
                  </div>
                  <!--<form action="" class="uk-form-large" id="product_edit_form">-->
                  <form action="" class="uk-form-large" id="formActualizarProductoLinea">
                    <div class="uk-grid uk-grid-medium" data-uk-grid-margin >
                      <div class="uk-width">
                        <div class="md-card">
                          <div class="md-card-content large-padding">
                            <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>
                              <div class="uk-width">
                                <div class="uk-form-row">
                                  <label for="product_edit_name_control"> 
                                    Solo lectura                                   
                                  </label>
                                  <br/>
                                  <input type="text" name="modificar_nombre_producto_linea" id="modificar_nombre_producto_linea" class="md-input md-bg-grey-300" readonly />
                                  <input type="hidden" name="modificar_id_producto_linea" id="modificar_id_producto_linea" class="md-input" readonly />
                                  <input type="hidden" name="modificar_id_productoDetalle_linea" id="modificar_id_productoDetalle_linea" class="md-input" readonly />
                                </div>
                                <div class="uk-form-row">
                                  <div class="uk-float-right" id="div_checkbox_modificar_activado_producto_linea" name="div_checkbox_modificar_activado_producto_linea">
                                    <input type="checkbox" name="modificar_activado_producto_linea" id="modificar_activado_producto_linea" />
                                  </div>
                                  <label class="uk-display-block uk-margin-small-top uk-text-bold" for="product_edit_active_control">
                                    Activado
                                  </label>                                  
                                  <br/>
                                </div>
                                <div class="uk-form-row">
                                  <label><!--class="uk-form-label" for="product_edit_memory_control"-->
                                    <span class="req"> * </span>
                                    Caract. Específica                                    
                                  </label><br/>
                                  <select id="modificar_especificingredientes_producto_linea" name="modificar_especificingredientes_producto_linea" class="md-input" data-uk-tooltip="{pos:'top'}" title="Select with tooltip">
                                    <option value="" disabled selected hidden></option> 
                                  </select>
                                  <br/>
                                </div>
                                <div class="uk-form-row">
                                  <!--<div class="uk-input-group">-->
                                    <h5 class="heading_c uk-margin-bottom" id="modificar_forma_producto_linea_titulo">Forma del producto (elegir solo uno)</h5>
                                    <ul id="modificar_forma_producto" class="uk-subnav uk-subnav-pill" data-uk-switcher="{connect:'#modificar_switcher-content-a-fade', animation: 'fade'}">
                                      <li id="modificar_tab_cuadrado" class=""> <a href="#" onclick="activarModificarFormaProductoLinea('cuadrado');"> Cuadrado </a> </li>
                                      <li id="modificar_tab_circulo" class=""> <a href="#" onclick="activarModificarFormaProductoLinea('circular');"> Circular </a> </li>
                                      <li id="modificar_tab_piezas" class=""> <a href="#" onclick="activarModificarFormaProductoLinea('piezas');"> Piezas </a> </li>
                                    </ul>
                                    <ul id="modificar_switcher-content-a-fade" class="uk-switcher uk-margin">
                                      <li>
                                        <div class="uk-width-1-1"> 
                                          <label><span class="req"> * </span>&nbsp;Largo(cm)</label>
                                          <br/>
                                          <input type="number" min="0" name="modificar_clasifcategproduct_cuadrado_largo_producto_linea" id="modificar_clasifcategproduct_cuadrado_largo_producto_linea" class="md-input" />
                                        </div>
                                        <div class="uk-width-1-1"> 
                                          <label><span class="req"> * </span>&nbsp;Ancho(cm)</label>
                                          <br/>
                                          <input type="number" min="0" name="modificar_clasifcategproduct_cuadrado_ancho_producto_linea" id="modificar_clasifcategproduct_cuadrado_ancho_producto_linea" class="md-input" />
                                        </div>
                                      </li>
                                      <li>
                                        <div class="uk-width-1-1">
                                          <label><span class="req"> * </span>&nbsp;Diámetro(cm)</label>
                                          <br/>
                                          <input type="number" min="0" name="modificar_clasifcategproduct_circular_diametro_producto_linea" id="modificar_clasifcategproduct_circular_diametro_producto_linea" class="md-input" />
                                        </div>
                                      </li>
                                      <li>
                                        <div class="uk-width-1-1">
                                          <label><span class="req"> * </span>&nbsp;Número de piezas</label>
                                          <br/>
                                          <input type="number" min="0" name="modificar_clasifcategproduct_piezas_producto_linea" id="modificar_clasifcategproduct_piezas_producto_linea" class="md-input" />
                                        </div>
                                      </li>
                                    </ul>
                                    <br/>
                                  <!--</div>-->
                                </div>
								<!-- reyna...... -->
								<div class="uk-form-row">
                                  <!--<div class="uk-input-group">
                                    <span class="uk-input-group-addon">
                                     <i class="material-icons md-10">&#xe541;</i>
                                    </span> -->
									
                                    <label for="product_edit_quantity_control">           
                                      <span class="req"> * </span>                          
                                      Porciones                                                        
                                    </label>
                                    <br/>
                                    <input type="number" min="0" class="md-input" name="modificar_detalle_porciones_producto_linea" id="modificar_detalle_porciones_producto_linea"  />
                                  <!-- </div> -->
                                </div>
								
								 <div class="uk-form-row">
                                  <label><!--class="uk-form-label" for="product_edit_memory_control"--> 
                                    <span class="req"> * </span>
                                    Tamaño                                    
                                  </label><br/>
                                  <select id="modificar_detalle_tamanio_producto_linea" name="modificar_detalle_tamanio_producto_linea" class="md-input" data-uk-tooltip="{pos:'top'}" title="Select with tooltip">
                                    <option value="" disabled selected hidden>Selecciona...</option>
                                  </select>
                                  <br/>
                                </div>
								
								<!-- ....... -->
                                <div class="uk-form-row">
                                  <div class="uk-input-group">
                                    <span class="uk-input-group-addon">
                                      <i class="uk-icon-calendar"></i>
                                    </span>
                                    <label for="product_edit_quantity_control">           
                                      <span class="req"> * </span>                          
                                      Días de Elaboración                                                        
                                    </label>
                                    <br/>
                                    <input type="number" min="0" class="md-input" name="modificar_detalle_diasElborar_producto_linea" id="modificar_detalle_diasElborar_producto_linea"  />
                                  </div>  
                                </div>
                                <div class="uk-form-row">
                                  <div class="uk-input-group">
                                    <span class="uk-input-group-addon">                                      
                                      <i class="uk-icon-usd"></i>
                                    </span>
                                    <label for="product_edit_quantity_control">
                                      <span class="req"> * </span>
                                      Precio                                      
                                    </label>
                                    <br/>
                                    <input type="number" min="0" class="md-input" name="modificar_detalle_precio_producto_linea" id="modificar_detalle_precio_producto_linea"  />
                                  </div>
                                </div>
                                <div class="uk-form-row">
                                  <div class="uk-input-group">
                                    <span class="uk-input-group-addon">
                                      <i class="uk-icon-cubes"></i>
                                    </span>
                                    <label for="product_edit_quantity_control">
                                      <span class="req"> * </span>
                                      Stock                                       
                                    </label>                                  
                                    <br/>
                                    <input type="number" min="0" class="md-input" name="modificar_detalle_stock_producto_linea" id="modificar_detalle_stock_producto_linea" />
                                  </div>
                                </div>
                                
                              </div>                              
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                  <div class="uk-modal-footer uk-text-right">
                    <!-- Boton  para abrir el PopUp de modificaci? de Datos Generales de un Producto -->
                    <button type="button" class="md-btn md-btn-flat md-btn-small" data-uk-modal="{target:'#popup_modificarproductolineageneral',bgclose:false,modal:false,modal:false}">
                      Modif. Datos General
                    </button>
                    <!-- Boton para aceptar la actualizar de las modificaciones de Datos especificos de un Producto -->
                    <button type="button" class="md-btn md-btn-flat md-btn-small md-btn-flat-primary" onclick="UIkit.modal.confirm('¿Desea Guardar los Cambios?',  function(){ validarFormulario('form_modificar_productos_linea_detalle'); });">
                      Actualizar
                    </button>
                  </div>
                </div>   
              </div>
              <!--</div>-->
              <!--end PopUp de datos especificos-->              
              <!-- PopUp para modificaci? de Datos generales de un Producto -->
              <!--<div class="uk-modal" id="popup_productgeneral">-->
              <div class="uk-modal" id="popup_modificarproductolineageneral">
                <div class="uk-modal-dialog uk-modal-dialog-large">
                  <button type="button" class="uk-modal-close uk-close">                  
                  </button>
                  <div class="uk-modal-header">
                    <h3 class="uk-modal-title">
                      <i class="material-icons" data-uk-tooltip="{pos:'top'}">
                        &#xE254;
                      </i>
                      &nbsp;&nbsp;Detalles Generales de Producto
                    </h3>
                  </div>
                  <form id="formActualizarProductoLineaGeneral" name="formActualizarProductoLineaGeneral" action="" class="uk-form-stacked">
                    <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                      <div class="uk-width-large-4-10">
                        <div class="md-card">
                          <div class="md-card-toolbar">
                            <h3 class="md-card-toolbar-heading-text">Datos</h3>
                          </div>
                          <div class="md-card-content large-padding">
                            <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>
                              <div class="uk-width-large-1-1">
                                <div class="uk-form-row">
                                  <label for="product_edit_name_control"><span class="req"> * </span>Nombre de producto</label>
                                  <input type="text" class="md-input" id="modificar_nombre_producto_linea_general" name="modificar_nombre_producto_linea_general" value="Nombre Producto "/>
                                </div>
                                <div class="uk-form-row">
                                  <label for="product_edit_memory_control" class="uk-form-label">
                                    <span class="req"> * </span>Categoría del producto
                                  </label>
                                  <select id="modificar_categoria_producto_linea_general" name="modificar_categoria_producto_linea_general" class="md-input" data-uk-tooltip="{pos:'top'}" title="Select with tooltip">
                                    <option value="" disabled selected hidden></option>
                                  </select>
                                </div>
                                <div class="uk-form-row">
                                  <label for="product_edit_memory_control" class="uk-form-label">
                                    <span class="req"> * </span>Clasificación
                                  </label>
                                  <select id="modificar_clasificacion_producto_linea_general" name="modificar_clasificacion_producto_linea_general" class="md-input" data-uk-tooltip="{pos:'top'}" title="Select with tooltip">
                                    <option value="" disabled selected hidden></option>
                                  </select>
                                </div>
                                <!--
                                <div class="uk-form-row">
                                  <label for="product_edit_manufacturer_control">Activo</label>
                                  <div class="uk-float-right">
                                    <input type="checkbox" name="modificar_activado_producto_linea_general" id="modificar_activado_producto_linea_general" />
                                  </div>
                                </div>
                                -->
                              <!--
                              </div>
                              <div class="uk-width-large-1-1">-->
                                <div class="uk-form-row">
                                  <label for="product_edit_description_control"><span class="req"> * </span>Descripción</label><br/>
                                  <textarea class="md-input" name="modificar_descripcion_producto_linea_general" id="modificar_descripcion_producto_linea_general" cols="10" rows="1"></textarea>
                                </div>
                                <div class="uk-form-row">
                                  <label for="product_edit_description_control"><span class="req"> * </span>Ingredientes</label><br/>                                  
                                  <textarea class="md-input" name="modificar_ingredientes_producto_linea_general" id="modificar_ingredientes_producto_linea_general" cols="10" rows="1"></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="uk-width-large-6-10">
                        <input type="hidden" id="modificar_id_producto_linea_general" name="modificar_id_producto_linea_general"> 
                        <!--uk-margin-large-bottom-->
                        <div class="md-card ">
                          <div class="md-card-toolbar">
                            <h3 class="md-card-toolbar-heading-text">Fotografías</h3>
                          </div>
                          <div class="md-card-content" >
                            <!--<h3 class="heading_a uk-margin-bottom"></h3>-->
                            <h4>Fotografías actuales del producto</h4>
                            <div  id="modificar_galeria_producto_linea_general" class="uk-grid" data-uk-grid-margin>
                            </div>
                          </div>      
                          <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-3">
                              <div class="md-card">
                                <div class="md-card-content">
                                  <h5 id="modificar_srcimg1_producto_linea_titulo">
                                      Fotografía 1
                                  </h5>
                                  <input type="file" id="modificar_srcimg1_producto_linea" name="srcimg1_producto" class="dropify" data-max-file-size="20000K"/>
                                  <input type="hidden" id="modificar_srcimg1_producto_lineaBD" name="srcimg1_productoBD" />
                                </div>
                              </div>
                            </div>
                            <div class="uk-width-medium-1-3">
                              <div class="md-card">
                                <div class="md-card-content">
                                  <h5 id="modificar_srcimg2_producto_linea_titulo">
                                      Fotografía 2
                                  </h5>
                                  <input type="file" id="modificar_srcimg2_producto_linea" name="srcimg2_producto" class="dropify" data-max-file-size="20000K" />
                                  <input type="hidden" id="modificar_srcimg2_producto_lineaBD" name="srcimg2_productoBD" />
                                </div>
                              </div>
                            </div>
                            <div class="uk-width-medium-1-3">
                              <div class="md-card">
                                <div class="md-card-content">
                                  <h5 id="modificar_srcimg3_producto_linea_titulo">
                                      Fotografía 3
                                  </h5>
                                  <input type="file" id="modificar_srcimg3_producto_linea" name="srcimg3_producto" class="dropify" data-max-file-size="20000K" />
                                  <input type="hidden" id="modificar_srcimg3_producto_lineaBD" name="srcimg3_productoBD" />
                                </div>
                              </div>
                            </div>
                          </div>                          
                        </div>
                        
                      </div>                      
                    </div>
                    <div class="uk-modal-footer uk-text-right">
                        <!-- Boton para eliminar un Producto en su totalidad-->
                      <!--<button type="button" class="md-btn md-btn-flat" onclick="UIkit.modal.confirm('?Elimianr el Producto?', function(){ UIkit.modal.alert('Eliminado!'); });">Eliminar</button>-->
                      <!-- Boton para actualizar las modificaciones de Datos Generales de un Producto -->
                      <button type="button" class="md-btn md-btn-flat md-btn-flat-primary" onclick="UIkit.modal.confirm('¿Desea Guardar los Cambios?', function(){ validarFormulario('form_modificar_productos_linea_general') });">Actualizar </button>
                    </div>
                  </form>
                </div>
              </div>
              <!-- PopUp para modificaci? de Datos generales de un Producto -->
            </div><!-- end Contenido de Item de Producto en Linea -->
            <!--CONTE -->
            <!--Linea divisora-->
            <div>
              <hr>
            </div>
            <div id="productoscotizador">
              <h3 class="heading_b uk-margin-bottom"> Productos de Cotizador </h3>
              <div id="productoscotizadorPlantilla" class="uk-grid uk-grid-medium uk-grid-width-medium-1-3 uk-grid-width-large-1-4" data-uk-grid-margin data-uk-grid-match="{target:'.md-card-content'}">
              </div>
              <!--/////////////////////////////////// -->
              <!--/////////////////////////////////// -->
              <!-- PopUp para eliminar de producto JS -->
              <div class="uk-width-medium-1-3" >
                <div class="uk-modal" id="popup_productEliminar_cotizador" >
                  <div class="uk-modal-dialog">
                    <div class="uk-modal-header">
                      <h3 class="uk-modal-title" id="nombreEliminarH3">Usuario <i class="material-icons" data-uk-tooltip="{pos:'top'}" title="headline tooltip">&#xE8FD;</i></h3>
                    </div>
                    <div class="uk-grid" data-uk-grid-margin>
                      <div class="uk-width-medium-1-3">
                      </div>
                      <div class="uk-width-medium-1-3">
                      </div>                                      
                    </div>
                    <div class="uk-modal-footer uk-text-right">
                      <button type="button" class="md-btn md-btn-flat uk-modal-close">Cerrar</button><button data-uk-modal="{target:'#modal_new'}" type="button" class="md-btn md-btn-flat md-btn-flat-primary">Eliminar</button>
                    </div>
                  </div>
                </div>
                <div class="uk-modal" id="modal_new">
                  <div class="uk-modal-dialog">
                    <button type="button" class="uk-modal-close uk-close"></button>
                    <p class="uk-text-bold">Elimnacion Exitosa.</p>
                  </div>
                </div>
              </div>            
              <div class="uk-modal" id="popup_nuevoproductocotizador">
                <div class="uk-modal-dialog uk-modal-dialog-large">
                  <button type="button" class="uk-modal-close uk-close"></button>
                  <div class="uk-modal-header">
                    <h3 class="uk-modal-title"><i class="material-icons" data-uk-tooltip="{pos:'top'}">&#xE148;</i>&nbsp;&nbsp;Nuevo Producto de Cotizador</h3>
                  </div>
                  <div class="md-card">
                    <div class="md-card-content">
                      <form action="" class="uk-form-stacked" id="altaproductocotizador" name="altaproductocotizador">
                        <div class="md-card-content large-padding">
                          <div class="uk-grid uk-grid-divider uk-grid-medium form_section form_section_separator" data-uk-grid-margin>
                            <div class="uk-width-large-4-10">
                              <h4 class="heading_c uk-margin-small-bottom">Datos Generales </h4>
                              <ul class="md-list">
                                <li>
                                  <div class="uk-grid ">
                                    <div class="uk-width-large-1-1">
                                      <label><span class="req"> * </span>Nombre del producto</label> <br/>
                                      <input type="text" name="alta_nombre_producto_cotizador" id="alta_nombre_producto_cotizador" class="md-input" />
                                    </div> 
                                  </div>
                                  <br/>
                                </li>
                                <li>
                                  <div class="uk-grid ">
                                    <div class="uk-width-large-1-1">
                                      <label><span class="req"> * </span>Descripción</label> <br/>
                                      <textarea class="md-input" name="alta_descripcion_producto_cotizador" id="alta_descripcion_producto_cotizador" cols="30" rows="1"> </textarea>
                                    </div>                                    
                                  </div>
                                  <br/>
                                </li>
                                <li>
                                  <div class="uk-grid ">
                                     <div id="ingredientesCheck" class="uk-width-large-1-1">
                                      <!--<h5 class="heading_c uk-margin-small-bottom"><span class="req"> * </span>Ingredientes importantes</h5>-->
                                      <label><span class="req"> * </span>Ingredientes importantes</label>
                                      <textarea class="md-input" name="alta_ingredientes_producto_cotizador" id="alta_ingredientes_producto_cotizador" cols="30" rows="1"></textarea>
                                     </div>
                                  </div>
                                  <br/>
                                </li>

                                <li>
                                  <div class="uk-grid">
                                    <div class="uk-width-large-1-1">
                                    </div>
                                    <div class="uk-width-large-1-1"><br/>
                                      <label><i class="uk-icon-calendar "></i><span class="req"> * </span>&nbsp;Días en Elaborar</label><br/>
                                      <input type="number" min="0" class="md-input" name="alta_detalle_diasElborar_producto_cotizador" id="alta_detalle_diasElborar_producto_cotizador"  />
                                    </div>
                                  </div>
                                  <br/>
                                </li>                                
                              </ul>
                            </div>

                          <!--</div>-->
                            <div class="uk-width-large-6-10">                              
                              <ul class="md-list">
                                <li>
                                  <div class="uk-grid">
                                    <div class="uk-width-large-1-1">
                                      <div class="uk-float-right"><!--data-switchery-->
                                        <input type="checkbox" checked name="alta_activado_producto_cotizador" id="alta_activado_producto_cotizador" />
                                      </div>
                                      <label class="uk-display-block uk-margin-small-top uk-text-bold" for="product_edit_active_control">Activado</label>
                                    </div>
                                  </div>
                                  <br/>
                                </li>
                                <li>
                                  <div class="uk-grid">
                                    <div class="uk-width-medium-1-1">
                                      <!--<h5 class="heading_c uk-margin-small-bottom"><span class="req"> * </span>Tipo de evento</h5>-->
                                      <label for="product_edit_memory_control" class="uk-form-label"><span class="req"> * </span>Evento</label>
                                    </div>
                                    <div class="uk-width-medium-1-1 ">
                                      <div class="uk-input-group">
                                        <span class="uk-input-group-addon"> <i class="uk-icon-chevron-circle-right"> </i> </span>
                                        <!--<div class="parsley-row">-->
                                          <!--<label for="product_edit_memory_control" class="uk-form-label"><span class="req"> * </span>Evento</label>-->
                                          <select id="alta_evento_producto_cotizador" name="alta_evento_producto_cotizador" class="md-input" data-uk-tooltip="{pos:'top'}" title="Select with tooltip">
                                            <option value="" disabled selected hidden></option>
                                          </select>
                                        <!--</div>-->
                                      </div>        
                                    </div>
                                  </div>
                                  <br/>
                                </li>
                                
                                <li>
                                  <h4 class="heading_c uk-margin-small-bottom">Fotografías</h4>
                                  <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3">
                                      <div class="md-card">
                                        <div class="md-card-content">
                                          <label id="alta_srcimg1_producto_cotizador_titulo"><span class="req"> * </span>Fotografía 1</label>
                                          <!--
                                          <h5 id="alta_srcimg1_producto_cotizador_titulo">
                                              Fotografía 1
                                          </h5>
                                          -->
                                          <input type="file" id="alta_srcimg1_producto_cotizador" name="srcimg1_producto" class="dropify" data-max-file-size="20000K" />
                                          <input type="hidden" id="alta_srcimg1_producto_cotizadorBD" name="srcimg1_productoBD" />
                                        </div>
                                      </div>
                                    </div>
                                    <div class="uk-width-medium-1-3">
                                      <div class="md-card">
                                        <div class="md-card-content">
                                          <label id="alta_srcimg2_producto_cotizador_titulo"><span class="req"> * </span>Fotografía 2</label>
                                          <!--
                                          <h5 id="alta_srcimg2_producto_cotizador_titulo">
                                              Fotografía 2
                                          </h5>
                                          -->
                                          <input type="file" id="alta_srcimg2_producto_cotizador" name="srcimg2_producto" class="dropify" data-max-file-size="20000K" />
                                          <input type="hidden" id="alta_srcimg2_producto_cotizadorBD" name="srcimg2_productoBD" />
                                        </div>
                                      </div>
                                    </div>
                                    <div class="uk-width-medium-1-3">
                                      <div class="md-card">
                                        <div class="md-card-content">
                                          <label id="alta_srcimg3_producto_cotizador_titulo"><span class="req"> * </span>Fotografía 3</label>
                                          <!--
                                          <h5 id="alta_srcimg3_producto_cotizador_titulo">
                                              Fotografía 3
                                          </h5>
                                          -->
                                          <input type="file" id="alta_srcimg3_producto_cotizador" name="srcimg3_producto" class="dropify" data-max-file-size="20000K" />
                                          <input type="hidden" id="alta_srcimg3_producto_cotizadorBD" name="srcimg3_productoBD" />
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <br/>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div> 
                      </form>
                    </div>
                  </div>
                  <div class="uk-modal-footer uk-text-right">
                    <button type="button" class="md-btn md-btn-flat md-btn-flat-primary" onclick="UIkit.modal.confirm('¿Desea Guardar y Registrar?', function(){ validarFormulario('form_alta_productos_cotizador') });">Agregar Producto </button> 
                  </div>
                </div>  
              </div>              
              <!--/////////////////////////////////// -->
              <!--/////////////////////////////////// -->              
              <!-- PopUp para modificaci? de Datos Especificos de un Producto -->
              <div class="uk-modal" id="popup_modificarproductocotizador">
                <div class="uk-modal-dialog uk-modal-dialog-large">
                  <button type="button" class="uk-modal-close uk-close"></button>
                  <div class="uk-modal-header">
                    <h3 class="uk-modal-title"><i class="material-icons" data-uk-tooltip="{pos:'top'}">&#xE148;</i>&nbsp;&nbsp;Modificar Producto de Cotizador</h3>
                  </div>
                  <div class="md-card">
                    <div class="md-card-content">
                      <form action="" class="uk-form-stacked" id="formActualizarProductoCotizador" name="formActualizarProductoCotizador">
                        <div class="md-card-content large-padding">
                          <div class="uk-grid uk-grid-divider uk-grid-medium form_section form_section_separator" data-uk-grid-margin>
                            <div class="uk-width-medium-4-10">
                              <h4 class="heading_c uk-margin-small-bottom">Datos Generales </h4>
                              <input type="hidden" name="modificar_id_producto_cotizador" id="modificar_id_producto_cotizador" class="md-input" />
                              <input type="hidden" name="modificar_idProveedor_producto_cotizador" id="modificar_idProveedor_producto_cotizador" class="md-input" />
                              <ul class="md-list">
                                <li>
                                  <div class="uk-grid ">
                                    <div class="uk-width-large-1-1">
                                      <label><span class="req"> * </span>Nombre del producto</label> <br/>
                                      <input type="text" name="modificar_nombre_producto_cotizador" id="modificar_nombre_producto_cotizador" class="md-input" />
                                    </div> 
                                  </div>
                                  <br/>
                                </li>
                                <li>
                                  <div class="uk-grid ">
                                    <div class="uk-width-large-1-1">
                                      <label><span class="req"> * </span>Descripción</label> <br/>
                                      <textarea class="md-input" name="modificar_descripcion_producto_cotizador" id="modificar_descripcion_producto_cotizador" cols="30" rows="1"> </textarea>
                                    </div>                                    
                                  </div>
                                  <br/>
                                </li>
                                <li>
                                  <div class="uk-grid ">
                                     <div id="ingredientesCheck" class="uk-width-large-1-1">
                                      <!--<h5 class="heading_c uk-margin-small-bottom">Ingredientes importantes </h5>-->
                                      <label><span class="req"> * </span>Ingredientes importantes</label> <br/>
                                      <textarea class="md-input" name="modificar_ingredientes_producto_cotizador" id="modificar_ingredientes_producto_cotizador" cols="30" rows="1"></textarea>
                                     </div>
                                  </div>
                                  <br/>
                                </li>
                                <li>
                                  <div class="uk-grid">
                                    <div class="uk-width-large-1-1">
                                      <label><i class="uk-icon-calendar "></i><span class="req"> * </span>&nbsp;Días en Elaborar</label>
                                      <br/>
                                      <input type="number" min="0" class="md-input" name="modificar_detalle_diasElborar_producto_cotizador" id="modificar_detalle_diasElborar_producto_cotizador"  />
                                    </div>
                                  </div>
                                  <br/>
                                </li>
                                <li>
                                  <div class="uk-grid">
                                    <div class="uk-width-medium-1-1">
                                      <h5 class="heading_c uk-margin-small-bottom"><span class="req"> * </span>Tipo de evento</h5>
                                    </div>
                                    <div class="uk-width-medium-1-1 ">
                                      <div class="uk-input-group">
                                        <span class="uk-input-group-addon"> <i class="uk-icon-chevron-circle-right"> </i> </span>
                                        <div class="parsley-row">
                                          <!--<h5 class="heading_c uk-margin-small-bottom">Evento</h5>-->
                                          <select id="modificar_evento_producto_cotizador" name="modificar_evento_producto_cotizador" class="md-input" data-uk-tooltip="{pos:'top'}" title="Select with tooltip">
                                            <option value="" disabled selected hidden></option>
                                          </select>
                                        </div>
                                      </div>        
                                    </div>
                                  </div>
                                  <br/>
                                </li>
                                
                                
                              </ul>
                            </div>
                            <div class="uk-width-medium-6-10">                                                      
                              <ul class="md-list">                                    
                                <li>
                                  <div class="uk-grid">
                                    <div class="uk-width-large-1-1">
                                      <div class="uk-float-right"><!--data-switchery-->
                                        <input type="checkbox" checked name="modificar_activado_producto_cotizador" id="modificar_activado_producto_cotizador" />
                                      </div>
                                      <label class="uk-display-block uk-margin-small-top uk-text-bold" for="product_edit_active_control">Activado</label>
                                    </div>
                                  </div>
                                  <br/>
                                </li>



                                <li>
                                  <div class="uk-width-medium-1-1">
                                    <!--uk-margin-large-bottom-->
                                    <div class="md-card ">
                                      <div class="md-card-toolbar">
                                        <h3 class="md-card-toolbar-heading-text">Fotografías</h3>
                                      </div>
                                      <div class="md-card-content" >
                                        <!--<h3 class="heading_a uk-margin-bottom"></h3>-->
                                        <h4>Fotografías actuales del producto</h4>
                                        <div  id="modificar_galeria_producto_cotizador" class="uk-grid" data-uk-grid-margin>
                                        </div>
                                      </div>      
                                      <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-3">
                                          <div class="md-card">
                                            <div class="md-card-content">
                                              <label>Fotografía 1</label>
                                              <!--
                                              <h5>
                                                  Fotografía 1
                                              </h5>
                                              -->
                                              <input type="file" id="modificar_srcimg1_producto_cotizador" name="srcimg1_producto" class="dropify" data-max-file-size="20000K"/>
                                              <input type="hidden" id="modificar_srcimg1_producto_cotizadorBD" name="srcimg1_productoBD" />
                                            </div>
                                          </div>
                                        </div>
                                        <div class="uk-width-medium-1-3">
                                          <div class="md-card">
                                            <div class="md-card-content">
                                              <label>Fotografía 2</label>
                                              <!--
                                              <h5>
                                                  Fotografía 2
                                              </h5>
                                              -->
                                              <input type="file" id="modificar_srcimg2_producto_cotizador" name="srcimg2_producto" class="dropify" data-max-file-size="20000K" />
                                              <input type="hidden" id="modificar_srcimg2_producto_cotizadorBD" name="srcimg2_productoBD" />
                                            </div>
                                          </div>
                                        </div>
                                        <div class="uk-width-medium-1-3">
                                          <div class="md-card">
                                            <div class="md-card-content">
                                              <label>Fotografía 3</label>
                                              <!--
                                              <h5>
                                                  Fotografía 3
                                              </h5>
                                              -->
                                              <input type="file" id="modificar_srcimg3_producto_cotizador" name="srcimg3_producto" class="dropify" data-max-file-size="20000K" />
                                              <input type="hidden" id="modificar_srcimg3_producto_cotizadorBD" name="srcimg3_productoBD" />
                                            </div>
                                          </div>
                                        </div>
                                      </div>                          
                                    </div>                                  
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div> 
                      </form>
                    </div>
                  </div>
                  <div class="uk-modal-footer uk-text-right">
                    <button type="button" class="md-btn md-btn-flat md-btn-flat-primary" onclick="UIkit.modal.confirm('¿Desea Guardar y Actualizar?', function(){  validarFormulario('form_modificar_productos_cotizador');  });">Actualziar Producto </button> 
                  </div>
                </div>  
              </div>              
              <!--</div>-->
              <!--end PopUp de datos especificos-->
            </div><!-- end Contenido de Item de Producto en Cotizador -->
            <!--///////////////////////////////////////////////////////////// -->
            <!--Linea divisora-->
            <div>
              <hr>
            </div>
            <div id="productosComplementario">
              <h3 class="heading_b uk-margin-bottom"> Productos de Complementario </h3>
              <div id="productosComplementarioPlantilla" class="uk-grid uk-grid-medium uk-grid-width-medium-1-3 uk-grid-width-large-1-4" data-uk-grid-margin data-uk-grid-match="{target:'.md-card-content'}">
              </div>
              <!--/////////////////////////////////// -->
              <!--/////////////////////////////////// -->
              <!-- PopUp para eliminar de producto JS -->
              <div class="uk-width-medium-1-3" >
                <div class="uk-modal" id="popup_productEliminar_Complementario" >
                  <div class="uk-modal-dialog">
                    <div class="uk-modal-header">
                      <h3 class="uk-modal-title" id="nombreEliminarH3">Usuario <i class="material-icons" data-uk-tooltip="{pos:'top'}" title="headline tooltip">&#xE8FD;</i></h3>
                    </div>
                    <div class="uk-grid" data-uk-grid-margin>
                      <div class="uk-width-medium-1-3">
                      </div>
                      <div class="uk-width-medium-1-3">
                      </div>                                      
                    </div>
                    <div class="uk-modal-footer uk-text-right">
                      <button type="button" class="md-btn md-btn-flat uk-modal-close">Cerrar</button><button data-uk-modal="{target:'#modal_new'}" type="button" class="md-btn md-btn-flat md-btn-flat-primary">Eliminar</button>
                    </div>
                  </div>
                </div>
                <div class="uk-modal" id="modal_new">
                  <div class="uk-modal-dialog">
                    <button type="button" class="uk-modal-close uk-close"></button>
                    <p class="uk-text-bold">Elimnacion Exitosa.</p>
                  </div>
                </div>
              </div>
              <div class="uk-modal" id="popup_nuevoproductoComplementario">
                <div class="uk-modal-dialog uk-modal-dialog-large">
                  <button type="button" class="uk-modal-close uk-close"></button>
                  <div class="uk-modal-header">
                    <h3 class="uk-modal-title"><i class="material-icons" data-uk-tooltip="{pos:'top'}">&#xE148;</i>&nbsp;&nbsp;Nuevo Producto en Complementario</h3>
                  </div>
                  <div class="md-card">
                    <div class="md-card-content">
                      <form action="" class="uk-form-stacked" id="altaproductoComplementario" name="altaproductoComplementario">
                        <div class="md-card-content large-padding">
                          <div class="uk-grid uk-grid-divider uk-grid-medium form_section form_section_separator" data-uk-grid-margin>
                            <div class="uk-width-large-1-2">
                              <h4 class="heading_c uk-margin-small-bottom">Datos Generales </h4>
                              <ul class="md-list">
                                <li>
                                  <div class="uk-grid ">
                                    <div class="uk-width-large-1-1">
                                      <label><span class="req"> * </span>Nombre del producto</label> <br/>
                                      <input type="text" name="alta_nombre_producto_Complementario" id="alta_nombre_producto_Complementario" class="md-input" />
                                    </div> 
                                  </div>
                                  <br/>
                                </li>
                                <li>
                                  <div class="uk-grid ">
                                    <div class="uk-width-large-1-1">
                                      <label for="wizard_address"><span class="req"> * </span>Descripción</label> <br/>
                                      <textarea class="md-input" name="alta_descripcion_producto_Complementario" id="alta_descripcion_producto_Complementario" cols="30" rows="1"> </textarea>
                                    </div>                                    
                                  </div>
                                  <br/>
                                </li>
                                <li>
                                  <div class="uk-grid ">
                                    <div class="uk-width-large-1-1">
                                      <!--<span class="uk-input-group-addon">                                      
                                      <i class="uk-icon-usd"></i>
                                    </span>-->
                                      <label><i class="uk-icon-usd"></i><span class="req"> * </span>Precio</label> <br/>
                                      <input type="number" min="0" name="alta_precioreal_producto_Complementario" id="alta_precioreal_producto_Complementario" class="md-input" />
                                    </div> 
                                  </div>
                                  <br/>
                                </li>                                
                                <li>
                                  <div class="uk-grid">
                                    <div class="uk-width-large-1-1"><br/>
                                      <label><i class="uk-icon-cubes"></i><span class="req"> * </span>&nbsp;Stock</label><br/>
                                      <input type="number" min="0" class="md-input" name="alta_stock_producto_Complementario" id="alta_stock_producto_Complementario"  />
                                    </div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                            <div class="uk-width-large-1-2">                              
                              <ul class="md-list">
                                <li>
                                  <div class="uk-grid">
                                    <div class="uk-width-large-1-1">
                                      <div class="uk-float-right"><!--data-switchery-->
                                        <input type="checkbox" checked name="alta_activado_producto_Complementario" id="alta_activado_producto_Complementario" />
                                      </div>
                                      <label class="uk-display-block uk-margin-small-top uk-text-bold" for="product_edit_active_control">Activado</label>
                                    </div>
                                  </div>
                                  <br/>
                                </li>                                
                                <li>
                                  <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-1">
                                      <div class="md-card">
                                        <div class="md-card-content">
                                          <label id="alta_srcimg1_producto_Complementario_titulo"><span class="req"> * </span>Fotografía 1</label>
                                          <!--
                                          <h5 id="alta_srcimg1_producto_Complementario_titulo">
                                              Fotografía 1
                                          </h5>
                                          -->
                                          <input type="file" id="alta_srcimg1_producto_Complementario" name="srcimg1_producto" class="dropify" data-max-file-size="20000K" />
                                          <input type="hidden" id="alta_srcimg1_producto_ComplementarioBD" name="srcimg1_productoBD" />
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <br/>
                                </li>                                  
                              </ul>
                            </div>
                          </div>
                        </div> 
                      </form>
                    </div>
                  </div>
                  <div class="uk-modal-footer uk-text-right">
                    <button type="button" class="md-btn md-btn-flat md-btn-flat-primary" onclick="UIkit.modal.confirm('¿Desea Guardar y Registrar?', function(){ validarFormulario('form_alta_productos_complementario'); });">Agregar Producto </button> 
                  </div>
                </div>  
              </div>              
              <!--/////////////////////////////////// -->
              <!--/////////////////////////////////// -->              
              <!-- PopUp para modificaci? de Datos Especificos de un Producto Complemetario -->
              <div class="uk-modal" id="popup_modificarproductoComplementario">
                <div class="uk-modal-dialog uk-modal-dialog-large">
                  <button type="button" class="uk-modal-close uk-close"></button>
                  <div class="uk-modal-header">
                    <h3 class="uk-modal-title"><i class="material-icons" data-uk-tooltip="{pos:'top'}">&#xE148;</i>&nbsp;&nbsp;Modificar Producto de Complementario</h3>
                  </div>
                  <div class="md-card">
                    <div class="md-card-content">
                      <form action="" class="uk-form-stacked" id="formActualizarProductoComplementario" name="formActualizarProductoComplementario">
                        <div class="md-card-content large-padding">
                          <div class="uk-grid uk-grid-divider uk-grid-medium form_section form_section_separator" data-uk-grid-margin>
                            <div class="uk-width-large-1-2">
                              <h4 class="heading_c uk-margin-small-bottom">Datos Generales </h4>
                              <input type="hidden" name="modificar_id_producto_Complementario" id="modificar_id_producto_Complementario" class="md-input" />
                              <input type="hidden" name="modificar_idProveedor_producto_Complementario" id="modificar_idProveedor_producto_Complementario" class="md-input" />
                              <ul class="md-list">
                                <li>
                                  <div class="uk-grid ">
                                    <div class="uk-width-large-1-1">
                                      <label><span class="req"> * </span>Nombre del producto</label> <br/>
                                      <input type="text" name="modificar_nombre_producto_Complementario" id="modificar_nombre_producto_Complementario" class="md-input" />
                                    </div> 
                                  </div>
                                  <br/>
                                </li>
                                <li>
                                  <div class="uk-grid ">
                                    <div class="uk-width-large-1-1">
                                      <label for="wizard_address"><span class="req"> * </span>Descripción</label> <br/>
                                      <textarea class="md-input" name="modificar_descripcion_producto_Complementario" id="modificar_descripcion_producto_Complementario" cols="30" rows="1"> </textarea>
                                    </div>                                    
                                  </div>
                                  <br/>
                                </li>
                                <li>
                                  <br/>
                                </li>
                                <li>
                                  <div class="uk-grid">
                                     <div class="uk-width-large-1-1">
                                    </div>
                                    <div class="uk-width-large-1-1"><br/>
                                      <label><i class="uk-icon-cubes"></i><span class="req"> * </span>&nbsp;Stock</label><br/>
                                      <input type="number" min="0" class="md-input" name="modificar_stock_producto_Complementario" id="modificar_stock_producto_Complementario"  />
                                    </div>
                                  </div>
                                  <br/>
                                </li>
                                <li>
                                  <div class="uk-grid ">
                                    <div class="uk-width-large-1-1">
                                      <label><i class="uk-icon-usd"></i><span class="req"> * </span>Precio</label> <br/>
                                      <input type="number" min="0" name="modificar_precio_producto_Complementario" id="modificar_precio_producto_Complementario" class="md-input" />
                                    </div> 
                                  </div>
                                  <br/>
                                </li>                                
                              </ul>
                            </div>
                            <div class="uk-width-large-1-2">                               
                              <ul class="md-list">                                    
                                <li>
                                  <div class="uk-grid">
                                    <div class="uk-width-large-1-1">
                                      <div class="uk-float-right"><!--data-switchery-->
                                        <input type="checkbox" checked name="modificar_activado_producto_Complementario" id="modificar_activado_producto_Complementario" />
                                      </div>
                                      <label class="uk-display-block uk-margin-small-top uk-text-bold" for="product_edit_active_control">Activado</label>
                                    </div>
                                  </div>
                                  <br/>
                                </li>
                                <li>
                                  <div class="md-card-content" >
                                    <h4>Fotografías</h4>
                                    <h5>Fotografías actuales del producto</h5>
                                    <div  id="modificar_galeria_producto_Complementario" class="uk-grid" data-uk-grid-margin>
                                    </div>
                                  </div> 
                                  <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-1">
                                      <div class="md-card">
                                        <div class="md-card-content">
                                          <h5 class="heading_a uk-margin-small-bottom" id="modificar_srcimg1_producto_Complementario_titulo">
                                              Fotografía 1
                                          </h5>
                                          <input type="file" id="modificar_srcimg1_producto_Complementario" name="srcimg1_producto" class="dropify" data-max-file-size="2000K" />
                                          <input type="hidden" id="modificar_srcimg1_producto_ComplementarioBD" name="srcimg1_productoBD" />
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <br/>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div> 
                      </form>
                    </div>
                  </div>
                  <div class="uk-modal-footer uk-text-right">
                    <button type="button" class="md-btn md-btn-flat md-btn-flat-primary" onclick="UIkit.modal.confirm('¿Desea Guardar y Actualizar?', function(){ validarFormulario('form_modificar_productos_complementario'); });">Agregar Producto </button> 
                  </div>
                </div>  
              </div>              
              <!--</div>-->
              <!--end PopUp de datos especificos-->
              <!--POPUP REGISTRANDO-->
              <div class="uk-modal" id="popup_spinner_registrando_producto">
                <div class="uk-modal-dialog">                  
                  <div class="uk-modal-spinner"></div>
                  <h4> Espere minestras se registra </h4>
                </div>
              </div>
              <!--POPUP MODIFICANDO-->
              <div class="uk-modal" id="popup_spinner_modificando_producto">
                <div class="uk-modal-dialog">                  
                  <div class="uk-modal-spinner"></div>
                  <h4> Espere minestras se actualiza </h4>
                </div>
              </div>
               <!--POPUP MODIFICANDO-->
              <div class="uk-modal" id="popup_spinner_eliminando_producto">
                <div class="uk-modal-dialog">                  
                  <div class="uk-modal-spinner"></div>
                  <h4> Espere minestras se elimina </h4>
                </div>
              </div>
            </div>
            <!-- end Contenido de Item de Producto -->
            <!--///////////////////////////////////////////////////////////// -->
            <div>
              <br/><br/>
            </div>
            <!--Contenido de Item de Producto en Complementarios -->
            <div>
              <br/><br/>
            </div>
            <!--Contenido de Item de Producto en Cotizador -->
            <!-- end Contenido de Item de Producto en Cotizador -->
        </div>
        <!-- FIN MIGUEL HTML -->
      <div id="contenido_Cotizador"><!-- Contenido de Pestaña Cotizador -->
          <h3 class="heading_b uk-margin-bottom"> Cotizaciones De Productos  </h3>
          <div class="md-card uk-margin-medium-bottom">
           <div class="md-card-content">
            <div class="uk-overflow-container">
              <table class="uk-table uk-table-nowrap table_check uk-table-hover tablesorter tablesorter-altair" id="tbl_ordenesCotizador">
               <thead>
                 <tr>
                   <th class="uk-width-1-10 uk-text-center">No. Orden Cotización</th>
                   <th class="uk-width-2-10 uk-text-center">Nombre Producto</th>
                   <th class="uk-width-1-10 uk-text-center">Fecha de Evento</th>
                   <th class="uk-width-1-10 uk-text-center">Tipo de Evento</th>
                   <th class="uk-width-1-10 uk-text-center">Status</th>
                 </tr>
               </thead>
               <tbody id="tblcotizacionesproductos" name="tblcotizacionesproductos"></tbody>
             </table>
			 
			  <!-- ..... -->
		   <div id="pagerCotizaProducto" class="pager">
    	<form>
    		<img src="bower_components/tablesorter/dist/css/images/first.png" class="first"/>
    		<img src="bower_components/tablesorter/dist/css/images/prev.png" class="prev"/>
    		<input disabled type="text" class="pagedisplay"/>
    	    <img src="bower_components/tablesorter/dist/css/images/next.png" class="next"/>
			<img src="bower_components/tablesorter/dist/css/images/last.png" class="last"/>    		
    	</form>
       </div>
		   <!--...-->
           </div>
         </div>
       </div>
       <div id="ordenesdecotizacionesproductos">
        <div class="uk-modal" id="popup_ordencotizador">
         <div class="uk-modal-dialog uk-modal-dialog-large">
          <button type="button" class="uk-modal-close uk-close uk-close-alt"></button>
          <div class="uk-modal-header">
           <h3 class="uk-modal-title"><i class="material-icons">&#xE878;</i>Detalle de Cotización</h3>
          </div>
          <div class="uk-grid">
           <div class="uk-width-large-1-2"></div>
           <div class="uk-width-large-1-2" id="cotizacion_botondeubicacion"></div>
          </div>
          <form action="" class="uk-form-stacked" id="datoscotizador">
           <div class="uk-grid uk-grid-medium" data-uk-grid-margin><div class="uk-width-1-1">
            <div class="md-card">
             <div class="md-card-toolbar">
              <h3 class="md-card-toolbar-heading-text" id="detallecotizador_idordencotizador"></h3>
             </div>
             <div class="md-card-content large-padding">
              <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>
               <div class="uk-width-large-1-2">
                <h4 class="heading_c uk-margin-small-bottom">Datos de Evento </h4>
                 <ul class="md-list md-list-addon" id="detallecotizador_datosevento">
                  <li>
                   <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE8B1;</i></div><div class="md-list-content" id="detallecotizador_tipoevento"></div>
                  </li>
                  <li>
                   <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE916;</i></div><div class="md-list-content" id="detallecotizador_fchevento"></div>
                  </li>
                  <li>
                   <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE7FB;</i></div><div class="md-list-content" id="detallecotizador_numinvitados"></div>
                  </li>
                  <li>
                   <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE7E9;</i></div><div class="md-list-content" id="detallecotizador_nomproducto"></div>
                  </li>
                 </ul>
                 <ul class="uk-grid uk-grid-width-1-2 uk-text-center" data-uk-grid-margin id="imgOrdenCotizador"></ul>
                </div>
                <div class="uk-width-large-1-2">
                 <h4 class="heading_c uk-margin-small-bottom">Información de Cliente </h4>
                 <div class="uk-form-row">
                  <ul class="md-list md-list-addon">
                   <li>
                    <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE7FD;</i></div><div class="md-list-content" id="detallecotizador_nombrecliente"></div>
                   </li>
                   <li>
                    <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE158;</i></div><div class="md-list-content" id="detallecotizador_email"></div>
                   </li>
                   <li>
                    <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE0CD;</i></div><div class="md-list-content" id="detallecotizador_telef"></div>
                   </li>
                   <li>
                    <div class="md-list-addon-element"><i class="md-list-addon-icon  material-icons">&#xE55F;</i></div><div class="md-list-content" id="detallecotizador_direccion"></div>
                   </li><br/>
                  </ul>
                  <ul class="md-list md-list-addon" id="detallecotizador_motivoCotización"><li id="motivo"><select name="motivocotizacion" id="motivocotizacion" class="md-input" onChange="activarCamposCostos()"><option value="" disabled selected hidden>Respuesta de Cotización</option></select></li></ul>
                  <ul class="md-list md-list-addon" id="detallecotizador_costos"></ul>
                  </div>
                 </div>
                </div>
               </div>
              </div>
             </div>
            </div>
            <div class="uk-modal-footer uk-text-right" id="detallecotizador_enviar"></div>
          </form>
         </div>
        </div>
       </div>
      <h3 class="heading_b uk-margin-bottom"> Cotizaciones De Productos Nuevos  </h3>
      <div class="md-card uk-margin-medium-bottom">
       <div class="md-card-content">
        <div class="uk-overflow-container">
         <table class="uk-table uk-table-nowrap table_check uk-table-hover tablesorter tablesorter-altair" id="tbl_ordenesCotizadorNuevos">
          <thead>
           <tr>
            <th class="uk-width-1-10 uk-text-center">No. Orden Cotización</th>
            <th class="uk-width-1-10 uk-text-center">Fecha de Evento</th>
            <th class="uk-width-1-10 uk-text-center">Tipo de Evento</th>
            <th class="uk-width-1-10 uk-text-center">Status</th>
           </tr>
          </thead>
          <tbody id="tblcotizacionesproductosnuevos" name="tblcotizacionesproductosnuevos"></tbody>
         </table>
		 
		 
		  <!-- ..... -->
		   <div id="pagerCotizaProNuevos" class="pager">
    	<form>
    		<img src="bower_components/tablesorter/dist/css/images/first.png" class="first"/>
    		<img src="bower_components/tablesorter/dist/css/images/prev.png" class="prev"/>
    		<input disabled type="text" class="pagedisplay"/>
    	    <img src="bower_components/tablesorter/dist/css/images/next.png" class="next"/>
			<img src="bower_components/tablesorter/dist/css/images/last.png" class="last"/>    		
    	</form>
       </div>
		   <!--...-->
        </div>
       </div>
      </div>
      <div id="ordenesdecotizacionesproductosNuevos">
      <!--POPUP REGISTRANDO-->
              <div class="uk-modal" id="popup_spinner_registrandoCot2">
                <div class="uk-modal-dialog">                  
                  <div class="uk-modal-spinner"></div>
                  <br>
                  <h4 class="uk-text-center"> Espere un momento </h4>
                </div>
              </div>
       <div class="uk-modal" id="popup_ordencotizadorproductNuevo">
        <div class="uk-modal-dialog uk-modal-dialog-large"><button type="button" class="uk-modal-close uk-close uk-close-alt"></button>
         <div class="uk-modal-header">
          <h3 class="uk-modal-title"><i class="material-icons">&#xE878;</i>Detalle de Cotización </h3>
         </div>
         <div class="uk-grid">
          <div class="uk-width-large-1-2"></div>
          <div  class="uk-width-large-1-2" id="cotizacionnueva_botondeubicacion"></div>
         </div>
         <form action="" class="uk-form-stacked" id="formCotizacionNuevo">
          <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
           <div class="uk-width-1-1">
            <div class="md-card">
             <div class="md-card-toolbar"><h3 class="md-card-toolbar-heading-text" id="detallecotizadorproductnuevo_idordencotizador"></h3>
             </div>
              <div class="md-card-content large-padding">
               <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>
                <div class="uk-width-large-1-2">
                 <h4 class="heading_c uk-margin-small-bottom">Datos de Evento </h4>
                  <ul class="md-list md-list-addon">
                   <li>
                    <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE8B1;</i></div><div class="md-list-content" id="detallecotizadorproductnuevo_tipoevento"></div>
                   </li>
                   <li>
                    <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE916;</i></div><div class="md-list-content" id="detallecotizadorproductnuevo_fchevento"></div>
                   </li>
                   <li>
                    <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE7FB;</i></div><div class="md-list-content" id="detallecotizadorproductnuevo_numinvitados"></div>
                   </li>
                   <li>
                    <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE7E9;</i></div><div class="md-list-content" id="detallecotizadorproductnuevo_nomproducto"></div>
                   </li>
                  </ul>
                  <ul class="uk-grid uk-grid-width-1-2 uk-text-center" data-uk-grid-margin id="imgOrdenCotizadorproductnuevo"></ul>
                </div>
                <div class="uk-width-large-1-2"><h4 class="heading_c uk-margin-small-bottom">Información de Cliente</h4>
                 <div class="uk-form-row">
                  <ul class="md-list md-list-addon" >
                   <li>
                    <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE7FD;</i></div><div class="md-list-content" id="detallecotizadorproductnuevo_nombrecliente"></div>
                   </li>
                   <li>
                    <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE158;</i></div><div class="md-list-content" id="detallecotizadorproductnuevo_email"></div>
                   </li>
                   <li>
                    <div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE0CD;</i></div><div class="md-list-content" id="detallecotizadorproductnuevo_telef"></div>
                   </li>
                   <li>
                    <div class="md-list-addon-element"><i class="md-list-addon-icon  material-icons">&#xE55F;</i></div><div class="md-list-content" id="detallecotizadorproductnuevo_direccion"></div>
                   </li><br/>
                  </ul>
                  <ul class="md-list md-list-addon" id="detallecotizador_motivoCotización">
                   <li id="motivonuevo">
                     <select name="motivocotizacionNuevo" id="motivocotizacionNuevo" class="md-input" onChange="activarCamposCostosProdNuevo()">
                      <option value="" disabled selected hidden>Respuesta de Cotización</option></select>
                    </li>
                  </ul>
                  <ul class="md-list md-list-addon" id="detallecotizadorproductnuevo_costos"></ul>
                </div>
               </div>
             </div>
            </div>
           </div>
          </div>
         </div>
         <div class="uk-modal-footer uk-text-right" id="detallecotizadorproductnuevo_enviar"></div>
       </form>
   </div>
  </div>
  </div>
</div>
<div id="contenido_Notificacion">
  <div class="md-card">
    <div class="md-card-content">
      <div class="uk-overflow-container uk-margin-bottom">
        <table class="uk-table uk-table-align-vertical "><!--  -->
          <thead>
            <tr>
              <th>Asunto</th>
              <th>Mensaje</th>
              <th>Fecha</th>
              <th>Emisor</th>
            </tr>
          </thead>
          <tbody id="tblnotificacion" name="tblnotificacion"></tbody>   
        </table></div></div></div>
      </div>
    </div>
    <div class="uk-modal" id="mapa"><!--Mapa-->
     <div class="uk-modal-dialog">
      <button type="button" class="uk-modal-close uk-close uk-close-alt"></button>
       <div class="uk-modal-header">
        <h4 class="md-card-toolbar-heading-text" id="direccionMapa"></h4>
       </div>  
       <div class="md-card"><div id="gmap" class="gmap" style="width:100%;height:400px;"></div></div>
     </div>
    </div><!--end Mapa-->
  </div>
</div>
</div>

<!-- CODIGO EN GENERAL -->

<!--CODIGO Misael Bravo-->

<?php include('./codigo_general/script_common.php'); ?>
<script type="text/javascript">

var solicitadoBy="WEB";
var idmapaOrdenes=1;
var idmapaCotizaciones=2;
var idmapaCotizacionesNuevas=3;
var eventos_Calendario=[];

//Variables para saber que tabla hace referencia en Ordenes 
var tabla_Ordenes=1;
var tabla_OrdenesPendiente=2;
var tabla_OrdenesHistorial=3;

//Variables de Sesion
var idtblproveedor = 1;
var tblproveedorNombre = "MisPasteles";
var emailproveedor = "mispasteles@gmail.com";

/*
 COMIENZA VARIABLES MIGUEL
 */
  var idusuarioproveedor=<?php echo $_SESSION['idusuario']; ?>;
  var idtblproveedor = <?php echo $_SESSION['idtblproveedor']; ?>;
  var idusuarioproveedor=<?php echo $_SESSION['idusuario']; ?>;
  var emailproveedor="<?php echo $_SESSION['usuario']; ?>";
  var solicitadoBy="WEB";
  var mensaje_error_validacion='¡Atención favor de verificar y completar los campos marcados en rojo!';
  mensajeEliminacion="'¿Realmente deseas eliminar el producto?'";
  var modificar_forma_producto_linea_elegido='';
  var arregloInfoUnProducto=[];
  var arregloInfoTodosProducto=[];
  var arregloInfoUnProductoCotizador=[];
  var arregloInfoTodosProductoCotizador=[];
  var arregloInfoUnProductoComplementario=[];
  var arregloInfoTodosProductoComplementario=[];
  var arregloCategoriaProductoId=[];
  var arregloCategoriaProductoNombre=[];
  var arregloClasificacionProductoId=[];
  var arregloClasificacionProductoNombre=[];
  var arregloEspecifiIngredientesId=[];
  var arregloEspecifiIngredientesNombre=[];
  var arregloEventosId=[];
  var arregloEventosNombre=[];
  var arregloImagenesTodosProducto=[];
  var arregloImagenesUnProducto=[];
  var arregloImagenesTodosProductoCotizador=[];
  var arregloImagenesUnProductoCotizador=[];
  var arregloImagenesTodosProductoComplementario=[];
  var arregloImagenesUnProductoComplementario=[];
  //para historico de eliminacion
  email="<?php echo $_SESSION['usuario']; ?>";
  nombre="<?php echo $_SESSION['nombre']; ?>";
  nombreSesion="<?php echo $_SESSION['nombre']; ?>";
  apellido="<?php echo $_SESSION['apellido']; ?>";
  nivel="<?php echo $_SESSION['nivel']; ?>";
  /*
  FIN VARIABLES MIGUEL
   */
$( window ).ready(function()
{
  console.log('pagina lista');
    /*
    READY MIGUEL
     */
    cargarValoresDefault();
    /*
    END READY MIGUEL
     */
    
    //funcion para mostrar la lista de ordenes pendientes
    llenarDatosCalendario();
    indicadoresIndex();
    mostrarListaOrdenes();
    selectMotivoCotizacion();
    mostrarCotizaciones();
    mostrarCotizacionesProductosNuevos();
    mostrarNotificaciones();
    cargaCalendario();

    //----------------------------reyna----
	mostrarTamaños();
	
	
	//------------------------------------
  });
  /*
  FUNCIONES MIGUEL
   */
  function cargarValoresDefault(){     
    solicitadoBy="WEB";    
    arregloInfoUnProducto=[];
    arregloInfoUnProductoCotizador=[];
    arregloInfoUnProductoComplementario=[];
    arregloInfoTodosProducto=[];
    arregloInfoTodosProductoCotizador=[];
    arregloInfoTodosProductoComplementario=[];
    arregloCategoriaProductoId=[];
    arregloCategoriaProductoNombre=[];
    arregloClasificacionProductoId=[];
    arregloClasificacionProductoNombre=[];
    arregloEspecifiIngredientesId=[];
    arregloEspecifiIngredientesNombre=[];
    arregloEventosId=[];
    arregloEventosNombre=[];
    arregloImagenesTodosProducto=[];
    arregloImagenesUnProducto=[];
    arregloImagenesTodosProductoCotizador=[];
    arregloImagenesUnProductoCotizador=[]; 
    cargarValoresAltaProductoLinea();
    mostrarProductos();
  }
  /*
  COMIENZA FUNCIONES MIGUEL
   */
  function activarModificarFormaProductoLinea(activaForma)
  {
    
    if(activaForma=='cuadrado')
    {
      modificar_forma_producto_linea_elegido='cuadrado';
    }else if(activaForma=='circular')
    {
      modificar_forma_producto_linea_elegido='circular';
    }else if(activaForma=='piezas')
    {
      modificar_forma_producto_linea_elegido='piezas';
    }
    //alert('forma es::'+activaForma+' variable::'+modificar_forma_producto_linea_elegido);
  }
  
  
  /*
  function validarFormaProductoLinea(diametro,largo,ancho,piezas)
  {
    if(modificar_forma_producto_linea_elegido=='')
    {
      if(diametro!=''){
        porciones=Math.round((Math.PI*diametro)/2);
        largo='';
        ancho='';
        piezas='';
      }
      else if(largo!=''&&ancho!=''){
        porciones=largo*ancho/2*5;
        diametro='';
        piezas='';
      }
      else if(piezas!=''){
        porciones=piezas;
        largo='';
        ancho='';
        diametro='';
      }
    }else if(modificar_forma_producto_linea_elegido=='cuadrado')
    {
      porciones=largo*ancho/2*5;
      diametro='';
      piezas='';
    }else if(modificar_forma_producto_linea_elegido=='circular')
    {
      porciones=Math.round((Math.PI*diametro)/2);
      largo='';
      ancho='';
      piezas='';
    }else if(modificar_forma_producto_linea_elegido=='piezas')
    {
      porciones=piezas;
      largo='';
      ancho='';
      diametro='';
    }
    return porciones;
  }*/
  
  
  
  /**
   * FUNCION USADA PARA VALIDAR LOS FORMULARIOS DE INICIO->PRODCUTOS Y PERFIL DE TIENDA
   * @param  {[STRING]} formularioAValidar [NOMBRE DEL FORMULARIO A VALIDAR]
   * @return {[MENSAJE ]}                    [INFORMACION SOBRE LA VALIDACION Y ACCION DEL FORMULARIO]
   */
  function validarFormulario(formularioAValidar)
  {
    //console.log('entro a la function validarFormulario');
    if(formularioAValidar=='form_alta_productos_linea')
    {
      /*
      VARIABLES
       */
      boolError=false;
      boolErrorNombre=false;
      boolErrorDescripcion=false;
      boolErrorIngredientes=false;
      boolErrorSeo=false;
      boolErrorCategoria=false;
      boolErrorClasificacion=false;

      boolErrorSrcimg1=false;
      boolErrorSrcimg2=false;
      boolErrorSrcimg3=false;
      boolErrorPorciones=false;

      boolErrorDiasElaboracion=false;
      boolErrorStock=false;
      boolErrorPrecioReal=false;
	  
	  //-------------------reyna---------------
	  boolErrorPorciones2=false;
	  boolErrorTamanio1=false;
	  
	  	  //---------------------------------------

      boolErrorEspecifIngrediente=false;

      mensajeErrorProductoLinea='';
      //tblproducto
      nombreproduct='';
      descripcion='';
      ingredientes='';
      seo='';
      promcalif='';
      activado='';
      //idtblproveedor='';
      idtblcategproduc='';
      idtblclasifproduct='';
      emailcreo='';

      //productoimg
      srcimg1='';
      srcimg2='';
      srcimg3='';

      //productodetalle
      diaselaboracion='';
      stock='';
      precioreal='';
	  //--------------------reyna-------
	  porciones2='';
	  tamanio1='';
	  //---------------------------------
      preciobp='';
      diametro='';
      largo='';
      ancho='';
      porciones='';
      piezas='';
      idtblespecificingrediente='';
      //console.log('entro a if de form_alta_productos_linea');
      //OBTENEMOS LOS DATOS DEL FORMULARIO
      nombreproduct=$('#alta_nombre_producto_linea').val();
      descripcion=$('#alta_descripcion_producto_linea').val();
      ingredientes=$('#alta_ingredientes_producto_linea').val();

      seo=$('#alta_nombre_producto_linea').val().replace(" ", '');
      promcalif='5';
      //activado=$('#alta_activado_producto_linea').val();
      //if(activado=='on'){activado=1;}
      activado=$("#alta_activado_producto_linea").is(':checked');
      if(activado)
      activado=1;
      else
      activado=0;

      //idtblproveedor='1';
      idtblcategproduc=$('#alta_categoria_producto_linea').val();
      idtblclasifproduct=$('#alta_clasificacion_producto_linea').val();
      

      srcimg1=$('#alta_srcimg1_producto_linea').val().replace(/C:\\fakepath\\/i, '');
      srcimg2=$('#alta_srcimg2_producto_linea').val().replace(/C:\\fakepath\\/i, '');
      srcimg3=$('#alta_srcimg3_producto_linea').val().replace(/C:\\fakepath\\/i, '');

      //if(srcimg1!=''||srcimg2!=''||srcimg3!='')
        //boolHabilitarValidacionSrcImg=true;

      diaselaboracion=$('#alta_detalle_diasElborar_producto_linea').val();
      stock=$('#alta_detalle_stock_producto_linea').val();
      precioreal=$('#alta_detalle_precioreal_producto_linea').val();
	  
	  
	  //-------------------reyna---------------------------------------------
	  porciones2=$('#alta_porciones_producto_linea').val();
	  tamanio1=$('#alta_tamanio_producto_linea').val();
	  //-----------------------------------------------------------------------
	  

      preciobp=precioreal;
      diametro=$('#alta_clasifcategproduct_circular_diametro_producto_linea').val();
      largo=$('#alta_clasifcategproduct_cuadrado_largo_producto_linea').val();
      ancho=$('#alta_clasifcategproduct_cuadrado_ancho_producto_linea').val();
      piezas=$('#alta_clasifcategproduct_piezas_producto_linea').val();
      activado=1;
      idtblespecificingrediente=$('#alta_especificingredientes_producto_linea').val();

      //porciones=validarFormaProductoLinea(diametro,largo,ancho,piezas);
      /////////////////////////DATOS GENERALES/////////////////////////
      //nombreproduct -> String
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      if(nombreproduct=='')
      {
        boolError=true;
        boolErrorNombre=true;
      }
      //VALIDAR RANGO DE DATOS ACEPTABLES
      if(nombreproduct.length>90)
      {
        boolError=true;
        boolErrorNombre=true;
      }
      //VALIDAR CAMPOS SOLO CON ESPACIOS
      if(!nombreproduct.trim())
      {
        boolError=true;
        boolErrorNombre=true;
      }
      if(boolErrorNombre)
        $( "#alta_nombre_producto_linea" ).addClass( "md-input-danger" );
      else
        $( "#alta_nombre_producto_linea" ).removeClass( "md-input-danger" );
      //descripcion -> String
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      if(descripcion=='')
      {
        boolError=true;
        boolErrorDescripcion=true;
      }
      //VALIDAR RANGO DE DATOS ACEPTABLES
      if(descripcion.length>300)
      {
        boolError=true;
        boolErrorDescripcion=true;
      }
      //VALIDAR CAMPOS SOLO CON ESPACIOS
      if(!descripcion.trim())
      {
        boolError=true;
        boolErrorDescripcion=true;
      }
      if(boolErrorDescripcion)
        $( "#alta_descripcion_producto_linea" ).addClass( "md-input-danger" );
      else
        $( "#alta_descripcion_producto_linea" ).removeClass( "md-input-danger" );
      //ingredientes -> String
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      if(ingredientes=='')
      {
        boolError=true;
        boolErrorIngredientes=true;
      }
      //VALIDAR RANGO DE DATOS ACEPTABLES
      if(ingredientes.length>250)
      {
        boolError=true;
        boolErrorIngredientes=true;
      }
      //VALIDAR CAMPOS SOLO CON ESPACIOS
      if(!ingredientes.trim())
      {
        boolError=true;
        boolErrorIngredientes=true;
      }
      if(boolErrorIngredientes)
        $( "#alta_ingredientes_producto_linea" ).addClass( "md-input-danger" );
      else
        $( "#alta_ingredientes_producto_linea" ).removeClass( "md-input-danger" );
      /*
      //seo -> String
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      if(seo=='')
      {
        boolError=true;
        boolErrorSeo=true;
      }
      //VALIDAR RANGO DE DATOS ACEPTABLES
      if(seo.length>250)
      {
        boolError=true;
        boolErrorSeo=true;
      }
      //VALIDAR CAMPOS SOLO CON ESPACIOS
      if(!seo.trim())
      {
        boolError=true;
        boolErrorSeo=true;
      }
      if(boolErrorSeo)
        $( "#alta_seo_producto_linea" ).addClass( "md-input-danger" );
      else
        $( "#alta_seo_producto_linea" ).removeClass( "md-input-danger" );
      */
      //idtblcategproduc -> Select
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      if(idtblcategproduc=='')
      {
        boolError=true;
        boolErrorCategoria=true;
      }    
      if(boolErrorCategoria)
        $( "#alta_categoria_producto_linea" ).addClass( "md-input-danger" );
      else
        $( "#alta_categoria_producto_linea" ).removeClass( "md-input-danger" );
      //idtblclasifproduct -> Select
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      if(idtblclasifproduct=='')
      {
        boolError=true;
        boolErrorClasificacion=true;
      }    
      if(boolErrorClasificacion)
        $( "#alta_clasificacion_producto_linea" ).addClass( "md-input-danger" );
      else
        $( "#alta_clasificacion_producto_linea" ).removeClass( "md-input-danger" );
      ///////////////////////////////////////////////////////////////////////////
      /////////////////////////DATOS FOTOGRAFIA//////////////////////////////////
      
      if(srcimg1=='')
      {
        console.log('srcimg1 vacio');
        boolError=true;
        boolErrorSrcimg1=true;
      }
      if(boolErrorSrcimg1)
        $( "#alta_srcimg1_producto_linea_titulo" ).css('color','red');
      else
        $( "#alta_srcimg1_producto_linea_titulo" ).css('color','black');
      if(srcimg2=='')
      {
        console.log('srcimg1 vacio');
        boolError=true;
        boolErrorSrcimg2=true;
      }
      if(boolErrorSrcimg2)
        $( "#alta_srcimg2_producto_linea_titulo" ).css('color','red');
      else
        $( "#alta_srcimg2_producto_linea_titulo" ).css('color','black');
      if(srcimg3=='')
      {
        console.log('srcimg1 vacio');
        boolError=true;
        boolErrorSrcimg3=true;
      }
      if(boolErrorSrcimg3)
        $( "#alta_srcimg3_producto_linea_titulo" ).css('color','red');
      else
        $( "#alta_srcimg3_producto_linea_titulo" ).css('color','black');
      
      ///////////////////////////////////////////////////////////////////////////
      ////////////////////////////DATOS DETALLES///////////////////////////////
	  //porciones2 -> Number
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      if(porciones2=='')
      {
        boolError=true;
        boolErrorPorciones2=true;
      }
      //VALIDAR RANGO DE DATOS ACEPTABLES
      if(porciones2<0)
      {
        //console.log('menor a cero');
        boolError=true;
        boolErrorPorciones2=true;
      }
      //VALIDAR CAMPOS NO SON NUMEROS
      if(!$.isNumeric(porciones2))
      {
        boolError=true;
        boolErrorPorciones2=true;

      }
      if(boolErrorPorciones2)
        $("#alta_porciones_producto_linea").addClass("md-input-danger");
      else
        $("#alta_porciones_producto_linea").removeClass("md-input-danger");
	  
	  //-----------------------------------tamaño---------
	  
	   //tamaño -> Select
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      if(tamanio1==null)
      {
        boolError=true;
        boolErrorTamanio1=true;  
      }    
      if(boolErrorTamanio1)
	   $("#alta_tamanio_producto_linea").addClass("md-input-danger");
      else
	  $("#alta_tamanio_producto_linea").removeClass("md-input-danger"); 
  
     
	  //************************************************************************************
      //diaselaboracion -> Number
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      if(diaselaboracion=='')
      {
        boolError=true;
        boolErrorDiasElaboracion=true;
      }
      //VALIDAR RANGO DE DATOS ACEPTABLES
      if(diaselaboracion<0)
      {
        console.log('menor a cero');
        boolError=true;
        boolErrorDiasElaboracion=true;
      }
      //VALIDAR CAMPOS NO SON NUMEROS
      if(!$.isNumeric(diaselaboracion))
      {
        boolError=true;
        boolErrorDiasElaboracion=true;

      }
      if(boolErrorDiasElaboracion)
        $( "#alta_detalle_diasElborar_producto_linea" ).addClass( "md-input-danger" );
      else
        $( "#alta_detalle_diasElborar_producto_linea" ).removeClass( "md-input-danger" );
	//************************************************************************************
      //stock -> Number
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      if(stock=='')
      {
        boolError=true;
        boolErrorStock=true;
      }
      //VALIDAR RANGO DE DATOS ACEPTABLES
      if(stock<0)
      {
        console.log('menor a cero');
        boolError=true;
        boolErrorStock=true;
      }
      //VALIDAR CAMPOS NO SON NUMEROS
      if(!$.isNumeric(stock))
      {
        boolError=true;
        boolErrorStock=true;

      }
      if(boolErrorStock)
        $( "#alta_detalle_stock_producto_linea" ).addClass( "md-input-danger" );
      else
        $( "#alta_detalle_stock_producto_linea" ).removeClass( "md-input-danger" );
      //precioreal -> Number
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      if(precioreal=='')
      {
        boolError=true;
        boolErrorPrecioReal=true;
      }
      //VALIDAR RANGO DE DATOS ACEPTABLES
      if(precioreal<0)
      {
        console.log('menor a cero');
        boolError=true;
        boolErrorPrecioReal=true;
      }
      //VALIDAR CAMPOS NO SON NUMEROS
      if(!$.isNumeric(precioreal))
      {
        boolError=true;
        boolErrorPrecioReal=true;

      }
      if(boolErrorPrecioReal)
        $( "#alta_detalle_precioreal_producto_linea" ).addClass( "md-input-danger" );
      else
        $( "#alta_detalle_precioreal_producto_linea" ).removeClass( "md-input-danger" );
	
	//______
	/*
      //porciones -> Number
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      if(porciones=='')
      {
        boolError=true;
        boolErrorPorciones=true;
      }
      //VALIDAR RANGO DE DATOS ACEPTABLES
      if(porciones<0)
      {
        console.log('menor a cero');
        boolError=true;
        boolErrorPorciones=true;
      }
      //VALIDAR CAMPOS NO SON NUMEROS
      if(!$.isNumeric(porciones))
      {
        boolError=true;
        boolErrorPorciones=true;

      }
      if(boolErrorPorciones)
        $( "#alta_forma_producto_linea_titulo" ).css('color','red');
      else
        $( "#alta_forma_producto_linea_titulo" ).css('color','black');
	
	*/
      /////////////////////////////////////////////////////////////////////////
      ////////////////////////////DATOS INGREDIENTE ESPECIAL///////////////////
      //idtblclasifproduct -> Select
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      if(idtblespecificingrediente=='')
      {
        boolError=true;
        boolErrorEspecifIngrediente=true;
      }    
      if(boolErrorEspecifIngrediente)
        $( "#alta_especificingredientes_producto_linea" ).addClass( "md-input-danger" );
      else
        $( "#alta_especificingredientes_producto_linea" ).removeClass( "md-input-danger" );
	
      /////////////////////////////////////////////////////////////////////////
      if(!boolError)
      {
        console.log('registrarProductoLinea');
        UIkit.modal("#popup_spinner_registrando_producto", {bgclose: false}).show();
        registrarProductoLinea();
      }
      else
      {
        UIkit.modal("#popup_spinner_registrando_producto").hide();
        UIkit.modal.alert(mensaje_error_validacion);

      }
	  
	 
      /////////////////////////////////////////////////////////////////////////
   
	  
	  
	  //----------------------------------------------------------
      //registrarProductoLinea();
    }
    else if(formularioAValidar=='form_alta_productos_linea_detalle')
    {
      /*
      VARIABLES
      */
      boolError=false;      
      boolErrorDiasElaboracion=false;
      boolErrorStock=false;
      boolErrorPrecioReal=false;
      boolErrorEspecifIngrediente=false;
	  //----------reyna-----------
	  boolErrorPorciones=false;
	  boolErrorTamanio=false;
	  //--------------------
      //productodetalle
      diaselaboracion='';
      stock='';
      precioreal='';
      preciobp='';
      diametro='';
      largo='';
      ancho='';
	  //-------------reyna--------------
      porciones='';
	  tamanio='';
	  //------------------------
      piezas='';
      idtblespecifingrediente='';
      ///////////////////////////////
      //OBTENEMOS LOS DATOS
      diaselaboracion=$('#alta_detalle_diasElborar_producto_detalle_linea').val();
      stock=$('#alta_detalle_stock_producto_detalle_linea').val();
      precioreal=$('#alta_detalle_precio_producto_detalle_linea').val();
      preciobp=precioreal;
      diametro=$('#alta_clasifcategproduct_circular_diametro_producto_detalle_linea').val();
      largo=$('#alta_clasifcategproduct_cuadrado_largo_producto_detalle_linea').val();
      ancho=$('#alta_clasifcategproduct_cuadrado_ancho_producto_detalle_linea').val();
      piezas=$('#alta_clasifcategproduct_piezas_producto_detalle_linea').val();
      activado=1;
      idtblespecifingrediente=$('#alta_especificingredientes_producto_detalle_linea').val();
      if(idtblespecifingrediente==null)
        idtblespecifingrediente='';
	
	//----------------reyna----
      //porciones=validarFormaProductoLinea(diametro,largo,ancho,piezas);
	  porciones=$('#alta_detalle_porciones_producto_detalle_linea').val();
	    tamanio=$('#alta_detalle_tamanio_producto_detalle_linea').val();
	  
      //console.log('datos porciones::'+porciones+' idtblespecificingrediente::'+idtblespecifingrediente);
      /////////////////////////DATOS GENERALES/////////////////////////
      //nombreproduct -> String
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      boolErrorDiasElaboracion=validarCamposNumericos(diaselaboracion);      
      if(boolErrorDiasElaboracion){ $( "#alta_detalle_diasElborar_producto_detalle_linea" ).addClass( "md-input-danger" ); boolError=true; }
      else{ $( "#alta_detalle_diasElborar_producto_detalle_linea" ).removeClass( "md-input-danger" ); }
      
	  //stock -> number
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      boolErrorStock=validarCamposNumericos(stock);      
      if(boolErrorStock){ $( "#alta_detalle_stock_producto_detalle_linea" ).addClass( "md-input-danger" ); 
	  boolError=true; }
      else{ $( "#alta_detalle_stock_producto_detalle_linea" ).removeClass( "md-input-danger" ); }
	  
	   //porciones---------------------------reyna-----
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      boolErrorPorciones=validarCamposNumericos(porciones);      
      if(boolErrorPorciones){ $( "#alta_detalle_porciones_producto_detalle_linea" ).addClass( "md-input-danger" ); 
	  boolError=true; }
      else{ $( "#alta_detalle_porciones_producto_detalle_linea" ).removeClass( "md-input-danger" ); }
	  
	  //tamaño -> String
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      boolErrorTamanio=validarCamposSelect(tamanio);      
      if(boolErrorTamanio){ $( "#alta_detalle_tamanio_producto_detalle_linea" ).addClass( "md-input-danger" ); 
	  boolError=true; }
      else{ $( "#alta_detalle_tamanio_producto_detalle_linea" ).removeClass( "md-input-danger" ); }
      
	  //-----------------------------------------
	  
      //nombreproduct -> String
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      boolErrorPrecioReal=validarCamposNumericos(precioreal);      
      if(boolErrorPrecioReal){ $( "#alta_detalle_precio_producto_detalle_linea" ).addClass( "md-input-danger" ); boolError=true; }
      else{ $( "#alta_detalle_precio_producto_detalle_linea" ).removeClass( "md-input-danger" ); }
      //nombreproduct -> Number
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
     /* boolErrorPorciones=validarCamposNumericos(porciones);
      if(boolErrorPorciones){ $( "#alta_forma_producto_linea_detalle_titulo" ).css('color','red'); boolError=true; }
      else{ $( "#alta_forma_producto_linea_detalle_titulo" ).css('color','black'); } */
      //nombreproduct -> String
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      boolErrorEspecifIngrediente=validarCamposSelect(idtblespecifingrediente);      
      if(boolErrorEspecifIngrediente){ $( "#alta_especificingredientes_producto_detalle_linea" ).addClass( "md-input-danger" ); boolError=true; }
      else{ $( "#alta_especificingredientes_producto_detalle_linea" ).removeClass( "md-input-danger" ); }
      ///////////////////////////////////////////////////////////////////////////   
      //console.log('boolErrorPorciones::'+boolErrorPorciones+' boolErrorEspecifIngrediente::'+boolErrorEspecifIngrediente+' boolError::'+boolError);   
      if(!boolError)
      {
        //console.log('registrar producto cotizador');
        UIkit.modal("#popup_spinner_registrando_producto",{bgclose: false}).show();
        registrarProductoDetalleLinea();     
      }
      else
      {
        UIkit.modal("#popup_spinner_registrando_producto").hide();
        UIkit.modal.alert(mensaje_error_validacion);
      }

    }
    else if(formularioAValidar=='form_modificar_productos_linea_detalle')
    {
       /*
      VARIABLES
       */
      boolError=false;
	  //--------------reyna---
      boolErrorPorciones=false;
	  boolErrorTamanio=false;
	  //----------------------------
      boolErrorDiasElaboracion=false;
      boolErrorStock=false;
      boolErrorPrecioReal=false;
      boolErrorEspecifIngrediente=false;
      //productodetalle
      diaselaboracion='';
      stock='';
      precioreal='';
      preciobp='';
      diametro='';
      largo='';
      ancho='';
      porciones='';
	  tamanio='';
      piezas='';
      idtblespecifingrediente='';
      ///////////////////////////////
      //OBTENEMOS LOS DATOS
      diaselaboracion=$('#modificar_detalle_diasElborar_producto_linea').val();
      stock=$('#modificar_detalle_stock_producto_linea').val();
	  //--------------reyna----
	  porciones=$('#modificar_detalle_porciones_producto_linea').val();
	  tamanio=$('#modificar_detalle_tamanio_producto_linea').val();
	  //-----------------
      precioreal=$('#modificar_detalle_precio_producto_linea').val();
      preciobp=precioreal;
      diametro=$('#modificar_clasifcategproduct_circular_diametro_producto_linea').val();
      largo=$('#modificar_clasifcategproduct_cuadrado_largo_producto_linea').val();
      ancho=$('#modificar_clasifcategproduct_cuadrado_ancho_producto_linea').val();
      piezas=$('#modificar_clasifcategproduct_piezas_producto_linea').val();
      activado=1;
      idtblespecificingrediente=$('#modificar_especificingredientes_producto_linea').val();
      //porciones=validarFormaProductoLinea(diametro,largo,ancho,piezas);
      //////////////////////////////////////////////////////////////////////////////
      ////////////////////////////DATOS DETALLES///////////////////////////////
	  
	  //tamanio -> Number
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      if(tamanio==null)
      {
        boolError=true;
        boolErrorTamanio=true;
      }
     
      if(boolErrorTamanio)
        $( "#modificar_detalle_tamanio_producto_linea" ).addClass( "md-input-danger" );
      else
        $( "#modificar_detalle_tamanio_producto_linea" ).removeClass( "md-input-danger" );
      //diaselaboracion -> Number
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      if(diaselaboracion=='')
      {
        boolError=true;
        boolErrorDiasElaboracion=true;
      }
      //VALIDAR RANGO DE DATOS ACEPTABLES
      if(diaselaboracion<0)
      {
        boolError=true;
        boolErrorDiasElaboracion=true;
      }
      //VALIDAR CAMPOS NO SON NUMEROS
      if(!$.isNumeric(diaselaboracion))
      {
        boolError=true;
        boolErrorDiasElaboracion=true;
      }
      if(boolErrorDiasElaboracion)
        $( "#modificar_detalle_diasElborar_producto_linea" ).addClass( "md-input-danger" );
      else
        $( "#modificar_detalle_diasElborar_producto_linea" ).removeClass( "md-input-danger" );
      //stock -> Number
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      if(stock=='')
      {
        boolError=true;
        boolErrorStock=true;
      }
      //VALIDAR RANGO DE DATOS ACEPTABLES
      if(stock<0)
      {
        boolError=true;
        boolErrorStock=true;
      }
      //VALIDAR CAMPOS NO SON NUMEROS
      if(!$.isNumeric(stock))
      {
        boolError=true;
        boolErrorStock=true;
      }
      if(boolErrorStock)
        $( "#modificar_detalle_stock_producto_linea" ).addClass( "md-input-danger" );
      else
        $( "#modificar_detalle_stock_producto_linea" ).removeClass( "md-input-danger" );
      //precioreal -> Number
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      if(precioreal=='')
      {
        boolError=true;
        boolErrorPrecioReal=true;
      }
      //VALIDAR RANGO DE DATOS ACEPTABLES
      if(precioreal<0)
      {
        boolError=true;
        boolErrorPrecioReal=true;
      }
      //VALIDAR CAMPOS NO SON NUMEROS
      if(!$.isNumeric(precioreal))
      {
        boolError=true;
        boolErrorPrecioReal=true;
      }
      if(boolErrorPrecioReal)
        $( "#modificar_detalle_precio_producto_linea" ).addClass( "md-input-danger" );
      else
        $( "#modificar_detalle_precio_producto_linea" ).removeClass( "md-input-danger" );
      //porciones -> Number
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      if(porciones=='')
      {
        boolError=true;
        boolErrorPorciones=true;
      }
      //VALIDAR RANGO DE DATOS ACEPTABLES
      if(porciones<0)
      {
        boolError=true;
        boolErrorPorciones=true;
      }
      //VALIDAR CAMPOS NO SON NUMEROS
      if(!$.isNumeric(porciones))
      {
        boolError=true;
        boolErrorPorciones=true;
      }
      if(boolErrorPorciones)
        $( "#modificar_detalle_porciones_producto_linea" ).addClass( "md-input-danger" );
      else
        $( "#modificar_detalle_porciones_producto_linea" ).removeClass( "md-input-danger" );
      /////////////////////////////////////////////////////////////////////////
      ////////////////////////////DATOS INGREDIENTE ESPECIAL///////////////////
      //idtblclasifproduct -> Select
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      if(idtblespecificingrediente=='')
      {
        boolError=true;
        boolErrorEspecifIngrediente=true;
      }    
      if(boolErrorEspecifIngrediente)
        $( "#modificar_especificingredientes_producto_linea" ).addClass( "md-input-danger" );
      else
        $( "#modificar_especificingredientes_producto_linea" ).removeClass( "md-input-danger" );
      /////////////////////////////////////////////////////////////////////////
      if(!boolError)
      {
        console.log('actualizarProductoDetalle');
        UIkit.modal("#popup_spinner_modificando_producto",{bgclose: false}).show();
        actualizarProductoDetalle();      
      }
      else
      {
        UIkit.modal("#popup_spinner_modificando_producto").hide();
        UIkit.modal.alert(mensaje_error_validacion);
      }
       
    }
    else if(formularioAValidar=='form_modificar_productos_linea_general')
    {
       /*
      VARIABLES
       */
      boolError=false;
      boolErrorNombre=false;
      boolErrorDescripcion=false;
      boolErrorIngredientes=false;
      boolErrorSeo=false;
      boolErrorCategoria=false;
      boolErrorClasificacion=false;
      boolHabilitarValidacionSrcImg=false;

      boolErrorSrcimg1=false;
      boolErrorSrcimg2=false;
      boolErrorSrcimg3=false;

       //tblproducto
      nombreproduct='';
      descripcion='';
      ingredientes='';
      seo='';
      idtblcategproduc='';
      idtblclasifproduct='';

      srcimg1='';
      srcimg2='';
      srcimg3='';

      //OBTENEMOS LOS DATOS DEL FORMULARIO
      nombreproduct=$('#modificar_nombre_producto_linea_general').val();
      descripcion=$('#modificar_descripcion_producto_linea_general').val();
      ingredientes=$('#modificar_ingredientes_producto_linea_general').val();
      seo=$('#modificar_nombre_producto_linea_general').val().replace(" ", '');      
      idtblcategproduc=$('#modificar_categoria_producto_linea_general').val();
      idtblclasifproduct=$('#modificar_clasificacion_producto_linea_general').val();

      //alert('srcimg1::'+srcimg1+' srcimg2::'+srcimg2+' srcimg3::'+srcimg3+'val::'+$('#modificar_srcimg1_producto_linea').val());
        srcimg1=$('#modificar_srcimg1_producto_linea').val().replace(/C:\\fakepath\\/i, '');
        srcimg2=$('#modificar_srcimg2_producto_linea').val().replace(/C:\\fakepath\\/i, '');
        srcimg3=$('#modificar_srcimg3_producto_linea').val().replace(/C:\\fakepath\\/i, '');

      if(srcimg1!=''||srcimg2!=''||srcimg3!='')
        boolHabilitarValidacionSrcImg=true;
      /////////////////////////DATOS GENERALES/////////////////////////
      //nombreproduct -> String
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      if(nombreproduct=='')
      {
        boolError=true;
        boolErrorNombre=true;
      }
      //VALIDAR RANGO DE DATOS ACEPTABLES
      if(nombreproduct.length>90)
      {
        boolError=true;
        boolErrorNombre=true;
      }
      //VALIDAR CAMPOS SOLO CON ESPACIOS
      if(!nombreproduct.trim())
      {
        boolError=true;
        boolErrorNombre=true;
      }
      if(boolErrorNombre)
        $( "#modificar_nombre_producto_linea_general" ).addClass( "md-input-danger" );
      else
        $( "#modificar_nombre_producto_linea_general" ).removeClass( "md-input-danger" );
      //descripcion -> String
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      if(descripcion=='')
      {
        boolError=true;
        boolErrorDescripcion=true;
      }
      //VALIDAR RANGO DE DATOS ACEPTABLES
      if(descripcion.length>300)
      {
        boolError=true;
        boolErrorDescripcion=true;
      }
      //VALIDAR CAMPOS SOLO CON ESPACIOS
      if(!descripcion.trim())
      {
        boolError=true;
        boolErrorDescripcion=true;
      }
      if(boolErrorDescripcion)
        $( "#modificar_descripcion_producto_linea_general" ).addClass( "md-input-danger" );
      else
        $( "#modificar_descripcion_producto_linea_general" ).removeClass( "md-input-danger" );
      //ingredientes -> String
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      if(ingredientes=='')
      {
        boolError=true;
        boolErrorIngredientes=true;
      }
      //VALIDAR RANGO DE DATOS ACEPTABLES
      if(ingredientes.length>250)
      {
        boolError=true;
        boolErrorIngredientes=true;
      }
      //VALIDAR CAMPOS SOLO CON ESPACIOS
      if(!ingredientes.trim())
      {
        boolError=true;
        boolErrorIngredientes=true;
      }
      if(boolErrorIngredientes)
        $( "#modificar_ingredientes_producto_linea_general" ).addClass( "md-input-danger" );
      else
        $( "#modificar_ingredientes_producto_linea_general" ).removeClass( "md-input-danger" );
      /*
      //seo -> String
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      if(seo=='')
      {
        boolError=true;
        boolErrorSeo=true;
      }
      //VALIDAR RANGO DE DATOS ACEPTABLES
      if(seo.length>250)
      {
        boolError=true;
        boolErrorSeo=true;
      }
      //VALIDAR CAMPOS SOLO CON ESPACIOS
      if(!seo.trim())
      {
        boolError=true;
        boolErrorSeo=true;
      }
      if(boolErrorSeo)
        $( "#modificar_seo_producto_linea_general" ).addClass( "md-input-danger" );
      else
        $( "#modificar_seo_producto_linea_general" ).removeClass( "md-input-danger" );
      */
      //idtblcategproduc -> Select
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      if(idtblcategproduc=='')
      {
        boolError=true;
        boolErrorCategoria=true;
      }    
      if(boolErrorCategoria)
        $( "#modificar_categoria_producto_linea_general" ).addClass( "md-input-danger" );
      else
        $( "#modificar_categoria_producto_linea_general" ).removeClass( "md-input-danger" );
      //idtblclasifproduct -> Select
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      if(idtblclasifproduct=='')
      {
        boolError=true;
        boolErrorClasificacion=true;
      }    
      if(boolErrorClasificacion)
        $( "#modificar_clasificacion_producto_linea_general" ).addClass( "md-input-danger" );
      else
        $( "#modificar_clasificacion_producto_linea_general" ).removeClass( "md-input-danger" );
      ///////////////////////////////////////////////////////////////////////////
      /////////////////////////DATOS FOTOGRAFIA//////////////////////////////////
      if(boolHabilitarValidacionSrcImg)
      {
        if(srcimg1=='')
        {
          console.log('srcimg1 vacio');
          boolError=true;
          boolErrorSrcimg1=true;
        }
        if(boolErrorSrcimg1)
          $( "#modificar_srcimg1_producto_linea_titulo" ).css('color','red');
        else
          $( "#modificar_srcimg1_producto_linea_titulo" ).css('color','black');
        if(srcimg2=='')
        {
          console.log('srcimg2 vacio');
          boolError=true;
          boolErrorSrcimg2=true;
        }
        if(boolErrorSrcimg2)
          $( "#modificar_srcimg2_producto_linea_titulo" ).css('color','red');
        else
          $( "#modificar_srcimg2_producto_linea_titulo" ).css('color','black');
        if(srcimg3=='')
        {
          console.log('srcimg3 vacio');
          boolError=true;
          boolErrorSrcimg3=true;
        }
        if(boolErrorSrcimg3)
          $( "#modificar_srcimg3_producto_linea_titulo" ).css('color','red');
        else
          $( "#modificar_srcimg3_producto_linea_titulo" ).css('color','black');
      }
      ///////////////////////////////////////////////////////////////////////////
      
      if(!boolError)
      {
        //console.log('actualizarProductoGeneral');
        UIkit.modal("#popup_spinner_modificando_producto",{bgclose: false}).show();
        actualizarProductoGeneral();      
      }
      else
      {
        UIkit.modal("#popup_spinner_modificando_producto").hide();
        UIkit.modal.alert(mensaje_error_validacion);
      }       
    }
    else if(formularioAValidar=='form_alta_productos_cotizador')
    {
       /*
      VARIABLES
       */
      boolError=false;
      boolErrorNombre=false;
      boolErrorDescripcion=false;
      boolErrorIngredientes=false;
      boolErrorDiasElaboracion=false;
      boolErrorEvento=false;

      boolErrorSrcimg1=false;
      boolErrorSrcimg2=false;
      boolErrorSrcimg3=false;

       //tblproducto
      nombreproduct='';
      descripcion='';
      ingredientes='';
      diaselaboracion='';
      evento='';

      srcimg1='';
      srcimg2='';
      srcimg3='';

      //OBTENEMOS LOS DATOS DEL FORMULARIO
      nombreproduct=$('#alta_nombre_producto_cotizador').val();
      descripcion=$('#alta_descripcion_producto_cotizador').val();
      ingredientes=$('#alta_ingredientes_producto_cotizador').val();
      diaselaboracion=$('#alta_detalle_diasElborar_producto_cotizador').val();
      evento=$('#alta_evento_producto_cotizador').val();

      srcimg1=$('#alta_srcimg1_producto_cotizador').val();
      srcimg2=$('#alta_srcimg2_producto_cotizador').val();
      srcimg3=$('#alta_srcimg3_producto_cotizador').val();

      /////////////////////////DATOS GENERALES/////////////////////////
      //nombreproduct -> String
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      boolErrorNombre=validarCamposString(nombreproduct,70);      
      if(boolErrorNombre){ $( "#alta_nombre_producto_cotizador" ).addClass( "md-input-danger" ); boolError=true; }
      else{ $( "#alta_nombre_producto_cotizador" ).removeClass( "md-input-danger" ); }
      //nombreproduct -> String
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      boolErrorDescripcion=validarCamposString(descripcion,300);      
      if(boolErrorDescripcion){ $( "#alta_descripcion_producto_cotizador" ).addClass( "md-input-danger" ); boolError=true; }
      else{ $( "#alta_descripcion_producto_cotizador" ).removeClass( "md-input-danger" ); }
      //nombreproduct -> String
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      boolErrorIngredientes=validarCamposString(ingredientes,300);      
      if(boolErrorIngredientes){ $( "#alta_ingredientes_producto_cotizador" ).addClass( "md-input-danger" ); boolError=true; }
      else{ $( "#alta_ingredientes_producto_cotizador" ).removeClass( "md-input-danger" ); }
      //nombreproduct -> Number
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      boolErrorDiasElaboracion=validarCamposNumericos(diaselaboracion);      
      if(boolErrorDiasElaboracion){ $( "#alta_detalle_diasElborar_producto_cotizador" ).addClass( "md-input-danger" ); boolError=true; }
      else{ $( "#alta_detalle_diasElborar_producto_cotizador" ).removeClass( "md-input-danger" ); }
      //nombreproduct -> String
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      boolErrorEvento=validarCamposSelect(evento);     
      if(boolErrorEvento){ $( "#alta_evento_producto_cotizador" ).addClass( "md-input-danger" ); boolError=true; }
      else{ $( "#alta_evento_producto_cotizador" ).removeClass( "md-input-danger" ); }
      ///////////////////////////////////////////////////////////////////////////
      /////////////////////////DATOS FOTOGRAFIA//////////////////////////////////
      //srcimg1
      boolErrorSrcimg1=validarCamposImg(srcimg1);      
      if(boolErrorSrcimg1){ $( "#alta_srcimg1_producto_cotizador_titulo" ).css('color','red'); boolError=true; }
      else{ $( "#alta_srcimg1_producto_cotizador_titulo" ).css('color','black'); }
      //srcimg2
      boolErrorSrcimg2=validarCamposImg(srcimg2);      
      if(boolErrorSrcimg2){ $( "#alta_srcimg2_producto_cotizador_titulo" ).css('color','red'); boolError=true; }
      else{ $( "#alta_srcimg2_producto_cotizador_titulo" ).css('color','black'); }
      //srcimg3
      boolErrorSrcimg3=validarCamposImg(srcimg3);      
      if(boolErrorSrcimg3){ $( "#alta_srcimg3_producto_cotizador_titulo" ).css('color','red'); boolError=true; }
      else{ $( "#alta_srcimg3_producto_cotizador_titulo" ).css('color','black'); }
      ///////////////////////////////////////////////////////////////////////////
      
      if(!boolError)
      {
        //console.log('registrar producto cotizador');
        UIkit.modal("#popup_spinner_registrando_producto",{bgclose: false}).show();
        registrarProductoCotizador();      
      }
      else
      {
        UIkit.modal("#popup_spinner_registrando_producto").hide();
        UIkit.modal.alert(mensaje_error_validacion);
      }       
    }
    else if(formularioAValidar=='form_modificar_productos_cotizador')
    {
       /*
      VARIABLES
       */
      boolError=false;
      boolErrorNombre=false;
      boolErrorDescripcion=false;
      boolErrorIngredientes=false;
      boolErrorDiasElaboracion=false;
      boolErrorEvento=false;

      boolErrorSrcimg1=false;
      boolErrorSrcimg2=false;
      boolErrorSrcimg3=false;

      boolHabilitarValidacionSrcImg=false;

       //tblproducto
      nombreproduct='';
      descripcion='';
      ingredientes='';
      diaselaboracion='';
      evento='';

      srcimg1='';
      srcimg2='';
      srcimg3='';

      //OBTENEMOS LOS DATOS DEL FORMULARIO
      nombreproduct=$('#modificar_nombre_producto_cotizador').val();
      descripcion=$('#modificar_descripcion_producto_cotizador').val();
      ingredientes=$('#modificar_ingredientes_producto_cotizador').val();
      diaselaboracion=$('#modificar_detalle_diasElborar_producto_cotizador').val();
      evento=$('#modificar_evento_producto_cotizador').val();

      srcimg1=$('#modificar_srcimg1_producto_cotizador').val();
      srcimg2=$('#modificar_srcimg2_producto_cotizador').val();
      srcimg3=$('#modificar_srcimg3_producto_cotizador').val();

      if(srcimg1!=''||srcimg2!=''||srcimg3!='')
        boolHabilitarValidacionSrcImg=true;

      /////////////////////////DATOS GENERALES/////////////////////////
      //nombreproduct -> String
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      boolErrorNombre=validarCamposString(nombreproduct,70);      
      if(boolErrorNombre){ $( "#modificar_nombre_producto_cotizador" ).addClass( "md-input-danger" ); boolError=true; }
      else{ $( "#modificar_nombre_producto_cotizador" ).removeClass( "md-input-danger" ); }
      //nombreproduct -> String
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      boolErrorDescripcion=validarCamposString(descripcion,300);      
      if(boolErrorDescripcion){ $( "#modificar_descripcion_producto_cotizador" ).addClass( "md-input-danger" ); boolError=true; }
      else{ $( "#modificar_descripcion_producto_cotizador" ).removeClass( "md-input-danger" ); }
      //nombreproduct -> String
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      boolErrorIngredientes=validarCamposString(ingredientes,300);      
      if(boolErrorIngredientes){ $( "#modificar_ingredientes_producto_cotizador" ).addClass( "md-input-danger" ); boolError=true; }
      else{ $( "#modificar_ingredientes_producto_cotizador" ).removeClass( "md-input-danger" ); }
      //nombreproduct -> Number
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      boolErrorDiasElaboracion=validarCamposNumericos(diaselaboracion);      
      if(boolErrorDiasElaboracion){ $( "#modificar_detalle_diasElborar_producto_cotizador" ).addClass( "md-input-danger" ); boolError=true; }
      else{ $( "#modificar_detalle_diasElborar_producto_cotizador" ).removeClass( "md-input-danger" ); }
      //nombreproduct -> String
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      boolErrorEvento=validarCamposSelect(evento);      
      if(boolErrorEvento){ $( "#modificar_evento_producto_cotizador" ).addClass( "md-input-danger" ); boolError=true; }
      else{ $( "#modificar_evento_producto_cotizador" ).removeClass( "md-input-danger" ); }
      ///////////////////////////////////////////////////////////////////////////
      /////////////////////////DATOS FOTOGRAFIA//////////////////////////////////
      //srcimg1
      if(boolHabilitarValidacionSrcImg)
      {
        boolErrorSrcimg1=validarCamposImg(srcimg1);      
        if(boolErrorSrcimg1){ $( "#alta_srcimg1_producto_cotizador_titulo" ).css('color','red'); boolError=true; }
        else{ $( "#alta_srcimg1_producto_cotizador_titulo" ).css('color','black'); }
        //srcimg2
        boolErrorSrcimg2=validarCamposImg(srcimg2);      
        if(boolErrorSrcimg2){ $( "#alta_srcimg2_producto_cotizador_titulo" ).css('color','red'); boolError=true; }
        else{ $( "#alta_srcimg2_producto_cotizador_titulo" ).css('color','black'); }
        //srcimg3
        boolErrorSrcimg3=validarCamposImg(srcimg3);      
        if(boolErrorSrcimg3){ $( "#alta_srcimg3_producto_cotizador_titulo" ).css('color','red'); boolError=true; }
        else{ $( "#alta_srcimg3_producto_cotizador_titulo" ).css('color','black'); }
      }
      ///////////////////////////////////////////////////////////////////////////
      
      if(!boolError)
      {
        //console.log('actualizarProducto cotizador');
        UIkit.modal("#popup_spinner_modificando_producto",{bgclose: false}).show();
        actualizarProductoCotizador();      
      }
      else
      {
        UIkit.modal("#popup_spinner_modificando_producto").hide();
        UIkit.modal.alert(mensaje_error_validacion);
      }       
    }
    else if(formularioAValidar=='form_alta_productos_complementario')
    {
       /*
      VARIABLES
       */
      boolError=false;
      boolErrorNombre=false;
      boolErrorDescripcion=false;
      boolErrorSeo=false;
      boolErrorPrecio=false;
      boolErrorStock=false;

      boolErrorSrcimg1=false;

       //tblproducto
      nombreproduct='';
      descripcion='';
      seo='';
      precio='';
      stock='';

      srcimg1='';

      //OBTENEMOS LOS DATOS DEL FORMULARIO
      nombreproduct=$('#alta_nombre_producto_Complementario').val();
      descripcion=$('#alta_descripcion_producto_Complementario').val();
      seo=$('#alta_nombre_producto_Complementario').val().replace(" ", '');;
      precio=$('#alta_precioreal_producto_Complementario').val();
      stock=$('#alta_stock_producto_Complementario').val();

      srcimg1=$('#alta_srcimg1_producto_Complementario').val();
      /////////////////////////DATOS GENERALES/////////////////////////
      //nombreproduct -> String
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      boolErrorNombre=validarCamposString(nombreproduct,90);      
      if(boolErrorNombre){ $( "#alta_nombre_producto_Complementario" ).addClass( "md-input-danger" ); boolError=true; }
      else{ $( "#alta_nombre_producto_Complementario" ).removeClass( "md-input-danger" ); }
      //nombreproduct -> String
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      boolErrorDescripcion=validarCamposString(descripcion,300);      
      if(boolErrorDescripcion){ $( "#alta_descripcion_producto_Complementario" ).addClass( "md-input-danger" ); boolError=true; }
      else{ $( "#alta_descripcion_producto_Complementario" ).removeClass( "md-input-danger" ); }
      //nombreproduct -> String
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      /*
      boolErrorSeo=validarCamposString(seo,250);      
      if(boolErrorSeo){ $( "#alta_seo_producto_Complementario" ).addClass( "md-input-danger" ); boolError=true; }
      else{ $( "#alta_seo_producto_Complementario" ).removeClass( "md-input-danger" ); }
      */
      //nombreproduct -> Number
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      boolErrorPrecio=validarCamposNumericos(precio);      
      if(boolErrorPrecio){ $( "#alta_precioreal_producto_Complementario" ).addClass( "md-input-danger" ); boolError=true; }
      else{ $( "#alta_precioreal_producto_Complementario" ).removeClass( "md-input-danger" ); }
      //nombreproduct -> String
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      boolErrorStock=validarCamposNumericos(stock);      
      if(boolErrorStock){ $( "#alta_stock_producto_Complementario" ).addClass( "md-input-danger" ); boolError=true; }
      else{ $( "#alta_stock_producto_Complementario" ).removeClass( "md-input-danger" ); }
      ///////////////////////////////////////////////////////////////////////////
      /////////////////////////DATOS FOTOGRAFIA//////////////////////////////////
      //srcimg1
      boolErrorSrcimg1=validarCamposImg(srcimg1);      
      if(boolErrorSrcimg1){ $( "#alta_srcimg1_producto_Complementario_titulo" ).css('color','red'); boolError=true; }
      else{ $( "#alta_srcimg1_producto_Complementario_titulo" ).css('color','black'); }
      ///////////////////////////////////////////////////////////////////////////
      
      if(!boolError)
      {
        console.log('registrar producto complementario');
        UIkit.modal("#popup_spinner_registrando_producto",{bgclose: false}).show();
        registrarProductoComplementario();      
      }
      else
      {
        UIkit.modal("#popup_spinner_registrando_producto").hide();
        UIkit.modal.alert(mensaje_error_validacion);
      }       
    }
    else if(formularioAValidar=='form_modificar_productos_complementario')
    {
       /*
      VARIABLES
       */
      boolError=false;
      boolErrorNombre=false;
      boolErrorDescripcion=false;
      boolErrorSeo=false;
      boolErrorPrecio=false;
      boolErrorStock=false;

      boolErrorSrcimg1=false;
      boolHabilitarValidacionSrcImg=false;

       //tblproducto
      nombreproduct='';
      descripcion='';
      seo='';
      precio='';
      stock='';

      srcimg1='';

      //OBTENEMOS LOS DATOS DEL FORMULARIO
      nombreproduct=$('#modificar_nombre_producto_Complementario').val();
      descripcion=$('#modificar_descripcion_producto_Complementario').val();
      seo=$('#modificar_nombre_producto_Complementario').val().replace(" ", '');;
      precio=$('#modificar_precio_producto_Complementario').val();
      stock=$('#modificar_stock_producto_Complementario').val();

      srcimg1=$('#modificar_srcimg1_producto_Complementario').val();
      if(srcimg1!='')
        boolHabilitarValidacionSrcImg=true;
      /////////////////////////DATOS GENERALES/////////////////////////
      //nombreproduct -> String
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      boolErrorNombre=validarCamposString(nombreproduct,90);      
      if(boolErrorNombre){ $( "#modificar_nombre_producto_Complementario" ).addClass( "md-input-danger" ); boolError=true; }
      else{ $( "#modificar_nombre_producto_Complementario" ).removeClass( "md-input-danger" ); }
      //nombreproduct -> String
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      boolErrorDescripcion=validarCamposString(descripcion,300);      
      if(boolErrorDescripcion){ $( "#modificar_descripcion_producto_Complementario" ).addClass( "md-input-danger" ); boolError=true; }
      else{ $( "#modificar_descripcion_producto_Complementario" ).removeClass( "md-input-danger" ); }
      //nombreproduct -> String
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      /*
      boolErrorSeo=validarCamposString(seo,250);      
      if(boolErrorSeo){ $( "#modificar_seo_producto_Complementario" ).addClass( "md-input-danger" ); boolError=true; }
      else{ $( "#modificar_seo_producto_Complementario" ).removeClass( "md-input-danger" ); }
      */
      //nombreproduct -> Number
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      boolErrorPrecio=validarCamposNumericos(precio);      
      if(boolErrorPrecio){ $( "#modificar_precio_producto_Complementario" ).addClass( "md-input-danger" ); boolError=true; }
      else{ $( "#modificar_precio_producto_Complementario" ).removeClass( "md-input-danger" ); }
      //nombreproduct -> String
      //VALIDAR CAMPOS OBLIGATORIOS VACIOS
      boolErrorStock=validarCamposNumericos(stock);      
      if(boolErrorStock){ $( "#modificar_stock_producto_Complementario" ).addClass( "md-input-danger" ); boolError=true; }
      else{ $( "#modificar_stock_producto_Complementario" ).removeClass( "md-input-danger" ); }
      ///////////////////////////////////////////////////////////////////////////
      /////////////////////////DATOS FOTOGRAFIA//////////////////////////////////
      //srcimg1
      if(boolHabilitarValidacionSrcImg)
      {
        boolErrorSrcimg1=validarCamposImg(srcimg1);      
        if(boolErrorSrcimg1){ $( "#modificar_srcimg1_producto_Complementario_titulo" ).css('color','red'); boolError=true; }
        else{ $( "#modificar_srcimg1_producto_Complementario_titulo" ).css('color','black'); }
      }
      ///////////////////////////////////////////////////////////////////////////
      
      if(!boolError)
      {
        console.log('actualizar producto complementario');
         UIkit.modal("#popup_spinner_modificando_producto",{bgclose: false}).show();
        actualizarProductoComplementario();      
      }
      else
      {
        UIkit.modal("#popup_spinner_modificando_producto").hide();
        UIkit.modal.alert(mensaje_error_validacion);
      }       
    }
  

  }
  //FUNCIONES DE VALIDACION DE DATOS/////////////////////////////////////////////////////////////////////////////////
  function validarCamposString(string,numCaracterValido)
  {
    boolErrorString=false;
    if(string=='')
      boolErrorString=true;
    //VALIDAR RANGO DE DATOS ACEPTABLES
    if(string.length>numCaracterValido)
      boolErrorString=true;
    //VALIDAR CAMPOS SOLO CON ESPACIOS
    if(!string.trim())
      boolErrorString=true;
    return boolErrorString;
  }
  function validarCamposNumericos(numero)
  {
    boolErrorNumero=false;
    if(numero=='')
      boolErrorNumero=true;
    //VALIDAR RANGO DE DATOS ACEPTABLES
    if(numero<0||boolErrorNumero)
      boolErrorNumero=true;
    //VALIDAR CAMPOS NO SON NUMEROS
    if(!$.isNumeric(numero)||boolErrorNumero)
      boolErrorNumero=true;
    return boolErrorNumero;
  }
  function validarCamposSelect(option)
  {
    boolErrorSelect=false;
    if(option=='')
      boolErrorSelect=true;
    return boolErrorSelect;
  }
  function validarCamposImg(srcimg)
  {
    boolErrorSrcimg=false;
    if(srcimg=='')
      boolErrorSrcimg=true;
    return boolErrorSrcimg;
  }
  function cargarValoresAltaProductoLinea(){    
    //BORRAR Y VOVLER A CARGAR
    arregloCategoriaProductoId.length=0;
    arregloCategoriaProductoNombre.length=0;
    arregloClasificacionProductoId.length=0;
    arregloClasificacionProductoNombre.length=0;
    arregloEspecifiIngredientesId.length=0;    
    arregloEspecifiIngredientesNombre.length=0;
    arregloEventosId.length=0;
    arregloEventosNombre.length=0;
    $("#alta_clasificacion_producto_linea").empty();
    $("#alta_clasificacion_producto_cotizador").empty();

    $("#alta_categoria_producto_linea").empty();
    $("#alta_categoria_producto_cotizador").empty();

    $("#alta_especificingredientes_producto_linea").empty();
    $("#alta_especificingredientes_producto_detalle_linea").empty();
    $("#alta_especificingredientes_producto_cotizador").empty();

    //cotizador
    $("#alta_evento_producto_cotizador").empty();

    $("#alta_clasificacion_producto_linea").append('<option value=""></option>');
    $("#alta_clasificacion_producto_cotizador").append('<option value=""></option>');
    $("#alta_categoria_producto_linea").append('<option value=""></option>');
    $("#alta_categoria_producto_cotizador").append('<option value=""></option>');
    $("#alta_especificingredientes_producto_linea").append('<option value=""></option>');
    $("#alta_especificingredientes_producto_detalle_linea").append('<option value=""></option>');
    $("#alta_especificingredientes_producto_cotizador").append('<option value=""></option>');
    $("#alta_evento_producto_cotizador").append('<option value=""></option>');

    //mostar la categorias disponibles
    $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/getAllTblcategproductAct.php",  data: {solicitadoBy:"WEB"}  })
      .done(function( msg ) {   $.each(msg.datos, function(i,item){  
        $("#alta_categoria_producto_linea").append('<option value="'+msg.datos[i].idtblcategproduct+'">'+msg.datos[i].tblcategproduct_nombre+'</option>');  
        arregloCategoriaProductoId.push(msg.datos[i].idtblcategproduct);
        arregloCategoriaProductoNombre.push(msg.datos[i].tblcategproduct_nombre);
      });  })
      .fail(function( jqXHR, textStatus ) {  console.log("getAllTblcategproductAct fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
      .always(function(){  /*console.log("always");*/  });
    //mostrar clasificacion disponibles
    $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/getAllTblclasifproductAct.php",  data: {solicitadoBy:"WEB"}  })
      .done(function( msg ) {  
        $.each(msg.datos, function(i,item){  $("#alta_clasificacion_producto_linea").append('<option value="'+msg.datos[i].idtblclasifproduct+'">'+msg.datos[i].tblclasifproduct_nombre+'</option>');  
        arregloClasificacionProductoId.push(msg.datos[i].idtblclasifproduct);
        arregloClasificacionProductoNombre.push(msg.datos[i].tblclasifproduct_nombre);
      });
      })
      .fail(function( jqXHR, textStatus ) {  console.log("getAllTblclasifproductAct fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
      .always(function(){  /*console.log("always");*/  });
    // mostar las especific de ingredeinte disponibles
    $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/getAllTblespecificingrediente.php",  
	data: {solicitadoBy:"WEB"}  })
      .done(function( msg ) {  
        $.each(msg.datos, function(i,item){
          //AGREGAMOS LAS OPCIONES DE ESPEFICICACION DE INGREDIENTE PARA ALTA DE PRODUCTO EN LINEA          
          $("#alta_especificingredientes_producto_linea").append('<option value="'+msg.datos[i].idtblespecificingrediente+'">'+msg.datos[i].tblespecificingrediente_nombre+'</option>');
          //AGREGAMOS LAS OPCIONES DE ESPEFICICACION DE INGREDIENTE PARA ALTA DE PRODUCTO DETALLE EN LINEA  
          $("#alta_especificingredientes_producto_detalle_linea").append('<option value="'+msg.datos[i].idtblespecificingrediente+'">'+msg.datos[i].tblespecificingrediente_nombre+'</option>');
          arregloEspecifiIngredientesId.push(msg.datos[i].idtblespecificingrediente);
          arregloEspecifiIngredientesNombre.push(msg.datos[i].tblespecificingrediente_nombre);  
        });        
      })
      .fail(function( jqXHR, textStatus ) {  console.log("getAllTblespecificingrediente fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
      .always(function(){  /*console.log("always");*/  });
      //COTIZADOR
      $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/getAllTbleventoAct.php",  data: {solicitadoBy:"WEB"}  })
      .done(function( msg ) {
        //console.log('entro al edone de eventos'+msg);
        $.each(msg.datos, function(i,item){
          //console.log('entro al each de evento');          
          $("#alta_evento_producto_cotizador").append('<option value="'+msg.datos[i].idtblevento+'">'+msg.datos[i].tblevento_nombre+'</option>');
          arregloEventosId.push(msg.datos[i].idtblevento);
          arregloEventosNombre.push(msg.datos[i].tblevento_nombre);  
        });
        
      })
      .fail(function( jqXHR, textStatus ) {  console.log("getAllTbleventoAct fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
      .always(function(){  /*console.log("always");*/  });
  }
  function mostrarProductos(){
    /*
    Variables
     */
    popup_modificarproductolinea='';
    popup_productEliminar='';
    popup_nuevoproductolinea='';
    ProductoJS='';
    boton_nuevoproductolinea='';
    idtblproducto='';
    tblproducto_nombre='';
    productoAcitvado='';
    productoImagen='';
    productdetalle_stock='';
    productdetalle_idproducto='';
    inputStockProductoLinea='';
    productdetalle_size='';
    arregloMostrarimagen=[]; 
    arregloMostrarimagenCotizador=[]; 
    arregloMostrarimagenComplementario=[]; 
    //CONSTANTES
    popup_modificarproductolinea="#popup_modificarproductolinea";
    popup_modificarproductocotizador="#popup_modificarproductocotizador";
    popup_modificarproductoComplementario="#popup_modificarproductoComplementario";
    popup_productEliminar="#popup_productEliminar";
    popup_nuevoproductolinea="#popup_nuevoproductolinea";
    popup_nuevoproductodetallelinea="#popup_nuevoproductodetallelinea";
    popup_nuevoproductocotizador="#popup_nuevoproductocotizador";
    popup_nuevoproductoComplementario="#popup_nuevoproductoComplementario";
    PRODUCTOSIMGSRC="./../assests_general/productos/linea/";
    PRODUCTOSIMGCOTIZADORSRC="./../assests_general/productos/cotizador/";
    PRODUCTOSIMGCOMPLEMENTARIOSRC="./../assests_general/productos/complementario/";
    PRODUCTOSIZE="#sizeProductoLinea";
    top="top";
    modal_new="#modal_new";

    $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/getAllTblproductoTblproductoDetalleOfProveedor.php",  data: {solicitadoBy:"WEB",idtblproveedor:idtblproveedor}  })
      .done(function( msgTblProductoYDetalles ) {
        
        if(msgTblProductoYDetalles.datos!="Hubo algun error, vuelve a intentarlo WEB")
        {
          $.each(msgTblProductoYDetalles.datos, function(i,item){
            idexArreglo=i;
            idProducto=msgTblProductoYDetalles.datos[i].idProducto;
            nombre=msgTblProductoYDetalles.datos[i].nombre;
            //alert('mostrar liena nombre::'+nombre);
            descripcion=msgTblProductoYDetalles.datos[i].descripcion;
            ingredientes=msgTblProductoYDetalles.datos[i].ingredientes;
            seo=msgTblProductoYDetalles.datos[i].seo;
            activadoGeneral=msgTblProductoYDetalles.datos[i].activadoGeneral;
            idtblcategproduct=msgTblProductoYDetalles.datos[i].idtblcategproduct;
            idtblclasifproduct=msgTblProductoYDetalles.datos[i].idtblclasifproduct;

            idProductoDetalle=msgTblProductoYDetalles.datos[i].idProductoDetalle;
            diasElaboracion=msgTblProductoYDetalles.datos[i].diaselaboracion;
            stock=msgTblProductoYDetalles.datos[i].stock;
			
            precioreal=msgTblProductoYDetalles.datos[i].precioreal;
            diamentro=msgTblProductoYDetalles.datos[i].diamentro;
            largo=msgTblProductoYDetalles.datos[i].largo;
            ancho=msgTblProductoYDetalles.datos[i].ancho;
            piezas=msgTblProductoYDetalles.datos[i].piezas;
            activado =msgTblProductoYDetalles.datos[i].activado;
            nombreIngrediente=msgTblProductoYDetalles.datos[i].nombreIngrediente;
			
			//------reyna------------
			tamanio=msgTblProductoYDetalles.datos[i].tamanio;
			porciones=msgTblProductoYDetalles.datos[i].porciones;
			//--------------------------
            //SI EN EL ARREGLO NO ESTA YA EL ID DEL PRODUCTO LO AÑADIMOS AL ARREGLO
            if($.inArray(idProducto,arregloMostrarimagen)==-1)          
              arregloMostrarimagen.push(idProducto);

            //TBLPRODUCTODETALLE
            arregloInfoUnProducto.push(idProducto);
            arregloInfoUnProducto.push(nombre);
            arregloInfoUnProducto.push(idProductoDetalle);
            arregloInfoUnProducto.push(diasElaboracion);          
            arregloInfoUnProducto.push(stock);
			//------------reyna-----------
			arregloInfoUnProducto.push(tamanio);
			arregloInfoUnProducto.push(porciones);
			//--------------------
            arregloInfoUnProducto.push(precioreal);
            arregloInfoUnProducto.push(diamentro);
            arregloInfoUnProducto.push(largo);
            arregloInfoUnProducto.push(ancho);
            arregloInfoUnProducto.push(piezas);
            arregloInfoUnProducto.push(activado);
            arregloInfoUnProducto.push(nombreIngrediente);

            //TBLPRODUCTO
            arregloInfoUnProducto.push(descripcion);
            arregloInfoUnProducto.push(ingredientes);
            arregloInfoUnProducto.push(seo);
            arregloInfoUnProducto.push(activadoGeneral);
            arregloInfoUnProducto.push(idtblcategproduct);
            arregloInfoUnProducto.push(idtblclasifproduct);

            //SE AGREGA AL ARREGLO QUE TANDRA A TODOS LOS PRODUCTOS Y LIMPIAMOS EL ARREGLO arregloInfoUnProducto PARA EL SIGUIENTE PRODUCTO
            arregloInfoTodosProducto.push(arregloInfoUnProducto);
            arregloInfoUnProducto=[];

            if(diamentro!=null)
              productdetalle_size=diamentro+' diametro';
            else if(largo!=null)
              productdetalle_size=largo+" x "+ancho+' largo/ancho';
            else if(piezas!="")
              productdetalle_size=piezas+' piezas';
            productoAcitvado=verificarActivoProducto(idProductoDetalle,activado);
            //alert('parametro nombre::'+nombre) 
			
			//----------reyna------
            ProductoJS=productosPlantilla2(idexArreglo,idProducto,idProductoDetalle,nombre,stock,tamanio,productdetalle_size,productoAcitvado,nombreIngrediente);
           //-----------------------
		   
		   
		   //LANZA LA PLANTILLA AL DOM
            $("#productoslineaPlantilla").append(ProductoJS);
          });
        }
        boton_nuevoproductolinea=agregarProductoPlantilla(); 
        $("#productoslineaPlantilla").append(boton_nuevoproductolinea);
        arregloMostrarimagen.forEach(function (item, index, array) {
            //INICIO IMG
          $.ajax({  method: "POST", dataType: "json",  url: "./../../controllers/getAllTblproductImgProducto.php",  data: {solicitadoBy:"WEB",idtblproducto:item}  })
            .done(function( msgTblProductoImg ) {
              //AGREGAMOS EL ID DEL PRODUCTO
              arregloImagenesUnProducto.push(item);        
              $.each(msgTblProductoImg.datos, function(i,item){
                
                productoImagen=PRODUCTOSIMGSRC+msgTblProductoImg.datos[i].tblproductimg_srcimg;

                tblproductimg_idproducto=msgTblProductoImg.datos[i].tblproducto_idtblproducto;

                imgSrcProductoLinea="imagenPortadaProductoLinea"+tblproductimg_idproducto;
                //AGREGAMOS LAS IMAGENES DE ESE PRODUCTO
                arregloImagenesUnProducto.push(productoImagen);

                //QUITAR EL ICONO DE CARGANDO
                //$('#load_imagenPortadaProductoLinea'+tblproductimg_idproducto).remove();
                $("[name=load_imagenPortadaProductoLinea"+tblproductimg_idproducto+"]").remove();
                

                //CARGANDO EL ELEMNT DE IMAGEN Y CARGAR LA IMAGEN DEFAULT
                if(i==0)
                $("[name=div_imagenPortadaProductoLinea"+tblproductimg_idproducto+"]").append('<img name="imagenPortadaProductoLinea'+tblproductimg_idproducto+'" class="md-card-head-img" src="./../assests_general/productos/default-img.gif" alt=""/>');  
                //$('#div_imagenPortadaProductoLinea'+tblproductimg_idproducto).append('<img name="imagenPortadaProductoLinea'+tblproductimg_idproducto+'" class="md-card-head-img" src="./../assests_general/productos/default-img.gif" alt=""/>');  
                
                //LANZAMOS LA SEGUNDA IMAGEN DEL PRODUCTO
                if(i==1)
                  $("[name="+imgSrcProductoLinea+"]").attr("src",productoImagen);
                //if(i==0)
                  //alert('imgSrcProductoLinea::'+imgSrcProductoLinea+' productoImagen::'+productoImagen);
                //return false;
              });
              //SE AGREGA AL ARREGLO QUE TANDRA A TODOS LAS IMAGENES DE TODOS LOS PRODUCTOS Y LIMPIAMOS EL ARREGLO arregloImagenesUnProducto PARA EL SIGUIENTE PRODUCTO
              arregloImagenesTodosProducto.push(arregloImagenesUnProducto);
              arregloImagenesUnProducto=[];
            })
            .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
            .always(function(){  /*console.log("always");*/ });
            //FIN IMG


        });
          
      })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
      .always(function(){  /*console.log("always");*/ });

      //PRODUCTOS COTIZADOR
      $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/getAllTblproductcotizador.php",  data: {solicitadoBy:"WEB",idtblproveedor:idtblproveedor}  })
        .done(function( msgTblProductoCotizador ) {
          if(msgTblProductoCotizador.datos!="Hubo algun error, vuelve a intentarlo WEB")
        {
          //console.log('entro a msgTblProductoCotizador');
          $.each(msgTblProductoCotizador.datos, function(i,item){
            //console.log('tiene iunfor entro al each');
            indexArregloCotizador=i;
            idProductoCotizador=msgTblProductoCotizador.datos[i].idtblproductcotizador;
            nombreCotizador=msgTblProductoCotizador.datos[i].tblproductcotizador_nombre;
            descripcionCotizador=msgTblProductoCotizador.datos[i].tblproductcotizador_descripcion;
            ingredienteCotizador=msgTblProductoCotizador.datos[i].tblproductcotizador_ingrediente;
            promcalificacionCotizador=msgTblProductoCotizador.datos[i].tblproductcotizador_promcalificacion;
            diaselaboracionCotizador=msgTblProductoCotizador.datos[i].tblproductcotizador_diaselaboracion;
            activadoCotizador=msgTblProductoCotizador.datos[i].tblproductcotizador_activado;
            idtbleventoCotizador=msgTblProductoCotizador.datos[i].tblevento_idtblevento;
            idtblproveedorCotizador=msgTblProductoCotizador.datos[i].tblproveedor_idtblproveedor;

            arregloMostrarimagenCotizador.push(idProductoCotizador);

            //TBLPRODUCTOCOTIZADOR
            
            arregloInfoUnProductoCotizador.push(idProductoCotizador);
            arregloInfoUnProductoCotizador.push(nombreCotizador);
            arregloInfoUnProductoCotizador.push(descripcionCotizador);
            arregloInfoUnProductoCotizador.push(ingredienteCotizador);
            arregloInfoUnProductoCotizador.push(promcalificacionCotizador);
            arregloInfoUnProductoCotizador.push(diaselaboracionCotizador);
            arregloInfoUnProductoCotizador.push(activadoCotizador);
            arregloInfoUnProductoCotizador.push(idtbleventoCotizador);
            arregloInfoUnProductoCotizador.push(idtblproveedorCotizador);      

            //SE AGREGA AL ARREGLO QUE TANDRA A TODOS LOS PRODUCTOS Y LIMPIAMOS EL ARREGLO arregloInfoUnProducto PARA EL SIGUIENTE PRODUCTO
            arregloInfoTodosProductoCotizador.push(arregloInfoUnProductoCotizador);
            arregloInfoUnProductoCotizador=[];

            
             
            //productoAcitvadoCotizador=verificarActivoProductoCotizador(idProductoCotizador,activoCotizador);
            nombreCheckBox="product_edit_active_control_prod_cotizador"+idProductoCotizador;   
            productoAcitvado='<input type="checkbox" data-switchery checked name="product_edit_active_control_prod_cotizador" id="'+nombreCheckBox+'" onclick="activarProducto('+nombreCheckBox+','+idProductoCotizador+')"/>';
            productoAcitvadoCotizador=productoAcitvado
            ProductoJS=productosPlantillaCotizador(indexArregloCotizador,idProductoCotizador,nombreCotizador,productoAcitvadoCotizador);
            //LANZA LA PLANTILLA AL DOM
            $("#productoscotizadorPlantilla").append(ProductoJS);
            

          });
          }
          boton_nuevoproductoCotizador=agregarProductoPlantillaCotizador(); 
            $("#productoscotizadorPlantilla").append(boton_nuevoproductoCotizador);
           //INICIO COTIZADOR IMG
          arregloMostrarimagenCotizador.forEach(function (item, index, array) {
             
            $.ajax({  method: "POST", dataType: "json",  url: "./../../controllers/getAllTblproductcotimg.php",  data: {solicitadoBy:"WEB",idtblproductcotizador:item}  })
              .done(function( msgTblProductoCotizadorImg ) {
                //AGREGAMOS EL ID DEL PRODUCTO
                arregloImagenesUnProductoCotizador.push(item);        
                $.each(msgTblProductoCotizadorImg.datos, function(i,item){
                  
                  productoCotizadorImagen=PRODUCTOSIMGCOTIZADORSRC+msgTblProductoCotizadorImg.datos[i].tblproductcotimg_srcimg;

                  tblproductcotizador_idtblproductcotizador=msgTblProductoCotizadorImg.datos[i].tblproductcotizador_idtblproductcotizador;

                  imgSrcProductoCotizador="imagenPortadaProductoCotizador"+tblproductcotizador_idtblproductcotizador;
                  //AGREGAMOS LAS IMAGENES DE ESE PRODUCTO
                  arregloImagenesUnProductoCotizador.push(productoCotizadorImagen);

                  //QUITAR EL ICONO DE CARGANDO
                  $('#load_imagenPortadaProductoCotizador'+tblproductcotizador_idtblproductcotizador).remove();

                  //CARGANDO EL ELEMNT DE IMAGEN Y CARGAR LA IMAGEN DEFAULT
                  if(i==0)
                  {
                  $('#div_imagenPortadaProductoCotizador'+tblproductcotizador_idtblproductcotizador).append('<img name="imagenPortadaProductoCotizador'+tblproductcotizador_idtblproductcotizador+'" class="md-card-head-img" src="./../assests_general/productos/default-img.gif" alt=""/>');
                 }
                 console.log('imagen producto cotizador->i::'+i+' item::'+item);
                  //LANZAMOS LA SEGUNDA IMAGEN DEL PRODUCTO
                  if(i==1&&i<2)
                    $("[name="+imgSrcProductoCotizador+"]").attr("src",productoCotizadorImagen);
                  
                  //return false;
                });
                //SE AGREGA AL ARREGLO QUE TANDRA A TODOS LAS IMAGENES DE TODOS LOS PRODUCTOS Y LIMPIAMOS EL ARREGLO arregloImagenesUnProducto PARA EL SIGUIENTE PRODUCTO
                
                arregloImagenesTodosProductoCotizador.push(arregloImagenesUnProductoCotizador);
                arregloImagenesUnProductoCotizador=[];

              })
              .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
              .always(function(){   });          
          });
          //FIN IMG
          
            
        })
        .fail(function( jqXHR, textStatus ) {  console.log("getAllTblproductcotizador fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
        .always(function(){
          //console.log("getAllTblproductcotizador  always"); 
        });
      ///////////////////////////////////////////////////////////////////////////////////////////////////////
      //PRODUCTOS COMPLEMETARIO
      $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/getAllTblproductcomplemOfProveedor.php",  data: {solicitadoBy:"WEB",idtblproveedor:idtblproveedor}  })
        .done(function( msgTblProductoComplementario ) {
          //console.log('entro a msgTblProductoComplementario');
          
        if(msgTblProductoComplementario.datos!="Hubo algun error, vuelve a intentarlo WEB")
        {   
          $.each(msgTblProductoComplementario.datos, function(i,item){
            //console.log('tiene iunfor entro al each');
            indexArregloComplementario=i;
            idProductoComplementario=msgTblProductoComplementario.datos[i].idtblproductcomplem;
            nombreComplementario=msgTblProductoComplementario.datos[i].tblproductcomplem_nombre;
            descripcionComplementario=msgTblProductoComplementario.datos[i].tblproductcomplem_descripcion;
            seoComplementario=msgTblProductoComplementario.datos[i].tblproductcomplem_seo;
            precioRealComplementario=msgTblProductoComplementario.datos[i].tblproductcomplem_precioreal;
            srcimgComplementario=msgTblProductoComplementario.datos[i].tblproductcomplem_srcimg;
            activadoComplementario=msgTblProductoComplementario.datos[i].tblproductcomplem_activado;
            idtblproveedorComplementario=msgTblProductoComplementario.datos[i].tblproveedor_idtblproveedor;
            stockComplementario=msgTblProductoComplementario.datos[i].tblproductcomplem_stock;

            arregloMostrarimagenComplementario.push(idProductoComplementario);
                                
            //TBLPRODUCTOComplementario            
            arregloInfoUnProductoComplementario.push(idProductoComplementario);
            arregloInfoUnProductoComplementario.push(nombreComplementario);
            arregloInfoUnProductoComplementario.push(descripcionComplementario);
            arregloInfoUnProductoComplementario.push(seoComplementario);
            arregloInfoUnProductoComplementario.push(precioRealComplementario);
            arregloInfoUnProductoComplementario.push(srcimgComplementario);
            arregloInfoUnProductoComplementario.push(activadoComplementario);
            arregloInfoUnProductoComplementario.push(idtblproveedorComplementario);
            arregloInfoUnProductoComplementario.push(stockComplementario);

            //SE AGREGA AL ARREGLO QUE TANDRA A TODOS LOS PRODUCTOS Y LIMPIAMOS EL ARREGLO arregloInfoUnProducto PARA EL SIGUIENTE PRODUCTO
            arregloInfoTodosProductoComplementario.push(arregloInfoUnProductoComplementario);
            arregloInfoUnProductoComplementario=[];

            //productoAcitvadoComplementario=verificarActivoProductoComplementario(idProductoComplementario,activoComplementario);
            nombreCheckBox="product_edit_active_control_prod_Complementario"+idProductoComplementario;   
            productoAcitvado='<input type="checkbox" data-switchery checked name="product_edit_active_control_prod_Complementario" id="'+nombreCheckBox+'" onclick="activarProducto('+nombreCheckBox+','+idProductoComplementario+')"/>';
            productoAcitvadoComplementario=productoAcitvado
            ProductoJS=productosPlantillaComplementario(indexArregloComplementario,idProductoComplementario,nombreComplementario,stockComplementario, activadoComplementario,srcimgComplementario);
            //LANZA LA PLANTILLA AL DOM
            $("#productosComplementarioPlantilla").append(ProductoJS);
            //QUITAR EL ICONO DE CARGANDO
            $('#load_imagenPortadaProductoComplementario'+idProductoComplementario).remove();

          });          
           }   
            boton_nuevoproductoComplementario=agregarProductoPlantillaComplementario(); 
            $("#productosComplementarioPlantilla").append(boton_nuevoproductoComplementario);
        })
        .fail(function( jqXHR, textStatus ) {  console.log("getAllTblproductComplementario fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
        .always(function(){
          //console.log("getAllTblproductComplementario  always"); 
        });
  }
  /*
  Funcion para geenerar el cuadro donde se muestran los productos
  '<i class="uk-icon-spinner uk-icon-spin"></i>';
   */
  function productosPlantilla2(idexArreglo,idProducto,idProductoDetalle,nombre,stock,tamanio,productdetalle_size,activado,nombreIngrediente){
    //nombre = nombre.replace(' ', '_');
    //mensajeEliminacion="'¿Realmente deseas eliminar el producto?'"; id="div_imagenPortadaProductoLinea'+idProducto+'" class="md-card-content"
    ProductoJS='<div data-product-name="P2" class="productos">'+
	'<div class="md-card md-card-hover-img">  '+
	'<div class="uk-position-absolute uk-position-top-left uk-margin-left uk-margin-top md-fab md-fab-small md-fab-accent" data-uk-modal="{target:popup_nuevoproductodetallelinea,bgclose:false,modal:false,modal:false}" style="z-index: 1;" onclick="altaProductoDetalleLinea('+idexArreglo+','+idProducto+','+idProductoDetalle+','+idProductoDetalle+')" > <i class="material-icons">&#xE145;</i> '+
	'</div>  <div name="div_imagenPortadaProductoLinea'+idProducto
	+'" class="md-card-head uk-text-center uk-position-relative">  <i name="load_imagenPortadaProductoLinea'+
	idProducto+'" class="uk-icon-spinner uk-icon-spin uk-icon-large"></i> '+
	' </div><div class="md-card-content"><ul class="md-list"><li>'+
	'<div class="md-list-content"><h4 class="heading_c uk-margin-bottom">'+nombre+
	'</h4></div></li><li><div id="boton_status_activado'+idProductoDetalle+
	'" class="uk-float-right">'+activado+'</div>'+
	'<label class="uk-display-block uk-margin-small-top" for="product_edit_active_control">Activo</label>'+
	'</li> <li><label class="md-list-heading">Tamaño : </label><div id="sizeProductoLinea'+idProductoDetalle+
	'" class="uk-float-right"><p class="uk-text-small uk-text-bold">'+productdetalle_size+'-'+tamanio+'</p></div></li><li><label class="md-list-heading">Caract. Específica : </label>'+
	'<div class="uk-float-right"><label class="uk-text-small uk-text-bold">'+nombreIngrediente
	+'</label></div></li><li><div class="md-list-content-horizontal"> '+
	'<label class="md-list-heading uk-text-bold">Stock</label><div class="uk-float-right">'+
	'<input id="numeric_stockProductoLinea'+idProductoDetalle+
	'" class="uk-form-width-small" type="number"  min="0" max="100" step="1" value='+stock+
	' onblur="actualizarStockProductoLinea('+idProductoDetalle+')" onclick="actualizarStockProductoLinea('+
	idProductoDetalle+')"/></div> </div></li>    <li> <div class="uk-grid"> <div class="uk-width-1-2">'+
	' <button type="button" class="md-btn md-btn-small" onclick=" UIkit.modal.confirm('+mensajeEliminacion
	+', function(){ eliminarProductoLinea('+idProducto+','+idProductoDetalle+'); });  ">Eliminar</button></div>'+
	'  <div class="uk-width-1-2">'+
	'<button type="button" class="md-btn md-btn-small" data-uk-modal="{target:popup_modificarproductolinea,bgclose:false,modal:false,modal:false}" onclick="modificarProductoLinea('+idexArreglo+','+idProducto+','+idProductoDetalle+','+idProductoDetalle+')">Modificar</button> '+
	'  </div> </div> </li>      </ul></div></div></div>';  
      return ProductoJS
   }
  function productosPlantillaCotizador(idexArreglo,idProducto,nombre,activado){
    nombre = nombre.replace(' ', '_');
    //mensajeEliminacion="'¿Realmente deseas eliminar el producto?'";
    ProductoJS='<div data-product-name="P2" class="productos"><div class="md-card md-card-hover-img"><div id="div_imagenPortadaProductoCotizador'+idProducto+'" class="md-card-head uk-text-center uk-position-relative">  <i id="load_imagenPortadaProductoCotizador'+idProducto+'" class="uk-icon-spinner uk-icon-spin uk-icon-large"></i>  </div><div class="md-card-content"><ul class="md-list"><li><div class="md-list-content"><h4 class="heading_c uk-margin-bottom">'+nombre+'</h4></div></li><li><div id="boton_status_activado'+idProducto+'" class="uk-float-right">'+activado+'</div><label class="uk-display-block uk-margin-small-top" for="product_edit_active_control">Activo</label></li>  <li><div class="uk-grid"> <div class="uk-width-1-2"> <button type="button" class="md-btn md-btn-small" onclick="UIkit.modal.confirm('+mensajeEliminacion+', function(){ eliminarProductoCotizador('+idProducto+'); }); ">Eliminar</button></div> <div class="uk-width-1-2"> <button type="button" class="md-btn md-btn-small" data-uk-modal="{target:popup_modificarproductocotizador,bgclose:false,modal:false,modal:false}" onclick="modificarProductoCotizaor('+idexArreglo+','+idProducto+','+idProducto+')">Modificar</button>   </div> </div></li>      </ul></div></div></div>';  
      return ProductoJS
  }
  function productosPlantillaComplementario(idexArreglo,idProducto,nombre,stock,activado,srcimgComplementario){
    nombre = nombre.replace(' ', '_');
    //stock=99;
    //mensajeEliminacion="'¿Realmente deseas eliminar el producto?'";
    ProductoJS='<div data-product-name="P2" class="productos"><div class="md-card md-card-hover-img"><div id="div_imagenPortadaProductoComplentario'+idProducto+'" class="md-card-head uk-text-center uk-position-relative">  <i id="load_imagenPortadaProductoComplementario'+idProducto+'" class="uk-icon-spinner uk-icon-spin uk-icon-large"></i>  <img id="imagenPortadaProductoComplementario'+idProducto+'" name="imagenPortadaProductoComplementario'+idProducto+'" class="md-card-head-img" src="./../assests_general/productos/complementario/'+srcimgComplementario+'" alt=""/></div><div class="md-card-content"><ul class="md-list"><li><div class="md-list-content"><h4 class="heading_c uk-margin-bottom">'+nombre+'</h4></div></li><li><div id="boton_status_activado'+idProducto+'" class="uk-float-right">'+activado+'</div><label class="uk-display-block uk-margin-small-top" for="product_edit_active_control">Activo</label></li>    <li><div class="md-list-content-horizontal"> <label class="md-list-heading uk-text-bold">Stock</label><div class="uk-float-right"><input id="numeric_stockProductoComplementario'+idProducto+'" class="uk-form-width-small" type="number"  min="0" max="100" step="1" value='+stock+' onblur="actualizarStockProductoComplementario('+idProducto+')" onclick="actualizarStockProductoComplementario('+idProducto+')"/></div> </div></li>    <li><div class="uk-grid"> <div class="uk-width-1-2"> <button type="button" class="md-btn md-btn-small" onclick=" UIkit.modal.confirm('+mensajeEliminacion+', function(){ eliminarProductoComplementario('+idProducto+'); }); ">Eliminar</button></div>  <div class="uk-width-1-2"><button type="button" class="md-btn md-btn-small" data-uk-modal="{target:popup_modificarproductoComplementario,bgclose:false,modal:false,modal:false}" onclick="modificarProductoComplementario('+idexArreglo+','+idProducto+','+idProducto+')">Modificar</button>   </div> </div></li>      </ul></div></div></div>';  
      return ProductoJS
  }
  function llamarFuncion(idProducto){
    UIkit.modal.confirm('Are you sure?', function(){ UIkit.modal.alert('Confirmed!'); });
  }
  /*
  genera un cuadro de a?dir productos 
   */
  function agregarProductoPlantilla(){
    boton_nuevoproductolinea='<div data-product-name="agregarproductolinea">        <div class="uk-badge md-card ">          <div class="md-card-content uk-border-circle">            <div class="uk-text-center uk-border-circle"> <h3>Agregar un producto nuevo</h3>            <button id="agregar" type="button" class="md-btn md-btn-flat md-btn-small uk-border-circle" data-uk-modal="{target:popup_nuevoproductolinea,bgclose:false,modal:false,modal:false}">                <label class="menu_icon"><i class="material-icons md-48">&#xE145;</i></label>              </button>            </div>          </div>        </div></div>';
    boton_nuevoproductolinea='<div class="md-card-head-avatar md-fab" data-uk-modal="{target:popup_nuevoproductolinea,bgclose:false,modal:false,modal:false}">  <i class="material-icons">&#xE145;</i> </div>';
    return boton_nuevoproductolinea;
  }

  function agregarProductoPlantillaCotizador(){
    boton_nuevoproductoCotizador='<div data-product-name="agregarproductoCotizador">        <div class="uk-badge md-card ">          <div class="md-card-content uk-border-circle">            <div class="uk-text-center uk-border-circle"> <h3>Agregar un producto para cotizar nuevo</h3>            <button id="agregar" type="button" class="md-btn md-btn-flat md-btn-small uk-border-circle" data-uk-modal="{target:popup_nuevoproductocotizador}">                <label class="menu_icon"><i class="material-icons md-48">&#xE145;</i></label>              </button>            </div>          </div>        </div></div>';
    boton_nuevoproductoCotizador='<div class="md-card-head-avatar md-fab" data-uk-modal="{target:popup_nuevoproductocotizador,bgclose:false,modal:false,modal:false}">  <i class="material-icons">&#xE145;</i> </div>';
    return boton_nuevoproductoCotizador;
  }

  function agregarProductoPlantillaComplementario(){
    boton_nuevoproductoComplementario='<div data-product-name="agregarproductoComplementario">        <div class="uk-badge md-card ">          <div class="md-card-content uk-border-circle">            <div class="uk-text-center uk-border-circle"> <h3>Agregar un producto complementario nuevo</h3>            <button id="agregar" type="button" class="md-btn md-btn-flat md-btn-small uk-border-circle" data-uk-modal="{target:popup_nuevoproductoComplementario}">                <label class="menu_icon"><i class="material-icons md-48">&#xE145;</i></label>              </button>            </div>          </div>        </div></div>';
    boton_nuevoproductoComplementario='<div class="md-card-head-avatar md-fab" data-uk-modal="{target:popup_nuevoproductoComplementario,bgclose:false,modal:false,modal:false}">  <i class="material-icons">&#xE145;</i> </div>';
    return boton_nuevoproductoComplementario;
  }

  /*
  Funcionp para validar si los productos estan activados
   */
  function verificarActivoProducto(idProductoDetalle,tblproducto_activado)
  {
    nombreCheckBox="product_edit_active_control_prod_linea"+idProductoDetalle;
    if(tblproducto_activado==1)
      productoAcitvado='<input type="checkbox" data-switchery checked name="product_edit_active_control_prod_linea" id="'+nombreCheckBox+'" onclick="activarProducto('+nombreCheckBox+','+idProductoDetalle+')"/>';
    else if(tblproducto_activado==0)
      productoAcitvado='<input type="checkbox" data-switchery name="product_edit_active_control" id="'+nombreCheckBox+'" onclick="activarProducto('+nombreCheckBox+','+idProductoDetalle+')"/>';
    else
      productoAcitvado='<input type="checkbox" data-switchery name="product_edit_active_control" id="'+nombreCheckBox+'" onclick="activarProducto('+nombreCheckBox+','+idProductoDetalle+')"/>';
    return productoAcitvado;
  }
  function verificarActivoProductoCotizador(idProducto,tblproducto_activado)
  {
    nombreCheckBox="product_edit_active_control_prod_cotizador"+idProducto;
    if(tblproducto_activado==1)
      productoAcitvado='<input type="checkbox" data-switchery checked name="product_edit_active_control_prod_cotizador" id="'+nombreCheckBox+'" onclick="activarProducto('+nombreCheckBox+','+idProducto+')"/>';
    else if(tblproducto_activado==0)
      productoAcitvado='<input type="checkbox" data-switchery name="product_edit_active_control" id="'+nombreCheckBox+'" onclick="activarProducto('+nombreCheckBox+','+idProducto+')"/>';
    else
      productoAcitvado='<input type="checkbox" data-switchery name="product_edit_active_control" id="'+nombreCheckBox+'" onclick="activarProducto('+nombreCheckBox+','+idProducto+')"/>';
    return productoAcitvado;
  }
  function dePrueba(event)
  {
     $('#nombreEliminarH3').text('dePrueba'+event);   
  }
  function activarProducto(checkboxAActivar,idProductoDetalle)
  {

    if(checkboxAActivar.checked){
      activado=1;       
    }else{
      activado=0;
    }
    //INICIO AJAX ACTIVAR PRODUCTO
    $.ajax({  method: "POST", dataType: "json",  url: "./../../controllers/setUpdateTblproductDetalleActivar.php",  data: {solicitadoBy:"WEB",idtblproductdetalle:idProductoDetalle,activado:activado,emailusuamodifico:emailproveedor}  })
      .done(function( msgTblproductDetalle ) {        
      })
      .fail(function( jqXHR, textStatus ) {  console.log("setUpdateTblproductDetalleActivar fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
      .always(function(){  /*console.log("always");*/ });
    //FIN AJAX ACTIVAR PRODUCTO
  }
  function activarProductoCotizador(checkboxAActivar,idProducto)
  {
    if(checkboxAActivar.checked){
      activado=1;       
    }else{
      activado=0;
    }
    //INICIO AJAX ACTIVAR PRODUCTO
    $.ajax({  method: "POST", dataType: "json",  url: "./../../controllers/setUpdateTblproductDetalleActivar.php",  data: {solicitadoBy:"WEB",idtblproductdetalle:idProducto,activado:activado,emailusuamodifico:emailproveedor}  })
      .done(function( msgTblproductDetalle ) {        
      })
      .fail(function( jqXHR, textStatus ) {  console.log("setUpdateTblproductDetalleActivar fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
      .always(function(){  /*console.log("always");*/ });
    //FIN AJAX ACTIVAR PRODUCTO
  }
  function actualizarStockProductoLinea(idProductoDetalle){
    stock=$('#numeric_stockProductoLinea'+idProductoDetalle).val();
    $.ajax({  method: "POST", dataType: "json",  url: "./../../controllers/setUpdateTblproductDetalleStock.php",  data: {solicitadoBy:"WEB",idtblproductdetalle:idProductoDetalle,stock:stock,emailusuamodifico:emailproveedor}  })
      .done(function( msgTblproductDetalle ) {        
      })
      .fail(function( jqXHR, textStatus ) {  console.log("setUpdateTblproductDetalleStock fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
      .always(function(){  /*console.log("always");*/ });
  }
  function actualizarStockProductoComplementario(idProducto){
    stock=$('#numeric_stockProductoComplementario'+idProducto).val();
    console.log('actualizarStockProductoComplementario');
    $.ajax({  method: "POST", dataType: "json",  url: "./../../controllers/setUpdateTblproductcomplemStock.php",  data: {solicitadoBy:"WEB",idtblproductcomplem:idProducto,stock:stock,emailusuamodifico:emailproveedor}  })
      .done(function( msgTblproductDetalle ) { 
        console.log('resultado::'+JSON.stringify(msgTblproductDetalle, null, 4));       
      })
      .fail(function( jqXHR, textStatus ) {  console.log("setUpdateTblproductDetalleStock fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
      .always(function(){  /*console.log("always");*/ });
  }
  
  
  function registrarProductoLinea(){  
    /*
    VARIABLES
     */
    //tblproducto
    nombreproduct='';
    descripcion='';
    ingredientes='';
    seo='';
    promcalif='';
    activado='';
    //idtblproveedor='';
    idtblcategproduc='';
    idtblclasifproduct='';
    //emailcreo='';

    //productoimg
    srcimg1='';
    srcimg2='';
    srcimg3='';
    idtblproducto='';
    //emailcreo='';

    //productodetalle
	
	//----------reyna----
	porciones2='';
	tamanio1='';
	//------------------
    diaselaboracion='';
    stock='';
    precioreal='';
    preciobp='';
    diametro='';
    largo='';
    ancho='';
    porciones='';
    piezas='';
    activado='';
    idtblespecifingrediente='';
    idtblproducto='';
    //emailcreo='';
    /*
    ASINGACION DE VALORES
     */
    nombreproduct=$('#alta_nombre_producto_linea').val();
    descripcion=$('#alta_descripcion_producto_linea').val();
    ingredientes=$('#alta_ingredientes_producto_linea').val();
    seo=$('#alta_nombre_producto_linea').val().replace(" ", '');
    promcalif='5';
    
    //activado=$('#alta_activado_producto_linea').val();
    //if(activado=='on'){activado=1;}
    //
    activado=$("#alta_activado_producto_linea").is(':checked');
    if(activado)
      activado=1;
    else
      activado=0;
    //idtblproveedor='1';
    idtblcategproduc=$('#alta_categoria_producto_linea').val();
    idtblclasifproduct=$('#alta_clasificacion_producto_linea').val();

    srcimg1=$('#alta_srcimg1_producto_linea').val().replace(/C:\\fakepath\\/i, '');
    srcimg2=$('#alta_srcimg2_producto_linea').val().replace(/C:\\fakepath\\/i, '');
    srcimg3=$('#alta_srcimg3_producto_linea').val().replace(/C:\\fakepath\\/i, '');

    //alert('imagnees srcimg1::'+srcimg1+' srcim2'+srcimg2+' srcimg3'+srcimg3);

	//---------reyna---------------
  porciones2=$('#alta_porciones_producto_linea').val();
  tamanio1= $('#alta_tamanio_producto_linea').val();
	
	//----------------------------
    diaselaboracion=$('#alta_detalle_diasElborar_producto_linea').val();
    stock=$('#alta_detalle_stock_producto_linea').val();
    precioreal=$('#alta_detalle_precioreal_producto_linea').val();

    preciobp=precioreal;
    diametro=$('#alta_clasifcategproduct_circular_diametro_producto_linea').val();
   largo=$('#alta_clasifcategproduct_cuadrado_largo_producto_linea').val();
   ancho=$('#alta_clasifcategproduct_cuadrado_ancho_producto_linea').val();
    piezas=$('#alta_clasifcategproduct_piezas_producto_linea').val();
 
    idtblespecificingrediente=$('#alta_especificingredientes_producto_linea').val();
   // if(diametro!=''){
    //  porciones=Math.round((Math.PI*diametro)/2);
   /*   largo='';
      ancho='';
      piezas='';
    }
    else if(largo!=''&&ancho!=''){*/
     // porciones=largo*ancho/2*5;
   /*   diametro='';
      piezas='';
    }
    else if(piezas!=''){
     // porciones=piezas;
      largo='';
      ancho='';
      diametro='';
    }*/

    var arreglo= new Array();
    arreglo.push(nombreproduct);
    arreglo.push(descripcion);
    arreglo.push(ingredientes);
    arreglo.push(seo);
    arreglo.push(promcalif);
    arreglo.push(activado);
    arreglo.push(idtblproveedor);
    arreglo.push(idtblcategproduc);
    arreglo.push(idtblclasifproduct);
    arreglo.push(emailproveedor);
    
    $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setTblproducto.php",  
	data: {solicitadoBy:"WEB",nombreproduct:nombreproduct,
	descripcion:descripcion,ingredientes:ingredientes,seo:seo,
	promcalif:promcalif,activado:activado,idtblproveedor:idtblproveedor,
	idtblcategproduc:idtblcategproduc,idtblclasifproduct:idtblclasifproduct,emailcreo:emailproveedor}  })
      .done(function( msgTblProducto ) {
        /////////////////////////////////////////////////////////////////////////
        $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/getTblproductoId.php",  
		data: {solicitadoBy:"WEB",nombreproduct:nombreproduct,descripcion:descripcion,
		ingredientes:ingredientes,seo:seo,promcalif:promcalif,activado:activado,
		idtblproveedor:idtblproveedor,idtblcategproduc:idtblcategproduc,
		idtblclasifproduct:idtblclasifproduct,emailcreo:emailproveedor}  })
          .done(function( msgTblProductoId ) {
            idtblproducto=msgTblProductoId.datos[0].idtblproducto;
			console.log('realizo msgTblProductoId');
            /////////////////////////////////////////////////////////////////////]
            //imagenes
            //personalizar el nombre del producto
            srcimg1='p_'+idtblproducto+'_'+srcimg1;
            srcimg2='p_'+idtblproducto+'_'+srcimg2;
            srcimg3='p_'+idtblproducto+'_'+srcimg3;
            //alert('Id unico imagnees srcimg1::'+srcimg1+' srcim2'+srcimg2+' srcimg3'+srcimg3);
            //PARA ONTEBER EL ID MANDAR AL MODAL EL ID DE LAS IMAGNEE JUNTO CON LAS IMAGNES Y DESPUS BTENERLO Y SOLO ASIGANRALO 
            $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setTblproductImg.php",  
			data: {solicitadoBy:"WEB",srcimg:srcimg1,idtblproducto:idtblproducto,emailcreo:emailproveedor}  })
              .done(function( msgTblProductoImg1 )
              {
                //console.log('msgTblProductoImg1.datos::'+msgTblProductoImg1.datos);
                srcimg1=$('#alta_srcimg1_producto_lineaBD').val(msgTblProductoImg1.datos);
                $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setTblproductImg.php",  
				data: {solicitadoBy:"WEB",srcimg:srcimg2,idtblproducto:idtblproducto,emailcreo:emailproveedor}  })
                  .done(function( msgTblProductoImg2 )
                  {
                    //console.log('msgTblProductoImg2.datos::'+msgTblProductoImg2.datos);
                    srcimg2=$('#alta_srcimg2_producto_lineaBD').val(msgTblProductoImg2.datos); 
                     $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setTblproductImg.php",  
					 data: {solicitadoBy:"WEB",srcimg:srcimg3,idtblproducto:idtblproducto,emailcreo:emailproveedor}  })
                      .done(function( msgTblProductoImg3 )
                      {
                        //alert('SUBIR LOS ARCHIVOS AL SERVIDOR');
                        //$('#altaproducto').submit()
                        
                        //console.log('msgTblProductoImg3.datos::'+msgTblProductoImg3.datos);
                        srcimg3=$('#alta_srcimg3_producto_lineaBD').val(msgTblProductoImg3.datos);
                        //mandamos el fom para subir las imagenes al servidor
                        var formData = new FormData($("#altaproducto")[0]);
                        var ruta = "imagen-ajax.php";

                        /*
                        $('#productosComplementarioPlantilla').html("");
                        $('#productoscotizadorPlantilla').html("");
                        $('#productoslineaPlantilla').html("");
                        */
                        $('#altaproducto')[0].reset();
                        //cargarValoresDefault();
                        UIkit.modal("#popup_nuevoproductolinea").hide();
                        
                        
                        $.ajax({  method: "POST",  url: "uploadImgProductoLinea.php",  data: formData ,contentType: false,
                        processData: false, })
                          .done(function( datos )
                          {
                            
                            //alert('done uploadImgProductoLinea datos::'+datos);
                            //$('#productoslineaPlantilla').html("");
                            $('#productosComplementarioPlantilla').html("");
                            $('#productoscotizadorPlantilla').html("");
                            $('#productoslineaPlantilla').html("");
                            //$('#altaproducto')[0].reset();
                            cargarValoresDefault();
                            UIkit.modal("#popup_spinner_registrando_producto").hide();
                            UIkit.modal.alert('Producto Registrado');
                          })
                          .fail(function( jqXHR, textStatus ) {  console.log("uploadImgProductoLinea fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
                          .always(function(){  });
                          
                      })
                      .fail(function( jqXHR, textStatus ) {  console.log("setTblproductImg fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
                      .always(function(){  /*console.log("always");*/ }); 
                  })
                  .fail(function( jqXHR, textStatus ) {  console.log("setTblproductImg fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
                  .always(function(){  /*console.log("always");*/ });
                // ejecutar el ajax de subida pero cuando se pida el mombre en el php consultar el nombre en la bd y asigarlo  
                
              })
              .fail(function( jqXHR, textStatus ) {  console.log("setTblproductImg IMG fail jqXHR::"+jqXHR.status+" IMG textStatus::"+textStatus);  })
              .always(function(){  /*console.log("always"); setTblproductDetalle*/ });
           
		   /*
		   console.log('diaselaboracion:'+diaselaboracion,' stock:'+stock,' precioreal:'+precioreal,
			' preciobp:'+preciobp,' diametro:'+diametro,' largo:'+largo,' ancho:'+ancho,' piezas:'+piezas,
			' tamanio:'+tamanio1,
			' activado:'+activado,
			' porciones:'+porciones2,' idtblespecificingrediente:'+idtblespecificingrediente,
			' idtblproducto:'+idtblproducto,' emailcreo:'+emailproveedor); */
			
            //producto detalles   dataType: "json",
            $.ajax({  method: "POST",dataType: "json", url: "./../../controllers/setTblproductDetalle.php",  
			data: {solicitadoBy:"WEB",diaselaboracion:diaselaboracion,stock:stock,precioreal:precioreal,
			preciobp:preciobp,diametro:diametro,largo:largo,ancho:ancho,piezas:piezas,tamanio:tamanio1,
			activado:activado,
			porciones:porciones2,idtblespecificingrediente:idtblespecificingrediente,
			idtblproducto:idtblproducto,emailcreo:emailproveedor}})
              .done(function( msgTblProductoDetallee ){ 
			  if(parseInt(msgTblProductoDetallee.success)==1){
			  console.log('fue 1'); 
			  }else{   console.log('fue cero');}
			  
              })
              .fail(function( jqXHR, textStatus ) {  console.log("aqui setTblproductDetalle fail detalle jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
              .always(function(){  /*console.log("always");*/ });
			  
			  
			 
            /////////////////////////////////////////////////////////////////////
          })
          .fail(function( jqXHR, textStatus ) {  console.log("getTblproductoId fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
          .always(function(){  /*console.log("always");*/ });
        /////////////////////////////////////////////////////////////////////////
      })
      .fail(function( jqXHR, textStatus ) {  console.log("setTblproducto fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
      .always(function(){  /*console.log("always");*/ });
      
  }
  function registrarProductoDetalleLinea(){  
    /*
    VARIABLES
     */
    //tblproducto
    activado='';
    //productodetalle
    diaselaboracion='';
    stock='';
    precioreal='';
    preciobp='';
    diametro='';
    largo='';
    ancho='';
	//-------reyna-----
    porciones='';
	tamanio='';
	//-------------
    piezas='';
    activado='';
    idtblespecifingrediente='';
    idtblproducto='';
    /*
    ASINGACION DE VALORES
     */    
    idtblproducto=$('#alta_id_producto_detalle_linea').val();
    //activado=$('#alta_activado_producto_detalle_linea').val();
    //if(activado=='on'){activado=1;}
    activado=$("#alta_activado_producto_detalle_linea").is(':checked');
    //alert('activado::'+activado);
    if(activado)
      activado=1;
    else
      activado=0;


    diaselaboracion=$('#alta_detalle_diasElborar_producto_detalle_linea').val();
    stock=$('#alta_detalle_stock_producto_detalle_linea').val();
    precioreal=$('#alta_detalle_precio_producto_detalle_linea').val();
    preciobp=precioreal;
    diametro=$('#alta_clasifcategproduct_circular_diametro_producto_detalle_linea').val();
    largo=$('#alta_clasifcategproduct_cuadrado_largo_producto_detalle_linea').val();
    ancho=$('#alta_clasifcategproduct_cuadrado_ancho_producto_detalle_linea').val();
    piezas=$('#alta_clasifcategproduct_piezas_producto_detalle_linea').val();
    //activado=1;
    idtblespecificingrediente=$('#alta_especificingredientes_producto_detalle_linea').val();
	
	
	//------------reyna-----------
	porciones=$('#alta_detalle_porciones_producto_detalle_linea').val();
	tamanio=$('#alta_detalle_tamanio_producto_detalle_linea').val();
	//----------------------------
	
	
   /* if(diametro!=''){
      porciones=Math.round((Math.PI*diametro)/2);
      largo='';
      ancho='';
      piezas='';
    }
    else if(largo!=''&&ancho!=''){
      porciones=largo*ancho/2*5;
      diametro='';
      piezas='';
    }
    else if(piezas!=''){
      porciones=piezas;
      largo='';
      ancho='';
      diametro='';
    }  */   
    /////////////////////////////////////////////////////////////////////////       
    $('#formAltaProductoDetalleLinea')[0].reset();
                        //cargarValoresDefault();
                        UIkit.modal("#popup_nuevoproductodetallelinea").hide();
    //PRODUCTO DETALLES
    $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setTblproductDetalle.php",  
	data: {solicitadoBy:"WEB",diaselaboracion:diaselaboracion,stock:stock,precioreal:precioreal,
	preciobp:preciobp,diametro:diametro,largo:largo,ancho:ancho,piezas:piezas,
	activado:activado,porciones:porciones,tamanio:tamanio,idtblespecificingrediente:idtblespecificingrediente,
	idtblproducto:idtblproducto,emailcreo:emailproveedor}  })
    .done(function( msgTblProductoDetalle )
    {
      //alert('done uploadImgProductoLinea datos::'+datos);
                            //$('#productoslineaPlantilla').html("");
                            $('#productosComplementarioPlantilla').html("");
                            $('#productoscotizadorPlantilla').html("");
                            $('#productoslineaPlantilla').html("");
                            //$('#altaproducto')[0].reset();
                            cargarValoresDefault();
                            UIkit.modal("#popup_spinner_registrando_producto").hide();
                            UIkit.modal.alert('Producto Registrado');
    })
    .fail(function( jqXHR, textStatus ) {  console.log("setTblproductDetalle fail detalle jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
    .always(function(){  /*console.log("always");*/ });
    /////////////////////////////////////////////////////////////////////
  }
  //funcion agregar producto cotizador
  function registrarProductoCotizador(){  
    /*
    VARIABLES
     */
    idtblproductcotizador='';
    //tblproducto
    nombreproduct='';
    descripcion='';
    ingrediente='';
    idtblevento='';
    promcalif='';
    activado='';
    //idtblproveedor='';
    //emailcreo='';
    //productoimg
    srcimg1='';
    srcimg2='';
    srcimg3='';
    idtblproducto='';
    //emailcreo=''; 
    /*
    ASINGACION DE VALORES
     */
    nombreproduct=$('#alta_nombre_producto_cotizador').val();
    descripcion=$('#alta_descripcion_producto_cotizador').val();
    ingrediente=$('#alta_ingredientes_producto_cotizador').val();
    promcalif='5';
    activado=$('#alta_activado_producto_cotizador').val();
    if(activado=='on'){activado=1;}
    //SESSION
    //idtblproveedor='1';
    ///////////////////
    idtblevento=$('#alta_evento_producto_cotizador').val();

    srcimg1=$('#alta_srcimg1_producto_cotizador').val().replace(/C:\\fakepath\\/i, '');
    srcimg2=$('#alta_srcimg2_producto_cotizador').val().replace(/C:\\fakepath\\/i, '');
    srcimg3=$('#alta_srcimg3_producto_cotizador').val().replace(/C:\\fakepath\\/i, '');

    diaselaboracion=$('#alta_detalle_diasElborar_producto_cotizador').val();  
    
    var arreglo=[]
    arreglo.push(nombreproduct);
    arreglo.push(descripcion);
    arreglo.push(ingrediente);
    arreglo.push(promcalif);
    arreglo.push(diaselaboracion);
    arreglo.push(activado);
    arreglo.push(idtblevento);
    arreglo.push(idtblproveedor);
    arreglo.push(emailproveedor);
     
    console.log('agergar: nombreproduct::'+nombreproduct+' descripcion::'+descripcion+' ingrediente::'+ingrediente+' promcalif::'+promcalif+' diaselaboracion::'+diaselaboracion+' activado::'+activado+' idtblproveedor::'+idtblproveedor+' idtblevento::'+idtblevento+' emailcreo+::'+emailproveedor+' arreglo::'+arreglo.length+' srcimg1::'+srcimg1+' srcimg2::'+srcimg2+' srcimg3::'+srcimg3);
    
    $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setTblproductcotizador.php",  data: {solicitadoBy:"WEB",nombreproductcotizador:nombreproduct,descripcion:descripcion,ingrediente:ingrediente,promcalificacion:promcalif, diaselaboracion:diaselaboracion, activado:activado, idtblevento:idtblevento, idtblproveedor:idtblproveedor, emailcreo:emailproveedor}  })
      .done(function( msgTblProducto ) {
        //alert('msgTblProducto::'+msgTblProducto.success);
        /////////////////////////////////////////////////////////////////////////
        $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/getTblproductoCotizadorId.php",  data: {solicitadoBy:"WEB",nombreproductcotizador:nombreproduct,descripcion:descripcion,ingrediente:ingrediente,promcalificacion:promcalif, diaselaboracion:diaselaboracion, activado:activado, idtblevento:idtblevento, idtblproveedor:idtblproveedor, emailcreo:emailproveedor}  })
          .done(function( msgTblProductoId ) {
            //alert('msgTblProductoId.datos[0].idtblproductcotizador::'+msgTblProductoId.datos[0].idtblproductcotizador+' otro::'+msgTblProductoId.datos.idtblproductcotizador);
            idtblproductcotizador=msgTblProductoId.datos[0].idtblproductcotizador;
            /////////////////////////////////////////////////////////////////////]
            //imagenes
            //personalizar el nombre del producto
            srcimg1='p_'+idtblproductcotizador+'_'+srcimg1;
            srcimg2='p_'+idtblproductcotizador+'_'+srcimg2;
            srcimg3='p_'+idtblproductcotizador+'_'+srcimg3;
            console.log('idtblproductcotizador::'+idtblproductcotizador+' srcimg1::'+srcimg1+' srcimg2::'+srcimg2+' srcimg3::'+srcimg3);
            
            //PARA ONTEBER EL ID MANDAR AL MODAL EL ID DE LAS IMAGNEE JUNTO CON LAS IMAGNES Y DESPUS BTENERLO Y SOLO ASIGANRALO 
            $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setTblproductcotimg.php",  data: {solicitadoBy:"WEB",srcimg:srcimg1,idtblproductcotizador:idtblproductcotizador,emailcreo:emailproveedor}  })
              .done(function( msgTblProductoImg1 )
              {
                console.log('msgTblProductoImg1.datos::'+msgTblProductoImg1.datos)
                srcimg1=$('#alta_srcimg1_producto_cotizadorBD').val(msgTblProductoImg1.datos);
                $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setTblproductcotimg.php",  data: {solicitadoBy:"WEB",srcimg:srcimg2,idtblproductcotizador:idtblproductcotizador,emailcreo:emailproveedor}  })
                  .done(function( msgTblProductoImg2 )
                  {
                    srcimg2=$('#alta_srcimg2_producto_cotizadorBD').val(msgTblProductoImg2.datos); 
                     $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setTblproductcotimg.php",  data: {solicitadoBy:"WEB",srcimg:srcimg3,idtblproductcotizador:idtblproductcotizador,emailcreo:emailproveedor}  })
                      .done(function( msgTblProductoImg3 )  
                      {
                        srcimg3=$('#alta_srcimg3_producto_cotizadorBD').val(msgTblProductoImg3.datos);
                        //mandamos el fom para subir las imagenes al servidor
                        var formData = new FormData($("#altaproductocotizador")[0]);
                        var ruta = "imagen-ajax.php";

                        $('#altaproductocotizador')[0].reset();
                        //cargarValoresDefault();
                        UIkit.modal("#popup_nuevoproductocotizador").hide();

                        $.ajax({  method: "POST",  url: "uploadImgProductoCotizador.php",  data: formData ,contentType: false,
                        processData: false, })
                          .done(function( datos )
                          {                            
                            //$('#productoscotizadorPlantilla').html("");
                            $('#productosComplementarioPlantilla').html("");
                            $('#productoscotizadorPlantilla').html("");
                            $('#productoslineaPlantilla').html("");
                            
                            UIkit.modal("#popup_spinner_registrando_producto").hide();
                            UIkit.modal.alert('Producto en Cotizador Registrado');
                            cargarValoresDefault();


                          })
                          .fail(function( jqXHR, textStatus ) {  console.log("uploadImgProductoCotizador fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
                          .always(function(){ 
                           //console.log("always");
                            });                         
                      })
                      .fail(function( jqXHR, textStatus ) {  console.log("setTblproductcotimg3 fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
                      .always(function(){ 
                      //console.log("always");
                    }); 
                  })
                  .fail(function( jqXHR, textStatus ) {  console.log("setTblproductcotimg2 fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
                  .always(function(){  
                  console.log("always");
                   });
                // ejecutar el ajax de subida pero cuando se pida el mombre en el php consultar el nombre en la bd y asigarlo  
                
              })
              .fail(function( jqXHR, textStatus ) {  console.log("setTblproductcotimg1 fail jqXHR::"+jqXHR.status+" IMG textStatus::"+textStatus);  })
              .always(function(){  
              //console.log("always");
               });
            /////////////////////////////////////////////////////////////////////
          })
          .fail(function( jqXHR, textStatus ) {  console.log("getTblproductoCotizadorId fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
          .always(function(){  
          //console.log("always");
        });
        /////////////////////////////////////////////////////////////////////////
      })
      .fail(function( jqXHR, textStatus ) {  console.log("setTblproductcotimg fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
      .always(function(){  
        //console.log("always");
       });
     
  }
  //funcion agregar producto cotizador
  function registrarProductoComplementario()
  {  
    /*
    VARIABLES
     */
    //tblproducto
    nombreproduct='';
    descripcion='';
    seo='';
    preciobp='';
	preciobp1='';
	preciobp2='';
	preciobp3='';
    precioreal='';
    srcimg='';
    activado='';
    //idProveedor='';
    stock=''; 
    /*
    ASINGACION DE VALORES
     */
    nombreproduct=$('#alta_nombre_producto_Complementario').val();
    descripcion=$('#alta_descripcion_producto_Complementario').val();
    seo=$('#alta_nombre_producto_Complementario').val().replace(" ", '');;
    precioreal=$('#alta_precioreal_producto_Complementario').val();
	preciobp1=$('#alta_precioreal_producto_Complementario').val();
    //preciobp=precioreal;
	preciobp2=parseInt(precioreal)+(parseInt((preciobp1*0.045+4)*1.16));
    //alert('precio::'+preciobp);
    preciobp=Math.round(parseInt(preciobp2));//el precio que esta en bepickler
    //alert('precio::'+preciobp);
    //preciobp2=(preciobp1*0.045+4)*1.16;	
	//preciobp3=preciobp2+precioreal;	
	//preciobp=Math.round(preciobp3);
	
	//console.log('precio-'+precio);
	/*console.log('precioreal: '+precioreal);
	console.log('msuma: '+preciobp2);
	console.log('precioBP: '+preciobp);*/
	//preciobp=preciobp2.toFixed(2);
	//$('#totaltabla1'+u).text(totalproveedor.toFixed(2));
    //alert('precio::'+preciobp);
   // preciobp=Math.round(parseInt(preciobp)+0.55,0);//el precio que esta en bepickler
    //alert('precio::'+preciobp);
    activado=$('#alta_activado_producto_cotizador').val();
    if(activado=='on'){activado=1;}
    //SESSION
    //idtblproveedor='1';
    ///////////////////

    srcimg=$('#alta_srcimg1_producto_Complementario').val().replace(/C:\\fakepath\\/i, '');
    srcimg='p_'+idtblproveedor+'_'+srcimg;

    stock=$('#alta_stock_producto_Complementario').val();  
    
    var arreglo=[]
    arreglo.push(nombreproduct);
    arreglo.push(descripcion);
    arreglo.push(seo);
    arreglo.push(precioreal);
    arreglo.push(preciobp);
    arreglo.push(activado);
    arreglo.push(idtblproveedor);
    arreglo.push(stock);
    arreglo.push(emailproveedor);
     
    /*console.log('agergar: nombreproduct::'+nombreproduct+' descripcion::'+descripcion+' seo::'+seo+
	' precioreal::'+precioreal+' precioBP::'+preciobp+' img::'+srcimg+' activado::'+activado+
	' idtblproveedor::'+idtblproveedor+' stock::'+stock+' emailcreo+::'+emailproveedor+
	' arreglo::'+arreglo.length+' srcimg::'+srcimg);
      */
    
    
    $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setTblproductcomplem.php",  
	data: {solicitadoBy:"WEB",nombreproductcomplem:nombreproduct,descripcion:descripcion,seo:seo,
	precioreal:precioreal,preciobp:preciobp, srcimg:srcimg, activado:activado, 
	idtblproveedor:idtblproveedor, stock:stock, emailcreo:emailproveedor}  })
      .done(function( msgTblProducto ) 
      {
        console.log('entro al done setTblproductcomplem::'+msgTblProducto);
        
        /////////////////////////////////////////////////////////////////////////
        $.ajax({  method: "POST",  dataType: "json",  
		url: "./../../controllers/getTblproductoComplementarioId.php",  
		data: {solicitadoBy:"WEB",nombreproductcomplem:nombreproduct,descripcion:descripcion,seo:seo,
		precioreal:precioreal, preciobp:preciobp, srcimg:srcimg, activado:activado, 
		idtblproveedor:idtblproveedor, stock:stock, emailcreo:emailproveedor}  })
          .done(function( msgTblProductoId ) {
			  
			  console.log('getTblproductoComplementarioId'+msgTblProductoId);
              idtblproductcomplem=msgTblProductoId.datos[0].idtblproductcomplem; 
			  console.log('ides: '+idtblproductcomplem);
            /////////////////////////////////////////////////////////////////////]
            //imagenes
            //personalizar el nombre del producto
            srcimg='i_'+  idtblproductcomplem+'_'+srcimg;
            //console.log(' idtblproductcomplem::'+  idtblproductcomplem+' srcimg::'+srcimg);
            /*
            //ACTUALIZAMOS EL NOMBRE DE LA IMAGEN CON EL ULTIMO FORMATO i_idProducto_p_proveedor_nombreImagen.jpg/gif/etc 
            */
			
			console.log('id'+idtblproductcomplem+' img:'+srcimg+' email:'+emailproveedor);
            $.ajax({  method: "POST",  dataType: "json",  
			url: "./../../controllers/setUpdateTblproductcomplemImg.php",  
			data: {solicitadoBy:"WEB",idtblproductcomplem:idtblproductcomplem, 
			srcimg:srcimg,emailmodifico:emailproveedor}  })
              .done(function( msgTblProductoComplementarioImg )
              {
                //console.log('msgTblProductoComplementarioImg.datos::'+msgTblProductoComplementarioImg.datos)
                srcimg=$('#alta_srcimg1_producto_ComplementarioBD').val(srcimg);
                  //mandamos el fom para subir las imagenes al servidor
                  
                  var formData = new FormData($("#altaproductoComplementario")[0]);
                  var ruta = "imagen-ajax.php";
                  
                  $.ajax({  method: "POST",  url: "uploadImgProductoComplementario.php",  data: formData ,contentType: false,
                  processData: false, })
                    .done(function( datos )
                    {
                      //console.log('uploadImgProductoCotizador dice::'+datos);
                      $('#productosComplementarioPlantilla').html("");
                      $('#productoscotizadorPlantilla').html("");
                      $('#productoslineaPlantilla').html("");
                      $('#altaproductoComplementario')[0].reset();
                      UIkit.modal("#popup_nuevoproductoComplementario").hide();
                      UIkit.modal("#popup_spinner_registrando_producto").hide();
                      UIkit.modal.alert('Producto Complementario Registrado');
                      cargarValoresDefault();
                    })
                    .fail(function( jqXHR, textStatus ) {  console.log("uploadImgProductoComplementario fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
                    .always(function(){ 
                     //console.log("always");
                    });
                    
                  // ejecutar el ajax de subida pero cuando se pida el mombre en el php consultar el nombre en la bd y asigarlo  
              })
              .fail(function( jqXHR, textStatus ) {  console.log("aquiX setTblproductcotimg1 fail jqXHR::"+jqXHR.status+" IMG textStatus::"+textStatus);  })
              .always(function(){  
              //console.log("always");
               });
              
            /////////////////////////////////////////////////////////////////////
          })
          .fail(function( jqXHR, textStatus ) {  console.log("getTblproductoComplementarioId fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
          .always(function(){  
          //console.log("always");
        });
        /////////////////////////////////////////////////////////////////////////
        
      })
      .fail(function( jqXHR, textStatus ) {  console.log("setTblproductcomplem fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
      .always(function(){  
        //console.log("always");
       });
     
  }
  //FUNCION altaProductoDetalleLinea(idexArreglo,idProducto,idProductoDetalle,nombre)
  function altaProductoDetalleLinea(idexArreglo,idProducto,idProductoDetalle,nombre){
    
    //LIMPIAMOS LOS ELEMENTOS DEL FORMULARIO
    
    $("#alta_especificingredientes_producto_detalle_linea").prop('selectedIndex',0);
    $("#alta_clasifcategproduct_cuadrado_largo_producto_detalle_linea").val("");
    $("#alta_clasifcategproduct_cuadrado_ancho_producto_detalle_linea").val("");
    $("#alta_clasifcategproduct_circular_diametro_producto_detalle_linea").val("");
    $("#alta_clasifcategproduct_piezas_producto_detalle_linea").val("");
    $("#alta_detalle_diasElborar_producto_detalle_linea").val("");
    $("#alta_detalle_precio_producto_detalle_linea").val("");
    $("#alta_detalle_stock_producto_detalle_linea").val("");
    $('#alta_id_producto_detalle_linea').val(idProducto);
    //$('#modificar_id_productoDetalle_linea').val(idProductoDetalle);
    //$('#alta_id_productoDetalle_detalle_linea').val(idProductoDetalle);
    //$('#modificar_nombre_producto_linea').val(arregloInfoTodosProducto[idexArreglo][1]);
    $('#alta_nombre_producto_detalle_linea').val(arregloInfoTodosProducto[idexArreglo][1]);
    //CREAMOS LAS OPCIONES PARA INGREDIENTES Y DEJAMOS COMO SELECCIONADA LA DEL PRODUCTO
    //DATOS GENERALES
  }
  //function modificarProductoLinea(idProducto,idProductoDetalle,nombre,stock,productdetalle_size){
  function modificarProductoLinea(idexArreglo,idProducto,idProductoDetalle,nombre){
    /**
     //TBLPRODUCTODETALLE
        0  arregloInfoUnProducto.push(idProducto);
        1  arregloInfoUnProducto.push(nombre);
        2  arregloInfoUnProducto.push(idProductoDetalle);
        3  arregloInfoUnProducto.push(diasElaboracion);          
        4  arregloInfoUnProducto.push(stock);		   
        5  arregloInfoUnProducto.push(precioreal);
        6  arregloInfoUnProducto.push(diamentro);
        7  arregloInfoUnProducto.push(largo);
        8  arregloInfoUnProducto.push(ancho);
        9  arregloInfoUnProducto.push(piezas);
        10  arregloInfoUnProducto.push(activado);
        11  arregloInfoUnProducto.push(nombreIngrediente);

          //TBLPRODUCTO
        12  arregloInfoUnProducto.push(descripcion);
        13  arregloInfoUnProducto.push(ingredientes);
        14  arregloInfoUnProducto.push(seo);
        15  arregloInfoUnProducto.push(activadoGeneral);
        16  arregloInfoUnProducto.push(idtblcategproduct);
        17  arregloInfoUnProducto.push(idtblclasifproduct);
     */
    //LIMPIAMOS LOS ELEMENTOS PARA AGREGAR LOS DE ESTE PRODUCTO ESPECIFICOS
    $("#modificar_especificingredientes_producto_linea").empty();
     //LIMPIAMOS LOS ELEMENTOS PARA AGREGAR LOS DE ESTE PRODUCTO GENERALES
    $("#modificar_categoria_producto_linea_general").empty();   
    $("#modificar_clasificacion_producto_linea_general").empty();
    $("#modificar_galeria_producto_linea_general").empty();

    $('#modificar_id_producto_linea').val(idProducto);
    $('#modificar_id_productoDetalle_linea').val(idProductoDetalle);

    /*
    if(arregloInfoTodosProducto[idexArreglo][10]==0)
      $('#modificar_activado_producto_linea').prop('checked', false);
    else if(arregloInfoTodosProducto[idexArreglo][10]==1)
      $('#modificar_activado_producto_linea').prop('checked', true);
    */

    if($("#product_edit_active_control_prod_linea"+idProductoDetalle).is(':checked'))
      $('#modificar_activado_producto_linea').prop('checked', true);
    else
      $('#modificar_activado_producto_linea').prop('checked', false);

    $('#modificar_nombre_producto_linea').val(arregloInfoTodosProducto[idexArreglo][1]); //nombre   
	$('#modificar_detalle_diasElborar_producto_linea').val(arregloInfoTodosProducto[idexArreglo][3]); //dias
	 $('#modificar_detalle_precio_producto_linea').val(arregloInfoTodosProducto[idexArreglo][7]);
	 $('#modificar_detalle_porciones_producto_linea').val(arregloInfoTodosProducto[idexArreglo][6]);
	 $('#modificar_detalle_tamanio_producto_linea').val(arregloInfoTodosProducto[idexArreglo][5]);
	 
	 
	//$('#modificar_detalle_precio_producto_linea').val(arregloInfoTodosProducto[idexArreglo][5]);
	 
    //$('#modificar_detalle_stock_producto_linea').val(arregloInfoTodosProducto[idexArreglo][4]);    //dimenciones
    $('#modificar_detalle_stock_producto_linea').val($('#numeric_stockProductoLinea'+idProductoDetalle).val());    //dimenciones numeric_stockProductoLinea6
    
	$('#modificar_clasifcategproduct_cuadrado_largo_producto_linea').val(arregloInfoTodosProducto[idexArreglo][9]);    
    $('#modificar_clasifcategproduct_cuadrado_ancho_producto_linea').val(arregloInfoTodosProducto[idexArreglo][10]);
    $('#modificar_clasifcategproduct_circular_diametro_producto_linea').val(arregloInfoTodosProducto[idexArreglo][8]);
    $('#modificar_clasifcategproduct_piezas_producto_linea').val(arregloInfoTodosProducto[idexArreglo][11]);
	
	
	/*$('#modificar_clasifcategproduct_cuadrado_largo_producto_linea').val(arregloInfoTodosProducto[idexArreglo][7]);    
    $('#modificar_clasifcategproduct_cuadrado_ancho_producto_linea').val(arregloInfoTodosProducto[idexArreglo][8]);
    $('#modificar_clasifcategproduct_circular_diametro_producto_linea').val(arregloInfoTodosProducto[idexArreglo][6]);
    $('#modificar_clasifcategproduct_piezas_producto_linea').val(arregloInfoTodosProducto[idexArreglo][9]);  */
	
    //DEPENDE DE EL TAMAÑO DEL PRODUCTO MUESTRA EL CAMPO  ancho y largo
	//if(arregloInfoTodosProducto[idexArreglo][7]!=null&&arregloInfoTodosProducto[idexArreglo][8]!=null)
    if(arregloInfoTodosProducto[idexArreglo][9]!=null&&arregloInfoTodosProducto[idexArreglo][10]!=null)
    {
      UIkit.switcher('#modificar_forma_producto').show(0);
    }
	//-----------------------------------------------
	else if(arregloInfoTodosProducto[idexArreglo][8]!=null) //diametro  era 6
    {
      $("#modificar_tab_circulo").addClass("uk-active"); 
      UIkit.switcher('#modificar_forma_producto').show(1);
    }  //------------------------------------------
	else if(arregloInfoTodosProducto[idexArreglo][11]!=null)  //piezas era 9
    {
      UIkit.switcher('#modificar_forma_producto').show(2);
    }


           //modificar_especificingredientes_producto_linea if(arregloInfoTodosProducto[idexArreglo][11]==arregloEspecifiIngredientesNombre[i])
    //CREAMOS LAS OPCIONES PARA INGREDIENTES Y DEJAMOS COMO SELECCIONADA LA DEL PRODUCTO
    $.each(arregloEspecifiIngredientesId, function(i,item){
      if(arregloInfoTodosProducto[idexArreglo][13]==arregloEspecifiIngredientesNombre[i])
        $("#modificar_especificingredientes_producto_linea").append('<option value="'+item+'"selected>'+arregloEspecifiIngredientesNombre[i]+'</option>');
      else
        $("#modificar_especificingredientes_producto_linea").append('<option value="'+item+'">'+arregloEspecifiIngredientesNombre[i]+'</option>');
    });
    //DATOS GENERALES
    $('#modificar_id_producto_linea_general').val(idProducto);
    //IMAGENES
    /*
    if(arregloInfoTodosProducto[idexArreglo][15]==0)
      $('#modificar_activado_producto_linea_general').prop('checked', false);
    else if(arregloInfoTodosProducto[idexArreglo][15]==1)
      $('#modificar_activado_producto_linea_general').prop('checked', true);
    */
    $.each(arregloImagenesTodosProducto, function(i,item){
      if(arregloImagenesTodosProducto[i][0].indexOf(idProducto)===0)
      {
        $.each(arregloImagenesTodosProducto[i], function(j,item)
        {
          j++;
          if(arregloImagenesTodosProducto[i][j] != undefined)
          {
            $("#modificar_galeria_producto_linea_general").append('<div class="uk-width-medium-1-3"><div class="md-card"><div class="md-card-content" > <img  class="" src="'+arregloImagenesTodosProducto[i][j]+'" alt=""></div></div></div>');
          }
        });        
        return false;
      }
    });
      
    $('#modificar_nombre_producto_linea_general').val(arregloInfoTodosProducto[idexArreglo][1]);
    //$('#modificar_seo_producto_linea_general').val(arregloInfoTodosProducto[idexArreglo][14]);
    //$('#modificar_seo_producto_linea_general').val(arregloInfoTodosProducto[idexArreglo][1].replace(" ", ''));
    $('#modificar_descripcion_producto_linea_general').val(arregloInfoTodosProducto[idexArreglo][14]); //era 12
    $('#modificar_ingredientes_producto_linea_general').val(arregloInfoTodosProducto[idexArreglo][15]);  //era13
    //CREAMOS LAS OPCIONES PARA CATEGORIAS Y DEJAMOS COMO SELECCIONADA LA DEL PRODUCTO
    $.each(arregloCategoriaProductoId, function(i,item){  //tenia 16
      if(arregloInfoTodosProducto[idexArreglo][18]==arregloCategoriaProductoId[i])
        $("#modificar_categoria_producto_linea_general").append('<option value="'+item+'"selected>'+arregloCategoriaProductoNombre[i]+'</option>');
      else
        $("#modificar_categoria_producto_linea_general").append('<option value="'+item+'">'+arregloCategoriaProductoNombre[i]+'</option>');
    });
    //CREAMOS LAS OPCIONES PARA CLASIFICACI? Y DEJAMOS COMO SELECCIONADA LA DEL PRODUCTO
    $.each(arregloClasificacionProductoId, function(i,item){  //era 17
      if(arregloInfoTodosProducto[idexArreglo][19]==arregloClasificacionProductoId[i])
        $("#modificar_clasificacion_producto_linea_general").append('<option value="'+item+'"selected>'+arregloClasificacionProductoNombre[i]+'</option>');
      else
        $("#modificar_clasificacion_producto_linea_general").append('<option value="'+item+'">'+arregloClasificacionProductoNombre[i]+'</option>');
    });
  }
  //function modificarProductoCotizaor(idProducto,idProductoDetalle,nombre,stock,productdetalle_size){
  function modificarProductoCotizaor(idexArreglo,idtblproductcotizador,nombre){
    /*
    0 arregloInfoUnProductoCotizador.push(idProductoCotizador);
    1 arregloInfoUnProductoCotizador.push(nombreCotizador);
    2 arregloInfoUnProductoCotizador.push(descripcionCotizador);
    3 arregloInfoUnProductoCotizador.push(ingredienteCotizador);
    4 arregloInfoUnProductoCotizador.push(promcalificacionCotizador);
    5 arregloInfoUnProductoCotizador.push(diaselaboracionCotizador);
    6 arregloInfoUnProductoCotizador.push(activadoCotizador);
    7 arregloInfoUnProductoCotizador.push(idtbleventoCotizador);
    8 arregloInfoUnProductoCotizador.push(idtblproveedorCotizador);           
    
    arregloInfoTodosProductoCotizador.push(arregloInfoUnProductoCotizador);
     */
    $("#modificar_nombre_producto_cotizador").empty();
    $("#modificar_descripcion_producto_cotizador").empty();
    $("#modificar_ingredientes_producto_cotizador").empty();
    $("#modificar_evento_producto_cotizador").empty();
    $("#modificar_activado_producto_cotizador").empty();

    $("#modificar_galeria_producto_cotizador").empty();
    
    $("#modificar_srcimg1_producto_cotizador").empty();
    $("#modificar_srcimg2_producto_cotizador").empty();
    $("#modificar_srcimg3_producto_cotizador").empty();
    $("#modificar_detalle_diasElborar_producto_cotizador").empty();

    $('#modificar_id_producto_cotizador').val(idtblproductcotizador);
    $("#modificar_nombre_producto_cotizador").val(arregloInfoTodosProductoCotizador[idexArreglo][1]);
    $("#modificar_descripcion_producto_cotizador").val(arregloInfoTodosProductoCotizador[idexArreglo][2]);
    $("#modificar_ingredientes_producto_cotizador").val(arregloInfoTodosProductoCotizador[idexArreglo][3]);
    $("#modificar_detalle_diasElborar_producto_cotizador").val(arregloInfoTodosProductoCotizador[idexArreglo][5]);

    if(arregloInfoTodosProductoCotizador[idexArreglo][6]==0)
      $('#modificar_activado_producto_cotizador').prop('checked', false);
    else if(arregloInfoTodosProductoCotizador[idexArreglo][6]==1)
      $('#modificar_activado_producto_cotizador').prop('checked', true);

    $.each(arregloImagenesTodosProductoCotizador, function(i,item){
      if(arregloImagenesTodosProductoCotizador[i][0].indexOf(idtblproductcotizador)===0)
      {
        $.each(arregloImagenesTodosProductoCotizador[i], function(j,item)
        {
          j++;
          if(arregloImagenesTodosProductoCotizador[i][j] != undefined)
          {
            $("#modificar_galeria_producto_cotizador").append('<div class="uk-width-medium-1-3"><div class="md-card"><div class="md-card-content" > <img  class="" src="'+arregloImagenesTodosProductoCotizador[i][j]+'" alt=""></div></div></div>');
          }
        });        
        return false;
      }
    });

    //$("#modificar_evento_producto_cotizador").val(arregloInfoTodosProductoCotizador[idexArreglo][7]);
    //CREAMOS LAS OPCIONES PARA CATEGORIAS Y DEJAMOS COMO SELECCIONADA LA DEL PRODUCTO
    $.each(arregloEventosId, function(i,item){
      if(arregloInfoTodosProductoCotizador[idexArreglo][7]==arregloEventosId[i])
        $("#modificar_evento_producto_cotizador").append('<option value="'+item+'"selected>'+arregloEventosNombre[i]+'</option>');
      else
        $("#modificar_evento_producto_cotizador").append('<option value="'+item+'">'+arregloEventosNombre[i]+'</option>');
    });

    $("#modificar_idProveedor_producto_cotizador").val(arregloInfoTodosProductoCotizador[idexArreglo][8]);

    if(arregloInfoTodosProductoCotizador[idexArreglo][10]==0)
      $('#modificar_activado_producto_linea').prop('checked', false);
    else if(arregloInfoTodosProductoCotizador[idexArreglo][10]==1)
      $('#modificar_activado_producto_linea').prop('checked', true);

  }

  //function modificarProductoComplementario('+idexArreglo+','+idProducto+','+idProducto+'){
  function modificarProductoComplementario(idexArreglo,idtblproductcomplementario,nombre){
    //alert('entro a modificarProductoComplementario');
    /*
    0 arregloInfoUnProductoComplementario.push(idProductoComplementario);
    1 arregloInfoUnProductoComplementario.push(nombreComplementario);
    2 arregloInfoUnProductoComplementario.push(descripcionComplementario);
    3 arregloInfoUnProductoComplementario.push(seoComplementario);
    4 arregloInfoUnProductoComplementario.push(precioRealComplementario);
    5 arregloInfoUnProductoComplementario.push(srcimgComplementario);
    6 arregloInfoUnProductoComplementario.push(activadoComplementario);
    7 arregloInfoUnProductoComplementario.push(idtblproveedorComplementario);
    8 arregloInfoUnProductoComplementario.push(stockComplementario);

    arregloInfoTodosProductoComplementario.push(arregloInfoUnProductoComplementario);
    arregloInfoUnProductoComplementario=[];
     */
    $("#modificar_nombre_producto_Complementario").empty();
    $("#modificar_descripcion_producto_Complementario").empty();
    //$("#modificar_seo_producto_Complementario").empty();
    $("#modificar_precio_producto_Complementario").empty();
    $("#modificar_srcimg1_producto_Complementario").empty();
    $("#modificar_activado_producto_Complementario").empty();    
    $("#modificar_idProveedor_producto_Complementario").empty();
    $("#modificar_stock_producto_Complementario").empty();
    $("#modificar_galeria_producto_Complementario").html("");


    $('#modificar_id_producto_Complementario').val(idtblproductcomplementario);
    $("#modificar_nombre_producto_Complementario").val(arregloInfoTodosProductoComplementario[idexArreglo][1]);
    $("#modificar_descripcion_producto_Complementario").val(arregloInfoTodosProductoComplementario[idexArreglo][2]);
    //$("#modificar_seo_producto_Complementario").val(arregloInfoTodosProductoComplementario[idexArreglo][3]);
    $("#modificar_precio_producto_Complementario").val(arregloInfoTodosProductoComplementario[idexArreglo][4]);

    $("#modificar_idProveedor_producto_Complementario").val(arregloInfoTodosProductoComplementario[idexArreglo][7]);

    $("#modificar_stock_producto_Complementario").val(arregloInfoTodosProductoComplementario[idexArreglo][8]);

    $("#modificar_stock_producto_Complementario").val($("#numeric_stockProductoComplementario"+idtblproductcomplementario).val());
    
    $("#modificar_galeria_producto_Complementario").append('<div class="uk-width-medium-1-3"><div class="md-card"><div class="md-card-content" > <img id="fotografia_complementario_actual" name="fotografia_complementario_actual" class="" src="./../assests_general/productos/complementario/'+arregloInfoTodosProductoComplementario[idexArreglo][5]+'" alt=""></div></div></div>');

    if(arregloInfoTodosProductoComplementario[idexArreglo][6]==0)
      $('#modificar_activado_producto_Complementario').prop('checked', false);
    else if(arregloInfoTodosProductoComplementario[idexArreglo][6]==1)
      $('#modificar_activado_producto_Complementario').prop('checked', true);
  }

  function actualizarProductoDetalle(){
    idProductoDetalle=$("#modificar_id_productoDetalle_linea").val();
    diasElborar=$("#modificar_detalle_diasElborar_producto_linea").val();
    stock=$("#modificar_detalle_stock_producto_linea").val();
    precioreal=$("#modificar_detalle_precio_producto_linea").val();
	preciobp=$("#modificar_detalle_precio_producto_linea").val();
    //preciobp=precio;  
    diametro=$("#modificar_clasifcategproduct_circular_diametro_producto_linea").val();
    largo=$("#modificar_clasifcategproduct_cuadrado_largo_producto_linea").val();
    ancho=$("#modificar_clasifcategproduct_cuadrado_ancho_producto_linea").val();
	
	//-------------reyna-----------
	porciones=$("#modificar_detalle_porciones_producto_linea").val();
	tamanio=$("#modificar_detalle_tamanio_producto_linea").val();
	
	//----------------------
    //SI NO SE AH MODIFICAR LA FORMA SE TOMA NORMAL SI SE CAMBIO SE TOMA LA ULTIMA FORMA
    //porciones=validarFormaProductoLinea(diametro,largo,ancho,piezas);
    //alert('forma::'+modificar_forma_producto_linea_elegido);
    piezas=$("#modificar_clasifcategproduct_piezas_producto_linea").val();
    activado=$("#modificar_activado_producto_linea").is(':checked');
    //alert('activado::'+activado);
    if(activado)
      activado=1;
    else
      activado=0;
    idProducto=$("#modificar_id_producto_linea").val();
    especificingredientes=$("#modificar_especificingredientes_producto_linea").val();
     
    $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setUpdateTblproductDetalle.php", 
	data: {solicitadoBy:"WEB",idtblproductdetalle:idProductoDetalle,diaselaboracion:diasElborar,
	stock:stock,precioreal:precioreal,preciobp:preciobp,diametro:diametro,largo:largo,ancho:ancho,
	porciones:porciones,tamanio:tamanio,piezas:piezas,activado:activado,idtblproducto:idProducto,
	idtblespecifingrediente:especificingredientes,emailmodifico:emailproveedor}})
    .done(function( msgTblProductoDetalles ) {
      //alert('Elimnaci? Exitosa');
      //$('#productoslineaPlantilla').html("");
      //cargarValoresAltaProductoLinea();
      //mostrarProductos();              
      //cargarValoresDefault();
      $('#productosComplementarioPlantilla').html("");
      $('#productoscotizadorPlantilla').html("");
      $('#productoslineaPlantilla').html("");
      $('#formActualizarProductoLinea')[0].reset(); 
      UIkit.modal("#popup_spinner_modificando_producto").hide();
      UIkit.modal("#popup_modificarproductolinea").hide();
      cargarValoresDefault();
    })
    .fail(function( jqXHR, textStatus ) {  console.log("setUpdateTblproductDetalle fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
  .always(function(){  /*console.log("always");*/ });

  }
  function actualizarProductoGeneral(){
    //tblproducto
    idProducto=$("#modificar_id_producto_linea_general").val();
    nombre=$("#modificar_nombre_producto_linea_general").val();
    descripcion=$("#modificar_descripcion_producto_linea_general").val();
    ingredientes=$("#modificar_ingredientes_producto_linea_general").val();
    seo=$('#modificar_nombre_producto_linea_general').val().replace(" ", '');
    promcalif=5;
    /*
    activado=$("#modificar_activado_producto_linea_general").is(':checked');
    if(activado)
      activado=1;
    else
      activado=0;
    */
    activado=1;
    //alert('activado::'+activado); 
    //idtblproveedor=1;
    categoria=$("#modificar_categoria_producto_linea_general").val();
    clasificacion=$("#modificar_clasificacion_producto_linea_general").val();

    srcimg1=$("#modificar_srcimg1_producto_linea").val();
    srcimg2=$("#modificar_srcimg2_producto_linea").val();
    srcimg3=$("#modificar_srcimg3_producto_linea").val();
    //los 3 campos son obligatorios para poder regitrar la nueva imagen del producto si no se dara por vacios y no se registrar las nuevas fotograf?s
    if(srcimg1==''||srcimg2==''||srcimg3=='')
    {
      srcimg1='';
      srcimg2='';
      srcimg3='';
    }else 
    {
      srcimg1=srcimg1.replace(/C:\\fakepath\\/i, '');
      srcimg2=srcimg2.replace(/C:\\fakepath\\/i, '');
      srcimg3=srcimg3.replace(/C:\\fakepath\\/i, '');
      //personalizar el nombre del producto
      srcimg1='p_'+idProducto+'_'+srcimg1;
      srcimg2='p_'+idProducto+'_'+srcimg2;
      srcimg3='p_'+idProducto+'_'+srcimg3;
      //alert('entro a actualizar con imagen srcimg1::'+srcimg1+' srcimg2::'+srcimg2+' srcimg3::'+srcimg3);
      /////////////////////////////////////////////////////////
      var arregloIdtblproductimg=[];
      var arregloTblproductimg_srcimg=[];
      //SOLICITAMOS TODOS LOS REGISTROS DE IMANGENES DE UN PRODUCTO
      $.ajax({ method: "POST",  dataType: "json",  url: "./../../controllers/getAllTblproductImgProducto.php",  data: {solicitadoBy:"WEB",idtblproducto:idProducto} })
        .done(function( msgTblProductoImg )
        {
          //OBTENEMOS TODOS LOS REGISTROS 
          $.each(msgTblProductoImg.datos, function(i,item){
            //GUARDAMOS EL ID DEL LA IAMGEN EN EL ARREGLO
            arregloIdtblproductimg.push(msgTblProductoImg.datos[i].idtblproductimg);
            //GUARDAMOS EL NOMBRE DE LA IAMGEN EN EL ARREGLO
            arregloTblproductimg_srcimg.push(msgTblProductoImg.datos[i].tblproductimg_srcimg);
          });
          //alert('SOLICITAMOS BORRAR TODOS LOS REGISTROS DE LAS IMAGENES DEL PRODUCTO');
          //SOLICITAMOS BORRAR TODOS LOS REGISTROS DE LAS IMAGENES DEL PRODUCTO
          $.ajax({ method: "POST",  dataType: "json",  url: "./../../controllers/setDeleteTblproductImgOfProducto.php",  data: {solicitadoBy:"WEB",idtblproducto:idProducto} })
            .done(function( datos )
            {
              //alert('SE BORRARON EXITOSAMENTE -> REGISTRAR LA PRIMERA IMAGEN');
              //SE BORRARON EXITOSAMENTE
              //REGISTRAR LA PRIMERA IMAGEN
              $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setTblproductImg.php",  data: {solicitadoBy:"WEB",idtblproductimg:idProducto,srcimg:srcimg1,idtblproducto:idProducto,emailcreo:emailproveedor}  })
                .done(function( msgTblProductoImg1 )
                {
                  //SE REGISTRO LA PRIMERA IMAGEN
                  //OBTENEMOS EL NOMBRE DE LA UMAGEN Y LA ASIGNAMOS A modificar_srcimg1_producto_lineaBD
                  srcimg1=$('#modificar_srcimg1_producto_lineaBD').val(msgTblProductoImg1.datos);
                  $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setTblproductImg.php",  data: {solicitadoBy:"WEB",idtblproductimg:idProducto,srcimg:srcimg2,idtblproducto:idProducto,emailcreo:emailproveedor}  })
                    .done(function( msgTblProductoImg2 )
                    {
                      srcimg2=$('#modificar_srcimg2_producto_lineaBD').val(msgTblProductoImg2.datos);
                      $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setTblproductImg.php",  data: {solicitadoBy:"WEB",idtblproductimg:idProducto,srcimg:srcimg3,idtblproducto:idProducto,emailcreo:emailproveedor}  })
                        .done(function( msgTblProductoImg3 )
                        {
                          srcimg3=$('#modificar_srcimg3_producto_lineaBD').val(msgTblProductoImg3.datos);
                          //alert('//SUBIMOS LAS NUEVAS IMAGENES AL ARCHIVO');
                          //SUBIMOS LAS NUEVAS IMAGENES AL ARCHIVO
                          //var formData = new FormData($("#actualizarProducto")[0]);
                          
                          
                          cargarValoresDefault();
                          
                          var formData = new FormData($("#formActualizarProductoLineaGeneral")[0]);
                          //alert('formData::'+formData);
                          var ruta = "imagen-ajax.php";
                          $.ajax({  method: "POST",  url: "uploadImgProductoLinea.php",  data: formData ,contentType: false,
                          processData: false, })
                            .done(function( datos )
                            {
                              //alert('SE SUBIERON CONEXITO LAS IMAGENES DE LA PARPETA DATOS::'+datos);
                              //$('#productoslineaPlantilla').html("");
                              //cargarValoresDefault();
                              $('#productosComplementarioPlantilla').html("");
                              $('#productoscotizadorPlantilla').html("");
                              $('#productoslineaPlantilla').html("");
                              $('#formActualizarProductoLineaGeneral')[0].reset();
                              UIkit.modal("#popup_spinner_modificando_producto").hide(); 
                              UIkit.modal.alert('Producto en lÍnea Actualizado');
                              cargarValoresDefault();
                            })
                            .fail(function( jqXHR, textStatus ) {  console.log("uploadImgProductoLinea fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
                            .always(function(){  /*console.log("always");*/ });                         
                        })
                        .fail(function( jqXHR, textStatus ) {  console.log("setTblproductImg fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
                        .always(function(){  /*console.log("always");*/ }); 
                    })
                    .fail(function( jqXHR, textStatus ) {  console.log("setTblproductImg fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
                    .always(function(){  /*console.log("always");*/ });
                  // ejecutar el ajax de subida pero cuando se pida el mombre en el php consultar el nombre en la bd y asigarlo            
                })
                .fail(function( jqXHR, textStatus ) {  console.log("setTblproductImg IMG fail jqXHR::"+jqXHR.status+" IMG textStatus::"+textStatus);  })
                .always(function(){  /*console.log("always");*/ });              
            })
            .fail(function( jqXHR, textStatus ) {  console.log("setDeleteTblproductImgOfProducto  fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
            .always(function(){  /*console.log("setDeleteTblproductImgOfProducto  always");*/ });
          //alert('antes del each de borrar file');
          //RECORREMOS EL ARREGLO DE LOS ID
          $.each(arregloIdtblproductimg, function(i,item){
            //SOLICITAMOS BORRAR TODOS LOS ARCHIVOS FISICOS
            //alert('entro al each i::'+i+' item::'+item+' arregloTblproductimg_srcimg[i]::'+arregloTblproductimg_srcimg[i]);
            $.ajax({ method: "POST",  dataType: "json",  url: "./../../controllers/setDeleteFileImgProducto.php",  data: {solicitadoBy:"WEB",tblproductimg_srcimg:arregloTblproductimg_srcimg[i]} })
              .done(function( datos ){ 
                //alert('done datos.datos::'+datos.datos+' datos.success::'+datos.success);
              })
              .fail(function( jqXHR, textStatus ) {  console.log("setDeleteFileImgProducto  fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
              .always(function(){  /*console.log("setDeleteFileImgProducto  always");*/ });
          });
        })
        .fail(function( jqXHR, textStatus ) {  console.log("getAllTblproductImgProducto fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
        .always(function(){  /*console.log("getAllTblproductImgProducto always");*/ });
      
    }
    //alert('setUpdateTblproducto::'+activado);
    console.log('idProducto:'+idProducto+' nombre::'+nombre+' descripcion::'+descripcion+' ingredientes::'+ingredientes+' seo::'+seo+' promcalif::'+promcalif+' activado::'+activado+' idtblproveedor::'+idtblproveedor+' categoria::'+categoria+' clasificacion::'+clasificacion+' emailmodifico::'+emailproveedor);
    
    $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setUpdateTblproducto.php", data: {solicitadoBy:"WEB",idtblproducto:idProducto,nombreproduct:nombre,descripcion:descripcion,ingredientes:ingredientes,seo:seo,promcalif:promcalif,activado:activado,idtblproveedor:idtblproveedor,idtblcategproduc:categoria,idtblclasifproduct:clasificacion,emailmodifico:emailproveedor }  })
      .done(function( msgTblProductoGeneral ) {
        //alert('msgTblProductoGeneral'+msgTblProductoGeneral.success);
        $('#productosComplementarioPlantilla').html("");  
        $('#productoscotizadorPlantilla').html("");
        $('#productoslineaPlantilla').html("");
        UIkit.modal("#popup_modificarproductolineageneral").hide();
        UIkit.modal("#popup_modificarproductolinea").hide();
        if(srcimg1==''&&srcimg2==''&&srcimg3=='')
        {
          //alert('no tiene imagen');
          $('#formActualizarProductoLineaGeneral')[0].reset();
          UIkit.modal("#popup_spinner_modificando_producto").hide();       
          UIkit.modal.alert('Producto en lÍnea Actualizado');
          cargarValoresDefault();
        }      
        
      })
      .fail(function( jqXHR, textStatus ) {  console.log("setUpdateTblproducto fail jqXHR::"+jqXHR.status.status+" textStatus::"+textStatus);  })
      .always(function(){   });
  }


  function actualizarProductoCotizador(){
    //tblproducto
    idProducto=$('#modificar_id_producto_cotizador').val();
    //alert(idProducto);
    nombre=$("#modificar_nombre_producto_cotizador").val();
    descripcion=$("#modificar_descripcion_producto_cotizador").val();
    ingrediente=$("#modificar_ingredientes_producto_cotizador").val();
    idtblevento=$("#modificar_evento_producto_cotizador").val();
    activado=$('#modificar_activado_producto_cotizador').is(':checked');
    if(activado)
      activado=1;
    else
      activado=0;
    //idtblproveedor=1;
    diaselaboracion=$("#modificar_detalle_diasElborar_producto_cotizador").val();
    promcalificacion=5;

    srcimg1=$("#modificar_srcimg1_producto_cotizador").val();
    srcimg2=$("#modificar_srcimg2_producto_cotizador").val();
    srcimg3=$("#modificar_srcimg3_producto_cotizador").val();
    if(srcimg1==''||srcimg2==''||srcimg3=='')
    //if(1!=1)
    {
      srcimg1='';
      srcimg2='';
      srcimg3='';
    }else 
    {
      srcimg1=srcimg1.replace(/C:\\fakepath\\/i, '');
      srcimg2=srcimg2.replace(/C:\\fakepath\\/i, '');
      srcimg3=srcimg3.replace(/C:\\fakepath\\/i, '');
      //personalizar el nombre del producto
      srcimg1='p_'+idProducto+'_'+srcimg1;
      srcimg2='p_'+idProducto+'_'+srcimg2;
      srcimg3='p_'+idProducto+'_'+srcimg3;
      //alert(idProducto);
      /////////////////////////////////////////////////////////
      var arregloIdtblproductimgCotizador=[];
      var arregloTblproductimg_srcimgCotizador=[];
      //SOLICITAMOS TODOS LOS REGISTROS DE IMANGENES DE UN PRODUCTO
      /*
      $solicitadoBy=$_POST["solicitadoBy"];
    $idtblproductcotizador=$_POST["idtblproductcotizador"];
       */
      $.ajax({ method: "POST",  dataType: "json",  url: "./../../controllers/getAllTblproductcotimg.php",  data: {solicitadoBy:"WEB",idtblproductcotizador:idProducto} })
        .done(function( msgTblProductoImg )
        {
          //OBTENEMOS TODOS LOS REGISTROS 
          $.each(msgTblProductoImg.datos, function(i,item){
            //GUARDAMOS EL ID DEL LA IAMGEN EN EL ARREGLO
            arregloIdtblproductimgCotizador.push(msgTblProductoImg.datos[i].idtblproductcotimg);
            //GUARDAMOS EL NOMBRE DE LA IAMGEN EN EL ARREGLO
            arregloTblproductimg_srcimgCotizador.push(msgTblProductoImg.datos[i].tblproductcotimg_srcimg);
          });
          //SOLICITAMOS BORRAR TODOS LOS REGISTROS DE LAS IMAGENES DEL PRODUCTO
          //alert(idProducto);
          idProductoCotizador=idProducto;
          //alert('idProductoCotizador::'+idProductoCotizador);
          $.ajax({ method: "POST",  dataType: "json",  url: "./../../controllers/setDeleteTblproductcotimgOfProducto.php",  data: {solicitadoBy:"WEB",idtblproductcotizador:idProducto} })
            .done(function( datos )
            {
              //alert(idProducto);
              //console.log('SE BORRARON EXITOSAMENTE');
              //SE BORRARON EXITOSAMENTE
              //REGISTRAR LA PRIMERA IMAGEN              
              //alert('datos a envair srcimg1::'+srcimg1+' srcimg2::'+srcimg2+' srcimg3::'+srcimg3+' idtblproductcotizador::'+idProductoCotizador+' emailcreo::'+emailmodifico)
              $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setTblproductcotimg.php",  data: {solicitadoBy:"WEB",srcimg:srcimg1,idtblproductcotizador:idProductoCotizador,emailcreo:emailproveedor}  })
                .done(function( msgTblProductoImg1 )
                {
                  srcimg1=$('#modificar_srcimg1_producto_cotizadorBD').val(msgTblProductoImg1.datos);
                  $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setTblproductcotimg.php",  data: {solicitadoBy:"WEB",srcimg:srcimg2,idtblproductcotizador:idProductoCotizador,emailcreo:emailproveedor}  })
                    .done(function( msgTblProductoImg2 )
                    {
                      srcimg2=$('#modificar_srcimg2_producto_cotizadorBD').val(msgTblProductoImg2.datos);
                      //alert('msgTblProductoImg2.datos::'+msgTblProductoImg2.datos);
                      $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setTblproductcotimg.php",  data: {solicitadoBy:"WEB",srcimg:srcimg3,idtblproductcotizador:idProductoCotizador,emailcreo:emailproveedor}  })
                        .done(function( msgTblProductoImg3 )
                        {
                          srcimg3=$('#modificar_srcimg3_producto_cotizadorBD').val(msgTblProductoImg3.datos);
                          //SUBIMOS LAS NUEVAS IMAGENES AL ARCHIVO
                          //console.log('SUBIMOS LAS NUEVAS IMAGENES AL ARCHIVO');

                          cargarValoresDefault();


                          var formData = new FormData($("#formActualizarProductoCotizador")[0]);
                          var ruta = "imagen-ajax.php";
                          $.ajax({  method: "POST",  url: "uploadImgProductoCotizador.php",  data: formData ,contentType: false,
                          processData: false, })
                            .done(function( datos )
                            {
                              //alert('subio los archivos al servidor');
                              console.log('uploadImgProductoCotizador done datos::'+datos);
                              $('#productosComplementarioPlantilla').html("");
                              $('#productoscotizadorPlantilla').html("");
                              $('#productoslineaPlantilla').html("");
                              $('#formActualizarProductoCotizador')[0].reset();
                              UIkit.modal("#popup_spinner_modificando_producto").hide();
                              UIkit.modal.alert('Producto Cotizador Actualizado');
                              cargarValoresDefault();
                            })
                            .fail(function( jqXHR, textStatus ) {  console.log("uploadImgProductoCotizador fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
                            .always(function(){  /*console.log("always");*/ });                         
                        })
                        .fail(function( jqXHR, textStatus ) {  console.log("setTblproductcotimg3 fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
                        .always(function(){  /*console.log("always");*/ }); 
                    })
                    .fail(function( jqXHR, textStatus ) {  console.log("setTblproductcotimg2 fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
                    .always(function(){  /*console.log("always");*/ });
                  // ejecutar el ajax de subida pero cuando se pida el mombre en el php consultar el nombre en la bd y asigarlo            
                })
                .fail(function( jqXHR, textStatus ) {  console.log("setTblproductcotimg1 fail jqXHR::"+jqXHR.status+" IMG textStatus::"+textStatus);  })
                .always(function(){  /*console.log("always");*/ });              
            })
            .fail(function( jqXHR, textStatus ) {  console.log("setDeleteTblproductImgOfProducto  fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
            .always(function(){  /*console.log("setDeleteTblproductImgOfProducto  always");*/ });
          //RECORREMOS EL ARREGLO DE LOS ID
          $.each(arregloIdtblproductimgCotizador, function(i,item){
            //SOLICITAMOS BORRAR TODOS LOS ARCHIVOS FISICOS
            $.ajax({ method: "POST",  dataType: "json",  url: "./../../controllers/setDeleteFileImgProductoCotizador.php",  data: {solicitadoBy:"WEB",tblproductimg_srcimg:arregloTblproductimg_srcimgCotizador[i]} })
              .done(function( datos ){ 
              })
              .fail(function( jqXHR, textStatus ) {  console.log("setDeleteFileImgProductoCotizador  fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
              .always(function(){  /*console.log("setDeleteFileImgProductoCotizador  always");*/ });
          });
        })
        .fail(function( jqXHR, textStatus ) {  console.log("getAllTblproductImgProducto fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
        .always(function(){  /*console.log("getAllTblproductImgProducto always");*/ });
      
    }

    /*
    $solicitadoBy=$_POST["solicitadoBy"];
    $idtblproductcotizador=$_POST["idtblproductcotizador"];
    $nombreproductcotizador=$_POST["nombreproductcotizador"];
    $descripcion=$_POST["descripcion"];
    $ingrediente=$_POST["ingrediente"];
    $promcalificacion=$_POST["promcalificacion"];
    $diaselaboracion=$_POST["diaselaboracion"];
    $activado=$_POST["activado"];
    $idtblevento=$_POST["idtblevento"];
    $idtblproveedor=$_POST["idtblproveedor"];
    $emailmodifico=$_POST["emailmodifico"];
     */
    
    $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setUpdateTblproductcotizador.php", data: {solicitadoBy:"WEB",idtblproductcotizador:idProducto,nombreproductcotizador:nombre,descripcion:descripcion,ingrediente:ingrediente,promcalificacion:promcalificacion,diaselaboracion:diaselaboracion,activado:activado,idtblproveedor:idtblproveedor,idtblevento:idtblevento,emailmodifico:emailproveedor }  })
      .done(function( msgTblProductoDetalles ) {
        //alert('Elimnaci? Exitosa');
        $('#productoscotizadorPlantilla').html("");
        $('#productosComplementarioPlantilla').html("");
        $('#productoslineaPlantilla').html("");
        UIkit.modal("#popup_modificarproductocotizador").hide();
        if (srcimg1==''&&srcimg2==''&&srcimg3=='')
        {
          //alert('no tiene imagenes');
          $('#formActualizarProductoCotizador')[0].reset();
          UIkit.modal("#popup_spinner_modificando_producto").hide();
          UIkit.modal.alert('Producto cotizador Actualizado');        
          cargarValoresDefault();
        }
        
        
      })
      .fail(function( jqXHR, textStatus ) {  console.log("setUpdateTblproductcotizador fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
      .always(function(){  /*console.log("always");*/ });
  }


  function actualizarProductoComplementario(){

    idtblproductcomplem=$('#modificar_id_producto_Complementario').val();
    nombre=$("#modificar_nombre_producto_Complementario").val();
    descripcion=$("#modificar_descripcion_producto_Complementario").val();
    seo=$("#modificar_nombre_producto_Complementario").val().replace(" ", '');
    precioreal=$("#modificar_precio_producto_Complementario").val();
	preciobp=$("#modificar_precio_producto_Complementario").val();
    //preciobp=precioreal;
    idtblproveedor=$("#modificar_idProveedor_producto_Complementario").val();
    stock=$("#modificar_stock_producto_Complementario").val();
    activado=$('#modificar_activado_producto_Complementario').val();
    //srcimgActual=$("#fotografia_complementario_actual").val();
    srcimgActual=$("#fotografia_complementario_actual").attr("src");
    //alert('srcimgActual::'+srcimgActual);
    srcimgActual=srcimgActual.replace('./../assests_general/productos/complementario/', '');
    //alert('srcimgActual::'+srcimgActual);
    
    if(activado=='on'){
      activado=1;
    }else{
      activado=0;
    }

    //obentenso el inptup de la iamgen
    srcimg1=$("#modificar_srcimg1_producto_Complementario").val().replace(/C:\\fakepath\\/i, '');
    nuevaImagen=$("#modificar_srcimg1_producto_Complementario").val().replace(/C:\\fakepath\\/i, '');
    //alert('srcimg1::'+srcimg1);   
    //.replace(/C:\\fakepath\\/i, ''); 
    //si no esta vacio le asignamos la el nombre de la nueva imagen, si lo esta solo asignamos  el mismo nombre que tenia anteriormente
    if(srcimg1!=''){
      //console.log('entro al if srcimg1 tiene datos');
      srcimg1='i_'+idtblproductcomplem+'p_'+idtblproveedor+'_'+srcimg1;
      $('#modificar_srcimg1_producto_ComplementarioBD').val(srcimg1);
      //borramos la actual file de la fotografia del servidor
      $.ajax({ method: "POST",  dataType: "json",  
	  url: "./../../controllers/setDeleteFileImgProductoComplementario.php",  
	  data: {solicitadoBy:"WEB",tblproductimg_srcimg:srcimgActual} })
        .done(function( datos ){
          console.log('setDeleteFileImgProductoComplementario datos::'+datos.datos);
        })
        .fail(function( jqXHR, textStatus ) {  console.log("setDeleteFileImgProductoCotizador  fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
        .always(function(){  
        //console.log("setDeleteFileImgProductoCotizador  always");
         });

        //subimos la nueva fotografia al servidor
        var formData = new FormData($("#formActualizarProductoComplementario")[0]);

        var ruta = "imagen-ajax.php";
        $.ajax({  method: "POST",  url: "uploadImgProductoComplementario.php",  data: formData ,contentType: false,
          processData: false, })
          .done(function( datos )
          {
            $('#productosComplementarioPlantilla').html("");
            $('#productoscotizadorPlantilla').html("");
            $('#productoslineaPlantilla').html("");
            UIkit.modal("#popup_spinner_modificando_producto").hide();
            $('#formActualizarProductoComplementario')[0].reset();
            UIkit.modal.alert('Producto Complementario Actualizado');
            cargarValoresDefault();
          })
        .fail(function( jqXHR, textStatus ) {  console.log("uploadImgProductoCotizador fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
        .always(function(){  
        //console.log("always");
         });
    }else{
      console.log('entro al else srcimg1 tiene datos');
      srcimg1=srcimgActual;
    }    
    
    //console.log('datos para actualizar:: idtblproductcomplem'+idtblproductcomplem+' nombre::'+nombre+' descripcion::'+descripcion+' seo::'+seo+' precioreal::'+precioreal+' preciobp::'+preciobp+' srcimg1::'+srcimg1+' activado::'+activado+' idtblproveedor::'+idtblproveedor+' stock::'+stock+' emailmodifico::'+emailproveedor);
    $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setUpdateTblproductcomplem.php", 
	data: {solicitadoBy:"WEB",idtblproductcomplem:idtblproductcomplem,nombreproductcomplem:nombre,
	descripcion:descripcion,seo:seo,precioreal:precioreal,preciobp:preciobp,srcimg:srcimg1,
	activado:activado,idtblproveedor:idtblproveedor,stock:stock,emailmodifico:emailproveedor }  })
      .done(function( msgTblProductoComplementario ) {
        //alert('Elimnaci? Exitosa');
        console.log('setUpdateTblproductcomplem done msgTblProductoComplementario::'+msgTblProductoComplementario.datos);
        $('#productosComplementarioPlantilla').html("");
        $('#productoscotizadorPlantilla').html("");
        $('#productoslineaPlantilla').html("");        
        UIkit.modal("#popup_modificarproductoComplementario").hide();
        if(nuevaImagen=='')
        {
          console.log('modificar producto complementario sin imagen'+nuevaImagen)
          $('#formActualizarProductoComplementario')[0].reset();
          UIkit.modal("#popup_spinner_modificando_producto").hide();
          UIkit.modal.alert('Producto Complementario Actualizado');
          cargarValoresDefault();
        }else{
          console.log('se va a subir imagen');
        }
      })
      .fail(function( jqXHR, textStatus ) {  console.log("setUpdateTblproductcomplem fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
      .always(function(){ 
       //console.log("always");
     });
    
  }

  //function confirmacionEliminarProductoLinea(){}
  function eliminarProductoLinea(idProducto,idProductoDetalle){
    UIkit.modal("#popup_spinner_eliminando_producto", {bgclose: false}).show();
    //if (respuesta == true) {
    numeroProductosDetalle='';
    /*
    Recibir el id del producto general tblproducto
    ver cuantos productos detalles existe de este producto
    si productos detalle es solo 1
    si existe solo este eliminar el producto (en cascada se elimianr los productos detalle y las imagenes)
    SiNo solo elimianr el producto que esta  seleccionando
    */
      /////////////////////////////////////////////////////////
      var arregloIdtblproductimg=[];
      var arregloTblproductimg_srcimg=[];
      //SOLICITAMOS TODOS LOS REGISTROS DE IMANGENES DE UN PRODUCTO
      $.ajax({ method: "POST",  dataType: "json",  url: "./../../controllers/getAllTblproductImgProducto.php",  data: {solicitadoBy:"WEB",idtblproducto:idProducto} })
        .done(function( msgTblProductoImg )
        {
          //OBTENEMOS TODOS LOS REGISTROS 
          $.each(msgTblProductoImg.datos, function(i,item){
            //GUARDAMOS EL ID DEL LA IAMGEN EN EL ARREGLO
            arregloIdtblproductimg.push(msgTblProductoImg.datos[i].idtblproductimg);
            //GUARDAMOS EL NOMBRE DE LA IAMGEN EN EL ARREGLO
            arregloTblproductimg_srcimg.push(msgTblProductoImg.datos[i].tblproductimg_srcimg);
          });          
          //RECORREMOS EL ARREGLO DE LOS ID
          $.each(arregloIdtblproductimg, function(i,item){
            //SOLICITAMOS BORRAR TODOS LOS ARCHIVOS FISICOS
            //alert('entro al each i::'+i+' item::'+item+' arregloTblproductimg_srcimg[i]::'+arregloTblproductimg_srcimg[i]);
            $.ajax({ method: "POST",  dataType: "json",  url: "./../../controllers/setDeleteFileImgProducto.php",  data: {solicitadoBy:"WEB",tblproductimg_srcimg:arregloTblproductimg_srcimg[i]} })
              .done(function( datos ){ 
                //alert('done datos.datos::'+datos.datos+' datos.success::'+datos.success);
              })
              .fail(function( jqXHR, textStatus ) {  console.log("setDeleteFileImgProducto  fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
              .always(function(){  /*console.log("setDeleteFileImgProducto  always");*/ });
          });
          //COMIENZA CON LA ELIMINACION DE LAS BASES DE DATOS
          
          $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/getTblproductoDetalleProducto.php",  data: {solicitadoBy:"WEB",idtblproducto:idProducto}  })
            .done(function( msgTblProductoYDetalles ) {
              numeroProductosDetalle=0;
              $.each(msgTblProductoYDetalles.datos, function(i,item){
                numeroProductosDetalle++;
              });
              //numeroProductosDetalle++;
              console.log('ELIMINAR DESDE EL PRODUCTO::'+numeroProductosDetalle);
              
              if(numeroProductosDetalle<=1)
              {
                //ELIMINAR DESDE EL PRODUCTO
                console.log('ELIMINAR DESDE EL PRODUCTO'+email+' '+nombre+' '+apellido+' '+nivel);
                $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setDeleteTblproducto.php",  data: {solicitadoBy:"WEB",idtblproduct:idProducto, email:email, nombre:nombre, apellido:apellido, nivel:nivel}  })
                  .done(function( msgTblProducto ) {
                    console.log(JSON.stringify(msgTblProducto));
                    UIkit.modal.alert('Elimnación Exitosa');
                    //$('#productoslineaPlantilla').html("");
                    //cargarValoresDefault();
                    $('#productosComplementarioPlantilla').html("");
                    $('#productoscotizadorPlantilla').html("");
                    $('#productoslineaPlantilla').html("");
                    UIkit.modal("#popup_spinner_eliminando_producto").hide();
                    cargarValoresDefault();
                  })
                  .fail(function( jqXHR, textStatus ) {  console.log("setDeleteTblproducto fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
                  .always(function(){   });
              }
              else if(numeroProductosDetalle>1)
              {
                //ELIMINAR SOLO ESTE PRODUCTO DETALLE
                console.log('ELIMINAR SOLO ESTE PRODUCTO DETALLE::'+idProductoDetalle);
                $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setDeleteTblproductDetalle.php",  data: {solicitadoBy:"WEB",idtblproductdetalle:idProductoDetalle, email:email, nombre:nombre, apellido:apellido, nivel:nivel}  })
                  .done(function( msgTblProductoDetalles ) {
                    //alert('Elimnaci? Exitosa');
                    UIkit.modal.alert('Elimnación Exitosa');
                    //$('#productoslineaPlantilla').html("");
                    //cargarValoresDefault();
                    $('#productosComplementarioPlantilla').html("");
                    $('#productoscotizadorPlantilla').html("");
                    $('#productoslineaPlantilla').html("");
                    UIkit.modal("#popup_spinner_eliminando_producto").hide();
                    cargarValoresDefault();
                  })
                  .fail(function( jqXHR, textStatus ) {  console.log("setDeleteTblproductDetalle fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
                  .always(function(){   });
              }
              
            })
            .fail(function( jqXHR, textStatus ) {  console.log("getTblproductoDetalleProducto fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
            .always(function(){  /*console.log("always");*/ });
          
          //FIN COMIENZA CON LA ELIMINACION DE LAS BASES DE DATOS
        })
        .fail(function( jqXHR, textStatus ) {  console.log("getAllTblproductImgProducto fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
        .always(function(){  /*console.log("getAllTblproductImgProducto always");*/ });

        
  }
  function eliminarProductoCotizador(idtblproductcotizador){
      UIkit.modal("#popup_spinner_eliminando_producto", {bgclose: false}).show();
      /*
      Recibir el id del producto general tblproducto
      ver cuantos productos detalles existe de este producto
      si productos detalle es solo 1
      si existe solo este eliminar el producto (en cascada se elimianr los productos detalle y las imagenes)
      SiNo solo elimianr el producto que esta  seleccionando
      */
      /////////////////////////////////////////////////////////
      var arregloIdtblproductimg=[];
      var arregloTblproductimg_srcimg=[];
      //SOLICITAMOS TODOS LOS REGISTROS DE IMANGENES DE UN PRODUCTO
      $.ajax({ method: "POST",  dataType: "json",  url: "./../../controllers/getAllTblproductcotimg.php",  data: {solicitadoBy:"WEB",idtblproductcotizador:idtblproductcotizador} })
        .done(function( msgTblProductoImg )
        {
          if(msgTblProductoImg.datos!='Hubo algun error, vuelve a intentarlo WEB')
          {
            //alert('getAllTblproductcotimg done OBTENEMOS TODOS LOS REGISTROS')
            //OBTENEMOS TODOS LOS REGISTROS 
            $.each(msgTblProductoImg.datos, function(i,item){
              //GUARDAMOS EL ID DEL LA IAMGEN EN EL ARREGLO
              arregloIdtblproductimg.push(msgTblProductoImg.datos[i].idtblproductcotimg);
              //GUARDAMOS EL NOMBRE DE LA IAMGEN EN EL ARREGLO
              arregloTblproductimg_srcimg.push(msgTblProductoImg.datos[i].tblproductcotimg_srcimg);
              //alert('msgTblProductoImg.datos[i].tblproductcotimg_srcimg::'+msgTblProductoImg.datos[i].tblproductcotimg_srcimg);
            });          
            //RECORREMOS EL ARREGLO DE LOS ID
            //alert('//RECORREMOS EL ARREGLO DE LOS ID');
            $.each(arregloIdtblproductimg, function(i,item){
              //SOLICITAMOS BORRAR TODOS LOS ARCHIVOS FISICOS
              
              $.ajax({ method: "POST",  dataType: "json",  url: "./../../controllers/setDeleteFileImgProductoCotizador.php",  data: {solicitadoBy:"WEB",tblproductimg_srcimg:arregloTblproductimg_srcimg[i]} })
                .done(function( datos ){ 
                  //alert('setDeleteFileImgProductoCotizador done');
                })
                .fail(function( jqXHR, textStatus ) {  console.log("setDeleteFileImgProducto  fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
                .always(function(){   });
              
            });
          }
          //COMIENZA CON LA ELIMINACION DE LAS BASES DE DATOS
          //
          //ELIMINAR DESDE EL PRODUCTO COTIZADOR
          console.log('ELIMINAR DESDE EL PRODUCTO');
          
          $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setDeleteTblproductcotizador.php",  data: {solicitadoBy:"WEB",idtblproductcotizador:idtblproductcotizador, email:email, nombre:nombre, apellido:apellido, nivel:nivel}  })
            .done(function( msgTblProducto ) {
              UIkit.modal.alert('Elimnación Exitosa');
              //$('#productoslineaPlantilla').html("");
              //cargarValoresDefault();
              $('#productosComplementarioPlantilla').html("");
              $('#productoscotizadorPlantilla').html("");
              $('#productoslineaPlantilla').html("");
              UIkit.modal("#popup_spinner_eliminando_producto").hide();
              cargarValoresDefault();
            })
            .fail(function( jqXHR, textStatus ) {  console.log("setDeleteTblproducto fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
            .always(function(){   });
            
          //FIN COMIENZA CON LA ELIMINACION DE LAS BASES DE DATOS
        })
        .fail(function( jqXHR, textStatus ) {  console.log("getAllTblproductImgProducto fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
        .always(function(){  /*console.log("getAllTblproductImgProducto always");*/ });
    
  }
  function eliminarProductoComplementario(idProducto){
    UIkit.modal("#popup_spinner_eliminando_producto", {bgclose: false}).show();
      srcimgActual=$("#imagenPortadaProductoComplementario"+idProducto).attr("src");
      srcimgActual=srcimgActual.replace('../assests_general/productos/complementario/', '');

      //borramos la actual file de la fotografia del servidor
      
      $.ajax({ method: "POST",  dataType: "json",  url: "./../../controllers/setDeleteFileImgProductoComplementario.php",  data: {solicitadoBy:"WEB",tblproductimg_srcimg:srcimgActual} })
        .done(function( datos ){
          console.log('setDeleteFileImgProductoComplementario datos::'+datos.datos);
          
        })
        .fail(function( jqXHR, textStatus ) {  console.log("setDeleteFileImgProductoCotizador  fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
        .always(function(){  
        //console.log("setDeleteFileImgProductoCotizador  always");
         });
        
      $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setDeleteTblproductcomplem.php",  data: {
            solicitadoBy:"WEB",
            idtblproductcomplem:idProducto,
            email:email,
            nombre:nombre,
            apellido:apellido,
            nivel:nivel}  })
            .done(function( msgTblProductoComplementario ) {
              console.log('msgTblProductoComplementario::'+JSON.stringify(msgTblProductoComplementario, null, 4))
              
              UIkit.modal.alert('Elimnación Exitosa');
              $('#productoslineaPlantilla').html("");
              $('#productoscotizadorPlantilla').html("");
              $('#productosComplementarioPlantilla').html("");
              UIkit.modal("#popup_spinner_eliminando_producto").hide();
              cargarValoresDefault();
              
            })
            .fail(function( jqXHR, textStatus ) {  console.log("setDeleteTblproductcomplem fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
            .always(function(){   });
      
  }
  /*
  FIN FUNCIONES MIGUEL
   */

function llenarDatosCalendario(){
  console.log("CreandoArchivo");
  $.ajax({
      method: "POST",  
      dataType: "json",  
      url: "./../../controllers/setCalendario.php",  
      data: {idtblproveedor:idtblproveedor}})
    .done(function( msg) {  
        console.log(msg);
    })
    .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
    .always(function(){  console.log("always");  });
    setTimeout('',1500);

}

function cargaCalendario(){
  setTimeout('',1500);
  nombrearchivo='calendarioproveedor_'+idtblproveedor+'.json';
  console.log(nombrearchivo);

  $("#calendar_selectable").fullCalendar({
     header: {
          left: 'today',
          center: 'title',
          right: 'month,agendaDay prev,next'
      },
      buttonIcons: {
          prev: 'md-left-single-arrow',
          next: 'md-right-single-arrow',
          prevYear: 'md-left-double-arrow',
          nextYear: 'md-right-double-arrow'
      },
      buttonText: {
          today: ' ',
          month: ' ',
          week: ' ',
          day: ' '
      },
      aspectRatio: 2.1,
      defaultDate: moment(),
      eventLimit: true,
      timeFormat: 'HH:mm',
      events: "./assets/calendariojson/"+nombrearchivo,
      eventClick: function(calEvent, jsEvent, view) {
        if(calEvent.tipo==1){
          UIkit.switcher('#tabs_1').show(1);
        }else{
          UIkit.switcher('#tabs_1').show(3);
        }
      }
    });


}


function indicadoresIndex(){

  var numCotizaciones=0;
  var ventasProductos=0;
  var ventasTotal=0;
  
  ////////////// Indicador de Numero de Ordenes //////////////

  $.ajax({
      method: "POST",  
      dataType: "json",  
      url: "./../../controllers/getNumeroOrdenes.php",  
      data: {solicitadoBy:solicitadoBy,idtblproveedor:idtblproveedor}})
    .done(function( msg9) {

      if(parseInt(msg9.success)==1){ $("#indicadorNumeroPedidos").text(msg9.datos);}
     
    })
    .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
    .always(function(){  console.log("always");  });

  //////////////////////////////////////////////////////

  //////////////  Indicador de Numero de Cotizaciones  //////////////

  $.ajax({
      method: "POST",  
      dataType: "json",  
      url: "./../../controllers/getNumeroCotizaciones.php",  
      data: {solicitadoBy:solicitadoBy,idtblproveedor:idtblproveedor}})
    .done(function(msg) {
      if(parseInt(msg.success)==1){
        numCotizaciones = numCotizaciones+(parseInt(msg.datos));
        $("#indicadorNumeroCotizaciones").text(numCotizaciones);
      }
    })
    .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
    .always(function(){  console.log("always");  });

  //////////////////////////////////////////////////////

  //////////////  Indicador de Numero de Cotizaciones  //////////////

  $.ajax({
      method: "POST",  
      dataType: "json",  
      url: "./../../controllers/getNumeroCotizacionesNuevos.php",  
      data: {solicitadoBy:solicitadoBy}})
    .done(function(msg) {
      if(parseInt(msg.success)==1){
      numCotizaciones = numCotizaciones+(parseInt(msg.datos));
      $("#indicadorNumeroCotizaciones").text(numCotizaciones);
      }
    })
    .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
    .always(function(){  console.log("always");  });

  //////////////////////////////////////////////////////

  //////////////   Indicador de Ventas //////////////

    $.ajax({
      method: "POST",  
      dataType: "json",  
      url: "./../../controllers/getNumeroVentas.php",  
      data: {solicitadoBy:solicitadoBy,idtblproveedor:idtblproveedor}})
    .done(function(msg) {
      $.each(msg.datos, function(i,item){
        ventasProductos =((parseInt(item.tblcarritoproduct_cantidad))*(item.tblcarritoproduct_preciobp));    
        ventasTotal=ventasTotal + ventasProductos;
        $("#indicadorVentas").text(ventasTotal.toFixed(2));
      });  
    })
    .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
    .always(function(){  console.log("always");  });

    $.ajax({
      method: "POST",  
      dataType: "json",  
      url: "./../../controllers/getNumeroVentasComplementarios.php",  
      data: {solicitadoBy:solicitadoBy,idtblproveedor:idtblproveedor}})
    .done(function(msg) {
      $.each(msg.datos, function(i,item){
        ventasProductosComplem =((parseInt(item.tblcarritoproductcomplem_cantidad))*(item.tblcarritoproductcomplem_preciobp));    
        ventasTotal=ventasTotal + ventasProductosComplem;
        $("#indicadorVentas").text(ventasTotal.toFixed(2));
      });  
    })
    .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
    .always(function(){  console.log("always");  });

  //////////////////////////////////////////////////////

  //////////////  Indicador Dias de Pedido //////////////

    $.ajax({
      method: "POST",  
      dataType: "json",  
      url: "./../../controllers/getTblproveedorstatuspaquete2.php",  
      data: {solicitadoBy:solicitadoBy,idtblproveedor:idtblproveedor}})
    .done(function(msg) {
      $.each(msg.datos, function(i,item){
          $("#idicadorDiasPaquete").text(item.tblproveedorstatuspaquete_diastranscurridos);
      });

    })
    .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
    .always(function(){  console.log("always");  });

    //////////////////////////////////////////////////////

}

//inicializa las tablas para poder realizar filtros 
function inicializarTablas(){
  $("#tbl_ordenes").tablesorter({
    sortList: [[1,0]], //ordenar por de inicio esa columna 
    headers: {1: { sorter: "shortDate", dateFormat: "ddmmyyyy" } }, //cambio de formato de fecha 
    widgets: ['filter']//activar el widget de filtro de busqueda
  });

  $("#tbl_ordenespendiente").tablesorter({
    sortList: [[1,0]] ,
    headers: {1: { sorter: "shortDate", dateFormat: "ddmmyyyy" } },
    widgets: ['filter'], 
  });

  $("#tbl_ordeneshistorial").tablesorter({
    sortList: [[0,0]] ,
    headers: {1: {sorter: 'digit'} ,
              2: { sorter: "shortDate", dateFormat: "ddmmyyyy" }
              },
    widgets: ['filter'],});

  $("#tbl_ordenesCotizador").tablesorter({
    sortList: [[2,0],[4,1]], 
    headers: {1: {sorter: 'digit'} ,
              2: { sorter: "shortDate", dateFormat: "ddmmyyyy" }
              },
    widgets: ['filter'],});

  $("#tbl_ordenesCotizadorNuevos").tablesorter({
    sortList: [[1,0],[3,1]],
    headers: {1: {sorter: 'digit'} ,
              2: { sorter: "shortDate", dateFormat: "ddmmyyyy" }
              },
    widgets: ['filter'],});

}

//funcion para mostrar los registros en las tablas de Ordenes
function mostrarListaOrdenes(){
  
  //inicializa las tablas para poder realizar filtros 
  inicializarTablas();
//alert('mostrarListaOrdenes');
//AJAX encargado de solicitar las ordenes del proveedor  
    $.ajax({
      method: "POST",  
      dataType: "json",  
      url: "./../../controllers/getAllTblordencompraByTbldatosenvio.php",  
      data: {solicitadoBy:solicitadoBy, idproveedor:idtblproveedor}  })
    .done(function( msg ) {
      //alert('done getAllTblordencompraByTbldatosenvio');
      $.each(msg.datos, function(i,item){   
        //alert('getAllTblordencompraByTbldatosenvio');
        idtblordencompra = item.idtblordencompra;//id de la orden

        $.ajax({//Checar para ver si existe un registro de tblentregaprodruct
          method: "POST",  
          dataType: "json",  
          url: "./../../controllers/getTblentregaproducto.php",  
          data: {solicitadoBy:solicitadoBy,idtblordencompra:idtblordencompra,idtblproveedor:idtblproveedor}})
            .done(function( msg2 ){
              if(parseInt(msg2.success)==1){//si es exitoso entoces esta entregado
                console.log("Probablemente ENTREGADO");
                $.each(msg2.datos, function(x,item){
                     //si el status es diferente de Entregado entonce entra como ordenPendiente 
                   if(msg2.datos[x].tblentregaproducto_status!="ENTREGADO"){
                    //cambio de formato de fechas compra y agendado
                    fchordencompra= msg.datos[i].tblordencompra_fchordencompra;
                    fchordencompra = fchordencompra.split("-");
                    fchordencompra = fchordencompra[2]+"/"+fchordencompra[1]+"/"+fchordencompra[0];
                    fchagendado= msg.datos[i].tbldatosenvio_fchagendado;
                    fchagendado = fchagendado.split("-");
                    fchagendado = fchagendado[2]+"/"+fchagendado[1]+"/"+fchagendado[0];
                    
                    //se añade a la tabla Ordenes Pendiente la fila con los campos  
                    $("#tblordenespendiente_item").append(
                      '<tr data-uk-modal="{target:'+"'#detalleOrdenPendiente'"+', bgclose:false,modal:false }" onclick="datosDetalleOrden('+msg.datos[i].idtblordencompra+','+tabla_OrdenesPendiente+')"><td class="uk-text-center">'+msg.datos[i].idtblordencompra+
                      '</td><td class="uk-text-center">'+fchagendado+
                      '</td></tr>');
                    $("#tbl_ordenespendiente").trigger('updateAll', [true]);//actualiza tabla
					inicializarPagOrdenPendientes();

                   }else {//Orden entregada
                  //cambio de formato de fechas  pagoproveedor
                  fchpagoproveedor= msg2.datos[x].tblentregaproducto_fchpagoproveedor;
                  fchpagoproveedor = fchpagoproveedor.split("-");
                  fchpagoproveedor = fchpagoproveedor[2]+"/"+fchpagoproveedor[1]+"/"+fchpagoproveedor[0];
                  //se añade a la tabla Ordenes Hostorial la fila con los campos  
                  $("#tblordeneshistorial_item").append(
                  '<tr data-uk-modal="{target:'+"'#detalleOrdenPendiente'"+', bgclose:false,modal:false }" onclick="datosDetalleOrden('+msg.datos[i].idtblordencompra+','+tabla_OrdenesHistorial+')"><td class="uk-text-center">'+msg.datos[i].idtblordencompra+
                  '</td><td class="uk-text-center">$<span name="totaltabla'+i+'" id="totaltabla'+i+'"></span</td><td class="uk-text-center">'+fchpagoproveedor+'</td><td class="uk-text-center" id="tblstatusdeposito'+i+'"></td></tr>');
                  


                  if(msg2.datos[x].tblentregaproducto_statusdeposito!="PENDIENTE"){
                      $('#tblstatusdeposito'+i).append('<span class="uk-badge uk-badge-success">'+msg2.datos[x].tblentregaproducto_statusdeposito+'</span>');
                    }else { 
                       $('#tblstatusdeposito'+i).append('<span class="uk-badge uk-badge-warning">'+msg2.datos[x].tblentregaproducto_statusdeposito+'</span>');
                     }
                  //funcion para calcular el Total de la Orden 
                  totalCompra(msg.datos[i].idtblordencompra,i);

                  $("#tbl_ordeneshistorial").trigger('updateAll', [true]);//actualiza tabla
				  inicializarPagOrdenHistorial();
                 }
                });
              }else {
                console.log("AUN NO ESTA ENTREGADO");
                //cambio de formato de fechas compra y agendado
                fchordencompra= msg.datos[i].tblordencompra_fchordencompra;
                fchordencompra = fchordencompra.split("-");
                fchordencompra = fchordencompra[2]+"/"+fchordencompra[1]+"/"+fchordencompra[0];
                fchagendado= msg.datos[i].tbldatosenvio_fchagendado;
                fchagendado = fchagendado.split("-");
                fchagendado = fchagendado[2]+"/"+fchagendado[1]+"/"+fchagendado[0];
                
                //se añade a la tabla Ordenes la fila con los campos  
                $("#tblordenes_item").append(
                  '<tr data-uk-modal="{target:'+"'#detalleOrdenPendiente'"+', bgclose:false,modal:false, }" onclick="datosDetalleOrden('+msg.datos[i].idtblordencompra+','+tabla_Ordenes+')"><td class="uk-text-center">'+msg.datos[i].idtblordencompra+
                  '</td><td class="uk-text-center">'+fchagendado+ '</td></tr>');
                $("#tbl_ordenes").trigger('updateAll', [true]);//actualiza tabla
				inicializarPagOrdenEntregar();
              }

            
            }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  }).always(function(){  console.log("always");  });

      });
    }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  }).always(function(){  console.log("always");  });
}
//funcion para calcular el total de la orden y colocarlo en la tabla
function totalCompra(idtblordencompra,x){
   var totalproveedor =0;
   var subtotal=0;
   var subtotalcomplem=0;

  $.ajax({
      method: "POST",  
      dataType: "json",  
      url: "./../../controllers/getAllTblcarritoproductByTblordencompra.php",  
      data: {solicitadoBy:solicitadoBy,idtblordencompra:idtblordencompra,idtblproveedor:idtblproveedor}})
        .done(function(msg4) {
        $.each(msg4.datos, function(i4,item){
          subtotal = (parseInt(msg4.datos[i4].tblcarritoproduct_cantidad))*(parseFloat(msg4.datos[i4].tblcarritoproduct_preciobp));
          totalproveedor = totalproveedor + subtotal;
          console.log("TOTAL"+totalproveedor); 
        });

      $('#totaltabla'+x).text(totalproveedor);
      $("#tbl_ordeneshistorial").trigger('updateAll', [true]);  
    }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);}).always(function(){  console.log("always");  });


    $.ajax({
      method: "POST",  
      dataType: "json",  
      url: "./../../controllers/getCheckTblcarritoproductcomplemByTblordencompra.php",  
      data: {solicitadoBy:solicitadoBy,idtblordencompra:idtblordencompra}})
        .done(function(msg) {
        if (parseInt(msg.success)==1) {

          $.ajax({
            method: "POST",  
            dataType: "json",  
            url: "./../../controllers/getAllTblcarritoproductcomplemByTblordencompra.php",  
            data: {solicitadoBy:solicitadoBy,idtblordencompra:idtblordencompra,idtblproveedor:idtblproveedor}})
              .done(function(msg7) {
              $.each(msg7.datos, function(i,item){
                subtotalcomplem = (parseInt(msg7.datos[i].tblcarritoproductcomplem_cantidad))*(parseFloat(msg7.datos[i].tblcarritoproductcomplem_preciobp));

        totalproveedor = totalproveedor + subtotalcomplem;
          console.log("TOTAL"+totalproveedor); 
        });
          $('#totaltabla'+x).text(totalproveedor); 
           $("#tbl_ordeneshistorial").trigger('updateAll', [true]);   
          }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);}).always(function(){  console.log("always");  });
        
        }
    }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);}).always(function(){  console.log("always");  });

}
//Funcion para llenar el pop con los detalles de la orden seleccionada
function datosDetalleOrden(idtblordencompra,idTabla){
  
  var totalproveedor = 0;
  nombreservicioTienda='Entrega en Tienda';//para hacer una comparacion con el tipo de servicio
  var productosComplem=false;   
 var intProducts; //lleva el conteo de los productos de la orden 
 var intProductsComplem; //lleva el conteo de los productos complementarios la orden 

  $("#datosfactura").empty();//limpiar la lista de datos de factura
  $("#ordencompra_listaproductos").empty();//limpiar la lista de productos
  $("#datoscliente_envio").empty();//limpia los datos de envio
  $("#botondeubicacion").empty();//limpia el boton de ubicacion 
  $("#marcarorden").empty();//limpia el boton de marcar como entregada
  $("#entregaEvidencia").empty();//limpia el form de evidencias
  
  
  //datos del cliente 
  $.ajax({
   method: "POST",  
    dataType: "json",  
    url: "./../../controllers/getTblordencompra.php",  
    data: {solicitadoBy:solicitadoBy,idtblordencompra:idtblordencompra}})
     .done(function(msg7) {
     $.each(msg7.datos, function(i,item){
       $("#numerodeordenpendiente").text('Orden No.'+ item.idtblordencompra);
       $("#ordenactual_nombrecliente").text(item.tblordencompra_nombrecliente);
       idcliente= item.tblcliente_idtblcliente;
       facturacion = item.tblordencompra_facturacion;

       //cambio de formato de fecha
      fchordencompra= msg7.datos[i].tblordencompra_fchordencompra;
      fchordencompra = fchordencompra.split("-");
      fchordencompra = fchordencompra[2]+"/"+fchordencompra[1]+"/"+fchordencompra[0];
      $("#ordenactual_fchcompra").text(fchordencompra);

     });
    $.ajax({  
      method: "POST",  
      dataType: "json",  
      url: "./../../controllers/getTblcliente.php",  
      data: {solicitadoBy:solicitadoBy, idtblcliente:idcliente} })
    .done(function( msg2 ) { 
      $.each(msg2.datos, function(i2,item2){
        $("#ordenactual_emailcliente").text(msg2.datos[i2].tblcliente_email);
        $("#ordenactual_numtelcliente").text(msg2.datos[i2].tblcliente_telefono);
          if(facturacion==1){//datos que se requieren para facturacion
            $("#ordenactual_factura").text("Requiere Factura");
              //ciudad
              $("#datosfactura").append('<li><div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE55A;</i></div><div class="md-list-content"><span class="md-list-heading">'+msg2.datos[i2].tblcliente_ciudad+'</span><span class="uk-text-small uk-text-muted">Ciudad</span></div></li>');
              //direccion, colonia y codipostal
              $("#datosfactura").append('<li><div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE88A;</i></div><div class="md-list-content"><span class="md-list-heading">'+msg2.datos[i2].tblcliente_callenum+'</span><span class="md-list-heading">Colonia: '+msg2.datos[i2].tblcliente_colonia+'</span><span class="md-list-heading">CodigoPostal:'+msg2.datos[i2].tblcliente_codipost+'</span><span class="uk-text-small uk-text-muted">Dirección</span></div></li>');
              //RFC
              $("#datosfactura").append('<li><div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE90D;</i></div><div class="md-list-content"><span class="md-list-heading">'+msg2.datos[i2].tblcliente_rfc+'</span><span class="uk-text-small uk-text-muted">RFC</span></div></li>');
          }else {$("#ordenactual_factura").text("NO Requiere Factura");}
      });
    }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);}).always(function(){  console.log("always");  });
  }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);}).always(function(){  console.log("always");  });

  //Datos de Productos
  $.ajax({
      method: "POST",  
      dataType: "json",  
      url: "./../../controllers/getAllTblcarritoproductByTblordencompra.php",  
      data: {solicitadoBy:solicitadoBy,idtblordencompra:idtblordencompra,idtblproveedor:idtblproveedor}})
        .done(function(msg4) {
        $.each(msg4.datos, function(i4,item){
          subtotal=0;
          $("#ordencompra_listaproductos").append('<br/><li><div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE7E9;</i></div><div class="md-list-content"><span class="md-list-heading">'+ msg4.datos[i4].tblcarritoproduct_nombreproducto +'</span><span class="uk-text-small uk-text-muted">Nombre de Producto</span></div></li><li id="prod'+i4+'"><span class="uk-text-small uk-text-muted">Caracteristicas</span><br/></li><li id="personali'+i4+'"></li><li><div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin><div class="uk-width-large-1-2"><div class="md-list-content" id="cantidadP'+i4+'"></div></div><div class="uk-width-large-1-2"><div class="md-list-content" id="precioIndividual'+i4+'"></div></div></li>');

            iddetalleproducto = msg4.datos[i4].tblcarritoproduct_idtblproductdetalle.toString();

            $.ajax({//detalle de cada producto de acuerdo
      method: "POST",  
      dataType: "json",  
      url: "./../../controllers/getTblproductoDetalle.php",  
      data: {solicitadoBy:solicitadoBy, idtblproductdetalle:iddetalleproducto}  })
     .done(function( msg5 ) {
      console.log("getTblproductoDetalle");
      console.log(msg5);
      $.each(msg5.datos, function(i5,item5){
        if(msg5.datos[i5].tblproductdetalle_diametro!=null){
          $("#prod"+i4).append('<span class="md-list-heading">'+msg5.datos[i5].tblproductdetalle_diametro+' cm</span><br/>');
        }
        if(msg5.datos[i5].tblproductdetalle_largo!=null && msg5.datos[i5].tblproductdetalle_ancho!=null){
          $("#prod"+i4).append('<span class="md-list-heading">'+msg5.datos[i5].tblproductdetalle_largo+' cm x '+ msg5.datos[i5].tblproductdetalle_ancho+' cm </span><br/>');
        }
        if(msg5.datos[i5].tblproductdetalle_piezas!=null){
          $("#prod"+i4).append('<span class="md-list-heading">'+msg5.datos[i5].tblproductdetalle_piezas+' piezas</span><br/>');
        }

        idtblespecificingre = msg5.datos[i5].tblespecificingrediente_idtblespecificingrediente.toString();
        $.ajax({//muestra el ingrediente especifico 
          method: "POST",  
          dataType: "json",  
          url: "./../../controllers/getTblespecificingrediente.php",  
          data: {solicitadoBy:solicitadoBy, idtblespecificingrediente:idtblespecificingre}  })
        .done(function( msg6) {  
          $.each(msg6.datos, function(i6,item6){
           $("#prod"+i4).append('<span class="md-list-heading">Especificacón: '+msg6.datos[i6].tblespecificingrediente_nombre+' </span><br/>')}
           );
        })
        .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
        .always(function(){  console.log("always");  });

      });
    })
     .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
     .always(function(){  console.log("always");  });

     if(msg4.datos[i4].tblcarritoproduct_personalizar!=null){
      $("#personali"+i4).append('<span class="uk-text-small uk-text-muted">Personalización o Mensaje</span><br/><span class="md-list-heading">'+msg4.datos[i4].tblcarritoproduct_personalizar+'</span>');
    }else {$("#personali"+i4).remove();}

    $("#cantidadP"+i4).append('<span class="md-list-heading">'+msg4.datos[i4].tblcarritoproduct_cantidad+'</span><br/><span class="uk-text-small uk-text-muted"><i class="md-list-addon-icon material-icons">&#xE547;</i>Cantidad</span>');
    $("#precioIndividual"+i4).append('<span class="md-list-heading">'+msg4.datos[i4].tblcarritoproduct_preciobp +'</span><br/><span class="uk-text-small uk-text-muted"><i class="material-icons">&#xE263;</i>Precio</span>');

    subtotal = (parseInt(msg4.datos[i4].tblcarritoproduct_cantidad))*(parseFloat(msg4.datos[i4].tblcarritoproduct_preciobp));
    totalproveedor = totalproveedor + subtotal; 
    intProducts = intProducts + parseInt(msg4.datos[i4].tblcarritoproduct_cantidad); 
    console.log("PRODUCTOS: "+ intProducts);
        });
  $("#ordenactual_totalcompra").text((totalproveedor).toFixed(2));
    }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);}).always(function(){  console.log("always");  });

  $.ajax({
      method: "POST",  
      dataType: "json",  
      url: "./../../controllers/getCheckTblcarritoproductcomplemByTblordencompra.php",  
      data: {solicitadoBy:solicitadoBy,idtblordencompra:idtblordencompra}})
        .done(function(msg) {
        if (parseInt(msg.success)==1) {
          productosComplem=true;
          $.ajax({
            method: "POST",  
            dataType: "json",  
            url: "./../../controllers/getAllTblcarritoproductcomplemByTblordencompra.php",  
            data: {solicitadoBy:solicitadoBy,idtblordencompra:idtblordencompra,idtblproveedor:idtblproveedor}})
              .done(function(msg7) {
              $.each(msg7.datos, function(i,item){
                subtotalcomplem=0;
                $("#ordencompra_listaproductos").append('<br/><li><div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE146;</i></div><div class="md-list-content"><span class="md-list-heading">ID['+msg7.datos[i].tblcarritoproductcomplem_idtblproductcomplem +']:  '+ msg7.datos[i].tblcarritoproductcomplem_nombreproducto +'</span><span class="uk-text-small uk-text-muted">Nombre de Producto Complementario</span></div></li><li><div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin><div class="uk-width-large-1-2"><div class="md-list-content"><span class="md-list-heading">'+msg7.datos[i].tblcarritoproductcomplem_cantidad+'</span><br/><span class="uk-text-small uk-text-muted"><i class="md-list-addon-icon material-icons">&#xE547;</i>Cantidad</span></div></div><div class="uk-width-large-1-2"><div class="md-list-content" ><span class="md-list-heading">'+msg7.datos[i].tblcarritoproductcomplem_preciobp +'</span><br/><span class="uk-text-small uk-text-muted"><i class="material-icons">&#xE263;</i>Precio</span></div></div></li>');

                subtotalcomplem = (parseInt(msg7.datos[i].tblcarritoproductcomplem_cantidad))*(parseFloat(msg7.datos[i].tblcarritoproductcomplem_preciobp));

                totalproveedor = totalproveedor + subtotalcomplem;
                
              });
              $("#ordenactual_totalcompra").text((totalproveedor).toFixed(2));   
              }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);}).always(function(){  console.log("always");  });
        }else {productosComplem=false;}
      }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);}).always(function(){  console.log("always");  });

    $.ajax({//datos de envio de la orden
      method: "POST",  
      dataType: "json",  
      url: "./../../controllers/getTbldatosenvio.php",  
      data: {solicitadoBy:solicitadoBy, idtblordencompra:idtblordencompra}  })
    .done(function( msg3 ) { 
      $.each(msg3.datos, function(i3,item3){

      fchagendado= msg3.datos[i3].tbldatosenvio_fchagendado;
      fchagendado = fchagendado.split("-");
      fchagendado = fchagendado[2]+"/"+fchagendado[1]+"/"+fchagendado[0];

      $("#ordenactual_fchagendado").text(fchagendado);
      $("#ordenactual_horaentrega").text(msg3.datos[i3].tbldatosenvio_horaagendado);

      //entregaentienda    
      if(msg3.datos[i3].tbldatosenvio_tipodeservicio == nombreservicioTienda){
        $("#ordenactual_tipodeentrega").text(msg3.datos[i3].tbldatosenvio_tipodeservicio);
    }else{
      $("#ordenactual_tipodeentrega").text(msg3.datos[i3].tbldatosenvio_tipodeservicio);
      $("#datoscliente_envio").append('<li><div class="md-list-addon-element"><i class="md-list-addon-icon  material-icons">&#xE55F;</i></div><div class="md-list-content"><span class="md-list-heading" id="dirCompletaOrden">'+msg3.datos[i3].tbldatosenvio_pais+", "+msg3.datos[i3].tbldatosenvio_ciudad+", "+msg3.datos[i3].tbldatosenvio_calle+" "+msg3.datos[i3].tbldatosenvio_numint+",Col."+msg3.datos[i3].tbldatosenvio_colonia+",CP "+msg3.datos[i3].tbldatosenvio_codipost+'</span><span class="uk-text-small uk-text-muted">Dirección</span></div></li>');//
       $("#botondeubicacion").append('<button class="md-btn md-btn-primary md-btn-block md-btn-wave-light" onclick="mapaGeo('+0+','+idmapaOrdenes+')" type="button"  data-uk-modal="{target:'+"'#mapa'"+',modal: false,bgclose:false}"> Ubicacion de Entrega en Mapa</button>');
    }

    $("#ordenactual_personarecibeentrega").text(msg3.datos[i3].tbldatosenvio_nombrerecibe);
    $("#ordenactual_telefonorecibeentrega").text(msg3.datos[i3].tbldatosenvio_celularrecibe);   
    })
  }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
  .always(function(){  console.log("always");  });

  if(idTabla==tabla_Ordenes){
  console.log("TABLA ORDENES");
  //se añade el boton al detalledeorden 
  $("#marcarorden").append('<button class="md-btn md-btn-primary md-btn-block md-btn-wave-light" data-uk-modal="{target:'+"'#popup_marcarorden'"+', bgclose:false}" onclick="botonMarcarStatus('+idtblordencompra+')">MARCAR COMO ORDEN ENTREGADA</button>');
  }
  if(idTabla==tabla_OrdenesPendiente){
  console.log("TABLA ORDENES PENDIENTE");
  $("#marcarorden").append('<button class="md-btn md-bg-red-A700 md-color-deep-purple-50 md-btn-block" data-uk-modal="{target:'+"'#popupmodif_marcarorden'"+', bgclose:false}" onclick="modificarStatus('+idtblordencompra+')">MODIFICAR STATUS DE ENTREGA</button>');


  $.ajax({//se obtiene datos del producto
    method: "POST",  
    dataType: "json",  
    url: "./../../controllers/getTblentregaproducto.php",  
    data: {solicitadoBy:solicitadoBy,idtblordencompra:idtblordencompra,idtblproveedor:idtblproveedor}})
    .done(function( msg9) {
      console.log("ENTREGA");
      console.log(msg9);
      $.each(msg9.datos, function(i,item3){


      //se añade al popupdedetalleorden la visualizacion de los datos de evidencias (imgs)
      $("#entregaEvidencia").append('<div class="uk-grid uk-grid-medium" data-uk-grid-margin><div class="uk-width-1-1"><div class="md-card"><div class="md-card-toolbar"><h2 class=" uk-text-large uk-text-middle uk-text-bold">Evidencias de Orden Entregada</h2></div><div class="md-card-content large-padding"><div class="uk-grid "></div><div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin><div class="uk-width-large-1-2"><h4 class="heading_c uk-margin-small-bottom"> Información </h4><div class="uk-form-row"><ul class="md-list md-list-addon"><li><div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE877;</i></div><div class="md-list-content"><span class="md-list-heading">'+msg9.datos[i].tblentregaproducto_status+' </span><span class="uk-text-small uk-text-muted">Status del Pedido</span></div></li><li><div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE002;</i></div><div class="md-list-content"><span class="md-list-heading">'+msg9.datos[i].tblentregaproducto_descripcion+' </span><span class="uk-text-small uk-text-muted">Observacion de Entrega</span></div></li></ul></div></div><div class="uk-width-large-1-2"><h4 class="heading_c uk-margin-small-bottom">Evidencias de Entrega </h4><div class="uk-grid uk-grid-medium" data-uk-grid-margin><div class="uk-width-large-1-2" id="imgcomplem1"><div class="md-card-head uk-text-center uk-position-relative"><div class="md-card-head uk-text-center uk-position-relative"><img class="md-card-head-img" src="assets/img/evidencias/'+msg9.datos[i].tblentregaproducto_srcimgevidencia1+'" /></div></div></div><div class="uk-width-large-1-2" id="imgcomplem2"><div class="md-card-head uk-text-center uk-position-relative"><img class="md-card-head-img" src="assets/img/evidencias/'+msg9.datos[i].tblentregaproducto_srcimgevidencia2+'" /></div></div></div></div></div></div></div></div></div>');


      });


      if(productosComplem){
      $.ajax({
        method: "POST",  
        dataType: "json",  
        url: "./../../controllers/getTblentregacomplem.php",  
        data: {solicitadoBy:solicitadoBy,idtblordencompra:idtblordencompra,idtblproveedor:idtblproveedor}})
       .done(function( msg10) {
           $.each(msg10.datos, function(i,item){
             $("#imgcomplem1").append('<div class="md-card-head uk-text-center uk-position-relative" ><div class="md-card-head uk-text-center uk-position-relative"><img class="md-card-head-img" src="assets/img/evidencias/'+msg10.datos[i].tblentregacomplem_srcimgevidencia1+'" /></div></div>');                             
             $("#imgcomplem2").append('<div class="md-card-head uk-text-center uk-position-relative" ><div class="md-card-head uk-text-center uk-position-relative"><img class="md-card-head-img" src="assets/img/evidencias/'+msg10.datos[i].tblentregacomplem_srcimgevidencia2+'" /></div></div>');
           });
        })
        .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
        .always(function(){  console.log("always");  });
     }
    }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  }).always(function(){  console.log("always");  });





  }

  if(idTabla==tabla_OrdenesHistorial){
  console.log("TABLA ORDENES HISTORIAL");

  $.ajax({//se obtiene datos del producto
    method: "POST",  
    dataType: "json",  
    url: "./../../controllers/getTblentregaproducto.php",  
    data: {solicitadoBy:solicitadoBy,idtblordencompra:idtblordencompra,idtblproveedor:idtblproveedor}})
    .done(function( msg9) {
      console.log("ENTREGA");
      console.log(msg9);
      $.each(msg9.datos, function(i,item3){
      //cambio de formato de fechas
      fchpagoproveedor= msg9.datos[i].tblentregaproducto_fchpagoproveedor;
      fchpagoproveedor = fchpagoproveedor.split("-");
      fchpagoproveedor = fchpagoproveedor[2]+"/"+fchpagoproveedor[1]+"/"+fchpagoproveedor[0];


      //se añade al popupdedetalleorden la visualizacion de los datos de evidencias (imgs)
      $("#entregaEvidencia").append('<div class="uk-grid uk-grid-medium" data-uk-grid-margin><div class="uk-width-1-1"><div class="md-card"><div class="md-card-toolbar"><h2 class=" uk-text-large uk-text-middle uk-text-bold">Evidencias de Orden Entregada</h2></div><div class="md-card-content large-padding"><div class="uk-grid "></div><div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin><div class="uk-width-large-1-2"><h4 class="heading_c uk-margin-small-bottom"> Información </h4><div class="uk-form-row"><ul class="md-list md-list-addon"><li><div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE877;</i></div><div class="md-list-content"><span class="md-list-heading">'+msg9.datos[i].tblentregaproducto_status+' </span><span class="uk-text-small uk-text-muted">Status del Pedido</span></div></li><li><div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE8DF;</i></div><div class="md-list-content"><span class="md-list-heading">'+fchpagoproveedor+' </span><span class="uk-text-small uk-text-muted">Fecha de Deposito </span></div></li><li><div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE002;</i></div><div class="md-list-content"><span class="md-list-heading uk-float-left" id="statusdeposito"></span><br/><span class="uk-text-small uk-text-muted">Status de Deposito</span></div></li></ul></div></div><div class="uk-width-large-1-2"><h4 class="heading_c uk-margin-small-bottom">Evidencias de Entrega </h4><div class="uk-grid uk-grid-medium" data-uk-grid-margin><div class="uk-width-large-1-2" id="imgcomplem1"><div class="md-card-head uk-text-center uk-position-relative"><div class="md-card-head uk-text-center uk-position-relative"><img class="md-card-head-img" src="assets/img/evidencias/'+msg9.datos[i].tblentregaproducto_srcimgevidencia1+'" /></div></div></div><div class="uk-width-large-1-2" id="imgcomplem2"><div class="md-card-head uk-text-center uk-position-relative"><img class="md-card-head-img" src="assets/img/evidencias/'+msg9.datos[i].tblentregaproducto_srcimgevidencia2+'" /></div></div></div></div></div></div></div></div></div>');

      if(msg9.datos[i].tblentregaproducto_statusdeposito!="PENDIENTE"){
        $('#statusdeposito').append('<span class="uk-badge uk-badge-success">'+msg9.datos[i].tblentregaproducto_statusdeposito+'</span>');
      }else {$('#statusdeposito').append('<span class="uk-badge uk-badge-warning">'+msg9.datos[i].tblentregaproducto_statusdeposito+'</span>');}


      });


      if(productosComplem){
      $.ajax({
        method: "POST",  
        dataType: "json",  
        url: "./../../controllers/getTblentregacomplem.php",  
        data: {solicitadoBy:solicitadoBy,idtblordencompra:idtblordencompra,idtblproveedor:idtblproveedor}})
       .done(function( msg10) {
           $.each(msg10.datos, function(i,item){
             $("#imgcomplem1").append('<div class="md-card-head uk-text-center uk-position-relative" ><div class="md-card-head uk-text-center uk-position-relative"><img class="md-card-head-img" src="assets/img/evidencias/'+msg10.datos[i].tblentregacomplem_srcimgevidencia1+'" /></div></div>');                             
             $("#imgcomplem2").append('<div class="md-card-head uk-text-center uk-position-relative" ><div class="md-card-head uk-text-center uk-position-relative"><img class="md-card-head-img" src="assets/img/evidencias/'+msg10.datos[i].tblentregacomplem_srcimgevidencia2+'" /></div></div>');
           });
        })
        .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
        .always(function(){  console.log("always");  });
     }
    }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  }).always(function(){  console.log("always");  });
  }

}

//funcion para marcar el status de la orden (BOTON)
function botonMarcarStatus(idtblordencompra){
  
  $('#formevidenciaProductos')[0].reset();
 
  $("#li_descripcionPendiente").hide();
  $("#evidencia1Producto").css('color','black');
  $("#evidencia2Producto").css('color','black');
 
  $("#entrega_statusentrega").removeClass("md-input-danger");

 totalProductos=0;
 totalProductosComplem=0;

  $("#entrega_idorden").text(idtblordencompra);
//console.log('idorden:'+idtblordencompra);

 
  $.ajax({//se obtiene la fecha 
    method: "POST",  
    dataType: "json",  
    url: "./../../controllers/getFecha.php",  
    data: {solicitadoBy:"WEB"}})
    .done(function( msgz) {
		console.log('h');
      fch= msgz.datos;
     fch = fch.split("/");
      fchen = fch[2]+"/"+fch[1]+"/"+fch[0];
      $("#entrega_fchentrega").text(fchen);
    }).fail(function( jqXHR, textStatus ) {  console.log("get fecha boton estatus fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  }).always(function(){  console.log("always");  });


    $.ajax({//se obtiene la fecha 
    method: "POST",  
    dataType: "json",  
    url: "./../../controllers/getAllTblcarritoproductByTblordencompra.php",  
    data: {solicitadoBy:solicitadoBy,idtblordencompra:idtblordencompra,idtblproveedor:idtblproveedor}})
    .done(function( msg) {
      $.each(msg.datos, function(i,item){
        totalProductos = totalProductos + parseInt(msg.datos[i].tblcarritoproduct_cantidad); 
      });
       $("#entrega_noproductpedido").text(totalProductos);
    }).fail(function( jqXHR, textStatus ) {  console.log("fail ordencompra jqXHR::"+jqXHR+" textStatus::"+textStatus);  }).always(function(){  console.log("always");  });

   
	  
	  
}

//funcion para ingresar los registros del status de la orden 
function marcarordenEntregada(){

  
  var boleanVerificacionProductos= false; 
  var boleanStatus= false;
  var boleanDescripcioStatus=false;

  //obtiene los datos que se requieren
  idorden= document.getElementById("entrega_idorden").innerHTML;
  idproveedor = idtblproveedor;
  nombreproveedor = tblproveedorNombre;
  numproductos = document.getElementById("entrega_noproductpedido").innerHTML;
  numproductosentregados = numproductos; 
  status = $("#entrega_statusentrega").val();
  fchentrega = document.getElementById("entrega_fchentrega").innerHTML;
  //fchpagoproveedor= (sumaFecha(15,fchentrega)).toString();
  statusdeposito="PENDIENTE";

  fchentrega = fchentrega.split("/");
  fchentrega = fchentrega[2]+"/"+fchentrega[1]+"/"+fchentrega[0];
 // fchpagoproveedor = fchpagoproveedor.split("/");
  //fchpagoproveedor = fchpagoproveedor[2]+"/"+fchpagoproveedor[1]+"/"+fchpagoproveedor[0];

  //Se verifica que contenga algo status 
  if(status!="null"){
    boleanStatus=true;
    $("#entrega_statusentrega").removeClass("md-input-danger");
  }else{
    boleanStatus=false;
    $("#entrega_statusentrega").addClass( "md-input-danger");
  }

  //Indicador para ver que no tiene nada la imgs productos 
  if(($("#img1Productv1").val()!="")){
    $("#evidencia1Producto").css('color','black');
  }else {
    $("#evidencia1Producto").css('color','red');
  }

  if(($("#img2Productv1").val()!="")){
    $("#evidencia2Producto").css('color','black');
  }else {
    $("#evidencia2Producto").css('color','red');
  }


  //se verifica la descripcion si esta activa 
  if($("#li_descripcionPendiente").is(':visible')){
     descripcionPen = $("#descripcionpendiente").val();
    if(descripcionPen!="" && !(/^\s+$/.test(descripcionPen)) ){
      boleanDescripcioStatus=true; 
      $("#descripcionpendiente").removeClass("md-input-danger");
    }else {boleanStatus=false;
      $("#descripcionpendiente").addClass("md-input-danger");
    }
  }else{
    boleanDescripcioStatus=true;
    descripcionPen="";
  }
  
   if(($("#img1Productv1").val()!="") && ($("#img2Productv1").val()!="")){
  //se valida que tenga datos los campos del formulario productos
    boleanVerificacionProductos = true;
    	
 
 }
 
 else{
  boleanVerificacionProductos = false;
} 


 //si cumple la validacion 
 //if(boleanVerificacionComplementarios && boleanVerificacionProductos && boleanStatus && boleanDescripcioStatus){
if(boleanVerificacionProductos && boleanStatus && boleanDescripcioStatus){

  UIkit.modal("#popup_spinner_registrandoOrdenCot", {bgclose: false}).show();
  UIkit.modal("#popup_marcarorden").hide();
  UIkit.modal("#detalleOrdenPendiente").hide();


  $.ajax({method: "POST", dataType: "json", url: "./../../controllers/setCheckTblentregaproducto.php",  
    data: {solicitadoBy:solicitadoBy,idtblordencompra:idorden,idtblproveedor:idtblproveedor}})
      .done(function(msgEntregaproducto) {   

        if(msgEntregaproducto.success==0){
          
            srcimg1=$("#img1Productv1").val().replace(/C:\\fakepath\\/i, '');
            srcimg1='Evid1_NumOrden'+idorden+'_'+'p'+idtblproveedor+'_'+srcimg1;
            srcimg2=$("#img2Productv1").val().replace(/C:\\fakepath\\/i, '');
            srcimg2='Evid2_NumOrden'+idorden+'_'+'p'+idtblproveedor+'_'+srcimg2;
            var formData = new FormData($("#formevidenciaProductos")[0]);
            formData.append("version", 'v1');
            formData.append("img1Product", srcimg1);
            formData.append("img2Product", srcimg2);


            $.ajax({ //registrar de tblentregaproduct 
              method: "POST",
              dataType: "json",   
              url: "./../../controllers/setTblentregaproducto.php",  
              data: {solicitadoBy:solicitadoBy,nombreproveedor:nombreproveedor,fchentre:fchentrega,
			  numproductpedidos:numproductos,numproductentregados:numproductosentregados,status:status,
			  descripcion:descripcionPen,statusdeposito:statusdeposito,
			  srcimg1:srcimg1,srcimg2:srcimg2,emailcreo:emailproveedor,idtblordencompra:idorden,
			  idtblproveedor:idproveedor}}) //fchpagoproveedor:fchpagoproveedor,
              .done(function( datos ){
                console.log('datos: '+datos);
                if(parseInt(datos.success)==1){
                // si se guarda con exito se guardan las imagenes
                    $.ajax({ method: "POST", url: './phps/uploadImgEvidencias.php', 
					data: formData,contentType: false,processData: false,})
                    .done(function(datos){//img guardadas con exito
                        if(datos=="success"){
							
					UIkit.modal("#popup_spinner_registrandoOrdenCot").hide();              
                    UIkit.modal.alert('Exitoso, Orden No. '+idorden+' marcada con diferente status');

                                      $("#tblordenes_item").empty();
                                      $("#tblordenespendiente_item").empty();
                                      $("#tblordeneshistorial_item").empty();
                                      mostrarListaOrdenes();
					
                        }else{//sin exito el guardar las fotos, elimina el registro de tblentregaproducet
                           $.ajax({method: "POST", dataType: "json", url: "./../../controllers/setDeleteTblentregaproducto.php",  
                             data: {solicitadoBy:solicitadoBy,idtblordencompra:idorden,idtblproveedor:idtblproveedor}})
                            .done(function(msg7) {   
                             }).fail(function( jqXHR, textStatus ) {  console.log("elimina el registro de tblentregaproducetfail jqXHR::"+jqXHR+" textStatus::"+textStatus);}).always(function(){  console.log("always");  });
                            UIkit.modal.alert(datos);
                        }
                    }).fail(function( jqXHR, textStatus ) {  console.log("no guardo imagenes fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  }).always(function(){  console.log("always"); });
               
			   }else{
                 UIkit.modal("#popup_spinner_registrandoOrdenCot").hide();  
                 UIkit.modal.alert('Error Vuelva Intentarlo no fue uno');
                }
                

              }).fail(function( jqXHR, textStatus ) {  console.log("registrar de tblentregaproduct fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  }).always(function(){  console.log("always"); });


        }else if(msgEntregaproducto.success==1){
          UIkit.modal("#popup_spinner_registrandoOrdenCot").hide();
          UIkit.modal.alert('Orden No. '+idorden+' fue marcada con status diferente, cargue de nuevo la página. ');
        }else{
          UIkit.modal("#popup_spinner_registrandoOrdenCot").hide();
          UIkit.modal.alert("Error Vuelva Intentarlo ni 0 y 1");
        }

        
        }).fail(function( jqXHR, textStatus ) {  console.log(" setCheckTblentregaproducto fail jqXHR::"+jqXHR+" textStatus::"+textStatus);}).always(function(){  console.log("always");  });


 }else{UIkit.modal.alert('Verifique la Información o Complete los campos requeridos'); }

}

//funcion para modificar el status dela orden (LLENAR POP)
function modificarStatus(idtblordencompra){

  $('#formevidenciaProductos_modif')[0].reset();  
  $("#evidencia1Productov2").css('color','black');
  $("#evidencia2Productov2").css('color','black');
 
  
       
 $.ajax({//se obtiene la fecha  hola
    method: "POST",  
    dataType: "json",  
    url: "./../../controllers/getFecha.php",  
    data: {solicitadoBy:"WEB"}})
    .done(function( msg9) {
		//fchen= msg9.datos;
      fch= msg9.datos;	
      fch = fch.split("/");
      fchen = fch[2]+"/"+fch[1]+"/"+fch[0];
      $("#entregamodif_fchentrega").text(fchen);
    }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  }).always(function(){  console.log("always");  });

   $.ajax({
    method: "POST",  
    dataType: "json",  
    url: "./../../controllers/getTblentregaproducto.php",  
    data: {solicitadoBy:solicitadoBy,idtblordencompra:idtblordencompra,idtblproveedor:idtblproveedor}})
      .done(function(msg7) {
        console.log(msg7);
      $.each(msg7.datos, function(i,item){
        
          $("#entregamodif_idorden").text(item.tblentregaproducto_idtblordencompra);    
          $("#entregamodif_noproductpedido").text(item.tblentregaproducto_numproductpedidos);
          $("#entregamodif_statusentrega").val(item.tblentregaproducto_status);

      });
         
      }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);}).always(function(){  console.log("always");  });


     
		  }

//funcion para enviar las modificaciones del status de la orden
function marcarordenEntregadaModif(){
 
  var boleanVerificacionProductos= false;  
  var boleanStatus= false;

  //obtiene los datos que se requieren
  idorden= document.getElementById("entregamodif_idorden").innerHTML;
  idproveedor = idtblproveedor;
  nombreproveedor = tblproveedorNombre;
  numproductos = document.getElementById("entregamodif_noproductpedido").innerHTML;
  numproductosentregados = numproductos; 
  status = $("#entregamodif_statusentrega").val();
  fchentrega = document.getElementById("entregamodif_fchentrega").innerHTML;
  //fchpagoproveedor= (sumaFecha(15,fchentrega)).toString();
  statusdeposito ="PENDIENTE";

  fchentrega = fchentrega.split("/");
  fchentrega = fchentrega[2]+"/"+fchentrega[1]+"/"+fchentrega[0];
  //fchpagoproveedor = fchpagoproveedor.split("/");
  //fchpagoproveedor = fchpagoproveedor[2]+"/"+fchpagoproveedor[1]+"/"+fchpagoproveedor[0];


  //Se verifica que contenga algo status 
  if(status!="null"){boleanStatus=true;}else {boleanStatus=false;}

  //Indicador para ver que no tiene nada la imgs productos 
  if(($("#img1Productv2").val()!="")){
    $("#evidencia1Productov2").css('color','black');
  }else {
    $("#evidencia1Productov2").css('color','red');
  }

  if(($("#img2Productv2").val()!="")){
    $("#evidencia2Productov2").css('color','black');
  }else {
    $("#evidencia2Productov2").css('color','red');
  }
  
   

  if(($("#img1Productv2").val()!="") && ($("#img2Productv2").val()!="")){
  //se valida que tenga datos los campos del formulario productos
    boleanVerificacionProductos = true;   
 }else boleanVerificacionProductos = false;

   //if(boleanVerificacionComplementarios && boleanVerificacionProductos && boleanStatus){
	 if(boleanVerificacionProductos && boleanStatus){

  srcimg1=$("#img1Productv2").val().replace(/C:\\fakepath\\/i, '');
  srcimg1='Evid1_NumOrden'+idorden+'_'+'p'+idtblproveedor+'_'+srcimg1;
  srcimg2=$("#img2Productv2").val().replace(/C:\\fakepath\\/i, '');
  srcimg2='Evid2_NumOrden'+idorden+'_'+'p'+idtblproveedor+'_'+srcimg2;
  var formDataModif = new FormData($("#formevidenciaProductos_modif")[0]);
  formDataModif.append("version", 'v2');
  formDataModif.append("img1Product", srcimg1);
  formDataModif.append("img2Product", srcimg2);

    UIkit.modal("#popupmodif_marcarorden").hide();
    UIkit.modal("#detalleOrdenPendiente").hide();
    UIkit.modal("#popup_spinner_registrandoOrdenCot", {bgclose: false}).show();


    $.ajax({ //registrar de tblentregaproduct 
      method: "POST", 
      dataType: "json",  
      url: "./../../controllers/setUpdateTblentregaproducto.php",  
      data: {solicitadoBy:solicitadoBy,nombreproveedor:nombreproveedor,fchentrega:fchentrega,
	  numproductpedidos:numproductos,numproductentregados:numproductosentregados,status:status,
	  statusdeposito:statusdeposito,srcimg1:srcimg1,srcimg2:srcimg2,
	  emailmodifico:emailproveedor,idtblordencompra:idorden,idtblproveedor:idproveedor,emailmodificohis:email,
	  apellido:apellido, nivel:nivel}})  //fchpagoproveedor:fchpagoproveedor,
      .done(function(datos){
        if(parseInt(datos.success)==1){
			console.log('guu');
        // si se guarda con exito se guardan las imagenes
            $.ajax({ method: "POST", url: './phps/uploadImgEvidencias.php', 
			data: formDataModif,contentType: false,processData: false,})
            .done(function(datos){//img guardadas con exito
                if(datos=="success"){ 
				
				UIkit.modal("#popup_spinner_registrandoOrdenCot").hide();
                    UIkit.modal.alert('Exitoso, Orden No. '+idorden+' marcada con diferente status');

                    $("#tblordenes_item").empty();
                    $("#tblordenespendiente_item").empty();
                    $("#tblordeneshistorial_item").empty();
                    mostrarListaOrdenes();
				
                
                }else{//sin exito el guardar las fotos, elimina el registro de tblentregaproducet
                   $.ajax({method: "POST", dataType: "json", 
                    url: "./../../controllers/setUpdateTblentregaproducto.php",
                    data: {solicitadoBy:solicitadoBy,nombreproveedor:nombreproveedor,fchentrega:fchentrega,
					numproductpedidos:numproductos,numproductentregados:numproductosentregados,
					status:'PENDIENTE',statusdeposito:statusdeposito,
					srcimg1:'NULL',srcimg2:'NULL',emailmodifico:emailproveedor,idtblordencompra:idorden,
					idtblproveedor:idproveedor,emailmodificohis:email, apellido:apellido, nivel:nivel}})
                    .done(function(msg7) {    //fchpagoproveedor:fchpagoproveedor,
                     }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);}).always(function(){  console.log("always");  });

                    UIkit.modal("#popup_spinner_registrandoOrdenCot").hide();
                    UIkit.modal.alert(datos);
                }
            }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  }).always(function(){  console.log("always"); });
        }else{
         UIkit.modal("#popup_spinner_registrandoOrdenCot").hide(); 
         UIkit.modal.alert('Error Vuelva Intentarlo mm');
        }
        

      }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  }).always(function(){  console.log("always"); });

 }else UIkit.modal.alert('Verifique la Información o Complete los campos requeridos'); 

}


function pendienteDesc(){

  status = "PENDIENTE";

  statuspendiente = $("#entrega_statusentrega").val();

  if(statuspendiente == status){
    $("#li_descripcionPendiente").show();
  }else {$("#li_descripcionPendiente").hide();}


}

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

//funcion para llenar la tabla de cotizaciones de productos y los pops de cada orden 
function mostrarCotizaciones(){
  console.log("COTIZACIONES");
  idpopup_detalleordencotizador = "'#popup_ordencotizador'";
  $.ajax({
    method: "POST",  
    dataType: "json",  
    url: "./../../controllers/getAllTblordenescotizadorByTblcarritocotizadorByTblproveedor.php",  
    data: {solicitadoBy:solicitadoBy, idtblproveedor:idtblproveedor}})
    .done(function( msg)
      { 
        console.log("SHOW COTIZACIONES");
        console.log(msg);
        $.each(msg.datos, function(i,item)
        {

          //cambio de formato de fecha 
          fchentrega= msg.datos[i].tblcarritoproductcotizador_fchentrega;
          fchentrega = fchentrega.split("-");
          fchentrega = fchentrega[2]+"/"+fchentrega[1]+"/"+fchentrega[0];
        
        
        $("#tblcotizacionesproductos").append(  
        '<tr data-uk-modal="{target:'+idpopup_detalleordencotizador+' ,bgclose:false,modal:false}" onclick="detalleCotizacion('+msg.datos[i].idtblordencotizador+','+msg.datos[i].idtblcarritoproductcotizador+')"><td class="uk-text-center">'+msg.datos[i].idtblordencotizador+
        '</td><td class="uk-text-center">'+msg.datos[i].tblproductcotizador_nombre+
        '</td><td class="uk-text-center">'+fchentrega+
        '</td><td class="uk-text-center">'+msg.datos[i].tblevento_nombre+
        '</td><td class="uk-text-center"><span  class="uk-text-bold" id="statusCotizacion'+i+'"></span></td></tr>');
        $("#tbl_ordenesCotizador").trigger('updateAll', [true]);//actualiza tabla
        statusCotizacion(msg.datos[i].tblmotivocotizacion_idtblmotivocotizacion,i);
		inicializarPagCotiProducto();
        }); 

         

      }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  }).always(function(){  console.log("always");});

}


function statusCotizacion(idtblmotivo,x){ //Motivo de Respuesta de Cotización
  $.ajax({
    method: "POST",  
    dataType: "json",  
    url: "./../../controllers/getTblmotivocotizacion.php",  
    data: {solicitadoBy:solicitadoBy, idtblmotivocotizacion:idtblmotivo}})
    .done(function( msg)
      { 
        console.log("MotivoCotizacion");
        console.log(msg);
        $.each(msg.datos, function(i,item)
        {  
          if(item.idtblmotivocotizacion==2){
              $("#statusCotizacion"+x).text("Enviada");
          }else{$("#statusCotizacion"+x).text(item.tblmotivocotizacion_motivo);}

          $("#tbl_ordenesCotizador").trigger('updateAll', [true]);//actualiza tabla
        });
      }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  }).always(function(){  console.log("always");});
}



function detalleCotizacion(idtblordencotizador, idtblcarritoproductcotizador){

   $("#detallecotizador_idordencotizador").empty();
   $("#detallecotizador_tipoevento").empty();
   $("#detallecotizador_fchevento").empty();
   $("#detallecotizador_numinvitados").empty();
   $("#detallecotizador_nomproducto").empty();
   $("#detallecotizador_nombrecliente").empty();
   $("#detallecotizador_telef").empty();
   $("#detallecotizador_email").empty();
   $("#imgOrdenCotizador").empty();
   $("#detallecotizador_direccion").empty();
   $("#cotizacion_botondeubicacion").empty();
   $("#detallecotizador_costos").empty();
   $("#detallecotizador_enviar").empty();

   $("#motivocotizacion").removeClass( "md-input-danger" );

  $.ajax({
    method: "POST",  
    dataType: "json",  
    url: "./../../controllers/getTblordenescotizadorByTblcarritocotizador.php",  
    data: {solicitadoBy:solicitadoBy, idtblordencotizador:idtblordencotizador,idtblcarritoproductcotizador:idtblcarritoproductcotizador}})
    .done(function( msg1)
      { 
        
        console.log("ORDENCOTIZACION Detalle");
        console.log(msg1);
       $.each(msg1.datos, function(x,item)
        { 
          fchentrega= item.tblcarritoproductcotizador_fchentrega;
          fchentrega = fchentrega.split("-");
          fchentrega = fchentrega[2]+"/"+fchentrega[1]+"/"+fchentrega[0];
          
          $("#detallecotizador_idordencotizador").append('# '+item.idtblordencotizador+' Cotización<span style="display:none" id="cotizacion_idtblordencotizacion">'+item.idtblordencotizador+'</span>');
          $("#detallecotizador_tipoevento").append('<span class="md-list-heading">'+item.tblevento_nombre+'</span><span class="uk-text-small uk-text-muted">Tipo de Evento</span>');
          $("#detallecotizador_fchevento").append('<span class="md-list-heading" id="cotizacion_fchevento">'+fchentrega+'</span><span class="uk-text-small uk-text-muted">Fecha de Evento</span>');
          $("#detallecotizador_numinvitados").append('<span class="md-list-heading" id="cotizacion_numpersonas">'+item.tblcarritoproductcotizador_numpersonas+'</span><span class="uk-text-small uk-text-muted"># Número de Invitados</span>');
          $("#detallecotizador_nomproducto").append('<span class="md-list-heading">'+item.tblproductcotizador_nombre+'</span><span class="uk-text-small uk-text-muted">Nombre Producto</span><span style="display:none" id="cotizacion_idproductcotizador">'+item.tblproductcotizador_idtblproductcotizador+'</span>');
          $("#detallecotizador_nombrecliente").append('<span class="md-list-heading">'+item.tblordencotizador_nombre+'</span><span class="uk-text-small uk-text-muted">Nombre Completo</span>');
          $("#detallecotizador_email").append('<span class="md-list-heading">'+item.tblordencotizador_email+'</span><span class="uk-text-small uk-text-muted">Email</span>');
          $("#detallecotizador_telef").append('<span class="md-list-heading">'+item.tblordencotizador_telefono+'</span><span class="uk-text-small uk-text-muted">Telefono</span>');

          if(item.tblcarritoproductcotizador_srcimg!=null){
           $("#imgOrdenCotizador").append('<li><img src="./../assests_general/productos/imgcotizadornuevo/'+item.tblcarritoproductcotizador_srcimg+'" alt="" /></li><span style="display:none" id="cotizacion_srimg">'+item.tblcarritoproductcotizador_srcimg+'</span>');
         }else {
          $("#imgOrdenCotizador").append('<span style="display:none" id="cotizacion_srimg"></span>');
         }

         $("#detallecotizador_direccion").append('<span class="md-list-heading" id="dirCompletaCotizacion">'+item.tblordencotizador_pais+", "+item.tblordencotizador_ciudad+", "+item.tblordencotizador_direccion+'</span><span class="uk-text-small uk-text-muted">Dirección de Evento</span>');

         $("#cotizacion_botondeubicacion").append('<button class="md-btn md-btn-primary md-btn-block md-btn-wave-light" type="button" onclick="mapaGeo('+2+','+idmapaCotizaciones+')" data-uk-modal="{target:'+"'#mapa'"+',modal: false,bgclose:false}"> Ubicacion de Entrega en Mapa</button>');

        if(item.tblmotivocotizacion_idtblmotivocotizacion==1){
          $("#motivo").show();
          $("#detallecotizador_costos").append('<li><div class="md-list-addon-element" ><i class="md-list-addon-icon material-icons">&#xE263;</i></div><div class="md-list-content"><input type="number" step="any" class="md-input uk-text-center" placeholder="Precio de Cotización con Entrega en Tienda" id="cotizacion_costotienda" min="1"/></div></li><li><div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE263;</i></div><div class="md-list-content"><input type="number" class="md-input uk-text-center" placeholder="Precio de Cotización con Servicio a Domicilio" id="cotizacion_costodomicilio" min="1" /></div>');
          $("#detallecotizador_costos").hide();
          $("#detallecotizador_enviar").append('<button type="button" class="md-btn md-btn-flat md-btn-flat-primary" onclick="enviarCotizacion('+idtblcarritoproductcotizador+')" >Enviar Respuesta </button>');
        
      }else{

        $("#motivo").hide();
        $("#detallecotizador_costos").show();

        if(parseInt(item.tblcarritoproductcotizador_costotienda)<1 && parseInt(item.tblcarritoproductcotizador_costodomicilio)<1){

          $.ajax({
            method: "POST",  
            dataType: "json",  
            url: "./../../controllers/getTblmotivocotizacion.php",  
            data: {solicitadoBy:solicitadoBy, idtblmotivocotizacion:item.tblmotivocotizacion_idtblmotivocotizacion}})
            .done(function( msg3)
              { 
                console.log("MotivoCotizacion2");
                console.log(msg3);
                $.each(msg3.datos, function(i,item)
                {  
                  $("#detallecotizador_costos").append('<li><div class="md-list-addon-element" ><i class="md-list-addon-icon material-icons">&#xE263;</i></div><div class="md-list-content"><span class="md-list-heading">'+item.tblmotivocotizacion_motivo+'</span><span class="uk-text-small uk-text-muted">Responder</span></div></li>');
                });
              }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  }).always(function(){  console.log("always");});

        }else{
          $("#detallecotizador_costos").append('<li><div class="md-list-addon-element" ><i class="md-list-addon-icon material-icons">&#xE263;</i></div><div class="md-list-content"><span class="md-list-heading">'+item.tblcarritoproductcotizador_costotienda+'</span><span class="uk-text-small uk-text-muted">Costo con Servicio en Tienda</span></div></li><li><div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE263;</i></div><div class="md-list-content"><span class="md-list-heading">'+item.tblcarritoproductcotizador_costodomicilio+'</span><span class="uk-text-small uk-text-muted">Costo con Servicio a Domicilio</span></div></li>');
        }
      }
    });
  }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  }).always(function(){  console.log("always");});
}

function selectMotivoCotizacion(){

   $.ajax({
    method: "POST",  
    dataType: "json",  
    url: "./../../controllers/getAllTblmotivocotizacion.php",  
    data: {solicitadoBy:solicitadoBy}})
    .done(function( msg)
      { 
        console.log("TIPOSMotivoCotizacion");
        console.log(msg);
        $.each(msg.datos, function(i,item)
        {  
          if(item.idtblmotivocotizacion!=1){
            //popdecotizaciondeproducto
          $("#motivocotizacion").append('<option value="' + item.idtblmotivocotizacion + '">' + item.
            tblmotivocotizacion_motivo + '</option>');
          //popdecotizaciondeproductonuevo
          $("#motivocotizacionNuevo").append('<option value="' + item.idtblmotivocotizacion + '">' + item.tblmotivocotizacion_motivo + '</option>');
          }
        });
      }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  }).always(function(){  console.log("always");});

}

function activarCamposCostos(){

  status = $("#motivocotizacion").val();
  if(status==2){
    $("#detallecotizador_costos").show();
  }else {$("#detallecotizador_costos").hide();}

}

function activarCamposCostosProdNuevo(){

  status = $("#motivocotizacionNuevo").val();
  if(status==2){
    $("#detallecotizadorproductnuevo_costos").show();
  }else {$("#detallecotizadorproductnuevo_costos").hide();}

}

function enviarCotizacion(idtblcarritoproductcotizador){
  console.log("ENVIAR COTIZACIONES");

  $("#motivocotizacion").removeClass( "md-input-danger" );

  status = $("#motivocotizacion").val();

  if(status!="null"){
    
    if(status==2){
        idtblcarritoproductcotizador = idtblcarritoproductcotizador;
        numpersonas = document.getElementById("cotizacion_numpersonas").innerHTML;
        fchaevento = document.getElementById("cotizacion_fchevento").innerHTML;
        fchaevento = fchaevento.split("/");
        fchaevento = fchaevento[2]+"-"+fchaevento[1]+"-"+fchaevento[0];
        srcimg = document.getElementById("cotizacion_srimg").innerHTML;
        idordencotizador= document.getElementById("cotizacion_idtblordencotizacion").innerHTML;
        idproductcotizador= document.getElementById("cotizacion_idproductcotizador").innerHTML;
        emailmodif= emailproveedor;
        costotienda = $("#cotizacion_costotienda").val();
        costodomicilio = $("#cotizacion_costodomicilio").val();
         //validacion de valores
        if((costotienda!="")){
          $("#cotizacion_costotienda").removeClass( "md-input-danger" );
        }else $("#cotizacion_costotienda").addClass( "md-input-danger" );
        if((costodomicilio!="")){
          $("#cotizacion_costodomicilio").removeClass( "md-input-danger" );
        }else $("#cotizacion_costodomicilio").addClass( "md-input-danger" );

        if((costotienda!="") || (costodomicilio!="")){

          UIkit.modal.confirm("* Precio con Servicio en Tienda: $"+costotienda+"<br/>* Precio con Servicio a Domicilio: $"+costodomicilio+"<br/><br/> Si los precios de la cotizacion son correctos presione Ok", function(){

            UIkit.modal("#popup_ordencotizador").hide();
            UIkit.modal("#popup_spinner_registrandoCot2", {bgclose: false}).show();

            $.ajax({ //actualiza el registro con los costos de la cotizacion 
              method: "POST",dataType: "json",url: "./../../controllers/setUpdateTblcarritoproductcotizador.php", data: {solicitadoBy:solicitadoBy, idtblcarritoproductcotizador:idtblcarritoproductcotizador, numpersonas:numpersonas,fchentrega:fchaevento, srcimgproducto:srcimg, idtblordencotizador:idordencotizador, idtblproductcotizador:idproductcotizador, costotienda:costotienda, costodomicilio:costodomicilio, emailmodifico:emailmodif,idtblmotivocotizacion:status}})
                  .done(function(datos){
                      if(parseInt(datos.success)==1){
                        UIkit.modal("#popup_spinner_registrandoCot2").hide();
                        UIkit.modal.alert('Exitoso, Cotizacion Enviada');
                         $('#datoscotizador')[0].reset();
                          $("#tblcotizacionesproductos").empty();
                          $("#tblcotizacionesproductosnuevos").empty();
                          mostrarCotizacionesProductosNuevos();
                          mostrarCotizaciones();
                      }else {
                        UIkit.modal("#popup_spinner_registrandoCot2").hide();
                         UIkit.modal.alert('Error Vuelva Intenetarlo mas Tarde');         
                      }
            }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);}).always(function(){  console.log("always");});


           });

        }else{
          UIkit.modal.alert('Ingrese el Precio de la Cotización de al menos una Servicio');
        }

    }else{

        idtblcarritoproductcotizador = idtblcarritoproductcotizador;
        numpersonas = document.getElementById("cotizacion_numpersonas").innerHTML;
        fchaevento = document.getElementById("cotizacion_fchevento").innerHTML;
        fchaevento = fchaevento.split("/");
        fchaevento = fchaevento[2]+"-"+fchaevento[1]+"-"+fchaevento[0];
        srcimg = document.getElementById("cotizacion_srimg").innerHTML;
        idordencotizador= document.getElementById("cotizacion_idtblordencotizacion").innerHTML;
        idproductcotizador= document.getElementById("cotizacion_idproductcotizador").innerHTML;
        emailmodif= emailproveedor;
        costotienda=null;
        costodomicilio=null;

         UIkit.modal("#popup_ordencotizador").hide();
        UIkit.modal("#popup_spinner_registrandoCot2", {bgclose: false}).show();

         $.ajax({ //actualiza el registro con los costos de la cotizacion 
              method: "POST",dataType: "json",url: "./../../controllers/setUpdateTblcarritoproductcotizador.php", data: {solicitadoBy:solicitadoBy, idtblcarritoproductcotizador:idtblcarritoproductcotizador, numpersonas:numpersonas,fchentrega:fchaevento, srcimgproducto:srcimg, idtblordencotizador:idordencotizador, idtblproductcotizador:idproductcotizador, costotienda:costotienda,costodomicilio:costodomicilio,emailmodifico:emailmodif,idtblmotivocotizacion:status, nombreproveedor:nombre, apellido:apellido, nivel:nivel}})
                  .done(function(datos){
                      if(parseInt(datos.success)==1){
                        UIkit.modal("#popup_spinner_registrandoCot2").hide();
                        UIkit.modal.alert('Exitoso, Cotizacion Enviada');
                         $('#datoscotizador')[0].reset();
                          $("#tblcotizacionesproductos").empty();
                          $("#tblcotizacionesproductosnuevos").empty();
                          mostrarCotizacionesProductosNuevos();
                          mostrarCotizaciones();
                      }else {
                         UIkit.modal.alert('Error Vuelva Intenetarlo mas Tarde');         
                      }
            }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);}).always(function(){  console.log("always");});
    }

  }else{
    UIkit.modal.alert('Seleccione una respuesta a Cotización'); 
    $("#motivocotizacion").addClass( "md-input-danger" );
  }
}

function mostrarCotizacionesProductosNuevos(){

  idpopup_detalleordencotizador2 = "'#popup_ordencotizadorproductNuevo'";

  $.ajax({
    method: "POST",  
    dataType: "json",  
    url: "./../../controllers/getAllTblcarritoproductnuevcotiza2.php",  
    data: {solicitadoBy:solicitadoBy}})
    .done(function( msg)
    {

      console.log("COTIZACIONES NUEVAS");
      console.log(msg);

      $.each(msg.datos, function(i,item){ 

      idtblcarritoproductnuevocotizador=msg.datos[i].idtblcarritoproductnuevcotiza;

      fchentrega= msg.datos[i].tblcarritoproductnuevcotiza_fchentrega ;
      fchentrega = fchentrega.split("-");
      fchentrega = fchentrega[2]+"/"+fchentrega[1]+"/"+fchentrega[0];

      
      $("#tblcotizacionesproductosnuevos").append(
        '<tr data-uk-modal="{target:'+idpopup_detalleordencotizador2+' ,bgclose:false,modal:false}" onclick="detalleCtizacionProductNuevo('+msg.datos[i].tblordencotizador_idtblordencotizador+','+msg.datos[i].idtblcarritoproductnuevcotiza+')"><td class="uk-text-center">'+msg.datos[i].tblordencotizador_idtblordencotizador+
        '</td><td class="uk-text-center">'+fchentrega+
        '</td><td class="uk-text-center">'+msg.datos[i].tblcarritoproductnuevcotiza_tipodeevento+
        '<td class="uk-text-center uk-text-bold" id="statusCotizacionNuevo'+i+'"></td></tr>');

      $("#tbl_ordenesCotizadorNuevos").trigger('updateAll', [true]);//actualiza tabla

      statusCotizacionNuevo(idtblcarritoproductnuevocotizador,i);
	  inicializarPagCotiProNuevo();
    });


    }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);}).always(function(){  console.log("always");  });
}

function statusCotizacionNuevo(idtblcarritoproductnuevocotizador,x){ //Motivo de Respuesta de Cotización

  console.log("STATAS DE COTIZACION NUEVA  ");
  $.ajax({
    method: "POST",  
    dataType: "json",  
    url: "./../../controllers/getTblcostocotizacionproductnuevo.php",  
    data: {solicitadoBy:solicitadoBy, idtblcarritoproductnuevocotizador:idtblcarritoproductnuevocotizador,idtblproveedor:idtblproveedor}})
    .done(function( msg)
      { 
        console.log(msg);

        if(msg.success==1){

          $.each(msg.datos, function(i,item)
        {  

          idtblmotivo2  = item.tblmotivocotizacion_idtblmotivocotizacion;
          $.ajax({
              method: "POST",  
              dataType: "json",  
              url: "./../../controllers/getTblmotivocotizacion.php",  
              data: {solicitadoBy:solicitadoBy, idtblmotivocotizacion:idtblmotivo2}})
                .done(function( msg2)
              { 
                console.log(msg2);
                $.each(msg2.datos, function(z,item2)
                {  
                  if(item2.idtblmotivocotizacion==2){
                    $("#statusCotizacionNuevo"+x).text('Enviada');
                  }else{$("#statusCotizacionNuevo"+x).text(item2.tblmotivocotizacion_motivo);}
                  
                  $("#tbl_ordenesCotizadorNuevos").trigger('updateAll', [true]);//actualiza tabla
                });
          }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  }).always(function(){  console.log("always");});

        });

        }else{
          $("#statusCotizacionNuevo"+x).text("Sin Contestar");
           $("#tbl_ordenesCotizadorNuevos").trigger('updateAll', [true]);//actualiza tabla
        }
        
      }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  }).always(function(){  console.log("always");});

     $("#tbl_ordenesCotizadorNuevos").trigger('updateAll', [true]);//actualiza tabla
}


function detalleCtizacionProductNuevo(idtblordencotizador, idtblcarritoproductnuevocotizador){
  
   $("#detallecotizadorproductnuevo_costos").hide();
   $("#detallecotizadorproductnuevo_costos").empty();
   $("#detallecotizadorproductnuevo_enviar").empty();
   $("#detallecotizadorproductnuevo_idordencotizador").empty();
   $("#detallecotizadorproductnuevo_fchevento").empty();
   $("#detallecotizadorproductnuevo_tipoevento").empty();
   $("#detallecotizadorproductnuevo_numinvitados").empty();
   $("#detallecotizadorproductnuevo_nomproducto").empty();
   $("#imgOrdenCotizadorproductnuevo").empty();
   $("#detallecotizadorproductnuevo_nombrecliente").empty();
   $("#detallecotizadorproductnuevo_email").empty();
   $("#detallecotizadorproductnuevo_telef").empty();
   $("#detallecotizadorproductnuevo_direccion").empty();
   $("#cotizacionnueva_botondeubicacion").empty();
   $("#motivocotizacionNuevo").removeClass( "md-input-danger" );

  

  $.ajax({
    method: "POST",  
    dataType: "json",  
    url: "./../../controllers/getTblcarritoproductnuevcotiza.php",  
    data: {solicitadoBy:solicitadoBy, idtblcarritoproductnuevocotizador:idtblcarritoproductnuevocotizador}})
      .done(function( msg2)
    { 
      console.log("DETALLE ORDEN COTIZADOR NEUVA ");
      console.log(msg2);
      $.each(msg2.datos, function(z,item)
      {  

        fchentrega=  item.tblcarritoproductnuevcotiza_fchentrega;
        fchentrega = fchentrega.split("-");
        fchentrega = fchentrega[2]+"/"+fchentrega[1]+"/"+fchentrega[0];

       $("#detallecotizadorproductnuevo_idordencotizador").append('#'+item.tblordencotizador_idtblordencotizador+' Cotización');
       $("#detallecotizadorproductnuevo_fchevento").append('<span class="md-list-heading">'+fchentrega+'</span><span class="uk-text-small uk-text-muted">Fecha de Evento</span>');
       $("#detallecotizadorproductnuevo_tipoevento").append('<span class="md-list-heading">'+item.tblcarritoproductnuevcotiza_tipodeevento+'</span><span class="uk-text-small uk-text-muted">Tipo de Evento</span>');
       $("#detallecotizadorproductnuevo_numinvitados").append('<span class="md-list-heading">'+item.tblcarritoproductnuevcotiza_numpersonas+'</span><span class="uk-text-small uk-text-muted"># Número de Invitados</span>');
       $("#detallecotizadorproductnuevo_nomproducto").append('<span class="md-list-heading">'+item.tblcarritoproductnuevcotiza_sabores+'</span><span class="uk-text-small uk-text-muted">Sabores</span><span class="md-list-heading">'+item.tblcarritoproductnuevcotiza_comentarios  +'</span><span class="uk-text-small uk-text-muted">Comentarios</span>');
       $("#imgOrdenCotizadorproductnuevo").append('<div><img src="./../assests_general/productos/imgcotizadornuevo/'+item.tblcarritoproductnuevcotiza_srcimg +'" alt="" /></div>');
      });
  }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  }).always(function(){  console.log("always");});

  console.log("datos de cotizacion nueva ");
  $.ajax({
      method: "POST",  
      dataType: "json",  
      url: "./../../controllers/getTblordencotizador.php",  
      data: {solicitadoBy:solicitadoBy, idtblordencotizador:idtblordencotizador}})
        .done(function(msg3)
      { 
        console.log(msg3);
        $.each(msg3.datos, function(x,item2)
        {  
          $("#detallecotizadorproductnuevo_nombrecliente").append('<span class="md-list-heading">'+item2.tblordencotizador_nombre+'</span><span class="uk-text-small uk-text-muted">Nombre Completo</span>');
          $("#detallecotizadorproductnuevo_email").append('<span class="md-list-heading">'+item2.tblordencotizador_email+'</span><span class="uk-text-small uk-text-muted">Email</span>');
          $("#detallecotizadorproductnuevo_telef").append('<span class="md-list-heading">'+item2.tblordencotizador_telefono+'</span><span class="uk-text-small uk-text-muted">Telefono</span>');
          $("#detallecotizadorproductnuevo_direccion").append('<span class="md-list-heading" id="dirCompletaCotizacionNueva">'+item2.tblordencotizador_pais+", "+item2.tblordencotizador_ciudad+", "+item2.tblordencotizador_direccion+'</span><span class="uk-text-small uk-text-muted">Dirección de Evento</span>');
          $("#cotizacionnueva_botondeubicacion").append('<button class="md-btn md-btn-primary md-btn-block md-btn-wave-light" type="button"  data-uk-modal="{target:'+"'#mapa'"+',modal: false,bgclose:false}" onclick="mapaGeo('+3+','+idmapaCotizacionesNuevas+')"> Ubicacion de Entrega en Mapa</button>');
        });
  }).fail(function( jqXHR, textStatus ) {console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  }).always(function(){console.log("always");});


console.log("datos de status de cotizacion  ");
  $.ajax({
    method: "POST",  
    dataType: "json",  
    url: "./../../controllers/getTblcostocotizacionproductnuevo.php",  
    data: {solicitadoBy:solicitadoBy, idtblcarritoproductnuevocotizador:idtblcarritoproductnuevocotizador,idtblproveedor:idtblproveedor}})
    .done(function( msg)
      { 
        console.log("COSTOS_PRODUCTNUEVO");
        console.log(msg);

        if(msg.success==1){
          $.each(msg.datos, function(i,item){  
             idtblmotivo2  = item.tblmotivocotizacion_idtblmotivocotizacion;

              if(idtblmotivo2==2){
                $("#motivocotizacionNuevo").hide();
                $("#detallecotizadorproductnuevo_costos").append('<li><div class="md-list-addon-element" ><i class="md-list-addon-icon material-icons">&#xE263;</i></div><div class="md-list-content"><span class="md-list-heading">'+item.tblcostocotizacionproductnuevo_costotienda+'</span><span class="uk-text-small uk-text-muted">Costo con Servicio en Tienda</span></div></li><li><div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE263;</i></div><div class="md-list-content"><span class="md-list-heading">'+item.tblcostocotizacionproductnuevo_costodomicilio+'</span><span class="uk-text-small uk-text-muted">Costo con Servicio a Domicilio</span></div></li>');
                $("#detallecotizadorproductnuevo_costos").show();

              }else{
                $.ajax({
                  method: "POST",  
                  dataType: "json",  
                  url: "./../../controllers/getTblmotivocotizacion.php",  
                  data: {solicitadoBy:solicitadoBy, idtblmotivocotizacion:idtblmotivo2}})
                    .done(function( msg4)
                  { 
                    console.log(msg4);
                    $.each(msg4.datos, function(z,item4)
                    {  
                      $("#motivocotizacionNuevo").hide();
                       $("#detallecotizadorproductnuevo_costos").append('<li><div class="md-list-addon-element" ><i class="md-list-addon-icon material-icons">&#xE263;</i></div><div class="md-list-content"><span class="md-list-heading">'+item4.tblmotivocotizacion_motivo+'</span><span class="uk-text-small uk-text-muted">Costo con Servicio en Tienda</span></div></li>');
                       $("#detallecotizadorproductnuevo_costos").show();
                    });
                }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  }).always(function(){  console.log("always");});
              }
          });
        }else{
          $("#motivocotizacionNuevo").show();
          $("#detallecotizadorproductnuevo_costos").append('<li><div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE263;</i></div><div class="md-list-content"><input type="number" step="any" class="md-input uk-text-center" placeholder="Precio de Cotización con Entrega en Tienda" id="cotizacionnuevo_costotienda" min="1"/></div></li><li><div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE263;</i></div><div class="md-list-content"><input type="number" class="md-input uk-text-center" placeholder="Precio de Cotización con Servicio a Domicilio" id="cotizacionnuevo_costodomicilio" min="1" /></div>');
          $("#detallecotizadorproductnuevo_enviar").append('<button type="button" class="md-btn md-btn-flat md-btn-flat-primary" onclick="enviarCotizacionProductNuevo('+idtblcarritoproductnuevocotizador+')">Enviar Respuesta </button>');//
        }
      }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  }).always(function(){  console.log("always");});
}

function enviarCotizacionProductNuevo(idtblcarritoproductnuevocotizador){
  console.log("EnviarResp Cotizador Nuevo");
 
   status = $("#motivocotizacionNuevo").val();
   idproveedor=idtblproveedor;
if(status!="null"){

   $.ajax({ method: "POST", dataType: "json", url: "./../../controllers/setCheckTblcostocotizacionproductnuevo.php",  
          data: {solicitadoBy:solicitadoBy, idtblcarritoproductnuevocotizador:idtblcarritoproductnuevocotizador,idtblproveedor:idproveedor}})
            .done(function( msgCotizacionnuevo){ 
                    console.log(msgCotizacionnuevo);
                    if(msgCotizacionnuevo.success==0){
                        if(status==2){
                               $("#motivocotizacionNuevo").removeClass( "md-input-danger" );
                              costotienda = $("#cotizacionnuevo_costotienda").val();
                              costodomicilio = $("#cotizacionnuevo_costodomicilio").val();

                              if((costotienda!="") || (costodomicilio!="")){
                                $("#cotizacionnuevo_costotienda").removeClass( "md-input-danger" );
                                $("#cotizacionnuevo_costodomicilio").removeClass( "md-input-danger" );
                                idproveedor=idtblproveedor;
                                emailcreo= emailproveedor;

                                UIkit.modal.confirm("* Precio con Servicio en Tienda: $"+costotienda+"<br/>* Precio con Servicio a Domicilio: $"+costodomicilio+"<br/><br/> Si los precios de la cotizacion son correctos presione Ok", function(){

                                    UIkit.modal("#popup_ordencotizadorproductNuevo").hide();
                                    UIkit.modal("#popup_spinner_registrandoCot2", {bgclose: false}).show();


                                     $.ajax({ //ingresa el registro con los costos de la cotizacion 
                                        method: "POST",dataType: "json",url: "./../../controllers/setTblcostocotizacionproductnuevo.php", data: {solicitadoBy:solicitadoBy,costotienda:costotienda,costodomicilio:costodomicilio,idtblcarritoproductnuevocotizador:idtblcarritoproductnuevocotizador,idtblproveedor:idproveedor,emailcreo:emailcreo, idtblmotivocotizacion:status, nombre:nombreSesion, apellido:apellido, nivel:nivel}})
                                        .done(function(datos){
                                          if(parseInt(datos.success)==1){
                                           UIkit.modal("#popup_spinner_registrandoCot2").hide();
                                           UIkit.modal.alert('Exitoso, Cotizacion Enviada');
                                           $("#formCotizacionNuevo")[0].reset();                                      
                                           $("#tblcotizacionesproductos").empty();
                                           $("#tblcotizacionesproductosnuevos").empty();
                                           mostrarCotizacionesProductosNuevos();
                                           mostrarCotizaciones();
                                          }else{
                                            UIkit.modal("#popup_spinner_registrandoCot2").hide();
                                            UIkit.modal.alert('Error Vuelva Intenetarlo mas Tarde');         
                                          }
                                      }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);}).always(function(){  console.log("always");});

                                });

                              }else{
                                UIkit.modal.alert('Ingrese el Precio de la Cotización de al menos un Servicio');
                                $("#cotizacionnuevo_costotienda").addClass( "md-input-danger" );
                                $("#cotizacionnuevo_costodomicilio").addClass( "md-input-danger" );
                              }


                            }else{

                              costotienda=null;
                              costodomicilio=null;
                              idproveedor=idtblproveedor;
                              emailcreo= emailproveedor;
                              
                              UIkit.modal("#popup_ordencotizadorproductNuevo").hide();
                              UIkit.modal("#popup_spinner_registrandoCot2", {bgclose: false}).show();

                              $.ajax({ //ingresa el registro con los costos de la cotizacion 
                                        method: "POST",dataType: "json",url: "./../../controllers/setTblcostocotizacionproductnuevo.php", data: {solicitadoBy:solicitadoBy,costotienda:costotienda,costodomicilio:costodomicilio,idtblcarritoproductnuevocotizador:idtblcarritoproductnuevocotizador,idtblproveedor:idproveedor,emailcreo:emailcreo, idtblmotivocotizacion:status, nombre:nombreSesion, apellido:apellido, nivel:nivel}})
                                        .done(function(datos){
                                          if(parseInt(datos.success)==1){

                                           UIkit.modal("#popup_spinner_registrandoCot2").hide();  
                                           UIkit.modal.alert('Exitoso, Respuesta Enviada');
                                           $("#formCotizacionNuevo")[0].reset();   
                                                  
                                           $("#tblcotizacionesproductos").empty();
                                           $("#tblcotizacionesproductosnuevos").empty();
                                           mostrarCotizacionesProductosNuevos();
                                           mostrarCotizaciones();
                                          }else{
                                            UIkit.modal("#popup_spinner_registrandoCot2").hide();  
                                            UIkit.modal.alert('Error Vuelva Intenetarlo mas Tarde');         
                                          }
                                      }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);}).always(function(){  console.log("always");});

                            }

                    }else if(msgCotizacionnuevo.success==1){
                        UIkit.modal("#popup_ordencotizadorproductNuevo").hide();
                        UIkit.modal.alert("Cotización respondida con anterioridad, recargue la página");
                    }else{
                      UIkit.modal("#popup_ordencotizadorproductNuevo").hide();
                      UIkit.modal.alert("Error Vuelva Intenarlo");
                    }


                }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  }).always(function(){  console.log("always");});
   }else{
     UIkit.modal.alert('Seleccione un tipo de Respuesta');
     $("#motivocotizacionNuevo").addClass( "md-input-danger" );
   }

}


var map;
function initMap() {
  map = new google.maps.Map(document.getElementById('gmap'), {
      center: {lat: -34.397, lng: 150.644},
      zoom: 15
      });
}

function sumaFecha(d, fecha){
  var Fecha = new Date();
  var sFecha = fecha || (Fecha.getDate() + "/" + (Fecha.getMonth() +1) + "/" + Fecha.getFullYear());
  var sep = sFecha.indexOf('/') != -1 ? '/' : '-'; 
  var aFecha = sFecha.split(sep);
  var fecha = aFecha[2]+'/'+aFecha[1]+'/'+aFecha[0];
  fecha= new Date(fecha);
  fecha.setDate(fecha.getDate()+parseInt(d));
  var anno=fecha.getFullYear();
  var mes= fecha.getMonth()+1;
  var dia= fecha.getDate();
  mes = (mes < 10) ? ("0" + mes) : mes;
  dia = (dia < 10) ? ("0" + dia) : dia;
  var fechaFinal = dia+sep+mes+sep+anno;
  return (fechaFinal);
}

//NOTIFICACIONES
function mostrarNotificaciones(){
 var clase;
  $.ajax({ 
      method: "POST",dataType: "json",url: "./../../controllers/getAllTblnotificacionbyTblnotificacionvista.php", data: {solicitadoBy:solicitadoBy,idproveedor:idtblproveedor}})
        .done(function(notif){
            $.each(notif.datos, function(i,item){
              if(parseInt(notif.datos[i].tblnotificacionvista_status)!=1){
                clase= "uk-text-bold ";
              }else{clase= "uk-text-muted";}


               $("#tblnotificacion").append(//
            '<tr class="'+clase+'" onclick="notifi('+notif.datos[i].tblnotificacionredireccion_idtblnotificacionredireccion+','+notif.datos[i].idtblnotificacionvista+')"><td><a>'+notif.datos[i].tblnotificacion_asunto+'</a></td><td>'+notif.datos[i].tblnotificacion_mensaje+
            '</td><td>'+notif.datos[i].tblnotificacion_fchcreacion+
            '</td><td>'+notif.datos[i].tblnotificacion_emisor+'</td></tr>');
          });
        })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      .always(function(){  console.log("always");});
}
function notifi(idredireccion, idtblnotificacionvista){
  switch(idredireccion){
    case 1: 
            notificacionVista(idtblnotificacionvista);
            $("#tblnotificacion").empty();
            setTimeout(mostrarNotificaciones, 1000);
            UIkit.switcher('#tabs_1').show(4);//General queda en Notificaciones
    break;
    case 2: notificacionVista(idtblnotificacionvista);
            $("#tblnotificacion").empty();
            setTimeout(mostrarNotificaciones, 1000);
            UIkit.switcher('#tabs_1').show(0);//Tab: INDEX (Inicio)
    break;
    case 3: notificacionVista(idtblnotificacionvista);
            $("#tblnotificacion").empty();
            setTimeout(mostrarNotificaciones, 1000);
            UIkit.switcher('#tabs_1').show(1);//TAB: Ordenes
    break;
    case 4: notificacionVista(idtblnotificacionvista);
            $("#tblnotificacion").empty();
            setTimeout(mostrarNotificaciones, 1000);
            UIkit.switcher('#tabs_1').show(2);//TAB: Productos
    break;
    case 5: notificacionVista(idtblnotificacionvista);
            $("#tblnotificacion").empty();
            setTimeout(mostrarNotificaciones, 1000);
            UIkit.switcher('#tabs_1').show(3);//TAB: Cotizaciones
    break;
    case 6: notificacionVista(idtblnotificacionvista);
            $("#tblnotificacion").empty();
            setTimeout(mostrarNotificaciones, 1000);
            UIkit.switcher('#tabs_1').show(4);//TAB: Notificaciones
    break;
    case 7: notificacionVista(idtblnotificacionvista);
            window.location="perfilTienda.php";//TAB: Perfil Tienda
    break;
    case 8: 
            notificacionVista(idtblnotificacionvista);
            window.location="perfilTienda.php";//TAB: Perfil Tienda
    break;
    case 9: notificacionVista(idtblnotificacionvista);
            window.location="perfilTienda.php";//TAB: Perfil Tienda
    break;
    case 10: notificacionVista(idtblnotificacionvista);
             window.location="fotografos.php";//TAB: Fotografos
    break;
    case 11: notificacionVista(idtblnotificacionvista);
             window.location="usuarios.php";//TAB: Fotografos
    break;
    case 12: notificacionVista(idtblnotificacionvista);
             window.location="./informacionGeneral.php"; //TAB: 
    break;
    case 13: notificacionVista(idtblnotificacionvista);
             window.location="./informacionGeneral.php";
    break;
    default: UIkit.switcher('#tabs_1').show(4);//General queda en Notificaciones
  }
}
function notificacionVista(idtblnotificacionvista){
$.ajax({ 
      method: "POST",dataType: "json",url: "./../../controllers/setUpdateTblnotificacionvista.php", data: {solicitadoBy:solicitadoBy,idtblnotificacionvista:idtblnotificacionvista,emailproveedor:emailproveedor}})
        .done(function(notif){})
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      .always(function(){  console.log("always");});
}

//--------------------Reyna-------------------------

 function mostrarTamaños(){		  
		                
    
     $.ajax({     
     method: "POST",dataType: "json",url: "./../../controllers/getAllTbltamanios.php", 
	 data: {solicitadoBy:"WEB"}})
            .done(function(mostTam){
				   
                $.each(mostTam.datos, function(i,item)
				 {	tamanioname=item.tbltamanios_nombre;	
				 //muestra ciudades en el encabezado de la interfaz principal
                 $("#alta_tamanio_producto_linea").append('<option value="' + tamanioname +'">' + tamanioname + '</option>');
 $("#alta_detalle_tamanio_producto_detalle_linea").append('<option value="' + tamanioname +'">' + tamanioname + '</option>');
 $("#modificar_detalle_tamanio_producto_linea").append('<option value="' + tamanioname +'">' + tamanioname + '</option>');
				  				 
                      });	
                                 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      
   } // fin de la funcion 

   
   
  function inicializarPagOrdenEntregar(){  		
 		$("#tbl_ordenes")
		.tablesorterPager({container: $("#pagerOrdenEntregar")})  ;
		 }
		 
		 
	function inicializarPagOrdenPendientes(){  		
 		$("#tbl_ordenespendiente")
		.tablesorterPager({container: $("#pagerOrdenesPendientes")})  ;
		 }
		 
	function inicializarPagOrdenHistorial(){  		
 		$("#tbl_ordeneshistorial")
		.tablesorterPager({container: $("#pagerOrdenesHistorial")})  ;
		 }
		 
		 
		 function inicializarPagCotiProducto(){  		
 		$("#tbl_ordenesCotizador")
		.tablesorterPager({container: $("#pagerCotizaProducto")})  ;
		 }
		
		function inicializarPagCotiProNuevo(){  		
 		$("#tbl_ordenesCotizadorNuevos")
		.tablesorterPager({container: $("#pagerCotizaProNuevos")})  ;
		 }
		 
//-----fin Reyna --------
 </script>

 <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjeDznrCqVmUmnPkqY34STkSMsV2RvFok&callback=initMap" ></script>
 
 <!--FIN DE CODIGO Misael Bravo -->
 <!-- page specific plugins -->
 <!-- fullcalendar -->
 <script src="bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
 <script src='bower_components/fullcalendar/dist/lang/es.js'></script>
<!-- tablesorter -->
    <script src="bower_components/tablesorter/dist/js/jquery.tablesorter.min.js"></script>
    <script src="bower_components/tablesorter/dist/js/jquery.tablesorter.widgets.min.js"></script>
    <script src="bower_components/tablesorter/dist/js/widgets/widget-alignChar.min.js"></script>
    <script src="bower_components/tablesorter/dist/js/widgets/widget-columnSelector.min.js"></script>
    <script src="bower_components/tablesorter/dist/js/widgets/widget-print.min.js"></script>
    <script src="bower_components/tablesorter/dist/js/extras/jquery.tablesorter.pager.min.js"></script>

 <!--  calendar functions 
 <script src="./assets/js/pages/plugins_fullcalendar.js"></script>-->
 <!-- d3 -->
 <script src="bower_components/d3/d3.min.js"></script>
 <!-- metrics graphics (charts) -->
 <script src="bower_components/metrics-graphics/dist/metricsgraphics.min.js"></script>
 <!-- chartist (charts) 
 <script src="bower_components/chartist/dist/chartist.min.js"></script>-->
<!-- maplace (google maps) 
  <script src="http://maps.google.com/maps/api/js"></script>-->
  <script src="bower_components/maplace-js/dist/maplace.min.js"></script>
  <!-- peity (small charts) -->
  <script src="bower_components/peity/jquery.peity.min.js"></script>
  <!-- easy-pie-chart (circular statistics) -->
  <script src="bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
  <!-- countUp -->
  <script src="bower_components/countUp.js/dist/countUp.min.js"></script>
  <!-- handlebars.js -->
  <script src="bower_components/handlebars/handlebars.min.js"></script>
  <script src="assets/js/custom/handlebars_helpers.min.js"></script>
  <!-- CLNDR -->
  <script src="bower_components/clndr/clndr.min.js"></script>
  <!-- fitvids -->
  <script src="bower_components/fitvids/jquery.fitvids.js"></script>

  <!--  dashbord functions 
  <script src="assets/js/pages/dashboard.min.js"></script>-->
  <script src="assets/js/custom/dropify/dist/js/dropify.min.js"></script>
  <!--  form file input functions -->
  <script src="assets/js/pages/forms_file_input.min.js"></script>
  <!--  product edit functions -->
  <script src="assets/js/pages/ecommerce_product_edit.min.js"></script>
  <!-- page specific plugins -->
  <!-- parsley (validation) -->
  <script>
    // load parsley config (altair_admin_common.js)
    altair_forms.parsley_validation_config();
    // load extra validators
    altair_forms.parsley_extra_validators();
  </script>
  <script src="bower_components/parsleyjs/dist/parsley.min.js"></script>
  <!-- jquery steps -->
  <script src="assets/js/custom/wizard_steps.min.js"></script>

  <!--  forms wizard functions -->
  <script src="assets/js/pages/forms_wizard.min.js"></script>
  <!-- maplace (google maps) 
  <script src="http://maps.google.com/maps/api/js"></script>-->
  <script src="bower_components/maplace-js/dist/maplace.min.js"></script>

  <!--  google maps functions
  <script src="assets/js/pages/plugins_google_maps.min.js"></script> -->

  <!-- MIGUEL -->
  <!-- kendo UI -->
  <script src="assets/js/kendoui_custom.min.js"></script>
  <!--  kendoui functions -->
  <script src="assets/js/pages/kendoui.min.js"></script>
  <!--page_contact_list-->
  <script src="assets/js/pages/page_contact_list.min.js"></script>
  <!--
<script src="assets/js/pages/dashboard.min.js"></script>
  -->
</body>
</html>