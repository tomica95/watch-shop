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
                    <li><a href="index.php?page=register">Register</a></li>
                    <li><a href="index.php?page=login">Login</a></li>
                  </ul>
                </li>
               
              </ul>
              <div class="search-box">
                <input class="input-text" placeholder="Search By Products.." type="text">
                <button class="search-btn"><i class="fa fa-search"></i></button>
              </div>
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