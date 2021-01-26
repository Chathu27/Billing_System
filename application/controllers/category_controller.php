<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class category_controller extends CI_Controller {

		public function __construct(){ 
	    parent::__construct();
	    $this->load->model('category_model');  

	    if (!isset($this->session->userdata['logged_in'])) {
        	header('Location: '.base_url().'index.php');
        }
	}


    public function category_view(){
        
        $this->load->view('category_view');
    }

    public function add_catergory(){

    	$data = array('category' =>$this->input->post ('category_name'), );

    	$result = $this->category_model->insert_category($data);

    	$set_json_output = json_encode($result,JSON_PRETTY_PRINT); 
		$output =  $this->output->set_output($set_json_output);

	 	return $output;
    }

}