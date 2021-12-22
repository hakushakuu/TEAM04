<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function projects($id = null){
		#view project
		if(isset($_SESSION['user_id'])){
			$this->load->model('project_model');
			$project = $this->project_model->getProject($id);
			
			$output['project'] = $project;
			$output['request'] = $id;
			$this->load->view('project/viewallproject', $output);
		}
		else{
			//abang for 404 page not found
		}	
	}
		
	public function add(){
		if(isset($_SESSION['user_id'])){
			$data = array();
			$data = $this->input->post();
			
			if(isset($data) && $data != NULL){
				$data['project_publisher_id'] = $_SESSION['user_id'];
				$this->load->model('project_model');
				$this->project_model->createProject($data);
				redirect(base_url()."project/".$_SESSION['user_id']);
			}
			$this->load->view('FRONT-END Folder/modified add project/index');
			
		}
		else{
			//abang for 404 page not found
		}	
	}

	public function view($project_id,$id){
		if(isset($_SESSION['user_id'])){
			

			$this->load->model('project_model');
			$project = $this->project_model->getProject($id, $project_id);

			if(is_bool($project)){
				//kapag walang nahanap
			}
			else{
				$output['project'] = $project['0'];
				$output['request'] = $id;
				$this->load->view('project/viewproject', $output);
			}
			
			
		}
		else{
			//abang for 404 page not found
		}	
	}

	public function delete($project_id){
		if(isset($_SESSION['user_id'])){
			$this->load->model('project_model');
			$project = $this->project_model->deleteProject($project_id);
			redirect(base_url()."project");
		}
		else{
			//abang for 404 page not found
		}	
		
	}

	public function update($project_id){
		if(isset($_SESSION['user_id'])){
			$this->load->model('project_model');
			$project = $this->project_model->getProject($_SESSION['user_id'], $project_id);
				
			$output['project'] = $project[0];
			
			$data = array();
			$data = $this->input->post();
			$data['project_id'] = $project_id;
			
			

			if(isset($data['project_details']) && $data['project_details'] != null){
				$this->load->model('project_model');
				$this->project_model->updateProject($data);
				redirect(base_url()."project/view/".$project_id."/".$_SESSION['user_id']);
			}
			$this->load->view('project/updateproject',$output);
		}
		else{
			//abang for 404 page not found
		}		
		
	}
}