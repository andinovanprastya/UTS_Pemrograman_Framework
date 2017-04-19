<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenishero_Model extends CI_Model {

		public function getDataJenishero()
		{
			$query=$this->db->query("select * from jenis_hero");
			return $query->result_array();
		}
		public function getDataIdJenishero($id)
		{
			$query=$this->db->query("select * from jenis_hero where id='$id'");
			return $query->result_array();
		}

		public function getHeroById($id)
		{
			$sql="select A.keterangan as keterangan,B.* from jenis_hero as A join hero as B on A.id = B.fk_jenis where A.id=$id";
			$query=$this->db->query($sql);
			return $query->result_array();			
		}

		public function getHero($id)
		{
			$this->db->where('id',$id);
			$query = $this->db->get('hero', 1);
			return $query->result();			
		}
		//public function getHero($id)
		//{
		//	$sql="select * from hero where id=$id";
		//	$query=$this->db->query($sql);
		//	return $query->result_array();			
		//}
		public function addData()
		{
			$object = array('keterangan' => $this->input->post('keterangan')
							);
			$this->db->insert('jenis_hero', $object);
		}
		public function editData($id)
		{
			$object = array('keterangan' => $this->input->post('keterangan'));
			$this->db->where('id', $id);
			$this->db->update('jenis_hero', $object);
		}
		public function deleteData($id)
		{	
			$this->db->query("delete from hero where fk_jenis = '$id'");
			$this->db->query("delete from jenis_hero where id = '$id'");
		}

}

/* End of file Pegawai_Model.php */
/* Location: ./application/models/Pegawai_Model.php */
 ?>