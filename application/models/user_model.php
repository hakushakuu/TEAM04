<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	private $table = "user";

	public function __construct(){
		parent::__construct();
	}

	public function checkCreateUser($data){
		
		if($this->uidExist($data['user_uid'])){
			return "This username is already taken";
		}
		else if(strlen($data['user_uid']) > 30){
			return "Long username. Atmost 30 characters";
		}
		else if(strlen($data['user_uid']) < 6){
			return "Short username. Atleast 6 characters";
		}
		else if(preg_match('/\s/',$data['user_uid'])){
			return "Spaces are not allowed";
		}
		else if($this->emailExist($data['user_email'])){
			return "This email is already in used";
		}
		else if($this->pwdMatch($data['user_pwd'], $data['user_pwdRepeat'])){
			return "Passwords do not match";
		}
		else{
			return false;
		}
	}

	public function createUser($data){
			$data['user_pwd'] = md5($data['user_pwd']);
			unset($data['user_pwdRepeat']);
			$this->db->insert($this->table, $data);
			$last_id = $this->db->insert_id();
			return $last_id;
	}

	/* public function newUser($data){
		$this->db->insert($this->table, $data);
	} */

	public function loginUser($uid, $pwd){
		$this->db->where('user_uid', $uid)
			->where('user_pwd', md5($pwd))
			->or_where('user_email', $uid)
			->where('user_pwd', md5($pwd));

		$query = $this->db->get($this->table);
		/* echo $this->db->last_query(); */

		$return = $query->result_array();

		/* $checkPwd = password_verify($pwd, $return['user_pwd']); */
		/* echo ($return['user_pwd']); */
		/* print_r(array_keys($return)); */
		

		if(count($return) !== 0 && $return[0]['user_status'] == 'Active'){
			return $return;
		}
		return false;
	}

	public function deleteAccount($password_repeat, $id){
		if($this->verify_password($password_repeat, $id)){
			return false;
		}
		else{
			$this->db->where('user_id', $id);
			$data['user_status'] = 'Inactive';
			$this->db->update($this->table, $data);
			return true;
		}
	}

	public function updateUser($data){

		if($this->update_uidExist($data['user_uid'], $data['user_id'])){
			echo "uidE";
			return;
		}
		else if($this->update_emailExist($data['user_email'], $data['user_id'])){
			echo "emailE";
			return;
		}
		else if($this->pwdMatch($data['user_pwd'], $data['user_pwdRepeat'])){
			echo "pwdM";
			return;
		}
		else if(empty($data['user_pwd'])){
			echo "noPwd";
			return;
		}
		else{
			/* $data['user_pwd'] = password_hash($data['user_pwd'], PASSWORD_DEFAULT); */
			$this->db->where('user_id', $data['user_id']);
			unset($data['user_id']);
			unset($data['user_pwdRepeat']);
			$data['user_pwd'] = md5($data['user_pwd']);

			$this->db->update($this->table, $data);	
		}
	}

	public function uidExist($username){
		if(isset($username) && $username != null){
			$this->db->where('user_uid', $username);
		}

		$query = $this->db->get($this->table);
		$return = $query->result_array();

		if(count($return) != 0){
			return true;
		}

		return false;
	}

	public function emailExist($email){
		if(isset($email) && $email != null){
			$this->db->where('user_email', $email);
		}

		$query = $this->db->get($this->table);
		$return = $query->result_array();

		if(count($return) != 0){
			return true;
		}

		return false;
	}

	public function update_uidExist($username, $id){
		if(isset($username) && $username != null){
			$this->db->where('user_uid', $username);
		}

		$query = $this->db->get($this->table);
		$return = $query->result_array();

		if(count($return) != 0 && $id != $return[0]['user_id']){
			return true;
		}

		return false;
	}

	public function update_emailExist($email, $id){
		if(isset($email) && $email != null){
			$this->db->where('user_email', $email);
		}

		$query = $this->db->get($this->table);
		$return = $query->result_array();

		if(count($return) != 0 && $id != $return[0]['user_id']){
			return true;
		}

		return false;
	}

	public function pwdMatch($password, $password_repeat){
		if($password !== $password_repeat){
			return true;
		}
		else{
			return false;
		}
	}

	public function verify_password($password_repeat, $id){
		$this->db->where('user_id', $id);

		$query = $this->db->get($this->table);
		/* echo $this->db->last_query(); */

		$return = $query->result_array();
		if($this->pwdMatch($return[0]['user_pwd'], md5($password_repeat))){
			return true;
		}
		else{
			return false;
		}
	}

	public function getUser($id = null, $keywords = null){
		if(isset($id) && $id != null){
			$this->db->where('user_id', $id);
		}
		if(isset($keywords) && $keywords != null){
			$seperated_keywords = explode(" ",$keywords);
			$this->db->where_in('user_firstName', $seperated_keywords);
			$this->db->or_where_in('user_lastName', $seperated_keywords);
			$this->db->or_like('user_firstName', $keywords);
			$this->db->or_like('user_lastName', $keywords);
			$this->db->or_like('user_uid', $keywords);
		}
		$query = $this->db->get($this->table);
		return $query->result_array();
	}


	
	
}