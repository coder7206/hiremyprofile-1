<?php
$activetab = (isset($_GET['offers'])) ? 'offers' : "active";
$limit = 5; //isset($homePerPage) ? $homePerPage : 5;
?>
<ul class="nav nav-tabs mt-3">
    <!-- nav nav-tabs Starts -->
    <li class="nav-item">
        <a href="#active-requests" data-toggle="tab" class="nav-link make-black <?= $activetab == "active" ? "active" : "" ?>">
            <?= $lang['tabs']['active2']; ?> <span class="badge badge-success" id="activeReqSpan">
                <?php
                $i_requests = 0;
                $i_send_offers = 0;
                if ($relevant_requests == "no") {
                    $requests_query = "";
                }
                if (isset($_SESSION['seller_user_name'])) {
                    if (!empty($requests_query) or $relevant_requests == "no") {
                        $get_requests = $db->query("select * from buyer_requests where request_status='active'" . $requests_query . " AND NOT seller_id='$login_seller_id' order by request_id DESC");
                        $totalRequest = $get_requests->rowCount();
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
                    $totalRequest = $get_requests->rowCount();
                    while ($row_requets = $get_requests->fetch()) {
                        $request_id = $row_requets->request_id;
                        $count_offers = $db->count("send_offers", array("request_id" => $request_id, "sender_id" => $login_seller_id));
                        if ($count_offers == 1) {
                            $i_send_offers++;
                        }
                        $i_requests++;
                    }
                }
                // echo $i_requests - $i_send_offers;
                echo  "0";
                ?>
            </span>
        </a>
    </li>
    <?php
    $count_offers = $db->count("send_offers", array("sender_id" => $login_seller_id));
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
            <?php // if (isset($_SESSION['seller_user_name']) && !(isset($homePerPage))) { ?>
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
            <?php // } ?>
            <table class="table table-bordered" id="buyerRequestsTbl">
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
                    <tr class="table-info">
                        <td colspan="5">
                            data fetching...
                        </td>
                    </tr>
                </tbody>
            </table>
            <nav id="pagination-buyer-requests-ajax" aria-label="Active request navigation">
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

<script type="text/javascript">
    $(document).ready(function() {
        var buyerReqs = function(userId, catId, limit, page = 1, search = null) {
            return $.ajax({
                url: "<?= $site_url ?>/requests/load_category_data",
                dataType: "json",
                method: "POST",
                data: {
                    user_id: userId,
                    child_id: catId,
                    limit,
                    page,
                    search,
                }
            }).done(function(data) {
                $('body #buyerRequestsTbl tbody').html(data.data);
                $('body #pagination-buyer-requests-ajax').html(data.pagination);
                $('body #activeReqSpan').html(data.total);
                $('body #wait').removeClass("loader");
            });
        }
        buyerReqs(<?= $login_seller_id ?>, 'all', 5);

        //executes code below when user click on pagination links
        $("body #pagination-buyer-requests-ajax").on("click", ".pagination a", function(e) {
            e.preventDefault();
            var page = $(this).attr("data-page"); //get page number from link
            $('body #wait').addClass("loader");
            var cat_id =  $("#sub-category option:selected").val();
            var search = $("#search-input").val();
            buyerReqs(<?= $login_seller_id ?>, cat_id, 5, page, search);
        })

        $(document).on("click", '.remove_request', function(event) {
            event.preventDefault();
            if (confirm('Are are you sure want to remove this?')) {
                var id = $(this).data('remove-id');
                $("#request_tr_" + id).fadeOut().remove();
            }
        });
        $(document).on("click", '.send_button', function(event) {
            event.preventDefault();
            $('#quota-finish').modal()
        });

        $('#sub-category').change(function() {
            var child_id = $(this).val();
            $('body #wait').addClass("loader");
            buyerReqs(<?= $login_seller_id ?>, child_id, 5);
        });

        $('#req-search').click(function(e) {
            e.preventDefault();

            var search = $("#search-input").val();
            $('body #wait').addClass("loader");
            var cat_id =  $("#sub-category option:selected").val();
            buyerReqs(<?= $login_seller_id ?>, cat_id, 5, 1, search);
        });
    })
</script>