<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->auth_lib->logged_in()) {
			redirect('user','refresh');
		}
	}

	public function auth()
	{
		
	}

	public function login()
	{
		$data	= [];

		// setting rules for validation input
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		// do confirmation
		if ($this->form_validation->run() == TRUE) {
			$username = $this->input->post('username');
			$password = do_hash($this->input->post('password'));		

			if ($this->auth_lib->login($username, $password) == TRUE) {
				redirect('user','refresh');
			}else{
				$this->session->set_flashdata('error', 'Username or password is incorrect, Please try again');

				redirect('login','refresh');
			}
		}

		$this->template->set('title','Login');
		$this->template->load('auth_template','content','auth/login', $data);
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */