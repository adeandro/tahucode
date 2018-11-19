<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->auth_lib->logged_in()) {
			$this->session->set_flashdata('error', 'You must login to access the page');
			redirect('auth/login','refresh');
		}
	}

	public function index()
	{
		echo $this->session->userdata('sess_username');
	}

	public function logout()
	{
		$this->auth_lib->logout();
		$this->session->set_flashdata('error', 'Logged Out');

		redirect('auth/login','refresh');
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */