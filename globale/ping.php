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
            data: 'scanend=JDGH+kuoinxbv67nxvc&sites=liste', // on envoie $_GET['']
            dataType: 'json', // on veut un retour JSON
            success: function (json) {
                $.each(json, function (index, value) {
                    if (json['status_code'] == 400) {

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
            data: 'ping=JDGH+kuoinxbv67nxvc&sites=analyse', // on envoie $_GET['']
            dataType: 'json', // on veut un retour JSON
            success: function (json) {
                $logline.append('<li class="animate animated fadeIn fadeInRightBig">> ping.............................................</li>');
                $.each(json, function (index, value) {
                    if (json['status_code'] == 200) {
                        $('#floatBox').removeClass('hidden');
                        cheickScanProgress();
                    } else {

                        $('#floatBox').addClass('hidden');
                    }
                    $logline.append('<li class="animate animated fadeIn fadeInRightBig">> Status code :' + json['status_code'] + '.............................................</li>');
                    $logline.append('<li class="animate animated fadeIn fadeInRightBig">> Status message :' + json['status_message'] + '...............................</li>');

                });
            }
        });
    });
    function cheickScanProgress() {
        setInterval(function () {
            $.ajax({
                url: BASEURL + 'analyse',
                type: 'POST',
                data: 'ping=JDGH+kuoinxbv67nxvc&sites=LISTE', // on envoie $_GET['']
                dataType: 'json', // on veut un retour JSON
                success: function (json) {
                    $logline.append('<li class="animate animated fadeIn fadeInRightBig">> Scan progress :............................................. </li>');

                    $.each(json, function (index, value) {
                        if (json['status_code'] == 400) {
                            $('#floatBox').addClass('hidden');
                        } else {
                            scanEnd();
                        }
                        $logline.append('<li class="animate animated fadeIn fadeInRightBig">> Status code :' + json['status_code'] + '.............................................</li>');
                        $logline.append('<li class="animate animated fadeIn fadeInRightBig">> Status message :' + json['status_message'] + '............................</li>');

                    });
                }
            });
        }, 10000);
    }

</script>
