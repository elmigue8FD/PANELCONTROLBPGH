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
<body class=" sidebar_main_open sidebar_main_swipe" >
    <!-- main header -->
    
	<?php include("../codigo_general/menuPanel.php"); ?>
   
    <!-- main sidebar end  inicia aside-->
	<!-- fin del aside.............................  -->
	
   <!--  estas no van todavia-->
   <div id="page_content">
	<div id="page_content_inner"> 
	
								
	<div id="top_bar">
        <div class="md-top-bar ">
          <div class="uk-width-large-8-10 uk-container-center">
            <div class="md-card-content">
              <div class="uk-grid">
                <div class="uk-width-1-1">
                                
								
								<ul class="uk-tab" class="named_tab" data-uk-tab="{connect:'#settings_users', animation: 'slide-horizontal' }">
                                   
									<li class="uk-active"><a href="#">Ciudades</a></li>
                                    <li><a href="#" > Colonias</a></li>
                                   <!-- <li><a href="#"><font size="3">author </font></a></li> -->
                                     
								</ul>
								
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
							
							
							<!--<div class="md-card">
                            <div class="md-card-content"> -->
							
								
                               <!-- <ul id="settings_users" class="uk-switcher uk-margin"> -->
								<div id="settings_users" class="uk-switcher uk-margin">
								
								
                                    <div> <!-- inicio pag1 -->
							<div class="md-card">
					               <div class="md-card-content">
									<div>    <!-- id="page_heading" -->         
                                    <h2>Ubicaciones</h2>
                                   <span class="uk-text-upper uk-text-small">Ciudades</span>
                                    </div>
									
									<br/>
									 <span class="uk-text-medium">Para modificar los datos, haz clic en el nombre de la ciudad.</span>
				                     
									 <label class="uk-float-right" id="numeroCiudades"> </label> 
									  </br>
									  <div class="uk-text-center oculto" id="esperarMostrarCiudades" >
                                      <label> Procesando... </label>
				                       <img src="cargando.gif" /> 				 
                                           </div> 
					                </div>
									
									
					            </div>
								
						
					<div class="md-card">
					 <div class="md-card-content">		
                         <div class="uk-overflow-container uk-margin-bottom">
                       <!-- <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair ts_issues2" id="tbl_ciudades" >
                           -->
						   <table class="uk-table uk-table-nowrap table_check uk-table-hover tablesorter tablesorter-altair" id="tbl_ciudades">
                            
							<thead>
                                <tr>
                                    <!-- class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair"   id="ts_issues2" name="ts_issues2"  -->
                                    <th class="uk-text-center">Ciudad</th>
                                    <th class="uk-text-center"> Pa&iacute;s</th>
                                    <th class="uk-text-center">Estatus</th>
                                    
                                </tr>
                            </thead>
                            
                            <tbody id="mostrarCiudadesBody">
                                                               
                               
                            </tbody>
                        </table>
                    </div>
					</div>
					</div>
					
					 <div class="md-fab-wrapper">
					<!-- <a href="#" data-uk-modal="{ target:'#new_issue2',bgclose:false,center:true }" > href="#agregarCiudadDiv"-->
                     <a class="md-fab md-fab-accent" onclick="rCO();" data-uk-modal="{ target:'#agregarCiudadDiv',bgclose:false, center:true }" >
	                           
                     <i class="material-icons">&#xE145;</i>
                     </a>
                     </div>
					 
					 
					 <!-- agregar ciudad -->
	<div class="uk-modal" id="agregarCiudadDiv">
        <div class="uk-modal-dialog">
		   <button type="button"  class="uk-modal-close uk-close uk-close-alt"></button>
           <form class="uk-form-stacked" id="formAltaCiudad"  >
		  
            
			  <h3 class="heading_b uk-margin-bottom">Agregar Ciudad </h3>
                <div class="uk-margin-medium-bottom">
                    <label for="task_title">Nombre de la ciudad:</label>
                    <input type="text" class="md-input" id="altaNombreCiudad" name="altaNombreCiudad"/>
                </div>
				<div class="uk-margin-medium-bottom">
                    <label for="task_title">Pa&iacute;s al que pertenece:</label><br/>
                    <!-- <input type="text" class="md-input" id="Task_title" name="snippet_title"/> -->
					<input type="radio" name="altaNombrePais" value="1" id="altaIdNombrePais" checked readonly   /> 
					 <label>M&eacute;xico</label>
                </div>
                
                
                <div class="uk-margin-medium-bottom">
                    <label for="task_priority" class="uk-form-label">Estatus:</label>
                    <div>
                            <input type="checkbox"  checked data-switchery-color="#00CC66" id="altaEstatusCiudad"/> <!--id="switch_demo_1" data-switchery-color="#1e88e5"-->  
                           <label for="switch_demo_1" class="inline-label">Activo</label>  
                    </div>
                </div>
				
				 <div class="uk-text-center oculto" id="cargarNuevaCiudad" >
                 <!-- <i class="uk-icon-spinner uk-icon-medium uk-icon-spin" id="cargar" style="display:none"></i>
				  --><label > Procesando... </label>
				  <img src="cargando.gif" /> 
				  <!--<i class="uk-icon-spinner uk-icon-medium uk-icon-spin" id="ca" ></i> uk-text-center-->
                 </div> 
				 
				 
				<!-- class="uk-float-right"  onclick="agregarCiudad();"-->
				 
                <div class="uk-modal-footer uk-text-right">
                
			 <button type="button" class="md-btn md-btn-flat ye" id="agregarNuevaCiudad" name="altadeCiudad" onclick="agregarCiudad();">Agregar</button>
             
			  <!--  <input type="submit" class="md-btn md-btn-flat " id="ye" name="altadeCiudad" onclick="agregarCiudad();" value="Agregar" /> <!--Agregar</button>-->
                         
			  </div>				
            </form>
        </div>
    </div>                   
        

		        
					
					 <!-- cierra agragar ciudad ........... -->
					 
					 <!-- ........modificar ciudad -->
					 <div class="uk-modal" id="mciudad">
        <div class="uk-modal-dialog">
		   <button type="button"  class="uk-modal-close uk-close uk-close-alt"></button>
           <form class="uk-form-stacked" >		 
			  <h3 class="heading_b uk-margin-bottom">Modificar Datos </h3>
			  
			    <label for="task_title">Nombre de la ciudad:</label>
				
                <div class="uk-margin-medium-bottom">  
				    <span class="oculto" id="paraIdCiudad"></span>
					<span class="oculto" id="paraIdPais"></span>
                    <input type="text" class="md-input" id="modificarCiudad" name="modificarCiudad" />
                </div>
				
                
                <div class="uk-text-center oculto" id="cargarModificar" >                
				  <label > Procesando... </label>
				  <img src="cargando.gif" /> 				 
                 </div> 
                   
                <div class="uk-modal-footer uk-text-right">
                
			  <button type="button" class="md-btn md-btn-flat ye" id="ye" onclick="actualizarCiudad();" >Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
					 
                                    </div> <!-- fin pag1 -->
									
									
									
                                    <div>  <!-- inicio pag 2 -->
													
				<div class="md-card">
					    <div class="md-card-content">
									<div>    <!-- id="page_heading" -->         
                                    <h2>Ubicaciones</h2>
                                   <span class="uk-text-upper uk-text-small">Colonias</span>								   
                                    </div>									
				
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-3">
						    <form id="formMostrarCiudad">
							 <span class="uk-text-small">Selecciona una ciudad: </span>
                             <select id="selectColonia" name="selectColonia" class="uk-button uk-form-select" data-uk-form-select  onchange="javascript:mostrarColoniasReg();cantidadColonias();">
                             
                             </select>
				           </form>
                        </div>
					</div>
					<br/>
				    <span class="uk-text-medium">Para modificar los datos, haz clic en el nombre de la colonia.</span>
				    <label class="uk-float-right" id="numeroColonias"> </label>
					
					 </br>
									  <div class="uk-text-center oculto" id="esperarMostrarColonias" >
                                      <label> Procesando... </label>
				                       <img src="cargando.gif" /> 				 
                                           </div> 
					
					</div><!-- cierre del content-->
				</div> <!-- cierre del mcard-->
				
								
				<div class="md-card" id="muestraTablaGeneral">
					 <div class="md-card-content">		
                         <div class="uk-overflow-container uk-margin-bottom">
                    
						  <!--<table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair ts_issues2" id="tbl_colonias" >
                           -->
						   <table class="uk-table uk-table-nowrap table_check uk-table-hover tablesorter tablesorter-altair" id="tbl_colonias">
                            
					
						   <thead>
                                <tr>
                                    <!--<th class="uk-text-center">N°</th> -->
									<th class="uk-text-center">Ciudad</th>
                                    <th class="uk-text-center">Colonia</th>
									<th class="uk-text-center">C&oacute;digo Postal</th>   
                                    <th class="uk-text-center">Estatus</th>
                                    
                                </tr>
                            </thead>
                            
                            <tbody id="MostrarColoniasBody">
                                 
                               
                               
                            </tbody>
							
                        </table>
						 <div id="noHay"> </div>	 
                    </div>
					</div>
					</div>
					
					 <div class="md-fab-wrapper">
					<!-- <a href="#" data-uk-modal="{ target:'#new_issue2',bgclose:false,center:true }" > href="#acolonia"  -->
                     <a class="md-fab md-fab-accent" onclick="rCO2();" data-uk-modal="{target:'#acolonia',bgclose:false, center:true }">
                     <i class="material-icons">&#xE145;</i>
                     </a>
                     </div>	
                       
                            			   
					 
					  <!-- agregar COLONIA-->
	<div class="uk-modal" id="acolonia">
        <div class="uk-modal-dialog ">
		   <button type="button"  class="uk-modal-close uk-close uk-close-alt"></button>
           <form class="uk-form-stacked" id="formAltaColonia">
			  <h3 class="heading_b uk-margin-bottom">Agregar Colonia </h3>
			     <div class="uk-margin-medium-bottom">
                    <select id="altaCiudad" name="altaCiudad" class="uk-button uk-form-select" data-uk-form-select >
                   <option value="" disabled selected hidden>Selecciona una Ciudad...</option>
					     <optgroup label="Selecciona una Ciudad.." disabled selected>
                   </select>
                </div>
                <div class="uk-margin-medium-bottom">
                    <label for="task_title">Nombre de la colonia</label>
                    <input type="text" class="md-input" id="altaColonia" name="altaColonia"/>
                </div>
				 <div class="uk-margin-medium-bottom">
                    <label for="task_title">C&oacute;digo Postal</label>
                    <input type="text" class="md-input" id="altaCodPostal" maxlength="5" name="altaCodPostal"/>
                </div>
                
                
                <div class="uk-margin-medium-bottom">
                    <label for="task_priority" class="uk-form-label">Estatus</label>
                    <div>
                            <input type="checkbox" checked  id="altaEstatusColonia"/>
                           <label for="switch_demo_1" class="inline-label">Activo</label>  
                    </div>
                </div>
				
				<div class="uk-text-center oculto" id="EsperacargarAltaColonia">
                 <label > Procesando... </label>
				  <img src="cargando.gif" />
                 </div>    
				 
                <div class="uk-modal-footer uk-text-right">
                
			  <button type="button" class="md-btn md-btn-flat ye" id="agregarNuevaColonia" onclick="agregarColonia();">Agregar</button>
                </div>
            </form>
        </div>
		         
    </div> <!-- cierre agregar colonia-->
	
	
	
	     <div class="uk-modal" id="mcolonia">
        <div class="uk-modal-dialog">
		   <button type="button"  class="uk-modal-close uk-close uk-close-alt"></button>
           <form class="uk-form-stacked">
			  <h3 class="heading_b uk-margin-bottom">Modificar Datos </h3>
			  <label for="task_title">Ciudad</label>
			  <div class="uk-margin-medium-bottom">
				<select id="modificarCiudadColonia" name="modificarCiudadColonia" class="md-input">
                   <option value="" disabled selected hidden>Selecciona una Ciudad...</option>
					     <optgroup label="Selecciona una Ciudad.." disabled selected>
                   </select>
				</div>
				 <label for="task_title">Nombre de la colonia</label>
                <div class="uk-margin-medium-bottom"> 
				   <span class="oculto" id="muestraIdColonia"></span>
                    <input type="text" class="md-input" id="modificarColoniaNombre" name="snippet_title"/>
                </div>
				<label for="task_title">C&oacute;digo Postal</label>
				<div class="uk-margin-medium-bottom">                    
                    <input type="text" class="md-input" id="modificarColoniaCodpos" maxlength="5" name="snippet_title"/>
                </div>
                
                <div class="uk-text-center oculto" id="cargarModificarColonia" >
                <label > Procesando... </label>
				  <img src="cargando.gif" /> 				 
                 </div> 
                
                <div class="uk-modal-footer uk-text-right">
                
			  <button type="button" class="md-btn md-btn-flat ye" onclick="actualizarColonia();" id="ye">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div> <!-- cierre agregar colonia-->

                                    </div>  <!-- fin pag 2 -->
				</div>								
                </div>
            </div>
			
	<!-- ::::::::::::::::::::::::::::::::::::::::::::::::::::::::  -->
	
	 <?php include('../codigo_general/script_commonPB.php'); ?>
   
    <!-- tablesorter -->
    <script src="../bower_components/tablesorter/dist/js/jquery.tablesorter.min.js"></script>
    <script src="../bower_components/tablesorter/dist/js/jquery.tablesorter.widgets.min.js"></script>
    <script src="../bower_components/tablesorter/dist/js/widgets/widget-alignChar.min.js"></script>
    <script src="../bower_components/tablesorter/dist/js/extras/jquery.tablesorter.pager.min.js"></script>
	<script src="../bower_components/tablesorter/dist/js/widgets/widget-columnSelector.min.js"></script>
    <script src="../bower_components/tablesorter/dist/js/widgets/widget-print.min.js"></script>
	
	 <!-- ionrangeslider -->
    <script src="../bower_components/ion.rangeslider/js/ion.rangeSlider.min.js"></script>

    <!--  tablesorter functions 
    <script src="../assets/js/pages/plugins_tablesorter.min.js"></script>-->
    <!--  issues list functions 
   <script src="../assets/js/pages/pages_issues.min.js"></script> 
   <script src="../assets/js/pages/pages_issuesPru2.js"></script> -->
  
  <!-- kendo UI -->
  <script src="../assets/js/kendoui_custom.min.js"></script> 
  <!--  kendoui functions -->
  <script src="../assets/js/pages/kendoui.min.js"></script>
  <!--page_contact_list-->
  <script src="../assets/js/pages/page_contact_list.min.js"></script>
	
	<!--<script src="assets/js/pages/tres.js"> </script>  --> 
	   <!-- ------------------------ -->
    <script type="text/javascript" >
     

     $( window ).ready(function()
    {
        //console.log('pagina lista');
	     mostrarCiudadesRegistradas();  //se cargar automaticamente cuando carge la pagina	
		 mostrarCiudadesU();
		 cantidadCiudades();
		 
		 
		 
      }); 
	     /* Create by: Reyna Maria Martinez Vazquez*/ 
	//------------------------------------------------------	
  function bajarReporte(){
	  
	   var idtblciudad=$("#selectColonia").val(); 
       $.ajax({ method: "POST",  dataType: "json",  
	    url: "./../../controllers/setDeleteFileImgProveedor.php", 
	      data: {solicitadoBy:"WEB",tblproveedorimg_srcimg:srcimgActual} }) 
        .done(function( datos ){
                       borradafoto=true;
                       })
       .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
        
	  
	  
  }//fin
	
		function cantidadColonias(){
	   var idtblciudad=$("#selectColonia").val(); 
	   //se recibe el id del select de la ciudad para mostras cantidad de colonias que tiene registradas
	             
	 
     $.ajax({     
       method: "POST",dataType: "json",
	   url: "./../../controllers/getCountAllTblcoloniasByTblCiudad.php", 
	   data: {solicitadoBy:"WEB",tblciudad_idtblciudad:idtblciudad}})
            .done(function(mc){
				   
                     if(parseInt(mc.success)==1){ 
			$("#numeroColonias").text('Colonias registradas en esta ciudad: '+mc.datos);	
				 
					 }
						
               //....
				 else{ 
				
				  $("#numeroColonias").text("No hay colonias registradas en esta ciudad.");	
				        
						} 
				 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      //.always(function(){  console.log("always");});
   } 
		  
		 
		 
		 //.-----mostrar cantidad de ciudades registradas-------------------------------------------------------
	  function cantidadCiudades(){
	   	 
     $.ajax({     
       method: "POST",dataType: "json",
	   url: "./../../controllers/getCountAllTblCiudad.php", 
	   data: {solicitadoBy:"WEB"}})
            .done(function(mc){
				   //console.log(mc);
                     if(parseInt(mc.success)==1){						 
			   $("#numeroCiudades").text('Ciudades registradas: '+mc.datos);	
			
					 }
						
               //....
				 else{ 
				
				  $("#numeroCiudades").text("");	
				        
						} 
				 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      //.always(function(){  console.log("always");});
   } 
   //....................
		 
		 function inicializarTablas(){
  $("#tbl_ciudades").tablesorter({
    sortList: [[0,0]], //ordenar por de inicio esa columna 
    headers: {1: { sorter: "shortDate", dateFormat: "ddmmyyyy" } }, //cambio de formato de fecha 
    widgets: ['filter']//activar el widget de filtro de busqueda
		 }); 
		 
		 
		 $("#tbl_colonias").tablesorter({
    sortList: [[1,0]], //ordenar por de inicio esa columna 
    headers: {1: { sorter: "shortDate", dateFormat: "ddmmyyyy" } }, //cambio de formato de fecha 
    widgets: ['filter']//activar el widget de filtro de busqueda
		 }); 
  }
      //.-----mostrar ciudades----------------------------------------------------------------
	  function mostrarCiudadesRegistradas(){ 
	      
               inicializarTablas();
     $.ajax({     
      method: "POST",dataType: "json",
	 url: "./../../controllers/getAllTblciudadByTblPais.php", data: {solicitadoBy:"WEB"},
	  beforeSend: function(){
                              $('#esperarMostrarCiudades').css('display','inline');								  
                                                 }
				   })
	 
            .done(function(mo){
				
                $.each(mo.datos, function(i,item)
               {				   
			      //asignamos nombres a las valores
			        tblciudadNombre=item.tblciudad_nombre;
				    tblciudadPaisNombre=item.tblpais_nombre; 
					 idciudad=item.idtblciudad;  
					
				 //muestra ciudades en la tabla href="#mciudad"
                 $("#mostrarCiudadesBody").append(
				 ' <tr>'+
                 '<td class="uk-width-medium-1-3"  onclick="mostrarDatosCiudad('+
	                                                idciudad+');"'+
				 ' data-uk-modal="{target:'+"'#mciudad'"+',bgclose:false, center:true }" >'+
                                 '<span id="mostrarCiudad">'+ tblciudadNombre +'<span/>'+
               					  ' </td>'+
				'<td class="uk-width-medium-1-3" >'+				                      
                                  ' <span id="mostrarPais">'+ tblciudadPaisNombre +' </span>'+
               					  ' </td>'+                                   
                                  '<td class="uk-width-medium-1-3">'+									
                '<input type="checkbox" data-switchery '+
				'data-switchery-color="#00CC66" onclick="ModEstatusCiudad('+idciudad+');"  id="mostrarEstatus'+idciudad+'" '+ item.tblciudad_activado +' />'+  
                 '<span class="inline-label" id="estado'+idciudad+'">   </span> '+                            									
							'</td>	'+								
                                '</tr>'
				 
				 );
				                    if(parseInt(item.tblciudad_activado)!=0){
                                          $("#mostrarEstatus"+idciudad).prop("checked", true);
										 $("#estado"+idciudad).text("Activo");
										 
                                           }
						                  else {
                                          $("#mostrarEstatus"+idciudad).prop("checked", false);
										  $("#estado"+idciudad).text("Desactivado");
                                            } 
				 
				   	$("#tbl_ciudades").trigger('updateAll', [true]);//actualiza tabla 
                      });	 //cierre del each
                                 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      .always(function(){ $("#esperarMostrarCiudades").hide();  });
   } 	

//------------- modifica el estatus de una ciudad---------  
 function ModEstatusCiudad(idciudad){
		     activoModificar =  $("#mostrarEstatus"+idciudad).prop('checked');		
										
			 emaildeUsuario="Flor@gmail.com";
			 
			if(activoModificar){
		       activoModificar=1; 
               $("#estado"+idciudad).text("Activo");
			   }
		    else{ activoModificar=0; 
			       $("#estado"+idciudad).text("Desactivado");}		   
		
             $.ajax({ 
                   method: "POST",dataType: "json",url: "./../../controllers/setUpdateTblCiudadEstatus.php", 				  
				   data:{solicitadoBy:"WEB",idtblciudad:idciudad,activado:activoModificar,
				   emailmodifico:emaildeUsuario}})
                  .done(function(mg){					 
                            if(parseInt(mg.success)==1){  							 
                              UIkit.modal.alert('Estatus de la Ciudad modificado con &eacute;xito'); 
							   
							   $('#selectColonia').html(""); //se actualizan en el menu de colonias
							     mostrarCiudadesU();
								 
							} else{
                              UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');
                                 }     
								 }) 	  
                  .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                 // .always(function(){  console.log("always");});
				  
			 
	}
//----------alta de ciudades----------------------------------------------------------------
     
	 function rCO(){
		 $("#agregarNuevaCiudad").removeClass("oculto");
	}
	
	
    function agregarCiudad(){
	 ciudadNombre=$("#altaNombreCiudad").val();
      paisId=$("input[name='altaNombrePais']:checked").val(); 
     ciudadEstatus= $("#altaEstatusCiudad").prop('checked'); 	    
     emailUsuario="reyna@gmail.com";   
	
	if(ciudadEstatus){
		   ciudadEstatus=1;		
		     }
		   else{
			 ciudadEstatus=0;
		   }  
		   
		  
		if( $('#altaNombreCiudad').val()!=""   )  		 
				
	   {
		   
		 $.ajax({    //inicia ajax  
       method: "POST",dataType: "json",url: "./../../controllers/getCheckTblciudad.php",
	   data: {solicitadoBy:"WEB",nombreciudad:ciudadNombre,idtblpais:paisId}          
	   })   
            .done(function(mpa){  
				
                 if(parseInt(mpa.datos)==1){
                      UIkit.modal.alert('Esta Ciudad en este Pais ya esta registrada.');
                                              }
							else 
						{  
					      $("#agregarNuevaCiudad").addClass("oculto");
					 $.ajax({ 
                               method: "POST",dataType: "json",
							   url: "./../../controllers/setTblciudad.php", 
							   data: {solicitadoBy:"WEB",nombreciudad:ciudadNombre,							   
							   activado:ciudadEstatus,idtblpais:paisId,emailcreo:emailUsuario},
							   beforeSend: function(){
                              $('#cargarNuevaCiudad').css('display','inline');
                                                 }
							   })                                                                                                                                                                                                   
                                                                                                             
							   .done(function(ms){
                                  
                                    if(parseInt(ms.success)==1){	
									
									   $('#formAltaCiudad')[0].reset(); //vaciar el formulario
                                      UIkit.modal("#agregarCiudadDiv").hide();  //oculta el formulario                                     
                                      UIkit.modal.alert('Ciudad Registrada con éxito');
                                      //$('#listaUsuarios').empty();									  
                              $('#mostrarCiudadesBody').html("");
							 mostrarCiudadesRegistradas();							 
							 cantidadCiudades();
									  
                                    }else {
                                      UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');
                                    }                          
                                  })
                              .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                              .always(function(){  $("#cargarNuevaCiudad").hide(); //console.log("always");  
							  });	
							
					}
				
				
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
     // .always(function(){  console.log("always");}); //fin ajax
	  
	  
	  } 
	else {
		UIkit.modal.alert('Es necesario completar el campo de Nombre de la Ciudad.');
		}	
	
}

//-----------------------------------Modificar Datos--------------------------------
   //..............Mostrar datos de la ciudad para posteriormente modificarlos ---------------------- 
   
    function mostrarDatosCiudad(idciudad){
          
    $.ajax({ 
       method: "POST",dataType: "json",url: "./../../controllers/getTblciudad.php", 
	   data: {solicitadoBy:"WEB",idtblciudad:idciudad}})  
            .done(function(msg){
               
                //console.log(msg);
				$.each(msg.datos, function(x,item){
					
			       //$('#mciudad')[0].reset();				 
				  $("#paraIdCiudad").text(item.idtblciudad); 
				  $("#paraIdPais").text(item.tblpais_idtblpais); 
                  $("#modificarCiudad").val(item.tblciudad_nombre);
				  
				        })
                   })              
          .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
          //.always(function(){  console.log("always");});				  
	}	
	
    //---------actualizar datos d ela ciudad
       function actualizarCiudad(){
			

               idciudad= $('#paraIdCiudad').text();
	           nombreModificar= $("#modificarCiudad").val();
			   idpais= $('#paraIdPais').text();  
			    emaildeProveedor="Flor@gmail.com";
		  if ( $("#modificarCiudad").val()!="")
		  {
			   
		           $.ajax({  
                   method: "POST",dataType: "json",url: "./../../controllers/setUpdateTblCiudadSinEst.php", 				  
				   data:{solicitadoBy:"WEB",idtblciudad:idciudad,				  
				   nombreciudad:nombreModificar,idtblpais:idpais,emailmodifico:emaildeProveedor},
				   beforeSend: function(){
                              $('#cargarModificar').css('display','inline');						 
							  
                                                 }
				   })
                  .done(function(mg){
					  //console.log(mg);
					 if(parseInt(mg.success)==1){ 
					 
							UIkit.modal("#mciudad").hide(); //se oculta el pupop de Modificar Proveedor                            
                              UIkit.modal.alert('Ciudad Modificada con &eacute;xito'); 
							$('#mostrarCiudadesBody').html("");  
							 mostrarCiudadesRegistradas();
                                       }
							else{
                              UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');
                                 }
								 
								 }) 	  
                  .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                  .always(function(){ $("#cargarModificar").hide(); //console.log("always");
				  });
		  }else	 {  
		       UIkit.modal.alert('Es necesario completar el campo de Nombre de Ciudad.');
	           } 
			 
	}	
	
	//-------------------------- De Colonias -----------------------------------
	//--------------------------------------------------------------------------
	function mostrarCiudadesU(){ //muestra las ciudades activas 	
      
     $.ajax({     
     method: "POST",dataType: "json",url: "./../../controllers/getAllTblciudadAct.php", 
	 data: {solicitadoBy:"WEB"}})
            .done(function(mostC){
				//console.log(mcol);   
				  $('#altaCiudad').html(""); 
				  $('#modificarCiudadColonia').html(""); 
				  
				$("#selectColonia").append('<option value="" disabled selected readonly >Selecciona...</option>'); 
				$("#altaCiudad").append('<option value="" disabled selected readonly >Selecciona...</option>'); 
				$("#modificarCiudadColonia").append('<option value="" disabled selected readonly >Selecciona...</option>');
				
                $.each(mostC.datos, function(i,item)				
				 {	  
				 idtblciudad=item.idtblciudad;	
				 
				 //muestra ciudades en el encabezado de la interfaz principal
                 $("#selectColonia").append('<option value="' + idtblciudad +'">' + item.tblciudad_nombre + '</option>');
				 $("#altaCiudad").append('<option value="' + idtblciudad +'">' + item.tblciudad_nombre + '</option>');  				 
                 $("#modificarCiudadColonia").append('<option value="' + idtblciudad +'">' + item.tblciudad_nombre + '</option>');  				    
					});	
					
                                 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      //.always(function(){  console.log("always");});
   } 
   
   
   //----------mostrar colonias en base a la ciudad que se selecciono
   function mostrarColoniasReg(){
			
		    var idDelaCiudad=$("#selectColonia").val();	//se recibe el id que seleciono el usuario del select de Ciudades            
             inicializarTablas();
		   $.ajax({     
     method: "POST",dataType: "json",url: "./../../controllers/getAllTblcoloniaByTblciudadPertenecen.php", 
	    data: {solicitadoBy:"WEB",tblciudad_idtblciudad:idDelaCiudad},
		     beforeSend: function(){
                              $('#esperarMostrarColonias').css('display','inline');								  
                                                 }
		
		})
            .done(function(mo){
				
				if(parseInt(mo.success)==1){
				$("#noHay").html("");
				$("#MostrarColoniasBody").html("");
                $.each(mo.datos, function(i,item)
               {					   
			      //asignamos nombres a las valores
			        idcolonia=item.idtblcolonia;
				    
				 //muestra colonias en la tabla 
                 $("#MostrarColoniasBody").append(
				 ' <tr>'+
                 '<td class="uk-width-medium-1-4" > '+ 
								 '<span>'+ item.tblciudad_nombre  +' </span>'+ 
               					  ' </td>'+
				           '<td class="uk-width-medium-1-4" data-uk-modal="{target:'+"'#mcolonia'"+
						   ',bgclose:false, center:true }" onclick="mostrarDatosColonia('+idcolonia+');" >'+				                      
                                   '<span>'+ item.tblcolonia_nombre +' </span> '+ 
               					  ' </td>'+ 
                                   '<td class="uk-width-medium-1-4" >'+				                      
                                   '<span>'+ item.tblcolonia_codipost +' </span> '+ 
               					  ' </td>'+
                                  '<td class="uk-width-medium-1-4">'+									
                '<input type="checkbox" data-switchery '+  
				'data-switchery-color="#00CC66" id="mostrarEstatusCo'+idcolonia+'" onclick="ModEstatusColonia('+idcolonia+');" '+ item.tblcolonia_activado +' />'+  
                 '<span id="estadoColonia'+idcolonia+'"> </span>'+                            									
							'</td>	'+								
                                '</tr>'
				 
				 );
				                    if(parseInt(item.tblcolonia_activado)!=0){
                                          $("#mostrarEstatusCo"+idcolonia).prop("checked", true);
										  $("#estadoColonia"+idcolonia).text("Activo");
                                           }
						                  else {
                                          $("#mostrarEstatusCo"+idcolonia).prop("checked", false);
										   $("#estadoColonia"+idcolonia).text("Desactivado");
                                            } 
				 
				   		$("#tbl_colonias").trigger('updateAll', [true]);//actualiza tabla 
                      });	 //cierre del each
                        //-----------
                           }
							else 
						{  
					
			    $("#MostrarColoniasBody").html("");
									
					 }	


//--------						
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      .always(function(){ $("#esperarMostrarColonias").hide();  });
   } 
   
   
   //----------------- modificar estatus de la colonia en especifica
   function ModEstatusColonia(idcolonia){ 
		     activoModificar1 =  $("#mostrarEstatusCo"+idcolonia).prop('checked');		
										
			 emaildeUsuario="Flor@gmail.com";
			 
			if(activoModificar1){
		         activoModificar1=1; 
			     $("#estadoColonia"+idcolonia).text("Activo");
			   }
		    else{ activoModificar1=0; 
			      $("#estadoColonia"+idcolonia).text("Desactivado"); 
				}		   
		  //console.log('idciudad: '+idciudad+'...activo: '+activoModificar);					 
		
             $.ajax({ 
                   method:"POST",dataType: "json",url: "./../../controllers/setUpdateTblColoniaEstatus.php", 				  
				   data:{solicitadoBy:"WEB",idtblcolonia:idcolonia,activado:activoModificar1,
				   emailmodifico:emaildeUsuario}})
                  .done(function(mg){
					  
                            if(parseInt(mg.success)==1){  
							
                              UIkit.modal.alert('Estatus de la Colonia modificado con &eacute;xito'); 
							   
							} else{
                              UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');
                                 }     
								 }) 	  
                  .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                //  .always(function(){  console.log("always");});
			 
	}
	  
	  function rCO2(){
		 $("#agregarNuevaColonia").removeClass("oculto");
	}
	
	
	//----------alta de colonias----------------------------------------------------------------
   function agregarColonia(){	  
	  
	 coloniaCiudad = $("#altaCiudad").val();  
	 coloniaNombre=$("#altaColonia").val();
	 coloniaCodpost=$("#altaCodPostal").val();    
     coloniaEstatus= $("#altaEstatusColonia").prop('checked'); 	    
     emailUsuario="reyna@gmail.com";   
	
	if(coloniaEstatus){
		   coloniaEstatus=1;		
		     }
		   else{
			 coloniaEstatus=0;
		   }  
		  
		  if( $('#altaCiudad').val()==null){
			UIkit.modal.alert('Es necesario escoger una ciudad.');
		       }
		  else if( $('#altaColonia').val()==""){			  
		UIkit.modal.alert('Es necesario completar el campo de Nombre de la Colonia.');		
		     }      			                
        else if	(  $('#altaCodPostal').val()=="" ){
			UIkit.modal.alert('Es necesario completar el campo de C&oacute;digo Postal.');
		     }	  
	     else if ( !(/^\d{5}$/.test(coloniaCodpost)) ){
			UIkit.modal.alert('Es necesario que el C&oacute;digo Postal contenga 5 digitos.');
		     }
	   else{
		    
		 $.ajax({    
       method: "POST",dataType: "json",url: "./../../controllers/getCheckTblcolonia.php",
	   data: {solicitadoBy:"WEB",nombrecolonia:coloniaNombre,idtblciudad:coloniaCiudad}	         
	              })  
            .done(function(mpa2){   
                 if(parseInt(mpa2.datos)==1){
                      UIkit.modal.alert('Esta Colonia en esta Ciudad ya esta registrada.');
                                              }
							else 
						{  
					       $("#agregarNuevaColonia").addClass("oculto");
					$.ajax({ 
                               method: "POST",dataType: "json",
							   url: "./../../controllers/setTblcolonia.php", 
							   data: {solicitadoBy:"WEB",idtblciudad:coloniaCiudad,
							   nombrecolonia:coloniaNombre,codipost:coloniaCodpost,
							   activado:coloniaEstatus,emailcreo:emailUsuario},
							 beforeSend: function(){
                              $('#EsperacargarAltaColonia').css('display','inline'); }
							
							       })                                                                                                                                                                                               
                                                                                                      
							   .done(function(ms){                                    
       
                                    if(parseInt(ms.success)==1){
									   $("#formAltaColonia")[0].reset(); //vaciar el formulario
                                      UIkit.modal("#acolonia").hide();  //oculta el pupop  
                                      								  
                                      UIkit.modal.alert('Colonia Registrada con éxito');
                                     
									  
                                $("#selectColonia").val(coloniaCiudad);
				                $("#MostrarColoniasBody").html("");					
				                mostrarColoniasReg();
								
								 cantidadColonias(); 

								 
                                    }else {
                                      UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');
                                    }                          
                                  })
                              .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                              .always(function(){  $("#EsperacargarAltaColonia").hide(); });	
							  
							  
							
					}
				
				
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
	  
     // .always(function(){  console.log("always");}); //fin ajax
	  
	  
	  } 
		
	
} 
//-------------
//-----------------------------------Modificar Datos--------------------------------
   //..............Mostrar datos de la colonia para posteriormente modificarlos ---------------------- 
   
    function mostrarDatosColonia(idcolonia){
          
    $.ajax({ 
       method: "POST",dataType: "json",url: "./../../controllers/getTblcolonia.php", 
	   data: {solicitadoBy:"WEB",idtblcolonia:idcolonia}}) 
            .done(function(msg){ 
               
                //console.log(msg);
				$.each(msg.datos, function(x,item){					
			       			 
				  $("#muestraIdColonia").text(item.idtblcolonia); 
				  $("#modificarCiudadColonia").val(item.tblciudad_idtblciudad); 
                  $("#modificarColoniaNombre").val(item.tblcolonia_nombre);
				   $("#modificarColoniaCodpos").val(item.tblcolonia_codipost);
				  
				        })
                   })              
          .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
        //  .always(function(){  console.log("always");});				  
	}	
	
    //---------actualizar datos de la colonia
       function actualizarColonia(){			
                
               iddeColonia= $('#muestraIdColonia').text();
	           modificaCiudad= $("#modificarCiudadColonia").val();
			   modificaColonia= $('#modificarColoniaNombre').val(); 
			   modificaCodpos= $('#modificarColoniaCodpos').val(); 
			   emaildeProveedor="Flor@gmail.com";
				
		  if( $('#modificarCiudadColonia').val()==null){
			UIkit.modal.alert('Es necesario escoger una ciudad.');
		       }
		  else if( $('#modificarColoniaNombre').val()==""){			  
		UIkit.modal.alert('Es necesario completar el campo de Nombre de la Colonia.');		
		     }         			 
        else if	( $('#modificarColoniaCodpos').val()=="" ){
			UIkit.modal.alert('Es necesario completar el campo de C&oacute;digo Postal de la Colonia.');
		     }	
		else if ( !(/^\d{5}$/.test(modificaCodpos)) ){
			UIkit.modal.alert('Es necesario que el C&oacute;digo Postal contenga 5 digitos.');
		     }	 
				
	   else{    
			   
		           $.ajax({ 
                   method: "POST",dataType: "json",url: "./../../controllers/setUpdateTblcoloniaSinEst.php", 				  
				   data:{solicitadoBy:"WEB",idtblcolonia:iddeColonia,				  
				   idtblciudad:modificaCiudad,nombrecolonia:modificaColonia,codipost:modificaCodpos,
				   emailmodifico:emaildeProveedor},
				   beforeSend: function(){
                              $('#cargarModificarColonia').css('display','inline');						 
							  
                                     }})
                  .done(function(mg){
					  
					 if(parseInt(mg.success)==1){ 
					 
							UIkit.modal("#mcolonia").hide(); //se oculta el pupop de Modificar colonia                           
                              UIkit.modal.alert('Colonia Modificada con &eacute;xito'); 
							  
							 $("#selectColonia").val(modificaCiudad);
				               $('#MostrarColoniasBody').html("");					
				                mostrarColoniasReg();
								cantidadColonias();
								
                                       }
							else{
                              UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');
                                 }
								 
								 }) 	  
                  .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                  .always(function(){ $("#cargarModificarColonia").hide(); //console.log("always");
				  });
		  
	   }	 
	}	
	
    </script> 
   

    
</body>
</html>