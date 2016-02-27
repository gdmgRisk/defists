<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



if (isset($_POST['zerodays'])) {



    $html = file_get_html($zeroday);
}

$zeroday = 'https://www.fireeye.com/current-threats/recent-zero-day-attacks.html';

$tableauZeroDays = array();


$html = file_get_html($zeroday);

foreach ($html->find('div.list') as $value) {
    foreach ($value->find('div') as $value1) {
        foreach ($value1->find('h4') as $value3) {
            $annee = substr($value3->innertext, 0, 4);
        }
        foreach ($value1->find('ul.list-bullet') as $value2) {
            $i = 0;
            foreach ($value2->find('li') as $value3) {



                foreach ($value3->find('li>a') as $value4) {
                    $tableauZeroDays[$annee][$i][] = $value4->innertext;
                }

                foreach ($value3->find('li>span') as $value4) {
                    $tableauZeroDays[$annee][$i][] = $value4->innertext;
                }
                $i++;
            }
        }
    }
}

var_dump($tableauZeroDays);
