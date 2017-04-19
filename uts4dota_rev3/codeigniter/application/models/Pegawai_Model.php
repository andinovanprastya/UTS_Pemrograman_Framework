<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_Model extends CI_Model {

		public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	

		public function getDataPegawai()
		{
			$query=$this->db->query("select * from pegawai");
			return $query->result_array();
		}
		public function getDataIdPegawai($idPegawai)
		{
			$query=$this->db->query("select * from pegawai where id='$idPegawai'");
			return $query->result_array();
		}

		public function getJabatanByPegawai($idPegawai)
		{	
			$sql="select A.nama,B.* from pegawai as A join jabatan_pegawai as B on A.id = B.fk_pegawai where A.id=$idPegawai";
			$query=$this->db->query($sql);
			return $query->result_array();
		}
		public function getAnakByPegawai($idPegawai)
		{
			$sql="select A.nama as namaPegawai,B.* from pegawai as A join anak as B on A.id = B.fk_pegawai where A.id=$idPegawai";
			$query=$this->db->query($sql);
			return $query->result_array();			
		}
		public function addData()
		{
			$object = array('nama' => $this->input->post('nama'),
							'nip' => $this->input->post('nip'),
							'tanggalLahir' => $this->input->post('tglLahir'),
							'alamat' => $this->input->post('alamat'),
							'foto' => $this->upload->data('file_name')
							);
			$this->db->insert('pegawai', $object);
		}
		public function editData($idPegawai)
		{
			$object = array('nama' => $this->input->post('nama'),
							'nip' => $this->input->post('nip'),
							'tanggalLahir' => $this->input->post('tglLahir'),
							'alamat' => $this->input->post('alamat'),
							'foto' => $this->upload->data('file_name'));
			$this->db->where('id', $idPegawai);
			$this->db->update('pegawai', $object);
		}
		public function deleteData($idPegawai)
		{
			$this->db->query("delete from pegawai where id = '$idPegawai'");
		}

}

/* End of file Pegawai_Model.php */
/* Location: ./application/models/Pegawai_Model.php */
 ?>