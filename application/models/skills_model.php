<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Skills_model extends CI_Model {

	private $table = "skills";

	public function __construct(){
		parent::__construct();
	}

	public function getSkills($id = null, $skills_id = null){
		if(isset($id) && $id != null){
			$this->db->where('user_id', $id);
		}
		if(isset($skills_id) && $skills_id != null){
			$this->db->where('skills_id', $skills_id);
		}

		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function createSkills($data){
		$this->db->insert($this->table, $data);
	}
	
	public function updateSkills($skills_id, $data){
		$this->db->where('skills_id', $skills_id);
		$this->db->update($this->table, $data);
	}

	public function deleteSkills($skills_id){
		$this->db->where('skills_id', $skills_id);
		$this->db->delete($this->table);
	}
}