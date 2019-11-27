<?php
namespace Mysite\Helpers;

class Logger{
	function __construct() {
		$this->fileurl = 'src/dump/log.txt';
	}

	function logit($message) {
		$oldData = readfile($this->fileurl);
		$file = fopen($this->fileurl, "w");
		fwrite($file, $oldData . $message);
		fclose($file);
	}
}
?>