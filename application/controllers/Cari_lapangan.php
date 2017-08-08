<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cari_lapangan extends CI_Controller {

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
		$daerah = $_GET['daerah'];
		$tanggal = $_GET['tanggal'];
		$jam = $_GET['jam'];
		$durasi = $_GET['durasi'];
		$lat = $_GET['lat'];
		$lng = $_GET['lng'];

		$varcontent['daerah'] = $daerah;
		$varcontent['tanggal'] = $tanggal;
		$varcontent['jam'] = $jam;
		$varcontent['durasi'] = $durasi;

		$varcontent['lat'] = $lat;
		$varcontent['lng'] = $lng;

		// $newdata = array(
		//         'username'  => '',
		//         'email'     => 'johndoe@some-site.com',
		//         'logged_in' => TRUE,
		//         'picture'   => ''
		// );

		// $this->session->set_userdata($newdata);

		$this->load->view('result_lapangan',$varcontent);
	}

	public function show_lapangan()
	{
		$this->load->model('M_lapangan');


		$daerah = $_POST['daerah'];
		$tanggal = $_POST['tanggal'];
		$jam = $_POST['jam'];
		$durasi = $_POST['durasi'];
		$lat = $_POST['lat'];
		$lng = $_POST['lng'];

		$queryRecords = $this->M_lapangan->cari_lapangan($daerah,$tanggal,$jam,$durasi,$lat,$lng);
				

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

	public function autocomplete_pencarian()
	{
		if(isset($_GET["term"]))  
		 {  

		 	  $query = $_GET["term"];
		        
		      $this->load->model('M_lapangan');
		      $queryRecords = $this->M_lapangan->search_auto($query);
		      $json = array();
			
		      foreach( $queryRecords->result_array() as $row) { 
		        
		  //     	$json[] = array(
				// 	'label' => $row["daerah"].' - '.$row["kota"], // text sugesti saat user mengetik di input box
				// 	'value' => $row["daerah"], // nilai yang akan dimasukkan diinputbox saat user memilih salah satu sugesti
				// 	'nama' => $row['nama']
				// );
				$options['myData'][] = array(
			        'value' => $row["daerah"],
			        'title' => $row["daerah"].' - '.$row["kota"].'-'.$row["nama"]
			    ); 

		      } 
		      
		      echo json_encode($options);  
		 }
	}
}
