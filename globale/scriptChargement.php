<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>


<script>


    $(document).ready(function () {


        var $admins = $('#admins');
        // chargement des pays
        $.ajax({
            url: BASEURL+'ajax/listClients',
            data: '', // on envoie $_GET['']
            dataType: 'json', // on veut un retour JSON
            success: function (json) {
                $admins.empty();
                $.each(json, function (index, value) {

                });

                $("#tableClients").DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                });
            }
        });
    });


</script>