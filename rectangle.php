<?php

class Rectangle
{
    private $length;
    private $width;

    public function __construct($length, $width)
    {
        $this->length = $length;
        $this->width  = $width;
    }

    public function setLength()
    {
    	$this->length = trim($length);
    }
	
	public function setWidth()
    {
    	$this->width = trim($width);
    }

    public function area()
    {
        return $this->length * $this->width;
    }
    public function perimeter()
		{
			$perimeter = ($this->length + $this->width) *2;
			return $perimeter.PHP_EOL;
		}

	public function getLength()
		{
			return ($this->length);
		}
	public function getWidth()
		{
			return ($this->width);
		}
}
