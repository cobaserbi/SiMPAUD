<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuperUser extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
	}
      
      public function index(){
		$query = "SELECT * FROM akun INNER JOIN superuser using(id_akun)";
            $data = array(
            'title' 	      => "Data - Pengembang", 
            'isi' 	      => "pengembang/data_superUser",
            'bagian'          => "Developer",
            'data'            => $this->m_data->getJoin($query)
         );
        $this->load->view('layout_khusus/wrapper',$data);
	}

      public function tambah(){

            $data = array(
            'title' 	      => "Tambah - Pengembang", 
            'isi' 	      => "pengembang/tambah_superUser",
            'bagian'          => "Developer",
            'nama_lengkap'    => "",
            'nik'             => "",
            'tempat_lahir'    => "",
            'tanggal_lahir'   => "",
            'email'           => "",
            'username'        => "",
            'password'        => "",
            
         );
        $this->load->view('layout_khusus/wrapper',$data);
	}

      public function proses_tambah_superuser(){
            $nama_superUser 	            = $this->input->post('name');
            $nik_superUser         	      = $this->input->post('nik');
            $tempat_lahir_superUser       = $this->input->post('tempat_lahir');
            $tanggal_lahir_superUser      = $this->input->post('date');
            $email_superUser              = $this->input->post('email');
            $confirm_email_superUser      = $this->input->post('confirm_email');
            $username_superUser           = $this->input->post('username');
            $password1_superUser          = $this->input->post('password1');
            $password2_superUser          = $this->input->post('password2');
            $phone_superUser              = $this->input->post('phone');
            $alamat_superUser              = $this->input->post('alamat');
            

      }
}