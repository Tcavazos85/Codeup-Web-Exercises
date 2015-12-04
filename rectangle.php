<?php

class Rectangle
{
    public $length;
    public $width;

    public function __construct($length, $width)
    {
        $this->length = $length;
        $this->width  = $width;
    }

    public function area()
    {
        return $this->length * $this->width;
    }
}
