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
<body class="sidebar_main_open sidebar_main_swipe">
    <!-- main header -->
    <!-- main header end -->
	
	
	<?php include("../codigo_general/menuPanel.php"); ?>
   	
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
                                   
									<li class="uk-active"><a href="#"> <font size="3">Cupones</font></a></li>
                                    <li><a href="#"><font size="3">Historial de Cupones </font></a></li>
                                   <!-- <li><a href="#"><font size="3">author </font></a></li> -->
                                     
								</ul>
								
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
			
								<div id="settings_users" class="uk-switcher uk-margin">
                                    <div> <!-- inicio pag1 -->
							<div class="md-card">
					               <div class="md-card-content">
									<div>    <!-- id="page_heading" -->         
                                    <h2>Cupones</h2>                                 
                                    </div>
									
					<div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-3">
                            <span class="uk-text-small">Selecciona una ciudad: </span><br/>
                             <select id="selectCiudadGral" name="selectCiudadGral" class="uk-button uk-form-select" data-uk-form-select  onchange="mostrarCupones();cantidadCupones();">
                             <option value="" disabled selected hidden>Selecciona...</option>
                             </select>                         
                        </div>
					</div>
					              <br/>
									 <span class="uk-text-medium">Para modificar los datos, haz clic en el nombre del Cupón.</span>
				                   <br/>
								  <label class="uk-float-right" id="numeroCupones"> </label>
								    <br/>
									 <div class="uk-text-center oculto" id="esperarMostrarCupones" >
                                      <label> Procesando... </label>
				                       <img src="cargando.gif" /> 				 
                                           </div> 
								  </div>
								   
					            </div>

						
					 <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-overflow-container uk-margin-bottom">
                      <!--  <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="ts_issues">
                          -->
                         <table class="uk-table uk-table-nowrap table_check uk-table-hover tablesorter tablesorter-altair" id="tabla_cupones">
                            
						  <thead>
                                <tr>                                   
                                    <th class="uk-text-center" >Cup&oacute;n</th>
                                    <th class="uk-text-center">Valor</th>									
									<th class="uk-text-center">Estatus</th>						
                                    
                                </tr>
                            </thead>
                            
                            <tbody id="body_tablaCupones">
                               
                            </tbody>
                        </table>
                    </div>
					
					
                </div>
            </div>
					
					 <div class="md-fab-wrapper">
					<!-- <a href="#" data-uk-modal="{ target:'#new_issue2',bgclose:false,center:true }" > -->
                     <a class="md-fab md-fab-accent"  onclick="rCO();" data-uk-modal="{ target:'#cupon',bgclose:false, center:true }">
                     <i class="material-icons">&#xE145;</i>
                     </a>
                     </div>
					 
					 
					 <!-- agregar cupon href="#cupon"-->
	<div class="uk-modal" id="cupon">
        <div class="uk-modal-dialog uk-modal-dialog-small ">
		   <button type="button"  class="uk-modal-close uk-close uk-close-alt"></button>
           <form class="uk-form-stacked" id="formAlta">
			  <h3 class="heading_b uk-margin-bottom">Agregar Cupón </h3>
			 
                <div class="uk-width-medium-2-2 ">
                    <label for="task_title">Nombre del cup&oacute;n</label>
                    <input type="text" class="md-input" id="altaNombre" maxlength="15" name="snippet_title"/>
                </div> </br>
				<div class="uk-width-medium-1-2">
                   <label for="task_title">Valor del Cupón</label> 
				   <div class="uk-input-group">
                                <span class="uk-input-group-addon">$</span>                               
                                <input type="text" id="altaValor" class="md-input" />
                            </div>                
				  </div>
				   </br>
				 <div class="uk-width-medium-1-2">
                            
							<span class="uk-text-small">Selecciona una ciudad: </span><br/>
                             <select id="selectCiudad" name="selectCiudad" class="uk-button uk-form-select" data-uk-form-select  >
                             <option value="" disabled selected hidden>Selecciona:</option>
                             </select>
                
                </div>
                <br/>
                <div class="uk-margin-medium-bottom">
                    <label for="task_priority" class="uk-form-label">Estatus</label>
                    <div>
                            <input type="checkbox"  checked data-switchery-color="#00CC66" id="altaEstatus"/> 
                           <label for="switch_demo_1" class="inline-label">Activo</label>  
                    </div>
                </div>
				 <div class="uk-text-center oculto" id="cargarAltaCupon" >
                <label > Procesando... </label>
				  <img src="cargando.gif" /> 				 
                 </div> 
                <div class="uk-modal-footer uk-text-right">                
			   <button type="button" class="md-btn md-btn-flat ye" id="cupon_alta" onclick="agregarCupon();">Agregar</button>
                </div>
            </form>
        </div>
    </div>
					
					 <!-- cierra agragar cupon ........... onclick="agregarCupon();"-->
					 
					 <!-- modificar estados  :::::::::::::::::::::::::::::::::::::: -->
	<div class="uk-modal" id="mcupon">
        <div class="uk-modal-dialog">
		<button type="button"  class="uk-modal-close uk-close uk-close-alt"></button>
            <form class="uk-form-stacked">
			  <h3 class="heading_b uk-margin-bottom">Modificar Datos</h3>
               <div class="uk-width-medium-2-2 ">
                    <label for="task_title">Nombre del cup&oacute;n</label>
					<span class="oculto" id="modificarIdcupon"></span>
                    <input type="text" class="md-input" id="modificarNombre" maxlength="15" name="snippet_title"/>
                </div> </br>
				<div class="uk-width-medium-1-2">
                   <label for="task_title">Valor del Cupón</label> 
				   <div class="uk-input-group">
                                <span class="uk-input-group-addon">$</span>                               
                                <input type="text" id="modificarValor" class="md-input" />
                            </div>                
				  </div>
				   </br>
				 <div class="uk-width-medium-1-2">
                            
							<span class="uk-text-small">Selecciona una ciudad: </span><br/>
                             <select id="selectCiudadMod" name="selectCiudadMod" class="uk-button uk-form-select" data-uk-form-select  >
                             <option value="" disabled selected hidden>Selecciona:</option>
                             </select>                
                </div>
                <br/> 
                 <div class="uk-text-center oculto" id="cargarModificarCupon" >
                <label > Procesando... </label>
				  <img src="cargando.gif" /> 				 
                 </div> 				
               
                <div class="uk-modal-footer uk-text-right">                   
			 <button type="button" class="md-btn md-btn-flat ye" id="botModif" onclick="actualizarCupon();">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
					 
					 
					 <!-- cierra modificar cupon -->
					 
                                    </div> <!-- fin pag1 -->
									
									
									
                                    <div>  <!-- inicio pag 2 -->
													
				<div class="md-card">
					    <div class="md-card-content">
									<div>    <!-- id="page_heading" -->         
                                    <h2>Historial de Uso de Cupones</h2>
                                  <!-- <span class="uk-text-upper uk-text-small">Colonias</span> -->
                                    </div>									
				
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-3">
                            <span class="uk-text-small">Selecciona una ciudad: </span><br/>
                             <select id="selectCiudadHisto" name="selectCiudadHisto" class="uk-button uk-form-select" data-uk-form-select onchange="mostrarCuponesHistorial();cantidadCuponesHistorial();" >
                             <option value="" disabled selected hidden>Selecciona:</option>
                             </select>                            
                        </div>
					</div>
					 <br/>
					  <div class="uk-text-center oculto" id="esperarMostrarCuponesH" >
                                      <label> Procesando... </label>
				                       <img src="cargando.gif" /> 				 
                                           </div> 
					<label class="uk-float-right" id="numeroCuponesH"> </label>
								    <br/>
					
					
					</div><!-- cierre del content-->
				</div> <!-- cierre del mcard-->
									
				<div class="md-card">
					 <div class="md-card-content">		
                         <div class="uk-overflow-container uk-margin-bottom">
                         <table class="uk-table uk-table-nowrap table_check uk-table-hover tablesorter tablesorter-altair" id="tabla_cuponesHistorico">
                              <thead>
                                <tr>                                   
                                    <th class="uk-text-center">Cupon</th>                                    
                                    <th class="uk-text-center">Cliente</th>
									<th class="uk-text-center">Fecha de uso</th>                                    
                                </tr>
                            </thead>
                            
                            <tbody id="body_tablaHistorico">
                                
                               
                            </tbody>
                        </table>
                    </div>
					</div>
					</div>
					
					
					 
					 

                                    </div>  <!-- fin pag 2 -->
									
									
                                   
									
              <!-- </ul> -->
				</div>								
                </div>
            </div>
            
	
	<!-- ::::::::::::::::::::::::::::::::::::::::::::::::::::::::  -->
   
     <?php include('../codigo_general/script_commonPB.php'); ?>  <!-- llamada para ejecutar el jquery -->

   
    <!-- page specific plugins -->
    <!-- tablesorter -->
    <script src="../bower_components/tablesorter/dist/js/jquery.tablesorter.min.js"></script>
    <script src="../bower_components/tablesorter/dist/js/jquery.tablesorter.widgets.min.js"></script>
    <script src="../bower_components/tablesorter/dist/js/widgets/widget-alignChar.min.js"></script>
    <script src="../bower_components/tablesorter/dist/js/extras/jquery.tablesorter.pager.min.js"></script>

    <!--  issues list functions -->
   <script src="../assets/js/pages/pages_issues.min.js"></script>
    <!-- page specific plugins -->
    <!-- ionrangeslider -->
    <script src="../bower_components/ion.rangeslider/js/ion.rangeSlider.min.js"></script>
    <!-- htmleditor (codeMirror) -->
    <script src="../assets/js/uikit_htmleditor_custom.min.js"></script>
    <!-- inputmask-->
    <script src="../bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.js"></script>

    <!--  forms advanced functions -->
    <script src="../assets/js/pages/forms_advanced.min.js"></script>
	
	
	<script type="text/javascript" >
   
	 $( window ).ready(function()
    {    //console.log('pagina lista');
		 mostrarCiudades();
      }); 
	     /* Create by: Reyna Maria Martinez Vazquez*/ 
		 
		 function inicializarTablas(){
  $("#tabla_cupones").tablesorter({
    sortList: [[3,0]], //ordenar por de inicio esa columna 
    headers: {1: { sorter: "shortDate", dateFormat: "ddmmyyyy" } }, //cambio de formato de fecha 
    widgets: ['filter']//activar el widget de filtro de busqueda
		 }); 
		 } 
		 
		 function inicializarTablasHistorico(){
		 $("#tabla_cuponesHistorico").tablesorter({
    sortList: [[3,0]], //ordenar por de inicio esa columna 
    headers: {1: { sorter: "shortDate", dateFormat: "ddmmyyyy" } }, //cambio de formato de fecha 
    widgets: ['filter']//activar el widget de filtro de busqueda
		 }); 
		 
 }
	

