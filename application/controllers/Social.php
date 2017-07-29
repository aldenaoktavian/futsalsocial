<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social extends CI_Controller {

	function __construct() {
		parent::__construct();
        if ( !isset($this->session->login['username']) ) {
			redirect('login'); 
		}
		$data_header = header_member();
		$this->load->vars(array_merge($data_header, team_rank(), upcoming_challenge()));
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
		$all_post = $this->social_model->get_all_post();
		foreach ($all_post as $key => $value) {
			$all_post[$key]['long_time'] = get_long_time($value['post_created']);
			$all_post[$key]['post_created'] = date('d F Y H:i:s', strtotime($value['post_created']));
		}
		$data['all_post'] = $all_post;
		$this->session->unset_userdata('post_member_count');
		$this->session->set_userdata('post_member_count', count($data['all_post']));

		/*$notif_receiver = $this->team_model->team_members(md5(1));
		$data_notif = array(
				'notif_type'	=> 1
			);
		$arr_desc = array(
				0	=> array('name'=>'team_name', 'value'=>'coba'),
				1	=> array('name'=>'tes', 'value'=>'halo')
			);
		$saveNotif = saveNotif($data_notif, $arr_desc, $notif_receiver);
		print_r($saveNotif);die;*/

		$this->load->view('timeline', $data);
	}

	public function load_post()
	{
		$new_all_post = $this->social_model->get_all_post();
		foreach ($new_all_post as $key => $value) {
			$new_all_post[$key]['long_time'] = get_long_time($value['post_created']);
			$new_all_post[$key]['post_created'] = date('d F Y H:i:s', strtotime($value['post_created']));
		}
		$data['new_all_post'] = $new_all_post;
		$this->load->view('load-post', $data);
	}

	public function add_new_post()
	{
		$data_input = array(
				'member_id'			=> $this->session->login['id'],
				'post_description'	=> $this->input->post('new_post'),
				'post_created'		=> date("Y-m-d H:i:s")
			);
		$insert_new_post = $this->social_model->add_new_post($data_input);
		if($insert_new_post != 0){
			$dataMember = $this->member_model->data_member($this->session->login['id']);
			$member_image = ($dataMember['member_image'] ? $dataMember['member_image'] : 'no-img-profil.png');
			$data['data_html'] = '<div class="bg-post post-item">
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
			$data['user_new_post'] = $this->session->login['id'];
			$data['count_all_post'] = $this->social_model->get_count_post();
			$this->session->set_userdata('post_member_count', ($this->session->post_member_count + 1));
			$data['new_post_member_count'] = $this->session->post_member_count;
		}
		echo json_encode($data);
	}

	public function comment()
	{
		$post_id = $this->input->post('post_id');
		$data['post_id'] = $post_id;
		$post_comment = $this->social_model->get_all_post_comment($post_id);
		foreach ($post_comment as $key => $value) {
			$post_comment[$key]['long_time'] = get_long_time($value['comment_created']);
			$post_comment[$key]['comment_created'] = date('d F Y H:i:s', strtotime($value['comment_created']));
		}
		$data['post_comment'] = $post_comment;
		$this->load->view('comment', $data);
	}

	public function add_new_comment()
	{
		$post_id = $this->social_model->get_post_id($this->input->post('post_id'));
		$data_input = array(
				'post_id'				=> $post_id,
				'member_id'				=> $this->session->login['id'],
				'comment_description'	=> $this->input->post('new_post_comment'),
				'comment_created'		=> date('Y-m-d H:i:s')
			);
		$insert_new_comment = $this->social_model->add_new_comment($data_input);
		if($insert_new_comment != 0){
			$member_post_id = db_get_one_data('member_id', 'member_post', array('post_id'=>$post_id));
			$member_name = db_get_one_data('member_name', 'member', array('member_id'=>$this->session->login['id']));

			if($member_post_id == $this->session->login['id']){
				$notif_receiver = $this->social_model->detail_member_post_comment($post_id);
				$data_notif = array(
						'notif_type'	=> 16,
						'notif_url'		=> base_url().'social/detail_post/'.$this->input->post('post_id')
					);
			} else{
				$notif_receiver = $this->member_model->list_member($member_post_id);
				$data_notif = array(
						'notif_type'	=> 14,
						'notif_url'		=> base_url().'social/detail_post/'.$this->input->post('post_id')
					);
			}
			$arr_desc = array(
					0	=> array('name'=>'member_name', 'value'=>$member_name)
				);
			
			$saveNotif = saveNotif($data_notif, $arr_desc, $notif_receiver);
			if($saveNotif['message'] == 'sukses'){
				$result['status'] = 1;
				$result['data_notif'] = $_SESSION['data_socket'];
				$result['data_count_notif'] = $_SESSION['new_notif_updates_count'];

				$detail_comment = $this->social_model->detail_post_comment($insert_new_comment);
				$member_image = ($detail_comment['member_image'] ? $detail_comment['member_image'] : 'no-img-profil.png');
				$long_time = get_long_time($detail_comment['comment_created']);
				$comment_created = date('d F Y H:i:s', strtotime($detail_comment['comment_created']));

				$result['data_html'] = '<div class="post-item" style="margin-top: 15px;">
								<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 nopadding">
									<img class="img-circle post-img" src="'.base_url().'uploadfiles/member-images/'.$member_image.'">
								</div>
								<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
									<h4>'.$detail_comment['member_name'].'</h4>
									<span class="long-time" title="'.$comment_created.'">'.$long_time.'</span>
									<hr/>
									<p>
										'.$detail_comment['comment_description'].'
									</p>
								</div>
								<div class="clearfix"> </div>
							</div>';
            	unset($_SESSION['new_notif_updates_count']);
				unset($_SESSION['data_socket']);
            }
		}
		echo json_encode($result);
	}

	public function detail_post($post_id, $notif_id)
	{
		read_notif($notif_id);
		$data['title'] = "New Comment - Futsal Yuk";
		$data['post_id'] = $post_id;

		$detail_post = $this->social_model->detail_post($post_id);
		$detail_post['member_image'] = ($detail_post['member_image'] ? $detail_post['member_image'] : 'no-img-profil.png');
		$detail_post['long_time'] = get_long_time($detail_post['post_created']);
		$detail_post['post_created'] = date('d F Y H:i:s', strtotime($detail_post['post_created']));
		$data['detail_post'] = $detail_post;

		$post_comment = $this->social_model->get_all_post_comment($post_id);
		foreach ($post_comment as $key => $value) {
			$post_comment[$key]['long_time'] = get_long_time($value['comment_created']);
			$post_comment[$key]['comment_created'] = date('d F Y H:i:s', strtotime($value['comment_created']));
		}
		$data['post_comment'] = $post_comment;

		$this->load->view('detail-post', $data);
	}

	public function all_rangking($page=0, $search_keyword='')
	{
		$data['title'] = "Semua Rangking - Futsal Yuk";

		$offset = 20;
		$data['offset'] = $offset;
		if($page != 0){
			$limit = 0 + (($page - 1) * $offset);
		} else{
			$limit = 0;
		}

		$all_rangking = $this->team_model->all_rangking($limit, $offset, $search_keyword);
		foreach ($all_rangking as $key => $value) {
			$all_rangking[$key]['team_image'] = ($value['team_image'] ? $value['team_image'] : 'no-img-profil.png');
		}
		$data['all_rangking'] = $all_rangking;

		$all_pages = $this->team_model->count_all_rangking($search_keyword);
		$data['pagination'] = get_pagination($limit, $offset, $all_pages, base_url().'social/all_rangking/', 'load_pagination');
		$data['limit'] = $limit;
		$data['search_keyword'] = $search_keyword;

		$this->load->view('all-rangking', $data);
	}

	public function messages($member_id)
	{
		$data['title'] = "Pesan";

		if($member_id == "all"){
			$this->load->view('message', array_merge($data, load_messages()));
		} else{
			$check_chat_message = $this->member_model->check_chat_message(md5($this->session->login['id']), $member_id);
			if($check_chat_message == NULL){
				$create_message = $this->member_model->create_message($this->session->login['id'], $member_id);
				redirect('social/message/'.md5($create_message));
			} else{
				redirect('social/message/'.md5($check_chat_message['member_chat_id']));
			}
		}
	}

	public function message($member_chat_id)
	{
		$chat_group_id = $member_id = db_get_one_data('chat_group_id', 'member_chat', array('md5(member_chat_id)'=>$member_chat_id));
		if($chat_group_id != 0){
			$data['last_login'] = "";
			$data['partner_detail']['member_id'] = $this->member_model->group_chat_member_id($chat_group_id);
			$data['partner_detail']['member_name'] = $this->member_model->group_chat_member($chat_group_id);
			$data['partner_detail']['member_image'] = 'no-img-profil.png';
		} else{
			$member_id = db_get_one_data('member_partner_id', 'member_chat', array('md5(member_chat_id)'=>$member_chat_id));
			if($member_id == $this->session->login['id']){
				$member_id = db_get_one_data('member_id', 'member_chat', array('md5(member_chat_id)'=>$member_chat_id));
			}
			
			$data['last_login'] = get_last_login(md5($member_id));
			$data['partner_detail'] = $this->member_model->data_member_md5(md5($member_id));
			$data['partner_detail']['member_image'] = ($data['partner_detail']['member_image'] ? $data['partner_detail']['member_image'] : 'no-img-profil.png');
		}

		$data['title'] = "Pesan - ".$data['partner_detail']['member_name'];
		$data = array_merge($data, load_messages());
		
		$this->load->view('message', $data);
	}

	public function add_new_chat()
	{
		$post = $this->input->post();

		$create_chat = $this->member_model->create_chat($post['member_chat_id'], $this->session->login['id'], $post['new_chat']);

		if($create_chat != 0){
			$result['status'] = 1;
		} else{
			$result['status'] = 0;
		}

		echo json_encode($result);
	}

	public function load_profile_partner($member_chat_id)
	{
		$member_id = db_get_one_data('member_partner_id', 'member_chat', array('md5(member_chat_id)'=>$member_chat_id));
		if($member_id == $this->session->login['id']){
			$member_id = db_get_one_data('member_id', 'member_chat', array('md5(member_chat_id)'=>$member_chat_id));
		}
		$last_login = get_last_login(md5($member_id));
		$partner_detail = $this->member_model->data_member_md5(md5($member_id));
		$partner_detail['member_image'] = ($partner_detail['member_image'] ? $partner_detail['member_image'] : 'no-img-profil.png');

		$partner_detail_html = '<img class="img-circle" src="'.base_url().'uploadfiles/member-images/'.$partner_detail['member_image'].'" style="width: 100%;max-width: 50px;float: left;margin-right: 10px;">
			<h4>'.$partner_detail['member_name'].'</h4>
			<span style="float: left;">'.$last_login.'</span>';

		echo $partner_detail_html;
	}

	public function load_chat_message($member_chat_id)
	{
		$chat_message = $this->member_model->chat_message($member_chat_id);
		$chat_message_html = '';
		foreach ($chat_message as $chat) {
			if($chat['member_id'] == $this->session->login['id']){
				$chat_message_html .= '<div class="send_chat"><span>'.$chat['detail_chat'].'</span></div>';
			} else{
				$chat_message_html .= '<div class="receive_chat"><span>'.$chat['detail_chat'].'</span></div>';
				read_message($chat['detail_id']);
			}
		}

		echo $chat_message_html;
	}
}
