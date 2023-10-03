<?php

require "./vendor/autoload.php";

$adherent = new \App\Adherents("Pierre","Gasly","12/06/2023");
//echo $adherent->getPrenom();
//echo PHP_EOL;
//echo $adherent->getDateAdhesion()->format("d/m/Y");
//echo PHP_EOL;
//echo $adherent->getNumAdherent();
//echo PHP_EOL;
//$adherent->renouvelerAdhesion();
//echo $adherent->getDateAdhesion()->format("d/m/Y");
//echo PHP_EOL;
//$informations = $adherent->getInformationsAdherent();
//foreach ($informations as $information) {
//    echo $information;
//    echo PHP_EOL;
//}
if ($adherent->etatAdhesion() == true){
    echo "Adhésion valable";
}else{
    echo "Adhésion non valable";
}
echo PHP_EOL;
echo $adherent->getDateAdhesion()->format("d/m/Y");