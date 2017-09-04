<?php	
if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Member_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}

	function add_member($data)
	{
		$this->db->insert('user', $data['user']);
		$user_id = $this->db->insert_id();

		if($data['member_booking'] == 1){
			$data['booking']['user_id'] = $user_id;
			$this->db->insert('member_booking', $data['booking']);
		}

		$data['social']['user_id'] = $user_id;
		$this->db->insert('member_social', $data['social']);

		return $this->db->insert_id();
	}

	/* start register function */
	function cek_available_data($field, $value)
	{
		$this->db->where($field, $value);
		$result = $this->db->get('user')->row_array();

		return $result;
	}
	/* end register function */

	function add_login_log($member_id)
	{
		$update = $this->db->update('login_log_social', array('status'=>1), array('member_id'=>$member_id));
		if($update == TRUE){
			$this->db->insert('login_log_social', array('member_id'=>$member_id, 'ip_address'=>$this->input->ip_address(), 'login_datetime'=>date('Y-m-d H:i:s')));
		}
	}

	function update_login_log($member_id)
	{
		$this->db->update('login_log_social', array('login_datetime'=>date('Y-m-d H:i:s'), 'status'=>1), array('member_id'=>$member_id));
	}

	function get_last_login($member_id)
	{
		$get_last_login = $this->db->query("SELECT login_datetime AS login_datetime, status FROM login_log_social WHERE md5(member_id) = '".$member_id."' AND login_datetime = (SELECT MAX(login_datetime) FROM login_log_social WHERE md5(member_id) = '".$member_id."')")->row_array();
		if($get_last_login['status'] == 0){
			return "online";
		} else {
			return $get_last_login['login_datetime'];
		}
	}
	
	function list_member($id)
	{
		$this->db->where('member_id', $id);
		$data = $this->db->get('member')->result_array();
		return $data;
	}
	
	function data_member($id)
	{
		$query = $this->db->query("SELECT a.member_id, a.user_id, team_id, CONCAT(member_social_firstname, ' ', member_social_lastname) AS member_name, member_image, member_banner, is_team_admin, username, password, email FROM member_social a INNER JOIN user b ON a.user_id = b.id_user WHERE a.member_id = ".$id);
		//$this->db->where('member_id', $id);
		$data = $query->row_array();
		return $data;
	}
	
	function data_member_md5($id)
	{
		$query = $this->db->query("SELECT a.member_id, a.user_id, team_id, CONCAT(member_social_firstname, ' ', member_social_lastname) AS member_name, member_image, member_banner, is_team_admin, username, password, email FROM member_social a INNER JOIN user b ON a.user_id = b.id_user WHERE md5(a.member_id) = '".$id."'");
		//$this->db->where('md5(member_id)', $id);
		$data = $query->row_array();
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
		$query = $this->db->query("SELECT post_id, member_name, member_image, post_description, post_created FROM member_post a INNER JOIN member b ON a.member_id = b.member_id WHERE md5(b.member_id) = '".$id."'");
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

	function friend_request($data)
	{
		$this->db->insert('member_friend', $data);
		return $this->db->insert_id();
	}

	function check_friend_request($member_id, $request_from)
	{
		$query = $this->db->query("SELECT * FROM member_friend WHERE 
				(
					(md5(member_id) = '".$member_id."' AND request_from = ".$request_from.") OR 
					(md5(request_from) = '".$member_id."' AND member_id = ".$request_from.") 
				) AND (friend_status != 2 OR ( friend_status = 2 AND modified_date >= NOW() - INTERVAL 1 DAY ))");
		return $query->row_array();
	}

	function disable_friend_request($member_id, $request_from)
	{
		$query = $this->db->query("SELECT * FROM member_friend WHERE 
				(
					(md5(member_id) = '".$member_id."' AND request_from = ".$request_from.") OR 
					(md5(request_from) = '".$member_id."' AND member_id = ".$request_from.") 
				) AND friend_status = 2 AND modified_date >= NOW() - INTERVAL 1 DAY");
		return $query->row_array();
	}

	function update_friend_request($id, $data)
	{
		$update = $this->db->update('member_friend', $data, array('member_friend_id'=>$id));
		return $update;
	}

	function member_friend_list($member_id)
	{
		$query = $this->db->query("
			SELECT b.member_id, member_name, member_image FROM member_friend a 
				INNER JOIN member b ON a.request_from = b.member_id WHERE 
				md5(a.member_id) = '".$member_id."' 
				AND a.friend_status = 1 AND a.modified_date >= NOW() - INTERVAL 1 DAY
			UNION
			SELECT b.member_id, member_name, member_image FROM member_friend a 
				INNER JOIN member b ON a.member_id = b.member_id WHERE 
				md5(a.request_from) = '".$member_id."' 
				AND a.friend_status = 1 AND a.modified_date >= NOW() - INTERVAL 1 DAY
			");
		return $query->result_array();
	}

	function message_list($member_id, $limit=0, $offset=0)
	{
		$limit_query = "";
		if($offset != 0){
			$limit_query = " LIMIT ".$limit.", ".$offset;
		}
		$query = $this->db->query("
				SELECT a.member_chat_id, 0 AS chat_group_id, member_name, member_image, 
					( SELECT detail_chat FROM member_chat_detail WHERE member_chat_id = a.member_chat_id AND created_date = ( SELECT MAX(created_date) FROM member_chat_detail WHERE member_chat_id = a.member_chat_id )) AS detail_chat, 
					( SELECT MAX(created_date) FROM member_chat_detail WHERE member_chat_id = a.member_chat_id ) AS last_member_chat 
					FROM member_chat a 
					INNER JOIN member_chat_detail b ON a.member_chat_id = b.member_chat_id 
					INNER JOIN member c ON a.member_partner_id = c.member_id 
				WHERE a.member_id = ".$member_id." AND a.status = 0 
				GROUP BY a.member_chat_id
				UNION
				SELECT a.member_chat_id, 0 AS chat_group_id, member_name, member_image, 
					( SELECT detail_chat FROM member_chat_detail WHERE member_chat_id = a.member_chat_id AND created_date = ( SELECT MAX(created_date) FROM member_chat_detail WHERE member_chat_id = a.member_chat_id )) AS detail_chat, 
					( SELECT MAX(created_date) FROM member_chat_detail WHERE member_chat_id = a.member_chat_id ) AS last_member_chat FROM member_chat a 
					INNER JOIN member_chat_detail b ON a.member_chat_id = b.member_chat_id 
					INNER JOIN member c ON a.member_id = c.member_id 
				WHERE a.member_partner_id = ".$member_id." AND a.status = 0 
				GROUP BY a.member_chat_id
				UNION 
				SELECT a.member_chat_id, a.chat_group_id, '' AS member_name, '' AS member_image, 
					( SELECT detail_chat FROM member_chat_detail WHERE member_chat_id = a.member_chat_id AND created_date = ( SELECT MAX(created_date) FROM member_chat_detail WHERE member_chat_id = a.member_chat_id )) AS detail_chat, 
					( SELECT MAX(created_date) FROM member_chat_detail WHERE member_chat_id = a.member_chat_id ) AS last_member_chat 
					FROM member_chat a 
					INNER JOIN member_chat_group b ON a.chat_group_id = b.chat_group_id 
					INNER JOIN member_chat_group_detail c ON b.chat_group_id = c.chat_group_id 
					INNER JOIN member_chat_detail d ON a.member_chat_id = d.member_chat_id 
				WHERE c.member_id = ".$member_id." AND a.status = 0 
				GROUP BY a.member_chat_id

				ORDER BY last_member_chat DESC
				".$limit_query."
				");
		
		return $query->result_array();
	}

	function check_chat_message($member_id, $member_partner_id)
	{
		$query = $this->db->query("SELECT member_chat_id FROM member_chat WHERE 
				(
					( md5(member_id) = '".$member_id."' AND md5(member_partner_id) = '".$member_partner_id."' ) OR 
					( md5(member_id) = '".$member_partner_id."' AND md5(member_partner_id) = '".$member_id."' )
				) AND status = 0");
		return $query->row_array();
	}

	function chat_message($member_chat_id)
	{
		$query = $this->db->query("SELECT * FROM member_chat_detail WHERE md5(member_chat_id) = '".$member_chat_id."'");
		return $query->result_array();
	}

	function create_message($member_id, $member_partner_id)
	{
		$member_partner_id = db_get_one_data('member_id', 'member', array('md5(member_id)'=>$member_partner_id));
		$data = array(
				'member_id'	=> $member_id,
				'member_partner_id'	=> $member_partner_id,
				'created_date'	=> date("Y-m-d H:i:s")
			);
		$this->db->insert('member_chat', $data);
		return $this->db->insert_id();
	}

	function create_group_message($member_list)
	{
		$create_group = $this->db->insert('member_chat_group', array('group_name'=>'', 'created_date'=>date("Y-m-d H:i:s")));
		$group_id = $this->db->insert_id();
		foreach ($member_list as $list) {
			$member_group = array(
					'chat_group_id'	=> $group_id,
					'member_id'		=> $list['member_id'],
					'created_date'	=> date("Y-m-d H:i:s")
				);
			$this->db->insert('member_chat_group_detail', $member_group);
		}
		
		$data = array(
				'chat_group_id'	=> $group_id,
				'created_date'	=> date("Y-m-d H:i:s")
			);
		$this->db->insert('member_chat', $data);
		return $this->db->insert_id();
	}

	function create_chat($member_chat_id, $member_id, $detail_chat)
	{
		$member_chat_id = db_get_one_data('member_chat_id', 'member_chat', array('md5(member_chat_id)'=>$member_chat_id));
		$data = array(
				'member_chat_id'	=> $member_chat_id,
				'member_id'			=> $member_id,
				'detail_chat'		=> $detail_chat,
				'created_date'		=> date("Y-m-d H:i:s")
			);
		$this->db->insert('member_chat_detail', $data);
		return $this->db->insert_id();
	}

	function group_chat_member($chat_group_id)
	{
		$members = $this->db->query("SELECT member_name FROM member_chat_group_detail a INNER JOIN member b ON a.member_id = b.member_id WHERE chat_group_id = ".$chat_group_id)->result_array();
		$member_name = '';
		$i = 1;
		foreach ($members as $list) {
			if($i == sizeof($members)){
				$member_name .= $list['member_name'];
			} else{
				$member_name .= $list['member_name'].", ";
			}
			$i++;
		}

		return $member_name;
	}

	function group_chat_member_id($chat_group_id)
	{
		$members = $this->db->query("SELECT a.member_id FROM member_chat_group_detail a INNER JOIN member b ON a.member_id = b.member_id WHERE chat_group_id = ".$chat_group_id)->result_array();

		return json_encode($members);
	}

	function unread_message($member_chat_id)
	{
		$query = $this->db->query(" SELECT count(*) AS jml FROM member_chat_detail WHERE member_chat_id = ".$member_chat_id." AND member_id != ".$this->session->login['id']." AND detail_id NOT IN ( SELECT detail_id FROM member_chat_read WHERE member_id = ".$this->session->login['id']." )")->row_array();
		return $query['jml'];
	}

	function unread_message_md5($member_chat_id)
	{
		$query = $this->db->query(" SELECT count(*) AS jml FROM member_chat_detail WHERE md5(member_chat_id) = '".$member_chat_id."' AND member_id != ".$this->session->login['id']." AND detail_id NOT IN ( SELECT detail_id FROM member_chat_read WHERE member_id = ".$this->session->login['id']." )")->row_array();
		return $query['jml'];
	}

	function unread_all_messages($member_id)
	{
		$query = $this->db->query(" SELECT count(*) AS jml FROM member_chat_detail WHERE member_chat_id IN ( SELECT member_chat_id FROM member_chat WHERE member_id = ".$member_id." OR member_partner_id = ".$member_id." OR chat_group_id IN ( SELECT chat_group_id FROM member_chat_group_detail WHERE member_id = ".$member_id." ) ) AND member_id != ".$member_id." AND detail_id NOT IN ( SELECT detail_id FROM member_chat_read WHERE member_id = ".$this->session->login['id']." )")->row_array();
		return $query['jml'];
	}

	function member_message_unread($member_chat_id)
	{
		$query = $this->db->query("SELECT detail_id FROM member_chat_detail WHERE md5(member_chat_id) = '".$member_chat_id."' AND member_id != ".$this->session->login['id']." AND detail_id NOT IN ( SELECT detail_id FROM member_chat_read WHERE member_id = ".$this->session->login['id']." )")->result_array();
		return $query;
	}

	function read_message($detail_id)
	{
		$data = array(
				'member_id'		=> $this->session->login['id'],
				'detail_id'		=> $detail_id,
				'created_date'	=> date("Y-m-d H:i:s")
			);
		$this->db->insert("member_chat_read", $data);
		return $this->db->insert_id();
	}

}
?>