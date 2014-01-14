<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Signin Page</title>
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
				<li><a href="#">Sign in</a></li>
			</ul>
	    </div>  
	  </div>  
	</div>
	<div id="body" class="container"> 
		<div class="row">
		    <div class="span4">
		      <div class="well">
		        <legend>Sign in to Yazana</legend>
		        <form method="POST" action="/user/authenticate_user" accept-charset="UTF-8">		        	
<?php 
		            	if(isset($form_errors)) 
		            	{
		            		echo '<div class="alert alert-error">';
		            		echo $form_errors;
		            		echo '</div>';
		            	}; 

		            	if (isset($conf_message)) 
		            	{
		            		echo '<div class="alert alert-success">';
				            echo '<strong>Success!</strong> ';
				            echo $conf_message;
				            echo '</div>';
		            	}
?>
		            <label>Email Address:</label>
		            <input class="span3" placeholder="Email address" type="text" name="email">
		            <label>Password:</label>
		            <input class="span3" placeholder="Password" type="password" name="password"> 
		            <button class="btn btn-success pull-right" type="submit">Login</button>      
		        </form>    
		      </div>
		    </div>
		</div>
		<div class="row">
			<div class="span4">
				<a href="/user/registration">Don't have an account? Register</a>
			</div>
		</div>
	</div>
</body>
</html>