<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Challenge extends CI_Controller {

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
