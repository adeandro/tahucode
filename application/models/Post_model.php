<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {

	public function get_posts()
	{
		$data = $this->db->get('posts');
		return $data;
	}

	public function save_post($data)
	{
		$this->db->insert('posts',$data);
		return TRUE;
	}

	public function get_categories()
	{
		$data = $this->db->get('categories');
		return $data;
	}

	public function add_category($category_name)
	{
		$data = [
			'category_name' => $category_name
		];

		$this->db->insert('categories', $data);
		return TRUE;
	}

	public function edit_category($id_category, $edit_category)
	{
		$data = [
			'category_name' => $edit_category
		];
		$this->db->where('id_category', $id_category);
		$this->db->update('categories', $data);

		return TRUE;
	}

	public function delete_category($id_category)
	{
		$this->db->where('id_category', $id_category);
		$this->db->delete('categories');
		return TRUE;
	}

}

/* End of file Post_model.php */
/* Location: ./application/models/Post_model.php */