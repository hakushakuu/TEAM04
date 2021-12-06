<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	private $table = "user";

	public function __construct(){
		parent::__construct();
	}

	public function createUser($data){
		
		/* if(empty($first_name) || empty($last_name) || empty($email) || empty($username) || empty($password) || empty($password_repeat)){
			echo "noInput";
			return;
		} */
		if($this->uidExist($data['user_uid'])){
			echo "uidE";
			return false;
		}
		else if($this->emailExist($data['user_email'])){
			echo "emailE";
			return false;
		}
		else if($this->pwdMatch($data['user_pwd'], $data['user_pwdRepeat'])){
			echo "pwdM";
			return false;
		}
		else{
			/* $data['user_pwd'] = password_hash($data['user_pwd'], PASSWORD_DEFAULT); */
			$data['user_pwd'] = md5($data['user_pwd']);
			unset($data['user_pwdRepeat']);
			$this->db->insert($this->table, $data);
			return true;
		}
	}

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

	public function getUser($id = null){
		if(isset($id) && $id != null){
			$this->db->where('user_id', $id);
		}

		$query = $this->db->get($this->table);
		return $query->result_array();
	}


	
	
}