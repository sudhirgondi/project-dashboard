<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Tool</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>../assets/css/global_test_app_style.css">
	<script type="text/javascript" src="<?= base_url() ?>../assets/js/jquery-1.10.2.min.js"></script> 
	<script type="text/javascript" src="<?= base_url() ?>../assets/js/jquery.tablesorter.js"></script> 

</head>
<body>

	<div class="navbar navbar-fixed-top">  
	  <div class="navbar-inner">  
	    <div class="container">  
		    <ul class="nav">
			  <li class="active">
			    <a class="brand" href="/user/home">Yazana</a>
			  </li>
			  <li><a href="/user/dashboard">Dashboard</a></li>
			</ul>
			<ul class="nav pull-right">
				<li><a href="/user/sign_out">Sign out</a></li>
			</ul>
	    </div>  
	  </div>  
	</div>
	<div id="body" class="container"> 
		<div class="span12">
			<h2 class="text-center">Admin Tool</h2>
		</div>
			<div>
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
			</div>

		    <div class="span12 import_data">
		        <legend>Import Data</legend>
		        <form method="POST" action="/load/upload_file" accept-charset="UTF-8" enctype="multipart/form-data">		        	
					<div class="span4">
						<input type="radio" name="data" value="user_data"/> &nbsp;&nbsp;User Data</br>
						<input type="radio" name="data" value="project_status"/> &nbsp;&nbsp;Project Status Data</br>
						<input type="radio" name="data" value="project_data"/> &nbsp;&nbsp;Project Data</br>
						<input type="radio" name="data" value="resource_data"/> &nbsp;&nbsp;Resource Data</br>
						<input type="radio" name="data" value="deliverable_data"/> &nbsp;&nbsp;Deliverable Data</br>
						<input type="radio" name="data" value="tc_status_data"/> &nbsp;&nbsp;Test Case Status Data</br>
						<input type="radio" name="data" value="tc_type_data"/> &nbsp;&nbsp;Test Case Type Data</br>
						<input type="radio" name="data" value="defect_status_data"/> &nbsp;&nbsp;Defect Status Data</br>
						<input type="radio" name="data" value="defect_type_data"/> &nbsp;&nbsp;Defect Type Data</br>
						<input type="radio" name="data" value="defect_data"/> &nbsp;&nbsp;Defect Data</br>
					</div>
					<div class="span3">
						<input type="radio" name="data_source" value="excel"/> &nbsp;&nbsp;Excel</br>
						<input type="radio" name="data_source" value="data_source"/> &nbsp;&nbsp;Data Source</br></br></br>
					</div>
					<div class="span4">
						<input type="file" name="file" id="file"/>&nbsp;&nbsp;
						<input type="text" name="data_source_link" placeholder="Data source link"/>
					</div>
					<div class="span12">
						<button class="btn btn-success imp_data" type="submit">Import Data</button>
					</div>
		        </form>    
		      </div>
		    </div>
			</br></br></br>
	</div>
	<div class="container">
		     <div class="span12 import_data">
		        <legend>Manual Project Data Entry</legend>
		        <form method="POST" action="" accept-charset="UTF-8">		        	
					
					<div class="span12">
						Project Name: <input type="text" name="project_name" class="span4"/>&nbsp;&nbsp;
						Start Date: <input type="text" name="start_date" class="span2"/>&nbsp;&nbsp; 
						End Date: <input type="text" name="end_date" class="span2"/> </br>
						<button class="btn btn-success save" type="submit">Save</button> 
					</div>
				
		        </form>    
		      </div>
		    </div>
	<div>
	</br></br></br>
	<div class="container">
		     <div class="span12 import_data">
		        <legend>Manual Project Deliverable Data Entry </legend>
		        <form method="POST" action="" accept-charset="UTF-8">		        	
					
					<div class="span12">
						Project Name: <input type="text" name="project_name" class="span4"/>&nbsp;&nbsp;
						Deliverable Name: <input type="text" name="project_name" class="span4"/></br>
						Resource Name: <input type="text" name="project_name" class="span4"/>&nbsp;&nbsp;
						Start Date: <input type="text" name="start_date" class="span2"/> 
						End Date: <input type="text" name="end_date" class="span2"/> </br>
						<button class="btn btn-success save" type="submit">Save</button> 
					</div>
					
		        </form>    
		      </div>
		    </div>
	<div>
	</br></br></br>
	<div class="span12"><p></p></div>
	<div class="span12"><p></p></div>	
</body>
</html>