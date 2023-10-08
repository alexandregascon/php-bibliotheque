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

$resultat2 = $emprunt2->getDateRetourEstimee()->format("d/m/Y");
$date2 = new DateTime();
$date2->modify("+21 days");

// Assertion

if($resultat2 == $date2->format("d/m/Y")){
    echo "Test OK".PHP_EOL;

}else{
    echo "Test pas OK".PHP_EOL;
}

echo PHP_EOL;


echo "Test :  vérifier que la date de retour estimée, à la création, est égale à la date du jour + 15 jours pour l’emprunt d’un BluRay";
echo PHP_EOL;

// Arrange

$adherent3 = new \App\Adherents("Valterri","Bottas","13/06/2023");
$bluray3 = new \App\BluRay("Test3","Vasseur","1h20","2023");
$emprunt3 = new \App\Emprunts($adherent3,$bluray3);

// Act

$resultat3 = $emprunt3->getDateRetourEstimee()->format("d/m/Y");
$date3 = new DateTime();
$date3->modify("+15 days");

// Assertion

if($resultat3 == $date3->format("d/m/Y")){
    echo "Test OK".PHP_EOL;

}else{
    echo "Test pas OK".PHP_EOL;
}

echo PHP_EOL;


echo "Test :  vérifier que la date de retour estimée, à la création, est égale à la date du jour + 10 jours pour l’emprunt d’un magazine";
echo PHP_EOL;

// Arrange

$adherent4 = new \App\Adherents("Logan","Sargeant","12/06/2023");
$magazine4 = new \App\Magazine("Test4","5","12/06/2022");
$emprunt4 = new \App\Emprunts($adherent4,$magazine4);

// Act

$resultat4 = $emprunt4->getDateRetourEstimee()->format("d/m/Y");
$date4 = new DateTime();
$date4->modify("+10 days");

// Assertion

if($resultat4 == $date4->format("d/m/Y")){
    echo "Test OK".PHP_EOL;

}else{
    echo "Test pas OK".PHP_EOL;
}

echo PHP_EOL;


echo "Test :  vérifier que l’emprunt est en cours quand la date de retour n’est pas renseignée";
echo PHP_EOL;

// Arrange

$adherent5 = new \App\Adherents("Oscar","Piastri","12/06/2023");
$magazine5 = new \App\Magazine("Test5","5","12/06/2022");
$emprunt5 = new \App\Emprunts($adherent5,$magazine5);

// Act

$resultat5 = $emprunt5->retourEmprunt();

// Assertion

if($resultat5 == false){
    echo "Test OK".PHP_EOL;

}else{
    echo "Test pas OK".PHP_EOL;
}

echo PHP_EOL;


echo "Test :  vérifier que l’emprunt est en alerte quand la date de retour estimée est antérieure à la date du jour et que l’emprunt est en cours";
echo PHP_EOL;

// Arrange

$adherent6 = new \App\Adherents("Oscar","Piastri","12/06/2023");
$magazine6 = new \App\Magazine("Test6","5","12/06/2022");
$emprunt6 = new \App\Emprunts($adherent6,$magazine6);

// Act

$emprunt6->setDateRetourEstimee("07/10/2023");
$resultat6 = $emprunt6->alerteEmprunt();

// Assertion

if($resultat6 == true){
    echo "Test OK".PHP_EOL;

}else{
    echo "Test pas OK".PHP_EOL;
}

echo PHP_EOL;


echo "Test :  vérifier que la durée de l’emprunt a été dépassée quand la date de retour est postérieure à la date de retour estimée ";
echo PHP_EOL;

// Arrange

$adherent7 = new \App\Adherents("Oscar","Piastri","12/06/2023");
$magazine7 = new \App\Magazine("Test7","5","12/06/2022");
$emprunt7 = new \App\Emprunts($adherent7,$magazine7);

// Act

$emprunt7->setDateRetourEstimee("07/10/2023");
$emprunt7->setDateRetour("08/10/2023");
$resultat7 = $emprunt7->respectDureeEmprunt();

// Assertion

if($resultat7 == 1){
    echo "Test OK".PHP_EOL;

}else{
    echo "Test pas OK".PHP_EOL;
}