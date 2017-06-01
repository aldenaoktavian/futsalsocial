<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function challengelist()
	{
		$data['title'] = "Team - Futsal Yuk";
		$this->load->view('team/challenge-list', $data);
	}

	public function challengecomment()
	{
		$data['title'] = "Futsal Yuk";
		$this->load->view('team/challengecomment', $data);
	}

	public function profile()
	{
		$data['title'] = "Team - Futsal Yuk";
		$this->load->view('team/profile', $data);
	}

	public function edit_description()
	{
		$data['title'] = "Team - Futsal Yuk";
		$this->load->view('team/edit-desc', $data);
	}

	public function add_member()
	{
		$data['title'] = "Team - Futsal Yuk";
		$this->load->view('team/add-member', $data);
	}

	public function statistic()
	{
		$data['title'] = "Team - Futsal Yuk";
		$this->load->view('team/statistic', $data);
	}

	public function history()
	{
		$data['title'] = "Team - Futsal Yuk";
		$this->load->view('team/challenge-history', $data);
	}
}
