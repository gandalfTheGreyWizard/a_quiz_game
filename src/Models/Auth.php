<?php 
namespace Mysite\Models;
use ReallySimpleJWT\Token;
class Auth {
	private $key;
	function __construct() {
		$this->conn = mysqli_connect("localhost", "root", "", "");
	}
	function login($data) {
		$key = 'sec!ReT423*&';
		$query = "SELECT password from users WHERE name='" . $data->name . "'";
		$result = $this->conn->query($query) or die(mysqli_error($this->conn));
		$payload = $payload = [
		    'iat' => time(),
		    'uid' => 1,
		    'name' => $data->name,
		    'exp' => time() + 10,
		    'iss' => 'localhost'
		];
		$resultObj = $result->fetch_object();
		$password = $resultObj->password;
		$jwt;
		if ($data->password == $password) {
			$jwt = Token::customPayload($payload, $key);
			echo json_encode(array('token' => $jwt));
		} else {
			echo "Wrong credentials";
		}
	}
	function signUp($data) {
		$err;
		$query = "INSERT INTO users(name, password) values('" . $data->name . "', '" . $data->password . "')";
		$result = $this->conn->query($query) or die($err = mysqli_error($this->conn));
		if ($err) {
			echo "{'success': 'false'}";
		} else {
			echo "{'success': 'false'}";
		}
	}
}
?>