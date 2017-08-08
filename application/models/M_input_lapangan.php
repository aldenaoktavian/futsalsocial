<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_input_lapangan extends CI_Model {

    public function id_lapangan()
    {
            $sql = "SELECT id FROM lapangan ORDER BY id DESC LIMIT 1";

        $queryRec = $this->db->query($sql)->row_array();
        return $queryRec['id'];
    }

    public function save_lapangan($id,$nama,$deskripsi,$daerah,$kota,$nmfile)
    {
    	$sql =  'INSERT INTO lapangan(id, nama,deskripsi,daerah,kota,picture) values(?, ?, ?, ?, ?, ?)';       
        $query = $this->db->query($sql,array($id,$nama,$deskripsi,$daerah,$kota,$nmfile)); 
        return $query;
    }

	
}
