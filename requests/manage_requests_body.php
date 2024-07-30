<?php
$countRequestsActive = $db->count("buyer_requests", array("seller_id" => $login_seller_id, "request_status" => 'active'));
$countRequestsPause = $db->count("buyer_requests", array("seller_id" => $login_seller_id, "request_status" => 'pause'));
$countRequestsPending = $db->count("buyer_requests", array("seller_id" => $login_seller_id, "request_status" => 'pending'));
$countRequestsModification = $db->count("buyer_requests", array("seller_id" => $login_seller_id, "request_status" => 'modification'));
$countRequestsUnapproved = $db->count("buyer_requests", array("seller_id" => $login_seller_id, "request_status" => 'unapproved'));

$activeReqTab = isset($_GET['tab']) ? $_GET['tab'] : "approved_request";
?>
<style>
    @media (max-width:768px) {
        .badge-float-right {
            float: right;
            margin-top: -3px;
            padding-top: 5px;
            margin-right: -9px !important;
        }
    }
    @media (min-width:992px) {
    .width-increase1{
		/* border:1px solid green; */
		width:18.5%;
        margin: 5px 0px;
        /* text-align: center; */
        /* box-shadow:0px 0px 1px gray, inset 0px 0px 15px #d5f5ee; */
	}
    .width-increase12{
		/* border:1px solid green; */
		width:24%;
        margin: 5px 0px;
        /* text-align: center; */
        /* box-shadow:0px 0px 1px gray, inset 0px 0px 15px #d5f5ee; */
	}
    .width-increase13{
		/* border:1px solid green; */
		width:18%;
        margin: 5px 0px;
        /* text-align: center; */
        /* box-shadow:0px 0px 1px gray, inset 0px 0px 15px #d5f5ee; */
	}}
</style>

<ul class="nav nav-tabs flex-column flex-sm-row  mt-1">
    <li class="nav-item width-increase1">
    <a href="#activeBuyerReq" data-toggle="tab" class="nav-link make-black <?= $activeReqTab == 'approved_request' ? "active" : "" ?> padding-10">
            <?= $lang['tabs']['active_requests']; ?> <span class="badge badge-success badge-float-right"><?= $countRequestsActive; ?></span>
        </a>
    </li>
    <li class="nav-item width-increase1">
    <a href="#pauseBuyerReq" data-toggle="tab" class="nav-link make-black <?= $activeReqTab == 'pause_request' ? "active" : "" ?> padding-10">
            <?= $lang['tabs']['pause_requests']; ?> <span class="badge badge-success badge-float-right"><?= $countRequestsPause; ?></span>
        </a>
    </li>


    <li class="nav-item width-increase1">
    <a href="#pendingBuyerReq" data-toggle="tab" class="nav-link make-black <?= $activeReqTab == 'pending_request' ? "active" : "" ?> padding-10">
            <?= $lang['tabs']['pending_approval']; ?> <span class="badge badge-success badge-float-right"><?= $countRequestsPending; ?></span>
        </a>
    </li>


    <li class="nav-item width-increase12">
        <a href="#modificationBuyerReq" data-toggle="tab" class="nav-link make-black <?= $activeReqTab == 'modification_request' ? "active" : "" ?> padding-10">
            <?= $lang['tabs']['requires_modification']; ?> <span class="badge badge-success badge-float-right"><?= $countRequestsModification; ?></span>
        </a>
    </li>
    <li class="nav-item width-increase13">
        <a href="#unapprovedBuyerReq" data-toggle="tab" class="nav-link make-black <?= $activeReqTab == 'unapproved_request' ? "active" : "" ?> padding-10">
            <?= $lang['tabs']['unapproved']; ?> <span class="badge badge-success badge-float-right"><?= $countRequestsUnapproved; ?></span>
        </a>
    </li>
</ul>
<div class="tab-content mt-4">
    <div id="activeBuyerReq" class="tab-pane fade <?= $activeReqTab == 'approved_request' ? "show active" : "" ?>">
        <?php require_once("manage-requests/active.php") ?>
    </div>
    <div id="pauseBuyerReq" class="tab-pane fade <?= $activeReqTab == 'pause_request' ? "show active" : "" ?>">
        <?php require_once("manage-requests/pause.php") ?>
    </div>
    <div id="pendingBuyerReq" class="tab-pane fade <?= $activeReqTab == 'pending_request' ? "show active" : "" ?>">
        <?php require_once("manage-requests/pending.php") ?>
    </div>
    <div id="modificationBuyerReq" class="tab-pane fade <?= $activeReqTab == 'modification_request' ? "show active" : "" ?>">
        <?php require_once("manage-requests/modification.php") ?>
    </div>
    <div id="unapprovedBuyerReq" class="tab-pane fade <?= $activeReqTab == 'unapproved_request' ? "show active" : "" ?>">
        <?php require_once("manage-requests/unapproved.php") ?>
    </div>
</div>