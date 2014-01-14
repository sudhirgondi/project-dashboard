<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>../assets/css/global_test_app_style.css">
	<script type="text/javascript" src="<?= base_url() ?>../assets/js/jquery-1.10.2.min.js"></script> 
	<script src="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>../assets/js/jquery.tablesorter.js"></script> 
	<script type="text/javascript">

		$(document).ready(function(){
			$('#myTab a').click(function (e) {
			  e.preventDefault();
			  $(this).tab('show');
			});
		});
	</script>

</head>
<body>
	<div class="navbar navbar-fixed-top">  
	  <div class="navbar-inner">  
	    <div class="container">  
		    <ul class="nav">
			  <li class="active">
			    <a class="brand" href="/user/home">Yazana</a>
			  </li>
			  <li><a href="#">Dashboard</a></li>
			</ul>
			<ul class="nav pull-right">
<?php
			if (!$user_level) {
				echo '<li><a href="/user/admin_tool">Admin tool</a></li>';
			}
?>
				<li><a href="/user/sign_out">Sign out</a></li>
			</ul>
	    </div>  
	  </div>  
	</div>
	
	</br>
	</br>
	<div id="body" class="container">
		<div class="span12">
			<div class="clearfix">
				<label class="span3 text-right" for="project_name"><h4>Select Project: &nbsp;&nbsp;</h4></label>
				<div class="input">
					<select name="project_name" id="project_name" class="span6">
						<option class="span3" value="1">Project</option>;
						<option class="span3" value="1">Project1</option>;
						<option class="span3" value="1">Project2</option>;
					</select>
				</div>
			</div>	
		</div>
		</div>
	</div>
	</br>
	</br>

	<div class="container"> 
		<div class="span12">
			<ul id="myTab" class="nav nav-tabs">
			  <li class="active"><a href="#resources" data-toggle="tab"><h4>Resources & Deliverables</h4></a></li>
			  <li><a href="#development" data-toggle="tab"><h4>Development</h4></a></li>
			  <li><a href="#testing" data-toggle="tab"><h4>QA/Testing</h4></a></li>
			</ul>

            <div id="myTabContent" class="tab-content">
                <div class="tab-pane active in" id="resources">
					<div class="span3">
						<div class="span1.5"><strong>Project ID: </strong></div>
                   		<div class="span1.5">000000001</div>
					</div>
					<div class="span5">
						<div class="span1.5"><strong>Project Name: </strong></div>
                   		<div class="span2">Yazana Mockups, Navigation</div>
					</div>
					<div class="span3">
						<div class="span1.5"><strong>Project Status: </strong></div>
                   		<div class="span1">On Track </div>
					</div>
					<div class="span12"><p></p></div>
					<div class="span3">
						<div class="span1.5"><strong>Start Date:</strong></div>
                   		<div class="span1.5">01/02/2013</div>
					</div>
					<div class="span5">
						<div class="span1.5"><strong>Today's Date: </strong></div>
                   		<div class="span2.3">02/12/2013 </div>
					</div>
					<div class="span3">
                   		<div class="span1.5"><strong>End Date: </strong></div>
                   		<div class="span2.3">03/12/2013 </div>
					</div>
					<div class="span12"><p></p></div>
                   	<div class="span12">
                   		<div class="span1.8"><strong>Project Progress: </strong></div>
	                   	<div class="span9">
	                   		<div class="progress active" style="background: #ddd">
				                <div class="bar bar-success" style="width: 60%;"></div>
				            </div>
	                   	</div> 
                   	</div>
                </div>

                <div class="tab-pane fade" id="development">
					<div class="span3">
						<div class="span1.5"><strong>Project ID: </strong></div>
                   		<div class="span1.5">000000001</div>
					</div>
					<div class="span5">
						<div class="span1.5"><strong>Project Name: </strong></div>
                   		<div class="span2">Yazana Navigation</div>
					</div>
					<div class="span3">
						<div class="span1.5"><strong>Project Status: </strong></div>
                   		<div class="span1">On Track </div>
					</div>
					<div class="span12"><p></p></div>
					<div class="span3">
						<div class="span1.5"><strong>Start Date:</strong></div>
                   		<div class="span1.5">01/02/2013</div>
					</div>
					<div class="span5">
						<div class="span1.5"><strong>Today's Date: </strong></div>
                   		<div class="span2.3">02/12/2013 </div>
					</div>
					<div class="span3">
                   		<div class="span1.5"><strong>End Date: </strong></div>
                   		<div class="span2.3">03/12/2013 </div>
					</div>
					<div class="span12"><p></p></div>
                   	<div class="span12">
                   		<div class="span1.8"><strong>Project Progress: </strong></div>
	                   	<div class="span9">
	                   		<div class="progress active" style="background: #ddd">
				                <div class="bar bar-danger" style="width: 70%;"></div>
				            </div>
	                   	</div> 
                   	</div>
                </div>
                <div class="tab-pane fade" id="testing">
					<div class="span3">
						<div class="span1.5"><strong>Project ID: </strong></div>
                   		<div class="span1.5">000000001</div>
					</div>
					<div class="span5">
						<div class="span1.5"><strong>Project Name: </strong></div>
                   		<div class="span2">Yazana Navigation</div>
					</div>
					<div class="span3">
						<div class="span1.5"><strong>Project Status: </strong></div>
                   		<div class="span1">On Track </div>
					</div>
					<div class="span12"><p></p></div>
					<div class="span3">
						<div class="span1.5"><strong>Start Date:</strong></div>
                   		<div class="span1.5">01/02/2013</div>
					</div>
					<div class="span5">
						<div class="span1.5"><strong>Today's Date: </strong></div>
                   		<div class="span2.3">02/12/2013 </div>
					</div>
					<div class="span3">
                   		<div class="span1.5"><strong>End Date: </strong></div>
                   		<div class="span2.3">03/12/2013 </div>
					</div>
					<div class="span12"><p></p></div>
                   	<div class="span12">
                   		<div class="span1.8"><strong>Project Progress: </strong></div>
	                   	<div class="span9">
	                   		<div class="progress active" style="background: #ddd">
				                <div class="bar bar-warning" style="width: 40%;"></div>
				            </div>
	                   	</div> 
                   	</div>
                </div>
            </div>
         </div>
	</div>

		

</body>
</html>