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
        $seller_address = strip_tags($input->post('seller_address'));
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

        if (!in_array($cover_file_extension, $allowed) && !empty($cover_photo)) {
            echo "<script>alert('{$lang['alert']['extension_not_supported']}')</script>";
            echo "<script> window.open('settings?profile_settings', '_self');</script>";
            exit();
        }

        $address_front = $_FILES['address_front']['name'];
        $address_front_tmp = $_FILES['address_front']['tmp_name'];
        $allowedadd = array('image/jpeg', 'jpg', 'gif', 'png', 'tif');
        $address_front_extension = pathinfo($address_front, PATHINFO_EXTENSION);

        if (!in_array($address_front_extension, $allowedadd) && !empty($address_front)) {
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
            "seller_address" => $seller_address,
            "seller_timezone" => $seller_timezone,
            "seller_headline" => $seller_headline,
            "seller_about" => $seller_about,
            "seller_language" => $seller_language,
            "status" => 0,
        ];

        if (!empty($profile_photo)) {
            $seller_image_s3 = $enable_s3;
            $updateForm["seller_image"] = $profile_photo;
            $updateForm["seller_image_s3"] = $seller_image_s3;
        }

        if (!empty($cover_photo)) {
            $cover_photo = pathinfo($cover_photo, PATHINFO_FILENAME);
            $cover_photo = $cover_photo . "_" . time() . ".$cover_file_extension";
            move_uploaded_file($cover_photo_tmp, "cover_images/$cover_photo");
            $seller_cover_image_s3 = $enable_s3;
            $updateForm["seller_cover_image"] = $cover_photo;
            $updateForm["seller_cover_image_s3"] = $seller_image_s3;
        }

        if (!empty($address_front)) {
            $address_front = pathinfo($address_front, PATHINFO_FILENAME);
            $address_front = $address_front . "_" . time() . ".$address_front_extension";
            move_uploaded_file($address_front_tmp, "address_front_images/$address_front");
            $login_address_front_s3 = $enable_s3;
            $updateForm["address_front"] = $address_front;
            $updateForm["address_front_s3"] = $seller_image_s3;
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
                window.open('settings?profile_settings','_self');
            });
            </script>";
        } else {
            echo "<script>
            swal({
                type: 'warning',
                text: 'Profile settings could not be updated!',
                timer: 3000,
                onOpen: function(){
                    swal.showLoading()
                }
            }).then(function(){
                window.open('settings?profile_settings','_self');
            });
            </script>";
        }
    }
}

// IS PROFILE UPDATE REQUEST IS SENT
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
    $login_seller_address = $oSellerUpdate->seller_address;
    $login_seller_timzeone = $oSellerUpdate->seller_timezone;
    $login_seller_language = $oSellerUpdate->seller_language;
    $login_seller_headline = $oSellerUpdate->seller_headline;
    $login_seller_about = $oSellerUpdate->seller_about;
    $login_seller_image = $oSellerUpdate->seller_image;
    $login_seller_cover_image = $oSellerUpdate->seller_cover_image;
    $login_address_front = $oSellerUpdate->address_front;
}
?>
