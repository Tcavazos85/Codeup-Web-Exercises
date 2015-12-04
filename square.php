<?php

require_once 'rectangle.php';

class Square extends Rectangle
{

	public function perimeter()
		{
			return ($this->length + $this->width) * 2;
		}
}