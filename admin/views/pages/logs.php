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
                                    <th scope="col">Date</th>
                                    <th scope="col">Page</th>
                                    <th scope="col">Ip adress</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                require_once "models/log/log_functions.php";

                                $datas = logFiles();

                                foreach($datas as $data):

                                    $log = explode("\t",$data);
                            ?>
                                <tr>
                                    <td><?=$log[0]?></td>
                                    <td><?=$log[1]?></td>
                                    <td><?=$log[2]?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="category-update"></div>
            </div>

            </div>
    </div><!-- .animated -->
</div>