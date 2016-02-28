<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$scanDayFinish = Brain::scanExist();


if ($scanDayFinish == TRUE) {
    $scanDayFinish = 'hidden';
} else {
    $scanDayFinish = '';
}
?>


<div class="container">
    <div class="center-block container container-fluid">
        <div class="">
            <div class="clearfix"></div>
            <div class="col-lg-12" style="padding: 30px">
                <div class="col-lg-4" style="padding: 10px; height: 400px">
                    <div class="btn-group-vertical col-lg-12" id="listSITE">
                    </div>
                </div>  

                <div class="col-lg-8 thumbnail" style="height: 400px;  background-color: #000; overflow: hidden ">

                    <!---------- btn ---->
                    <button onclick="startScan();" id="btnstartbtn" class="<?php echo $scanDayFinish; ?> animate animated fadeInRightBig mui-btn mui-btn--large mui-btn--raised mui-btn--fab" style="margin-top: 9%;float: left; width: 200px; height: 200px; margin-left: 40%">
                        <i class="fa fa-4x fa-play"></i><p>Demarrer</p></button>

                    <div class="log col-lg-12">
                        <ul class="log col-lg-12 center-block " id="logline" style=" color: rgb(255, 234, 0); overflow: scroll; overflow-x: hidden; height: 400px">
                        </ul>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>


<script>
    var listeSites;

    var $logline = $('#logline');
    $(function () {
        $logline.append('<li class="animate animated fadeIn fadeInRightBig">> $norisk..................................................</li>');
        $logline.append('<li class="animate animated fadeIn fadeInRightBig">> chargement des sites clients.............................</li>');

        var $listSITE = $('#listSITE');
        // chargement des clients
        $.ajax({
            url: BASEURL + 'ajax/listClients',
            data: '', // on envoie $_GET['']
            dataType: 'json', // on veut un retour JSON
            success: function (json) {

                listeSites = json;
                $listSITE.empty();

                $.each(json, function (index, value) {

                    $listSITE.append('<div class="x_panel tile col-lg-12"><div class="x_title col-lg-12">\n\
                                        <h2 id="nom">' + value["nom"] + '</h2>\n\
                                            <ul class="nav navbar-right panel_toolbox">\n\
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>\n\
                                                <li class="dropdown">\n\
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">\n\
                                                <i class="fa fa-wrench"></i></a></li>\n\
                                                <li><a class="close-link"><i class="fa fa-close"></i></a></li>\n\
                                            </ul><div class="clearfix"></div></div><div class="x_content">\n\
                                        <div class="dashboard-widget-content"><ul class="quick-list">\n\
                                        <li><i class="fa fa-calendar-o"></i><a href="#" id="ip">' + value["ip"] + '</a></li>\n\
                                        <li><i class="fa fa-bars"></i><a href="#" id="url">' + value["url"] + '</a></li>\n\
                                        <li><i class="fa fa-bar-chart"></i><a href="#" id="date">' + value["date"] + '</a> </li>\n\
                                        <li><i class="fa fa-line-chart"></i><a href="#" id="sms">' + value["sms"] + '</a></li>\n\
                                        <li><i class="fa fa-bar-chart"></i><a href="#" id="etat">' + value["etat"] + '</a> </li>\n\
                                        </ul><div class="sidebar-widget"><a href="' + value["scanfile"] + '"> <img src="' + value["img"] + '"/>Télécharger le rapport json</a></div></div></div>\n\
                                        </div>');
                    $logline.append('<li class="animate animated fadeIn fadeInRightBig">> ' + value["nom"] + '.............................................</li>');

                });
            }
        });




    });


    function startScan() {


        var $btnStart = $('#btnstartbtn');
        // chargement 

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
        $('#floatBox').removeClass('hidden');
        $.ajax({
            url: BASEURL + 'analyse',
            type: 'POST',
            data: 'auth=JDGH+kuoinxbv67nxvc&sites=list', // on envoie $_GET['']
            dataType: 'json', // on veut un retour JSON
            success: function (json) {
                $.each(json, function (index, value) {
                    $logline.append('<li class="animate animated fadeIn fadeInRightBig">> ' + index + '    ' + value + '.............................................</li>');
                });
            }
        });

    }



</script>