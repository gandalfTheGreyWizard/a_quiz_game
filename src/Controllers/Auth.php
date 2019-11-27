<?php
namespace Mysite\Controllers;
header("Access-Control-Allow-Origin: http://localhost/rest-api-authentication-example/");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
class Auth{
	function __construct($model, $helpers) {
		$this->model = $model;
		$this->helpers = $helpers;
	}
	function login() {
		$request = file_get_contents("php://input");
		$requestjson = json_decode($request);
		$this->model->login($requestjson);
	}
	function signUp() {
		$request = file_get_contents("php://input");
		$requestjson = json_decode($request);
		$this->model->signUp($requestjson);
	}
}
?>