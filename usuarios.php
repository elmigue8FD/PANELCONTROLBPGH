
<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> 
<html lang="en"> <!--<![endif]-->
 <head>    
  <?php include("./codigo_general/head.php"); ?>

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
    <div class="md-card-head-avatar md-fab" data-uk-modal="{target:'#modal_alta_usuario'}" >
     <i class="material-icons md-24 md-color-red-300">&#xE7FE;</i>
    </div>
    <br/>
    <div class="uk-grid uk-grid-medium uk-grid-width-medium-1-2 uk-grid-width-large-1-3 hierarchical_show " data-uk-grid="{target:'md-card-content',gutter: 20}" id="listaUsuarios" >
    </div>
    <div>
    <!--POPUP DE ALTA USUARIO-->
      <div class="uk-modal" id="modal_alta_usuario" >
       <div class="uk-modal-dialog">
       <button type="button" class="uk-modal-close uk-close"></button>
        <div class="uk-modal-header">
         <h3 class="uk-modal-title"><i class="material-icons md-48">&#xE7FE;</i> Nuevo usuario </h3>
        </div>
        <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-3"></div>
         <div class="uk-width-medium-1-3"></div>
         <div class="uk-width-medium-1-3">         
          <input type="checkbox" checked name="switch_activado" id="switch_activado" />
          <label for="switch_activado" class="inline-label">Activado</label>
         </div>
         
           <div class=" uk-width-medium-1-1">  
         <form id="form_alta_usuario" class="uk-form-stacked">
          <div class="uk-form-row">
            <label>* Nombre(s)</label>
            <input type="text" class="md-input" name="usuarionombre" id="usuarionombre" />
          </div>
          <div class="uk-form-row ">
            <label>* Apellidos</label>
            <input type="text" class="md-input" name="usuarioapellido" id="usuarioapellido" />
          </div>
          <div class="uk-form-row">
            <label>*Email</label>
            <input type="text" class="md-input masked_input" name="usuarioemail" id="usuarioemail"  data-inputmask="'alias': 'email'" data-inputmask-showmaskonhover="false" />
          </div>
          <div class="uk-form-row">
            <label>* Celular</label>
            <input type="text" class="md-input masked_input" name="usuariocelular" id="usuariocelular" data-inputmask="'mask': '99-99-99-99-99'" data-inputmask-showmaskonhover="false"/>
         </div>
         <div class="uk-form-row">
            <label>* Password</label>
            <input type="password" class="md-input" name="usuariopasswd" id="usuariopasswd" />
         </div>
         <div class="uk-form-row">
            <label>* Repetir Password</label>
            <input type="password" class="md-input" name="usuariopasswd2" id="usuariopasswd2" />
         </div>
         <div class="uk-form-row uk-width-medium-1-1">
           <select id="select_acceso" class="md-input">
            <option value="" disabled selected hidden>* Nivel de acceso</option>
           </select>
         </div> 
        </form>
        </div>          
        </div>
        <div class="uk-modal-footer uk-text-right">
          <button type="button" class="md-btn md-btn-flat md-btn md-color-red-300" onclick="registrarUsuario()">Registrar</button>
        </div>
        </div>
       </div>
       <!--POPUP DE MODIFICAR USUARIO-->
       <div class="uk-modal" id="modal_modificar_usuario" >
       <div class="uk-modal-dialog">
       <button type="button" class="uk-modal-close uk-close"></button>
        <div class="uk-modal-header">
         <h3 class="uk-modal-title"><i class="material-icons md-48">&#xE7FE;</i> Modificar usuario </h3>
        </div>
        <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-3"></div>
         <div class="uk-width-medium-1-3"></div>
         <div class="uk-width-medium-1-3">         
          <input type="checkbox"  name="switch_activadomodif" id="switch_activadomodif" />
          <label for="switch_activadomodif" class="inline-label">Activado</label>
         </div> 
        <div class=" uk-width-medium-1-1">  
         <form id="form_modificar_usuario" class="uk-form-stacked">
          <div class="uk-form-row">
            <span class="md-color-grey-500">* Nombre(s)</span><span style="display:none" id="idusuario"></span>
            <input type="text" class="md-input" name="usuarionombremodif" id="usuarionombremodif" />
          </div>
          <div class="uk-form-row ">
            <span class="md-color-grey-500">* Apellidos</span>
            <input type="text" class="md-input" name="usuarioapellidomodif" id="usuarioapellidomodif" />
          </div>
          <div class="uk-form-row">
            <span class="md-color-grey-500">*Email</span>
            <input type="text" class="md-input masked_input" name="usuarioemailmodif" id="usuarioemailmodif" data-inputmask="'alias': 'email'" data-inputmask-showmaskonhover="false" />
          </div>
          <div class="uk-form-row">
            <span class="md-color-grey-500">* Celular</span>
            <input type="tel" class="md-input masked_input" name="usuariocelularmodif" id="usuariocelularmodif" data-inputmask="'mask': '99-99-99-99-99'" data-inputmask-showmaskonhover="false" />
         </div>
         <div class="uk-form-row">
            <span class="md-color-grey-500">* Password</span>
            <input type="password" class="md-input" name="usuariopasswdmodif" id="usuariopasswdmodif" />
         </div>
         <div class="uk-form-row">
            <span class="md-color-grey-500">* Repetir Password</span>
            <input type="password" class="md-input" name="usuariopasswd2modif" id="usuariopasswd2modif" />
         </div>
         <div class="uk-form-row uk-width-medium-1-1">
           <select id="select_accesomodif" class="md-input"></select>
         </div> 
        </form>
        </div>          
        </div>
        <div class="uk-modal-footer uk-text-right">
          <button type="button" class="md-btn md-btn-flat md-btn md-color-red-300" onclick="modificarUsuario()">Actualizar Datos</button>
        </div>
        </div>
       </div>
      </div>
     </div> 
   </div>
  <!-- CODIGO EN GENERAL -->
  <?php include('./codigo_general/script_common.php'); ?>
  <!-- page specific plugins           -->
  <script src="./assets/js/pages/page_contact_list.min.js"></script>
  <!-- parsley (validation) -->
    <script>
    // load parsley config (altair_admin_common.js)
    altair_forms.parsley_validation_config();
    </script>
    <script src="./bower_components/parsleyjs/dist/parsley.min.js"></script>
  <!--CODIGO FUNCIONALIDAD-->
  <script type="text/javascript">
   //Variables de Sesion
    var  idtblproveedor = 1;
    var tblproveedorNombre = "MisPasteles";
    var emailproveedor = "mispasteles@gmail.com";

  $( window ).ready(function()
    {
        console.log('pagina lista');
        mostrarUsuario();
        tiposdeaccesos();

    }); 

   function tiposdeaccesos(){
     var acceso = $("#select_acceso");
     var accesomodif = $("#select_accesomodif");

     $.ajax({ 
       method: "POST",dataType: "json",url: "./../../controllers/getAllTblnivelaccesoAct.php", data: {solicitadoBy:solicitadoBy}})
            .done(function(msg4){
                 $.each(msg4.datos, function(i,item){
                  acceso.append('<option value="' + item.idtblniveleacceso + '">' + item.tblniveleacceso_nombre + '</option>');
                  accesomodif.append('<option value="' + item.idtblniveleacceso + '">' + item.tblniveleacceso_nombre + '</option>');    
                 });
                
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      .always(function(){  console.log("always");});
   }   

   
   function mostrarUsuario(){
    var acceso="";
    $.ajax({ 
      method: "POST",dataType: "json",url: "./../../controllers/getAllTblusuarioproveedorbyTblproveedor.php", data: {solicitadoBy:solicitadoBy,idtblproveedor:idtblproveedor}})
        .done(function(msg){
             $.each(msg.datos, function(i,item){
                idnivelacceso = item.tblniveleacceso_idtblniveleacceso;

                $("#listaUsuarios").append('<div data-product-name="P1"><div  class="md-card"><div class="md-card-head md-bg-grey-400"><div class="uk-text-center"><img class="md-card-head-avatar" src="./assets/img/avatars/users.png" /></div><h3 class=" uk-text-center md-color-white">'+item.tblusuarioproveedor_nombre+" "+item.tblusuarioproveedor_apellido+'</h3></div><div class="md-card-content"><ul class="md-list md-list-addon"><li><div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE7FD;</i></div><div class="md-list-content" id="acceso'+i+'"></div></li><li><div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE158;</i></div><div class="md-list-content"><span class="md-list-heading">'+item.tblusuarioproveedor_email+'</span><span class="uk-text-small uk-text-muted">Email</span></div></li><li><div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE0CD;</i></div><div class="md-list-content"><span class="md-list-heading">'+item.tblusuarioproveedor_celular+'</span><span class="uk-text-small uk-text-muted">Celular</span></div></li><li><div class="uk-grid uk-grid-medium" data-uk-grid-margin><div class="uk-width-large-1-2"><button type="button" class="md-btn  md-bg-grey-200 md-color-red-300  md-btn-block md-btn-wave-light waves-effect waves-button waves-light" onclick="eliminarUsuario('+item.idtblusuarioproveedor+')">Eliminar</button></div><div class="uk-width-large-1-2"><button type="button" class="md-btn md-color-red-300 md-bg-grey-200 md-btn-block md-btn-wave-light waves-effect waves-button waves-light" data-uk-modal="{target:'+"'#modal_modificar_usuario'"+'}" onclick="datosmodificarUsuario('+item.idtblusuarioproveedor+')">Modificar</button></div></div></li></ul></div></div></div>');

                $.ajax({ 
                   method: "POST",dataType: "json",url: "./../../controllers/getTblnivelacceso.php", data: {solicitadoBy:solicitadoBy,idnivelacceso:idnivelacceso}})
                        .done(function(msg2){
                          $.each(msg2.datos, function(x,item){  
                            $("#acceso"+i).append('<span class="md-list-heading">'+item.tblniveleacceso_nombre+'</span><span class="uk-text-small uk-text-muted">Acceso</span>');
                        })})
                  .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                  .always(function(){  console.log("always");});
             });  
        })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      .always(function(){  console.log("always");});

   } 

  function registrarUsuario(){


    usuarionombre=$("#usuarionombre").val();
    usuarioapellido=$("#usuarioapellido").val();
    usuarioemail= $("#usuarioemail").val();
    usuariocelular=$("#usuariocelular").val();
    usuariopasswd=$("#usuariopasswd").val();
    usuariopasswd2 = $("#usuariopasswd2").val();
    usuarioactivado =$("#switch_activado").prop('checked');
    idnivelacceso=$("#select_acceso").val();

    if(usuarioactivado){
      usuarioactivado='1';
    }else{
      usuarioactivado='';
    }


    if(usuarionombre!="" && usuarioapellido!="" && usuarioemail!="" && usuariocelular!="" && usuariopasswd!="" && usuariopasswd2!=""&& idnivelacceso!=null){

       //valida la direccion de correo es correcta y el passwd no tenga espacios vacios
       if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(usuarioemail)) || (/^\s+$/.test(usuariopasswd)) || (/^\s+$/.test(usuariopasswd2))){
            UIkit.modal.alert('Verifique la direccion de correo electronico (ejemplo@ejemplo.com) y/o ingrese un password correcto');
          }else{

            if(usuariopasswd!=usuariopasswd2){
              UIkit.modal.alert('Los Password no son identicos, intentalo de nuevo');
            }else {
            UIkit.modal.confirm("Si los datos del usuario son correctos, presione Ok", function(){
              $.ajax({ 
                   method: "POST",dataType: "json",url: "./../../controllers/setCheckTblusuarioproveedor.php", data: {solicitadoBy:solicitadoBy,idtblproveeedor:idtblproveedor,emailproveedor:usuarioemail}})
                        .done(function(msg){
                            console.log(msg);
                            if(parseInt(msg.datos)==1){
                              UIkit.modal.alert(usuarioemail+'se encuentra agregado');
                            }else {
                              $.ajax({ 
                               method: "POST",dataType: "json",url: "./../../controllers/setTblusuarioproveedor.php", data: {solicitadoBy:solicitadoBy,nombreproveedor:usuarionombre,apellidoproveedor:usuarioapellido,emailproveedor:usuarioemail,celularproveedor:usuariocelular,activado:usuarioactivado,idtblproveedor:idtblproveedor,idtblnivelacceso:idnivelacceso,password:usuariopasswd,emailcreo:emailproveedor}})
                                .done(function(msg){
                                    console.log(msg);
                                    if(parseInt(msg.success)==1){
                                      UIkit.modal("#modal_alta_usuario").hide();
                                      $('#form_alta_usuario')[0].reset();
                                      UIkit.modal.alert('Usuario Registrado con éxito');
                                      $('#listaUsuarios').empty();
                                      mostrarUsuario();
                                    }else {
                                      UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');
                                    }                          
                                  })
                              .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                              .always(function(){  console.log("always");});
                             }
                          })
                  .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                  .always(function(){  console.log("always");});
            });  
           }
          }
    } else UIkit.modal.alert('Es necesario completar los campos obligatorios (*)');
  }

  function eliminarUsuario(idusuario){
    UIkit.modal.confirm('Si desea eliminar al usuario,presione Ok', function(){

      $.ajax({ 
       method: "POST",dataType: "json",url: "./../../controllers/setDeleteTblusuarioproveedor.php", data: {solicitadoBy:solicitadoBy,idtblusuarioproveedor:idusuario}})
            .done(function(msg){
                console.log(msg);
                if(parseInt(msg.datos)==1){
                  UIkit.modal.alert('Usuario Eliminado');
                  $('#listaUsuarios').empty();
                  mostrarUsuario();
                }
              })
          .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
          .always(function(){  console.log("always");});
    });
  }

  function datosmodificarUsuario(idusuario){

    $.ajax({ 
       method: "POST",dataType: "json",url: "./../../controllers/getTblusuarioproveedor.php", data: {solicitadoBy:solicitadoBy,idtblusuarioproveedor:idusuario}})
            .done(function(msg){
                console.log("HOLIII");
                console.log(msg);
                 $.each(msg.datos, function(x,item){ 
                  $("#usuarionombremodif").val(item.tblusuarioproveedor_nombre);
                  $("#usuarioapellidomodif").val(item.tblusuarioproveedor_apellido);
                  $("#usuarioemailmodif").val(item.tblusuarioproveedor_email);
                  $("#usuariocelularmodif").val(item.tblusuarioproveedor_celular);
                  if(parseInt(item.tblusuarioproveedor_activado)!=0){
                    $("#switch_activadomodif").prop("checked", true);
                  }else {
                    $("#switch_activadomodif").prop("checked", false);
                  }
                  $("#select_accesomodif").val(item.tblniveleacceso_idtblniveleacceso);
                  $("#idusuario").text(item.idtblusuarioproveedor);
                 })
              })
          .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
          .always(function(){  console.log("always");});

    
  }
  function modificarUsuario(){

    idusuario=$('#idusuario').text();
    usuarionombremodif=$("#usuarionombremodif").val();
    usuarioapellidomodif=$("#usuarioapellidomodif").val();
    usuarioemailmodif= $("#usuarioemailmodif").val();
    usuariocelularmodif=$("#usuariocelularmodif").val();
    usuariopasswdmodif=$("#usuariopasswdmodif").val();
    usuariopasswd2modif=$("#usuariopasswd2modif").val();
    activadomodif =$("#switch_activadomodif").prop('checked');
    idnivelaccesomodif=$("#select_accesomodif").val();

    if(activadomodif){
      activadomodif='1';
    }else{activadomodif='';}

 
    if(usuarionombremodif!="" && usuarioapellidomodif!="" && usuarioemailmodif!="" && usuariocelularmodif!="" && usuariopasswdmodif!="" && idnivelaccesomodif!=null){
     
       //valida la direccion de correo es correcta y el passwd no tenga espacios vacios
       if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(usuarioemailmodif)) || (/^\s+$/.test(usuariopasswdmodif)) || (/^\s+$/.test(usuariopasswd2modif))){
            UIkit.modal.alert('Verifique la direccion de correo electronico (ejemplo@ejemplo.com) y/o ingrese un password correcto');
          }else{

            if(usuariopasswdmodif!=usuariopasswd2modif){
              UIkit.modal.alert('Los Password no son identicos, intentalo de nuevo');
            }else {
            UIkit.modal.confirm("Si los datos del usuario son correctos, presione Ok", function(){ 
            $.ajax({ 
                   method: "POST",dataType: "json",url: "./../../controllers/setUpdateTblusuarioproveedor.php", data:{solicitadoBy:solicitadoBy,idtblusuarioproveedor:idusuario,nombreproveedor:usuarionombremodif,apellidoproveedor:usuarioapellidomodif,emailproveedor:usuarioemailmodif,activado:activadomodif,celularproveedor:usuariocelularmodif,idtblproveedor:idtblproveedor,idtblnivelacceso:idnivelaccesomodif,password:usuariopasswdmodif,emailmodifico:emailproveedor}})
                        .done(function(msg){
                            if(parseInt(msg.success)==1){
                              UIkit.modal("#modal_modificar_usuario").hide();
                              $('#form_modificar_usuario')[0].reset();
                              UIkit.modal.alert('Usuario Modificado con éxito');
                              $('#listaUsuarios').empty();
                              mostrarUsuario();
                            }else{
                              UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');
                            }                          
                          })
                  .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                  .always(function(){  console.log("always");});
            });  
           }
        }
    } else UIkit.modal.alert('Es necesario completar los campos obligatorios (*)');

  }

  </script>
    <!-- page specific plugins           -->
      <!-- ionrangeslider -->
      <script src="bower_components/ion.rangeslider/js/ion.rangeSlider.min.js"></script>
      <!-- inputmask-->
      <script src="bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.js"></script>
      <!--  forms advanced functions -->
      <script src="assets/js/pages/forms_advanced.min.js"></script>
      <!-- kendo UI -->
      <script src="assets/js/kendoui_custom.min.js"></script>
      <!--  kendoui functions -->
      <script src="assets/js/pages/kendoui.min.js"></script>
  <!--END CODIGO FUNCIONALIDAD-->
 </body>
</html>