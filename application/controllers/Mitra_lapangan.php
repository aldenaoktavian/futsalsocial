<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mitra_lapangan extends CI_Controller {

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
		$id_mitra = $this->session->userdata('id_mitra');
		if ($id_mitra == '') {
			$this->load->view('mitra/mitra_login');	
		}
		else 
		{
			redirect('mitra_lapangan/profile_lapangan');
		}
		
	}

	public function login()
	{
		$email = $_POST['email'];
		$password = $_POST['password'];

		$this->load->model('M_mitra_lapangan');
		$data_login = $this->M_mitra_lapangan->do_login($email,$password);

		$row = count($data_login);
		if ($row > 0) 
		{

			foreach ($data_login as $key => $value) {
				$id_mitra = $value['id'];
				$email = $value['email'];
				$nama_lapangan = $value['nama_lapangan'];
			}

			$newdata = array(
		        'id_mitra'  => $id_mitra,
		        'email'     => $email,
		        'nama_lapangan' => $nama_lapangan
			);

			$this->session->set_userdata($newdata);
			redirect('mitra_lapangan/profile_lapangan');
		}
		else 
		{
			redirect('mitra_lapangan');
		}
	}	

	public function profile_lapangan() {

		$id_mitra = $this->session->userdata('id_mitra');

		$this->load->model('M_mitra_lapangan');
		$data_lapangan = $this->M_mitra_lapangan->get_data_lapangan($id_mitra);
		$varcontent['data_lapangan'] = $data_lapangan;

		$varcontent['view'] = 'profile_lapangan';	
		$this->load->view('mitra/template', $varcontent);
	}
	
}
