<?php
@session_start();
require_once("includes/db.php");
if (!isset($_SESSION['seller_user_name'])) {
  echo "<script>window.open('login','_self')</script>";
}

// HANDLE SUBMIT
// Change password
if (isset($_POST['submit_change_password'])) {
  $password = $input->post('password');
  $password_confirm = $input->post('password_confirm');
  if (strlen($password) < 8) {
    echo "<script>
    swal({
      type: 'warning',
      text: 'Invalid Password! Password must be 8 characters.',
      timer: 3000,
      onOpen: function(){
        swal.showLoading()
      }
    }).then(function(){
      window.open('settings?profile_settings','_self')
    });
    </script>";
    exit();
  } else if (!ctype_alnum($password)) {
    echo "<script>
      swal({
        type: 'warning',
        text: 'Invalid Password! Password must be alphanumeric characters.',
        timer: 3000,
        onOpen: function(){
          swal.showLoading()
        }
      }).then(function(){
        window.open('settings?profile_settings','_self')
      });
      </script>";
    exit();
  } else if ($password != $password_confirm) {
    echo "<script>
    swal({
      type: 'warning',
      text: '{$lang['alert']['dont_match']}',
      timer: 3000,
      onOpen: function(){
        swal.showLoading()
      }
    }).then(function(){
      window.open('settings?profile_settings','_self')
    });
    </script>";
    exit();
  }

  $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

  $update_password = $db->update("sellers", array("seller_pass" => $encrypted_password), array("seller_id" => $seller_id));
  if ($update_password) {
    echo "
		<script>
      swal({
        type: 'success',
        text: '{$lang['alert']['successfully_reset_pass']}',
        timer: 5000,
        onOpen: function(){
			    swal.showLoading()
			  }
        }).then(function(){
          // Read more about handling dismissals
          window.open('settings?profile_settings','_self')
        });
        </script>";
    exit();
  }
}
// Profile form
if (isset($_POST['submit'])) {
  $rules = array(
    "seller_name" => "required",
    "seller_country" => "required",
    "seller_language" => "required"
  );

  $messages = [
    "seller_name" => "Full Name Is required.",
    "seller_country" => "Country Is Required.",
    "seller_language" => "Main Conversational Language Is Required."
  ];

  $val = new Validator($_POST, $rules, $messages);
  echo "<pre>";
  echo json_encode($_POST);
  echo "</pre>";

  exit();
  if ($val->run() == false) {
    Flash::add("form_errors", $val->get_all_errors());
    Flash::add("form_data", $_POST);
    echo "<script> window.open('settings?profile_settings', '_self');</script>";
  } else {
    $seller_name = strip_tags($input->post('seller_name'));
    $seller_email = strip_tags($input->post('seller_email'));
    $seller_phone = strip_tags($input->post('country_code')) . " " . strip_tags($input->post('seller_phone'));
    $seller_country = strip_tags($input->post('seller_country'));
    $seller_city = strip_tags($input->post('seller_city'));
    $seller_timezone = strip_tags($input->post('seller_timezone'));
    $seller_language = strip_tags($input->post('seller_language'));
    $seller_headline = strip_tags($input->post('seller_headline'));
    $seller_about = strip_tags($input->post('seller_about'));
    $profile_photo = strip_tags($input->post('profile_photo'));
    $profile_photo = strip_tags($input->post('profile_photo'));
    $form_state = strip_tags($input->post('form_state'));

    $cover_photo = $_FILES['cover_photo']['name'];
    $cover_photo_tmp = $_FILES['cover_photo']['tmp_name'];
    $allowed = array('image/jpeg', 'jpg', 'gif', 'png', 'tif');
    $cover_file_extension = pathinfo($cover_photo, PATHINFO_EXTENSION);

    if (!in_array($cover_file_extension, $allowed) & !empty($cover_photo)) {
      echo "<script>alert('{$lang['alert']['extension_not_supported']}')</script>";
      echo "<script> window.open('settings?profile_settings', '_self');</script>";
      exit();
    }

    $updateForm = [
      "seller_id" => $login_seller_id,
      "seller_name" => $seller_name,
      "seller_phone" => $seller_phone,
      "seller_country" => $seller_country,
      "seller_city" => $seller_city,
      "seller_timezone" => $seller_timezone,
      "seller_headline" => $seller_headline,
      "seller_about" => $seller_about,
      "seller_language" => $seller_language,
      "status" => 0,
    ];

    if (empty($profile_photo)) {
      // $profile_photo = $login_seller_image;
      // $seller_image_s3 = $login_seller_image_s3;
    } else {
      $seller_image_s3 = $enable_s3;
      $updateForm["seller_image"] = $profile_photo;
      $updateForm["seller_image_s3"] = $seller_image_s3;
    }

    if (empty($cover_photo)) {
      // $cover_photo = $login_seller_cover_image;
      // $seller_cover_image_s3 = $login_seller_cover_image_s3;
    } else {
      $cover_photo = pathinfo($cover_photo, PATHINFO_FILENAME);
      $cover_photo = $cover_photo . "_" . time() . ".$cover_file_extension";
      uploadToS3("cover_images/$cover_photo", $cover_photo_tmp);
      $seller_cover_image_s3 = $enable_s3;
      $updateForm["seller_cover_image"] = $cover_photo;
      $updateForm["seller_cover_image_s3"] = $seller_image_s3;
    }


    if ($form_state)
      $inserted = $db->update("sellers_profile_tmp", $updateForm, ['seller_id' => $seller_id, 'status' => 2]); // update only if modification is done
    else
      $inserted = $db->insert("sellers_profile_tmp", $updateForm);

    if ($inserted) {
      echo "<script>
              swal({
                type: 'success',
                text: 'Profile settings updated successfully!',
                timer: 3000,
                onOpen: function(){
                  swal.showLoading()
                }
              }).then(function(){
                // Read more about handling dismissals
                window.open('settings?profile_settings','_self');
              });
              </script>";
    } else {
      echo "<script>
              swal({
                type: 'warning',
                text: 'Profile settings couldnot updated!',
                timer: 3000,
                onOpen: function(){
                  swal.showLoading()
                }
              }).then(function(){
                // Read more about handling dismissals
                window.open('settings?profile_settings','_self');
              });
              </script>";
    }
  }
}

