<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Challenge extends CI_Controller {

	function __construct() {
		parent::__construct();
        if ( !isset($_SESSION['login']['username']) ) { 
			redirect('login'); 
		}
		$data_header = header_member();
		$this->load->vars($data_header);
    }

	public function index()
	{
		redirect('challenge/pilihtim');
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
