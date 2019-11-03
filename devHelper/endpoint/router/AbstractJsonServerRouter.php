<?php 

namespace helper\endpoint\router;

abstract class AbstractJsonServerRouter
{	
	protected $url;
	protected $method;
	protected $pathName;

	public function __construct(string $pathNameString)
	{	
		header("Access-Control-Allow-Origin: *"); 
		header('Content-Type: application/json; charset=utf-8');
		$this->url = parse_url($_SERVER["REQUEST_URI"])['path'];
		$this->method = $_SERVER["REQUEST_METHOD"];
		$this->pathName = $pathNameString;
	}

	public function get(string $actionUrl, \Closure $action)
	{
		header('Access-Control-Allow-Methods: GET');
		
		$actionUrl = $this->pathName . $actionUrl;
		$invalidUrl = $this->url !== $actionUrl;
		$methodNotAllowed = $this->method !== 'GET';
	
		if ($methodNotAllowed || $invalidUrl) {
			return;
		}

		call_user_func($action);
		
		die();
	}

	public function post(string $actionUrl, \Closure $action)
	{
		header('Access-Control-Allow-Methods: POST');
		
		$actionUrl = $this->pathName . $actionUrl;
		$methodNotAllowed = $this->method !== 'POST';
		$invalidUrl = $this->url !== $actionUrl;
		
		if ($methodNotAllowed || $invalidUrl) {
			echo "entrou";
			die();
			return;
		}

		call_user_func($action);
		
		die();
	}

}