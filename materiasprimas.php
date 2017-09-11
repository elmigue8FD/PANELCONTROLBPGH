<?php 
include('./php/seguridad_general.php');
?>
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

      <!-- SubMenu de INDEX -->
      <div id="top_bar" style="display: none"> 
        <div class="md-top-bar ">
          <div class="uk-width-large-8-10 uk-container-center">
            <div class="md-card-content">
              <div class="uk-grid">
                <div class="uk-width-1-1">
                  <ul class="uk-tab" data-uk-tab="{connect:'#tabs_1_content', swiping:false}" id="tabs_1">                    
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
          <span class="uk-h2" style="text-align: center;">Selecciona un proveedor para visualizar el catálogo de sus productos</span><br><br>
          <div class="uk-grid uk-grid-width-large-1-5 uk-grid-width-medium-1-2 uk-grid-medium " data-uk-grid-margin>
            <div>
                <div class="md-card" onclick="cambiodePDF(1)">
                 <div class="md-card-content">
                  <div class="md-list-content-horizontal"><img src="./../assests_general/proveedorprimarios/pealpan.png" alt="Proveedor Pealpan en Bepickler" width="100%" height="100px" />
                  </div>
                 </div>
                </div>
            </div>
          </div>
          <div class="md-card" id="div_showPDF" style="display: none"><br/>
           <div class="md-card-content" id="showPDF">              
           </div>
          </div>           
         </div><!--  end Contenido de Pestaña Inicio -->
     </div>
    </div><!--end Mapa-->
  </div>
</div>
    
    <!-- CODIGO EN GENERAL -->
    <?php include('./codigo_general/script_common.php'); ?>
    <!-- page specific plugins           -->
    <!--  help/faq functions -->
    <script src="./assets/js/pages/page_help.min.js"></script>
    <script type="text/javascript">
      function cambiodePDF(id){

        $('#div_showPDF').attr('style','display:');
        $('#showPDF').empty();


        if(id==1){

          $('#showPDF').append('<div class="row uk-h2" align="center">Catálogo de Productos de PEALPAN</div><br><iframe src="http://docs.google.com/gview?url=www.bepickler.com/miguel/BepicklerFuncional2.0/views/PANELCONTROL/file_manager/Manualparafotografiasperfectas.pdf&embedded=true" style="width:100%; height:450px;" frameborder="0"></iframe>');
        }
        
      }
    </script>
    </body>
</html>