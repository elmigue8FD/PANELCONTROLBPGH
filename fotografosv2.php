
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
        <!-- DONDESE AGREGAR TODO EL CONTENIDO DE LA PAGINA --> 
        <div id="top_bar">
          <div class="md-top-bar ">
            <div class="uk-width-large-8-10 uk-container-center">
              <div class="md-card-content">
                <div class="uk-grid">
                  <div class="uk-width-1-1">
                    <ul class="uk-tab" data-uk-tab="{connect:'#tabs_1_content'}" id="tabs_1">
                      <li class="uk-active"><a href="#"><font size="3"> Catálogo </font></a></li>
                      <li class="named_tab"><a href="#"><font size="3"> Manual </font></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- end SubMenu de INDEX -->
        <div id="tabs_1_content" class="uk-switcher">
          <div id="contenido_Catalogo">
          <div class="uk-grid uk-grid-large uk-grid-width-large-1-3 hierarchical_show " data-uk-grid="{target:'md-card-content',gutter: 20}" id="listafotografos" >
          </div>

          </div>
          <div id="contenido_Manual">
            <div class="md-card">
                <div class="md-card-content">
                    <br><br>
                    <h3 class="heading_a uk-text-center">
                        Descarga de Manual de Fotografía 
                        <span class="sub-heading uk-text-center"><br>Este manual contiene las especificaciones que debe cumplir una fotografía de algun productos que sera publicado en línea.  </span>
                    </h3>
                    <div class="uk-grid">
                      <div class="uk-width-1-1">
                        <div id="file_upload-drop">
                          <a class="uk-form-file md-btn md-color-red-300 md-bg-grey-200 md-btn-block md-btn-wave-light waves-effect waves-button waves-light" href="./phps/descargarManualFotografia.php">Click</a>
                        </div>
                      </div>
                    </div><br><br>
                </div>
            </div>
          </div>
        </div>  
      </div>
    </div>
    <!-- CODIGO EN GENERAL -->
   <?php include('./codigo_general/script_common.php'); ?>
   <script type="text/javascript">

   //variables de Sesion
   var idtblciudad=1;

   $( window ).ready(function()
    {
        mostrarDatosFotografos();

    }); 

   function mostrarDatosFotografos() {
     
     $.ajax({ 
       method: "POST",dataType: "json",url: "./../../controllers/getAllTblfotografobyTblciudad.php", data: {solicitadoBy:solicitadoBy,idtblciudad:idtblciudad}})
            .done(function(msg){
                 console.log(msg);

                 $.each(msg.datos, function(i,item){
                  
                  idtblfotografo = item.idtblfotografo;
                   $("#listafotografos").append('<div data-product-name="P1"><div class="md-card"><div><div><h4 class="uk-text-center">Datos</h4><ul class="md-list md-list-addon"><li><div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE7FD;</i></div><div class="md-list-content"><span class="md-list-heading">'+item.tblfotografo_nombre+'</span><span class="uk-text-small uk-text-muted">Nombre</span></div></li><li><div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE0CD;</i></div><div class="md-list-content"><span class="md-list-heading">'+item.tblfotografo_contacto+'</span><span class="uk-text-small uk-text-muted">Contacto</span></div></li><li><div class="md-list-addon-element"><i class="md-list-addon-icon material-icons">&#xE263;</i></div><div class="md-list-content"><span class="md-list-heading">'+item.tblfotografo_preciofoto+'</span><span class="uk-text-small uk-text-muted">Precio por Foto</span></div></li></ul></div><div><h3 class="uk-text-center">Catalogo</h3><div class="uk-grid" id="catalogo2'+i+'"></div></div></div></div></div>');


                     cargarCatalogo(idtblfotografo,i);
                    });
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      .always(function(){  console.log("always");});
    
   }

   function cargarCatalogo(idtblfotografo,i){

   // $("#catalogo"+i).empty();

    $.ajax({ //llenar el slider con las fotos 
       method: "POST",dataType: "json",url: "./../../controllers/getAllTblfotografocatalogobyTblfotografo.php", data: {solicitadoBy:solicitadoBy,idtblfotografo:idtblfotografo}})
            .done(function(msg2){
                 console.log(msg2);
                 $.each(msg2.datos, function(x,item){
                   $("#catalogo2"+i).append('<div class="uk-width-1-2 uk-container-center"><img src="./assets/img/fotografos/'+item.tblfotografocatalogo_srcimg+'" alt="" /></div>');
                 });

              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      .always(function(){  console.log("always");}); 
   }
     
   </script>
  </body>
</html>