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
    <!-- uikit acomoda el encabezado -->
    <link rel="stylesheet" href="../bower_components/uikit/css/uikit.almost-flat.min.css" media="all"> 
    <!-- flag icons -->
    <link rel="stylesheet" href="../assets/icons/flags/flags.min.css" media="all">
    <!-- style switcher -->
    <link rel="stylesheet" href="../assets/css/style_switcher.min.css" media="all">    
    <!-- altair admin estilo general -->
    <link rel="stylesheet"  href="../assets/css/mainPanel.css" media="all">
    <!-- themes -->
    <link rel="stylesheet" href="../assets/css/themes/themes_combined.min.css" media="all">
	<link rel="stylesheet" href="../assets/css/colorPanel.css" media="all"> 
 
  
</head>
 
  <body class="sidebar_main_open sidebar_main_swipe" >  
    <!-- menu y encabezado de la pagina -->
     <?php include('../codigo_general/menuPanel.php'); ?>
           
                
<!-- aqui empieza la pagina -->
<div id="page_content">
        <div id="page_content_inner">

                             <div class="md-card uk-width-large-3-5 uk-container-center">
					               <div class="md-card-content">
									<div >      
                                    <h2>Horas del d&iacute;a</h2>
                                   
                                    </div>
					                </div>
					            </div>				
		
			<!-- ------------------------------- -->
			<div  class="uk-grid" data-uk-grid-margin >
			
                   <div class="uk-width-large-3-5 uk-container-center ">
					<div class="md-card">
						
                        <div class="user_content">
						
							 <ul>                
									<div class="uk-grid uk-margin-medium-top uk-margin-large-bottom" data-uk-grid-margin >
                                      
									
								   <div class="uk-width-large-1-2" id="mostrarhoras" name="mostrarhoras">                                  
								   </div> 
								   
								   </ul>  
								 
								   </div> </div> </div>				
            </div>
			
			
	    </div ><!-- de  id="page_content" -->
        </div> <!-- id="page_content_inner" -->

 <!-- libreria jquery -->
  <?php include('../codigo_general/script_commonPB.php'); ?>  
  
   <!-- archivos JS-->
  <script type="text/javascript">
     $(window).ready(function()
    {  //console.log('pagina lista');
       paraHora();
    });
	
	
	 /* Create by: Reyna Maria Martinez Vazquez*/
    function paraHora(){
		
		
    	$.ajax({ 
       method: "POST",
       dataType:"json",
      url: "../../../controllers/getAllTblhora.php",data: {solicitadoBy:"WEB"}	 
	  })
            .done(function(msg){
			//console.log(msg);
			$("#mostrarhoras").html("");
                 $.each(msg.datos, function (i,item)
  {tblhora_hora=item.tblhora_hora;
  $("#mostrarhoras").append('<ul class="md-list md-list-addon" ><li>'+
  '<div class="md-list-addon-element"><i class="md-list-addon-icon material-icons md-24">&#xe8ae;</i>'+
  ' </div><div class="md-list-content"><span class="uk-text-small uk-text-muted">_________</span>'+
  '<span class="md-list-heading">'+tblhora_hora+'</span> </div></li></ul>');
                                                                                                                                                                                                                   
				 });                 
              })
      .fail(function( jqXHR, textStatus ) {  console.log("fail jqXHR::"+jqXHR+" textStatus::"+textStatus);})
      //.always(function(){  console.log("always");});
    }	  
  	
  </script> 
  
	  
</body>
</html>