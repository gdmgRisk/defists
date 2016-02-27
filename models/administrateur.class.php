<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Administrateur {
    
    private $id;
    private $nom;
    private $prenoms;
    private $email;
    private $password;
    private $telephone;
    private $privilege;
    
    function __construct() {
        
    }

    
    
    function getNom() {
        return $this->nom;
    }

    function getPrenoms() {
        return $this->prenoms;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getTelephone() {
        return $this->telephone;
    }

    function getPrivilege() {
        return $this->privilege;
    }

    function getId() {
        return $this->id;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenoms($prenoms) {
        $this->prenoms = $prenoms;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    function setPrivilege($privilege) {
        $this->privilege = $privilege;
    }

    function setId($id) {
        $this->id = $id;
    }


    
    
}
