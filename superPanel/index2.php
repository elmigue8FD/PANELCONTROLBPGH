<?php
require_once '../php/seguridad.php'; 
?>
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
	
	
	<!-- metrics graphics (charts) -->
        <link rel="stylesheet" href="../bower_components/metrics-graphics/dist/metricsgraphics.css">
        <!-- chartist -->
        <link rel="stylesheet" href="../bower_components/chartist/dist/chartist.min.css">  

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
	
</head>
<body class="sidebar_main_open sidebar_main_swipe">
    <!-- main header -->
    <!-- main header end -->
	
	<?php include("../codigo_general/menuPanel.php"); ?>
   
    <!-- inicia aside-->
	<!-- fin del aside.............................  -->
	
   
   <div id="page_content">
	<div id="page_content_inner"> 
	
								
	<div id="top_bar">
        <div class="md-top-bar ">
          <div class="uk-width-large-8-10 uk-container-center">
            <div class="md-card-content">
              <div class="uk-grid">
                <div class="uk-width-1-1">
                                
								
								<ul class="uk-tab" class="named_tab" data-uk-tab="{connect:'#settings_users', animation: 'slide-horizontal' }">
                                   
									<li class="uk-active"><a href="#">Inicio</a></li>
                                    <li><a href="#"> Ventas </a></li>
                                     <li><a href="#"> Ordenes  </a></li>
									 <li><a href="#"> Utilidades </a></li>
									  <li><a href="#"> Registros </a></li>
									    <li><a href="#"> Cotizaciones </a></li>
									     <li><a href="#">  Delivery</a></li>
                                     
								</ul>
								
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
							
		
								<div id="settings_users" class="uk-switcher uk-margin">
								
								
                                    <div> <!-- inicio pag1 -->
							
			 <div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler hierarchical_show" data-uk-sortable data-uk-grid-margin>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right">
							<!--<span class="peity_visitors peity_data">5,3,9,6,5,9,7</span> -->
							<span class="menu_icon"><i class="material-icons md-36">&#XE8D1;</i></span>
							</div>
                            <span class="uk-text-muted uk-text-small">Proveedores</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript>124</noscript></span></h2>
                        </div>
                    </div>
                </div>
				<div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right">
							<!--<span class="peity_visitors peity_data">5,3,9,6,5,9,7</span> -->
							<span class="menu_icon"><i class="material-icons md-36">&#XE7E9;</i></span>
							</div>
                            <span class="uk-text-muted uk-text-small">Productos</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript>524</noscript></span></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content"> 
                        <div class="uk-float-right uk-margin-top uk-margin-small-right">
							<!--<span class="peity_visitors peity_data">5,3,9,6,5,9,7</span> -->
							<span class="menu_icon"><i class="material-icons md-36">&#xe263;</i></span>
							</div>
                            <span class="uk-text-muted uk-text-small">Ventas</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript>142</noscript></span></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right">
							<!--<span class="peity_visitors peity_data">5,3,9,6,5,9,7</span> -->
							<span class="menu_icon"><i class="material-icons md-36">&#xe851;</i></span>
							</div>
							<span class="uk-text-muted uk-text-small">Clientes registrados</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript>100</noscript></span></h2>
                        </div>
                    </div>
                </div>
                
            </div>		
					 
					
					
					 
                                    </div> <!-- fin pag1 -->
									
									
									
                                    <div>  <!-- inicio pag 2 -->
													
				                   <h3>ventas</h3>

                                    </div>  <!-- fin pag 2 -->
									
									
									
									<div>  <!-- inicio pag 3 -->
													
				                   <h3>Ordenes</h3>

                                    </div>  <!-- fin pag 3 -->
									
									
									
									<div>  <!-- inicio pag 4 -->
													
				                   <h3>Utilidades</h3>

                                    </div>  <!-- fin pag 4 -->
									
									
									<div>  <!-- inicio pag 5 -->
													
				                   <h3>Registros</h3>

                                    </div>  <!-- fin pag 5 -->
									
									
									<div>  <!-- inicio pag 6 -->
													
				                   <h3>Cotizaciones</h3>

                                    </div>  <!-- fin pag 6 -->
									
									
									<div>  <!-- inicio pag 7 -->
													
				                   <h3>Delivery</h3>

                                    </div>  <!-- fin pag 7 -->
				</div>								
                </div>
            </div>
			
	<!-- ::::::::::::::::::::::::::::::::::::::::::::::::::::::::  -->
    <?php include('../codigo_general/script_commonPB.php'); ?>


    <!-- page specific plugins -->
    <!-- tablesorter -->
    <script src="../bower_components/tablesorter/dist/js/jquery.tablesorter.min.js"></script>
    <script src="../bower_components/tablesorter/dist/js/jquery.tablesorter.widgets.min.js"></script>
    <script src="../bower_components/tablesorter/dist/js/widgets/widget-alignChar.min.js"></script>
    <script src="../bower_components/tablesorter/dist/js/extras/jquery.tablesorter.pager.min.js"></script>

    <!--  issues list functions -->
   <script src="../assets/js/pages/pages_issues.min.js"></script>
   
   
    <!-- page specific plugins -->
        <!-- d3 -->
        <script src="../bower_components/d3/d3.min.js"></script>
        <!-- metrics graphics (charts) -->
        <script src="../bower_components/metrics-graphics/dist/metricsgraphics.min.js"></script>
        <!-- chartist (charts) -->
        <script src="../bower_components/chartist/dist/chartist.min.js"></script>
        
        <script src="../bower_components/maplace-js/dist/maplace.min.js"></script>
        <!-- peity (small charts) -->
        <script src="../bower_components/peity/jquery.peity.min.js"></script>
        <!-- easy-pie-chart (circular statistics) -->
        <script src="../bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
        <!-- countUp -->
        <script src="../bower_components/countUp.js/dist/countUp.min.js"></script>
        <!-- handlebars.js -->
        <script src="../bower_components/handlebars/handlebars.min.js"></script>
        <script src="../assets/js/custom/handlebars_helpers.min.js"></script>
        <!-- CLNDR -->
        <script src="../bower_components/clndr/clndr.min.js"></script>
        <!-- fitvids -->
        <script src="../bower_components/fitvids/jquery.fitvids.js"></script>
        <!--  dashbord functions -->
        <script src="../assets/js/pages/dashboard.min.js"></script>
	
	<!--<script src="assets/js/pages/tres.js"> </script> --> 
    
    <script>
     
    </script>


    
</body>
</html>