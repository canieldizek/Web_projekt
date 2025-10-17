<?php
class RegisterKontroler extends Kontroler {
    public function zpracuj($parametry) {
        $this->pohled = "register";

       

        $spravceUser = new SpravceUser;

        if (isset($_POST["email"])) {
           if($spravceUser->overeniEmailu($_POST["email"]) && $spravceUser->overeniJmena($_POST["username"])) {
                if ($spravceUser->register($_POST)) {
                Mailer::odesliEmail([$_POST["email"]], "Registrace uživatele", "<p>Jsi úspěšně zaregistrován na webové aplikaci MapujTo!</p>");
                $this->presmeruj("uvod");

            } 

           }else {

            echo "<script type='text/javascript'>alert('tento email nebo jmeno již existuje');</script>";

           }

            
        }

    }
}