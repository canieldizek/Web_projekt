<?php
class Point3D extends Point {
	public $z;

	public function __construct($x, $y, $z) {
      parent::__construct($x, $y);  
	  $this->z = $z;
	}

	public function distanceOrigin() {
	  return sqrt($this->x * $this->x 
                    + $this->y * $this->y
                    + $this->z * $this->z);
	}
    
	public function __toString() {
	  return "[$this->x , $this->y, $this->z]";
	}
} 
?>