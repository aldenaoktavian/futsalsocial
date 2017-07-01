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
	$data['member_banner'] = ($dataMember['member_banner'] ? $dataMember['member_banner'] : 'no-banner.jpg');

    return array_merge($data, notif_list());
}

function get_long_time($selected_date)
{
	$date_now = new DateTime();
	$selected_date = new DateTime($selected_date);
	$diff_time = date_diff($selected_date, $date_now);
	if($diff_time->y != 0){
		$long_time = $diff_time->y." tahun yang lalu";
	} else if($diff_time->m != 0){
		$long_time = $diff_time->m." bulan yang lalu";
	} else if($diff_time->d != 0){
		$long_time = $diff_time->d." hari yang lalu";
	} else if($diff_time->h != 0){
		$long_time = $diff_time->h." jam yang lalu";
	} else if($diff_time->i != 0){
		$long_time = $diff_time->i." menit yang lalu";
	} else if($diff_time->s != 0){
		$long_time = $diff_time->s." detik yang lalu";
	} else{
		$long_time = '';
	}
	return $long_time;
}

function notif_list($member_id=0)
{
	$CI = get_instance();

	$CI->load->model('notif_model');

	if($member_id == 0){
		$member_id = $CI->session->login['id'];
	}

	$notif_updates = $CI->notif_model->all_notif($member_id, 0, 5);
	
	foreach ($notif_updates as $key => $value) {
		$notif_updates[$key]['notif_time'] = get_long_time($value['notif_created']);
		$notif_updates[$key]['notif_detail'] = substr($value['notif_detail'], 0, 25);
		$notif_updates[$key]['notif_icon'] = ($value['notif_status'] == 0 ? '<i class="fa fa-circle"></i>' : '');
		$notif_updates[$key]['notif_url'] = $value['notif_url'].'/'.md5($value['notif_id']);
	}
	$data['notif_updates'] = $notif_updates;
	$data['count_notif_updates'] = $CI->notif_model->notif_updates_count($member_id);

	return $data;
}

function team_rank()
{
	$CI = get_instance();
	$CI->load->model('team_model');

	$all_rangking = $CI->team_model->all_rangking(0, 40);
	$count_all_rangking = count($all_rangking);
	$data_rangking = array();
	$i = 1;
	$i20 = 1;
	/*$bagi_count_all_rangking = (int)($count_all_rangking / 10);
	$sisa_count_all_rangking = (int)($count_all_rangking - (10 * $bagi_count_all_rangking));*/
	$rangking = 1;
	foreach ($all_rangking as $key => $value) {
		$team_image = ($value['team_image'] ? $value['team_image'] : 'no-img-profil.png');

		$i = ($i == 11 ? 1 : $i);
		$i20 = ($i20 == 21 ? 1 : $i20);

		if($i20 > 10){
			$mod = 1;
		} else{
			$mod = 0;
		}

		if($i20 == 1){
			$bagi_count_all_rangking = (int)($count_all_rangking / 20);
			$part_rangking = ($bagi_count_all_rangking > 0 ? 10 : $count_all_rangking - 10);
		}
		
		if($i <= $part_rangking){
			if($mod == 0){
				$data_rangking[$count_all_rangking] = '<div class="sngl_team">   
                        <a href="'.base_url().'team/profile/'.md5($value['team_id']).'" class="url-color"><div class="team_item">                  
                            <img class="img-circle" src="'.base_url().'uploadfiles/team-images/'.$team_image.'" alt=""/>  
                            <h2>'.$rangking.'</h2>
                            <a href="'.base_url().'team/profile/'.md5($value['team_id']).'"><h5>'.$value['team_name'].'</h5></a>
                        </div></a>';
                        //echo var_dump($data_rangking[$count_all_rangking]).$i."---".$mod."---".$count_all_rangking;
			} else{
				$data_rangking[$count_all_rangking + 10] = $data_rangking[$count_all_rangking + 10].'<a href="'.base_url().'team/profile/'.md5($value['team_id']).'" class="url-color"><div class="team_item">                  
                            <img class="img-circle" src="'.base_url().'uploadfiles/team-images/'.$team_image.'" alt=""/>  
                            <h2>'.$rangking.'</h2>
                            <a href="'.base_url().'team/profile/'.md5($value['team_id']).'"><h5>'.$value['team_name'].'</h5></a>
                        </div></a>
                    </div>';
			}
			$i++;
			$i20++;
		} else{
			$data_rangking[$count_all_rangking] = '<div class="sngl_team">   
                        <a href="'.base_url().'team/profile/'.md5($value['team_id']).'" class="url-color"><div class="team_item">                  
                            <img class="img-circle" src="'.base_url().'uploadfiles/team-images/'.$team_image.'" alt=""/>  
                            <h2>'.$rangking.'</h2>
                            <h5>'.$value['team_name'].'</h5>
                        </div></a>
                        </div>';
			$i++;
			$i20++;
		}
		$count_all_rangking--;
		$rangking++;
	}
	$data['data_rangking'] = implode(' ', $data_rangking);
	$data['count_all_rangking'] = count($all_rangking);

	return $data;
}

