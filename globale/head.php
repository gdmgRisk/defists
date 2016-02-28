<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> | </title>

        <!-- Bootstrap core CSS -->

        <link href="<?php echo HOMEURL; ?>/design/css/bootstrap.min.css" rel="stylesheet">

        <link href="<?php echo HOMEURL; ?>/design/fonts/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo HOMEURL; ?>/design/css/animate.min.css" rel="stylesheet">

        <!-- Custom styling plus plugins -->
        <link href="<?php echo HOMEURL; ?>/design/css/custom.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo HOMEURL; ?>/design/css/maps/jquery-jvectormap-2.0.1.css" />
        <link href="<?php echo HOMEURL; ?>/design/css/icheck/flat/green.css" rel="stylesheet" />
        <link href="<?php echo HOMEURL; ?>/design/css/floatexamples.css" rel="stylesheet" type="text/css" />

        <script src="<?php echo HOMEURL; ?>/design/js/jquery.min.js"></script>



        <link rel="stylesheet" type="text/css" href="<?php echo HOMEURL; ?>/design/css/default.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo HOMEURL; ?>/design/css/component.css" />


        <link href="<?php echo HOMEURL; ?>/design/css/datatables/tools/css/dataTables.tableTools.css" rel="stylesheet">

        <!--Material design -->
        <link rel="stylesheet" type="text/css" href="<?php echo HOMEURL; ?>/design/css/mui.css"/>
        <script src="<?php echo HOMEURL; ?>/design/js/mui.js"></script>
        <!-- Custom styling plus plugins -->
        <link href="<?php echo HOMEURL; ?>/design/main.css" rel="stylesheet">


        <!--[if lt IE 9]>
            <script src="../assets/js/ie8-responsive-file-warning.js"></script>
            <![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->


        <script>

            var permanotice, tooltip, _alert;

            $(function () {
                var cnt = 10; //$("#custom_notifications ul.notifications li").length + 1;
                TabbedNotification = function (options) {
                    var message = "<div id='ntf" + cnt + "' class='text alert-" + options.type + "' style='display:none'><h2><i class='fa fa-bell'></i> " + options.title + "</h2><div class='close'><a href='javascript:;' class='notification_close'><i class='fa fa-close'></i></a></div><p>" + options.text + "</p></div>";

                    if (document.getElementById('custom_notifications') == null) {
                        alert('doesnt exists');
                    } else {
                        $('#custom_notifications ul.notifications').append("<li><a id='ntlink" + cnt + "' class='alert-" + options.type + "' href='#ntf" + cnt + "'><i class='fa fa-bell animated shake'></i></a></li>");
                        $('#custom_notifications #notif-group').append(message);
                        cnt++;
                        CustomTabs(options);
                    }
                }

                CustomTabs = function (options) {
                    $('.tabbed_notifications > div').hide();
                    $('.tabbed_notifications > div:first-of-type').show();
                    $('#custom_notifications').removeClass('dsp_none');
                    $('.notifications a').click(function (e) {
                        e.preventDefault();
                        var $this = $(this),
                                tabbed_notifications = '#' + $this.parents('.notifications').data('tabbed_notifications'),
                                others = $this.closest('li').siblings().children('a'),
                                target = $this.attr('href');
                        others.removeClass('active');
                        $this.addClass('active');
                        $(tabbed_notifications).children('div').hide();
                        $(target).show();
                    });
                }

                CustomTabs();

                var tabid = idname = '';
                $(document).on('click', '.notification_close', function (e) {
                    idname = $(this).parent().parent().attr("id");
                    tabid = idname.substr(-2);
                    $('#ntf' + tabid).remove();
                    $('#ntlink' + tabid).parent().remove();
                    $('.notifications a').first().addClass('active');
                    $('#notif-group div').first().css('display', 'block');
                });
            });
        </script>
    </head>