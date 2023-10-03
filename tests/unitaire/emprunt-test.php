<?php

require "./vendor/autoload.php";


$adherent = new \App\Adherents("Esteban","Ocon","11/06/2023");
$media= new \App\Magazine("Le Test","128","12/05/2023");

$emprunt = new \App\Emprunts("12/06/2023",$adherent,$media);

$informations = $emprunt->informationsEmprunt();

foreach ($informations as $information) {
    echo $information;
    echo PHP_EOL;
}