function db_get_one_data($field, $table, $where)
{
	$CI = get_instance();
	$CI->db->select($field);
	$data = $CI->db->get_where($table, $where)->row_array();
	return $data[$field];
}

function header_team()
{
	$CI = get_instance();
	$data['url_team_id'] = md5($CI->session->login['team_id']);
	return $data;
}

function team_challenge_log($challenge_id, $note='')
{
	$CI = get_instance();
	$CI->load->model('team_model');

	$new_challenge_id = db_get_one_data('challenge_id', 'team_challenge', array('md5(challenge_id)' => $challenge_id));
	$data = array(
			'challenge_id'	=> $new_challenge_id,
			'modify_by'		=> $CI->session->login['id'],
			'modify_date'	=> date('Y-m-d H:i:s')
		);
	if($note != ''){
	    $data['note'] = $note;
	}

	$insert_log = $CI->team_model->challenge_log($data);

	return $insert_log;
}

function member_profile()
{
	$CI = get_instance();
	$CI->load->model('team_model');

	$data_team = $CI->team_model->data_team(md5($CI->session->login['team_id']));
	$data['team_name'] = $data_team['team_name'];

	return $data;
}

function saveNotif($data_notif, $arr_desc, $notif_receiver)
{
	$CI = get_instance();

	$CI->load->model('notif_model');

	$type_desc = db_get_one_data('notif_type_detail', 'notif_type', array('	notif_type_id'=>$data_notif['notif_type']));

	$notif_desc = $type_desc;
	if($arr_desc != ''){
		for($i=0; $i < sizeof($arr_desc); $i++){
			$notif_desc = str_replace('{'.$arr_desc[$i]['name'].'}', $arr_desc[$i]['value'], $notif_desc);
		}
	}

	$i = 0;
	foreach($notif_receiver as $data_member){
		$data_add_notif = array(
				'member_id'		=> $data_member['member_id'],
				'notif_type'	=> $data_notif['notif_type'],
				'notif_detail'	=> $notif_desc,
				'notif_url'		=> $data_notif['notif_url'],
				'notif_status'	=> (isset($data_notif['notif_status']) ? $data_notif['notif_status'] : 0),
				'notif_created'	=> date('Y-m-d H:i:s'),
				'notif_show'	=> (isset($data_notif['notif_show']) ? $data_notif['notif_show'] : 0)
			);

		$add_notif = $CI->notif_model->add_notif($data_add_notif);
		if($add_notif != 0){
			$result['message'] = "sukses";
			$new_notif_updates_count = $CI->notif_model->notif_updates_count($data_member['member_id']);
			$detail_notif = $CI->notif_model->data_notif(md5($add_notif));
			$detail_notif['notif_url'] = $detail_notif['notif_url'].'/'.md5($detail_notif['notif_id']);
			$_SESSION['data_socket'][$i] = array_merge($detail_notif, array('new_notif_updates_count'=>$new_notif_updates_count));
			$_SESSION['new_notif_updates_count'] = json_encode(array('jml'=>$new_notif_updates_count, 'member_id'=>$data_member['member_id']));

			$i++;
		} else{
			$result['message'] = "gagal";
		}
	}
	$_SESSION['data_socket'] = json_encode($_SESSION['data_socket']);

	return $result;
}

function read_notif($id)
{
	$CI = get_instance();

	$CI->load->model('notif_model');

	$dataedit = array(
			'notif_status'	=> 1
		);
	$CI->notif_model->update_data_notif($id, $dataedit);

	$_SESSION['new_notif_updates_count'] = json_encode(array('jml'=>$CI->notif_model->notif_updates_count($CI->session->login['id']), 'member_id'=>$CI->session->login['id']));
}

function new_notif_updates_count()
{
	$CI = get_instance();

	$CI->load->model('notif_model');

	$_SESSION['new_notif_updates_count'] = json_encode($CI->notif_model->notif_updates_count($CI->session->login['id']));
}