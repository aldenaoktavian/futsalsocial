<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
        $this->load->model('login_model');
        $this->load->model('member_model');
        $this->session->unset_userdata('login');
    }

	public function index()
	{
		$data["msg"] = "";
		if ( isset($_SESSION['login']['username']) ) { 
			redirect('social'); 
		}

		/*$this->load->library('form_validation');
		$this->form_validation->set_rules('user', 'Uername', 'required');
		$this->form_validation->set_rules('pass', 'Password', 'required');*/
		$user = 'vero123';
		$pass = 'vero123';
		//if ( $this->form_validation->run() == TRUE ) {
			/*$result = $this->login_model->cek_user_login(
				$this->input->post('user'),
				md5($this->input->post('pass'))
			);*/
			$result = $this->login_model->cek_user_login(
				$user,
				md5($pass)
			);
			
			if ( $result != FALSE) {
				$dataMemberLogin = $this->member_model->data_member($result);
				$login_session['username'] = $dataMemberLogin['username'];
				$login_session['id'] = $dataMemberLogin['member_id'];
				$login_session['team_id'] = $dataMemberLogin['team_id'];
				$this->session->set_userdata('login', $login_session);
				$data["msg"] = "";
				log_message('error', "SUKSES login member dengan id ".$dataMemberLogin['member_id']." , IP Address : ".$_SERVER['REMOTE_ADDR'], false);
				redirect('social');
			} else{
				$data["msg"] = "Username atau Password salah";
				log_message('error', "GAGAL Login , IP Address : ".$_SERVER['REMOTE_ADDR'], false);
			}
		//}

		//$this->load->view('login', $data);
		echo "Login Dulu Yaa";
	}

	public function pilihtim()
	{
		$data['title'] = "Futsal Yuk";
		$this->load->view('team/choose-team', $data);
	}

	public function pilihtanggal()
	{
		$data['title'] = "Futsal Yuk";
		$this->load->view('team/choose-date', $data);
	}

	public function list_team()
	{
		$data['title'] = "Futsal Yuk";
		$this->load->view('team/list-team', $data);
	}
}

?>