  <script src="js/jquery.js"></script>
  <script src="js/jquery-migrate-1.2.1.js"></script>
  <!--<script src="js/jquery-1.10.2.min.js"></script>
  <!--[if lt IE 9]>
  <html class="lt-ie9">
  <div style=' clear: both; text-align:center; position: relative;'>
    <a href="http://windows.microsoft.com/en-US/internet-explorer/..">
      <img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820"
           alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
    </a>
  </div>
  <script src="js/html5shiv.js"></script>
  <![endif]-->
 <script src="js/device.min.js"></script>
  <!-- Condicionales para Header-->
  <?php $nombre_archivo = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
//verificamos si en la ruta nos han indicado el directorio en el que se encuentra
if ( strpos($nombre_archivo, '/') !== FALSE )
    //de ser asi, lo eliminamos, y solamente nos quedamos con el nombre sin su extension
    $nombre_archivo = preg_replace('/\.php$/', '' ,array_pop(explode('/', $nombre_archivo)));
//echo $nombre_archivo;	
?>  
<?php if ($nombre_archivo == "usuario-alta" or $nombre_archivo == "usuario-recuperar-contrasena-paso-1" or $nombre_archivo == "acceso" or $nombre_archivo == "prealta" or $nombre_archivo == "carrito-lista" or $nombre_archivo == "pastelerias-en-san-luis-potosi" or $nombre_archivo == "usuario-modificar" or $nombre_archivo == "cotizador" or $nombre_archivo == "pastelerias-en-ciudad-de-mexico" or $nombre_archivo == "pastelerias-en-queretaro" or $nombre_archivo == "pastelerias-en-aguascalientes" or $nombre_archivo == "pastelerias-en-guadalajara" or $nombre_archivo == "pastelerias-en-monterrey" or $nombre_archivo == "pastelerias-en-mexicali" or $nombre_archivo == "pastelerias-en-leon" or $nombre_archivo == "pastelerias-en-puebla" or $nombre_archivo == "pastelerias-en-tijuana" or $nombre_archivo == "pastelerias-en-saltillo"){echo '<link rel="stylesheet" href="css/alta.css">
<script type="text/javascript" src="js/alta.js"></script>'
  ;}else{}?>
    <?php if ($nombre_archivo == "usuario-recuperar-contrasena"){echo '
   <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>'
  ;}else{}?>
  <?php if ($nombre_archivo == "facturacion" or $nombre_archivo == "carrito-finalizacion" or $nombre_archivo == "alta"or $nombre_archivo == "pastelerias-en-san-luis-potosi"or $nombre_archivo == "pastelerias-en-ciudad-de-mexico" or $nombre_archivo == "pastelerias-en-queretaro" or $nombre_archivo == "pastelerias-en-aguascalientes" or $nombre_archivo == "pastelerias-en-guadalajara" or $nombre_archivo == "pastelerias-en-monterrey" or $nombre_archivo == "pastelerias-en-mexicali" or $nombre_archivo == "pastelerias-en-leon" or $nombre_archivo == "pastelerias-en-puebla" or $nombre_archivo == "pastelerias-en-tijuana" or $nombre_archivo == "pastelerias-en-saltillo"){echo '
  <link rel="stylesheet" href="css/contact-form.css">
  ';}else{}?>
  