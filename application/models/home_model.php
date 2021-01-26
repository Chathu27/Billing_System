<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home_model extends CI_Model {



public function insert_product_data($data){

	$values = "'" . implode("','", $data) . "'";

	$insert_query = "INSERT INTO  `products`(`item_name`,`catergory`,`quantity`, `price`) VALUES (".$values.")";


	$query = $this->db->query($insert_query);

		if ($query) {

			$output = array(
				'status' => 200,  
				'message' => "Data Inserted Successfully", 
			);

			return $output;
			 

		}else{

			$output = array(
				'status' => 404,  
				'message' => "Data Inserted Faild", 
			);

			return $output;  
		}

}


	public function select_catergories(){
		$select = "SELECT* FROM category ORDER BY category_id DESC";

		$query = $this->db->query($select);

		if ($query) {

			$output = array(
				'status' => 200 ,
				'data' => $query->result(),
				
			);

			return $output;
		}else{

			$output = array(
				'status' => 404, 
				'data' => "Invalid query", );
				
				return $output;
		}
	}

	
}
	