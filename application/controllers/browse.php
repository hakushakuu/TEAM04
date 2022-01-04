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

	function __construct(){
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('project_model');
		$this->load->model('user_model');
		$this->perPage = 3;
	}

/* 	public function test(){
		$this->load->model('project_model');
		$output = $this->project_model->getTotalRows();
		echo $output;
	} */

	public function index()
	{
		$this->load->model('project_model');
		$this->load->model('user_model');

		$project = $this->project_model->getProject();
		$output['project'] = $project;

		$this->load->view('browse/browse', $output);
	}

	public function test(){
		$this->load->model('project_model');
		$this->load->model('user_model');

		$project = $this->project_model->getProject();
		$output['project'] = $project;

		//getTotalRows
		$totalRows = $this->project_model->getTotalRows();

		//pagination config
		$config['base_url'] = base_url()."browse/test/";
		$config['uri_segment'] = 3;
		$config['total_rows'] = $totalRows;
		$config['per_page'] = $this->perPage;

		

		// Pagination link format 
		$config['num_tag_open'] = '<li>'; 
		$config['num_tag_close'] = '</li>'; 
		$config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">'; 
		$config['cur_tag_close'] = '</a></li>'; 
		$config['next_link'] = 'Next'; 
		$config['prev_link'] = 'Prev'; 
		$config['next_tag_open'] = '<li class="pg-next">'; 
		$config['next_tag_close'] = '</li>'; 
		$config['prev_tag_open'] = '<li class="pg-prev">'; 
		$config['prev_tag_close'] = '</li>'; 
		$config['first_tag_open'] = '<li>'; 
		$config['first_tag_close'] = '</li>'; 
		$config['last_tag_open'] = '<li>'; 
		$config['last_tag_close'] = '</li>';

		// Initialize pagination library 
        $this->pagination->initialize($config); 

		//define offset
		$page = $this->uri->segment(3);
		$offset = !$page? 0:$page;

		$output['project'] = $this->project_model->getPageProject($offset, $this->perPage);

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

		$this->load->view('browse/browse', $output);
	}
}
