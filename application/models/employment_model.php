<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employment_model extends CI_Model {

	private $table = "employment";

	public function __construct(){
		parent::__construct();
	}

	public function getEmployment($id = null, $employment_id = null){
		if(isset($id) && $id != null){
			$this->db->where('user_id', $id);
		}
		if(isset($employment_id) && $employment_id != null){
			$this->db->where('employment_id', $employment_id);
		}

		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function createEmployment($data){
		$this->db->insert($this->table, $data);
	}

	public function updateEmployment($employment_id, $data){
		$this->db->where('employment_id', $employment_id);
		$this->db->update($this->table, $data);
	}

	public function deleteEmployment($employment_id){
		$this->db->where('employment_id', $employment_id);
		$this->db->delete($this->table);
	}

	
	
}