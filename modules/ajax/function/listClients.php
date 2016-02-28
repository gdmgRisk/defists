<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$json = array();

$resultat = Brain::charger_all_clients();


// résultats
foreach ($resultat as $value) {
    // je remplis un tableau et mettant l'id en index 
    $infos = Brain::charger_clientsiNFO($value['id']);
    
    if(isset($infos[0])){
        $scan=$infos[0]['scanfile'];
        $image='localhost/design/images/img4.png';
    }  else {
        $scan='';
        $image='localhost/design/images/img4.png';
    }
    $json[$value['id']]["nom"] = $value['nom'];
    $json[$value['id']]["url"] = $value['url'];
    $json[$value['id']]["ip"] = $value['ip'];
    $json[$value['id']]["date"] = $value['date'];
    $json[$value['id']]["sms"] = $value['sms'];
    $json[$value['id']]["etat"] = $value['etat'];
    $json[$value['id']]["id"] = $value['id'];
    $json[$value['id']]["scanfile"] = $scan;
    $json[$value['id']]["img"] = $scan;
}
// envoi du résultat au success


echo json_encode($json);
