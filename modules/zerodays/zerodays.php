<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$params = Router::parametres_url();


if (Brain::sessionencours() && Brain::privilegeAdmin()) {

    include 'globale/head.php';
    include 'globale/header.php';

    /**
     * 
     */
    if (sizeof($params) > 0) {

        $vue = __DIR__ . '/vue/' . $params[0] . '.php';

        if (is_file($vue)) {
            include 'vue/' . $params[0] . '.php';
        } else {

            include 'vue/default.php';
        }
    } else {

        include 'vue/default.php';
    }

    //include 'vue/default.php';
    include 'globale/footer.php';
} else {

    header('location:' . HOMEURL);
}
