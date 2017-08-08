<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_booking extends CI_Model {

    public function total_hasil_lapangan($daerah,$tanggal,$jam,$durasi)
    {
            $sql = "SELECT count(*) as value
                FROM lapangan a
                LEFT JOIN tipe_lapangan b ON a.id = b.id_lapangan
                LEFT JOIN rating_lapangan c ON a.id = c.id_lapangan
                WHERE b.id_tipe NOT IN (SELECT id_tipe FROM status_lapangan WHERE tanggal = ? AND jam = ?)
                and daerah like '%' ? '%' or kota like '%' ? '%'
                GROUP BY nama";

        $queryRec = $this->db->query($sql,array($tanggal,$jam,$daerah,$daerah));
        return $queryRec;
    }

	public function search_lapangan($daerah,$tanggal,$jam,$durasi,$where='',$order='',$direction='',$start_limit='',$end_limit='')
	{
    		$sql = "SELECT a.id,a.nama,a.daerah,a.picture,b.id_tipe,
                (SELECT (SELECT SUM(rating_sum) FROM rating_lapangan WHERE id_lapangan = a.id)
                /(SELECT COUNT(*) FROM rating_lapangan WHERE id_lapangan = a.id)) AS rating,
                (SELECT tarif FROM tipe_lapangan WHERE id_lapangan = a.id ORDER BY tarif ASC LIMIT 1) AS harga_mulai
                FROM lapangan a
                LEFT JOIN tipe_lapangan b ON a.id = b.id_lapangan
                LEFT JOIN rating_lapangan c ON a.id = c.id_lapangan
                WHERE b.id_tipe NOT IN (SELECT id_tipe FROM status_lapangan WHERE tanggal = ? AND jam = ?)
                and (daerah LIKE '%' ? '%' OR kota LIKE '%' ? '%')";

                if(isset($where) && $where != '') {

                    $sql .= $where;
                }

                $sql .=  "GROUP BY nama ORDER BY ". $order."   ".$direction."  LIMIT ".$start_limit." , ".$end_limit." ";

        $queryRec = $this->db->query($sql,array($tanggal,$jam,$daerah,$daerah));
        return $queryRec;
	}

    public function search_lapangan_individu($id_lapangan)
    {
        $sql = "SELECT a.*,(SELECT (SELECT SUM(rating_sum) FROM rating_lapangan WHERE id_lapangan = a.id)
                /(SELECT COUNT(*) FROM rating_lapangan WHERE id_lapangan = a.id)) AS rating 
                FROM lapangan a where a.id = ?";
        $queryRec = $this->db->query($sql,array($id_lapangan))->result_array();
        return $queryRec;
    }
    public function search_tipe_lapangan($id_lapangan,$jam,$tanggal)
    {
        
        $sql = "SELECT a.*,CASE WHEN b.id_lapangan IS NULL THEN 0 ELSE 1 END AS status 
                FROM
                    (SELECT * FROM tipe_lapangan a 
                    WHERE id_lapangan = ?) a 
                LEFT JOIN 
                    (SELECT * FROM status_lapangan WHERE tanggal = ? AND jam = ?) b
                ON a.id_tipe = b.id_tipe";
        $queryRec = $this->db->query($sql,array($id_lapangan,$tanggal,$jam));
        return $queryRec;
    }

    public function booking_cart($id_tipe_lapangan)
    {
        $sql = "SELECT b.nama,b.daerah,b.id,a.* FROM tipe_lapangan a
        LEFT JOIN lapangan b ON b.id = a.id_lapangan
        WHERE id_tipe = ?";
        $queryRec = $this->db->query($sql,array($id_tipe_lapangan))->result_array();
        return $queryRec; 
    }

    public function insert_transaksi($id_user,$id_tipe,$tanggal,$jam,$total,$kode)
    {
        $sql = "insert into transaksi values (null,?,?,?,?,?,null,?)";
        $queryRec = $this->db->query($sql,array($id_user,$id_tipe,$tanggal,$jam,$total,$kode));
        return $queryRec; 
    }

    public function check_saldo($id_user)
    {
        $sql = "select coalesce(saldo,0) as saldo from user where id_user = ?";
        $queryRec = $this->db->query($sql,array($id_user))->row_array();
        return $queryRec['saldo']; 
    }
    public function potong_saldo($id_user)
    {
        $sql = "update user set saldo = 0 where id_user = ?";
        $queryRec = $this->db->query($sql,array($id_user));
        return $queryRec; 
    }
}
