<?php
class StudentKontroler extends Kontroler {
    public function zpracuj($parametry) {
        $this->pohled = "studenti";

        $spravceStudentu = new SpravceStudentu;

        if (isset($_POST["jmeno"])) {
            $spravceStudentu->vlozStudenta($_POST);
        }

        $studenti = $spravceStudentu->vratStudenty();

        $this->data["studenti"] = $studenti;
    }
}