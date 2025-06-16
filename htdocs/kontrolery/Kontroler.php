<?php
abstract class Kontroler {
    protected $pohled = "";
    protected $data = [];

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