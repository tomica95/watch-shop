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
                                    <th scope="col">Name</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                require_once "models/categories/category_functions.php";
                                $categories = getAllCategories();
                                foreach($categories as $category):
                            ?>
                                <tr>
                                    <th scope="row"><?=$category->id?></th>
                                    <td><?=$category->name?></td>
                                    
                                    <td>
                                    <button type="submit" class="btn btn-primary btn-sm">
                                     <i class="fa fa-dot-circle-o"></i> Update
                                    </button>
                                    </td>
                                    <td>
                                    <form method="POST" action="models/categories/delete.php">
                                    <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Delete
                                    </button>
                                    <input type="hidden" name="id" value="<?=$category->id?>">
                                    </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            </div>
    </div><!-- .animated -->
</div>