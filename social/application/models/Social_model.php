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

	function get_count_post(){
		$this->db->select('count(*) AS jml');
		$result = $this->db->get('member_post')->row_array();
		return $result['jml'];
	}

	function get_all_post(){
		$this->db->select('post_id, b.member_id, member_name, member_image, post_description, post_created');
		$this->db->join('member b', 'a.member_id = b.member_id');
		$this->db->order_by('post_created', 'desc');
		$query = $this->db->get('member_post a');
		return $query->result_array();
	}

	function get_all_post_comment($post_id){
		$this->db->select('post_comment_id, b.member_id, member_name, member_image, comment_description, comment_created');
		$this->db->join('member b', 'a.member_id = b.member_id');
		$this->db->where('md5(post_id)', $post_id);
		$query = $this->db->get('member_post_comment a');
		return $query->result_array();
	}

	function detail_post_comment($post_comment_id){
		$this->db->select('post_comment_id, b.member_id, member_name, member_image, comment_description, comment_created');
		$this->db->join('member b', 'a.member_id = b.member_id');
		$this->db->where('post_comment_id', $post_comment_id);
		$query = $this->db->get('member_post_comment a');
		return $query->row_array();
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

	function get_challenge_id($id){
		$this->db->select('challenge_id');
		$this->db->where('md5(challenge_id)', $id);
		$data = $this->db->get('team_challenge')->row_array();
		return $data['challenge_id'];
	}

	function get_all_challenge_comment($challenge_id){
		$this->db->select('challenge_comment_id, b.member_id, member_name, member_image, comment_description, comment_created');
		$this->db->join('member b', 'a.member_id = b.member_id');
		$this->db->where('md5(challenge_id)', $challenge_id);
		$query = $this->db->get('member_challenge_comment a');
		return $query->result_array();
	}

	function detail_challenge_comment($challenge_comment_id){
		$this->db->select('challenge_comment_id, b.member_id, member_name, member_image, comment_description, comment_created');
		$this->db->join('member b', 'a.member_id = b.member_id');
		$this->db->where('challenge_comment_id', $challenge_comment_id);
		$query = $this->db->get('member_challenge_comment a');
		return $query->row_array();
	}
	
	function add_new_challenge_comment($data)
	{
		$this->db->insert('member_challenge_comment', $data);
		return $this->db->insert_id();
	}

	function detail_post($post_id)
	{
		$this->db->select('post_id, b.member_id, member_name, member_image, post_description, post_created');
		$this->db->join('member b', 'a.member_id = b.member_id');
		$this->db->where('md5(post_id)', $post_id);
		$query = $this->db->get('member_post a');
		return $query->row_array();
	}

	function detail_member_post_comment($post_id)
	{
		$query = $this->db->query("SELECT b.* FROM member_post_comment a INNER JOIN member b ON a.member_id = b.member_id WHERE a.post_id = ".$post_id." AND b.member_id != ( SELECT member_id FROM member_post WHERE post_id = ".$post_id." ) GROUP BY b.member_id");
		return $query->result_array();
	}

}
?>