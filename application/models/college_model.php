<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class College_model extends CI_Model {

	private $table = "college_school";

	public function __construct(){
		parent::__construct();
	}

	public function getSchool($id = null){
		if(isset($id) && $id != null){
			$this->db->where('user_id', $id);
		}

		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function createSchool($data){
		$this->db->insert($this->table, $data);
	}
	
	
}