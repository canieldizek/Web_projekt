<?php
class LoginKontroler extends Kontroler {
    public function zpracuj($parametry) {
        $this->pohled = "login";

        $spravceUser = new SpravceUser;

        if (isset($_POST["email"])) {
            if ($spravceUser->prihlas($_POST)) {
                $this->presmeruj("uvod");
            }
        }

    }
}