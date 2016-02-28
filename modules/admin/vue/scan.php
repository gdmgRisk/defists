<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<div class="container">
    <div class="center-block container container-fluid">
        <div class="">
            <div class="clearfix"></div>
            <div class="col-lg-12" style="padding: 30px">
                <div class="col-lg-4" style="padding: 10px; height: 400px">
                    <div class="btn-group-vertical" id="listSITE">
                    </div>
                </div>  

                <div class="col-lg-8" style="height: 400px;  background-color: #000 ">

                    <!---------- btn ---->
                    <button onclick="startScan();" id="btnStart" class="hidden mui-btn mui-btn--large mui-btn--raised mui-btn--fab" style="margin-top: 9%;float: left; width: 200px; height: 200px; margin-left: 40%">
                        <i class="fa fa-4x fa-play"></i><p>Demarrer</p></button>

                    <div>
                        <ul class="log col-lg-12 center-block">
                            <li>>.............</li>

                        </ul>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>


<script>
    var listeSites;

    $(function () {


        var $listSITE = $('#listSITE');
        // chargement des pays
        $.ajax({
            url: BASEURL + 'ajax/listClients',
            data: '', // on envoie $_GET['']
            dataType: 'json', // on veut un retour JSON
            success: function (json) {

                listeSites = json;
                $listSITE.empty();

                $.each(json, function (index, value) {

                    $listSITE.append('<button class="btn btn-default col-lg-12" type="button">' + value["nom"] + '</button>');

                });
            }
        });




    });


    function startScan() {


        var $btnStart = $('#btnStart');
        // chargement des pays

        new PNotify({
            title: "Scan en cours",
            type: "dark",
            text: "Le Scan du jour est en cours. Ceci prendra plusieurs minutes ...",
            nonblock: {
                nonblock: true
            },
            before_close: function (PNotify) {
                // You can access the notice's options with this. It is read only.
                //PNotify.options.text;

                // You can change the notice's options after the timer like this:
                PNotify.update({
                    title: PNotify.options.title + " - Enjoy your Stay",
                    before_close: null
                });
                PNotify.queueRemove();
                return false;
            }
        });

        $btnStart.addClass('hidden');
        $.ajax({
            url: BASEURL + 'analyse',
            type: 'POST',
            data: 'auth=JDGH+kuoinxbv67nxvc&sites=' + listeSites, // on envoie $_GET['']
            dataType: 'json', // on veut un retour JSON
            success: function (json) {
                $.each(json, function (index, value) {

                });
            }
        });

    }



</script>