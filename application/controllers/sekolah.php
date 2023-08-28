<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
	}
      
      public function index(){
            $data = array(
            'title' 	      => "Data - Pengembang", 
            'isi' 	      => "pengembang/data_sekolah",
            'bagian'          => "Developer",
            'data'            => $this->m_data->getSelect('sekolah')
         );
        $this->load->view('layout_khusus/wrapper',$data);
	}

      public function tambah(){

            $data = array(
            'title' 	      => "Tambah - Pengembang", 
            'isi' 	      => "pengembang/tambah_sekolah",
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
            $username_superUser           = $this->input->post('username');
            $password1_superUser          = $this->input->post('password');
            $phone_superUser              = $this->input->post('phone');
            $alamat_superUser             = $this->input->post('alamat');
            $status_akun                  = $this->input->post('status_akun');
            
            $data_akun = array(
                  'id_akun'         => "",
                  'username_akun'   => $username_superUser,
                  'password_akun'   => md5($password1_superUser),
                  'status_akun'     => $status_akun
            );

            $simpan_akun = $this->m_data->setSimpan('akun',$data_akun);
            if(isset($simpan_akun) == false){
                  $where = array(
                        'username_akun'   => $username_superUser,
                        'password_akun'   => $password1_superUser
                  );
                  $id_akun = "";
                  $tampil_akun = $this->m_data->getSelectWhere('akun',$where);
                  foreach ($tampil_akun as $key) {
                        $id_akun =  $key->id_akun;
                  }
                  $config['upload_path']          = 'assets/images/foto';  // folder upload 
                  $config['allowed_types']        = 'gif|jpg|png|jpeg'; // jenis file
                  $config['max_size']             = 3000;
                  $config['max_width']            = 1024;
                  $config['max_height']           = 768;
                  
                  $this->load->library('upload', $config);
 
		      if ( ! $this->upload->do_upload('fotoss')){
			      echo " foto tidak bisa diupload";
      		      echo $this->upload->display_errors();
                  }else{
                        $gambar			    = $this->upload->file_name;
                        $data = array('upload_data' => $this->upload->data());
                        $data_superUser = array(
                              'id_superUser'                => "",
                              'id_akun'                     => $id_akun,
                              'nama_superUser'              => $nama_superUser,
                              'nik_superUser'               => $nik_superUser,
                              'tempat_lahir_superUser'      => $tempat_lahir_superUser,
                              'tanggal_lahir_superUser'     => $tanggal_lahir_superUser,
                              'alamat_superUser'            => $alamat_superUser,
                              'email_superUser'             => $email_superUser,
                              'no_telp_superUser'           => $phone_superUser,
                              'foto'                        => $gambar  
                        );
                        $simpan_superUser = $this->m_data->setSimpan('superuser',$data_superUser);
                        if(isset($simpan_superUser) == false){
                              $this->session->set_userdata("info",1);
                              redirect('SuperUser');
                        }
                  }
            }else{

            }
      }

      public function edit($id_superUser,$id_akun){
            $where_superUser = array(
                  'id_superUser' => $id_superUser
            );
            $where_akun = array(
                  'id_akun' => $id_akun
            );
            $data = array(
                  'title' 	      => "update- super user", 
                  'isi' 	      => "pengembang/edit_superUser",
                  'bagian'          => "Developer",
                  'data'            => $this->m_data->getSelectWhere('superuser',$where_superUser),
                  'data_akun'       => $this->m_data->getSelectWhere('akun',$where_akun)
            );
            $this->load->view('layout_khusus/wrapper',$data);
      }

      public function proses_edit_superuser(){
            $nama_superUser 	            = $this->input->post('name');
            $nik_superUser         	      = $this->input->post('nik');
            $tempat_lahir_superUser       = $this->input->post('tempat_lahir');
            $tanggal_lahir_superUser      = $this->input->post('date');
            $email_superUser              = $this->input->post('email');
            $username_superUser           = $this->input->post('username');
            $password1_superUser          = $this->input->post('password');
            $phone_superUser              = $this->input->post('phone');
            $alamat_superUser             = $this->input->post('alamat');
            $status_akun                  = $this->input->post('status_akun');
            $id_superUser                 = $this->input->post('id_superUser');
            $id_akun                      = $this->input->post('id_akun');

            $where_akun = array(
                  'id_akun'   => $id_akun 
            );
            $where_superUser = array(
                  'id_superUser'    => $id_superUser
            );

            $data_akun = array(
                  'username_akun'   => $username_superUser,
                  'password_akun'   => md5($password1_superUser),
                  'status_akun'     => $status_akun
            );

            $simpan_akun = $this->m_data->setEdit('akun',$where_akun,$data_akun);
            if(isset($simpan_akun) == false){
                  
                  $config['upload_path']          = 'assets/images/foto';  // folder upload 
                  $config['allowed_types']        = 'gif|jpg|png|jpeg'; // jenis file
                  $config['max_size']             = 3000;
                  $config['max_width']            = 1024;
                  $config['max_height']           = 768;
                  
                  $this->load->library('upload', $config);
 
		      if ( ! $this->upload->do_upload('fotoss')){
			      echo " foto tidak bisa diupload";
      		      echo $this->upload->display_errors();
                  }else{
                        $gambar			    = $this->upload->file_name;
                        $data = array('upload_data' => $this->upload->data());
                        $data_superUser = array(
                              'nama_superUser'              => $nama_superUser,
                              'nik_superUser'               => $nik_superUser,
                              'tempat_lahir_superUser'      => $tempat_lahir_superUser,
                              'tanggal_lahir_superUser'     => $tanggal_lahir_superUser,
                              'alamat_superUser'            => $alamat_superUser,
                              'email_superUser'             => $email_superUser,
                              'no_telp_superUser'           => $phone_superUser,
                              'foto'                        => $gambar  
                        );
                        $simpan_superUser = $this->m_data->setEdit('superuser',$where_superUser,$data_superUser);
                        if(isset($simpan_superUser) == false){
                              $this->session->set_userdata("info",3);
                              redirect('SuperUser');
                        }
                  }
            }else{

            }
      }

      public function delete($id_superUser,$id_akun){
            $where_superUser = array('id_superUser' => $id_superUser );
            $where_akun = array('id_akun' => $id_akun );
		$this->m_data->setHapus('akun',$where_akun);
		$this->m_data->setHapus('superuser',$where_superUser);
		$this->session->set_userdata("info",2);
            redirect('SuperUser');
      }

      public function detail($id_superUser,$id_akun){
            $where_superUser = array(
                  'id_superUser' => $id_superUser
            );
            $where_akun = array(
                  'id_akun' => $id_akun
            );
            $data = array(
                  'title' 	      => "Detail - super user", 
                  'isi' 	      => "pengembang/detail_superUser",
                  'bagian'          => "Developer",
                  'data'            => $this->m_data->getSelectWhere('superuser',$where_superUser),
                  'data_akun'       => $this->m_data->getSelectWhere('akun',$where_akun)
               );
            $this->load->view('layout_khusus/wrapper',$data);
      }
}