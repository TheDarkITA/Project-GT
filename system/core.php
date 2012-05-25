<?php
class Loader
{

}
class Router
{
	function run()
	{
		// Get Current URI
		$this->uri = $_SERVER['REQUEST_URI'];
		
		// Explode
		$uri = explode('/', trim($this->uri, '/'));
		
		// 
		$module = isset($uri[0]) ? $uri[0] : 'welcome';
		$controller = isset($uri[1]) ? $uri[1] : false;
		$action = isset($uri[2]) ? $uri[2] : 'index';
		
		// DEBUG
		//print_r($uri);
		
		// Module exists?
		if(file_exists(BASEPATH.'modules/'.$module))
		{
			// Controllers exists?
			if($controller && file_exists(BASEPATH.'modules/'.$module.'/controllers/'.$controller.'.php'))
			{
				include(BASEPATH.'modules/'.$module.'/controllers/'.$controller.'.php');
			}
			// Controller name = module name
			elseif(file_exists(BASEPATH.'modules/'.$module.'/controllers/'.$module.'.php'))
			{
				$controller = $module;
				$action = isset($uri[1]) ? $uri[1] : 'index';
				include(BASEPATH.'modules/'.$module.'/controllers/'.$controller.'.php');
			}
			else
				exit('Error 1');
		}
		else
			exit('Error 2');
		
		//
		if(class_exists($controller))
		{
			$obj = new $controller();
			if(method_exists($obj, $action))
			{
				call_user_func_array(array($obj, $action), array('test' => 'lol'));
			}
			else
				exit('Error 3');
		}
		else
			exit('Error 4');
	}
}
$router = new Router();
$router->run();
?>
