<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	function __construct() {
		parent::__construct();
        $this->load->vars(array_merge(header_member(), member_profile()));
        $this->load->model('member_model');
		$this->session->unset_userdata('team_pass');
    }

	public function profile($member_id)
	{
		$data['title'] = "Futsal Yuk";

		$data['member_id'] = $member_id;
		$data['data_member'] = $this->member_model->data_member_md5($member_id);
		$member_post_list = $this->member_model->member_post_list($member_id);
		foreach ($member_post_list as $key => $value) {
			$member_post_list[$key]['long_time'] = get_long_time($value['post_created']);
			$member_post_list[$key]['post_created'] = date('d F Y H:i:s', strtotime($value['post_created']));
		}
		$data['member_post_list'] = $member_post_list;

		$this->load->view('member/profile', $data);
	}

	public function update_cover()
	{
		$config_banner['upload_path']          = './uploadfiles/member-banner/';
		$config_banner['allowed_types']        = 'gif|jpg|png|doc|pdf|gif';
		$config_banner['max_size']             = 2000;

		$this->load->library('upload', $config_banner, 'member_banner_upload');
		if ( ! $this->member_banner_upload->do_upload('member_banner')){
			$message = $this->member_banner_upload->display_errors();
			echo "<script>alert('".$message."');</script>";
		} else{
			$data_banner = $this->member_banner_upload->data();
		}

		$data_update = array(
				'member_banner'		=> $data_banner["raw_name"].$data_banner["file_ext"]
			);
		$update_member = $this->member_model->update_member($this->session->login['id'], $data_update);
		if($update_member == TRUE){
			redirect('member/profile/'.md5($this->session->login['id']));
		} else{
			$message = "Gagal update cover photo. Silahkan coba kembali nanti.";
			echo "<script>alert('".$message."');</script>";
		}
	}

	public function update_image()
	{
		$config_image['upload_path']          = './uploadfiles/member-images/';
		$config_image['allowed_types']        = 'gif|jpg|png|doc|pdf|gif';
		$config_image['max_size']             = 2000;

		$this->load->library('upload', $config_image, 'member_image_upload');
		if ( ! $this->member_image_upload->do_upload('member_image')){
			$message = $this->member_image_upload->display_errors();
			echo "<script>alert('".$message."');</script>";
		} else{
			$data_image = $this->member_image_upload->data();
		}

		$data_update = array(
				'member_image'		=> $data_image["raw_name"].$data_image["file_ext"]
			);
		$update_member = $this->member_model->update_member($this->session->login['id'], $data_update);
		if($update_member == TRUE){
			redirect('member/profile/'.md5($this->session->login['id']));
		} else{
			$message = "Gagal update profile photo. Silahkan coba kembali nanti.";
			echo "<script>alert('".$message."');</script>";
		}
	}

	public function editprofile()
	{
		$data['title'] = "Edit Profile Member - Futsal Yuk";

		$post = $this->input->post();
		if($post){
			$data_edit = array(
					'member_name'	=> $post['member_name'],
					'username'		=> $post['username'],
					'email'			=> $post['email']
				);
			$update_member = $this->member_model->update_member($this->session->login['id'], $data_edit);
			if($update_member == TRUE){
				$data['message'] = "Berhasil edit profile.";
			} else{
				$data['message'] = "Gagal edit profile. Silahkan coba kembali nanti.";
			}
		}
		$data['data_member'] = $this->member_model->data_member($this->session->login['id']);

		$this->load->view('member/editprofile', $data);
	}

	public function ubahpassword()
	{
		$data['title'] = "Ubah Password Member - Futsal Yuk";

		$post = $this->input->post();
		if($post){
			$check_member_password = $this->member_model->check_member_password($this->session->login['id'], md5($post['old_pass']));
			if($check_member_password == TRUE){
				if($post['new_pass'] == $post['confirm_new_pass']){
					$data_pass = array(
							'password'	=> md5($post['new_pass'])
						);
					$update_member = $this->member_model->update_member($this->session->login['id'], $data_pass);
					if($data_pass == TRUE){
						$data['message'] = "Berhasil merubah password.";
					} else{
						$data['message'] = "Gagal merubah password. Silahkan coba kembali nanti.";
					}

				} else{
					$data['message'] = "Password Baru dan Konfirmasi Password Baru tidak cocok";
				}
			} else{
				$data['message'] = "Password Lama tidak sesuai.";
			}
		}

		$this->load->view('member/changepass', $data);
	}

	public function list_team()
	{
		$data['title'] = "Futsal Yuk";
		$this->load->view('team/list-team', $data);
	}
}

?>