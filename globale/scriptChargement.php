<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<script>




    function initInfos() {



        var $clients = $('#tableClientsCorps');
        // chargement des pays
        $.ajax({
            url: BASEURL + 'ajax/listClients',
            data: '', // on envoie $_GET['']
            dataType: 'json', // on veut un retour JSON
            success: function (json) {
                $clients.empty();
                $.each(json, function (index, value) {
                    $checked = '';
                    if (value['etat'] == 0) {

                    } else {
                        $checked = 'checked';
                    }


                    $clients.append('<tr>\n\
            <td>' + index + '</td>\n\
            <td><a href="">' + value['nom'] + '</a></td>\n\
            <td>' + value['url'] + '</td>\n\
            <td>' + value['ip'] + '</td>\n\
            <td>' + value['date'] + '</td>\n\
             <td>' + value['sms'] + '</td>\n\
            <td> \n\
                <p style="padding-left: 10px">\n\
                    <input  name="' + index + '" type="checkbox" ' + $checked + ' id="' + index + '" onclick="envoyerEtat(' + index + ')" />\n\
                    <label for="' + index + '">\n\
                    <span class="ui"></span>Activation</label>\n\
                </p>\n\
            </td>\n\
            </tr> ');

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

    }

    function envoyerEtat(id) {

        var etat;
        var dtt = id;

        document.getElementById(id).checked ? etat = 1 : etat = 0;
        $.ajax({
            url: BASEURL + 'ajax/changeEtatClient/' + etat + '/' + id,
            data: '', // on envoie $_GET['']
            dataType: 'json', // on veut un retour JSON
            success: function (json) {
            }
        });
    }



</script>