<?php

class Bootstrap {

	function __construct() {

		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, '/');
		$url = explode('/', $url);

		//print_r($url);
		
		if (empty($url[0])) {
         
           $url[0]="Index";
       
		
			require 'controllers/index.php';
			$controller = new Index();
            $controller = new $url[0];
		  $controller->loadModel($url[0]);
			$controller->index();
			return false;
		}


		$file = 'controllers/' . $url[0] . '.php';
		if (file_exists($file)) {

			require $file;
		} 




		elseif (is_numeric($url[0])) {
			header('location: ./registration?ref='.$url[0]);
		}

		else {
			$this->error();
		}
		
		$controller = new $url[0];
		$controller->loadModel($url[0]);
		//echo $url[0];
		// calling methods
        
		if (isset($url[2])) {
			if (method_exists($controller, $url[1])) {
				$controller->{$url[1]}($url[2]);
			} else {
				$this->error();
			}
		} else {
			if (isset($url[1])) {
				if (method_exists($controller, $url[1])) {
					$controller->{$url[1]}();
				} else {
					$this->error();
				}
			} else {
				
				$controller->index();
			}
		}
		
		
	}
	
	function error() {
		require 'controllers/error.php';
		$controller = new Error();
		$controller->index();
		return false;
	}

}