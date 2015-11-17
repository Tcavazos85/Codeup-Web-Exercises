<?php

class Log 
{
	public $filename = '';

	public function logMessage($logLevel,$message){
		$today = date("Y-m-d");
	    $filename = 'log-'.$today.'.log';
		$todayLog = date("Y-m-d h:i:s");
	    $handle = fopen($filename, 'a');
	    fwrite($handle, PHP_EOL.$todayLog.' '.$logLevel.' '.$message.PHP_EOL);
	    fclose($handle);
	}

	public function info($message){
		$this->logMessage("INFO",$message);
	}
	public function error($message){
		$this->logMessage("ERROR",$message);
	}
}