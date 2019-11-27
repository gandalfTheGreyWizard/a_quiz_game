<?php
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");


date_default_timezone_set("Asia/Kolkata");                                                                                      
if ($_SERVER['REQUEST_METHOD'] == "POST") {
		require "./vendor/autoload.php";
		$url = $_SERVER["REQUEST_URI"];
		$urlArr = explode("/", $url);
		

		//helpers
		$logger = new Mysite\Helpers\Logger();
		$helperDict = array('logger' => $logger);


		//controllers models
		$modelPath = "Mysite\\Models\\" . ucfirst($urlArr[1]);
		$model = new $modelPath($helperDict);
		$controllerPath = "Mysite\\Controllers\\" . ucfirst($urlArr[1]);
		$controller = new $controllerPath($model,$helperDict);


		$controller->{$urlArr[2]}();
	}
	else {
		require 'index_.html';
}
?>