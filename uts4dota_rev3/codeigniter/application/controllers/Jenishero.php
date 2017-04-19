<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenishero extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Jenishero_Model');
	}
	public function index()
	{
		$data['data_pegawai']=$this->Jenishero_Model->getDataJenishero();
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
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		if($this->form_validation->run()==FALSE){

			$this->load->view('addData');

		}
		else{

			$this->Jenishero_Model->addData();
			header("location:index");
		}
	}
	public function edit($id) 
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		if($this->form_validation->run()==FALSE){

			$data['data_pegawai']=$this->Jenishero_Model->getDataIdJenishero($id);
			$this->load->view('EditData',$data);

		}
		else{

				$this->Jenishero_Model->editData($id);
				header("location:".site_url());

			
		}
	}
	public function deleteValidation($id)
	{
		$data['data_pegawai']=$this->Jenishero_Model->getDataIdJenishero($id);
		$this->load->view('deleteData',$data);
	}

	public function delete($id,$val)
	{
		if ($val==0)
		{
			header("location:".site_url());
		}
		else {
		$this->Jenishero_Model->deleteData($id);
		header("location:".site_url());
	}
	}

}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */

 ?>