<?php	
	
    $nombrerazonsocial=$_POST["razonsocial"];
    $calle=$_POST["calle"];
    $numext=$_POST["numext"];
    $numint=$_POST["numint"];
    $ciudad=$_POST["ciudad"];
    $municipio=$_POST["municipio"];
    $estado=$_POST["estado"];
    $colonia=$_POST["colonia"];
    $cp=$_POST["cp"];
    $email=$_POST["email"];
    $rfc=$_POST["rfc"];
    $numpedido=$_POST["numpedido"];	
	$destinatario= $_POST["email"];




	$mensaje='
<!--
  ************************************************************************
  * This email was built using the EOA Email Editor.                     *
  * For more information, visit https://www.emailonacid.com/email-editor *
  ************************************************************************
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
    <head>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <!--[if gte mso 9]><xml>
      <o:OfficeDocumentSettings>
        <o:AllowPNG/>
        <o:PixelsPerInch>96</o:PixelsPerInch>
      </o:OfficeDocumentSettings>
    </xml><![endif]-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!--[if !mso]><!-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!--<![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title></title>
        <!--[if (gte mso 9)|(IE)]>
        <style type="text/css">
        table {border-collapse: collapse !important;}
        </style>
        <![endif]-->
        <style type="text/css">
            
            body {
            Margin: 0;
            padding: 0;
            min-width: 100%;
            background-color: #ffffff;
            }

            table {
            border-spacing: 0;
            font-family: '.'Poppins'.', sans-serif;
            }

            td {
            padding: 0;
            }

            img {
            border: 0;
            }

            .wrapper {
            width: 100%;
            min-width:100%;
            table-layout: fixed;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            }

            .webkit {
            max-width: 600px;
            Margin: 0 auto;
            }

            .outer {
            Margin: 0 auto;
            width: 100%;
            max-width: 600px;
            }

            .contents {
            width: 100%;
            min-width:100%;
            }

            .center {
            text-align: center; 
            }

            @font-face {
            font-family: '.'Poppins'.';
            font-style: normal;
            font-weight: 400;/*

            src: local('.'Roboto'.'), local('.'Roboto-Regular'.'), url(https://fonts.gstatic.com/s/roboto/v15/oMMgfZMQthOryQo9n22dcuvvDin1pK8aKteLpeZ5c0A.woff2) format('.'woff2'.');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;*/
                }


            [style*="Poppins"] {
            font-family:'.'Poppins'.', sans-serif !important;
            }

            p, h1, h2 {
            Margin: 0;
            }


            

            h1 {
            font-size: 26px;
            line-height: 34px;
            Margin-bottom: 16px;
            }

            h2 {
            font-size: 18px;
            line-height: 26px;
            Margin-bottom: 18px;
            }

            .one-column h1, 
            .one-column h2 {
            color: #1f212d;
            }
             
            .one-column-article h1 span {
            font-size: 22px;
            color: #ffffff;
            background-color: #1f212d;
            text-transform: uppercase;
            padding: 10px;
            }

            .two-column h1, 
            .two-column h2 {
            color: #1f212d;
            }

            #logo h1 {
            font-size: 26px;
            Margin-bottom: 0px;
            }

            #hero-text h1, 
            #hero-text h2 {
            color: #ffffff;
            }

            #cta-text h1, 
            #cta-text h2 {
            color: #ffffff;
            }

            #featured-article-1-text h1, 
            #featured-article-1-text h2 {
            color: #1f212d;
            }

            #featured-article-2 h1, 
            #featured-article-2 h2 {
            color: #172d46;
            }

            #footer h1, #footer h2 {
            color: #ffffff;
            }



            

            p {
            font-size: 16px;
            line-height: 24px;
            Margin-top: 0px;
            }

            .one-column p,
            .two-column p,
            .one-column-article,
            #featured-article-1-text p,
            #featured-article-2 p {
            color: #1f212d;
            }

            #featured-article-1-text p {
            color: #1f212d;
            }

            #hero-text p,
            #cta-text p {
            color: #ffffff;
            }

            #hero-text p {
            Margin-bottom: 20px;    
            }

            #footer p {
            font-size: 13px;
            line-height: 20px;
            Margin-bottom: 16px;
            color: #ffffff;
            }



            

            .italic {
            font-style: italic;     
            }

            .bold {
            font-weight: bold;
            }



            

            a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
            }

            a {
            color: #4A90E2;
            text-decoration: underline;
            }

            #footer a {
            color: #ffffff;
            text-decoration: underline;
            }



            

            .button-link-1, 
            .button-link-2,
            .button-link-3,
            .button-link-4 { 
            padding: 10px; 
            display: block; 
            text-decoration: none; 
            border: 0; 
            text-align: center; 
            font-weight: bold;
            font-size: 15px; 
            font-family: '.'Poppins'.', sans-serif; 
            -moz-border-radius: 0px; 
            -webkit-border-radius: 0px; 
            border-radius: 0px; 
            line-height: 30px;
            }

            .button-link-1 { 
            color: #ffffff; 
            background: #3683de;
            border: 5px solid #6daaf1;
            }

            .button-link-2 { 
            color: #1f212d; 
            background: #ffffff; 
            border: 5px solid #3683de;
            }

            .button-link-3 { 
            color: #1f212d; 
            background: #ffffff; 
            border: 5px solid #cccccc;
            }

            .button-link-4 { 
            color: #1f212d; 
            background: #ffffff; 
            border: 5px solid #eeeeee;
            }

            .button-radius { 
            -moz-border-radius: 0px; 
            -webkit-border-radius: 0px; 
            border-radius: 0px;
            }


            

            .padding-10 {
            padding: 10px;
            }

            .padding-top-10 {
            padding: 10px 0 0 0;
            }

            .padding-topbottom-10 {
            padding: 10px 0 10px 0;
            }

            .padding-rightleft-10 {
            padding: 0 10px 0 10px;
            }

            .padding-20 {
            padding: 20px;
            }

            .padding-top-20 {
            padding: 20px 0 0 0;
            }

            .padding-topbottom-20 {
            padding: 20px 0 20px 0;
            }

            .padding-toprightleft-20 {
            padding: 20px 20px 0 20px;
            }

            .padding-rightleft-20 {
            padding: 0px 20px 0 20px;
            }


            .padding-toprightleft-30 {
            padding: 30px 20px 0 20px;
            }

            .padding-toprightleft-35 {
            padding: 35px 20px 0 20px;
            }



            

            .two-column img,
            .three-column img,
            .full-width-image img,
            #logo img,
            #hero-image img,
            #cta-image img,
            .left-sidebar img,
            .right-sidebar img {
            width: 100%;
            height: auto;
            }

            .two-column img              {
            max-width: 260px;
            }

            .three-column img {
            max-width: 160px;
            }

            .full-width-image img {
            max-width: 600px;
            }

            #logo img {
            max-width: 193px;
            }

            #social-media img {
            max-width: 22px;
            }

            #hero-image img {
            max-width: 260px;
            }

            #cta-image img {
            max-width: 30px;
            }

            .left-sidebar img {
            max-width: 60px;
            }

            .right-sidebar img {
            max-width: 60px;
            }



            

            #logo-region-back,
            .fullwidthimage-region-back,
            .article-back { 
            background-color: #ffffff;
            }

            #featured-article-1-back { 
            background-color: #eeeeee;
            }

            #subhead-region-back { 
            background-color: #ffffff;
            }

            #cta-region-back { 
            background-color: #333333;
            }

            #hero-region-back { 
            background-color: #3683de;
            }

            #featured-article-2-back { 
            background-color: #eeeeee;
            }

            #separator-1, 
            #separator-2, 
            #separator-3 { 
            font-size: 5px; 
            color: #ffffff; 
            line-height: 5px;
            mso-line-height-rule: exactly; 
            }

            #separator-1 { 
            background-color: #efefef;
            }

            #separator-2 { 
            background-color: #dddddd;
            }

            #separator-3 { 
            background-color: #3683de;
            }

            .article-separator { 
            font-size: 4px; 
            color: #ffffff; 
            mso-line-height-rule: exactly; 
            line-height: 4px; 
            border-bottom: 4px solid #cccccc;
            }

            #footer-region-back { 
            background-color: #1f212d;
            }



            

            

            .one-column .contents,
            .one-column-article .contents,
            #featured-article-2-back .contents {
            text-align: left;
            }


            

            .two-column {
            text-align: center;
            font-size: 0;
            }

            .two-column .column {
            width: 100%;
            max-width: 300px;
            display: inline-block;
            vertical-align: top;
            }

            .two-column .contents {
            font-size: 14px;
            text-align: left;
            }

            #two-column-featured {
            text-align: center;
            font-size: 0;
            padding-top: 10px;
            padding-bottom: 10px;
            }


            

            #logo, 
            #social-media {
            width: 100%;
            max-width: 300px;
            display: inline-block;
            vertical-align: bottom;
            }


            

            #hero-text, 
            #hero-image {
            width: 100%;
            max-width: 300px;
            display: inline-block;
            vertical-align: top;
            }
             

            

            #cta-text, 
            #cta-image {
            width: 100%;
            display: inline-block;
            vertical-align: middle;
            }

            #cta-text {
            max-width: 500px;
            }

            #cta-image {
            max-width: 100px;
            }

            #cta-image-align { 
            text-align: center;
            }


            

            #featured-article-1-image, 
            #featured-article-1-text {
            width: 100%;
            max-width: 300px;
            display: inline-block;
            vertical-align: top;
            }



            

            .three-column {
            text-align: center;
            font-size: 0;
            padding-top: 10px;
            padding-bottom: 10px;
            }

            .three-column .column {
            width: 100%;
            max-width: 200px;
            display: inline-block;
            vertical-align: top;
            }

            .three-column .contents {
            font-size: 14px;
            text-align: center;
            }

            @media screen and (max-width: 420px) {
            .two-column .column,
            .three-column .column {
            max-width: 100% !important;
            }

            .two-column img {
            max-width: 100% !important;
            }

            #social-media img {
            max-width: 22px !important;
            }

            #cta-image img {
            max-width: 30px !important;
            }

            .three-column img {
            max-width: 50% !important;
            }
            }


            @media screen and (min-width: 421px) and (max-width: 620px) {
            .three-column .column {
            max-width: 33% !important;
            }

            .two-column .column {
            max-width: 50% !important;
            }
            }
        </style>
    </head>
    <body style="Margin:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;min-width:100%;background-color:#ffffff;" >
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="border-spacing:0;font-family:sans-serif, '.'Poppins'.';" >
            <!-- START HEADER -->
            <tr>
                <td id="logo-region-back" align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;background-color:#FFFFFF;" >
                    <center class="wrapper" style="width:100%;min-width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;" >
                        <div class="webkit" style="max-width:600px;margin: 0 auto;" >

                            <!-- START PREHEADER -->
                            <div id="preheader" style="font-family:sans-serif, '.'Poppins'.';font-size:1px;color:#ffffff;line-height:1px;mso-line-height-rule:exactly;display:none;max-width:0px;max-height:0px;opacity:0;overflow:hidden;mso-hide:all;" >
                                <!-- Your preheader text goes here -->
                
                            </div>
                            <!-- END PREHEADER -->

                            <!--[if (gte mso 9)|(IE)]>
                            <table width="600" align="center" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:sans-serif, '.'Poppins'.';" >
                            <tr>
                            <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                            <![endif]-->

                            <table class="outer" align="left" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:sans-serif, '.'Poppins'.';Margin:0 auto;width:100%;max-width:900px;" >
                                <tr>
                                    <td class="two-column padding-topbottom-10" style="padding-top:5px;padding-bottom:0px;padding-right:0;padding-left:0;text-align:center;font-size:0;" >

                                        <!--[if (gte mso 9)|(IE)]>
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:sans-serif, '.'Poppins'.';" >
                                        <tr>
                                        <td width="50%" valign="top" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                                        <![endif]-->

                                        <div id="logo" style="width:100%;max-width:300px;display:inline-block;vertical-align:bottom;margin: 0 auto;" >
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:sans-serif, '.'Poppins'.';" >
                                                <tr>
                                                    <td class="padding-20" style="padding-top:0px;padding-bottom:0px;padding-right:20px;padding-left:20px;" >
                                                        <table class="contents" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:sans-serif, '.'Poppins'.';width:100%;min-width:100%;font-size:14px;text-align:left;" >
                                                            <tr>
                                                                <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                                                                    
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>

                                        <!--[if (gte mso 9)|(IE)]>
                                        </td>
                                        <td width="50%" valign="top" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                                        <![endif]-->

                                        <div id="social-media" style="width:100%;max-width:300px;display:inline-block;vertical-align:bottom;margin: 0 auto;" >
                                            
                                        </div>

                                        <!--[if (gte mso 9)|(IE)]>
                                        </td>
                                        </tr>
                                        </table>
                                        <![endif]-->

                                    </td>
                                </tr>
                            </table>

                            <!--[if (gte mso 9)|(IE)]>
                            </td>
                            </tr>
                            </table>
                            <![endif]-->

                        </div>
                    </center>
                </td>
            </tr>
            <!-- END HEADER -->

            <!-- START SEPARATOR -->
      <tr>
                <td id="separator-1" style="padding-top:0;padding-bottom:20px;padding-right:0px;padding-left:0;font-size:0px;color:#fff;line-height:15px;mso-line-height-rule:exactly;background-color:#ffffff;;text-align:center;" >
          <p>
            <img src="https://www.bepickler.com/miguel/BepicklerFuncional2.0/views/assests_general/imagenescorreos/logo2.png" title="BePickler" alt="BePickler" width="250">
          </p>
        </td>
        
            </tr>
            <tr>
                <td id="separator-3" style="padding-top:0;padding-bottom:3px;padding-right:0;padding-left:0;font-size:0px;color:#dd5465;line-height:3px;mso-line-height-rule:exactly;background-color:#000;" ></td>
            </tr>
      
      
            <!-- END SEPARATOR -->

            <!-- START RECEIPT HEADER -->
            <tr>
                <td id="featured-article-1-back" class="two-column" style="-webkit-font-smoothing:antialiased;padding-top:0;padding-bottom:10px;padding-right:0;padding-left:0;text-align:center;font-size:0;background-color:#dd5465;" >
                        <!--[if (gte mso 9)|(IE)]>
                        <table width="600" style="-webkit-font-smoothing:antialiased;border-spacing:0;font-family:sans-serif, '.'Poppins'.';color:#333333;" >
                        <tr style="-webkit-font-smoothing:antialiased;" >
                        <td width="300" valign="top" style="-webkit-font-smoothing:antialiased;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                        <![endif]-->


                        <!-- START INVOICE NUMBER -->

                        <div class="column" style="-webkit-font-smoothing:antialiased;width:100%;max-width:650px;display:inline-block;vertical-align:top;" >

                            <table width="100%" style="-webkit-font-smoothing:antialiased;border-spacing:0;font-family:sans-serif, '.'Poppins'.';color:#333333;" >
                                <tr style="-webkit-font-smoothing:antialiased;" >
                                    <td class="inner-padding-leftright" style="-webkit-font-smoothing:antialiased;padding-top:0;padding-bottom:0;padding-right:10px;padding-left:10px;" >

                                        <table class="contents" style="-webkit-font-smoothing:antialiased;border-spacing:0;color:#333333;width:100%;font-family:sans-serif, '.'Poppins'.';font-size:14px;line-height:20px;text-align:justify;min-width:100%;" >
                                            <tr style="-webkit-font-smoothing:antialiased;" >
                                                <td style="-webkit-font-smoothing:antialiased;padding-top:0px;padding-bottom:0;padding-right:0;padding-left:0;" >                                               
                                                </td>
                                            </tr>
                                        </table>

                                    </td>
                                </tr>
                            </table>

                        </div>

                        <!-- END INVOICE NUMBER -->


                        <!--[if (gte mso 9)|(IE)]>
                        </td><td width="300" valign="top" style="-webkit-font-smoothing:antialiased;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                        <![endif]-->


                        <!-- START EOA ADDRESS -->
                        <div class="column" style="-webkit-font-smoothing:antialiased;width:100%;max-width:200px;display:inline-block;vertical-align:top;" >

                            <table width="100%" style="-webkit-font-smoothing:antialiased;border-spacing:0;font-family:sans-serif, '.'Poppins'.';color:#333333;" >
                                <tr style="-webkit-font-smoothing:antialiased;" >
                                    <td class="contents inner-padding-leftright" style="-webkit-font-smoothing:antialiased;width:100%;padding-top:0;padding-bottom:1px;padding-right:10px;padding-left:10px;font-family:sans-serif, '.'Poppins'.';font-size:14px;line-height:20px;text-align:left;min-width:100%;" >
                                    </td>
                                </tr>
                            </table>

                        </div>
                        <!-- END EOA ADDRESS -->

                        <!--[if (gte mso 9)|(IE)]>
                        </td>
                        </tr>
                        </table>
                        <![endif]-->

                    </td>
            </tr>
            <!-- END RECEIPT HEADER -->

            <!-- START BILLING/PAYMENT BLOCK -->
            <tr>
                <td align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                    <center class="wrapper" style="width:100%;min-width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;" >
                        <div class="webkit" style="max-width:600px;margin: 0 auto;" >

                            <!--[if (gte mso 9)|(IE)]>
                            <table width="600" align="center" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:sans-serif, '.'Poppins'.';" >
                            <tr>
                            <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                            <![endif]-->

                            <table class="outer" align="center" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:sans-serif, '.'Poppins'.';Margin:0 auto;width:100%;max-width:600px;" >
                <tr>
                 <td>
                   <table width="100%" border="0" cellspacing="0" cellpadding="0" class="contents oi-table" style="-webkit-font-smoothing:antialiased;border-spacing:0;font-family:sans-serif, '.'Poppins'.';color:#333333;width:100%;text-align:left;min-width:100%;" >
                                         <tbody style="-webkit-font-smoothing:antialiased;" >
                       <tr style="-webkit-font-smoothing:antialiased;" >
                                                <td class="contents mobile-padding" style="-webkit-font-smoothing:antialiased;padding-top:0;padding-bottom:20px;padding-right:0;padding-left:0;width:100%;text-align:center;min-width:100%;" ><p class="h3" style="-webkit-font-smoothing:antialiased;Margin:0;font-family:sans-serif, '.'Poppins'.';font-weight:bold;font-size:36px;Margin-top:25px;Margin-bottom:0px;line-height:24px;color:#1f212d;" >Facturación</p></td>
                                            </tr>
                                             <tr style="-webkit-font-smoothing:antialiased;" >
                                                <td colspan="6" class="bold" style="-webkit-font-smoothing:antialiased;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-weight:bold;" >
                          <br><br>
                                                    <p class="h3" style="-webkit-font-smoothing:antialiased;Margin:0;font-family:sans-serif, '.'Poppins'.';font-weight:bold;font-size:25px;Margin-top:0px;Margin-bottom:20px;line-height:24px;color:#1f212d;" >Estimado Cliente:</p>
                          <p style="-webkit-font-smoothing:antialiased;Margin:0;color:#000000;font-family:sans-serif, '.'Poppins'.';font-size:15px;padding-top:0px;padding-bottom:20px;padding-right:0;padding-left:0;line-height:21px;Margin-top:0px;" >
                            Nos complace informarte que tus datos para realizar la factura han sido enviados correctamente, a la brevedad te estaremos remitiendo la factura de tu compra. A continuación, se desglosan los datos enviados. </p>
                         </td>

                                                </tr>
                        <tr style="-webkit-font-smoothing:antialiased;" >
                            <td class="bold bi-table bi-table-back inner-padding-bi white-background-for-mobile reset-height-for-mobile" style="-webkit-font-smoothing:antialiased;padding-top:5px;padding-bottom:5px;padding-right:15px;padding-left:15px;font-weight:bold;height:5px;vertical-align:top;text-align:justify;" >
                                <p style="-webkit-font-smoothing:antialiased;font-family:sans-serif, '.'Poppins'.';font-size:14px;Margin:0;line-height:24px;font-weight:bold;Margin-top:0px;color:#000;" >Nombre ó Razón Social: <label style="-webkit-font-smoothing:antialiased;font-family:sans-serif, '.'Poppins'.';font-size:14px;Margin:0;line-height:24px;Margin-top:0px;color:#7A7A7A;">'.$nombrerazonsocial.'</label>
                                </p>
                            </td>
                        </tr>

                        <tr style="-webkit-font-smoothing:antialiased;" >
                            <td class="bold bi-table bi-table-back inner-padding-bi white-background-for-mobile reset-height-for-mobile" style="-webkit-font-smoothing:antialiased;padding-top:5px;padding-bottom:5px;padding-right:15px;padding-left:15px;font-weight:bold;height:5px;vertical-align:top;text-align:justify;" >
                                <p style="-webkit-font-smoothing:antialiased;font-family:sans-serif, '.'Poppins'.';font-size:14px;Margin:0;line-height:24px;font-weight:bold;Margin-top:0px;color:#000;" >Calle: <label style="-webkit-font-smoothing:antialiased;font-family:sans-serif, '.'Poppins'.';font-size:14px;Margin:0;line-height:24px;Margin-top:0px;color:#7A7A7A;"> '.$calle.'</label>
                                </p>
                            </td>
                        </tr>

                        <tr style="-webkit-font-smoothing:antialiased;" >
                            <td class="bold bi-table bi-table-back inner-padding-bi white-background-for-mobile reset-height-for-mobile" style="-webkit-font-smoothing:antialiased;padding-top:5px;padding-bottom:5px;padding-right:15px;padding-left:15px;font-weight:bold;height:5px;vertical-align:top;text-align:justify;" >
                                <p style="-webkit-font-smoothing:antialiased;font-family:sans-serif, '.'Poppins'.';font-size:14px;Margin:0;line-height:24px;font-weight:bold;Margin-top:0px;color:#000;" >Número Exterior: <label style="-webkit-font-smoothing:antialiased;font-family:sans-serif, '.'Poppins'.';font-size:14px;Margin:0;line-height:24px;Margin-top:0px;color:#7A7A7A;">'.$numext.'</label>
                                </p>
                            </td>
                        </tr>

                        <tr style="-webkit-font-smoothing:antialiased;" >
                            <td class="bold bi-table bi-table-back inner-padding-bi white-background-for-mobile reset-height-for-mobile" style="-webkit-font-smoothing:antialiased;padding-top:5px;padding-bottom:5px;padding-right:15px;padding-left:15px;font-weight:bold;height:5px;vertical-align:top;text-align:justify;" >
                                <p style="-webkit-font-smoothing:antialiased;font-family:sans-serif, '.'Poppins'.';font-size:14px;Margin:0;line-height:24px;font-weight:bold;Margin-top:0px;color:#000;" >Número Interior: <label style="-webkit-font-smoothing:antialiased;font-family:sans-serif, '.'Poppins'.';font-size:14px;Margin:0;line-height:24px;Margin-top:0px;color:#7A7A7A;"> '.$numint.'</label>
                                </p>
                            </td>
                        </tr>

                        <tr style="-webkit-font-smoothing:antialiased;" >
                            <td class="bold bi-table bi-table-back inner-padding-bi white-background-for-mobile reset-height-for-mobile" style="-webkit-font-smoothing:antialiased;padding-top:5px;padding-bottom:5px;padding-right:15px;padding-left:15px;font-weight:bold;height:5px;vertical-align:top;text-align:justify;" >
                                <p style="-webkit-font-smoothing:antialiased;font-family:sans-serif, '.'Poppins'.';font-size:14px;Margin:0;line-height:24px;font-weight:bold;Margin-top:0px;color:#000;" >Ciudad: <label style="-webkit-font-smoothing:antialiased;font-family:sans-serif, '.'Poppins'.';font-size:14px;Margin:0;line-height:24px;Margin-top:0px;color:#7A7A7A;">'.$ciudad.'</label>
                                </p>
                            </td>
                        </tr>

                        <tr style="-webkit-font-smoothing:antialiased;" >
                            <td class="bold bi-table bi-table-back inner-padding-bi white-background-for-mobile reset-height-for-mobile" style="-webkit-font-smoothing:antialiased;padding-top:5px;padding-bottom:5px;padding-right:15px;padding-left:15px;font-weight:bold;height:5px;vertical-align:top;text-align:justify;" >
                                <p style="-webkit-font-smoothing:antialiased;font-family:sans-serif, '.'Poppins'.';font-size:14px;Margin:0;line-height:24px;font-weight:bold;Margin-top:0px;color:#000;" >Delegación/Municipio: <label style="-webkit-font-smoothing:antialiased;font-family:sans-serif, '.'Poppins'.';font-size:14px;Margin:0;line-height:24px;Margin-top:0px;color:#7A7A7A;">'.$municipio.' </label>
                                </p>
                            </td>
                        </tr>

                        <tr style="-webkit-font-smoothing:antialiased;" >
                            <td class="bold bi-table bi-table-back inner-padding-bi white-background-for-mobile reset-height-for-mobile" style="-webkit-font-smoothing:antialiased;padding-top:5px;padding-bottom:5px;padding-right:15px;padding-left:15px;font-weight:bold;height:5px;vertical-align:top;text-align:justify;" >
                                <p style="-webkit-font-smoothing:antialiased;font-family:sans-serif, '.'Poppins'.';font-size:14px;Margin:0;line-height:24px;font-weight:bold;Margin-top:0px;color:#000;" >Estado: <label style="-webkit-font-smoothing:antialiased;font-family:sans-serif, '.'Poppins'.';font-size:14px;Margin:0;line-height:24px;Margin-top:0px;color:#7A7A7A;"> '.$estado.'</label>
                                </p>
                            </td>
                        </tr>

                        <tr style="-webkit-font-smoothing:antialiased;" >
                            <td class="bold bi-table bi-table-back inner-padding-bi white-background-for-mobile reset-height-for-mobile" style="-webkit-font-smoothing:antialiased;padding-top:5px;padding-bottom:5px;padding-right:15px;padding-left:15px;font-weight:bold;height:5px;vertical-align:top;text-align:justify;" >
                                <p style="-webkit-font-smoothing:antialiased;font-family:sans-serif, '.'Poppins'.';font-size:14px;Margin:0;line-height:24px;font-weight:bold;Margin-top:0px;color:#000;" >Colonia: <label style="-webkit-font-smoothing:antialiased;font-family:sans-serif, '.'Poppins'.';font-size:14px;Margin:0;line-height:24px;Margin-top:0px;color:#7A7A7A;">'.$colonia.'</label>
                                </p>
                            </td>
                        </tr>

                        <tr style="-webkit-font-smoothing:antialiased;" >
                            <td class="bold bi-table bi-table-back inner-padding-bi white-background-for-mobile reset-height-for-mobile" style="-webkit-font-smoothing:antialiased;padding-top:5px;padding-bottom:5px;padding-right:15px;padding-left:15px;font-weight:bold;height:5px;vertical-align:top;text-align:justify;" >
                                <p style="-webkit-font-smoothing:antialiased;font-family:sans-serif, '.'Poppins'.';font-size:14px;Margin:0;line-height:24px;font-weight:bold;Margin-top:0px;color:#000;" >Código Postal: <label style="-webkit-font-smoothing:antialiased;font-family:sans-serif, '.'Poppins'.';font-size:14px;Margin:0;line-height:24px;Margin-top:0px;color:#7A7A7A;">'.$cp.'</label>
                                </p>
                            </td>
                        </tr>

                        <tr style="-webkit-font-smoothing:antialiased;" >
                            <td class="bold bi-table bi-table-back inner-padding-bi white-background-for-mobile reset-height-for-mobile" style="-webkit-font-smoothing:antialiased;padding-top:5px;padding-bottom:5px;padding-right:15px;padding-left:15px;font-weight:bold;height:5px;vertical-align:top;text-align:justify;" >
                                <p style="-webkit-font-smoothing:antialiased;font-family:sans-serif, '.'Poppins'.';font-size:14px;Margin:0;line-height:24px;font-weight:bold;Margin-top:0px;color:#000;" >Correo electrónico: <label style="-webkit-font-smoothing:antialiased;font-family:sans-serif, '.'Poppins'.';font-size:14px;Margin:0;line-height:24px;Margin-top:0px;color:#7A7A7A;"> '.$email.'</label>
                                </p>
                            </td>
                        </tr>

                        <tr style="-webkit-font-smoothing:antialiased;" >
                            <td class="bold bi-table bi-table-back inner-padding-bi white-background-for-mobile reset-height-for-mobile" style="-webkit-font-smoothing:antialiased;padding-top:5px;padding-bottom:5px;padding-right:15px;padding-left:15px;font-weight:bold;height:5px;vertical-align:top;text-align:justify;" >
                                <p style="-webkit-font-smoothing:antialiased;font-family:sans-serif, '.'Poppins'.';font-size:14px;Margin:0;line-height:24px;font-weight:bold;Margin-top:0px;color:#000;" >RFC: <label style="-webkit-font-smoothing:antialiased;font-family:sans-serif, '.'Poppins'.';font-size:14px;Margin:0;line-height:24px;Margin-top:0px;color:#7A7A7A;"> '.$rfc.'</label>
                                </p>
                            </td>
                        </tr>

                        <tr style="-webkit-font-smoothing:antialiased;" >
                            <td class="bold bi-table bi-table-back inner-padding-bi white-background-for-mobile reset-height-for-mobile" style="-webkit-font-smoothing:antialiased;padding-top:5px;padding-bottom:5px;padding-right:15px;padding-left:15px;font-weight:bold;height:5px;vertical-align:top;text-align:justify;" >
                                <p style="-webkit-font-smoothing:antialiased;font-family:sans-serif, '.'Poppins'.';font-size:14px;Margin:0;line-height:24px;font-weight:bold;Margin-top:0px;color:#000;" >No. Orden ó Pedido: <label style="-webkit-font-smoothing:antialiased;font-family:sans-serif, '.'Poppins'.';font-size:14px;Margin:0;line-height:24px;Margin-top:0px;color:#7A7A7A;"> '.$numpedido.' </label>
                                </p>
                            </td>
                        </tr>

                     </tbody>
                   </table>
                 </td>
                </tr>
                                <tr>
                                    <td class="" style="-webkit-font-smoothing:antialiased;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;text-align:center;font-size:0;" >

                                        <!--[if (gte mso 9)|(IE)]>
                                        <table width="600" style="-webkit-font-smoothing:antialiased;border-spacing:0;font-family:sans-serif, '.'Poppins'.';color:#333333;" >
                                        <tr style="-webkit-font-smoothing:antialiased;" >
                                        <td width="300" valign="top" style="-webkit-font-smoothing:antialiased;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                                        <![endif]-->


                                        <!-- START BILLING INFORMATION -->
                                        <div class="column" style="-webkit-font-smoothing:antialiased;width:100%;max-width:300px;display:inline-block;vertical-align:top;" >
                      
                                            
                                        </div>

                                        <!--[if (gte mso 9)|(IE)]>
                                        </td><td width="300" valign="top" style="-webkit-font-smoothing:antialiased;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                                        <![endif]-->


                                        <!-- START PAYMENT INFORMATION -->

                                        <div class="column" style="-webkit-font-smoothing:antialiased;width:100%;max-width:300px;display:inline-block;vertical-align:top;" >
                                            <table width="100%" style="-webkit-font-smoothing:antialiased;border-spacing:0;font-family:sans-serif, '.'Poppins'.';color:#333333;" >
                                                <tr style="-webkit-font-smoothing:antialiased;" >
                                                    <td class="inner-padding-leftright" style="-webkit-font-smoothing:antialiased;padding-top:0;padding-bottom:0;padding-right:10px;padding-left:10px;" >
                                                        <table class="contents" style="-webkit-font-smoothing:antialiased;border-spacing:0;color:#333333;width:100%;font-family:sans-serif, '.'Poppins'.';font-size:14px;line-height:20px;text-align:left;min-width:100%;" >
                                                            
                                                            <tr style="-webkit-font-smoothing:antialiased;" >
                                                                <td class="oi-table-valign" style="-webkit-font-smoothing:antialiased;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;vertical-align:top;" >

                                                                    
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- END BILLING INFORMATION -->

                                        <!--[if (gte mso 9)|(IE)]>
                                        </td>
                                        </tr>
                                        </table>
                                        <![endif]-->

                                    </td>
                                </tr>
                            </table>

                            <!--[if (gte mso 9)|(IE)]>
                            </td>
                            </tr>
                            </table>
                            <![endif]-->

                        </div>
                    </center>
                </td>
            </tr>
            <!-- END BILLING/PAYMENT BLOCK -->

            <!-- START ORDER INFO BLOCK -->
            <tr>
                <td align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                    <center class="wrapper" style="width:100%;min-width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;" >
                        <div class="webkit" style="max-width:600px;margin: 0 auto;" >

                            <!--[if (gte mso 9)|(IE)]>
                            <table width="600" align="center" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:sans-serif, '.'Poppins'.';" >
                            <tr>
                            <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                            <![endif]-->

                            

                            <!--[if (gte mso 9)|(IE)]>
                            </td>
                            </tr>
                            </table>
                            <![endif]-->

                        </div>
                    </center>
                </td>
            </tr>
            <!-- END ORDER INFO BLOCK -->

            <!-- START SPACER ROW -->
            <tr style="-webkit-font-smoothing:antialiased;" >
                <td class="one-column" style="-webkit-font-smoothing:antialiased;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                    <table width="100%" style="-webkit-font-smoothing:antialiased;border-spacing:0;font-family:sans-serif, '.'Poppins'.';color:#333333;" >
                        <tr style="-webkit-font-smoothing:antialiased;" >
                            <td class="contents mobile-padding" style="-webkit-font-smoothing:antialiased;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;width:100%;text-align:left;min-width:100%;" >&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <!-- END SPACER ROW -->

            <!-- START TOTAL BLOCK -->
            <tr>
                <td align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                    <center class="wrapper" style="width:100%;min-width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;" >
                        <div class="webkit" style="max-width:600px;margin: 0 auto;" >

                            <!--[if (gte mso 9)|(IE)]>
                            <table width="600" align="center" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:sans-serif, '.'Poppins'.';" >
                            <tr>
                            <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                            <![endif]-->

                            <table class="outer" align="center" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:sans-serif, '.'Poppins'.';Margin:0 auto;width:100%;max-width:600px;" >
                                <tr>
                                    <td class="one-column inner-padding-leftright mobile-padding-leftrightbottom" style="-webkit-font-smoothing:antialiased;padding-top:0;padding-bottom:0;padding-right:10px;padding-left:10px;" >
                                        <table width="100%" style="-webkit-font-smoothing:antialiased;border-spacing:0;font-family:sans-serif, '.'Poppins'.';color:#333333;" >
                                            <tr style="-webkit-font-smoothing:antialiased;" >
                                                <td class="contents" style="-webkit-font-smoothing:antialiased;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;width:100%;min-width:100%;text-align:left;" >
                                                    <table width="100%" style="-webkit-font-smoothing:antialiased;border-spacing:0;font-family:sans-serif, '.'Poppins'.';color:#333333;" >
                                                        <tr style="-webkit-font-smoothing:antialiased;" >
                                                            <td align="right" class="two-column final-total" style="-webkit-font-smoothing:antialiased;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;text-align:right;font-size:0;color:#ffffff;background-color:#fff;min-width:100%;" >
                                                                <div class="final-total-col2" style="-webkit-font-smoothing:antialiased;width:100%;max-width:300px;display:inline-block;vertical-align:top;float:right;" >
                                                                    <table width="100%" style="-webkit-font-smoothing:antialiased;border-spacing:0;font-family:sans-serif, '.'Poppins'.';color:#333333;width:100%;min-width:100%;" >
                                                                        <tr style="-webkit-font-smoothing:antialiased;" >
                                                                            <td class="inner-padding" style="-webkit-font-smoothing:antialiased;padding-top:10px;padding-bottom:10px;padding-right:10px;padding-left:10px;" >
                                                                    
                                                                            </td>
                                                                        </tr>
                                    <tr style="-webkit-font-smoothing:antialiased;" >
                                                                            <td class="inner-padding" style="-webkit-font-smoothing:antialiased;padding-top:10px;padding-bottom:10px;padding-right:10px;padding-left:10px;" >
                                      </td>
                                    </tr>
                                                                    </table>
                                                                </div>
                                                            </td>
                                                        </tr>
                            <tr style="-webkit-font-smoothing:antialiased;" >
                                                            <td align="right" class="two-column final-total" style="-webkit-font-smoothing:antialiased;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;text-align:right;font-size:0;color:#ffffff;background-color:#dd5465;min-width:100%;" >
                                                                <div class="final-total-col2" style="-webkit-font-smoothing:antialiased;width:100%;max-width:300px;display:inline-block;vertical-align:top;float:right;" >
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <!--[if (gte mso 9)|(IE)]>
                            </td>
                            </tr>
                            </table>
                            <![endif]-->

                        </div>
                    </center>
                </td>
            </tr>
            <!-- END TOTAL BLOCK -->
            <!-- START SPACER ROW -->
            <tr style="-webkit-font-smoothing:antialiased;" >
                <td class="one-column" style="-webkit-font-smoothing:antialiased;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                    <table width="100%" style="-webkit-font-smoothing:antialiased;border-spacing:0;font-family:sans-serif, '.'Poppins'.';color:#333333;" >
                        <tr style="-webkit-font-smoothing:antialiased;" >
                            <td class="contents mobile-padding" style="-webkit-font-smoothing:antialiased;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;width:100%;text-align:left;min-width:100%;" >&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <!-- END SPACER ROW -->

            <!-- START SEPARATOR -->
            <tr>
                <td id="separator-3" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-size:5px;color:#ffffff;line-height:5px;mso-line-height-rule:exactly;background-color:#dd5465;" >-</td>
            </tr>
            <!-- END SEPARATOR -->

            <!-- START FOOTER -->
            <tr>
                <td id="footer-region-back" align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;background-color:#E4E4E4;" >
                    <center class="wrapper" style="width:100%;min-width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;" >
                        <div class="webkit" style="max-width:600px;margin: 0 auto;" >

                            <!--[if (gte mso 9)|(IE)]>
                            <table width="600" align="center" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:sans-serif, '.'Poppins'.';" >
                            <tr>
                            <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                            <![endif]-->

                            <table class="outer" align="center" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:sans-serif, '.'Poppins'.';Margin:0 auto;width:100%;max-width:600px;" >
                                <tr>
                                    <td id="footer" class="padding-topbottom-10" style="padding-top:10px;padding-bottom:10px;padding-right:0;padding-left:0;" >
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;font-family:sans-serif, '.'Poppins'.';" >
                                            <tr>
                                                <td class="padding-20 contents center" style="width:100%;min-width:100%;text-align:center;padding-top:20px;padding-bottom:20px;padding-right:20px;padding-left:20px;" >
                          <p>
                            <img src="https://www.bepickler.com/miguel/BepicklerFuncional2.0/views/assests_general/imagenescorreos/fb_bp1.png" title="" alt="" width="30">
                            <img src="https://www.bepickler.com/miguel/BepicklerFuncional2.0/views/assests_general/imagenescorreos/insta_bp1.png" title="" alt="" width="30">
                            <img src="https://www.bepickler.com/miguel/BepicklerFuncional2.0/views/assests_general/imagenescorreos/spoty_bp1.png" title="" alt="" width="30">
                          <br>
                            <label style="font-size:14px;color:#3D3D3F;">Contacto y <a href="https://www.bepickler.com/pasteleriasenmexico/views/principal/faq.php" style="font-size:14px;color:#72A7F8;">preguntas frecuentes</a> <br>facturacion@bepickler.com</label>
                          </p>
                                                    <table border="0" cellspacing="0" cellpadding="0" align="center" width="95%" style="border-spacing:0;font-family:sans-serif, '.'Poppins'.';" >
                                                        <tr>
                                                            <td height="1" style="font-size:15px;color:#3D3D3F;mso-line-height-rule:exactly;line-height:1px;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#3D3D3F;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;"></td>
                                                        </tr>
                                                    </table>
                          <p style="Margin:0;Margin-top:0px;font-size:13px;line-height:20px;Margin-bottom:16px;color:#3D3D3F;">
                            <img src="https://www.bepickler.com/miguel/BepicklerFuncional2.0/views/assests_general/imagenescorreos/mount.jpeg" title="" alt="" width="130"></p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <!--[if (gte mso 9)|(IE)]>
                            </td>
                            </tr>
                            </table>
                            <![endif]-->

                        </div>
                    </center>
                </td>
            </tr>

            <!-- END FOOTER -->

        </table>
    </body>
</html>
	';	
	$contenido=$mensaje; //esto es lo que recibe la persona
    $asunto ='Solicitud de Factura de la Orden #'.$numpedido;
		

  // echo $nombre,$asunto,$destinatario,$mensaje;	
 
	
	$headers  = 'MIME-Version: 1.0' . "\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
	$headers .= 'From: facturacion@bepickler.com'."\n";
	$headers .= 'Cc: facturacion@bepickler.com' . "\n";
	
	
	//$envio = mail($destinatario,$asunto,$contenido,$headers);
	     
		if(mail($destinatario,$asunto,$contenido,$headers) )	
          			{
       
    	$miresultado='1';
             
       }else{
       $miresultado='0';
	       
          }  
		  echo $miresultado; 
    
	

?>
