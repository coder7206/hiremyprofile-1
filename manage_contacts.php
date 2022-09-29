<?php
session_start();
require_once("includes/db.php");
if(!isset($_SESSION['seller_user_name'])){
   echo "<script>window.open('login','_self')</script>";
}
$login_seller_user_name = $_SESSION['seller_user_name'];
$select_login_seller = $db->select("sellers",array("seller_user_name" => $login_seller_user_name));
$row_login_seller = $select_login_seller->fetch();
$login_seller_id = $row_login_seller->seller_id;
?>
<!DOCTYPE html>
<html lang="en" class="ui-toolkit">
<head>
   <title><?= $site_name; ?> - <?= $lang["titles"]["manage_contacts"]; ?>.</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="<?= $site_desc; ?>">
   <meta name="keywords" content="<?= $site_keywords; ?>">
   <meta name="author" content="<?= $site_author; ?>">
   <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet">
   <link href="styles/bootstrap.css" rel="stylesheet">
   <link href="styles/custom.css" rel="stylesheet"> <!-- Custom css code from modified in admin panel --->
   <link href="styles/styles.css" rel="stylesheet">
   <link href="styles/user_nav_styles.css" rel="stylesheet">
   <link href="font_awesome/css/font-awesome.css" rel="stylesheet">
   <script type="text/javascript" src="js/jquery.min.js"></script>
   <?php if(!empty($site_favicon)){ ?>
      <link rel="shortcut icon" href="<?= $site_favicon; ?>" type="image/x-icon">
   <?php } ?>
</head>
<body class="is-responsive">
   <?php require_once("includes/user_header.php"); ?>
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12 mt-5">
            <h1> <?= $lang["titles"]["manage_contacts"]; ?> </h1>
            <ul class="nav nav-tabs mt-5 mb-3"><!-- nav nav-tabs mt-5 mb-3 Starts -->
               <?php
               $count_my_buyers = $db->count("my_buyers",array("seller_id" => $login_seller_id));
               ?>
               <li class="nav-item">
                  <a href="#my_buyers" data-toggle="tab" class="nav-link make-black 
                  <?php
                  if(!isset($_GET['my_buyers']) and !isset($_GET['my_sellers'])){ echo "active"; }
                  if(isset($_GET['my_buyers'])){ echo "active"; }
               ?>">
               <?= $lang['tabs']['my_buyers']; ?> <span class="badge badge-success"><?= $count_my_buyers; ?></span>
            </a>
         </li>
         <?php
         $count_my_sellers = $db->count("my_buyers",array("buyer_id" => $login_seller_id));
         ?>
         <li class="nav-item">
            <a href="#my_sellers" data-toggle="tab" class="nav-link make-black
            <?php
            if(isset($_GET['my_sellers'])){
               echo "active";
            }
            ?>
            ">
            <?= $lang['tabs']['my_sellers']; ?> <span class="badge badge-success"><?= $count_my_sellers; ?></span>
         </a>
      </li>
   </ul>
   <div class="tab-content mt-2">
      <div id="my_buyers" class="tab-pane fade 
      <?php
      if(!isset($_GET['my_buyers']) and !isset($_GET['my_sellers'])){
         echo "show active";
      }
      if(isset($_GET['my_buyers'])){
         echo "show active";
      }
      ?>
      ">
      <?php include('seller_contacts.php'); ?>
   </div>
   <div id="my_sellers" class="tab-pane fade
   <?php
   if(isset($_GET['my_sellers'])){
      echo "show active";
   }
   ?>
   ">
   <?php include('buyer_contacts.php'); ?>
</div>
</div>
</div>
</div>
</div>
<?php require_once("includes/footer.php"); ?>
</body>
</html>