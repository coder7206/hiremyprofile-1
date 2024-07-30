<?php

session_start();
require_once("includes/db.php");
require_once("functions/functions.php");
if (!isset($_SESSION['seller_user_name'])) {
  echo "<script>window.open('login','_self')</script>";
}

$login_seller_user_name = $_SESSION['seller_user_name'];
$select_login_seller = $db->select("sellers", array("seller_user_name" => $login_seller_user_name));
$row_login_seller = $select_login_seller->fetch();
$login_seller_id = $row_login_seller->seller_id;
$login_seller_image = getImageUrl2("sellers", "seller_image", $row_login_seller->seller_image);

?>
<!DOCTYPE html>

<html lang="en" class="ui-toolkit">

<head>
  <title><?= $site_name; ?> - Favorites</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?= $site_desc; ?>">
  <meta name="keywords" content="<?= $site_keywords; ?>">
  <meta name="author" content="<?= $site_author; ?>">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet">
  <link href="styles/bootstrap.css" rel="stylesheet">
  <link href="styles/custom.css" rel="stylesheet"> <!-- Custom css code from modified in admin panel --->
  <link href="styles/styles.css" rel="stylesheet">
  <link href="styles/categories_nav_styles.css" rel="stylesheet">
  <link href="font_awesome/css/font-awesome.css" rel="stylesheet">
  <link href="styles/owl.carousel.css" rel="stylesheet">
  <link href="styles/owl.theme.default.css" rel="stylesheet">
  <link href="styles/sweat_alert.css" rel="stylesheet">
  <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
  <script src="js/ie.js"></script>
  <script type="text/javascript" src="js/sweat_alert.js"></script>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Go to www.addthis.com/dashboard to customize your tools -->
  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a39d50ac9681a6c"></script>
  <?php if (!empty($site_favicon)) { ?>
    <link rel="shortcut icon" href="<?= $site_favicon; ?>" type="image/x-icon">
  <?php } ?>
  <style>
    @media (max-width:768px) {
      .font-size-4 {
        font-size: 16px;
        color: gray;
        /* border: 1px solid gray; */
        margin: auto;
      }

      .heading_4-h {
        /* border: 1px solid yellow; */
        /* font-size: 25px; */
        /* color: #00c8d4; */
        text-align: center;
        margin: auto;
      }

      .text_under_line {
        /* border-bottom: 1px solid lightgray; */
        display: flex;
        /* padding-bottom: 10px; */
        width: 100%;

      }

      .favorite_desc {
        border: 1px solid lightgray;
        font-size: 15px;
        color: #086569;
        padding: 10px 12px;
        /* text-align: center; */
        margin-bottom: 10vh;
      }

      .heading_3 {
        font-size: 20px;
        color: gray;
        padding-top: 0px !important;
        margin-bottom: 5vh;
      }

      .full-width-p {
        width: 100%;
        display: flex;
        margin-bottom: 35px;
      }




      .bg-color1 {
        background-color: #f5c6cb;
        /* padding-bottom: 5vh; */
        margin: auto;
        margin-top: 3rem;
        margin-bottom: 3rem;
        width: 92%;
        /* border:2px solid green; */
        /* box-shadow:0px 0px 6px black, inset 0px 0px 75px red; */
      }
    }

    .height-50 {
      /* padding-left:0px;
     padding-right:0px; */
    }

    .font-size-4 {
      font-size: 16px;
      color: gray;
      /* border: 1px solid gray; */
      margin: auto;
    }

    .favorite_desc {
      /* border: 1px solid lightgray; */
      font-size: 15px;
      /* width:60%; */
    }  

    .bg-color1 {
      background-color: #f5c6cb;
      padding-bottom: 5vh;
      margin: auto;
      margin-top: 3rem;
      margin-bottom: 3rem;
      width: 92%;
      /* box-shadow:0px 0px 6px black, inset 0px 0px 75px red; */
    }

    .top-margin-m {
      margin: auto;
    }
@media(min-width:1024px){
    .padding-alter2 {
      /* padding:0px 2px; */
      margin: 0px 35px 2px 32px;
    }
  }
   @media(max-width:1023px) and (min-width:768px){
    .padding-alter2 {
        margin: 0px 22px 0px 10px;
      }
      .gnav-header #mobilemenu{
        padding-left:2px !important;
      }
   }
    @media(min-width:641px) and (max-width:767px) {
      .padding-alter2 {
        margin: 0px 0px 0px 0px;
      }
      .gnav-header #mobilemenu{
        padding-left:2px !important;
      }
      .border {
      /* border: 1px solid gray !important; */
      box-shadow: 0px 0px 2px black,inset 0px 0px 25px lightsteelblue;
      border-radius: 3px;
      margin:1.25rem;
    }
    }
    @media(min-width:421px) and (max-width:640px) {
      .padding-alter2 {
        margin: 0px 0px 0px 0px;
      }
      .border {
      /* border: 1px solid gray !important; */
      box-shadow: 0px 0px 2px black,inset 0px 0px 25px lightsteelblue;
      border-radius: 3px;
      margin:1.25rem;
    }
    }
    @media(max-width:420px) {
      .padding-alter2 {
        margin: 0px 0px 0px 0px;
      }
      .border {
      /* border: 1px solid gray !important; */
      box-shadow: 0px 0px 2px black,inset 0px 0px 25px lightsteelblue;
      border-radius: 3px;
      margin:1.25rem;
    }
    }

    
  </style>
</head>

