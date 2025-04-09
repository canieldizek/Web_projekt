<?php
class Point {
	public $x;
	public $y;

	public function __construct($x, $y) {
	  $this->x = $x;
	  $this->y = $y;
	}

	public function distanceOrigin() {
	  return sqrt($this->x * $this->x + $this->y * $this->y);
	}
    
	public function __toString() {
	  return "[$this->x , $this->y]";
	}
} 
?>