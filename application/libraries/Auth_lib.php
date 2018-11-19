<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_lib
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
        $this->ci->load->model('auth_model');
	}

	public function login($username, $password)
	{
		$user = $this->ci->auth_model->check_user($username, $password);
		if ($user->num_rows() > 0) {
			$userdata = $user->row_array();
			$array = array(
				'sess_id'		=> $userdata['id_user'],
				'sess_username'	=> $userdata['username'],
				'sess_email'	=> $userdata['email'],
				'logged_in'		=> TRUE
			);
			
			$this->ci->session->set_userdata( $array );

			return TRUE;
		}
	}

	public function logged_in()
	{
		if ($this->ci->session->userdata('logged_in') == true) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function logout()
	{
		
		$this->ci->session->unset_userdata('sess_id');
		$this->ci->session->unset_userdata('sess_username');
		$this->ci->session->unset_userdata('sess_email');		
		$this->ci->session->set_userdata(array('logged_in' => FALSE));

		$this->ci->session->sess_destroy();

		 return TRUE;		
	}

}

/* End of file Auth_lib.php */
/* Location: ./application/libraries/Auth_lib.php */
