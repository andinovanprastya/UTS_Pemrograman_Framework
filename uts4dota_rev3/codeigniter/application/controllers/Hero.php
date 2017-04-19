<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hero extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Jenishero_Model');
		$this->load->model('Hero_Model');
	}
	public function index($id)
	{
		$data['data_pegawai']=$this->Jenishero_Model->getHeroById($id);
		$this->load->view('Hero',$data);	
	}
	public function all()
	{
		$data['data_pegawai']=$this->Jenishero_Model->getHeroAll();
		$this->load->view('Hero',$data);	
	}
	public function addHero($id) 
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[100]');
		//$this->form_validation->set_rules('tanggalLahir', 'Tanggal Lahir', 'trim|required');
		$this->load->model('hero_model');	
		if($this->form_validation->run()==FALSE){
			$data['data_pegawai']=$this->Jenishero_Model->getDataJenishero();
			$this->load->view('addhero');

		}else{
			$config['upload_path'] = './assets/uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = 1000000000;
			$config['max_width']  = 10240;
			$config['max_height']  = 7680;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('userfile'))
			{
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('addhero',$error);
			}
			else
			{
				$this->Hero_Model->addHero($id);
				redirect('jenishero/index');
			}
		}
	}
	public function edit($id) 
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[100]');
		//$this->form_validation->set_rules('tanggalLahir', 'Tanggal Lahir', 'trim|required');
		$this->load->model('hero_model');	
		$data['data_pegawai']=$this->Jenishero_Model->getDataJenishero();
			$config['upload_path'] = './assets/uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = 1000000000;
			$config['max_width']  = 10240;
			$config['max_height']  = 7680;

			$this->load->library('upload', $config);

			$data['hero'] = $this->hero_model->getHeroById($id);
			$data2 = $this->hero_model->getHeroById($id);
			$nama = $data2[0]->foto;


		if($this->form_validation->run()==FALSE){
			
			$this->load->view('addhero');

		}else{
			
			
			
			
			if ( ! $this->upload->do_upload('userfile'))
			{
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('edithero',$error);
			}
			else
			{
				$this->Hero_Model->addHero($id);
				redirect('jenishero/index');
			}
		}
	}
	public function deleteValidation($id)
	{
		$data['data_pegawai']=$this->Jenishero_Model->getHero($id);
		$this->load->view('deleteHero',$data);
	}
	public function delete($id,$val)
	{
		if ($val==0)
		{
			header("location:".site_url());
		}
		else {
		$this->Hero_Model->deleteData($id);
		header("location:".site_url());
	}
	}	

}

/* End of file Hero.php */
/* Location: ./application/controllers/Hero.php */
?>