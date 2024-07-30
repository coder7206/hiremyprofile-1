<!-- Registration Modal starts -->
<div class="modal fade" id="register-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!-- modal-header Starts -->
        <i class="fa fa-user-plus"></i>
        <h5 class="modal-title"> <?= $lang['modals']['register']['title']; ?> </h5>
        <button class="close" data-dismiss="modal"><span>&times;</span></button>
      </div>
      <!-- modal-header Ends -->
      <div class="modal-body">
        <!-- modal-body Starts -->
        <?php
        $form_errors = Flash::render("register_errors");
        $form_data = Flash::render("form_data");
        if (is_array($form_errors)) {
        ?>
          <div class="alert alert-danger">
            <!--- alert alert-danger Starts --->
            <ul class="list-unstyled mb-0">
              <?php $i = 0;
              foreach ($form_errors as $error) {
                $i++; ?>
                <li class="list-unstyled-item"><?= $i ?>. <?= ucfirst($error); ?></li>
              <?php } ?>
            </ul>
          </div>
          <!--- alert alert-danger Ends --->
          <script type="text/javascript">
            $(document).ready(function() {
              $('#register-modal').modal('show');
            });
          </script>
        <?php } ?>
        <?php
        if (in_array("An accound have been already created from this device. Please try with another one.", $error_array)) {
        ?>
          <div class="alert alert-danger">
            An accound have been already created from this device. Please try with another one.
          </div>
        <?php } ?>
        <?php if ($enable_social_login == "yes") { ?>
          <div class="text-center">
            <div class="social-login">
              <?php if (!empty($fb_app_id) && !empty($fb_app_secret)) { ?>
                <button class="btn facebook-btn social-btn mt-2" type="button" onclick="window.location = '<?= $fLoginURL ?>';"><span><i class="fa fa-facebook" aria-hidden="true"></i>
                    <!-- <button class="btn facebook-btn social-btn mt-2" type="button"><span><i class="fa fa-facebook" aria-hidden="true"></i> -->
                    Register with Facebook</span> </button>
              <?php } ?>
              <?php if (!empty($g_client_id) && !empty($g_client_secret)) { ?>
                <button class="btn google-btn social-btn mt-2" type="button" onclick="window.location = '<?= $gLoginURL ?>';"><span><i class="fa fa-google" aria-hidden="true"></i>
                    <!-- <button class="btn google-btn social-btn mt-2" type="button"><span><i class="fa fa-google" aria-hidden="true"></i> -->
                    Register with Google</span> </button>
              <?php } ?>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="line mt-3"><span></span></div>
          <div class="text-center">OR</div>
          <hr class="">
          <div class="line mt-3"><span></span></div>
        <?php } ?>
        <form action="" method="post" class="pb-3">
          <div class="form-row">
            <div class="form-group col-md-6">
              <input type="text" class="form-control" name="name" placeholder="<?= $lang['placeholder']['full_name']; ?>" value="<?php if (isset($_SESSION['name'])) echo $_SESSION['name']; ?>" required="" minlength="6">
            </div>
            <div class="form-group col-md-6">
              <input type="email" class="form-control" name="email" placeholder="<?= $lang['placeholder']['email']; ?>" value="<?php if (isset($_SESSION['email'])) echo $_SESSION['email']; ?>" required="">
              <?php if (in_array("Email has already been taken. Try logging in instead.", $error_array)) echo "<span style='color:red;'>Email has already been taken. Try logging in instead.</span> <br>"; ?>
            </div>

            <div class="form-group col-md-12">
              <input type="text" class="form-control" name="u_name" placeholder="Enter Your Username" value="<?php if (isset($_SESSION['u_name'])) echo $_SESSION['u_name']; ?>" required="" minlength="4">
              <small class="form-text text-muted"><?= $lang['warning']['note']; ?></small>
              <?php
              if (in_array("Opps! This username has already been taken. Please try another one", $error_array))
                echo "<span style='color:red;'>{$lang['warning']['username_already']}</span> <br>";

              if (in_array("Username must be greater that 4 characters long or less than 25 characters.", $error_array))
                echo "<span style='color:red;'>{$lang['warning']['username_greater']}</span> <br>";

              if (in_array("Spaces Are Not Allowed In Username. Please Remove The Spaces.", $error_array))
                echo "<span style='color:red;'>{$lang['warning']['spaces_not_allowed']}</span> <br>";

              if (in_array("Special characters are not allowed in username. Please try another one.", $error_array)) {
                echo "<span style='color:red;'>Special characters are not allowed in username. Please try another one.</span> <br>";
              }

              ?>
            </div>

            <div class="form-group col-md-6">
              <input type="password" class="form-control" name="pass" id="passeyeicon" placeholder="<?= $lang['placeholder']['password']; ?>" required="" minlength="8">
              <img src="<?= $site_url ?>/images/closed-eye.png" id="passwordeyeicon">
            </div>
            <div class="form-group col-md-6">
              <input type="password" class="form-control" name="con_pass" id="inputpass" placeholder="<?= $lang['placeholder']['password_confirm']; ?>" required="" minlength="8">
              <img src="<?= $site_url ?>/images/closed-eye.png" id="eyeiconstyle">
              <?php if (in_array("Passwords don't match. Please try again.", $error_array)) echo "<span style='color:red;'>{$lang['warning']['dont_match']}</span> <br>"; ?>
            </div>
            <script>
              let passeyeicon = document.getElementById("passeyeicon");
              let passwordeyeicon = document.getElementById("passwordeyeicon");
              passwordeyeicon.onclick = function() {
                if (passeyeicon.type == "password") {
                  passeyeicon.type = "text";
                  passwordeyeicon.src = "<?= $site_url ?>/images/open-eye.png"

                } else {
                  passeyeicon.type = "password";
                  passwordeyeicon.src = "<?= $site_url ?>/images/closed-eye.png"
                }
              }


              let inputpass = document.getElementById("inputpass");
              let eyeiconstyle = document.getElementById("eyeiconstyle");
              eyeiconstyle.onclick = function() {
                if (inputpass.type == "password") {
                  inputpass.type = "text";
                  eyeiconstyle.src = "<?= $site_url ?>/images/open-eye.png"
                } else {
                  inputpass.type = "password";
                  eyeiconstyle.src = "<?= $site_url ?>/images/closed-eye.png"
                }
              }
            </script>
            <div class="form-group col-md-12">
              <hr class="">
              <input type="hidden" style="position: relative; top: 1px;" id="check" value="1" checked required="" />
              <label for="check">
                By clicking "Register Now" button, you agree our
                <a class="text-success" href="<?= $site_url; ?>/terms_and_conditions">Terms And Conditions</a>
              </label>
            </div>
          </div>
          <!-- <div class="form-group">
            <label class="form-control-label font-weight-bold"> <?= $lang['label']['full_name']; ?> </label>
            <input type="text" class="form-control" name="name" placeholder="<?= $lang['placeholder']['full_name']; ?>" value="<?php if (isset($_SESSION['name'])) echo $_SESSION['name']; ?>" required="">
          </div> -->

          <!-- <div class="form-group">

            <label class="form-control-label font-weight-bold">

              <?= $lang['label']['username']; ?>
              <span class="font-weight-bold text-success"><?= $lang['warning']['no_spaces']; ?></span>

            </label>

            <input type="text" class="form-control" name="u_name" placeholder="Enter Your Username" value="<?php if (isset($_SESSION['u_name'])) echo $_SESSION['u_name']; ?>" required="">
            <small class="form-text text-muted"><?= $lang['warning']['note']; ?></small>

            <?php
            if (in_array("Opps! This username has already been taken. Please try another one", $error_array)) echo "<span style='color:red;'>{$lang['warning']['username_already']}</span> <br>";
            ?>

            <?php
            if (in_array("Username must be greater that 4 characters long or less than 25 characters.", $error_array)) echo "<span style='color:red;'>{$lang['warning']['username_greater']}</span> <br>";
            ?>

            <?php
            if (in_array("Spaces Are Not Allowed In Username. Please Remove The Spaces.", $error_array)) echo "<span style='color:red;'>{$lang['warning']['spaces_not_allowed']}</span> <br>";
            ?>

          </div> -->

          <!-- <div class="form-group">
            <label class="form-control-label font-weight-bold"> <?= $lang['label']['email']; ?> </label>
            <input type="email" class="form-control" name="email" placeholder="<?= $lang['placeholder']['email']; ?>" value="<?php if (isset($_SESSION['email'])) echo $_SESSION['email']; ?>" required="">
            <?php if (in_array("Email has already been taken. Try logging in instead.", $error_array)) echo "<span style='color:red;'>Email has already been taken. Try logging in instead.</span> <br>"; ?>
          </div> -->

          <!-- <div class="form-group phoneNo">
            <label class="form-control-label font-weight-bold">
              <?= $lang['label']['phone']; ?>
              <?= ($make_phone_number_required == 1) ? $lang['label']['phone_required'] : $lang['label']['phone_optional']; ?>
            </label>
            <div class="input-group">

              <span class="input-group-addon p-0 border-0 rounded-0 w-50"><?php include("country_codes.php"); ?></span>

              <input type="text" class="form-control w-750" name="phone" placeholder="<?= $lang['placeholder']['phone']; ?>" value="<?php if (isset($_SESSION['phone'])) echo $_SESSION['phone']; ?>" <?= ($make_phone_number_required == 1) ? "required" : ""; ?> />

            </div>
          </div> -->

          <!-- <div class="form-group">
            <label class="form-control-label font-weight-bold"> <?= $lang['label']['password']; ?> </label>
            <input type="password" class="form-control" name="pass" placeholder="<?= $lang['placeholder']['password']; ?>" required="">
          </div>

          <div class="form-group">
            <label class="form-control-label font-weight-bold"> <?= $lang['label']['password_confirm']; ?> </label>
            <input type="password" class="form-control" name="con_pass" placeholder="<?= $lang['placeholder']['password_confirm']; ?>" required="">
            <?php if (in_array("Passwords don't match. Please try again.", $error_array)) echo "<span style='color:red;'>{$lang['label']['dont_match']}</span> <br>"; ?>
          </div> -->

          <?php if (isset($_GET['referral'])) { ?>
            <input type="hidden" class="form-control" name="referral" value="<?= $input->get('referral'); ?>">
          <?php } else { ?>
            <input type="hidden" class="form-control" name="referral" value="">
          <?php } ?>
          <input type="hidden" name="timezone" value="">
          <input type="submit" name="register" class="btn btn-success btn-block" value="<?= $lang['button']['register']; ?>">
        </form>

        <div class="text-center mt-3 text-muted">
          <?= $lang['modals']['register']['already_account']; ?>
          <a href="#" class="text-success" data-toggle="modal" data-target="#login-modal" data-dismiss="modal">
            <?= $lang['modals']['register']['login']; ?>
          </a>
        </div>
      </div>
      <!-- modal-body Ends -->
    </div>
  </div>
