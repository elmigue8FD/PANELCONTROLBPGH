<?php require_once('connections/conextion.php'); 
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

?>
<!DOCTYPE html>
<html lang="es"><!-- InstanceBegin template="/Templates/main-bepickler.dwt.php" codeOutsideHTMLIsLocked="false" -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<head>
<?php include("includes/referenciabase.php"); ?>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Pasteler&iacute;a y Reposteria en l&iacute;nea | Be Pickler</title>
<!-- InstanceEndEditable -->
<meta charset="iso-8859-1">
  <meta name="format-detection" content="telephone=no"/>
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="css/grid.css">
  <link rel="stylesheet" href="css/jquery.fancybox.css">
  <link rel="stylesheet" href="css/style.css">
  

<?php include("includes/head.php"); ?>
</head>
<body>
<?php include("includes/afterbody.php"); ?>
<div class="page">
  <!--========================================================
                            HEADER
  =========================================================-->
<!--<header>
    <div id="stuck_container" class="stuck_container">
      <div class="container">
        <div class="brand">
          <h1 class="brand_name"> <a href="index.php"><img class="logo" src="images/logo.png" alt="Be Pickler"></a>
       <div class="pastel"><a href="index.php"></a></div>
          </h1>
        </div>

        <nav class="nav">
          <ul class="sf-menu" data-type="navbar">-->
                 <?php include("includes/sesion.php"); ?>
          <!--</ul>
        </nav>
      </div>
    </div>
  </header>-->
  <!--========================================================
                            CONTENT
  =========================================================-->
  
  <!-- InstanceBeginEditable name="contenido" -->
  <main>  
    <section class="top"></section>
    <section class="well04">
      <div class="container">
        <div class="grid_12"> 
          <h2 class="mb01">Cotizador</h2>
        </div>
        <div class="grid_12"> 
          <!--<h3 class="mb01">Pedido</h3>-_>
          <!--<div class="menu-section" id="">
          class="formacceso"-->
            <form  id="formacceso" class="form1" name="formacceso" method="POST" action="consultas/mandarCotizacion.php" enctype="multipart/form-data">
              <fieldset>
                <div class="input-wrap">
                  <label class="nombre">
                    <input type="text" name="strNombre" placeholder="Nombre(s)" value=""  id="strNombre" />
                    <span class="empty-message" id="avisoFaltaNombre">*Escribe tu(s) nombre(s).</span>
                  </label>
                  <label class="apellidos">
                    <input type="text" name="strApellidos" placeholder="Apellidos" value=""  id="strApellidos" />
                    <span class="empty-message" id="avisoFaltaApellidos">*Escribe tus apellidos.</span>
                  </label>
                </div>
                <div class="input-wrap">
                  <label class="email">
                    <input type="text" name="strEmail" placeholder="Email" value=""  id="strEmail" data-constraints="@Required @Email"/>
                    <span class="empty-message" id="avisoFaltaCorreo">*Escribe tu correo.</span>
                  </label>
                  <label class="tel&eacute;fono">
                    <input type="text" name="strTelefono" placeholder="Tel&eacute;fono" value=""  id="strTelefono" />
                    <span class="empty-message" id="avisoFaltaTelefono">*Escribe tu tel&eacute;fono.</span>
                  </label>
                </div>
                <div class="input-wrap">
                  <label class="producto">
                    <input type="text" name="strProducto" placeholder="Producto" value=""  id="strProducto"/>
                    <span class="empty-message" id="avisoFaltaProducto">*Escribe tu Producto.</span>
                  </label>
                  <label class="tipoDeEvento">
                    <input type="text" name="strTipoDeEvento" placeholder="Tipo de evento" value=""  id="strTipoDeEvento" />
                    <span class="empty-message" id="avisoFaltaTipoDeEvento">*Escribe tu tipo de evento.</span>
                  </label>
                </div>
                <div class="input-wrap">
                  <label class="fechaDelEvento">
                    <input type="date" name="strFechaDelEvento" placeholder="Fecha del evento" value=""  id="strFechaDelEvento"/>
                    <span class="empty-message" id="avisoFaltaFechaDelEvento">*Escribe la fechad de tu evento.</span>
                  </label>
                  <label class="numeroDePersonas">
                    <input type="text" name="strNumeroDePersonas" placeholder="N&uacute;mero de personas" value=""  id="strNumeroDePersonas" />
                    <span class="empty-message" id="avisoFaltaNumeroDePersonas">*Escribe el n&uacute;mero de personas.</span>
                  </label>
                </div>
                <div class="input-wrap">
                  <label class="sabor">
                    <input type="text" name="strSabor" placeholder="Sabor(es)" value=""  id="strSabor"/>
                    <span class="empty-message" id="avisoFaltaSabor">*Escribe tu(s) Sabor(es).</span>
                  </label>
                  <label class="imagen">
                    <input type="file" name="strImagen" id="strImagen" />
                    <span class="empty-message" id="avisoFaltaImagen">*Sube tu imagen.</span>
                  </label>
                </div>
                <!--<div class="input-wrap">-->
                  <label class="Comentario">
                    <textarea rows="2" id="textareareObservaciones" name="textareareObservaciones"  placeholder="Agrega tus comentarios" ></textarea>
                    <!--
                    <input type="text" name="strComentario" placeholder="Comentario" value=""  id="strComentario"/>
                    <span class="empty-message" id="avisoFaltaProducto">*Escribe tu Comentario.</span>-->
                  </label>
                  <div class="g-recaptcha" data-sitekey="6LeM3hEUAAAAALWHOn_pASC6p9suDW3QXB2SAwtd"></div>
                <!--</div>-->
                <!--<input type="submit" name="button" id="button" value="Agregar" class="btn" />-->
                <!--<input type="submit" name="button" id="button" value="Cotizar" class="btn" />-->
                <input type="button" name="button" id="button" value="Cotizar" class="btn" onclick="validarFormulario()" />
              </fieldset>
            </form>
          <!--</div>-->
        </div>
        
      </div>      
    </section>
  </main>
  <!-- InstanceEndEditable -->
  
  <!--========================================================
                            FOOTER
  =========================================================-->
  <?php include("includes/footer.php"); ?>
