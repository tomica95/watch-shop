$(document).ready(function(){

    $('.update-category').on('click',function(){

        let id = $(this).data('id');

        $.ajax({
            url:"models/categories/update-category.php",
            method:"POST",
            dataType:"JSON",
            data:{
                id
            },
            success:function(category)
            {
                let html = `<div class="card">
                <div class="card-header">
                    <strong>Upate category : ${category.name}</strong>
                </div>
                <div class="card-body card-block">
                    <form action="models/categories/update.php" method="post" class="">
                        <div class="form-group">
                        <label for="nf-email" class=" form-control-label">Category</label><input type="text" id="nf-email" name="category" value="${category.name}" class="form-control"></div>
                        <input type="hidden" value="${category.id}" name="id">
                        <button type="submit" name="update-category" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Update
                    </button>
                    </form>
                </div>
               
            </div>`;

                $('#category-update').html(html);
            },
            error:function(error){
                
                alert(error);
            }
        })

    })



})