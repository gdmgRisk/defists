<?php

function initScan($sites, $scan) {
    $tableau = array();

    $tableau['idadmin'] = $_SESSION['id'];

    $tableau['date'] = date(DATE_ATOM);
    $tableau['sites'] = $sites;
    $tableau['scanid'] = $scan;

    $tabenc = json_encode($tableau);
    echo '[' . $tabenc . ']';

    $fp = fopen(HOMEURL . '/output/ping.txt', 'w');
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
function terminerScan() {
    
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

        $arraySites = $_POST['sites'];

        $id = Brain::sauverScan();


        initScan($arraySites, $id);

        $commande = "C:\wapiti-2.3.0-win32-standalone\wapiti-2.3.0-win32-standalone\wapiti.exe 192.168.0.1 -o C:\wamp64\www\defists\output\\" . date('Y-m-d') . ".json --format json";

        $output = system();

        echo "<pre>$output</pre>";

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

    $ping = HOMEURL . '/output/ping.txt';
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

/*
 * 
 * 
 * 
 * 
 */


if (isset($_POST['scanend'])) {

    $ping = HOMEURL . '/output/ping.txt';
    /*
     * 
     * Test sur l'existance d'un scan en cours
     */
    if (is_file($ping)) {

        $fp = fopen($ping, "r");
        $contenu_du_fichier = fgets($fp, 255);
        fclose($fp);

        $jsonScan = json_decode($contenu_du_fichier);

        $jsonSites = $jsonScan['sites'];

        $nbrEnd = 0;

        foreach ($jsonSites as $value) {

            $raport = HOMEURL . '/output/' . str_replace('.', '', $value['url']) . '.php';

            if (is_file($raport))
                $nbrEnd++;
        }

        if (sizeof($jsonSites) == $nbrEnd) {
            $json['status_code'] = 200;
            $json['status_message'] = 'Scan end.';


            /* Si scan terminé
             * 
             * 
             */

            echo json_encode($json);
        } else {
            $json['status_code'] = 400;
            $json['status_message'] = 'Scan en cours.';

            echo json_encode($json);
        }
    } else {

        $json['status_code'] = 400;
        $json['status_message'] = 'Aucun scan en cours.';

        echo json_encode($json);
    }
}
?>