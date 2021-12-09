<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employment_model extends CI_Model {

	private $table = "employment";

	public function __construct(){
		parent::__construct();
	}

	public function getEmployment($id = null){
		if(isset($id) && $id != null){
			$this->db->where('user_id', $id);
		}

		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function createEmployment($data){
		$this->db->insert($this->table, $data);
	}

	
	
}