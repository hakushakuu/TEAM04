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

	function uniqidReal($lenght = 13) {
		// uniqid gives 13 chars, but you could adjust it to your needs.
		if (function_exists("random_bytes")) {
			$bytes = random_bytes(ceil($lenght / 2));
		} elseif (function_exists("openssl_random_pseudo_bytes")) {
			$bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
		} else {
			throw new Exception("no cryptographically secure random function available");
		}
		return substr(bin2hex($bytes), 0, $lenght);
	}

	public function sign(){
		if(isset($_SESSION['user_id'])){
			//page not found
		}else{
			$output = array();
			session_unset();
			$data = array();
			$data = $this->input->post();
			if(isset($data) && $data != null){
				$this->load->model('user_model');
				$return = $this->user_model->loginUser($data['user_uid'], $data['user_pwd']);

				if(is_bool($return)){
					$output['error'] = "Email or Password you entered is incorrect!";
				}
				else{
					$_SESSION['user_id'] = $return[0]['user_id'];
					$_SESSION['user_uid'] = $return[0]['user_uid'];
					redirect(base_url());
				}
			}
			$this->load->view('FRONT-END Folder/FolioHub SIGN UP PAGES 1-3/index-signin-page', $output);
		}	
	}

	public function signu(){
		if(isset($_SESSION['user_id'])){
			redirect(base_url());
		}else{
			$output = array();
			$_SESSION['info'] = $this->input->post();

			//trigger if go to next page
			$trigger = false;
			if(isset($_SESSION['info']['trigger'])){
				$trigger = $_SESSION['info']['trigger'];
			}
			else{
				$trigger = false;
			}

			if($trigger == true){
				unset($_SESSION['info']['trigger']);
				redirect(base_url()."users/signu1"); 
			}

			$this->load->view('FRONT-END Folder/FolioHub SIGN UP PAGES 1-3/index-signup-page1', $output);
		}		
	}

	public function signu1(){
		if(isset($_SESSION['user_id'])){
			redirect(base_url());
		}else{
			$output = array();
			$data = $this->input->post();

			//trigger if go to next page
			$trigger = false;
			if(isset($data['trigger'])){
				$trigger = $data['trigger'];
				unset($data['trigger']);
			}
			else{
				$trigger = false;
			}
			//merge data from this page to data from first page of signup
			$_SESSION['info'] = array_merge($_SESSION['info'], $data);

			if($trigger == true){
				$this->load->model('user_model');
				if($output['error'] = $this->user_model->checkCreateUser($_SESSION['info'])){
					$data['trigger'] = false;
				}
				else{
					redirect(base_url()."users/signu2"); 
					
				}		
			}
			$this->load->view('FRONT-END Folder/FolioHub SIGN UP PAGES 1-3/index-signup-page2', $output);
		}
			
	}

	public function signu2(){
		if(isset($_SESSION['user_id'])){
			redirect(base_url());
		}else{
			$data = array();
			$data = $this->input->post();
			$output = array();

			//trigger if go to next page
			$trigger = false;
			if(isset($data['trigger'])){
				$trigger = $data['trigger'];
			}
			else{
				$trigger = false;
			}

			if($trigger == true){
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
						if($fileSize < 5000000){
							$uniqID = $this->uniqidReal();
							$fileNewName = $uniqID.".".$fileActualExt;
							$fileDestination = $_SERVER['DOCUMENT_ROOT']."./TEAM04/public/uploads/photo/".$fileNewName;
							move_uploaded_file($fileTmpName, $fileDestination);
							//$image = base64_encode(file_get_contents(addslashes($image)));
							//$data['user_pic'] = $image;
							//$_SESSION['info']['user_pic'] = $data['user_pic'];
							$_SESSION['info']['user_pic'] = base_url()."public/uploads/photo/".$fileNewName;
							$_SESSION['info']['user_bio'] = $data['user_bio'];
							//$_SESSION['info1']['user_skills'] = $data['user_skills'];
							$data = array();
						}
						else{
							echo "File too big";
							$trigger = false;
						}
					}
					else{
						echo "Error uploading file!";
						$trigger = false;
					}
				}
				else{
					echo "Not allowed file type!";
					$trigger = false;
				}

			}
			if($trigger == true){
				$this->load->model('user_model');
				$result = $this->user_model->createUser($_SESSION['info']);
				$uid = $_SESSION['info']['user_uid'];
				session_unset();
				$_SESSION['user_id'] = $result;
				$_SESSION['user_uid'] = $uid;
				redirect(base_url());
			}

			$this->load->view('FRONT-END Folder/FolioHub SIGN UP PAGES 1-3/index-signup-page3', $output);
		}
	}
		
	public function signup(){
		if(isset($_SESSION['user_id'])){
			redirect(base_url());
		}else{
			$output = array();
			$_SESSION['info'] = $this->input->post();
			$back_again = false;
			if(isset($_SESSION['info']['user_pwdRepeat']) && $_SESSION['info']['user_pwdRepeat'] != null && $back_again === false){
				$this->load->model('user_model');
				if($output['error'] = $this->user_model->checkCreateUser($_SESSION['info'])){
					//will check error na sa model 
				}
				else{
					$back_again = true;
				}
			}
			if($back_again === true){
				redirect(base_url()."users/signup1");
			}
			$this->load->view('FRONT-END Folder/signup/index', $output);
		}
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
					if($fileSize < 5000000){
						$uniqID = $this->uniqidReal();
						$fileNewName = $uniqID.".".$fileActualExt;
						$fileDestination = $_SERVER['DOCUMENT_ROOT']."./TEAM04/public/uploads/photo/".$fileNewName;
						move_uploaded_file($fileTmpName, $fileDestination);
						//$image = base64_encode(file_get_contents(addslashes($image)));
						//$data['user_pic'] = $image;
						//$_SESSION['info']['user_pic'] = $data['user_pic'];
						$_SESSION['info']['user_pic'] = base_url()."public/uploads/photo/".$fileNewName;
						$_SESSION['info']['user_bio'] = $data['user_bio'];
						//$_SESSION['info1']['user_skills'] = $data['user_skills'];
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
			$this->load->model('user_model');
			$result = $this->user_model->createUser($_SESSION['info']);
			$uid = $_SESSION['info']['user_uid'];
			session_unset();
			$_SESSION['user_id'] = $result;
			$_SESSION['user_uid'] = $uid;
			redirect(base_url());
		}


		$this->load->view('FRONT-END Folder/signup/index1');
	}

	public function login(){
		if(isset($_SESSION['user_id'])){
			//page not found
		}else{
			$output = array();
			session_unset();
			$data = array();
			$data = $this->input->post();
			if(isset($data) && $data != null){
				$this->load->model('user_model');
				$return = $this->user_model->loginUser($data['user_uid'], $data['user_pwd']);

				if(is_bool($return)){
					$output['error'] = "Email or Password you entered is incorrect!";
				}
				else{
					$_SESSION['user_id'] = $return[0]['user_id'];
					$_SESSION['user_uid'] = $return[0]['user_uid'];
					redirect(base_url());
				}
			}
			$this->load->view('FRONT-END Folder/signin/index', $output);
		}
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
			//$this->load->view('FRONT-END Folder/viewuser/viewuser', $output);
			$this->load->view('FRONT-END Folder/FolioHub view user/viewuser', $output);
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
			$this->load->view('FRONT-END Folder/FolioHub PAGE NOT FOUND/index-pagenotfound');
		}
	}

	public function addCollege($id){
		if($id == $_SESSION['user_id']){
			$data = array();
			$data = $this->input->post();
			$data['user_id'] = $_SESSION['user_id'];

			if(isset($data['college_name']) && $data['college_name'] != NULL){
				$this->load->model('college_model');
				$college = $this->college_model->createSchool($data);
				redirect(base_url()."users/college/".$_SESSION['user_id']);
			}
			
			$this->load->view('add-college/addcollege');
		}
		else{
			//abang for 404 page not found
		}
	}

	public function updateCollege($school_id){
		if(isset($_SESSION['user_id'])){
			$this->load->model('college_model');
			$college = $this->college_model->getSchool($_SESSION['user_id'], $school_id);

			$output['college'] = $college[0];

			$data = array();
			$data = $this->input->post();

			if(isset($data['college_name']) && $data['college_name'] != NULL){
				$college = $this->college_model->updateSchool($school_id, $data);
				redirect(base_url()."users/college/".$_SESSION['user_id']);
			}
				
			$this->load->view('add-college/updatecollege',$output);
		}
		else{
			//abang for 404 page not found
		}
		
	}

	public function deleteCollege($school_id){
		if(isset($_SESSION['user_id'])){
			$this->load->model('college_model');;
			$this->college_model->deleteSchool($school_id);
			redirect(base_url()."users/college/".$_SESSION['user_id']);
		}
		else{
			//abang for 404 page not found
		}
		

	}

	public function college($id){
		if($id == $_SESSION['user_id']){
			$this->load->model('college_model');
			$college = $this->college_model->getSchool($id);
			
			$output['college'] = $college;
			$output['request'] = $id;
			
			$this->load->view('add-college/viewallcollege', $output);
		}
		else{
			//abang for 404 page not found
		}
	}

	public function employment($id){
		if($id == $_SESSION['user_id']){
			$this->load->model('employment_model');
			$employment = $this->employment_model->getEmployment($id);
			
			$output['employment'] = $employment;
			$output['request'] = $id;
			
			$this->load->view('add-employment/viewallemployment', $output);
		}
		else{
			//abang for 404 page not found
		}
	}

	public function addEmployment($id){
		if($id == $_SESSION['user_id']){
			$data = array();
			$data = $this->input->post();
			$data['user_id'] = $_SESSION['user_id'];

			if(isset($data['employment_company']) && $data['employment_company'] != NULL){
				$this->load->model('employment_model');
				$college = $this->employment_model->createEmployment($data);
				redirect(base_url()."users/employment/".$_SESSION['user_id']);
			}
			
			$this->load->view('add-employment/addemployment');
		}
		else{
			//abang for 404 page not found
		}
	}

	public function updateEmployment($employment_id){
		if(isset($_SESSION['user_id'])){
			$this->load->model('employment_model');
			$employment = $this->employment_model->getEmployment($_SESSION['user_id'], $employment_id);

			$output['employment'] = $employment[0];

			$data = array();
			$data = $this->input->post();

				if(isset($data['employment_company']) && $data['employment_company'] != NULL){
				$college = $this->employment_model->updateEmployment($employment_id, $data);
				redirect(base_url()."users/employment/".$_SESSION['user_id']);
			}
				
			$this->load->view('add-employment/updateemployment', $output);
		}
		else{
			//abang for 404 page not found
		}
	}

	public function deleteEmployment($employment_id){
		if(isset($_SESSION['user_id'])){
			$this->load->model('employment_model');;
			$this->employment_model->deleteEmployment($employment_id);
			redirect(base_url()."users/employment/".$_SESSION['user_id']);
		}
		else{
			//abang for 404 page not found
		}
	}

	public function skill($id){
		if($id == $_SESSION['user_id']){
			$this->load->model('skills_model');
			$skills = $this->skills_model->getSkills($id);
			
			$output['skills'] = $skills;
			$output['request'] = $id;
			
			$this->load->view('add-skill/viewallskill', $output);
		}
		else{
			//abang for 404 page not found
		}
	}

	public function addSkills($id){
		if($id == $_SESSION['user_id']){
			$data = array();
			$data = $this->input->post();
			$data['user_id'] = $_SESSION['user_id'];

			if(isset($data['user_skills']) && $data['user_skills'] != NULL){
				$this->load->model('skills_model');
				$college = $this->skills_model->createSkills($data);
				redirect(base_url()."users/skill/".$_SESSION['user_id']);
			}
			
			$this->load->view('add-skill/addskills');
		}
		else{
			//abang for 404 page not found
		}
	}

	public function updateSkills($skills_id){
		if(isset($_SESSION['user_id'])){
			$this->load->model('skills_model');
			$skills = $this->skills_model->getSkills($_SESSION['user_id'], $skills_id);

			$output['skills'] = $skills[0];

			$data = array();
			$data = $this->input->post();

				if(isset($data['user_skills']) && $data['user_skills'] != NULL){
				$college = $this->skills_model->updateSkills($skills_id, $data);
				redirect(base_url()."users/skill/".$_SESSION['user_id']);
			}
				
			$this->load->view('add-skill/updateskills', $output);
		}
		else{
			//abang for 404 page not found
		}
	}

	public function deleteSkills($skills_id){
		if(isset($_SESSION['user_id'])){
			$this->load->model('skills_model');;
			$this->skills_model->deleteSkills($skills_id);
			redirect(base_url()."users/skill/".$_SESSION['user_id']);
		}
		else{
			//abang for 404 page not found
		}
	}
}

	

