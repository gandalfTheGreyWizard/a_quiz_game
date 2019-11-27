<?php
namespace Mysite\Models;

class Quiz{
	function __construct() {
		$this->conn = mysqli_connect("localhost", "root", "asusmicromax", "quiz");
	}
	function populate() {
		$query = "create table questions(id int primary key AUTO_INCREMENT, question varchar(10000), options varchar(10000), answer varchar(10000), type varchar(1000))";
		$this->conn->query($query) or die(mysqli_error());
	}
	function insertQuestion($question, $options, $answer, $type) {
		$optionsString = implode(',', $options);
		$query = "INSERT INTO questions(question, options, answer, type) values('" . "$question" . "', '" . "$optionsString". "', '". "$answer" ."','" . $type . "')";
		$this->conn->query($query) or die(mysqli_error($this->conn));
		echo '{"status": "done"}';
	}
	function getQuestion($id) {
		$query = "select * from questions where id=" . $id;
		$result = $this->conn->query($query);
		while($row = $result->fetch_object()) {
			$response->question = $row->question;
			$response->options = explode(",",$row->options);
			$response->type = $row->type;
		}
		echo json_encode($response);
	}
	function checkAnswer($id, $answer) {
		$query = "select * from questions where id = " . $id;
		$result = $this->conn->query($query) or die(mysqli_error($this->conn));
		while ($row = $result->fetch_object()) {
			if ($row->answer == $answer) {
				echo '{"success": "true"}';
			}
			else {
				echo '{"success": "false"}';
			}
		}
	}
}
?>