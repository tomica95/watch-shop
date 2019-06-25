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
                            <input type="email" class="form-control" id="input-email" placeholder="E-Mail" value="" name="email">
                        </div>
                    </div>
                   
                </fieldset>
                <fieldset>
                    <legend>Your Password</legend>
                    <div class="form-group required">
                        <label for="input-password" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="input-password" placeholder="Password" value="" name="password">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-confirm" class="col-sm-2 control-label">Password Confirm</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="input-confirm" placeholder="Password Confirm" value="" name="confirm-password">
                        </div>
                    </div>
                </fieldset>
                
                <div class="buttons">
                    <div class="pull-center">
                        <input type="submit" class="btn btn-primary" value="Continue" name="register">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>