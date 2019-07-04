<div class="col-lg-6">
                                                    <div class="card">
                                                        <div class="card-header">Register user</div>
                                                        <div class="card-body card-block">
                                                            <form action="models/users/register.php" method="post">
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                                                        <input type="email" id="email" name="email" placeholder="Email" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                                                        <input type="password"  name="password" placeholder="Password" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                                                        <input type="password"  name="confirm-password" placeholder="Confirm password" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Role of user</label></div>
                                                                    <div class="col-12 col-md-9">
                                                                        <select name="id_role" id="select" class="form-control">
                                                                            <option value="0">Please select</option>
                                                                            <?php 
                                                                                require_once "models/users/user_functions.php";

                                                                                $roles = allRoles();
                                                                                
                                                                                foreach($roles as $role):
                                                                            ?>
                                                                            <option value="<?=$role->id?>"><?=$role->name?></option>
                                                                                <?php endforeach; ?>    
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-actions form-group"><button type="submit" class="btn btn-success btn-sm" name="register">Register new user</button></div>
                                                            </form>
                                                           <?php if(isset($_GET['Message'])){
                echo '<h2>'.$_GET['Message'].'</h2>'; }?>
              
                                                        </div>
                                                    </div>
                                                </div>