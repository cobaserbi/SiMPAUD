<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index(){
		$this->load->view('Login/login');
	}

    public function proses_login(){
		$this->load->model('m_login');

		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		$where = array(
			'username_akun' => $user,
			'password_akun' => md5($pass)
			);
		$username="";
		$password="";
		$nama_ = "";
		$cek = $this->m_login->cek_login("akun",$where)->num_rows();
		$data = $this->m_login->cek_login("akun",$where)->result();
		foreach ($data as $key) {
			$username = $key->username_akun;
			$password = $key->password_akun;
            $status = $key->status_akun;
			$id_akun = $key->id_akun;
		}
		if($cek > 0){
			$where1 = array(
				'id_akun' => $id_akun
				);
			$data1 = $this->m_login->cek_login("superuser",$where1)->result();
			
			foreach($data1 as $key1){
				$id_superUser 	= $key1->id_superUser;
				$nama 			= $key1->nama_superUser;
				$foto 			= $key1->foto;
			}
			$data_session = array(
				'id_sUser'	=> $id_superUser,
				'username' 	=> $username,
				'password' 	=> $password,
				'nama'		=> $nama,
				'foto'		=> $foto,
                'status'   	=> $status,
				'info'		=> 0
				);
 
			$this->session->set_userdata($data_session);
 
			if($status == "pengembang"){
                redirect("pengembang");
            }else if($status == "admin_sekolah"){
                redirect("admin_sekolah");
            }else if($status == "orang_tua"){
                redirect("ortu");
            }else if($status == "guru"){
                redirect("guru");
            }else{

            }
 
		}else{
			echo "gagal login";
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}
