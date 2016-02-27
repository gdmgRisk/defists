<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$json = array();

$resultat =  Brain::charger_all_clients() ;


// résultats
foreach ($resultat as $value) {
    // je remplis un tableau et mettant l'id en index 
    $json[$value['id']][] = $value['nom'];
}
// envoi du résultat au success


if(sizeof($json)<=0){
    $json[][]='Aucun resultat';
}
echo json_encode($json);
