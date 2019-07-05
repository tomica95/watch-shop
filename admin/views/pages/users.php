<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Users</strong>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                require_once "models/users/user_functions.php";
                                $users = allUsers();
                                foreach($users as $user):
                            ?>
                                <tr>
                                    <th scope="row"><?=$user->id?></th>
                                    <td><?=$user->email?></td>
                                    <td><?=$user->name?></td>
                                    <td>
                                    <button type="submit" class="btn btn-primary btn-sm update-user" data-id="<?=$user->id?>">
                                     <i class="fa fa-dot-circle-o"></i> Update
                                    </button>
                                    </td>
                                    <td>
                                    <form method="POST" action="models/users/delete.php">
                                    <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Delete
                                    </button>
                                    <input type="hidden" name="id" value="<?=$user->id?>">
                                    </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                       
                    </div>
                    
                </div>
                <div id="user-update"></div>
            </div>

            </div>
    </div><!-- .animated -->
</div>