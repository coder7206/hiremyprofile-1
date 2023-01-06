<?php
$activetab = (isset($_GET['offers'])) ? 'offers' : "active";
$limit = 5; //isset($homePerPage) ? $homePerPage : 5;

$requests_query = $where_child_id = get_buyer_request_query($login_seller_id);
$relevant_requests = $row_general_settings->relevant_requests;
?>
<ul class="nav nav-tabs mt-3">
    <!-- nav nav-tabs Starts -->
    <li class="nav-item">
        <a href="#active-requests" data-toggle="tab" class="nav-link make-black <?= $activetab == "active" ? "active" : "" ?>">
            <?= $lang['tabs']['active2']; ?> <span class="badge badge-success" id="activeReqSpan">
                <?php
                // $i_requests = 0;
                // $i_send_offers = 0;
                // if ($relevant_requests == "no") {
                //     $requests_query = "";
                // }
                // if (isset($_SESSION['seller_user_name'])) {
                //     if (!empty($requests_query) or $relevant_requests == "no") {
                //         $get_requests = $db->query("select * from buyer_requests where request_status='active'" . $requests_query . " AND NOT seller_id='$login_seller_id' order by request_id DESC");
                //         $totalRequest = $get_requests->rowCount();
                //         while ($row_requets = $get_requests->fetch()) {
                //             $request_id = $row_requets->request_id;
                //             $count_offers = $db->count("send_offers", array("request_id" => $request_id, "sender_id" => $login_seller_id));
                //             if ($count_offers == 1) {
                //                 $i_send_offers++;
                //             }
                //             $i_requests++;
                //         }
                //     }
                // } else {
                //     $get_requests = $db->query("select * from buyer_requests where request_status='active'" . $requests_query . " order by request_id DESC");
                //     $totalRequest = $get_requests->rowCount();
                //     while ($row_requets = $get_requests->fetch()) {
                //         $request_id = $row_requets->request_id;
                //         $count_offers = $db->count("send_offers", array("request_id" => $request_id, "sender_id" => $login_seller_id));
                //         if ($count_offers == 1) {
                //             $i_send_offers++;
                //         }
                //         $i_requests++;
                //     }
                // }
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
            <?php // if (isset($_SESSION['seller_user_name']) && !(isset($homePerPage))) {
            ?>
            <select id="sub-category" class="form-control float-right sort-by mt-3 mb-3 mr-3">
                <option value="all"> All Subcategories</option>
                <?php
                if (!empty($where_child_id)) {
                    $get_c_cats = $db->query("SELECT * FROM categories_children WHERE {$where_child_id}");
                    while ($row_c_cats = $get_c_cats->fetch()) {
                        $child_id = $row_c_cats->child_id;
                        $get_meta = $db->select("child_cats_meta", array("child_id" => $child_id, "language_id" => $siteLanguage));
                        $row_meta = $get_meta->fetch();
                        $child_title = $row_meta->child_title;
                        echo "<option value='$child_id'> $child_title </option>";
                    }
                }
                ?>
            </select>
            <?php // }
            ?>
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
            <table class="table table-bordered" id="offerSentTbl">
                <thead>
                    <tr>
                        <th>Request</th>
                        <th>Duration</th>
                        <th>Price</th>
                        <th>Your Request</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-info">
                        <td colspan="4">
                            data fetching...
                        </td>
                    </tr>
                </tbody>
            </table>
            <nav id="pagination-buyer-offer-sent" aria-label="buyer offer send navigation">
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
            var cat_id = $("#sub-category option:selected").val();
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
            var sentId = $(this).data('send-id')
            if (sentId == 0) {
                $('#quota-finish').modal()
            } else {
                $.ajax({
                        method: "POST",
                        url: "<?= $site_url ?>/requests/send_offer_modal",
                        data: {
                            request_id: sentId
                        }
                    })
                    .done(function(data) {
                        $(".append-modal").html(data);
                    });
            }
        });

        var buyerOfferSent = function(userId, limit, page = 1) {
            return $.ajax({
                url: "<?= $site_url ?>/ajax/offer_sent",
                dataType: "json",
                method: "POST",
                data: {
                    user_id: userId,
                    limit,
                    page,
                }
            }).done(function(data) {
                $('body #offerSentTbl tbody').html(data.data);
                $('body #pagination-buyer-offer-sent').html(data.pagination);
                $('body #wait').removeClass("loader");
            });
        }
        buyerOfferSent(<?= $login_seller_id ?>, 5);

        //executes code below when user click on pagination links
        $("body #pagination-buyer-offer-sent").on("click", ".pagination a", function(e) {
            e.preventDefault();
            var page = $(this).attr("data-page"); //get page number from link
            $('body #wait').addClass("loader");
            buyerOfferSent(<?= $login_seller_id ?>, 5, page);
        })

        $('#sub-category').change(function() {
            var child_id = $(this).val();
            $('body #wait').addClass("loader");
            buyerReqs(<?= $login_seller_id ?>, child_id, 5);
        });

        $('#req-search').click(function(e) {
            e.preventDefault();

            var search = $("#search-input").val();
            $('body #wait').addClass("loader");
            var cat_id = $("#sub-category option:selected").val();
            buyerReqs(<?= $login_seller_id ?>, cat_id, 5, 1, search);
        });
    })
</script>