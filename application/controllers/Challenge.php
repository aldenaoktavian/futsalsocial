<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Challenge extends CI_Controller {

	function __construct() {
		parent::__construct();
        if ( !isset($this->session->login['team_id']) ) { 
			redirect('login'); 
		}
		$data_header = header_member();
		$this->load->vars($data_header);
		$this->load->model('team_model');
		$this->load->model('lapangan_model');
		$this->load->model('notif_model');
    }

	public function index()
	{
		redirect('challenge/pilihtim');
	}

	public function newchallenge()
	{
		$data['title'] = "Futsal Yuk";
		$this->session->unset_userdata('newchallenge');
		$this->load->view('team/new-challenge', $data);
	}

	public function pilihtim()
	{
		$data['title'] = "Futsal Yuk";
		$data['inviter_team']	= $this->team_model->data_team(md5($this->session->login['team_id']));
		if(isset($this->session->newchallenge['rival_team_id'])){
			$data['rival_team']	= $this->team_model->data_team($this->session->newchallenge['rival_team_id']);
		}
		$this->load->view('team/choose-team', $data);
	}

	public function pilihtanggal()
	{
		$data['title'] = "Futsal Yuk";
		$data['search_area'] = $this->lapangan_model->search_area();
		$this->load->view('team/choose-date', $data);
	}

	public function list_team()
	{
		$data['title'] = "Futsal Yuk";
		$team_id = md5($this->session->login['team_id']);

		if($this->input->post('search_keyword'))
		{
			$search_keyword = $this->input->post('search_keyword');
			$list_other_team = $this->team_model->list_other_team($team_id, $search_keyword);
			$content_list_other_team = '';
			foreach($list_other_team as $list_team){
				$team_image = ($list_team['team_image'] ? $list_team['team_image'] : 'no-img-profil.png');
				$content_list_other_team .= '<div class="bg-post member-item">
							<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
								<img class="img-circle hidden-xs" src="'.base_url().'uploadfiles/team-images/'.$team_image.'">
								<span>'.$list_team['team_name'].'</span>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
								<button type="button" class="btn btn-primary add-team" onclick="add_team(this)" data-id="'.md5($list_team['team_id']).'">Tambah</button>
							</div>
							<div class="clearfix"> </div>
						</div>';
			}
			echo $content_list_other_team;
		} else{
			$data['list_other_team'] = $this->team_model->list_other_team($team_id);
			$this->load->view('team/list-team', $data);
		}
	}

	public function add_rival_team()
	{
		$post = $this->input->post();
		$this->session->set_userdata('newchallenge', array('inviter_team_id'=>md5($this->session->login['team_id']), 'rival_team_id'=>$post['rival_team_id']));
	}

	public function search_lapangan()
	{
		$post = $this->input->post();

		if(isset($post['page'])){
			$page = $post['page'];
			$data['i'] = 0 + (($post['page'] - 1) * 2);
		} else{
			$page = 0;
			$data['i'] = 0;
		}

		if(isset($post['search_area'])){
			$date = date('Y-m-d', strtotime($post['search_date']));
			$start_hour = date('H:i:s', strtotime($post['search_time']));
			$end_hour = date_format(date_add(date_create($start_hour), date_interval_create_from_date_string('+'.$post['search_hour'].' hours')), 'H:i:s');
			$search_area_val = $post['search_area'];
			if(strpos($search_area_val, ' - ') == TRUE){
				$search_area_val = explode(" - ", $search_area_val);
				$search_area_val = $search_area_val[0];
			}
			$data['result_search_lap'] = $this->lapangan_model->get_search_lap($search_area_val, $date, $start_hour, $end_hour, $page);
			$all_pages = $this->lapangan_model->count_search_lap($search_area_val, $date, $start_hour, $end_hour);
		} else{
			$data['result_search_lap'] = $this->lapangan_model->all_available_lap($page);
			$all_pages = $this->lapangan_model->count_all_available_lap();
		}

		$pages = ($all_pages['jml'] % 2 == 0 ? $all_pages['jml'] / 2 : ($all_pages['jml'] / 2)+1 );
		$data['pages'] = (int)$pages;
		$data['currentPage'] = $page;

		$this->load->view('team/list-lapangan', $data);
	}

	public function add_lapangan()
	{
		$post = $this->input->post();
		$data_lapangan['id_tipe'] = $post['id_tipe'];
		$data_lapangan['search_date'] = $post['search_date'];
		$data_lapangan['search_time'] = $post['search_time'];
		$data_lapangan['search_area'] = $post['search_area'];
		$data_lapangan['search_hour'] = $post['search_hour'];
		$this->session->set_userdata('newchallenge', array_merge($this->session->newchallenge, $data_lapangan));
	}

	public function preview()
	{
		$sess_newchallenge = $this->session->newchallenge;
		$data['inviter_team']	= $this->team_model->data_team($sess_newchallenge['inviter_team_id']);
		$data['rival_team']	= $this->team_model->data_team($sess_newchallenge['rival_team_id']);
		$data['challenge_date'] = date('d/m/Y', strtotime($sess_newchallenge['search_date']));
		$data['challenge_time'] = date('H:i', strtotime($sess_newchallenge['search_time']));
		$data['lapangan'] = $this->lapangan_model->data_lap($sess_newchallenge['id_tipe']);
		$this->load->view('team/challenge-preview', $data);
	}

	public function create_challenge()
	{
		$sess_newchallenge = $this->session->newchallenge;
		$inviter_team_id = db_get_one_data('team_id', 'team', array('md5(team_id)'=>$sess_newchallenge['inviter_team_id']));
		$inviter_team_name = db_get_one_data('team_name', 'team', array('md5(team_id)'=>$sess_newchallenge['inviter_team_id']));
		$rival_team_id = db_get_one_data('team_id', 'team', array('md5(team_id)'=>$sess_newchallenge['rival_team_id']));
		$id_tipe = db_get_one_data('id_tipe', 'tipe_lapangan', array('md5(id_tipe)'=>$sess_newchallenge['id_tipe']));
		$start_hour = date('H:i:s', strtotime($sess_newchallenge['search_time']));
		$end_hour = date_format(date_add(date_create($start_hour), date_interval_create_from_date_string('+'.$sess_newchallenge['search_hour'].' hours')), 'H:i:s');

		$data['message'] = '';
		$data_challenge = array(
				'inviter_team'	=> $inviter_team_id,
				'rival_team'	=> $rival_team_id
			);
		$create_challenge = $this->team_model->create_challenge($data_challenge);
		if($create_challenge != 0){
			$data_booking = array(
					'challenge_id'	=> $create_challenge,
					'id_tipe'		=> $id_tipe,
					'tanggal'		=> date('Y-m-d', strtotime($sess_newchallenge['search_date'])),
					'start_time'	=> $start_hour,
					'end_time'		=> $end_hour,
					'tgl_transaksi'	=> date('Y-m-d H:i:s'),
					'kode_booking'	=> 'abc'
				);
			$add_booking = $this->lapangan_model->add_booking($data_booking);
			if($add_booking != 0){
				$team_members = $this->team_model->team_members(md5($rival_team_id));
				foreach($team_members as $member){
					$datanotif = array(
						'member_id'		=> $member['member_id'],
						'notif_type'	=> 4,
						'notif_detail'	=> 'Tim "'.$inviter_team_name.'" mengundang tim Anda untuk melakukan pertandingan.',
						'notif_url'		=> base_url().'notif/detail_challenge/'.md5($create_challenge),
						'notif_created'	=> date('Y-m-d H:i:s')
					);
					$addnotif = $this->notif_model->add_notif($datanotif);
				}
				$data['message'] = 'Challenge berhasil dibuat. Silahkan menunggu persetujuan dari lawan.';
			} else{
				$data['message'] = 'Gagal membuat challenge. Silahkan coba kembali nanti.';
			}
			$this->session->unset_userdata('newchallenge');
		}

		$this->load->view('team/challenge-created', $data);
	}
	
	public function revisi()
	{
	    $data['challenge_id'] = $this->input->post('challenge_id');
	    $data['team_id'] = $this->input->post('rival_team_id');
	    $this->load->view('team/challenge-revisi', $data);
	}
	
	public function revisi_save()
	{
	    $post = $this->input->post();
	    $check_team_password = $this->team_model->check_team_password($post['team_id'], md5($post['pass_team']));
	    if($check_team_password == TRUE){
	        $data_revisi = array(
	                'detail_revisi' => $post['pesan_revisi'],
	                'status_challenge'  => 3
	            );
	        $update_revisi = $this->team_model->update_challenge($post['challenge_id'], $data_revisi);
	        if($update_revisi == TRUE){
	            team_challenge_log($post['challenge_id']);
	            $inviter_team_id = db_get_one_data('inviter_team', 'team_challenge', array('md5(challenge_id)'=>$post['challenge_id']));
	            $rival_team_name = db_get_one_data('team_name', 'team', array('md5(team_id)'=>$post['team_id']));
	            $team_members = $this->team_model->team_members(md5($inviter_team_id));
				foreach($team_members as $member){
					$datanotif = array(
						'member_id'		=> $member['member_id'],
						'notif_type'	=> 5,
						'notif_detail'	=> 'Tim "'.$rival_team_name.'" mengajukan revisi.',
						'notif_url'		=> base_url().'notif/detail_revisi_challenge/'.$post['challenge_id'],
						'notif_created'	=> date('Y-m-d H:i:s')
					);
					$addnotif = $this->notif_model->add_notif($datanotif);
				}
	            $data['status'] = 1;
	            $data['message'] = '<span>Sukses mengirim data revisi. Silahkan menunggu balasan dari tim lawan.</span>';
	        } else{
	            $data['status'] = 0;
	            $data['message'] = 'Gagal mengirim revisi. Silahkan coba kembali nanti.';
	        }
	    } else{
	        $data['status'] = 0;
	        $data['message'] = 'Password Salah';   
	    }
	    echo json_encode($data);
	}
	
	public function revisi_challenge($challenge_id)
	{
	    $data['title'] = "Revisi Challenge - Futsal Yuk";
	    
	    $data['challenge_id'] = $challenge_id;
	    $data['notes_challenge'] = $this->team_model->notes_challenge($challenge_id);
	    
	    $this->load->view('team/challenge-detail-revisi', $data);
	}
	
	public function change_schedule($challenge_id)
	{
	    $data['title'] = "Atur Jadwal";
	    
	    /*$data['search_area'] = $this->lapangan_model->search_area();
	    $detail_challenge = $this->team_model->detail_challenge($challenge_id);
	    $time1 = new DateTime($detail_challenge['challenge_time']);
		$time2 = new DateTime($detail_challenge['end_time']);
		$challenge_hour = $time1->diff($time2);
		$detail_challenge['challenge_hour'] = $challenge_hour->format('%h');
	    $detail_challenge['challenge_time'] = date('H:i', strtotime($detail_challenge['challenge_time']));
	    $data['detail_challenge'] = $detail_challenge;*/

	    $post = $this->input->post();
	    $detail_challenge = $this->team_model->detail_challenge($challenge_id);
	    $time1 = new DateTime($detail_challenge['challenge_time']);
		$time2 = new DateTime($detail_challenge['end_time']);
		$challenge_hour = $time1->diff($time2);
		$get_challenge_hour = $challenge_hour->format('%h');
		$data['challenge_id'] = $challenge_id;
	    if(!$post){
	    	$data['search_area'] = $this->lapangan_model->search_area();
	    	$detail_challenge['challenge_hour'] = $get_challenge_hour;
		    $detail_challenge['challenge_time'] = date('H:i', strtotime($detail_challenge['challenge_time']));
		    $detail_challenge['transaksi_challenge_id'] = md5($detail_challenge['transaksi_challenge_id']);
	    } else{
	    	$start_hour = date('H:i:s', strtotime($post['start_time']));
			$end_hour = date_format(date_add(date_create($start_hour), date_interval_create_from_date_string('+'.$get_challenge_hour.' hours')), 'H:i:s');
			$data_challenge = array(
					'status_challenge'	=> 4
				);
			$update_challenge = $this->team_model->update_challenge($challenge_id, $data_challenge);
			if($update_challenge == TRUE){
				team_challenge_log($challenge_id);
				$data_booking = array(
						'tanggal'		=> date('Y-m-d', strtotime($post['challenge_date'])),
						'start_time'	=> $start_hour,
						'end_time'		=> $end_hour
					);
				$update_booking = $this->lapangan_model->edit_booking(md5($detail_challenge['transaksi_challenge_id']), $data_booking);
				if($update_booking == TRUE){
					$team_members = $this->team_model->team_members(md5($detail_challenge['rival_team_id']));
					foreach($team_members as $member){
						$datanotif = array(
							'member_id'		=> $member['member_id'],
							'notif_type'	=> 12,
							'notif_detail'	=> 'Tim "'.$detail_challenge['rival_team_name'].'" merubah challenge.',
							'notif_url'		=> base_url().'notif/detail_challenge/'.md5($detail_challenge['challenge_id']),
							'notif_created'	=> date('Y-m-d H:i:s')
						);
						$addnotif = $this->notif_model->add_notif($datanotif);
					}
					$data['message'] = "Sukses merubah challenge. Silahkan menunggu konfirmasi selanjutnya dari team lawan.";
				} else{
					$data['message'] = "Gagal merubah data booking. Silahkan coba kembali nanti.";
				}
			} else{
				$data['message'] = "Gagal merubah data challenge. Silahkan coba kembali nanti.";
			}
	    }
	    $data['detail_challenge'] = $detail_challenge;
	    
	    $this->load->view('team/change-schedule', $data);
	}
	
	public function decline()
	{
	    $data['challenge_id'] = $this->input->post('challenge_id');
	    $data['team_id'] = $this->input->post('rival_team_id');
	    $this->load->view('team/challenge-decline', $data);
	}

	public function decline_save()
	{
		$post = $this->input->post();
	    $check_team_password = $this->team_model->check_team_password($post['team_id'], md5($post['pass_team']));
	    if($check_team_password == TRUE){
	        $data_decline = array(
	                'status_challenge'  => 2
	            );
	        $data_decline = $this->team_model->update_challenge($post['challenge_id'], $data_decline);
	        if($data_decline == TRUE){
	            team_challenge_log($post['challenge_id']);
	            $data_booking = array(
	            		'transaksi_challenge_status'	=> 2,
	            	);
	            $transaksi_challenge_id = db_get_one_data('transaksi_challenge_id', 'transaksi_challenge', array('md5(challenge_id)'=>$post['challenge_id']));
	            $edit_booking = $this->lapangan_model->edit_booking(md5($transaksi_challenge_id), $data_booking);
	            if($edit_booking == TRUE){
		            $inviter_team_id = db_get_one_data('inviter_team', 'team_challenge', array('md5(challenge_id)'=>$post['challenge_id']));
		            $rival_team_name = db_get_one_data('team_name', 'team', array('md5(team_id)'=>$post['team_id']));
		            $team_members = $this->team_model->team_members(md5($inviter_team_id));
					foreach($team_members as $member){
						$datanotif = array(
							'member_id'		=> $member['member_id'],
							'notif_type'	=> 6,
							'notif_detail'	=> 'Tim "'.$rival_team_name.'" menolak challenge.',
							'notif_url'		=> base_url().'notif/detail_decline_challenge/'.$post['challenge_id'],
							'notif_created'	=> date('Y-m-d H:i:s')
						);
						$addnotif = $this->notif_model->add_notif($datanotif);
					}
		            $data['status'] = 1;
		            $data['message'] = '<span>Berhasil menolak challenge.</span>';
		        } else{
		        	$data['status'] = 0;
	            	$data['message'] = 'Gagal merubah data booking. Silahkan coba kembali nanti.';
		        }
	        } else{
	            $data['status'] = 0;
	            $data['message'] = 'Gagal menolak challenge. Silahkan coba kembali nanti.';
	        }
	    } else{
	        $data['status'] = 0;
	        $data['message'] = 'Password Salah';   
	    }
	    echo json_encode($data);
	}
	
	public function accept()
	{
	    $data['challenge_id'] = $this->input->post('challenge_id');
	    $data['team_id'] = $this->input->post('rival_team_id');
	    $this->load->view('team/challenge-accept', $data);
	}

	public function accept_save()
	{
		$post = $this->input->post();
	    $check_team_password = $this->team_model->check_team_password($post['team_id'], md5($post['pass_team']));
	    if($check_team_password == TRUE){
	        $data_decline = array(
	                'status_challenge'  => 1
	            );
	        $data_decline = $this->team_model->update_challenge($post['challenge_id'], $data_decline);
	        if($data_decline == TRUE){
	            team_challenge_log($post['challenge_id']);
	            $data_booking = array(
	            		'transaksi_challenge_status'	=> 1,
	            	);
	            $transaksi_challenge_id = db_get_one_data('transaksi_challenge_id', 'transaksi_challenge', array('md5(challenge_id)'=>$post['challenge_id']));
	            $edit_booking = $this->lapangan_model->edit_booking(md5($transaksi_challenge_id), $data_booking);
	            if($edit_booking == TRUE){
		            $inviter_team_id = db_get_one_data('inviter_team', 'team_challenge', array('md5(challenge_id)'=>$post['challenge_id']));
		            $rival_team_name = db_get_one_data('team_name', 'team', array('md5(team_id)'=>$post['team_id']));
		            $team_members = $this->team_model->team_members(md5($inviter_team_id));
					foreach($team_members as $member){
						$datanotif = array(
							'member_id'		=> $member['member_id'],
							'notif_type'	=> 7,
							'notif_detail'	=> 'Tim "'.$rival_team_name.'" menyetujui challenge.',
							'notif_url'		=> base_url().'notif/detail_accept_challenge/'.$post['challenge_id'],
							'notif_created'	=> date('Y-m-d H:i:s')
						);
						$addnotif = $this->notif_model->add_notif($datanotif);
					}
		            $data['status'] = 1;
		            $data['message'] = '<span>Berhasil menyetujui challenge.</span>';
		        } else{
		        	$data['status'] = 0;
	            	$data['message'] = 'Gagal merubah data booking. Silahkan coba kembali nanti.';
		        }
	        } else{
	            $data['status'] = 0;
	            $data['message'] = 'Gagal menyetujui challenge. Silahkan coba kembali nanti.';
	        }
	    } else{
	        $data['status'] = 0;
	        $data['message'] = 'Password Salah';   
	    }
	    echo json_encode($data);
	}

	public function input_score()
	{
		$detail_challenge = $this->team_model->detail_challenge($this->input->post('challenge_id'));
		$data['challenge_id']	= $this->input->post('challenge_id');
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

		if($detail_challenge['status_challenge'] == 1){
			$this->load->view('team/score-input', $data);
		} else{
			$this->load->view('team/score-update', $data);
		}
	}

	public function input_score_save()
	{
		$post = $this->input->post();
		$detail_challenge = $this->team_model->detail_challenge($post['challenge_id']);
		
		$data_score = array(
				'inviter_score'	=> $post['inviter_score'],
				'rival_score'	=> $post['rival_score'],
				'status_challenge'	=> 7
			);
		$update_score = $this->team_model->update_challenge($post['challenge_id'], $data_score);

		if($update_score == TRUE){
			team_challenge_log($post['challenge_id']);
			$team_members = $this->team_model->team_members(md5($detail_challenge['rival_team_id']));
			foreach($team_members as $member){
				$datanotif = array(
					'member_id'		=> $member['member_id'],
					'notif_type'	=> 9,
					'notif_detail'	=> 'Tim "'.$detail_challenge['inviter_team_name'].'" mengajukan score challenge.',
					'notif_url'		=> base_url().'notif/detail_score_challenge/'.$post['challenge_id'],
					'notif_created'	=> date('Y-m-d H:i:s')
				);
				$addnotif = $this->notif_model->add_notif($datanotif);
			}
			$result['status'] = 1;
			$result['message'] = '<span>Berhasil mengajukan score challenge. Silahkan menunggu respon dari tim lawan.</span>';
		} else{
			$result['status'] = 0;
			$result['message'] = 'Gagal update data score. Silahkan coba kembali nanti.';
		}

		echo json_encode($result);
	}

	public function update_score_save()
	{
		$post = $this->input->post();
		$detail_challenge = $this->team_model->detail_challenge($post['challenge_id']);
		
		$data_score = array(
				'inviter_score'	=> $post['inviter_score'],
				'rival_score'	=> $post['rival_score'],
				'status_challenge'	=> 8
			);
		$update_score = $this->team_model->update_challenge($post['challenge_id'], $data_score);

		if($update_score == TRUE){
			team_challenge_log($post['challenge_id']);
			$team_members = $this->team_model->team_members(md5($detail_challenge['inviter_team_id']));
			foreach($team_members as $member){
				$datanotif = array(
					'member_id'		=> $member['member_id'],
					'notif_type'	=> 10,
					'notif_detail'	=> 'Tim "'.$detail_challenge['rival_team_name'].'" mengajukan revisi untuk score challenge.',
					'notif_url'		=> base_url().'notif/detail_score_challenge/'.$post['challenge_id'],
					'notif_created'	=> date('Y-m-d H:i:s')
				);
				$addnotif = $this->notif_model->add_notif($datanotif);
			}
			$result['status'] = 1;
			$result['message'] = '<span>Berhasil merubah score challenge.</span>';
		} else{
			$result['status'] = 0;
			$result['message'] = 'Gagal update data score. Silahkan coba kembali nanti.';
		}

		echo json_encode($result);
	}

	public function approve_score()
	{
		$post = $this->input->post();
		$team_id = $this->session->login['team_id'];
		$detail_challenge = $this->team_model->detail_challenge($post['challenge_id']);

		if($post['inviter_score'] > $post['rival_score']){
			$inviter_point = 2;
			$rival_point = 1;
		} else{
			$inviter_point = 1;
			$rival_point = 2;
		}

		$data_score = array(
				'status_challenge'	=> 5,
				'inviter_point'		=> $inviter_point,
				'rival_point'		=> $rival_point
			);
		$update_score = $this->team_model->update_challenge($post['challenge_id'], $data_score);

		if($update_score == TRUE){
			team_challenge_log($post['challenge_id']);
			if($team_id == $detail_challenge['inviter_team_id']){
				$team_members = $this->team_model->team_members(md5($detail_challenge['rival_team_id']));
			} else{
				$team_members = $this->team_model->team_members(md5($detail_challenge['inviter_team_id']));
			}
			foreach($team_members as $member){
				$datanotif = array(
					'member_id'		=> $member['member_id'],
					'notif_type'	=> 11,
					'notif_detail'	=> 'Score challenge telah disetujui',
					'notif_url'		=> base_url().'notif/detail_score_challenge/'.$post['challenge_id'],
					'notif_created'	=> date('Y-m-d H:i:s')
				);
				$addnotif = $this->notif_model->add_notif($datanotif);
			}
			$result['status'] = 1;
			$result['message'] = '<span>Score telah disetujui.</span>';
		} else{
			$result['status'] = 0;
			$result['message'] = 'Gagal update data score. Silahkan coba kembali nanti.';
		}

		echo json_encode($result);
	}
}
