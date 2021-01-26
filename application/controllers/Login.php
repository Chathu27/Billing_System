<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){ 
	   parent::__construct();  
	   $this->load->model('login_model');

	}


	public function index()
	{
		$this->load->view('login');
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function check_login()
	{


		$data  = array('user_name' => $this->input->get('user_name'), 'password'=> $this->input->get('password'));
		
		$result = $this->login_model->get_login($data);

		if ($result['status'] == '200') {

			$newdata = array('user_name' => $result['data']->user_name,'role' => $result['data']->role,'user_id' => $result['data']->user_id,
			'logged_in' => TRUE
		);


			$this->session->set_userdata($newdata);

	
			if ($this->session->userdata['role']== 1) {

				header('Location: '.base_url().'index.php/home_controller');
			}else{   
		        header('Location: '.base_url().'index.php');  
		    }  

		}
	}

}



