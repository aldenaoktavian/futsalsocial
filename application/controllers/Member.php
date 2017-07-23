<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	function __construct() {
		parent::__construct();
        $this->load->vars(array_merge(header_member($this->uri->segment(3)), member_profile()));
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

		$data['member_friend_list'] = $this->member_model->member_friend_list($member_id);

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

	public function add_friend()
	{
		$post = $this->input->post();
		$member_id = db_get_one_data('member_id', 'member', array('md5(member_id)'=>$post['member_id']));
		$data_request = array(
			'member_id'		=> $member_id,
			'request_from'	=> $this->session->login['id'],
			'created_date'	=> date('Y-m-d H:i:s'),
			'modified_date'	=> date('Y-m-d H:i:s')
		);
		$friend_request = $this->member_model->friend_request($data_request);
		if($friend_request != 0){
			$notif_receiver = $this->member_model->list_member($member_id);
			$data_notif = array(
					'notif_type'	=> 18,
					'notif_url'		=> base_url().'member/profile/'.md5($this->session->login['id'])
				);
			$request_from = db_get_one_data('member_name', 'member', array('member_id'=>$this->session->login['id']));
			$arr_desc = array(
					0	=> array('name'=>'member_name', 'value'=>$request_from)
				);
			$saveNotif = saveNotif($data_notif, $arr_desc, $notif_receiver);
			if($saveNotif['message'] == 'sukses'){
				$data['data_notif'] = $_SESSION['data_socket'];
				$data['data_count_notif'] = $_SESSION['new_notif_updates_count'];
				$data['status'] = 1;
            	unset($_SESSION['new_notif_updates_count']);
				unset($_SESSION['data_socket']);
			} else{
				$data['status'] = 0;
			}
		} else{
			$data['status'] = 0;
		}

		echo json_encode($data);
	}

	public function open_friend_request()
	{
		$post = $this->input->post();
		$check_friend_request = $this->member_model->check_friend_request($post['member_id'], $this->session->login['id']);
		if($check_friend_request['friend_status'] == 0){
			$data['popup_title'] = "Permintaan Pertemanan";
			$member_name = db_get_one_data('member_name', 'member', array('member_id'=>$check_friend_request['member_id']));
			$member_request_name = db_get_one_data('member_name', 'member', array('member_id'=>$check_friend_request['request_from']));
			if(md5($check_friend_request['member_id'] ) == $post['member_id']){
				$data['status'] = 0;
				$data['friend_request_text'] = "Anda telah mengirimkan permintaan pertemanan.";
				$data['friend_request'] = '
						<button type="button" id="btn-add-friend" onclick="cancel_friend_request()" class="btn btn-default">Batalkan Permintaan Pertemanan</button>
						';
			} else if(md5($check_friend_request['request_from']) == $post['member_id']){
				$status = 1;
				$data['friend_request_text'] = $member_request_name." menambahkan Anda sebagai teman.";
				$data['friend_request'] = '
						<button type="button" id="btn-add-friend" onclick="accept_friend_request()" class="btn btn-default">Konfirmasi</button>
						<button type="button" id="btn-add-friend" onclick="delete_friend_request()" class="btn btn-default">Hapus Permintaan Pertemanan</button>
						';
			}
		} else{
			$data['popup_title'] = "Pertemanan";
			$data['friend_request'] = '<button type="button" onclick="delete_friend_request()" onclick="delete_friend_request()" class="btn btn-default">Hapus Pertemanan</button>';
		}

		$this->load->view('member/friend-request', $data);
	}

	public function cancel_friend_request()
	{
		$post = $this->input->post();
		$check_friend_request = $this->member_model->check_friend_request($post['member_id'], $this->session->login['id']);

		$update_friend_request = $this->member_model->update_friend_request($check_friend_request['member_friend_id'], array('friend_status'=>3, 'modified_date'=>date('Y-m-d H:i:s')));
		if($update_friend_request == TRUE){
			$result['status'] = 1;
			$result['message'] = "Berhasil membatalkan permintaan pertemanan.";
		} else{
			$result['status'] = 0;
			$result['message'] = "Gagal membatalkan permintaan pertemanan.";
		}

		echo json_encode($result);
	}

	public function accept_friend_request()
	{
		$post = $this->input->post();
		$check_friend_request = $this->member_model->check_friend_request($post['member_id'], $this->session->login['id']);

		$update_friend_request = $this->member_model->update_friend_request($check_friend_request['member_friend_id'], array('friend_status'=>1, 'modified_date'=>date('Y-m-d H:i:s')));
		if($update_friend_request == TRUE){
			$notif_receiver = $this->member_model->list_member($check_friend_request['request_from']);
			$data_notif = array(
					'notif_type'	=> 19,
					'notif_url'		=> base_url().'member/profile/'.md5($this->session->login['id'])
				);
			$member_name = db_get_one_data('member_name', 'member', array('member_id'=>$check_friend_request['member_id']));
			$arr_desc = array(
					0	=> array('name'=>'member_name', 'value'=>$member_name)
				);
			$saveNotif = saveNotif($data_notif, $arr_desc, $notif_receiver);
			if($saveNotif['message'] == 'sukses'){
				$result['data_notif'] = $_SESSION['data_socket'];
				$result['data_count_notif'] = $_SESSION['new_notif_updates_count'];
				$result['status'] = 1;
				$result['message'] = "Berhasil konfirmasi permintaan pertemanan.";
            	unset($_SESSION['new_notif_updates_count']);
				unset($_SESSION['data_socket']);
			} else{
				$data['status'] = 0;
				$result['message'] = "Berhasil konfirmasi permintaan pertemanan.";
			}
		} else{
			$result['status'] = 0;
			$result['message'] = "Gagal konfirmasi permintaan pertemanan.";
		}

		echo json_encode($result);
	}

	public function delete_friend_request()
	{
		$post = $this->input->post();
		$check_friend_request = $this->member_model->check_friend_request($post['member_id'], $this->session->login['id']);

		$update_friend_request = $this->member_model->update_friend_request($check_friend_request['member_friend_id'], array('friend_status'=>2, 'modified_date'=>date('Y-m-d H:i:s')));
		if($update_friend_request == TRUE){
			$result['status'] = 1;
			$result['message'] = "Berhasil konfirmasi permintaan pertemanan.";
		} else{
			$result['status'] = 0;
			$result['message'] = "Gagal konfirmasi permintaan pertemanan.";
		}

		echo json_encode($result);
	}
}

?>