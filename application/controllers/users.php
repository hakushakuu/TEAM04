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
					$_SESSION['user_name'] = $return[0]['user_firstName']." ".$return[0]['user_lastName'];
					redirect(base_url());
				}
			}
			$this->load->view('FRONT-END Folder/FolioHub SIGN UP PAGES 1-3/index-signin-page', $output);
		}	
	}

	public function signup(){
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
				redirect(base_url()."users/signup1"); 
			}

			$this->load->view('FRONT-END Folder/FolioHub SIGN UP PAGES 1-3/index-signup-page1', $output);
		}		
	}

	public function signup1(){
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
					redirect(base_url()."users/signup2"); 
					
				}		
			}
			$this->load->view('FRONT-END Folder/FolioHub SIGN UP PAGES 1-3/index-signup-page2', $output);
		}
			
	}

	public function signup2(){
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
							$fileDestination = APPPATH."../public/uploads/photo/".$fileNewName;
							move_uploaded_file($fileTmpName, $fileDestination);
							$_SESSION['info']['user_pic'] = base_url()."public/uploads/photo/".$fileNewName;
							$_SESSION['info']['user_bio'] = $data['user_bio'];
							$data = array();
						}
						else{
							$output['error'] = "File too big";
							$trigger = false;
						}
					}
					else{
						$output['error'] = "Error uploading file!";
						$trigger = false;
					}
				}
				else{
					$output['error'] = "Not allowed file type!";
					$trigger = false;
				}

			}
			if($trigger == true){
				$this->load->model('user_model');
				$result = $this->user_model->createUser($_SESSION['info']);
				$uid = $_SESSION['info']['user_uid'];
				$full_name = ['info']['user_firstName']." ".['info']['user_lastName'];
				session_unset();
				$_SESSION['user_id'] = $result;
				$_SESSION['user_uid'] = $uid;
				$_SESSION['user_name'] = $full_name;
				redirect(base_url());
			}

			$this->load->view('FRONT-END Folder/FolioHub SIGN UP PAGES 1-3/index-signup-page3', $output);
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
			$this->load->view('FRONT-END Folder/FolioHub PAGE NOT FOUND/index-pagenotfound');
		}
	}

	public function settings(){
		if(isset($_SESSION['user_id'])){
			$this->load->model('user_model');
			$data = array();
			$ilalagay = array();
			$data = $this->input->post();
			$user = $this->user_model->getUser($_SESSION['user_id']);
			$output['user'] = $user[0];
			
			if($this->input->post('submit')){
				$ilalagay['user_id'] = $_SESSION['user_id'];
				$ilalagay['user_firstName'] = $this->input->post('user_firstName');
				$ilalagay['user_lastName'] = $this->input->post('user_lastName');
				$ilalagay['user_email'] = $this->input->post('user_email');
				$ilalagay['user_uid'] = $this->input->post('user_uid');
				$ilalagay['user_number'] = $this->input->post('user_number');
				$ilalagay['user_bio'] = $this->input->post('user_bio');
				$output['error'] = $this->user_model->updateUser($ilalagay);
				if(is_bool($output['error'])){
					$_SESSION['user_name'] = $ilalagay['user_firstName']." ".$ilalagay['user_lastName'];
					$_SESSION['user_uid'] = $ilalagay['user_uid'];
				}
			}else if($this->input->post('submit1')){
				$newPwd = $this->input->post('user_pwd');
				$repeatNewPwd = $this->input->post('user_pwdRepeat');
				$oldPwd = $this->input->post('user_oldPwd');
				$ilalagay = $user[0];

				if($this->user_model->verify_password($oldPwd, $_SESSION['user_id'])){
					$output['error'] = "Old password is incorrect";
				}
				else if($newPwd != $repeatNewPwd){
					$output['error'] = "Passwords do not match";
				}
				else{
					$ilalagay['user_id'] = $_SESSION['user_id'];
					$ilalagay['user_pwd'] = $newPwd;
					$output['error'] = $this->user_model->updateUser($ilalagay);
				}	
			}else if($this->input->post('submit2')){
				$pwd = $this->input->post('user_pwd');
				$repeatPwd = $this->input->post('user_pwdRepeat');

				if($pwd != $repeatPwd){
					$output['error'] = "Passwords do not match";
				}
				else if($this->user_model->verify_password($pwd, $_SESSION['user_id'])){
					$output['error'] = "Password is incorrect";
				}
				else{
					$return = $this->user_model->deleteAccount($pwd, $_SESSION['user_id']);
					if($return == true){
						session_unset();
						session_destroy();
						redirect(base_url());
					}
				}
			}else if($this->input->post('pic_trigger')){

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
							$fileDestination = APPPATH."../public/uploads/photo/".$fileNewName;
							move_uploaded_file($fileTmpName, $fileDestination);
							$ilalagay['user_pic'] = base_url()."public/uploads/photo/".$fileNewName;
							$ilalagay['user_id'] = $_SESSION['user_id'];
							$output['error'] = $this->user_model->updateUser($ilalagay);
						}
						else{
							$output['error'] = "File too big";
						}
					}
					else{
						$output['error'] = "Error uploading file!";
					}
				}
				else{
					$output['error'] = "Not allowed file type!";
				}
				
				
			}

			$user = $this->user_model->getUser($_SESSION['user_id']);
			$output['user'] = $user[0];
			$this->load->view('FRONT-END Folder/FolioHub Account Settings/index', $output);
		}
		else{
			$this->load->view('FRONT-END Folder/FolioHub PAGE NOT FOUND/index-pagenotfound');
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
			$this->load->view('FRONT-END Folder/FolioHub PAGE NOT FOUND/index-pagenotfound');
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
			$this->load->view('FRONT-END Folder/FolioHub PAGE NOT FOUND/index-pagenotfound');
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
			$this->load->view('FRONT-END Folder/viewuser/viewuser', $output);
		}
		else{
			$this->load->view('FRONT-END Folder/FolioHub PAGE NOT FOUND/index-pagenotfound');
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
				redirect(base_url()."users/education/".$_SESSION['user_id']);
			}
			
			//$this->load->view('add-college/addcollege');
			$this->load->view('FRONT-END Folder/FolioHub ADD EDUCATION/index-add-education');
		}
		else{
			$this->load->view('FRONT-END Folder/FolioHub PAGE NOT FOUND/index-pagenotfound');
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
				redirect(base_url()."users/education/".$_SESSION['user_id']);
			}
				
			//$this->load->view('add-college/updatecollege',$output);
			$this->load->view('FRONT-END Folder/FolioHub ADD EDUCATION/index-update-education',$output);
		}
		else{
			$this->load->view('FRONT-END Folder/FolioHub PAGE NOT FOUND/index-pagenotfound');
		}
		
	}

	public function deleteCollege($school_id){
		if(isset($_SESSION['user_id'])){
			$this->load->model('college_model');;
			$this->college_model->deleteSchool($school_id);
			redirect(base_url()."users/education/".$_SESSION['user_id']);
		}
		else{
			$this->load->view('FRONT-END Folder/FolioHub PAGE NOT FOUND/index-pagenotfound');
		}
		

	}

	public function education($id){
		if($id == $_SESSION['user_id']){
			$this->load->model('college_model');
			$college = $this->college_model->getSchool($id);
			
			$output['college'] = $college;
			$output['request'] = $id;
			
			//$this->load->view('add-college/viewallcollege', $output);
			$this->load->view('FRONT-END Folder/FolioHub VIEW EDUCATION/view-educ', $output);
		}
		else{
			$this->load->view('FRONT-END Folder/FolioHub PAGE NOT FOUND/index-pagenotfound');
		}
	}

	public function employment($id){
		if($id == $_SESSION['user_id']){
			$this->load->model('employment_model');
			$employment = $this->employment_model->getEmployment($id);
			
			$output['employment'] = $employment;
			$output['request'] = $id;
			
			//$this->load->view('add-employment/viewallemployment', $output);
			$this->load->view('FRONT-END Folder/FolioHub VIEW EMPLOY/view-employment', $output);
		}
		else{
			$this->load->view('FRONT-END Folder/FolioHub PAGE NOT FOUND/index-pagenotfound');
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
			
			//$this->load->view('add-employment/addemployment');
			$this->load->view('FRONT-END Folder/FolioHub ADD EMPLOYMENT/index-addemployment');
		}
		else{
			$this->load->view('FRONT-END Folder/FolioHub PAGE NOT FOUND/index-pagenotfound');
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
			
			//$this->load->view('add-employment/updateemployment', $output);
			$this->load->view('FRONT-END Folder/FolioHub UPDATE EMPLOYMENT/index-updateemployment', $output);
		}
		else{
			$this->load->view('FRONT-END Folder/FolioHub PAGE NOT FOUND/index-pagenotfound');
		}
	}

	public function deleteEmployment($employment_id){
		if(isset($_SESSION['user_id'])){
			$this->load->model('employment_model');;
			$this->employment_model->deleteEmployment($employment_id);
			redirect(base_url()."users/employment/".$_SESSION['user_id']);
		}
		else{
			$this->load->view('FRONT-END Folder/FolioHub PAGE NOT FOUND/index-pagenotfound');
		}
	}

	public function skill($id){
		if($id == $_SESSION['user_id']){
			$this->load->model('skills_model');
			$skills = $this->skills_model->getSkills($id);
			
			$output['skills'] = $skills;
			$output['request'] = $id;
			
			//$this->load->view('add-skill/viewallskill', $output);
			$this->load->view('FRONT-END Folder/FolioHub ADD SKILL/view-skills', $output);
		}
		else{
			$this->load->view('FRONT-END Folder/FolioHub PAGE NOT FOUND/index-pagenotfound');
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
			
			//$this->load->view('add-skill/addskills');
			$this->load->view('FRONT-END Folder/FolioHub ADD SKILL/index-addskill');
		}
		else{
			$this->load->view('FRONT-END Folder/FolioHub PAGE NOT FOUND/index-pagenotfound');
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
			$this->load->view('FRONT-END Folder/FolioHub PAGE NOT FOUND/index-pagenotfound');
		}
	}

	public function deleteSkills($skills_id){
		if(isset($_SESSION['user_id'])){
			$this->load->model('skills_model');;
			$this->skills_model->deleteSkills($skills_id);
			redirect(base_url()."users/skill/".$_SESSION['user_id']);
		}
		else{
			$this->load->view('FRONT-END Folder/FolioHub PAGE NOT FOUND/index-pagenotfound');
		}
	}
}

	

