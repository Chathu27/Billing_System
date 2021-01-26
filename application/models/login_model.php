<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model {


	public function get_login ($data){

		$select_query = "SELECT * FROM `login` WHERE `user_name`='".$data['user_name']."' and `password`= '".$data['password']."' ";

		
		$query = $this->db->query($select_query);

		$results = $query->result();

		if (sizeof($results)  == 1) {
			$output = array(
				'status' =>200 ,
				'message' =>'valid user' ,
				'data' => $results[0]


				 );
			return $output;
		}else{

				 $output = array(
				'status' =>200 ,
				'message' =>'Invalid user'

			);
				 return $output;

		}


	}
}