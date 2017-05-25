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
                                   
									<li class="uk-active"><a href="#">Proveedor</a></li>
                                    <li><a href="#" >Usuario Proveedor</a></li>
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
                                    <h2>Proveedores</h2>
                                   
                                    </div>
									
				<div class="uk-grid" data-uk-grid-margin>
                        <div  class="uk-width-medium-1-2" >                            
				   <select id="proveedorCiudad" name="proveedorCiudad" class="uk-button uk-form-select" data-uk-form-select  onchange="javascript:mostrarProveedor();cantidadProveedores();mostrar_proveedorLista();">
                   <option value="" disabled selected hidden>Selecciona una Ciudad...</option>
					     <optgroup label="Selecciona una Ciudad.." disabled selected>
                   </select>	
                        </div>
						
						<!--<div class="uk-width-medium-1-3"> </div>-->
						 <div class="uk-width-medium-1-2 oculto uk-float-right" id="divUprov" >
                            <span class="uk-text-small">Ver solo Proveedor: </span>
                                   <select id="SelectProveedor" name="SelectProveedor" class="uk-button uk-form-select" data-uk-form-select  onchange="javascript:mostrarProveedorEscogido();" >
                                    <option value="" disabled selected readonly >Selecciona...</option>
								   
                                   </select>                             
                              </div>
					</div>
					</br>
					<label class="uk-float-right" id="numeroProveedores"> </label>
					 </br>
									  <div class="uk-text-center oculto" id="esperarMostrarProveedor" >
                                      <label> Procesando... </label>
				                       <img src="cargando.gif" /> 				 
                                           </div> 
					                </div>
									
									
					            </div>
								
						
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
				
			   <!-- ..................... -->		 
		       <div id="listarProveedor">
               <!-- AQui aparecen los proveedoredores -->
			   </div>
					
					 <!-- icono para dar de alta Proveedores -->
	
    <div class="md-fab-wrapper" id="paraAltasProv">
         <a class="md-fab md-fab-accent" href="#altaProveedor" onclick="rCO();" data-uk-modal="{ target:'#altaProveedor',bgclose:false, center:true }">
         <i class="material-icons">&#xe7fe;</i>
         </a>
    </div>
					 
					 
	<!-- .....Pupop para modificar proveedor  .................................................... -->
	<div class="uk-modal" id="modificar">
       <div class="uk-modal-dialog uk-modal-dialog-large">
		<button type="button"  class="uk-modal-close uk-close uk-close-alt"></button>
            <form enctype="multipart/form-data" method="POST" class="uk-form-stacked" id="pantallaModificar" name="pantallaModificar">
			  		
			    <h3 class="heading_b uk-margin-bottom">Modificar Datos<i class="material-icons md-24">&#xe254;</i></h3>
		              <div class="uk-grid uk-margin-medium-top uk-margin-large-bottom" data-uk-grid-margin>
							
							<div class="uk-width-large-1-1">
			                <ul class="md-list md-list-addon">
					        <div class="uk-grid">			 
						     <div class="uk-width-medium-1-2">
			                 <div class="uk-margin-medium-bottom " id="parafoto" >
                             <!-- aqui se muestra la foto del logo del proveedor -->
			                 </div>
				             </div>
			         <div class="uk-width-medium-1-2">
		             <div class="uk-margin-medium-bottom" id="nuevaFoto">
                     <label for="task_title">Subir Nueva Foto de perfil</label> 
		             <input type="file" id="logoproveedorV2" name="srcimg1_proveedor" class="dropify" accept="image/jpeg,jpg,png,gif" class="dropify" data-max-file-size="1000K" />
		   			  <input type="hidden" id="modificar_srcimg1_producto_ComplementarioBD" name="srcimg1_proveedorBD" />
					 </div>
                     </div>
							 </div> </ul> </div>
							  
					<div class="uk-width-large-1-2">
			        <ul class="md-list md-list-addon">
				    <label for="task_title">* Nombre del Proveedor</label>
				    <div class="uk-margin-medium-bottom">
                    <span class="oculto" id="idproveedor"></span>
                    <input type="text" class="md-input" id="proveedornombremodificar" name="proveedornombremodificar" />  
                    </div>
				
				    <label for="task_title">* Descripcion</label>
				    <div class="uk-margin-medium-bottom">                    
                    <!-- <input type="text" class="md-input" id="proveedordesmodificar" maxlength="299" name="proveedordesmodificar" />
                    -->
					<textarea rows="3" cols="15" class="md-input" id="proveedordesmodificar" maxlength="299" name="proveedordesmodificar"> </textarea>
					</div>
					<div id="contador2"></div>
			   
			         <label for="task_title">* Email</label>                   
					 <div class="uk-margin-medium-bottom">                    
                     <!--<input class="md-input masked_input" id="proveedoremailmodificar" name="proveedoremailmodificar" type="text" data-inputmask="'alias': 'email'" data-inputmask-showmaskonhover="false" />
                     -->
					  <input class="md-input" id="proveedoremailmodificar" name="proveedoremailmodificar" type="text" />
					 </div>
					
					<label for="task_title">* SEO</label>
					<div class="uk-margin-medium-bottom">                    
                    <input class="md-input" id="proveedorseomodificar" name="proveedorseomodificar" type="text" />
                    </div>
					<label for="task_title">* Número Celular (LADA + Número Celular)</label>
				    <div class="uk-margin-medium-bottom">                    
                    <input type="text" class="md-input masked_input" id="proveedorcelularmodificar" name="proveedorcelularmodificar" data-inputmask="'mask': '9999999999'" data-inputmask-showmaskonhover="false"/>
                    </div>
					 <div class="uk-grid">			 
			        <div class="uk-width-medium-1-2">
				    <label for="task_title">Extensión</label>
					<div class="uk-margin-medium-bottom"> </br>                   
                    <input type="text" class="md-input" id="proveedorextensionmodificar" maxlength="4" name="proveedorextensionmodificar" />
                    </div> </div>
					<div class="uk-width-medium-1-2">
				    <label for="task_title">Teléfono de Tienda (LADA  + Número teléfonico)</label>
				    <div class="uk-margin-medium-bottom">                    
                     <input class="md-input masked_input" id="proveedortelefonomodificar" name="proveedortelefonomodificar" type="text" data-inputmask="'mask': '9999999999'" data-inputmask-showmaskonhover="false" />
                     </div>   </div>    </div>
					 
				     <label for="task_title">* Banco</label>
					 <div class="uk-margin-medium-bottom">                    
                    <input type="text" class="md-input" id="bancoModificar" name="bancoModificar" />
                    </div>
				    <label for="task_title">* CLABE interbancaria</label>
                    <div class="uk-margin-medium-bottom">                    
                    <input type="text" class="md-input masked_input" id="claveModificar" name="claveModificar" data-inputmask="'mask': '999999999999999999'" data-inputmask-showmaskonhover="false" />
                    </div>
					
					<label for="task_title">* Nombre del Titular de la Cuenta</label>
					<div class="uk-margin-medium-bottom">                    
                    <input type="text" class="md-input" id="titularModificar" name="titularModificar" />
                    </div>
				
				</ul>
				</div>
				
				<div class="uk-width-large-1-2">
			    <ul class="md-list md-list-addon">
				
				<label for="task_title">* RFC (Ejemplo: VECJ940325XXX)</label>
				<div class="uk-margin-medium-bottom">                    
                    <input type="text" class="md-input" id="rfcModificar" name="rfcModificar" /> 
                </div> 
				
				<label for="task_title">* Ciudad</label>
				<div class="uk-margin-medium-bottom" >                    
					 <select id="proveedorCiudadModd" name="proveedorCiudadModd" class="md-input" onchange="javascript:mostrarColoniaVentana();">
                     <option value="" disabled selected hidden>* Ciudad</option>					
                     </select>					
                </div>
				
				<label for="task_title">* Colonia</label>
				<div class="uk-margin-medium-bottom">                  
					 <select id="proveedorcoloniaMod" name="proveedorcoloniaMod" class="md-input">
                     <option value="" disabled selected hidden>* Colonia</option>			
                     </select>		 			
                </div>
				
				<label for="task_title">* Dirección (Calle y Número)</label>
				<div class="uk-margin-medium-bottom">                    
                    <input class="md-input" id="proveedordireccionmodificar" name="proveedordireccionmodificar" type="text" />
                </div>
				
				<label for="task_title">* Tipo de Paquete</label>
				<div class="uk-margin-medium-bottom">
                    <select id="proveedorpaquetemod" name="proveedorpaquetemod" class="md-input">
                     <option value="" disabled selected hidden>* Tipo de paquete</option>					  
                     </select>
                </div>
				
				<div class="uk-margin-medium-bottom" id="espacioTipoPedido">
				<!--   aqui aparece los tipos de pedidos	-->
                </div>  
				
				<div class="uk-margin-medium-bottom" id="espacioTipoServicio">				
                   <!--   aqui aparecen los tipo de servicios -->
                </div>
				
				</ul>
			  </div>
			  
			     <div class="uk-text-center oculto" id="cargarModificarProveedor" >
                 <label > Procesando... </label>
				  <img src="cargando.gif" />				  
                 </div> 
				 
			</div>
                <div class="uk-modal-footer uk-text-right">
			    <button type="button" class="md-btn md-btn-flat ye" id="botonModificar" onclick="actualizarProveedor()"> Guardar Cambios</button>
                </div>
            </form>
        </div>		
    </div>	
	
	
	<!-- agregar pasteleria ..................................... -->
	<div class="uk-modal" id="altaProveedor">	
        <div class="uk-modal-dialog uk-modal-dialog-large">
		   <button type="button"  class="uk-modal-close uk-close uk-close-alt"></button>            
			<form enctype="multipart/form-data" method="POST" id="RegistroProveedor" name="RegistroProveedor" class="uk-form-stacked">
			  <h3 class="heading_b uk-margin-bottom"><i class="material-icons md-36">&#xe7fe;</i> Agregar Proveedor </h3>
			  <div class="uk-grid uk-margin-medium-top uk-margin-large-bottom" data-uk-grid-margin >             
			  <div class="uk-width-large-1-2">			 
			  <ul class="md-list md-list-addon">			 
			  <div class="uk-margin-medium-bottom" id="campoInputAgregarProveedor">                   
			      <label for="task_title">* Foto de perfil (Tamaño maximo 1MB)</label>
                  <input type="file" id="logoproveedorV1" name="logoproveedorV1" accept="image/jpeg,jpg,png,gif" class="dropify" data-max-file-size="1000K"  />
			    </div>				
			     <div class="uk-margin-medium-bottom">				 
                    <label for="task_title">* Nombre del Proveedor</label>
                    <input type="text" class="md-input" id="proveedornombre" name="proveedornombre" />
					
                </div>		
				<div class="uk-margin-medium-bottom">
                    <label for="task_title">* Descripción </label>
                 
						<textarea rows="3" cols="15" class="md-input" id="proveedordescripcion" maxlength="299" name="proveedordescripcion"> </textarea>
			   </div>
				<div id="contador"></div>
				<div class="uk-margin-medium-bottom">
                    <label for="task_title">* Email</label>
                 <input class="md-input" id="proveedoremail" name="proveedoremail" type="text"/>
               </div>			 
				<div class="uk-margin-medium-bottom">
                    <label for="task_title">* SEO</label>
                    <input type="text" class="md-input" id="proveedorseo" name="proveedorseo" />
                </div>
				<div class="uk-margin-medium-bottom">
                    <label for="task_title">* Número Celular (LADA + Número Celular)</label>
                    <input type="text" class="md-input masked_input" id="proveedorcelular" name="proveedorcelular" data-inputmask="'mask': '9999999999'" data-inputmask-showmaskonhover="false" />
                </div>
				
				  <div class="uk-grid">			 
			       <div class="uk-width-medium-1-2">
				     <div class="uk-margin-medium-bottom">
				    <label class="uk-text-muted">Extensión</label></br></br>
                     <input type="text" class="md-input" id="proveedorextension" name="proveedorextension" maxlength="4" />
                     </div> </div>
					  <div class="uk-width-medium-1-2">
					 <div class="uk-margin-medium-bottom">
                  <label class="uk-text-muted">Teléfono de Tienda (LADA  + Número teléfonico)</label></br>
                  <input class="md-input masked_input" id="proveedortelefono" name="proveedortelefono" type="text" data-inputmask="'mask': '9999999999'" data-inputmask-showmaskonhover="false" />
                   </div></div></div>

                     <div class="uk-margin-medium-bottom">
                    <label for="task_title">* Banco</label>
                 <input type="text" class="md-input" id="bancoAlta" name="bancoAlta" />
                </div>
                <div class="uk-margin-medium-bottom">
                    <label for="task_title">* CLABE interbancaria</label>
                    <input type="text" class="md-input masked_input" id="claveAlta" name="claveAlta" data-inputmask="'mask': '999999999999999999'" data-inputmask-showmaskonhover="false" />
                </div> 				 
				   
				</ul>
				</div>
				
			  <div class="uk-width-large-1-2">
			 <ul class="md-list md-list-addon">	
			      <div class="uk-margin-medium-bottom">
                    <label for="task_title">* Nombre del Titular de la Cuenta</label>
                    <input type="text" class="md-input" id="titularAlta" name="titularAlta" />
                </div> 
				<div class="uk-margin-medium-bottom">
                    <label for="task_title">* RFC (Ejemplo: VECJ940325XXX)</label>
                    <input type="text" class="md-input" id="rfcAlta" name="rfcAlta"  />
                </div> 
				<div class="uk-margin-medium-bottom" > 
				   <label for="task_title">* Ciudad</label>
					 <select id="proveedorCiudadAg" name="proveedorCiudadAg" class="md-input" onchange="javascript:mostrarColonia();" >
                     <option value="" disabled selected hidden>* Ciudad</option>					
                     </select>					
                </div>
				
				<div class="uk-margin-medium-bottom">   
				     <label for="task_title">* Colonia</label>
					 <select id="proveedorcolonia" name="proveedorcolonia" class="md-input">
                     <option value="" disabled selected hidden>* Colonia</option>					
                     </select>					
                </div>
				<div class="uk-margin-medium-bottom">
                    <label for="task_title">* Direcci&oacute;n (Calle y Número)</label>
                    <input type="text" class="md-input" id="proveedordireccion" name="proveedordireccion" />
                </div>
				
				<div class="uk-margin-medium-bottom">
				  <label for="task_title">* Tipo de Paquete</label>
                    <select id="proveedorpaquete" name="proveedorpaquete" class="md-input">
                     <option value="" disabled selected hidden>* Tipo de paquete</option>					  
                     </select>
                </div>
				
				<div class="uk-margin-medium-bottom" id="divdePedido">
                    <label  class="uk-form-label">* Tipo de pedido</label>
					                         
                       <div>
                            <span class="icheck-inline">
                                <input type="radio" name="tipopedido" value="1" id="mismodia" />
                                <label>Para el mismo d&iacute;a</label> 
                            </span>
                      </div>
					  <div>
                            <span class="icheck-inline">
                                <input type="radio" name="tipopedido" value="2" id="sobrepedido"/>
                                <label>Solo sobre pedido</label> 
                            </span>
						</div>
					  <div>	
							 <span class="icheck-inline">
                                <input type="radio" name="tipopedido" value="3" id="diaypedido"  checked />
                                <label>El mismo d&iacute;a y sobre pedido</label> 
                            </span>
                    </div>
                </div>
				
				<div class="uk-margin-medium-bottom">
                    <label class="uk-form-label">* Tipo de servicio</label>
					   
                         <div>					    
							<span class="icheck-inline">							
                                <input type="radio" name="tipodeservicio" value="1" id="tienda"  /> 
                                <label>Entrega en tienda</label> 
                            </span>
						</div>
						<div>	
							<span class="icheck-inline">
                                <input type="radio" name="tipodeservicio" value="2" id="domicilio"  /> 
                                <label>Entrega a domicilio</label> 
                            </span>
						</div>
						<div>
                            <span class="icheck-inline">
                                <input type="radio" name="tipodeservicio" value="3" id="tiendadomicilio" checked  />
                                <label >Entrega en tienda y domicilio</label> 
                            </span>
                        </div>
                </div>                
                <div class="uk-margin-medium-bottom">
                    <label class="uk-form-label">* Estatus</label>
                    <div>   
                           <input type="checkbox"  name="idactivado" id="idactivado" checked /> 
                           <label for="idactivado" class="inline-label">Activo</label>						   
                    </div>        
                </div>      
				
				</ul>
				</div>
				
				</div>
				 
				 <div class="uk-text-center oculto" id="cargarAltaProveedor" >
                  <label > Procesando... </label>
				  <img src="cargando.gif" /> 
				 </div> 
				 
				 <div class="uk-modal-footer uk-text-right">                
			    <button type="button" class="md-btn md-btn-flat ye" id="pAgregar" onclick="agregarProveedor();">Agregar</button>
                </div>
              </form>
        </div>
    </div> <!-- cierre agregar pasteleria-->
					 
                                    </div> <!-- fin pag1 -->
									
									
									
                                    <div>  <!-- inicio pag 2 -->
													
				<div class="md-card">
					    <div class="md-card-content">
									<div>    <!-- id="page_heading" -->         
                                    <h2>Usuario Proveedor</h2>
                                 							   
                                    </div>									
				
				                       <br/>
									 <span class="uk-text-medium">Para modificar los datos, haz clic en el nombre del Usuario.</span>
				                     
									 <label class="uk-float-right" id="numeroUsuarios"> </label> 
									  </br>
									  <div class="uk-text-center oculto" id="esperarMostrarUsuarios" >
                                      <label> Procesando... </label>
				                       <img src="cargando.gif" /> 				 
                                       </div> 
					            
							
					
					</div><!-- cierre del content-->
				</div> <!-- cierre del mcard-->
				
								
				<div class="md-card" id="muestraTablaGeneral">
				<div class="md-card-content">		
                         <div class="uk-overflow-container uk-margin-bottom">
                     
						   <table class="uk-table uk-table-nowrap table_check uk-table-hover tablesorter tablesorter-altair" id="tbl_usuariosP">
                            
							<thead>
                                <tr>
                                    <th class="uk-text-center">Nombre</th>                                   									
									<th class="uk-text-center">Proveedor</th>
                                    <th class="uk-text-center">Estatus</th>
									 <th class="uk-text-center">Email</th>
									<th class="uk-text-center">Celular</th>
									<th class="uk-text-center">Puesto</th>
                                    
                                </tr>
                            </thead>
                            
                            <tbody id="mostrarUsuariosBody">
                              
                            </tbody>
                        </table>
		<div id="pager" class="pager oculto">
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
					
					 <div class="md-fab-wrapper">
					<!-- <a href="#" data-uk-modal="{ target:'#new_issue2',bgclose:false,center:true }" > href="#agregarCiudadDiv"-->
                     <a class="md-fab md-fab-accent" onclick="rCO();" data-uk-modal="{ target:'#agregarUsuarioDiv',bgclose:false, center:true }" >
	                           
                     <i class="material-icons">&#xE145;</i>
                     </a>
                     </div>
					 
					 
					 <!-- agregar ciudad -->
						  
	<div class="uk-modal" id="agregarUsuarioDiv">
        <div class="uk-modal-dialog uk-modal-dialog-large">
		   <button type="button"  class="uk-modal-close uk-close uk-close-alt"></button>
           <form class="uk-form-stacked" id="formAltaUsuario"  >
		    <h3 class="heading_b uk-margin-bottom">Agregar Usuario </h3>
		  <div class="uk-grid uk-margin-medium-top uk-margin-large-bottom" data-uk-grid-margin >             
			  <div class="uk-width-large-1-2">	
                 <ul class="md-list md-list-addon">
			    <div class="uk-margin-medium-bottom">
				    <label for="task_title">Ciudad:</label>
                    <select id="altaCiudadUsuario" name="altaCiudadUsuario" class="uk-button uk-form-select" data-uk-form-select onchange="mostrar_provedoresdeUsuarios();" >
                   <option value="" disabled selected hidden>Selecciona...</option>					   
                   </select>
                </div>
				
				<div class="uk-margin-medium-bottom">
				    <label for="task_title">Proveedor:</label>
                    <select id="altaProveedorUsuario" name="altaProveedorUsuario" class="uk-button uk-form-select" data-uk-form-select >
                   <option value="" disabled selected hidden>Selecciona...</option>
					     
                   </select>
                </div>				
				<div class="uk-margin-medium-bottom">
				    <label for="task_title">Puesto:</label>
                    <select id="altaPuestoUsuario" name="altaPuestoUsuario" class="uk-button uk-form-select" data-uk-form-select >
                   <option value="" disabled selected hidden>Selecciona...</option>					     
                   </select>
                </div>
				
                <div class="uk-margin-medium-bottom">
                    <label for="task_title">Nombre:</label>
                    <input type="text" class="md-input" id="altaNombreUsuario" name="altaNombreUsuario"/>
                </div>
				<div class="uk-margin-medium-bottom">
                    <label for="task_title">Apellidos:</label>
                    <input type="text" class="md-input" id="altaApeUsuario" name="altaApeUsuario"/>
                </div>
				<div class="uk-margin-medium-bottom">
                    <label for="task_title">Email:</label>
                    <input type="text" class="md-input" id="altaEmailUsuario" name="altaEmailUsuario"/>
                </div>
				</ul>
				</div>
				<div class="uk-width-large-1-2">	
				  <ul class="md-list md-list-addon">
				  
				   
				<div class="uk-margin-medium-bottom">
                    <label for="task_title">Celular:</label>
                    <input type="text" class="md-input" id="altaCelUsuario" maxlength="10" name="altaCelUsuario"/>
                </div>
				<div class="uk-margin-medium-bottom">
                    <label for="task_title">Password:</label>
                    <input type="password" class="md-input" id="altaPassUsuario" name="altaPassUsuario"/>
                </div>
				<div class="uk-margin-medium-bottom">
                    <label for="task_title">Repetir Password:</label>
                    <input type="password" class="md-input" id="altaPassUsuario2" name="altaPassUsuario2"/>
                </div>
                <div class="uk-margin-medium-bottom">
                    <label for="task_priority" class="uk-form-label">Estatus:</label>
                    <div>
                            <input type="checkbox"  checked data-switchery-color="#00CC66" id="altaEstatusUsuario"/> <!--id="switch_demo_1" data-switchery-color="#1e88e5"-->  
                           <label for="switch_demo_1" class="inline-label">Activo</label>  
                    </div>
                </div>
				
				 <div class="uk-text-center oculto" id="cargarNuevoUsuario" >
                <label > Procesando... </label>
				  <img src="cargando.gif" /> 				
                 </div> 
				 
                	 
			   </ul></div>
         </div>	
            <div class="uk-modal-footer uk-text-right">
                
			 <button type="button" class="md-btn md-btn-flat ye" id="agregarNuevoUsuario" name="agregarNuevoUsuario" onclick="agregarUsuario();">Agregar</button>
               </div>		 
            </form>
        </div>
    </div>                   
        

		        
					
					 <!-- cierra agragar ciudad ........... -->
					
					 <!-- ........modificar ciudad -->
		 <div class="uk-modal" id="mUsuario">
        <div class="uk-modal-dialog uk-modal-dialog-large">
		   <button type="button"  class="uk-modal-close uk-close uk-close-alt"></button>
           <form class="uk-form-stacked" id="formUsuario" >		 
			  <h3 class="heading_b uk-margin-bottom">Modificar Datos </h3>
			  <div class="uk-grid uk-margin-medium-top uk-margin-large-bottom" data-uk-grid-margin >             
			  <div class="uk-width-large-1-2">	
			  <ul class="md-list md-list-addon"> 
			  
			   <div class="uk-margin-medium-bottom">
				    <label for="task_title">Ciudad:</label>
                    <select id="modCiudadUsuario" name="modCiudadUsuario" class="uk-button uk-form-select" data-uk-form-select onchange="mostrar_provedoresdeUsuarios2();" >
                   <option value="" disabled selected hidden>Selecciona...</option>
					   
                   </select>
                </div>	
            <div class="uk-margin-medium-bottom">
				    <label for="task_title">Proveedor:</label>
                    <select id="modProvUsuario" name="modProvUsuario" class="uk-button uk-form-select" data-uk-form-select  >
                   <option value="" disabled selected hidden>Selecciona...</option>					   
                   </select>
                </div>					
				<div class="uk-margin-medium-bottom">
				    <label for="task_title">Puesto:</label>
                    <select id="modPuesUsuario" name="modPuesUsuario" class="uk-button uk-form-select" data-uk-form-select >
                   <option value="" disabled selected hidden>Selecciona...</option>					     
                   </select>
                </div>
				 <label for="task_title">Nombre:</label>
                <div class="uk-margin-medium-bottom">  
                  <span class="oculto" id="modIdUsuario"></span>				
                    <input type="text" class="md-input" id="modNombreUsuario" name="modNombreUsuario"/>
                </div>
				<label for="task_title">Apellidos:</label>
				<div class="uk-margin-medium-bottom">                    
                    <input type="text" class="md-input" id="modApeUsuario" name="modApeUsuario"/>
                </div>
				</ul></div>
				 <div class="uk-width-large-1-2">	
			  <ul class="md-list md-list-addon"> 
				<label for="task_title">Email:</label>
				<div class="uk-margin-medium-bottom">                    
                    <input type="text" class="md-input" id="modEmailUsuario" name="modEmailUsuario"/>
                </div>
				<label for="task_title">Celular:</label>
				<div class="uk-margin-medium-bottom">
                    <input type="text" class="md-input" id="modCelUsuario" name="modCelUsuario" maxlength="10" />
                </div>
				<label for="task_title">¿Cambiar Password?</label>
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
				 <div class="oculto"  id="CambiarPass">
				 <label for="task_title">Password:</label>
				<div class="uk-margin-medium-bottom">                   
                    <input type="password" class="md-input" id="modPassUsuario" name="modPassUsuario"/>
                </div>
				 <label for="task_title">Repetir Password:</label>
				<div class="uk-margin-medium-bottom">                   
                    <input type="password" class="md-input" id="modPassUsuario2" name="modPassUsuario2"/>
                </div>
				</div>
				                               
                <div class="uk-text-center oculto" id="cargarModificarUsuario" >                
				  <label > Procesando... </label>
				  <img src="cargando.gif" /> 				 
                 </div> 
                   
                
			
                
			   </ul></div></div>
			   <div class="uk-modal-footer">
                
			    <button type="button" class="md-btn md-btn-flat ye uk-float-right" id="ye" onclick="actualizarUsuario();" >Guardar Cambios</button>
                <div id="modDiv">
				</div>
				</div>
            </form>
        </div>
    </div>

                                    </div>  <!-- fin pag 2 -->
				</div>								
                </div>
            </div>
			
	<!-- ::::::::::::::::::::::::::::::::::::::::::::::::::::::::  -->
	
	 <?php include('../codigo_general/script_commonPB.php'); ?>
    <!-- tablesorter -->
	<script src="../bower_components/tablesorter/dist/js/jquery.tablesorter.js"></script>
    <script src="../bower_components/tablesorter/dist/js/jquery.tablesorter.min.js"></script>
    <script src="../bower_components/tablesorter/dist/js/jquery.tablesorter.widgets.min.js"></script>
    <script src="../bower_components/tablesorter/dist/js/widgets/widget-alignChar.min.js"></script>
    <script src="../bower_components/tablesorter/dist/js/extras/jquery.tablesorter.pager.min.js"></script>
	<script src="../bower_components/tablesorter/dist/js/widgets/widget-columnSelector.min.js"></script>
    <script src="../bower_components/tablesorter/dist/js/widgets/widget-print.min.js"></script>
	
  <script src="../assets/js/custom/dropify/dist/js/dropify.min.js"></script>
    <!--  form file input functions -->
    <script src="../assets/js/pages/forms_file_input.min.js"></script>		
   	
	<!-- ionrangeslider -->
    <script src="../bower_components/ion.rangeslider/js/ion.rangeSlider.min.js"></script>  
  <!-- kendo UI -->
  <script src="../assets/js/kendoui_custom.min.js"></script> 
  <!--  kendoui functions -->
  <script src="../assets/js/pages/kendoui.min.js"></script>
   <!-- inputmask-->
    <script src="../bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.js"></script>
    
  <!--page_contact_list-->
  
  <script src="../assets/js/pages/page_contact_list.min.js"></script>
   <!--  forms advanced functions -->
    <script src="../assets/js/pages/forms_advanced.min.js"></script>
      
	  
	
	<!--<script src="assets/js/pages/tres.js"> </script>  --> 
	   <!-- ------------------------ -->
    <script type="text/javascript" >
       /* Create by: Reyna Maria Martinez Vazquez*/
  $( window ).ready(function()
    {
        //console.log('pagina lista');
	     mostrarCiudades();  //se cargar automaticamente cuando carge la pagina	      
	     mostrarPaquete();	
		 mostrarCiudadesConColonias();
		 mostrarUsuariosProveedor();
		 mostrarPuestos();
		 //..........
		 var max_chars = 299;

         $('#max').html(max_chars);

         $('#proveedordescripcion').keyup(function() {  //alta proveedor
          var chars = $(this).val().length;
           var diff = max_chars - chars;
          $('#contador').html('Cantidad de caracteres restantes: '+diff);   
        }); 
			
		 //..........
		  var max_chars2 = 299;

         $('#max2').html(max_chars2);

         $('#proveedordesmodificar').keyup(function() {  //modificar proveedor  
          var chars = $(this).val().length;
           var diff2 = max_chars2 - chars;
          $('#contador2').html('Cantidad de caracteres restantes: '+diff2);   
        });  
		 
		 //.......
		
    }); 
	
	
	//------------------usuarios proveedor-----------------------------------------
	
	function mostrarMas(){
		  $("input[name='preguntaPass']").html("");
    tipo= $("input[name='preguntaPass']:checked").val();
	  
	  
	  
		if(tipo=="1"){	
			//console.log("no");  
			$("#CambiarPass").addClass("oculto");
		    }
	    if(tipo=="2"){		                
           //console.log("si");	
		  $("#CambiarPass").removeClass("oculto");
			   }
	 } // fin de la funcion
	 
	 function rCO(){
		 $("#agregarNuevoUsuario").removeClass("oculto");
	}
	
	 function inicializarTablaUsuario(){
    $("#tbl_usuariosP").tablesorter({
    sortList: [[0,0]], //ordenar por de inicio esa columna 
    headers: {1: { sorter: "shortDate", dateFormat: "ddmmyyyy" } }, //cambio de formato de fecha 
    widgets: ['filter'] //activar el widget de filtro de busqueda
	}); 
 		 
		 }
		 
		 
		 function inicializarPaginacion(){  		
 		$("#tbl_usuariosP")
		.tablesorterPager({container: $("#pager")})  ;
		 }
		 
		 
	function mostrarUsuariosProveedor(){ 	      
               inicializarTablaUsuario();
     $.ajax({     
      method: "POST",dataType: "json",
	 url: "../../../controllers/getAllTblusuarioproveedorDatos.php", data: {solicitadoBy:"WEB"},
	  beforeSend: function(){
                              $('#esperarMostrarUsuarios').css('display','inline');								  
                                                 }
				   })
	 
            .done(function(mow){
			if(parseInt(mow.success)==1){
				
				   
				
					$("#pager").removeClass('oculto');	
				   
                $.each(mow.datos, function(i,item)
               {		
                        if(item.tblusuarioproveedor_activado=="2"){
					nomostrar=true;
				    }else{ nomostrar=false;			   
			      //asignamos nombres a las valores
			        nombre=item.tblusuarioproveedor_nombre;
				    apellido=item.tblusuarioproveedor_apellido; 
					email=item.tblusuarioproveedor_email; 
                   cel=item.tblusuarioproveedor_celular; 					
					id= item.idtblusuarioproveedor;
                 proveedor=item.tblproveedor_nombre;
                 puesto=item.tblniveleacceso_nombre;
               idciu=item.idtblciudad;
                  
					
				
                 $("#mostrarUsuariosBody").append(
				 ' <tr>'+
                 '<td onclick="mostrarDatosUsuarioP('+id+'); mostrarProvedoresdeUsuariosBoton('+id+');"'+
				 ' data-uk-modal="{target:'+"'#mUsuario'"+',bgclose:false, center:true }" >'+
                                 '<span>'+ nombre+' '+apellido +'<span/>'+
               					  ' </td>'+
				               				               
								'<td>'+				                      
                                  ' <span >'+ proveedor +' </span>'+
								   ' <span class="oculto" id="deCiudad'+id+'">'+ idciu +' </span>'+
               					  ' </td>'+   
                 '<td class="uk-width-medium-1-3">'+									
                '<input type="checkbox" data-switchery '+
				'data-switchery-color="#00CC66" onclick="ModEstatusUsuario('+id+');"  id="mostrarEstatusU'+id+'" '+ item.tblusuarioproveedor_activado +' />'+  
                 '<span class="inline-label" id="estadoU'+id+'">   </span> '+                            									
							'</td>	'+	
							 '<td>'+				                      
                                  ' <span >'+ email +' </span>'+
               					  ' </td>'+ 
                               '<td>'+				                      
                                  ' <span >'+ cel +' </span>'+
               					  ' </td>'+
					            '<td>'+				                      
                                  ' <span >'+ puesto +' </span>'+
               					  ' </td>'+			  
                                '</tr>'
				 
				 );
				                    if(parseInt(item.tblusuarioproveedor_activado)!=0){
                                          $("#mostrarEstatusU"+id).prop("checked", true);
										 $("#estadoU"+id).text("Activo");
										 
                                           }
						                  else {
                                          $("#mostrarEstatusU"+id).prop("checked", false);
										  $("#estadoU"+id).text("Desactivado");
                                            } 
				 
				   	$("#tbl_usuariosP").trigger('updateAll', [true]);//actualiza tabla 
					inicializarPaginacion();
					}
					
                      });	 //cierre del each
					  
			}else{ $("#pager").addClass('oculto');}
                                 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      .always(function(){ $("#esperarMostrarUsuarios").hide();  });
   } 	//fin de la funcion
	
	function mostrarProvedoresdeUsuariosBoton(id){
      
	     var idtblciudad=$("#deCiudad"+id).text();	//se recibe el id que seleciono el usuario del select de Ciudades            
         
     $.ajax({     
     method: "POST",dataType: "json",url: "../../../controllers/getAllProveedorByCiudad.php", 
	 data: {solicitadoBy:"WEB",idtblciudad:idtblciudad }}) 
            .done(function(mfe){				
				   if (parseInt(mfe.success)==1) {				   
				  $("#modProvUsuario").html("");
				
				//  $("#modProvUsuario").append('<option value="" disabled selected readonly >Selecciona...</option>'); 
				
                $.each(mfe.datos, function(i,item)
				 {	idtblproveedor=item.idtblproveedor;	
				 //muestra ciudades en el encabezado de la interfaz principal 
                 $("#modProvUsuario").append('<option value="' + idtblproveedor +'">' + item.tblproveedor_nombre + '</option>');
				  				 
				   });
				            
				   }else{ 
				    $("#modProvUsuario").html("");
					$("#modProvUsuario").append('<option value="" disabled selected readonly >Selecciona...</option>'); 
				} 
                                 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      
   } //fin de la funcion 
   
   
	function agregarUsuario(){	  
	  
	prove = $("#altaProveedorUsuario").val();  
	 puesto=$("#altaPuestoUsuario").val();
	 nombre=$("#altaNombreUsuario").val();
    apellido=$("#altaApeUsuario").val();
     email=$("#altaEmailUsuario").val();
     cel=$("#altaCelUsuario").val();	
      pass=$("#altaPassUsuario").val();	 
	  pass2 =$("#altaPassUsuario2").val();	 
     estatus= $("#altaEstatusUsuario").prop('checked'); 	    
     emailUsuario="reyna@gmail.com";   
	
	if(estatus){
		   estatus=1;		
		     }
		   else{
			estatus=0;
		   }  
		  
		  if( $('#altaCiudadUsuario').val()==null){
			UIkit.modal.alert('Es necesario escoger una ciudad.');
		       }
		  else if( $('#altaProveedorUsuario').val()==null){			  
		UIkit.modal.alert('Es necesario escoger un Proveedor.');		
		     } 
      else if( $('#altaPuestoUsuario').val()==null){			  
		UIkit.modal.alert('Es necesario escoger un Puesto.');		
		     } 			 
        else if	(  $('#altaNombreUsuario').val()=="" ){
			UIkit.modal.alert('Es necesario completar el campo de Nombre.');
		     }
       else if	(  $('#altaApeUsuario').val()=="" ){
			UIkit.modal.alert('Es necesario completar el campo de Apellidos.');
		     }	
       else if	(  $('#altaEmailUsuario').val()=="" ){
			UIkit.modal.alert('Es necesario completar el campo de Email.');
		     }	
	else if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email)) ){
            UIkit.modal.alert('Verifique la dirección de correo electronico (ejemplo@ejemplo.com). ');
          }	 
      else if	(  $('#altaCelUsuario').val()=="" ){
			UIkit.modal.alert('Es necesario completar el campo de Celular.');
		     }	
	 else if ( !(/^\d{10}$/.test(cel)) ){
			UIkit.modal.alert('Es necesario que el Celular solo contenga 10 digitos y sin espacios.');
		     }
     else if	(  $('#altaPassUsuario').val()=="" ){
			UIkit.modal.alert('Es necesario completar el campo de Password.');
		     }	
        else if	(  $('#altaPassUsuario2').val()=="" ){
			UIkit.modal.alert('Es necesario completar el campo de Repetir Password.');
		     }
       else if( (/\s/.test(pass)) || (/\s/.test(pass2)) ){ 
            UIkit.modal.alert('Ingrese un password sin espacios.');
          }	
		else if(!(/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/.test(pass)) ){
            UIkit.modal.alert('La contraseña debe tener mínimo 8 caracteres, al menos una minúscula, al menos una mayúscula y al menos un número o caracter especial. Verifique campo Password ');
          } 
		else if(!(/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/.test(pass2)) ){
            UIkit.modal.alert('La contraseña debe tener mínimo 8 caracteres, al menos una minúscula, al menos una mayúscula y al menos un número o caracter especial. Veifique campo Repetir Password ');
          }
        else if(pass!=pass2){
              UIkit.modal.alert('Los Password no son identicos, intentalo de nuevo.'); 
                   }			 
	   
	   else{
		    
		 $.ajax({    
       method: "POST",dataType: "json",url: "../../../controllers/setCheckTblusuarioproveedor.php",
	   data: {solicitadoBy:"WEB",emailproveedor:email,idtblproveeedor:prove}	         
	              })    
        
            .done(function(mpa2){   
                 if(parseInt(mpa2.datos)==1){
                      UIkit.modal.alert('Este Usuario ya esta registrado.');
                                              }
							else 
						{  
					       $("#agregarNuevoUsuario").addClass("oculto");
					$.ajax({ 
                               method: "POST",dataType: "json",
							   url: "../../../controllers/setTblusuarioproveedor2.php", 
							   data: {solicitadoBy:"WEB",
							   nombreproveedor:nombre,
							   apellidoproveedor:apellido,
							   emailproveedor:email,
							   celularproveedor:cel,
							   activado:estatus,
							   idtblproveedor:prove,
							   idtblnivelacceso:puesto,
							   password:pass,
							   emailcreo:emailUsuario },
							   
							  
				
							 beforeSend: function(){
                              $('#cargarNuevoUsuario').css('display','inline'); }
							
							       })                                                                                                                                                                                               
                                                                                                      
							   .done(function(ms){                                    
       
                                    if(parseInt(ms.success)==1){
									   $("#formAltaUsuario")[0].reset(); //vaciar el formulario
                                      UIkit.modal("#agregarUsuarioDiv").hide();  //oculta el pupop  
                                      								  
                                      UIkit.modal.alert('Usuario Registrado con éxito');
                                     
                               
				                $("#mostrarUsuariosBody").html("");					
				               mostrarUsuariosProveedor();							
								// cantidadColonias(); 

								 
                                    }else {
                                      UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');
                                    }                          
                                  })
                              .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                              .always(function(){  $("#cargarNuevoUsuario").hide(); });	
							  
							  
							
					}
				
				
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
	  
     // .always(function(){  console.log("always");}); //fin ajax	  
	   }  
	  } //fin
	  
	function mostrarPuestos(){	
      
     $.ajax({     
     method: "POST",dataType: "json",url: "../../../controllers/getAllTblnivelaccesoAct.php", 
	 data: {solicitadoBy:"WEB"}}) 
            .done(function(mostC){
				 
				  $('#altaPuestoUsuario').html(""); 
				 $('#modPuesUsuario').html(""); 
				  
				$("#altaPuestoUsuario").append('<option value="" disabled selected readonly >Selecciona un puesto...</option>'); 
				$("#modPuesUsuario").append('<option value="" disabled selected readonly >Selecciona un puesto...</option>'); 
				
                $.each(mostC.datos, function(i,item)				
				 {	  
				      idtblniveleacceso=item.idtblniveleacceso;
				 
				 	 
							 //muestra ciudades en el encabezado de la interfaz principal
                 $("#altaPuestoUsuario").append('<option  value="' + idtblniveleacceso +'">' + mostC.datos[i].tblniveleacceso_nombre + '</option>');
				 $("#modPuesUsuario").append('<option value="' + idtblniveleacceso +'">' + item.tblniveleacceso_nombre + '</option>');  				    
				 
					});	
					
                                 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      //.always(function(){  console.log("always");});
   } //fin de la funcion
   
	//------------- modifica el estatus de una ciudad---------  
 function ModEstatusUsuario(id){
		     activoModificar =  $("#mostrarEstatusU"+id).prop('checked');		
										
			 emaildeUsuario="Flor@gmail.com";
			 
			if(activoModificar){
		       activoModificar=1; 
               $("#estadoU"+id).text("Activo");
			   }
		    else{ activoModificar=0; 
			       $("#estadoU"+id).text("Desactivado");}		   
		
             $.ajax({ 
                   method: "POST",dataType: "json",url: "../../../controllers/setUpdateTblusuariosproveedorEstatus.php", 				  
				   data:{solicitadoBy:"WEB",idtblusuario:id,activado:activoModificar,
				   emailmodifico:emaildeUsuario}}) 
                  .done(function(mg){					 
                            if(parseInt(mg.success)==1){  							 
                              UIkit.modal.alert('Estatus del Usuario Modificado con Éxito'); 
							 
							} else{
                              UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');
                                 }     
								 }) 	  
                  .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                 // .always(function(){  console.log("always");});
		} //fin d ela funcion
	
	
	
	
	
	//muestra proveedores en select de alta y modificar de usuarios en base ciudad que escogio
	function mostrar_provedoresdeUsuarios(){

	      var idtblciudad=$("#altaCiudadUsuario").val();	//se recibe el id que seleciono el usuario del select de Ciudades            
          
     $.ajax({     
     method: "POST",dataType: "json",url: "../../../controllers/getAllProveedorByCiudad.php", 
	 data: {solicitadoBy:"WEB",idtblciudad:idtblciudad }}) 
            .done(function(mf){				
				   if (parseInt(mf.success)==1) {				   
				  
				   $("#altaProveedorUsuario").html("");	
				  $("#altaProveedorUsuario").append('<option value="" disabled selected readonly >Selecciona...</option>'); 
				
                $.each(mf.datos, function(i,item)
				 {	idtblproveedor=item.idtblproveedor;	
				 //muestra ciudades en el encabezado de la interfaz principal 
                 $("#altaProveedorUsuario").append('<option value="' + idtblproveedor +'">' + item.tblproveedor_nombre + '</option>');
				  				 
				   });
				   
				   }else{ 
				    $("#altaProveedorUsuario").html("");
					$("#altaProveedorUsuario").append('<option value="" disabled selected readonly >Selecciona...</option>'); 
				} 
                                 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      
   } //fin de la funcion
   
   function mostrar_provedoresdeUsuarios2(){

	      var idtblciudad=$("#modCiudadUsuario").val();	//se recibe el id que seleciono el usuario del select de Ciudades            
          
     $.ajax({     
     method: "POST",dataType: "json",url: "../../../controllers/getAllProveedorByCiudad.php", 
	 data: {solicitadoBy:"WEB",idtblciudad:idtblciudad }}) 
            .done(function(mfe){				
				   if (parseInt(mfe.success)==1) {				   
				  
				   $("#modProvUsuario").html("");	
				  $("#modProvUsuario").append('<option value="" disabled selected readonly >Selecciona...</option>'); 
				
                $.each(mfe.datos, function(i,item)
				 {	idtblproveedor=item.idtblproveedor;	
				 //muestra ciudades en el encabezado de la interfaz principal 
                 $("#modProvUsuario").append('<option value="' + idtblproveedor +'">' + item.tblproveedor_nombre + '</option>');
				  				 
				   });
				   
				   }else{ 
				    $("#modProvUsuario").html("");
					$("#modProvUsuario").append('<option value="" disabled selected readonly >Selecciona...</option>'); 
				} 
                                 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      
   } //fin de la funcion
   
   
  
   
//-----------------------------------Modificar Datos--------------------------------
   //..............Mostrar datos de la ciudad para posteriormente modificarlos ---------------------- 
   
    function mostrarDatosUsuarioP(id){
           $("#modDiv").html("");
		   //$("#modProvUsuario").html("");	
    $.ajax({ 
       method: "POST",dataType: "json",url: "../../../controllers/getAllTblusuarioproveedorDatos2.php", 
	   data: {solicitadoBy:"WEB",idtblusuarioproveedor:id}})   
            .done(function(msg){   
               
                //console.log(msg);
				$.each(msg.datos, function(x,item){
					  idp= item.idtblusuarioproveedor;
			       //$('#mciudad')[0].reset();				 
				  $("#modIdUsuario").text(idp);
				 $("#modCiudadUsuario").val(item.idtblciudad);
				  $("#modProvUsuario").val(item.tblproveedor_idtblproveedor);
				  $("#modPuesUsuario").val(item.tblniveleacceso_idtblniveleacceso);
                  $("#modNombreUsuario").val(item.tblusuarioproveedor_nombre);
				  $("#modApeUsuario").val(item.tblusuarioproveedor_apellido);
				  $("#modEmailUsuario").val(item.tblusuarioproveedor_email);
				  $("#modCelUsuario").val(item.tblusuarioproveedor_celular);
				  
			
         $("#modDiv").append(
     '<button type="button" class="md-btn md-btn-flat ye uk-float-left" id="ye" '+
     ' onclick="eliminarUsuarioProveedor('+idp+');" >Eliminar</button>'
                );

  
				        })
                   })              
          .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
          //.always(function(){  console.log("always");});				  
	}	//fin
	
	//---------actualizar datos de la colonia
       function actualizarUsuario(){			
               tipo= $("input[name='preguntaPass']:checked").val();
               iddeUsuario= $('#modIdUsuario').text();
			   modProveedor= $('#modProvUsuario').val();                 
			   modPuesto= $('#modPuesUsuario').val(); 		   
	           modNombre= $("#modNombreUsuario").val(); 
			   modApellidos= $('#modApeUsuario').val(); 
			   modCelular= $('#modCelUsuario').val();  
			   modEmail= $('#modEmailUsuario').val();

			   pass= $('#modPassUsuario').val();
			   pass2= $('#modPassUsuario2').val();
			   emaildeUsua="Flor@gmail.com";
				
		  if( $('#modCiudadUsuario').val()==null){
			UIkit.modal.alert('Es necesario escoger una ciudad.');
		       }
		  else if( $('#modProvUsuario').val()==null){			  
		UIkit.modal.alert('Es necesario escoge un Proveedor.');		
		     }         			 
        else if	( $('#modPuesUsuario').val()==null){
			UIkit.modal.alert('Es necesario escoger un Puesto.');
		     }	
		else if	( $('#modNombreUsuario').val()==""){
			UIkit.modal.alert('Es necesario completar el campo Nombre.');
		     }
		else if	( $('#modApeUsuario').val()==""){
			UIkit.modal.alert('Es necesario completar el campo Apellidos.');
		     }
		else if	( $('#modEmailUsuario').val()==""){
			UIkit.modal.alert('Es necesario completar el campo Email.');
		     }	
		else if	( $('#modCelUsuario').val()==""){
			UIkit.modal.alert('Es necesario completar el campo Celular.');
		     }	
		else if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(modEmail)) ){
            UIkit.modal.alert('Verifique la dirección de correo electronico (ejemplo@ejemplo.com). ');
          }		 
		else if ( !(/^\d{10}$/.test(modCelular)) ){
			UIkit.modal.alert('Es necesario que el Celular solo contenga 10 digitos y Sin espacios.');
		     }	 
				
	   else  {
			  
			  if (tipo=="1"){
		           $.ajax({ 
                   method: "POST",dataType: "json",url: "../../../controllers/setUpdateTblusuarioproveedorSinEst.php", 				  
				   data:{solicitadoBy:"WEB",
				  idtblusuarioproveedor:iddeUsuario,
				  nombreproveedor:modNombre,
				  apellidoproveedor:modApellidos,
				  emailproveedor:modEmail,
				  celularproveedor:modCelular,
				  idtblproveedor:modProveedor,
				  idtblnivelacceso:modPuesto,
				  emailmodifico:emaildeUsua}, 
				   beforeSend: function(){
                              $('#cargarModificarUsuario').css('display','inline');						 
				
                                     }
							})
                  .done(function(mg){
					  
					 if(parseInt(mg.success)==1){ 
					 
							UIkit.modal("#mUsuario").hide(); //se oculta el pupop de Modificar colonia                           
                              UIkit.modal.alert('Usuario Modificado con Éxito'); 
							  
							
				               $("#mostrarUsuariosBody").html("");					
				               mostrarUsuariosProveedor();	
								
								
                                       }
							else{
                              UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');
                                 }
								 
								 }) 	  
                  .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                  .always(function(){ $("#cargarModificarUsuario").hide(); //console.log("always");
				  });
			  }//fin de 1
			 
			 if (tipo=="2"){ 
			
			      if ( $('#modPassUsuario').val()==""){
			           UIkit.modal.alert('Es necesario completar el campo Password.');
		                 }
		          else if	( $('#modPassUsuario2').val()==""){
			       UIkit.modal.alert('Es necesario completar el campo Repetir Password.');
		             }
				 else if( (/\s/.test(pass)) || (/\s/.test(pass2)) ){ 
                 UIkit.modal.alert('Ingrese un password sin espacios.');
                     }	
		else if(!(/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/.test(pass)) ){
            UIkit.modal.alert('La contraseña debe tener mínimo 8 caracteres, al menos una minúscula, al menos una mayúscula y al menos un número o caracter especial. Verifique campo Password ');
          } 
		else if(!(/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/.test(pass2)) ){
            UIkit.modal.alert('La contraseña debe tener mínimo 8 caracteres, al menos una minúscula, al menos una mayúscula y al menos un número o caracter especial. Veifique campo Repetir Password ');
          }
        else if(pass!=pass2){
              UIkit.modal.alert('Los Password no son identicos, intentalo de nuevo.'); 
                   }	
           else{
			   
			                        $.ajax({ 
                   method: "POST",dataType: "json",url: "../../../controllers/setUpdateTblusuarioproveedorSinEst2.php", 				  
				   data:{solicitadoBy:"WEB",
				  idtblusuarioproveedor:iddeUsuario,
				  nombreproveedor:modNombre,
				  apellidoproveedor:modApellidos,
				  emailproveedor:modEmail,
				  pass:pass,
				  celularproveedor:modCelular,
				  idtblproveedor:modProveedor,
				  idtblnivelacceso:modPuesto,
				  emailmodifico:emaildeUsua}, 
				   beforeSend: function(){
                              $('#cargarModificarUsuario').css('display','inline');						 
				
                                     }
							})
                  .done(function(mg2){
					  
					 if(parseInt(mg2.success)==1){ 
					 
							UIkit.modal("#mUsuario").hide(); //se oculta el pupop                           
                              UIkit.modal.alert('Usuario Modificado con Éxito'); 						  
							  $('#formUsuario')[0].reset(); //limpia el form								  
							  $("#CambiarPass").addClass("oculto");
				               $("#mostrarUsuariosBody").html("");					
				               mostrarUsuariosProveedor();	
								
								
                                       }
							else{
                              UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');
                                 }
								 
								 }) 	  
                  .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                  .always(function(){ $("#cargarModificarUsuario").hide(); //console.log("always");
				  });
			   
		    }	//fin del else			   
			 
			 }//fin de la 2
		  
	   }	//fin del else 
	}	//fin
	
	
	
	//eliminar datos de usuario
	 function eliminarUsuarioProveedor(idp){ 
   
       
                      email="";
				      cel= "";
					  estatus=2;
		             emaildeUsuario="Flor@gmail.com";	
					 
           UIkit.modal.confirm('Si desea eliminar al usuario,presione Ok', function(){                      
			     
			   
		          $.ajax({ 
                   method: "POST",dataType:"json",
				   url: "../../../controllers/DeleteTblusuarioproveedorDatos.php", 				  
				   data:{solicitadoBy:"WEB",idtblusuarioproveedor:idp,
				   emailproveedor:email,celularproveedor:cel,
				 activado:estatus,emailmodifico:emaildeUsuario} })   
                  .done(function(mgg){
               
            			  
					 if(parseInt(mgg.success)==1){ 					 
						      UIkit.modal("#mUsuario").hide(); //se oculta el pupop de Modificar usuario 
                                								
                              UIkit.modal.alert('Usuario Eliminado con Éxito'); 
							  
							 					           
				              $("#mostrarUsuariosBody").html("");					
				               mostrarUsuariosProveedor();	
							
                                       }
							else{
                              UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');
                                 }
								 
								 }) 	  
                  .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                  
	   });	
	}// fin de la funcion
	
	
	
	
	
	//---------------------------------------Proveedor -----------------------------------------
	
         $("#ye").click(function(){  //funcion para ocultar el logo de la pantalla principal de BP cuando se de de alta un proveedor
			$("#paraInicial").remove(); 
		 }		 
		 );
		 
		 function mostrar_proveedorLista(){

	      var idtblciudad=$("#proveedorCiudad").val();	//se recibe el id que seleciono el usuario del select de Ciudades            
          
     $.ajax({     
     method: "POST",dataType: "json",url: "../../../controllers/getAllProveedorByCiudad.php", 
	 data: {solicitadoBy:"WEB",idtblciudad:idtblciudad }}) 
            .done(function(mf){				
		      if (parseInt(mf.success)==1) {				   
				  $("#divUprov").removeClass('oculto');
				   $("#SelectProveedor").html("");	
				  $("#SelectProveedor").append('<option value="" disabled selected readonly >Selecciona...</option>'); 
				  $("#SelectProveedor").append('<option value="todos">Todos</option>');
				  
                $.each(mf.datos, function(i,item)
				 {	idtblproveedor=item.idtblproveedor;	
				      estatus=item.tblproveedor_activado;     
				 //muestra ciudades en el encabezado de la interfaz principal 
				 
				 if (estatus=="1" || estatus=="0"){ provee=true;
                 $("#SelectProveedor").append('<option value="' + idtblproveedor +'">' + item.tblproveedor_nombre + '</option>');
				
				 
				 }else{ provee=false;}				 
				   });
				   
				   }else{ 
				    $("#SelectProveedor").html("");
					$("#SelectProveedor").append('<option value="" disabled selected readonly >Selecciona...</option>'); 
				} 
                                 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      
   } 
   
   
       
   
	//.-----mostrar cantidad proveedores en base a la ciudad en la que esta----------------------------------------------------------------
	  function cantidadProveedores(){
	   var idtblciudad=$("#proveedorCiudad").val(); 
	   //se recibe el id del select de la ciudad que selecciono el usuario en la pantalla principal
	     
		                //nombre del span que mostrara el numero de proveedores
     var verContador = $("#numeroProveedores"); 
	 
     $.ajax({     
       method: "POST",dataType: "json",
	   url: "../../../controllers/getCountAllTblproveedorByTblCiudad.php", 
	   data: {solicitadoBy:"WEB",tblciudad_idtblciudad:idtblciudad}})
            .done(function(mc){
				   
                     if(parseInt(mc.success)==1){ 
			$("#numeroProveedores").text('Proveedores registrados en esta ciudad: '+mc.datos);		
				 
					 }
						
               //....
				 else{ 
				
				  $("#numeroProveedores").text("No tienes proveedores en esta ciudad ");	
				        
						} 
				 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      
   } 
		 
	  //.-----mostrar ciudades----------------------------------------------------------------
	  function mostrarCiudades(){		  
		                
    
     $.ajax({     
     method: "POST",dataType: "json",url: "../../../controllers/getAllTblciudadAct.php", 
	 data: {solicitadoBy:"WEB"}})
            .done(function(mostCiud){
				   
                $.each(mostCiud.datos, function(i,item)
				 {	idtblciudad=item.idtblciudad;	
				 //muestra ciudades en el encabezado de la interfaz principal
                 $("#proveedorCiudad").append('<option value="' + idtblciudad +'">' + item.tblciudad_nombre + '</option>');
				 $("#altaCiudadUsuario").append('<option value="' + idtblciudad +'">' + item.tblciudad_nombre + '</option>');
				 $("#modCiudadUsuario").append('<option value="' + idtblciudad +'">' + item.tblciudad_nombre + '</option>');
				  				 
                      });	
                                 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      
   } 
   
     //----------mostrar ciudades con colonias asignadas
   
    function mostrarCiudadesConColonias(){		  
		                
    
     $.ajax({     
     method: "POST",dataType: "json",url: "../../../controllers/getAllTblciudadActAByColonia.php", 
	 data: {solicitadoBy:"WEB"}})
            .done(function(mostCiud){
				//console.log(mcol);    
                $.each(mostCiud.datos, function(i,item)
				 {	idtblciudad=item.idtblciudad;	
				
				  //muestra ciudades en pupop para dar de alta proveedor
				 $("#proveedorCiudadAg").append('<option value="' + idtblciudad +'">' + item.tblciudad_nombre + '</option>');
			      
				  //muestra ciudades en pupop para dar modificar proveedor
				 $("#proveedorCiudadModd").append('<option value="' + idtblciudad +'">' + item.tblciudad_nombre + '</option>');
			      
                      });	
                                 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      
   } 
   
   
   
    //-----------mostrar colonias en pupop de alta proveedor----------------------------------------------------------------	  
   function mostrarColonia(){   // esta
	   var idtblciudad=$("#proveedorCiudadAg").val(); //se recibe el id del select de la ciudad que selecciono el usuario
	     
		                //nombre del select que contendra las colonias
     
     //var verColonias2 = $("#proveedorcoloniaMod");
        
     $.ajax({     
       method: "POST",dataType: "json",url: "../../../controllers/getAllTblcoloniaByTblCiudad.php", 
	   data: {solicitadoBy:"WEB",idtblciudad:idtblciudad}})  
            .done(function(mcol){
				
				$("#proveedorcolonia").html("");
              //  $("#proveedorcoloniaMod").html("");				
                 $.each(mcol.datos, function(i,item)
				 {	
				 //muestra colonias en pupop para dar de alta proveedor
                $("#proveedorcolonia").append('<option value="' + item.idtblcolonia +'">' + item.tblcolonia_nombre + '</option>');
                // verColonias2.append('<option value="' + item.idtblcolonia +'">' + item.tblcolonia_nombre + '</option>');
                  
				  });				
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      
   } 
   //...........    esta se activa cuando se va a cambiar la ciudad
   function mostrarColoniaVentana(){
	      var idtblciudad=$("#proveedorCiudadModd").val(); //se recibe el id del select de la ciudad que selecciono el usuario
	     
		                //id del select que contendra las colonias
     	 
        
     $.ajax({     
       method: "POST",dataType: "json",url: "../../../controllers/getAllTblcoloniaByTblCiudad.php", 
	   data: {solicitadoBy:"WEB",idtblciudad:idtblciudad}})
            .done(function(mcol){
				
				
				$("#proveedorcoloniaMod").html(""); 
                 $.each(mcol.datos, function(i,item)
				 {	
				 //muestra colonias en pupop para modificar proveedor
                  $("#proveedorcoloniaMod").append('<option value="' + item.idtblcolonia +'">' + item.tblcolonia_nombre + '</option>');
                  
				  });
				
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      
   }
   //............................... mostrar colonias en pupop de modificar proveedor
    // muestra la colonia guardada   .......................................
    function mostrarColoniaModificar(proCiudad){	   
	     
		//proCiudad= $("#idciudad"+idproveedor).text();
		
     $.ajax({     
       method: "POST",dataType: "json",url: "../../../controllers/getAllTblcoloniaByTblCiudad.php", 
	   data: {solicitadoBy:"WEB",idtblciudad:proCiudad}}) 
            .done(function(mcolj){
					 $("#proveedorcoloniaMod").empty();		
				
                 $.each(mcolj.datos, function(i,item)
				 {					 
				  //muestra colonias en pupop para modificar proveedor
				 $("#proveedorcoloniaMod").append('<option value="' + item.idtblcolonia +'">' + item.tblcolonia_nombre + '</option>');
                  
				  });               
				
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      
   }  
  
   
   //----- mostrar paquetes ---------------------------------------------------------------------
   function mostrarPaquete(){
		             //nombre del select que contendra las paquetes
     var AgregarPaquete = $("#proveedorpaquete");
	 var ModificarPaquete = $("#proveedorpaquetemod");	      
    
     $.ajax({    //inicia ajax  
       method: "POST",dataType: "json",url: "../../../controllers/getAllTblpaqueteAct.php",
	   data: {solicitadoBy:"WEB"}})
            .done(function(mpaq){
				
                 $.each(mpaq.datos, function(i,item)
				 {				 
                 AgregarPaquete.append('<option value="' + item.idtblpaquete +'">' + item.tblpaquete_nombre + '</option>');
                ModificarPaquete.append('<option value="' + item.idtblpaquete +'">' + item.tblpaquete_nombre + '</option>');
                });
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      
   } 
   
      
   //..............Mostrar proveedores registrados en base a la ciudad ----------------------      
   
         function mostrarProveedor(){
			
		    var tblciudad_idtblciudad=$("#proveedorCiudad").val();	//se recibe el id que seleciono el usuario del select de Ciudades            
          
			 //alert("entrando a la funcion mostrar proveedor"+tblciudad_idtblciudad);
         $.ajax({ 
        method: "POST",dataType: "json",url: "../../../controllers/getAllTblproveedorbyTblciudad.php", 
		data: {solicitadoBy:"WEB",tblciudad_idtblciudad:tblciudad_idtblciudad},
		    beforeSend: function(){
                              $('#esperarMostrarProveedor').css('display','inline');								  
                                                 }
		
		})
          .done(function(mprov){
				
				 if(parseInt(mprov.success)==1){
					 nohaypp=true;
                     $("#paraInicial").addClass('oculto'); 
					 
				     $('#listarProveedor').html("");                   
                  $.each(mprov.datos, function(g,item)
				 {	
			         idtblciudad=item.idtblciudad;	
				      
				     idproveedor=item.idtblproveedor;               
                     proCiudad=item.tblciudad_idtblciudad;
					 estatus = item.tblproveedor_activado;
				    		
				  if (estatus=="1" || estatus=="0"){ muestra=true;
				  $("#listarProveedor").append(
				  '<div class="md-card"> <form class="uk-form"> <div class="md-card-content"> <div class="uk-grid uk-grid-divider" data-uk-grid-margin>'+
							  '<div class="uk-width-medium-1-2">'+
							 
							  '<div class="md-card-head-menu" >'+
							 
	              '<a class="md-fab md-fab-small md-fab-accent uk-float-right" href="#modificar" id="botonmodificarProve'+g+'"'+
		          ' data-uk-modal="{target:"#modificar",bgclose:false, center:true }" onclick="datosmodificarUsuario('+
	                         //  idproveedor+');mostrarColoniaModificar();" >'+  
                          idproveedor+'); mostrarColoniaModificar('+proCiudad+');" >'+ 							   
							  ' <i class="material-icons">&#xe254;</i>'+            					  
                               '</a> '+	
					 
								
								 '<button type="button" class="md-fab md-fab-small md-fab-accent uk-float-left" onclick="eliminarUsuario('+idproveedor+')" '+
				       'id="botonEliminarProvee'+g+'">'+ ' <i class="material-icons">&#xE872;</i>'+   
					   '</button>'+  ' </div>'+
								
							    '<ul class="md-list">'+
							    '<li class="uk-text-center">'+ 
	              '<img id="tama" name="tama" src="../../assests_general/proveedor/logoProveedor/'+
	                                   item.tblproveedor_srclogo+'" />'+
                                '</li> <li>'+                               
                                '<div class="md-list-content">'+
                                '<h4 class="uk-text-bold">Proveedor</h4>'+								
                                '<span class="mayus">'+item.tblproveedor_nombre+'</span>'+
                                '</div> </li>'+							      
                                    
								'<li>'+
                                '<div class="md-list-content">'+
                                '<span class="uk-text-small uk-text-muted">Descripci&oacute;n</span>'+
                                '<span>'+item.tblproveedor_descripcion+'</span>'+
                                '</div>'+
                                '</li>'+
															
                                '<li>'+
                                '<div class="md-list-content">'+
                                '<span class="uk-text-small uk-text-muted">Email</span>'+
                                '<span id="idemail'+idproveedor+'">'+item.tblproveedor_email+'</span>'+
                                '</div></li>'+
								'<li>'+
                                '<div class="md-list-content">'+
                                '<span class="uk-text-small uk-text-muted">SEO</span>'+
                                '<span>'+item.tblproveedor_seo+'</span>'+
                                '</div>'+
                                '</li>'+
								'<li>'+
                                '<div class="md-list-content">'+
                                '<span class="uk-text-small uk-text-muted">Celular</span>'+
                                '<span id="idcel'+idproveedor+'">'+item.tblproveedor_celular+'</span>'+
                                '</div>'+
                                '</li>'+
								'<li>'+
                                    '<div class="md-list-content">'+                                    
                                      '<span class="uk-text-small uk-text-muted">Banco</span>'+
                                        '<span id="idbanco'+idproveedor+'">'+item.tblproveedor_banco+'</span> '+   
                                    '</div>'+
                                    '</li>'+
									'<li>	'+							
                                    '<div class="md-list-content">'+
                                       '<span class="uk-text-small uk-text-muted">CLABE interbancaria</span>'+
                                       ' <span id="idclave'+idproveedor+'">'+item.tblproveedor_claveintban +'   </span>'+
                                       '</div></li>'+
									   '<li>	'+							
                                    '<div class="md-list-content">'+
                                       '<span class="uk-text-small uk-text-muted">Nombre del Titular de la Cuenta</span>'+
                                       ' <span id="idtitular'+idproveedor+'">'+item.tblproveedor_nombretitucuen +  '</span>'+
                                       '</div></li>'+
								
                                 '</ul></div>'+
						 '<div class="uk-width-medium-1-2">'+
                         '<div class="md-card-content">'+
                            '<ul class="md-list">'+										   
									 
									   ' <li>'+   
                                    '<div class="md-list-content">'+
                                       '<span class="uk-text-small uk-text-muted">RFC</span>'+
                                       ' <span id="idrfc'+idproveedor+'">'+ item.tblproveedor_rfc  +'</span>'+
                                   ' </div> </li>'+
								   
								   '<li>'+
                                '<div class="md-list-content">'+
							    '<span class="uk-text-small uk-text-muted">Tel&eacute;fono</span>'+
                                '<span id="paraTelefono'+idproveedor+'"></span>'+
                                 '</div> </li>'+
								 '<li>'+
                                '<div class="md-list-content" >'+
                                '<span class="uk-text-small uk-text-muted">Extencion</span>'+                              
								'<span id="paraextencion'+idproveedor+'">'+mprov.datos[g].tblproveedor_extencion+'</span>'+
                                '</div>'+  
                                '</li>'+
							'<li>'+
                                '<div class="md-list-content">'+
                                '<span class="uk-text-small uk-text-muted">Direcci&oacute;n</span>'+
                                '<span id="iddirecc'+idproveedor+'">'+item.tblproveedor_direccion+'</span>'+
                                '</div>'+
                             '</li>'+
							 '<li>'+
                                '<div class="md-list-content">'+
                                '<span class="uk-text-small uk-text-muted">Ciudad</span>'+
								 '<span id="idciudad'+idproveedor+'" class="oculto">'+item.idtblciudad+'</span>'+
                                '<span id="idciud'+idproveedor+'">'+item.tblciudad_nombre+'</span>'+
                                '</div>'+
                             '</li>'+
							 '<li>'+
                                '<div class="md-list-content">'+
                                '<span class="uk-text-small uk-text-muted">Colonia</span>'+
                                '<span id="idcolonia'+idproveedor+'">'+item.tblcolonia_nombre+'</span>'+
                                '</div>'+
                             '</li>'+								
								'<li>'+
                                '<div class="md-list-content">'+
                                '<span class="uk-text-small uk-text-muted">Tipo de paquete</span>'+
                                '<span>'+item.tblpaquete_nombre+'</span>'+
                                '</div>'+
                                '</li>'+
								   ' <li>'+								
                                    '<div class="md-list-content">'+
                                   ' <span class="uk-text-small uk-text-muted">Tipo de servicio</span>'+
                                    ' <span>'+item.tbltiposervicio_nombre+'</span>'+
                                    '</div> </li> <li>'+
                                   ' <div class="md-list-content">'+
                                     ' <span class="uk-text-small uk-text-muted">Tipo de pedido</span>'+
                                       ' <span>'+item.tbltipopedido_nombre+'</span>'+
                                   ' </div>  </li> <li>'+								
				                  '<div class="md-list-content" >'+
                                  '<span class="uk-text-small uk-text-muted">Estatus</span> '+								  
									    
					'&nbsp;&nbsp;'+'<input type="checkbox" id="mar'+idproveedor+'"  onclick="actualizarProv('+idproveedor+');" class="checkbox" name="checkbox" '+						                                                   
								          item.tblproveedor_activado+'/> '+
								   ' <span class="md-list-heading uk-float-left" id="estadoProveedor'+idproveedor+'"> </span>'+
									                             
                                    ' </div> </li> </ul>  </div>  </div>'+
									'</div> </div> </form> </div> '										 
									);									
							     
			            			
                                  
								          if(parseInt(item.tblproveedor_activado)!=0){
                                          $("#mar"+idproveedor).prop("checked", true);										 
										  $('#estadoProveedor'+idproveedor).text("Activo");
										 
                                           }
						                  else {
                                          $("#mar"+idproveedor).prop("checked", false);
                                           $('#estadoProveedor'+idproveedor).text("Desactivado");  										  
										    } 
							
                                         if(mprov.datos[g].tblproveedor_extencion==null || mprov.datos[g].tblproveedor_extencion==""){
									        $("#paraextencion"+idproveedor).text("----------");										   
								                } else{
										 $("#paraextencion"+idproveedor).text(mprov.datos[g].tblproveedor_extencion);			
											} 
											
									      if(mprov.datos[g].tblproveedor_telefonotienda==null || mprov.datos[g].tblproveedor_telefonotienda==""){
										 $("#paraTelefono" +idproveedor).text("----------");          
                                            }else{
										 $("#paraTelefono"+idproveedor).text(mprov.datos[g].tblproveedor_telefonotienda);			
											} 	
											
											 
						          
							//........................
				  }else{muestra=false;}
                            }				
				            );				     
                            //----------------------
                                      }
							else 
						{     nohaypp=false;				 
				  $("#paraInicial").removeClass('oculto'); 
				  $("#listarProveedor").html("");					
				
					  }
			 
              })
			 
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      .always(function(){ $("#esperarMostrarProveedor").hide();  });
	  
   } //fin de la funcion
   
   function eliminarUsuario(idproveedor){ 
   
                      email=$("#idemail"+idproveedor).val();
				      cel= $("#idcel"+idproveedor).val();
					  banco = $("#idbanco"+idproveedor).val();
					  clave = $("#idclave"+idproveedor).val();
					  titular = $("#idtitular"+idproveedor).val();
					  rfc = $("#idrfc"+idproveedor).val();
					  tel = $("#paraTelefono"+idproveedor).val();
					  ext= $("#paraextencion"+idproveedor).val();
					  direcc = $("#iddirecc"+idproveedor).val();
					  estatus=2;
					  tblciudad_idtblciudad=$("#proveedorCiudad").val();			   
		             emaildeUsuario="Flor@gmail.com";	
					 
           UIkit.modal.confirm('Si desea eliminar al usuario,presione Ok', function(){                      
			     
			   
		          $.ajax({ 
                   method: "POST",dataType:"json",
				   url: "../../../controllers/setDeleteTblproveedor1.php", 				  
				   data:{solicitadoBy:"WEB",id:idproveedor,email:email,cel:cel,
				 banco:banco,clave:clave,titular:titular,rfc:rfc,tel:tel,ext:ext,
				   dire:direcc,estatus:estatus,emailmodifico:emaildeUsuario} })   
                  .done(function(mgg){
                    			  
					 if(parseInt(mgg.success)==1){ 					 
							//UIkit.modal("#modificar").hide(); //se oculta el pupop de Modificar usuario 
                                								
                              UIkit.modal.alert('Proveedor Eliminado con &eacute;xito'); 
							  
							 $('#proveedorCiudad').val( tblciudad_idtblciudad);					           
				             $('#listarProveedor').html("");					
				             mostrarProveedor();
							 cantidadProveedores();
							 mostrar_proveedorLista();
                                       }
							else{
                              UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');
                                 }
								 
								 }) 	  
                  .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                  
		  
	   });	 
	}// fin de la funcion
      
   //-----------------------------------Modificar Datos--------------------------------
   //..............Mostrar datos de proveedor para posterioemente modificarlos ----------------------    
    function datosmodificarUsuario(idproveedor){
           // alert("entrando a mostrar datos de un proveedor en especifico");
    $.ajax({ 
       method: "POST",dataType: "json",url: "../../../controllers/getTblproveedorByCiudad.php", 
	   data: {solicitadoBy:"WEB",idtblproveedor:idproveedor}})
            .done(function(msg){
                
				
			  $('#pantallaModificar')[0].reset();
			  $('#espacioTipoServicio').html("");			 
              $('#espacioTipoPedido').html(""); 
			  $('#parafoto').html(""); 
			  
                 $.each(msg.datos, function(x,item){
			
			  $("#parafoto").append('<label for="task_title">Foto de perfil</label> <br/><br/>'+				
		      '<img id="tama2" name="tama2" src="../../assests_general/proveedor/logoProveedor/'+
	                                 item.tblproveedor_srclogo+'" />'                                 						   
				  ); 
				 
				 
				  $("#idproveedor").text(item.idtblproveedor); 				  
                  $("#proveedornombremodificar").val(item.tblproveedor_nombre);				  
                  $("#proveedordesmodificar").val(item.tblproveedor_descripcion);
                  $("#proveedoremailmodificar").val(item.tblproveedor_email);
				  
				  $("#rfcModificar").val(item.tblproveedor_rfc);
				  $("#bancoModificar").val(item.tblproveedor_banco);
				  $("#claveModificar").val(item.tblproveedor_claveintban);
				  $("#titularModificar").val(item.tblproveedor_nombretitucuen);
				  
                  $("#proveedorseomodificar").val(item.tblproveedor_seo);
				  $("#proveedorcelularmodificar").val(item.tblproveedor_celular);
				  $("#proveedortelefonomodificar").val(item.tblproveedor_telefonotienda);
				  $("#proveedorextensionmodificar").val(item.tblproveedor_extencion);				       
				  $("#proveedorCiudadModd").val(item.tblciudad_idtblciudad);
				  $("#proveedorcoloniaMod").val(item.tblcolonia_idtblcolonia);
				  $("#proveedordireccionmodificar").val(item.tblproveedor_direccion);
				  $("#proveedorpaquetemod").val(item.tblpaquete_idtblpaquete);
				  
				  				  
			  	  $("#espacioTipoPedido").append('<label for="task_priority" '+
				               'class="uk-form-label">Tipo de pedido</label>'+
                               ' <div>'+
                                ' <span class="icheck-inline">'+
                                '<input type="radio" name="tipopedidomodificar" '+
								item.tbltipopedido_idtbltipopedido+
								'class="clasepedido" value="1" id="mismodiamod" data-md-icheck />'+
                                '<label>Para el mismo d&iacute;a</label> '+
                                '</span>'+
                                '</div>  <div>'+					 
                                '<span class="icheck-inline">'+
                                '<input type="radio" name="tipopedidomodificar" '+
								item.tbltipopedido_idtbltipopedido+
								'class="clasepedido" value="2" id="sobrepedidomod"  data-md-icheck />'+
                                '<label>Solo sobre pedido</label>'+ 
                                '</span> </div>  <div>'+
							    '<span class="icheck-inline">'+
                                '<input type="radio" name="tipopedidomodificar" '+
								item.tbltipopedido_idtbltipopedido+
								'class="clasepedido" value="3" id="diaypedidomod"  data-md-icheck />'+
                                '<label>El mismo d&iacute;a y sobre pedido</label> '+
                                '</span>'+
                                '</div>'
				                 );
				  
			 
								
				    if(parseInt(item.tbltipopedido_idtbltipopedido)==1)
					{
						$("#mismodiamod").attr('checked', true);
						   
					}
					else if(parseInt(item.tbltipopedido_idtbltipopedido)==2)
					{
						$("#sobrepedidomod").attr('checked', true);
						   
					}
					else if(parseInt(item.tbltipopedido_idtbltipopedido)==3)
					{
						$("#diaypedidomod").attr('checked', true);
					}
					
					
					 
				  $("#espacioTipoServicio").append('<label for="task_priority" '+
				           'class="uk-form-label">Tipo de servicio</label>'+                            					    
						   '<div> <span class="icheck-inline">'+
                           '<input type="radio" name="tipodeserviciomodificar" value="1"'+
					       item.tbltiposervicio_idtbltiposervicio+
					       ' id="tiendamod" data-md-icheck /> '+
                           '<label>Entrega en tienda</label> '+
                           '</span> </div>	'+
						   '<div> <span class="icheck-inline">'+
                           ' <input type="radio" name="tipodeserviciomodificar" '+
						   item.tbltiposervicio_idtbltiposervicio+
						   'value="2" id="domiciliomod" data-md-icheck />'+
                           '<label>Entrega a domicilio</label>'+ 
                           '</span> </div>'+
                           '<div> <span class="icheck-inline">'+
                           '<input type="radio" name="tipodeserviciomodificar" '+
						   item.tbltiposervicio_idtbltiposervicio+
						   'value="3" id="tiendadomiciliomod" data-md-icheck />'+
                         ' <label >Entrega en tienda y domicilio</label> </span></div>'				  
				          );
				          
				   if(parseInt(item.tbltiposervicio_idtbltiposervicio)==1)
					{
						$("#tiendamod").attr('checked', true);
						   
					}
					else if(parseInt(item.tbltiposervicio_idtbltiposervicio)==2)
					{
						$("#domiciliomod").attr('checked', true);
						   
					}
					else if(parseInt(item.tbltiposervicio_idtbltiposervicio)==3)
					{
						$("#tiendadomiciliomod").attr('checked', true);
					}
				//--------------------------------
				 
                 })
              })
          .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
         

    
  }
    
 //--------------------Funcion para modificar el estatus de cada proveedor-----------------------------------------
 
 function actualizarProveedor(){
	 
                  idusuario= $('#idproveedor').text(); 			   
	           nombreModificar= $("#proveedornombremodificar").val();				  
               descripcionModificar= $("#proveedordesmodificar").val();
               emailModificar= $("#proveedoremailmodificar").val();
               seoModificar= $("#proveedorseomodificar").val();
			   celularModificar= $("#proveedorcelularmodificar").val();
			   telefonoModificar= $("#proveedortelefonomodificar").val();
			   extensionModificar= $("#proveedorextensionmodificar").val();			   
			   rfcParaModificar= $("#rfcModificar").val();
			   bancoParaModificar= $("#bancoModificar").val();
			   claveParaModificar= $("#claveModificar").val();
			   titularParaModificar= $("#titularModificar").val();			   
			   direccionModificar= $("#proveedordireccionmodificar").val();
			   ciudadModificar= $("#proveedorCiudadModd").val();
			   coloniaModificar= $("#proveedorcoloniaMod").val();
			   paqueteModificar= $("#proveedorpaquetemod").val();
			   emaildeProveedor="Flor@gmail.com";
			    	    
			   servicioModificar= $("input[name='tipodeserviciomodificar']:checked").val();				 
						if($("#tiendamod").prop('checked')){
						        servicioModificar=1;
					            }
					    else if($("#domiciliomod").prop('checked')){
						        servicioModificar=2;
					            }
					    else if($("#tiendadomiciliomod").prop('checked')){
						        servicioModificar=3;
					             }
								 
			   pedidoModificar= $("input[name='tipopedidomodificar']:checked").val();			 
			                  if($("#mismodiamod").prop('checked')){
						         pedidoModificar=1;
					            }
					          else if($("#sobrepedidomod").prop('checked')){
						         pedidoModificar=2;
					           }
					          else if($("#diaypedidomod").prop('checked')){
						      pedidoModificar=3;
					             }
	  
   
    srcimgActual=$("#tama2").attr("src"); //id de ftografia actual se recupera su valor del src
   // alert('srcimgActual::'+srcimgActual);
    srcimgActual=srcimgActual.replace('../../assests_general/proveedor/logoProveedor/', '');
    //alert('srcimgActual::'+srcimgActual);

    // input nuevo
    srcimg1=$("#logoproveedorV2").val().replace(/C:\\fakepath\\/i, '');
    nuevaImagen=$("#logoproveedorV2").val().replace(/C:\\fakepath\\/i, '');
   
	           
		
              //si contine foto el input nuevo, le asignamos el nombre de la nueva imagen
              
	     
	  if(srcimg1!=''){  //--------si tiene foto el input------------------------------------------------- 

                            if ( $('#proveedornombremodificar').val()=="" )
		                          { UIkit.modal.alert('Es necesario completar el campo Nombre del proveedor.'); }		   
		
		                    else if ( $('#proveedordesmodificar').val()=="" )
		                         { UIkit.modal.alert('Es necesario completar el campo Descripcion del proveedor.'); }
		   
	                    else if ( $('#proveedoremailmodificar').val()=="" )
	                           {  UIkit.modal.alert('Es necesario completar el campo de Email.');
                                            }
	   else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(emailModificar))   )
	              {      
                UIkit.modal.alert('Verifique la direcci&oacute;n de correo electr&oacute;nico (ejemplo@ejemplo.com).');
                  }			 
	   else if	( $('#proveedorseomodificar').val()=="" )   
	          { UIkit.modal.alert('Es necesario completar el campo de SEO.');
                }
	else if ( $('#proveedorcelularmodificar').val()=="" )
	        { UIkit.modal.alert('Es necesario completar el campo de Celular.');
                }
      else  if(!(/^\d{10}$/.test(celularModificar))  )
	                {      
              UIkit.modal.alert('Verifique que el N&uacute;mero de Celular contenga 10 D&iacute;gitos.');
			         } 				
     else if ( $('#bancoModificar').val()=="" )	
	         { UIkit.modal.alert('Es necesario completar el campo de Banco.');
                }		 
     else if ( $('#claveModificar').val()=="" )
	          { 
		  UIkit.modal.alert('Es necesario completar el campo de CLABE Interbancaria.');
                  }
	 else if (!(/^\d{18}$/.test(claveParaModificar))  )
	            {      
              UIkit.modal.alert('Verifique que la CLABE Interbancaria contenga 18 D&iacute;gitos.');
			    } 
	  else if( $('#titularModificar').val()=="" )
	           { 
		   UIkit.modal.alert('Es necesario completar el campo de Titular de la cuenta.');
                  }		  
	   else if ( $('#rfcModificar').val()=="") //rfcParaModificar= $("#rfcModificar
	            { 
			UIkit.modal.alert('Es necesario completar el campo de RFC.');
                  }
	   else  if (!(/^[A-Z,Ñ,&]{3,4}[0-9]{2}[0-1][0-9][0-3][0-9][A-Z,0-9]?[A-Z,0-9]?[0-9,A-Z]?$/.test(rfcParaModificar))  )
	           {       // VECJ940 3    2   4   X9U
              UIkit.modal.alert('Verifique el RFC tenga puras letras may&uacute;sculas y entre 12 y 13 caracteres.');
			   } 			  
	else if ( $('#proveedorCiudadModd').val()==null)	
		        { 
			UIkit.modal.alert('Es necesario escoger una Ciudad.');
                  }
	    else if ( $('#proveedorcoloniaMod').val()==null)	
		        { 
			UIkit.modal.alert('Es necesario escoger una colonia.');
                  }	
           else if ( $('#proveedordireccionmodificar').val()=="" )	
		          { UIkit.modal.alert('Es necesario completar el campo de Direcci&oacute;n.');
			      }				  
		else if ( $('#proveedorpaquetemod').val()==null   )
		        { 
			   UIkit.modal.alert('Es necesario escoger un paquete.');
                  }	
	
		 else if ( $('#proveedortelefonomodificar').val()!="" && !(/^\d{10}$/.test(telefonoModificar)) ){				    
                  UIkit.modal.alert('Verifique que el N&uacute;mero de Tienda contenga 10 D&iacute;gitos.');
                    } 			
			
	    else if ( $('#proveedorextensionmodificar').val()!="" && !(/^\d{1,4}$/.test(extensionModificar))  )
	              {      
                  UIkit.modal.alert('Verifique que el N&uacute;mero de Extensi&oacute;n no sobrepase 4 D&iacute;gitos.');
                    } 

	    else{
                       srcimg1='logo_proveedor'+idusuario+'_'+srcimg1;
                       $('#modificar_srcimg1_producto_ComplementarioBD').val(srcimg1);  //input oculto
	  
                       //borramos el archivo actual de la fotografia en el servidor
                       $.ajax({ method: "POST",  dataType: "json",  
	                   url: "../../../controllers/setDeleteFileImgProveedor.php", 
	                   data: {solicitadoBy:"WEB",tblproveedorimg_srcimg:srcimgActual} }) 
                      .done(function( datos ){
                       borradafoto=true;
                       })
                       .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
        

                       //subimos la nueva fotografia al servidor
                       var formData = new FormData($("#pantallaModificar")[0]);

                       //var ruta = "imagen-ajax.php";
                       $.ajax({  method: "POST",
		               url: "../../../controllers/uploadImgProveedor.php", 
		               data: formData ,contentType: false,
                       processData: false, })
                      .done(function( datos ){
						  
                      		if(datos=="success"){	
							subioNuevaFoto=true;
							//--------actualiza datos
                      $.ajax({ method: "POST",dataType: "json",url: "../../../controllers/setUpdateTblproveedor2.php", 				  
				   data:{solicitadoBy:"WEB",idtblproveedor:idusuario,
				   nombreprov:nombreModificar,srclogo:srcimg1, 
				   descripcion:descripcionModificar,
				   direccion:direccionModificar,
				   seo:seoModificar,
				   telftienda:telefonoModificar,
				   extencion:extensionModificar,
				   celular:celularModificar,
				   email:emailModificar,
                   rfc:rfcParaModificar,
			       banco:bancoParaModificar,
			       clave:claveParaModificar,
			       titular:titularParaModificar,				   
				   idtbltipopedido:pedidoModificar,
				   idtbltiposervicio:servicioModificar,
				   idtblcolonia:coloniaModificar,
				   idtblpaquete:paqueteModificar,
				   emailmodifico:emaildeProveedor},
				   beforeSend: function(){
				   $('#cargarModificarProveedor').css('display','inline');}	
				   
				   })
       .done(function(mesg){
		    if(parseInt(mesg.success)==1){   
                        UIkit.modal("#modificar").hide(); //se oculta el pupop de Modificar Proveedor                        
                        UIkit.modal.alert('Proveedor Modificado con &eacute;xito');                             
						$("#proveedorCiudad").val(ciudadModificar);
				        $('#listarProveedor').html("");					
				        mostrarProveedor();	
						mostrar_proveedorLista();
                       $('#pantallaModificar')[0].reset(); //limpia el form	         
			}else{   UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');}
                                  })
        .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
        .always(function(){ $("#cargarModificarProveedor").hide(); });
							
						//-----------------	
							} else { subioNuevaFoto=false;
							     UIkit.modal.alert(datos);   
							
							}
            
                      }).fail(function( jqXHR, textStatus )  {console.log("fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
                        
					


		//......................... 
              }
		  
	  } else{
		       //si no tiene foto el input nuevo solo asignamos  el mismo nombre que tenia anteriormente
         srcimg1=srcimgActual;
		 
           if ( $('#proveedornombremodificar').val()=="" )
		 { UIkit.modal.alert('Es necesario completar el campo Nombre del proveedor.'); }		   
		
	    else if ( $('#proveedordesmodificar').val()=="" )
		      { UIkit.modal.alert('Es necesario completar el campo Descripcion del proveedor.'); }
		   
	     else if ( $('#proveedoremailmodificar').val()=="" )
	           {  UIkit.modal.alert('Es necesario completar el campo de Email.');
                                            }
	   else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(emailModificar))   )
	              {      
                UIkit.modal.alert('Verifique la direcci&oacute;n de correo electr&oacute;nico (ejemplo@ejemplo.com).');
                  }			 
	   else if	( $('#proveedorseomodificar').val()=="" )   
	          { UIkit.modal.alert('Es necesario completar el campo de SEO.');
                }
	else if ( $('#proveedorcelularmodificar').val()=="" )
	        { UIkit.modal.alert('Es necesario completar el campo de Celular.');
                }
      else  if(!(/^\d{10}$/.test(celularModificar))  )
	                {      
              UIkit.modal.alert('Verifique que el N&uacute;mero de Celular contenga 10 D&iacute;gitos.');
			         } 				
     else if ( $('#bancoModificar').val()=="" )	
	         { UIkit.modal.alert('Es necesario completar el campo de Banco.');
                }		 
     else if ( $('#claveModificar').val()=="" )
	          { 
		  UIkit.modal.alert('Es necesario completar el campo de CLABE Interbancaria.');
                  }
	 else if (!(/^\d{18}$/.test(claveParaModificar))  )
	            {      
              UIkit.modal.alert('Verifique que la CLABE Interbancaria contenga 18 D&iacute;gitos.');
			    } 
	  else if( $('#titularModificar').val()=="" )
	           { 
		   UIkit.modal.alert('Es necesario completar el campo de Titular de la cuenta.');
                  }		  
	   else if ( $('#rfcModificar').val()=="") //rfcParaModificar= $("#rfcModificar
	            { 
			UIkit.modal.alert('Es necesario completar el campo de RFC.');
                  }
	   else  if (!(/^[A-Z,Ñ,&]{3,4}[0-9]{2}[0-1][0-9][0-3][0-9][A-Z,0-9]?[A-Z,0-9]?[0-9,A-Z]?$/.test(rfcParaModificar))  )
	           {       // VECJ940 3    2   4   X9U
              UIkit.modal.alert('Verifique el RFC tenga puras letras may&uacute;sculas y entre 12 y 13 caracteres.');
			   } 			  
	else if ( $('#proveedorCiudadModd').val()==null)	
		        { 
			UIkit.modal.alert('Es necesario escoger una Ciudad.');
                  }
	    else if ( $('#proveedorcoloniaMod').val()==null)	
		        { 
			UIkit.modal.alert('Es necesario escoger una colonia.');
                  }	
           else if ( $('#proveedordireccionmodificar').val()=="" )	
		          { UIkit.modal.alert('Es necesario completar el campo de Direcci&oacute;n.');
			      }				  
		else if ( $('#proveedorpaquetemod').val()==null   )
		        { 
			   UIkit.modal.alert('Es necesario escoger un paquete.');
                  }	
	
		 else if ( $('#proveedortelefonomodificar').val()!="" && !(/^\d{10}$/.test(telefonoModificar)) ){				    
                  UIkit.modal.alert('Verifique que el N&uacute;mero de Tienda contenga 10 D&iacute;gitos.');
                    } 			
			
	    else if ( $('#proveedorextensionmodificar').val()!="" && !(/^\d{1,4}$/.test(extensionModificar))  )
	              {      
                  UIkit.modal.alert('Verifique que el N&uacute;mero de Extensi&oacute;n no sobrepase 4 D&iacute;gitos.');
                    } 	
							
		else{			
	
	               $.ajax({ method: "POST",dataType: "json",url: "../../../controllers/setUpdateTblproveedor2.php", 				  
				   data:{solicitadoBy:"WEB",idtblproveedor:idusuario,
				   nombreprov:nombreModificar,srclogo:srcimg1, 
				   descripcion:descripcionModificar,
				   direccion:direccionModificar,
				   seo:seoModificar,
				   telftienda:telefonoModificar,
				   extencion:extensionModificar,
				   celular:celularModificar,
				   email:emailModificar,
                   rfc:rfcParaModificar,
			       banco:bancoParaModificar,
			       clave:claveParaModificar,
			       titular:titularParaModificar,				   
				   idtbltipopedido:pedidoModificar,
				   idtbltiposervicio:servicioModificar,
				   idtblcolonia:coloniaModificar,
				   idtblpaquete:paqueteModificar,
				   emailmodifico:emaildeProveedor},
				   beforeSend: function(){
				   $('#cargarModificarProveedor').css('display','inline');}	})
       .done(function(mesg){
      
		
       // if(nuevaImagen=='')
        //{   //se hace si NO se subio nueva foto
	         //anterior=true;
                        UIkit.modal("#modificar").hide(); //se oculta el pupop de Modificar Proveedor                        
                        UIkit.modal.alert('Proveedor Modificado con &eacute;xito');                             
						$("#proveedorCiudad").val(ciudadModificar);
				        $('#listarProveedor').html("");					
				        mostrarProveedor();	
						mostrar_proveedorLista();
                       $('#pantallaModificar')[0].reset(); //limpia el form         
        
         })
        .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
        .always(function(){ $("#cargarModificarProveedor").hide(); });
		}
		
		}	
  } //fin de la funcion
 
  
 
 //------------------------------------- actualiza el estatus del proveedor-------------------------
      function actualizarProv(idproveedor){
		     activoModificar = $("#mar"+idproveedor).prop('checked');		
										
			 emaildeProveedor="Flor@gmail.com";
			 
			if(activoModificar){
		       activoModificar=1;             
           $('#estadoProveedor'+idproveedor).text("Activo"); 
			   }
		    else{ 
			activoModificar=0; 
			$('#estadoProveedor'+idproveedor).text("Desactivado");          
		}		   
		           
		  $.ajax({ 
                   method: "POST",dataType: "json",url: "../../../controllers/setUpdateTblproveedorEstatus.php", 				  
				   data:{solicitadoBy:"WEB",idtblproveedor:idproveedor,
				   activado:activoModificar,emailmodifico:emaildeProveedor}})
                  .done(function(mg){
					  
                            if(parseInt(mg.success)==1){                             
                              UIkit.modal.alert('Estatus de Proveedor Modificado con &eacute;xito'); 
							} else{
                              UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');
                                 }     
								 }) 	  
                  .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                 
			 
	} //fin de la funcion
  
   
   function rCO(){
		 $("#pAgregar").removeClass("oculto");
	}
     
      
   // ..........     Agregar Proveedor   ....................... 
    
   function agregarProveedor(){
	  
	var proveedornombre=$("#proveedornombre").val();
    var proveedordescripcion=$("#proveedordescripcion").val();
    var proveedordireccion= $("#proveedordireccion").val();
	var proveedoremail = $("#proveedoremail").val();
    var proveedorseo=$("#proveedorseo").val();
    var proveedortelefono=$("#proveedortelefono").val();
    var proveedorextension = $("#proveedorextension").val();
	var proveedorcelular = $("#proveedorcelular").val();
	var proveedorBanco = $("#bancoAlta").val();
	var proveedorClaveIn = $("#claveAlta").val();
	var proveedorTitular = $("#titularAlta").val();
	var proveedorRfc = $("#rfcAlta").val();
	var hada = $("#proveedorCiudadAg").val(); 
	var proveedorcolonia = $("#proveedorcolonia").val();    
	proveedorpaquete = $("#proveedorpaquete").val();        
    proveedorservico = $("input[name='tipodeservicio']:checked").val(); 
    proveedorpedido = $("input[name='tipopedido']:checked").val();      
     proveedoractivado =$("#idactivado").prop('checked');    
    var emailUsuario="reyna@gmail.com";
	
	 imagen=$('#logoproveedorV1').val().replace(/C:\\fakepath\\/i, ''); 	 
	 imagen='logo_Proveedor_'+proveedornombre+'_'+imagen;	
	  var formData= new FormData($("#RegistroProveedor")[0]);
	  formData.append("version",'V1');
	  formData.append("imglogo",imagen);
	  
     
	    
		if(proveedoractivado){
		   proveedoractivado=1;		
		     }
		   else{
			 proveedoractivado=0;
		   }  

         	       $('#proveedordescripcion').html("");//limpiar el campo de descripcion
				   
		if ( $('#logoproveedorV1').val()=="" )
		     { UIkit.modal.alert('Es necesario subir una imagen.');
		     }
		else if ( $('#proveedornombre').val()=="" )
		       { UIkit.modal.alert('Es necesario completar el campo Nombre del proveedor.'); }		   
		
		else if ( $('#proveedordescripcion').val()=="" )
		       { UIkit.modal.alert('Es necesario completar el campo Descripcion del proveedor.'); }
		   
	   else if ( $('#proveedoremail').val()=="" )
	           {  UIkit.modal.alert('Es necesario completar el campo de Email.');
                 }
	   else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(proveedoremail))   )
	              {      
                UIkit.modal.alert('Verifique la direcci&oacute;n de correo electr&oacute;nico (ejemplo@ejemplo.com).');
                  }			 
	   else if	( $('#proveedorseo').val()=="" )   
	          { UIkit.modal.alert('Es necesario completar el campo de SEO.');
                }
	else if ( $('#proveedorcelular').val()=="" )
	        { UIkit.modal.alert('Es necesario completar el campo de Celular.');
                }
      else  if(!(/^\d{10}$/.test(proveedorcelular))  )
	                {      
              UIkit.modal.alert('Verifique que el N&uacute;mero de Celular contenga 10 D&iacute;gitos.');
			         } 				
     else if ( $('#bancoAlta').val()=="" )	
	         { UIkit.modal.alert('Es necesario completar el campo de Banco.');
                }		 
     else if ( $('#claveAlta').val()=="" )
	          { 
		  UIkit.modal.alert('Es necesario completar el campo de CLABE Interbancaria.');
                  }
	 else if (!(/^\d{18}$/.test(proveedorClaveIn))  )
	            {      
              UIkit.modal.alert('Verifique que la CLABE Interbancaria contenga 18 D&iacute;gitos.');
			    } 
	  else if( $('#titularAlta').val()=="" )
	           { 
		   UIkit.modal.alert('Es necesario completar el campo de Titular de la cuenta.');
                  }		  
	   else if ( $('#rfcAlta').val()=="")
	            { 
			UIkit.modal.alert('Es necesario completar el campo de RFC.');
                  }
	   else  if (!(/^[A-Z,Ñ,&]{3,4}[0-9]{2}[0-1][0-9][0-3][0-9][A-Z,0-9]?[A-Z,0-9]?[0-9,A-Z]?$/.test(proveedorRfc))  )
	           {       // VECJ940 3    2   4   X9U
              UIkit.modal.alert('Verifique el RFC tenga puras letras may&uacute;sculas y entre 12 y 13 caracteres.');
			   } 			  
				  else if ( $('#proveedorCiudadAg').val()==null)	
		        { 
			UIkit.modal.alert('Es necesario escoger una Ciudad.');
                  }
	    else if ( $('#proveedorcolonia').val()==null)	
		        { 
			UIkit.modal.alert('Es necesario escoger una colonia.');
                  }	
           else if ( $('#proveedordireccion').val()=="" )	
		          { UIkit.modal.alert('Es necesario completar el campo de Direcci&oacute;n.');}				  
		else if ( $('#proveedorpaquete').val()==null   )
		        { 
			   UIkit.modal.alert('Es necesario escoger un paquete.');
                  }	 
				
		
			
		 else if ( $('#proveedortelefono').val()!="" && !(/^\d{10}$/.test(proveedortelefono)) ){				    
                  UIkit.modal.alert('Verifique que el N&uacute;mero de Tienda contenga 10 D&iacute;gitos.');
                    }  
			
	    else if  ( $('#proveedorextension').val()!="" && !(/^\d{1,4}$/.test(proveedorextension))  )
	              {      
                  UIkit.modal.alert('Verifique que el N&uacute;mero de Extensi&oacute;n no sobrepase 4 D&iacute;gitos.');
                    } 


				//---------------------------
			else {  
			
            UIkit.modal.confirm("Si los datos del proveedor ingresados son correctos, presione Ok", function(){
				
              $.ajax({method: "POST",dataType: "json",url: "../../../controllers/setCheckTblproveedor1.php",                
		data: {solicitadoBy:"WEB",nombreprov:proveedornombre,idtblcolonia:proveedorcolonia}})
        .done(function(msg){        
       
                     if(parseInt(msg.datos)==1){
                      UIkit.modal.alert('El Proveedor que estas intentando registrar en esa colonia, ya esta registrado.');
                                              }
							else 
						{  
					
					//-----------------------  ajax de la imagen------
					 $.ajax({ method: "POST",
	                 url: "../phps/uploadImgLogo.php",
	                 data:formData,contentType:false,processData:false})					
	                 .done(function(respuestalogo){
				        
				
                     if(respuestalogo=="success"){
                       $("#pAgregar").addClass("oculto");
			   //alta al registro------------------
                            $.ajax({ method: "POST",dataType: "json",
							url: "../../../controllers/setTblproveedor2.php",
							data: {solicitadoBy:"WEB",nombreprov:proveedornombre,
							srclogo:imagen,descripcion:proveedordescripcion,
							direccion:proveedordireccion,seo:proveedorseo,
							telftienda:proveedortelefono,extencion:proveedorextension,
							celular:proveedorcelular,email:proveedoremail,
							rfc:proveedorRfc,clave:proveedorClaveIn,
							banco:proveedorBanco,titular:proveedorTitular,
							activado:proveedoractivado,idtbltipopedido:proveedorpedido,
							idtbltiposervicio:proveedorservico,idtblcolonia:proveedorcolonia,
							idtblpaquete:proveedorpaquete,emailcreo:emailUsuario},
							beforeSend: function(){
                              $('#cargarAltaProveedor').css('display','inline'); }
							})
                          					  
							 .done(function(msg){
								
                               if(parseInt(msg.success)==1){
							    $('#RegistroProveedor')[0].reset(); 
					            $("#proveedorcolonia").html(""); 								
					            UIkit.modal("#altaProveedor").hide();                               

					 
				    UIkit.modal.alert('Proveedor Registrado con éxito');
										
					  $("#proveedorCiudad").val(hada);
				      $('#listarProveedor').html("");					
				        mostrarProveedor();
					    cantidadProveedores();
						mostrar_proveedorLista();
					 
					  }
					                     else {
                                        UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');
                                            }                        
                                           })
                  .fail(function( jqXHR, textStatus ) {  console.log("fail Registro jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                   .always(function(){ $("#cargarAltaProveedor").hide(); console.log("always");});             
					 
			//------------------------------------------------------------------
			      }
				  else{
					  //alert(respuestalogo);
					  UIkit.modal.alert(respuestalogo);             
				  }
                
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
     
					      
									
			}  
                })				   
                  .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                  
            });  
			
			
			
           }  
		   
		     
  }  
  
      //mostrar solo proveedor seleccionado
   function mostrarProveedorEscogido(){
			
		    var idtblProveedor2=$("#SelectProveedor").val();	//se recibe el id que seleciono el usuario del select de Ciudades            
          
		  
		  
		  if(idtblProveedor2=="todos"){
		  
		  var idtblciudad=$("#proveedorCiudad").val();
		
			  // var idtblciudad=$("#SelectProveedor").val(); 
	          //console.log('recibio'+idtblciudad);
	         $("#proveedorCiudad").val(idtblciudad);
				 $('#listarProveedor').html("");					
				   mostrarProveedor();	
		  
		  
		  }else{
			 //alert("entrando a la funcion mostrar proveedor"+tblciudad_idtblciudad);
         $.ajax({   
        method: "POST",dataType: "json",url: "../../../controllers/getAllTblproveedorbyidTblproveedor2.php", 
		data: {solicitadoBy:"WEB",idtblproveedor:idtblProveedor2},
		    beforeSend: function(){  
                              $('#esperarMostrarProveedor').css('display','inline');								  
                                                 }
		
		                  })
          .done(function(mprov2){             
       if(parseInt(mprov2.success)==1){
					 nohaypp5=true;
                    // $("#paraInicial").addClass('oculto'); 
					 
				     $('#listarProveedor').html("");                   
                  $.each(mprov2.datos, function(g2,item)
				 {	
			         idtblciudad=item.idtblciudad;	
				      
				     idproveedor=item.idtblproveedor;               
                     proCiudad=item.tblciudad_idtblciudad;
				  	
				   
				 $("#listarProveedor").append(
				  '<div class="md-card"> <form class="uk-form"> <div class="md-card-content"> <div class="uk-grid uk-grid-divider" data-uk-grid-margin>'+
							  '<div class="uk-width-medium-1-2">'+
							 
							  '<div class="md-card-head-menu" >'+
							 
	              '<a class="md-fab md-fab-small md-fab-accent uk-float-right" href="#modificar" id="botonmodificarProve'+g2+'"'+
		          ' data-uk-modal="{target:"#modificar",bgclose:false, center:true }" onclick="datosmodificarUsuario('+
	                           idproveedor+'); mostrarColoniaModificar('+proCiudad+');" >'+                                                   
							  ' <i class="material-icons">&#xe254;</i>'+            					  
                               '</a> '+	
					 
								
								 '<button type="button" class="md-fab md-fab-small md-fab-accent uk-float-left" onclick="eliminarUsuario('+idproveedor+')" '+
				       'id="botonEliminarProvee'+g2+'">'+ ' <i class="material-icons">&#xE872;</i>'+   
					   '</button>'+  ' </div>'+
								
							    '<ul class="md-list">'+
							    '<li class="uk-text-center">'+ 
	              '<img id="tama" name="tama" src="../../assests_general/proveedor/logoProveedor/'+
	                                   item.tblproveedor_srclogo+'" />'+
                                '</li> <li>'+                               
                                '<div class="md-list-content">'+
                                '<h4 class="uk-text-bold">Proveedor</h4>'+								
                                '<span class="mayus">'+item.tblproveedor_nombre+'</span>'+
                                '</div> </li>'+							      
                                    
								'<li>'+
                                '<div class="md-list-content">'+
                                '<span class="uk-text-small uk-text-muted">Descripci&oacute;n</span>'+
                                '<span>'+item.tblproveedor_descripcion+'</span>'+
                                '</div>'+
                                '</li>'+
															
                                '<li>'+
                                '<div class="md-list-content">'+
                                '<span class="uk-text-small uk-text-muted">Email</span>'+
                                '<span id="idemail'+idproveedor+'">'+item.tblproveedor_email+'</span>'+
                                '</div></li>'+
								'<li>'+
                                '<div class="md-list-content">'+
                                '<span class="uk-text-small uk-text-muted">SEO</span>'+
                                '<span>'+item.tblproveedor_seo+'</span>'+
                                '</div>'+
                                '</li>'+ 
								'<li>'+
                                '<div class="md-list-content">'+
                                '<span class="uk-text-small uk-text-muted">Celular</span>'+
                                '<span id="idcel'+idproveedor+'">'+item.tblproveedor_celular+'</span>'+
                                '</div>'+
                                '</li>'+
								'<li>'+
                                    '<div class="md-list-content">'+                                    
                                      '<span class="uk-text-small uk-text-muted">Banco</span>'+
                                        '<span id="idbanco'+idproveedor+'">'+item.tblproveedor_banco+'</span> '+   
                                    '</div>'+
                                    '</li>'+
									'<li>	'+							
                                    '<div class="md-list-content">'+
                                       '<span class="uk-text-small uk-text-muted">CLABE interbancaria</span>'+
                                       ' <span id="idclave'+idproveedor+'">'+item.tblproveedor_claveintban +'   </span>'+
                                       '</div></li>'+
									   '<li>	'+							
                                    '<div class="md-list-content">'+
                                       '<span class="uk-text-small uk-text-muted">Nombre del Titular de la Cuenta</span>'+
                                       ' <span id="idtitular'+idproveedor+'">'+item.tblproveedor_nombretitucuen +  '</span>'+
                                       '</div></li>'+
								
                                 '</ul></div>'+
						 '<div class="uk-width-medium-1-2">'+
                         '<div class="md-card-content">'+
                            '<ul class="md-list">'+										   
									 
									   ' <li>'+   
                                    '<div class="md-list-content">'+
                                       '<span class="uk-text-small uk-text-muted">RFC</span>'+
                                       ' <span id="idrfc'+idproveedor+'">'+ item.tblproveedor_rfc  +'</span>'+
                                   ' </div> </li>'+
								   
								   '<li>'+
                                '<div class="md-list-content">'+
							    '<span class="uk-text-small uk-text-muted">Tel&eacute;fono</span>'+
                                '<span id="paraTelefono'+idproveedor+'"></span>'+
                                 '</div> </li>'+
								 '<li>'+
                                '<div class="md-list-content" >'+
                                '<span class="uk-text-small uk-text-muted">Extencion</span>'+                              
								'<span id="paraextencion'+idproveedor+'">'+mprov2.datos[g2].tblproveedor_extencion+'</span>'+
                                '</div>'+  
                                '</li>'+
							'<li>'+
                                '<div class="md-list-content">'+
                                '<span class="uk-text-small uk-text-muted">Direcci&oacute;n</span>'+
                                '<span id="iddirecc'+idproveedor+'">'+item.tblproveedor_direccion+'</span>'+
                                '</div>'+
                             '</li>'+
							 '<li>'+
                                '<div class="md-list-content">'+
                                '<span class="uk-text-small uk-text-muted">Ciudad</span>'+
                                '<span id="idciud'+idproveedor+'">'+item.tblciudad_nombre+'</span>'+
                                '</div>'+
                             '</li>'+
							 '<li>'+
                                '<div class="md-list-content">'+
                                '<span class="uk-text-small uk-text-muted">Colonia</span>'+
                                '<span id="idcolonia'+idproveedor+'">'+item.tblcolonia_nombre+'</span>'+
                                '</div>'+
                             '</li>'+								
								'<li>'+
                                '<div class="md-list-content">'+
                                '<span class="uk-text-small uk-text-muted">Tipo de paquete</span>'+
                                '<span>'+item.tblpaquete_nombre+'</span>'+
                                '</div>'+
                                '</li>'+
								   ' <li>'+								
                                    '<div class="md-list-content">'+
                                   ' <span class="uk-text-small uk-text-muted">Tipo de servicio</span>'+
                                    ' <span>'+item.tbltiposervicio_nombre+'</span>'+
                                    '</div> </li> <li>'+
                                   ' <div class="md-list-content">'+
                                     ' <span class="uk-text-small uk-text-muted">Tipo de pedido</span>'+
                                       ' <span>'+item.tbltipopedido_nombre+'</span>'+
                                   ' </div>  </li> <li>'+								
				                  '<div class="md-list-content" >'+
                                  '<span class="uk-text-small uk-text-muted">Estatus</span> '+								  
									    
					'&nbsp;&nbsp;'+'<input type="checkbox" id="mar'+idproveedor+'"  onclick="actualizarProv('+idproveedor+');" class="checkbox" name="checkbox" '+						                                                   
								          item.tblproveedor_activado+'/> '+
								   ' <span class="md-list-heading uk-float-left" id="estadoProveedor'+idproveedor+'"> </span>'+
									                             
                                    ' </div> </li> </ul>  </div>  </div>'+
									'</div> </div> </form> </div> '										 
									);									
							     
			            			
                                  
								         if(parseInt(item.tblproveedor_activado)!=0){
                                          $("#mar"+idproveedor).prop("checked", true);										 
										  $('#estadoProveedor'+idproveedor).text("Activo");
										 
                                           }
						                  else {
                                          $("#mar"+idproveedor).prop("checked", false);
                                           $('#estadoProveedor'+idproveedor).text("Desactivado");  										  
										    } 
							
                                         if(mprov2.datos[g2].tblproveedor_extencion==null || mprov2.datos[g2].tblproveedor_extencion==""){
									        $("#paraextencion"+idproveedor).text("----------");										   
								                } else{
										 $("#paraextencion"+idproveedor).text(mprov2.datos[g2].tblproveedor_extencion);			
											} 
											
									      if(mprov2.datos[g2].tblproveedor_telefonotienda==null || mprov2.datos[g2].tblproveedor_telefonotienda==""){
										 $("#paraTelefono" +idproveedor).text("----------");          
                                            }else{
										 $("#paraTelefono"+idproveedor).text(mprov2.datos[g2].tblproveedor_telefonotienda);			
											} 	
											
											 						         
							//........................
                            }				
				            );				     
                            //----------------------
                                      }
							else 
						{     nohaypp=false;				 
				 // $("#paraInicial").removeClass('oculto'); 
				  $("#listarProveedor").html("");					
				
					  }
			 
              })
			 
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      .always(function(){ $("#esperarMostrarProveedor").hide();  });
	  
		  }
	  
   } //fin de la funcion
    </script> 
   

    
</body>
</html>