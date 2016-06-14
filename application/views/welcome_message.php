	<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link href="<?php echo base_url('libs/css/materialize.min.css'); ?>" rel="stylesheet" />


</head>
<body>
	<div class="container">
		<span><?php print_r($this->session->userdata('logged_in')); ?></span>

	  <div id="login-page" class="row">
	    <div class="col offset-s3 s5 z-depth-4 card-panel">
	    	<div class="row">
	    		<div class="col s12 center" style="height: 100px;color: black">
						<?php echo validation_errors(); ?>
	    		</div>
	    	</div>
				<?php echo form_open('verificarlogin'); ?>

	      <!--<form class="login-form" action="validate/login.php" method="POST">-->
	        <div class="row">
	          <div class="input-field col s12 center">
	            <img src="<?php echo base_url('libs/images/avatar_2x.png'); ?>" style="width: 200px;height: 150px;" >
	            <p class="center login-form-text">SCRUMVE</p>
	          </div>
	        </div>
	        <div class="row margin">
	          <div class="input-field offset-s1 col s9">
	            <i class="mdi-social-person-outline prefix"></i>
	            <input id="username" type="text" name="username" required="">
	            <label for="username" class="center-align">Username</label>
	          </div>
	        </div>
	        <div class="row margin">
	          <div class="input-field offset-s1 col s9">
	            <i class="mdi-action-lock-outline prefix"></i>
	            <input id="password" type="password" name="password" required="">
	            <label for="password">Password</label>
	          </div>
	        </div>
	        <!--<div class="row">
	          <div class="input-field col s12 m12 l12  login-text">
	              <input type="checkbox" id="remember-me">
	              <label for="remember-me">Remember me</label>
	          </div>
	        </div>-->
	        <div class="row">
	          <div class="input-field offset-s3 col s6">
	          	<input type="submit" value="Entrar" class="btn  col s12" style="background: #727272"></input>

	          </div>
	        </div>
	        <!--<div class="row">
	          <div class="input-field col s6 m6 l6">
	            <p class="margin medium-small"><a href="http://demo.geekslabs.com/materialize/v2.3/layout03/page-register.html">Register Now!</a></p>
	          </div>
	          <div class="input-field col s6 m6 l6">
	              <p class="margin right-align medium-small"><a href="http://demo.geekslabs.com/materialize/v2.3/layout03/page-forgot-password.html">Forgot password ?</a></p>
	          </div>
	        </div>-->

	      </form>
	    </div>
	  </div>
	</div>

<script type="text/javascript" src="<?php echo base_url('libs/js/jquery-2.1.4.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('libs/js/materialize.min.js'); ?>"></script>
</body>
</html>
