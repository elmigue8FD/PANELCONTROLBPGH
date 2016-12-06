<?php 
include('./php/seguridad_general.php');
?><!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> 
<html lang="en"> <!--<![endif]-->


  <head>    
    <?php include("./codigo_general/head.php"); ?>
    <!-- kendo UI -->
    <link rel="stylesheet" href="bower_components/kendo-ui/styles/kendo.common-material.min.css"/>
    <link rel="stylesheet" href="bower_components/kendo-ui/styles/kendo.material.min.css" id="kendoCSS"/>
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <script src="../css/js/jquery.js" ></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyDjeDznrCqVmUmnPkqY34STkSMsV2RvFok" type="text/javascript"></script>
    <script type="text/javascript" src="./../js/scripts/funciones_mapa.js"></script>
    <script type="text/javascript" src="./../js/scripts/fusion_map_obj_v3.js"></script>
    <script type="text/javascript" src="http://mapas.inegi.org.mx/earth_map/query?request=Json&var=geeServerDefs"></script>
  </head>


  <body class=" sidebar_main_open sidebar_main_swipe" onload="inicializa(22.1510387,-100.9809202);">
  
    <!--Titlo de la seccion de la pagina-->
    <h1 id="tituloDeLaPagina" hidden>PerfilTienda</h1>
    <!-- main header -->
    <header id="header_main">
          
      <?php include('./codigo_general/header_main.php'); ?>
          
    </header><!-- main header end -->
    <!-- main sidebar -->
    <aside id="sidebar_main">
          
      <!-- sidebar_main_header -->
      <?php include('./codigo_general/sidebar_main_header.php'); ?>
      <!-- sidebar_main_header end -->
          
      <div class="menu_section">
        <?php include('./codigo_general/menu_section.php'); ?>            
      </div>
    </aside><!-- main sidebar end -->

    <div id="page_content">
      <div id="page_content_inner">
        <!-- DONDESE AGREGAR TODO EL CONTENIDO DE LA PAGINA -->   
        <div id="top_bar">
          <div class="md-top-bar ">
            <div class="uk-width-large-8-10 uk-container-center">
              <div class="md-card-content">
                <div class="uk-grid">
                  <div class="uk-width-1-1">
                    <ul class="uk-tab" data-uk-tab="{connect:'#tabs_1_content'}" id="tabs_1">
                      <li class="uk-active"><a href="#"><font size="3"> Datos </font></a></li>
                      <li class="named_tab"><a href="#"><font size="3"> Servicios </font></a></li>
                      <!--<li class="named_tab"><a href="#"><font size="3"> Paquete </font></a></li>-->
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- end SubMenu de INDEX -->
        <div id="tabs_1_content" class="uk-switcher">
          <div id="contenido_Datos"><!-- Contenido de Pestaña Datos -->              
            <div class="uk-grid uk-grid-width-large-1-1 uk-grid-width-medium-1-1 uk-grid-medium uk-sortable sortable-handler hierarchical_show" data-uk-sortable data-uk-grid-margin>
              <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-1">
                  <div class="md-card">
                    <div class="md-card-content">
                      <div class="uk-form-row">
                        <div class="uk-grid " data-uk-grid-margin>
                          <div class="uk-width-medium-1-1">
                            <label>Logo</label>
                            <div class="uk-text-center">
                              <img class="md-card-head-avatar" id="logoProveedor" name="logoProveedor" src="assets/img/gallery/Image01.jpg" alt=""/>
                            </div>
                          </div>
                          <div class="uk-width-medium-1-1">
                            <label><strong>Datos Generales</strong></label>
                          </div>
                          <input type="hidden" id="modificar_id_perfilTienda" name="modificar_id_perfilTienda" class="md-input" />
                          <div class="uk-width-medium-1-1">
                            <label>* Nombre de Pastelería</label><br/>
                            <input type="text" id="modificar_nombre_perfilTienda" name="modificar_nombre_perfilTienda" class="md-input" required />
                          </div>
                          <div class="uk-width-medium-1-1">
                            <label>* Descripción</label><br/>
                            <input type="text" id="modificar_descripcion_perfilTienda" name="modificar_descripcion_perfilTienda" class="md-input" required/>
                          </div>
                        </div>
                        <hr class="uk-grid-divider">
                        <div class="uk-grid " data-uk-grid-margin>
                          <div class="uk-width-medium-1-1">
                            <label><strong>Datos de Contacto</strong></label><br/>
                          </div>
                          <div class="uk-width-medium-1-4">
                            <label>* Nombre de contacto</label><br/>
                            <input type="text" id="modificar_nombre_contacto_perfilTienda" name="modificar_nombre_contacto_perfilTienda" class="md-input" required readonly />
                          </div>
                          <div class="uk-width-medium-1-4">
                            <label>* Teléfono Tienda</label><br/>
                            <input class="md-input masked_input" id="modificar_telefono_tienda_perfilTienda" name="modificar_telefono_tienda_perfilTienda" type="text" data-inputmask="'mask': '9 - 99 99 99'" data-inputmask-showmaskonhover="false" required/>
                            <!--<input type="text" class="md-input" />-->
                          </div>
                          <div class="uk-width-medium-1-4">
                            <label>Extencion</label><br/>
                            <input type="text" id="modificar_telefono_extencion_perfilTienda" name="modificar_telefono_extencion_perfilTienda" class="md-input" />
                          </div>
                          <div class="uk-width-medium-1-4">
                            <label>* Celular</label><br/>
                            <input class="md-input masked_input" id="modificar_celular_perfilTienda" name="modificar_celular_perfilTienda" type="text" data-inputmask="'mask': '99 - 99 - 99 99 99'" data-inputmask-showmaskonhover="false" required/>
                          </div>
                          <div class="uk-width-medium-1-4">
                            <label>* Email</label><br/>
                            <input class="md-input masked_input" id="modificar_email_perfilTienda" name="modificar_email_perfilTienda" type="text" data-inputmask="'alias': 'email'" data-inputmask-showmaskonhover="false" required/>
                            <!--<input type="text" class="md-input" />-->
                          </div>
                          <div class="uk-width-medium-1-4">
                            <label>* Dirección de la pastelería</label><br/>
                            <input type="text" id="modificar_direccion_pasteleria_perfilTienda" name="modificar_direccion_pasteleria_perfilTienda" class="md-input" required/>
                          </div>
                        </div>
                        <hr class="uk-grid-divider">
                        <div class="uk-grid " data-uk-grid-margin>
                          <div class="uk-width-medium-1-1">
                            <label><strong>Datos de Bepickler</strong></label><br/>
                          </div>
                          <div class="uk-width-medium-1-4">
                            <label>Productos de línea</label><br/>
                            <input type="text" id="modificar_productos_linea_perfilTienda" name="modificar_productos_linea_perfilTienda" class="md-input" readonly />
                          </div>
                          <div class="uk-width-medium-1-4">
                            <label>Productos complemetarios</label><br/>
                            <input type="text" id="modificar_productos_complementario_perfilTienda" name="modificar_productos_complementario_perfilTienda" class="md-input" readonly />
                          </div>
                          <div class="uk-width-medium-1-4">
                            <label>Productos de cotizador</label><br/>
                            <input type="text" id="modificar_productos_cotizador_perfilTienda" name="modificar_productos_cotizador_perfilTienda" class="md-input" readonly />
                          </div>
                          <div class="uk-width-medium-1-4">
                            <label>Paquete</label><br/>
                            <input type="text" id="modificar_paquete_perfilTienda" name="modificar_paquete_perfilTienda" class="md-input" value="" readonly />
                          </div>                                
                        </div>
                        <hr class="uk-grid-divider">
                        <div class="uk-grid " data-uk-grid-margin>
                          <div class="uk-width-medium-1-1 uk-text-right">
                            <!--<button class="md-btn md-btn-success" type="button" data-uk-button>Guardar Cambios</button>-->
                            <!--<button type="button" class="md-btn md-btn-flat md-btn-small md-btn-flat-primary" onclick="UIkit.modal.confirm('Guardar los cambios?',  function(){ actualizarPerfilTienda(); UIkit.modal.alert('Confirmed!'); });">--><!--class="md-btn md-btn-success"-->
                            <button type="button" class="md-btn md-btn-flat md-btn-flat-primary" onclick="UIkit.modal.confirm('¿Desea Guardar los cambios?',  function(){ validarFormulario('form_modificar_perfilTienda');; });">
                              Guardar Cambio
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="contenido_Servicios"><!-- Contenido de Pestaña Datos -->              
            <div class="uk-grid uk-grid-width-large-1-1 uk-grid-width-medium-1-1 uk-grid-medium uk-sortable sortable-handler hierarchical_show" data-uk-sortable data-uk-grid-margin>                  
              <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-1">
                  <div class="md-card">
                    <div class="md-card-content">
                      <div class="uk-form-row">
                        <div class="uk-grid " data-uk-grid-margin>
                          <div class="uk-width-large-1-1">
                            <h4>Personaliza tus servicios </h4>
                          </div>
                          <div class="uk-width-large-1-1">
                            <br/>
                          </div>
                          <div class="uk-width-medium-1-1">
                              <label><strong>Descripción general de servicios habilitados </strong></label>
                            </div>
                            <div class="uk-width-medium-1-2">
                              <label>Pedidos habilitados</label><br/>
                              <input id="pedidosHabilitados" type="text" class="md-input" />
                            </div>
                            <div class="uk-width-medium-1-2">
                              <label>Entregas habilitadas</label><br/>
                              <input id="serviciosHabilitados" type="text" class="md-input" />
                            </div>
                          <div class="uk-width-large-1-1">
                            <br/>
                            <label><strong>Días de servicio </strong></label>
                          </div>
                          <div class="uk-width-medium-1-1" id="modificar_dias_servicio">    
                          </div>
                          <div class="uk-width-medium-1-1">
                            <label><strong>Horario de la pastelería </strong></label>
                          </div>
                          <div class="uk-width-medium-1-2">
                            <div class="">
                              <div class="">
                                <label>Hora de apertura</label><br/>
                                <select id="modificar_hora_abre_pasteleria" name="modificar_hora_abre_pasteleria" class="md-input" data-uk-tooltip="{pos:'top'}" title="Select with tooltip">
                                  <option value="" disabled selected hidden></option>
                               </select>
                              </div>
                            </div>
                          </div>
                          <div class="uk-width-medium-1-2">
                            <div class="">
                              <label>Hora de cierre</label><br/>
                              <select id="modificar_hora_cierra_pasteleria" name="modificar_hora_cierra_pasteleria" class="md-input" data-uk-tooltip="{pos:'top'}" title="Select with tooltip">
                                <option value="" disabled selected hidden></option>
                               </select>
                            </div>
                          </div>
                          <div class="uk-grid uk-width-medium-1-1">
                            <div class="uk-width-large-1-1">
                              <form class="uk-form-stacked" id="div_horario_servicio_domicilio">
                                <div class="uk-width-medium-1-1">                                             
                                  <label>
                                    <strong>Horarios de entrega a domicilio </strong>
                                  </label>
                                </div>
                                <div class="uk-width-medium-1-1">
                                  <br/>
                                  <span id="span_checkbox_demo_inline_9_12" class="icheck-inline">
                                    <input type="checkbox" name="checkbox_lunes" id="checkbox_demo_inline_9_12" data-md-icheck />
                                    <label for="checkbox_demo_inline_9_12" class="inline-label">9-12</label>
                                  </span>
                                  <span id="span_checkbox_demo_inline_12_15" class="icheck-inline">
                                    <input type="checkbox" name="checkbox_lunes" id="checkbox_demo_inline_12_15" data-md-icheck />
                                    <label for="checkbox_demo_inline_12_15" class="inline-label">12-15</label>
                                  </span>
                                  <span id="span_checkbox_demo_inline_15_18" class="icheck-inline">
                                    <input type="checkbox" name="checkbox_lunes" id="checkbox_demo_inline_15_18" data-md-icheck />
                                    <label for="checkbox_demo_inline_15_18" class="inline-label">15-18</label>
                                  </span>
                                  <span id="span_checkbox_demo_inline_18_21" class="icheck-inline">
                                    <input type="checkbox" name="checkbox_lunes" id="checkbox_demo_inline_18_21" data-md-icheck />
                                    <label for="checkbox_demo_inline_18_21" class="inline-label">18-21</label>
                                  </span> 
                                </div>                    
                              </form>
                            </div>
                          </div>
                          
                          
                          <div class="uk-width-medium-1-1">
                          </div>
                          <div class="uk-grid uk-width-medium-1-1">
                            <div class="uk-width-large-1-1" id="div_colonias_servicio_domicilio">
                              <form class="uk-form-stacked">
                                <div class="uk-width-medium-1-1">
                                  <label><strong>Colonias de servicio a domicilio  </strong></label>
                                  <label> Seleccionar todas las colonias </label><input type="checkbox" id="modificar_select_todas_col_domici" name="modificar_select_todas_col_domici">
                                </div>
                                <div id="colonias" class="uk-width-large-1-1" style="overflow: auto;height: 150px;width: 100%;">
                                  <br/>                                    
                                </div>
                              </form>
                            </div>
                          </div>
                          <div class="uk-width-medium-1-1">                                	
                            <h3>Mapa Guía</h3>
                            <div id="map_canvas" style="height:290px; width:100%;"></div>
                          </div>
                          <div class="uk-width-medium-1-1 uk-text-right">
                            <!--0<button class="md-btn md-btn-success" type="button" data-uk-button>Guardar Cambios</button>-->
                            <button type="button" class="md-btn md-btn-flat md-btn-flat-primary" onclick="UIkit.modal.confirm('¿Desea Guardar los Cambios?',  function(){ validarFormulario('form_modificar_perfilTienda_servicios');  });">
                          Guardar Cambio
                        </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            </div> 
            <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->                      
          </div>
    </div>
    <!-- secondary sidebar -->     
    <!-- secondary sidebar end -->
    <!-- CODIGO EN GENERAL -->
    <?php include('./codigo_general/script_common.php'); ?>
    <script type="text/javascript">
      //SESSION
        var idtblproveedor=1;
        var idtblusuarioproveedor=1;
        var emailmodifico='miguel@bepickler.com';
        var emailcreo='miguel@bepickler.com';
      ///////////////////////////////
      //VARIABLES GLOBALES 
      var mensaje_error_validacion='¡Atención favor de verificar y completar los campos marcados en rojo!';
      var Idtblproveedor='';
      var Nombre='';
      var Srclogo='';
      var Descripcion='';
      var Direccion='';
      var Seo='';
      var Telefonotienda='';
      var Extencion='';
      var Celular='';
      var Email='';
      var Activado='';
      var Idtbltipopedido='';
      var Idtbltiposervicio='';
      var Idtblcolonia='';
      var Idtblpaquete='';
      
      var contadorColonnias=0;      
      var contadorDias=0;
      
      var arregloIdTblcoloniaAct=[];
      var arregloidTblhrspromdom=[];
      var arreglohoraTblhora=[];

      
      var habilitadosDiasServicio=false;
      var habilitadosHorarioPasteleria=false;
      var habilitadosHorarioDomicilio=false;
      var habilitadosColoniasDomicilio=false;

     
      
      $( window ).ready(function()
      {
        // create MultiSelect from select HTML element
        var required2 = $("#colonias_servicio_domicilio").kendoMultiSelect().data("kendoMultiSelect");
        cargarValoresDefault();
      });
      function validarFormulario(formularioAValidar)
      {
        console.log('entro a la function validarFormulario');
        if(formularioAValidar=='form_modificar_perfilTienda')
        {
           /*
          VARIABLES
           */
          boolError=false;
          boolErrorNombrePasteleria=false;
          boolErrorDescripcion=false;
          boolErrorNombreContacto=false;
          boolErrorTelefonoTienda=false;
          boolErrorCelular=false;
          boolErrorEmail=false;
          boolErrorDireccionPasteleria=false;

           //tblproducto
          nombrePasteleria='';
          descripcion='';
          nombreContacto='';
          telefonoTienda='';
          celular='';
          email='';
          direccionPasteleria='';

          //OBTENEMOS LOS DATOS DEL FORMULARIO
          nombrePasteleria=$('#modificar_nombre_perfilTienda').val();
          descripcion=$('#modificar_descripcion_perfilTienda').val();
          nombreContacto=$('#modificar_nombre_contacto_perfilTienda').val();
          telefonoTienda=$('#modificar_telefono_tienda_perfilTienda').val();
          celular=$('#modificar_celular_perfilTienda').val();
          email=$('#modificar_email_perfilTienda').val();
          direccionPasteleria=$('#modificar_direccion_pasteleria_perfilTienda').val();
          /////////////////////////DATOS GENERALES/////////////////////////
          //nombreproduct -> String
          //VALIDAR CAMPOS OBLIGATORIOS VACIOS
          boolErrorNombre=validarCamposString(nombrePasteleria,90);      
          if(boolErrorNombre){ $( "#modificar_nombre_perfilTienda" ).addClass( "md-input-danger" ); boolError=true; }
          else{ $( "#modificar_nombre_perfilTienda" ).removeClass( "md-input-danger" ); }
          //nombreproduct -> String
          //VALIDAR CAMPOS OBLIGATORIOS VACIOS
          boolErrorDescripcion=validarCamposString(descripcion,300);      
          if(boolErrorDescripcion){ $( "#modificar_descripcion_perfilTienda" ).addClass( "md-input-danger" ); boolError=true; }
          else{ $( "#modificar_descripcion_perfilTienda" ).removeClass( "md-input-danger" ); }
          //nombreproduct -> String
          //VALIDAR CAMPOS OBLIGATORIOS VACIOS
          boolErrorNombreContacto=validarCamposString(nombreContacto,110);      
          if(boolErrorNombreContacto){ $( "#modificar_nombre_contacto_perfilTienda" ).addClass( "md-input-danger" ); boolError=true; }
          else{ $( "#modificar_nombre_contacto_perfilTienda" ).removeClass( "md-input-danger" ); }
          //nombreproduct -> Number
          //VALIDAR CAMPOS OBLIGATORIOS VACIOS
          boolErrorTelefonoTienda=validarCamposString(telefonoTienda,20);      
          if(boolErrorTelefonoTienda){ $( "#modificar_telefono_tienda_perfilTienda" ).addClass( "md-input-danger" ); boolError=true; }
          else{ $( "#modificar_telefono_tienda_perfilTienda" ).removeClass( "md-input-danger" ); }
          //nombreproduct -> String
          //VALIDAR CAMPOS OBLIGATORIOS VACIOS
          boolErrorCelular=validarCamposString(celular,30);      
          if(boolErrorCelular){ $( "#modificar_celular_perfilTienda" ).addClass( "md-input-danger" ); boolError=true; }
          else{ $( "#modificar_celular_perfilTienda" ).removeClass( "md-input-danger" ); }
          //nombreproduct -> String
          //VALIDAR CAMPOS OBLIGATORIOS VACIOS
          boolErrorEmail=validarCamposString(email,70);      
          if(boolErrorEmail){ $( "#modificar_email_perfilTienda" ).addClass( "md-input-danger" ); boolError=true; }
          else{ $( "#modificar_email_perfilTienda" ).removeClass( "md-input-danger" ); }
          //nombreproduct -> String
          //VALIDAR CAMPOS OBLIGATORIOS VACIOS
          boolErrorDireccionPasteleria=validarCamposString(direccionPasteleria,50);      
          if(boolErrorDireccionPasteleria){ $( "#modificar_direccion_pasteleria_perfilTienda" ).addClass( "md-input-danger" ); boolError=true; }
          else{ $( "#modificar_direccion_pasteleria_perfilTienda" ).removeClass( "md-input-danger" ); }
          ///////////////////////////////////////////////////////////////////////////
          /////////////////////////////////////////////////////////////////////////
          if(!boolError)
          {
            console.log('registrarPerfilTeienda');
            actualizarPerfilTienda();
          }
          else
          {
            UIkit.modal.alert(mensaje_error_validacion);
          }
        }else if(formularioAValidar=='form_modificar_perfilTienda_servicios')
        {
           /*
          VARIABLES
           */
           boolError=false;
           //tblproducto

          //OBTENEMOS LOS DATOS DEL FORMULARIO
          /////////////////////////DATOS GENERALES/////////////////////////
          /////////////////////////////////////////////////////////////////////////
          if(!boolError)
          {
            console.log('registrarServicios');
            actualizarPerfilTiendaServicios();
          }
          else
          {
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
        if(numero<0)
          boolErrorNumero=true;
        //VALIDAR CAMPOS NO SON NUMEROS
        if(!$.isNumeric(numero))
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
  //FIN FUNCIONES DE VALIDACION DE DATOS/////////////////////////////////////////////////////////////////////////////////
      function cargarValoresDefault(){
        //console.log('cargarValoresDefault');
        cargarDatosPerfilTienda();
        cargarDatosServicios();
        listenerSercios();
      }
      function listenerSercios(){

        //alert('entro listenerSercios');
        $( "#modificar_select_todas_col_domici" ).click(function() {
          console.log('arregloIdTblcoloniaAct::'+arregloIdTblcoloniaAct.length);
          selectAllColonServDomi=$("#modificar_select_todas_col_domici").is(':checked');
          if(selectAllColonServDomi)
          {
            $.each(arregloIdTblcoloniaAct, function(i,IdColonia){
              console.log('IdColonia::'+IdColonia);
              $('#colonia_i_'+IdColonia).prop('checked', true);
            });
            console.log('seleccionar todoas');
            /*
            $('#colonia_i_2').prop('checked', true);
            $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/getAllTblcoloniaAct.php",  data: {solicitadoBy:"WEB"}  })
            .done(function( msgTblColonia ) { 
              $.each(msgTblColonia.datos, function(i,item){ 
                $('#colonia_i_'+msgTblColonia.datos[i].idtblcolonia).prop('checked', true);
              });  
            })
            .fail(function( jqXHR, textStatus ) {  console.log("getAllTblcoloniaAct fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
            .always(function(){  
              //console.log("always");
            });
            */
          }else
          {
            $.each(arregloIdTblcoloniaAct, function(i,IdColonia){
              console.log('IdColonia::'+IdColonia);
              $('#colonia_i_'+IdColonia).prop('checked', false);
            });
            console.log('ninguna');
            $('#colonia_i_2').prop('checked', false);
          }
        });
      }
      function cargarDatosPerfilTienda(){
        //COSNTANTES
        PROVEEDORLOGOIMGSRC="./../assests_general/proveedor/logoProveedor/";
        ///
        $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/getTblproveedor.php",  data: {solicitadoBy:"WEB", idtblproveedor:idtblproveedor}  })
          .done(function( msgProveedor ) { 
            $.each(msgProveedor.datos, function(i,item){ 
              Idtblproveedor=msgProveedor.datos[i].idtblproveedor;
              Nombre=msgProveedor.datos[i].tblproveedor_nombre;
              Srclogo=msgProveedor.datos[i].tblproveedor_srclogo;
              Descripcion=msgProveedor.datos[i].tblproveedor_descripcion;
              Direccion=msgProveedor.datos[i].tblproveedor_direccion;
              Seo=msgProveedor.datos[i].tblproveedor_seo;
              Telefonotienda=msgProveedor.datos[i].tblproveedor_telefonotienda;
              Extencion=msgProveedor.datos[i].tblproveedor_extencion;
              Celular=msgProveedor.datos[i].tblproveedor_celular;
              Email=msgProveedor.datos[i].tblproveedor_email;
              Activado=msgProveedor.datos[i].tblproveedor_activado;
              Idtbltipopedido=msgProveedor.datos[i].tbltipopedido_idtbltipopedido;
              Idtbltiposervicio=msgProveedor.datos[i].tbltiposervicio_idtbltiposervicio;
              Idtblcolonia=msgProveedor.datos[i].tblcolonia_idtblcolonia;
              Idtblpaquete=msgProveedor.datos[i].tblpaquete_idtblpaquete;
            

              //$('#modificar_id_perfilTienda').val(msgProveedor.datos[i].tblproveedor_srclogo);
              //
                logo=PROVEEDORLOGOIMGSRC+msgProveedor.datos[i].tblproveedor_srclogo;
                $("[name=logoProveedor]").attr("src",logo);
              $('#modificar_id_perfilTienda').val(msgProveedor.datos[i].idtblproveedor);
              $('#modificar_nombre_perfilTienda').val(msgProveedor.datos[i].tblproveedor_nombre);         
              $('#modificar_descripcion_perfilTienda').val(msgProveedor.datos[i].tblproveedor_descripcion);
              //NOMBRE DE CONTACTO
              $('#modificar_direccion_pasteleria_perfilTienda').val(msgProveedor.datos[i].tblproveedor_direccion);
              //$('#modificar_id_perfilTienda').val(msgProveedor.datos[i].tblproveedor_seo);
              $('#modificar_telefono_tienda_perfilTienda').val(msgProveedor.datos[i].tblproveedor_telefonotienda);
              $('#modificar_telefono_extencion_perfilTienda').val(msgProveedor.datos[i].tblproveedor_extencion);          
              $('#modificar_celular_perfilTienda').val(msgProveedor.datos[i].tblproveedor_celular);
              $('#modificar_email_perfilTienda').val(msgProveedor.datos[i].tblproveedor_email);
              //$('#modificar_id_perfilTienda').val(msgProveedor.datos[i].tblproveedor_activado);
              //SERVICIOS
            
              //$('#modificar_id_perfilTienda').val(msgProveedor.datos[i].tbltipopedido_idtbltipopedido);
              //$('#modificar_id_perfilTienda').val(msgProveedor.datos[i].tbltiposervicio_idtbltiposervicio);
              //$('#modificar_id_perfilTienda').val(msgProveedor.datos[i].tblcolonia_idtblcolonia);
              //$('#modificar_id_perfilTienda').val(msgProveedor.datos[i].tblpaquete_idtblpaquete);
            
              $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/getTblpaquete.php",  data: {solicitadoBy:"WEB", idtblpaquete:msgProveedor.datos[i].tblpaquete_idtblpaquete}  })
                .done(function( msgPaqueteProveedor ) { 
                  $.each(msgPaqueteProveedor.datos, function(i,item){ 
                    //console.log('msgPaqueteProveedor.  idtblproveedor::'+msgPaqueteProveedor.datos[i].tblpaquete_nombre);
                    //msgPaqueteProveedor.datos[i].tblpaquete_nombre;
                    $('#modificar_paquete_perfilTienda').val(msgPaqueteProveedor.datos[i].tblpaquete_nombre);
                  });  
                })
                .fail(function( jqXHR, textStatus ) {  console.log("getTblusuarioproveedor fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
                .always(function(){    });
            });  
          })
          .fail(function( jqXHR, textStatus ) {  console.log("getTblproveedor fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
          .always(function(){              });

          //OBTENER EL NUMERO DE PRODUCTOS EN LINEA
          $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/getAllTblproductoTblproductoDetalleOfProveedor.php",  data: {solicitadoBy:"WEB", idtblproveedor:idtblproveedor}  })
            .done(function( msgProductoLineaProveedor ) {
              contadorDeProductosLineaDetalle=0;
              $.each(msgProductoLineaProveedor.datos, function(i,item){ contadorDeProductosLineaDetalle++; });  
              $('#modificar_productos_linea_perfilTienda').val(contadorDeProductosLineaDetalle);
            })
            .fail(function( jqXHR, textStatus ) {  console.log("getTblusuarioproveedor fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
          .always(function(){    });

           //OBTENER EL NUMERO DE PRODUCTOS COMPLEMENTARIOS
          $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/getAllTblproductcomplemOfProveedor.php",  data: {solicitadoBy:"WEB", idtblproveedor:idtblproveedor}  })
            .done(function( msgProductoComplementarioProveedor ) {
              contadorDeProductosComplementario=0;
              $.each(msgProductoComplementarioProveedor.datos, function(i,item){ 
                contadorDeProductosComplementario++;
              });  
              $('#modificar_productos_complementario_perfilTienda').val(contadorDeProductosComplementario);
            })
            .fail(function( jqXHR, textStatus ) {  console.log("getAllTblproductcomplemOfProveedor fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
          .always(function(){    });

           //OBTENER EL NUMERO DE PRODUCTOS COTIZADOR
          $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/getAllTblproductcotizador.php",  data: {solicitadoBy:"WEB", idtblproveedor:idtblproveedor}  })
            .done(function( msgProductoCotizadorProveedor ) {
              contadorDeProductosCotizador=0;
              $.each(msgProductoCotizadorProveedor.datos, function(i,item){ 
                contadorDeProductosCotizador++;
              });  
              $('#modificar_productos_cotizador_perfilTienda').val(contadorDeProductosCotizador);
            })
            .fail(function( jqXHR, textStatus ) {  console.log("getAllTblproductcotizador fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
          .always(function(){    });


          //!!!!OBTENEMOS EL NOMBRE DEL USUARIO SE PUEDE OMITIR SI DESDE EL LOGIN LO PODEMOS OBTENER
          $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/getTblusuarioproveedor.php",  data: {solicitadoBy:"WEB", idtblusuarioproveedor:idtblusuarioproveedor}  })
          .done(function( msgUsuarioProveedor ) { 
            $.each(msgUsuarioProveedor.datos, function(i,item){ 
              //console.log('msgUsuarioProveedor.  idtblproveedor::'+msgUsuarioProveedor.datos[i].idtblusuarioproveedor);
              NombreCompleto=msgUsuarioProveedor.datos[i].tblusuarioproveedor_nombre+' '+msgUsuarioProveedor.datos[i].tblusuarioproveedor_apellido;
              $('#modificar_nombre_contacto_perfilTienda').val(NombreCompleto);
            });  
          })
          .fail(function( jqXHR, textStatus ) {  console.log("getTblusuarioproveedor fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
          .always(function(){    });
          
      }
      function actualizarPerfilTienda(){
        //console.log('actualizarPerfilTienda');
        //SESSION
        //idtblproveedor
        nombreprov=$("#modificar_nombre_perfilTienda").val();
        srclogo=Srclogo;
        descripcion=$("#modificar_descripcion_perfilTienda").val();
        direccion=$("#modificar_direccion_pasteleria_perfilTienda").val();
        seo=Seo;
        telftienda=$("#modificar_telefono_tienda_perfilTienda").val();
        extencion=$("#modificar_telefono_extencion_perfilTienda").val();
        celular=$("#modificar_celular_perfilTienda").val();
        email=$("#modificar_email_perfilTienda").val();
        activado=Activado;
        idtbltipopedido=Idtbltipopedido;
        idtbltiposervicio=Idtbltipopedido;
        idtblcolonia=Idtblcolonia;
        idtblpaquete=Idtblpaquete;
        //SESSION
        //emailmodifico
        /////////////////////////////////////////////////
        //nombreCompleto=$('#modificar_nombre_contacto_perfilTienda').val();
        //console.log('idtblproveedor::'+idtblproveedor+' nombreprov::'+nombreprov+' srclogo::'+srclogo+' descripcion::'+descripcion+' direccion::'+direccion+' seo::'+seo+' telftienda::'+telftienda+' extencion::'+extencion+' celular::'+celular+' email::'+email+' activado::'+activado+' idtbltipopedido::'+idtbltipopedido+' idtbltiposervicio::'+idtbltiposervicio+' idtblcolonia::'+idtblcolonia+' idtblpaquete::'+idtblpaquete+' emailmodifico::'+emailmodifico);
        //VALIDAR QUE LOS CAMPOS OBLITARIO TENGAN DATOS
        if(idtblproveedor!=''&&nombreprov!=''&&srclogo!=''&&descripcion!=''&&seo!=''&&telftienda!=''&&celular!=''&&email!=''&&activado!=''&&idtbltipopedido!=''&&idtbltiposervicio!=''&&idtblcolonia!=''&&idtblpaquete!=''&&emailmodifico!=''&&NombreCompleto!='')
        {    
          //ACTUALZIAR DATOS DE PROVEEDOR          
          $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setUpdateTblproveedor.php",  data: {solicitadoBy:"WEB", idtblproveedor:idtblproveedor, nombreprov:nombreprov, srclogo:srclogo, descripcion:descripcion, direccion:direccion, seo:seo, telftienda:telftienda, extencion:extencion, celular:celular, email:email, activado:activado, idtbltipopedido:idtbltipopedido, idtbltiposervicio:idtbltiposervicio, idtblcolonia:idtblcolonia, idtblpaquete:idtblpaquete, emailmodifico:emailmodifico}  })
            .done(function( msgUpdateProveedor ) { 
              //console.log('done msgUpdateProveedor::'+msgUpdateProveedor.datos);
              UIkit.modal.alert('Perfil de tienda actualizado');
            })
            .fail(function( jqXHR, textStatus ) {  console.log("setUpdateTblproveedor fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
            .always(function(){  
              //console.log("always");
            });            
        }else
        {
          //alert('algun campo con * esta vacio favor de verificar');
        }

      }
      function cargarDatosServicios(){
        //arregloIdHoraCierra=[];
        arregloIdTblhracierra=[];
        arregloIdTblhraabre=[];
        //arregloUdHoraDeCierra=[];
        arregloIdTblhoraEnTblhracierra=[];
        arregloIdTblhoraEnTblhraabre=[];

        contadorColAct=0;
        contadorColProve=0;
        //console.log('cargarDatosServicios');
        //ACTUALZIAR DATOS DE PROVEEDOR          
          $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/getAllTblcoloniaAct.php",  data: {solicitadoBy:"WEB"}  })
            .done(function( msgTblColonia ) { 
              $.each(msgTblColonia.datos, function(i,item){
                arregloIdTblcoloniaAct.push(msgTblColonia.datos[i].idtblcolonia);
              //console.log('msgTblColonia.  idtblproveedor::'+msgTblColonia.datos[i].idtblcolonia+' tblcolonia_nombre::'+msgTblColonia.datos[i].tblcolonia_nombre+' item::'+item);
              $("#colonias").append('<span class="icheck-inline"> <input type="checkbox" name="colonia_i_'+i+'" id="colonia_i_'+msgTblColonia.datos[i].idtblcolonia+'" value="'+msgTblColonia.datos[i].idtblcolonia+'" data-md-icheck /> <label for="checkbox_demo_inline_1" class="inline-label">'+msgTblColonia.datos[i].tblcolonia_nombre+'</label> </span>');
              contadorColonnias=i;
              contadorColAct=i;
              });  
              //CAMBIAR CHECKET LAS COLONIAS QUE ESTAN REGISTRADAS
              $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/getAllTblcoloniaprovservicio1.php",  data: {solicitadoBy:"WEB", idtblproveedor:idtblproveedor}  })
                  .done(function( msgTblColoniaProServicio ) { 
                    $.each(msgTblColoniaProServicio.datos, function(i,item){ 
                      //console.log('msgTblColoniaProServicio.  tblcolonia_idtblcolonia::'+msgTblColoniaProServicio.datos[i].tblcolonia_idtblcolonia);
                      $('#colonia_i_'+msgTblColoniaProServicio.datos[i].tblcolonia_idtblcolonia).prop('checked', true);
                      contadorColProve=i;
                      habilitadosColoniasDomicilio=true;
                    });
                    descripcionGeneralServicios();
                    //SI TODAS LAS COLONIAS DE SERVI A DOMICI ESTAN SELECCIONADAS CAMBIAMOS EL VALOR DEL CHECKBOX DE SELECCIONAR TODAS
                    if(contadorColAct==contadorColProve)
                    {
                      $('#modificar_select_todas_col_domici').prop('checked', true);
                    }
                  })
                  .fail(function( jqXHR, textStatus ) {  console.log("getAllTblcoloniaAct fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
                  .always(function(){  
                    //console.log("always");
                  });

            })
            .fail(function( jqXHR, textStatus ) {  console.log("getAllTblcoloniaAct fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
            .always(function(){  
              //console.log("always");
            });

            //MOSTRAR HORAS DE ENTREGA DE DOMICILIO DISPONIBLES
            
            $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/getAllTblhrsprovdomWithTblhora.php",  data: {solicitadoBy:"WEB", idtblproveedor:idtblproveedor}  })
                  .done(function( msgTblHoraProDomServicio ) { 
                    //console.log('horas de domiclio registrasdas::'+JSON.stringify(msgTblHoraProDomServicio, null, 4));
                    
                    $.each(msgTblHoraProDomServicio.datos, function(i,item){ 
                      //console.log('msgTblHoraProDomServicio.tblhora_idtblhora::'+msgTblHoraProDomServicio.datos[i].tblhora_hora);
                      //$('#colonia_i_'+msgTblHoraProDomServicio.datos[i].tblhora_idtblhora).prop('checked', true);
                      arregloidTblhrspromdom.push(msgTblHoraProDomServicio.datos[i].tblhora_idtblhora);
                      arreglohoraTblhora.push(msgTblHoraProDomServicio.datos[i].tblhora_hora);
                      habilitadosHorarioDomicilio=true;
                    }); 
                    descripcionGeneralServicios();
                    //console.log('imprimir encontro hora::'+$.inArray("09:00:00",arreglohoraTblhora))
                    if($.inArray("09:00:00",arreglohoraTblhora)>-1&&$.inArray("10:00:00",arreglohoraTblhora)>-1&&$.inArray("11:00:00",arreglohoraTblhora)>-1&&$.inArray("12:00:00",arreglohoraTblhora)>-1)
                    {
                      console.log('9-12');
                      $('#checkbox_demo_inline_9_12').prop('checked', true);
                      $( "#span_checkbox_demo_inline_9_12 .icheckbox_md" ).removeClass( "icheckbox_md" ).addClass( "icheckbox_md checked" );
                    }
                    if($.inArray("12:00:00",arreglohoraTblhora)>-1&&$.inArray("13:00:00",arreglohoraTblhora)>-1&&$.inArray("14:00:00",arreglohoraTblhora)>-1&&$.inArray("15:00:00",arreglohoraTblhora)>-1)
                    {
                      console.log('12-15');
                      $('#checkbox_demo_inline_12_15').prop('checked', true);
                      $( "#span_checkbox_demo_inline_12_15 .icheckbox_md" ).removeClass( "icheckbox_md" ).addClass( "icheckbox_md checked" );
                    }
                    if($.inArray("15:00:00",arreglohoraTblhora)>-1&&$.inArray("16:00:00",arreglohoraTblhora)>-1&&$.inArray("17:00:00",arreglohoraTblhora)>-1&&$.inArray("18:00:00",arreglohoraTblhora)>-1)
                    {
                      console.log('15-18');
                      $('#checkbox_demo_inline_15_18').prop('checked', true);
                      $( "#span_checkbox_demo_inline_15_18 .icheckbox_md" ).removeClass( "icheckbox_md" ).addClass( "icheckbox_md checked" );
                    }
                    if($.inArray("18:00:00",arreglohoraTblhora)>-1&&$.inArray("19:00:00",arreglohoraTblhora)>-1&&$.inArray("20:00:00",arreglohoraTblhora)>-1&&$.inArray("21:00:00",arreglohoraTblhora)>-1)
                    {
                      console.log('18-21');
                      $('#checkbox_demo_inline_18_21').prop('checked', true);
                      $( "#span_checkbox_demo_inline_18_21 .icheckbox_md" ).removeClass( "icheckbox_md" ).addClass( "icheckbox_md checked" );
                    }
                  })
                  .fail(function( jqXHR, textStatus ) {  console.log("getAllTblcoloniaAct fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
                  .always(function(){  
                    //console.log("always");
                  });
            
            //MOSTRAR HORAS DISPONIBLES DE APERTURA DE TIENDA
            $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/getAllTblhraabreWithHora.php",  data: {solicitadoBy:"WEB"}  })
              .done(function( msgTblhraabreWithHora ) {                
                $.each(msgTblhraabreWithHora.datos, function(i,item){
                  //console.log('msgTblhraabreWithHora.datos[i].idtblhracierra::'+msgTblhraabreWithHora.datos[i].idtblhraabre+' msgTblhraabreWithHora.datos[i].tblhora_hora::'+msgTblhraabreWithHora.datos[i].tblhora_hora);
                  //OBTENEMOS LA HORA APARTIR DEL ID EN TBLHRAABRE
                  idtblhraabre=msgTblhraabreWithHora.datos[i].idtblhraabre;
                  tblhora_hora=msgTblhraabreWithHora.datos[i].tblhora_hora;
                  tblhora_hora=tblhora_hora.substring(0, 5);
                  $("#modificar_hora_abre_pasteleria").append('<option value="'+idtblhraabre+'">'+tblhora_hora+'</option>');
                  habilitadosHorarioPasteleria=true;                  
                });
                descripcionGeneralServicios();
                //CAMBIAR CHECKET LA HORA ABRE QUE ESTAN REGISTRADAS
                $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/getTblhrsprovtienda.php",  data: {solicitadoBy:"WEB", idtblproveedor:idtblproveedor}  })
                  .done(function( msgTblhrsprovtienda ) { 
                    $.each(msgTblhrsprovtienda.datos, function(i,item){ 
                        tblhraabre_idtblhraabre=msgTblhrsprovtienda.datos[i].tblhraabre_idtblhraabre;
                      $("#modificar_hora_abre_pasteleria").val(tblhraabre_idtblhraabre).change();
                    });  
                  })
                  .fail(function( jqXHR, textStatus ) {  console.log("getTblhrsprovtienda fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
                  .always(function(){  
                    //console.log("always");
                  });                                                       
              })
              .fail(function( jqXHR, textStatus ) {  console.log("getAllTblhracierraWithHora fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
              .always(function(){  
                //console.log("always");
              }); 
            //MOSTRAR HORAS DISPONIBLES DE CIERRE DE TIENDA     
            $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/getAllTblhracierraWithHora.php",  data: {solicitadoBy:"WEB"}  })
              .done(function( msgTblhrcierraWithHora ) {                
                $.each(msgTblhrcierraWithHora.datos, function(i,item){
                  //console.log('msgTblhrcierraWithHora.datos[i].idtblhracierra::'+msgTblhrcierraWithHora.datos[i].idtblhracierra+' msgTblhrcierraWithHora.datos[i].tblhora_hora::'+msgTblhrcierraWithHora.datos[i].tblhora_hora);
                  //OBTENEMOS LA HORA APARTIR DEL ID EN TBLHRAABRE
                  idtblhracierra=msgTblhrcierraWithHora.datos[i].idtblhracierra;
                  tblhora_hora=msgTblhrcierraWithHora.datos[i].tblhora_hora;
                  tblhora_hora=tblhora_hora.substring(0, 5);
                  $("#modificar_hora_cierra_pasteleria").append('<option value="'+idtblhracierra+'">'+tblhora_hora+'</option>');
                  habilitadosHorarioPasteleria=true;
                });
                descripcionGeneralServicios();
                //CAMBIAR CHECKET LA HORA CIERRE QUE ESTAN REGISTRADAS
                $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/getTblhrsprovtienda.php",  data: {solicitadoBy:"WEB", idtblproveedor:idtblproveedor}  })
                  .done(function( msgTblhrsprovtienda ) { 
                    $.each(msgTblhrsprovtienda.datos, function(i,item){ 
                      tblhracierra_idtblhracierra=msgTblhrsprovtienda.datos[i].tblhracierra_idtblhracierra;
                      $("#modificar_hora_cierra_pasteleria").val(tblhracierra_idtblhracierra).change();
                    });  
                  })
                  .fail(function( jqXHR, textStatus ) {  console.log("getTblhrsprovtienda fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
                  .always(function(){  
                    //console.log("always");
                  });
              })
              .fail(function( jqXHR, textStatus ) {  console.log("getAllTblhracierraWithHora fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
              .always(function(){  
                //console.log("always");
              });

              //MOSTRAR DIAS DISPONIBLES            
            $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/getAllTbldiasemana.php",  data: {solicitadoBy:"WEB"}  })
              .done(function( msgTbldiasemana ) { 
                $.each(msgTbldiasemana.datos, function(i,item){ 
                  //console.log('msgTbldiasemana.idtbldiasemana::'+msgTbldiasemana.datos[i].idtbldiasemana+' tbldiasemana_dia::'+msgTbldiasemana.datos[i].tbldiasemana_dia);
                  $("#modificar_dias_servicio").append('<span class="icheck-inline"> <input type="checkbox" name="dia_i_'+i+'" id="dia_i_'+msgTbldiasemana.datos[i].idtbldiasemana+'" value="'+msgTbldiasemana.datos[i].idtbldiasemana+'" data-md-icheck /> <label for="checkbox_demo_inline_1" class="inline-label">'+msgTbldiasemana.datos[i].tbldiasemana_dia+'</label> </span>');
                  contadorDias=i;
                  habilitadosDiasServicio=true;
                  //////////////////////////////
                });
                descripcionGeneralServicios();  
                //CAMBIAR CHECKET LOS DIAS QUE ESTAN REGISTRADAS
                $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/getAllTbldiaprovservicioOfProveedor.php",  data: {solicitadoBy:"WEB", idtblproveedor:idtblproveedor}  })
                  .done(function( msgTbldiaprovservicio ) { 
                    $.each(msgTbldiaprovservicio.datos, function(i,item){ 
                      //console.log('msgTbldiaprovservicio.  tbldiasemana_idtbldiasemana::'+msgTbldiaprovservicio.datos[i].tbldiasemana_idtbldiasemana);
                      $('#dia_i_'+msgTbldiaprovservicio.datos[i].tbldiasemana_idtbldiasemana).prop('checked', true);
                    });  
                  })
                  .fail(function( jqXHR, textStatus ) {  console.log("getAllTbldiaprovservicioOfProveedor fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
                  .always(function(){  
                    //console.log("always");
                  });
              })
              .fail(function( jqXHR, textStatus ) {  console.log("getAllTbldiasemana fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
              .always(function(){  
                //console.log("always");
              });
            
        //$("#colonias_servicio_domicilio").append('<option value="99">Nuevo</option>');
        //$("#colonias").append('<span class="icheck-inline"> <input type="checkbox" name="checkbox_lunes" id="checkbox_demo_inline_1" data-md-icheck /> <label for="checkbox_demo_inline_1" class="inline-label">Lunes</label> </span>');
      }
      function descripcionGeneralServicios(){
        pedidos_habilitados='';
        servicios_habilitados='';
      if(habilitadosDiasServicio)
        pedidos_habilitados=pedidos_habilitados+' Sobre pedido';
      if(habilitadosHorarioPasteleria)
        pedidos_habilitados=pedidos_habilitados+' hoy';
      if(habilitadosHorarioDomicilio)
        servicios_habilitados=servicios_habilitados+' hora domicilio';
      if(habilitadosColoniasDomicilio)
        servicios_habilitados=servicios_habilitados+' Colonia domicilio';
      $('#pedidosHabilitados').val(pedidos_habilitados);
      $('#serviciosHabilitados').val(servicios_habilitados);
      }
      function actualizarPerfilTiendaServicios()
      {
        //REGISTRO DE COLONIAS CON SERVICIO A DOMICILIO
        //ELIMINAR TODAS LAS COLONIAS QUE TIENEN 
        $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setDeleteAllTblcoloniaprovservicioOfProveedor.php",  data: {solicitadoBy:"WEB", idtblproveedor:idtblproveedor}  })
            .done(function( msgTblColonia ) { 
              //console.log('registro la colonias::'+msgTblColonia);
              //COMENZAMOS CON REGISTRAR LAS COLONIAS
              arregloIdColoniasRegistrar=[];
              //console.log('entro a actualizarPerfilTiendaServicios');
              for(i=0;i<=contadorColonnias;i++)
              {
                //$( "input[name='colonia_i_"+i+"']" ).val( "has man in it!" );
                valor=$( "input[name='colonia_i_"+i+"']" );
                //valor=$("#colonia_i_"+i);
                inputColonia=$( "input[name='colonia_i_"+i+"']" ).is(':checked');
                //inputColonia=$("#colonia_i_"+i).is(':checked');

                //console.log('entroa l for'+valor.val()+' checkeds::'+inputColonia);
                if(inputColonia)
                {
                  idtblcolonia=valor.val();
                  //emailcreo=
                  //asginar al arreglo de colonias o REGISTRAR LAS COLONIAS CON EL PROVEEDOR
                  /*
                  $solicitadoBy=$_POST["solicitadoBy"];
                  $idtblproveedor=$_POST["idtblproveedor"];
                  $idtblcolonia=$_POST["idtblcolonia"];
                  $emailcreo=$_POST["emailcreo"];
                   */
                  arregloIdColoniasRegistrar.push(valor.val());
                  //console.log('idtblcolonia para registro::'+idtblcolonia);
                  //REGISTRAMOS LAS COLONIAS SELECCIONADAS
                  $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setTblcoloniaprovservicio.php",  data: {solicitadoBy:"WEB", idtblproveedor:idtblproveedor, idtblcolonia:idtblcolonia, emailcreo:emailcreo}  })
                  .done(function( msgTblColonia ) { 
                    //console.log('registro la colonias::'+msgTblColonia.datos);
                  })
                  .fail(function( jqXHR, textStatus ) {  console.log("getAllTblcoloniaAct fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
                  .always(function(){  
                    //console.log("always");
                  });
                  
                }
              }
              //console.log('arregloIdColoniasRegistrar::'+arregloIdColoniasRegistrar.length);
              ////////////////////////////////////////////
            })
            .fail(function( jqXHR, textStatus ) {  console.log("setDeleteAllTblcoloniaprovservicioOfProveedor fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
            .always(function(){  
              //console.log("always");
            });
        //REGISTRO DE HORA DE APERTURA Y CIERRE
        //BORRAMOS EL ATERIOR HORARIO DE TIENDA
        $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setDeleteTblhrsprovtienda.php",  data: {solicitadoBy:"WEB", idtblproveedor:idtblproveedor}  })
          .done(function( msgTblhrsprovtienda ) { 
            //console.log('Elimino horario de tienda del proveedor::'+msgTblhrsprovtienda.datos);
            //OBTENEMOS LOS DOS HORAS APERTURA Y DE CIERRE        
            idtblhraabre=$('#modificar_hora_abre_pasteleria').val();
            idtblhracierra=$('#modificar_hora_cierra_pasteleria').val();
            //console.log(' idtblhraabre::'+idtblhraabre+' idtblhracierra::'+idtblhracierra+' idtblproveedor::'+idtblproveedor+' emailcreo::'+emailcreo);
            //SI LOS DOS REGISTROS TIENEN INFORMACION
            if(idtblhraabre!=''&&idtblhracierra!='')
            {    
              $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setTblhrsprovtienda.php",  data: {solicitadoBy:"WEB", idtblproveedor:idtblproveedor, idtblhraabre:idtblhraabre, idtblhracierra:idtblhracierra, emailcreo:emailcreo}  })
              .done(function( msgTblhrsprovtienda ) { 
                //console.log('registro la horaAbre y horaCierra::'+msgTblhrsprovtienda.datos);
              })
              .fail(function( jqXHR, textStatus ) {  console.log("setTblhrsprovtienda fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
              .always(function(){  
                //console.log("always");
              });          
            }
          })
          .fail(function( jqXHR, textStatus ) {  console.log("setDeleteTblhrsprovtienda fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
          .always(function(){  
            //console.log("always");
          });
        //REGISTRO DE DIAS CON SERVICIO 
        //ELIMINAR TODAS LAS DIAS QUE TIENEN 
        $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setDeleteAllTbldiaprovservicioOfProveedor.php",  data: {solicitadoBy:"WEB", idtblproveedor:idtblproveedor}  })
            .done(function( msgsetDeleteAllTbldiaprovservicioOfProveedor ) { 
              //console.log('Elimino la dias::'+msgsetDeleteAllTbldiaprovservicioOfProveedor);
              //COMENZAMOS CON REGISTRAR LAS COLONIAS
              //arregloIdColoniasRegistrar=[];
              arregloIdDiasRegistrar=[];
              //console.log('entro a actualizarPerfilTiendaServicios contadorDias::'+contadorDias);
              for(i=0;i<=contadorDias;i++)
              {
                //$( "input[name='colonia_i_"+i+"']" ).val( "has man in it!" );
                valor=$( "input[name='dia_i_"+i+"']" );
                //valor=$("#colonia_i_"+i);
                //inputColonia=$( "input[name='dia_i_"+i+"']" ).is(':checked');
                inputDia=$( "input[name='dia_i_"+i+"']" ).is(':checked');
                //inputColonia=$("#colonia_i_"+i).is(':checked');

                //console.log('entroa l for'+valor.val()+' checkeds::'+inputDia);
                if(inputDia)
                {
                  idtbldiasemana=valor.val();
                  //emailcreo=
                  //asginar al arreglo de colonias o REGISTRAR LAS COLONIAS CON EL PROVEEDOR
                  /*
                  $solicitadoBy=$_POST["solicitadoBy"];
                  $idtblproveedor=$_POST["idtblproveedor"];
                  $idtbldiasemana=$_POST["idtbldiasemana"];
                  $emailcreo=$_POST["emailcreo"];
                   */
                  arregloIdDiasRegistrar.push(valor.val());
                  //console.log('idtbldiasemana para registro::'+idtbldiasemana);
                  //REGISTRAMOS LAS COLONIAS SELECCIONADAS
                  $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setTbldiaprovservicio.php",  data: {solicitadoBy:"WEB", idtblproveedor:idtblproveedor, idtbldiasemana:idtbldiasemana, emailcreo:emailcreo}  })
                  .done(function( msgsetTbldiaprovservicio ) { 
                    //console.log('registro la dias::'+msgsetTbldiaprovservicio.datos);
                  })
                  .fail(function( jqXHR, textStatus ) {  console.log("setTbldiaprovservicio fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
                  .always(function(){  
                    //console.log("always");
                  });
                  
                }
              }
              //console.log('arregloIdDiasRegistrar::'+arregloIdDiasRegistrar.length);
              ////////////////////////////////////////////
            })
            .fail(function( jqXHR, textStatus ) {  console.log("setDeleteAllTbldiaprovservicioOfProveedor fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
            .always(function(){  
              //console.log("always");
            });

        //REGISTRO DE HORAS CON SERVICIO A DOMICILIO
        //ELIMINAR TODAS HORAS CON SERVICIO A DOMICLIO
        $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setDeleteTblhrsprovdomOfProveedor.php",  data: {solicitadoBy:"WEB", idtblproveedor:idtblproveedor}  })
          .done(function( msgsetDeleteTblhrsprovdomOfProveedor ) { 
            console.log('elimino las horas domicilio::'+msgsetDeleteTblhrsprovdomOfProveedor.datos);
            //REGISTRAMOS LAS HORAS SEGUN LAS SELECCIONADAS
            inputHoraDom_9_12=$( "input[id='checkbox_demo_inline_9_12']" ).is(':checked');
            console.log('inputHoraDom_9_12::'+inputHoraDom_9_12);
            inputHoraDom_12_15=$( "input[id='checkbox_demo_inline_12_15']" ).is(':checked');
            console.log('inputHoraDom_12_15::'+inputHoraDom_12_15);
            inputHoraDom_15_18=$( "input[id='checkbox_demo_inline_15_18']" ).is(':checked');
            console.log('inputHoraDom_15_18::'+inputHoraDom_15_18);
            inputHoraDom_18_21=$( "input[id='checkbox_demo_inline_18_21']" ).is(':checked');
            console.log('inputHoraDom_18_21::'+inputHoraDom_18_21);

            if(inputHoraDom_9_12)
            {
              arregloHoras912=[2,3,4,5];
              $.each(arregloHoras912, function(i,item){ 
                console.log('arregloHoras912::'+item);
                $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setTblhrsprovdom.php",  data: {solicitadoBy:"WEB", idtblproveedor:idtblproveedor, idtblhora:item, emailcreo:emailcreo}  })
                .done(function( msgsetTblhrsprovdom ) { 
                  console.log('registro las horas domicilio::'+msgsetTblhrsprovdom.datos);
                  console.log('imprimir json::'+JSON.stringify(msgsetTblhrsprovdom, null, 4));              
                })
                .fail(function( jqXHR, textStatus ) {  console.log("setTblhrsprovdom fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
                .always(function(){  
                  //console.log("always");
                });
              });
            }
            if(inputHoraDom_12_15)
            {
              arregloHoras1215=[5,6,7,8];
              $.each(arregloHoras1215, function(i,item){ 
                console.log('arregloHoras1215::'+item);
                $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setTblhrsprovdom.php",  data: {solicitadoBy:"WEB", idtblproveedor:idtblproveedor, idtblhora:item, emailcreo:emailcreo}  })
                .done(function( msgsetTblhrsprovdom ) { 
                  console.log('regsitro las horas domicilio::'+msgsetTblhrsprovdom.datos);              
                })
                .fail(function( jqXHR, textStatus ) {  console.log("setTblhrsprovdom fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
                .always(function(){  
                  //console.log("always");
                });
              });
            }
            if(inputHoraDom_15_18)
            {
              arregloHoras1518=[8,9,10,11];
              $.each(arregloHoras1518, function(i,item){ 
                console.log('arregloHoras1518::'+item);
                $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setTblhrsprovdom.php",  data: {solicitadoBy:"WEB", idtblproveedor:idtblproveedor, idtblhora:item, emailcreo:emailcreo}  })
                .done(function( msgsetTblhrsprovdom ) { 
                  console.log('regsitro las horas domicilio::'+msgsetTblhrsprovdom.datos);              
                })
                .fail(function( jqXHR, textStatus ) {  console.log("setTblhrsprovdom fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
                .always(function(){  
                  //console.log("always");
                });
              });
            }
            if(inputHoraDom_18_21)
            {
              arregloHoras1821=[11,12,13,14];
              $.each(arregloHoras1821, function(i,item){ 
                console.log('arregloHoras1821::'+item);
                $.ajax({  method: "POST",  dataType: "json",  url: "./../../controllers/setTblhrsprovdom.php",  data: {solicitadoBy:"WEB", idtblproveedor:idtblproveedor, idtblhora:item, emailcreo:emailcreo}  })
                .done(function( msgsetTblhrsprovdom ) { 
                  console.log('regsitro las horas domicilio::'+msgsetTblhrsprovdom.datos);              
                })
                .fail(function( jqXHR, textStatus ) {  console.log("setTblhrsprovdom fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
                .always(function(){  
                  //console.log("always");
                });
              });
            }
          })
          .fail(function( jqXHR, textStatus ) {  console.log("setDeleteTblhrsprovdomOfProveedor fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
          .always(function(){  
            //console.log("always");
          }); 
      }      
    </script>

      <!-- page specific plugins           -->
      <!-- ionrangeslider -->
      <script src="bower_components/ion.rangeslider/js/ion.rangeSlider.min.js"></script>
      <!-- htmleditor (codeMirror) -->
      <script src="assets/js/uikit_htmleditor_custom.min.js"></script>
      <!-- inputmask-->
      <script src="bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.js"></script>

      <!--  forms advanced functions -->
      <script src="assets/js/pages/forms_advanced.min.js"></script>

      <!-- kendo UI -->
      <script src="assets/js/kendoui_custom.min.js"></script>

      <!--  kendoui functions -->
      <script src="assets/js/pages/kendoui.min.js"></script>

      

     
      <!-- AGREGARAN LOS SCRIPTS DEVELOPER -->
      <!-- /////////////////////////////// -->
      <!-- /////////////////////////////// -->
      <!-- /////////////////////////////// -->
  </body>
</html>