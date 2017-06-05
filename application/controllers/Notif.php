<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notif extends CI_Controller {

	function __construct() {
		parent::__construct();
        $this->load->model('notif_model');
        $this->load->model('team_model');
        $this->load->model('member_model');
    }

	public function index()
	{
		$notif_id = $this->input->post('notif_id');
		$notif_type = db_get_one_data('notif_type', 'notifikasi', array('md5(notif_id)'=>$notif_id));
		if($notif_type == 1 || $notif_type == 2 || $notif_type == 3){
			$this->team_request($notif_id, $notif_type);
			//redirect('notif/team_request/?notif_id='.$notif_id);
		}
	}

	public function team_request($team_request_id, $notif_id)
	{
		$notif_type = db_get_one_data('notif_type', 'notifikasi', array('md5(notif_id)'=>$notif_id));
		$this->read_notif($notif_id);
		$detail_notif = $this->team_model->data_team_request($team_request_id);
		$data_notif = $this->notif_model->data_notif($notif_id);
		$data['detail_notif'] = array_merge($detail_notif, $data_notif);
		$data['detail_status'] = ($notif_type == 1 ? 0 : 1);
		$this->load->view('notif/team-request', $data);
	}

	public function read_notif($id)
	{
		$dataedit = array(
				'notif_status'	=> 1
			);
		$this->notif_model->update_data_notif($id, $dataedit);
	}
}

?>