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
            
                redirect("/messages/getMessage/".$id);
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

    public function getMessageAsReceiver() {

        // get all messages where you as receiverId
        // return to view listing all messages na ikaw ang receiver
    }
}
