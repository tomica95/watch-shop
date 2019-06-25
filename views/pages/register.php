<?php
              if(isset($_GET['Message'])){
                echo '<h2>'.$_GET['Message'].'</h2>';
              }
            
            ?>
<div class="container">
    <div class="row">
        
        <div class="col-sm-9" id="content">
            <h1>Register Account</h1>
            <p>If you already have an account with us, please login at the <a href="index.php?page=login">login page</a>.</p>
            <form class="form-horizontal" method="post" action="models/auth/register.php">
                <fieldset id="account">
                    <legend>Personal Detail</legend>
                    <div class="form-group required">
                        <label for="input-email" class="col-sm-2 control-label">E-Mail</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-email" placeholder="E-Mail" value="" name="email"><div id="mail-mistake"></div>
                        </div>
                    </div>
                   
                </fieldset>
                <fieldset>
                    <legend>Your Password</legend>
                    <div class="form-group required">
                        <label for="input-password" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="input-password" placeholder="Password" value="" name="password"><div id="password-mistake"></div>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-confirm" class="col-sm-2 control-label">Password Confirm</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="input-confirm" placeholder="Password Confirm" value="" name="confirm-password">
                            <div id="conf-password-mistake"></div>
                        </div>
                    </div>
                </fieldset>
                
                <div class="buttons">
                    <div class="pull-center">
                        <input type="submit" class="btn btn-primary" value="Register" name="register" id="reg">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>