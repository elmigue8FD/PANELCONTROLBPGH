<?php 
include('./php/seguridad_general.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  	<!--Empieza head-->
	  <?php
	  //Se toman todos los recursos y estilos para la pagína
	  include('./codigo_general_ecommerce/head_ecommerce.php'); 
	  ?>
		<!--Sliders-->
		<!--unico-->
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css"> 
    <!--CSS has tu pedido unico-->
    <link href="assets/css/Hastupedido.css" rel="stylesheet" type="text/css">     
		<!-- CSS para el hover de los productos unico-->
		<link rel="stylesheet" type="text/css" href="assets/css/hover.css">   
    <!--CSS Ranking stars stars.css unico-->
		<link rel="stylesheet" type="text/css" href="assets/css/stars.css"> 
		<!-- CSS pop-up-->
    <link href="assets/css/pop.css" type="text/css" rel="stylesheet">
		<style type="text/css">
		  #oculto{
		    visibility:hidden;
		  }
		</style>
  </head>
  <body>  
  
  	<!-- Empieza la parte de header y/o menu -->
    <?php
    //se toma los datos de header de la pagína
    include('./codigo_general_ecommerce/header_ecommerce.php');
    ?> 
  	<!-- Termina parte de header -->
 
 
 <!--//Menu de busqueda//-->
 
 <div class ="margenes">
  <section id="divisor">
  
  </section>
  <section id="divisor">
    </section>
  <section id="divisor">
    </section>
  <section id="divisor">
	
  </section>
 
  <!--Botones de top-->
  	<h1><?php //echo 'ciudad::'.$_SESSION['ciudad'].' tipoServicio::'.$_SESSION['tipoServicio'].' fecha::'.$_SESSION['fecha'].' hora::'.$_SESSION['hora']; ?></h1>
	<div id="izquierda" class="paneli-top">
	<!--cambiaVisibilidad-->
		<input id="pagina_btn_categoria_productos" class="myButton" type="button" value="Categoria" onclick="cambiaVisibilidad();">
		<input id="pagina_btn_marca_productos" class="myButton" type="button" value="Marca" onclick="cambiaVisibilidad();">
	 </div>
	<div id="derecha"  class="paneli-top">
	<!--input de busqueda search-->
     <input  class="search" type="text" placeholder="Busqueda" required></input>
	</div>
  
 <!--//Slider de categoria y marca//-->
<!--Carrusel para productos-->
<section id="mostrar" class="caja-slider"  > 
<!--id="top-slider-medidas"-->
	
		<div   id="top-slider-medidas" class="slider sliderMarcas"><!-- id="top-slider-medidas" data-slick='{"slidesToShow": 4, "slidesToScroll": 4}'-->
	</div>
</section>
 <!--Carrusel para las marcas-->
<section id="oculto"  class="caja-slider"> 
		<div id="top-slider-medidas" class="slider sliderCategorias" name="div_productosLinea_categorias"><!--data-slick='{"slidesToShow": 4, "slidesToScroll": 4}'-->
		
		</div>
</section>
 <!--termina seccion de slider  -->
 <!--//Seleccion de categori//-->
 <section id="divisor">
 </section>
 
 <section class="caja-lista">
<div class="listaopciones">
		<label>Tipo de Producto</label>
		<select id="select_filtro_tipoProducto"  class="filtro" name="selCombo" =1> 
        <option value="0" selected disabled>Seleccione una opcion</option>
        </select> 
	</div>
 </section>
 
 <!--->
 
  <!--//Lista de productos//-->
 
<!--slider-medidas-->
 <div class="etiquetas-conten">
	<label class="etiquetas">Nuevo</label>
 </div>  
  <!--Carrusel para las Productos-->
<div  id="slider-medidas">
	<section class="slider sliderPruductosNuevos" id="productosNuevo" > 
	</section>
</div>
 <!--termina seccion de slider  -->
 <!--slider-medidas-->
  <div class="etiquetas-conten">
	<label  class="etiquetas">Temporada</label>
 </div>
  
  <!--Carrusel para las Productos-->

<div  id="slider-medidas">
	<section class="slider sliderPruductosTemporada" id="productosTemporada"> 
	</section>
</div>

 <!--termina seccion de slider  -->
 <!--slider-medidas-->
  <div class="etiquetas-conten">
	<label class="etiquetas">Clásico</label>
 </div>
  <!--Carrusel para las Productos-->

<div  id="slider-medidas">
	<section class="slider sliderPruductosClasico" id="productosClasico" > 
	</section>
</div>
 <!--INICIO MIGUEL-->
<div class="modal fade" id="myModalMiguel" role="dialog">
  <div class="modal-dialog"> 
    <div class="modal-content">
      <div class="modal-header" id="headerPopup">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
	 			<label id="popup_model_titulo">Producto: Blue Cake2</label>
      </div>
      <div class="modal-body">
	      <div class="container-fluid">
	      	<div class="row">
	        	<div class="col-md-6">
		        	<div>
								<div class="tamaño-n">
									<div id="popup_producto_imggrande">
										<div  class="galeria-mostrar" id="show1">
											<img class="galeria-show" src="assets/img/fotografias-de-producto/2650299-390x320.png" alt=""/>
										</div>
										<div  class="galeria-mostrar" id="show2">
											<img class="galeria-show" src="assets/img/fotografias-de-producto/3150570-390x320.png" alt=""/>
										</div>
									</div>
									<ul class="galeria" id="popup_producto_imgmini">
										<li class="galeria-item"><a href="#show1"><img  src="assets/img/fotografias-de-producto/2650299-390x320.png" alt="" class="galeria-img"/></a></li>
										<li class="galeria-item"><a href="#show2"><img src="assets/img/fotografias-de-producto/3150570-390x320.png" alt="" class="galeria-img"/></a></li>
									</ul>
								  <div class="ec-stars-wrapper-popup">
										<a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
										<a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
										<a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
										<a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
										<a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
									</div>
								</div>
							</div>
	        	</div>
        		<div class="col-md-6">
        			<div>
						  	<p class="eti" id="popup_producto_titulo">Producto: Blue Cake2</p>
								<p class="et" id="popup_producto_descripcion">Descripci&oacuten: Cupcake de moras</p>
								<p class="et" id="popup_producto_ingredientes">Ingredientes: Chocolate, moras y chispas de colorIngredientes: Chocolate, moras y chispas de colorIngredientes: Chocolate, moras y chispas de color</p>
								<p class="et">Pasteleria:  
									<a href="#" data-toggle="modal" data-target="#myModalMiguelPasteleria" id="popup_producto_proveedor">la Torre del sabor</a>
								</p>
								<p class="et" id="popup_producto_stock">Stock: 0</p>
								<div id="popup_producto_size">
									<p class="etl">Diametro: </p>
									<select class="oet">
										<option >Pequeño</option>
										<option >Mediano</option>
										<option >Grande</option>
								  </select>
							  </div>
								<p class="et" id="popup_producto_porciones">Porciones: 6</p>
								<p class="et">Contenido Calorico: </p><p id="popup_producto_calorias">140 Kcal</p>
								<p class="et" id="popup_producto_precio">Precio: $150</p>		
								<div class="atext-box">
									<textarea id="popup_producto_textarea_tarjeta" class="caja-text-p" placeholder="1. Agregar una frase corta o dedicatoria sobre el pastel"></textarea >
									<textarea id="popup_producto_textarea_personalizar" class="caja-text-p" placeholder="2. Indicar si quieres cambiarel sabor de tu pedido"></textarea>
									<div id="popup_producto_div_btnadd">			
										<input id="btnp" class="myButton-anadir" type="button" value="Añadir">
									</div>
								</div>
							</div>
        		</div>
	        </div>
	      </div>
	        <!--fin contenido-->
      </div>
    </div>
  </div>
