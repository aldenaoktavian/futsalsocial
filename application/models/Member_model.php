<?php	
if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Member_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	
	function data_member($id)
	{
		$this->db->where('member_id', $id);
		$data = $this->db->get('member')->row_array();
		return $data;
	}

}
?>