</div><!-- Registration modal ends -->

<!-- Login modal start -->
<div class="modal fade login" id="login-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!-- Modal header start -->
        <i class="fa fa-sign-in fa-log"></i>
        <h5 class="modal-title"><?= $lang['modals']['login']['title']; ?></h5>
        <button class="close" type="button" data-dismiss="modal"><span>&times;</span></button>
      </div>
      <!-- Modal header end -->
      <div class="modal-body">
        <!-- Modal body start -->
        <?php
        $form_errors = Flash::render("login_errors");
        $form_data = Flash::render("form_data");
        if (is_array($form_errors)) {
        ?>
          <div class="alert alert-danger">
            <!--- alert alert-danger Starts --->
            <ul class="list-unstyled mb-0">
              <?php $i = 0;
              foreach ($form_errors as $error) {
                $i++; ?>
                <li class="list-unstyled-item"><?= $i ?>. <?= ucfirst($error); ?></li>
              <?php } ?>
            </ul>
          </div>
          <!--- alert alert-danger Ends --->
          <script type="text/javascript">
            $(document).ready(function() {
              $('#login-modal').modal('show');
            });
          </script>
        <?php } ?>
        <?php if ($enable_social_login == "yes") { ?>
          <div class="text-center">
            <div class="social-login">
              <?php if (!empty($fb_app_id) & !empty($fb_app_secret)) { ?>
                <button class="btn facebook-btn social-btn mt-2" type="button" onclick="window.location = '<?= $fLoginURL ?>';"><span><i class="fa fa-facebook" aria-hidden="true"></i>
                    <!-- <button class="btn facebook-btn social-btn mt-2" type="button"><span><i class="fa fa-facebook" aria-hidden="true"></i> -->
                    Sign in with Facebook</span> </button>
              <?php } ?>
              <?php if (!empty($g_client_id) & !empty($g_client_secret)) { ?>
                <button class="btn google-btn social-btn mt-2" type="button" onclick="window.location = '<?= $gLoginURL ?>';"><span><i class="fa fa-google" aria-hidden="true"></i>
                    <!-- <button class="btn google-btn social-btn mt-2" type="button"><span><i class="fa fa-google" aria-hidden="true"></i> -->
                    Sign in with Google</span> </button>
              <?php } ?>
            </div>
            <div class="clearfix"></div>
            <div class="text-center pt-4 pb-2"><?= $lang['modals']['login']['or']; ?></div>
            <hr class="">
            <div class="line mt-3"><span></span></div>
          </div>
          <div class="clearfix"></div>
        <?php } ?>
        <form action="" method="post">
          <div class="form-group">
            <label class="form-group-label"> <?= $lang['label']['username']; ?></label>
            <input type="text" class="form-control" name="seller_user_name" placeholder="<?= $lang['placeholder']['username_or_email']; ?>" value="<?php if (isset($_SESSION['seller_user_name'])) echo $_SESSION['seller_user_name']; ?>" required="">
          </div>
          <div class="form-group">
            <label class="form-group-label"> <?= $lang['label']['password']; ?></label>
            <input type="password" class="form-control" name="seller_pass" placeholder="<?= $lang['placeholder']['password']; ?>" required="">
          </div>

          <input type="submit" name="login" class="btn btn-success btn-block" value="<?= $lang['button']['login_now']; ?>">
        </form>
        <div class="text-center mt-3">
          <a href="#" class="text-success" data-toggle="modal" data-target="#register-modal" data-dismiss="modal">
            <?= $lang['modals']['login']['not_registerd']; ?>
          </a>
          &nbsp; &nbsp; | &nbsp; &nbsp;
          <a href="#" class="text-success" data-toggle="modal" data-target="#forgot-modal" data-dismiss="modal">
            <?= $lang['modals']['login']['forgot_password']; ?>
          </a>
        </div>
      </div>
      <!-- Modal body ends -->
    </div>
  </div>
</div>
<!-- Login modal end -->

<!-- Forgot password starts -->
<div class="modal fade login" id="forgot-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!-- Modal header starts -->
        <i class="fa fa-meh-o fa-log"></i>
        <h5 class="modal-title"> <?= $lang['modals']['forgot']['title']; ?> </h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div><!-- Modal header ends -->
      <div class="modal-body">
        <!-- Modal body starts -->
        <p class="text-muted text-center mb-2">
          <?= $lang['modals']['forgot']['desc']; ?>
        </p>
        <form action="" method="post">
          <div class="form-group">
            <input type="text" name="forgot_email" class="form-control" placeholder="<?= $lang['placeholder']['email']; ?>" required>
          </div>
          <input type="submit" class="btn btn-success btn-block" value="submit" name="forgot">
          <p class="text-muted text-center mt-4">
            <?= $lang['modals']['forgot']['not_member_yer']; ?>
            <a href="#" class="text-success" data-toggle="modal" data-target="#register-modal" data-dismiss="modal">
              <?= $lang['modals']['forgot']['join_now']; ?>
            </a>
          </p>
        </form>
      </div><!-- Modal body ends -->
    </div>
  </div>
</div><!-- Forgot password ends -->