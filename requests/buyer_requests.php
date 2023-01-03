<?php
session_start();
require_once("../includes/db.php");

if (!isset($_SESSION['seller_user_name'])) {
  echo "<script>window.open('../login','_self')</script>";
}

$login_seller_user_name = $_SESSION['seller_user_name'];
$select_login_seller = $db->select("sellers", array("seller_user_name" => $login_seller_user_name));
$row_login_seller = $select_login_seller->fetch();
$login_seller_id = $row_login_seller->seller_id;
$login_seller_offers = $row_login_seller->seller_offers;
?>
<!DOCTYPE html>
<html lang="en" class="ui-toolkit">

<head>
  <title><?= $site_name; ?> - Recent Buyer Requests.</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?= $site_desc; ?>">
  <meta name="keywords" content="<?= $site_keywords; ?>">
  <meta name="author" content="<?= $site_author; ?>">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet">
  <link href="../styles/bootstrap.css" rel="stylesheet">
  <link href="../styles/custom.css" rel="stylesheet">
  <!-- Custom css code from modified in admin panel --->
  <link href="../styles/styles.css" rel="stylesheet">
  <link href="../styles/user_nav_styles.css" rel="stylesheet">
  <link href="../font_awesome/css/font-awesome.css" rel="stylesheet">
  <link href="../styles/sweat_alert.css" rel="stylesheet">
  <script type="text/javascript" src="../js/sweat_alert.js"></script>
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <?php if (!empty($site_favicon)) { ?>
    <link rel="shortcut icon" href="<?= $site_favicon; ?>" type="image/x-icon">
  <?php } ?>
</head>

<body class="is-responsive">
  <?php require_once("../includes/user_header.php"); ?>
  <div class="container-fluid">
    <div class="row buyer-requests">
      <div class="col-md-12 mt-5">
        <!--        <h1 class="col-md-9 float-left">-->
        <!-- <? ////= $lang["titles"]["buyer_requests"];
              ?>
       <h1>-->
        <div class="col-md-3 float-right">
          <div class="input-group">
            <input type="text" id="search-input" placeholder="Search Buyer Requests" class="form-control">
            <span class="input-group-btn">
              <button class="btn btn-success" id="req-search"> <i class="fa fa-search"></i> </button>
            </span>
          </div>
        </div>
      </div>
      <div class="col-md-12 mt-4">
        <?php
        if (isset($_SESSION['seller_user_name'])) {
        ?>
          <h5 class="text-right mr-3">
            <i class="fa fa-list-alt"></i> <?= $login_seller_offers; ?> Offers Left Today
          </h5>
        <?php } ?>
        <div class="clearfix"></div>
        <?php include('user_buyer_requests.php'); ?>
      </div>
    </div>
    <div class="append-modal"></div>
    <div id="quota-finish" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title h5"><i class="fa fa-frown-o fa-move-up"></i> Request Quota Reached</h5>
            <button class="close" data-dismiss="modal"> &times; </button>
          </div>
          <div class="modal-body">
            <center>
              <h5>You can only send a max of 10 offers per day. Today you've maxed out. Try again tomorrow. </h5>
            </center>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php require_once("../includes/footer.php"); ?>
</body>

</html>