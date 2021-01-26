<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class category_model extends CI_Model {

	public function insert_category ($data){

		$values = "'" . implode("','", $data) . "'";

		$insert_query = "INSERT INTO`category`(`category_name`) VALUES (".$values.")";

		$query = $this->db->query($insert_query);
		
		if ($query) {

			$output = array('status' => 200, 'message'=> "Data Inserted Successfully" );
			return $output;
		}else{

			$output = array('status' => 404, 'message'=> "Data Inserted Failed" );
			return $output;

		}

	}

}