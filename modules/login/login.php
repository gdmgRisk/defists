<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_POST['password'])) {
    header('location:index.php');
} else {
    include 'globale/headLogin.php';
    include 'vue/vue.php';
}
