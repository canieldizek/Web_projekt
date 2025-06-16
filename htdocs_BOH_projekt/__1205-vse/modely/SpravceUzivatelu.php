<?php
class SpravceUzivatelu {
    public function vratUzivatele() {
        $sql = "
            SELECT *
            FROM uzivatele
            ORDER BY email
        ";
        return Db::dotazVsechny($sql);
    }

    public function vlozUzivatele($udajeUzivatele) {
        Db::vloz("uzivatele", $udajeUzivatele);
    }

    public function prihlas ($udajeUzivatele){
        $sql = "
            SELECT *
            FROM uzivatele
            WHERE email = ?
                AND heslo = ?
        ";
        $hashHesla = $this->vratHashHesla($udajeUzivatele["heslo"]);
        $uzivatel = Db::dotazJeden($sql, [$udajeUzivatele["email"], $hashHesla]);

        if ($uzivatel){
            $_SESSION["uzivatel"] = $uzivatel;
            return 1;
        }else{
            return 0;      
        }
    }

    public function odhlas(){
        unset($_SESSION["uzivatel"]);
    }

    private function vratHashHesla($heslo){
        //$sul = "8*@c";
    return hash("sha256", $heslo /*. $sul +*/);
    }
}