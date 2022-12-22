<?php
$login_seller_user_name = $_SESSION['seller_user_name'];
$select_login_seller = $db->select("sellers", array("seller_user_name" => $login_seller_user_name));
$row_login_seller = $select_login_seller->fetch();
// echo "<pre>";
// print_r($row_login_seller);
// exit;
$login_seller_id = $row_login_seller->seller_id;
$login_seller_name = $row_login_seller->seller_name;
$login_user_name = $row_login_seller->seller_user_name;
$login_seller_offers = $row_login_seller->seller_offers;
$relevant_requests = $row_general_settings->relevant_requests;

$select_sellers = $db->select("sellers", array("seller_user_name" => $_SESSION['seller_user_name']));
$row_sellers = $select_sellers->fetch();

$select_memb_plan_detail = $db->select("`memb_plan_detail` mp LEFT JOIN `membership_table` m ON mp.memb_tbl_id = m.id WHERE mp.seller_id = $login_seller_id AND mp.memb_status = 'Active' AND mp.memb_end_date >= CURRENT_TIMESTAMP ORDER BY mp.id DESC LIMIT 1");
$row_plan_detail = $select_memb_plan_detail->fetch();

// $checkuser = $db->select("memb_plan_detail where seller_id = $row_sellers->seller_id and memb_status = 'active'  order by id desc LIMIT 1");
// $row_purchsed = $checkuser->fetch();
if ($row_plan_detail) {
    $planName = $row_plan_detail->plan_name;
    // $exp_date = $row_plan_detail->memb_end_date;
    // $row_purchsed_detail = $db->select("membership_table where id = " . $row_plan_detail->memb_tbl_id . "  LIMIT 1");
    // $row_purchsed_plan = $row_purchsed_detail->fetch();
} else {
    $exp_date = 'new update';
    $row_purchsed_detail = $db->select("membership_table where id = 1  LIMIT 1");
    $row_purchsed_plan = $row_purchsed_detail->fetch();
    $planName = $row_purchsed_plan->plan_name;
}

$count_active_proposals = $db->count("proposals", array("proposal_seller_id" => $login_seller_id, "proposal_status" => 'active'));
$count_total_proposals = $db->count("proposals", array("proposal_seller_id" => $login_seller_id));

$count_pause_proposals = $db->query("select * from proposals where proposal_seller_id=$login_seller_id and (proposal_status='pause' or proposal_status='admin_pause')")->rowCount();

$count_pending_proposals = $db->count("proposals", array("proposal_seller_id" => $login_seller_id, "proposal_status" => 'pending'));

$count_modification_proposals = $db->count("proposals", array("proposal_seller_id" => $login_seller_id, "proposal_status" => 'modification'));

$count_draft_proposals = $db->count("proposals", array("proposal_seller_id" => $login_seller_id, "proposal_status" => 'draft'));

$count_declined_proposals = $db->count("proposals", array("proposal_seller_id" => $login_seller_id, "proposal_status" => 'declined'));

$select_seller_accounts = $db->select("seller_accounts", array("seller_id" => $login_seller_id));
$row_seller_accounts = $select_seller_accounts->fetch();
$current_balance = $row_seller_accounts->current_balance;
$month_earnings = $row_seller_accounts->month_earnings;

// POST METHOD IN INDEX.PHP
$activeTab = "buyer";
if (isset($_COOKIE["bkmark_seller_" . $_SESSION['seller_user_name']])) {
    $activeTab = "seller";
}
?>

