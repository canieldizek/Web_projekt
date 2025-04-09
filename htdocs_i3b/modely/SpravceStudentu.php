<?php
class SpravceStudentu {
    public function vratStudenty() {
        $sql = "
            SELECT *
            FROM studenti
            ORDER BY prijmeni, jmeno
        ";
        return Db::dotazVsechny($sql);
    }

    public function vlozStudenta($udajeStudenta) {
        Db::vloz("studenti", $udajeStudenta);
    }
}