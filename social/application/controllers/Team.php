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
		$this->load->vars(array_merge($data_header, $header_team, team_rank(), upcoming_challenge()));
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

	public function challengelist_history()
	{
		$post = $this->input->post();

		$upcoming_challenge_history = $this->team_model->upcoming_challenge_history($post['inviter_team_id'], $post['rival_team_id']);
		$html = '';
		foreach ($upcoming_challenge_history as $uch) {
			$html .= '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 challengelist-history-table">'.$uch['inviter_score'].'</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 challengelist-history-table">'.date('d/m/Y', strtotime($uch['challenge_date'])).'</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 challengelist-history-table">'.$uch['rival_score'].'</div>';
		}
		echo $html;
	}

	public function challengecomment()
	{
		$challenge_id = $this->input->post('challenge_id');
		$data['challenge_id'] = $challenge_id;
		$challenge_comment = $this->social_model->get_all_challenge_comment($challenge_id);
		foreach ($challenge_comment as $key => $value) {
			$challenge_comment[$key]['long_time'] = get_long_time($value['comment_created']);
			$challenge_comment[$key]['comment_created'] = date('d F Y H:i:s', strtotime($value['comment_created']));
		}
		$data['challenge_comment'] = $challenge_comment;
		$this->load->view('team/challengecomment', $data);
	}

	public function add_new_comment()
	{
		$challenge_id = $this->social_model->get_challenge_id($this->input->post('challenge_id'));
		$data_input = array(
				'challenge_id'			=> $challenge_id,
				'member_id'				=> $this->session->login['id'],
				'comment_description'	=> $this->input->post('new_challenge_comment'),
				'comment_created'		=> date('Y-m-d H:i:s')
			);
		$insert_new_comment = $this->social_model->add_new_challenge_comment($data_input);
		$data_html = '';
		if($insert_new_comment != 0){
			$member_name = db_get_one_data('member_name', 'member', array('member_id'=>$this->session->login['id']));

			$inviter_team_id = db_get_one_data('inviter_team', 'team_challenge', array('challenge_id'=>$challenge_id));
			$rival_team_id = db_get_one_data('rival_team', 'team_challenge', array('challenge_id'=>$challenge_id));

			$inviter_team = $this->team_model->team_members(md5($inviter_team_id));
			$rival_team = $this->team_model->team_members(md5($rival_team_id));

			$notif_receiver = array_merge($inviter_team, $rival_team);
			$data_notif = array(
					'notif_type'	=> 15,
					'notif_url'		=> base_url().'team/detail_challenge/'.$this->input->post('challenge_id')
				);
			$arr_desc = array(
					0	=> array('name'=>'member_name', 'value'=>$member_name)
				);
			
			$saveNotif = saveNotif($data_notif, $arr_desc, $notif_receiver);

			if($saveNotif['message'] == 'sukses'){
				if($saveNotif['message'] == 'sukses'){
					$result['status'] = 1;
					$result['data_notif'] = $_SESSION['data_socket'];
					$result['data_count_notif'] = $_SESSION['new_notif_updates_count'];

					$detail_comment = $this->social_model->detail_challenge_comment($insert_new_comment);
					$member_image = ($detail_comment['member_image'] ? $detail_comment['member_image'] : 'no-img-profil.png');
					$long_time = get_long_time($detail_comment['comment_created']);
					$comment_created = date('d F Y H:i:s', strtotime($detail_comment['comment_created']));

					$result['data_html'] = '<div class="post-item" style="margin-top: 15px;">
									<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 nopadding">
										<img class="img-circle post-img" src="'.base_url().'uploadfiles/member-images/'.$member_image.'">
									</div>
									<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
										<h4>'.$detail_comment['member_name'].'</h4>
										<span class="long-time" title="'.$comment_created.'">'.$long_time.'</span>
										<hr/>
										<p>
											'.$detail_comment['comment_description'].'
										</p>
									</div>
									<div class="clearfix"> </div>
								</div>';
	            	unset($_SESSION['new_notif_updates_count']);
					unset($_SESSION['data_socket']);
	            }
			}
		}
		echo json_encode($result);
	}

	public function detail_challenge($challenge_id, $notif_id)
	{
		$data['title'] = "Detail Challenge - Futsal Yuk";
	    read_notif($notif_id);
	    $data['challenge_id'] = $challenge_id;
		$detail_challenge = $this->team_model->detail_challenge($challenge_id);
		$detail_challenge['inviter_team_image'] = ($detail_challenge['inviter_team_image'] ? $detail_challenge['inviter_team_image'] : 'no-img-profil.png');
    	$detail_challenge['rival_team_image'] = ($detail_challenge['rival_team_image'] ? $detail_challenge['rival_team_image'] : 'no-img-profil.png');
		$data['detail_challenge'] = $detail_challenge;

		$challenge_comment = $this->social_model->get_all_challenge_comment($challenge_id);
		foreach ($challenge_comment as $key => $value) {
			$challenge_comment[$key]['long_time'] = get_long_time($value['comment_created']);
			$challenge_comment[$key]['comment_created'] = date('d F Y H:i:s', strtotime($value['comment_created']));
		}
		$data['challenge_comment'] = $challenge_comment;

		$this->load->view('detail-challenge-comment', $data);
	}

	public function no_team()
	{
		$data['title'] = "Futsal Yuk";
		$this->load->view('team/no-team', $data);
	}

	public function newteam()
	{
		$data['title'] = "Create Team - Futsal Yuk";

		$post = $this->input->post();
		if($post){
			if($post['pass'] == $post['confirm_pass']){
				$this->load->helper('directory');
				
				$config['upload_path']          = './uploadfiles/team-images/';
				$config['allowed_types']        = 'gif|jpg|png|doc|pdf|gif';
				$config['max_size']             = 2000;

				$this->load->library('upload', $config, 'team_image_upload');
				if ( ! $this->team_image_upload->do_upload('team_image')){
					$data['message'] = $this->team_image_upload->display_errors();
					$this->load->view('team/new-team', $data);
				} else{
					$data_image = $this->team_image_upload->data();
				}

				$config_banner['upload_path']          = './uploadfiles/team-banner/';
				$config_banner['allowed_types']        = 'gif|jpg|png|doc|pdf|gif';
				$config_banner['max_size']             = 2000;

				$this->load->library('upload', $config_banner, 'team_banner_upload');
				if ( ! $this->team_banner_upload->do_upload('team_banner')){
					$data['message'] = $this->team_banner_upload->display_errors();
					$this->load->view('team/new-team', $data);
				} else{
					$data_banner = $this->team_banner_upload->data();
				}

				$data_team = array(
						'team_name'		=> $post['team_name'],
						'team_description'	=> $post['team_desc'],
						'team_image'	=> $data_image["raw_name"].$data_image["file_ext"],
						'team_banner'	=> $data_banner["raw_name"].$data_banner["file_ext"],
						'password'		=> md5($post['pass'])
					);
				$create_team = $this->team_model->create_team($data_team);

				if($create_team != 0){
					$data_member = array(
							'team_id'	=> $create_team
						);
					$update_member = $this->member_model->update_member($this->session->login['id'], $data_member);

					if($update_member == TRUE){
						$this->session->set_userdata('login', array_merge($this->session->login, array('team_id'=>$create_team)));
						$this->session->set_userdata('team_pass', 1);
						redirect('team/profile/'.md5($create_team));
					}
				}
			} else{
				$data['message'] = "Password dan Konfirmasi Password tidak cocok";
			}
		}

		$this->load->view('team/new-team', $data);
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
	    		$this->session->set_userdata('team_pass', 1);
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

		if($this->input->post('search_keyword'))
		{
			$search_keyword = $this->input->post('search_keyword');
			$member_no_team = $this->member_model->member_no_team($search_keyword);
			$list_member_no_team = '';
			foreach($member_no_team as $list_member){
				$member_image = ($list_member['member_image'] ? $list_member['member_image'] : 'no-img-profil.png');
				$list_member_no_team .= '<div class="bg-post member-item">
					<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
						<img class="img-circle hidden-xs" src="'.base_url().'uploadfiles/member-images/'.$member_image.'">
						<span>'.$list_member['member_name'].'</span>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
						<button type="button" class="btn btn-primary add-member-team" onclick="add_member_team(this)" data-id="'.md5($list_member['member_id']).'" data-team="'.$team_id.'">Tambah</button>
					</div>
					<div class="clearfix"> </div>
				</div>';
			}
			echo $list_member_no_team;
		} else{
			$data['member_no_team'] = $this->member_model->member_no_team();
			$this->load->view('team/add-member', $data);
		}
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
			$notif_receiver = $this->member_model->list_member($member_id);
			$data_notif = array(
					'notif_type'	=> 1,
					'notif_url'		=> base_url().'notif/team_request/'.md5($add_request)
				);
			$arr_desc = array(
					0	=> array('name'=>'team_name', 'value'=>$team_name)
				);
			$saveNotif = saveNotif($data_notif, $arr_desc, $notif_receiver);
			if($saveNotif['message'] == 'sukses'){
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

		$new_team_id = ($team_request_status == 1 ? $team_id : 0);

		$editrequest = array(
				'team_request_status'	=> $team_request_status
			);
		$editmember = array(
				'team_id'	=> $new_team_id
			);
		$edit_request = $this->team_model->edit_team_request($team_request_id, $editrequest, $member_id, $editmember);
		if($edit_request == TRUE){
			$notif_type = ($team_request_status == 1 ? 2 : 3);
			$notif_receiver = $this->member_model->list_member($member_admin_id);
			$data_notif = array(
					'notif_type'	=> $notif_type,
					'notif_url'		=> base_url().'notif/team_request/'.$team_request_id
				);
			$arr_desc = array(
					0	=> array('name'=>'member_name', 'value'=>$member_name)
				);
			$saveNotif = saveNotif($data_notif, $arr_desc, $notif_receiver);
			if($saveNotif['message'] == 'sukses'){
				if($team_request_status == 1){
					$this->session->set_userdata('login', array_merge($this->session->login, array('team_id'=>$team_id)));
					echo 'team/profile';
				} else{
					echo 'social/timeline';
				}
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

		$data['total_page'] = $this->team_model->count_all_team_challenge($get_team_id);
		
		$this->load->view('team/challenge-all', $data);
	}

	public function load_mychallenge($get_team_id='', $limit=0)
	{
		$offset = 5;
		$all_challenge = $this->team_model->team_challenge($get_team_id, $limit, $offset);
		$string = '';
		foreach ($all_challenge as $data_challenge) {
			$inviter_team_image = ($data_challenge['inviter_team_image'] ? $data_challenge['inviter_team_image'] : 'no-img-profil.png');
			$rival_team_image = ($data_challenge['rival_team_image'] ? $data_challenge['rival_team_image'] : 'no-img-profil.png');
			$string .= '<div class="bg-post post-item">
							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 challenge-img">
								<img class="img-circle post-img" src="'.base_url().'uploadfiles/team-images/'.$inviter_team_image.'">
								<div class="clearfix"> </div>
								<h5>'.$data_challenge['inviter_team_name'].'</h5>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 challenge-det">
								<h4>VS</h4>
								<hr/>
								<p>
									Tanggal '.date('d/m/Y', strtotime($data_challenge['challenge_date'])).' <br/>
									Jam '.date('H:i', strtotime($data_challenge['challenge_time'])).' <br/>
									di '.$data_challenge['nama_lapangan'].' <br/>
									'.$data_challenge['daerah'].', '.$data_challenge['kota'].'
								</p>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 challenge-img">
								<img class="img-circle post-img" src="'.base_url().'uploadfiles/team-images/'.$rival_team_image.'">
								<div class="clearfix"> </div>
								<h5>'.$data_challenge['rival_team_name'].'</h5>
							</div>
							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
							<div class="clearfix"> </div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 challenge-comment">
								<hr/>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 challenge-score">
									Status : '.$data_challenge['status_challenge_name'].'
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>';
		}
		echo $string;
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

	public function update_cover()
	{
		$config_banner['upload_path']          = './uploadfiles/team-banner/';
		$config_banner['allowed_types']        = 'gif|jpg|png|doc|pdf|gif';
		$config_banner['max_size']             = 2000;

		$this->load->library('upload', $config_banner, 'team_banner_upload');
		if ( ! $this->team_banner_upload->do_upload('team_banner')){
			$message = $this->team_banner_upload->display_errors();
			echo "<script>alert('".$message."');</script>";
		} else{
			$data_banner = $this->team_banner_upload->data();
		}

		$data_update = array(
				'team_banner'		=> $data_banner["raw_name"].$data_banner["file_ext"]
			);
		$edit_data_team = $this->team_model->edit_data_team($this->session->login['id'], $data_update);
		if($edit_data_team == TRUE){
			redirect('team/profile/'.md5($this->session->login['id']));
		} else{
			$message = "Gagal update cover photo. Silahkan coba kembali nanti.";
			echo "<script>alert('".$message."');</script>";
		}
	}

	public function update_image()
	{
		$config_image['upload_path']          = './uploadfiles/team-images/';
		$config_image['allowed_types']        = 'gif|jpg|png|doc|pdf|gif';
		$config_image['max_size']             = 2000;

		$this->load->library('upload', $config_image, 'team_image_upload');
		if ( ! $this->team_image_upload->do_upload('team_image')){
			$message = $this->team_image_upload->display_errors();
			echo "<script>alert('".$message."');</script>";
		} else{
			$data_image = $this->team_image_upload->data();
		}

		$data_update = array(
				'team_image'		=> $data_image["raw_name"].$data_image["file_ext"]
			);
		$edit_data_team = $this->team_model->edit_data_team($this->session->login['id'], $data_update);
		if($edit_data_team == TRUE){
			redirect('team/profile/'.md5($this->session->login['id']));
		} else{
			$message = "Gagal update profile photo. Silahkan coba kembali nanti.";
			echo "<script>alert('".$message."');</script>";
		}
	}
}
