<?php
class RegisterKontroler extends Kontroler {
    public function zpracuj($parametry) {
        $this->pohled = "register";

        $spravceUser = new SpravceUser;

        if (isset($_POST["email"])) {
            if ($spravceUser->register($_POST)) {
                $this->presmeruj("uvod");
            }
        }

    }
}