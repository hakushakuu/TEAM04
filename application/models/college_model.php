<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class College_model extends CI_Model {

	private $table = "college_school";

	public function __construct(){
		parent::__construct();
	}

	public function getSchool($id = null, $school_id = null){
		if(isset($id) && $id != null){
			$this->db->where('user_id', $id);
		}
		if(isset($school_id) && $school_id != null){
			$this->db->where('college_school_id', $school_id);
		}

		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function updateSchool($school_id, $data){
		$this->db->where('college_school_id', $school_id);
		$this->db->update($this->table, $data);
	}

	public function createSchool($data){
		$this->db->insert($this->table, $data);
	}

	public function deleteSchool($school_id){
		$this->db->where('college_school_id', $school_id);
		$this->db->delete($this->table);
	}
	
	
}