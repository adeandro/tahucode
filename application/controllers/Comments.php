<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('post_model');
	}

	public function insert_comment()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('comment', 'comment', 'required');

		if ($this->form_validation->run() == TRUE) {

			$get_id		= $this->post_model->get_post_id_by_slug($this->input->post('slug'))->row_array();	

			$data = [
				'name'		=> $this->input->post('name'),
				'email'		=> $this->input->post('email'),
				'comment' 	=> $this->input->post('comment'),
				'id_post'	=> $get_id['id_post'],
				'timestamp' => now()
			];

			if ($this->post_model->insert_comment($data)) {
				$this->session->set_flashdata('success', 'Comment saved');
				redirect('s/'.$this->input->post('slug'),'refresh');
			}else{
				$this->session->set_flashdata('error', 'Comment error');
				redirect('s/'.$this->input->post('slug'),'refresh');
			}

		}


	}

}

/* End of file Controller.php */
/* Location: ./application/controllers/Controller.php */