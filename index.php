<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> 
<html lang="en"> <!--<![endif]-->
  <head>
    <?php include("./codigo_general/head.php"); ?>
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>
    <!-- altair admin login page -->
    <link rel="stylesheet" href="assets/css/login_page.min.css" />
    
  </head>
  <body class="login_page">

    <div class="login_page_wrapper">
      <div class="md-card" id="login_card">
        <div class="md-card-content large-padding" id="login_form">
          <div class="login_heading">
            <!--<div class="user_avatar"> </div>-->
            <img src="./assets/img/bepickler.png">
          </div>
          <form>
          <!--role="form" id="formLogin" name="formLogin" method="post" action="./../../controllers/setCheckTblusuarioproveedorLogin.php"-->
            <div class="uk-form-row">
              <label for="login_username">Usuario</label>
              <input class="md-input" type="text" id="emailproveedor" name="emailproveedor" />
            </div>
            <div class="uk-form-row">
              <label for="login_password">Password</label>
              <input class="md-input" type="password" id="passwordproveedor" name="passwordproveedor" />
            </div>
            <div class="uk-margin-medium-top ">
              <a id="sigIn" class="md-btn md-btn-primary md-btn-block md-btn-large md-bg-pink-300">Acceder</a>
            </div>
            <div class="uk-margin-top">
              <a href="ayudaAcceder.php" id="login_help_show" class="uk-float-right md-color-pink-300">¿Necesitas ayuda?</a>
              <!--
              <span class="icheck-inline">
                <input type="checkbox" name="login_page_stay_signed" id="login_page_stay_signed" data-md-icheck />
                <label for="login_page_stay_signed" class="inline-label">Stay signed in</label>
              </span>
              -->
            </div>
          </form>
        </div>
        <div class="md-card-content large-padding uk-position-relative" id="login_help" style="display: none">
          <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
          <h2 class="heading_b uk-text-success">Lamentamos que tuvieras problemas para acceder</h2>
          <p>Los usuarios y contraseñas son sensibles a MAYUSCULAS, minúsculas, puntos y comas.</p>
          <p>Primero, intenta lo mas sencillo: Si tu recuerdas tu constraseña pero no funciona, revisa si tu usuario este escrito correctamente, luego intenta denuevo.</p>
          <p>Si aún no puedes acceder puedes mandar una solicitud de ayuda a <a class="md-color-pink-300" href="#" id="password_reset_show">Solicitar soporte de Bepickler</a>.</p>
        </div>
        <div class="md-card-content large-padding" id="login_password_reset" style="display: none">
          <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
          <h2 class="heading_a uk-margin-large-bottom">Ayuda de soporte de Bepickler</h2>
          <form>
            <div class="uk-form-row">
              <label for="login_email_reset">Dirección de correo electrónico usuario</label>
              <input class="md-input" type="text" id="login_email_reset" name="login_email_reset" />
            </div>
            <div class="uk-margin-medium-top">
              <a  id="Solicitar_soporte" class="md-btn md-btn-primary md-btn-block md-bg-pink-300">Solicitar soporte</a>
              <!--href="index.php"-->
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- common functions -->
    <script src="assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="assets/js/uikit_custom.min.js"></script>
    <!-- altair core functions -->
    <script src="assets/js/altair_admin_common.min.js"></script>

    <!-- altair login page functions -->
    <script src="assets/js/pages/login.min.js"></script>

    <script>
      // check for theme
      if (typeof(Storage) !== "undefined") {
          var root = document.getElementsByTagName( 'html' )[0],
              theme = localStorage.getItem("altair_theme");
          if(theme == 'app_theme_dark' || root.classList.contains('app_theme_dark')) {
              root.className += ' app_theme_dark';
          }
      }
    </script>
    <script type="text/javascript">
    
      $( window ).ready(function()
      {

        console.log('cargo por completo la pagina');
        $("#sigIn").show();
        $("#sigIn").click(function(){
          emailproveedor=$("#emailproveedor").val();
          passwordproveedor=$("#passwordproveedor").val();
          console.log("realizo el click en sigIn emailproveedor:"+emailproveedor+" passwordproveedor:"+passwordproveedor);
          $.
          ajax({
            method: "POST",     
            dataType: "json",
            url: "./../../controllers/setCheckTblusuarioproveedorLogin.php",
            data: {solicitadoBy:"WEB", emailproveedor:emailproveedor,passwordproveedor:passwordproveedor}
          })
          .done(function( msg ) {
            console.log('msg::'+msg);
            console.log("success::"+msg.success);
            console.log("datos::"+msg.datos);
            if(msg.success!=0)
            {
              $.each(msg.datos, function(i,item){
                console.log(msg.datos[i].tblniveleacceso_idtblniveleacceso+" "+msg.datos[i].tblusuarioproveedor_nombre);
                switch(msg.datos[i].tblniveleacceso_idtblniveleacceso){
                  case '1':
                    window.location.href = "./inicio.php";
                    break;
                  case '2':
                    break;
                  default:
                    console.log("no encontro conicidencias ");
                    break;
                }
              });
            }
          })
          .fail(function( jqXHR, textStatus ) {
            console.log("fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);
            alert( "Request failed: " + textStatus );
          })
          .always(function(){
            console.log("always");
          });
        });


        $("#Solicitar_soporte").click(function(){
        login_email_reset=$('#login_email_reset').val();
        //alert('#login_email_reset::'+login_email_reset);
        
        $.ajax({
            method: "POST",   
            url: "./php/solicitudDeSoporteLoginPanel.php",
            data: {login_email_reset:login_email_reset}

          })
        .done(function( msg ) {
          UIkit.modal.alert('La solicitud ha sido enviada en breve nos comunicaremos contigo');
          location.reload();
        })
          .fail(function( jqXHR, textStatus ) {
            console.log("fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);
            alert( "Request failed: " + textStatus );
          })
          .always(function(){
            console.log("always");
          });
          
        });


      });
      


      
    </script>
  </body>
</html>