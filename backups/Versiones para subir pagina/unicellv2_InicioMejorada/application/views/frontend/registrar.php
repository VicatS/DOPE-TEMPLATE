<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Sign Up | Coco - Responsive Bootstrap Template</title>  
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="keywords" content="coco bootstrap template, coco admin, bootstrap,admin template, bootstrap admin,">
        <meta name="author" content="Huban Creative">

        <link href="<?php echo base_url();?>assets/template2/assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>assets/template2/assets/libs/pace/pace.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>assets/template2/assets/libs/animate-css/animate.min.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>assets/template2/assets/libs/iconmoon/style.css" rel="stylesheet" />

        <!-- LESS FILE <link href="<?php echo base_url();?>assets/template2/assets/css/style.less" rel="stylesheet/less" type="text/css" /> -->
                <!-- Extra CSS Libraries Start -->
                <link href="<?php echo base_url();?>assets/template2/assets/css/style.css" rel="stylesheet" type="text/css" />
                <!-- Extra CSS Libraries End -->
        <!--[if lt IE 9]>
          <script src="<?php echo base_url();?>assets/template2/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="<?php echo base_url();?>assets/template2/https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <link rel="shortcut icon" href="<?php echo base_url();?>assets/template2/assets/img/favicon.ico">
        <link rel="apple-touch-icon" href="<?php echo base_url();?>assets/template2/assets/img/apple-touch-icon.png" />
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url();?>assets/template2/assets/img/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url();?>assets/template2/assets/img/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assets/template2/assets/img/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url();?>assets/template2/assets/img/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url();?>assets/template2/assets/img/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url();?>assets/template2/assets/img/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url();?>assets/template2/assets/img/apple-touch-icon-152x152.png" />    
    </head>
<body class=""><div id="wrapper">    <header>
        <div id="topbar">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-xs-6">
			<span class="hidden-sm hidden-xs"><i class="icon-location4"></i>CALLE BOLIVAR # 454 </span><span class="vertical-space"></span> <i class="icon-phone4"></i>+591 73439200
			</div>
			<div class="col-sm-6 col-xs-6 text-right">
				<div class="btn-group social-links hidden-sm hidden-xs">	
					<a href="https://www.facebook.com/tickitounlocker/" class="btn btn-link" target="_blank"><i class="icon-facebook4"></i></a>
                    <a href="https://api.whatsapp.com/send?phone=59173439200" class="btn btn-link" target="_blank"><i class="icon-mail4"></i></a>
                    <a href="https://twitter.com/tickitounlocker?s=08" class="btn btn-link" target="_blank"><i class="icon-twitter4"></i></a>
				</div>
			</div>
		</div>
		<div class="top-divider"></div>
	</div>
</div>            <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navigation">
                    <span class="icon-navicon"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>assets/template2/index.html">
                    <img src="<?php echo base_url();?>assets/template2/assets/img/logo.png" data-dark-src="<?php echo base_url();?>assets/template2/assets/img/logo_dark.png" alt="Coco Frontend Template" class="logo">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="main-navigation">
                <ul class="nav navbar-nav navbar-right">
                     <li><a href="<?php echo base_url();?>inicio" class="active">INICIO</a></li>
                    <!--<li><a href="<?php echo base_url();?>assets/template2/about.html">ABOUT</a></li>-->
                    <li><a href="<?php echo base_url();?>servicios" >SERVICIOS</a></li>
                    <!--<li><a href="<?php echo base_url();?>assets/template2/portfolio.html">PORTFOLIO</a></li>-->
                    <li><a href="<?php echo base_url();?>contactos" >CONTACTO</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-->
    </nav>        <section class="main-slider fullsize" data-stellar-background-ratio="0.5" style="background-image: url(assets/template2/images/headers/fondoRegistrar.jpg)">
	<div class="slider-caption">
		
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <form class="form-signin" role="form"  action="<?=base_url();?>administrador/registrartecnicos/storeTecnicos" method="POST">
                    <h2 class="form-signin-heading">REGÍSTRATE</h2>
                        <input type="hidden" name="estado" value="0">
                        <input type="hidden" name="rol" value="4">
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" placeholder="Nombres" name="nombres" required autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" placeholder="Apellido Paterno" name="apellido_paterno" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control input-lg" placeholder="Email" name="email" required>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control input-lg" placeholder="Nro Celular" name="celular" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" placeholder="Nombre Usuario" name="nombreUsuario" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control input-lg" placeholder="Password" name="contrasena" required>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success btn-flat" class="pull-right">Guardar</button>
                        <a class="btn btn-primary" href="<?php echo base_url() ?>inicio"> Cancelar </a>
                    </div>
              </form>
              ¿Ya tienes una cuenta? <a href="<?php echo base_url();?>auth"> Iniciar sesión</a> ahora!
            </div>
        </div>
      </div>	</div>
