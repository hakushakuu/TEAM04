<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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
		
	public function signup(){
		$data = array();
		$data = $this->input->post();
		if(isset($data) && $data != null){
			$this->load->model('user_model');
			$result = $this->user_model->createUser($data);

			if($result == true){
				redirect(base_url()."users/login");
			}
		}

		$this->load->view('FRONT-END Folder/signup/index');
	}

	public function login(){
		$data = array();
		$data = $this->input->post();
		if(isset($data) && $data != null){
			$this->load->model('user_model');
			$return = $this->user_model->loginUser($data['user_uid'], $data['user_pwd']);

			if(is_bool($return)){
				echo "login error";
			}
			else{
				$_SESSION['user_id'] = $return[0]['user_id'];
				$_SESSION['user_uid'] = $return[0]['user_uid'];
				redirect(base_url());
			}
		}

		$this->load->view('FRONT-END Folder/signin/index');
	}

	public function logout(){
		session_unset('user_id');
		session_unset('user_uid');
		session_destroy();
		redirect(base_url());
	}

	public function account_settings(){
		$this->load->view('users/account_settings');
	}

	public function account_delete_confirm(){
		$data = array();
		$data = $this->input->post();
		if(isset($data) && $data != null){
			$this->load->model('user_model');
			$return = $this->user_model->deleteAccount($data['user_pwdRepeat'], $data['user_id']);

			if($return == true){
				session_unset('user_id');
				session_unset('user_uid');
				session_destroy();
				redirect(base_url());
			}
			else{
				echo "WRONG PASSWORD";
			}
		}

		$this->load->view('users/account_delete_confirm');
	}

	public function account_update_form(){
		$this->load->model('user_model');
		$user = $this->user_model->getUser($_SESSION['user_id']);
		 	
		$output['user'] = $user[0];
		
		$data = array();
		$data = $this->input->post();
		/* $data['user_id'] = $_SESSION['user_id']; */
		/* print_r($data); */
		

		if(isset($data) && $data != null){
			$this->load->model('user_model');
			$this->user_model->updateUser($data);
		}
		$this->load->view('users/account_update_form', $output);
	}

	public function profile($id = NULL){
		/* $this->load->view('users/profile'); */
		if($id === NULL){
			$id = $_SESSION['user_id'];
		}
		$this->load->model('user_model');
		$user = $this->user_model->getUser($id);
		 	
		$output['user'] = $user[0];

		$this->load->view('FRONT-END Folder/viewuser/viewuser', $output);
	}

	public function resume($id = NULL){
		/* $this->load->view('users/profile'); */
		if($id === NULL){
			$id = $_SESSION['user_id'];
		}
		$this->load->model('user_model');
		$this->load->model('skills_model');
		$this->load->model('employment_model');
		$this->load->model('college_model');
		$user = $this->user_model->getUser($id);
		$skills = $this->skills_model->getSkills($id);
		$employment = $this->employment_model->getEmployment($id);
		$college = $this->college_model->getSchool($id);

		$output['skills'] = $skills;
		$output['user'] = $user[0];
		$output['employment'] = $employment;
		$output['college'] = $college;

		$this->load->view('FRONT-END Folder/viewuser/resume', $output);
	}
}
