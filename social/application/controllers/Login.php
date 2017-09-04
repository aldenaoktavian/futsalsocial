<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
        $this->load->model('login_model');
        $this->load->model('member_model');
    }

	public function index()
	{
		$data["msg"] = "";
		if ( isset($_SESSION['login']['username']) ) { 
			redirect('social'); 
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('user', 'Uername', 'required');
		$this->form_validation->set_rules('pass', 'Password', 'required');
		if ( $this->form_validation->run() == TRUE ) {
			$result = $this->login_model->cek_user_login(
				$this->input->post('user'),
				md5($this->input->post('pass'))
			);

			if ( $result != FALSE) {
				$this->member_model->add_login_log($result);
				$dataMemberLogin = $this->member_model->data_member($result);
				$login_session['username'] = $dataMemberLogin['username'];
				$login_session['id'] = $dataMemberLogin['member_id'];
				$login_session['user_id'] = $dataMemberLogin['user_id'];
				$login_session['team_id'] = $dataMemberLogin['team_id'];
				$login_session['is_team_admin'] = $dataMemberLogin['is_team_admin'];
				$this->session->set_userdata('login', $login_session);
				$data["msg"] = "";
				log_message('error', "SUKSES login member dengan id ".$dataMemberLogin['member_id']." , IP Address : ".$_SERVER['REMOTE_ADDR'], false);
				redirect('social');
			} else{
				$data["msg"] = "Username atau Password salah";
				log_message('error', "GAGAL Login , IP Address : ".$_SERVER['REMOTE_ADDR'], false);
			}
		}

		$this->load->view('login', $data);
	}

	public function logout()
	{
		$this->member_model->update_login_log($this->session->login['id']);
		session_destroy();
		redirect('social');
	}
}

?>