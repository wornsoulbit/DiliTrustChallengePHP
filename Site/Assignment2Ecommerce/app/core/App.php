<?php
namespace App\core;

class App{
	//default parameter
	protected $controller = 'App\\controllers\\DefaultController';
	protected $method = 'index';
	protected $params = [];

	function __construct(){
		$url = $this->parseUrl();

		//$url[0] controller name

		if(isset($url[0])){
			if(file_exists('app/controllers/' . $url[0] . 'Controller.php')){
				$this->controller = 'App\\controllers\\' . $url[0] . 'Controller';
			}
			unset($url[0]);//deleting $url[0] from memory. 
		}
		//$this->controller becomes an object of the requested type
		$this->controller = new $this->controller();

		//$url[1] controller method 
		if(isset($url[1])){
			if(method_exists($this->controller, $url[1])){
				$this->method = $url[1];
			}
			unset($url[1]);
		}


		$reflection = new \ReflectionObject($this->controller);
		$controllerAttributes = $reflection->getAttributes();
		$methodAttributes = $reflection->getMethod($this->method)->getAttributes();
		//merge the attributes into one array
		$filters = array_values(array_filter(array_merge($controllerAttributes,$methodAttributes)));
		//run the filters
		foreach ($filters as $filter) {
			$filter = $filter->newInstance();
			$filter->execute();
		}


		//extract the remaining elements of $url as params
		//setting the parameters
		//$url = array(2=>'param1', 3=>'param2')
		$this->params = $url ? array_values($url) : [];
		//$this->params contains ['param1', 'param2']

		call_user_func_array([$this->controller, $this->method], $this->params);
	}

	//"Default/index"
	//["Default", "index"]
	public function parseUrl(){
		if(isset($_GET['url'])){
			return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
	}


}

?>