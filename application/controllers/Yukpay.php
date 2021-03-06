<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yukpay extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $id_user = $this->session->userdata('id_user');

        if ($id_user != "") {
            $this->load->view('yukpay');
        } else {
            $this->load->view('login');
        }
	}

	public function topup()
	{
		$this->load->model('M_yukpay');
		$month=date("m");
		$year=date("Y");
		$day= date("d");
		$tanggal = $year.'-'.$month.'-'.$day;
		$kode = $this->M_yukpay->check_code($tanggal);
		$kode_transaksi = 1;

		$id_user = $this->session->userdata('id_user');
		$atas_nama = $_POST['atas_nama'];
		$no_rekening = $_POST['nomor_rekening'];
		$nominal = $_POST['nominal'];
		$bank = $_POST['bank'];
		$status = 0;

		if (count($kode) >= 1) {
			$kode_transaksi = $kode['code'];
			$kode_transaksi = $kode_transaksi+1;
			$insert = $this->M_yukpay->insert_topup($tanggal,$id_user,$atas_nama,$no_rekening,$nominal,$bank,$status,$kode_transaksi);
		}
		else
		{
			$insert = $this->M_yukpay->insert_topup($tanggal,$id_user,$atas_nama,$no_rekening,$nominal,$bank,$status,$kode_transaksi);
		}
	}
	
}
