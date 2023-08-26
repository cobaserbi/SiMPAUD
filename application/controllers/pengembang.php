<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembang extends CI_Controller {
	public function index(){
		$data = array(
            'title' 	      => "Beranda - Pengembang", 
            'isi' 	      => "pengembang/beranda",
            'bagian'          => "Developer"
         );
        $this->load->view('layout_khusus/wrapper',$data);
	}
}