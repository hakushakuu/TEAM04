<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project_image_model extends CI_Model {

	private $table = "project_picture";

	public function __construct(){
		parent::__construct();
	}

	public function insert_image($data){
		$this->db->insert($this->table, $data);
	}

	public function getProjectImage($project_id = null, $project_picture_id = null){
		if(isset($project_id) && $project_id != null){
			$this->db->where('project_id', $project_id);
		}
		if(isset($project_picture_id) && $project_picture_id != null){
			$this->db->where('project_picture_id', $project_picture_id);
		}
		$this->db->order_by('is_cover', 'DESC');
		$query = $this->db->get($this->table);
		return $query->result_array();
	}
	
	public function changeCover($project_picture_id, $current_cover_id){
		//set false the value of is_cover of current cover image
		$result = $this->getProjectImage(null, $current_cover_id);
		$result[0]['is_cover'] = "false";
		$this->db->where('project_picture_id', $result[0]['project_picture_id']);
		unset($result[0]['project_picture_id']);
		$this->db->update($this->table, $result[0]);

		//set true the value of selected image
		$result = $this->getProjectImage(null, $project_picture_id);
		$result[0]['is_cover'] = "true";
		$this->db->where('project_picture_id', $result[0]['project_picture_id']);
		unset($result[0]['project_picture_id']);
		$this->db->update($this->table, $result[0]);

		//return for changing cover in project table db
		return $result[0]['project_picture'];
	}
	
	public function delete_pic($project_id, $project_picture_id){
		$this->db->where('project_picture_id', $project_picture_id);
		$this->db->where('project_id', $project_id);
		$this->db->delete($this->table);
	}
	
	
}