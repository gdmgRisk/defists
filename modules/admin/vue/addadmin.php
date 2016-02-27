<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>



<div class="container">
    <div class="center-block container container-fluid">
        <div class="col-xs-4 col-xs-offset-4">

            <form class="" method="post" action="">
                <!-- ajout administrateur -->
                <input hidden="" name="ajoutadmin" class="hidden"/>


                <div class="form-group form-horizontal">

                    <label for="">Nom</label>
                    <input name="nom" type="text" class="form-control" placeholder="Votre nom" required=""/>

                </div>
                <div class="form-group form-horizontal">

                    <label for="">Prénoms</label>
                    <input name="prenoms" type="text" class="form-control" placeholder="Votre nom" required=""/>

                </div>
                <div class="form-group form-horizontal">

                    <label for="">Email</label>
                    <input name="email" type="email" class="form-control" placeholder="Votre nom" required=""/>

                </div>
                <div class="form-group form-horizontal">

                    <label for="">Nom</label>
                    <input name="nom" type="text" class="form-control" placeholder="Votre nom"/>

                </div>

                <div>
                    <button class="btn btn-danger btn-lg" >Enregistrer</button>
                    <button class="btn btn-lg btn-dark">Annuler</button>
                </div>



            </form>

        </div>

    </div>
</div>