<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Codeigniter Image gallery</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">    
	   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
     <!-- Jasny bootstrap -->
    <link href="<?php echo base_url(); ?>assets/css/jasny-bootstrap.min.css" rel="stylesheet" media="screen">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<nav class="navbar navbar-default navbar-fixed-top">
  		<div class="container">
  			<div class="navbar-header">
  				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
		      	</button>
		      	<a class="navbar-brand" href="<?php echo site_url(); ?>">CI Image Gallery</a>
  			</div>  
	      	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">		  		
		      	<ul class="nav navbar-nav navbar-right">
			        <li><a href="<?php echo site_url("site/latest") ?>">Latest Update</a></li>
			        <li><a href="<?php echo site_url("site/popular") ?>">Popular</a></li>			        
			    </ul>
		    </div>
  						
  		</div>
  	</nav>
    <div class="container">