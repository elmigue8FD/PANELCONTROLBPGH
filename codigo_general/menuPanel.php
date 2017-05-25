 

 <link rel="stylesheet" href="../assets/css/colorPanel.css" media="all"> 
 
 
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
                            <a href="#" class="user_action_image"><img class="md-user-image" src="../assets/img/delPanel/pk.jpg" alt=""/></a>
                            <div class="uk-dropdown uk-dropdown-small">
                                <ul class="uk-nav js-uk-prevent">
                                    <li><a href="#" data-uk-modal="{target:'#modificarPerfil',bgclose:false,modal:false,modal:false}">Mi perfil</a></li>
                                    <li><a href="index.html">Cerrar sesion</a></li>
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
			          <div class="uk-margin-medium-bottom">                   
                    <input type="text" class="md-input" id="nombres"  disabled name="snippet_title" />
                       </div>
				  
					<label class="uk-text-muted uk-text-small">Email:</label>
				    <div class="uk-margin-medium-bottom">                   
                   <!-- <input type="text" class="md-input" id="modificar_email" name="snippet_title" /> -->
				    <input class="md-input masked_input" id="modificar_email" name="modificar_email" type="text" data-inputmask="'alias': 'email'" data-inputmask-showmaskonhover="false" />
            
                     </div>
				   <label class="uk-text-muted uk-text-small">Contacto:</label>
                <div class="uk-margin-medium-bottom">                    
                   <!-- <input type="text" class="md-input" id="modificar_celular" name="snippet_title" maxlength="10"/>
                -->
				<input type="text" class="md-input masked_input" id="modificar_celular" data-inputmask="'mask': '9999999999'" data-inputmask-showmaskonhover="false" />
              </div>
				 </ul> </div>
				 <div class="uk-width-large-1-2">
			 <ul class="md-list md-list-addon">
				<div class="uk-margin-medium-bottom">
                    <label for="task_title">Password:</label>
                    <input type="text" class="md-input" id="password" name="snippet_title" />
                </div>
				<div class="uk-margin-medium-bottom">
                    <label for="task_title">Nuevo Password:</label>
                    <input type="text" class="md-input" id="alta_password2" name="snippet_title" />
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
			     <button type="button" class="md-btn md-btn-flat ye" id="boton_modificar" onclick="actualizarUsuario();">Guardar Cambios</button>
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