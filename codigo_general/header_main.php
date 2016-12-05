<!-- main header -->
        <div class="header_main_content">
            <nav class="uk-navbar">       
                <!-- main sidebar switch -->
                <a href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left">
                    <span class="sSwitchIcon"></span>
                </a>                               
                <div class="uk-navbar-flip">
                    <ul class="uk-navbar-nav user_actions">
                        <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                            <a href="#" class="user_action_icon" id="numeroNotif"><i class="material-icons md-24 md-light">&#xE7F4;</i></a>
                            <div class="uk-dropdown uk-dropdown-xlarge">
                                <div class="md-card-content">
                                    <ul class="uk-tab uk-tab-grid" data-uk-tab="{connect:'#header_alerts',animation:'slide-horizontal'}">
                                        <li class="uk-width-1-1 uk-active" id="numeroNotificaciones"></li>
                                    </ul>
                                    <ul id="header_alerts" class="uk-switcher uk-margin" >
                                        <li>
                                            <ul class="md-list md-list-addon" id="listanotificaciones">
                                              <!--AJAX DE NOTIFICACIONES-->  
                                            </ul>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <!--HTML INICIO MIGUEL-->
                        <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                            <a href="#" class="user_action_image"><img class="md-user-image" src="assets/img/avatars/userh.png" alt=""/></a>
                            <div class="uk-dropdown uk-dropdown-small">
                                <ul class="uk-nav js-uk-prevent">
                                    <li><a class="md-color-pink-300" href="#" data-uk-modal="{target:'#modal_modificar_usuario',bgclose:false,modal:false,modal:false}" onclick="cargarPerfilUsuario();">Mi Perfil</a></li>
                                    <li><a class="md-color-pink-300" id="logOut" href="#">Salir</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="uk-width-medium-1-3">
            <div class="uk-modal" id="modal_modificar_usuario" >
                <div class="uk-modal-dialog">
                    <div class="uk-modal-header">
                        <h3 class="uk-modal-title">Mi Perfil <i class="material-icons" data-uk-tooltip="{pos:'top'}" title="headline tooltip">&#xE8FD;</i></h3>
                    </div>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-3">
                        </div>
                        <div class="uk-width-medium-1-3">
                        </div>
                        <!--
                        <div class="uk-width-medium-1-3">
                            <input type="checkbox" data-switchery checked id="switch_demo_1" />
                            <label for="switch_demo_1" class="inline-label">Activado</label>
                        </div>
                        -->
                        <div class="uk-width-medium-1-1">
                            <div class="uk-form-row">
                                <!--<div class="uk-grid" data-uk-grid-margin>-->
                                <div class="uk-width-medium-1-1">
                                    <label id="modificar_nombre_perfil_usuario_titulo">* Nombre(s)</label>
                                    <br/>
                                    <input type="text" class="md-input" name="modificar_nombre_perfil_usuario" id="modificar_nombre_perfil_usuario" />
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <div class="uk-width-medium-1-1">
                                    <label id="modificar_apellidos_perfil_usuario_titulo">* Apellidos</label>
                                    <br/>
                                    <input type="text" class="md-input" name="modificar_apellidos_perfil_usuario" id="modificar_apellidos_perfil_usuario" />
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <div class="uk-width-medium-1-1">
                                    <label id="modificar_email_perfil_usuario_titulo">* Email</label>
                                    <br/>
                                    <input type="text" class="md-input masked_input" name="modificar_email_perfil_usuario" id="modificar_email_perfil_usuario" data-inputmask="'alias': 'email'" data-inputmask-showmaskonhover="false" />
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <div class="uk-width-medium-1-1">
                                    <label id="modificar_celular_perfil_usuario_titulo">* Celular</label>
                                    <br/>
                                    <input type="text" class="md-input masked_input" name="modificar_celular_perfil_usuario" id="modificar_celular_perfil_usuario" data-inputmask="'mask': '99 - 99 - 99 99 99'" data-inputmask-showmaskonhover="false"/>
                                </div>
                                <!--</div>-->
                            </div>
                            <div class="uk-form-row">
                                <div class="uk-width-medium-1-1">
                                    <label id="modificar_password_perfil_usuario_titulo">* Password</label>
                                    <br/>
                                    <input type="text" class="md-input" name="modificar_password_perfil_usuario" id="modificar_password_perfil_usuario" value="marisolTorres98." />
                                </div>
                            </div>           
                        </div>
                    </div>
                    <div class="uk-modal-footer uk-text-right">
                        <button type="button" class="md-btn md-btn-flat uk-modal-close md-color-pink-300">Close</button>
                        <button data-uk-modal="{target:'#popup_spinner_modificando_perfil_usuario'}" type="button" class="md-btn md-btn-flat md-btn-flat-primary md-color-pink-300" onclick="UIkit.modal.confirm('Se cerrara sesión para actualizar los cambios desea Guardar y Actualizar?', function(){ validarFormularioPerfilUsuario('form_modificar_perfil_usuario');  });">Actualizar</button>
                    </div>
                </div>
            </div>
            <div class="uk-modal" id="popup_exitosa_perfil_usuario">
                <div class="uk-modal-dialog">
                    <button type="button" class="uk-modal-close uk-close"></button>
                    <p class="uk-text-bold">Actualización Exitosa.</p>
                </div>
            </div>
            <!--POPUP MODIFICANDO-->
              <div class="uk-modal" id="popup_spinner_modificando_perfil_usuario">
                <div class="uk-modal-dialog">                  
                  <div class="uk-modal-spinner"></div>
                  <h4> Espere miestras se actualiza </h4>
                </div>
              </div>
            <!-- end Contenido de Item de Producto -->
        </div>
        <!--HTML FIN MIGUEL-->
