<?php	
if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Notif_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}

	function add_notif($data)
	{
		$this->db->insert('notifikasi', $data);
		return $this->db->insert_id();
	}

	function all_notif($member_id, $limit=0, $offset=0)
	{
		$this->db->order_by('notif_status', 'asc');
		$this->db->order_by('notif_created', 'desc');

		if($offset != 0){
			$this->db->limit($offset, $limit);
		}
		
		$data = $this->db->get_where('notifikasi', array('member_id'=>$member_id))->result_array();
		return $data;
	}

	function notif_updates($member_id)
	{
		$this->db->order_by('notif_status', 'asc');
		$this->db->order_by('notif_created', 'desc');
		$this->db->limit(8, 0);
		$data = $this->db->get_where('notifikasi', array('member_id'=>$member_id))->result_array();
		return $data;
	}

	function notif_updates_count($member_id)
	{
		$data = $this->db->select('count(notif_id) as jml')->get_where('notifikasi', array('member_id'=>$member_id, 'notif_status'=>0))->row_array();
		return $data['jml'];
	}

	function update_data_notif($id, $dataedit)
	{
		$this->db->where('md5(notif_id)', $id);
		return $this->db->update('notifikasi', $dataedit);
	}

	function data_notif($notif_id)
	{
		$this->db->where('md5(notif_id)', $notif_id);
		return $this->db->get('notifikasi')->row_array();
	}

}
?>