// IS PROFILE UPATE REQUEST IS SENT
// sellers_profile_tmp
$qSellerUpdate = $db->query("SELECT * FROM sellers_profile_tmp WHERE seller_id = :seller_id ORDER BY 1 DESC LIMIT 1", ['seller_id' => $login_seller_id]);
$oSellerUpdate = $qSellerUpdate->fetch();
$reviewRemark = null;
$tblSeller = "sellers";
$modificationMsg = '';
if ($oSellerUpdate) {
  $userStatus = $oSellerUpdate->status;
  $reviewRemark = $userStatus == 0 ? 'review' : ($userStatus == 2 ? 'modification' : 'active');
  $modificationMsg = $userStatus == 2 ? $oSellerUpdate->feedback : '';
  $tblSeller = "sellers_profile_tmp";

  $login_seller_name = $oSellerUpdate->seller_name;
  $login_seller_phone = $oSellerUpdate->seller_phone;
  $login_seller_country = $oSellerUpdate->seller_country;
  $login_seller_city = $oSellerUpdate->seller_city;
  $login_seller_timzeone = $oSellerUpdate->seller_timezone;
  $login_seller_language = $oSellerUpdate->seller_language;
  $login_seller_image = $oSellerUpdate->seller_image;
  $login_seller_image_s3 = $oSellerUpdate->seller_image_s3;
  $login_seller_cover_image = $oSellerUpdate->seller_cover_image;
  $login_seller_cover_image_s3 = $oSellerUpdate->seller_cover_image_s3;
  $login_seller_headline = $oSellerUpdate->seller_headline;
  $login_seller_about = $oSellerUpdate->seller_about;
}

require 'admin/timezones.php';

