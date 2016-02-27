<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Connexion {

    static function connexionbdd() {
        try {
            $strConnection = SQL_DNS; //on definit la chaine de connexion
            $arrExtraParam = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"); // execution de la commande pour l'utilisation de L'UTF-8
            $bdd = new PDO($strConnection, SQL_USERNAME, SQL_PASSWORD, $arrExtraParam); //instancie la connexion.si elle echoue ,PDO lancera une exception
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //rapporte les erreurs sous forme d'exceptions    
        } catch (Exception $e) {
            $msg = 'ERREUR PDO dans' . $e->getfile() . 'L.' . $e->getLine() . ':' . $e->getMessage();
            die($msg);
        }
        return $bdd;
    }

    /*
     * 
     */

    static function retry_connexion() {
        
    }

    /*
     * 
     */

    static function detect_error() {
        
    }

}
