<?php
class MapaKontroler extends Kontroler
{

    public function zpracuj($parametry)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['vloz_vylet'])) {

        $name = $_POST['name_trip'];
        $length = (float)$_POST['length'];
        $time = $_POST['time'];
        $difficulty = (int)$_POST['difficulty'];

        // kontrola přihlášení
        if (!isset($_SESSION['User'])) {
            echo "<p>Musíte být přihlášený, abyste mohl přidat výlet.</p>";
            $this->pohled = 'mapa';
            return;
        }

        $creator = $_SESSION["User"]["ID_user"];

        // připojení k DB
        $db = new mysqli('127.0.0.1', 'root', '', 'project_trip_app');
        if ($db->connect_error) {
            die('Chyba připojení: ' . $db->connect_error);
        }

        $stmt = $db->prepare('INSERT INTO trip (Name_trip, Length, Time, Creator, Difficulty) VALUES (?, ?, ?, ?, ?)');
        $stmt->bind_param('sdsii', $name, $length, $time, $creator, $difficulty);

        if ($stmt->execute()) {
            echo "<p>Výlet úspěšně vložen!</p>";
        } else {
            echo "<p>Chyba při vkládání: " . $stmt->error . "</p>";
        }

        $stmt->close();
        $db->close();
    }

    $this->pohled = 'mapa';
}

}