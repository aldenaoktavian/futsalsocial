<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

	function __construct() {
		parent::__construct();
        if ( !isset($this->session->login['username']) ) { 
			redirect('login'); 
		}
		$data_header = header_member();
		$this->load->vars($data_header);
		$this->load->model('team_model');
		$this->load->model('member_model');
		$this->load->model('notif_model');
    }

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function challengelist()
	{
		$data['title'] = "Team - Futsal Yuk";
		$this->load->view('team/challenge-list', $data);
	}

	public function challengecomment()
	{
		$data['title'] = "Futsal Yuk";
		$this->load->view('team/challengecomment', $data);
	}

	public function no_team()
	{
		$data['title'] = "Futsal Yuk";
		$this->load->view('team/no-team', $data);
	}

	public function profile($get_team_id='')
	{
		$data['title'] = "Team Profile - Futsal Yuk";
		$team_id = ($get_team_id != '' ? $get_team_id : ($this->session->login['team_id'] != 0 ? md5($this->session->login['team_id']) : ''));
		if($team_id == ''){
			redirect('team/no_team');
		}
		$data_team = $this->team_model->data_team($team_id);
		$data['team_id'] = $team_id;
		$data['team_banner'] = ($data_team['team_banner'] ? $data_team['team_banner'] : 'no-banner.jpg');
		$data['team_image'] = ($data_team['team_image'] ? $data_team['team_image'] : 'no-img-profil.png');
		$data['team_name'] = $data_team['team_name'];
		$data['team_description'] = $data_team['team_description'];

		$data['team_members'] = $this->team_model->team_members($team_id);
		$this->load->view('team/profile', $data);
	}

	public function edit_description()
	{
		$data['title'] = "Team - Futsal Yuk";
		$team_id = $this->input->post('team_id');
		$data_team = $this->team_model->data_team($team_id);
		$data['team_name'] = $data_team['team_name'];
		$data['team_description'] = $data_team['team_description'];
		$this->load->view('team/edit-desc', $data);
	}

	public function edit_description_save()
	{
		$data['title'] = "Team - Futsal Yuk";
		$post = $this->input->post();
		$team_id = $this->session->login['team_id'];
		$dataedit = array(
				'team_name'			=> $post['team_name'],
				'team_description'	=> $post['team_desc']
			);
		$update_team = $this->team_model->edit_data_team($team_id, $dataedit);
		if($update_team == TRUE){
			redirect('team/profile');
		} else{
			redirect('team/edit_description');
		}
	}

	public function add_member()
	{
		$data['title'] = "Team - Futsal Yuk";
		$team_id = $this->input->post('team_id');
		$data['team_id'] = $team_id;
		$data['member_no_team'] = $this->member_model->member_no_team();
		$this->load->view('team/add-member', $data);
	}

	public function add_member_save()
	{
		$team_id = db_get_one_data('team_id', 'team', array('md5(team_id)'=>$this->input->post('team_id')));
		$member_id = db_get_one_data('member_id', 'member', array('md5(member_id)'=>$this->input->post('member_id')));
		$team_name = db_get_one_data('team_name', 'team', array('team_id'=>$team_id));
		
		$datarequest = array(
				'team_id'	=> $team_id,
				'member_id'	=> $member_id,
				'member_admin_id'	=> $this->session->login['id']
			);
		$add_request = $this->team_model->team_request($datarequest);
		if($add_request != 0){
			$datanotif = array(
					'member_id'		=> $member_id,
					'notif_type'	=> 1,
					'notif_detail'	=> '"'.$team_name.'" mengundang Anda untuk bergabung dalam tim.',
					'notif_url'		=> base_url().'notif/team_request/'.md5($add_request),
					'notif_created'	=> date('Y-m-d H:i:s')
				);
			$add_notif = $this->notif_model->add_notif($datanotif);
			if($add_notif != 0){
				echo 'team/profile';
			}
		} else{
			echo 'team/add_member';
		}
	}

	public function add_member_process()
	{
		$team_request_id = $this->input->post('team_request_id');
		$team_request_status = $this->input->post('team_request_status');

		$team_id = db_get_one_data('team_id', 'team_request', array('md5(team_request_id)'=> $team_request_id));
		$member_id = db_get_one_data('member_id', 'team_request', array('md5(team_request_id)'=> $team_request_id));
		$member_admin_id = db_get_one_data('member_admin_id', 'team_request', array('md5(team_request_id)'=> $team_request_id));
		$member_team_id = db_get_one_data('member_id', 'member', array('member_id'=>$member_id, 'is_team_admin'));
		$member_name = db_get_one_data('member_name', 'member', array('member_id'=>$member_id));

		$editrequest = array(
				'team_request_status'	=> $team_request_status
			);
		$editmember = array(
				'team_id'	=> $team_id
			);
		$edit_request = $this->team_model->edit_team_request($team_request_id, $editrequest, $member_id, $editmember);
		if($edit_request == TRUE){
			$notif_type = ($team_request_status == 1 ? 2 : 3);
			$notif_detail = ($team_request_status == 1 ? $member_name." telah menerima permintaan Anda untuk bergabung dalam tim." : $member_name." tidak menerima permintaan Anda untuk bergabung dalam tim.");
			$datanotif = array(
					'member_id'		=> $member_admin_id,
					'notif_type'	=> $notif_type,
					'notif_detail'	=> $notif_detail,
					'notif_url'		=> base_url().'notif/team_request/'.$team_request_id,
					'notif_created'	=> date('Y-m-d H:i:s')
				);
			$add_notif = $this->notif_model->add_notif($datanotif);
			if($add_notif != 0){
				$this->session->set_userdata('login', array('team_id'=>$team_id));
				echo 'team/profile';
			}
		} else{
			echo 'social/timeline';
		}
	}

	public function statistic($get_team_id='')
	{
		$data['title'] = "Statistik Team - Futsal Yuk";
		$team_id = ($get_team_id != '' ? $get_team_id : ($this->session->login['team_id'] != 0 ? md5($this->session->login['team_id']) : ''));
		if($team_id == ''){
			redirect('team/no_team');
		}
		$data_team = $this->team_model->data_team($team_id);
		$data['team_id'] = $team_id;
		$data['team_banner'] = ($data_team['team_banner'] ? $data_team['team_banner'] : 'no-banner.jpg');
		$data['team_image'] = ($data_team['team_image'] ? $data_team['team_image'] : 'no-img-profil.png');
		$data['team_name'] = $data_team['team_name'];
		$this->load->view('team/statistic', $data);
	}

	public function history($get_team_id='')
	{
		$data['title'] = "History Pertandingan - Futsal Yuk";
		$team_id = ($get_team_id != '' ? $get_team_id : ($this->session->login['team_id'] != 0 ? md5($this->session->login['team_id']) : ''));
		if($team_id == ''){
			redirect('team/no_team');
		}
		$data_team = $this->team_model->data_team($team_id);
		$data['team_id'] = $team_id;
		$data['team_banner'] = ($data_team['team_banner'] ? $data_team['team_banner'] : 'no-banner.jpg');
		$data['team_image'] = ($data_team['team_image'] ? $data_team['team_image'] : 'no-img-profil.png');
		$data['team_name'] = $data_team['team_name'];
		$this->load->view('team/challenge-history', $data);
	}
}
