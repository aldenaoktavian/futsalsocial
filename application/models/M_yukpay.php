<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_yukpay extends CI_Model {

    public function check_code($tanggal)
    {
            $sql = "SELECT IFNULL(kode_transaksi,0) `code` FROM transfer_yukpay WHERE tanggal = ?";

        $queryRec = $this->db->query($sql,array($tanggal))->row_array();
        return $queryRec;
    }

    function insert_topup($tanggal,$id_user,$atas_nama,$no_rekening,$nominal,$bank,$status,$kode_transaksi)
    {

    }

	
}
