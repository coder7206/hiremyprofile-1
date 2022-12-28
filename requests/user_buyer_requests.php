<?php
$activetab = (isset($_GET['offers'])) ? 'offers' : "active";
$limit = 5; //isset($homePerPage) ? $homePerPage : 5;
?>
<ul class="nav nav-tabs mt-3">
    <!-- nav nav-tabs Starts -->
    <li class="nav-item">
        <a href="#active-requests" data-toggle="tab" class="nav-link make-black <?= $activetab == "active" ? "active" : "" ?>">
            <?= $lang['tabs']['active2']; ?> <span class="badge badge-success">
                <?php
                $i_requests = 0;
                $i_send_offers = 0;
                if ($relevant_requests == "no") {
                    $requests_query = "";
                }
                if (isset($_SESSION['seller_user_name'])) {
                    if (!empty($requests_query) or $relevant_requests == "no") {
                        $get_requests = $db->query("select * from buyer_requests where request_status='active'" . $requests_query . " AND NOT seller_id='$login_seller_id' order by request_id DESC");
                        while ($row_requets = $get_requests->fetch()) {
                            $request_id = $row_requets->request_id;
                            $count_offers = $db->count("send_offers", array("request_id" => $request_id, "sender_id" => $login_seller_id));
                            if ($count_offers == 1) {
                                $i_send_offers++;
                            }
                            $i_requests++;
                        }
                    }
                } else {
                    $get_requests = $db->query("select * from buyer_requests where request_status='active'" . $requests_query . " order by request_id DESC");
                    while ($row_requets = $get_requests->fetch()) {
                        $request_id = $row_requets->request_id;
                        $count_offers = $db->count("send_offers", array("request_id" => $request_id, "sender_id" => $login_seller_id));
                        if ($count_offers == 1) {
                            $i_send_offers++;
                        }
                        $i_requests++;
                    }
                }
                ?>
                <?= $i_requests - $i_send_offers; ?>
            </span>
        </a>
    </li>
    <?php $count_offers = $db->count("send_offers", array("sender_id" => $login_seller_id)); ?>
    <?php
    if (isset($_SESSION['seller_user_name'])) {
    ?>
        <li class="nav-item">
            <a href="#sent-offers" data-toggle="tab" class="nav-link make-black <?= $activetab == "offers" ? "active" : "" ?>">
                <?= $lang['tabs']['offers_sent']; ?> <span class="badge badge-success"> <?= $count_offers; ?> </span>
            </a>
        </li>
    <?php } ?>
