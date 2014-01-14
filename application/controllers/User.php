<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('Main.php');

class User extends Main
{
	protected $user_level;
	protected $user_ses;

	public function register_user()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email Address:', 'trim|valid_email|required|xss_clean');
		$this->form_validation->set_rules('firstname', 'First Name:', 'trim|alpha|required|xss_clean');
		$this->form_validation->set_rules('lastname', 'Last Name:', 'trim|alpha|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password:', 'trim|min_length[6]|required|xss_clean');
		$this->form_validation->set_rules('password_confirmation', 'Password Confirmation:', 'trim|min_length[6]|required|matches[password]');

		if($this->form_validation->run() === FALSE)
		{
			$this->view_data['form_errors'] = validation_errors();
			$this->load->view('registration_page_view', $this->view_data);

		} else
		{
			//check to see if email is already registered
			if (! $this->User_model->get_user_info($this->input->post('email'))) //email not registered
			{
				if ($this->is_first_user_to_regiter) 
				{
					$user_level = 0;	//admin user
				} else
				{
					$user_level = 1;	//regular user
				}

				$this->load->library('encrypt');
				$password = $this->encrypt->encode($this->input->post('password'));

				// echo mdate($datestring, $time);

				$user = array('email' => $this->input->post('email'),
						'first_name' => $this->input->post('firstname'),
						'last_name' => $this->input->post('lastname'),
						'password' => $password,
						'description' => "",
						'user_level' => $user_level
						);
				// var_dump($user);
				$inserted = $this->User_model->register_user($user); //add user to the db

				if($inserted) //successfully inserted user
				{
					$this->view_data['conf_message'] = "Thank you for registering ".$this->input->post('firstname')."! Sign in to start using Test App.";

					$this->load->view('signin_page_view', $this->view_data);
				} else
				{
					$this->view_data['form_errors'] = "Oops! Something went wrong while attempting to add you to db :(";
					$this->load->view('registration_page_view', $this->view_data);
					// redirect(base_url('/user/display_registration_page'));
				}

			} else
			{
				$this->view_data['form_errors'] = $this->input->post('email')." is already registered. Contact admin to reset your password or enter a different email.";
				$this->load->view('registration_page_view', $this->view_data);
				// redirect(base_url('/user/display_registration_page'));
			}
		}
	}


	public function authenticate_user()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email Address:', 'trim|valid_email|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password:', 'trim|min_length[6]|max_length[12]|required|xss_clean');
		
		if($this->form_validation->run() === FALSE)
		{
			$this->view_data['form_errors'] = validation_errors();
			$this->load->view('signin_page_view', $this->view_data);
		} else
		{
			$user_entered_email = $this->input->post('email');
			$user_entered_password = $this->input->post('password');

			$user = $this->User_model->get_user_info($user_entered_email);
	
			$this->output->enable_profiler(TRUE);
			if ($user) 
			{
				$decrypted_password = $this->encrypt->decode($user->password);
				
				if ($decrypted_password === $user_entered_password) 
				{
					//create user session and put user on dashboard
					$this->session->set_userdata('user_session', $user);

					$this->user_level = $user->user_level;
					$this->user_ses = $user;

					$this->view_data['user_level'] = $user->user_level;

					$this->load->view('dashboard_view', $this->view_data);
					$this->output->enable_profiler(TRUE);

				} else
				{
					// back to login page - invalid password
					$this->view_data['form_errors'] = "You have entered an invalid password. Try again.";
					$this->load->view('signin_page_view', $this->view_data);
				}	
			} else
			{
				// back to login page - email mismatch
				$this->view_data['form_errors'] = "You have entered a wrong email. Try again.";
				$this->load->view('signin_page_view', $this->view_data);
			}
		}
	}
	public function sign_in()
	{
		$this->load->view('signin_page_view');
	}

	public function sign_out()
	{
		$this->session->sess_destroy();
		$this->load->view('signin_page_view');
	}

	public function admin_tool()
	{
		$this->load->view('admin_tool_view');
	}

	public function dashboard()
	{
		$this->view_data['user_level'] = $this->user_ses['user_level'];
		$this->load->view('dashboard_view', $this->view_data);
	}

	public function home()
	{
		$this->load->view('home_page_view');
	}

	public function registration()
	{
		$this->load->view('registration_page_view');
	}
	
} 