<!---->
<script src="scripts/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script type="text/javascript">

//Variables de Sesion
var idtblproveedor = 1;
var solicitadoBy="WEB";

$(document).ready(function()
{

  numeroNotificacion();
  //JS DEFAULT INICIO MIGUEL
  $("#logOut").click(function(){
        cerrarSesion();
    });
   //JS DEFAULT FIN MIGUEL

});
//JS FUNCIONES INICIO MIGUEL
function numeroNotificacion(){
    var numNotificaciones=0;
    $.ajax({ 
      method: "POST",dataType: "json",url: "./../../controllers/getAllTblnotificacionbyTblnotificacionvista.php", data: {solicitadoBy:solicitadoBy,idproveedor:idtblproveedor}})
        .done(function(notif){
            $.each(notif.datos, function(i,item){
              if(parseInt(notif.datos[i].tblnotificacionvista_status)!=1){
                numNotificaciones= numNotificaciones+1;
                $("#listanotificaciones").append('<li><div class="md-list-addon-element"><i class="md-list-addon-icon material-icons md-color-grey-700">&#xE88F;</i></div><div class="md-list-content"><span class="md-list-heading "><a class="md-color-red-300" href="./index.php">'+notif.datos[i].tblnotificacion_asunto+'</a></span><span class="uk-text-small uk-text-muted">'+notif.datos[i].tblnotificacion_mensaje+'</span></div></li>'); 
              }else{numNotificaciones= numNotificaciones}

          });
          $("#numeroNotif").append('<span class="uk-badge">'+numNotificaciones+'</span>'); 
          $("#numeroNotificaciones").append('<a href="#" class="js-uk-prevent uk-text-small">Notificaciones ('+numNotificaciones+')</a>');  
          
        })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      .always(function(){  console.log("always");});

}
//JS FUNCIONES INICIO MIGUEL
function cerrarSesion()
            {
              $.ajax({
                    method: "POST",   
                    url: "./php/cerrarSession.php",
                    data: {}
                  })
                  .done(function( msg ) {
                    
                  })
                  .fail(function( jqXHR, textStatus ) {
                    console.log("fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);
                    alert( "Request failed: " + textStatus );
                  })
                  .always(function(){
                    console.log("always");
                  });
            }
            
            function cargarPerfilUsuario()
            {
              $('#modificar_nombre_perfil_usuario').val("<?php echo $_SESSION['nombre']; ?>");
              $('#modificar_apellidos_perfil_usuario').val("<?php echo $_SESSION['apellido']; ?>");
              $('#modificar_email_perfil_usuario').val("<?php echo $_SESSION['usuario']; ?>");
              $('#modificar_celular_perfil_usuario').val("<?php echo $_SESSION['celular']; ?>");
              $('#modificar_password_perfil_usuario').val("<?php echo $_SESSION['password']; ?>");
            }
            
            function validarFormularioPerfilUsuario(formularioAValidar)
            {
                //console.log('entro a la function validarFormulario');
                if(formularioAValidar=='form_modificar_perfil_usuario')
                {
                  /*
                  VARIABLES
                  */
                  boolError=false;
                  boolErrorNombre=false;
                  boolErrorApellidos=false;
                  boolErrorEmail=false;
                  boolErrorCelular=false;
                  boolErrorPassword=false;

                  nombreUsuario='';
                  apellidosUsuario='';
                  emailUsuario='';
                  celularUsuario='';
                  passwordUsuario='';

                  nombreUsuario=$('#modificar_nombre_perfil_usuario').val();
                  apellidosUsuario=$('#modificar_apellidos_perfil_usuario').val();
                  emailUsuario=$('#modificar_email_perfil_usuario').val();
                  celularUsuario=$('#modificar_celular_perfil_usuario').val();
                  passwordUsuario=$('#modificar_password_perfil_usuario').val();

                  //nombreUsuario -> String
                  //VALIDAR CAMPOS OBLIGATORIOS VACIOS
                  boolErrorNombre=validarCamposStringPerfilUsuario(nombreUsuario,110);      
                  if(boolErrorNombre){ $( "#modificar_nombre_perfil_usuario" ).addClass( "md-input-danger" ); boolError=true; }
                  else{ $( "#modificar_nombre_perfil_usuario" ).removeClass( "md-input-danger" ); }
                  //nombreUsuario -> String
                  //VALIDAR CAMPOS OBLIGATORIOS VACIOS
                  boolErrorApellidos=validarCamposStringPerfilUsuario(apellidosUsuario,70);      
                  if(boolErrorApellidos){ $( "#modificar_apellidos_perfil_usuario" ).addClass( "md-input-danger" ); boolError=true; }
                  else{ $( "#modificar_apellidos_perfil_usuario" ).removeClass( "md-input-danger" ); }
                  //nombreUsuario -> String
                  //VALIDAR CAMPOS OBLIGATORIOS VACIOS
                  boolErrorEmail=validarCamposStringPerfilUsuario(emailUsuario,70);      
                  if(boolErrorEmail){ $( "#modificar_email_perfil_usuario" ).addClass( "md-input-danger" ); boolError=true; }
                  else{ $( "#modificar_email_perfil_usuario" ).removeClass( "md-input-danger" ); }
                  //nombreUsuario -> String
                  //VALIDAR CAMPOS OBLIGATORIOS VACIOS
                  boolErrorCelular=validarCamposStringPerfilUsuario(celularUsuario,30);      
                  if(boolErrorCelular){ $( "#modificar_celular_perfil_usuario" ).addClass( "md-input-danger" ); boolError=true; }
                  else{ $( "#modificar_celular_perfil_usuario" ).removeClass( "md-input-danger" ); }
                  //nombreUsuario -> String
                  //VALIDAR CAMPOS OBLIGATORIOS VACIOS
                  boolErrorPassword=validarCamposStringPerfilUsuario(passwordUsuario,500);      
                  if(boolErrorPassword){ $( "#modificar_password_perfil_usuario" ).addClass( "md-input-danger" ); boolError=true; }
                  else{ $( "#modificar_password_perfil_usuario" ).removeClass( "md-input-danger" ); }
                }
                if(!boolError)
                {
                  console.log('actualizar producto complementario');
                  actualizarPerfilUsuario(nombreUsuario,apellidosUsuario,emailUsuario,celularUsuario,passwordUsuario);      
                }
                else
                {
                  UIkit.modal("#popup_spinner_modificando_perfil_usuario").hide();
                  UIkit.modal.alert('Atención favor de verificar y completar los campos marcados en rojo!');
                }
            }
            //FUNCIONES DE VALIDACION DE DATOS/////////////////////////////////////////////////////////////////////////////////
            function validarCamposStringPerfilUsuario(string,numCaracterValido)
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
            function actualizarPerfilUsuario(nombreproveedor,apellidoproveedor,emailproveedor,celularproveedor,password)
            {
              idtblusuarioproveedor=<?php echo $_SESSION['idusuario']; ?>;
              idtblproveedor=<?php echo $_SESSION['idtblproveedor']; ?>;
              idtblnivelacceso=<?php echo $_SESSION['nivel']; ?>;
              activado=1;          
              
              $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setUpdateTblusuarioproveedor.php", data: {
                solicitadoBy:"WEB",
                idtblusuarioproveedor:idtblusuarioproveedor,
                nombreproveedor:nombreproveedor,
                apellidoproveedor:apellidoproveedor,
                emailproveedor:emailproveedor,
                celularproveedor:celularproveedor,
                activado:activado,
                idtblproveedor:idtblproveedor,
                idtblnivelacceso:idtblnivelacceso,
                password:password,
                emailmodifico:emailproveedor 
              }  })
                .done(function( msgTblProductoGeneral ) {          
                  UIkit.modal("#popup_spinner_modificando_perfil_usuario").hide();       
                  UIkit.modal.alert('Actualización Exitosa');
                  cerrarSesion();
                  location.reload();
                })
                .fail(function( jqXHR, textStatus ) {  console.log("setUpdateTblusuarioproveedor fail jqXHR::"+jqXHR.status.status+" textStatus::"+textStatus);  })
                .always(function(){   });
                
            }
    //JS FUNCIONES FIN MIGUEL
</script>