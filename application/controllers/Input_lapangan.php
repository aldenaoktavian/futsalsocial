<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input_lapangan extends CI_Controller {

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

	public function __construct() {
        parent::__construct();
        
        $this->load->helper(array('url')); //load helper url 
    }

	public function index()
	{
		$this->load->model('M_input_lapangan');
		$id = $this->M_input_lapangan->id_lapangan();
		


		$date_now="LP".date("ym");
		$date_last = substr($id, 0,6);

		if ($date_now != $date_last) 
		{
			$varcontent['id'] = $date_now.'001';
		}
		else
		{
			$id_last = substr($id, 6,3);
			$id_last = str_pad($id_last+1, 3, '0', STR_PAD_LEFT);
			$varcontent['id'] = $date_last.$id_last;
		}

		
		$this->load->view('halaman_input_lapangan',$varcontent);
	}

	public function save_lapangan()
	{
		$id = $_POST['id_lapangan'];
		$nama = $_POST['nama'];
		$deskripsi = $_POST['deskripsi'];
		$daerah = $_POST['daerah'];
		$kota = $_POST['kota'];


		

		

        $nmfile = "assets/img/lapangan/file_".time().".jpg"; //nama file + fungsi time
        $config['upload_path'] = './assets/img/lapangan/'; //Folder untuk menyimpan hasil upload
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '10000'; //maksimum besar file 3M
        // $config['max_width']  = '5000'; //lebar maksimum 5000 px
        // $config['max_height']  = '5000'; //tinggi maksimu 5000 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya



        //$this->upload->initialize($config);
        $this->load->library('upload',$config);
        
        
            if ($this->upload->do_upload('image'))
            {	
            	

                $gbr = $this->upload->data();
                $data = array(
                  'namafile' =>$gbr['file_name'],
                  'type' =>$gbr['file_type'],
                  'keterangan' =>$this->input->post('textket')
                  
                );


                $this->load->model('M_input_lapangan');
				$this->M_input_lapangan->save_lapangan($id,$nama,$deskripsi,$daerah,$kota,$nmfile);
                 //akses model untuk menyimpan ke database
                //dibawah ini merupakan code untuk resize
                // $config2['image_library'] = 'gd2'; 
                // $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                // $config2['new_image'] = './assets/img/lapangan/'; // folder tempat menyimpan hasil resize
                // $config2['maintain_ratio'] = TRUE;
                // $config2['width'] = 100; //lebar setelah resize menjadi 100 px
                // $config2['height'] = 100; //lebar setelah resize menjadi 100 px
                // $this->load->library('image_lib',$config2); 

      

				$this->load->view('sukses_input');
			}
			else
			{
				die($this->upload->display_errors());
			}

	}

	
}
