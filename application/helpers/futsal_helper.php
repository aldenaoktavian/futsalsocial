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
                        <div class="team_item">                  
                            <img class="img-circle" src="'.base_url().'uploadfiles/team-images/'.$team_image.'" alt=""/>  
                            <h2>'.$value['rangking'].'</h2>
                            <h5>'.$value['team_name'].'</h5>
                        </div>';
                        //echo var_dump($data_rangking[$count_all_rangking]).$i."---".$mod."---".$count_all_rangking;
			} else{
				$data_rangking[$count_all_rangking + 10] = $data_rangking[$count_all_rangking + 10].'<div class="team_item">                  
                            <img class="img-circle" src="'.base_url().'uploadfiles/team-images/'.$team_image.'" alt=""/>  
                            <h2>'.$value['rangking'].'</h2>
                            <h5>'.$value['team_name'].'</h5>
                        </div>
                    </div>';
			}
			$i++;
			$i20++;
		} else{
			$data_rangking[$count_all_rangking] = '<div class="sngl_team">   
                        <div class="team_item">                  
                            <img class="img-circle" src="'.base_url().'uploadfiles/team-images/'.$team_image.'" alt=""/>  
                            <h2>'.$value['rangking'].'</h2>
                            <h5>'.$value['team_name'].'</h5>
                        </div>
                        </div>';
			$i++;
			$i20++;
		}
		$count_all_rangking--;
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