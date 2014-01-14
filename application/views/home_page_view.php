<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>../assets/css/global_test_app_style.css">
</head>
<body>
	<div class="navbar navbar-fixed-top">  
	  <div class="navbar-inner">  
	    <div class="container">  
	    <ul class="nav">
		  <li class="active">
		    <a class="brand" href="#"><strong>Yazana</strong></a>
		  </li>
		  <li><a href="#">Home</a></li>
		</ul>
		<ul class="nav pull-right">
			<li><a href="/user/sign_in">Sign in</a></li>
		</ul>
	    </div>  
	  </div>  
	</div>
<div class="container">	
	<div id="hero_wrapper">
		<div class="hero-unit">
			<h3>Welcome to the Yazana's Project Dashboard</h3>
			<p>Where you can see how your projects are doing. </p>
			<form action="/user/sign_in" method="post">
				<button class="btn btn-primary" type="submit">Start</button>
			</form>		
		</div>
	</div>

	<div class="row">
		<div class="span4">
			<h4>Project Deliverables</h4>
			<p>Check the status of all project deliverable to see whether your projects is on track</p>
		</div>

		<div class="span4">
			<h4>Test Case Execution</h4>
			<p>See all test case (unit, functional, etc.) execution results</p>
		</div>

		<div class="span4">
			<h4>Quality</h4>
			<p>Track defect find/fix rates to manage project quality and delivery.</p>
		</div>
		
	</div>
</div> <!-- /container -->
</body>
</html>