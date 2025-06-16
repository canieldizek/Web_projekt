<?php

function nactiTridu($nazevTridy) {
    require_once("tridy/" . $nazevTridy . ".php");
}

spl_autoload_register("nactiTridu");