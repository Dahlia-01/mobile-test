<?php

class Model {

	function __construct() {
		$this->db = new Database();
	}
	
	function returnjson($result){
	//header('Content-type: application/json');	
	return json_encode($result);
	
	}

}