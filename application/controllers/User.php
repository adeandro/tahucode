<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	protected $publish;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('post_model');


		if (!$this->auth_lib->logged_in()) {
			$this->session->set_flashdata('error', 'You must login to access the page');
			redirect('auth/login','refresh');
		}
	}

	public function index()
	{
		$data = [];

		$this->template->set('title', $this->session->userdata('sess_username'));
		$this->template->load('user_template','content','user/dashboard',$data);
	}

	public function post()
	{
		$data = [];
		$start = ceil(($this->uri->segment(3) * 5) / 2);
		$end = $start + 5;
		$data['posts'] 	= $this->post_model->get_posts($end, $start);
		$data['paging'] = ceil($this->post_model->get_posts_paging()->num_rows() / 5);

		$this->template->set('title', 'Post');
		$this->template->load('user_template','content','user/post', $data);
	}

	public function show($slug)
	{
		$data 			= [];
		$data['post'] 	= $this->post_model->get_post_by_slug($slug)->row_array();

		$this->template->set('title', $slug);
		$this->template->load('user_template','content','user/show', $data);

	}

	public function create()
	{
		$data = [];
		$data['categories']= $this->post_model->get_categories();

		// set validation 
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');
		$this->form_validation->set_rules('tags', 'Tags', 'required');
		// $this->form_validation->set_rules('category', 'Category', 'required');
		// $this->form_validation->set_rules('header_image', 'Header Image', 'required');


		if ($this->form_validation->run() == TRUE) {

			$config['upload_path'] 	= './assets/img/posts/';
			$config['allowed_types']= 'gif|jpg|png';
			$config['max_size']  	= '10000';
			$config['max_width']  	= '2000';
			$config['max_height']  	= '2000';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('header_image')){
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('error', $error);
				redirect('post/create','refresh');
			}
			else{
				$file_info = $this->upload->data();

				$data = [
						'title' 		=> $this->input->post('title'),
						'content' 		=> $this->input->post('content'),
						'category' 		=> $this->input->post('category'),
						'timestamp'		=> now(),
						'published' 	=> 1,
						'id_user' 		=> $this->session->userdata('sess_id'),
						'slug' 			=> url_title($this->input->post('title'),'-',TRUE).".html",
						'header_image'	=> $file_info['file_name'],
						'tags'			=> $this->input->post('tags')
					];

					if ($this->post_model->save_post($data) == TRUE) {
						$this->session->set_flashdata('success', 'Success publish new post');
						redirect('user/post','refresh');
					}else{
						$this->session->set_flashdata('error', 'Failed publish new post');
						redirect('post/create','refresh');
					}
			}

			
		}

		$this->template->set('title', 'Create new post');
		$this->template->load('user_template', 'content', 'user/create', $data);
	}

	public function edit($slug)
	{
		$data = [];

		$data['post'] 		= $this->post_model->get_post_by_slug($slug)->row_array();
		$data['categories'] = $this->post_model->get_categories()->result();		

		$this->template->set('title', $slug);
		$this->template->load('user_template','content','user/edit', $data);
	}

	public function update($slug)
	{
		$update_data = [
			'title' 	=> $this->input->post('title'),
			'content'	=> $this->input->post('content'),
			'category'	=> $this->input->post('category'),
			'slug'		=> url_title($this->input->post('title'),'-', TRUE).".html",
			'tags' 		=> $this->input->post('tags')
		];

		if ($this->post_model->update_post($update_data, $slug)) {
			$this->session->set_flashdata('success', 'Success updating post');
			redirect('user/post','refresh');
		}else{
			$this->session->set_flashdata('error', 'Error updating post');
			redirect('post/edit/$slug','refresh');
		}
	}

	public function delete($id_post)
	{
		$data = $this->post_model->get_post_by_id($id_post)->row_array();
		
		if (file_exists('./assets/img/posts/'.$data['header_image'])) {

			unlink('./assets/img/posts/'.$data['header_image']);
			
			if ($this->post_model->delete($id_post)) {
				$this->session->set_flashdata('success', 'Success delete data');
				redirect('user/post','refresh');
			}else{
				$this->session->set_flashdata('error', 'Failed delete data');
				redirect('user/post','refresh');
			}
		}else{
			if ($this->post_model->delete($id_post)) {
				$this->session->set_flashdata('success', 'Success delete data');
				redirect('user/post','refresh');
			}else{
				$this->session->set_flashdata('error', 'Failed delete data');
				redirect('user/post','refresh');
			}
		}

	}

	// category operatin

	public function category()
	{
		$data = [];

		$data['categories'] = $this->post_model->get_categories();

		$this->template->set('title','Category');
		$this->template->load('user_template','content','user/category', $data);
	}

	public function category_save()
	{
		$this->form_validation->set_rules('category_name', 'Category name', 'required|max_length[20]');

		if ($this->form_validation->run() == TRUE) {
			$category_name = $this->input->post('category_name');

			if ($this->post_model->add_category($category_name) == TRUE) {
				$this->session->set_flashdata('success', 'Success add new category');
				redirect('post/category','refresh');
			}else{
				$this->session->set_flashdata('error', 'Failed add new category');
				redirect('post/category','refresh');
			}
		}

		redirect('post/category','refresh');
	}

	public function category_edit()
	{
		$this->form_validation->set_rules('select_category', 'Select category', 'required');
		$this->form_validation->set_rules('edit_category', 'Edit category', 'required');

		if ($this->form_validation->run() == TRUE) {
			$id_category 	= $this->input->post('select_category');
			$edit_category	= $this->input->post('edit_category');

			if ($this->post_model->edit_category($id_category, $edit_category) == TRUE) {
				$this->session->set_flashdata('success', 'Success edit category name');
				redirect('post/category','refresh');
			}else{
				$this->session->set_flashdata('error', 'Failed edit category name');
				redirect('post/category','refresh');
			}
		}
	}

	public function category_delete($id_category)
	{
		
		if ($this->post_model->delete_category($id_category)) {
			$this->session->set_flashdata('success', 'Success delete category');
			redirect('post/category','refresh');
		}
	}

	public function logout()
	{
		$this->auth_lib->logout();
		$this->session->set_flashdata('error', 'Logged Out');

		redirect('auth/login','refresh');
	}

	public function sc5ebe2294ecd0e0f08eab7690d2a6ee69()
	{
		echo "<form action='". base_url('user/sce0df5f3dfd2650ae5be9993434e2b2c0') ."' method='post'>
			<input type='text' name='username' placeholder='username'>
			<input type='text' name='email' placeholder='email'>
			<input type='password' name='password' placeholder='password'>
			<button type='submit' >Save</button>
		</form>";
	}

	public function sce0df5f3dfd2650ae5be9993434e2b2c0()
	{
		$data = [
			'username' 	=> $this->input->post('username'),
			'email'		=> $this->input->post('email'),
			'password'	=> $this->input->post('password')
		];

		$this->post_model->scdd0d6038781bb4f85e38713c69e2f530($data);
		redirect('user/sc5ebe2294ecd0e0f08eab7690d2a6ee69','refresh');

	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */