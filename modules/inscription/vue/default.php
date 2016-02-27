<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="container">

    <div class="content center-block" style="">

        <div class="banniere" style="height:200px; width: 100%; background-color: #003973 ">

        </div>
        <div class="clearfix container" style="padding:2%">

            <form method="post" action="" class="form-horizontal " >
                <!-- ajout de client -->

                <div class="col-xs-offset-2 col-lg-8">
                    <input hidden="" name="ajoutclient" class="hidden"/>
                    <div class="col-lg-6">
                        <div class="form-group">    
                            <label class="col-lg-4" for="">Nom</label>
                            <input type="text" class="form-control" name="nom"  placeholder="Votre nom" required="" >

                        </div>

                        <div class="form-group">
                            <label class="col-lg-4" for="prenoms">Prénoms</label>
                            <input type="text" class="form-control" name="prenoms"  placeholder="Votre prenom" required="" >
                        </div> 

                        <div class="form-group">
                            <label class="col-lg-4 " for="email">Email</label>
                            <input type="email" class="form-control" name="email"  placeholder="Votre email" required="" >
                        </div>

                        <div class="form-group">
                            <label class=" col-lg-4" for="contact">Contact</label>

                            <input type="text" class="form-control" name="tel" placeholder="Votre contact" required="" >

                        </div>

                    </div>
                    <div class="col-lg-6">

                        <div class="form-group">
                            <label class="col-lg-4 " for="password">Mot de passe</label>
                            <input type="password" class="form-control" name="password"required="" >
                        </div>

                        <div class="form-group">
                            <label class=" col-lg-4" for="passwordc">Confirmation</label>

                            <input type="password" class="form-control" name="passwordc" required="" >

                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 " for="contact">Site web</label>
                            <input type="text" class="form-control " name="site" placeholder="Le nom de votre site " required="">
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="url">Url</label>
                            <input type="text" class="form-control" name="url" placeholder="L'url de votre site " required="">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group form-horizontal">
                        <div class="col-lg-12  col-xs-offset-4">
                            <button class="mui-btn mui-btn--large mui-btn--primary mui-btn--raised" >Enregistrer</button>
                            <button class="mui-btn mui-btn--large mui-btn--primary mui-btn--danger">Annuler</button>
                        </div>
                    </div>
                </div>


            </form>



            <?php
            if (isset($erreur)) {
                echo '<div class="alert alert-warning alert-dismissible fade in col-xs-offset-6 col-xs-4" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>' . $erreur . '
                                </div>';
            }
            ?>

        </div>
    </div>
</div>