</section>    </header>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <a href="<?php echo base_url();?>assets/template2/#"> 
                            <img src="<?php echo base_url();?>assets/template2/assets/img/logo.png" alt="Coco Frontend Template" class="footer-logo"> 
                        </a>
                        <h5>Designing your future...</h5>
                        
                    </div>


                    <div class="col-sm-4">
                        <h4>CONTACT US</h4>
                        <ul class="list-unstyled company-info">
                            <li><i class="icon-map-marker"></i> 1375 Richmond Avenue<br>Minneapolis, MN 90017</li>
                            <li><i class="icon-phone3"></i> 1-800-666-666</li>
                            <li><i class="icon-envelope"></i> <a href="<?php echo base_url();?>assets/template2/mailto:contact@somecorporation.com">contact@somecorporation.com</a></li>
                            <li><i class="icon-alarm2"></i> Monday - Friday: <strong>8:00 am - 7:00 pm</strong><br>Saturday - Sunday: <strong>Closed</strong></li>
                        </ul>
                    </div>
                    
                    <div class="col-sm-4 hidden-xs">
                        <h4>SOCIAL STREAM</h4>
                        <ul class="list-unstyled social-stream">
                            <li><i class="icon-twitter4"></i> We just released an awesome frontend template for our coco template. Come on and check it out! - <a href="<?php echo base_url();?>assets/template2/http://goo.gl/ylVWzR">http://goo.gl/ylVWzR</a><br><span class="text-default text-sm">Oct 20</span></li>
                            <li><i class="icon-twitter4"></i> Our template is going popular. Don't miss it!<br><span class="text-default text-sm">Oct 19</span></li>
                            <li><i class="icon-facebook4"></i> World is becoming a crazy place. Try to avoid toxic materials.<br><span class="text-default text-sm">Oct 19</span></li>
                        </ul>
                    </div>
                </div>
                <hr>
                <div class="row"> 
                    <div class="col-sm-6">
                        <p>Copyright &copy; 2014 by <a href="<?php echo base_url();?>assets/template2/http://www.hubancreative.com" target="_blank">HubanCreative</a></p> 
                    </div>
                    <div class="col-sm-6 text-right">
                        <div class="social-links">
                            <a href="<?php echo base_url();?>assets/template2/javascript:;">
                                <i class="icon-twitter4"></i>
                            </a>
                            <a href="<?php echo base_url();?>assets/template2/javascript:;">
                                <i class="icon-facebook4"></i>
                            </a>
                            <a href="<?php echo base_url();?>assets/template2/javascript:;">
                                <i class="icon-instagram3"></i>
                            </a>
                            <a href="<?php echo base_url();?>assets/template2/javascript:;">
                                <i class="icon-vimeo3"></i>
                            </a>
                            <a href="<?php echo base_url();?>assets/template2/javascript:;">
                                <i class="icon-tumblr4"></i>
                            </a>
                            <a href="<?php echo base_url();?>assets/template2/javascript:;">
                                <i class="icon-googleplus6"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <a class="tothetop" href="<?php echo base_url();?>assets/template2/javascript:;"><i class="icon-angle-up"></i></a>
    </div>

    <script>
        var resizefunc = [];
    </script>
    <script src="<?php echo base_url();?>assets/template2/assets/libs/less-js/less-1.7.5.min.js"></script>
    <script src="<?php echo base_url();?>assets/template2/assets/libs/pace/pace.min.js"></script>
    <script src="<?php echo base_url();?>assets/template2/assets/libs/jquery/jquery-1.11.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/template2/assets/libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/template2/assets/libs/jquery-browser/jquery.browser.min.js"></script>
    <script src="<?php echo base_url();?>assets/template2/assets/libs/fastclick/fastclick.js"></script>
    <script src="<?php echo base_url();?>assets/template2/assets/libs/stellarjs/jquery.stellar.min.js"></script>
    <script src="<?php echo base_url();?>assets/template2/assets/libs/jquery-appear/jquery.appear.js"></script>
    <script src="<?php echo base_url();?>assets/template2/assets/js/init.js"></script>
    </body>
    <script type="text/javascript">
        function formReset()
        {
        document.getElementById("myForm").reset();
        }
    </script>
</html>