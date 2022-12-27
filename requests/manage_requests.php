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
?>
<!DOCTYPE html>
<html lang="en" class="ui-toolkit">

<head>
    <title><?= $site_name; ?> - <?= $lang["titles"]["manage_requests"]; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?= $site_desc; ?>">
    <meta name="keywords" content="<?= $site_keywords; ?>">
    <meta name="author" content="<?= $site_author; ?>">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet">
    <link href="../styles/bootstrap.css" rel="stylesheet">
    <link href="../styles/custom.css" rel="stylesheet"> <!-- Custom css code from modified in admin panel --->
    <link href="../styles/styles.css" rel="stylesheet">
    <link href="../styles/user_nav_styles.css" rel="stylesheet">
    <link href="../font_awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../styles/sweat_alert.css" rel="stylesheet">
    <link href="../styles/animate.css" rel="stylesheet">
    <script type="text/javascript" src="../js/sweat_alert.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <?php if (!empty($site_favicon)) { ?>
        <link rel="shortcut icon" href="<?= $site_favicon; ?>" type="image/x-icon">
    <?php } ?>
</head>

<body class="is-responsive">
    <?php require_once("../includes/user_header.php"); ?>
    <div class="container mb-3" style="margin-top: 205px;">
        <div class="row">
            <div class="col-md-12 mb-4">
                <h1 class="pull-left"> <?= $lang["titles"]["manage_requests"]; ?> </h1>
                <a href="post_request" class="btn btn-success pull-right">
                    <i class="fa fa-plus-circle"></i> Post New Request
                </a>
            </div>
            <div class="col-md-12">
                <?php include('manage_requests_body.php'); ?>
            </div>
        </div>
    </div>
    <?php require_once("../includes/footer.php"); ?>
</body>

</html>