<style>
    .carousel-item img,
    .carousel-item video {
        height: auto !important;
        background-color: black;
    }

    #sub-category {
        width: auto;
    }

    .about-section-2 .nav.nav-tabs.flex-column.flex-sm-row,
    .tab-content {
        width: 100%;
    }

    .about-section-1 .nav-tabs .nav-link.active,
    .about-section-1 .nav-tabs .nav-item.show .nav-link {
        color: #fff;
        background-color: #00c8d4;
        width: 30%;
        text-align: center;
        font-weight: normal;
    }

    .about-section-1 .nav-tabs .nav-link {
        color: #495057;
        /*background-color: #00c8d4;*/
        width: 30%;
        text-align: center;
        font-weight: normal;
    }

    .about-section-1 .nav-tabs .nav-link.active::after {
        content: '';
        position: relative;
        left: -40px;
        top: 38px;
        width: 0;
        height: 0;
        border-left: 10px solid transparent;
        border-right: 10px solid transparent;
        border-top: 10px solid #00c8d4;
        clear: both;
    }

    .about-section-1 .nav-tabs {
        border-bottom: none;
    }

    .user_border {
        border: 1px solid #edefed;
        padding-top: 30px;
    }

    .hide {
        display: none;
    }
</style>
<script>
    function myBookmark(x) {
        var typeId = x.getAttribute('data-bookmark-seller');
        // console.log(typeId)
        // typeId == true ? x.classList.toggle("fa-bookmark-o") : x.classList.toggle("fa-bookmark");
        var form = document.createElement("form");
        var element1 = document.createElement("input");

        form.method = "POST";
        form.action = "";

        element1.value = typeId;
        element1.name = "seller_bookmark";
        form.appendChild(element1);

        document.body.appendChild(form);

        form.submit();
    }
