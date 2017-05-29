<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function timeline()
	{
		$data['title'] = "Futsal Yuk";
		$this->load->view('timeline', $data);
	}
}
