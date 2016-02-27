<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<body style="background:#F7F7F7;">

    <div class="">
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>

        <div class="col-lg-12">
            
            <div class="left col-lg-6" style="padding: 10%">
                <img src="design/Pentestfr1.png" class="img-circle img-thumbnail" style="max-height: 400px"/>
            </div>
            
            <div class="animate form col-lg-4">
                <section class="login_content" style="padding-top: 40%">
                    <form class="form" method="post" action="<?php echo HOMEURL;?>/login">
                        <div class="form-group">
                            <label>Login</label>
                            <input name="email" type="text" class="form-control" placeholder="Votre email" required="" />
                        </div>
                        <div class="form-group">
                            <label>Mot de passe</label>
                            <input name="password" type="password" class="form-control" placeholder="Mot de passe" required="" />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-default submit" href="">Connexion</button>
                            <a class="reset_pass" href="#">Lost your password?</a>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">

                           
                            <div class="clearfix"></div>
                            <br />
                            
                        </div>
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
            
            
            <!-- <div id="register" class="animate form">
                <section class="login_content">
                    <form>
                        <h1>Create Account</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Username" required="" />
                        </div>
                        <div>
                            <input type="email" class="form-control" placeholder="Email" required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" required="" />
                        </div>
                        <div>
                            <a class="btn btn-default submit" href="index.html">Submit</a>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">

                            <p class="change_link">Already a member ?
                                <a href="#tologin" class="to_register"> Log in </a>
                            </p>
                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <h1><i class="fa fa-paw" style="font-size: 26px;"></i> Gentelella Alela!</h1>

                                <p>©2015 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                            </div>
                        </div>
                    </form>
                    
                </section>
                
            </div> -->
        </div>
    </div>

</body>

</html>