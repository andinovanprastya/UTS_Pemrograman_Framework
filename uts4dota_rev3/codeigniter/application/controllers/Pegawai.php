<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Jenishero_Model');
	}
	public function index()
	{
		$data['data_pegawai']=$this->pegawai_model->getDataJenishero();
		$this->load->view('Jenishero',$data);	
	}
	public function dataTable()
	{
		$data['data_pegawai']=$this->pegawai_model->getDataPegawai();
		$this->load->view('Pegawai_dataTable',$data);	
	}
	public function addData() 
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('nip', 'nip', 'trim|required|numeric');
		$this->form_validation->set_rules('tglLahir', 'tglLahir', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		if($this->form_validation->run()==FALSE){

			$this->load->view('pegawai_addData');

		}
		else{

			$config['upload_path']          = './assets/uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1000000000;
            $config['max_width']            = 10240;
            $config['max_height']           = 7680;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('userfile'))
                {
                        $error['data'] = "eror";
						$this->load->view('pegawai_addData',$error);
                }
                else
                {
						$this->pegawai_model->addData();
						header("location:index");
				}
		}
	}
	public function edit($idPegawai) 
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('nip', 'nip', 'trim|required|numeric');
		$this->form_validation->set_rules('tglLahir', 'tglLahir', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		if($this->form_validation->run()==FALSE){

			$data['data_pegawai']=$this->pegawai_model->getDataIdPegawai($idPegawai);
			$this->load->view('pegawai_editData',$data);

		}
		else{

			$config['upload_path']          = './assets/uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1000000000;
            $config['max_width']            = 10240;
            $config['max_height']           = 7680;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('userfile'))
                {
                        $error['data'] = "eror";
						$this->load->view('pegawai_editData/$idPegawai',$error);
                }
                else
                {
						$this->pegawai_model->editData($idPegawai);
						header("location:".site_url());
				}
		}
	}
	public function deleteValidation($idPegawai)
	{
		$data['data_pegawai']=$this->pegawai_model->getDataIdPegawai($idPegawai);
		$this->load->view('pegawai_deleteData',$data);
	}

	public function delete($idPegawai,$val)
	{
		if ($val==0)
		{
			header("location:".site_url());
		}
		else {
		$this->pegawai_model->deleteData($idPegawai);
		header("location:".site_url());
	}
	}

}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */

 ?>