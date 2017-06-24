<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social extends CI_Controller {

	function __construct() {
		parent::__construct();
        if ( !isset($this->session->login['username']) ) {
			redirect('login'); 
		}
		$data_header = header_member();
		$this->load->vars(array_merge($data_header, team_rank()));
		$this->load->model('social_model');
		$this->load->model('member_model');
		$this->session->unset_userdata('team_pass');
    }

	public function index()
	{
		redirect('social/timeline');
	}

	public function timeline()
	{
		$data['title'] = "Timeline - Futsal Yuk";
		$data['all_post'] = $this->social_model->get_all_post();
		$this->load->view('timeline', $data);
	}

	public function add_new_post()
	{
		$data_input = array(
				'member_id'				=> $this->session->login['id'],
				'post_description'	=> $this->input->post('new_post')
			);
		$insert_new_post = $this->social_model->add_new_post($data_input);
		$data_html = '';
		if($insert_new_post != 0){
			$dataMember = $this->member_model->data_member($this->session->login['id']);
			$member_image = ($dataMember['member_image'] ? $dataMember['member_image'] : 'no-img-profil.png');
			$data_html = '<div class="bg-post post-item">
							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 nopadding">
								<img class="img-circle post-img" src="'.base_url().'uploadfiles/member-images/'.$member_image.'">
							</div>
							<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 nopadding">
								<h4>'.$dataMember['member_name'].'</h4>
								<hr/>
								<p>
									'.$this->input->post('new_post').'
								</p>
								<a href="#comment-content" class="popup-with-move-anim" data-id="'.md5($insert_new_post).'"><button type="button" class="btn btn-inverse">Comment</button></a>
							</div>
							<div class="clearfix"> </div>
						</div>';
		}
		echo $data_html;
	}

	public function comment()
	{
		$post_id = $this->input->post('post_id');
		$data['post_id'] = $post_id;
		$data['post_comment'] = $this->social_model->get_all_post_comment($post_id);
		$this->load->view('comment', $data);
	}

	public function add_new_comment()
	{
		$post_id = $this->social_model->get_post_id($this->input->post('post_id'));
		$data_input = array(
				'post_id'				=> $post_id,
				'member_id'				=> $this->session->login['id'],
				'comment_description'	=> $this->input->post('new_post_comment')
			);
		$insert_new_comment = $this->social_model->add_new_comment($data_input);
		$data_html = '';
		if($insert_new_comment != 0){
			$member_post_id = db_get_one_data('member_id', 'member_post', array('post_id'=>$post_id));
			$member_post_name = db_get_one_data('member_name', 'member', array('member_id'=>$member_post_id));
			$datanotif = array(
				'member_id'		=> $member_post_id,
				'notif_type'	=> 13,
				'notif_detail'	=> $member_post_name.'" mengomentari post Anda.',
				'notif_url'		=> base_url().'social/detail_comment/'.$this->input->post('post_id'),
				'notif_created'	=> date('Y-m-d H:i:s'),
				'notif_chow'	=> 1
			);
			$addnotif = $this->notif_model->add_notif($datanotif);

			$dataMember = $this->member_model->data_member($this->session->login['id']);
			$member_image = ($dataMember['member_image'] ? $dataMember['member_image'] : 'no-img-profil.png');
			$data_html = '<div class="post-item" style="margin-top: 15px;">
							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 nopadding">
								<img class="img-circle post-img" src="'.base_url().'uploadfiles/member-images/'.$member_image.'">
							</div>
							<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 nopadding">
								<h4>'.$dataMember['member_name'].'</h4>
								<hr/>
								<p>
									'.$this->input->post('new_post_comment').'
								</p>
							</div>
							<div class="clearfix"> </div>
						</div>';
		}
		echo $data_html;
	}
}
