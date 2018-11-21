<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sandbox extends CI_Controller {

	public function index()
	{
		// $slug = url_title($this->input->post('title'),'-',TRUE);
		// echo $slug;
		print_r($this->input->post('category'));
	}

}

/* End of file Sandbox.php */
/* Location: ./application/controllers/Sandbox.php */