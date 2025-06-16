<?php
class SmerovacKontroler extends Kontroler {
    protected $kontroler;

    public function zpracuj($parametry) {
        $url = $parametry;
        $castiCesty = $this->parsujURL($url);

        if (empty($castiCesty[0])) {
            $this->presmeruj("uvod");
        } else {
            $castNazvuKontroleru = array_shift($castiCesty);
            $nazevKontroleru = $this->pomlckyDoVelbloudiNotace($castNazvuKontroleru) . "Kontroler";

            if (file_exists("kontrolery/$nazevKontroleru.php")) {
                $this->kontroler = new $nazevKontroleru;
                $this->kontroler->zpracuj($castiCesty);
                $this->pohled = "rozlozeni";
            } else {
                echo "Chyba: Kontroler '$nazevKontroleru' neexistuje.";
                exit;
            }
        }
    }

    private function pomlckyDoVelbloudiNotace($text) {
        $text = str_replace("-", " ", $text);
        $text = ucwords($text);
        return str_replace(" ", "", $text);
    }

    private function parsujURL($url) {
        $naparsovanaURL = parse_url($url);
        $cesta = ltrim($naparsovanaURL["path"], "/");
        $cesta = trim($cesta);
        return explode("/", $cesta);
    }
}
