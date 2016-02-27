<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
?>



<div class="content">

    <div class="">
        <div class="">
            <!--
            <?php
            /**
              if (!Brain::sessionencours()) {
              echo ' <!--Small modal -->

              <div class = "modal fade bs-example-modal-sm" tabindex = "-1" role = "dialog" aria-hidden = "true">
              <div class = "modal-dialog modal-sm">
              <div class = "modal-content">

              <div class = "modal-header">
              <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">×</span>
              </button>
              <h4 class = "modal-title" id = "myModalLabel2">Connexion</h4>
              <p>Si vous etes un administrateur veuillez </p>
              </div>
              <form class = "modal-body form-horizontal" action = "<?php echo HOMEURL;?>/login">


              <div class = "form-group">
              <label for = "email">Email</label>
              <div class = "form-group form-inline">
              <i class = "fa fa-user form-control"></i>
              <input required = "" name = "email" type = "email" id = "email" class = "form-control" placeholder = "Votre e_mail">

              </div>

              </div>
              <div class = "form-group">
              <label for = "password">Mot de passe</label>
              <div class = "form-group form-inline">
              <i class = "fa fa-key form-control"></i>
              <input required = "" name = "password" type = "password" id = "password" class = "form-control" />
              </div>
              </div>

              <div class = "modal-footer" style = "padding-bottom: 5px; margin-top: 50px;">
              <button type = "submit" class = "btn btn-dark" >Connexion</button>
              </div>

              </form>
              </div>
              </div>
              <!--/modals -->
              </div>';
              }
             * 
             * *
             */
            ?>
            
            -->
        </div>
    </div>


</div>

<script src="<?php echo HOMEURL; ?>/design/js/bootstrap.min.js"></script>

<script src="<?php echo HOMEURL; ?>/design/js/nicescroll/jquery.nicescroll.min.js"></script>
<!-- icheck -->
<script src="<?php echo HOMEURL; ?>/design/js/icheck/icheck.min.js"></script>

<script src="<?php echo HOMEURL; ?>/design/js/custom.js"></script>

<!-- PNotify -->
<script type="text/javascript" src="<?php echo HOMEURL; ?>/design/js/notify/pnotify.core.js"></script>
<script type="text/javascript" src="<?php echo HOMEURL; ?>/design/js/notify/pnotify.buttons.js"></script>
<script type="text/javascript" src="<?php echo HOMEURL; ?>/design/js/notify/pnotify.nonblock.js"></script>
<!-- Datatables -->
<script src="<?php echo HOMEURL; ?>/design/js/datatables/js/jquery.dataTables.js"></script>
<script src="<?php echo HOMEURL; ?>/design/js/datatables/tools/js/dataTables.tableTools.js"></script>


<script>

    var BASEURL = 'http://localhost/defists/';

    $(document).ready(function () {
        $("#tableClients").DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>



<script>
    
     var permanotice, tooltip, _alert;
        $(function () {
            new PNotify({
                title: "PNotify",
                type: "dark",
                text: "Welcome. Try hovering over me. You can click things behind me, because I'm non-blocking.",
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

        });
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
    })
</script>
<?php
if (Router::parse_url() == 'admin' && sizeof(Router::parametres_url()) > 0) {
    if (Router::parametres_url()[0] == 'listClients') {
        include 'scriptChargement.php';
    }
}
?>


</body>

</html>