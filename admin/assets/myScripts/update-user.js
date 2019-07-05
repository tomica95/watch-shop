$(document).ready(function(){

    $('.update-user').on('click',function(){

        let id = $(this).data('id');

        $.ajax({
            url:"models/users/user-update.php",
            method:"POST",
            data:
            {
                id
            },
            dataType:"json",
            success:function(data)
            {
                let html = `
                <div class="col-lg-6">
                                                    <div class="card">
                                                        <div class="card-header">Register user</div>
                                                        <div class="card-body card-block">
                                                            <form action="models/users/update.php" method="post">
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                                                        <input type="email" value="${data.user.email}" id="email" name="email" placeholder="Email" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                                                        <input type="password" value="${data.user.password}" name="password" placeholder="Password" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                                                        <input type="password" value="${data.user.password}" name="confirm-password" placeholder="Confirm password" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Role of user</label></div>
                                                                    <div class="col-12 col-md-9">
                                                                        <select name="role_id" id="select" class="form-control">
                                                                            <option value="0">Please select</option>
                                                                            `;
                                                                            
                                                                            for(role of data.roles){

                                                                               html+=` <option value="${role.id}">${role.name}</option>`;

                                                                            }
                                                                            
                                                                                
                                                                        html+=`</select>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" value="${data.user.id}" name="id">
                                                                <div class="form-actions form-group"><button type="submit" class="btn btn-success btn-sm" name="update">Update</button></div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                `;

                $('#user-update').html(html);
            },
            error:function(error){

                alert(error);
            }
        })
    })
})