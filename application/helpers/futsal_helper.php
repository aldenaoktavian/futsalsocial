<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function header_member()
{
	$CI = get_instance();
	$CI->load->model('member_model');
	$CI->load->model('notif_model');

	$dataMember = $CI->member_model->data_member($CI->session->login['id']);
	$data = array();
	$data['member_name'] = $dataMember['member_name'];
	$data['member_image'] = ($dataMember['member_image'] ? $dataMember['member_image'] : 'no-img-profil.png');

	$notif_updates = $CI->notif_model->notif_updates($CI->session->login['id']);
	$date_now = new DateTime();
	foreach ($notif_updates as $key => $value) {
		$date_created = new DateTime($value['notif_created']);
		$diff_notif = date_diff($date_created, $date_now);
		if($diff_notif->y != 0){
			$notif_updates[$key]['notif_time'] = $diff_notif->y." tahun yang lalu.";
		} else if($diff_notif->m != 0){
			$notif_updates[$key]['notif_time'] = $diff_notif->m." bulan yang lalu.";
		} else if($diff_notif->d != 0){
			$notif_updates[$key]['notif_time'] = $diff_notif->d." hari yang lalu.";
		} else if($diff_notif->h != 0){
			$notif_updates[$key]['notif_time'] = $diff_notif->h." jam yang lalu.";
		} else if($diff_notif->i != 0){
			$notif_updates[$key]['notif_time'] = $diff_notif->i." menit yang lalu.";
		} else if($diff_notif->s != 0){
			$notif_updates[$key]['notif_time'] = $diff_notif->s." detik yang lalu.";
		}
		$notif_updates[$key]['notif_detail'] = substr($value['notif_detail'], 0, 25);
		$notif_updates[$key]['notif_icon'] = ($value['notif_status'] == 0 ? '<i class="fa fa-circle"></i>' : '');
	}
	$data['notif_updates'] = $notif_updates;
	$data['count_notif_updates'] = $CI->notif_model->notif_updates_count($CI->session->login['id']);

    return $data;
}

function db_get_one_data($field, $table, $where)
{
	$CI = get_instance();
	$CI->db->select($field);
	$data = $CI->db->get_where($table, $where)->row_array();
	return $data[$field];
}