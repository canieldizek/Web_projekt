<?php
abstract class Kontroler {
    protected $pohled = ""; // název souboru s pohledem (bez přípony .phtml)
    protected $data = [];

    protected $prihlasenyUzivatel;
    
    public function __construct(){
        $spravceUzivatelu = new SpravceUzivatelu;

        $this->prihlasenyUzivatel = $spravceUzivatelu->vratUzivatele();
        //použít if($this->prihlasenyUzivatel){}
    }

    abstract public function zpracuj($parametry);

    public function vypisPohled() {
        extract($this->data);
        require "pohledy/{$this->pohled}.phtml";
    }
    
    public function presmeruj($url) {
        header("Location: /$url");
        exit;
    }
}