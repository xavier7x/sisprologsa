<!DOCTYPE html>
<html lang="es">
<head>
    <!-- google analytics -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-121194263-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-121194263-1');
    </script>

    <!-- fin google analytics -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="<?php echo $menu_acceso['descripcion'];?>">
    <meta name="keywords" content="<?php echo $menu_acceso['keywords'];?>">
    <!--<link rel="icon" href="<?php echo $server?>images/favicon.ico" />-->
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $server?>images/ico.png">
    <title>Sisprologsa | <?php echo $menu_acceso['nombre'];?> | SISTEMAS Y PRODUCTOS LOGISTICOS</title>
    <!-- Bootstrap -->
    <link href="<?php echo $server?>css/bootstrap.min.css" rel="stylesheet">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="<?php echo $server?>css/style.css">
    <!-- animsition css -->
    <link rel="stylesheet" type="text/css" href="<?php echo $server?>css/animsition.min.css">
    <!-- Font Awesome CSS -->
    <link href="<?php echo $server?>css/font-awesome.min.css" rel="stylesheet">
    <!-- font css -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <!-- owl Carousel Css -->
    <link href="<?php echo $server?>css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo $server?>css/owl.theme.css" rel="stylesheet">
    <link rel="alternate" href="<?php echo $server?>" hreflang="es-ec" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--recaptcha version 2-->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <!--fin recaptcha-->
</head>

<body class="animsition">

    <?php echo '<div class="intro-section_inicio">' ?>
        <!-- intro section -->
        <div class="top-header">
            <!-- top heder -->
            <div class="container">
                <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-5  hidden-xs">
                            <p><a style="color: white;" class="animsition-link" href="<?php echo $server?>proforma/">Tu proforma en segundos</a></p>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-7 hidden-xs">
                            <div class="pull-right">
                                <span class="top-link"><i class="fa fa-phone"></i> <?php echo $celular; ?></span>
                                <span class="top-link"><i class="fa fa-envelope"></i><a href="mailto:<?php echo $correo; ?>"><?php echo $correo; ?></a></span>
                                <span class="navigation-search top-link">
                                <a href="#"><i class="fa fa-search"></i></a>
                                </span>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <!-- /.top header -->
        