<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_booking extends CI_Controller {

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

	}

	public function search_lapangan()
	{
		$varcontent['daerah'] = $_GET['txt_daerah'];
		$varcontent['tanggal'] = $_GET['txt_tanggal'];
		$varcontent['jam'] = $_GET['txt_jam'];
		$varcontent['durasi'] = $_GET['txt_durasi'];
		$varcontent['judul'] = "Lapangan Futsal Murah di Kota ".ucfirst($_GET['txt_daerah']);
		$varcontent['content'] = "pages/content_booking";
		$this->load->view('layout/header_booking',$varcontent);
	}

	function load_lapangan()
	{
		$this->load->model('M_booking');

		$daerah = $_POST['daerah'];
		$tanggal = $_POST['tanggal'];
		$jam = $_POST['jam'];
		$durasi = $_POST['durasi'];

		$sort = $_POST['sort'];

		if ($sort == '') 
		{
			$sort_column = "harga_mulai";
			$sort_mode = "asc";
		}
		else if ($sort == 'tinggi') 
		{
			$sort_column = "harga_mulai";
			$sort_mode = "desc";
		}
		else if ($sort == 'rating') 
		{
			$sort_column = "rating";
			$sort_mode = "desc";
		}



		$params = $columns = $totalRecords = $data = array();

			$params = $_REQUEST;

			//define index of column
			
				$columns = array( 
					0 =>'nama',
					1 =>'daerah', 
					2 => 'picture',
					3 => 'id_tipe',
					4 => 'rating',
					5 => 'harga_mulai'
				);

				$where = "";

				// check search value exist
				if( !empty($params['search']['value']) ) {   
					
					$where .="and a.nama LIKE '".$params['search']['value']."%'";   
				}
			
			
			$queryTot = $this->M_booking->total_hasil_lapangan($daerah,$tanggal,$jam,$durasi);
		 	foreach( $queryTot->result_array() as $row ) { 
				$totalRecords = $row['value'];
			}

				$queryRecords = $this->M_booking->search_lapangan($daerah,$tanggal,$jam,$durasi,$where, $sort_column, $sort_mode,$params['start'],$params['length']);
				

				//iterate on results row and create new index array of data
				$i=0;
				foreach( $queryRecords->result_array() as $row) { 
					$data[$i]['nama']['first'] = $row['nama']; 
					$data[$i]['daerah']['first']= $row['daerah']; 
					$data[$i]['picture']['first']= $row['picture']; 
					$data[$i]['id_tipe']['first']= $row['id_tipe'];
					$data[$i]['rating']['first']= $row['rating'];
					$data[$i]['harga_mulai']['first']= $row['harga_mulai'];
					$data[$i]['id']['first']= $row['id'];
					$i++;
				}	

			$json_data = array(
					"draw"            => intval( $params['draw'] ),   
					"recordsTotal"    => intval( $totalRecords ),  
					"recordsFiltered" => intval($totalRecords),
					"data"            => $data   // total data array
					);

			echo json_encode($json_data);

		
		
	}

	function view_lapangan()
	{
		$id_lapangan = $this->uri->segment(3);
		$jam = $this->uri->segment(4);
		$tanggal = $this->uri->segment(5);

		$this->load->model('M_booking');
		$varcontent['data_lapangan'] = $this->M_booking->search_lapangan_individu($id_lapangan);
		$varcontent['data_tipe_lapangan'] = $this->M_booking->search_tipe_lapangan($id_lapangan,$jam,$tanggal);
		$varcontent['content'] = "pages/halaman_lapangan";
		$varcontent['id_lapangan'] = $id_lapangan;
		$varcontent['jam'] = $jam;
		$varcontent['tanggal'] = $tanggal;
		$this->load->view('layout/header_booking',$varcontent);
	}

	function booking_lapangan()
	{
		$id_tipe_lapangan = $this->uri->segment(3);
		$jam = $this->uri->segment(4);
		$tanggal = $this->uri->segment(5);
		
		$this->load->model('M_booking');
		$varcontent['data_tipe_lapangan'] = $this->M_booking->booking_cart($id_tipe_lapangan);
		$varcontent['content'] = "pages/detail_pemesanan";
		//$varcontent['id_lapangan'] = $id_lapangan;
		$varcontent['jam'] = $jam;
		$varcontent['tanggal'] = $tanggal;
		$this->load->view('layout/header_booking',$varcontent);

		
	}

	function metode_pembayaran()
	{	
		
		$newdata = array(
        // 'username'  => '',
        // 'email'     => '',
        // 'logged_in' => TRUE
			'id_tipe' => $_POST['txt_id_tipe'],
			'tanggal' => $_POST['txt_tanggal'],
			'jam' => $_POST['txt_jam'],
			'total' => $_POST['txt_total']
		);

		$this->session->set_userdata($newdata);

		$userid = $this->session->userdata('id_user');
		if ($userid == '') 
		{
			$varcontent['method'] = 'login_before';
			$varcontent['content'] = "pages/login_view";
			$this->load->view('layout/header_booking',$varcontent);
		}
		else
		{
			$id_user = $this->session->userdata('id_user');
			$id_tipe = $this->session->userdata('id_tipe');
			$tanggal = $this->session->userdata('tanggal');
			$jam = $this->session->userdata('jam');
			$total = $this->session->userdata('total');


			$this->load->model('M_booking');
			//$this->M_booking->insert_transaksi($id_user,$id_tipe,$tanggal,$jam,$total);
			$varcontent['data_tipe_lapangan'] = $this->M_booking->booking_cart($id_tipe);
			$varcontent['jam'] = $jam;
			$varcontent['tanggal'] = $tanggal;
			
			$varcontent['content'] = "pages/pembayaran";
			$this->load->view('layout/header_booking',$varcontent);
		}
	}

	function pembayaran()
	{
		
		
		$id_user = $this->session->userdata('id_user');
		$id_tipe = $this->session->userdata('id_tipe');
		$tanggal = $this->session->userdata('tanggal');
		$jam = $this->session->userdata('jam');
		$total = $this->session->userdata('total');


		$this->load->model('M_booking');
		$this->M_booking->insert_transaksi($id_user,$id_tipe,$tanggal,$jam,$total);
		$varcontent['data_tipe_lapangan'] = $this->M_booking->booking_cart($id_tipe);
		$varcontent['jam'] = $jam;
		$varcontent['tanggal'] = $tanggal;
		$varcontent['pembayaran'] = $pembayaran;
		$varcontent['content'] = "pages/pembayaran";
		$this->load->view('layout/header_booking',$varcontent);
	}

	function konfirmasi_pembayaran()
	{
		$id_user = $this->session->userdata('id_user');
		$id_tipe = $this->session->userdata('id_tipe');
		$tanggal = $this->session->userdata('tanggal');
		$jam = $this->session->userdata('jam');
		$total = $this->session->userdata('total');

		$this->load->model('M_booking');

		$saldo = $this->M_booking->check_saldo($id_user);
		if ($saldo == 0) {
			echo "Anda Tidak Mempunyai Saldo yang Cukup";
		}
		else
		{

			$kode_booking = date("Y.m.d");
			$kode_booking = $kode_booking.date("h:i:sa");
			$kode_booking = $kode_booking.$id_user.$tanggal;
			$kode_booking = md5($kode_booking);
			$kode_booking = substr($kode_booking, 0,5);
			
			$this->M_booking->insert_transaksi($id_user,$id_tipe,$tanggal,$jam,$total,$kode_booking);
			$varcontent['data_tipe_lapangan'] = $this->M_booking->booking_cart($id_tipe);
			$this->M_booking->potong_saldo($id_user);
			$varcontent['jam'] = $jam;
			$varcontent['tanggal'] = $tanggal;

			$varcontent['invoice_date'] = date("Y/m/d");
			$varcontent['kode_booking'] = $kode_booking;
			$varcontent['content'] = "pages/invoice";
			$this->load->view('layout/header_booking',$varcontent);
		}

		
	}

	function proceed_review () {
		$this->load->view('confirmation');
	}
}
