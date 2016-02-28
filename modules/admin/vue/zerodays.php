<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>



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
            
            
            <button onclick="OnClicktraitement()" class="mui-btn mui-btn--large mui-btn--dark mui-btn--danger" style="margin-left: 5%" disabled="" id="btnTraitement">
                <i class="fa fa-pencil"></i>Traitement</button>

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Zero Days<small></small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#"></a>
                                        </li>
                                        <li><a href="#"></a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_panel">

                            <div class="x_content" onload="chargerListZeroDay()">
                                <ul class="list-unstyled timeline" id="listZDays">

                                </ul>

                            </div>

                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>