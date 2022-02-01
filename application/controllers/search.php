<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

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

	function __construct() { 
        parent::__construct(); 
         
        // Load pagination library 
        $this->load->library('pagination'); 
         
        // Load post model 
        $this->load->model('project_model'); 
         
        // Per page limit 
        $this->perPage = 12; 
    } 
     
    public function index(){
        $data = array();
        
        
        // Get messages from the session
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        
        // If search request submitted
        if($this->input->post('submitSearch')){
            $inputKeywords = $this->input->post('searchKeyword');
            $searchKeyword = strip_tags($inputKeywords);
            if(!empty($searchKeyword)){
                $this->session->set_userdata('searchKeyword',$searchKeyword);
            }else{
                $this->session->unset_userdata('searchKeyword');
            }
        }if($this->input->post('submitSearchReset')){
            $this->session->unset_userdata('searchKeyword');
        }
        $data['searchKeyword'] = $this->session->userdata('searchKeyword');
        
        // Get rows count
        $conditions['searchKeyword'] = $data['searchKeyword'];
        $conditions['returnType']    = 'count';
        $rowsCount = $this->project_model->getRows3($conditions);
        
        // Pagination config
        $config['base_url']    = base_url().'search/index/';
        $config['uri_segment'] = 3;
        $config['total_rows']  = $rowsCount;
        $config['per_page']    = $this->perPage;

        // Pagination link format 
		$config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';



        $config['prev_link'] = '<i class="fa fa-long-arrow-left"></i>Previous Page';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';


        $config['next_link'] = 'Next Page<i class="fa fa-long-arrow-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        
        // Initialize pagination library
        $this->pagination->initialize($config);
        
        // Define offset
        $page = $this->uri->segment(3);
        $offset = !$page?0:$page;
        
        // Get rows
        $conditions['returnType'] = '';
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        $data['project'] = $this->project_model->getRows3($conditions);
        $data['title'] = 'Members List';
        
        // Load the list page view
        //$this->load->view('browse/browse3', $data);
        $this->load->view('FRONT-END Folder/BROWSE-PAGE(MODIFIED)/browse', $data);
    }
}
