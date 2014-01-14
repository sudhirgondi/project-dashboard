<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Load extends CI_Controller
{
	var $view_data = array();

	function upload_file()
	{
		$allowedExts = array("csv");
		$temp = explode(".", $_FILES["file"]["name"]);
		$extension = end($temp);
		if (in_array($extension, $allowedExts))
		{
		  if ($_FILES["file"]["error"] > 0)
		  {
		    $this->view_data['form_errors'] = $_FILES["file"]["error"];
		    $this->load->view('admin_tool_view', $this->view_data);
		  }
		  else
		  {
		    if (file_exists("upload/" . $_FILES["file"]["name"]))
		    {
		      $this->view_data['form_errors'] = $_FILES["file"]["name"] . " already exists. ";
		      $this->load->view('admin_tool_view', $this->view_data);
		    }
		    else
		    {
		      move_uploaded_file($_FILES["file"]["tmp_name"],
		      "upload/" . $_FILES["file"]["name"]);

		      $this->import_file("upload/" . $_FILES["file"]["name"]);
		      // $this->load->view('admin_tool_view', $this->view_data);
		      // echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
		    }
		  }

		}
		else
		{
		  $this->view_data['form_errors'] = "Invalid file";
		  $this->load->view('admin_tool_view', $this->view_data);
		}
	}


	function import_file($uploaded_file_name)
	{
		// if(($this->input->post('data') === "user_data") and ($this->input->post('data_source') === "excel"))
		// {
			$current_row = 1; 
			// $handle = fopen($this->input->post('excel_file'), "r"); 
			ini_set('auto_detect_line_endings',TRUE);
			$handle = fopen($uploaded_file_name, "r"); 

			echo $handle."\n";
			// $data = fgetcsv($handle, 10000, ",");

			// var_dump($data);
			
			while ( ($data = fgetcsv($handle, 10000, ","))) 
			{ 
				echo "in file read loop";
			    $number_of_fields = count($data); 
			    if ($current_row == 1) 
			    { 
			    //Header line 
			        for ($c=0; $c < $number_of_fields; $c++) 
			        { 
			            $header_array[$c] = $data[$c]; 
			        } 
			    } 
			    else 
			    { 
			    //Data line 
			        for ($c=0; $c < $number_of_fields; $c++) 
			        { 
			            $data_array[$header_array[$c]] = $data[$c]; 
			        } 

			         $this->load->view('admin_tool_view');
						 print_r($data_array); 
						 var_dump($data_array);
						 echo "<pre>";
						 var_dump($data_array);
						 echo "</pre>";
			    } 
			    $current_row++; 
			} 

			fclose($handle); 
			ini_set('auto_detect_line_endings',FALSE);
			$this->view_data['form_errors'] = "Not able to read ".$uploaded_file_name;
			$this->load->view('admin_tool_view', $this->view_data);
			unlink($uploaded_file_name);
		// }
	}
}