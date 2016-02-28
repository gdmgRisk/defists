<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Brain {

    /**
     * @return boolean donne l'etat connecté ou non d'un administrateur
     */
    static function administrateurGconnecter() {


        return false;
    }

    /**
     * @return boolean donne l'etat connecté d'un utilisateur
     */
    static function sessionencours() {

        if (isset($_SESSION['email']) && isset($_SESSION['email']) && isset($_SESSION['email']))
            return TRUE;
        else {
            return FALSE;
        }
    }

    /**
     * @return boolean donne l'etat connecté d'un utilisateur
     */
    static function privilegeAdmin() {

        if ($_SESSION['privilege'] != 0)
            return TRUE;
        else {
            return FALSE;
        }
    }

    /**
     * @retur array code_erreur , message_erreur ,cause_erreur
     * 
     */
    static function connexion_admin($login, $password) {

        $query = 'SELECT * FROM t_admin WHERE email=?';

        $bdd = Connexion::connexionbdd();
        $statement = $bdd->prepare($query);
        $statement->execute(array($login));
        /*
         * Definition de l'erreur
         * 
         * @ code_erreur , message_erreur ,cause_erreur
         */
        $erreur = array();

        /*
         * Si le user existe 
         */
        if ($result = $statement->fetch()) {

            /*
             * Verification de mot de passe
             */
            if ($result['password'] == $password) {
                return $result;
            } else {
                $erreur['erreur_code'] = ERREUR_PASSWORD;
                $erreur['erreur_message'] = 'Mot de passe invalide.';
                return $erreur;
            }
        }
        $erreur['erreur_code'] = ERREUR_CONNEXION_SERVEUR;
        $erreur['erreur_message'] = 'Ce mail n\'existe pas dans notre base';
        return $erreur;
    }

    /**
     * @param array $admin Description
     * @return void
     */
    static function ouvrirSession($admin) {
        $_SESSION['id'] = $admin['id'];
        $_SESSION['nom'] = $admin['nom'];
        $_SESSION['prenoms'] = $admin['prenoms'];
        $_SESSION['email'] = $admin['email'];
        $_SESSION['privilege'] = $admin['privilege'];
    }

    /**
     * Permet de <h1>DECONNECTER</h1>
     * @param 
     * @return 
     */
    static function deconnexion() {
        unset($_SESSION['id']);
        unset($_SESSION['nom']);
        unset($_SESSION['prenoms']);
        unset($_SESSION['email']);
        unset($_SESSION['privilege']);
        session_destroy();
    }

    /*
     * @Param 
     * @retur 
     * 
     */

    static function charger_all_clients() {
        $bdd = Connexion::connexionbdd();

        $requete = $bdd->prepare("SELECT * FROM t_site ") or die(print_r($bdd->errorInfo()));

        $requete->execute();
        $tab = array();

        foreach ($requete as $r) {

            $tab[] = $r;
        }
        $requete->closeCursor();

        return $tab;
    }

    static function enregistreradmin($nom, $prenoms, $contact, $email, $password) {
        $bdd = Connexion::connexionbdd();
        $requete = $bdd->prepare("INSERT into t_admin (nom, prenoms ,email , password, contact) "
                . "value (:n, :p, :e, :pas, :c)") or die(print_r($bdd->errorInfo()));

        $requete->bindParam(':n', $nom);
        $requete->bindParam(':p', $prenoms);
        $requete->bindParam(':e', $email);
        $requete->bindParam(':pas', $password);
        $requete->bindParam(':c', $contact);

        $requete->execute();

        return $bdd->lastInsertId('id');
    }

    static function enregistrerSite($url) {
        $bdd = Connexion::connexionbdd();


        $requete = $bdd->prepare("INSERT into t_site (nom, url, date) "
                . "value (:n, :u, :d)") or die(print_r($bdd->errorInfo()));

        $requete->bindParam(':n', $url);
        $requete->bindParam(':u', $url);
        $requete->bindParam(':d', date('Y-m-d'));

        $requete->execute();

        return $bdd->lastInsertId('id');
    }

    static function enregistrerrelationSiteAdmin($idadmin, $idsite) {

        $bdd = Connexion::connexionbdd();
        $requete = $bdd->prepare("INSERT into t_admin_site (admin_id, site_id) "
                . "value (:adid, :siid)") or die(print_r($bdd->errorInfo()));

        $requete->bindParam(':adid', $idadmin);
        $requete->bindParam(':siid', $idsite);

        $requete->execute();
    }

    static function changerEtat($id, $etat) {
        if ($etat == 0) {

            $stringRequette = 'UPDATE t_site SET etat = 0 WHERE id=?';
        } else {

            $stringRequette = 'UPDATE t_site SET etat = 1 WHERE id=?';
        }
        $bd = Connexion::connexionbdd();
        $requete = $bd->prepare($stringRequette) or die(print_r($bd->errorInfo()));
        $requete->execute(array($id));

        return TRUE;
    }

}
