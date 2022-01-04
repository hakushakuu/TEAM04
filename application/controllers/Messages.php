<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index()
    {
        $this->load->model('messages_model');

        $data['courses'] = $this->course_model->getCourses();

        $this->sitelayout->loadTemplate('users/account_settings', $data);
    }
    
    public function addMessage() {
        $data = array();
        $post = $this->input->post();
        if(isset($post) && count($post) > 0) {
            $this->load->model('message_model');

            $id = null;
            $id = $this->message_model->addMessage($post);

            if(isset($id) && !is_bool($id)) {
                $data['message'] = "Message Sent";
            
                redirect("/messages/inbox");
            } else {
                $data['message'] = "Error adding message. Kindly check the details and try again.";
            }
        }

        $this->load->model('user_model');

        $data['senders'] = $this->user_model->getUser();
        $data['receivers'] = $this->user_model->getUser();

        $this->load->view('messages/addMessage', $data);
    }

    public function getMessage($messageId = null) {
        $data = array();
        if(!isset($messageId) && $messageId == null){
            $data['message'] = "Error loading message";
        } else {
            $this->load->model('message_model');
            $messages = $this->message_model->getMessage($messageId);

            $data['message'] = $messages;
        }
        
        $this->load->model('user_model');

        $data['sender'] = $this->user_model->getUser($messages[0]['senderId']);
        $data['receiver'] = $this->user_model->getUser($messages[0]['receiverId']);
       
        $this->load->view('messages/viewMessages', $data);
    }

    public function time_passed($timestamp){
        //type cast, current time, difference in timestamps
        $timestamp      = (int) $timestamp;
        $current_time   = time();
        $diff           = $current_time - $timestamp;
        
        //intervals in seconds
        $intervals      = array (
            'year' => 31556926, 'month' => 2629744, 'week' => 604800, 'day' => 86400, 'hour' => 3600, 'minute'=> 60
        );
        
        //now we just find the difference
        if ($diff == 0)
        {
            return 'just now';
        }    
    
        if ($diff < 60)
        {
            return $diff == 1 ? $diff . ' second ago' : $diff . ' seconds ago';
        }        
    
        if ($diff >= 60 && $diff < $intervals['hour'])
        {
            $diff = floor($diff/$intervals['minute']);
            return $diff == 1 ? $diff . ' minute ago' : $diff . ' minutes ago';
        }        
    
        if ($diff >= $intervals['hour'] && $diff < $intervals['day'])
        {
            $diff = floor($diff/$intervals['hour']);
            return $diff == 1 ? $diff . ' hour ago' : $diff . ' hours ago';
        }    
    
        if ($diff >= $intervals['day'] && $diff < $intervals['week'])
        {
            $diff = floor($diff/$intervals['day']);
            return $diff == 1 ? $diff . ' day ago' : $diff . ' days ago';
        }    
    
        if ($diff >= $intervals['week'] && $diff < $intervals['month'])
        {
            $diff = floor($diff/$intervals['week']);
            return $diff == 1 ? $diff . ' week ago' : $diff . ' weeks ago';
        }    
    
        if ($diff >= $intervals['month'] && $diff < $intervals['year'])
        {
            $diff = floor($diff/$intervals['month']);
            return $diff == 1 ? $diff . ' month ago' : $diff . ' months ago';
        }    
    
        if ($diff >= $intervals['year'])
        {
            $diff = floor($diff/$intervals['year']);
            return $diff == 1 ? $diff . ' year ago' : $diff . ' years ago';
        }
    }

    public function getMessageAsReceiver() {

        // get all messages where you as receiverId
        // return to view listing all messages na ikaw ang receiver
    }

    public function inbox(){

		if(isset($_SESSION['user_id'])){
				$id = $_SESSION['user_id'];
            
			$this->load->model('message_model');
            $this->load->model('user_model');
			
            $output['message'] = $this->message_model->getMessage(null, $id, 'receiver');
            $user = array();
            $i = 0 ;
            foreach($output['message'] as $message){
                $user[] = $this->user_model->getUser($output['message'][$i]['senderId']);
                $output['message'][$i]['dateCreated'] = $this->time_passed($output['message'][$i]['dateCreated']);
                $output['message'][$i] = array_merge($output['message'][$i],$user[$i][0]);
                $i++;
            }
			$this->load->view('users/inbox', $output);
        
		}
		else{
			//abang for 404 page not found
		}
    }

    public function outbox(){

		if(isset($_SESSION['user_id'])){
				$id = $_SESSION['user_id'];
            
			$this->load->model('message_model');
            $this->load->model('user_model');
			
            $output['message'] = $this->message_model->getMessage(null, $id, 'sender');
            $user = array();
            $i = 0 ;
            foreach($output['message'] as $message){
                $user[] = $this->user_model->getUser($output['message'][$i]['receiverId']);
                $output['message'][$i]['dateCreated'] = $this->time_passed($output['message'][$i]['dateCreated']);
                $output['message'][$i] = array_merge($output['message'][$i],$user[$i][0]);
                $i++;
            }
			$this->load->view('users/outbox', $output);
        
		}
		else{
			//abang for 404 page not found
		}
    }

}
