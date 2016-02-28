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


<?php
if (Router::parse_url() == 'admin' && sizeof(Router::parametres_url()) > 0) {
    if (Router::parametres_url()[0] == 'listClients') {
        include 'scriptChargement.php';
    }
}

if (Router::parse_url() == 'admin' && sizeof(Router::parametres_url()) > 0) {
    if (Router::parametres_url()[0] == 'zerodays') {
        include 'scriptChargementZeroDay.php';
    }
}


if (Brain::sessionencours()) {
    include 'ping.php';
}
?>


</body>

</html>