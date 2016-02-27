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

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Liste clients <small></small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table id="tableClients" class="table table-striped responsive-utilities jambo_table">
                                <thead>
                                    <tr class="headings">
                                        <th>
                                            ID
                                        </th>
                                        <th>Nom </th>
                                        <th>Url</th>
                                        <th>Ip </th>
                                        <th>Date souscription </th>
                                        <th>notification </th>
                                        <th class=" no-link last"><span class="nobr">Action</span>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody id="tableClientsCorps">
                                    
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>