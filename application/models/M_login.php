<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

    public function do_login($username,$password)
    {
            $sql = "SELECT * FROM user WHERE username = ? AND PASSWORD = ?";

        $queryRec = $this->db->query($sql,array($username,$password))->result_array();
        return $queryRec;
    }

	
}
