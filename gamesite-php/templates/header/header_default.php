<?php
  $mail_pattern = "^[-a-zA-Z0-9!#$%&'*+/=?^_`{|}~]+(?:\.[-a-zA-Z0-9!#$%&'*+/=?^_`{|}~]+)*@(?:[a-zA-Z0-9]([-a-zA-Z0-9]{0,61}[a-zA-Z0-9])?\.)*(?:aero|arpa|asia|biz|cat|com|coop|edu|gov|info|int|jobs|mil|mobi|museum|name|net|org|pro|tel|travel|[a-z][a-z])$";
?>

      <div class="header">  
        <div class="container custom-width">
          <div class="row">
            <div class="col-xs-3 col-md-1 col-xs-offset-6 col-md-offset-7 col-lg-offset-8">
              <div class="dropdown">
                <button class="btn btn-link dropdown-toggle btn-custom-dropdown" type="button" data-toggle="dropdown">Sign In <span class="caret"></span></button>
                <ul class="dropdown-menu custom-login">
                  <li>
                    <div class="container login-form">
                      <form action="./index.php?sign_in" method="post">
                        <div class="form-group">
                          <label for="login">E-mail:</label>
                          <input type="text" name="usr" class="form-control" id="login" required placeholder="user_email@example.com" pattern=<?php echo "\"$mail_pattern\""; ?>>
                        </div>
                        <div class="form-group">
                          <label for="passwd">Password:</label>
                          <input type="password" name="pwd" class="form-control" id="passwd" required>
                        </div>
                        <button type="submit" class="btn btn-login">Login</button>
                      </form>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-xs-3 col-md-1">
              <div class="dropdown">
                <button class="btn btn-link dropdown-toggle btn-custom-dropdown" type="button" data-toggle="dropdown">Sign Up <span class="caret"></span></button>
                <ul class="dropdown-menu custom-login">
                  <li>
                    <div class="container login-form">
                      <form action="./index.php?sign_up" method="post">
                        <div class="form-group">
                          <label for="email">E-mail:</label>
                          <input type="text" name="usr_email" class="form-control" id="email" required placeholder="user_email@example.com" pattern=<?php echo "\"$mail_pattern\""; ?>>
                        </div>
                        <div class="form-group">
                          <label for="nickname">Nickame:</label>
                          <input type="text" name="usr_nickname" class="form-control" id="nickname">
                        </div>
                        <div class="form-group">
                          <label for="reg_passwd">Password:</label>
                          <input type="password" name="usr_pwd" class="form-control" id="reg_passwd" required>
                        </div>
                        <button type="submit" class="btn btn-login">Sign Up</button>
                      </form>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="hidden-xs hidden-sm col-md-3 col-lg-2">
              <div class="social">
                <a class="btn btn-social-icon btn-md btn-twitter">
                    <span class="fa fa-twitter"></span>
                </a>
                <a class="btn btn-social-icon btn-md btn-facebook">
                    <span class="fa fa-facebook"></span>
                </a>
                <a class="btn btn-social-icon btn-md btn-vk">
                    <span class="fa fa-vk"></span>
                </a>
                <a class="btn btn-social-icon btn-md btn-reddit">
                    <span class="fa fa-reddit"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>