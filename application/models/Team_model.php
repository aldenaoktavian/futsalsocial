<?php	
if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Team_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	
	function create_team($data)
	{
		$this->db->insert('team', $data);
		return $this->db->insert_id();
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

	function list_other_team($team_id, $limit, $offset, $search_keyword='')
	{
		if($search_keyword != ''){
			$data = $this->db->query("SELECT * FROM team WHERE md5(team_id) != '".$team_id."' AND ( team_name LIKE '%".$search_keyword."%' ) LIMIT ".$limit.",".$offset);
		} else{
			$data = $this->db->query("SELECT * FROM team WHERE md5(team_id) != '".$team_id."' LIMIT ".$limit.",".$offset);
		}
		
		return $data->result_array();
	}

	function count_list_other_team($team_id, $search_keyword='')
	{
		if($search_keyword != ''){
			$data = $this->db->query("SELECT count(*) AS jml FROM team WHERE md5(team_id) != '".$team_id."' AND ( team_name LIKE '%".$search_keyword."%' )")->row_array();
		} else{
			$data = $this->db->select('count(*) AS jml')->get_where('team', array('md5(team_id) !='=>$team_id))->row_array();
		}
		
		return $data['jml'];
	}

	function challenge_log($data)
	{
		$this->db->insert('team_challenge_log', $data);
		return $this->db->insert_id();
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
		$query = $this->db->query("SELECT b.challenge_id as challenge_id, a.id_tipe, a.transaksi_challenge_id, b.inviter_team AS inviter_team_id, ( SELECT team_name FROM team WHERE team_id = b.inviter_team ) AS inviter_team_name, ( SELECT team_image FROM team WHERE team_id = b.inviter_team ) AS inviter_team_image, b.rival_team AS rival_team_id, ( SELECT team_name FROM team WHERE team_id = b.rival_team ) AS rival_team_name, ( SELECT team_image FROM team WHERE team_id = b.rival_team ) AS rival_team_image, a.tanggal AS challenge_date, a.start_time AS challenge_time, a.end_time, d.nama AS nama_lapangan, daerah, kota, d.lat, d.long, status_challenge, inviter_score, rival_score FROM transaksi_challenge a INNER JOIN team_challenge b ON a.challenge_id = b.challenge_id INNER JOIN tipe_lapangan c ON a.id_tipe = c.id_tipe INNER JOIN lapangan d ON c.id_lapangan = d.id WHERE md5(b.challenge_id) = '".$challenge_id."'");
		return $query->row_array();
	}
	
	function notes_challenge($challenge_id)
	{
	    $this->db->where('md5(challenge_id)', $challenge_id);
	    $query = $this->db->get('team_challenge');
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
		$query = $this->db->query("SELECT b.challenge_id as challenge_id, inviter_team AS inviter_team_id, ( SELECT team_name FROM team WHERE team_id = b.inviter_team ) AS inviter_team_name, ( SELECT team_image FROM team WHERE team_id = b.inviter_team ) AS inviter_team_image, b.rival_team AS rival_team_id, ( SELECT team_name FROM team WHERE team_id = b.rival_team ) AS rival_team_name, ( SELECT team_image FROM team WHERE team_id = b.rival_team ) AS rival_team_image, a.tanggal AS challenge_date, a.start_time AS challenge_time, d.nama AS nama_lapangan, daerah, kota, status_challenge FROM transaksi_challenge a INNER JOIN team_challenge b ON a.challenge_id = b.challenge_id INNER JOIN tipe_lapangan c ON a.id_tipe = c.id_tipe INNER JOIN lapangan d ON c.id_lapangan = d.id WHERE status_challenge = 1 AND transaksi_challenge_status = 1 ORDER BY a.tanggal DESC");
		return $query->result_array();
	}

	function upcoming_challenge_history($inviter_team, $rival_team)
	{
		// jika perlu sort by status transaksi AND transaksi_challenge_status = 3
		$query = $this->db->query("
				SELECT b.challenge_id as challenge_id, inviter_team AS inviter_team_id, ( SELECT team_name FROM team WHERE team_id = b.inviter_team ) AS inviter_team_name, ( SELECT team_image FROM team WHERE team_id = b.inviter_team ) AS inviter_team_image, b.rival_team AS rival_team_id, ( SELECT team_name FROM team WHERE team_id = b.rival_team ) AS rival_team_name, ( SELECT team_image FROM team WHERE team_id = b.rival_team ) AS rival_team_image, a.tanggal AS challenge_date, a.start_time AS challenge_time, d.nama AS nama_lapangan, daerah, kota, status_challenge, inviter_score, rival_score FROM transaksi_challenge a INNER JOIN team_challenge b ON a.challenge_id = b.challenge_id INNER JOIN tipe_lapangan c ON a.id_tipe = c.id_tipe INNER JOIN lapangan d ON c.id_lapangan = d.id WHERE md5(inviter_team) = '".$inviter_team."' AND md5(rival_team) = '".$rival_team."' AND status_challenge = 5 

				UNION

				SELECT b.challenge_id as challenge_id, b.rival_team AS inviter_team_id, ( SELECT team_name FROM team WHERE team_id = b.rival_team ) AS inviter_team_name, ( SELECT team_image FROM team WHERE team_id = b.rival_team ) AS inviter_team_image, inviter_team AS rival_team_id, ( SELECT team_name FROM team WHERE team_id = b.inviter_team ) AS rival_team_name, ( SELECT team_image FROM team WHERE team_id = b.inviter_team ) AS rival_team_image, a.tanggal AS challenge_date, a.start_time AS challenge_time, d.nama AS nama_lapangan, daerah, kota, status_challenge, inviter_score AS rival_score, rival_score AS inviter_score FROM transaksi_challenge a INNER JOIN team_challenge b ON a.challenge_id = b.challenge_id INNER JOIN tipe_lapangan c ON a.id_tipe = c.id_tipe INNER JOIN lapangan d ON c.id_lapangan = d.id WHERE md5(inviter_team) = '".$rival_team."' AND md5(rival_team) = '".$inviter_team."' AND status_challenge = 5

				ORDER BY challenge_date DESC
			");
		return $query->result_array();
	}

	function team_challenge($team_id, $limit, $offset)
	{
		$query = $this->db->query("SELECT b.challenge_id as challenge_id, b.inviter_team AS inviter_team_id, ( SELECT team_name FROM team WHERE team_id = b.inviter_team ) AS inviter_team_name, ( SELECT team_image FROM team WHERE team_id = b.inviter_team ) AS inviter_team_image, b.rival_team AS rival_team_id, ( SELECT team_name FROM team WHERE team_id = b.rival_team ) AS rival_team_name, ( SELECT team_image FROM team WHERE team_id = b.rival_team ) AS rival_team_image, a.tanggal AS challenge_date, a.start_time AS challenge_time, d.nama AS nama_lapangan, daerah, kota, status_challenge, status_challenge_name FROM transaksi_challenge a INNER JOIN team_challenge b ON a.challenge_id = b.challenge_id INNER JOIN tipe_lapangan c ON a.id_tipe = c.id_tipe INNER JOIN lapangan d ON c.id_lapangan = d.id INNER JOIN ref_status_challenge e ON b.status_challenge = e.status_challenge_id WHERE md5(inviter_team) = '".$team_id."' OR md5(rival_team) = '".$team_id."' ORDER BY a.tanggal DESC, a.start_time DESC LIMIT ".$limit.",".$offset);
		return $query->result_array();
	}

	function count_all_team_challenge($team_id)
	{
		$result = $this->db->query("SELECT COUNT(*) AS jml FROM transaksi_challenge a INNER JOIN team_challenge b ON a.challenge_id = b.challenge_id INNER JOIN tipe_lapangan c ON a.id_tipe = c.id_tipe INNER JOIN lapangan d ON c.id_lapangan = d.id INNER JOIN ref_status_challenge e ON b.status_challenge = e.status_challenge_id WHERE md5(inviter_team) = '".$team_id."' OR md5(rival_team) = '".$team_id."' ORDER BY a.tanggal DESC, a.start_time DESC")->row_array();
		return $result['jml'];
	}

	function statistic($team_id)
	{
		$all_challenge = $this->db->query("SELECT count(*) AS jumlah FROM team_challenge WHERE ( md5(inviter_team) = '".$team_id."' OR md5(rival_team) = '".$team_id."' ) AND ( status_challenge = 1 OR status_challenge = 5 )")->row_array();
		$data['all_challenge'] = $all_challenge['jumlah'];

		$win_challenge = $this->db->query("SELECT count(*) AS jumlah FROM team_challenge WHERE ( md5(inviter_team) = '".$team_id."' AND inviter_score > rival_score ) OR ( md5(rival_team) = '".$team_id."' AND rival_score > inviter_score ) AND ( status_challenge = 5 )")->row_array();
		$data['win_challenge'] = $win_challenge['jumlah'];

		$lose_challenge = $this->db->query("SELECT count(*) AS jumlah FROM team_challenge WHERE ( md5(inviter_team) = '".$team_id."' AND inviter_score < rival_score ) OR ( md5(rival_team) = '".$team_id."' AND rival_score < inviter_score ) AND ( status_challenge = 5 )")->row_array();
		$data['lose_challenge'] = $lose_challenge['jumlah'];

		$team_rangking = $this->db->query("SELECT find_in_set(team_id, (SELECT GROUP_CONCAT(team_id) FROM view_team_rangking)) AS rangking FROM team WHERE md5(team_id) = '".$team_id."'")->row_array();
		$data['team_rangking'] = $team_rangking['rangking'];

		$team_point = $this->db->query("SELECT ( team_inviter_point(a.team_id) + team_rival_point(a.team_id) ) AS point FROM team a WHERE md5(a.team_id) = '".$team_id."'")->row_array();
		$data['team_point'] = $team_point['point'];

		return $data;
	}

	function history_challenge($team_id)
	{
		// jika perlu sort by status transaksi AND transaksi_challenge_status = 3
		$query = $this->db->query("SELECT b.challenge_id as challenge_id, ( SELECT team_name FROM team WHERE team_id = b.inviter_team ) AS inviter_team_name, ( SELECT team_image FROM team WHERE team_id = b.inviter_team ) AS inviter_team_image, b.rival_team AS rival_team_id, ( SELECT team_name FROM team WHERE team_id = b.rival_team ) AS rival_team_name, ( SELECT team_image FROM team WHERE team_id = b.rival_team ) AS rival_team_image, a.tanggal AS challenge_date, a.start_time AS challenge_time, d.nama AS nama_lapangan, daerah, kota, status_challenge, inviter_score, rival_score FROM transaksi_challenge a INNER JOIN team_challenge b ON a.challenge_id = b.challenge_id INNER JOIN tipe_lapangan c ON a.id_tipe = c.id_tipe INNER JOIN lapangan d ON c.id_lapangan = d.id WHERE ( md5(inviter_team) = '".$team_id."' OR md5(rival_team) = '".$team_id."' ) AND status_challenge = 5 ORDER BY a.tanggal DESC");
		return $query->result_array();
	}

	function all_rangking($start, $limit, $search_keyword='')
	{
		if($search_keyword != ''){
			$search = " b.team_name LIKE '%".$search_keyword."%'";
		} else{
			$search = " 1=1";
		}

		$query = $this->db->query("
			SELECT z.*, team_name, team_image FROM (
				SELECT a.*,(@rangking := @rangking + 1) AS rangking FROM (
				SELECT * FROM view_team_rangking ) AS a 
				JOIN (SELECT @rangking := 0) r 
			) AS z INNER JOIN team b ON z.team_id = b.team_id WHERE ".$search." ORDER BY rangking ASC LIMIT ".$start.",".$limit);
		return $query->result_array();
	}

	function count_all_rangking($search_keyword='')
	{
		if($search_keyword != ''){
			$search = " b.team_name LIKE '%".$search_keyword."%'";
		} else{
			$search = " 1=1";
		}

		$result = $this->db->query("SELECT count(*) AS jml FROM view_team_rangking a INNER JOIN team b ON a.team_id = b.team_id WHERE ".$search)->row_array();
		return $result['jml'];
	}

}
?>