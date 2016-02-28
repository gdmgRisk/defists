<?php

function initScan($sites, $scan) {
    $tableau = array();

    $tableau['idadmin'] = $_SESSION['id'];

    $tableau['date'] = date('Y-m-d');
    $tableau['sites'] = $sites;
    $tableau['scanid'] = $scan;

    $tabenc = json_encode($tableau);
    echo '[' . $tabenc . ']';

    $fp = fopen(HOMEDIR . '/output/ping.txt', 'w');
    if ($fp == false) {
        echo 'echec';
    } else {
        fputs($fp, '[' . $tabenc . ']');
        fclose($fp);
    }
}

/**
 * Fonction pour transmettre les raports et terminé un SCan
 * 
 */
function terminerScan($id, $tableSite, $dateScan) {

    Brain::endScan($id);

    $raport = HOMEDIR . '/output/' . $dateScan . str_replace('.', '', $tableSite[0]['url']) . '.json';
    Brain::saveRapport($id, $tableSite[0]['id'], $raport);


    unlink(HOMEDIR . '/output/ping.txt');
}

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$json = array();

if (isset($_POST['auth'])) {




    /**
     * Demarage du nouveau scan
     */
    if (Brain::scanExist()) {
        $json['status_code'] = 200;
        $json['status_message'] = 'Scan déjà effectué';
        echo json_encode($json);
    } else {

        /*
         * 
         * 
         * 
         * 
         * 
         */

        $arraySites = Brain::charger_active_clients();

        $id = Brain::sauverScan();


        initScan($arraySites, $id);


        $commande = "C:\wapiti-2.3.0-win32-standalone\wapiti-2.3.0-win32-standalone\wapiti.exe " . $arraySites[0]['url'] . " -o C:\wamp64\www\defists\output\\" . date('Y-m-d') . str_replace('.', '', $arraySites[0]['url']) . ".json --format json";
        $out = system($commande);

        echo $out;
        /*
         * 
         * 
         * 
         * 
         */
    }
}
/*
 * 
 * 
 */
if (isset($_POST['ping'])) {

    $ping = HOMEDIR . '/output/ping.txt';
    /*
     * 
     * Test sur l'existance d'un scan en cours
     */
    if (is_file($ping)) {

        $json['status_code'] = 200;
        $json['status_message'] = 'Scan en cours.';

        echo json_encode($json);
    } else {

        $json['status_code'] = 400;
        $json['status_message'] = 'Aucun scan en cours.';

        echo json_encode($json);
    }
}

/* * *
 * 
 * Test pour le scan en cours
 * 
 * 
 */


if (isset($_POST['scanend'])) {


    //Verification de l'existance d'un scan en cours d'excécusion
    $ping = HOMEDIR . '/output/ping.txt';
    /*
     * 
     * Test sur l'existance d'un scan en cours
     */
    if (is_file($ping)) {

        //Recuperation du fichier temporaire et conversion du contenue en JSON
        $fp = fopen($ping, "r");
        $contenu_du_fichier = fgets($fp, 255);
        fclose($fp);


        $jsonScan = json_decode($contenu_du_fichier, TRUE);

        var_dump($jsonScan);
        $jsonSites = $jsonScan[0]['sites'];

        $nbrEnd = 0;


        //On compte le nombre de 
        foreach ($jsonSites as $value) {

            $raport = HOMEDIR . '/output/' . $jsonScan[0]['date'] . str_replace('.', '', $value['url']) . '.json';

            if (is_file($raport))
                $nbrEnd++;
        }

        //Si pour au moin un site il n y a pas de rapport du scan alors le scan est toujours en cours
        if (sizeof($jsonSites) == $nbrEnd) {

            $json['status_code'] = 200;
            $json['status_message'] = 'Scan end.';


            /* Si scan terminé
             * 
             * on enregistre le rapport de chaque site dans la bd 
             * on fait un update pour terminer le scan en cours
             * on supprime le fichier ping
             */
            terminerScan($jsonScan[0]['scanid'], $jsonSites, $jsonScan[0]['date']);

            echo json_encode($json);
        }
        //Si pour au moin un site il n y a pas de rapport du scan alors le scan est toujours en cours
        else {
            $json['status_code'] = 300;
            $json['status_message'] = 'Scan en cours.';

            echo json_encode($json);
        }
    }
    //Si le fichier n'existe pas alors il n y a pas de scan en cours
    else {

        $json['status_code'] = 400;
        $json['status_message'] = 'Aucun scan en cours.';

        echo json_encode($json);
    }
}
?>