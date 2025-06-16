<?php

require_once("autoload.php");

$generatorVet = new GeneratorVet;
$veta = $generatorVet->Generate();

require_once("pohledy/vety.phtml");