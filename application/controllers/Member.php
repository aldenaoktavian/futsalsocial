<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

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
		$this->load->view('halaman_utama');
	}

	public function register()
	{
		$this->load->view('register');
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function do_login()
	{
		$email = $_POST['email'];
		$password = $_POST['password'];

		$this->load->model('M_member');
		$data_login = $this->M_member->login($email,$password);
		$row = count($data_login);

		if ($row > 0) 
		{
			foreach ($data_login as $key => $value) {
				$id_user = $value['id_user'];
				$username = $value['username'];
				$email = $value['email'];
				$full_name = $value['fullname'];
				$picture = $value['picture'];
			}

			$newdata = array(
		        'id_user'  => $id_user,
		        'username'     => $username,
		        'email' => $email,
		        'full_name' => $full_name,
		        'picture' => $picture
			);

			$this->session->set_userdata($newdata);
			redirect('member/profile');
		}
		else
		{
			$this->load->view('login');
			$this->session->set_flashdata('msg', 'User tidak ditemukan');
		}
	}


	public function profile()
	{
		$this->load->view('profile_view');
	}

	public function do_register()
	{
		$email = $_POST['email'];
		$fullname = $_POST['fullname'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		$this->load->model('M_member');
		$status = $this->M_member->register($email,$fullname,$username,$password);
		$send_mail = $this->sendMail($email,$fullname);
		// echo $status;
		if ($send_mail == 'OK') {
			echo 'success';
		}
		else
		{
			echo "failed";
		}
		
	}

	public function sendMail($email,$fullname)
	{
		 $config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://srv28.niagahoster.com',
		'smtp_port' => 465,
		'smtp_user' => 'noreplay@futsalyuk.com', // change it to yours
		'smtp_pass' => 'hanyaaku1', // change it to yours
		'mailtype' => 'html',
		'charset' => 'iso-8859-1',
		'wordwrap' => TRUE
		);

		   // $msg = '<html>Halo '.$fullname.', Selamat Pendaftaran anda telah berhasil</html>';

		 $msg = "<html><div style='width:100%;background:#f8f8f8;padding:30px;text-align:center;'><h1>Selamat, Pedaftaran anda telah berhasil</h1></div></html>";

		   $this->load->library('email', $config);
		   $this->email->set_newline("\r\n");  
		   $this->email->from('noreplay@futsalyuk.com', 'Pendaftaran Futsalyuk'); // change it to yours
		   $this->email->to($email);// change it to yours
		   $this->email->subject('Pendaftaran Berhasil');
		   $this->email->message($msg);
		 if($this->email->send())
		 {
		   return 'OK';
		 }
		 else
		 {
		  show_error($this->email->print_debugger());
		 }

	}
}
