<?php	
if (!defined('BASEPATH')) exit('No direct script access allowed'); 
class Login_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	
	function cek_user_login($username, $password){
		$query = $this
			->db
			->join('member_social b', 'b.user_id = a.id_user')
			->where('username', $username)
			->where('password', $password)
			->limit(1)
			->get('user a');
			
		if ($query->num_rows() == 1) {
			$data = $query->row_array();
			return $data['member_id'];
		}
		else
		{
			return FALSE;
		}
	}
	
	function attempt($username)
	{
		$this->db->where('username', $username);
		$tblselect = $this->db->get('member');
		$data = $tblselect->result_array();
		if($data[0]["try_login"] < 5){
			$this->db->update("member", array('try_login' => $data[0]["try_login"] + 1 ));
		}
	}
	
	function cek_block($username)
	{	
		$this->db->where('username', $username);
		$tblselect = $this->db->get('member');
		$data = $tblselect->result_array();
		if($data == NULL){
			$hasil = "";
		} else{
			$hasil = $data[0]["try_login"];
		}
		return $hasil;
	}
	
	function changepass($email, $dataedit)
	{
		$this->db->where('email_member', $email);
		return $this->db->update('member', $dataedit);
	}

}
?>