<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<script>
    var $btnStart = $('#btnStart');


    function scanEnd() {
        $.ajax({
            url: BASEURL + 'analyse',
            type: 'POST',
            data: 'scanend=JDGH+kuoinxbv67nxvc&sites=' + listeSites, // on envoie $_GET['']
            dataType: 'json', // on veut un retour JSON
            success: function (json) {
                $.each(json, function (index, value) {
                    if (json['status_code'] == 400) {
                        $btnStart.removeClass('hidden');
                    } else {

                    }
                });
            }
        });
    }

    $(document).ready(function () {
        $.ajax({
            url: BASEURL + 'analyse',
            type: 'POST',
            data: 'ping=JDGH+kuoinxbv67nxvc&sites=' + listeSites, // on envoie $_GET['']
            dataType: 'json', // on veut un retour JSON
            success: function (json) {
                $.each(json, function (index, value) {
                    if (json['status_code'] == 400) {
                        $btnStart.removeClass('hidden');
                    } else {

                    }
                });
            }
        });
    });


    function cheickScanProgress() {
        setInterval(function () {
            $.ajax({
                url: BASEURL + 'analyse',
                type: 'POST',
                data: 'ping=JDGH+kuoinxbv67nxvc&sites=' + listeSites, // on envoie $_GET['']
                dataType: 'json', // on veut un retour JSON
                success: function (json) {
                    $.each(json, function (index, value) {
                        if (json['status_code'] == 400) {
                            $btnStart.removeClass('hidden');
                        } else {

                        }
                    });
                }
            });
        }, 3000);
    }

</script>