<body class="is-responsive">
  <?php require_once("includes/header.php"); ?>

  <div class="container-fluid mb-3">
    <?php
    $get_favorites = $db->select("favorites", array("seller_id" => $login_seller_id));
    $count_favorites = $get_favorites->rowCount();
    if (isset($_GET['add_favorites'])) {
      while ($row_favorites = $get_favorites->fetch()) {
        $proposal_id = $row_favorites->proposal_id;
        $select_proposals = $db->select("proposals", array("proposal_id" => $proposal_id));
        $row_proposals = $select_proposals->fetch();
        $proposal_price = $row_proposals->proposal_price;
        if ($proposal_price == 0) {
          $get_p_1 = $db->select("proposal_packages", array("proposal_id" => $proposal_id, "package_name" => "Basic"));
          $proposal_price = $get_p_1->fetch()->price;
        }
        $insert_cart = $db->insert("cart", array("seller_id" => $login_seller_id, "proposal_id" => $proposal_id, "proposal_price" => $proposal_price, "proposal_qty" => 1));
      }
      $delete_favorites = $db->delete("favorites", array("seller_id" => $login_seller_id));
      if ($delete_favorites) {
        echo "<script>window.open('cart','_self')</script>";
      }
    }
    ?>
    <div class="row justify-content-center mb-3 padding-alter2">
      <div class="row" id="favorites">
        <div class="col-lg-8 col-md-8 mb-3">
          <h2 class="text_under_line">
            <span class="heading_4-h"><?= $lang["titles"]["favorites"]["title"]; ?></span>
          </h2>
          <p class="full-width-p"><small class="font-size-4"><?= str_replace("{count}", $count_favorites, $lang['favorites']['count']); ?></small></p>
          <p class="favorite-description favorite_desc"><?= $lang["titles"]["favorites"]["desc"]; ?></p>
        </div>
        <div class="col-lg-3 col-md-4 pt-5 border">
          <div class="favorite-owner mb-lg-5 mb-md-0 mb-0">
            <?php if (!empty($login_seller_image)) { ?>
              <img src="<?= $login_seller_image; ?>">
            <?php } else { ?>
              <img src="user_images/empty-image.png">
            <?php } ?>
            <?= $lang['favorites']['collected_by']; ?>
            <br>
            <a href="#"><strong><?= $login_seller_user_name; ?></strong></a>
          </div>
          <!-- Go to www.addthis.com/dashboard to customize your tools -->
          <div class="addthis_inline_share_toolbox_d0jy"></div>
        </div>
      </div>
    </div>
  </div>
  <hr>
  <div class="container pt-1 bg-color1">
    <div class="row mb-4">
      <?php
      $get_favorites = $db->select("favorites", array("seller_id" => $login_seller_id));
      while ($row_favorites = $get_favorites->fetch()) {
        $favorite_proposal_id = $row_favorites->proposal_id;
        $get_proposals = $db->select("proposals", array("proposal_id" => $favorite_proposal_id));
        $row_proposals = $get_proposals->fetch();
        $proposal_id = $row_proposals->proposal_id;
        $proposal_title = $row_proposals->proposal_title;
        $proposal_price = $row_proposals->proposal_price;
        if ($proposal_price == 0) {
          $get_p_1 = $db->select("proposal_packages", array("proposal_id" => $proposal_id, "package_name" => "Basic"));
          $proposal_price = $get_p_1->fetch()->price;
        }
        $proposal_img1 = getImageUrl2("proposals", "proposal_img1", $row_proposals->proposal_img1);
        $proposal_video = $row_proposals->proposal_video;
        $proposal_seller_id = $row_proposals->proposal_seller_id;
        $proposal_rating = $row_proposals->proposal_rating;
        $proposal_url = $row_proposals->proposal_url;
        $proposal_featured = $row_proposals->proposal_featured;
        $proposal_enable_referrals = $row_proposals->proposal_enable_referrals;
        $proposal_referral_money = $row_proposals->proposal_referral_money;
        if (empty($proposal_video)) {
          $video_class = "";
        } else {
          $video_class = "video-img";
        }
        $get_seller = $db->select("sellers", array("seller_id" => $proposal_seller_id));
        $row_seller = $get_seller->fetch();
        $seller_user_name = $row_seller->seller_user_name;
        $seller_image = getImageUrl2("sellers", "seller_image", $row_seller->seller_image);
        $seller_level = $row_seller->seller_level;
        $seller_status = $row_seller->seller_status;
        if (empty($seller_image)) {
          $seller_image = "empty-image.png";
        }
        // Select Proposal Seller Level
        @$seller_level = $db->select("seller_levels_meta", array("level_id" => $seller_level, "language_id" => $siteLanguage))->fetch()->title;
        $proposal_reviews = array();
        $select_buyer_reviews = $db->select("buyer_reviews", array("proposal_id" => $proposal_id));
        $count_reviews = $select_buyer_reviews->rowCount();
        while ($row_buyer_reviews = $select_buyer_reviews->fetch()) {
          $proposal_buyer_rating = $row_buyer_reviews->buyer_rating;
          array_push($proposal_reviews, $proposal_buyer_rating);
        }
        $total = array_sum($proposal_reviews);
        @$average_rating = $total ? $total / count($proposal_reviews) : 0;
        $count_favorites = $db->count("favorites", array("proposal_id" => $proposal_id, "seller_id" => $login_seller_id));
        if ($count_favorites == 0) {
          $show_favorite_class = "proposal-favorite";
        } else {
          $show_favorite_class = "proposal-unfavorite";
        }
      ?>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-3">
          <?php require("includes/proposals.php"); ?>
        </div>
      <?php } ?>
    </div>
    <?php
    if ($count_favorites == 0) {

      echo "<span class='text-center'>
      <h3 class='pt-5 pb-5 heading_3'><i class='fa fa-meh-o'></i> {$lang['favorites']['no_favorites']}</h3>
      </span>";
    }
    ?>
  </div>

  <?php require_once("includes/footer.php"); ?>
</body>

</html>