<?php	
if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Lapangan_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}

	function data_lap($id_tipe)
	{
		$query = $this->db->query("SELECT id_lapangan, id_tipe, nama_tipe, tarif, a.deskripsi AS tipe_deskripsi, a.picture AS tipe_picture, b.nama AS nama_lapangan, b.deskripsi AS lapangan_deskripsi, daerah, kota, b.picture AS lapangan_picture FROM tipe_lapangan a INNER JOIN lapangan b ON a.id_lapangan = b.id WHERE md5(id_tipe) = '".$id_tipe."'");
		return $query->row_array();
	}

	function search_area()
	{
		$query = $this->db->query("SELECT nama AS value_search FROM lapangan 
									UNION
									SELECT kota AS value_search FROM lapangan 
									UNION
									SELECT ( CONCAT(daerah, ' - ', kota) ) AS value_search FROM lapangan");
		return $query->result_array();
	}

	function count_search_lap($area, $date, $starttime, $endtime)
	{
		$query = $this->db->query("SELECT count(*) AS jml FROM tipe_lapangan a INNER JOIN lapangan b ON a.id_lapangan = b.id WHERE ( b.nama LIKE '%".$area."%' OR b.daerah LIKE '%".$area."%' OR b.kota LIKE '%".$area."%' ) AND a.id_tipe NOT IN ( SELECT id_tipe FROM transaksi_challenge WHERE (( tanggal = '".$date."' AND start_time = '".$starttime."' ) OR ( end_time = '".$endtime."' )) AND transaksi_challenge_status = 0 )");
		return $query->row_array();
	}

	function get_search_lap($area, $date, $starttime, $endtime, $limit)
	{
		$query = $this->db->query("SELECT id_lapangan, id_tipe, nama_tipe, tarif, a.deskripsi AS tipe_deskripsi, a.picture AS tipe_picture, b.nama AS nama_lapangan, b.deskripsi AS lapangan_deskripsi, daerah, kota, b.picture AS lapangan_picture FROM tipe_lapangan a INNER JOIN lapangan b ON a.id_lapangan = b.id WHERE ( b.nama LIKE '%".$area."%' OR b.daerah LIKE '%".$area."%' OR b.kota LIKE '%".$area."%' ) AND a.id_tipe NOT IN ( SELECT id_tipe FROM transaksi_challenge WHERE (( tanggal = '".$date."' AND start_time = '".$starttime."' ) OR ( end_time = '".$endtime."' )) AND transaksi_challenge_status = 0 ) LIMIT ".$limit.",2");
		return $query->result_array();
	}

	function count_all_available_lap()
	{
		$query = $this->db->query("SELECT count(*) AS jml FROM tipe_lapangan a INNER JOIN lapangan b ON a.id_lapangan = b.id WHERE a.id_tipe NOT IN ( SELECT id_tipe FROM transaksi_challenge WHERE transaksi_challenge_status = 0 )");
		return $query->row_array();
	}

	function all_available_lap($limit)
	{
		$query = $this->db->query("SELECT id_lapangan, id_tipe, nama_tipe, tarif, a.deskripsi AS tipe_deskripsi, a.picture AS tipe_picture, b.nama AS nama_lapangan, b.deskripsi AS lapangan_deskripsi, daerah, kota, b.picture AS lapangan_picture FROM tipe_lapangan a INNER JOIN lapangan b ON a.id_lapangan = b.id WHERE a.id_tipe NOT IN ( SELECT id_tipe FROM transaksi_challenge WHERE transaksi_challenge_status = 0 ) LIMIT ".$limit.",2");
		return $query->result_array();
	}

	function add_booking($data)
	{
		$this->db->insert('transaksi_challenge', $data);
		return $this->db->insert_id();
	}

}
?>