</div>
    <div class="modal fade" id="myModalMiguelPasteleria" role="dialog">
      <div class="modal-dialog">      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
			 			<!--inicio titulo-->
			 			la Torre del sabor
			 			<!--fin titulo-->
          </div>
          <div class="modal-body">
		        <!--Inicio contenido-->
		        <div class="container-fluid">
		        	<div class="row">
		        		<div class="col-md-6">
		        			<div class="imagen-marca">
										<img class="img-marca"  src="assets/img/marcas-pasteleria/la-torre-del-sabor.png">
									</div>
		        		</div>
		        		<div class="col-md-6">
		        			<div class="contenido-marca">
									  <p class="eti">Nombre: la Torre del sabor</p>
										<p class="et">Descripci&oacuten: la Torre del sabor</p>
										<p class="et">Direcci&oacuten: la Torre del sabor</p>
										<p class="et">Pasteleria: la Torre del sabor</p>
									  <div class="ec-stars-wrapper">
											<a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
											<a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
											<a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
											<a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
											<a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
										</div>
										<div class="form-group">
		                  <label>Comentarios:</label>
		                  <ul class="list-group borde-rosa" style="overflow: scroll;height: 250px; border: 1px solid #FF2A7F;">
		                    <li class="list-group-item"><h4>María 14/09/2016</h4> <p>Excelente servicio</p></li>
		                    <li class="list-group-item"><h4>Fernanda 10/09/2016</h4> <p>Muy Puntuales</p></li>
		                    <li class="list-group-item"><h4>Mario 8/09/2016</h4> <p>Delicioso</p></li>
		                    <li class="list-group-item"><h4>Mario 8/09/2016</h4> <p>Delicioso</p></li>
		                    <li class="list-group-item"><h4>Luis 1/09/2016</h4> <p>Excelente Precio</p></li>
		                  </ul>
		                </div>
									</div>
		        		</div>
		        	</div>
		        </div>
		        <!--fin contenido-->
          </div>
        </div>
      </div>
    </div>
 <!-- FIN MIGUEL--> 
 <!--termina seccion de slider  -->
 </div> 
  <!--=// inicia seccion de Footer //-->
<section id="mu-reservation">
  			<div class="footer-section">
				<div class="footercontainer">
                
					<div class="footer-grids wow bounceIn animated" data-wow-delay="0.4s">
						<div class="col-md-3 footer-grid">
						<h4>Legal</h4>
						<div class="border2"></div>
						  <a href="aviso_de_privacidad.html"><p>Aviso de Privacidad</p></a>
						  <a href="terminos_y_condiciones.html"><p>Términos y Condicines de Uso</p></a>
						</div>
						<div class="col-md-3 footer-grid tags">
								<h4>Acerca de Nosotros</h4>
								<div class="border2"></div>
							
                            
								<a href="quienes_somos.html"><p>¿Quiénes Somos?</p></a>
								<a href="unete_equipo.html"><p>Unete a nuestro Equipo</p></a>
								<a href="#"><p>¿Quiéres afiliar tu Negocio?</p></a>
								<a href="eventos.html"><p>Eventos - Noticias</p></a>
								<a href="blog.html"><p>Blog</p></a>
								
							
						</div>
						
						<div class="col-md-3 footer-grid flickr">
								<h4>Atención del Cliente</h4>
                                <div class="border2"></div>
								<div class="border2">
                                <a href="contacto.html"><p>Contacto</p></a>
                                <a href="faq.html"><p>FAQ</p></a>
                                <a href="facturacion.html"><p>Facturación Electrónica</p></a>
                                </div>
								<div class="flickr-grids">
										<div class="flickr-grid">
											<a href="#"><img src="assets/img/redes sociales/facebook-bepickler.png" alt=" " title="facebook" /></a>
										</div>
										<div class="flickr-grid">
											<a href="#"><img src="assets/img/redes sociales/instagram-bepickler.png" alt=" " title="insragram" /></a>
										</div>
										<div class="flickr-grid">
											<a href="#"><img src="assets/img/redes sociales/pinterest-bepickler.png" alt=" " title="Printeres" /></a>
										</div>
                                        <div class="flickr-grid">
											<a href="#"><img src="assets/img/redes sociales/spotify-bepickler.png"  alt=" " title="spotify" /></a>
										</div>
                                        
										<div class="clearfix"> </div>
										
										
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="clearfix"></div>
					
                    </div>
                  
			</div>
		</div>
     </seccion>   
       
	   
       <section id="footerbanners">
          <div class="bottomfooter">
          					<img id="footerpc" src="assets/img/footer/metodos-de-pago.png"/>
                    		<img id="footerresponsive" src="assets/img/footer/responsive/formas-de-pago-bpk-1600-200.jpg" />
                           
                    
         </div>
         </section>
         <section id="footerbanners">
         <div class="bottomfooter">
         					<img id="footerpc" src="assets/img/footer/mount-detech-group.png"/>
                            <img id="footerresponsive" src="assets/img/footer/responsive/mount-ditech-group.jpg" />
                            
         </div>
  	</section>
  
    
  <!--Termina seccionl de Footer -->
  
  <!--// jQuery library//-->
  
 <!--abre ventana secundaria despues del pop up--> 
  <script language=javascript> 
