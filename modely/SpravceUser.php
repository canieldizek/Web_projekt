<?php
class SpravceUser{
    public function vratVsechnyUser() {
        $sql = "
            SELECT *
            FROM User
            ORDER BY Username
        ";
        return Db::dotazVsechny($sql);
    }

    public function vlozUser($udajeUser) {
        Db::vloz("User", $udajeUser);
    }

    public function prihlas($udajeUser) {
        $sql = "
            SELECT *
            FROM user
            WHERE email = ?
            AND password = ?
        ";

        $hashPassword = $this->vratHashPassword($udajeUser["password"]);
        $User = Db::dotazJeden($sql, [$udajeUser["email"], $hashPassword]);

         if ($User) {
            $_SESSION["User"] = $User;
            return 1;
        }
        else
            return 0;
    }

    public function odhlas() {
        unset($_SESSION["User"]);
    }

    private function vratHashPassword($Password) {
       
        return hash("sha256", $Password );
    }

    // funkce pro registraci uzivatele
    public function register($udajeUser) {

        $udajeUser["password"] = $this->vratHashPassword($udajeUser["password"]);
        $this->vlozUser($udajeUser);
        return true;
    }
    public function overeniEmailu($email) {
        $sql = "select Email from user where email = ?";
    if(Db::dotazJeden($sql,[$email])){
        return false;
    } else {
        return true;
    }
    }
    public function overeniJmena($Username) {
        $sql = "select Username from user where Username = ?";
    if(Db::dotazJeden($sql,[$Username])){
        return false;
    } else {
        return true;
    }
    }
}