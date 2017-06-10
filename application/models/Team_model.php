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

	function team_admin($id)
	{
		$this->db->where('md5(team_id)', $id);
		$this->db->where('is_team_admin', 1);
		$data = $this->db->get('member')->result_array();
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

	function create_challenge($data)
	{
		$this->db->insert('team_challenge', $data);
		return $this->db->insert_id();
	}

	function update_challenge($id, $dataedit)
	{
		$this->db->where('md5(challenge_id)', $id);
		return $this->db->update('team_challenge', $dataedit);
	}

	function detail_challenge($challenge_id)
	{
		$query = $this->db->query("SELECT b.challenge_id as challenge_id, ( SELECT team_name FROM team WHERE team_id = b.inviter_team ) AS inviter_team_name, ( SELECT team_image FROM team WHERE team_id = b.inviter_team ) AS inviter_team_image, b.rival_team AS rival_team_id, ( SELECT team_name FROM team WHERE team_id = b.rival_team ) AS rival_team_name, ( SELECT team_image FROM team WHERE team_id = b.rival_team ) AS rival_team_image, a.tanggal AS challenge_date, a.start_time AS challenge_time, d.nama AS nama_lapangan, daerah, kota, status_challenge FROM transaksi_challenge a INNER JOIN team_challenge b ON a.challenge_id = b.challenge_id INNER JOIN tipe_lapangan c ON a.id_tipe = c.id_tipe INNER JOIN lapangan d ON c.id_lapangan = d.id WHERE md5(b.challenge_id) = '".$challenge_id."'");
		return $query->row_array();
	}
	
	function check_team_password($team_id, $pass)
	{
	    $this->db->where('md5(team_id)', $team_id);
	    $this->db->where('password', $pass);
	    $data = $this->db->get('team')->row_array();
	    if($data != NULL){
	        return TRUE;
	    } else{
	        return FALSE;
	    }
	}

	function upcoming_challenge()
	{
		$query = $this->db->query("SELECT b.challenge_id as challenge_id, ( SELECT team_name FROM team WHERE team_id = b.inviter_team ) AS inviter_team_name, ( SELECT team_image FROM team WHERE team_id = b.inviter_team ) AS inviter_team_image, b.rival_team AS rival_team_id, ( SELECT team_name FROM team WHERE team_id = b.rival_team ) AS rival_team_name, ( SELECT team_image FROM team WHERE team_id = b.rival_team ) AS rival_team_image, a.tanggal AS challenge_date, a.start_time AS challenge_time, d.nama AS nama_lapangan, daerah, kota, status_challenge FROM transaksi_challenge a INNER JOIN team_challenge b ON a.challenge_id = b.challenge_id INNER JOIN tipe_lapangan c ON a.id_tipe = c.id_tipe INNER JOIN lapangan d ON c.id_lapangan = d.id WHERE status_challenge = 1 AND transaksi_challenge_status = 1 ORDER BY a.tanggal DESC");
		return $query->result_array();
	}

	function statistic($team_id)
	{
		$all_challenge = $this->db->query("SELECT count(*) AS jumlah FROM team_challenge WHERE ( md5(inviter_team) = '".$team_id."' OR md5(rival_team) = '".$team_id."' ) AND ( status_challenge = 1 OR status_challenge = 5 )")->row_array();
		$data['all_challenge'] = $all_challenge['jumlah'];

		$win_challenge = $this->db->query("SELECT count(*) AS jumlah FROM team_challenge WHERE ( md5(inviter_team) = '".$team_id."' AND inviter_score > rival_score ) OR ( md5(rival_team) = '".$team_id."' AND rival_score > inviter_score ) AND ( status_challenge = 1 OR status_challenge = 5 )")->row_array();
		$data['win_challenge'] = $win_challenge['jumlah'];

		$lose_challenge = $this->db->query("SELECT count(*) AS jumlah FROM team_challenge WHERE ( md5(inviter_team) = '".$team_id."' AND inviter_score < rival_score ) OR ( md5(rival_team) = '".$team_id."' AND rival_score < inviter_score ) AND ( status_challenge = 1 OR status_challenge = 5 )")->row_array();
		$data['lose_challenge'] = $lose_challenge['jumlah'];

		return $data;
	}

	function history_challenge($team_id)
	{
		$query = $this->db->query("SELECT b.challenge_id as challenge_id, ( SELECT team_name FROM team WHERE team_id = b.inviter_team ) AS inviter_team_name, ( SELECT team_image FROM team WHERE team_id = b.inviter_team ) AS inviter_team_image, b.rival_team AS rival_team_id, ( SELECT team_name FROM team WHERE team_id = b.rival_team ) AS rival_team_name, ( SELECT team_image FROM team WHERE team_id = b.rival_team ) AS rival_team_image, a.tanggal AS challenge_date, a.start_time AS challenge_time, d.nama AS nama_lapangan, daerah, kota, status_challenge, inviter_score, rival_score FROM transaksi_challenge a INNER JOIN team_challenge b ON a.challenge_id = b.challenge_id INNER JOIN tipe_lapangan c ON a.id_tipe = c.id_tipe INNER JOIN lapangan d ON c.id_lapangan = d.id WHERE ( md5(inviter_team) = '".$team_id."' OR md5(rival_team) = '".$team_id."' ) AND status_challenge = 5 AND transaksi_challenge_status = 3 ORDER BY a.tanggal DESC");
		return $query->result_array();
	}

}
?>