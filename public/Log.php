<?php

class Log 
{
	public $filename = '';
	public $handle;

	public function __construct($prefix = 'log')
	{
		$today = date("Y-m-d");
		$this->filename = $prefix.'-'. $today.'log';
	    $this->handle = fopen($this->filename, 'a');	
	}
	
	public function __destruct()
	{
	    fclose($this->handle);

	}

	public function logMessage($logLevel,$message)
	{
		$todayLog = date("Y-m-d h:i:s");
	    fwrite($this->handle, PHP_EOL.$todayLog.' '.$logLevel.' '.$message.PHP_EOL);
	}

	public function info($message)
	{
		$this->logMessage("INFO",$message);
	}
	
	public function error($message)
	{
		$this->logMessage("ERROR",$message);
	}
}