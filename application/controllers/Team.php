<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

	function __construct() {
		parent::__construct();
        if ( !isset($this->session->login['username']) ) { 
			redirect('login'); 
		}
		$data_header = header_member();
		$header_team = header_team();
		$this->load->vars(array_merge($data_header, $header_team));
		$this->load->model('team_model');
		$this->load->model('member_model');
		$this->load->model('notif_model');
		$this->load->model('social_model');
    }

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function challengelist()
	{
		$data['title'] = "Team - Futsal Yuk";
		$upcoming_challenge = $this->team_model->upcoming_challenge();
		foreach ($upcoming_challenge as $key => $value) {
			$upcoming_challenge[$key]['inviter_team_image'] = ($value['inviter_team_image'] ? $value['inviter_team_image'] : 'no-img-profil.png');
			$upcoming_challenge[$key]['rival_team_image'] = ($value['rival_team_image'] ? $value['rival_team_image'] : 'no-img-profil.png');
			$upcoming_challenge[$key]['challenge_date'] = date('d/m/Y', strtotime($value['challenge_date']));
			$upcoming_challenge[$key]['challenge_time'] = date('H:i', strtotime($value['challenge_time']));
		}
		$data['upcoming_challenge'] = $upcoming_challenge;
		$this->load->view('team/challenge-list', $data);
	}

	public function challengecomment()
	{
		$challenge_id = $this->input->post('challenge_id');
		$data['challenge_id'] = $challenge_id;
		$data['challenge_comment'] = $this->social_model->get_all_challenge_comment($challenge_id);
		$this->load->view('team/challengecomment', $data);
	}

	public function add_new_comment()
	{
		$data_input = array(
				'challenge_id'			=> $this->social_model->get_challenge_id($this->input->post('challenge_id')),
				'member_id'				=> $this->session->login['id'],
				'comment_description'	=> $this->input->post('new_challenge_comment')
			);
		$insert_new_comment = $this->social_model->add_new_challenge_comment($data_input);
		$data_html = '';
		if($insert_new_comment != 0){
			$dataMember = $this->member_model->data_member($this->session->login['id']);
			$member_image = ($dataMember['member_image'] ? $dataMember['member_image'] : 'no-img-profil.png');
			$data_html = '<div class="post-item" style="margin-top: 15px;">
							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 nopadding">
								<img class="img-circle post-img" src="'.base_url().'uploadfiles/member-images/'.$member_image.'">
							</div>
							<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 nopadding">
								<h4>'.$dataMember['member_name'].'</h4>
								<hr/>
								<p>
									'.$this->input->post('new_challenge_comment').'
								</p>
							</div>
							<div class="clearfix"> </div>
						</div>';
		}
		echo $data_html;
	}

	public function no_team()
	{
		$data['title'] = "Futsal Yuk";
		$this->load->view('team/no-team', $data);
	}

	public function myteam()
	{
		if($this->session->login['team_id'] == 0){
			redirect('team/no_team');
		}
		$data['data_team'] = $this->team_model->data_team(md5($this->session->login['team_id']));
		$post = $this->input->post();
		if($post){
			$check_team_password = $this->team_model->check_team_password(md5($this->session->login['team_id']), md5($post['pass_team']));
	    	if($check_team_password == TRUE){
	    		$data['status'] = 1;
	    		$data['url_redirect'] = "team/profile/".md5($this->session->login['team_id']);
	    	} else{
	    		$data['status'] = 0;
	    		$data['message'] = 'Password Salah';
	    	}
	    	echo json_encode($data);
		} else{
			$this->load->view('team/team-auth', $data);
		}
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

		$data['statistic'] = $this->team_model->statistic($team_id);

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

		$history_challenge = $this->team_model->history_challenge($team_id);
		foreach ($history_challenge as $key => $value) {
			$history_challenge[$key]['inviter_team_image'] = ($value['inviter_team_image'] ? $value['inviter_team_image'] : 'no-img-profil.png');
			$history_challenge[$key]['rival_team_image'] = ($value['rival_team_image'] ? $value['rival_team_image'] : 'no-img-profil.png');
			$history_challenge[$key]['challenge_date'] = date('d/m/Y', strtotime($value['challenge_date']));
			$history_challenge[$key]['challenge_time'] = date('H:i', strtotime($value['challenge_time']));
		}
		$data['history_challenge'] = $history_challenge;

		$this->load->view('team/challenge-history', $data);
	}

	public function mychallenge($get_team_id='')
	{
		$data['title'] = "My Challenge - Futsal Yuk";
		$team_id = ($get_team_id != '' ? $get_team_id : ($this->session->login['team_id'] != 0 ? md5($this->session->login['team_id']) : ''));
		$data_team = $this->team_model->data_team($team_id);
		$data['team_id'] = $team_id;
		$data['team_banner'] = ($data_team['team_banner'] ? $data_team['team_banner'] : 'no-banner.jpg');
		$data['team_image'] = ($data_team['team_image'] ? $data_team['team_image'] : 'no-img-profil.png');
		$data['team_name'] = $data_team['team_name'];
		
		$all_challenge = $this->team_model->team_challenge($get_team_id);
		foreach ($all_challenge as $key => $value) {
			$all_challenge[$key]['inviter_team_image'] = ($value['inviter_team_image'] ? $value['inviter_team_image'] : 'no-img-profil.png');
			$all_challenge[$key]['rival_team_image'] = ($value['rival_team_image'] ? $value['rival_team_image'] : 'no-img-profil.png');
			$all_challenge[$key]['challenge_date'] = date('d/m/Y', strtotime($value['challenge_date']));
			$all_challenge[$key]['challenge_time'] = date('H:i', strtotime($value['challenge_time']));
		}
		$data['all_challenge'] = $all_challenge;
		$this->load->view('team/challenge-all', $data);
	}

	public function setting($get_team_id='')
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

		$post = $this->input->post();
		if($post){
			$data['post'] = $post;
			$new_team_id = db_get_one_data('team_id', 'team', array('md5(team_id)'=>$team_id));
			if($post['old_pass'] == '' && $post['new_pass'] == '' && $post['confirm_new_pass'] == ''){
				$dataedit = array(
						'team_name'			=> $post['team_name']
					);
				$update_team = $this->team_model->edit_data_team($new_team_id, $dataedit);
				if($update_team == TRUE){
					$data['message'] = "Berhasil merubah nama team.";
				} else{
					$data['message'] = "Gagal merubah nama team. Silahkan coba kembali nanti.";
				}
			} else{
				$check_old_pass = $this->team_model->check_team_password($team_id, md5($post['old_pass']));
				if($check_old_pass == TRUE){
					if($post['new_pass'] == $post['confirm_new_pass']){
						$dataedit = array(
								'team_name'			=> $post['team_name'],
								'team_name'			=> $post['team_name']
							);
						$update_team = $this->team_model->edit_data_team($new_team_id, $dataedit);
						if($update_team == TRUE){
							$data['message'] = "Berhasil merubah setting team.";
						} else{
							$data['message'] = "Gagal merubah setting team. Silahkan coba kembali nanti.";
						}
					} else{
						$data['message'] = "Password Baru dan Konfirmasi Password Baru tidak cocok";
					}
				} else{
					$data['message'] = "Password Lama tidak sesuai.";
				}
			}
		}

		$this->load->view('team/setting', $data);
	}
}
