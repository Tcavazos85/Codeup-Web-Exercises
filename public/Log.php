<?php

class Log 
{
	public $filename = '';
	public $prefix;
	public $handle;


	public function __contruct($prefix = 'log')
	{
		$filename = '{$prefix}-date("Y-m-d").log';
	    $handle = fopen($filename, 'a');
		
	}


	public function logMessage($logLevel,$message){
		$today = date("Y-m-d");
		$todayLog = date("Y-m-d h:i:s");
	    fwrite($handle, PHP_EOL.$todayLog.' '.$logLevel.' '.$message.PHP_EOL);
	}

	public function info($message){
		$this->logMessage("INFO",$message);
	}
	public function error($message){
		$this->logMessage("ERROR",$message);
	}
	public function __destruct()
	{
	    fclose($handle);

	}
}