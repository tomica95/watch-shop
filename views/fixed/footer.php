<footer>
  <div class="container">
  <hr>
    <div class="row">
      <div class="col-sm-3 footer-block">
        <h5 class="footer-title">Site map</h5>
        <ul class="list-unstyled ul-wrapper">
          <?php 

            $links = getMenu();

            foreach($links as $link):

          ?>
          <li><a href="<?=$link->href?>"><?=$link->name?></a></li>

            <?php endforeach; ?>
        </ul>
      </div>
      <div class="col-sm-3 footer-block">
        <h5 class="footer-title">My Account</h5>
        <ul class="list-unstyled ul-wrapper">
        <?php if(!isset($_SESSION['user'])):?>
          <li><a href="index.php?page=login">Sign in</a></li>
          <li><a href="index.php?page=register">Register</a></li>
            <?php endif; ?>
            <?php if(isset($_SESSION['user'])): ?>
                    <li><a href="models/auth/logout.php">Logout</a></li>
                    <?php if($_SESSION['user']->role_id=="1"):?>
                      <li><a href="admin/index.php">Admin panel</a></li>
                    <?php endif; ?>
                    <?php endif; ?>
        </ul>
      </div>
      <div class="col-sm-3 footer-block">
        <div class="content_footercms_right">
          <div class="footer-contact">
            <h5 class="contact-title footer-title">Documentation</h5>
            <ul class="ul-wrapper">
            <li><a href="dokumentacija.pdf">Documentation</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      
    </div>    
  </div>
  <a id="scrollup">Scroll</a> </footer>
<div class="footer-bottom">
  <div class="container">
    <div class="copyright">Powered By &nbsp;Nataša Lazić &copy; 2019 </a> </div>
    <div class="footer-bottom-cms">
      <div class="footer-payment">
        <ul>
          <li class="mastero"><a href="#"><img alt="" src="assets/image/payment/mastero.jpg"></a></li>
          <li class="visa"><a href="#"><img alt="" src="assets/image/payment/visa.jpg"></a></li>
          <li class="currus"><a href="#"><img alt="" src="assets/image/payment/currus.jpg"></a></li>
          <li class="discover"><a href="#"><img alt="" src="assets/image/payment/discover.jpg"></a></li>
          <li class="bank"><a href="#"><img alt="" src="assets/image/payment/bank.jpg"></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<script src="assets/javascript/parally.js"></script> 
<script>
$('.parallax').parally({offset: -40});
</script>
<!-- my scripts -->

<script src="assets/js/filter-sort-pagination.js"></script>
</body>
</html>
