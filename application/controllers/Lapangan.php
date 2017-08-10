<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapangan extends CI_Controller {

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
		$id = $_GET['id'];
		$tanggal = $_GET['tanggal'];
		$jam = $_GET['jam'];
		$durasi = $_GET['durasi'];
		$nama = $_GET['nama'];
		$rating = $_GET['rating'];
		$nama = str_replace("%20", " ", $nama);

		$this->load->model('M_lapangan');
		$queryRecords = $this->M_lapangan->data_lapangan($id);

		foreach ($queryRecords as $key => $value) {
				$alamat = $value['daerah'];
				$kota = $value['kota'];
			}
		$varcontent['alamat'] = $alamat;
		$varcontent['kota'] = $kota;
		

		$varcontent['id'] = $id;
		$varcontent['tanggal'] = $tanggal;
		$varcontent['jam'] = $jam;
		$varcontent['durasi'] = $durasi;
		$varcontent['nama'] = $nama;
		$varcontent['rating'] = $rating;

		$this->load->view('halaman_lapangan',$varcontent);
	}

	public function show_lapangan()
	{
		$this->load->model('M_lapangan');


		$daerah = $_POST['daerah'];
		$tanggal = $_POST['tanggal'];
		$jam = $_POST['jam'];
		$durasi = $_POST['durasi'];

		$queryRecords = $this->M_lapangan->cari_lapangan($daerah,$tanggal,$jam,$durasi);
				

				//iterate on results row and create new index array of data
				$data['lapangan']= array();
				$i=0;
				foreach( $queryRecords->result_array() as $row) { 
					// $data[$i]['nama']= $row['nama']; 
					// $data[$i]['daerah']= $row['daerah']; 
					// $data[$i]['picture']= $row['picture']; 
					// $data[$i]['id_tipe']= $row['id_tipe'];
					// $data[$i]['rating']= $row['rating'];
					// $data[$i]['harga_mulai']= $row['harga_mulai'];
					// $data[$i]['id']= $row['id'];
					$data['lapangan'][$i] = $row;
					$i++;
				}	
		// $json_data = array(
		// 			"data"            => $data   // total data array
		// 			);

		echo json_encode($data);
	}

	public function show($nama='',$id='',$tanggal='',$jam='',$durasi='',$rating='')
	{
		// $id = $_GET['id'];
		// $tanggal = $_GET['tanggal'];
		// $jam = $_GET['jam'];
		// $durasi = $_GET['durasi'];
		// $nama = $_GET['nama'];
		// $rating = $_GET['rating'];
		$nama = str_replace("%20", " ", $nama);

		$this->load->model('M_lapangan');
		$this->load->model('M_booking');
		$queryRecords = $this->M_lapangan->data_lapangan($id);

		foreach ($queryRecords as $key => $value) {
				$alamat = $value['daerah'];
				$kota = $value['kota'];
				$lat = $value['lat'];
				$long = $value['long'];
				$picture = $value['picture'];
				$deskripsi = $value['deskripsi'];
			}

		$photo = $this->M_lapangan->detail_foto($id);
		$photo_single = $this->M_lapangan->detail_foto_single($id);
		$love_lapangan = $this->M_lapangan->love_lapangan($id);
		$jumlah_review = $this->M_lapangan->jumlah_review($id);

		$varcontent['data_tipe_lapangan'] = $this->M_booking->search_tipe_lapangan($id,$jam,$tanggal);
		
		$varcontent['photo_single'] = $photo_single;
		$varcontent['photo'] = $photo;
		$varcontent['love_lapangan'] = $love_lapangan;
		$varcontent['jumlah_review'] = $jumlah_review;
		$varcontent['alamat'] = $alamat;
		$varcontent['kota'] = $kota;
		$varcontent['lat'] = $lat;
		$varcontent['long'] = $long;
		$varcontent['picture'] = $picture;
		
		$varcontent['deskripsi'] = $deskripsi;
		$varcontent['id'] = $id;
		$varcontent['tanggal'] = $tanggal;
		$varcontent['jam'] = $jam;
		$varcontent['durasi'] = $durasi;
		$varcontent['nama'] = $nama;
		$varcontent['rating'] = $rating;

		$this->load->view('halaman_lapangan',$varcontent);
	}

	public function detail_foto()
	{
		$this->load->model('M_lapangan');

		$id_lapangan = $_POST['id_lapangan'];

		$queryRecords = $this->M_lapangan->detail_foto($id_lapangan);
				

				//iterate on results row and create new index array of data
				$data['detail_foto']= array();
				$i=0;
				foreach( $queryRecords->result_array() as $row) { 
					// $data[$i]['nama']= $row['nama']; 
					// $data[$i]['daerah']= $row['daerah']; 
					// $data[$i]['picture']= $row['picture']; 
					// $data[$i]['id_tipe']= $row['id_tipe'];
					// $data[$i]['rating']= $row['rating'];
					// $data[$i]['harga_mulai']= $row['harga_mulai'];
					// $data[$i]['id']= $row['id'];
					$data['detail_foto'][$i] = $row;
					$i++;
				}	
		// $json_data = array(
		// 			"data"            => $data   // total data array
		// 			);

		echo json_encode($data);
	}

	public function review_lapangan()
	{
		$this->load->model('M_lapangan');

		$id_lapangan = $_POST['id_lapangan'];

		$queryRecords = $this->M_lapangan->review_lapangan($id_lapangan);
				

				//iterate on results row and create new index array of data
				$data['review_lapangan']= array();
				$i=0;
				foreach( $queryRecords->result_array() as $row) { 
					// $data[$i]['nama']= $row['nama']; 
					// $data[$i]['daerah']= $row['daerah']; 
					// $data[$i]['picture']= $row['picture']; 
					// $data[$i]['id_tipe']= $row['id_tipe'];
					// $data[$i]['rating']= $row['rating'];
					// $data[$i]['harga_mulai']= $row['harga_mulai'];
					// $data[$i]['id']= $row['id'];
					$data['review_lapangan'][$i] = $row;
					$i++;
				}	
		// $json_data = array(
		// 			"data"            => $data   // total data array
		// 			);

		echo json_encode($data);
	}

	public function send_review ()
	{
		$food = $_POST['food'];
		$penjaga = $_POST['penjaga'];
		$keamanan = $_POST['keamanan'];
		$fasilitas = $_POST['fasilitas'];
		$kelebihan = $_POST['kelebihan'];
		$kekurangan = $_POST['kekurangan'];
		$id_lapangan = $_POST['id_lapangan'];
		$id_user = $this->session->userdata('id_user');


		$this->load->model('M_lapangan');
		$queryRecords = $this->M_lapangan->insert_review($id_user, $id_lapangan, $food, $penjaga, $keamanan, $fasilitas, $kelebihan, $kekurangan);

		if ($queryRecords) {
			echo "OK";
		}
		else
		{
			echo "FAIL";
		}

	} 
}
