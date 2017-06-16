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

	public function detail_challenge($challenge_id, $notif_id)
	{
	    $this->read_notif($notif_id);
		$detail_challenge = $this->team_model->detail_challenge($challenge_id);
		if($detail_challenge['status_challenge'] == 0){
		    $data['challenge_id']	= $challenge_id;
    		$data['rival_team_id']	= md5($detail_challenge['rival_team_id']);
    		$data['inviter_team_name']	= $detail_challenge['inviter_team_name'];
    		$data['inviter_team_image'] = ($detail_challenge['inviter_team_image'] ? $detail_challenge['inviter_team_image'] : 'no-img-profil.png');
    		$data['rival_team_name']	= $detail_challenge['rival_team_name'];
    		$data['rival_team_image'] = ($detail_challenge['rival_team_image'] ? $detail_challenge['rival_team_image'] : 'no-img-profil.png');
    		$data['challenge_date'] = date('d/m/Y', strtotime($detail_challenge['challenge_date']));
    		$data['challenge_time'] = date('H:i', strtotime($detail_challenge['challenge_time']));
    		$data['nama_lapangan'] = $detail_challenge['nama_lapangan'];
    		$data['lapangan_daerah'] = $detail_challenge['daerah'];
    		$data['lapangan_kota'] = $detail_challenge['kota'];
		} else if($detail_challenge['status_challenge'] == 1){
		    $data['message'] = 'Challenge ini telah berlangsung.';
		} else if($detail_challenge['status_challenge'] == 2){
		    $data['message'] = 'Challenge ini telah dibatalkan.';
		} else if($detail_challenge['status_challenge'] == 3){
		    $data['message'] = 'Challenge ini sedang dalam proses pertimbangan karena revisi telah dikirimkan. Silahkan menunggu sampai tim lawan memberikan balasan.';
		}
		$data['status_challenge'] = $detail_challenge['status_challenge'];
		$this->load->view('notif/detail-challenge', $data);
	}

	public function read_notif($id)
	{
		$dataedit = array(
				'notif_status'	=> 1
			);
		$this->notif_model->update_data_notif($id, $dataedit);
	}

	public function detail_score_challenge($challenge_id, $notif_id)
	{
	    $this->read_notif($notif_id);
	    $team_id = $this->session->login['team_id'];
		$detail_challenge = $this->team_model->detail_challenge($challenge_id);

		if($detail_challenge['status_challenge'] != 5){
			if( ( ($team_id == $detail_challenge['inviter_team_id']) && $detail_challenge['status_challenge'] == 8 ) || ( ($team_id == $detail_challenge['rival_team_id']) && $detail_challenge['status_challenge'] == 7 ) ){
			    $data['challenge_id']	= $challenge_id;
				$data['rival_team_id']	= md5($detail_challenge['rival_team_id']);
				$data['inviter_team_name']	= $detail_challenge['inviter_team_name'];
				$data['inviter_team_image'] = ($detail_challenge['inviter_team_image'] ? $detail_challenge['inviter_team_image'] : 'no-img-profil.png');
				$data['rival_team_name']	= $detail_challenge['rival_team_name'];
				$data['rival_team_image'] = ($detail_challenge['rival_team_image'] ? $detail_challenge['rival_team_image'] : 'no-img-profil.png');
				$data['challenge_date'] = date('d/m/Y', strtotime($detail_challenge['challenge_date']));
				$data['challenge_time'] = date('H:i', strtotime($detail_challenge['challenge_time']));
				$data['nama_lapangan'] = $detail_challenge['nama_lapangan'];
				$data['lapangan_daerah'] = $detail_challenge['daerah'];
				$data['lapangan_kota'] = $detail_challenge['kota'];
				$data['status_challenge'] = $detail_challenge['status_challenge'];
				$data['inviter_score'] = $detail_challenge['inviter_score'];
				$data['rival_score'] = $detail_challenge['rival_score'];
			} else{
				$data['message'] = "Score challenge sedang dalam persetujuan tim lawan.";
			}
		} else{
			$data['message'] = "Score challenge telah disetujui oleh kedua tim.";
		}

		$this->load->view('team/score-update', $data);
	}
}

?>