<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller
{
	protected $view_data = array();
	protected $user_session = NULL;
	protected $is_first_user_to_regiter = FALSE;

	public function __construct()
	{
		parent::__construct();
		$this->user_session = $this->session->userdata('user_session');
		$this->is_first_user();
		$this->load->model('User_model'); //load user model
		$this->load->model('Project_user_model'); //load project user model
	}

	public function index()
	{
		$this->load->view('home_page_view');
	}
	
	private function is_first_user()
	{
		$this->load->model('User_model');
		if(!$this->User_model->is_user_tabel_empty())
		{
			$this->is_first_user_to_regiter = TRUE;
		}
	}
}