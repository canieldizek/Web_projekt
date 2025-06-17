<?php

class VsechnyvyletyKontroler extends Kontroler
{
    public function zpracuj($parametry)
    {
        $this->pohled = 'vsechnyvylety';
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

        $stmt = $db->prepare("SELECT t.Name_trip, t.Length, t.Time, d.Name_diff AS Difficulty,u.Username AS Creator
                              FROM trip t
                              JOIN difficulty d ON t.Difficulty = d.ID_difficulty
                              JOIN user u ON t.Creator = u.ID_user");                    
        $stmt->execute();
        $result = $stmt->get_result();

        $this->data['tripData'] = $result->fetch_all(MYSQLI_ASSOC);

        $stmt->close();
        $db->close();
    }
}
