<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message_model extends CI_Model {

	private $table = "messages";

	public function getMessage($messageId = null, $userId = null, $userType = null) {
        if(isset($messageId) && $messageId != null) {
            $this->db->where('id', $messageId);
        }
		if(isset($userType) && $userType != null) {
		    if($userType == "sender") {
                $this->db->where('senderId', $userId);
            } else {
                $this->db->where('receiverId', $userId);
            }
		}

		$query = $this->db->get($this->table);

		return $query->result_array();
	}

	public function addMessage($data) {
        $data['dateCreated'] = time();
		$data['messageStatus'] = "Sent";
	//@TODO create way to add unique messageId
        $this->db->insert($this->table, $data);

        return $this->db->insert_id();
	}
	
	public function updateMessage($data) {

		$this->db->where('id', $data['id']);
		unset($data['id']);
		$this->db->update($this->table, $data);

		return true;
	}

	public function updateMessageStatus($messageId, $status) {
		$this->db->where('messageStatus', $status);
		$this->db->update($this->table, array('id' => $messageId));

		return true;
	}
}
