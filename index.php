<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
  require_once 'libs/php-ssllabs-api/sslLabsApi.php';

  //Return API response as JSON string
  $api = new sslLabsApi();

  //Return API response as JSON object
  //$api = new sslLabsApi(true);


  var_dump($api->fetchHostInformation('https://github.com'));
 * 
 * 
 */


include 'brain/init.php';



$module = Router::parse_url();






if (Brain::sessionencours()) {
    
} else {

    if (!Router::module_exist($module)) {
        header('location:' . HOMEURL);
    }
    //include 'modules/' . $module . '/' . $module . '.php';
    
    include 'modules/admin/admin.php';
}