function cantidadCupones(){
	   var idtblciudad=$("#selectCiudadGral").val(); 
	   //se recibe el id del select de la ciudad para mostras cantidad de colonias que tiene registradas	 
     $.ajax({     
       method: "POST",dataType: "json",
	   url: "./../../controllers/getCountAllTblcupondescuentoByTblCiudad.php", 
	   data: {solicitadoBy:"WEB",tblciudad_idtblciudad:idtblciudad}})
            .done(function(mc){ 
				   
                     if(parseInt(mc.success)==1){ 
			$("#numeroCupones").text('Cupones registrados en esta ciudad: '+mc.datos);	
				 }	
               //....
				 else{  $("#numeroCupones").text("No hay cupones en esta Ciudad");	} 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      //.always(function(){  console.log("always");});
   } 	 // fin de la funcion
   
   function cantidadCuponesHistorial(){
	   
	   var idciudad=$("#selectCiudadHisto").val(); 
	   //se recibe el id del select de la ciudad para mostras cantidad de colonias que tiene registradas	 
     $.ajax({     
       method: "POST",dataType: "json",
	   url: "./../../controllers/getCountAllTblcupondescuentoByTblCiudadHisto.php", 
	   data: {solicitadoBy:"WEB",tblciudad_idtblciudad:idciudad}})
            .done(function(mc){ 
				   
                     if(parseInt(mc.success)==1){ 
			$("#numeroCuponesH").text('Cupones consumidos en esta ciudad: '+mc.datos);	
				 }	
               //....
				 else{  $("#numeroCuponesH").text("No hay cupones consumidos en esta Ciudad");	} 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      //.always(function(){  console.log("always");});
   } 	 // fin de la funcion
   
   
   //--------- mostrar datos del cupon en pupop para despues modificarlos
 function mostrarDatosCupon(idcupon){
          
    $.ajax({ 
       method: "POST",dataType: "json",url: "./../../controllers/getTblcupon1.php", 
	   data: {solicitadoBy:"WEB",idcupon:idcupon}}) 
            .done(function(msg){
               
                //console.log(msg);
				$.each(msg.datos, function(x,item){
				  $("#modificarIdcupon").text(item.idtblcupondescuento );			 
				  $("#modificarNombre").val(item.tblcupondescuento_codigo); 
				  $("#modificarValor").val(item.tblcupondescuento_descuento); 
                  $("#selectCiudadMod").val(item.tblciudad_idtblciudad);
				  
				  
				        })
                   })              
          .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
          //.always(function(){  console.log("always");});				  
	}	// fin de la funcion

	
	function actualizarCupon(){			
                
                  idcupon= $("#modificarIdcupon").text();
	           nombre= $("#modificarNombre").val();
			     valor= $("#modificarValor").val(); 
			   idciudad= $("#selectCiudadMod").val(); 
			   email="Flor@gmail.com";
				
		  if( $('#modificarNombre').val()==null){
			UIkit.modal.alert('Es necesario completar el campo de Nombre del Cupón.');
		       }
	else if	(  $('#modificarValor').val()=="" ){
			UIkit.modal.alert('Es necesario completar el campo de Valor del Cupón.');
		     }
		
	   else if( !(/^([0-9])*$/.test(valor)) ){    
			UIkit.modal.alert('Es necesario que el campo Valor del Cupón solo contega Digitos.');
		    }  
	 else if( $('#selectCiudadMod').val()==null){
			UIkit.modal.alert('Es necesario escoger una ciudad.');
		       }		   
		   
				
	   else{    
			   
		           $.ajax({ 
                   method: "POST",dataType: "json",url: "./../../controllers/setUpdateTblcupondescuentoSinEst.php", 				  
				   data:{solicitadoBy:"WEB",idcupon:idcupon,				  
				   nombre:nombre,valor:valor,idciudad:idciudad,
				   emailmodifico:email},
				   beforeSend: function(){
                              $('#cargarModificarCupon').css('display','inline');						 
							  
                                     }})
                  .done(function(mg){
					  
					 if(parseInt(mg.success)==1){ 
					 
							UIkit.modal("#mcupon").hide(); //se oculta el pupop de Modificar colonia                           
                              UIkit.modal.alert('Cupón Modificado con &eacute;xito'); 
							  
							 $("#selectCiudadGral").val(idciudad);
				             $('#body_tablaCupones').html("");					
				             mostrarCupones();
                                       }
							else{
                              UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');
                                 }
								 
								 }) 	  
                  .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                  .always(function(){ $("#cargarModificarCupon").hide(); //console.log("always");
				  });
		  
	   }	 
	} // fin de la funcion

	
	function mostrarCiudades(){	
      
     $.ajax({     
     method: "POST",dataType: "json",url: "./../../controllers/getAllTblciudadAct.php", 
	 data: {solicitadoBy:"WEB"}})
            .done(function(mostC){
				//console.log(mcol);   
				  $('#altaCiudad').html(""); 
				 $('#selectCiudadMod').html(""); 
				  
				$("#selectCiudad").append('<option value="" disabled selected readonly >Selecciona...</option>'); 
				$("#selectCiudadMod").append('<option value="" disabled selected readonly >Selecciona...</option>');
				
                $.each(mostC.datos, function(i,item)				
				 {	  
				 idtblciudad=item.idtblciudad;	
				 
				 //muestra ciudades en el encabezado de la interfaz principal
                   $("#selectCiudad").append('<option value="' + idtblciudad +'">' + item.tblciudad_nombre + '</option>');
			     $("#selectCiudadGral").append('<option value="' + idtblciudad +'">' + item.tblciudad_nombre + '</option>');  				 
                $("#selectCiudadMod").append('<option value="' + idtblciudad +'">' + item.tblciudad_nombre + '</option>');  				    
				  $("#selectCiudadHisto").append('<option value="' + idtblciudad +'">' + item.tblciudad_nombre + '</option>');  				    
				
				});	
					
                                 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      //.always(function(){  console.log("always");});
   }  //fin de la funcion
   
   function mostrarCuponesHistorial(){
			
		    var idDelaCiudad=$("#selectCiudadHisto").val();	//se recibe el id que seleciono el usuario del select de Ciudades            
             inicializarTablasHistorico();
		   $.ajax({     
     method: "POST",dataType: "json",url: "./../../controllers/getTblhistcupondescuento1.php", 
	    data: {solicitadoBy:"WEB",idciudad:idDelaCiudad},
		beforeSend: function(){   
           $('#esperarMostrarCuponesH').css('display','inline');								  
                                                 }
		})	 
            .done(function(mo){ 
				
				if(parseInt(mo.success)==1){
				Hiscupon=true;
				$("#body_tablaHistorico").html("");
                $.each(mo.datos, function(i,item)
               {
				   cupon= item.tblhistcupondescuento_cupon;
				  cliente= item.tblcliente_nombre;
				  clienteApp =item.tblcliente_apellidos;
				  // fechaaa=item.tblhistcupondescuento_fchcreacion;
				   //fecha=item.fecha;
				   fagendado= item.fecha;
                    fagendado = fagendado.split("-");                 
				    fagendado = fagendado[2]+"/"+fagendado[1]+"/"+fagendado[0];
				     
                     // C.tblcupondescuento_activado
                $("#body_tablaHistorico").append(
				   ' <tr>'+
                 '<td class="uk-width-medium-1-3 uk-text-center >'+
                                 '<span id="mostrarCiudad">'+ cupon +'<span/>'+
               					  ' </td>'+
				'<td class="uk-width-medium-1-3 uk-text-center" >'+				                      
                                  ' <span id="mostrarPais">'+cliente +' '+clienteApp+'</span>'+
               					  ' </td>'+
                          ' </td>'+
				'<td class="uk-width-medium-1-3 uk-text-center" >'+				                      
                                  ' <span id="mostrarPais">'+ fagendado +' </span>'+
               					  ' </td>'+								  
                                  							
                                '</tr>'
				);
				                       
				 
				   		$("#tabla_cuponesHistorico").trigger('updateAll', [true]);//actualiza tabla 
				
				
                });	 //cierre del each
                        //-----------
				}else{Hiscupon=false
				 $("#body_tablaHistorico").html("");
				}         
                
      }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
    .always(function(){ $("#esperarMostrarCuponesH").hide();  });
   }  //fin de la funcion
   
   
   //................... mostrar cupones .........................
   function mostrarCupones(){
			
		    var idDelaCiudad=$("#selectCiudadGral").val();	//se recibe el id que seleciono el usuario del select de Ciudades            
             inicializarTablas();
		   $.ajax({     
     method: "POST",dataType: "json",url: "./../../controllers/getAllTblcupondescuentoByTblciudadPertenecen.php", 
	    data: {solicitadoBy:"WEB",tblciudad_idtblciudad:idDelaCiudad},
		beforeSend: function(){   
           $('#esperarMostrarCupones').css('display','inline');								  
                                                 }
 		})		 
            .done(function(mo){ 
				
				if(parseInt(mo.success)==1){
				Hcupon=true;
				$("#body_tablaCupones").html("");
                $.each(mo.datos, function(i,item)
               {
				   idcupon= item.idtblcupondescuento;
				   nombre= item.tblcupondescuento_codigo;
				   valor=item.tblcupondescuento_descuento;
                     // C.tblcupondescuento_activado
                $("#body_tablaCupones").append(
				   ' <tr>'+
                 '<td class="uk-width-medium-1-3 uk-text-center"  onclick="mostrarDatosCupon('+
	                                                idcupon+');"'+
				 ' data-uk-modal="{target:'+"'#mcupon'"+',bgclose:false, center:true }" >'+
                                 '<span id="mostrarCiudad">'+ nombre +'<span/>'+
               					  ' </td>'+
				'<td class="uk-width-medium-1-3 uk-text-center" >'+				                      
                                  '<label>$ <span id="mostrarPais">'+ valor +' </span></label>'+
               					  ' </td>'+                                   
                                  '<td class="uk-width-medium-1-3 ">'+									
                '<input type="checkbox" data-switchery '+
				'data-switchery-color="#00CC66" onclick="ModEstatus('+idcupon+');"  id="mostrarEstatus'+idcupon+'" '+ item.tblcupondescuento_activado +' />'+  
                 '<span class="inline-label" id="estado'+idcupon+'">   </span> '+ 
                 '<span id="estado'+idcupon+'"> </span>'+    				 
							'</td>	'+								
                                '</tr>'
				);
				                       if(parseInt(item.tblcupondescuento_activado)!=0){
                                          $("#mostrarEstatus"+idcupon).prop("checked", true);
										  $("#estado"+idcupon).text("Activo");
                                           }
						                  else {
                                          $("#mostrarEstatus"+idcupon).prop("checked", false);
										   $("#estado"+idcupon).text("Desactivado");
                                            } 
				 
				   		$("#tabla_cupones").trigger('updateAll', [true]);//actualiza tabla 
				
				
                });	 //cierre del each
                        //-----------
				}else{Hcupon=false  
				$("#body_tablaCupones").html("");}         
                
      }).fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      .always(function(){ $("#esperarMostrarCupones").hide();  });
   }  //fin de la funcion
   
   
   //...... modificar estatus de cupon..............
   function ModEstatus(idcupon){ 
   
		     activoModificar1 =  $("#mostrarEstatus"+idcupon).prop('checked');		
										
			 emaildeUsuario="Flor@gmail.com";
			 
			if(activoModificar1){
		         activoModificar1=1; 
			     $("#estado"+idcupon).text("Activo");
			   }
		    else{ activoModificar1=0; 
			      $("#estado"+idcupon).text("Desactivado"); 
				}		   
		 			 
		
             $.ajax({ 
                   method:"POST",dataType: "json",url: "./../../controllers/setUpdateTblcupondescuentoEstatus.php", 				  
				   data:{solicitadoBy:"WEB",idcupon:idcupon,activado:activoModificar1,
				   emailmodifico:emaildeUsuario}})
                  .done(function(mg){					  
                            if(parseInt(mg.success)==1){  
						
                              UIkit.modal.alert('Estatus del Cupon modificado con &Eacute;xito'); 
							   
							} else{
                              UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');
                                 }     
								 }) 	  
                  .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                //  .always(function(){  console.log("always");});
			 
	} //fin de la funcion
   
   
  //------------dar de alta cupones-----------------
  function AO(){
		 $("#cupon_alta").addClass("oculto");
	}
	
	function rCO(){
		 $("#cupon_alta").removeClass("oculto");
	}
  
  
   function agregarCupon(){	  
	  
	 nombre = $("#altaNombre").val();  
	 valor=$("#altaValor").val();
	 ciudad=$("#selectCiudad").val();    
     //estatus= $("#altaEstatus").prop('checked'); 
    cuponEstatus= $("#altaEstatus").prop('checked'); 		 
     emailUsuario="reyna@gmail.com";   
	
	
		  
	if(cuponEstatus){
		  cuponEstatus=1;		
		     }
		   else{
			 cuponEstatus=0;
		   }  
		   
		   if( $('#altaNombre').val()==""){			  
		UIkit.modal.alert('Es necesario completar el campo de Nombre del Cupón.');		
		     }  
        else if	(  $('#altaValor').val()=="" ){
			UIkit.modal.alert('Es necesario completar el campo de Valor del Cupón.');
		     }
		
	   else if( !(/^([0-9])*$/.test(valor)) ){    
			UIkit.modal.alert('Es necesario que el campo Valor del Cupón solo contega Digitos.');
		    }  
	 else if( $('#selectCiudad').val()==null){
			UIkit.modal.alert('Es necesario escoger una ciudad.');
		       }
	   else{
		   
		 $.ajax({    //inicia ajax  
       method: "POST",dataType: "json",url: "./../../controllers/getCheckTblcuponDesc.php",
	   data: {solicitadoBy:"WEB",nombre:nombre,ciudad:ciudad}	         
	   })
            .done(function(mpa){   
                 if(parseInt(mpa.datos)==1){
                      UIkit.modal.alert('Esta Cupón en esta Ciudad ya esta registrado.');
                                              }
							else 
						{  
					      $("#cupon_alta").addClass("oculto");
					 $.ajax({ 
                               method: "POST",dataType: "json",
							   url: "./../../controllers/setTblcuponparaDescuento.php", 
							   data: {solicitadoBy:"WEB",nombre:nombre, 
							   valor:valor,
							   estatus:cuponEstatus,ciudad:ciudad,emailcreo:emailUsuario},
							 beforeSend: function(){
                              $('#cargarAltaCupon').css('display','inline'); }
							
							       })                                                                                                                                                                                               
                         
	                                                                            
							   .done(function(ms){                                    
                            //       console.log(ms);
				//console.log('nom:'+nombre+'val:'+valor+' ciuadad'+ciudad+' act:'+estatus);				 
                        if(parseInt(ms.success)==1){
									   $("#formAlta")[0].reset(); //vaciar el formulario
                                      UIkit.modal("#cupon").hide();  //oculta el pupop                                         							  
                                      UIkit.modal.alert('Cupón Registrado con éxito');
                                     
									  
                               $("#selectCiudadGral").val(ciudad);
				                $("#body_tablaCupones").html("");					
				                mostrarCupones();
                                 cantidadCupones();						
									cantidadCupones(); 
	   
                                    }else {
                                      UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');
                                        }                          
                                  })
                              .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                              .always(function(){  $("#cargarAltaCupon").hide(); 							 
							  });	
							
					}
				
				
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
     // .always(function(){  console.log("always");}); //fin ajax
	  }
} //fin d ela funcion	
    </script> 
    
</body>
</html>