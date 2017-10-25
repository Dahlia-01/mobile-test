<?php

class View {
public $data = array();
	function __construct() {
		//echo 'this is the view';
		//$this->view->logged = Session::get('loggedIn');
		//$this->view->loggedType = Session::get('loggedType');

	}

	public function render($name, $noInclude, $message)
	{
		if ($noInclude == true) {

			extract($this->data);
			require 'views/' . $name . '.php';		
		}
		else {
			extract($this->data);
			//var_dump($this->view->loggedType);
			if($message==1){
			require 'views/common/header.php';
			require 'views/' . $name . '.php';
			require 'views/common/footer.php';	
			}elseif($message==2){
                require 'views/common/header2.php';
			require 'views/' . $name . '.php';
			require 'views/common/footer.php';	
            }elseif($message==3){
			require 'views/common/header3.php';
			require 'views/' . $name . '.php';
			require 'views/common/footer2.php';	
		}elseif($message==4){
			require 'views/common/header4.php';
			require 'views/' . $name . '.php';
			require 'views/common/footer3.php';	
		}
		}
	}



}