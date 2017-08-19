<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_prelaunch extends CI_Model {

    public function insert_email($email)
    {
        $sql = "insert into email_list values (null,?,null)";     
        $query = $this->db->query($sql,array($email)); 
        return $query;
    }
	
}
