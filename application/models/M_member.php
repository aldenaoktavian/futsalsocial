<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_member extends CI_Model {

    public function register($email,$fullname,$username,$password)
    {
            // $sql = "SELECT * FROM user WHERE username = ? AND PASSWORD = ?";
    	$sql = "insert into user (username,email,password,fullname) values (?,?,?,?)";

        $queryRec = $this->db->query($sql,array($username,$email,$password,$fullname));
        return $queryRec;
    }

    public function login($email,$password)
    {
            $sql = "SELECT a.*, b.* FROM user a left join member_booking b on a.id_user = b.user_id WHERE email = ? AND password = ?";

        $queryRec = $this->db->query($sql,array($email,$password));
        return $queryRec->result_array();
    }

	
}
