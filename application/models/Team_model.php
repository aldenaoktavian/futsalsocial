<?php	
if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Team_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}

	function data_team($id)
	{
		$this->db->where('md5(team_id)', $id);
		$data = $this->db->get('team')->row_array();
		return $data;
	}
		
	function edit_data_team($id, $dataedit)
	{
		$this->db->where('team_id', $id);
		return $this->db->update('team', $dataedit);
	}

	function team_members($id)
	{
		$this->db->select('member_id, member_name, member_image');
		$this->db->where('md5(team_id)', $id);
		$data = $this->db->get('member')->result_array();
		return $data;
	}
	
	function team_request($data)
	{
		$this->db->insert('team_request', $data);
		return $this->db->insert_id();
	}

	function data_team_request($team_request_id)
	{
		$query = $this->db->query("SELECT team_request_id, a.member_id as member_id, member_name, a.team_id as team_id, team_name, team_request_status FROM team_request a INNER JOIN team b ON a.team_id = b.team_id INNER JOIN member c ON a.member_id = c.member_id WHERE md5(a.team_request_id) = '".$team_request_id."'");
		$data = $query->row_array();

		return $data;
	}
		
	function edit_team_request($team_request_id, $datarequest, $member_id, $datamember)
	{
		$this->db->where('member_id', $member_id);
		$update_member = $this->db->update('member', $datamember);
		if($update_member == TRUE){
			$this->db->where('md5(team_request_id)', $team_request_id);
			$update_request = $this->db->update('team_request', $datarequest);
			return $update_request;
		} else{
			return $update_member;
		}
	}

	function update_team_request($id, $dataedit)
	{
		$this->db->where('md5(team_request_id)', $id);
		return $this->db->update('team_request', $dataedit);
	}

	function list_other_team($team_id)
	{
		$data = $this->db->get_where('team', array('md5(team_id) !='=>$team_id));
		return $data->result_array();
	}

}
?>