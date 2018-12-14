<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function check_user($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$data = $this->db->get('users');

		return $data;
	}

}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */