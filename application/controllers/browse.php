<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Browse extends CI_Controller {

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
		$this->load->model('project_model');
		$this->load->model('user_model');

		$project = $this->project_model->getProject();
		$output['project'] = $project;

		$this->load->view('browse/browse', $output);
	}

	public function result(){
		$data = array();
		$data = $this->input->get();

		$this->load->model('project_model');
		$this->load->model('user_model');
		if($data['search'] == 'project'){
			if($data['keywords'] == NULL){
				$project = $this->project_model->getProject();
				$output['project'] = $project;
				$output['search'] = "project";
			}else{
				$project = $this->project_model->getProject(NULL, NULL, $data['keywords']);
				$output['project'] = $project;
				$output['search'] = "project";
			}
		}else{
			if($data['keywords'] == NULL){
				$users = $this->user_model->getUser();
				$output['users'] = $users;
				$output['search'] = "user";
			}else{
				$users = $this->user_model->getUser(NULL, $data['keywords']);
				$output['users'] = $users;
				$output['search'] = "user";
			}
		}
		//$output['project'] = $data;
		$this->load->view('browse/browse', $output);
	}
}