$phone_no = explode(" ", $login_seller_phone ?? "");
?>
<style>
  @media (max-width:768px) {
    .full-width-a {
      width: 100%;
      /* border:1px solid green; */
      font-size: 18px !important;
      display: flex;
      margin-top: -10px !important;
    }

    .full-width-b {
      width: 100%;
      /* border:1px solid green; */
      font-size: 18px !important;
      display: flex;
      margin-top: 20px !important;
    }

    .text-align-center-a {
      text-align: center;
      margin: auto;
      /* color: #186b64; */
    }

    .full-width {
      width: 100%;
      display: flex;
      /* border:1px solid green; */
    }

    .text-align-center {
      text-align: center;
      margin: auto;
    }
  }

  .box-shadow-allpros {
    /* box-shadow:0px 0px 5px gray ,inset 0px 0px 15px lightgray; */
    border: 1px solid gray;
    height: 45px !important;
    padding-top: 7px;
    font-size: 15px;
  }

  .box-shadow-for3 {
    /* box-shadow:0px 0px 5px gray ,inset 0px 0px 25px lightgray; */
    border: 1px solid gray;
    font-size: 15px;
  }

  .increase-width2 {
    width: 100%;
    /* margin: auto; */
    height: 50px !important;
    /* box-shadow:2px 2px 5px black, inset 0px 0px 15px black; */
    border: 1px solid gray;
    font-size: 16px !important;
  }

  .di-flex {
    width: 100%;
    padding-right: 3px;
    /* display: flex; */
  }

  .font-size-16 {
    font-size: 16px;
    /* font-weight: 500; */
  }

  .box-shadow-8b {
    border: 1px solid gray;
    /* box-shadow:0px 0px 5px black, inset 0px 0px 25px lightseagreen; */
    padding: 15px;
  }

  #profileimgclosed {
    margin: -33px 10px 0 0;
    width: 2.5%;
    float: inline-end
  }

  #profileimgopen {
    margin: -33px 10px 0 0;
    width: 2.5%;
    float: inline-end
  }
</style>
<h5 class="mb-4 full-width-a"><span class="text-align-center-a">Account Information</span></h5>
<form method="post" class="clearfix mb-3">
  <div class="form-group row">
    <label class="font-size-16 col-md-3 col-form-label"> <?= $lang['label']['username']; ?> </label>
    <div class="col-md-9">
      <input type="text" name="seller_user_name" value="<?= $login_seller_user_name; ?>" class="form-control box-shadow-allpros" required readonly>
    </div>
  </div>
  <div class="form-group row">
    <label class="font-size-16 col-md-3 col-form-label"> <?= $lang['label']['email']; ?> </label>
    <div class="col-md-9">
      <input type="text" name="seller_email" value="<?= $login_seller_email; ?>" class="form-control box-shadow-allpros" required readonly>
    </div>
  </div>
  <div class="form-group row">
    <label class="font-size-16 col-md-3 col-form-label"> <?= $lang['label']['password']; ?> </label>
    <div class="col-md-9">
      <input type="password" name="password" id="profilepassopen" value="" class="form-control box-shadow-allpros" required minlength="8" pattern="[a-zA-Z0-9]+">
      <img src="<?= $site_url ?>/images/closed-eye.png" id="profileimgopen">
    </div>
  </div>
  <div class="form-group row">
    <label class="font-size-16 col-md-3 col-form-label"> <?= $lang['label']['password_confirm']; ?> </label>
    <div class="col-md-9">
      <input type="password" name="password_confirm" value="" id="profileconfirmclosed" class="form-control box-shadow-allpros" required minlength="8" pattern="[a-zA-Z0-9]+">
      <img src="<?= $site_url ?>/images/closed-eye.png" id="profileimgclosed">
    </div>
  </div>
  <div class="di-flex">
    <button type="submit" name="submit_change_password" class="btn btn-success increase-width2 <?= $floatRight ?>">
      <i class="fa fa-unlock-alt"></i> &nbsp; <?= $lang['button']['change_password']; ?>
    </button>
  </div>
</form>

