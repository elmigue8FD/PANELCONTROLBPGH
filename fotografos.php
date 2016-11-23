<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> 
<html lang="en"> <!--<![endif]-->


  <head>
      <!--
      <link rel="stylesheet" href="assets/js/jquery.mobile.custom/jquery.mobile.custom.structure.min.css">
      <link rel="stylesheet" href="assets/js/jquery.mobile.custom/jquery.mobile.custom.theme.min.css">
      -->
      <!--<link rel="stylesheet" href="assets/js/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.css">-->
      <?php include("./codigo_general/head.php"); ?>
  </head>


  <body class=" sidebar_main_open sidebar_main_swipe">
    <!--Titlo de la seccion de la pagina-->
    <h1 id="tituloDeLaPagina" hidden>Fotografos</h1>
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

    <!--<div id="top_bar">
        <div class="md-top-bar">
            <div class="uk-width-large-8-10 uk-container-center">
                <div class="md-card-content">
                    <div class="uk-grid">
                        <div class="uk-width-1-1">
                            <ul class="uk-tab" data-uk-tab="{connect:'#tabs_1_content'}" id="tabs_1">
                                <li class="uk-active"><a href="#"><font size="2"> Manual </font></a></li>
                                <li class="named_tab"><a href="#"><font size="2"> Cátalogo </font></a></li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->

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
            <div class="uk-grid uk-grid-width-large-1-1 uk-grid-width-medium-1-1 uk-grid-medium uk-sortable sortable-handler hierarchical_show" data-uk-sortable data-uk-grid-margin>
              <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-1">
                  <div class="md-card">
                    <div class="md-card-content">
                      <div class="uk-form-row">
                        <table data-role="table" class="uk-table uk-text-nowrap">
                          <thead>
                            <tr>
                              <th>Nombre</th>
                              <th>Contacto</th>
                              <th>Precio por foto</th>
                              <th>
                                Cátalogo
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Carlos</td>
                              <td>8-14-58-69</td>
                              <td>60</td>
                              <td>
                                <div class="uk-width-medium-1-1">
                                  <div class="md-card">
                                      <div class="md-card-content">
                                          <div class="uk-slidenav-position" data-uk-slideshow="{animation:'scale'}">
                                              <ul class="uk-slideshow">
                                                  <li><img src="assets/img/gallery/Image01.jpg" alt=""></li>
                                                  <li><img src="assets/img/gallery/Image02.jpg" alt=""></li>
                                                  <li><img src="assets/img/gallery/Image03.jpg" alt=""></li>
                                                  <li><img src="assets/img/gallery/Image04.jpg" alt=""></li>
                                              </ul>
                                              <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
                                              <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
                                              <ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
                                                  <li data-uk-slideshow-item="0"><a href=""></a></li>
                                                  <li data-uk-slideshow-item="1"><a href=""></a></li>
                                                  <li data-uk-slideshow-item="2"><a href=""></a></li>
                                                  <li data-uk-slideshow-item="3"><a href=""></a></li>
                                              </ul>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>María</td>
                              <td>8-69-58-47</td>
                              <td>70</td>
                              <td>
                                <div class="uk-width-medium-1-1">
                                  <div class="md-card">
                                      <div class="md-card-content">
                                          <div class="uk-slidenav-position" data-uk-slideshow="{animation:'scale'}">
                                              <ul class="uk-slideshow">
                                                  <li><img src="assets/img/gallery/Image01.jpg" alt=""></li>
                                                  <li><img src="assets/img/gallery/Image02.jpg" alt=""></li>
                                                  <li><img src="assets/img/gallery/Image03.jpg" alt=""></li>
                                                  <li><img src="assets/img/gallery/Image04.jpg" alt=""></li>
                                              </ul>
                                              <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
                                              <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
                                              <ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
                                                  <li data-uk-slideshow-item="0"><a href=""></a></li>
                                                  <li data-uk-slideshow-item="1"><a href=""></a></li>
                                                  <li data-uk-slideshow-item="2"><a href=""></a></li>
                                                  <li data-uk-slideshow-item="3"><a href=""></a></li>
                                              </ul>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>Roberto</td>
                              <td>8-14-36-58</td>
                              <td>55</td>
                              <td>
                                <div class="uk-width-medium-1-1">
                                  <div class="md-card">
                                      <div class="md-card-content">
                                          <div class="uk-slidenav-position" data-uk-slideshow="{animation:'scale'}">
                                              <ul class="uk-slideshow">
                                                  <li><img src="assets/img/gallery/Image01.jpg" alt=""></li>
                                                  <li><img src="assets/img/gallery/Image02.jpg" alt=""></li>
                                                  <li><img src="assets/img/gallery/Image03.jpg" alt=""></li>
                                                  <li><img src="assets/img/gallery/Image04.jpg" alt=""></li>
                                              </ul>
                                              <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
                                              <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
                                              <ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
                                                  <li data-uk-slideshow-item="0"><a href=""></a></li>
                                                  <li data-uk-slideshow-item="1"><a href=""></a></li>
                                                  <li data-uk-slideshow-item="2"><a href=""></a></li>
                                                  <li data-uk-slideshow-item="3"><a href=""></a></li>
                                              </ul>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>Denis</td>
                              <td>8-14-47-58</td>
                              <td>40</td>
                              <td>
                                <div class="uk-width-medium-1-1">
                                  <div class="md-card">
                                    <div class="md-card-content">
                                      <div class="uk-slidenav-position" data-uk-slideshow="{animation:'scale'}">
                                        <ul class="uk-slideshow">
                                          <li><img src="assets/img/gallery/Image01.jpg" alt=""></li>
                                          <li><img src="assets/img/gallery/Image02.jpg" alt=""></li>
                                          <li><img src="assets/img/gallery/Image03.jpg" alt=""></li>
                                          <li><img src="assets/img/gallery/Image04.jpg" alt=""></li>
                                        </ul>
                                        <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
                                        <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
                                        <ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
                                          <li data-uk-slideshow-item="0"><a href=""></a></li>
                                          <li data-uk-slideshow-item="1"><a href=""></a></li>
                                          <li data-uk-slideshow-item="2"><a href=""></a></li>
                                          <li data-uk-slideshow-item="3"><a href=""></a></li>
                                        </ul>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="contenido_Manual">
            <div class="uk-grid uk-grid-width-large-1-1 uk-grid-width-medium-1-1 uk-grid-medium uk-sortable sortable-handler hierarchical_show" data-uk-sortable data-uk-grid-margin>
              <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-1">
                  <div class="md-card">
                    <div class="md-card-content">
                      <div class="uk-form-row">
                        <div class="uk-grid" data-uk-grid-margin="">
                          <div class="uk-width-medium-1-3"></div>
                          <div class="uk-width-medium-1-3">
                            <a href="#">Descarga el manual de fotografía</a>
                          </div>
                          <div class="uk-width-medium-1-3"></div>
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
    </div>


    <!-- secondary sidebar -->
   
    <!-- secondary sidebar end -->

    <!-- CODIGO EN GENERAL -->
   <?php include('./codigo_general/script_common.php'); ?>
   

    <!-- page specific plugins           -->
    <!-- /////////////////////////////// -->
    <!-- /////////////////////////////// -->
    <!-- /////////////////////////////// -->

   
    <!-- DONDE SE AGREGARAN LOS SCRIPTS  -->
    <!--
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="assets/js/jquery.mobile/jquery.mobile.custom.js"></script>
    <script src="jquery.mobile.custom/jquery.mobile.custom.min.js"></script>
    -->
    <!--<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>-->
    <!--<script src="assets/js/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.js"></script>-->
  </body>
</html>