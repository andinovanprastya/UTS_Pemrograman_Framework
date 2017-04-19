<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pegawai_model');
	}
	public function index($idPegawai)
	{
		$data['data_pegawai']=$this->pegawai_model->getJabatanByPegawai($idPegawai);
		$this->load->view('jabatan',$data);	
	}


}

/* End of file Jabatan.php */
/* Location: ./application/controllers/Jabatan.php */

 ?>