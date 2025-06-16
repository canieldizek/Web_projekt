<?php

class GeneratorVet
{
	private $privlastky = array("Chytrý", "Střízlivý", "Vystresovaný", "Nejlepší", "Lenivý");
   private $podmety = array("programátor", "tučňák", "ajťák", "maturant", "slon");
   private $prislovce = array("rychle", "radostně", "nedostatečně", "pozdě", "málo", "dokonale");
   private $slovesa = array("programoval", "studoval", "derivoval", "lhal", "podváděl");
   private $pum = array("doma", "v posteli", "ve škole", "v hospodě", "u maturity");
   
   public function Generate()
   {
      return $this->privlastky[rand(0,count($this->privlastky) - 1)]  . ' ' 
            . $this->podmety[rand(0, count($this->podmety) - 1)] . ' ' 
            . $this->prislovce[rand(0, count($this->prislovce) - 1)] . ' '
            . ((rand(0,1)) ? 
              $this->pum[rand(0, count($this->pum) - 1)] . ' ' . $this->slovesa[rand(0, count($this->slovesa) - 1)] :         $this->slovesa[rand(0, count($this->slovesa) - 1)] . ' ' . $this->pum[rand(0, count($this->pum) - 1)]);
              
              
              
   }
   
   public function GenerateByArray()
   {
    $arrays = array($this->privlastky, $this->podmety, $this->prislovce, $this->slovesa, $this->pum);
    
    $veta = '';
    foreach($arrays as $array)
    {
       $veta .= $array[rand(0, count($array) - 1)] . ' ';
    }
    
    return $veta;
   }                      
} 