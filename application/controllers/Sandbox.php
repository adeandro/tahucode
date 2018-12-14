<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sandbox extends CI_Controller {

	public function index()
	{
		$this->load->view('sandsbox/upload', array('error' => ''));
	}

	public function upload()
	{
		$config['upload_path'] = './assets/img/posts/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '10000';
		$config['max_width']  = '2000';
		$config['max_height']  = '2000';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('img')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('sandsbox/upload', $error);
		}
		else{
			$data =$this->upload->data();
			echo $data['file_name'];
		}
	}

	public function ok()
	{
		echo "masuk pak eko";
	}

	public function error()
	{
		echo "error pak eko <br>";
		
	}

}

/* End of file Sandbox.php */
/* Location: ./application/controllers/Sandbox.php */