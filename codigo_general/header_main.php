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
                        <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                            <a href="#" class="user_action_image"><img class="md-user-image" src="assets/img/avatars/userh.png" alt=""/></a>
                            <div class="uk-dropdown uk-dropdown-small">
                                <ul class="uk-nav js-uk-prevent">
                                    <li><a href="page_user_profile.html">My profile</a></li>
                                    <li><a href="login.html">Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
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
});

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

    
</script>