</div>
<!-- InstanceBeginEditable name="afterendbody" --><!-- InstanceEndEditable -->
<script type="text/javascript">
  function validarFormulario(){
    var strNombre='';
    var strApellidos='';
    var strEmail='';
    var strTelefono='';
    var strProducto='';
    var strTipoDeEvento='';
    var strFechaDelEvento='';
    var strNumeroDePersonas='';
    var strSabor='';
    var strImagen='';
    var strComentario='';
    var errorDefinicionForm=0;
    var valoresVacios=0;
     $("#avisoFaltaNombre").hide("fast");
     $("#avisoFaltaApellidos").hide("fast");
     $("#avisoFaltaCorreo").hide("fast");
     $("#avisoFaltaTelefono").hide("fast");
     $("#avisoFaltaProducto").hide("fast");
     $("#avisoFaltaTipoDeEvento").hide("fast");
     $("#avisoFaltaFechaDelEvento").hide("fast");
     $("#avisoFaltaNumeroDePersonas").hide("fast");
     $("#avisoFaltaSabor").hide("fast");
     $("#avisoFaltaImagen").hide("fast");
    if(document.getElementById('strNombre')){strNombre=document.getElementById('strNombre');}else{errorDefinicionForm=1;}
    if(document.getElementById('strApellidos')){strApellidos=document.getElementById('strApellidos');}else{errorDefinicionForm=2;}
    if(document.getElementById('strEmail')){strEmail=document.getElementById('strEmail');}else{errorDefinicionForm=3;}
    if(document.getElementById('strTelefono')){strTelefono=document.getElementById('strTelefono');}else{errorDefinicionForm=4;}
    if(document.getElementById('strProducto')){strProducto=document.getElementById('strProducto');}else{errorDefinicionForm=5;}
    if(document.getElementById('strTipoDeEvento')){strTipoDeEvento=document.getElementById('strTipoDeEvento');}else{errorDefinicionForm=6;}
    if(document.getElementById('strFechaDelEvento')){strFechaDelEvento=document.getElementById('strFechaDelEvento');}else{errorDefinicionForm=7;}
    if(document.getElementById('strNumeroDePersonas')){strNumeroDePersonas=document.getElementById('strNumeroDePersonas');}else{errorDefinicionForm=8;}
    if(document.getElementById('strSabor')){strSabor=document.getElementById('strSabor');}else{errorDefinicionForm=9;}
    if(document.getElementById('strImagen')){strImagen=document.getElementById('strImagen');}else{errorDefinicionForm=10;}
    if(document.getElementById('textareareObservaciones')){strComentario=document.getElementById('textareareObservaciones');}else{errorDefinicionForm=11;}
    //alert('iamgen::'+strImagen.value);
    if(errorDefinicionForm==0){
      //alert('no hay error');
      if(strNombre.value==''){
         $("#avisoFaltaNombre").show("fast");
         valoresVacios=1;
      }
      if(strApellidos.value==''){
         $("#avisoFaltaApellidos").show("fast");
         valoresVacios=2;
      }
      if(strEmail.value==''){
         $("#avisoFaltaCorreo").show("fast");
         valoresVacios=3;
      }
      if(strTelefono.value==''){
         $("#avisoFaltaTelefono").show("fast");
         valoresVacios=4;
      }
      if(strProducto.value==''){
         $("#avisoFaltaProducto").show("fast");
         valoresVacios=5;
      }
      if(strTipoDeEvento.value==''){
         $("#avisoFaltaTipoDeEvento").show("fast");
         valoresVacios=6;
      }
      if(strFechaDelEvento.value==''){
         //$("#avisoFaltaFechaDelEvento").show("fast");
         valoresVacios=7;
      }
      if(strNumeroDePersonas.value==''){
         $("#avisoFaltaNumeroDePersonas").show("fast");
         valoresVacios=8;
      }
      if(strSabor.value==''){
         $("#avisoFaltaSabor").show("fast");
         valoresVacios=9;
      }
      if(strImagen.value==''){
         $("#avisoFaltaImagen").show("fast");
         valoresVacios=10;
      }
      if(valoresVacios==0){
        alert('Tu cotización ha sido enviada')
        document.getElementById('formacceso').submit();
      }else{
        //alert('valores vacions hasta::'+valoresVacios);
      }
    }else{
      //alert('errror en la definicion'+errorDefinicionForm);
    }
  }
</script>
</body>
<!-- InstanceEnd --></html>
<?php	mysql_free_result($ConsultaFuncion);	?>