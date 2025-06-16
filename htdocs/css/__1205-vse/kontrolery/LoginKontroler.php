<?php
class LoginKontroler extends Kontroler {
    public function zpracuj($parametry) {
        $this->pohled = "login";

        $spravceUzivatelu = new SpravceUzivatelu;

        if (isset($_POST["email"])) {
            if ($spravceUzivatelu->prihlas($_POST)){
            $this->presmeruj("student");
            }
        }
    }
}