</script>
<div class="container-fluid pt-5">
    <div class="row">
        <div class="user_border buyer_box col-xl-3 col-lg-4 <?= ($lang_dir == "right" ? 'order-2 order-sm-1' : '') ?> hidden-xs">
            <?php include("includes/buyer_home_sidebar.php"); ?>
        </div>
        <div class="user_border seller_box hide col-xl-3 col-lg-4 <?= ($lang_dir == "right" ? 'order-2 order-sm-1' : '') ?> hidden-xs">
            <?php include("includes/buyer_home_sidebar.php"); ?>
        </div>
        <div class="col-xl-9 col-lg-8 pb-5">
            <div class="about-section-1">
                <div class="top_bas nav nav-tabs font-weight-bold text-largest" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link <?= $activeTab == "buyer" ? "active" : "" ?>" data-toggle="tab" href="#Buyer" role="tab" aria-selected="<?= $activeTab == "buyer" ? "true" : "false" ?>" id="buyer_tab">Buyer </a>
                    <?php if ($activeTab == "seller") { ?>
                        <a class="nav-item nav-link active" data-toggle="tab" href="#Seller" role="tab" aria-selected="true" id="seller_tab">Seller <i onclick="myBookmark(this)" data-bookmark-seller="no" class="fa fa-bookmark" data-toggle="tooltip" data-placement="top" title="Remove Bookmark"></i></a>
                    <?php } else { ?>
                        <a class="nav-item nav-link" data-toggle="tab" href="#Seller" role="tab" aria-selected="false" id="seller_tab">Seller <i onclick="myBookmark(this)" data-bookmark-seller="yes" class="fa fa-bookmark-o" data-toggle="tooltip" data-placement="top" title="Add Bookmark"></i></a>
                    <?php } ?>
                </div>
            </div>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade <?= $activeTab == "buyer" ? "show active" : "" ?>" id="Buyer" role="tabpanel">
                    <div class="about-section-2 pt-5">
                        <div class="col-xs-12">
                            <div class="card rounded-0">
                                <div class="card-body p-0">
                                    <div class="row pl-3 pr-3 pb-2 pt-2 mt-4">
                                        <div class="col-xs-6 text-center border-box">
                                            <a href="purchases"> <?php $count_orders = $db->count("orders", array("buyer_id" => $login_seller_id, "order_active" => 'yes')); ?>
                                                <img width="" src="images/comp/shopping-bags.png" alt="shopping-bags">
                                                <h5 class="text-muted pt-2"> <?= $lang["dashboard"]['open_purchases']; ?></h5>
                                                <h3 class="text-success"><?= $count_orders; ?> </h3>
                                            </a>
                                        </div>
                                        <div class="col-xs-6 text-center border-box">
                                            <a href="revenue"><img width="" src="images/comp/accounting.png" alt="accounting">
                                                <h5 class="text-muted pt-2"> <?= $lang["dashboard"]['balance']; ?></h5>
                                                <h3 class="text-success"><?= showPrice($current_balance); ?></h3>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="">
                            <!-- Order start -->
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <h1 class="<?= ($lang_dir == "right" ? 'text-right' : '') ?>"><?= $lang["titles"]["buying_orders"]; ?></h1>
                                </div>
                                <div class="col-md-12">
                                    <?php include('user_buying_orders.php'); ?>
                                </div>
                            </div>
                            <!-- Order End -->
                            <!-- Buyer Request -->
                            <div class="row">
                                <!-- <div class="col-md-12 mt-5 mb-3">
           <h1 class="<?= ($lang_dir == "right" ? 'text-right' : '') ?>"><?= $lang["titles"]["buyer_requests"]; ?></h1>
          </div> -->
                                <div class="col-md-12">
                                    <?php include('requests/user_buyer_requests.php'); ?>
                                </div>
                            </div>
                            <!-- End Buyer Request -->
                            <!-- Start Manage Request -->
                            <div class="row">
                                <div class="col-md-12 mt-5 mb-3">
                                    <h1 class="pull-left"> <?= $lang["titles"]["manage_requests"]; ?> </h1>
                                </div>
                                <div class="col-md-12">
                                    <ul class="nav nav-tabs flex-column flex-sm-row">
                                        <?php
                                        $count_requests = $db->count("buyer_requests", array("seller_id" => $login_seller_id, "request_status" => 'active'));
                                        ?>
                                        <li class="nav-item">
                                            <a href="#request_active" data-toggle="tab" class="nav-link active make-black">
                                                <?= $lang['tabs']['active_requests']; ?> <span class="badge badge-success"><?= $count_requests; ?></span>
                                            </a>
                                        </li>
                                        <?php
                                        $count_requests = $db->count("buyer_requests", array("seller_id" => $login_seller_id, "request_status" => 'pause'));
                                        ?>
                                        <li class="nav-item">
                                            <a href="#request_pause" data-toggle="tab" class="nav-link make-black">
                                                <?= $lang['tabs']['pause_requests']; ?> <span class="badge badge-success"><?= $count_requests; ?></span>
                                            </a>
                                        </li>
                                        <?php
                                        $count_requests = $db->count("buyer_requests", array("seller_id" => $login_seller_id, "request_status" => 'pending'));
                                        ?>
                                        <li class="nav-item">
                                            <a href="#request_pending" data-toggle="tab" class="nav-link make-black">
                                                <?= $lang['tabs']['pending_approval']; ?> <span class="badge badge-success"><?= $count_requests; ?></span>
                                            </a>
                                        </li>
                                        <?php
                                        $count_requests = $db->count("buyer_requests", array("seller_id" => $login_seller_id, "request_status" => 'unapproved'))
                                        ?>
                                        <li class="nav-item">
                                            <a href="#request_unapproved" data-toggle="tab" class="nav-link make-black">
                                                <?= $lang['tabs']['unapproved']; ?> <span class="badge badge-success"><?= $count_requests; ?></span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content mt-4">
                                        <div id="request_active" class="tab-pane fade show active">
                                            <div class="table-responsive box-table">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th><?= $lang['th']['title']; ?></th>
                                                            <th><?= $lang['th']['description']; ?></th>
                                                            <th><?= $lang['th']['date']; ?></th>
                                                            <th><?= $lang['th']['offers']; ?></th>
                                                            <th><?= $lang['th']['budget']; ?></th>
                                                            <th><?= $lang['th']['actions']; ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $get_requests = $db->select("buyer_requests", array("seller_id" => $login_seller_id, "request_status" => "active"), "DESC");
                                                        $count_requests = $get_requests->rowCount();
                                                        while ($row_requests = $get_requests->fetch()) {
                                                            $request_id = $row_requests->request_id;
                                                            $request_title = $row_requests->request_title;
                                                            $request_description = $row_requests->request_description;
                                                            $request_date = $row_requests->request_date;
                                                            $request_budget = $row_requests->request_budget;
                                                            $count_offers = $db->count("send_offers", array("request_id" => $request_id, "status" => 'active'));
                                                        ?>
                                                            <tr>
                                                                <td> <?= $request_title; ?> </td>
                                                                <td><?= $request_description; ?></td>
                                                                <td> <?= $request_date; ?> </td>
                                                                <td> <?= $count_offers; ?> </td>
                                                                <td class="text-success"> <?= showPrice($request_budget); ?> </td>
                                                                <td class="text-center">
                                                                    <div class="dropdown">
                                                                        <button class="btn btn-success dropdown-toggle" data-toggle="dropdown"></button>
                                                                        <div class="dropdown-menu">
                                                                            <a href="<?=$site_url?>/requests/view_offers?request_id=<?= $request_id; ?>" target="blank" class="dropdown-item">View
                                                                                Offers</a>
                                                                            <a href="<?=$site_url?>/requests/pause_request?request_id=<?= $request_id; ?>" class="dropdown-item">
                                                                                Pause
                                                                            </a>
                                                                            <a href="<?=$site_url?>/requests/delete_request?request_id=<?= $request_id; ?>" class="dropdown-item">
                                                                                Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                                <?php
                                                if ($count_requests == 0) {
                                                    echo "<center>
                             <h3 class='pt-4 pb-4'>
                                <i class='fa fa-meh-o'></i> {$lang['manage_requests']['no_active']}
                             </h3>
                          </center>";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div id="request_pause" class="tab-pane fade">
                                            <div class="table-responsive box-table">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th><?= $lang['th']['title']; ?></th>
                                                            <th><?= $lang['th']['description']; ?></th>
                                                            <th><?= $lang['th']['date']; ?></th>
                                                            <th><?= $lang['th']['offers']; ?></th>
                                                            <th><?= $lang['th']['budget']; ?></th>
                                                            <th><?= $lang['th']['actions']; ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $get_requests = $db->select("buyer_requests", array("seller_id" => $login_seller_id, "request_status" => "pause"), "DESC");

                                                        $count_requests = $get_requests->rowCount();
                                                        while ($row_requests = $get_requests->fetch()) {
                                                            $request_id = $row_requests->request_id;
                                                            $request_title = $row_requests->request_title;
                                                            $request_description = $row_requests->request_description;
                                                            $request_date = $row_requests->request_date;
                                                            $request_budget = $row_requests->request_budget;

                                                            $count_offers = $db->count("send_offers", array("request_id" => $request_id, "status" => 'active'));
                                                        ?>
                                                            <tr>
                                                                <td> <?= $request_title; ?> </td>
                                                                <td>
                                                                    <?= $request_description; ?>
                                                                </td>
                                                                <td> <?= $request_date; ?></td>
                                                                <td><?= $count_offers; ?> </td>
                                                                <td class="text-success"> <?= showPrice($request_budget); ?> </td>
                                                                <td class="text-center">
                                                                    <div class="dropdown">
                                                                        <button class="btn btn-success dropdown-toggle" data-toggle="dropdown"></button>
                                                                        <div class="dropdown-menu">
                                                                            <a href="<?=$site_url?>/requests/active_request?request_id=<?= $request_id; ?>" class="dropdown-item">
                                                                                Activate
                                                                            </a>
                                                                            <a href="<?=$site_url?>/requests/delete_request?request_id=<?= $request_id; ?>" class="dropdown-item">
                                                                                Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                                <?php
                                                if ($count_requests == 0) {
                                                    echo "<center>
                              <h3 class='pt-4 pb-4'><i class='fa fa-smile-o'></i> {$lang['manage_requests']['no_pause']} </h3>
                              </center>";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div id="request_pending" class="tab-pane fade">
                                            <div class="table-responsive box-table">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th><?= $lang['th']['title']; ?></th>
                                                            <th><?= $lang['th']['description']; ?></th>
                                                            <th><?= $lang['th']['date']; ?></th>
                                                            <th><?= $lang['th']['offers']; ?></th>
                                                            <th><?= $lang['th']['budget']; ?></th>
                                                            <th><?= $lang['th']['actions']; ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $get_requests = $db->select("buyer_requests", array("seller_id" => $login_seller_id, "request_status" => "pending"), "DESC");
                                                        $count_requests = $get_requests->rowCount();
                                                        while ($row_requests = $get_requests->fetch()) {
                                                            $request_id = $row_requests->request_id;
                                                            $request_title = $row_requests->request_title;
                                                            $request_description = $row_requests->request_description;
                                                            $request_date = $row_requests->request_date;
                                                            $request_budget = $row_requests->request_budget;
                                                        ?>
                                                            <tr>
                                                                <td> <?= $request_title; ?> </td>
                                                                <td>
                                                                    <?= $request_description; ?>
                                                                </td>
                                                                <td> <?= $request_date; ?> </td>
                                                                <td> 0</td>
                                                                <td class="text-success"> <?= showPrice($request_budget); ?> </td>
                                                                <td>
                                                                    <a href="<?=$site_url?>/requests/delete_request?request_id=<?= $request_id; ?>" class="btn btn-outline-danger">
                                                                        Delete
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                                <?php
                                                if ($count_requests == 0) {
                                                    echo "<center><h3 class='pt-4 pb-4'><i class='fa fa-smile-o'></i> {$lang['manage_requests']['no_pending']} </h3></center>";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div id="request_unapproved" class="tab-pane fade">
                                            <div class="table-responsive box-table">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th><?= $lang['th']['title']; ?></th>
                                                            <th><?= $lang['th']['description']; ?></th>
                                                            <th><?= $lang['th']['date']; ?></th>
                                                            <th><?= $lang['th']['offers']; ?></th>
                                                            <th><?= $lang['th']['budget']; ?></th>
                                                            <th><?= $lang['th']['actions']; ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $get_requests = $db->select("buyer_requests", array("seller_id" => $login_seller_id, "request_status" => "unapproved"), "DESC");
                                                        $count_requests = $get_requests->rowCount();
                                                        while ($row_requests = $get_requests->fetch()) {
                                                            $request_id = $row_requests->request_id;
                                                            $request_title = $row_requests->request_title;
                                                            $request_description = $row_requests->request_description;
                                                            $request_date = $row_requests->request_date;
                                                            $request_budget = $row_requests->request_budget;
                                                        ?>
                                                            <tr>
                                                                <td> <?= $request_title; ?> </td>
                                                                <td>
                                                                    <?= $request_description; ?>
                                                                </td>
                                                                <td><?= $request_date; ?> </td>
                                                                <td> 0</td>
                                                                <td class="text-success"> <?= showPrice($request_budget); ?> </td>
                                                                <td>
                                                                    <a href="<?=$site_url?>/requests/delete_request?request_id=<?= $request_id; ?>" class="btn btn-outline-danger">
                                                                        Delete
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                                <?php
                                                if ($count_requests == 0) {
                                                    echo "<center><h3 class='pt-4 pb-4'><i class='fa fa-smile-o'></i> {$lang['manage_requests']['no_unapproved']} </h3></center>";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Magage Request -->

                            <!-- Buyer Contacts -->
                            <div class="row">
                                <div class="col-md-12 mt-5 mb-3">
                                    <h1 class="<?= ($lang_dir == "right" ? 'text-right' : '') ?>"><?= $lang["titles"]["manage_contacts"]; ?></h1>
                                </div>
                                <div class="col-md-12">
                                    <?php include('buyer_contacts.php'); ?>
                                </div>
                            </div>
                            <!-- End Buyer Contacts -->

                            <!-- Recently Viewd Start -->
                            <div class="row">
                                <div class="col-md-12 mt-5 mb-3">
                                    <h1 class="pull-left"> <?= $lang['sidebar']['recently_viewed']; ?> </h1>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="row">
                                        <?php
                                        $select_recent = $db->query("select * from recent_proposals WHERE seller_id='$login_seller_id' AND EXISTS (SELECT * FROM proposals WHERE proposals.proposal_id = recent_proposals.proposal_id AND proposals.proposal_status='active') order by 1 DESC LIMIT 0,4");
                                        $count_recent = $select_recent->rowCount();
                                        if ($count_recent == 0) {
                                            // echo "<p class='text-muted'> <i class='fa fa-frown-o'></i> {$lang['sidebar']['no_recently_viewed']} </p>";
                                            echo "<center>
                                 <h3 class='pt-4 pb-4'>
                                    <i class='fa fa-meh-o'></i> {$lang['sidebar']['no_recently_viewed']}
                                 </h3>
                              </center>";
                                        } else {
                                        ?>
                                            <?php
                                            $i = 0;
                                            $select_recent = $db->query("select * from recent_proposals where seller_id='$login_seller_id' order by 1 DESC LIMIT 0,4");
                                            while ($row_recent = $select_recent->fetch()) {
                                                $proposal_id = $row_recent->proposal_id;
                                                $get_proposals = $db->query("select * from proposals where proposal_id='$proposal_id' AND proposal_status='active'");
                                                $count_proposals = $get_proposals->rowCount();
                                                if ($count_proposals == 1) {
                                                    $i++;
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
                                                    @$average_rating = $total / count($proposal_reviews);


                                                    $get_delivery = $db->select("instant_deliveries", ['proposal_id' => $proposal_id]);
                                                    $row_delivery = $get_delivery->fetch();
                                                    $enable_delivery = $row_delivery->enable;

                                                    if ($videoPlugin == 1) {
                                                        $proposal_videosettings = $db->select("proposal_videosettings", array('proposal_id' => $proposal_id))->fetch();
                                                        $enableVideo = $proposal_videosettings->enable;
                                                    } else {
                                                        $enableVideo = 0;
                                                    }
                                            ?>
                                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 mb-4">
                                                        <div class="card-box card">
                                                            <div class="subcategory">
                                                                <a href="proposals/<?= $seller_user_name; ?>/<?= $proposal_url; ?>">
                                                                    <picture class="card-img-top">
                                                                        <img class="rounded-0" src="<?= $proposal_img1; ?>">
                                                                    </picture>
                                                                </a>
                                                                <div class="card-body">
                                                                    <div class="d-flex">
                                                                        <div class="rounded-circle overflow-hidden d-flex justify-content-center align-items-center user-pic">
                                                                            <img src="<?= $seller_image; ?>" alt="" width="32" height="32">
                                                                        </div>
                                                                        <div class="px-3 d-flex justify-content-between w-100 align-items-center">
                                                                            <div class="">
                                                                                <a href="<?= $site_url; ?>/<?= $seller_user_name; ?>" class="seller-name">
                                                                                    <h5 class="card-title font-weight-bold mb-0"><?= $seller_user_name; ?></h5>
                                                                                </a>
                                                                                <!-- <small class="text-secondary">New Seller</small> -->
                                                                            </div>
                                                                            <!-- <div class="text-secondary">
                                                                              <i class="fa fa-heart"></i>
                                                                            </div> -->
                                                                        </div>
                                                                    </div>
                                                                    <p class="my-4">
                                                                        <?= truncate($proposal_title, 150); ?>
                                                                        <a href="<?= $site_url; ?>/<?= $seller_user_name; ?>" class="btn-link">
                                                                            Read more
                                                                        </a>
                                                                    </p>
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <div class="font-weight-bold text-info">
                                                                            <i class="fa fa-star"></i>
                                                                            <span><?php if ($proposal_rating == "0") {
                                                                                        echo "0.0";
                                                                                    } else {
                                                                                        printf("%.1f", $average_rating);
                                                                                    } ?></span>
                                                                            <span class="font-weight-normal text-secondary">(<?= $count_reviews; ?>)</span>
                                                                        </div>
                                                                        <div class="brand-logo">
                                                                            <?= $seller_level; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class=" d-flex justify-content-between align-items-center py-3 px-3 bt-xs-1 ">
                                                                    <ul class="list-inline mb-0">
                                                                        <li class="list-inline-item dropdown">
                                                                            <a id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="text-muted fa fa-bars"></a>
                                                                            <!-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                              <a class="dropdown-item" href="#">Action</a>
                                                                              <a class="dropdown-item" href="#">Another action</a>
                                                                              <a class="dropdown-item" href="#">Something else here</a>
                                                                            </div> -->
                                                                        </li>
                                                                        <!-- <li class="list-inline-item">
                                                                          <a class="text-muted fa fa-heart"></a>
                                                                        </li> -->
                                                                    </ul>
                                                                    <div>
                                                                        <span class="text-secondary">STARTING AT </span>
                                                                        <strong class="text-largest pl-2"><?= showPrice($proposal_price); ?></strong>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Recently Viewed End -->

                            <!-- Buy again Start -->
                            <div class="row">
                                <div class="col-md-12 mt-5 mb-3">
                                    <h1 class="pull-left"> Buy again from your favorite
                                        sellers </h1>
                                </div>

                                <?php include('buy_it_again.php'); ?>
                            </div>
                            <!-- Buy again End -->
                            <!-- Buyer Videos -->
                            <div class="row">
                                <div class="body-max-width px-3 py-5 home-section4">
                                    <div id="carouselExampleControls" class="carousel slide py-5" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <?php include('buyer_videos.php'); ?>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                            <span class="fa fa-chevron-left" aria-hidden="true">
                                            </span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                            <span class="fa fa-chevron-right" aria-hidden="true"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Seller Videos -->
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade <?= $activeTab == "seller" ? "show active" : "" ?>" id="Seller" role="tabpanel">
                    <div class="about-section-2 pt-5">
                        <div class="">
                            <div class="row">
                                <div class="alert alert-info col-xs-12">
                                    You have active membership <?php echo $planName; ?>
                                    <?php if (!$row_purchsed) {
                                        echo 'please <a href="membership_subs">upgrade</a> ';
                                    } ?></php>
                                </div>
                                <div class="col-xs-12">
                                    <div class="card rounded-0">
                                        <div class="card-body p-0">
                                            <div class="row pl-3 pr-3 pb-2 pt-2 mt-4">
                                                <div class="col-xs-4 text-center border-box">
                                                    <?php
                                                    $count_orders = $db->count("orders", array("seller_id" => $login_seller_id, "order_status" => 'completed'));
                                                    ?>
                                                    <a href="selling_orders">
                                                        <img width="" src="images/comp/completed.png" alt="completed">
                                                        <h5 class="text-muted pt-2"> <?= $lang["dashboard"]['orders_completed']; ?></h5>
                                                        <h3 class="text-success"><?= $count_orders; ?></h3>
                                                    </a>
                                                </div>
                                                <div class="col-xs-4 text-center border-box">
                                                    <?php
                                                    $count_orders = $db->count("orders", array("seller_id" => $login_seller_id, "order_active" => 'yes'));
                                                    ?>
                                                    <a href="selling_orders">
                                                        <img width="" src="images/comp/debt.png" alt="debt">
                                                        <h5 class="text-muted pt-2"> <?= $lang["dashboard"]['sales_in_queue']; ?></h5>
                                                        <h3 class="text-success"><?= $count_orders; ?></h3>
                                                    </a>
                                                </div>
                                                <div class="col-xs-4 text-center border-box">
                                                    <a href="revenue">
                                                        <img width="" src="images/comp/financial.png" alt="financial">
                                                        <h5 class="text-muted pt-2"> <?= $lang["dashboard"]['earnings']; ?> </h5>
                                                        <h3 class="text-success"><?= showPrice($month_earnings); ?></h3>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <br>
                                    <br>
                                    <h1 class="<?= ($lang_dir == "right" ? 'text-right' : '') ?>"><?= $lang["titles"]["selling_orders"]; ?></h1>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <?php include('user_selling_orders.php'); ?>
                                </div>
                            </div>
                            <!-- Buyer request -->
                            <div class="row buyer-requests">
                                <div class="col-md-12 mt-3">
                                    <h1 class="<?= ($lang_dir == "right" ? 'text-right' : '') ?>"><?= $lang["titles"]["buyer_requests"]; ?></h1>
                                </div>
                                <div class="col-md-12">
                                    <?php include('requests/user_buyer_requests.php'); ?>
                                </div>
                            </div>
                            <!-- End Buyer Request  -->
                            <!-- Proposal -->
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <h1 class="<?= ($lang_dir == "right" ? 'text-right' : '') ?>"><?= $lang["titles"]["view_proposals"]; ?></h1>
                                </div>
                                <div class="append-modal"></div>
                                <?php
                                $active = "active";
                                include('proposals/user_view_proposal.php');
                                ?>
                            </div>
                            <!-- End Proposal -->
                            <!-- Buyer Contacts -->
                            <div class="row">

                                <div class="col-md-12 mt-3">
                                    <h1 class="<?= ($lang_dir == "right" ? 'text-right' : '') ?>"><?= $lang["titles"]["manage_contacts"]; ?> </h1>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <?php include('seller_contacts.php'); ?>
                                </div>
                            </div>
                            <!-- End Buyer Contacts -->
                            <!-- Seller Videos -->
                            <div class="row">
                                <div class="body-max-width px-3 py-5 home-section4">
                                    <div id="carouselExampleControls" class="carousel slide py-5" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <?php include('seller_videos.php'); ?>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                            <span class="fa fa-chevron-left" aria-hidden="true">
                                            </span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                            <span class="fa fa-chevron-right" aria-hidden="true"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Seller Videos -->
                        </div>
                    </div>
                </div>
            </div>



        </div>

    </div>
</div>

<!-- Container ends -->
<br>
<div class="append-modal"></div>
<div id="featured-proposal-modal"></div>
<div id="quota-finish" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h5"><i class="fa fa-frown-o fa-move-up"></i> Request Quota Reached</h5>
                <button class="close" data-dismiss="modal"> &times;</button>
            </div>
            <div class="modal-body">
                <center>
                    <h5>You can only send a max of 10 offers per day. Today you've maxed out. Try again tomorrow. </h5>
                </center>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        // $(".carousel-indicators").css({"bottom": "75px"});

        var slider = $('#demo3').carousel({
            interval: 4000
        });

        var active = $(".carousel-item.active").find("video");
        var active_length = active.length;

        if (active_length == 1) {
            slider.carousel('pause');
            $(".carousel-indicators").css({
                "bottom": "75px"
            });
        }

        $("#demo3").on('slide.bs.carousel', function(event) {
            var eq = event.to;
            var video = $(event.relatedTarget).find("video");
            if (video.length == 1) {
                slider.carousel('pause');
                $(".carousel-indicators").css({
                    "bottom": "75px"
                });
                video.trigger('play');
            } else {
                $(".carousel-indicators").css({
                    "bottom": "20px"
                });
            }
        });

        $('video').on('ended', function() {
            slider.carousel({
                'pause': false
            });
        });

        $('#buyer_tab').on('click', function() {
            $('.seller_tab').addClass('hide');
            $('.buyer_tab').removeClass('hide');
            $('.seller_box').addClass('hide');
            $('.buyer_box').removeClass('hide');
        });
        $('#seller_tab').on('click', function() {
            $('.buyer_tab').addClass('hide');
            $('.seller_tab').removeClass('hide');
            $('.buyer_box').addClass('hide');
            $('.seller_box').removeClass('hide');
        });

    });
</script>