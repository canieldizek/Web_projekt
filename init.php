<?php
session_start();

require "vendor/autoload.php";
function nactiTridu($nazevTridy) {
    if (preg_match("/Kontroler$/", $nazevTridy)) 
        require "kontrolery/$nazevTridy.php";
    else
        require "modely/$nazevTridy.php";
}

spl_autoload_register("nactiTridu");

Db::pripoj("localhost", "root", "", "project_trip_app");