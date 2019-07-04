<?php 

    require_once "models/log/log_functions.php";

    $number = countLoggedInUsers();

?>
<div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Logged users:</div>
                        <div class="stat-digit"><?=$number->numOfLogged?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>