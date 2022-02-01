<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project_model extends CI_Model {

	private $table = "project";

	public function __construct(){
		parent::__construct();
	}

	public function createProject($data){
		var_dump($data);
		$this->db->insert($this->table, $data);
		$id = $this->db->insert_id();
		return $id;
	}

	public function getProject($id = null, $project_id = null, $keywords = null){
		if(isset($id) && $id != null){
			$this->db->where('project_publisher_id', $id);
		}
		if(isset($project_id) && $project_id != null){
			$this->db->where('project_id', $project_id);
		}
		if(isset($keywords) && $keywords != null){
			$seperated_keywords = explode(" ",$keywords);
			$this->db->like('project_title', $keywords);
			$this->db->or_like('project_details', $keywords);
			$this->db->or_where_in('project_title', $seperated_keywords);
			$this->db->or_where_in('project_details', $seperated_keywords);
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

	public function getTotalRows(){
		return $this->db->count_all_results('project');
	}

	public function getPageProject($start, $limit){
		if($start != NULL && $limit != NULL && $start != 0){ 
			$this->db->limit($start, $limit); 
		}elseif($start == 0 && $limit != NULL){ 
			$this->db->limit($limit); 
		}

		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	function getRows1($params = array()){ 
        $this->db->select('*'); 
        $this->db->from($this->table); 
         
        if(array_key_exists("where", $params)){ 
            foreach($params['where'] as $key => $val){ 
                $this->db->where($key, $val); 
            } 
        }

		if(array_key_exists("search", $params)){ 
            // Filter data by searched keywords 
            if(!empty($params['search']['keywords'])){ 
				$seperated_keywords = explode(" ",$params['search']['keywords']);
				$this->db->like('project_title', $params['search']['keywords']);
				$this->db->or_like('project_details', $params['search']['keywords']);
				$this->db->or_where_in('project_title', $seperated_keywords);
				$this->db->or_where_in('project_details', $seperated_keywords);
            } 
        } 
         
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){ 
            $result = $this->db->count_all_results(); 
        }else{ 
            if(array_key_exists("id", $params) || (array_key_exists("returnType", $params) && $params['returnType'] == 'single')){ 
                if(!empty($params['id'])){ 
                    $this->db->where('id', $params['id']); 
                } 
                $query = $this->db->get(); 
                $result = $query->row_array(); 
            }else{ 
                $this->db->order_by('project_id', 'desc'); 
                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                    $this->db->limit($params['limit'],$params['start']); 
                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                    $this->db->limit($params['limit']); 
                } 
                 
                $query = $this->db->get(); 
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE; 
            } 
        } 
         
        // Return fetched data 
        return $result; 
    } 

	function getRows2($params = array()){ 
        $this->db->select('*'); 
        $this->db->from($this->table); 
         
        if(array_key_exists("where", $params)){ 
            foreach($params['where'] as $key => $val){ 
                $this->db->where($key, $val); 
            } 
        } 
         
        if(array_key_exists("search", $params)){ 
            // Filter data by searched keywords 
            if(!empty($params['search']['keywords'])){ 
                $this->db->like('project_title', $params['search']['keywords']); 
            } 
        } 
         
        // Sort data by ascending or desceding order 
        if(!empty($params['search']['sortBy'])){ 
            $this->db->order_by('project_title', $params['search']['sortBy']); 
        }else{ 
            $this->db->order_by('project_id', 'desc'); 
        } 
         
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){ 
            $result = $this->db->count_all_results(); 
        }else{ 
            if(array_key_exists("id", $params) || (array_key_exists("returnType", $params) && $params['returnType'] == 'single')){ 
                if(!empty($params['project_id'])){ 
                    $this->db->where('project_id', $params['project_id']); 
                } 
                $query = $this->db->get(); 
                $result = $query->row_array(); 
            }else{ 
                $this->db->order_by('project_id', 'desc'); 
                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                    $this->db->limit($params['limit'],$params['start']); 
                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                    $this->db->limit($params['limit']); 
                } 
                 
                $query = $this->db->get(); 
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE; 
            } 
        } 
         
        // Return fetched data 
        return $result; 
    } 

	function getRows3($params = array()){
        $this->db->select('*');
        $this->db->from($this->table);
        
        if(array_key_exists("conditions", $params)){
            foreach($params['conditions'] as $key => $val){
                $this->db->where($key, $val);
            }
        }
        
        if(!empty($params['searchKeyword'])){
            $search = $params['searchKeyword'];
            $likeArr = array('project_title' => $search, 'project_details' => $search);
            $this->db->or_like($likeArr);
        }
        
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
            $result = $this->db->count_all_results();
        }else{
            if(array_key_exists("project_id", $params)){
                $this->db->where('project_id', $params['id']);
                $query = $this->db->get();
                $result = $query->row_array();
            }else{
                $this->db->order_by('project_id', 'asc');
                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                    $this->db->limit($params['limit'],$params['start']);
                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                    $this->db->limit($params['limit']);
                }
                
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }
        
        // Return fetched data
        return $result;
    }

	
	
}