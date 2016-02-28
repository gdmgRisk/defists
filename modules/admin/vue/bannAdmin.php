<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="block center-block" style="height: 300px; width: 100%; background:url('<?php echo HOMEURL; ?>/design/SchoolKid.jpg') repeat scroll 50% 80%">
    <div class="col-lg-12" style="height: 300px; width: 100%; background-color: rgba(0, 2, 17,0.7)">
        <img style=" width:270px; margin-top: 30px;" class="img-responsive img-circle col-lg-2 col-lg-offset-3" src="<?php echo HOMEURL; ?>/design/images/user.png">
        <div style="color:#fff; margin-top:50px;" class="col-lg-4 col-lg-offset-1">
            <h2><?php echo $_SESSION['nom'];  ?></h2>
            <h5><?php  echo $_SESSION['prenoms']; ?></h5>
            <h5><?php echo $_SESSION['email'];  ?></h5>
            <h5><?php  echo 'Niveau d\'administration :'.$_SESSION['privilege']; ?></h5>


        </div>

        <button class="mui-btn mui-btn--large mui-btn--primary mui-btn--fab" style="    margin-top: 19%;
                margin-right: 2%;
                float: right"><i class="fa fa-pencil"></i>
        </button>
    </div>
</div>