<?php

class SpravceTur
{
    public function ziskejVsechnyTury()
    {
        return Db::dotazVsechny('
            SELECT trip.Name_trip, trip.Length, trip.Time, difficulty.Name_diff, user.Username
            FROM trip
            JOIN difficulty ON trip.Difficulty = difficulty.ID_difficulty
            JOIN user ON trip.Creator = user.ID_user
        ');
    }

    public function pridejTuru($nazev, $delka, $cas, $obtiznost, $creator)
    {
        Db::vloz('trip', [
            'Name_trip' => $nazev,
            'Length' => $delka,
            'Time' => $cas,
            'Difficulty' => $obtiznost,
            'Creator' => $creator
        ]);
    }
}