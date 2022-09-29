<?php
session_start();
require_once("../includes/db.php");
if(!isset($_SESSION['seller_user_name'])){
	echo "<script>window.open('../login','_self')</script>";
}
$login_seller_user_name = $_SESSION['seller_user_name'];
$select_login_seller = $db->select("sellers",array("seller_user_name" => $login_seller_user_name));
$row_login_seller = $select_login_seller->fetch();
$login_seller_id = $row_login_seller->seller_id;
$login_seller_vacation = $row_login_seller->seller_vacation;

$select_memb_plan_detail = $db->select("memb_plan_detail",array("seller_id"=>$login_seller_id));
$row_plan_detail = $select_memb_plan_detail->fetch();

$memb_tbl_id = $row_plan_detail->memb_tbl_id;

$membership_table = $db->select("membership_table",array("id"=>$memb_tbl_id));
$membership_table_detail = $membership_table->fetch();

$num_gigs = $membership_table_detail->create_active_service;


//$memb_tbl = $db->select('membership_table',array('id'=>$memb_tbl_id));

//$row_membership_table = $memb_tbl->fatch();

//var_dump($row_membership_table);

//$num_of_gigs = $row_membership_table->create_active_service;


$count_active_proposals = $db->count("proposals",array("proposal_seller_id" => $login_seller_id, "proposal_status" => 'active'));
$count_total_proposals = $db->count("proposals",array("proposal_seller_id" => $login_seller_id));

$count_pause_proposals = $db->query("select * from proposals where proposal_seller_id=$login_seller_id and (proposal_status='pause' or proposal_status='admin_pause')")->rowCount();

$count_pending_proposals = $db->count("proposals",array("proposal_seller_id" => $login_seller_id, "proposal_status" => 'pending'));

$count_modification_proposals = $db->count("proposals",array("proposal_seller_id"=>$login_seller_id,"proposal_status"=>'modification'));

$count_draft_proposals = $db->count("proposals",array("proposal_seller_id"=>$login_seller_id,"proposal_status"=>'draft'));

$count_declined_proposals = $db->count("proposals",array("proposal_seller_id" => $login_seller_id, "proposal_status" => 'declined'));

?>
<!DOCTYPE html>
<html lang="en" class="ui-toolkit">
<head>
	<title><?= $site_name; ?> - View My Proposals.</title>
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
	<link href="../styles/owl.carousel.css" rel="stylesheet">
	<link href="../styles/owl.theme.default.css" rel="stylesheet">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<link href="../styles/sweat_alert.css" rel="stylesheet">
	<link href="../styles/animate.css" rel="stylesheet">
	<script type="text/javascript" src="../js/ie.js"></script>
	<script type="text/javascript" src="../js/sweat_alert.js"></script>
	<script src="https://checkout.stripe.com/checkout.js"></script>
	<?php if(!empty($site_favicon)){ ?>
		<link rel="shortcut icon" href="<?= $site_favicon; ?>" type="image/x-icon">
	<?php } ?>

	<!-- Include the PayPal JavaScript SDK -->
	<script src="https://www.paypal.com/sdk/js?client-id=<?= $paypal_client_id; ?>&disable-funding=credit,card&currency=<?= $paypal_currency_code; ?>"></script>

</head>
<body class="is-responsive">
	<?php

	require_once("../includes/user_header.php");

	if(!isset($_GET['paused']) and !isset($_GET['pending']) and !isset($_GET['modification']) and !isset($_GET['draft']) and !isset($_GET['declined'])){
		$active =  "active";
	}else{
		$active = "";
	}

	?>
	<div class="container-fluid view-proposals"><!-- container-fluid view-proposals Starts -->
		<div class="row"><!-- row Starts -->
			<div class="col-md-12 mt-5 mb-3"><!-- col-md-12 mt-5 mb-3 Starts -->
				<h1 class="pull-left"><?= $lang["titles"]["view_proposals"]; ?></h1>
				<label class="pull-right lead"><!-- pull-right lead Starts -->
					<?= $lang['view_proposals']['vacation_mode']; ?>
					<?php if($login_seller_vacation == "off"){ ?>
						<button id="turn_on_seller_vaction" data-toggle="button" class="btn btn-lg btn-toggle">
							<div class="toggle-handle"></div>
						</button>
					<?php }else{ ?>
						<button id="turn_off_seller_vaction" data-toggle="button" class="btn btn-lg btn-toggle active">
							<div class="toggle-handle"></div>
						</button>
					<?php } ?>
				</label><!-- pull-right lead Ends -->
				<script>
					$(document).ready(function(){
						$(document).on('click','#turn_on_seller_vaction', function(){
							seller_id = "<?= $login_seller_id; ?>";
							$.ajax({
								method:"POST",
								url: "seller_vacation_modal",
								data: { seller_id: seller_id, turn_on: 'on' }
							}).done(function(data){
								$('.append-modal').html(data);
							});
						});
						$(document).on('click','#turn_off_seller_vaction', function(){
							seller_id = "<?= $login_seller_id; ?>";
							$.ajax({
								method:"POST",
								url: "seller_vacation",
								data: { seller_id: seller_id, turn_off: 'off' }
							}).done(function(){
								$("#turn_off_seller_vaction").attr('id','turn_on_seller_vaction');
								swal({
									type: 'success',
									text: 'Vacation switched OFF.',
									padding: 40,
								});
							});
						});
					});
				</script>
			</div>
			<div class="append-modal"></div>
			<?php include('user_view_proposal.php'); ?>
		</div>
	</div>
</div>
<div id="featured-proposal-modal"></div>
<?php require_once("../includes/footer.php"); ?>
</body>
</html>