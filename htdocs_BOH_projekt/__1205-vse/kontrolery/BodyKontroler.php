<?php

class BodyKontroler extends Kontroler {
    public function zpracuj($parametry) {
        $this->pohled = "body";

        $p1 = new Point(3, 4);
        $p2 = new Point(1, 1);

        $p3 = new Point3D(2, 7, -5);
        
        $this->data["p1"] = $p1;
        $this->data["p2"] = $p2;
        $this->data["p3"] = $p3;
    }
}