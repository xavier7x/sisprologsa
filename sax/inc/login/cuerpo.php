<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administración | <?php echo $pdet_valor['empresa']; ?></title>    
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta name="google-site-verification" content="E6EbZNZHTInv3_xwF1qEXghhp9G5YUo0cjkhbfwcZK8" />
    <meta name="keywords" content="administracion del sistema marketton, administracion del proceso de los pedidos">
    <meta name="description" content="Administración integral del sistema de pedidos online Marketton, en donde gestionara los productos, pedidos, facturas, bodegas, etc.">
    <meta name='author' content='marketton.com'>
    <meta name='owner' content='Lcdo. Michael Jonathan Rodríguez Coello'>
    <meta name="robots" content="index, follow">
    
    <link href="images/system/favicon.ico?v=<?php echo $pdet_valor['webversion']; ?>" rel="icon" type="image/x-icon"/>
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">
    <link href="lib/css/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="lib/css/bootstrap-3.3.6-dist/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
    <link href="build/css/custom.min.css?v=<?php echo $pdet_valor['webversion']; ?>" rel="stylesheet">
    <!--<link href="css/login/style.css?v=<?php //echo $pdet_valor['webversion']; ?>" rel="stylesheet" type="text/css"/>-->
</head>
<body class="login">
<!-- Parametros de la aplicacion -->    
<input type="hidden" id="param_empresa" value="<?php echo $pdet_valor['empresa']; ?>">
    
<!-- Modal -->
<div class="modal fade" id="myModalWarning" role="dialog">
    <div class="modal-dialog">    
        <!-- Modal content-->
        <div class="modal-content panel-warning">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="myModalWarningTitle">Advertencia</h4>
            </div>
            <div class="modal-body text-center" id="myModalWarningBody"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModalSuccess" role="dialog">
    <div class="modal-dialog">    
        <!-- Modal content-->
        <div class="modal-content panel-success">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="myModalSuccessTitle">Éxito</h4>
            </div>
            <div class="modal-body text-center" id="myModalSuccessBody"></div>
        </div>
    </div>
</div>
<!--inicia nuevo estilo-->  
<div class="login_wrapper">
    <div class="animate form login_form">
        <section class="login_content">
        <form role="form" id="formLogin">
            <!--<h1>Acceso al sistema</h1>-->
            <h1>Bienvenido al sistema administrador de <b><?php echo $pdet_valor['empresa']; ?></b></h1>
            <div>
            <input autocomplete="off" type="text" id="usuario" class="form-control" placeholder="Ingrese su nombre de usuario" required/>
            </div>
            <div>
            <input autocomplete="off" type="password" id="contrasena" class="form-control" placeholder="Ingrese su contraseña" required/>
            </div>
            <div>
            <!--<a class="btn btn-default submit" href="#" id="submitFormLogin">Acceder</a>-->
            <button type="submit" id="submitFormLogin" class="btn btn-default submit">Acceder</button>
            <!--<a class="reset_pass" href="#">Lost your password?</a>-->
            </div>

            <div class="clearfix"></div>

            <div class="separator">
            <!--<p class="change_link">New to site?
                <a href="#signup" class="to_register"> Create Account </a>
            </p>-->

            <div class="clearfix"></div>
            <br />

            <div>
                <h1><i class="fa fa-paw"></i> <?php echo $pdet_valor['empresa']; ?></h1>
                <p>©<?php echo date("Y"); ?> All Rights Reserved. <?php echo $pdet_valor['empresa']; ?>.</p>
            </div>
            </div>
        </form>
        </section>
    </div>

    <!--<div id="register" class="animate form registration_form">
        <section class="login_content">
        <form>
            <h1>Create Account</h1>
            <div>
            <input type="text" class="form-control" placeholder="Username" required="" />
            </div>
            <div>
            <input type="email" class="form-control" placeholder="Email" required="" />
            </div>
            <div>
            <input type="password" class="form-control" placeholder="Password" required="" />
            </div>
            <div>
            <a class="btn btn-default submit" href="index.html">Submit</a>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
            <p class="change_link">Already a member ?
                <a href="#signin" class="to_register"> Log in </a>
            </p>

            <div class="clearfix"></div>
            <br />

            <div>
                <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
            </div>
            </div>
        </form>
        </section>
    </div>-->
</div>
    <!--fin nuevo estilo-->
    <!--<div class="container">
        
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="page-header text-center">
                        <h1>Acceso al sistema</h1>
                    </div>
                    <div class="alert alert-info text-center">
                        <blink>
                            Bienvenido al sistema administrador de <b><?php echo $pdet_valor['empresa']; ?></b>.
                        </blink>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Ingrese sus datos para acceder al Sistema <b class="pull-right"></b>
                        </div>
                        <div class="panel-body">
                        <form role="form" id="formLogin" class="form-horizontal">
                            <div class="form-group">
                                <label for="usuario" class="col-sm-2 control-label">Usuario</label>
                                <div class="col-sm-10">
                                    <input autocomplete="off" type="text" id="usuario" class="form-control" placeholder="Ingrese su nombre de usuario" required/>            
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contrasena" class="col-sm-2 control-label">Contraseña</label>
                                <div class="col-sm-10">
                                    <input autocomplete="off" type="password" id="contrasena" class="form-control" placeholder="Ingrese su contraseña" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10 text-right">
                                    <button type="submit" id="submitFormLogin" class="btn btn-info">Acceder</button>
                                </div>
                            </div>
                        </form>						  
                        </div>
                    </div>
                </div>
                <div class="col-sm-3"></div>
                </div>
            </div>
        </div>
        <footer class="text-center">
			<hr/>
			<img src="images/system/logo.png?v=<?php echo $pdet_valor['webversion']; ?>" alt="<?php echo $pdet_valor['empresa']; ?>" width="200" />
	    </footer>
    </div>-->

<script type="text/javascript" language="javascript" src="lib/js/jquery/jquery-2.2.4.min.js"></script>
<script type="text/javascript" language="javascript" src="lib/css/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="js/login/funciones.js?v=<?php echo $pdet_valor['webversion']; ?>"></script>

</body>
</html>