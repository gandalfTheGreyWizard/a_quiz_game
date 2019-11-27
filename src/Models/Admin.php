<?php
namespace Mysite\Models;
class Admin {
	function __construct(){
		$this->conn = mysqli_connect("localhost", "root", "", "");
	}
}
?>