<hr />
<?php
$form_errors = Flash::render("form_errors");
$form_data = Flash::render("form_data");
if (is_array($form_errors)) {
?>
  <div class="alert alert-danger">
    <!--- alert alert-danger Starts --->
    <ul class="list-unstyled mb-0">
      <?php $i = 0;
      foreach ($form_errors as $error) {
        $i++;
      ?>
        <li class="list-unstyled-item"><?= $i ?>. <?= ucfirst($error); ?></li>
      <?php } ?>
    </ul>
  </div>
  <!--- alert alert-danger Ends --->
<?php } ?>
<h5 class="mb-4 full-width-b"><span class="text-align-center-a">Profile Information</span></h5>
<?php if ($reviewRemark == 'review') { ?>
  <div class="alert alert-warning text-align-center">
    Your profile is under review.
  </div>
<?php } ?>
<?php if ($reviewRemark == 'modification') { ?>
  <div class="alert alert-primary text-align-center">
    Your profile needs modification, here is the message from ADMIN: <br /> <?= $modificationMsg ?>
  </div>
<?php } ?>
<?php if ($reviewRemark == 'active') { ?>
  <div class="alert alert-success text-align-center box-shadow-8b">
    Your profile is active.
  </div>
<?php
}
// SHOW FORMS IF the modification request is needed or review is null
if (is_null($reviewRemark) || $reviewRemark == 'modification' || $reviewRemark == 'active') {
?>
  <form method="post" enctype="multipart/form-data" runat="server" autocomplete="off">
    <div class="form-group row">
      <label class="font-size-16 col-md-3 col-form-label"> <?= $lang['label']['full_name']; ?> </label>
      <div class="col-md-9">
        <input type="text" name="seller_name" value="<?= $login_seller_name; ?>" class="form-control box-shadow-allpros" required>
      </div>
    </div>

    <div class="form-group row">
      <label class="font-size-16 col-md-3 col-form-label"> <?= $lang['label']['phone']; ?> </label>
      <div class="col-md-9 phoneNo">
        <div class="input-group">
          <span class="input-group-addon p-0 border-0 rounded-0" style="width: 28%;">
            <?php include("includes/country_codes.php"); ?>
          </span>
          <input type="text" class="form-control box-shadow-allpros" name="seller_phone" placeholder="<?= $lang['placeholder']['phone']; ?>" value="<?= @$phone_no[1]; ?>" required />
        </div>
        <small class="text-muted">Please enter 10 digit phone number only like this: <b>2561040358</b> </small>
      </div>
    </div>

    <div class="form-group row"><!-- form-group row Starts -->
      <label class="font-size-16 col-md-3 col-form-label"> <?= $lang['label']['country']; ?> </label>
      <div class="col-md-9">
        <select name="seller_country" class="form-control box-shadow-allpros" required>
          <?php
          $get_countries = $db->select("countries");
          while ($row_countries = $get_countries->fetch()) {
            $id = $row_countries->id;
            $name = $row_countries->name;

            $get_code = $db->select("country", ['nicname' => $name]);

            echo "<option value='$name'" . ($name == $login_seller_country ? "selected" : "") . ">$name</option>";
          }
          ?>
        </select>

      </div>

    </div><!-- form-group row Ends -->

    <div class="form-group row"><!-- form-group row Starts -->

      <label class="font-size-16 col-md-3 col-form-label"> <?= $lang['label']['city']; ?> </label>

      <div class="col-md-9">
        <input type="text" name="seller_city" placeholder="<?= $lang['placeholder']['city']; ?>" value="<?= $login_seller_city; ?>" class="form-control box-shadow-allpros" required="" />
      </div>
    </div><!-- form-group row Ends -->

    <div class="form-group row">
      <label class="font-size-16 col-md-3 col-form-label"> <?= $lang['label']['timezone']; ?> </label>
      <div class="col-md-9">
        <select name="seller_timezone" class="form-control box-shadow-allpros site_logo_type" required="">
          <?php foreach ($timezones as $key => $zone) { ?>
            <option <?= ($login_seller_timzeone == $zone) ? "selected=''" : ""; ?> value="<?= $zone; ?>">
              <?= $zone; ?>
            </option>
          <?php } ?>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="font-size-16 col-md-3 col-form-label"> <?= $lang['label']['main_language']; ?> </label>
      <div class="col-md-9">
        <select name="seller_language" class="form-control box-shadow-allpros" required="">
          <?php if ($login_seller_language == 0) { ?>
            <option class="hidden" value=""> Select Language </option>
            <?php
            $get_languages = $db->select("seller_languages");
            while ($row_languages = $get_languages->fetch()) {
              $language_id = $row_languages->language_id;
              $language_title = $row_languages->language_title;
            ?>
              <option value="<?= $language_id; ?>"> <?= $language_title; ?> </option>
            <?php } ?>
          <?php } else { ?>
            <?php
            $get_languages = $db->select("seller_languages");
            while ($row_languages = $get_languages->fetch()) {
              $language_id = $row_languages->language_id;
              $language_title = $row_languages->language_title;
            ?>
              <option value="<?= $language_id; ?>" <?php if ($language_id == $login_seller_language) {
                                                      echo "selected";
                                                    } ?>> <?= $language_title; ?> </option>
            <?php } ?>
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label class="font-size-16 col-md-3 col-form-label"> <?= $lang['label']['profile_photo']; ?> </label>
      <div class="col-md-9">
        <input type="file" name="profile_photo" class="form-control box-shadow-allpros" accept="image/*" id="profileImg" onchange="loadFile(event)">
        <p id="profileInfo"></p>
        <input type="hidden" name="profile_photo">

        <p class="mt-2">
          <?= str_replace('{site_name}', $site_name, $lang['note']['profile_photo']); ?>
        </p>
        <?php if (!empty($login_seller_image)) { ?>
          <img src="<?= $site_url ?>/user_images/<?= $login_seller_image ?>" width="80" class="img-thumbnail img-circle" />
        <?php } else { ?>
          <img id="output" width="80" max-filesize>
        <?php } ?>
      </div>
    </div>


    <script>
      var loadFile = function(event) {
        var output = document.getElementById("output");
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
          URL.revokeObjectURL(output.src)
        }
      }
    </script>
    <div class="form-group row">
      <label class="font-size-16 col-md-3 col-form-label"> <?= $lang['label']['cover_photo']; ?> </label>
      <div class="col-md-9">
        <input type="file" name="cover_photo" id="cover" class="form-control box-shadow-allpros" accept="image/*" onchange="loadinFile(event)">
        <p id="pictureInfo"></p>
        <p class="mt-2">
          <?= str_replace('{url}', "$site_url/{$_SESSION['seller_user_name']}", $lang['note']['cover_photo']); ?>
        </p>
        <?php if (!empty($login_seller_cover_image)) { ?>
          <img src="<?= $site_url ?>/cover_images/<?= $login_seller_cover_image ?>" width="80" class="img-thumbnail img-circle" />
        <?php } else { ?>
          <img id="flicker" width="80">
        <?php } ?>
      </div>
    </div>

    <script>
      var loadinFile = function(event) {
        var flicker = document.getElementById("flicker");
        flicker.src = URL.createObjectURL(event.target.files[0]);
        flicker.onload = function() {
          URL.revokeObjectURL(flicker.src)
        }
      }
    </script>
    <div class="form-group row">
      <label class="font-size-16 col-md-3 col-form-label"> <?= $lang['label']['headline']; ?> </label>
      <div class="col-md-9">
        <textarea name="seller_headline" id="textarea-headline" rows="3" class="form-control box-shadow-for3" required maxlength="200"><?= $login_seller_headline; ?></textarea>
        <span class="float-right mt-1">
          <span class="count-headline"> 0 </span> / 200 <?= $lang['label']['max']; ?>
        </span>
      </div>
    </div>
    <div class="form-group row">
      <label class="font-size-16 col-md-3 col-form-label"> <?= $lang['label']['description']; ?></label>
      <div class="col-md-9">
        <textarea name="seller_about" id="textarea-about" rows="5" class="form-control box-shadow-for3" required maxlength="350" placeholder="<?= $lang['placeholder']['description']; ?>"><?= $login_seller_about; ?></textarea>
        <span class="float-right mt-1">
          <span class="count-about"> 0 </span> / 350 <?= $lang['label']['max']; ?>
        </span>
      </div>
    </div>
    <hr>
    <input type="hidden" name="form_state" value="<?= $reviewRemark ?>">
    <div class="di-flex">
      <button type="submit" name="submit" class="btn btn-success increase-width2 <?= $floatRight ?>" style="<?= ($lang_dir == "right" ? 'margin-left: 110px;' : '') ?>">
        <i class="fa fa-floppy-o"></i> &nbsp; <?= $lang['button']['save_changes']; ?>
      </button>
    </div>
  </form>
<?php
} // $reviewRemark
else {
?>
  <div class="row">
    <div class="col-md-3"><?= $lang['label']['full_name']; ?></div>
    <div class="col-md-9"><?= $login_seller_name; ?></div>

    <div class="col-md-3"><?= $lang['label']['phone']; ?></div>
    <div class="col-md-9"><?= $login_seller_phone; ?></div>

    <div class="col-md-3"><?= $lang['label']['country']; ?></div>
    <div class="col-md-9"><?= $login_seller_country; ?></div>

    <div class="col-md-3"><?= $lang['label']['city']; ?></div>
    <div class="col-md-9"><?= $login_seller_city; ?></div>

    <div class="col-md-3"><?= $lang['label']['timezone']; ?></div>
    <div class="col-md-9"><?= $login_seller_city; ?></div>

    <div class="col-md-3"><?= $lang['label']['profile_photo']; ?></div>
    <div class="col-md-9"><?php if (!empty($login_seller_image)) { ?>
        <img src="<?= $site_url ?>/user_images/<?= $login_seller_image ?>" width="80" class="img-thumbnail img-circle" />
      <?php } ?>
    </div>

    <div class="col-md-3"><?= $lang['label']['cover_photo']; ?></div>
    <div class="col-md-9"><?php if (!empty($login_seller_cover_image)) { ?>
        <img src="<?= $site_url ?>/cover_images/<?= $login_seller_cover_image ?>" width="80" class="img-thumbnail img-circle" />
      <?php } ?>
    </div>

    <div class="col-md-3"><?= $lang['label']['headline']; ?></div>
    <div class="col-md-9"><?= $login_seller_headline; ?></div>

    <div class="col-md-3"><?= $lang['label']['description']; ?></div>
    <div class="col-md-9"><?= $login_seller_about; ?></div>
  </div>
<?php } ?>
<script>
  $(document).ready(function() {
    $image_crop = $('#image_demo').croppie({
      enableExif: true,
      viewport: {
        width: 200,
        height: 200,
        type: 'square' //circle
      },
      boundary: {
        width: 100,
        height: 250
      }
    });

    function crop(data) {
      var reader = new FileReader();
      reader.onload = function(event) {
        $image_crop.croppie('bind', {
          url: event.target.result
        }).then(function() {
          console.log('jQuery bind complete');
        });
      }
      reader.readAsDataURL(data.files[0]);
      $('#insertimageModal').modal('show');
      $('input[type=hidden][name=img_type]').val($(data).attr('name'));
    }
    $(document).on('change', 'input[type=file]:not(#cover)', function() {
      var size = $(this)[0].files[0].size;
      var ext = $(this).val().split('.').pop().toLowerCase();
      if ($.inArray(ext, ['jpeg', 'jpg', 'gif', 'png']) == -1) {
        alert('Your File Extension Is Not Allowed.');
        $(this).val('');
      } else {
        crop(this);
      }
    });
    $('.crop_image').click(function(event) {
      $('#wait').addClass("loader");
      var name = $('input[type=hidden][name=img_type]').val();
      $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
      }).then(function(response) {
        $.ajax({
          url: "crop_upload",
          type: "POST",
          data: {
            image: response,
            name: $('input[type=file][name=' + name + ']').val().replace(/C:\\fakepath\\/i, '')
          },
          success: function(data) {
            $('#wait').removeClass("loader");
            $('#insertimageModal').modal('hide');
            $('input[type=hidden][name=' + name + ']').val(data);
          }
        });
      });
    });
    $("#textarea-headline").keydown(function() {
      var textarea_headline = $("#textarea-headline").val();
      $(".count-headline").text(textarea_headline.length);
    });
    $("#textarea-about").keydown(function() {
      var textarea_about = $("#textarea-about").val();
      $(".count-about").text(textarea_about.length);
    });
  });


  // //////////////////////////////////////////////////////////////////

  var profileimgopen = document.getElementById("profileimgopen");
  var profilepassopen = document.getElementById("profilepassopen");

  profileimgopen.onclick = function() {
    if (profilepassopen.type == "password") {
      profilepassopen.type = "text"
      profileimgopen.src = "<?= $site_url ?>/images/open-eye.png";
    } else {
      profilepassopen.type = "password"
      profileimgopen.src = "<?= $site_url ?>/images/closed-eye.png";
    }
  }



  var profileimgclosed = document.getElementById("profileimgclosed");
  var profileconfirmclosed = document.getElementById("profileconfirmclosed");

  profileimgclosed.onclick = function() {
    if (profileconfirmclosed.type == "password") {
      profileconfirmclosed.type = "text"
      profileimgclosed.src = "<?= $site_url ?>/images/open-eye.png";
    } else {
      profileconfirmclosed.type = "password"
      profileimgclosed.src = "<?= $site_url ?>/images/closed-eye.png";
    }
  }


  // ///////////////

  document.getElementById('profileImg').addEventListener('change', function() {
    var file = this.files[0];
    var fileInfo = "File type: " + file.type + "<br>" +
      "File size: " + file.size + " bytes";
    document.getElementById('profileInfo').innerHTML = fileInfo;
  });

  //    /////////////////////

  document.getElementById('cover').addEventListener('change', function() {
    var file = this.files[0];
    var fileInfo = "File type: " + file.type + "<br>" +
      "File size: " + file.size + " bytes";
    document.getElementById('pictureInfo').innerHTML = fileInfo;
  });
</script>