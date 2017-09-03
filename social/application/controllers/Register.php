<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct() {
		parent::__construct();
        $this->load->model('member_model');
    }

	public function index()
	{
		$post = $this->input->post();

		$data['title'] = "Daftar ke Futsal Community";

		if($post){
			$member_image = "";
			$member_banner = "";
			if($_FILES['member_image']['name'] != ''){
				$config_image['upload_path']          = './uploadfiles/member-images/';
				$config_image['allowed_types']        = 'gif|jpg|png|doc|pdf|gif';
				$config_image['max_size']             = 2000;

				$this->load->library('upload', $config_image, 'member_image_upload');
				if ( ! $this->member_image_upload->do_upload('member_image')){
					$message = $this->member_image_upload->display_errors();
					echo "<script>alert('".$message."');</script>";
				} else{
					$data_image = $this->member_image_upload->data();
					$member_image = $data_image["raw_name"].$data_image["file_ext"];
				}
			}

			if($_FILES['member_banner']['name'] != ''){
				$config_banner['upload_path']          = './uploadfiles/member-banner/';
				$config_banner['allowed_types']        = 'gif|jpg|png|doc|pdf|gif';
				$config_banner['max_size']             = 2000;

				$this->load->library('upload', $config_banner, 'member_banner_upload');
				if ( ! $this->member_banner_upload->do_upload('member_banner')){
					$message = $this->member_banner_upload->display_errors();
					echo "<script>alert('".$message."');</script>";
				} else{
					$data_banner = $this->member_banner_upload->data();
					$member_banner = $data_banner["raw_name"].$data_banner["file_ext"];
				}
			}

			if(isset($post['register_booking']) && $post['register_booking'] == TRUE){
				$member_booking = 1;
			} else{
				$member_booking = 0;
			}
			$data_member = array(
					'member_booking'	=> $member_booking,
					'user'	=> array(
							'username'	=> $post['username'],
							'email'		=> $post['email'],
							'password'	=> md5($post['password'])
						),
					'booking' => array(
							'member_booking_firstname'	=> $post['firstname'],
							'member_booking_lastname'	=> $post['lastname']
						),
					'social'	=> array(
							'member_social_firstname'	=> $post['firstname'],
							'member_social_lastname'	=> $post['lastname'],
							'member_image'	=> $member_image,
							'member_banner'	=> $member_banner
						)
				);
			$insert_member = $this->member_model->add_member($data_member);
			if($insert_member != 0){
				$dataMemberLogin = $this->member_model->data_member($insert_member);
				$login_session['username'] = $dataMemberLogin['username'];
				$login_session['id'] = $dataMemberLogin['member_id'];
				$login_session['user_id'] = $dataMemberLogin['user_id'];
				$login_session['team_id'] = $dataMemberLogin['team_id'];
				$login_session['is_team_admin'] = $dataMemberLogin['is_team_admin'];
				$this->session->set_userdata('login', $login_session);
				$data["msg"] = "";
				log_message('error', "SUKSES login member dengan id ".$dataMemberLogin['member_id']." , IP Address : ".$_SERVER['REMOTE_ADDR'], false);
				redirect('social');
			}
		} else{
			$this->load->view('register', $data);
		}
	}

	public function cek_available_data()
	{
		$post = $this->input->post();
		$cek_available_data = $this->member_model->cek_available_data($post['field'], $post['value']);
		if($cek_available_data != NULL){
			echo '<label id="cek_'.$post['field'].'" class="error" for="'.$post['field'].'">'.ucwords($post['text']).' sudah terdaftar. Silahkan coba '.$post['text'].' lain.</label>';
		} else{
			echo '';
		}
	}
}

?>