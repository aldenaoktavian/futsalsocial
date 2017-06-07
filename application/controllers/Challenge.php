<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Challenge extends CI_Controller {

	function __construct() {
		parent::__construct();
        if ( !isset($this->session->login['team_id']) ) { 
			redirect('login'); 
		}
		$data_header = header_member();
		$this->load->vars($data_header);
		$this->load->model('team_model');
		$this->load->model('lapangan_model');
    }

	public function index()
	{
		redirect('challenge/pilihtim');
	}

	public function newchallenge()
	{
		$data['title'] = "Futsal Yuk";
		$this->load->view('team/new-challenge', $data);
	}

	public function pilihtim()
	{
		$data['title'] = "Futsal Yuk";
		$data['inviter_team']	= $this->team_model->data_team(md5($this->session->login['team_id']));
		if(isset($this->session->newchallenge['rival_team_id'])){
			$data['rival_team']	= $this->team_model->data_team($this->session->newchallenge['rival_team_id']);
		}
		$this->load->view('team/choose-team', $data);
	}

	public function pilihtanggal()
	{
		$data['title'] = "Futsal Yuk";
		$data['search_area'] = $this->lapangan_model->search_area();
		$this->load->view('team/choose-date', $data);
	}

	public function list_team()
	{
		$data['title'] = "Futsal Yuk";
		$team_id = md5($this->session->login['team_id']);
		$data['list_other_team'] = $this->team_model->list_other_team($team_id);
		$this->load->view('team/list-team', $data);
	}

	public function add_rival_team()
	{
		$post = $this->input->post();
		$this->session->set_userdata('newchallenge', array('inviter_team_id'=>md5($this->session->login['team_id']), 'rival_team_id'=>$post['rival_team_id']));
	}

	public function search_lapangan()
	{
		$post = $this->input->post();
		if($post){
			$date = date('Y-m-d', strtotime($post['search_date']));
			$start_hour = date('H:i:s', strtotime($post['search_date']));
			$end_hour = date_format(date_add(date_create($start_hour), date_interval_create_from_date_string('+'.$post['search_hour'].' hours')), 'H:i:s');
			$search_area_val = $post['search_area'];
			if(strpos($search_area_val, ' - ') == TRUE){
				$search_area_val = explode(" - ", $search_area_val);
				$search_area_val = $search_area_val[0];
			}
			$data['result_search_lap'] = $this->lapangan_model->get_search_lap($search_area_val, $date, $start_hour, $end_hour);
		} else{
			$data['result_search_lap'] = $this->lapangan_model->all_available_lap();
		}
		$this->load->view('team/list-lapangan', $data);
	}
}