</ul>
<div class="tab-content mt-4">
    <div id="active-requests" class="tab-pane fade <?= $activetab == "active" ? "show active" : "" ?>">
        <div class="table-responsive box-table">
            <h3 class="float-left ml-2 mt-3 mb-3"> Buyer Requests </h3>
            <?php if (isset($_SESSION['seller_user_name']) && !(isset($homePerPage))) { ?>
                <select id="sub-category" class="form-control float-right sort-by mt-3 mb-3 mr-3">
                    <option value="all"> All Subcategories</option>
                    <?php
                    if (count($where_child_id) > 0) {
                        $get_c_cats = $db->query("select * from categories_children where " . $child_cats_query);
                        while ($row_c_cats = @$get_c_cats->fetch()) {
                            $child_id = $row_c_cats->child_id;
                            $get_meta = $db->select("child_cats_meta", array("child_id" => $child_id, "language_id" => $siteLanguage));
                            $row_meta = $get_meta->fetch();
                            $child_title = $row_meta->child_title;
                            echo "<option value='$child_id'> $child_title </option>";
                        }
                    }
                    ?>
                </select>
            <?php } ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Request</th>
                        <th>Offers</th>
                        <th>Date</th>
                        <th>Duration</th>
                        <th>Budget</th>
                    </tr>
                </thead>
                <tbody id="load-data">
                    <?php
                    if (isset($_GET["page"]) && $activetab == "active") {
                        $dPageNumber = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
                        if (!is_numeric($dPageNumber)) {
                            die('Invalid page number!');
                        } //incase of invalid page number
                    } else {
                        $dPageNumber = 1; //if there's no page number, set it to 1
                    }

                    $start_from =  (($dPageNumber - 1) * $limit);
                    $where_limit = " order by 1 DESC LIMIT $start_from, $limit";

                    if (!isset($_SESSION['seller_user_name']) or (!empty($requests_query) or $relevant_requests == "no")) {
                        $q_page =  $db->query("SELECT * FROM buyer_requests WHERE request_status=:request_status " . $requests_query . " AND NOT seller_id=:seller_id", array("request_status" => "active", "seller_id" => $login_seller_id));

                        $totalDRows = $q_page->rowCount();

                        //break records into pages
                        $totalDPages = ceil($totalDRows / $limit);
                        if ($totalDRows > 0) {
                            $select_requests =  $db->query("SELECT * FROM buyer_requests WHERE request_status=:request_status " . $requests_query . " AND NOT seller_id=:seller_id $where_limit", array("request_status" => 'active', "seller_id" => $login_seller_id));

                            while ($row_requests = $select_requests->fetch()) {
                                $request_id = $row_requests->request_id;
                                $seller_id = $row_requests->seller_id;
                                $cat_id = $row_requests->cat_id;
                                $child_id = $row_requests->child_id;
                                $request_title = $row_requests->request_title;
                                $request_description = $row_requests->request_description;
                                $delivery_time = $row_requests->delivery_time;
                                $request_budget = $row_requests->request_budget;
                                $request_file = $row_requests->request_file;
                                $request_date = $row_requests->request_date;
                                $get_meta = $db->select("cats_meta", array("cat_id" => $cat_id, "language_id" => $siteLanguage));
                                $row_meta = $get_meta->fetch();
                                $cat_title = $row_meta->cat_title;
                                $get_meta = $db->select("child_cats_meta", array("child_id" => $child_id, "language_id" => $siteLanguage));
                                $row_meta = $get_meta->fetch();
                                $child_title = $row_meta->child_title;

                                $select_request_seller = $db->select("sellers", array("seller_id" => $seller_id));
                                $row_request_seller = $select_request_seller->fetch();
                                $request_seller_user_name = $row_request_seller->seller_user_name;
                                $request_seller_image = getImageUrl2("sellers", "seller_image", $row_request_seller->seller_image);

                                $count_send_offers = $db->count("send_offers", array("request_id" => $request_id));
                                $count_offers = $db->count("send_offers", array("request_id" => $request_id, "sender_id" => $login_seller_id));

                                if ($count_offers == 0) {
                    ?>
                                    <tr id="request_tr_<?= $request_id; ?>">
                                        <td>
                                            <a href="../<?= $request_seller_user_name; ?>">
                                                <?php if (!empty($request_seller_image)) { ?>
                                                    <img src="<?= $request_seller_image; ?>" class="request-img rounded-circle">
                                                <?php } else { ?>
                                                    <img src="../user_images/empty-image.png" class="request-img rounded-circle">
                                                <?php } ?>
                                            </a>
                                            <div class="request-description">

                                                <h6>
                                                    <a href="../<?= $request_seller_user_name; ?>"><?= $request_seller_user_name; ?></a>
                                                </h6>

                                                <h5 class="text-success"> <?= $request_title; ?> </h5>
                                                <p class="lead mb-2"> <?= $request_description; ?> </p>
                                                <?php if (!empty($request_file)) { ?>
                                                    <a href="<?= getImageUrl("buyer_requests", $request_file); ?>" download>
                                                        <i class="fa fa-arrow-circle-down"></i> <?= $request_file; ?>
                                                    </a>
                                                <?php } ?>
                                                <ul class="request-category">
                                                    <li> <?= $cat_title; ?> </li>
                                                    <li> <?= $child_title; ?> </li>
                                                </ul>
                                                <p><a class="text-danger <?=($lang_dir == "right" ? 'text-right':'')?>" href="#" data-toggle="modal" data-target="#report-modal-uni" data-content-id="<?=$request_id?>" data-content-type="buyer_requests" data-url="<?=$site_url?>/requests/buyer_requests"><svg viewBox="0 0 24 24" role="presentation" aria-hidden="true" focusable="false" style="height:12px;width:12px;fill:#000;margin-right:5px;"><path d="m22.39 5.8-.27-.64a207.86 207.86 0 0 0 -2.17-4.87.5.5 0 0 0 -.84-.11 7.23 7.23 0 0 1 -.41.44c-.34.34-.72.67-1.13.99-1.17.87-2.38 1.39-3.57 1.39-1.21 0-2-.13-3.31-.48l-.4-.11c-1.1-.29-1.82-.41-2.79-.41a6.35 6.35 0 0 0 -1.19.12c-.87.17-1.79.49-2.72.93-.48.23-.93.47-1.35.71l-.11.07-.17-.49a.5.5 0 1 0 -.94.33l7 20a .5.5 0 0 0 .94-.33l-2.99-8.53a21.75 21.75 0 0 1 1.77-.84c.73-.31 1.44-.56 2.1-.72.61-.16 1.16-.24 1.64-.24.87 0 1.52.11 2.54.38l.4.11c1.39.37 2.26.52 3.57.52 2.85 0 5.29-1.79 5.97-3.84a.5.5 0 0 0 0-.32c-.32-.97-.87-2.36-1.58-4.04zm-4.39 7.2c-1.21 0-2-.13-3.31-.48l-.4-.11c-1.1-.29-1.82-.41-2.79-.41-.57 0-1.2.09-1.89.27a16.01 16.01 0 0 0 -2.24.77c-.53.22-1.04.46-1.51.7l-.21.11-3.17-9.06c.08-.05.17-.1.28-.17.39-.23.82-.46 1.27-.67.86-.4 1.7-.7 2.48-.85.35-.06.68-.1.99-.1.87 0 1.52.11 2.54.38l.4.11c1.38.36 2.25.51 3.56.51 1.44 0 2.85-.6 4.18-1.6.43-.33.83-.67 1.18-1.02a227.9 227.9 0 0 1 1.85 4.18l.27.63c.67 1.57 1.17 2.86 1.49 3.79-.62 1.6-2.62 3.02-4.97 3.02z" fill-rule="evenodd"></path></svg> Report Job</a></p>
                                            </div>
                                        </td>
                                        <td><?= $count_send_offers; ?></td>
                                        <td> <?= $request_date; ?> </td>
                                        <td>
                                            <?= $delivery_time; ?>
                                            <a href="#" class="remove-link text-danger remove_request_<?= $request_id; ?>">
                                                Remove Request </a>
                                        </td>
                                        <td class="text-success font-weight-bold">
                                            <?php if (!empty($request_budget)) { ?>
                                                <?= showPrice($request_budget); ?>
                                            <?php } else { ?> ----- <?php } ?>
                                            <br>
                                            <?php if ($login_seller_offers == "0") { ?>
                                                <button class="btn btn-success btn-sm mt-4 send_button_<?= $request_id; ?>" data-toggle="modal" data-target="#quota-finish"><?= $lang['button']['send_offer']; ?></button>
                                            <?php } else { ?>
                                                <button class="btn btn-success btn-sm mt-4 send_button_<?= $request_id; ?>"><?= $lang['button']['send_offer']; ?></button>
                                            <?php } ?>
                                        </td>
                                        <script>
                                            $(".remove_request_<?= $request_id; ?>").click(function(event) {
                                                event.preventDefault();
                                                if (confirm('Are you sure want to remove this?')) {
                                                    $("#request_tr_<?= $request_id; ?>").fadeOut().remove();
                                                }
                                            });
                                            <?php if ($login_seller_offers == "0") { ?>
                                            <?php } else { ?>
                                                $(".send_button_<?= $request_id; ?>").click(function() {
                                                    request_id = "<?= $request_id; ?>";
                                                    $.ajax({
                                                            method: "POST",
                                                            url: "send_offer_modal",
                                                            data: {
                                                                request_id: request_id
                                                            }
                                                        })
                                                        .done(function(data) {
                                                            $(".append-modal").html(data);
                                                        });
                                                });
                                            <?php } ?>
                                        </script>
                                    </tr>
                                <?php
                                } //count_offers
                            } // while
                        } // totalrows
                        $q_prop_count = $db->query("SELECT * FROM `proposals` where proposal_seller_id ='$login_seller_id' and proposal_status='active'");
                        $o_prop_count = $q_prop_count->rowCount();
                        // echo "<pre>"; print_r($o_prop_count);
                        if ($totalDRows == 0) {
                            if ($o_prop_count < 2) {
                                ?>
                                <tr class="table-danger">
                                    <td colspan="5">
                                        <center>
                                            <h3 class='pb-4 pt-4'>
                                                <i class='fa fa-meh-o'></i> Please create a proposal in order to find relevant job. <a href="<?= $site_url ?>/requests/post_request">Click here</a> to create proposal
                                            </h3>
                                        </center>
                                    </td>
                                </tr>
                            <?php } else { ?>
                                <tr class="table-danger">
                                    <td colspan="5">
                                        <center>
                                            <h3 class='pb-4 pt-4'>
                                                <i class='fa fa-frown-o'></i> No requests that matches any of your proposals/services yet!.
                                            </h3>
                                        </center>
                                    </td>
                                </tr>
                    <?php
                            }
                        }
                    } ?>
                </tbody>
            </table>
            <nav id="pagination-buyer-req" aria-label="Active request navigation">
                <?= pagination($limit, $dPageNumber, $totalDRows, $totalDPages, $site_url . "/requests/buyer_requests?page=") ?>
            </nav>
        </div>
    </div>
    <div id="sent-offers" class="tab-pane fade <?= $activetab == "offers" ? "show active" : "" ?>">
        <div class="table-responsive box-table">
            <h3 class="ml-2 mt-3 mb-3"> OFFERS SUBMITTED </h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Request</th>
                        <th>Duration</th>
                        <th>Price</th>
                        <th>Your Request</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET["page"]) && $activetab == "offer") {
                        $dPageNumber = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
                        if (!is_numeric($dPageNumber)) {
                            die('Invalid page number!');
                        } //incase of invalid page number
                    } else {
                        $dPageNumber = 1; //if there's no page number, set it to 1
                    }

                    $start_from =  (($dPageNumber - 1) * $limit);
                    $where_limit = " order by 1 DESC LIMIT $start_from, $limit";

                    $q_page =  $db->query("SELECT * FROM send_offers WHERE sender_id=:sender_id", array("sender_id" => $login_seller_id));
                    $totalDRows = $q_page->rowCount();

                    //break records into pages
                    $totalDPages = ceil($totalDRows / $limit);
                    if ($totalDRows > 0) {
                        $select_offers =  $db->query("SELECT * FROM send_offers WHERE sender_id=:sender_id $where_limit", array("sender_id" => $login_seller_id));

                        while ($row_offers = $select_offers->fetch()) {
                            $request_id = $row_offers->request_id;
                            $proposal_id = $row_offers->proposal_id;
                            $description = $row_offers->description;
                            $delivery_time = $row_offers->delivery_time;
                            $amount = $row_offers->amount;

                            $select_proposals = $db->select("proposals", array("proposal_id" => $proposal_id));
                            $row_proposals = $select_proposals->fetch();
                            $proposal_title = @$row_proposals->proposal_title;

                            $get_requests = $db->select("buyer_requests", array("request_id" => $request_id));
                            $row_requests = $get_requests->fetch();
                            $request_id = $row_requests->request_id;
                            $seller_id = $row_requests->seller_id;
                            $cat_id = $row_requests->cat_id;
                            $child_id = $row_requests->child_id;
                            $request_title = $row_requests->request_title;
                            $request_description = $row_requests->request_description;

                            $get_meta = $db->select("cats_meta", array("cat_id" => $cat_id, "language_id" => $siteLanguage));
                            $row_meta = $get_meta->fetch();
                            $cat_title = $row_meta->cat_title;

                            $get_meta = $db->select("child_cats_meta", array("child_id" => $child_id, "language_id" => $siteLanguage));
                            $row_meta = $get_meta->fetch();
                            $child_title = $row_meta->child_title;

                            $select_request_seller = $db->select("sellers", array("seller_id" => $seller_id));
                            $row_request_seller = $select_request_seller->fetch();
                            $request_seller_user_name = $row_request_seller->seller_user_name;
                            $request_seller_image = getImageUrl2("sellers", "seller_image", $row_request_seller->seller_image);

                    ?>
                            <tr>
                                <td>
                                    <?php if (!empty($request_seller_image)) { ?>
                                        <img src="<?= $request_seller_image; ?>" class="request-img rounded-circle mt-0 contact-image">
                                    <?php } else { ?>
                                        <img src="../user_images/empty-image.png" class="request-img rounded-circle mt-0 contact-image">
                                    <?php } ?>
                                    <div class="request-description">
                                        <h6> <?= $request_seller_user_name; ?> </h6>
                                        <h5 class="text-success"> <?= $request_title; ?> </h5>
                                        <p class="lead mb-2"> <?= $request_description; ?> </p>
                                        <?php if (!empty($request_file)) { ?>
                                            <a href="<?= getImageUrl("buyer_requests", $request_file); ?>" download>
                                                <i class="fa fa-arrow-circle-down"></i> <?= $request_file; ?>
                                            </a>
                                        <?php } ?>
                                        <ul class="request-category">
                                            <li> <?= $cat_title; ?> </li>
                                            <li> <?= $child_title; ?> </li>
                                        </ul>
                                    </div>
                                </td>
                                <td> <?= $delivery_time; ?> </td>
                                <td> <?= $s_currency; ?><?= $amount; ?> </td>
                                <td>
                                    <strong> <?= $proposal_title; ?></strong>
                                    <p><br>
                                        <?= $description; ?>
                                    </p>
                                </td>
                            </tr>
                        <?php }
                    } else {
                        ?>
                        <tr class="table-danger">
                            <td colspan="5">
                                <center>
                                    <h3 class='pb-4 pt-4'>
                                        <i class='fa fa-meh-o'></i> You've sent no offers yet!
                                    </h3>
                                </center>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <nav id="pagination-offer-sent" aria-label="modification proposals navigation">
                <?= pagination($limit, $dPageNumber, $totalDRows, $totalDPages, $site_url . "/requests/buyer_requests?offers&page="); ?>
            </nav>
        </div>
    </div>
</div>