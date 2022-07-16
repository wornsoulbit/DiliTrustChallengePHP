<?php
namespace App\core;

class Controller{
	protected function view($name, $data = null){
		//check that the file exists
		if(file_exists('app/views/' . $name . '.php')){
			//include the file
			include('app/views/' . $name . '.php');
		}
		else{
			echo 'No such view!';
		}
	}
}

?>