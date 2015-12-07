<?php

class Log 
{
	private $filename = '';
	private $handle;

	public function __construct($prefix = 'log')
	{
		$today = date("Y-m-d");
		$this->setFilename($prefix.'-'. $today.'log');
	    $this->setHandle(fopen($this->filename, 'a+'));	
	}
	
	protected function setFilename($filename)
	{
		if(is_string($filename))
		{
			$this->filename = $filename;
		}
	}

	protected function setHandle($handle)
	{
		$this->handle = $handle;
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