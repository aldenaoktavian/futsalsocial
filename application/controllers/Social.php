<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social extends CI_Controller {

	public function index()
	{
		redirect('social/timeline');
	}

	public function timeline()
	{
		$data['title'] = "Futsal Yuk";
		$this->load->view('timeline', $data);
	}

	public function comment()
	{
		$data['title'] = "Futsal Yuk";
		$this->load->view('comment', $data);
	}
}
