<?php

require_once 'rectangle.php';

class Square extends Rectangle
{
	public function __construct($length)
		{
	    	parent::__construct($length,$length);
		}

	public function perimeter()
		{
			$perimeter = ($this->length * 4);
			return $perimeter;
		}

	public function area()
    	{
        	$area = $this->length * $this->length; 
        	return $area;
    	}	
}