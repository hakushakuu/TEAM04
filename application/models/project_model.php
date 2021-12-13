<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project_model extends CI_Model {

	private $table = "project";

	public function __construct(){
		parent::__construct();
	}

	public function createProject($data){
		var_dump($data);
		$this->db->insert($this->table, $data);
	}

	public function getProject($id = null, $project_id = null){
		if(isset($id) && $id != null){
			$this->db->where('project_publisher_id', $id);
		}
		if(isset($project_id) && $project_id != null){
			$this->db->where('project_id', $project_id);
		}
		$query = $this->db->get($this->table);
		return $query->result_array();
		
	}

	public function deleteProject($project_id){
		$this->db->where('project_id', $project_id);
		$this->db->delete($this->table);

	}

	public function updateProject($data){
		$this->db->where('project_id', $data['project_id']);
		unset($data['project_id']);
		$this->db->update($this->table, $data);

	}

	
	
}