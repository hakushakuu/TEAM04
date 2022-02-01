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
			//FRONT-END Folder\viewproject\viewallproject
			//$this->load->view('project/viewallproject', $output);
			$this->load->view('FRONT-END Folder/viewproject/viewallproject', $output);
		}
		else{
			$this->load->view('FRONT-END Folder\FolioHub PAGE NOT FOUND\index-pagenotfound');
		}	
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
		
	public function add($id=null){
		if(isset($_SESSION['user_id'])){
			if($id != $_SESSION['user_id']){
				redirect(base_url()."project/$id");
			}
			$data = array();
			$data = $this->input->post();
			
			if(isset($data) && $data != NULL){
				//checking ng cover image
				$fileName = $_FILES['project_picture_cover']['name'];
				$coverFileTmpName = $_FILES['project_picture_cover']['tmp_name'];
				$fileSize = $_FILES['project_picture_cover']['size'];
				$fileError = $_FILES['project_picture_cover']['error'];

				$fileExt = explode('.', $fileName);
				$fileActualExt = strtolower(end($fileExt));
				
				$allowed = array('jpg', 'jpeg', 'png');
				
				if(in_array($fileActualExt, $allowed)){
					if($fileError === 0){
						if($fileSize < 15000000){ //15MB
							$uniqID = $this->uniqidReal();
							$fileNewName = $uniqID.".".$fileActualExt;
							$coverFileDestination = $_SERVER['DOCUMENT_ROOT']."/TEAM04/public/uploads/projects/".$fileNewName;
							$data['project_picture'] = base_url()."public/uploads/projects/".$fileNewName;
							$input[0]['project_picture'] = $data['project_picture'];
							$input[0]['is_cover'] = "true";
							$input1[0]['tmp'] = $coverFileTmpName;
							$input1[0]['dst'] = $coverFileDestination;
						}
						else{
							echo "File too big";
							goto pass_error;
						}
					}
					else{
						echo "Error uploading file!";
						goto pass_error;
					}
				}
				else{
					echo "Not allowed file type!";
					goto pass_error;
				}
				//changing index
				//from array[index][i] to array[i][index]
				if($_FILES['project_picture']['name'][0] != NULL){
					$i = 0;
					foreach($_FILES['project_picture']['name'] as $name){
						$data1[$i]['name'] = $name;
						$data1[$i]['type'] = $_FILES['project_picture']['type'][$i];
						$data1[$i]['tmp_name'] = $_FILES['project_picture']['tmp_name'][$i];
						$data1[$i]['error'] = $_FILES['project_picture']['error'][$i];
						$data1[$i]['size'] = $_FILES['project_picture']['size'][$i];
						
						$i++;
					}

					$i = 0;
					//checking per more images 
					$error = false;
					foreach($data1 as $data1){
						$fileName = $data1['name'];
						$FileTmpName = $data1['tmp_name'];
						$fileSize = $data1['size'];
						$fileError = $data1['error'];

						$fileExt = explode('.', $fileName);
						$fileActualExt = strtolower(end($fileExt));
						
						if(in_array($fileActualExt, $allowed)){
							if($fileError === 0){
								if($fileSize < 15000000){ //15MB
									$uniqID = $this->uniqidReal();
									$fileNewName = $uniqID.".".$fileActualExt;
									$tempName[$i] = $FileTmpName;
									$FileDestination = $_SERVER['DOCUMENT_ROOT']."/TEAM04/public/uploads/projects/".$fileNewName;
									$input[$i+1]['project_picture'] = base_url()."public/uploads/projects/".$fileNewName;
									$input[$i+1]['is_cover'] = "false";
									$input1[$i+1]['tmp'] = $FileTmpName;
									$input1[$i+1]['dst'] = $FileDestination;
								}
								else{
									$error = true;
									$output['error'] = "File too big";
									break;
								}
							}
							else{
								$error = true;
								$output['error'] = "Error uploading file!";
								break;
							}
						}
						else{
							$error = true;
							$output['error'] = "Not allowed file type!";
							break;
						}

						$i++;
					}
				}
				pass_error:
				if($error!=true){
					/* print_r($input1['dst']); */
					//execution in moving to local files and database
					$data['project_publisher_id'] = $_SESSION['user_id'];
					$data['project_publisher_name'] = strtoupper($_SESSION['user_name']);
					$this->load->model('project_model');
					$project_id = $this->project_model->createProject($data);
					
					//insertion to db
					$i = 0;
					foreach($input as $ilalagay){
						$ilalagay['user_id'] = $_SESSION['user_id'];
						$ilalagay['project_id'] = $project_id;

						$this->load->model('project_image_model');
						$this->project_image_model->insert_image($ilalagay);
					}
					//moving files locally
					foreach($input1 as $ilalagay){
						move_uploaded_file($ilalagay['tmp'], $ilalagay['dst']);
					}
					

					
					redirect(base_url()."project/".$_SESSION['user_id']);
				} 
			}
			//$this->load->view('FRONT-END Folder/modified add project/index');
			$this->load->view('FRONT-END Folder/FolioHub ADD PROJECT/index-addproject-page');
			
		}
		else{
			$this->load->view('FRONT-END Folder\FolioHub PAGE NOT FOUND\index-pagenotfound');
		}	
	}

	public function view($project_id,$id){
		if(isset($_SESSION['user_id'])){
			
			$this->load->model('project_model');
			$this->load->model('project_image_model');
			$project = $this->project_model->getProject($id, $project_id);
			$image  = $this->project_image_model->getProjectImage($project_id);

			if(is_bool($project)){
				//kapag walang nahanap
			}
			else{
				$output['project'] = $project['0'];
				$output['request'] = $id;
				$output['image'] = $image;
				$output['project_id'] = $project_id;
				//$this->load->view('project/viewproject', $output);
				$this->load->view('FRONT-END Folder/viewproject/viewproject', $output);
			}
			
		}
		else{
			redirect(base_url()."users/signup");
		}	
	}

	public function change_cover($project_id, $project_picture_id, $id){		
		$this->load->model('project_image_model');
		$this->load->model('project_model');

		if($_SESSION['user_id'] != $id){
			redirect(base_url()."project/view/$project_id/$id");
		}
		//get the value of the project_picture_id of the current project_picture_cover
		//automatically the current project_picture_cover is in the $image[0]['project_picture_id']
		$image = $this->project_image_model->getProjectImage($project_id);

		$image  = $this->project_image_model->changeCover($project_picture_id, $image[0]['project_picture_id']);
		$project = $this->project_model->getProject(null, $project_id);
		$project[0]['project_picture'] = $image;
		$this->project_model->updateProject($project[0]);
		redirect(base_url()."project/view/".$project_id."/".$_SESSION['user_id']);
	}

	public function delete_pic($project_id, $project_picture_id, $id){
		if($_SESSION['user_id'] != $id){
			redirect(base_url()."project/view/$project_id/$id");
		}
		$this->load->model('project_image_model');
		$this->project_image_model->delete_pic($project_id, $project_picture_id);

		redirect(base_url()."project/view/".$project_id."/".$_SESSION['user_id']);
	}

	public function delete($project_id, $id){
		if(isset($_SESSION['user_id'])){
			if($_SESSION['user_id'] != $id){
				redirect(base_url()."project/view/$project_id/$id");
			}
			$this->load->model('project_model');
			$project = $this->project_model->deleteProject($project_id);
			redirect(base_url()."project/".$_SESSION['user_id']);
		}
		else{
			$this->load->view('FRONT-END Folder\FolioHub PAGE NOT FOUND\index-pagenotfound');
		}	
		
	}

	public function update($project_id,$id){
		if(isset($_SESSION['user_id'])){
			if($_SESSION['user_id'] != $id){
				redirect(base_url()."project/view/$project_id/$id");
			}
			$this->load->model('project_model');
			$project = $this->project_model->getProject($_SESSION['user_id'], $project_id);
				
			$output['project'] = $project[0];
			
			$data = array();
			$data = $this->input->post();
			
			
			if(isset($data['project_details']) && $data['project_details'] != null){
				$ilalagay = $project[0];
				$ilalagay = $data;
				$ilalagay['project_id'] = $project_id;
				$this->load->model('project_model');
				$this->project_model->updateProject($ilalagay);
				redirect(base_url()."project/view/".$project_id."/".$_SESSION['user_id']);
			}
			//$this->load->view('project/updateproject',$output);
			$this->load->view('FRONT-END Folder/FolioHub UPDATE PROJECT/index-updateproject-page',$output);
		}
		else{
			$this->load->view('FRONT-END Folder\FolioHub PAGE NOT FOUND\index-pagenotfound');
		}		
	}

	public function addprojectpic($project_id, $id){
		if(isset($_SESSION['user_id'])){
			if($_SESSION['user_id'] != $id){
				redirect(base_url()."project/view/$project_id/$id");
			}
			$this->load->model('project_model');
			$project = $this->project_model->getProject($_SESSION['user_id'], $project_id);
			$output['project'] = $project[0];

			
			if($this->input->post('trigger')){
				$allowed = array('jpg', 'jpeg', 'png');
			
				//changing index
				//from array[index][i] to array[i][index]
				if($_FILES['project_picture']['name'][0] != NULL){
					$i = 0;
					foreach($_FILES['project_picture']['name'] as $name){
						$data1[$i]['name'] = $name;
						$data1[$i]['type'] = $_FILES['project_picture']['type'][$i];
						$data1[$i]['tmp_name'] = $_FILES['project_picture']['tmp_name'][$i];
						$data1[$i]['error'] = $_FILES['project_picture']['error'][$i];
						$data1[$i]['size'] = $_FILES['project_picture']['size'][$i];
						
						$i++;
					}
					$i = 0;
					//checking per more images 
					$error = false;
					foreach($data1 as $data1){
						$fileName = $data1['name'];
						$FileTmpName = $data1['tmp_name'];
						$fileSize = $data1['size'];
						$fileError = $data1['error'];

						$fileExt = explode('.', $fileName);
						$fileActualExt = strtolower(end($fileExt));
						
						if(in_array($fileActualExt, $allowed)){
							if($fileError === 0){
								if($fileSize < 15000000){ //15MB
									$uniqID = $this->uniqidReal();
									$fileNewName = $uniqID.".".$fileActualExt;
									$tempName[$i] = $FileTmpName;
									$FileDestination = $_SERVER['DOCUMENT_ROOT']."/TEAM04/public/uploads/projects/".$fileNewName;
									$input[$i]['project_picture'] = base_url()."public/uploads/projects/".$fileNewName;
									$input[$i]['is_cover'] = "false";
									$input1[$i]['tmp'] = $FileTmpName;
									$input1[$i]['dst'] = $FileDestination;
								}
								else{
									$error = true;
									$output['error'] = "File too big";
									break;
								}
							}
							else{
								$error = true;
								$output['error'] = "Error uploading file!";
								break;
							}
						}
						else{
							$error = true;
							$output['error'] = "Not allowed file type!";
							break;
						}
					$i++;
					}
				}
				if($error!=true){
					
					//insertion to db
					$i = 0;
					foreach($input as $ilalagay){
						$ilalagay['user_id'] = $_SESSION['user_id'];
						$ilalagay['project_id'] = $project_id;

						$this->load->model('project_image_model');
						$this->project_image_model->insert_image($ilalagay);
					}
					//moving files locally
					foreach($input1 as $ilalagay){
						move_uploaded_file($ilalagay['tmp'], $ilalagay['dst']);
					}
				}
				redirect(base_url()."project/view/".$project_id."/".$id);
			}
			$this->load->view('FRONT-END Folder\FolioHub ADD PROJECT\index-addpic-page.php', $output);
		}
		else{
			$this->load->view('FRONT-END Folder\FolioHub PAGE NOT FOUND\index-pagenotfound');
		}		
		
	}
}