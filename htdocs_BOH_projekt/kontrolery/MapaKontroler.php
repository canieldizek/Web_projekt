<?php

class MapaKontroler extends Kontroler
{
    public function zpracuj($parametry)
    {
        $this->hlavicka = ['titulek' => 'Mapa a túry'];

        $spravceTur = new SpravceTur();

        // Získání přihlášeného uživatele (pokud existuje)
        $this->data['uzivatel'] = $this->uzivatel ?? null;

        // Přidání nové túry
        if (!empty($this->data['uzivatel']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $nazev = $_POST['nazev'] ?? '';
            $delka = (float) ($_POST['delka'] ?? 0);
            $cas = $_POST['cas'] ?? '';
            $obtiznost = (int) ($_POST['obtiznost'] ?? 1);
            $creator = $this->data['uzivatel']['ID_user'];

            if ($nazev && $delka && $cas) {
                $spravceTur->pridejTuru($nazev, $delka, $cas, $obtiznost, $creator);
                $this->pridejZpravu('Túra byla úspěšně přidána.');
                $this->presmeruj('mapa');
            } else {
                $this->pridejZpravu('Vyplňte prosím všechna pole.');
            }
        }

        // Načti túry
        $trip = $spravceTur->ziskejVsechnyTury();
        $this->data['tury'] = $trip;

        $this->pohled = 'mapa';
    }
}
