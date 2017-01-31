<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta charset="utf-8" />
		<title>TRENDS by mobile my day</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1" name="viewport" />
		<meta content="" name="description" />
		<meta content="" name="author" />
		<meta name="google-site-verification" content="ohU9UZxMyldgxXdJeX3kRO9RZpwDAnAmko9c36AeN7s" />
		<?php $this->load->view('common/css') ?>
		<link rel="shortcut icon" href="favicon.ico" />
		<!--<meta name="google-signin-client_id" content="381487630406-vhvcp9hcod69rtf4sdj8eih3gmfrp74q.apps.googleusercontent.com">
		<script src="https://apis.google.com/js/platform.js?signed_in=false" async defer></script>
		<script type="text/javascript">
			function onSignIn(googleUser) {
				$('.g-signin2').remove();
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); 
}
</script> -->
	</head>

	<body class="page-container-bg-solid page-boxed page-header-menu-fixed">
			<div style="display:none" class="g-signin2" data-onsuccess="onSignIn"></div>
		<?php $this->load->view('common/header') ?>
		<div class="page-container">
			<div class="page-content-wrapper">
			
				<?php $this->load->view('common/title') ?>
				<?php $this->load->view($this->router->class.'/'.$this->router->method) ?>
			</div>
		</div>
		<?php $this->load->view('common/footer') ?>
		<?php $this->load->view('common/js') ?>
	</body>

</html>