<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$module = Router::parse_url();

$params = Router::parametres_url();


if ($module == 'filtretelechargement') {

    include 'globale/head.php';
    include 'vue/default.php';
} else {
    
}