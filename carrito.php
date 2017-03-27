<?php 
include('./php/seguridad_general.php');
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <!--Empieza head-->
    <?php
    //Se toman todos los recursos y estilos para la pagína
    include('./codigo_general_ecommerce/head_ecommerce.php'); 
    ?>   
       
    <!--Slider-->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">
    <!--Bootstrap-->  
    <!--<link rel="stylesheet" href="assets/bootstrap3/css/bootstrap.min.css">-->
    <!--<link rel="stylesheet" href="assets/font-awesome-4.6.3/css/font-awesome.min.css">-->
    <link rel="stylesheet" type="text/css" href="assets/css/carrito.css">
  </head>
  <body>
    <!-- Empieza la parte de header y/o menu -->
    <?php
    //se toma los datos de header de la pagína
    include('./codigo_general_ecommerce/header_ecommerce.php');
    ?> 
    <!-- Termina parte de header -->
    <main>
      <div class="container">
        <!-- Example row of columns -->
        <div class="row justify-content-md-center color-rosa text-center fuente-carrito carritoTitulos"> 
          <div class="col-md-2 titulo">
            <label>Cantidad</label>         
          </div>
          <div class="col-md-2 titulo">          
           <label>Producto</label>
          </div>
          <div class="col-md-2 titulo">          
            <label>Tamaño</label>
          </div>           
          <div class="col-md-2 titulo">          
            <label>Pasteleria</label>
          </div>
          <div class="col-md-2 titulo">          
            <label>Precio</label>
          </div>
        </div>
        <div class="row  text-center carritoProductos" id="carrito_checkout_productos">
                  
        </div>

        

        <div class="row justify-content-md-center">
            <div class="col-md-10 endProduct"></div>
        </div>
        <br/>

        <div class="row justify-content-md-center text-center fuente-carrito">
          <div class="col-md-2">       
          </div>
          <div class="col-md-2">  
          </div>
          <div class="col-md-2">  
          </div>           
          <div class="col-md-2 text-right desglose">          
            <label>Subtotal:</label>
          </div>
          <div class="col-md-2" id="carrito_checkout_subtotal_div"> 

          </div>
        </div>

        <div class="row justify-content-md-center text-center fuente-carrito">
          <div class="col-md-2">       
          </div>
          <div class="col-md-2">  
          </div>
          <div class="col-md-2 text-right desglose">  
              <label>Cupón de descuento:</label>
          </div>           
          <div class="col-md-2 text-right div-cupon desglose">          
            <form>
              <input type="text" name="inputCuponDescuento" placeholder="">
            </form>
          </div>
          <div class="col-md-2" id="carrito_checkout_total_div">  

          </div>
        </div>

        <div class="row justify-content-md-center text-center fuente-carrito">
          <div class="col-md-2">       
          </div>
          <div class="col-md-2">  
          </div>
          <div class="col-md-2">  
          </div>           
          <div class="col-md-2"> 
          </div>
          <div class="col-md-2">          
            <a class="linkPagar" href="carrito_pagar.php">Pagar</a>
          </div>
        </div>        
        <!--PRODUTOS COMPLEMENTARIOS-->  

        <div class="row ">
          <div class="col-md-12 text-left">
            <label class="labelSugerencias color-rosa" id="labelSugerencias">Sugerencias</label>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <section class="slider sliderPruductosComplemetarios" id="carrito_slide_complementarios_seccion" > 
                       
            </section>
          </div>
        </div>   
 
        <div id="footer">
        </div>
        <!--////////////////////////-->
        <!--POPUP complementarios-->
        <!-- Modal -->
        <div class="modal fade" id="myModalComplementario" role="dialog">
          <div class="modal-dialog">        
            <!-- Modal content-->
            <div class="modal-content">
              <!--
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Vistas Previa Producto Complementario</h4>
              </div>
              -->
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign color-rosa"></span></button>
                    <!--&times;-->
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <img class="centrado popup-img-complementario" src="./../assets/img/fotografias-de-producto/2650299-390x320.png"/
                  </div>
                  <div class="col-md-7 text-left">
                      <div class="form-group ">
                        <!--<input type="date" placeholder="Fecha" class="form-control">-->
                        <p>Producto:Pastel de Tres Leches</p>
                      </div>
                      <div class="form-group ">
                        <p>Descripción: Pastel para 20 personas</p>
                      </div>
                      <div class="form-group ">
                        <p>Ingredientes:</p><p class="texto-bold">Chocolate, moras y chispas de color</p>
                      </div>
                      <div class="form-group ">
                        <p><a href="#" data-toggle="modal" data-target="#myModalComplementarioPasteleria">Pastelería: La torre del sabor</a></p>
                      </div>
                      <div class="form-group ">
                        <p>Stock:10</p>
                      </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">          
                <!--<button type="button" class="btn btn-default linkAgregar" data-dismiss="modal">Añadir</button>-->
                <a class="linkAgregar" data-dismiss="modal">Añadir</a>
              </div>
            </div>          
          </div>
        </div>
        <!--Fin Modal-->
        <!-- Modal -->
        <div class="modal fade" id="myModalComplementarioPasteleria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-4">.col-md-4</div>
                    <div class="col-md-4 col-md-offset-4"><h1>.col-md-4 .col-md-offset-4</h1></div>
                    <div class="col-md-4 col-md-offset-4"><h1>.col-md-4 .col-md-offset-4</h1></div>
                    <div class="col-md-4 col-md-offset-4"><h1>.col-md-4 .col-md-offset-4</h1></div>
                    
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        <!--Fin Modal-->
      </div>
    </main>

    <!--jquery-->
    <!--
    <script src="./../assets/js/jquery-3.1.0.min.js"></script>
    <script src="./../assets/js/tether.min.js"></script>
    <script src="./../assets/bootstrap3/js/bootstrap.js"></script>   
    <script src="./../assets/js/slick.js" type="text/javascript" charset="utf-8"></script>
    <script src="./../assets/js/slick-rose.js" type="text/javascript"></script>
    -->
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
    <script type="text/javascript">

    //INCIO VARIABLES
      car_che_pro='#carrito_checkout_productos';
      car_che_sub_div='#carrito_checkout_subtotal_div';
      car_che_tot_div='#carrito_checkout_total_div';
      car_sli_com_sec='#carrito_slide_complementarios_seccion';
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
      $( window ).ready(function()
      {
        //console.log('archivo listo');
        cargarDatosDefault();
        //cargarListenerDafault();  

        listener();
      });
      function cargarDatosDefault(){

        //CARGAMOS HEADER CARRITO
        cargarCarritoSuperior();
        cargarProductosComplementarios();        
      }      

      function cargarCarritoSuperior()
      {
        //console.log('enotr a cargarCarritoSuperior idtblordencompra::'+idtblordencompra);
        contadorProductoEnCarrito=0;

        //
        $.ajax({  method: "POST", dataType: "json",  url: "./../../controllers/getAllTblcarritoproductByTblordencompra2.php",  data: {solicitadoBy:"WEB",idtblordencompra:idtblordencompra }  })
          .done(function( getAllTblcarritoproductByTblordencompra2 ) {
            //console.log('getAllTblcarritoproductByTblordencompra2::'+getAllTblcarritoproductByTblordencompra2);
            //console.log('getAllTblcarritoproductByTblordencompra2::'+JSON.stringify(getAllTblcarritoproductByTblordencompra2, null, 4));
            
            if(getAllTblcarritoproductByTblordencompra2.success>0)      
            {
              $('#header_carrito_listaProductos').empty();
              $('#header_carrito_listaProductos').append('<li role="presentation" class="header_carrito_producto" id="header_carrito_contador">  <a role="menuitem" tabindex="-1" href="#">Revisar mi carrito</a>  </li> <li role="presentation" class="divider"></li>');
              $.each(getAllTblcarritoproductByTblordencompra2.datos, function(i,item){
                idtblproducto=getAllTblcarritoproductByTblordencompra2.datos[i].idtblproducto;
                tblcarritoproduct_cantidad=getAllTblcarritoproductByTblordencompra2.datos[i].tblcarritoproduct_cantidad;
                contadorProductoEnCarrito+=parseInt(tblcarritoproduct_cantidad);
                //arreglo de informacion
                arregloProductoinfo.push({idtblproducto:idtblproducto,objetojson:item});

                for(cantidad=1;cantidad<=tblcarritoproduct_cantidad;cantidad++)
                {
                $('#header_carrito_listaProductos').append('<li role="presentation" class="header_carrito_producto" id="header_carrito_contador">  <img class="header_carrito_img_producto" src="./../assests_general/productos/linea/'+getAllTblcarritoproductByTblordencompra2.datos[i].tblproductimg_srcimg+'" alt="" class="galeria-img">  </li>');
                }
              });
              //console.log('contadorProductoEnCarrito::'+contadorProductoEnCarrito);
              $('#header_carrito_contador').empty();
              $('#header_carrito_contador').append(contadorProductoEnCarrito);
            }
            //CARGAMOS LOS PRODUCTOS EN EL CHECKOUT DEL CARRITO
            cargarCarritoCheckout();
          })
          .fail(function( jqXHR, textStatus ) {  console.log("4 fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
          .always(function(){   });
      }

      function cargarCarritoCheckout()
      {
        subtotal=0;
        $(car_che_pro).empty();
        //console.log('getAllTblcarritoproductByTblordencompra2::'+JSON.stringify(arregloProductoinfo, null, 4));
        $.each(arregloProductoinfo, function (key, data) {
          //console.log('key::'+key);
          tblcarritoproduct_cantidad=arregloProductoinfo[key].objetojson.tblcarritoproduct_cantidad;
          tblcarritoproduct_nombreproducto=arregloProductoinfo[key].objetojson.tblcarritoproduct_nombreproducto;
          tblcarritoproduct_nombreproveedor=arregloProductoinfo[key].objetojson.tblcarritoproduct_nombreproveedor;
          tblcarritoproduct_preciobp=arregloProductoinfo[key].objetojson.tblcarritoproduct_preciobp;
          subtotal+=parseInt(tblcarritoproduct_preciobp);

          tblproductdetalle_diametro=arregloProductoinfo[key].objetojson.tblproductdetalle_diametro;
          tblproductdetalle_largo=arregloProductoinfo[key].objetojson.tblproductdetalle_largo;
          tblproductdetalle_ancho=arregloProductoinfo[key].objetojson.tblproductdetalle_ancho;
          tblproductdetalle_piezas=arregloProductoinfo[key].objetojson.tblproductdetalle_piezas;
          if(tblproductdetalle_diametro!=null)
          {
            productoSize='Diametro: '+tblproductdetalle_diametro;      
          }else if(tblproductdetalle_largo!=null&&tblproductdetalle_ancho!=null)
          {
            productoSize='Largo: '+tblproductdetalle_largo+' x Ancho'+tblproductdetalle_ancho;
          }else if(tblproductdetalle_piezas!=null)
          {
            productoSize='Piezas: '+tblproductdetalle_piezas;
          }else
          {
            productoSize='';
          }     
          //console.log('tblcarritoproduct_cantidad::'+tblcarritoproduct_cantidad);

          $(car_che_pro).append('<div class="col-md-12"> <div class="row "> <div class="col-md-2"> <p class="fuente-carrito"> <span class="glyphicon glyphicon-minus-sign add-remove-icon color-rosa"> </span> '+tblcarritoproduct_cantidad+' <span class="glyphicon glyphicon-plus-sign add-remove-icon color-rosa"> </span> </p> </div> <div class="col-md-2"> <p class="fuente-carrito"> '+tblcarritoproduct_nombreproducto+' </p> </div> <div class="col-md-2"> <p class="fuente-carrito"> '+productoSize+' </p> </div> <div class="col-md-2"> <p class="fuente-carrito"> '+tblcarritoproduct_nombreproveedor+' </p> </div> <div class="col-md-2"> <p class="fuente-carrito"> '+tblcarritoproduct_preciobp+' </p> </div> </div> </div');

          /*
          $.each(data, function (index, data) {
              console.log('index data::',data);
            });
            */
        });
        $(car_che_sub_div).empty();
        $(car_che_sub_div).append('<label>'+subtotal+'</label>');
        $(car_che_tot_div).empty();
        $(car_che_tot_div).append('<label>'+subtotal+'</label>');
        //$(car_che_pro)

        //'<div class="col-md-12">             <div class="row ">                <div class="col-md-2">                <p class="fuente-carrito">                   <span class="glyphicon glyphicon-minus-sign add-remove-icon color-rosa"></span>                     1                  <span class="glyphicon glyphicon-plus-sign add-remove-icon color-rosa"></span>                 </p>                       </div>               <div class="col-md-2">                         <p class="fuente-carrito">Pastel</p>              </div>              <div class="col-md-2">                          <p class="fuente-carrito">20cm</p>              </div>                         <div class="col-md-2">                          <p class="fuente-carrito">Bisascca</p>              </div>              <div class="col-md-2">                          <p class="fuente-carrito">100</p>              </div>            </div>          </div>'
      }
      function cargarProductosComplementarios()
      {
        $(car_sli_com_sec).empty();
        //$idtblpais,$idtblciudad,$idtblcolonia,$idtblsemana,$diaselaboracion,$idtbltiposervicio,$hora
        //console.log('pais::'+pais+' ciudad::'+ciudad+' tipoServicio::'+tipoServicio+' fecha::'+fecha+' hora::'+hora+' diferenciaDias::'+diferenciaDias+' colonia::'+colonia+' idtblordencompra::'+idtblordencompra+' diasemana::'+diasemana);
        //
        $.ajax({  method: "POST", dataType: "json",  url: "./../../controllers/MgetAllTblproductcomplem.php",  data: {solicitadoBy:"WEB",idtblpais:pais, idtblciudad:ciudad, idtblcolonia:colonia, idtblsemana:diasemana, diaselaboracion:diferenciaDias, idtbltiposervicio:tipoServicio, hora:hora }  })
          .done(function( getAllTblproductcomplem ) {
            //console.log('MgetAllTblproductcomplem::'+MgetAllTblproductcomplem);
            console.log('getAllTblproductcomplem::'+JSON.stringify(getAllTblproductcomplem, null, 4));
            $.each(getAllTblproductcomplem.datos, function(i,item){
              tblproductcomplem_srcimg=getAllTblproductcomplem.datos[i].tblproductcomplem_srcimg;
              tblproductcomplem_nombre=getAllTblproductcomplem.datos[i].tblproductcomplem_nombre;
              tblproductcomplem_preciobp=getAllTblproductcomplem.datos[i].tblproductcomplem_preciobp;

              $(car_sli_com_sec).append('<div>                    <div class="pull-right ">                  <img class="img-agregar" id="imgAgregar1" src="./assets/img/iconos-especiales/boton-de-mas_06.png" value=1/>                  <form>                    <input type="hidden" id="idProducto" value=1>                  </form>                </div>                <div id="contenedor" class="contenedor">                  <div  id="imagen" class="imagen center-block text-center">   <a href="#" data-toggle="modal" data-target="#myModalMiguel">  <img class="centrado" src="./../assests_general/productos/complementario/'+tblproductcomplem_srcimg+'"/> </a> </div> <div class="info"> <div class="ec-stars-wrapper"> <a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>                      <a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>                      <a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>                      <a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>                      <a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a> </div> <p>'+tblproductcomplem_nombre+'</p> <p class="adicional">$'+tblproductcomplem_preciobp+'</p> </div> </div> </div>');            

            });
            /*
            <div>    
                <div class="pull-right ">
                  <img class="img-agregar" id="imgAgregar1" src="./../assets/img/iconos-especiales/boton-de-mas_06.png" value=1/>
                  <form>
                    <input type="hidden" id="idProducto" value=1>
                  </form>
                </div>
                <div id="contenedor" class="contenedor">
                  <div  id="imagen" class="imagen center-block text-center">
                    <!--<a href="#show1"><img id="pop1" src="./../assets/img/fotografias-de-producto/2650299-390x320.png"/></a>-->
                    <a href="#" data-toggle="modal" data-target="#myModalMiguel">
                      <img class="centrado" src="./../assets/img/fotografias-de-producto/2650299-390x320.png"/>
                    </a>
                  </div>
                  <div class="info">
                    <div class="ec-stars-wrapper">
                      <a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
                      <a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
                      <a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
                      <a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
                      <a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
                    </div>
                    <p>PastelMiguel</p>
                    <p class="adicional">$100.00</p>
                  </div>
                </div>  
              </div>
              */
              cargarSlider();
          })
          .fail(function( jqXHR, textStatus ) {  console.log("4 fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
          .always(function(){   });
      }
      function cargarSlider()
      {
        $(".sliderPruductosComplemetarios").slick({
            dots: true,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3
          });
      }
      function listener()
      {
        $('#imgAgregar1').click(function(){
          console.log('lanzar popup');
          $('#myModalComplementario').modal('show');
          //valor=$('#imgagregar').val();
          //alert('valor::'+valor);
          //$idProducto=$('#idProducto')
          //agregarCarrito(1);
        });
      }
    </script>
  </body>
</html>
<?php
//echo 'hola';
?>