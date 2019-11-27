<?php
namespace Mysite\Controllers;

class Quiz{
	function __construct($model, $helpers) {
		$this->model = $model;
		$this->helpers = $helpers;
	}
	function newfunction(){

	}
	function populate() {
		$this->model->populate();
	}
	function insertQuestion() {
		$request = file_get_contents("php://input");
		print_r($request);
		$requestJson = json_decode($request);
		$this->model->insertQuestion($requestJson->question, $requestJson->options, $requestJson->answer, $requestJson->type);
	}
	function getQuestion() {
		$request = file_get_contents("php://input");
		$requestJson = json_decode($request);
		$this->model->getQuestion($requestJson->id);
	}
	function checkAnswer() {
		$request = file_get_contents("php://input");
		$requestJson = json_decode($request);
		$this->model->checkAnswer($requestJson->id, $requestJson->answer);
	}
}
?>