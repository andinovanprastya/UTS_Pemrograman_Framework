<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hero_Model extends CI_Model {

	public function addHero($id)
		{
			$object = array('nama' => $this->input->post('nama'),
							'tanggal_lahir' => $this->input->post('tglLahir'),
							'foto' => $this->upload->data('file_name'),
							'fk_jenis'=> $id
							);
			$this->db->insert('hero', $object);
		}

		public function editHero($id)
		{
			$object = array('nama' => $this->input->post('nama'),
							'tanggal_lahir' => $this->input->post('tglLahir'),
							'foto' => $this->upload->data('file_name')
							
							);
			$this->db->where('id', $id);
			$this->db->update('hero', $object);
		}
		public function deleteHero($id)
		{	
			$this->db->query("delete from hero where id = '$id'");
		}

}

/* End of file Pemain_Model.php */
/* Location: ./application/models/Pemain_Model.php */