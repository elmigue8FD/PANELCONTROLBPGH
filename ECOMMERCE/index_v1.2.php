<!DOCTYPE html>
<html lang="en">
  <head>
  <!--Empieza head-->
  <?php
  //Se toman todos los recursos y estilos para la pagína
  include('./codigo_general_ecommerce/head_ecommerce.php'); 
  ?>
  <link href="assets/css/jquery-ui.min.css" rel="stylesheet">
  <!--Termina head-->
  <style type="text/css">
  .form-control{
    border: 1px solid #fff;
    border-bottom-color: #de5465;
    color: #de5465
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
    <!-- Empieza seccion de Slider  -->
    <section id="mu-slider">
      <div class="mu-slider-area"> 
        <!-- Top slider -->
        <div class="mu-top-slider">
          <!-- parte superior de slider -->
          <div class="mu-top-slider-single">
          <!--imagen 1 de slider-->
            <img src="assets/img/slider/cupcakes-para-fiestas.jpg" alt="img"/>
            <!-- Top slider content -->
            <div class="mu-top-slider-content">
              <!--<a href="#" id="myBtn2" class="mu-readmore-btn">Haz tu pedido</a>-->
              <a href="#" data-toggle="modal" data-target="#modalHazTuPedido" class="mu-readmore-btn">Haz tu pedido</a>
              <!--<button type="button" class=" center-block btn btn-primary btn-lg" data-toggle="modal" data-target="#modalHazTuPedido">ORDENAR</button>-->
            </div>
            <!-- / parte superior de  slider  -->
          </div>
          <!-- /  slider  -->    
           <!--  slider -->
          <div class="mu-top-slider-single">
          <!--imagen 2 de slider-->
            <img src="assets/img/slider/pastel-de-bodas.jpg" alt="img"/>
           <!--texto slider-->
            <div class="mu-top-slider-content">
              <a href="#" data-toggle="modal" data-target="#modalHazTuPedido" class="mu-readmore-btn">Haz tu pedido</a>
              <!--<button type="button" class=" center-block btn btn-primary btn-lg" data-toggle="modal" data-target="#modalHazTuPedido">ORDENAR</button>-->
            </div>
            <!-- /  slider -->
          </div>
          <!-- / Top slider  --> 
           <!-- Top slider  -->
          <div class="mu-top-slider-single">
          <!--imagen 3 slider-->
            <img src="assets/img/slider/wedding-cake.jpg" alt="img"/>
            <!-- texto de slider -->
            <div class="mu-top-slider-content">
              <a href="#" data-toggle="modal" data-target="#modalHazTuPedido" class="mu-readmore-btn">Haz tu pedido</a>
              <!--<button type="button" class=" center-block btn btn-primary btn-lg" data-toggle="modal" data-target="#modalHazTuPedido">ORDENAR</button>-->
            </div>
            <!-- / Top slider  -->
          </div>
          <!-- / Top slider  -->    
        </div>
      </div>
    </section>
    <!--termina seccion de slider  -->
  	 <!-- pop up -->
    <div class="modal fade" id="modalHazTuPedido" role="dialog">
      <div class="modal-dialog">      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">¿A donde lo quieres pedir?</h4>
          </div>
          <div class="modal-body">
            <!--Incio modal body-->
            <div class="container-fluid">
              <div id="lugarpedido" class="lugarpedido">
                <div class="row">
                  <div class="col-md-12">
                    <div class="">
                    <!--src="assets/img/Bandera-De-Mexico.png"-->
                    <img class="banderas" src="./../assests_general/banderas_pais/Bandera-de-México.png" alt="bandera de méxico">
                    </div>
                  </div>
                </div>
                <div class="row" id="popup_row_msjCamposObligatorios">
                  <div class="col-md-12">
                    <div class="center">
                      <label>Todos los campos con * son obligatorios</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="center">
                      <span>*</span>
                      <select id="popup_select_ciudad_haztupedido">
                        <option value="" disabled="disabled" selected="true">Ciudad</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                     <div class="center">
                      <span>*</span>
                        <!--<select id="tiposervicio">-->
                        <select id="popup_select_tiposervicio_haztupedido">
                          <option value="0" selected="true" disabled="disabled">Tipo de servicio</option>
                          <!--<option>Pasar a Pastelería</option>
                          <option>A domicilio</option>-->
                        </select>
                        
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="center" id="popup_div_fecha">
                    <span>*</span>
                    <!--<input type="date" id="fechapedido" title="Fecha de la entrega">-->
                    <input type="text" id="fechapedido" title="Fecha de la entrega">

                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="center">
                      <span>*</span>
                      <select id="popup_select_hora_haztupedido">
                        <option value="0" selected="true" disabled="disabled">Hora</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row" id="popup_row_colonia_haztupedido">
                  <div class="col-md-12">
                    <div class="center">
                      <span>*</span>
                      <select id="popup_select_colonia_haztupedido">
                        <option value="0" selected="true" disabled="disabled">Colonia</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row" id="popup_row_miubicacion_haztupedido">
                  <div class="col-md-12">
                    <div class="center">
                    <div class="textoCentrado">                   
                    <label class="collapsemiubicaion" id="miUbicacion" for="_1">
                       Mi Ubicación 
                    </label>
                    <!--<input id="_1" type="checkbox">-->
                    </div> 
                    </div>
                  </div>
                </div>                
                <div class="row" id="popup_row_mostrarmapa_haztupedido">
                  <div class="col-md-12">
                    <div id="mostrarmapa">
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3762.814027438534!2d-99.18412368541554!3d19.42043968689123!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1fecd47ed8f23%3A0xa6e0008524818b32!2sCastillo+de+Chapultepec!5e0!3m2!1ses!2smx!4v1477621203689" width="100%"  frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                  </div>
                </div>
                <div class="row" id="popup_row_otrolugar_haztupedido">
                  <div class="col-md-12">
                    <div class="center">
                    <div class="textoCentrado">
                    <label class="collapseotrolugar" id="otroLugar" for="_2"> Dirección   </label>
                    <!--<input id="_2" type="checkbox">-->
                    </div>
                    </div>
                  </div>
                </div>                
                <div id="mostrardatoscontacto">
                  <form class="datos" id="datos">   
                      
                    <div class="elementosdatos" id="divcp"> 
                      <input type="text" size="50" placeholder="C.P." id="cp">
                    </div>
                      
                    <div class="elementosdatos"  id="divcalle"> 
                       <input type="text" size="40" id="calle" placeholder="Calle">
                    </div>
                      
                    <div class="elementosdatos" id="nums1"> 
                      <input id="numint" type="text" size="50" placeholder="Núm. Int">
                    </div>
                      
                    <div class="elementosdatos" id="nums"> 
                      <input id="numext" type="text" size="50" placeholder="Núm. Ext">
                    </div>
                      
                    <div class="elementosdatos" id="divcolonia"> 
                      <input type="text" size="50" placeholder="Colonia" id="colonia">
                    </div>
                      
                    <div class="elementosdatos" id="divmunicipio"> 
                      <input type="text" size="50" placeholder="Delegación/Municipio" id="municipio">
                    </div>
                  </form>   
                </div>
                <div>
                  </br>
                  <!--<p id="pCamposObligatorios">Todos los campos con * son obligatorios</p>->
                  <!--<a href="haztupedido.php" class="botonordenar">Ordenar</a>-->
                  <a href="#" id="popup_btn_ordenar_haztupedido" name="popup_btn_ordenar_haztupedido" class="botonordenar">Ordenar</a>
                </div>
              </div>
            </div>
            <!--Incio modal body-->
          </div>
        </div>
      </div>
    </div>
    <!--
    <div class="modal fade" id="modalCamposObligatorios" role="dialog">
      <div class="modal-dialog">   
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Lo sentimos</h4>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div id="lugarpedido" class="lugarpedido">
                <div class="row" id="popup_row_msjCamposObligatorios">
                  <div class="col-md-12">
                    <div class="center alert alert-danger"><label>Todos los campos con * son obligatorios</label>
                    </div>
                  </div>
                </div>
                <div>
                  <a href="#" class="botonordenar" data-dismiss="modal">Verificar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    -->
<!--// inicia seccion como funciona//-->
	
  <section id="sectioninfo">
        
        <div id="infografias" class="infografias" >
        
        	<div id="textoinfo">
        		<h7> ¿Cómo Funciona?</h7>
			</div>
        
        
        	<div class="info1" id="info1">
            
            	<img src="assets/img/como_funciona/selecciona-tu-ciudad.png"/>
                <h10> Seleciona tu Ciudad</h10>
                
        	</div>
            
        
        	<div class="info2">
            
            	<img src="assets/img/como_funciona/elige-tu-pastel.png"/>
                <h10> Elige tu Pastel </h10>
                
        	</div>
        
        
        	<div class="info3">            
            	<img src="assets/img/como_funciona/paga-y-disfruta.png"/>
                <h10> Paga y Disfruta</h10>            
        	</div>
    </div>
</section>
  <!-- termina seccion  de como funciona-->
  <!--//-inicia seccion Descarga app prox//-->
	    <section id="app">    
    	<img src="assets/img/app/descarga-nuestra-app.jpg" alt="fondo image descarga la app"/>    
    </section>
  <!--descarga seccion Descarga app prox -->
<!--// inicia seccion conviertete en proveedor//-->
	<section id="sectioninfo">        
        <div id="infografias" class="infografias">        
        	<div id="textoinfo">
        		<h7> Conviertete en Proveedor</h7>
			</div>
        	<div class="info4">
            	<img src="assets/img/conviertete_proveedor/registrate-bepickler.png"/>
                <h10> Registrate</h10>
                
       	  </div>
        	<div class="info5">
            	<img src="assets/img/conviertete_proveedor/vende-tus-productos.png"/>
                <h10> Vende Productos </h10>                
       	  </div>       
        	<div class="info6">            
            	<img src="assets/img/conviertete_proveedor/genera-ingresos.png"/>
                <h10> Genera Ingresos</h10>            
       	  </div>
    </div>
</section>
  <!-- termina seccion  de conviertete en proveedor-->    
    <!--//-inicia seccion inscribete al newsletter //-->	
    <section id="newsletter"        
	  <h2>Newsletter</h2>
                <input  id="boxnews" type="text"><input name="enviar" type="button" id="enviarnews" title="Enviar" value="enviar">
    </section>
  <!--termina seccion inscribete al newsletter -->
 <!--//espacio en blanco divisor de footer//-->
 
  <section id="divisor">
  
  </section>
 <!---->
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
  <script src="assets/js/jquery.min.js"></script> 

  <script src="assets/js/jquery-ui.min.js"></script>

  <!--JavaScript Util-->
  <script type="text/javascript" src="./assets/js/util_mount.js"></script>
  <!--Fin JavaScript Util-->
<!--//COMIENZA JAVASCRIPT MIGUEL-->
  <script type="text/javascript">
   
    //INCIO VARIABLES USADAS
    /*
    idtblciudad='';
    boolOcultarMapa='';
    boolOcultarOtroLugar='';
    hora=0;
    tipoServicioActivo=""
    var popup_select_ciudad_haztupedido='';
    var popup_select_tiposervicio_haztupedido='';
    var fechapedido='';
    var popup_select_hora_haztupedido='';
    boolValidarCampos
    
    msgTblciudad
    msgTbltiposervicio
    msgTblproveedorByTblcoloniaByTblCiudad
    ciudad
    */
    //FIN VARIABLES
    //INICIO FUNCIONES
    /*
    funcion_ocultarCamposServicioTienda
    funcion_ocultarCamposServicioDomiclio
    funcion_cargarDatosDefault
    funcion_obtenerCiudades
    funcion_obtenerTipoEntrega
    funcion_obtenerColoniasPasteleria
    funcion_obtenerHorasLocalesProveedor
    funcion_obtenerHorasDelivery
    funcion_validarCamposOrdenar
    funcion_tipoServicio
    funcion_validarCampoVacio
    function_arregloElementosVacios
     */
    //FIN FUNCIONES
    //INICIO NOMBRES VARIABLES
    p_r_coL_haz="#popup_row_colonia_haztupedido";
    p_s_ciu_haz="#popup_select_ciudad_haztupedido";
    p_r_miu_haz='#popup_row_miubicacion_haztupedido';
    p_r_otr_haz='#popup_row_otrolugar_haztupedido';
    p_r_mos_haz='#popup_row_mostrarmapa_haztupedido';
    m_d_c='#mostrardatoscontacto';
    m_u='#miUbicacion';
    o_l='#otroLugar';
    p_s_tip_haz="#popup_select_tiposervicio_haztupedido";
    c_o="pCamposObligatorios";
    p_s_hor_haz="#popup_select_hora_haztupedido";
    p_b_ord_haz="#popup_btn_ordenar_haztupedido";
    p_s_col_haz='#popup_select_colonia_haztupedido';
    p_s_fec_haz="#fechapedido";
    p_f_dat_haz="#datos";
    idtblpais=1;
    //p_r_coL_h="#popup_row_colonia_haztupedido";
    //FIN NOMBRES VARIABLES
    //PAGINA LISTA
    $( window ).ready(function()
      {
        funcion_camposIncomptatibles();
        funcion_ocultarCamposInicial();
        funcion_desactivarCamposInicial();
        funcion_cargarDatosDefault();
        funcion_listenercambiarCiudad();
      });   
    function funcion_camposIncomptatibles(){
      //console.log('funcion_camposIncomptatibles');
      
            $(p_s_fec_haz).datepicker({
        dateFormat: "yy-mm-dd"
      });

            // Getter
      var dateFormat = $(p_s_fec_haz ).datepicker( "option", "dateFormat" );
       
      // Setter
      $( p_s_fec_haz ).datepicker( "option", "dateFormat", "yy-mm-dd" );

    }
    function funcion_ocultarCamposInicial(){
      $(p_r_miu_haz).hide();
      $(p_r_mos_haz).hide();
      $(p_r_otr_haz).hide();
      $(m_d_c).hide();
      }
    function funcion_desactivarCamposInicial(){
      $(p_s_col_haz).prop("disabled",true);
      $(p_s_col_haz).css({"background-color": "#f3f1f1" });

      $(p_s_hor_haz).prop("disabled",true);
      $(p_s_hor_haz).css({"background-color": "#f3f1f1" });

      $(p_s_fec_haz).prop("disabled",true);
      $(p_s_fec_haz).css({"background-color": "#f3f1f1" });

      $(p_s_tip_haz).prop("disabled",true);
      $(p_s_tip_haz).css({"background-color": "#f3f1f1" });      
    }
    function funcion_desactivarCamposCambioFecha(){
      //$(p_s_col_haz).empty();
      $(p_s_col_haz).prop("disabled",true);
      $(p_s_col_haz).css({"background-color": "#f3f1f1" });

      //$(p_s_hor_haz).empty();
      $(p_s_hor_haz).prop("disabled",true);
      $(p_s_hor_haz).css({"background-color": "#f3f1f1" });    
    }
    function funcion_cargarDatosDefault()
    {
      $.ajax({  method: "POST", dataType: "json",  url: "./../../controllers/MgetAllTblciudadByTblproducto.php",  data: {solicitadoBy:"WEB",idtblpais:idtblpais}  })
        .done(function( msgTblciudad ) {
          //console.log('resultado::'+JSON.stringify(msgTblciudad, null, 4));          
          $.each(msgTblciudad.datos, function(i,item){ 
            //$("#popup_select_ciudad_haztupedido").append('<option value="'+msgTblciudad.datos[i].idtblciudad+'">'+msgTblciudad.datos[i].tblciudad_nombre+'</option>');
            $(p_s_ciu_haz).append('<option value="'+msgTblciudad.datos[i].idtblciudad+'">'+msgTblciudad.datos[i].tblciudad_nombre+'</option>');
            //funcion_obtenerColoniasPasteleria();
            
          }); 
        })
        .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
        .always(function(){  /*console.log("always");*/ });
    }
    function funcion_listenercambiarCiudad(){
      $(p_s_ciu_haz).change(function(){
        //console.log("cambio el select de ciudad");
        //habilitar tipo de servicio y car
        function_habilitarServicio();
      });
    }
    function function_habilitarServicio(){
      $(p_s_tip_haz).prop("disabled",false);
      $(p_s_tip_haz).css({"background-color": "#fff" });
      $.ajax({  method: "POST", dataType: "json",  url: "./../../controllers/MgetAllTblserviciosByTblproducto.php",  data: {solicitadoBy:"WEB"}  })
        .done(function( msgTbltiposervicio ) {   
          //console.log('resultado::'+JSON.stringify(msgTbltiposervicio, null, 4)); 
          $.each(msgTbltiposervicio.datos, function(i,item){
            if(msgTbltiposervicio.datos[i].idtbltiposervicio<=2) 
            {
               $(p_s_tip_haz).append('<option value="'+msgTbltiposervicio.datos[i].idtbltiposervicio+'">'+msgTbltiposervicio.datos[i].tbltiposervicio_nombre+'</option>');
              //arrayTemporal.push(temporal);
            }
            else{
              if(i<2){
                $(p_s_tip_haz).append('<option value="1">Recoger en Establecimiento</option>');
                $(p_s_tip_haz).append('<option value="2">Servicio a Domicilio</option>');              
              }
            }            
          }); 

          funcion_listenercambiarServicio();
        })
        .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
        .always(function(){  /*console.log("always");*/ });
    }

    function funcion_listenercambiarServicio()
    {
      $(p_s_tip_haz).change(function(){
        $(p_s_fec_haz).prop("disabled",false);
        $(p_s_fec_haz).css({"background-color": "#fff" });
        function_habilitarFechaPedido();
        function_habilitarHora();
      });
    }

    function function_habilitarFechaPedido()
    {
      $(p_s_fec_haz).blur(function(){
        var valorFecha=$(p_s_fec_haz).val();
        var dusu = new Date(valorFecha);
        valorFechaMostrar='';
        valorFechaMostrar += dusu.getDate() + "/";
        valorFechaMostrar += (dusu.getMonth() + 1) + "/";
        valorFechaMostrar += dusu.getFullYear();
        $(p_s_fec_haz).val(valorFechaMostrar);
      });
      $(p_s_fec_haz).change(function(){
        //funcion_desactivarCamposCambioFecha();
        var valorFecha=$(p_s_fec_haz).val();

        var dusu = new Date(valorFecha);
        var d = new Date();
        var fechaActual='';
        fechaActual += (d.getMonth() + 1) + "/";
        fechaActual += d.getDate() + "/";
        fechaActual += d.getFullYear();
        var d = new Date(fechaActual);
        valorFecha='';
        valorFecha += (dusu.getMonth() + 1) + "/";
        valorFecha += dusu.getDate() + "/";
        valorFecha += dusu.getFullYear();
        var dusu = new Date(valorFecha);

        dusuNum=dusu.getTime();
        dNum=d.getTime();
        //
        valorFechaMostrar='';
        valorFechaMostrar += dusu.getDate() + "/";
        valorFechaMostrar += (dusu.getMonth() + 1) + "/";
        valorFechaMostrar += dusu.getFullYear();
        $(p_s_fec_haz).val(valorFechaMostrar);
        //console.log("feccha es change::"+valorFecha+" fechaActual::"+fechaActual+' dusu.getTime()::'+dusuNum+' d::'+dNum);
        $('#fecha_erronea').remove();
        if(dusuNum >= dNum)
        {
          var diferenciaDias = Math.ceil(Math.abs(dusuNum - dNum) / (1000 * 3600 * 24)); 
          //console.log('se acepta diferenciaDias::'+diferenciaDias);

          funcion_listenercambiarFecha(diferenciaDias);
        }else
        {
          //console.log('no se acepta');
          $('#popup_div_fecha').append('<span id="fecha_erronea" style="color:red;">*La fecha debe de ser mayor a '+fechaActual+' Hora de centro de México </span>');
        }

      });
    }
    function funcion_listenercambiarFecha(diferenciaDias)
    {

      $(p_s_hor_haz).prop("disabled",false);
      $(p_s_hor_haz).css({"background-color": "#fff" });
      function_habilitarHora(diferenciaDias);
    }
    function function_habilitarHora(diferenciaDias)
    {
      $(p_s_hor_haz).empty();
      if($(p_s_fec_haz).val()!=''){
        if($(p_s_tip_haz).val()==1)
        {
          //console.log('servicion en pasteleria');

          $("#popup_select_hora_haztupedido").append('<option value="" selected="true" disabled="disabled">Hora</option>');
          for (hora = 9; hora <= 21; hora++) {
            $("#popup_select_hora_haztupedido").append('<option value="'+hora+'">'+hora+':00'+'</option>');
          }
        }
        else if($(p_s_tip_haz).val()==2)
        {
          //console.log('Servicio a dominicilio');
          $(p_s_hor_haz).append('<option value="" selected="true" disabled="disabled">Hora</option>');
          $(p_s_hor_haz).append('<option value="1">9:00-12:00</option>');
          $(p_s_hor_haz).append('<option value="1">12:00-15:00</option>');
          $(p_s_hor_haz).append('<option value="1">15:00-18:00</option>');
          $(p_s_hor_haz).append('<option value="1">18:00-21:00</option>');

        }
        funcion_listenercambiarHora();
        funcion_camposdomicilio($(p_s_tip_haz).val());
      }
      
    }
    function funcion_listenercambiarHora()
    {
      $(p_s_hor_haz).change(function(){
        $(p_s_col_haz).prop("disabled",false);
        $(p_s_col_haz).css({"background-color": "#fff" });
        function_habilitarColonia();
      });
    }
    function function_habilitarColonia()
    {
      console.log('ciudad id::'+$(p_s_ciu_haz).val());
      tblciudad=$(p_s_ciu_haz).val();
      $.ajax({  method: "POST",  dataType: "json", url: "./../../controllers/MgetAllTblcoloniaByTblproducto.php",  data: {solicitadoBy:"WEB",tblciudad:tblciudad}  })
        .done(function( msgTblcolonia ) {   
          console.log('resultado::'+JSON.stringify(msgTblcolonia, null, 4)); 
          
          
          $.each(msgTblcolonia.datos, function(i,item){            
               $(p_s_col_haz).append('<option value="'+msgTblcolonia.datos[i].idtblcolonia+'">'+msgTblcolonia.datos[i].tblcolonia_nombre+'</option>');                    
          });
           

          funcion_listenercambiarServicio();
        })
        .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
        .always(function(){  /*console.log("always");*/ });
    }
    function funcion_camposdomicilio($tipoServicio)
    {
      if($(p_s_tip_haz).val()==1)
      {
        funcion_ocultarCamposInicial();
      }else if($(p_s_tip_haz).val()==2)
      {
        $(p_r_miu_haz).show();
        $(p_r_mos_haz).show();
        $(p_r_otr_haz).show();
        $(m_d_c).show();
      }
    }
    function ajax(controlador,datos){
      /*
      Pruenbas en este metodo
            datos=["WEB"];
      matched=ajax("getAllTbltiposervicio",datos);
      msgTbltiposervicio=matched[0];
      console.log('msgTbltiposervicio::'+msgTbltiposervicio.datos[0].idtbltiposervicio);
      
      $.each(, function(i,item){ 
            $(p_s_tip_haz).append('<option value="'+msgTbltiposervicio.datos[i].idtbltiposervicio+'">'+msgTbltiposervicio.datos[i].tbltiposervicio_nombre+'</option>');
          }); 
      
       */
      console.log("entro al ajax"+datos[0]);
      var matched = [];
      $.ajax({  method: "POST", dataType: "json",  url: "./../../controllers/"+controlador+".php",  data: {solicitadoBy:datos[0]}, async: false  })
        .done(function( msg ) {  
          console.log('msg::'+msg.datos);
          matched.push(msg);      
          //return "datos "+msg.datos;
          return matched;
        })
        .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus); return "false"; })
        .always(function(){  /*console.log("always");*/ });
        
    }
    
  </script>
  <!--//FIN JAVASCRIPT MIGUEL-->
  
  
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="assets/js/bootstrap.js"></script>   
  <!-- Slick slider -->
  <script type="text/javascript" src="assets/js/slick.js"></script>
  <script type="text/javascript" src="assets/js/slick2.js"></script>
  
  
  <!-- Counter -->
  <script type="text/javascript" src="assets/js/waypoints.js"></script>
  <script type="text/javascript" src="assets/js/jquery.counterup.js"></script>
  <!-- Date Picker -->
  <script type="text/javascript" src="assets/js/bootstrap-datepicker.js"></script> 
  <!-- Mixit slider -->
  <script type="text/javascript" src="assets/js/jquery.mixitup.js"></script>
  <!-- Add fancyBox -->        
  <script type="text/javascript" src="assets/js/jquery.fancybox.pack.js"></script>
  <!-- Custom js -->
  <script src="assets/js/custom.js"></script> 
  
  
    <!-- haz tu pedido js -->
   <!--<script src="assets/js/haztupedido.js"></script> -->
<!--termina jquerys-->
 
  </body>
</html>