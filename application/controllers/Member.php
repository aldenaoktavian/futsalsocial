<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	function __construct() {
		parent::__construct();
        $this->load->model('member_model');
        $this->session->unset_userdata('login');
    }

	public function profile()
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