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
		/* $data = array();
		$data = $this->input->post(); */
		/* if(isset($data) && $data != null){
			$this->load->model('user_model');
			$result = $this->user_model->createUser($data);

			if($result == true){
				redirect(base_url()."users/login");
			}
		} */
		$_SESSION['info'] = $this->input->post();
		$back_again = false;
		if(isset($_SESSION['info']['user_pwdRepeat']) && $_SESSION['info']['user_pwdRepeat'] != null && $back_again === false){
			$this->load->model('user_model');
			if($this->user_model->checkCreateUser($_SESSION['info'])){
				//will check error na sa model 
			}
			else{
				$back_again = true;
			}
		}
		if($back_again === true){
			redirect(base_url()."users/signup1");
		}
		$this->load->view('FRONT-END Folder/signup/index');
	}

	public function signup1(){
		$back_again = false;
		$data = array();
		$data = $this->input->post();

		if(isset($data['user_bio']) && $data['user_bio'] != null && $back_again === false){
			$file = $_FILES['user_pic'];
			$fileName = $_FILES['user_pic']['name'];
			$fileTmpName = $_FILES['user_pic']['tmp_name'];
			$fileSize = $_FILES['user_pic']['size'];
			$fileError = $_FILES['user_pic']['error'];
			$fileType = $_FILES['user_pic']['type'];
			

			$image = $fileTmpName;

			$fileExt = explode('.', $fileName);
			$fileActualExt = strtolower(end($fileExt));
			
			$allowed = array('jpg', 'jpeg', 'png');
			
			if(in_array($fileActualExt, $allowed)){
				if($fileError === 0){
					if($fileSize < 500000){
						$image = base64_encode(file_get_contents(addslashes($image)));
						$data['user_pic'] = $image;
						$_SESSION['info']['user_pic'] = $data['user_pic'];
						$_SESSION['info']['user_bio'] = $data['user_bio'];
						$_SESSION['info1']['user_skills'] = $data['user_skills'];
						$data = array();
						$back_again = true;
					}
					else{
						echo "File too big";
					}
				}
				else{
					echo "Error uploading file!";
				}
			}
			else{
				echo "Not allowed file type!";
			}

		}
		if($back_again === true){
			redirect(base_url()."users/signup2");
		}


		$this->load->view('FRONT-END Folder/signup/index1');
	}

	public function signup2(){
		$back_again = false;
		$data = array();
		$data = $this->input->post();

		if(isset($data) && $data != NULL && $back_again === false){
			$_SESSION['info2'] = $data;
			$data = array();
			$back_again = true;
		}
		if($back_again === true){
			redirect(base_url()."users/signup3");
		}

		$this->load->view('FRONT-END Folder/signup/index2');
	}

	public function signup3(){
		$back_again = false;
		$data = array();
		$data = $this->input->post();

		if(isset($data) && $data != NULL && $back_again === false){
			$_SESSION['info3'] = $data;
			$data = array();
			$back_again = true;
		}

		if($back_again === true){
			$this->load->model('user_model');
			$this->load->model('employment_model');
			$this->load->model('skills_model');
			$this->load->model('college_model');
			$result[0] = $this->user_model->createUser($_SESSION['info']);
			if(is_int($result[0])){
				$id = $result[0];
				$result[0] = true;
			}
			else{
				$result[0] = false;
			}
			$_SESSION['info1']['user_id'] = $id;
			$result[1] = $this->skills_model->createSkills($_SESSION['info1']);
			$_SESSION['info2']['user_id'] = $id;
			$result[2] = $this->college_model->createSchool($_SESSION['info2']);
			$_SESSION['info3']['user_id'] = $id;
			$result[3] = $this->employment_model->createEmployment($_SESSION['info3']);

			redirect(base_url()."users/login");

		}

		

		$this->load->view('FRONT-END Folder/signup/index3');
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
		session_unset();
		session_destroy();
		redirect(base_url());
	}

	public function account_settings(){
		if(isset($_SESSION['user_id'])){
			$this->load->view('users/account_settings');
		}
		else{
			//abang for 404 page not found
		}
		
	}

	public function account_delete_confirm(){
		if(isset($_SESSION['user_id'])){
			$data = array();
			$data = $this->input->post();
			if(isset($data) && $data != null){
				$this->load->model('user_model');
				$return = $this->user_model->deleteAccount($data['user_pwdRepeat'], $data['user_id']);

				if($return == true){
					session_unset();
					session_destroy();
					redirect(base_url());
				}
				else{
					echo "WRONG PASSWORD";
				}
			}
			$this->load->view('users/account_delete_confirm');
		}
		else{
			//abang for 404 page not found
		}

		
	}

	public function account_update_form(){

		if(isset($_SESSION['user_id'])){
			$this->load->model('user_model');
			$user = $this->user_model->getUser($_SESSION['user_id']);
				
			$output['user'] = $user[0];
			
			$data = array();
			$data = $this->input->post();
			

			if(isset($data) && $data != null){
				$this->load->model('user_model');
				$this->user_model->updateUser($data);
				$_SESSION['user_id'] = $data['user_id'];
				$_SESSION['user_uid'] = $data['user_uid'];
			}
			$this->load->view('users/account_update_form', $output);
		}
		else{
			//abang for 404 page not found
		}
		
	}

	public function profile($id = NULL){
		
		if(isset($_SESSION['user_id'])){
			if($id === NULL){
				$id = $_SESSION['user_id'];
			}
			$this->load->model('user_model');
			$user = $this->user_model->getUser($id);
			$output['user'] = $user[0];
			$this->load->view('FRONT-END Folder/viewuser/viewuser', $output);
		}
		else{
			//abang for 404 page not found
		}

		
	}

	public function resume($id = NULL){
		if(isset($_SESSION['user_id'])){
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
		else{
			//abang for 404 page not found
		}
		

		
	}
}
