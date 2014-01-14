<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>../assets/css/global_test_app_style.css">
</head>
<body>
	<div class="navbar navbar-fixed-top">  
	  <div class="navbar-inner">  
	    <div class="container">  
		    <ul class="nav">
			  <li class="active">
			    <a class="brand" href="/user/home">Yazana</a>
			  </li>
			  <li><a href="/user/home">Home</a></li>
			</ul>
			<ul class="nav pull-right">
				<li><a href="/user/sign_in">Sign in</a></li>
			</ul>
	    </div>  
	  </div>  
	</div>
	<div id="body" class="container"> 
		<div class="row">
		    <div class="span4">
		    	<div class="well">
		        <legend>Sign Up</legend>
			    <!-- <h2>Sign Up</h2> -->
				    <form method="POST" action="/user/register_user" accept-charset="UTF-8">
<?php 
		            	if(isset($form_errors)) 
		            	{
		            		echo '<div class="alert alert-error">';
		            		echo $form_errors;
		            		echo '</div>';
		            	}; 
?>
				    	<label>Email Address:</label>
					    <input type="text" name="email" class="span3">
					    <label>First Name</label>
					    <input type="text" name="firstname" class="span3">
					    <label>Last Name</label>
					    <input type="text" name="lastname" class="span3">
					    <label>Password</label>
					    <input type="password" name="password" class="span3">
					    <label>Password Confirmation</label>
					    <input type="password" name="password_confirmation" class="span3">
					    <input type="submit" value="Register" class="btn btn-success pull-right">
				    	<div class="clearfix"></div>
			    	</form>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="span3">
				<a href="/user/sign_in">Already have an account? Login</a>
			</div>
		</div>
	</div>
</body>
</html>