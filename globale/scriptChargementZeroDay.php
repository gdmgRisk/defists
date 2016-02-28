<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>



<script>


    function OnClicktraitement() {
        $.ajax({
            url: BASEURL + 'zerodays',
            type: 'POST',
            data: 'traitement=JDGH+kuoinxbv67nxvc&sites=liste', // on envoie $_GET['']
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

    $(function () {



        var $listZD = $('#listZDays');
        // chargement des pays
        $.ajax({
            url: BASEURL + 'traitement/traitement',
            data: '', // on envoie $_GET['']
            dataType: 'json', // on veut un retour JSON
            success: function (json) {
                $listZD.empty();
                $.each(json, function (index, value) {

                    $listZD.append('<li>\n\
                                    <div class="block">\n\
                                        <div class="tags">\n\
                                                <a href="" class="tag"><span>' + index + '</span></a>\n\
                                            </div>\n\
                                            <div class="block_content">\n\
                                                <h2 class="title"><a>' + value[0] + '</a></h2>\n\
                                                <div class="byline">\n\
                                                <span></span><a></a>\n\
                                            </div>\n\
                                            <p class="excerpt">' + value[2] + ' <a>Read&nbsp;More</a>\n\
                                            </p>\n\
                                        </div>\n\
                                    </div>\n\
                                    </li>');

                });

                document.getElementById("btnTraitement").addClass('hidden');
            }
        });

    });
</script>