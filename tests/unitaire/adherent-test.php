<?php

require "./vendor/autoload.php";

echo PHP_EOL;
echo "Tests : classe Adherent";
echo PHP_EOL;


echo "Test : la date d'adhésion égale à la date du jour si non précisée à la création";
echo PHP_EOL;

// Arrange

$adherent1 = new \App\Adherents("Pierre","Gasly","");
$date = new DateTime();
$date = $date->format("d/m/Y");

// Act

$resultat = $adherent1->getDateAdhesion()->format("d/m/Y");

// Assertion

if($resultat == $date){
    echo "Test OK".PHP_EOL;
}else{
    echo "Test pas OK".PHP_EOL;
}

echo PHP_EOL;

echo "Test : la date d'adhésion est prise en compte à la création";
echo PHP_EOL;

// Arrange

$adherent2 = new \App\Adherents("Esteban","Ocon","12/06/2023");

// Act

$resultat = $adherent2->getDateAdhesion()->format("d/m/Y");

// Assertion

if($resultat == "12/06/2023"){
    echo "Test OK".PHP_EOL;
}else{
    echo "Test pas OK".PHP_EOL;
}

echo PHP_EOL;

echo "Test : le numéro d'adhérent, à la création, est valide";
echo PHP_EOL;

// Arrange

$adherent3 = new \App\Adherents("Charles","Leclerc","");

// Act

$resultat = $adherent3->getNumAdherent();

// Assertion

if($resultat == ""){
    echo "Test OK".PHP_EOL;
}else{
    echo "Test pas OK".PHP_EOL;
}

echo PHP_EOL;

echo "Test : l'adhésion est valide quand la date d'adhésion n'est pas dépassée (moins d'un an)";
echo PHP_EOL;

// Arrange

$adherent4 = new \App\Adherents("Carlos","Sainz","12/06/2023");

// Act

$resultat = $adherent4->etatAdhesion();


// Assertion

if($resultat == true){
    echo "Test OK".PHP_EOL;
}else{
    echo "Test pas OK".PHP_EOL;
}

echo PHP_EOL;

echo "Test : l'adhésion est invalide quand la date d'adhésion est dépassée (plus d'un an)";
echo PHP_EOL;

// Arrange

$adherent5 = new \App\Adherents("Lance","Stroll","12/06/2001");

// Act

$resultat = $adherent5->etatAdhesion();

// Assertion

if($resultat == false){
    echo "Test OK".PHP_EOL;
}else{
    echo "Test pas OK".PHP_EOL;
}

echo PHP_EOL;

echo "Test : l'adhésion est renouvelée";
echo PHP_EOL;

// Arrange

$adherent6 = new \App\Adherents("Fernando","Alonso","12/06/2023");

// Act

$adherent6->renouvelerAdhesion();

// Assertion

if($adherent6->getDateAdhesion()->format("d/m/Y") == "12/06/2024"){
    echo "Test OK".PHP_EOL;
}else{
    echo "Test pas OK".PHP_EOL;
}

echo PHP_EOL;

echo "Test :  vérifier que le numéro d’adhérent, à la création, est valide";
echo PHP_EOL;

// Arrange

$adherent7 = new \App\Adherents("Fernando","Alonso","12/06/2023");

// Act

$resultat7 = $adherent7->getNumAdherent();
$identifiant = substr($resultat7,0,3);
$nombreChiffre = substr($resultat7, 3,15);
$nombreChiffre = strlen($nombreChiffre);

// Assertion

if($identifiant == "AD-" and $nombreChiffre == 6){
    echo "Test OK".PHP_EOL;
}else{
    echo "Test pas OK".PHP_EOL;
}