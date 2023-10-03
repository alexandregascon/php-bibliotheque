<?php

require "./vendor/autoload.php";

echo PHP_EOL;
echo "Tests : classe Emprunt";
echo PHP_EOL;


echo "Test : vérifier que la date d’emprunt, à la création, est égale à la date du jour";
echo PHP_EOL;

// Arrange

$adherent1 = new \App\Adherents("Alex","Albon","12/06/2023");
$livre1 = new \App\Livre("Test1","111-111","Williams","160");
$emprunt1 = new \App\Emprunts($adherent1,$livre1);

// Act

$resultat = $emprunt1->getDateEmprunt()->format("d/m/Y");
$date = new DateTime();
$date = $date->format("d/m/Y");

// Assertion

if($resultat == $date){
    echo "Test OK".PHP_EOL;
}else{
    echo "Test pas OK".PHP_EOL;
}

echo PHP_EOL;


echo "Test :  vérifier que la date de retour estimée, à la création, est égale à la date du jour + 21 jours pour l’emprunt d’un livre";
echo PHP_EOL;

// Arrange

$adherent2 = new \App\Adherents("Logan","Sargeant","12/06/2023");
$livre2 = new \App\Livre("Test2","111-112","Williams2","200");
$emprunt2 = new \App\Emprunts($adherent2,$livre2);

// Act

$resultat = $emprunt2->getDateRetourEstimee()->format("d/m/Y");
$date = new DateTime();
$date = $date->format("d/m/Y");

// Assertion

if($resultat == date_modify($date,"+21 days")){
    echo "Test OK".PHP_EOL;
}else{
    echo "Test pas OK".PHP_EOL;
}