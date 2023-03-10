<?php
class Crud_model extends CI_Model {
	public function getAllNotes() {
		$this->db->where('permissions_user', 'Geral');
		$query = $this->db->get('boletim');
		if ($query) {
			return $query->result();
		}
	}

	public function addNotes($data) {
		$this->db->insert('boletim', $data);
	}

	public function deleteItem($id_boletim) {
		$this->db->where('id_boletim', $id_boletim);
		$query = $this->db->delete('boletim');

		if ($query) {
			return;
		}
	}

	public function editSingleNote($id_boletim) {
		$this->db->where('id_boletim', $id_boletim);
		$query = $this->db->get('boletim');

		if ($query) {
			return $query->row();
		}

		redirect(base_url());
	}

	public function updateNotes($data, $id_boletim) {
		$this->db->where('id_boletim', $id_boletim);
		$query = $this->db->update('boletim', $data);
	}

	public function viewNotes($id_boletim) {
		$this->db->where('id_boletim', $id_boletim);
		$query = $this->db->get('boletim');

		if ($query) {
			return $query->row();
		}

		redirect(base_url());	
	}

	public function searchNote($title, $type, $permission, $permissionDefault, $permissionSecondary) {
		$this->db->like('title_boletim', $title, 'both');
	  $this->db->like('type_user', $type, 'before');
	  $this->db->group_start();
	  	$this->db->where('permissions_user', $permissionDefault);
		  $this->db->or_where('permissions_user', $permission);
		  $this->db->or_where('permissions_user', $permissionSecondary);
		$this->db->group_end();

	  $query = $this->db->get('boletim');
	  
	  if ($query->num_rows() > 0) {
	    return $query->result();
	  } else {
	    return array();
	  }
	}
}