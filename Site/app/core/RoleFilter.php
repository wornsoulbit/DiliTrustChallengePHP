<?php

namespace App\core;

#[\Attribute]
class RoleFilter{
	function execute(){
		echo 'This section is for a specific role....';
	}
}
?>