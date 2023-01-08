<?php
$countRequestsActive = $db->count("buyer_requests", array("seller_id" => $login_seller_id, "request_status" => 'active'));
$countRequestsPause = $db->count("buyer_requests", array("seller_id" => $login_seller_id, "request_status" => 'pause'));
$countRequestsPending = $db->count("buyer_requests", array("seller_id" => $login_seller_id, "request_status" => 'pending'));
$countRequestsModification = $db->count("buyer_requests", array("seller_id" => $login_seller_id, "request_status" => 'modification'));
$countRequestsUnapproved = $db->count("buyer_requests", array("seller_id" => $login_seller_id, "request_status" => 'unapproved'))
?>
<ul class="nav nav-tabs flex-column flex-sm-row  mt-4">
    <li class="nav-item">
        <a href="#activeBuyerReq" data-toggle="tab" class="nav-link active make-black">
            <?= $lang['tabs']['active_requests']; ?> <span class="badge badge-success"><?= $countRequestsActive; ?></span>
        </a>
    </li>
    <li class="nav-item">
        <a href="#pauseBuyerReq" data-toggle="tab" class="nav-link make-black">
            <?= $lang['tabs']['pause_requests']; ?> <span class="badge badge-success"><?= $countRequestsPause; ?></span>
        </a>
    </li>
    <li class="nav-item">
        <a href="#pendingBuyerReq" data-toggle="tab" class="nav-link make-black">
            <?= $lang['tabs']['pending_approval']; ?> <span class="badge badge-success"><?= $countRequestsPending; ?></span>
        </a>
    </li>
    <li class="nav-item">
        <a href="#modificationBuyerReq" data-toggle="tab" class="nav-link make-black">
            <?= $lang['tabs']['requires_modification']; ?> <span class="badge badge-success"><?= $countRequestsModification; ?></span>
        </a>
    </li>
    <li class="nav-item">
        <a href="#unapprovedBuyerReq" data-toggle="tab" class="nav-link make-black">
            <?= $lang['tabs']['unapproved']; ?> <span class="badge badge-success"><?= $countRequestsUnapproved; ?></span>
        </a>
    </li>
</ul>
<div class="tab-content mt-4">
    <div id="activeBuyerReq" class="tab-pane fade show active">
        <?php require_once("manage-requests/active.php") ?>
    </div>
    <div id="pauseBuyerReq" class="tab-pane fade">
        <?php require_once("manage-requests/pause.php") ?>
    </div>
    <div id="pendingBuyerReq" class="tab-pane fade">
        <?php require_once("manage-requests/pending.php") ?>
    </div>
    <div id="modificationBuyerReq" class="tab-pane fade">
        <?php require_once("manage-requests/modification.php") ?>
    </div>
    <div id="unapprovedBuyerReq" class="tab-pane fade">
        <?php require_once("manage-requests/unapproved.php") ?>
    </div>
</div>