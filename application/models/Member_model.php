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
	
	function data_member_md5($id)
	{
		$this->db->where('md5(member_id)', $id);
		$data = $this->db->get('member')->row_array();
		return $data;
	}
	
	function member_no_team($search_keyword='')
	{
		if($search_keyword != ''){
			$query = $this->db->query("SELECT * FROM member WHERE team_id = 0 AND member_id NOT IN ( SELECT member_id FROM team_request WHERE team_request_status = 0 ) AND ( member_name LIKE '%".$search_keyword."%' )");
		} else{
			$query = $this->db->query("SELECT * FROM member WHERE team_id = 0 AND member_id NOT IN ( SELECT member_id FROM team_request WHERE team_request_status = 0 )");	
		}
		
		$data = $query->result_array();
		return $data;
	}
		
	function update_member($id, $dataedit)
	{
		$this->db->where('member_id', $id);
		return $this->db->update('member', $dataedit);
	}

	function member_post_list($id)
	{
		$query = $this->db->query("SELECT post_id, member_name, member_image, post_description FROM member_post a INNER JOIN member b ON a.member_id = b.member_id WHERE md5(b.member_id) = '".$id."'");
		return $query->result_array();
	}
	
	function check_member_password($member_id, $pass)
	{
	    $this->db->where('member_id', $member_id);
	    $this->db->where('password', $pass);
	    $data = $this->db->get('member')->row_array();
	    if($data != NULL){
	        return TRUE;
	    } else{
	        return FALSE;
	    }
	}

}
?>