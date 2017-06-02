<?php	
if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Social_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}

	function get_post_id($id){
		$this->db->select('post_id');
		$this->db->where('md5(post_id)', $id);
		$data = $this->db->get('member_post')->row_array();
		return $data['post_id'];
	}

	function get_all_post(){
		$this->db->select('post_id, member_name, member_image, post_description');
		$this->db->join('member b', 'a.member_id = b.member_id');
		$query = $this->db->get('member_post a');
		return $query->result_array();
	}

	function get_all_post_comment($post_id){
		$this->db->select('post_comment_id, member_name, member_image, comment_description');
		$this->db->join('member b', 'a.member_id = b.member_id');
		$this->db->where('md5(post_id)', $post_id);
		$query = $this->db->get('member_post_comment a');
		print_r($this->db->last_query());
		return $query->result_array();
	}
	
	function add_new_post($data)
	{
		$this->db->insert('member_post', $data);
		return $this->db->insert_id();
	}
	
	function add_new_comment($data)
	{
		$this->db->insert('member_post_comment', $data);
		return $this->db->insert_id();
	}

}
?>