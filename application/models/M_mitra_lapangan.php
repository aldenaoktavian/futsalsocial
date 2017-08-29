<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mitra_lapangan extends CI_Model {

    public function do_login($email,$password)
    {
            $sql = "SELECT * FROM user_mitra_lapangan WHERE email = ? AND PASSWORD = ?";

        $queryRec = $this->db->query($sql,array($email,$password))->result_array();
        return $queryRec;
    }

    public function get_data_lapangan($id_mitra)
    {
            $sql = "SELECT * FROM lapangan WHERE id_mitra = ? ";

        $queryRec = $this->db->query($sql,array($id_mitra))->result_array();
        return $queryRec;
    }

	
}
