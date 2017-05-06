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
	
    <!-- main sidebar end -->

    <div id="page_content">
        <div id="page_content_inner">

      
			<div class="md-card">
					    <div class="md-card-content">
									<div>         
                                    <h2>Productos</h2>
                                   <!--<span class="uk-text-upper uk-text-small">Colonias</span> -->
                                    </div>									
				
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-5">
                                 <span class="uk-text-small">Selecciona una ciudad: </span> <br/>
                                   <select id="SelectCiudadesProducto" name="SelectCiudadesProducto" class="uk-button uk-form-select" data-uk-form-select  onchange="javascript:mostrar_provedores();" >
                                     <option value="" disabled selected readonly >Selecciona...</option>  
                                   </select>                         
                        </div>
					
                        <div class="uk-width-medium-2-5">
                            <span class="uk-text-small">Proveedor: </span> <br/>
                                   <select id="SelectProveedor" name="SelectProveedor" class="uk-button uk-form-select" data-uk-form-select  onchange="javascript:mostrarCategorias();mostrarProveedor();cantidadProductos();" >
                                    <option value="" disabled selected readonly >Selecciona...</option>
                                   </select>                             
                        </div>
					
                        <div class="uk-width-medium-1-5">
                            <span class="uk-text-small">Categoria: </span> <br/>
                                   <select id="SelectCategoria" name="SelectCategoria" class="uk-button uk-form-select" data-uk-form-select  onchange="javascript:mostrarPorCategoria();mostrar_Ingrediente();" > 
                                  <option value="" disabled selected readonly >Selecciona...</option> 
                                   </select>                            
                        </div>
						<div class="uk-width-medium-1-5">
                            <span class="uk-text-small">Tipo de producto: </span> <br/>
                                   <select id="SelectIngrediente" name="SelectIngrediente" class="uk-button uk-form-select" data-uk-form-select  onchange="javascript:mostrarPorIngrediente();" > 
                                  <option value="" disabled selected readonly >Selecciona...</option> 
                                   </select>                            
                        </div>
					</div> 
					<br/>
					<div>  
					<label class="uk-float-right" id="numeroProductos"> </label>
					</div>
					<br/>
					
					<div class="uk-text-center oculto" id="esperarMostrarProductos" >
                                      <label> Procesando... </label>
				                       <img src="cargando.gif" /> 				 
                                           </div>
					</div><!-- cierre del content-->
				</div> <!--  cierre del mcard-->
				<br/>
			<!--  .............................. -->
			<!-- ----------------  Imagen de BePickler en la Interfaz Inicial--------------- -->
			   <div id="paraInicial">				
               <div class="md-card"> 
			   <div class="md-card-content"> 
			   <div class="uk-grid uk-grid-divider" data-uk-grid-margin>
			   <div class="uk-width-medium-1-3 uk-container-center">
			   <img id="logoBPP" name="logoBPP" src="../assets/img/delPanel/logoo.jpg" />	                                
			   </div>
			   </div>
			   </div></div>     				 
               </div>
			
				
	<!-- empieza tarjeta....................................................--> 
             <div id="tarjetaProducto">
			
				 </div>  
					
					


			   
				
		 
    <!--......termina tarjeta .. -->
	
	
	<!-- ...........-->
	</div> <!-- cierre del content iner-->
	</div> <!-- cierre del content -->
	
	
    <!-- common functions 
    <script src="assets/js/common.min.js"></script>   
    <script src="assets/js/uikit_custom.min.js"></script>  
    <script src="assets/js/altair_admin_common.min.js"></script>-->

    <!-- page specific plugins -->

    <!--  contact list functions 
    <script src="../assets/js/pages/page_contact_list.min.js"></script> -->
    
    

   <?php include('../codigo_general/script_commonPB.php'); ?>  <!-- llamada para ejecutar el jquery -->

   <!-- archivos JS-->
  <script type="text/javascript" >  
   /* Create by: Reyna Maria Martinez Vazquez*/
 $( window ).ready(function()
    {
       // console.log('pagina lista');
		mostrar_Ciudades();
	});
	
	
	//.-----mostrar cantidad de productos por proveedor----------------------------------------------------------------
	  function cantidadProductos(){
		  
	   var iddeproveedor=$("#SelectProveedor").val(); 
	   //se recibe el id del select del proveedor que selecciono el usuario en la pantalla principal   
	 
     $.ajax({     
       method: "POST",dataType: "json",
	   url: "./../../controllers/getCountAllProductosByProveedor.php", 
	   data: {solicitadoBy:"WEB",iddeproveedor:iddeproveedor}})
            .done(function(mc){				   
                     if(parseInt(mc.success)==1){ 
			$("#numeroProductos").text('Productos de este proveedor: '+mc.datos);		
				 
			 }  else{ $("#numeroProductos").text("No hay productos"); } 					        
						//nombre del span que mostrara el numero de ordenes
				 
    }) .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      
   } //fin de la funcion
	 //.-----mostrar ciudades----------------------------------------------------------------
	  function mostrar_Ciudades(){	
     $.ajax({     
     method: "POST",dataType: "json",url: "./../../controllers/getAllTblciudadActAByProveedor.php", data: {solicitadoBy:"WEB"}})
            .done(function(mostCiud){
				if (parseInt(mostCiud.success)==1) {
					ciudad=true;
					//$("#SelectCiudadesProducto").empty();
                $.each(mostCiud.datos, function(i,item)
				 {	idtblciudad=item.idtblciudad;	
				 //muestra ciudades en el encabezado de la interfaz principal
                 $("#SelectCiudadesProducto").append('<option value="' + idtblciudad +'">' + item.tblciudad_nombre + '</option>');
				  				 
                      });	
				}else
				{ ciudad=false;}                
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      
   } 
   
   
   
   //-----mostrar proveedores----------------------------------------------------------------
	  function mostrar_provedores(){

	      var idtblciudad=$("#SelectCiudadesProducto").val();	//se recibe el id que seleciono el usuario del select de Ciudades            
          
     $.ajax({     
     method: "POST",dataType: "json",url: "./../../controllers/getAllProveedorByCiudad.php", 
	 data: {solicitadoBy:"WEB",idtblciudad:idtblciudad }}) 
            .done(function(mf){				
				   if (parseInt(mf.success)==1) {				   
				  
				   $("#SelectProveedor").html("");	
				  $("#SelectProveedor").append('<option value="" disabled selected readonly >Selecciona...</option>'); 
				
                $.each(mf.datos, function(i,item)
				 {	idtblproveedor=item.idtblproveedor;	
				 //muestra ciudades en el encabezado de la interfaz principal 
                 $("#SelectProveedor").append('<option value="' + idtblproveedor +'">' + item.tblproveedor_nombre + '</option>');
				  				 
				   });
				   
				   }else{ 
				    $("#SelectProveedor").html("");
					$("#SelectProveedor").append('<option value="" disabled selected readonly >Selecciona...</option>'); 
				} 
                                 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      
   } 
   
   //-----mostrar categorias----------------------------------------------------------------
	  function mostrarCategorias(){

	      var id_proveedor=$("#SelectProveedor").val();	//se recibe el id que seleciono el usuario del select de proveedor            
          
     $.ajax({     
     method: "POST",dataType: "json",url: "./../../controllers/getAllTblCategoriasByProveedor.php", 
	 data: {solicitadoBy:"WEB",idproveedor:id_proveedor }}) 
            .done(function(mf){
				
				   if (parseInt(mf.success)==1) {				   
		$("#SelectCategoria").html("");
		$("#SelectCategoria").append('<option value="" disabled selected readonly >Selecciona...</option>'); 
				 
				  
                $.each(mf.datos, function(i,item)
				 {	idcate=item.idtblcategproduct;
                      iprov=item.idtblproveedor;				 
				 //muestra ciudades en el encabezado de la interfaz principal 
                 $("#SelectCategoria").append('<option value="'+idcate+'">' + item.tblcategproduct_nombre + '</option>');
				  				
				   });
				   }else{ proveedor=false;
				    $("#SelectCategoria").html(""); 
					$("#SelectCategoria").append('<option value="" disabled selected readonly >Selecciona...</option>'); 
		                } 
					
                                 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      
   } //fin d ela funcion
   
       // muestra tipo de ingrediente que tiene una categoria en base a un proveedor
   function mostrar_Ingrediente(){	
            var id_proveedor=$("#SelectProveedor").val();	//proveedor
           var cat=$("#SelectCategoria").val();	     //categoria
     $.ajax({     
     method: "POST",dataType: "json",url: "./../../controllers/getAllTblProductosByProvAndCategIngred.php", 
	 data: {solicitadoBy:"WEB",idproveedor:id_proveedor,idcategoria:cat}})
            .done(function(ing){
				if (parseInt(ing.success)==1) {
					 $("#SelectIngrediente").html("");
					 $("#SelectIngrediente").append('<option value="" disabled selected readonly >Selecciona...</option>'); 
		
					ingred=true;
					//$("#SelectCiudadesProducto").empty();
                $.each(ing.datos, function(i,item)
				 {	idingred=item.idtblespecificingrediente;	
				 //muestra ciudades en el encabezado de la interfaz principal
                 $("#SelectIngrediente").append('<option value="' + idingred +'">' + item.tblespecificingrediente_nombre + '</option>');
				  			 
                      });	
				}else
				{ ingred=false;  
			    $("#SelectIngrediente").html(""); 
			     $("#SelectIngrediente").append('<option value="" disabled selected readonly >Selecciona...</option>'); 
		            
			}                
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      
   } 
   
   
   //---------------------------mostrar productos por proveedor---------
	function mostrarProveedor(){
			
		    var id_de_proveedor=$("#SelectProveedor").val();	
			                  //se recibe el id del proveedor que seleciono del select de Proveedor           
            
	   $.ajax({ 
              method: "POST",dataType: "json",
			  url: "./../../controllers/getAllTblProductosByProveedor.php", 
		      data: {solicitadoBy:"WEB",idproveedor:id_de_proveedor},
			  beforeSend: function(){
				   $('#esperarMostrarProductos').css('display','inline');}	
			  })
              .done(function(gh){ 		
								
			 if(parseInt(gh.success)==1){
				
				 $("#paraInicial").remove(); 					 
				 $('#tarjetaProducto').html(""); 
			 $.each(gh.datos, function(g,item) 
			 {  
					 nombreProveedor= item.tblproveedor_nombre;					
					 categoria= item.tblcategproduct_nombre;
					 productoNombre= item.tblproducto_nombre;
					 precio= item.tblproductdetalle_preciobepickler; 
					   
					  id_proveedor1 = item.idtblproveedor;
					      idprod1 = item.idtblproducto;
						   id_detalle = item.idtblproductdetalle; 
					                
					 //console.log("funcion 1..idproveedor: "+id_proveedor1+'idproducto: '+idprod1);
				//-------------------------
				                
								 $("#paraInicial").remove(); 
								 
				               $("#tarjetaProducto").append('<div class="md-card">'+
               '<div class="md-card-content">'+				
		       '<div class="uk-grid uk-grid-divider" data-uk-grid-margin>'+	
		       '<div class="uk-width-medium-1-2" >'+	
			   '<div class="uk-grid" id="parafoto'+gh.datos[g].idtblproductdetalle+'">'+              		 
		       '</div> </div>'+	
					'<div class="uk-width-medium-1-2">'+	
                       ' <div class="md-card-content">'+
                           '<ul class="md-list">'+
							   ' <li>'+
                                    '<div class="md-list-content">'+
                                       ' <span class="uk-text-small uk-text-muted">Proveedor</span>'+
                                       ' <span>'+nombreProveedor+'</span>'+
                                    '</div>'+
                                '</li> <li>'+								
                                    '<div class="md-list-content">'+
                               '<span class="uk-text-small uk-text-muted">Categor&iacute;a</span>'+
                                       ' <span>'+ categoria+ '</span>'+
                                    '</div> </li>'+
									' <li>'+
                                   ' <div class="md-list-content">'+
                                     '<span class="uk-text-small uk-text-muted">Nombre del producto</span>'+
                                     '<span>'+ productoNombre +'</span>'+
                                   ' </div></li>'+ 
								  
								   ' <li id="prod'+g+'">'+
                                   ' <div class="md-list-content">'+
                                     '<span class="uk-text-small uk-text-muted">Caracteristicas</span>'+
                                    
                                   ' </div></li>'+ 
								   
								   '<li>'+
                                   '<div class="md-list-content">'+
                                 '<span class="uk-text-small uk-text-muted">Precio</span>'+
                                    '<span>$<span>'+ precio +'</span> </span>'+
                                    '</div></li><li>'+
									
                                    '<div class="md-list-content">'+
							'<span class="uk-text-small uk-text-muted">Estatus</span>'+ 
							'<span>'+  
			'<input type="checkbox" id="estado'+id_detalle+'"  onclick="actualizarProducto('+id_detalle+');" class="checkbox" name="checkbox" '+						                                                   
								          gh.datos[g].tblproductdetalle_activado+'/> '+  //tblproductdetalle_activado
						 ' <span class="inline-label" id="estadoProducto'+id_detalle+'"> </span>'+				  
                                 '</div> '+                                 
								 
								 '</li> </ul>'+
                        '</div></div></div> </div> </div>'					
						
							   );
						
                                	     if(parseInt(gh.datos[g].tblproductdetalle_activado)!=0){ 
                                          $("#estado"+id_detalle).prop("checked", true);
										  $("#estadoProducto"+id_detalle).text("Activo");
                                           }
						                  else {
                                          $("#estado"+id_detalle).prop("checked", false);
										   $("#estadoProducto"+id_detalle).text("Desactivado");
                                            } 
											
											 iddetalleproducto = gh.datos[g].idtblproductdetalle.toString();
											 
											  $.ajax({//detalle de cada producto 
                                              method: "POST",  
                                              dataType: "json",  
                                              url: "./../../controllers/getTblproductoDetalle2.php",  
                                             data: {solicitadoBy:"WEB",idtblproductdetalle:iddetalleproducto}  })
                                             .done(function( msg5 ) {
         
        $.each(msg5.datos, function(i5,item5){
        if(msg5.datos[i5].tblproductdetalle_diametro!=null){
          $("#prod"+g).append('<span class="md-list-heading">'+
		  msg5.datos[i5].tblproductdetalle_diametro+' cm'+' --'+msg5.datos[i5].tblespecificingrediente_nombre+'</span><br/>');
		  
        }
        if(msg5.datos[i5].tblproductdetalle_largo!=null && msg5.datos[i5].tblproductdetalle_ancho!=null){
          $("#prod"+g).append('<span class="md-list-heading">'+
		  msg5.datos[i5].tblproductdetalle_largo+' cm x '+ msg5.datos[i5].tblproductdetalle_ancho+
		  ' cm '+' --'+msg5.datos[i5].tblespecificingrediente_nombre+'</span><br/>');
        }
        if(msg5.datos[i5].tblproductdetalle_piezas!=null){
          $("#prod"+g).append('<span class="md-list-heading">'+msg5.datos[i5].tblproductdetalle_piezas+
		  ' piezas'+' --'+msg5.datos[i5].tblespecificingrediente_nombre+'</span><br/>');
                   }
		});  //cierre del each
    })
     .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
												   
               //-------------------------					
                
		                       	//___________________________________			
			                     $.ajax({ 
                                 method: "POST",dataType: "json",
		                         url: "./../../controllers/getAllProductosImagByProveedor.php", 
		                         data: {solicitadoBy:"WEB",producto:idprod1,detalle:id_detalle}}) 
                                 .done(function(ab){
				                 if(parseInt(ab.success)==1){					             
                                 imagen=true;
                                 $.each(ab.datos, function(x,item)
				                 {	
								 
			 $("#parafoto"+gh.datos[g].idtblproductdetalle).append('<div class="uk-width-medium-1-2 uk-container-center">	'+	
			' <img id="tama" src="./../../assests_general/productos/linea/'+
	                  ab.datos[x].tblproductimg_srcimg +'" />  </div>');
                                  }); //fin del each
                           
                               } else { imagen=false;} 
							  
	            }) .fail(function( jqXHR, textStatus ) { console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})	
					  
					//-----------------
			
		}); //fin del each	
		                        
        //--------
		} else 
						{  
				  $("#paraInicial").remove();
				  $("#tarjetaProducto").html("");					
				  $("#tarjetaProducto").append(
				  '<div class="md-card"> <form class="uk-form"> <div class="md-card-content"> '+
				  '<div class="uk-grid uk-grid-divider" data-uk-grid-margin>'+
				  '<div class="uk-width-medium-1-2"><span> No hay productos registrados con este proveedor.</span> </div></div></div></div>');   
      				   }
			 
      }) .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
     	 .always(function(){ $("#esperarMostrarProductos").hide(); });				  
		                  //----------------------	
	  
   } //fin de la funcion
   
   
   //--------------------Funcion para modificar el estatus de cada producto-----------------------------------------
      function actualizarProducto(id_detalle){
		  		    			
			    estatus = $("#estado"+id_detalle).prop('checked');
			 emaildeUsuario="Flor@gmail.com";
			if(estatus){
		       estatus=1; 
			   $("#estadoProducto"+id_detalle).text("Activo"); }
		    else{ estatus=0;
              $("#estadoProducto"+id_detalle).text("Desactivado"); }		   
		  
		  $.ajax({ 
                   method: "POST",dataType: "json",
				   url: "./../../controllers/setUpdateTblproductoEstatus.php", 				  
				   data:{solicitadoBy:"WEB",idtblproducto:id_detalle,
				   activado:estatus,emailmodifico:emaildeUsuario}})
                  .done(function(mg){	
				                
                            if(parseInt(mg.success)==1){                             
                              UIkit.modal.alert('Estatus del Producto Modificado con &Eacute;xito'); 
							} else{
                              UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');
                                 }     
								 }) 	  
                  .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                 
			 
	} //fin de la funcion
	
	
	
   //--------------mostrar productos por categoria------------
   function mostrarPorCategoria(){
			
		              var idcate = $("#SelectCategoria").val();
					   var iprov = $("#SelectProveedor").val();
	   $.ajax({ 
              method: "POST",dataType: "json",
			  url: "./../../controllers/getAllTblProductosByProvAndCateg.php", 
		      data: {solicitadoBy:"WEB",idproveedor:iprov,idcategoria:idcate},
			   beforeSend: function(){
				   $('#esperarMostrarProductos').css('display','inline');}	
			  })			  
              .done(function(gh2){ 
			  
					
			if(parseInt(gh2.success)==1){
				
				 $("#paraInicial").remove(); 					 
				 $("#tarjetaProducto").html(""); 
			 $.each(gh2.datos, function(g2,item) 
			 {  
					 nombreProveedor= item.tblproveedor_nombre;					
					 categoria= item.tblcategproduct_nombre;
					 productoNombre= item.tblproducto_nombre;
					 precio= item.tblproductdetalle_preciobepickler; 
					   
					  id_proveedor1 = item.idtblproveedor;
					      idprod2 = item.idtblproducto;
					         id_detalle2 = item.idtblproductdetalle;        
					 //console.log("funcion 1..idproveedor: "+id_proveedor1+'idproducto: '+idprod1);
				//-------------------------
				                
								 $("#paraInicial").remove(); 
								 
				               $("#tarjetaProducto").append('<div class="md-card">'+
               '<div class="md-card-content">'+				
		       '<div class="uk-grid uk-grid-divider" data-uk-grid-margin>'+	
		       '<div class="uk-width-medium-1-2" >'+	
			   '<div class="uk-grid" id="parafoto'+gh2.datos[g2].idtblproductdetalle+'">'+              		 
		       '</div> </div>'+	
					'<div class="uk-width-medium-1-2">'+	
                       ' <div class="md-card-content">'+
                           '<ul class="md-list">'+
							   ' <li>'+
                                    '<div class="md-list-content">'+
                                       ' <span class="uk-text-small uk-text-muted">Proveedor</span>'+
                                       ' <span>'+nombreProveedor+'</span>'+
                                    '</div>'+
                                '</li> <li>'+								
                                    '<div class="md-list-content">'+
                               '<span class="uk-text-small uk-text-muted">Categor&iacute;a</span>'+
                                       ' <span>'+ categoria+ '</span>'+
                                    '</div> </li> <li>'+
                                   ' <div class="md-list-content">'+
                                     '<span class="uk-text-small uk-text-muted">Nombre del producto</span>'+
                                     '<span>'+ productoNombre +'</span>'+
                                   ' </div></li>'+
								    ' <li id="prod2'+g2+'">'+
                                   ' <div class="md-list-content">'+
                                     '<span class="uk-text-small uk-text-muted">Caracteristicas</span>'+                                    
                                   ' </div></li>'+ 
								   '<li>'+
                                   '<div class="md-list-content">'+
                                 '<span class="uk-text-small uk-text-muted">Precio</span>'+
                                    '<span>$<span>'+ precio +'</span> </span>'+
                                    '</div></li><li>'+
									
                                    '<div class="md-list-content">'+
							'<span class="uk-text-small uk-text-muted">Estatus</span>'+
							'<span>'+  
			'<input type="checkbox" id="estado'+id_detalle2+'"  onclick="actualizarProducto2('+id_detalle2+');" class="checkbox" name="checkbox" '+						                                                   
								       gh2.datos[g2].tblproductdetalle_activado +'/> '+ 
						 ' <span class="inline-label" id="estadoProducto'+id_detalle2+'"> </span>'+				  
                                 '</div> '+
								 
								 '</li> </ul>'+
                        '</div></div></div> </div> </div>'					
						
							   );
						
                                	     if(parseInt(gh2.datos[g2].tblproductdetalle_activado)!=0){
                                          $("#estado"+id_detalle2).prop("checked", true);
										  $("#estadoProducto"+id_detalle2).text("Activo");
                                           }
						                  else {
                                          $("#estado"+id_detalle2).prop("checked", false);
										   $("#estadoProducto"+id_detalle2).text("Desactivado");
                                            } 
				
                       iddetalleproducto2 = gh2.datos[g2].idtblproductdetalle.toString();
											 
											  $.ajax({//detalle de cada producto 
                                              method: "POST",  
                                              dataType: "json",  
                                              url: "./../../controllers/getTblproductoDetalle2.php",  
                                             data: {solicitadoBy:"WEB",idtblproductdetalle:iddetalleproducto2}})
                                             .done(function( msg5 ) {
         
        $.each(msg5.datos, function(i8,item5){
        if(msg5.datos[i8].tblproductdetalle_diametro!=null){
          $("#prod2"+g2).append('<span class="md-list-heading">'+
		  msg5.datos[i8].tblproductdetalle_diametro+' cm'+' --'+msg5.datos[i8].tblespecificingrediente_nombre+'</span><br/>');
		  
        }
        if(msg5.datos[i8].tblproductdetalle_largo!=null && msg5.datos[i8].tblproductdetalle_ancho!=null){
          $("#prod2"+g2).append('<span class="md-list-heading">'+
		  msg5.datos[i8].tblproductdetalle_largo+' cm x '+ msg5.datos[i8].tblproductdetalle_ancho+
		  ' cm '+'  --'+msg5.datos[i8].tblespecificingrediente_nombre+'</span><br/>');
        }
        if(msg5.datos[i8].tblproductdetalle_piezas!=null){
          $("#prod2"+g2).append('<span class="md-list-heading">'+msg5.datos[i8].tblproductdetalle_piezas+
		  ' piezas'+' --'+msg5.datos[i8].tblespecificingrediente_nombre+'</span><br/>');
                   }
		});  //cierre del each
    })
     .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
												   
               //-------------------------									
               //-------------------------					
                
		                       	//___________________________________			
			                     $.ajax({ 
                                 method: "POST",dataType: "json",
		                         url: "./../../controllers/getAllProductosImagByProveedor.php", 
		                         data: {solicitadoBy:"WEB",producto:idprod2,detalle:id_detalle2}})								 
                                 .done(function(ab2){
				                 if(parseInt(ab2.success)==1){
					            // console.log("funcion 2");
                                 imagen2=true;
                                 $.each(ab2.datos, function(x2,item)
				                 {	
								 
			 $("#parafoto"+gh2.datos[g2].idtblproductdetalle).append('<div class="uk-width-medium-1-2 uk-container-center">	'+	
			' <img id="tama" src="./../../assests_general/productos/linea/'+
	                  ab2.datos[x2].tblproductimg_srcimg +'" />  </div>');
                                  }); //fin del each
                           
                               } else { imagen2=false;} 
							  
	            }) .fail(function( jqXHR, textStatus ) { console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})	
					  
					//-----------------
			
		}); //fin del each	
		                        
        //--------
		} else 
						{  
				  $("#paraInicial").remove();
				  $("#tarjetaProducto").html("");					
				  $("#tarjetaProducto").append(
				  '<div class="md-card"> <form class="uk-form"> <div class="md-card-content"> '+
				  '<div class="uk-grid uk-grid-divider" data-uk-grid-margin>'+
				  '<div class="uk-width-medium-1-2"><span> No hay productos registrados en esta categoria.</span> </div></div></div></div>');   
      				   }
		 
      }) .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
     	 .always(function(){ $("#esperarMostrarProductos").hide(); });				  
		                  //----------------------	
	  
   } //fin de la funcion
   
   function actualizarProducto2(id_detalle2){
		  		    			 
			    estatus = $("#estado"+id_detalle2).prop('checked');
			 emaildeUsuario="Flor@gmail.com";
			if(estatus){
		       estatus=1; 
			   $("#estadoProducto"+id_detalle2).text("Activo"); }
		    else{ estatus=0;
              $("#estadoProducto"+id_detalle2).text("Desactivado"); }		   
		  
		  $.ajax({ 
                   method: "POST",dataType: "json",
				   url: "./../../controllers/setUpdateTblproductoEstatus.php", 				  
				   data:{solicitadoBy:"WEB",idtblproducto:id_detalle2,
				   activado:estatus,emailmodifico:emaildeUsuario}})
                  .done(function(mg){					
                            if(parseInt(mg.success)==1){                             
                              UIkit.modal.alert('Estatus del Producto Modificado con &Eacute;xito'); 
							} else{
                              UIkit.modal.alert('Ocurrio un error, vuelva intentarlo');
                                 }     
								 }) 	  
                  .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
                 
			 
	} //fin de la funcion
   
   //--------------mostrar productos por categoria------------
   function mostrarPorIngrediente(){
			
		              var idcate = $("#SelectCategoria").val();
					   var iprov = $("#SelectProveedor").val();
					   var ingre = $("#SelectIngrediente").val();
					    
	   $.ajax({ 
              method: "POST",dataType: "json",
			  url: "./../../controllers/getAllTblProductosByProvAndCategIngrediente.php", 
		      data: {solicitadoBy:"WEB",idproveedor:iprov,idcategoria:idcate,ingre:ingre},
			   beforeSend: function(){
				   $('#esperarMostrarProductos').css('display','inline');}	
			  })			  
              .done(function(gh2){ 			  
					
			if(parseInt(gh2.success)==1){
				
				 $("#paraInicial").remove(); 					 
				 $("#tarjetaProducto").html(""); 
			 $.each(gh2.datos, function(g2,item) 
			 {  
					 nombreProveedor= item.tblproveedor_nombre;					
					 categoria= item.tblcategproduct_nombre;
					 productoNombre= item.tblproducto_nombre;
					 precio= item.tblproductdetalle_preciobepickler; 
					   
					  id_proveedor1 = item.idtblproveedor;
					      idprod2 = item.idtblproducto;
					         id_detalle2 = item.idtblproductdetalle;        
					 
				//-------------------------				                
								 $("#paraInicial").remove(); 
								 
				               $("#tarjetaProducto").append('<div class="md-card">'+
               '<div class="md-card-content">'+				
		       '<div class="uk-grid uk-grid-divider" data-uk-grid-margin>'+	
		       '<div class="uk-width-medium-1-2" >'+	
			   '<div class="uk-grid" id="parafoto'+gh2.datos[g2].idtblproductdetalle+'">'+              		 
		       '</div> </div>'+	
					'<div class="uk-width-medium-1-2">'+	
                       ' <div class="md-card-content">'+
                           '<ul class="md-list">'+
							   ' <li>'+
                                    '<div class="md-list-content">'+
                                       ' <span class="uk-text-small uk-text-muted">Proveedor</span>'+
                                       ' <span>'+nombreProveedor+'</span>'+
                                    '</div>'+
                                '</li> <li>'+								
                                    '<div class="md-list-content">'+
                               '<span class="uk-text-small uk-text-muted">Categor&iacute;a</span>'+
                                       ' <span>'+ categoria+ '</span>'+
                                    '</div> </li> <li>'+
                                   ' <div class="md-list-content">'+
                                     '<span class="uk-text-small uk-text-muted">Nombre del producto</span>'+
                                     '<span>'+ productoNombre +'</span>'+
                                   ' </div></li>'+
								    ' <li id="prod2'+g2+'">'+
                                   ' <div class="md-list-content">'+
                                     '<span class="uk-text-small uk-text-muted">Caracteristicas</span>'+                                    
                                   ' </div></li>'+ 
								   '<li>'+
                                   '<div class="md-list-content">'+
                                 '<span class="uk-text-small uk-text-muted">Precio</span>'+
                                    '<span>$<span>'+ precio +'</span> </span>'+
                                    '</div></li><li>'+
									
                                    '<div class="md-list-content">'+
							'<span class="uk-text-small uk-text-muted">Estatus</span>'+
							'<span>'+  
			'<input type="checkbox" id="estado'+id_detalle2+'"  onclick="actualizarProducto2('+id_detalle2+');" class="checkbox" name="checkbox" '+						                                                   
								       gh2.datos[g2].tblproductdetalle_activado +'/> '+ 
						 ' <span class="inline-label" id="estadoProducto'+id_detalle2+'"> </span>'+				  
                                 '</div> '+
								 
								 '</li> </ul>'+
                        '</div></div></div> </div> </div>'					
						
							   );
						
                                	     if(parseInt(gh2.datos[g2].tblproductdetalle_activado)!=0){
                                          $("#estado"+id_detalle2).prop("checked", true);
										  $("#estadoProducto"+id_detalle2).text("Activo");
                                           }
						                  else {
                                          $("#estado"+id_detalle2).prop("checked", false);
										   $("#estadoProducto"+id_detalle2).text("Desactivado");
                                            } 
				
                       iddetalleproducto2 = gh2.datos[g2].idtblproductdetalle.toString();
											 
											  $.ajax({//detalle de cada producto 
                                              method: "POST",  
                                              dataType: "json",  
                                              url: "./../../controllers/getTblproductoDetalle2.php",  
                                             data: {solicitadoBy:"WEB",idtblproductdetalle:iddetalleproducto2}})
                                             .done(function( msg5 ) {
         
        $.each(msg5.datos, function(i8,item5){
        if(msg5.datos[i8].tblproductdetalle_diametro!=null){
          $("#prod2"+g2).append('<span class="md-list-heading">'+
		  msg5.datos[i8].tblproductdetalle_diametro+' cm'+' --'+msg5.datos[i8].tblespecificingrediente_nombre+'</span><br/>');
		  
        }
        if(msg5.datos[i8].tblproductdetalle_largo!=null && msg5.datos[i8].tblproductdetalle_ancho!=null){
          $("#prod2"+g2).append('<span class="md-list-heading">'+
		  msg5.datos[i8].tblproductdetalle_largo+' cm x '+ msg5.datos[i8].tblproductdetalle_ancho+
		  ' cm '+'  --'+msg5.datos[i8].tblespecificingrediente_nombre+'</span><br/>');
        }
        if(msg5.datos[i8].tblproductdetalle_piezas!=null){
          $("#prod2"+g2).append('<span class="md-list-heading">'+msg5.datos[i8].tblproductdetalle_piezas+
		  ' piezas'+' --'+msg5.datos[i8].tblespecificingrediente_nombre+'</span><br/>');
                   }
		});  //cierre del each
    })
     .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);  })
				
                
		                       	//___________________________________			
			                     $.ajax({ 
                                 method: "POST",dataType: "json",
		                         url: "./../../controllers/getAllProductosImagByProveedor.php", 
		                         data: {solicitadoBy:"WEB",producto:idprod2,detalle:id_detalle2}})								 
                                 .done(function(ab2){
				                 if(parseInt(ab2.success)==1){
					            // console.log("funcion 2");
                                 imagen2=true;
                                 $.each(ab2.datos, function(x2,item)
				                 {	
								 
			 $("#parafoto"+gh2.datos[g2].idtblproductdetalle).append('<div class="uk-width-medium-1-2 uk-container-center">	'+	
			' <img id="tama" src="./../../assests_general/productos/linea/'+
	                  ab2.datos[x2].tblproductimg_srcimg +'" />  </div>');
                                  }); //fin del each
                           
                               } else { imagen2=false;} 
							  
	            }) .fail(function( jqXHR, textStatus ) { console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})	
			//-----------------
			
		}); //fin del each	
		                        
        //--------
		} else 
						{  
				  $("#paraInicial").remove();
				  $("#tarjetaProducto").html("");					
				  $("#tarjetaProducto").append(
				  '<div class="md-card"> <form class="uk-form"> <div class="md-card-content"> '+
				  '<div class="uk-grid uk-grid-divider" data-uk-grid-margin>'+
				  '<div class="uk-width-medium-1-2"><span> No hay productos registrados con este ingrediente.</span> </div></div></div></div>');   
      				   }
		 
      }) .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
     		.always(function(){ $("#esperarMostrarProductos").hide(); });			  
   } //fin de la funcion
    
  </script> 
</body>
</html>