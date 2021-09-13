<?php
  $dropdown_option = '<a href="./index.php?account">Account</a>';
  if($main_template == 'account.php') {
    $dropdown_option = '<a href="./index.php">Home page</a>';
  }

  if (isset($_SESSION['nickname']) and $_SESSION['nickname'] != '') {
    $nickname = $_SESSION['nickname'];
  } else {
    $nickname = $_SESSION['user_login'];
  }
?>
      <div class="header">  
        <div class="container custom-width">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-sm-offset-6 col-md-offset-8 col-lg-offset-9">
              <div class="dropdown account-dropdown">
                <button class="btn btn-link dropdown-toggle btn-custom-dropdown" type="button" data-toggle="dropdown"><?php echo $nickname; unset($nickname); ?> <span class="caret"></span></button>
                <ul class="dropdown-menu dropdown-menu-right custom-login">
                  <li>
                    <?php echo $dropdown_option; ?>
                  </li>
                  <li>
                    <a href="./index.php?sign_out">Sign Out</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>