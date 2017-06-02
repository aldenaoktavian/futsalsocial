<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function header_member()
{
	$CI = get_instance();
	$CI->load->model('member_model');
	$dataMember = $CI->member_model->data_member($CI->session->login['id']);
	$data = array();
	$data['member_name'] = $dataMember['member_name'];
	$data['member_image'] = ($dataMember['member_image'] ? $dataMember['member_image'] : 'no-img-profil.png');
    return $data;
}