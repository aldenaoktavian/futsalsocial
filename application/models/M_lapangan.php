<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_lapangan extends CI_Model {

    public function cari_lapangan($daerah,$tanggal,$jam,$durasi,$lat,$lng)
    {
            //$sql = "SELECT * FROM user WHERE username = ? AND PASSWORD = ?";

        	// $sql = "SELECT a.id,a.nama,a.deskripsi,a.daerah,a.picture,b.id_tipe,
         //        ROUND((SELECT (SELECT SUM(rating_sum) FROM rating_lapangan WHERE id_lapangan = a.id)
         //        /(SELECT COUNT(*) FROM rating_lapangan WHERE id_lapangan = a.id)),1) AS rating,
         //        (SELECT tarif FROM tipe_lapangan WHERE id_lapangan = a.id ORDER BY tarif ASC LIMIT 1) AS harga_mulai
         //        FROM lapangan a
         //        LEFT JOIN tipe_lapangan b ON a.id = b.id_lapangan
         //        LEFT JOIN rating_lapangan c ON a.id = c.id_lapangan
         //        WHERE b.id_tipe NOT IN (SELECT id_tipe FROM status_lapangan WHERE tanggal = ? AND jam = ?)
         //        and (daerah LIKE '%' ? '%' OR kota LIKE '%' ? '%' OR nama LIKE '%' ? '%') 
         //        GROUP BY nama";

        // $sql = "SELECT a.id,a.nama,a.deskripsi,a.daerah,a.picture,b.id_tipe,
        //         ROUND((SELECT (SELECT SUM(rating_sum) FROM rating_lapangan WHERE id_lapangan = a.id)
        //         /(SELECT COUNT(*) FROM rating_lapangan WHERE id_lapangan = a.id)),1) AS rating,
        //         (SELECT tarif FROM tipe_lapangan WHERE id_lapangan = a.id ORDER BY tarif ASC LIMIT 1) AS harga_mulai
        //         FROM lapangan a
        //         LEFT JOIN tipe_lapangan b ON a.id = b.id_lapangan
        //         LEFT JOIN rating_lapangan c ON a.id = c.id_lapangan
        //         WHERE b.id_tipe NOT IN (SELECT id_tipe FROM status_lapangan WHERE tanggal = ? AND jam = ?)
        //         and (MATCH (daerah, kota, nama) AGAINST (?)) 
        //         GROUP BY nama";

            $sql = "SELECT  ( 3959 * ACOS( COS( RADIANS(?) ) * COS( RADIANS( lat ) ) * COS( RADIANS( `long` ) - RADIANS(?) ) 
                    + SIN( RADIANS(?) ) * SIN( RADIANS( lat ) ) ) ) AS distance, a.nama,a.id, a.deskripsi, a.daerah,a.picture,b.id_tipe,
                    ROUND((SELECT (SELECT SUM(rating_sum) FROM rating_lapangan WHERE id_lapangan = a.id)
                    /(SELECT COUNT(*) FROM rating_lapangan WHERE id_lapangan = a.id)),1) AS rating,
                    (SELECT tarif FROM tipe_lapangan WHERE id_lapangan = a.id ORDER BY tarif ASC LIMIT 1) AS harga_mulai
                    FROM lapangan a
                    LEFT JOIN tipe_lapangan b ON a.id = b.id_lapangan
                    LEFT JOIN rating_lapangan c ON a.id = c.id_lapangan
                    WHERE b.id_tipe NOT IN (SELECT id_tipe FROM status_lapangan WHERE tanggal = ? AND jam = ?)
                    GROUP BY a.nama
                    HAVING distance < 100 
                    ORDER BY distance LIMIT 0 , 20";


        $queryRec = $this->db->query($sql,array($lat,$lng,$lat,$tanggal,$jam));
        return $queryRec;
    }

    public function search_auto($query)
    {
    	$sql = "SELECT * FROM lapangan WHERE daerah LIKE '%' ? '%' OR kota LIKE '%' ? '%' OR nama LIKE '%' ? '%'";
    	$queryRec = $this->db->query($sql,array($query,$query,$query));
        return $queryRec;
    }
	
	public function data_lapangan($id)
	{
		$sql = "SELECT * FROM lapangan WHERE id = ?";
    	$queryRec = $this->db->query($sql,array($id))->result_array();
        return $queryRec;
	}

    public function detail_foto_single($id)
    {
        $sql = "SELECT * FROM foto_lapangan WHERE id_tipe_lapangan = ? limit 1";
        $queryRec = $this->db->query($sql,array($id));
        return $queryRec;
    }

    public function detail_foto($id)
    {
        $sql = "SELECT * FROM foto_lapangan WHERE id_tipe_lapangan = ?";
        $queryRec = $this->db->query($sql,array($id));
        return $queryRec;
    }

    public function love_lapangan($id)
    {
        $sql = "SELECT COUNT(*) AS love FROM love_lapangan WHERE id_lapangan = ?";
        $queryRec = $this->db->query($sql,array($id))->row_array();
        return $queryRec['love'];
    }

    public function jumlah_review($id)
    {
        $sql = "SELECT COUNT(*) AS review FROM review_lapangan WHERE id_lapangan = ?";
        $queryRec = $this->db->query($sql,array($id))->row_array();
        return $queryRec['review'];
    }

    public function review_lapangan($id)
    {
        $sql = "SELECT a.*,c.rating_sum,b.fullname,b.picture FROM review_lapangan a 
                LEFT JOIN user b ON a.id_user = b.id_user 
                LEFT JOIN rating_lapangan c ON a.id = c.id_review WHERE a.id_lapangan = ?";
        $queryRec = $this->db->query($sql,array($id));
        return $queryRec;
    }

    public function insert_review($id_user, $id_lapangan, $food, $penjaga, $keamanan, $fasilitas, $kelebihan, $kekurangan) 
    {
        $sql = "insert into review_lapangan values (null,?,?,?,?,?,?,?,?)";     
        $query = $this->db->query($sql,array($id_user, $id_lapangan, $kelebihan, $kekurangan, $food, $penjaga, $keamanan, $fasilitas)); 
        return $query;
    }
}
