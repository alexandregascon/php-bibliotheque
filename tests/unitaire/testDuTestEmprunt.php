<?php

require "./vendor/autoload.php";


$adherent = new \App\Adherents("Esteban","Ocon","11/06/2023");
$media= new \App\Magazine("Le Test","128","12/05/2023");

$emprunt = new \App\Emprunts("12/06/2023",$adherent,$media);

//$informations = $emprunt->informationsEmprunt();
//
//foreach ($informations as $information) {
//    echo $information;
//    echo PHP_EOL;
//}
//
//if($emprunt->alerteEmprunt() == true){
//    echo "Emprunt en alerte";
//}else{
//    echo "Emprunt pas en alerte";
//}
//
//echo PHP_EOL;
//echo $emprunt->getDateRetourEstimee()->format("d/m/Y");
//
//if($emprunt->retourEmprunt() == true){
//    echo "Emprunt terminé";
//}else{
//    echo "Emprunt en cours";
//}
//
//echo PHP_EOL;
//$emprunt->setDateRetour("03/10/2023");
//
//if($emprunt->retourEmprunt() == true){
//    echo "Emprunt terminé";
//}else{
//    echo "Emprunt en cours";
//}
//
//echo PHP_EOL;

$emprunt->setDateRetour("03/10/2023");

if($emprunt->respectDureeEmprunt() == 2){
    echo "Durée limite d'emprunt respectée";
}elseif($emprunt->respectDureeEmprunt() == 1){
    echo "Durée limite d'emprunt non respectée";
}elseif($emprunt->respectDureeEmprunt() == 3){
    echo "Emprunt pas encore terminé";
}

echo PHP_EOL;