function ventanaSecundaria (URL){ 
   window.open(URL,"ventana1","width=550,height=555,scrollbars=NO,toolbar=no,status=no,location=no,menubar=no,directories=no,top=120,left=500") 
} 
</script>
  <!--js pop-up-->
  <!--cript src="assets/js/popups.js" type="text/javascript"></script>-->
	<!--  Slider -->
  <script src="assets/js/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script src="assets/js/slick.js" type="text/javascript" charset="utf-8"></script>
  <script src="assets/js/slick-rose.js" type="text/javascript"></script>
  <script src="assets/js/intercambio.js" type="text/javascript"></script>
  <!--INICIO MIGUEL JS-->
  <script src="assets/js/bootstrap.js"></script> 
  <!-- Date Picker -->
  <script type="text/javascript" src="assets/js/bootstrap-datepicker.js"></script> 
  <!--FIN MIGUEL-->
  <!--JavaScript Util-->
  <script type="text/javascript" src="./assets/js/util_mount.js"></script>
  <!--//COMIENZA JAVASCRIPT MIGUEL-->
 		<script type="text/javascript">
	   	//INCIO VARIABLES
	   	//producto->se formara el producto
	   	//FIN VARIABLES
	   	//INICIO DE FUNCIONES
	   	//ready() La pagina esta lista para cargar el script
	   	//Variables
	   	//ciudad="<?php //echo $_SESSION['ciudad']; ?>";
	   	pais="<?php echo (isset($_SESSION['pais'])) ?  $_SESSION['pais'] :  ''; ?>";
	   	ciudad="<?php echo (isset($_SESSION['ciudad'])) ?  $_SESSION['ciudad'] :  ''; ?>";
	   	colonia="<?php echo (isset($_SESSION['colonia'])) ?  $_SESSION['colonia'] :  ''; ?>";
	   	//tipoServicio="<?php //echo $_SESSION['tipoServicio']; ?>";
	   	tipoServicio="<?php echo (isset($_SESSION['tipoServicio'])) ?  $_SESSION['tipoServicio'] :  ''; ?>";
	   	//fecha="<?php //echo $_SESSION['fecha']; ?>";
	   	fecha="<?php echo (isset($_SESSION['fecha'])) ?  $_SESSION['fecha'] :  ''; ?>";
	   	//hora="<?php //echo $_SESSION['hora']; ?>";
	   	hora="<?php echo (isset($_SESSION['hora'])) ?  $_SESSION['hora'] :  ''; ?>";
	   	//diferenciaDias="<?php //echo $_SESSION['diferenciaDias']; ?>";
	   	diferenciaDias="<?php echo (isset($_SESSION['diferenciaDias'])) ?  $_SESSION['diferenciaDias'] :  ''; ?>";
	   	diasemana="<?php echo (isset($_SESSION['diasemana'])) ?  $_SESSION['diasemana'] :  ''; ?>";	   	
	   	colonia="<?php echo (isset($_SESSION['colonia'])) ?  $_SESSION['colonia'] :  ''; ?>";
	   	idtblordencompra="<?php echo (isset($_SESSION['idtblordencompra'])) ?  $_SESSION['idtblordencompra'] :  ''; ?>";
	   	arregloNuevos= new Array();
          arregloTemporada=new Array();
          arregloClasicos=new Array();
          arregloProductoinfo = new Array();

	   	console.log('pais::'+pais+' ciudad::'+ciudad+' tipoServicio::'+tipoServicio+' fecha::'+fecha+' hora::'+hora+' diferenciaDias::'+diferenciaDias+' colonia::'+colonia+' idtblordencompra::'+idtblordencompra+' diasemana::'+diasemana);
	   	//Fin Variables
 	    $( window ).ready(function()
      {
        //console.log('archivo listo');
        cargarDatosDefault();
       	cargarListenerDafault();
      });
      function cargarDatosDefault(){
      	producto='';
      	incremental=0;
      	//CARGAMO SLIDER LAS CATEGORIAS DE LOS PRODUCTOS
      	funcion_cargar_filtro_marcacategoria();
      	
      	//CARGAMO SELECT INGREDIENTE ESPECIAL
      	funcion_cargar_filtro_ingrediente();
      	//CARGANDO PRODUCTOS DEFAULT
      	funcion_cargar_productos();

      	//CARGAMO SLIDER PRODUCTOS NUEVOS
      	funcion_cargar_productosnuevos();
      	
      	//CARGAMO SLIDER PRODUCTOS TEMPORADA
      	funcion_cargar_productostemporada();
      	
      	//CARGAMO SLIDER PRODUCTOS CLASICO
      	funcion_cargar_productosclasicos();

      	//CARGAMOS HEADER CARRITO
      	cargarCarritoSuperior();
      	  
      }
    function funcion_cargar_filtro_marcacategoria()
    {
    	//CARGAMO SLIDER LAS CATEGORIAS DE LOS PRODUCTOS
    	//DOMICLIO 
      	//$.ajax({  method: "POST", dataType: "json",  url: "./../../controllers/getAllTblcategproductAct.php",  data: {solicitadoBy:"WEB"}  })
      	$.ajax({  method: "POST",  dataType: "json", url: "./../../controllers/MgetAllTblcategproductByTblproducto.php",  data: {solicitadoBy:"WEB",idtblpais:pais,idtblciudad:ciudad,idtblcolonia:colonia,idtbltiposervicio:tipoServicio,idtblhora:hora,diaselaboracion:diferenciaDias,idtblsemana:diasemana}  })
        .done(function( msgGetAllTblcategproductByTblproducto ) {
        	//console.log(msgGetAllTblcategproductByTblproducto);
          //console.log('resultado::'+JSON.stringify(msgGetAllTblcategproductByTblproducto, null, 4));  
          if(msgGetAllTblcategproductByTblproducto.success>0)      
          { 
	          $.each(msgGetAllTblcategproductByTblproducto.datos, function(i,item){
	          	var id='';
	          	var img='';
	          	var nombre='';
	          	id=msgGetAllTblcategproductByTblproducto.datos[i].idtblcategproduct;
	          	img=msgGetAllTblcategproductByTblproducto.datos[i].tblcategproduct_srcimg;
	          	nombre=msgGetAllTblcategproductByTblproducto.datos[i].tblcategproduct_nombre;
	          	//console.log('tblcategproduct_srcimg::'+msgGetAllTblcategproductByTblproducto.datos[i].tblcategproduct_srcimg);
	          	//   $(".regular") $( "input[name='section_div_ProductosLinea_Categorias']" ).
	          	//   
	           	$('.sliderCategorias').append('<div id="div_categoria_'+id+'"> <span id="categoria_span_select_id_'+id+'" name="categoria_span_select_name" class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> 	<img  src="assets/img/categorias-de-producto/'+img+'" id="img_categoria'+id+'" name="'+id+'"/>'+'<label class="etiquetassli">'+nombre+'</label>	</div>');     
          	});
        	}else
        	{
        		console.log('no encotro categorias');
        	}
          
	        $("span[name=categoria_span_select_name]").hide();
	        loadSlideCategoria();
	        //CARGAMO SLIDER  LAS MARCAS  
	        //
	      	//$.ajax({  method: "POST", dataType: "json", url: "./../../controllers/getAllTblproveedoraAct.php",  data: {solicitadoBy:"WEB"}  })
	      	$.ajax({  method: "POST", dataType: "json", url: "./../../controllers/MgetAllTblproveedorByTblproducto.php",  data: {solicitadoBy:"WEB",idtblciudad:ciudad,idtbltiposervicio:tipoServicio,diaselaboracion:diferenciaDias,idtblcolonia:colonia}  })
	        .done(function( msgGetAllTblproveedorByTblproducto ) {
	          //console.log('2 resultado::'+JSON.stringify(msgGetAllTblproveedoraAct, null, 4));
	          if(msgGetAllTblproveedorByTblproducto.success>0)      
          	{                     
		          $.each(msgGetAllTblproveedorByTblproducto.datos, function(i,item){ 
		          	//console.log('tblcategproduct_srcimg::'+msgGetAllTblproveedorByTblproducto.datos[i].tblcategproduct_srcimg);
		           $(".sliderMarcas").append('<div>	<img  src="./../assests_general/proveedor/logoProveedor/'+msgGetAllTblproveedorByTblproducto.datos[i].tblproveedor_srclogo+'"/>'+'<label class="etiquetassli">'+msgGetAllTblproveedorByTblproducto.datos[i].tblproveedor_nombre+'</label>	</div>');           
		          });
		          loadSlideMarcas();
	        	}else
        		{
        			console.log('no encotro categorias');
        		}
	          
	        })
	        .fail(function( jqXHR, textStatus ) {  console.log("1 fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
	        .always(function(){  /*console.log("always");*/  	});
        })
        .fail(function( jqXHR, textStatus ) {  console.log("2 fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
        .always(function(){  /*console.log("always");*/
      	});
    	}
    	function funcion_cargar_filtro_ingrediente()
    	{
    		//CARGAMO SELECT INGREDIENTE ESPECIAL
      	$.ajax({  method: "POST", dataType: "json",  url: "./../../controllers/getAllTblespecificingrediente.php",  data: {solicitadoBy:"WEB"}  })
        .done(function( msgGetAllTblespecificingrediente ) {
          //console.log('resultado::'+JSON.stringify(msgGetAllTblespecificingrediente, null, 4));                    
          
          $.each(msgGetAllTblespecificingrediente.datos, function(i,item){ 
          	//console.log('tblcategproduct_srcimg::'+msgGetAllTblproveedoraAct.datos[i].tblcategproduct_srcimg);
           $("#select_filtro_tipoProducto").append('<option value="'+msgGetAllTblespecificingrediente.datos[i].idtblespecificingrediente+'">'+msgGetAllTblespecificingrediente.datos[i].tblespecificingrediente_nombre+'</option>');           
          });
          
        })
        .fail(function( jqXHR, textStatus ) {  console.log("3 fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
        .always(function(){  /*console.log("always");*/
      	}); 
    	}
    	function funcion_cargar_productos()
    	{
    		/*
diaselaboracion
idtblpais
idtblciudad
idtblcolonia
idtbltiposervicio
    		 */
    		console.log('diferenciaDias::'+diferenciaDias+' idtblpais::'+pais+' ciudad::'+ciudad+' tipoServicio::'+tipoServicio);
    		//CARGAR PRODUCTOS
    		//dataType: "json",
      	$.ajax({  method: "POST", dataType: "json",  url: "./../../controllers/MgetAllTblproducto.php",  data: {solicitadoBy:"WEB",idtblpais:pais,idtblciudad:ciudad,idtblcolonia:colonia,idtbltiposervicio:tipoServicio,hora:hora,diaselaboracion:diferenciaDias,idtblsemana:diasemana}  })
        .done(function( msgGetAllTblproducto ) {
        	//console.log('msgGetAllTblproducto::'+msgGetAllTblproducto);
          //console.log('msgGetAllTblproducto Resultado::'+JSON.stringify(msgGetAllTblproducto, null, 4));          
          if(msgGetAllTblproducto.success>0)      
        	{
	         	$.each(msgGetAllTblproducto.datos, function(i,item){
	         		//console.log('i:'+i+' item::'+JSON.stringify(item,null,4));
	         		idtblproducto=msgGetAllTblproducto.datos[i].idtblproducto;
	         		arregloProductoinfo.push({idtblproducto:idtblproducto,objetojson:item});
	         		//console.log(arregloProductoinfo.length+' '+arregloProductoinfo[i].idtblproducto+' '+arregloProductoinfo[i].objetojson);
	         		if(msgGetAllTblproducto.datos[i].tblclasifproduct_idtblclasifproduct=="1")
	         		{
			          	//console.log('tblcategproduct_srcimg::'+msgGetAllTblproveedoraAct.datos[i].tblcategproduct_srcimg);
			          	idtblproducto=msgGetAllTblproducto.datos[i].idtblproducto;
			          	calificacion=msgGetAllTblproducto.datos[i].tblproducto_promcalificacion;
			          	producto='<div>	<div class="agregar-caja">	<img class="agregar" id="imgagregar" src="assets/img/iconos-especiales/boton-de-mas_06.png" onclick="popup_icono_add_producto('+i+');"/>	</div>	<div id="contenedor" class="contenedor">	<div  id="imagenProducto'+idtblproducto+'" class="imagen" >	<a href="#" data-toggle="modal" data-target="#myModalMiguel" onclick="popup_producto('+i+');">';
			          	producto+='<img src="./../assests_general/productos/linea/'+msgGetAllTblproducto.datos[i].tblproductimg_srcimg+'"/></a>	</div>	<div class="info">';
			          	producto+='<div class="ec-stars-wrapper">';
			          	//pintamos de rosa y gris segun la calificacion
			          	for(incremental=1;incremental<=calificacion;incremental++)
			          		producto+='<a href="#" data-value="'+incremental+'" title="Votar con '+incremental+' estrellas" style="color:#FF4D78">&#9733;</a>';
			          	for(incremental=5;incremental>calificacion;incremental--)
			          	{
			          		producto+='<a href="#" data-value="'+incremental+'" title="Votar con '+incremental+' estrellas">&#9733;</a>';          	

			          	}
			           	$("#productosNuevo").append(producto+'</div>	<noscript>Necesitas tener habilitado javascript para poder votar</noscript>	<p class="titulo">'+msgGetAllTblproducto.datos[i].tblproducto_nombre+'</p>	<p class="adicional">'+msgGetAllTblproducto.datos[i].tblproductdetalle_preciobepickler+'</p>	</div>	</div>	</div>');
	         		}else if(msgGetAllTblproducto.datos[i].tblclasifproduct_idtblclasifproduct=="2")
	         		{
	         			//console.log('tblcategproduct_srcimg::'+msgGetAllTblproveedoraAct.datos[i].tblcategproduct_srcimg);
		         		idtblproducto=msgGetAllTblproducto.datos[i].idtblproducto;
			          	calificacion=msgGetAllTblproducto.datos[i].tblproducto_promcalificacion;
			          	producto='<div>	<div class="agregar-caja">	<img class="agregar" id="imgagregar" src="assets/img/iconos-especiales/boton-de-mas_06.png" onclick="popup_icono_add_producto('+i+');"/>	</div>	<div id="contenedor" class="contenedor">	<div  id="imagenProducto'+idtblproducto+'" class="imagen">	<a href="#" data-toggle="modal" data-target="#myModalMiguel" onclick="popup_producto('+i+');">';
			          	producto+='<img src="./../assests_general/productos/linea/'+msgGetAllTblproducto.datos[i].tblproductimg_srcimg+'"/></a>	</div>	<div class="info">';
			          	producto+='<div class="ec-stars-wrapper">';
			          	//pintamos de rosa y gris segun la calificacion
			          	for(incremental=1;incremental<=calificacion;incremental++)
			          		producto+='<a href="#" data-value="'+incremental+'" title="Votar con '+incremental+' estrellas" style="color:#FF4D78">&#9733;</a>';
			          	for(incremental=5;incremental>calificacion;incremental--)
			          		producto+='<a href="#" data-value="'+incremental+'" title="Votar con '+incremental+' estrellas">&#9733;</a>';          	
			           $("#productosClasico").append(producto+'</div>	<noscript>Necesitas tener habilitado javascript para poder votar</noscript>	<p class="titulo">'+msgGetAllTblproducto.datos[i].tblproducto_nombre+'</p>	<p class="adicional">'+msgGetAllTblproducto.datos[i].tblproductdetalle_preciobepickler+'</p>	</div>	</div>	</div>');
	         		}else if(msgGetAllTblproducto.datos[i].tblclasifproduct_idtblclasifproduct=="3")
	         		{
	         			//console.log('tblcategproduct_srcimg::'+msgGetAllTblproveedoraAct.datos[i].tblcategproduct_srcimg);
		         		idtblproducto=msgGetAllTblproducto.datos[i].idtblproducto;
			          	calificacion=msgGetAllTblproducto.datos[i].tblproducto_promcalificacion;
			          	producto='<div>	<div class="agregar-caja">	<img class="agregar" id="imgagregar" src="assets/img/iconos-especiales/boton-de-mas_06.png" onclick="popup_icono_add_producto('+i+');"/>	</div>	<div id="contenedor" class="contenedor">	<div  id="imagenProducto'+idtblproducto+'" class="imagen">	<a href="#" data-toggle="modal" data-target="#myModalMiguel" onclick="popup_producto('+i+');">';
			          	producto+='<img src="./../assests_general/productos/linea/'+msgGetAllTblproducto.datos[i].tblproductimg_srcimg+'"/></a>	</div>	<div class="info">';
			          	producto+='<div class="ec-stars-wrapper">';
			          	//pintamos de rosa y gris segun la calificacion
			          	for(incremental=1;incremental<=calificacion;incremental++)
			          		producto+='<a href="#" data-value="'+incremental+'" title="Votar con '+incremental+' estrellas" style="color:#FF4D78">&#9733;</a>';
			          	for(incremental=5;incremental>calificacion;incremental--)
			          		producto+='<a href="#" data-value="'+incremental+'" title="Votar con '+incremental+' estrellas">&#9733;</a>';          	
			           	$("#productosTemporada").append(producto+'</div>	<noscript>Necesitas tener habilitado javascript para poder votar</noscript>	<p class="titulo">'+msgGetAllTblproducto.datos[i].tblproducto_nombre+'</p>	<p class="adicional">'+msgGetAllTblproducto.datos[i].tblproductdetalle_preciobepickler+'</p>	</div>	</div>	</div>');
	         		}
	          });
	          loadlSlideProductosNuevos();
	          loadlSlideProductosClasico();
	          loadlSlideProductosTemporada();
	          /*
	          $.each(arregloProductoinfo, function (key, data) {
						    console.log(key);
						    $.each(data, function (index, data) {
						        console.log('index', data);
						        if(data % 1 == 0)
						        {
							        $.ajax({  method: "POST",  dataType: "json", url: "./../../controllers/getTblproductImgByTblproducto.php",  data: {solicitadoBy:"WEB",idtblproduct:data}  })
							        .done(function( getTblproductImgByTblproducto ) {
							        	//console.log('getTblproductImgByTblproducto::'+getTblproductImgByTblproducto);
							        	//console.log('getTblproductImgByTblproducto::'+JSON.stringify(getTblproductImgByTblproducto,null,4));
							        	if(getTblproductImgByTblproducto.success>0)      
        								{
        									$.each(getTblproductImgByTblproducto.datos, function(i,item){

        										idtblproducto=getTblproductImgByTblproducto.datos[i].tblproducto_idtblproducto;
        										console.log('idtblproducto::'+idtblproducto);
	         									//arregloProductoImg.push({idtblproducto:idtblproducto,objetojson:item});
        									});
        								}
							        })
							        .fail(function( jqXHR, textStatus ) {  console.log("4 fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
							        .always(function(){ return false; 	});
						      	}
						      	else
						      	{
						      		 return false;
						      	}
						        
						    })
						})*/
	          /*
	          $.each(arregloProductoinfo, function(arregloProductoinfo,idtblproducto) {
            	console.log(arregloProductoinfo.idtblproducto);
            });
            */
	          //console.log(JSON.stringify(arregloProductoinfo, null, 4));
	          /*
		      	$.ajax({  method: "POST",  dataType: "json", url: "./../../controllers/MgetAllTblproducto.php",  data: {solicitadoBy:"WEB",idtblpais:pais,idtblciudad:ciudad,idtblcolonia:colonia,idtbltiposervicio:tipoServicio,hora:hora,diaselaboracion:diferenciaDias,idtblsemana:diasemana}  })
		        .done(function( msgGetAllTblproducto ) {
		        })
		        .fail(function( jqXHR, textStatus ) {  console.log("4 fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
		        .always(function(){  	});
		        */

          }else
        	{
        		console.log('no encotro produtos');
        	} 
        })
        .fail(function( jqXHR, textStatus ) {  console.log("4 fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
        .always(function(){  /*console.log("always");*/
      	});

    	}

    	function funcion_cargar_productosnuevos()
    	{
    		//CARGAMO SLIDER PRODUCTOS NUEVOS
      	$.ajax({  method: "POST", dataType: "json",  url: "./../../controllers/getAllTblproductoActAllDataByTblclasifproduct.php",  data: {solicitadoBy:"WEB", clasifproduct:1}  })
        .done(function( msgGetAllTblproductoActAllDataByTblclasifproduct ) {
          //console.log('msgGetAllTblproductoActAllData Resultado::'+JSON.stringify(msgGetAllTblproductoActAllDataByTblclasifproduct, null, 4));
         	$.each(msgGetAllTblproductoActAllDataByTblclasifproduct.datos, function(i,item){ 
          	//console.log('tblcategproduct_srcimg::'+msgGetAllTblproveedoraAct.datos[i].tblcategproduct_srcimg);
          	idtblproducto=msgGetAllTblproductoActAllDataByTblclasifproduct.datos[i].idtblproducto;
          	calificacion=msgGetAllTblproductoActAllDataByTblclasifproduct.datos[i].tblproducto_promcalificacion;
          	producto='<div>	<div class="agregar-caja">	<img class="agregar" id="imgagregar" src="assets/img/iconos-especiales/boton-de-mas_06.png"/>	</div>	<div id="contenedor" class="contenedor">	<div  id="imagenProducto'+idtblproducto+'" class="imagen">	<a href="#" data-toggle="modal" data-target="#myModalMiguel">';
          	producto+='<img src="./../assests_general/productos/linea/'+msgGetAllTblproductoActAllDataByTblclasifproduct.datos[i].tblproductimg_srcimg+'"/></a>	</div>	<div class="info">';
          	producto+='<div class="ec-stars-wrapper">';
          	//pintamos de rosa y gris segun la calificacion
          	for(incremental=1;incremental<=calificacion;incremental++)
          		producto+='<a href="#" data-value="'+incremental+'" title="Votar con '+incremental+' estrellas" style="color:#FF4D78">&#9733;</a>';
          	for(incremental=5;incremental>calificacion;incremental--)
          		producto+='<a href="#" data-value="'+incremental+'" title="Votar con '+incremental+' estrellas">&#9733;</a>';          	
           //$("#productosNuevo").append(producto+'</div>	<noscript>Necesitas tener habilitado javascript para poder votar</noscript>	<p class="titulo">'+msgGetAllTblproductoActAllDataByTblclasifproduct.datos[i].tblproducto_nombre+'</p>	<p class="adicional">'+msgGetAllTblproductoActAllDataByTblclasifproduct.datos[i].tblproductdetalle_preciobepickler+'</p>	</div>	</div>	</div>');           
          });
          //loadlSlideProductosNuevos();     
        })
        .fail(function( jqXHR, textStatus ) {  console.log("4 fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
        .always(function(){  /*console.log("always");*/
      	});
    	}

    	function funcion_cargar_productostemporada()
    	{
    		//CARGAMO SLIDER PRODUCTOS TEMPORADA
      	$.ajax({  method: "POST", dataType: "json",  url: "./../../controllers/getAllTblproductoActAllDataByTblclasifproduct.php",  data: {solicitadoBy:"WEB", clasifproduct:2}  })
        .done(function( msgGetAllTblproductoActAllData ) {
          //console.log('resultado::'+JSON.stringify(msgGetAllTblproductoActAllData, null, 4));
         	$.each(msgGetAllTblproductoActAllData.datos, function(i,item){ 
          	//console.log('tblcategproduct_srcimg::'+msgGetAllTblproveedoraAct.datos[i].tblcategproduct_srcimg);
          	calificacion=msgGetAllTblproductoActAllData.datos[i].tblproducto_promcalificacion;
          	producto='<div>	<div class="agregar-caja">	<img class="agregar" id="imgagregar" src="assets/img/iconos-especiales/boton-de-mas_06.png"/>	</div>	<div id="contenedor" class="contenedor">	<div  id="imagen" class="imagen">	<a href="#" data-toggle="modal" data-target="#myModalMiguel">';
          	producto+='<img src="./../assests_general/productos/linea/'+msgGetAllTblproductoActAllData.datos[i].tblproductimg_srcimg+'"/></a>	</div>	<div class="info">';
          	producto+='<div class="ec-stars-wrapper">';
          	//pintamos de rosa y gris segun la calificacion
          	for(incremental=1;incremental<=calificacion;incremental++)
          		producto+='<a href="#" data-value="'+incremental+'" title="Votar con '+incremental+' estrellas" style="color:#FF4D78">&#9733;</a>';
          	for(incremental=5;incremental>calificacion;incremental--)
          		producto+='<a href="#" data-value="'+incremental+'" title="Votar con '+incremental+' estrellas">&#9733;</a>';          	
           //$("#productosTemporada").append(producto+'</div>	<noscript>Necesitas tener habilitado javascript para poder votar</noscript>	<p class="titulo">'+msgGetAllTblproductoActAllData.datos[i].tblproducto_nombre+'</p>	<p class="adicional">'+msgGetAllTblproductoActAllData.datos[i].tblproductdetalle_preciobepickler+'</p>	</div>	</div>	</div>');           
          });
          //loadlSlideProductosTemporada();     
        })
        .fail(function( jqXHR, textStatus ) {  console.log("5 fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
        .always(function(){  /*console.log("always");*/
      	});
    	}
    	function funcion_cargar_productosclasicos()
    	{
    		//CARGAMO SLIDER PRODUCTOS CLASICO
      	$.ajax({  method: "POST", dataType: "json",  url: "./../../controllers/getAllTblproductoActAllDataByTblclasifproduct.php",  data: {solicitadoBy:"WEB", clasifproduct:3}  })
        .done(function( msgGetAllTblproductoActAllData ) {
          //console.log('resultado::'+JSON.stringify(msgGetAllTblproductoActAllData, null, 4));
         	$.each(msgGetAllTblproductoActAllData.datos, function(i,item){ 
          	//console.log('tblcategproduct_srcimg::'+msgGetAllTblproveedoraAct.datos[i].tblcategproduct_srcimg);
          	calificacion=msgGetAllTblproductoActAllData.datos[i].tblproducto_promcalificacion;
          	producto='<div>	<div class="agregar-caja">	<img class="agregar" id="imgagregar" src="assets/img/iconos-especiales/boton-de-mas_06.png"/>	</div>	<div id="contenedor" class="contenedor">	<div  id="imagen" class="imagen">	<a href="#" data-toggle="modal" data-target="#myModalMiguel">';
          	producto+='<img src="./../assests_general/productos/linea/'+msgGetAllTblproductoActAllData.datos[i].tblproductimg_srcimg+'"/></a>	</div>	<div class="info">';
          	producto+='<div class="ec-stars-wrapper">';
          	//pintamos de rosa y gris segun la calificacion
          	for(incremental=1;incremental<=calificacion;incremental++)
          		producto+='<a href="#" data-value="'+incremental+'" title="Votar con '+incremental+' estrellas" style="color:#FF4D78">&#9733;</a>';
          	for(incremental=5;incremental>calificacion;incremental--)
          		producto+='<a href="#" data-value="'+incremental+'" title="Votar con '+incremental+' estrellas">&#9733;</a>';          	
           //$("#productosClasico").append(producto+'</div>	<noscript>Necesitas tener habilitado javascript para poder votar</noscript>	<p class="titulo">'+msgGetAllTblproductoActAllData.datos[i].tblproducto_nombre+'</p>	<p class="adicional">'+msgGetAllTblproductoActAllData.datos[i].tblproductdetalle_preciobepickler+'</p>	</div>	</div>	</div>');           
          });
          //loadlSlideProductosClasico();     
        })
        .fail(function( jqXHR, textStatus ) {  console.log("6 fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
        .always(function(){  /*console.log("always");*/
      	});  
    	}
      function funcion_filtro1_marcacategoria()
      {
      	console.log('ocultar campos de marcas')
      	/*
      	$('#oculto').css('visibility','hidden');
      	$('#mostrar').css('visibility','visible');
		*/
      	$('#oculto').css('display','none');
      	$('#mostrar').css('display','block');
      	lister_filtro1();
      }
      function lister_filtro1()
      {
      	$('#pagina_btn_marca_productos').click(function(){
      		/*
      		$('#oculto').css('visibility','visible');
      		$('#mostrar').css('visibility','hidden');
			*/
      		$('#oculto').css('display','block');
      		$('#mostrar').css('display','none');
      		loadSlideMarcas();
      	})
      	$('#pagina_btn_categoria_productos').click(function(){
      		/*
      		$('#oculto').css('visibility','hidden');
      		$('#mostrar').css('visibility','visible');
			*/
      		$('#oculto').css('display','none');
      		$('#mostrar').css('display','block');
      	})
      	
      }
      function loadSlideCategoria()
      {
      	$(".sliderCategorias").slick({
		        dots: true,
		        infinite: true,
		        slidesToShow: 4,
		        slidesToScroll: 4
		      });
      }
      function loadSlideMarcas()
      {
      	$(".sliderMarcas").slick({
		        dots: true,
		        infinite: true,
		        slidesToShow: 4,
		        slidesToScroll: 4
		      });
      	//funcion_filtro1_marcacategoria();
      }
      function loadlSlideProductosNuevos()
      {
      	
      	$(".sliderPruductosNuevos").slick({
		        dots: true,
		        infinite: true,
		        slidesToShow: 3,
		        slidesToScroll: 3
		      });
      }
      function loadlSlideProductosTemporada()
      {
      	$(".sliderPruductosTemporada").slick({
		        dots: true,
		        infinite: true,
		        slidesToShow: 3,
		        slidesToScroll: 3
		      });
      }
      function loadlSlideProductosClasico()
      {
      	$(".sliderPruductosClasico").slick({
		        dots: true,
		        infinite: true,
		        slidesToShow: 3,
		        slidesToScroll: 3
		      });
      }
      function cargarListenerDafault()
      {
      	$('#myModalMiguel').on('loaded.bs.modal', function (e) {
				console.log('cargar datos del producto');
				});
				$('div[name=div_productosLinea_categorias]').click(function(e){
					var idImgAll="img_categoria";
					var id = e.target.id;
					id=id.replace(idImgAll, '');
				 	console.log('id detect::'+id);
				 	var span="#categoria_span_select_id_"+id;
				 	console.log('id::'+span)
				 	//$('#div_categoria_'+id).css("background-color", "#de5667");
				 	$("span[name=categoria_span_select_name]").hide();
				 	$(span).show();
				 	filtrarPorCategoria(id);
				});
				/*
				//boton de añadir en popup
				$('div[name=div_productosLinea_categorias]').click(function(e){
					var idImgAll="img_categoria";
					var id = e.target.id;
					id=id.replace(idImgAll, '');
				 	console.log('id detect::'+id);
				 	var span="#categoria_span_select_id_"+id;
				 	console.log('id::'+span)
				 	//$('#div_categoria_'+id).css("background-color", "#de5667");
				 	$("span[name=categoria_span_select_name]").hide();
				 	$(span).show();
				 	filtrarPorCategoria(id);
				});
				cargarListenerDafault
				*/
      }
      function filtrarPorCategoria(id)
      {
      	console.log('entro a filtrarPorCategoria id::'+id);
      	//limpiar los sliders 
      	console.log('boorando los contenido de slider');
      	$('#productosNuevo').empty();
      	$('#productosClasico').empty();
      	$('#productosTemporada').empty();
      	//obtener los datos de la consulta tipo de producto de esta categoria si tiene productos
      	
      	//mostrar los tipo de producto
      	//obtener los datos de la consulta de productos por la categoria
      	//mostrar los productos
      	
      }
      function popup_producto(id)
      {     	
      	//	arregloProductoinfo[i].idtblproducto
      	//alert(arregloProductoinfo[id].idtblproducto);
      	//console.log(JSON.stringify(arregloProductoinfo[id].objetojson, null, 4));
      	//console.log(arregloProductoinfo[id].objetojson.tblproducto_nombre);
      	idtblproducto=arregloProductoinfo[id].idtblproducto;
      	$('#popup_model_titulo').empty();
      	$('#popup_producto_titulo').empty();
      	$('#popup_producto_descripcion').empty();
      	$('#popup_producto_ingredientes').empty();
      	$('#popup_producto_proveedor').empty();
      	$('#popup_producto_stock').empty();
      	$('#popup_producto_size').empty();      	
      	$('#popup_producto_porciones').empty();
      	$('#popup_producto_calorias').empty();
      	$('#popup_producto_precio').empty();
      	$('#popup_producto_imggrande').empty();
      	$('#popup_producto_imgmini').empty();
			  $('#popup_producto_div_btnadd').empty();
			           	

      	if(idtblproducto>0)
	      {
	      	$.ajax({  method: "POST",  dataType: "json", url: "./../../controllers/getTblproductImgByTblproducto.php",  data: {solicitadoBy:"WEB",idtblproduct:idtblproducto}  })
	      	.done(function( getTblproductImgByTblproducto ) {
	      		//console.log(JSON.stringify(getTblproductImgByTblproducto, null, 4));
						if(getTblproductImgByTblproducto.success>0)      
						{
							contador=1;
							$.each(getTblproductImgByTblproducto.datos, function(i,item){
								idtblproducto=getTblproductImgByTblproducto.datos[i].tblproducto_idtblproducto;
								//console.log('idtblproducto::'+idtblproducto+' contador::'+contador);
								$('#popup_producto_imggrande').append('<div  class="galeria-mostrar" id="show'+contador+'"><img class="galeria-show" src="./../assests_general/productos/linea/'+getTblproductImgByTblproducto.datos[i].tblproductimg_srcimg+'" alt=""/></div>');
								$('#popup_producto_imgmini').append('<li class="galeria-item"><a href="#show'+contador+'"><img  src="./../assests_general/productos/linea/'+getTblproductImgByTblproducto.datos[i].tblproductimg_srcimg+'" alt="" class="galeria-img"/></a></li>');
								contador++;
		       		});
						}
					})
	      	.fail(function( jqXHR, textStatus ) {  console.log("4 fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
	      	.always(function(){ 	});
      	}

      	$('#popup_model_titulo').append(arregloProductoinfo[id].objetojson.tblproducto_nombre);
      	$('#popup_producto_titulo').append('Producto: '+arregloProductoinfo[id].objetojson.tblproducto_nombre);
      	$('#popup_producto_descripcion').append('Descripci&oacuten: '+arregloProductoinfo[id].objetojson.tblproducto_descripcion);
      	$('#popup_producto_ingredientes').append('Ingredientes: '+arregloProductoinfo[id].objetojson.tblproducto_ingredientes);
      	$('#popup_producto_proveedor').append(arregloProductoinfo[id].objetojson.tblproveedor_nombre);
      	$('#popup_producto_stock').append('Stock: '+arregloProductoinfo[id].objetojson.tblproductdetalle_stock);
      	$('#popup_producto_porciones').append('Porciones: '+arregloProductoinfo[id].objetojson.tblproductdetalle_porciones);
      	$('#popup_producto_calorias').append(arregloProductoinfo[id].objetojson.tblproductdetalle_calorias+' Kcal');
      	$('#popup_producto_precio').append('Precio: $'+arregloProductoinfo[id].objetojson.tblproductdetalle_preciobepickler);
      	diametro=arregloProductoinfo[id].objetojson.tblproductdetalle_diametro;
      	largo=arregloProductoinfo[id].objetojson.tblproductdetalle_largo;
      	ancho=arregloProductoinfo[id].objetojson.tblproductdetalle_ancho;
      	piezas=arregloProductoinfo[id].objetojson.tblproductdetalle_piezas;
				if(diametro!=null && diametro!='')
				{
					$('#popup_producto_size').append('Diametro: '+arregloProductoinfo[id].objetojson.tblproductdetalle_diametro);
				}
				else if(largo!=''&&ancho!=''&&largo!=null&&ancho!=null)
				{
					$('#popup_producto_size').append('Largo: '+arregloProductoinfo[id].objetojson.tblproductdetalle_largo+' Ancho: '+arregloProductoinfo[id].objetojson.tblproductdetalle_ancho);
				}
				else if(piezas!=''&&piezas!=null)
				{
					$('#popup_producto_size').append('Piezas: '+arregloProductoinfo[id].objetojson.tblproductdetalle_piezas);
				}
				else
				{
					$('#popup_producto_size').append('No encotro:');
				}
				$('#popup_producto_div_btnadd').append('<input id="btnp" class="myButton-anadir" type="button" value="Añadir" onclick=procesoDeCompra('+idtblproducto+','+id+');>')
      }
      function popup_icono_add_producto(id)
      {
      	console.log('id::'+id);

      }
      
      function procesoDeCompra(idProducto,id)
      {
      	console.log('agregar a carrito id::'+idProducto+' id::'+id);
      	/*
      	$fchordencompra, $toralorden,$statuspagado,$nombrecliente,$sistemapago,$facturacion,$devolucion,$stripentoken,$emailstripe,$calif,$ordencompracliente,$idtblcliente,$idtblsistpago,$emailcreo
      	 */      
	      fchordencompra='';
	      toralorden='';
	      statuspagado=0;
	      nombrecliente='';
	      sistemapago=0;
	      facturacion=0;
	      devolucion=0;
	      stripentoken='';
	      emailstripe='';
	      calif='';
	      ordencompracliente='';
	      idtblcliente=0;
	      idtblsistpago=0;
	      emailcreo='';
	      //
	     console.log('idtblordencompra::'+idtblordencompra);
	     if(idtblordencompra==='')
	     {
	     	console.log('entro a registrar una neuva orden');
      		crearOrdenCompra(idProducto,id);
      		crearCarrito(idProducto,id);
	      }
	      else
	      {
	      	console.log('solo agrega al carruto');
	      	crearCarrito(idProducto,id);
	      }
      }

      function crearOrdenCompra(idProducto,id)
      {
      	//
      	$.ajax({  method: "POST", dataType: "json",  url: "./../../controllers/setTblordencompra.php",  data: {solicitadoBy:"WEB",fchordencompra:fchordencompra, toralorden:toralorden, statuspagado:statuspagado, nombrecliente:nombrecliente, sistemapago:sistemapago, facturacion:facturacion, devolucion:devolucion, stripentoken:stripentoken, emailstripe:emailstripe, calif:calif, ordencompracliente:ordencompracliente, idtblcliente:idtblcliente, idtblsistpago:idtblsistpago, emailcreo:emailcreo }  })
	      	.done(function( setTblordencompra ) {
	      		console.log('setTblordencompra::'+setTblordencompra);
	      		//console.log(JSON.stringify(setTblordencompra, null, 4));
	      		//se 
						if(setTblordencompra.success>0)      
						{
							idtblordencompra=setTblordencompra.datos[0];
							//crear una variabble de sesion de la orden de compra
						}
					})
	      	.fail(function( jqXHR, textStatus ) {  console.log("4 fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
	      	.always(function(){ 	});
      }

      function crearCarrito(idProducto,id)
      {
      	if(diferenciaDias>0)
	      	{
	      		//hoy
	      		tipopedido=1;
	      	}else{
	      		//sobre pedido
	      		tipopedido=2;
	      	}
	      	cantidad=1;
	      	nombreproduct=arregloProductoinfo[id].objetojson.tblproducto_nombre;
	      	nombreproveedor=arregloProductoinfo[id].objetojson.tblproveedor_nombre;
	      	precioreal=arregloProductoinfo[id].objetojson.tblproductdetalle_precioreal;
	      	preciobp=arregloProductoinfo[id].objetojson.tblproductdetalle_preciobepickler;
	      	personalizar=$('#popup_producto_textarea_personalizar').val();
	      	msjtarjeta=$('#popup_producto_textarea_tarjeta').val();
	      	calif='';
	      	emailcreo='';
	      	idtblproductdetalle=arregloProductoinfo[id].objetojson.idtblproductdetalle;
	      	console.log('id::'+id+' idtblproductdetalle::'+idtblproductdetalle);
	      	//console.log('Enviar a carrito tipopedido::'+tipopedido+' cantidad::'+cantidad+' nombreproduct::'+nombreproduct+' nombreproveedor::'+nombreproveedor+' precioreal::'+precioreal+' preciobp::'+preciobp+' personalizar::'+personalizar+' msjtarjeta::'+msjtarjeta+' calif::'+calif+' emailcreo::'+emailcreo+' idtblordencompra::'+idtblordencompra+' idtblproductdetalle::'+idtblproductdetalle);
	      	//dataType: "json", 
	      	
	      	$.ajax({  method: "POST", dataType: "json",   url: "./../../controllers/setTCPsetUpdateTCPAndsetUpdateTP.php",  data: {solicitadoBy:"WEB",tipopedido:tipopedido, cantidad:cantidad, nombreproduct:nombreproduct, nombreproveedor:nombreproveedor, precioreal:precioreal, preciobp:preciobp, personalizar:personalizar, msjtarjeta:msjtarjeta, calif:calif, emailcreo:emailcreo, idtblordencompra:idtblordencompra, idtblproductdetalle:idtblproductdetalle }  })
	      	.done(function( setTCPsetUpdateTCPAndsetUpdateTP ) {
	      		//console.log('setTCPsetUpdateTCPAndsetUpdateTP::'+setTCPsetUpdateTCPAnd
						if(setTCPsetUpdateTCPAndsetUpdateTP.success>0)      
						{
							cargarCarritoSuperior();
						}
					})
	      	.fail(function( jqXHR, textStatus ) {  console.log("4 fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
	      	.always(function(){ 	});
	      	
      }
      function cargarCarritoSuperior()
      {
      	console.log('enotr a cargarCarritoSuperior idtblordencompra::'+idtblordencompra);
     		contadorProductoEnCarrito=0;

      	//
      	$.ajax({  method: "POST", dataType: "json",  url: "./../../controllers/getAllTblcarritoproductByTblordencompra2.php",  data: {solicitadoBy:"WEB",idtblordencompra:idtblordencompra }  })
	      	.done(function( getAllTblcarritoproductByTblordencompra2 ) {
	      		//console.log('getAllTblcarritoproductByTblordencompra2::'+getAllTblcarritoproductByTblordencompra2);
	      		console.log('getAllTblcarritoproductByTblordencompra2::'+JSON.stringify(getAllTblcarritoproductByTblordencompra2, null, 4));
	      		
						if(getAllTblcarritoproductByTblordencompra2.success>0)      
						{
							$('#header_carrito_listaProductos').empty();
							$('#header_carrito_listaProductos').append('<li role="presentation" class="header_carrito_producto" id="header_carrito_contador">  <a role="menuitem" tabindex="-1" href="./carrito.php">Revisar mi carrito</a>  </li> <li role="presentation" class="divider"></li>');
							$.each(getAllTblcarritoproductByTblordencompra2.datos, function(i,item){

								//idtblproducto=getAllTblcarritoproductByTblordencompra2.datos[i].tblproducto_idtblproducto;
								tblcarritoproduct_cantidad=getAllTblcarritoproductByTblordencompra2.datos[i].tblcarritoproduct_cantidad;
								contadorProductoEnCarrito+=parseInt(tblcarritoproduct_cantidad);
								for(cantidad=1;cantidad<=tblcarritoproduct_cantidad;cantidad++)
								{
								//$('#header_carrito_listaProductos').append('<li role="presentation" class="header_carrito_producto" id="header_carrito_contador"> <span class="glyphicon glyphicon-minus-sign add-remove-icon color-rosa"></span> <img class="header_carrito_img_producto" src="./../assests_general/productos/linea/'+getAllTblcarritoproductByTblordencompra2.datos[i].tblproductimg_srcimg+'" alt="" class="galeria-img"> <span class="glyphicon glyphicon-plus-sign add-remove-icon color-rosa"></span> </li>');
								$('#header_carrito_listaProductos').append('<li role="presentation" class="header_carrito_producto" id="header_carrito_contador">  <img class="header_carrito_img_producto" src="./../assests_general/productos/linea/'+getAllTblcarritoproductByTblordencompra2.datos[i].tblproductimg_srcimg+'" alt="" class="galeria-img">  </li>');
								}
							});
							console.log('contadorProductoEnCarrito::'+contadorProductoEnCarrito);
							$('#header_carrito_contador').empty();
							$('#header_carrito_contador').append(contadorProductoEnCarrito);
						}
						
					})
	      	.fail(function( jqXHR, textStatus ) {  console.log("4 fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
	      	.always(function(){ 	});
      }
      
  	</script>
   <!--//FIN JAVASCRIPT MIGUEL-->
  </body>
</html>