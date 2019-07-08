<header>
  <div class="header-top">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="top-left pull-left">
          
          </div>
          <div class="top-right pull-right">
            <div id="top-links" class="nav pull-right">
              <ul class="list-inline">
                <li class="dropdown account"><a href="#" title="My Account" class="  dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user"></i><span>My Account</span> <span class="caret"></span></a>
                  <ul class="dropdown-menu dropdown-menu-right">
                    <?php if(!isset($_SESSION['user'])):?>
                    <li><a href="index.php?page=register">Register</a></li>
                    <li><a href="index.php?page=login">Login</a></li>
                    <?php endif; ?>
                    <?php if(isset($_SESSION['user'])): ?>
                    <li><a href="models/auth/logout.php">Logout</a></li>
                    <?php if($_SESSION['user']->role_id=="1"):?>
                      <li><a href="admin/index.php">Admin panel</a></li>
                    <?php endif; ?>
                    <?php endif; ?>
                  </ul>
                </li>
               
              </ul>
              <?php if(isset($_GET['page'])=="shop"): ?>
              <div class="search-box">
                <input class="input-text search" placeholder="Search product by name.." type="text">
                <button class="search-btn"><i class="fa fa-search"></i></button>
              </div>
            <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    
    <nav id="menu" class="navbar">
      <div class="nav-inner">
        <div class="navbar-header"><span id="category" class="visible-xs">Categories</span>
          <button type="button" class="btn btn-navbar navbar-toggle" ><i class="fa fa-bars"></i></button>
        </div>
        <div class="navbar-collapse">
          <ul class="main-navigation">
            <?php 
              include "models/menu/menu_functions.php";
              $links = getMenu();
              foreach($links as $link):
            ?>
            <li><a href="<?=$link->href?>"   class="parent"  ><?=$link->name?></a> </li>
              <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</header>