<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="CARTOLA UEFA LEAGUE - ADMIN">
    <meta name="author" content="Diego Santos">
    <title>PORTABILIS</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url('css/sb-admin.css')?>" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url('css/plugins/morris.css')?>" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo base_url('font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery -->
    <script src="<?php echo base_url() ?>js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url() ?>js/plugins/morris/raphael.min.js"></script>
    <script src="<?php echo base_url() ?>js/plugins/morris/morris.min.js"></script>
    <script src="<?php echo base_url() ?>js/plugins/morris/morris-data.js"></script>
</head>
<body>
    <div id="wrapper" align="center" style="padding:0" margin:0>
		<div id="page-wrapper" style="width:600px" align="center">
	        <div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<?php if (isset($error)): ?>
							<div style="text-align:center;" class="alert alert-danger" role="alert"><?php echo $error; ?></div>
						<?php endif; ?>
						<form class="form-signin" method="POST" action="<?php echo base_url('index.php/Login/getAutentication');?>">
					    	<h2 class="form-signin-heading">PAINEL ADMINSTRATIVO</h2>
					        <label for="inputEmail" class="sr-only">Email</label>
					        <input type="email" name="EMAIL" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
					        <label for="inputPassword" class="sr-only">Senha</label>
					        <input type="password" name="SENHA" id="inputPassword" class="form-control" placeholder="Senha" required>
					        <!--div class="checkbox">
					        	<label>
					        		<input type="checkbox" value="remember-me"> Esqueci a senha
					        	</label>
					        </div-->
					        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
					    </form>
				    </div>
				</div>
			</div>
		</div>
	</div>
</body>
</html> 