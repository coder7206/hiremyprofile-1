<?php
$countRequestsActive = $db->count("buyer_requests", array("seller_id" => $login_seller_id, "request_status" => 'active'));
$countRequestsPause = $db->count("buyer_requests", array("seller_id" => $login_seller_id, "request_status" => 'pause'));
$countRequestsPending = $db->count("buyer_requests", array("seller_id" => $login_seller_id, "request_status" => 'pending'));
$countRequestsModification = $db->count("buyer_requests", array("seller_id" => $login_seller_id, "request_status" => 'modification'));
$countRequestsUnapproved = $db->count("buyer_requests", array("seller_id" => $login_seller_id, "request_status" => 'unapproved'));

$activeReqTab = isset($_GET['tab']) ? $_GET['tab'] : "approved_request";
?>
<ul class="nav nav-tabs flex-column flex-sm-row  mt-4">
    <li class="nav-item">
        <a href="#activeBuyerReq" data-toggle="tab" class="nav-link make-black <?=$activeReqTab == 'approved_request' ? "active" : ""?>">
            <?= $lang['tabs']['active_requests']; ?> <span class="badge badge-success"><?= $countRequestsActive; ?></span>
        </a>
    </li>
    <li class="nav-item">
        <a href="#pauseBuyerReq" data-toggle="tab" class="nav-link make-black <?=$activeReqTab == 'pause_request' ? "active" : ""?>">
            <?= $lang['tabs']['pause_requests']; ?> <span class="badge badge-success"><?= $countRequestsPause; ?></span>
        </a>
    </li>
    <li class="nav-item">
        <a href="#pendingBuyerReq" data-toggle="tab" class="nav-link make-black <?=$activeReqTab == 'pending_request' ? "active" : ""?>">
            <?= $lang['tabs']['pending_approval']; ?> <span class="badge badge-success"><?= $countRequestsPending; ?></span>
        </a>
    </li>
    <li class="nav-item">
        <a href="#modificationBuyerReq" data-toggle="tab" class="nav-link make-black <?=$activeReqTab == 'modification_request' ? "active" : ""?>">
            <?= $lang['tabs']['requires_modification']; ?> <span class="badge badge-success"><?= $countRequestsModification; ?></span>
        </a>
    </li>
    <li class="nav-item">
        <a href="#unapprovedBuyerReq" data-toggle="tab" class="nav-link make-black <?=$activeReqTab == 'unapproved_request' ? "active" : ""?>">
            <?= $lang['tabs']['unapproved']; ?> <span class="badge badge-success"><?= $countRequestsUnapproved; ?></span>
        </a>
    </li>
</ul>
<div class="tab-content mt-4">
    <div id="activeBuyerReq" class="tab-pane fade <?=$activeReqTab == 'approved_request' ? "show active" : ""?>">
        <?php require_once("manage-requests/active.php") ?>
    </div>
    <div id="pauseBuyerReq" class="tab-pane fade <?=$activeReqTab == 'pause_request' ? "show active" : ""?>">
        <?php require_once("manage-requests/pause.php") ?>
    </div>
    <div id="pendingBuyerReq" class="tab-pane fade <?=$activeReqTab == 'pending_request' ? "show active" : ""?>">
        <?php require_once("manage-requests/pending.php") ?>
    </div>
    <div id="modificationBuyerReq" class="tab-pane fade <?=$activeReqTab == 'modification_request' ? "show active" : ""?>">
        <?php require_once("manage-requests/modification.php") ?>
    </div>
    <div id="unapprovedBuyerReq" class="tab-pane fade <?=$activeReqTab == 'unapproved_request' ? "show active" : ""?>">
        <?php require_once("manage-requests/unapproved.php") ?>
    </div>
</div>