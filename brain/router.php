<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Router {
    
    
    static function redirectionRouter(){
        
    }


    /*
     * Permet de decouper mon url
     * @return un module
     */

    static function parse_url() {
        $module = 'accueil';
        $array_lien = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

        if (sizeof($array_lien) > 1) {
            if ($array_lien[1] == 'index.php')
                return $module;
            else {
                return $array_lien[1];
            }
        } else {
            return $module;
        }
    }

    /*
     * Permet de decouper mon url
     * @return une action
     */

    static function action_url() {

        $array_lien = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

        if (count($array_lien) > 3) {
            return $array_lien[3];
        } else {
            $action = 'defaut';
            return $action;
        }
    }

    /*
     * Permet de decouper mon url
     * @return un module
     */

    static function parametres_url() {

        $array_lien = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

        $params = array();
        if (sizeof($array_lien) > 2) {
            $i = 1;
            foreach ($array_lien as $value) {
                if ($i != 1 && $i != 2) {
                    $params[] = $value;
                }
                $i++;
            }
        }
        return $params;
    }

    /*
     * @Params le module
     * @return TRUE ou FALSE
     */

    static function module_exist($module) {

        $repertoire = 'modules/' . $module . '/' . $module . '.php';
        if (is_file($repertoire)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
