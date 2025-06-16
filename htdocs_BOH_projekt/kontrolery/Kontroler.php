<?php
abstract class Kontroler {
    protected $pohled = "";
    protected $data = [];
    protected $uzivatel = null;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Pokud je uživatel přihlášený, načti ho ze session
        if (!empty($_SESSION['uzivatel'])) {
            $this->uzivatel = $_SESSION['uzivatel'];
            $this->data['uzivatel'] = $this->uzivatel;
        }
    }

    abstract public function zpracuj($parametry);

    public function vypisPohled() {
        extract($this->data);
        require "pohledy/{$this->pohled}.phtml";
    }

    public function presmeruj($url) {
        header("Location: /$url");
        exit;
    }

    public function pridejZpravu($zprava) {
        $_SESSION['zpravy'][] = $zprava;
    }
}
