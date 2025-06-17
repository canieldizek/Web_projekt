<?php

class MojevyletyKontroler extends Kontroler
{
    public function zpracuj($parametry)
    {
        $this->pohled = 'mojevylety';
        $this->data['tripData'] = [];

        if (!isset($_SESSION['User']['ID_user'])) {
            return;
        }

        $userId = $_SESSION['User']['ID_user'];

        // Připojení k databázi
        $db = new mysqli('127.0.0.1', 'root', '', 'project_trip_app');
        if ($db->connect_error) {
            die('Chyba připojení k databázi: ' . $db->connect_error);
        }

        $stmt = $db->prepare("SELECT t.Name_trip, t.Length, t.Time, d.Name_diff AS Difficulty
                              FROM trip t
                              JOIN difficulty d ON t.Difficulty = d.ID_difficulty
                              WHERE t.Creator = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        $this->data['tripData'] = $result->fetch_all(MYSQLI_ASSOC);

        $stmt->close();
        $db->close();
    }
}
