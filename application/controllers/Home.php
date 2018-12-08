<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('post_model');
	}

	public function index()
	{
		$data = [];
		$data['posts'] = $this->post_model->get_posts()->result();

		$this->template->set('title','TAHUCode');
		$this->template->load('master_template','content','home/index',$data);
	}

	public function show($slug)
	{
		$data = [];
		$data['post'] 		= $this->post_model->get_post_by_slug($slug)->row_array();
		$data['last_post'] = $this->post_model->get_last_post()->result();		

		$this->template->set('title', $slug);
		$this->template->load('master_template','content','home/show',$data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */