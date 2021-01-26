<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class home_controller extends CI_Controller {


    public function __construct() {

        parent::__construct(); 

        $this->load->model('home_model');

         if (!isset($this->session->userdata['logged_in'])) {
        	header('Location: '.base_url().'index.php');

        }

     } 

    public function index(){
        
        $this->load->view('home_page');
    }



    public function add_products_data (){

        $data = array(
            'item_name' =>$this->input->post('item_name') ,
            'catergory' =>$this->input->post('catergory') ,
            'quantity' =>$this->input->post('quantity') ,
            'price' =>$this->input->post('price'),
         );

        $result = $this->home_model->insert_product_data($data);

        $set_json_output = json_encode($result,JSON_PRETTY_PRINT); 
        $output =  $this->output->set_output($set_json_output);
        return $output;

    }

    public function select_all_category(){

        $result = $this->home_model->select_catergories();

        $set_json_output = json_encode($result,JSON_PRETTY_PRINT);

        $output = $this->output->set_output($set_json_output);

        return $output;

    }
 
}