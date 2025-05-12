<?php
class LogoutKontroler extends Kontroler {
    public function zpracuj($parametry) {
        $this->pohled = "uvod";

        $spravceUser = new SpravceUser;

        $spravceUser->odhlas();

    }
}