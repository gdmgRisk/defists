<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if (isset($_POST['password']) && isset($_POST['email'])) {

    $login = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $resultat = Brain::connexion_admin($login, $password);
    /*
     * S'il y a un code d'eurreur l'admin ne peux pas se connecté
     */
    if (!isset($resultat['erreur_code'])) {

        Brain::ouvrirSession($resultat);

        header('location:' . HOMEURL);
    }
} else {


    include 'globale/headLogin.php';

    include 'vue/vue.php';
}

