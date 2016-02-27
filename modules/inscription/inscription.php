<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$params = Router::parametres_url();



if (isset($_POST['ajoutclient'])) {

    $nom = htmlspecialchars($_POST['nom']);
    $prenoms = htmlspecialchars($_POST['prenoms']);
    $password = htmlspecialchars($_POST['password']);
    $confirmpassword = htmlspecialchars($_POST['passwordc']);
    $site = htmlspecialchars($_POST['site']);
    $url = htmlspecialchars($_POST['url']);
    $contact = htmlspecialchars($_POST['tel']);
    $email = htmlspecialchars($_POST['email']);

    if ($password == $confirmpassword) {
        $idadmin = Brain::enregistreradmin($nom, $prenoms, $contact, $email, $password);
        $idsite = Brain::enregistrerSite($url);

        Brain::enregistrerrelationSiteAdmin($idadmin, $idsite);

        header('location:' . HOMEURL);
    } else {
        $erreur = "Mot de passe incorrect!";
    }
}

include 'globale/head.php';
include 'globale/header.php';

/**
 * 
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

