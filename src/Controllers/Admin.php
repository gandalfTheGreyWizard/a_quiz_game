<?php
namespace Mysite\Controllers;
use ReallySimpleJWT\Token;
class Admin{
	function __construct($model, $helpers) {
		$this->model = $model;
		$this->helpers = $helpers;
	}
	function adminPanel() {
		
	}
	function addBlog() {
		$key = 'sec!ReT423*&';
		$contents = file_get_contents("php://input");
		$headers = getallheaders();
		$jwt = $headers['Authorization'];
		$jwtdecoded = Token::getPayload($jwt, $key);
		print_r($jwtdecoded);
	}
}
?>