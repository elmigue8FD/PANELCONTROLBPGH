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
    <!--Bootstrap-->
    <!--<link rel="stylesheet" href="../assets/bootstrap3/css/bootstrap.min.css">-->   
    <!--Slider-->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="assets/css/carrito_pagar.css">
    <style type="text/css">
      
    </style>
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
        <div class="row">
          <div class="col-md-3">
            <div class="row">
            <div class="col-md-12">
            <h3 class="texto-bold">Registro</h3>
            </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <img class="redesSociales" src="./../assets/img/iniciar-sesion-con-facebook.jpg">
              </div>
              <div class="col-md-12">
                <img class="redesSociales" src="./../assets/img/iniciar-sesion-con-google.png">
              </div>            
            </div>
            <div class="row">
            <form>
              <div class="col-md-12">
              <h4 class="color-rosa texto-bold">Inicia Sesion</h4>
              </div>
              <div class="col-md-12">
              <input class="form-control" type="text" name="" placeholder="Usuario" id="carritoPagar_inicio_usuario_input" required>
              </div>
              <div class="col-md-12">
              <input class="form-control" type="text" name="" placeholder="Password" id="carritoPagar_inicio_password_input" required>
              </div>
              <div class="col-md-12">
              <a class="linkPagar pull-right" name="registroAceptar" href="#" id="carritoPagar_inicio_siguiente_btn">Siguiente</a>
              </div>
            </form>
            </div>
            <div class="row">
            <form>
              <div class="col-md-12">
              <h4 class="color-rosa texto-bold">Invitado</h4>
              </div>
              <div class="col-md-12">
              <input class="form-control" type="text" name="" placeholder="Nombre" id="carritoPagar_invitado_nombre_input" required>
              </div>
              <div class="col-md-12">
              <input class="form-control" type="text" name="" placeholder="Apellidos" id="carritoPagar_invitado_apellidos_input" required>
              </div>
              <div class="col-md-12">
              <input class="form-control" type="email" name="" placeholder="Correo electrónico" id="carritoPagar_invitado_correo_input" required>
              </div>
              <div class="col-md-12">
              <input class="form-control" type="tel" name="" placeholder="Celular" id="carritoPagar_invitado_celular_input" required>
              </div>
              <div class="col-md-12">
              <input class="form-control" type="date" name="" placeholder="Fecha de Nacimiento" id="carritoPagar_invitado_fchnacimiento_input" required>
              </div>
              <div class="col-md-12">
              <a class="linkPagar pull-right" name="registroAceptar" href="#" id="carritoPagar_invitado_siguiente_btn">Siguiente</a>
              </div>
            </form>
            </div>
          </div>
          <div name="datosEnvio" class="col-md-3 deshabilitado col-rosa">
            <div class="row">
            <h3 class="texto-bold">Datos de envio</h3>
            <form>
              <div class="col-md-12">
              <input name="datosEnvio" class="form-control deshabilitado" type="text" name="" placeholder="Direccion de envio" id="datosEnvio_ubicacion_direccion_input">
              </div>
              <div class="col-md-12">
              <input name="datosEnvio" class="form-control deshabilitado" type="text" name="" placeholder="Calle" id="datosEnvio_ubicacion_calle_input">
              </div>
              <div class="col-md-12">
                <div class="col-md-6 campoForm">
                <input name="datosEnvio" class="form-control deshabilitado" type="text" name="" placeholder="Número Ext" id="datosEnvio_ubicacion_numext_input">
                </div>
                <div class="col-md-6 campoForm">
                <input name="datosEnvio" class="form-control deshabilitado" type="text" name="" placeholder="Número Int" id="datosEnvio_ubicacion_numint_input">
                </div>
              </div>
              <div class="col-md-12">
                <div class="col-md-6 campoForm">
                  <input name="datosEnvio" class="form-control deshabilitado" type="text" name="" placeholder="Colonia" id="datosEnvio_ubicacion_colonia_input">
                </div>
                <div class="col-md-6 campoForm">
                  <input name="datosEnvio" class="form-control deshabilitado" type="text" name="" placeholder="C.P" id="datosEnvio_ubicacion_cp_input">
                </div>
              </div>
              <div class="col-md-12">
                <div class="col-md-6 campoForm">
                  <input name="datosEnvio" class="form-control deshabilitado" type="text" name="" placeholder="Ciudad" id="datosEnvio_ubicacion_ciudad_input">
                </div>
                <div class="col-md-6 campoForm">
                  <input name="datosEnvio" class="form-control deshabilitado" type="text" name="" placeholder="Pais" id="datosEnvio_ubicacion_pais_input">
                </div>
              </div>
            </form>
            </div>
            <div class="row">
              </br>
              <form>
                <div class="col-md-12">
                <h4 class="texto-bold">Empresa</h4>
                </div>
                <div class="col-md-12">
                <input name="datosEnvio"class="form-control deshabilitado" type="text" name="" placeholder="RFC">
                </div>
                <div class="col-md-12">
                <input name="datosEnvio"class="form-control deshabilitado" type="text" name="" placeholder="Nombre de quien recibe">
                </div>
                <div class="col-md-12">
                  <div class="col-md-6 campoForm">
                    <input name="datosEnvio"class="form-control deshabilitado" type="date" name="" placeholder="Fecha">
                  </div>
                  <div class="col-md-6 campoForm">
                    <select name="datosEnvio" class="form-control deshabilitado">
                      <option selected>Horario</option>
                      <option>10:00</option>
                      <option>13:00</option>
                      <option>16:00</option>
                      <option>19:00</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                
                </div>
              </form>
            </div>
            <div class="row">
              </br>
              <div class="col-md-12">
                <div class="col-md-6 campoForm">
                  <input id="envioFacturaInput" type="checkbox" name="">
                  <label>Requiero factura</label>
                </div>
                <div class="col-md-6 campoForm">
                  <a id="datosAceptar" class="linkPagar" href="#">Siguiente</a>
                </div>
              </div>
              <div class="col-md-12">
              <p>Los datos de facturación se muestran al finalizar tu compra</p>
              <p>Si continuas con el proceso de compra esta aceptando <u><a href="#">términos y condiciones</a></u></p>
              </div>
            </div>
          </div>
          <div name="datosPagos" class="col-md-3 deshabilitado col-rosa pagos">
            <h3 class="texto-bold">Pagos</h3>
            <div class="row">
              <div class="col-md-5 ">
              <h4 class="texto-bold color-rosa">Total:</h4>
              </div>
              <div class="col-md-7 ">
              <h4 class="texto-bold color-rosa">$140.00 MX</h4>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12 col-md-offset-3" style="padding-top: 20px;">
                <a class="linkPagar text-center" href="compra-aceptada.php">Stripe</a>
              </div>
              
              <div class="col-md-12 col-md-offset-3" style="padding-top: 20px;">
                <a class="linkPagar" href="compra-aceptada.php">PayPal</a>
              </div>
              <div class="col-md-12 col-md-offset-3" style="padding-top: 20px;">
                <a class="linkPagar" href="compra-aceptada.php">Conekta</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </main>
    <!--jquery-->
    <!--
    <script src="./../assets/js/jquery-3.1.0.min.js"></script> 
    <script src="./../assets/js/tether.min.js"></script>
    <script src="./../assets/bootstrap3/js/bootstrap.js"></script>   
    <script src="./../assets/js/slick.js" type="text/javascript" charset="utf-8"></script>
    <script src="./../assets/js/slick-rose.js" type="text/javascript"></script>-->
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
  <script type="text/javascript" src="./assets/js/bootbox.min.js"></script>
  <script type="text/javascript" src="./assets/js/util_mount.js"></script>

    <script type="text/javascript">
      //INCIO VARIABLES
      car_inc_usu_inp='#carritoPagar_inicio_usuario_input';
      car_inc_pas_inp='#carritoPagar_inicio_password_input';
      car_inc_sig_btn='#carritoPagar_inicio_siguiente_btn';
      car_inv_nom_inp='#carritoPagar_invitado_nombre_input';
      car_inv_ape_inp='#carritoPagar_invitado_apellidos_input';
      car_inv_cor_inp='#carritoPagar_invitado_correo_input';
      car_inv_cel_inp='#carritoPagar_invitado_celular_input';
      car_inv_fch_inp='#carritoPagar_invitado_fchnacimiento_input';
      car_inv_sig_btn='#carritoPagar_invitado_siguiente_btn';

      dat_ubi_dir_inp='#datosEnvio_ubicacion_direccion_input';
      dat_ubi_cal_inp='#datosEnvio_ubicacion_calle_input';
      dat_ubi_ext_inp='#datosEnvio_ubicacion_numext_input';
      dat_ubi_int_inp='#datosEnvio_ubicacion_numint_input';
      dat_ubi_col_inp='#datosEnvio_ubicacion_colonia_input';
      dat_ubi_cop_inp='#datosEnvio_ubicacion_cp_input';
      dat_ubi_ciu_inp='#datosEnvio_ubicacion_ciudad_input';
      dat_ubi_pai_inp='#datosEnvio_ubicacion_pais_input';
      //
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
      cp="<?php echo (isset($_SESSION['cp'])) ?  $_SESSION['cp'] :  ''; ?>";
      numint="<?php echo (isset($_SESSION['numint'])) ?  $_SESSION['numint'] :  ''; ?>";
      numext="<?php echo (isset($_SESSION['numext'])) ?  $_SESSION['numext'] :  ''; ?>";
      calle="<?php echo (isset($_SESSION['calle'])) ?  $_SESSION['calle'] :  ''; ?>";
      colonia="<?php echo (isset($_SESSION['colonia'])) ?  $_SESSION['colonia'] :  ''; ?>";
      municipio="<?php echo (isset($_SESSION['municipio'])) ?  $_SESSION['municipio'] :  ''; ?>";

      nombrePais='';
      nombreCiudad='';

      arregloNuevos= new Array();
      arregloTemporada=new Array();
      arregloClasicos=new Array();
      arregloProductoinfo = new Array();
      console.log('pais::'+pais+' ciudad::'+ciudad+' tipoServicio::'+tipoServicio+' fecha::'+fecha+' hora::'+hora+' diferenciaDias::'+diferenciaDias+' colonia::'+colonia+' idtblordencompra::'+idtblordencompra+' diasemana::'+diasemana);
      console.log('Domiclio cp::'+cp+' numint::'+numint+' numext::'+numext+' calle::'+calle+' colonia::'+colonia+' municipio::'+municipio);

      $( window ).ready(function()
      {
        console.log('documento listo');
        cargarDatosDefault();
        listener();
      });
      function cargarDatosDefault(){

        //CARGAMOS HEADER CARRITO
        cargarCarritoSuperior();  
        //CARGAMOS HEADER CARRITO
        cargarPaisYCiudad();       
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
          })
          .fail(function( jqXHR, textStatus ) {  console.log("4 fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
          .always(function(){   });
      }
      function cargarPaisYCiudad()
      {
        $.ajax({  method: "POST", dataType: "json",  url: "./../../controllers/MgetAllTblpaisANDTblciuad.php",  data: {solicitadoBy:"WEB",idtblpais:pais, idtblciudad:ciudad }  })
          .done(function( getAllTblpaisANDTblciuad ) {
            if(getAllTblpaisANDTblciuad.success>0)      
            {
              $.each(getAllTblpaisANDTblciuad.datos, function(i,item){
                nombrePais=getAllTblpaisANDTblciuad.datos[i].tblpais_nombre;
                nombreCiudad=getAllTblpaisANDTblciuad.datos[i].tblciudad_nombre;
              });
            }
          })
          .fail(function( jqXHR, textStatus ) {  console.log("4 fail jqXHR::"+jqXHR.status+" textStatus::"+textStatus);  })
          .always(function(){   });
      }
      /*
      car_inc_usu_inp
car_inc_pas_inp
car_inc_sig_btn
car_inv_nom_inp
car_inv_ape_inp
car_inv_cor_inp
car_inv_cel_inp
car_inv_fch_inp
car_inv_sig_btn
*/
      function listener()
      {
        $('a[name=registroAceptar]').click(function()
        {
          validarInvitado();
        });  
        $('#datosAceptar').click(function()
        {
          
          validarinicarSesion();
        });
      }
      function validarinicarSesion()
      {
        usuario=$(car_inc_usu_inp).val();
        password=$(car_inc_pas_inp).val();
        //validar campos vacios
        if(!funcion_campoVacio(usuario)&&!funcion_campoVacio(password))
        {
          console.log('los campos esta completos');
          pasarADatosDeEnvio();
        }
        else
        {
          console.log('los campos faltan sesion');
          bootbox.alert("Lo siento los campos no estan completos favor de verificar");
        }
      }
      function validarInvitado()
      {
        nombre=$(car_inv_nom_inp).val();
        apellido=$(car_inv_ape_inp).val();
        correo=$(car_inv_cor_inp).val();
        celular=$(car_inv_cel_inp).val();
        fechaNacimeinto=$(car_inv_fch_inp).val();
        console.log(nombre+' apellido::'+apellido+' correo::'+correo+' celular::'+celular+' fechaNacimeinto:;:'+fechaNacimeinto);
        if(!funcion_campoVacio(nombre)&&!funcion_campoVacio(apellido)&&!funcion_campoVacio(correo)&&!funcion_campoVacio(celular)&&!funcion_campoVacio(fechaNacimeinto))
        {
          console.log('los campos esta completos');
          pasarADatosDeEnvio();
        }
        else
        {
          console.log('los campos faltan invitado');
          bootbox.alert("Lo siento los campos no estan completos favor de verificar");
        }
      }
      function pasarADatosDeEnvio()
      {
        cargarDatosDeEnvio();
        console.log('registroAceptar');
        $('div[name=datosEnvio]').removeClass("deshabilitado");
        $('div[name=datosEnvio]').removeClass("col-rosa");
        $('input[name=datosEnvio]').removeClass("deshabilitado");
        $('select[name=datosEnvio]').removeClass("deshabilitado"); 
        
      }

      function pasarAPagos()
      {        
        console.log('datosAceptar');
        $('div[name=datosPagos]').removeClass("deshabilitado");
        $('div[name=datosPagos]').removeClass("col-rosa");
        $('input[name=datosPagos]').removeClass("deshabilitado");
        $('select[name=datosPagos]').removeClass("deshabilitado"); 
      }
      function cargarDatosDeEnvio()
      {       
        $(dat_ubi_dir_inp).val(calle+' '+numext+' int:'+numint+' colonia:'+colonia+' en '+nombreCiudad);
        $(dat_ubi_cal_inp).val(calle)
        $(dat_ubi_ext_inp).val(numext)
        $(dat_ubi_int_inp).val(numint)
        $(dat_ubi_col_inp).val(colonia)
        $(dat_ubi_cop_inp).val(cp)
        $(dat_ubi_ciu_inp).val(nombreCiudad)
        $(dat_ubi_pai_inp).val(nombrePais)
      }

    </script>
  </body>
</html>
<?php
echo 'hola';
?>