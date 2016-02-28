<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$params = Router::parametres_url();

/**
 * 
 */
if (Brain::sessionencours() && Brain::privilegeAdmin()) {
    if (sizeof($params) > 0) {
        $vue = __DIR__ . '/function/' . $params[0] . '.php';

        if (is_file($vue)) {
            include 'function/' . $params[0] . '.php';
        } else {

            include 'function/listClients.php.php';
        }
    } else {
        include 'function/listClients.php.php';
    }
} else {

    header('location:' . HOMEDIR);
}
