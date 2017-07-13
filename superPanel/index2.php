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
        <link rel="stylesheet" href="../bower_components/chartist/dist/chartist.min.css">
        <!-- chartist 
        <link rel="stylesheet" href="../bower_components/chartist/dist/chartist.min.css">  -->

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

    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	
</head>
<body class="sidebar_main_open sidebar_main_swipe">
    <!-- main header -->
    <!-- main header end -->
	
	<?php include("../codigo_general/menuPanel.php"); ?>
   
    <!-- inicia aside-->
	<!-- fin del aside.............................  -->
	
   
    <div id="page_content">
	<div id="page_content_inner"> 						
		<div id="settings_users" >
            
			<div>						
			    <div class="uk-grid uk-grid-width-large" data-uk-grid-margin>                    
				<div>
                    <div>
                        <div class="md-card">
                            <div class="md-card-content">
                                <h1>Bienvenido</h1>
                                <h3 class="uk-margin-remove"><span>Llena los campos para visualizar una gráfica</span></h3><br>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-3">
                                        <div class="md-input-wrapper md-input-filled">
                                            <select class="md-input" id="criterio" onChange="mostrarCtegoriaSelect()">
                                                <option value="1" disabled="" selected="" hidden="" >Selecciona criterio</option>
                                                <option value="a">Pedidos</option>
                                                <option value="b">Ventas totales</option>
                                                <option value="c">Utilidades de comisi&oacute;n de productos</option>
                                                <option value="d">Ventas totales por Delivery</option>
                                                <option value="e">Utilidades por comisi&oacute;n en Delivery</option>
                                                <option value="f">Cotizaciones</option>
                                                <option value="g">Usuarios</option>
                                                <option value="h">Proveedores</option>
                                                <option value="i">Productos por categor&iacute;a</option>
                                                <option value="j">Productos por proveedor </option>
                                                <option value="l" >Categor&iacute;a por proveedor </option>
                                                <option value="k">Facturaci&oacute;n</option>
                                            </select>
                                        </div>                                                   
                                    </div> 
                                    <div class="uk-width-medium-1-3">
                                        <label class="heading_c">Fecha de inicio</label> 
                                        <input class="md-input"  type="text" id="fchinicio" data-uk-datepicker="{format:'YYYY/MM/DD'}"  >
                                    </div>
                                    <div class="uk-width-medium-1-3">
                                        <label class="heading_c">Fecha final</label>
                                        <input class="md-input" type="text" id="fchfinal" data-uk-datepicker="{format:'YYYY/MM/DD', maxDate:0}">
                                    </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-3">
                                            <div class="uk-grid">
                                                <label class="heading_c">Tipo de gr&aacute;fico</label>
                                                <br><br>
                                                <div class="md-input-wrapper md-input-filled">
                                                    <span class="icheck-inline">
                                                        <input name="tgrafico" class="iradio_md checked" id="columnas" type="radio" value="columnas"  data-md-icheck/>
                                                        <label for="radio_demo_1" class="inline-label">De barras</label>
                                                    </span>
                                                    <span class="icheck-inline">
                                                        <input name="tgrafico" id="pastel" class="iradio_md" type="radio" value="pastel"  data-md-icheck/>
                                                        <label for="radio_demo_2" class="inline-label">De pastel </label>
                                                    </span>
                                                    <span class="icheck-inline">
                                                        <input name="tgrafico" id="lineas" class="iradio_md" type="radio" value="lineas"  data-md-icheck/>
                                                        <label for="radio_demo_3" class="inline-label">De l&iacute;neas</label>
                                                    </span>
                                                        
                                                        
                                                </div>  
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-3">
                                            <div class="md-input-wrapper md-input-filled">
                                                <select class="md-input" id="categoriaSelect" >
                                                    <option value="0" disabled="" selected="" hidden="" >Seleccione una categoria</option>
                                                </select>
                                            </div>
                                        </div>                        
                                        <div class="uk-width-medium-1-3">
                                            <p>.</p>
                                            <button class="md-btn md-btn-primary md-btn-block md-btn-wave-light" type="button" data-uk-button="" onClick="seleccionGrafica()">Graficar</button>
                                        </div>                                 
                                </div>
                            </div>
                        </div>
                    </div>                
                </div>		
			    </div>
			</div>
            <div>.</div>
            <div>                       
                <div class="uk-grid uk-grid-width-large" data-uk-grid-margin>                    
                <div>
                    <div>
                        <div class="md-card">
                            <div class="md-card-content">
                                <h2 class="uk-margin-remove" id="nombreGrafica"><span></span></h2><br>
                                <div id="grafica"></div>
                            </div>
                        </div>
                    </div>                
                </div>      
                </div>
            </div>                        
		</div>								
    </div>
    </div>
			
	<!-- ::::::::::::::::::::::::::::::::::::::::::::::::::::::::  -->
    <?php include('../codigo_general/script_commonPB.php'); ?>
    
    <script type="text/javascript">
    /*Se carga el modulo que se va a utilizar en este caso visualization,
    seguido de la versión y el paquete que ses corechart para la grafica*/
    google.load("visualization", "1", {packages:["corechart"],'language': 'es'});

    var opcion_seleccionada;
    var grafico;
    var provedoresArray = new Array();
     var categoriasArray = new Array();

     $( window ).ready(function()
    {
       // console.log('pagina lista');
       document.getElementById('categoriaSelect').style.display = "none";
        obtenerProvedores();
        obtenerCategorias();
    });

     function mostrarCtegoriaSelect(){

        opcion_seleccionada = $("#criterio option:selected").val();

        if(opcion_seleccionada=="l"){
            document.getElementById('categoriaSelect').style.display = "block";

        }else{
            document.getElementById('categoriaSelect').style.display = "none";
        }

     }

    function obtenerProvedores(){

        $.ajax({ 
           method: "POST",
           dataType: "json",
           url: "../../../controllers/getAllTblproveedoraAct.php",
           data: {solicitadoBy:"WEB"}}) //Se pone el nombre de la variable del método POST más dos puntos seguido del valor que tiene
                .done(function(msg4){

                     $.each(msg4.datos, function (i,item)
                     {

                        provedoresArray[i]= new Array(2); 
                        provedoresArray[i][0]=item.idtblproveedor;
                        provedoresArray[i][1]=item.tblproveedor_nombre;
                        
                        //console.log(provedoresArray[i][0]);
                        //console.log(provedoresArray[i][1]);
                     }
                     );
  
                       
                  }) //final del done
          .fail(function( jqXHR, textStatus ) {  console.log("fail pedido jqXHR::"+jqXHR+" textStatus::"+textStatus);})
          .always(function(){  console.log("always");});

    }

    function obtenerCategorias(){

        $.ajax({ 
           method: "POST",
           dataType: "json",
           url: "../../../controllers/getAllTblcategproductAct.php",
           data: {solicitadoBy:"WEB"}}) //Se pone el nombre de la variable del método POST más dos puntos seguido del valor que tiene
                .done(function(msg4){

                     $.each(msg4.datos, function (i,item)
                     {

                        categoriasArray[i]= new Array(2); 
                        categoriasArray[i][0]=item.idtblcategproduct;
                        categoriasArray[i][1]=item.tblcategproduct_nombre;
                        //console.log(categoriasArray[i][0]);
                        //console.log(categoriasArray[i][1]);
                        $("#categoriaSelect").append('<option value="' + item.idtblcategproduct +'">' + item.tblcategproduct_nombre + '</option>');
                     }
                     );
  
                       
                  }) //final del done
          .fail(function( jqXHR, textStatus ) {  console.log("fail pedido jqXHR::"+jqXHR+" textStatus::"+textStatus);})
          .always(function(){  console.log("always");});

    }





    function seleccionGrafica() //Esta función seleccionará la función a graficar según el criterio elegido.
    {

        var criterio=document.getElementById("criterio").value;
        opcion_seleccionada = $("#criterio option:selected").text();
        document.getElementById("grafica").innerHTML="";


        

        fchinicioVal = document.getElementById("fchinicio").value.length;
        fchfinalVal = document.getElementById("fchfinal").value.length;

        tipograficaVal = $('input[name=tgrafico]:checked').val();      
       
        if(criterio!=1 && fchinicioVal>8 && fchfinalVal>8 && tipograficaVal!=null){
            
            //document.getElementById("nombreGrafica").innerHTML="Grafica de "+opcion_seleccionada;

            //

            var tgrafico = $('input[name=tgrafico]:checked').val();
            switch(tgrafico)
            {
            case 'columnas':    
            grafico = new google.visualization.ColumnChart(document.getElementById('grafica'));            
            break;
            
            case 'pastel':
            grafico = new google.visualization.PieChart(document.getElementById('grafica'));
            break;
            
            case 'lineas':
            grafico = new google.visualization.LineChart(document.getElementById('grafica'));
            } 

        switch(criterio)
        {
            case 'a':pedido();
            
            break;
            
            case 'b':ventas();
            break;
            
            case 'c':utilComVen();
            break;
            
            case 'd':ventasDelivery();
            break;
            
            case 'e':utilidadesCDelivery();
            break;
            
            case 'f':cotizaciones();
            break;
            
            case 'g':usuarios();
            break;
            
            case 'h':proveedores();
            break;
             
            case 'i':productocategoria();
            break; 
            
            case 'j':productoproveedor();
            break;
            
            case 'k':facturacion();
            break;
            
            case 'l':categoriaproveedor();
            break;                      
                                    
            default: UIkit.modal.alert("No se seleccionó ningún criterio");
            break;
        }

        }else{
            UIkit.modal.alert("Se deben completar los campos solicitados para poder visualizar la gráfica.");
        }



    }// Fin de selección de gráfica


    //Gráfica para la función de pedidos
    function pedido()
    {


        var fch;
        var fechi=document.getElementById("fchinicio").value;
        var fechf=document.getElementById("fchfinal").value;
        
        var pedidosHechos=0;
        var pedidosNoHechos=0;
        
        var pedidosEnero=[0,0];
        var pedidosFebrero=[0,0];
        var pedidosMarzo=[0,0];
        var pedidosAbril=[0,0];
        var pedidosMayo=[0,0];
        var pedidosJunio=[0,0];
        var pedidosJulio=[0,0];
        var pedidosAgosto=[0,0];
        var pedidosSeptiembre=[0,0];
        var pedidosOctubre=[0,0];
        var pedidosNoviembre=[0,0];
        var pedidosDiciembre=[0,0];       
        
                    
    var fchinicio=fechi; //igualar a datepickers
    var fchfinal=fechf;
        $.ajax({ 
           method: "POST",
           dataType: "json",
           url: "../../../controllers/getTblOrdenCompraGrafico.php",
           data: {solicitadoBy:"WEB", fchinicio:fchinicio, fchfinal:fchfinal}}) //Se pone el nombre de la variable del método POST más dos puntos seguido del valor que tiene
                .done(function(msg4){

                    if(msg4.success =="0"){
                       UIkit.modal.alert("¡Ups! Posiblemente no se pudo obtener datos precios debido al rango de fechas ingresadas.");
                    }else{                 

                     $.each(msg4.datos, function (i,item)
                     {                  
                    
                        estatus=item.tblordencompra_statuspagado;
                        //console.log(estatus);
                        fecha=item.tblordencompra_fchordencompra;
                        fch=new Date (fecha);
                        var fech=fch.getMonth();
                    
                    
                        switch(fech){
                            case 0:
                                if (estatus==1)
                                {
                                    pedidosEnero[0]+=1;
                                }
                                else{
                                    pedidosEnero[1]+=1;
                                }
                                break;
                            case 1:
                                if (estatus==1)
                                {
                                    pedidosFebrero[0]+=1;
                                }
                                else{
                                    pedidosFebrero[1]+=1;
                                }
                                break;
                            case 2:
                                if (estatus==1)
                                {
                                    pedidosMarzo[0]+=1;
                                }
                                else{
                                    pedidosMarzo[1]+=1;
                                }
                                break;
                            case 3:
                                if (estatus==1)
                                {
                                    pedidosAbril[0]+=1;
                                }
                                else{
                                    pedidosAbril[1]+=1;
                                }
                                break;
                            case 4:
                                if (estatus==1)
                                {
                                    pedidosMayo[0]+=1;
                                }
                                else{
                                    pedidosMayo[1]+=1;
                                }
                                break;
                                
                            case 5:
                                if (estatus==1)
                                {
                                    pedidosJunio[0]+=1;
                                }
                                else{
                                    pedidosJunio[1]+=1;
                                }
                                break;
                            case 6:
                                if (estatus==1)
                                {
                                    pedidosJulio[0]+=1;
                                }
                                else{
                                    pedidosJulio[1]+=1;
                                }
                                break;
                            case 7:
                                if (estatus==1)
                                {
                                    pedidosAgosto[0]+=1;
                                }
                                else{
                                    pedidosAgosto[1]+=1;
                                }
                                break;
                            case 8:
                                if (estatus==1)
                                {
                                    pedidosSeptiembre[0]+=1;
                                }
                                else{
                                    pedidosSeptiembre[1]+=1;
                                }
                                break;
                            case 9:
                                if (estatus==1)
                                {
                                    pedidosOctubre[0]+=1;
                                }
                                else{
                                    pedidosOctubre[1]+=1;
                                }
                                break;
                            case 10:
                                if (estatus==1)
                                {
                                    pedidosNoviembre[0]+=1;
                                }
                                else{
                                    pedidosNoviembre[1]+=1;
                                }
                                break;
                            case 11:
                                if (estatus==1)
                                {
                                    pedidosDiciembre[0]+=1;
                                }
                                else{
                                    pedidosDiciembre[1]+=1;
                                }
                                break;
                        }

                        
                    });
                        

        
        var data = new google.visualization.DataTable();
          data.addColumn('string', 'Mes') //Primera columna es la leyenda de todo el gráfico
          data.addColumn('number', 'Pedidos Concretados');
          data.addColumn('number', 'Pedidos No Concretados');
          
          data.addRows([
            ["Enero", pedidosEnero[0], pedidosEnero[1]], 
            ["Febrero", pedidosFebrero[0], pedidosFebrero[1]],
            ["Marzo", pedidosMarzo[0], pedidosMarzo[1]],
            ["Abril", pedidosAbril[0], pedidosAbril[1]],
            ["Mayo", pedidosMayo[0], pedidosMayo[1]],
            ["Junio", pedidosJunio[0], pedidosJunio[1]],
            ["Julio", pedidosJulio[0], pedidosJulio[1]],
            ["Agosto", pedidosAgosto[0], pedidosAgosto[1]],
            ["Septiembre", pedidosSeptiembre[0], pedidosSeptiembre[1]],
            ["Octubre", pedidosOctubre[0], pedidosOctubre[1]],
            ["Noviembre", pedidosNoviembre[0], pedidosNoviembre[1]],
            ["Diciembre", pedidosDiciembre[0], pedidosDiciembre[1]]
            ]);   



          var opciones = {
            title:opcion_seleccionada,titleTextStyle: {color: '#DD5465',fontSize: 25},
            hAxis: {title: 'Meses', titleTextStyle: {color: '#DD5465',fontSize: 15}},
            vAxis: {title: 'Cantidad de Pedidos', titleTextStyle: {color: '#DD5465',fontSize: 15}},
            backgroundColor:'#FFF',
            colors: ['#000', '#DD5465'],
            legend:{position: 'right', textStyle: {color: '#DD5465', fontSize: 15}},
            width:1000,
            height:500
        };
        
                grafico.draw(data, opciones);
           
             }    
                       
                  }) //final del done
          .fail(function( jqXHR, textStatus ) {  console.log("fail pedido jqXHR::"+jqXHR+" textStatus::"+textStatus);})
          .always(function(){  console.log("always");});
    }


    //gráfica para ventas
    function ventas()
    {
        var fch;
        var fechi=document.getElementById("fchinicio").value;
        var fechf=document.getElementById("fchfinal").value;
        
        var ventasTotales=0;
        
        var utilEnero=0;
        var utilFebrero=0;
        var utilMarzo=0;
        var utilAbril=0;
        var utilMayo=0;
        var utilJunio=0;
        var utilJulio=0;
        var utilAgosto=0;
        var utilSeptiembre=0;
        var utilOctubre=0;
        var utilNoviembre=0;
        var utilDiciembre=0;

        
        
        var fchinicio=fechi; //igualar a datepickers
        var fchfinal=fechf;

        $.ajax({ 
           method: "POST",
           dataType: "json",
           url: "../../../controllers/getTblOrdenCompraGrafico.php",
           data: {solicitadoBy:"WEB", fchinicio:fchinicio, fchfinal:fchfinal}}) //Se pone el nombre de la variable del método POST más dos puntos seguido del valor que tiene
                .done(function(msg4){


                    if(msg4.success =="0"){
                        UIkit.modal.alert("¡Ups! Posiblemente no se pudo obtener datos precios debido al rango de fechas ingresadas.");
                    }else{
                        $.each(msg4.datos, function (i,item)
                        {
                            v=item.tblordencompra_totalordencompra;
                            var ventas=v*1000;
                            ventasTotales+=ventas;
                    
                            fecha=item.tblordencompra_fchordencompra;
                            fch=new Date (fecha);
                            var fech=fch.getMonth();
                     
                            switch(fech)
                            {
                                case 0:
                                    utilEnero+=ventas;
                                    break;
                                case 1:
                                    utilFebrero+=ventas;
                                    break;
                                case 2:
                                    utilMarzo+=ventas;
                                    break;
                                case 3:
                                    utilAbril+=ventas;
                                    break;
                                case 4:
                                    utilMayo+=ventas;
                                    break;
                                case 5:
                                    utilJunio+=ventas;
                                    break;
                                case 6:
                                    utilJulio+=ventas;
                                    break;
                                case 7:
                                    utilAgosto+=ventas;
                                    break;
                                case 8:
                                    utilSeptiembre+=ventas;
                                    break;
                                case 9:
                                    utilOctubre+=ventas;
                                    break;
                                case 10:
                                    utilNoviembre+=ventas;
                                    break;
                                case 11:
                                    utilDiciembre+=ventas;
                                    break;
                             }

                        });

                         var data = new google.visualization.DataTable();
                            data.addColumn('string', 'Mes') //Primera columna es la leyenda de todo el gráfico
                        data.addColumn('number', 'Ventas totales realizadas');
                        data.addRows([
                        ["Enero", utilEnero], 
                        ["Febrero", utilFebrero],
                        ["Marzo", utilMarzo],
                        ["Abril", utilAbril],
                        ["Mayo", utilMayo],
                        ["Junio", utilJunio],
                        ["Julio", utilJulio],
                        ["Agosto", utilAgosto],
                        ["Septiembre", utilSeptiembre],
                        ["Octubre", utilOctubre],
                        ["Noviembre", utilNoviembre],
                        ["Diciembre", utilDiciembre]
                        ]); 

                        var opciones = {
                        title:opcion_seleccionada,titleTextStyle: {color: '#DD5465',fontSize: 25},
                        hAxis: {title: 'Meses', titleTextStyle: {color: '#DD5465',fontSize: 15}},
                        vAxis: {title: 'Cantidad', titleTextStyle: {color: '#DD5465',fontSize: 15} },
                        backgroundColor:'#FFF',
                        colors: ['#000', '#DD5465'],
                        legend:{position: 'right', textStyle: {color: '#DD5465', fontSize: 15}},
                        width:1000,
                        height:500
                        };
                        opciones['vAxis']['format'] = 'decimal';           
                
                        grafico.draw(data, opciones);     

                }}) //final del done
          .fail(function( jqXHR, textStatus ) {  console.log("fail pedido jqXHR::"+jqXHR+" textStatus::"+textStatus);})
          .always(function(){  console.log("always");});
        
    } //Fin de la función ventas

    //Gráfica para las utilidades por producto vendido
    function utilComVen()
    {
        var fch;
        var fechi=document.getElementById("fchinicio").value;
        var fechf=document.getElementById("fchfinal").value;
        //var barras=[];
        var ventasComision=0;
        
        //Arreglo o variable de cada mes donde guardaremos la información
        var utilEnero=0;
        var utilFebrero=0;
        var utilMarzo=0;
        var utilAbril=0;
        var utilMayo=0;
        var utilJunio=0;
        var utilJulio=0;
        var utilAgosto=0;
        var utilSeptiembre=0;
        var utilOctubre=0;
        var utilNoviembre=0;
        var utilDiciembre=0;
        
        var fchinicio=fechi; //igualar a datepickers
        var fchfinal=fechf;
        $.ajax({ 
           method: "POST",
           dataType: "json",
           url: "../../../controllers/getTblproductdetalleGrafico.php",
           data: {solicitadoBy:"WEB", fchinicio:fchinicio, fchfinal:fchfinal}}) //Se pone el nombre de la variable del método POST más dos puntos seguido del valor que tiene
                .done(function(msg4){

                    if(msg4.success =="0"){
                        UIkit.modal.alert("¡Ups! Posiblemente no se pudo obtener datos precios debido al rango de fechas ingresadas.");
                    }else{

                        $.each(msg4.datos, function (i,item)
                        {
                            precioreal=item.tblcarritoproduct_precioreal;
                            ventasComision=(precioreal*0.1*1.16)*1000;
                            //ventasComision+=ventasComision;
                            console.log(ventasComision);
                
                        fecha=item.tblcarritoproduct_fchcreacion;
                        fch=new Date (fecha);
                        var fech=fch.getMonth();
                         
                         switch(fech)
                         {
                            case 0:
                                utilEnero+=ventasComision;
                                break;
                            case 1:
                                utilFebrero+=ventasComision;
                                break;
                            case 2:
                                utilMarzo+=ventasComision;
                                break;
                            case 3:
                                utilAbril+=ventasComision;
                                break;
                            case 4:
                                utilMayo+=ventasComision;
                                break;
                            case 5:
                                utilJunio+=ventasComision;
                                break;
                            case 6:
                                utilJulio+=ventasComision;
                                break;
                            case 7:
                                utilAgosto+=ventasComision;
                                break;
                            case 8:
                                utilSeptiembre+=ventasComision;
                                break;
                            case 9:
                                utilOctubre+=ventasComision;
                                break;
                            case 10:
                                utilNoviembre+=ventasComision;
                                break;
                            case 11:
                                utilDiciembre+=ventasComision;
                                break;
                         }
                         });
                            //barras[0]=new Array (fch, ventasComision);

            
                        var data = new google.visualization.DataTable();
                          data.addColumn('string', 'Fechas') //Primera columna es la leyenda de todo el gráfico
                          data.addColumn('number', 'Comisiones de ventas');
                         
                          
                          data.addRows([
                          ["Enero", utilEnero], 
                          ["Febrero", utilFebrero],
                          ["Marzo", utilMarzo],
                          ["Abril", utilAbril],
                          ["Mayo", utilMayo],
                          ["Junio", utilJunio],
                          ["Julio", utilJulio],
                          ["Agosto", utilAgosto],
                          ["Septiembre", utilSeptiembre],
                          ["Octubre", utilOctubre],
                          ["Noviembre", utilNoviembre],
                          ["Diciembre", utilDiciembre]
                          ]);   

                         var opciones = {
                            title:opcion_seleccionada,titleTextStyle: {color: '#DD5465',fontSize: 25},
                            hAxis: {title: 'Meses', titleTextStyle: {color: '#DD5465',fontSize: 15}},
                            vAxis: {title: 'Cantidad', titleTextStyle: {color: '#DD5465',fontSize: 15} },
                            backgroundColor:'#FFF',
                            colors: ['#000', '#DD5465'],
                            legend:{position: 'right', textStyle: {color: '#DD5465', fontSize: 15}},
                            width:1000,
                            height:500
                            };
                            opciones['vAxis']['format'] = 'decimal';           
                                    
                            grafico.draw(data, opciones);   
                    }       
                   
              }) //final del done
      .fail(function( jqXHR, textStatus ) {  console.log("fail pedido jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      .always(function(){  console.log("always");});
    }//fin ventas por comisión


    //Gráfica para ventas totales del Delivery
function ventasDelivery()
{
    var fch;
    var fechi=document.getElementById("fchinicio").value;
    var fechf=document.getElementById("fchfinal").value;
    
    var vEnero=0;
    var vFebrero=0;
    var vMarzo=0;
    var vAbril=0;
    var vMayo=0;
    var vJunio=0;
    var vJulio=0;
    var vAgosto=0;
    var vSeptiembre=0;
    var vOctubre=0;
    var vNoviembre=0;
    var vDiciembre=0;

    
    var ventasDelivery=0;
    
    var fchinicio=fechi; //igualar a datepickers
var fchfinal=fechf;
    $.ajax({ 
       method: "POST",
       dataType: "json",
       url: "../../../controllers/getTblVentasDelivery.php",
       data: {solicitadoBy:"WEB", fchinicio:fchinicio, fchfinal:fchfinal}}) //Se pone el nombre de la variable del método POST más dos puntos seguido del valor que tiene
            .done(function(msg4){

                if(msg4.success =="0"){
                        UIkit.modal.alert("¡Ups! Posiblemente no se pudo obtener datos precios debido al rango de fechas ingresadas.");
                        }else{



                 $.each(msg4.datos, function (i,item)
                 {
                v=item.tblordencompra_totaldelivery;
                var ventas=v*1000;
                //ventasDelivery+=ventas;
                //console.log(ventasDelivery);
                fecha=item.tblordencompra_fchordencompra;
                 fch=new Date (fecha);
                 var fech=fch.getMonth();
                 
                 switch(fech)
                 {
                    case 0:
                        vEnero+=ventas;
                        break;
                    case 1:
                        vFebrero+=ventas;
                        break;
                    case 2:
                        vMarzo+=ventas;
                        break;
                    case 3:
                        vAbril+=ventas;
                        break;
                    case 4:
                        vMayo+=ventas;
                        break;
                    case 5:
                        vJunio+=ventas;
                        break;
                    case 6:
                        vJulio+=ventas;
                        break;
                    case 7:
                        vAgosto+=ventas;
                        break;
                    case 8:
                        vSeptiembre+=ventas;
                        break;
                    case 9:
                        vOctubre+=ventas;
                        break;
                    case 10:
                        vNoviembre+=ventas;
                        break;
                    case 11:
                        vDiciembre+=ventas;
                        break;
                 }

                 });
                    

    
    var data = new google.visualization.DataTable();
      data.addColumn('string', 'Mes') //Primera columna es la leyenda de todo el gráfico
      data.addColumn('number', 'Ventas totales de Delivery');
     
      
      data.addRows([
      ["Enero", vEnero], 
      ["Febrero", vFebrero],
      ["Marzo", vMarzo],
      ["Abril", vAbril],
      ["Mayo", vMayo],
      ["Junio", vJunio],
      ["Julio", vJulio],
      ["Agosto", vAgosto],
      ["Septiembre", vSeptiembre],
      ["Octubre", vOctubre],
      ["Noviembre", vNoviembre],
      ["Diciembre", vDiciembre]
      ]);   

     var opciones = {
                            title:opcion_seleccionada,titleTextStyle: {color: '#DD5465',fontSize: 25},
                            hAxis: {title: 'Meses', titleTextStyle: {color: '#DD5465',fontSize: 15}},
                            vAxis: {title: 'Cantidad', titleTextStyle: {color: '#DD5465',fontSize: 15} },
                            backgroundColor:'#FFF',
                            colors: ['#000', '#DD5465'],
                            legend:{position: 'right', textStyle: {color: '#DD5465', fontSize: 15}},
                            width:1000,
                            height:500
                            };
                            opciones['vAxis']['format'] = 'decimal';           
                                    
                            grafico.draw(data, opciones);  
            }  
                   
              }) //final del done
      .fail(function( jqXHR, textStatus ) {  console.log("fail pedido jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      .always(function(){  console.log("always");});
    
} //Fin de la función ventas


    //Gráfica para comisión de Delivery
    function utilidadesCDelivery()
    {
        var fch;
        var fechi=document.getElementById("fchinicio").value;
        var fechf=document.getElementById("fchfinal").value;
        
        //variables dónde almacenr  
        var utilEnero=0;
        var utilFebrero=0;
        var utilMarzo=0;
        var utilAbril=0;
        var utilMayo=0;
        var utilJunio=0;
        var utilJulio=0;
        var utilAgosto=0;
        var utilSeptiembre=0;
        var utilOctubre=0;
        var utilNoviembre=0;
        var utilDiciembre=0;

    
        var comisionDelivery=0;
    
        var fchinicio=fechi; //igualar a datepickers
        var fchfinal=fechf;
            $.ajax({ 
               method: "POST",
               dataType: "json",
               url: "../../../controllers/getTblVentasDelivery.php",
               data: {solicitadoBy:"WEB", fchinicio:fchinicio, fchfinal:fchfinal}}) //Se pone el nombre de la variable del método POST más dos puntos seguido del valor que tiene
                    .done(function(msg4){

                        if(msg4.success =="0"){
                        UIkit.modal.alert("¡Ups! Posiblemente no se pudo obtener datos precios debido al rango de fechas ingresadas.");
                        }else{

                             $.each(msg4.datos, function (i,item)
                             {
                             vd=item.tblordencompra_totaldelivery;
                             console.log(vd);
                             if(vd>0){
                                var v=(((vd-4.64)/1.0522)*0.15)*1000;

                             }else{
                                var v =0;
                             }
                             
                            
                            //comisionDelivery+=v;
                            //console.log(comisionDelivery);
                            fecha=item.tblordencompra_fchordencompra;
                             fch=new Date (fecha);
                             
                            var fech=fch.getMonth();
                             
                             switch(fech)
                             {
                                case 0:
                                    utilEnero+=v;
                                    break;
                                case 1:
                                    utilFebrero+=v;
                                    break;
                                case 2:
                                    utilMarzo+=v;
                                    break;
                                case 3:
                                    utilAbril+=v;
                                    break;
                                case 4:
                                    utilMayo+=v;
                                    break;
                                case 5:
                                    utilJunio+=v;
                                    break;
                                case 6:
                                    utilJulio+=v;
                                    break;
                                case 7:
                                    utilAgosto+=v;
                                    break;
                                case 8:
                                    utilSeptiembre+=v;
                                    break;
                                case 9:
                                    utilOctubre+=v;
                                    break;
                                case 10:
                                    utilNoviembre+=v;
                                    break;
                                case 11:
                                    utilDiciembre+=v;
                                    break;
                             }

                             
                             
                             });
                                

                
                var data = new google.visualization.DataTable();
                  data.addColumn('string', 'Mes') //Primera columna es la leyenda de todo el gráfico
                  data.addColumn('number', 'Comisiones de Delivery');
                 
                  
                  data.addRows([
                  ["Enero", utilEnero], 
                  ["Febrero", utilFebrero],
                  ["Marzo", utilMarzo],
                  ["Abril", utilAbril],
                  ["Mayo", utilMayo],
                  ["Junio", utilJunio],
                  ["Julio", utilJulio],
                  ["Agosto", utilAgosto],
                  ["Septiembre", utilSeptiembre],
                  ["Octubre", utilOctubre],
                  ["Noviembre", utilNoviembre],
                  ["Diciembre", utilDiciembre]

                  
                  ]);   

                 var opciones = {
                    title:opcion_seleccionada,titleTextStyle: {color: '#DD5465',fontSize: 25},
                    hAxis: {title: 'Meses', titleTextStyle: {color: '#DD5465',fontSize: 15}},
                    vAxis: {title: 'Cantidad', titleTextStyle: {color: '#DD5465',fontSize: 15}},
                    backgroundColor:'#FFF',
                    colors: ['#000', '#DD5465'],
                    legend:{position: 'right', textStyle: {color: '#DD5465', fontSize: 15}},
                    width:1000,
                    height:500
                    };
                    opciones['vAxis']['format'] = 'decimal';           
                            
                    grafico.draw(data, opciones);

                }    

                   
              }) //final del done
      .fail(function( jqXHR, textStatus ) {  console.log("fail pedido jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      .always(function(){  console.log("always");});
    
    } //Fin de la función ventas

    //función para cotizaciones
function cotizaciones()
{
    var fch;
    var fechi=document.getElementById("fchinicio").value;
    var fechf=document.getElementById("fchfinal").value;
    
    var cotizacionRespondida=0; //aquí se guardarán los valores totales de las cotizaciones contestadas
    var cotizacionNoRespondida=0; //aquí los no respondidos
    
    var cotizacionEnero=[0,0];
    var cotizacionFebrero=[0,0];
    var cotizacionMarzo=[0,0];
    var cotizacionAbril=[0,0];
    var cotizacionMayo=[0,0];
    var cotizacionJunio=[0,0];
    var cotizacionJulio=[0,0];
    var cotizacionAgosto=[0,0];
    var cotizacionSeptiembre=[0,0];
    var cotizacionOctubre=[0,0];
    var cotizacionNoviembre=[0,0];
    var cotizacionDiciembre=[0,0];
    
    var fchinicio=fechi; //igualar a datepickers
    var fchfinal=fechf;
    $.ajax({ 
       method: "POST",
       dataType: "json",
       url: "../../../controllers/getTblMotivoCotizacionGrafico.php",
       data: {solicitadoBy:"WEB", fchinicio:fchinicio, fchfinal:fchfinal}}) //Se pone el nombre de la variable del método POST más dos puntos seguido del valor que tiene
            .done(function(msg4){
                if(msg4.success =="0"){
                        UIkit.modal.alert("¡Ups! Posiblemente no se pudo obtener datos precios debido al rango de fechas ingresadas.");
                        }else{




                 $.each(msg4.datos, function (i,item)
                 {
                
                 
                estatus=item.tblmotivocotizacion_idtblmotivocotizacion;
                console.log(estatus);
                fecha=item.tblcostocotizacionproductnuevo_fchcreacion;
                 fch=new Date (fecha);
                var fech=fch.getMonth();
                console.log(fech);
                
                 switch(fech)
                 {
                    case 0:
                        if (estatus==2)
                        {
                            cotizacionEnero[0]+=1;
                        }
                        else{
                            cotizacionEnero[1]+=1;
                        }
                        break;
                    case 1:
                        if (estatus==2)
                        {
                            cotizacionFebrero[0]+=1;
                        }
                        else{
                            cotizacionFebrero[1]+=1;
                        }
                        break;
                    case 2:
                        if (estatus==2)
                        {
                            cotizacionMarzo[0]+=1;
                        }
                        else{
                            cotizacionMarzo[1]+=1;
                        }
                        break;
                    case 3:
                        if (estatus==2)
                        {
                            cotizacionAbril[0]+=1;
                        }
                        else{
                            cotizacionAbril[1]+=1;
                        }
                        break;
                    case 4:
                        if (estatus==2)
                        {
                            cotizacionMayo[0]+=1;
                        }
                        else{
                            cotizacionMayo[1]+=1;
                        }
                        break;
                        
                    case 5:
                        if (estatus==2)
                        {
                            cotizacionJunio[0]+=1;
                        }
                        else{
                            cotizacionJunio[1]+=1;
                        }
                        break;
                    case 6:
                        if (estatus==2)
                        {
                            cotizacionJulio[0]+=1;
                        }
                        else{
                            cotizacionJulio[1]+=1;
                        }
                        break;
                    case 7:
                        if (estatus==2)
                        {
                            cotizacionAgosto[0]+=1;
                        }
                        else{
                            cotizacionAgosto[1]+=1;
                        }
                        break;
                    case 8:
                        if (estatus==2)
                        {
                            cotizacionSeptiembre[0]+=1;
                        }
                        else{
                            cotizacionSeptiembre[1]+=1;
                        }
                        break;
                    case 9:
                        if (estatus==2)
                        {
                            cotizacionOctubre[0]+=1;
                        }
                        else{
                            cotizacionOctubre[1]+=1;
                        }
                        break;
                    case 10:
                        if (estatus==2)
                        {
                            cotizacionNoviembre[0]+=1;
                        }
                        else{
                            cotizacionNoviembre[1]+=1;
                        }
                        break;
                    case 11:
                        if (estatus==2)
                        {
                            cotizacionDiciembre[0]+=1;
                        }
                        else{
                            cotizacionDiciembre[1]+=1;
                        }
                        break;
                 }          
                 }); 
            
                 
    
    var data = new google.visualization.DataTable();
      data.addColumn('string', 'Fecha') //Primera columna es la leyenda de todo el gráfico
      data.addColumn('number', 'Cotización Contestada');
      data.addColumn('number', 'Cotización No Contestada/No Aplica');
     
      
      data.addRows([
       ["Enero", cotizacionEnero[0], cotizacionEnero[1]], 
      ["Febrero", cotizacionFebrero[0], cotizacionFebrero[1]],
      ["Marzo", cotizacionMarzo[0], cotizacionMarzo[1]],
      ["Abril", cotizacionAbril[0], cotizacionAbril[1]],
      ["Mayo", cotizacionMayo[0], cotizacionMayo[1]],
      ["Junio", cotizacionJunio[0], cotizacionJunio[1]],
      ["Julio", cotizacionJulio[0], cotizacionJulio[1]],
      ["Agosto", cotizacionAgosto[0], cotizacionAgosto[1]],
      ["Septiembre", cotizacionSeptiembre[0], cotizacionSeptiembre[1]],
      ["Octubre", cotizacionOctubre[0], cotizacionOctubre[1]],
      ["Noviembre", cotizacionNoviembre[0], cotizacionNoviembre[1]],
      ["Diciembre", cotizacionDiciembre[0], cotizacionDiciembre[1]]
      ]);
    
     var opciones = {
        title:opcion_seleccionada,titleTextStyle: {color: '#DD5465',fontSize: 25},
        hAxis: {title: 'Meses', titleTextStyle: {color: '#DD5465',fontSize: 15}},
        vAxis: {title: 'Cantidad', titleTextStyle: {color: '#DD5465',fontSize: 15}},
        backgroundColor:'#FFF',
        colors: ['#000', '#DD5465'],
        legend:{position: 'right', textStyle: {color: '#DD5465', fontSize: 15}},
        width:1000,
        height:500
        };
                            
        grafico.draw(data, opciones);  
    }
                 
    }) //final del done
      .fail(function( jqXHR, textStatus ) {  console.log("fail proveedores jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      .always(function(){  console.log("always");});
    }


    //función usuario
function usuarios()
{
    var fch;
    var fechi=document.getElementById("fchinicio").value;
    var fechf=document.getElementById("fchfinal").value;
    
    var clienteRegistrado=0;
    var clienteNoRegistrado=0;
    
    var usuariosEnero=[0,0];
    var usuariosFebrero=[0,0];
    var usuariosMarzo=[0,0];
    var usuariosAbril=[0,0];
    var usuariosMayo=[0,0];
    var usuariosJunio=[0,0];
    var usuariosJulio=[0,0];
    var usuariosAgosto=[0,0];
    var usuariosSeptiembre=[0,0];
    var usuariosOctubre=[0,0];
    var usuariosNoviembre=[0,0];
    var usuariosDiciembre=[0,0];
    
    
                
var fchinicio=fechi; //igualar a datepickers
var fchfinal=fechf;
    $.ajax({ 
       method: "POST",
       dataType: "json",
       url: "../../../controllers/getTblClienteGrafico.php",
       data: {solicitadoBy:"WEB", fchinicio:fchinicio, fchfinal:fchfinal}}) //Se pone el nombre de la variable del método POST más dos puntos seguido del valor que tiene
            .done(function(msg4){

                if(msg4.success =="0"){
                        UIkit.modal.alert("¡Ups! Posiblemente no se pudo obtener datos precios debido al rango de fechas ingresadas.");
                        }else{



                 $.each(msg4.datos, function (i,item)
                 {
                
                estatus=item.tbltipocliente_idtbltipocliente;
                console.log(estatus);
                
                
                fecha=item.tblcliente_fchcreacion;
                 fch=new Date (fecha);
                 var fech=fch.getMonth();
                 switch(fech)
                 {
                    case 0:
                        if (estatus==1)
                        {
                            usuariosEnero[0]+=1;
                        }
                        else{
                            usuariosEnero[1]+=1;
                        }
                        break;
                    case 1:
                        if (estatus==1)
                        {
                            usuariosFebrero[0]+=1;
                        }
                        else{
                            usuariosFebrero[1]+=1;
                        }
                        break;
                    case 2:
                        if (estatus==1)
                        {
                            usuariosMarzo[0]+=1;
                        }
                        else{
                            usuariosMarzo[1]+=1;
                        }
                        break;
                    case 3:
                        if (estatus==1)
                        {
                            usuariosAbril[0]+=1;
                        }
                        else{
                            usuariosAbril[1]+=1;
                        }
                        break;
                    case 4:
                        if (estatus==1)
                        {
                            usuariosMayo[0]+=1;
                        }
                        else{
                            usuariosMayo[1]+=1;
                        }
                        break;
                        
                    case 5:
                        if (estatus==1)
                        {
                            usuariosJunio[0]+=1;
                        }
                        else{
                            usuariosJunio[1]+=1;
                        }
                        break;
                    case 6:
                        if (estatus==1)
                        {
                            usuariosJulio[0]+=1;
                        }
                        else{
                            usuariosJulio[1]+=1;
                        }
                        break;
                    case 7:
                        if (estatus==1)
                        {
                            usuariosAgosto[0]+=1;
                        }
                        else{
                            usuariosAgosto[1]+=1;
                        }
                        break;
                    case 8:
                        if (estatus==1)
                        {
                            usuariosSeptiembre[0]+=1;
                        }
                        else{
                            usuariosSeptiembre[1]+=1;
                        }
                        break;
                    case 9:
                        if (estatus==1)
                        {
                            usuariosOctubre[0]+=1;
                        }
                        else{
                            usuariosOctubre[1]+=1;
                        }
                        break;
                    case 10:
                        if (estatus==1)
                        {
                            usuariosNoviembre[0]+=1;
                        }
                        else{
                            usuariosNoviembre[1]+=1;
                        }
                        break;
                    case 11:
                        if (estatus==1)
                        {
                            usuariosDiciembre[0]+=1;
                        }
                        else{
                            usuariosDiciembre[1]+=1;
                        }
                        break;
                 }
                 });
                // var array=new Array( new Array('Enero', 30, 10 ), new Array('Febrero', 50, 5), new Array('Marzo', 25, 10), new Array('Abril', 15, 2), new Array('Mayo', 70, 18) ); 
                
                 
    
    var data = new google.visualization.DataTable();
      data.addColumn('string', 'Fecha') //Primera columna es la leyenda de todo el gráfico
      data.addColumn('number', 'Cliente Registrado');
      data.addColumn('number', 'Cliente No Registrado');
      
      data.addRows([
      ["Enero", usuariosEnero[0], usuariosEnero[1]], 
      ["Febrero", usuariosFebrero[0], usuariosFebrero[1]],
      ["Marzo", usuariosMarzo[0], usuariosMarzo[1]],
      ["Abril", usuariosAbril[0], usuariosAbril[1]],
      ["Mayo", usuariosMayo[0], usuariosMayo[1]],
      ["Junio", usuariosJunio[0], usuariosJunio[1]],
      ["Julio", usuariosJulio[0], usuariosJulio[1]],
      ["Agosto", usuariosAgosto[0], usuariosAgosto[1]],
      ["Septiembre", usuariosSeptiembre[0], usuariosSeptiembre[1]],
      ["Octubre", usuariosOctubre[0], usuariosOctubre[1]],
      ["Noviembre", usuariosNoviembre[0], usuariosNoviembre[1]],
      ["Diciembre", usuariosDiciembre[0], usuariosDiciembre[1]]
      ]);
    
     var opciones = {
        title:opcion_seleccionada,titleTextStyle: {color: '#DD5465',fontSize: 25},
        hAxis: {title: 'Meses', titleTextStyle: {color: '#DD5465',fontSize: 15}},
        vAxis: {title: 'Cantidad', titleTextStyle: {color: '#DD5465',fontSize: 15}},
        backgroundColor:'#FFF',
        colors: ['#000', '#DD5465'],
        legend:{position: 'right', textStyle: {color: '#DD5465', fontSize: 15}},
        width:1000,
        height:500
        };
    
            grafico.draw(data, opciones);      
        }   
                   
              }) //final del done
      .fail(function( jqXHR, textStatus ) {  console.log("fail pedido jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      .always(function(){  console.log("always");});
} //Fin de la función USUARIOS


function proveedores()
{
    var fch;
    var fechi=document.getElementById("fchinicio").value;
    var fechf=document.getElementById("fchfinal").value;
    
    
    
    var proveedorEnero=[0,0];
    var proveedorFebrero=[0,0];
    var proveedorMarzo=[0,0];
    var proveedorAbril=[0,0];
    var proveedorMayo=[0,0];
    var proveedorJunio=[0,0];
    var proveedorJulio=[0,0];
    var proveedorAgosto=[0,0];
    var proveedorSeptiembre=[0,0];
    var proveedorOctubre=[0,0];
    var proveedorNoviembre=[0,0];
    var proveedorDiciembre=[0,0];
    
    var fchinicio=fechi; //igualar a datepickers
    var fchfinal=fechf;
    $.ajax({ 
       method: "POST",
       dataType: "json",
       url: "../../../controllers/getTblProveedorGrafico.php",
       data: {solicitadoBy:"WEB", fchinicio:fchinicio, fchfinal:fchfinal}}) //Se pone el nombre de la variable del método POST más dos puntos seguido del valor que tiene
            .done(function(msg4){

                if(msg4.success =="0"){
                        UIkit.modal.alert("¡Ups! Posiblemente no se pudo obtener datos precios debido al rango de fechas ingresadas.");
                        }else{
                 $.each(msg4.datos, function (i,item)
                 {
                
                estatus=item.tblproveedor_activado;
                console.log(estatus);
                
                
                fecha=item.tblproveedor_fchcreacion;
                 fch=new Date (fecha);
                var fech=fch.getMonth();    
                
                 switch(fech)
                 {
                    case 0:
                        if (estatus==1)
                        {
                            proveedorEnero[0]+=1;
                        }
                        else{
                            proveedorEnero[1]+=1;
                        }
                        break;
                    case 1:
                        if (estatus==1)
                        {
                            proveedorFebrero[0]+=1;
                        }
                        else{
                            proveedorFebrero[1]+=1;
                        }
                        break;
                    case 2:
                        if (estatus==1)
                        {
                            proveedorMarzo[0]+=1;
                        }
                        else{
                            proveedorMarzo[1]+=1;
                        }
                        break;
                    case 3:
                        if (estatus==1)
                        {
                            proveedorAbril[0]+=1;
                        }
                        else{
                            proveedorAbril[1]+=1;
                        }
                        break;
                    case 4:
                        if (estatus==1)
                        {
                            proveedorMayo[0]+=1;
                        }
                        else{
                            proveedorMayo[1]+=1;
                        }
                        break;
                        
                    case 5:
                        if (estatus==1)
                        {
                            proveedorJunio[0]+=1;
                        }
                        else{
                            proveedorJunio[1]+=1;
                        }
                        break;
                    case 6:
                        if (estatus==1)
                        {
                            proveedorJulio[0]+=1;
                        }
                        else{
                            proveedorJulio[1]+=1;
                        }
                        break;
                    case 7:
                        if (estatus==1)
                        {
                            proveedorAgosto[0]+=1;
                        }
                        else{
                            proveedorAgosto[1]+=1;
                        }
                        break;
                    case 8:
                        if (estatus==1)
                        {
                            proveedorSeptiembre[0]+=1;
                        }
                        else{
                            proveedorSeptiembre[1]+=1;
                        }
                        break;
                    case 9:
                        if (estatus==1)
                        {
                            proveedorOctubre[0]+=1;
                        }
                        else{
                            proveedorOctubre[1]+=1;
                        }
                        break;
                    case 10:
                        if (estatus==1)
                        {
                            proveedorNoviembre[0]+=1;
                        }
                        else{
                            proveedorNoviembre[1]+=1;
                        }
                        break;
                    case 11:
                        if (estatus==1)
                        {
                            proveedorDiciembre[0]+=1;
                        }
                        else{
                            proveedorDiciembre[1]+=1;
                        }
                        break;
                 }
                
                        
                 }); 
                
                 
    
    var data = new google.visualization.DataTable();
      data.addColumn('string', 'Fecha') //Primera columna es la leyenda de todo el gráfico
      data.addColumn('number', 'Proveedores Activos');
      data.addColumn('number', 'Proveedores Inactivos');
     
      
      data.addRows([
      ["Enero",proveedorEnero[0],proveedorEnero[1]], 
      ["Febrero",proveedorFebrero[0],proveedorFebrero[1]],
      ["Marzo",proveedorMarzo[0],proveedorMarzo[1]],
      ["Abril",proveedorAbril[0],proveedorAbril[1]],
      ["Mayo",proveedorMayo[0],proveedorMayo[1]],
      ["Junio",proveedorJunio[0],proveedorJunio[1]],
      ["Julio",proveedorJulio[0],proveedorJulio[1]],
      ["Agosto",proveedorAgosto[0],proveedorAgosto[1]],
      ["Septiembre",proveedorSeptiembre[0],proveedorSeptiembre[1]],
      ["Octubre",proveedorOctubre[0],proveedorOctubre[1]],
      ["Noviembre",proveedorNoviembre[0],proveedorNoviembre[1]],
      ["Diciembre",proveedorDiciembre[0],proveedorDiciembre[1]]
      ]);
    
     var opciones = {
        title:opcion_seleccionada,titleTextStyle: {color: '#DD5465',fontSize: 25},
        hAxis: {title: 'Meses', titleTextStyle: {color: '#DD5465',fontSize: 15}},
        vAxis: {title: 'Cantidad', titleTextStyle: {color: '#DD5465',fontSize: 15}},
        backgroundColor:'#FFF',
        colors: ['#000', '#DD5465'],
        legend:{position: 'right', textStyle: {color: '#DD5465', fontSize: 15}},
        width:1000,
        height:500
        };
    
            grafico.draw(data, opciones);  
    }            
              }) //final del done
      .fail(function( jqXHR, textStatus ) {  console.log("fail proveedores jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      .always(function(){  console.log("always");});
    
}

function productocategoria()
{
    var fch;
    var fechi=document.getElementById("fchinicio").value;
    var fechf=document.getElementById("fchfinal").value;
    
    var pasteles=0;
    var cupcake=0;
    var pays=0;
    var panques=0;
    var tartas=0;
    var brownies=0;
    var donas=0;
    var flanes=0;
    var galletas=0;
    var macarrones=0;
    var muffins=0;
    var panblanco=0;
    var cheesecake=0;
    var gelatinas=0;
    
    var fchinicio=fechi; //igualar a datepickers
var fchfinal=fechf;
    $.ajax({ 
       method: "POST",
       dataType: "json",
       url: "../../../controllers/getTblproductoporcategoria.php",
       data: {solicitadoBy:"WEB", fchinicio:fchinicio, fchfinal:fchfinal}}) //Se pone el nombre de la variable del método POST más dos puntos seguido del valor que tiene
            .done(function(msg4){
                if(msg4.success =="0")
                {
                    UIkit.modal.alert("¡Ups! Posiblemente no se pudo obtener datos precios debido al rango de fechas ingresadas.");
                }else{

                    //Se inicializa el espacio del arreglo
                    for (i = 0, len = categoriasArray.length; i < len; ++i)
                            categoriasArray[i][2]=0;


                    $.each(msg4.datos, function (i,item)
                    {
                        categoria=item.tblcategproduct_idtblcategproduct;
                        var cat = parseInt(categoria);
                        //console.log(categoria);

                        for (x = 0, len = categoriasArray.length; x < len; ++x) {
                            if(cat==categoriasArray[x][0]){
                                categoriasArray[x][2]=categoriasArray[x][2]+1;  
                            }
                        }




                 switch(cat)
                        {
                            case 1: pasteles=pasteles +1;
                            break;
                            case 2: cupcake++;
                            break;
                            case 3: pays+=1;
                            break;
                            case 4: panques+=1;
                            break;
                            case 5: tartas+=1;
                            break;
                            case 6: brownies+=1;
                            break;
                            case 7: donas+=1;
                            break;
                            case 8: flanes+=1;
                            break;
                            case 9: galletas+=1;
                            break;
                            case 10: macarrones+=1;
                            break;
                            case 11: muffins+=1;
                            break;
                            case 12: panblanco+=1;
                            break;
                            case 13: cheesecake+=1;
                            break;
                            case 14: gelatinas+=1;
                            break;
                        }
                
                 
                 });

                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Categor&iacute;s') //Primera columna es la leyenda de todo el gráfico
                data.addColumn('number', 'productos');

                arrayProvData=new Array();//arreglo para los datos de la grafica
                for (ix = 0, len = categoriasArray.length; ix < len; ++ix) {arrayProvData[ix] =new Array();
                    arrayProvData[ix][0]=categoriasArray[ix][1];
                    arrayProvData[ix][1]=categoriasArray[ix][2];
                }

                data.addRows(arrayProvData);  

     var opciones = {
        title:opcion_seleccionada,titleTextStyle: {color: '#DD5465',fontSize: 25},
        hAxis: {title: 'Categoria de Producto', titleTextStyle: {color: '#DD5465',fontSize: 15}},
        vAxis: {title: 'Cantidad', titleTextStyle: {color: '#DD5465',fontSize: 15}},
        backgroundColor:'#FFF',
        
        legend:{position: 'right', textStyle: {color: '#DD5465', fontSize: 15}},
        width:1000,
        height:500
        };
    
    
            
            grafico.draw(data, opciones);   
        }        
                   
              }) //final del done
      .fail(function( jqXHR, textStatus ) {  console.log("fail pedido jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      .always(function(){  console.log("always");});
}

function productoproveedor()
{
    var fch;
    var fechi=document.getElementById("fchinicio").value;
    var fechf=document.getElementById("fchfinal").value;
    
    
    var fchinicio=fechi; //igualar a datepickers
    var fchfinal=fechf;
    $.ajax({ 
       method: "POST",
       dataType: "json",
       url: "../../../controllers/getTblproductoporcategoria.php",
       data: {solicitadoBy:"WEB", fchinicio:fchinicio, fchfinal:fchfinal}}) //Se pone el nombre de la variable del método POST más dos puntos seguido del valor que tiene
            .done(function(msg4){


                if(msg4.success =="0")
                {
                    UIkit.modal.alert("¡Ups! Posiblemente no se pudo obtener datos precios debido al rango de fechas ingresadas.");
                }else{

                    //Se inicializa el espacio del arreglo
                    for (i = 0, len = provedoresArray.length; i < len; ++i)
                            provedoresArray[i][2]=0;

                 $.each(msg4.datos, function (i,item)
                 {
                
                    productosp=item.tblproveedor_idtblproveedor;
                    prodp=parseInt(productosp);

                    for (x = 0, len = provedoresArray.length; x < len; ++x) {
                        if(prodp==provedoresArray[x][0]){                            
                            provedoresArray[x][2]=provedoresArray[x][2]+1;  
                        }
                    }

                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Proveedores') //Primera columna es la leyenda de todo el gráfico
                    data.addColumn('number', 'productos');
                    arrayProvData=new Array();//arreglo para los datos de la grafica
                    for (ix = 0, len = provedoresArray.length; ix < len; ++ix) {arrayProvData[ix] =new Array();
                        arrayProvData[ix][0]=provedoresArray[ix][1];
                        arrayProvData[ix][1]=provedoresArray[ix][2];
                    }

                    data.addRows(arrayProvData);

                 var opciones = {
                    title:opcion_seleccionada,titleTextStyle: {color: '#DD5465',fontSize: 25},
                    hAxis: {title: 'Proveedores', titleTextStyle: {color: '#DD5465',fontSize: 15}},
                    vAxis: {title: 'Cantidad', titleTextStyle: {color: '#DD5465',fontSize: 15}},
                    backgroundColor:'#FFF',        
                    legend:{position: 'right', textStyle: {color: '#DD5465', fontSize: 15}},
                    width:1000,
                    height:500
                    };

                    grafico.draw(data, opciones); 
            }); 
        }         
                   
              }) //final del done
      .fail(function( jqXHR, textStatus ) {  console.log("fail pedido jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      .always(function(){  console.log("always");});
    
    
}


function categoriaproveedor()
{
    var fch;
    var fechi=document.getElementById("fchinicio").value;
    var fechf=document.getElementById("fchfinal").value;

    var criterioCateg=document.getElementById("categoriaSelect").value;
    var categoriaSelccionada = $("#categoriaSelect option:selected").text();

    if(criterioCateg==0){
        UIkit.modal.alert("Debes seleccionar una categoría.");

    }
    else{
    
    var fchinicio=fechi; //igualar a datepickers
var fchfinal=fechf;
    $.ajax({ 
       method: "POST",
       dataType: "json",
       url: "../../../controllers/getTblproductoporcategoria.php",
       data: {solicitadoBy:"WEB", fchinicio:fchinicio, fchfinal:fchfinal}}) //Se pone el nombre de la variable del método POST más dos puntos seguido del valor que tiene
            .done(function(msg4){


                if(msg4.success =="0"){
                        UIkit.modal.alert("¡Ups! Posiblemente no se pudo obtener datos precios debido al rango de fechas ingresadas.");
                        }else{

                            //Se inicializa el espacio del arreglo
                    for (i = 0, len = provedoresArray.length; i < len; ++i)
                            provedoresArray[i][2]=0;



                 $.each(msg4.datos, function (i,item)
                 {
                categoria=item.tblcategproduct_idtblcategproduct;
                proveedor=item.tblproveedor_idtblproveedor;
                var cat = parseInt(categoria);
                var pro=parseInt(proveedor);
                 //console.log(categoria);

                 if(categoria==criterioCateg){

                    for (x = 0, len = provedoresArray.length; x < len; ++x) {
                        if(pro==provedoresArray[x][0]){                            
                            provedoresArray[x][2]=provedoresArray[x][2]+1;  
                        }
                    }

                 }
                 });

                var data = new google.visualization.DataTable();
                 data.addColumn('string', 'Categoria')
                 data.addColumn('number',"Cantidad de "+categoriaSelccionada);
                arrayProvData=new Array();//arreglo para los datos de la grafica
                    for (ix = 0, len = provedoresArray.length; ix < len; ++ix) {

                        arrayProvData[ix] =new Array();
                        arrayProvData[ix][0]=provedoresArray[ix][1];
                        arrayProvData[ix][1]=provedoresArray[ix][2];

                        

                        console.log(provedoresArray[ix]);
                    }

                    
                    data.addRows(arrayProvData);




     var opciones = {
        title:opcion_seleccionada+"-"+categoriaSelccionada,titleTextStyle: {color: '#DD5465',fontSize: 25},
        hAxis: {title: 'Proveedores', titleTextStyle: {color: '#DD5465',fontSize: 15}},
        vAxis: {title: 'Cantidad', titleTextStyle: {color: '#DD5465',fontSize: 15}},
        backgroundColor:'#FFF',        
        legend:{position: 'right', textStyle: {color: '#DD5465', fontSize: 15}},
        width:1000,
        height:500
        };
    
    
        
            
            grafico.draw(data, opciones);
        }          
                   
              }) //final del done
      .fail(function( jqXHR, textStatus ) {  console.log("fail pedido jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      .always(function(){  console.log("always");});  

    }  
}


function facturacion()
{
    var fch;
    var fechi=document.getElementById("fchinicio").value;
    var fechf=document.getElementById("fchfinal").value;
    //var barras=[];
    var facturacion=0;
    
    //Arreglo o variable de cada mes donde guardaremos la información
    var fEnero=[0,0];
    var fFebrero=[0,0];
    var fMarzo=[0,0];
    var fAbril=[0,0];
    var fMayo=[0,0];
    var fJunio=[0,0];
    var fJulio=[0,0];
    var fAgosto=[0,0];
    var fSeptiembre=[0,0];
    var fOctubre=[0,0];
    var fNoviembre=[0,0];
    var fDiciembre=[0,0];
    
    var fchinicio=fechi; //igualar a datepickers
var fchfinal=fechf;
    $.ajax({ 
       method: "POST",
       dataType: "json",
       url: "../../../controllers/getTblVentasTotales.php",
       data: {solicitadoBy:"WEB", fchinicio:fchinicio, fchfinal:fchfinal}}) //Se pone el nombre de la variable del método POST más dos puntos seguido del valor que tiene
            .done(function(msg4){

                if(msg4.success =="0"){
                        UIkit.modal.alert("¡Ups! Posiblemente no se pudo obtener datos precios debido al rango de fechas ingresadas.");
                        }else{
                 $.each(msg4.datos, function (i,item)
                 {

                var facturadoInt = parseInt(item.tblordencompra_facturacion);
                fac=item.tblordencompra_totalordencompra;
                facturacion=fac*1000;
                
                fecha=item.tblordencompra_fchordencompra;
                 fch=new Date (fecha);
                 var fech=fch.getMonth();
                 
                 switch(fech)
                 {
                    case 0:
                            if(facturadoInt==1){
                                fEnero[0]+=facturacion;
                            }else{
                                fEnero[1]+=facturacion;
                            }
                        
                        break;
                    case 1:
                        if(facturadoInt==1){
                                fFebrero[0]+=facturacion;
                            }else{
                                fFebrero[1]+=facturacion;
                            }
                        
                        break;
                    case 2:
                        if(facturadoInt==1){
                                fMarzo[0]+=facturacion;
                            }else{
                                fMarzo[1]+=facturacion;
                            }
                        
                        break;
                    case 3:
                        if(facturadoInt==1){
                                fAbril[0]+=facturacion;
                            }else{
                                fAbril[1]+=facturacion;
                            }
                        
                        break;
                    case 4:
                        if(facturadoInt==1){
                                fMayo[0]+=facturacion;
                            }else{
                                fMayo[1]+=facturacion;
                            }
                        
                        break;
                    case 5:
                        if(facturadoInt==1){
                                fJunio[0]+=facturacion;
                            }else{
                                fJunio[1]+=facturacion;
                            }
                        
                        break;
                    case 6:
                        if(facturadoInt==1){
                                fJulio[0]+=facturacion;
                            }else{
                                fJulio[1]+=facturacion;
                            }
                        
                        break;
                    case 7:
                       if(facturadoInt==1){
                                fAgosto[0]+=facturacion;
                            }else{
                                fAgosto[1]+=facturacion;
                            }
                        
                        break;
                    case 8:
                        if(facturadoInt==1){
                                fSeptiembre[0]+=facturacion;
                            }else{
                                fSeptiembre[1]+=facturacion;
                            }
                        
                        break;
                    case 9:
                        if(facturadoInt==1){
                                fOctubre[0]+=facturacion;
                            }else{
                                fOctubre[1]+=facturacion;
                            }
                        
                        break;
                    case 10:
                       if(facturadoInt==1){
                                fNoviembre[0]+=facturacion;
                            }else{
                                fNoviembre[1]+=facturacion;
                            }
                        
                        break;
                    case 11:
                        if(facturadoInt==1){
                                fDiciembre[0]+=facturacion;
                            }else{
                                fDiciembre[1]+=facturacion;
                            }
                        
                        break;
                 }
                 });
                    //barras[0]=new Array (fch, ventasComision);

    
    var data = new google.visualization.DataTable();
      data.addColumn('string', 'Fechas') //Primera columna es la leyenda de todo el gráfico
      data.addColumn('number', 'Total Facturado');
      data.addColumn('number', 'Total No Facturado');
     
      
      data.addRows([
      ["Enero", fEnero[0],fEnero[1]], 
      ["Febrero", fFebrero[0],fFebrero[1]],
      ["Marzo", fMarzo[0],fMarzo[1]],
      ["Abril", fAbril[0],fAbril[1]],
      ["Mayo", fMayo[0],fMayo[1]],
      ["Junio", fJunio[0],fJunio[1]],
      ["Julio", fJulio[0],fJulio[1]],
      ["Agosto", fAgosto[0],fAgosto[1]],
      ["Septiembre", fSeptiembre[0],fSeptiembre[1]],
      ["Octubre", fOctubre[0],fOctubre[1]],
      ["Noviembre", fNoviembre[0],fNoviembre[1]],
      ["Diciembre", fDiciembre[0],fDiciembre[1]]
      ]);   

     var opciones = {
                        title:opcion_seleccionada,titleTextStyle: {color: '#DD5465',fontSize: 25},
                        hAxis: {title: 'Meses', titleTextStyle: {color: '#DD5465',fontSize: 15}},
                        vAxis: {title: 'Cantidad', titleTextStyle: {color: '#DD5465',fontSize: 15} },
                        backgroundColor:'#FFF',
                        colors: ['#000', '#DD5465'],
                        legend:{position: 'right', textStyle: {color: '#DD5465', fontSize: 15}},
                        width:1000,
                        height:500
                        };
                        opciones['vAxis']['format'] = 'decimal';  
    
    
        
            grafico.draw(data, opciones);  
        }          
                   
              }) //final del done
      .fail(function( jqXHR, textStatus ) {  console.log("fail pedido jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      .always(function(){  console.log("always");});
}//fin de gráfica facturación



     
    
    </script>
</body>
</html>