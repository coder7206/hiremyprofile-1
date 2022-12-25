<?php

$isAjax = 'xmlhttprequest' == strtolower($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '');
if (!$isAjax)
    die("No direct access.");

require_once("../includes/db.php");

//Get page number from Ajax POST
if (isset($_REQUEST["page"])) {
    $pageNumber = filter_var($_REQUEST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if (!is_numeric($pageNumber)) {
        die('Invalid page number!');
    } //incase of invalid page number
} else {
    $pageNumber = 1; //if there's no page number, set it to 1
}

$limit = isset($_REQUEST['limit']) ? $_REQUEST['limit'] : 10;
$buyerId = $_REQUEST['user_id'];
$status = $_REQUEST['status'];

$statusArray = ['active', 'delivered', 'completed', 'cancelled'];
$noResult = "No records";
//get starting position to fetch the records
$pagePosition = (($pageNumber - 1) * $limit);

if (in_array($status, $statusArray)) {
    if ($status == 'yes') {
        $spQuery = "SELECT * FROM orders WHERE buyer_id=:buyer_id  AND order_active=:order_active";
        echo $sQuery = "SELECT * FROM orders WHERE buyer_id=:buyer_id  AND order_active=:order_active LIMIT " . $pagePosition . ", " . $limit;
        $sBind = ["buyer_id" => $buyerId, "order_active" => $status];
        $noResult = $lang['buying_orders']['no_active'];
    } else {
        $spQuery = "SELECT * FROM orders WHERE buyer_id=:buyer_id  AND order_status=:order_status";
        $sQuery = "SELECT * FROM orders WHERE buyer_id=:buyer_id  AND order_status=:order_status LIMIT " . $pagePosition . ", " . $limit;
        $sBind = ["buyer_id" => $buyerId, "order_status" => $status];
        $noResult = $status == 'delivered' ? $lang['buying_orders']['no_delivered'] : ($status == 'completed' ? $lang['buying_orders']['no_completed'] : ($status == 'cancelled' ? $lang['buying_orders']['no_cancelled'] : ''));
    }
} else {
    $spQuery = "SELECT * FROM orders WHERE buyer_id=:buyer_id";
    $sQuery = "SELECT * FROM orders WHERE buyer_id=:buyer_id LIMIT " . $pagePosition . ", " . $limit;
    $sBind = ["buyer_id" => $buyerId];
    $noResult = $lang['buying_orders']['no_all'];
}

//get total number of records from database for pagination
$query = $db->query($spQuery, $sBind);
$rowCount = $query->rowCount();
$data = $query->fetch();

//break records into pages
$totalPages = ceil($rowCount / $limit);

//Limit our results within a specified range.
$query = $db->query($sQuery, $sBind);

if ($rowCount > 0) {

    //Display records fetched from database.
    $data = "";
    while ($oResult = $query->fetch()) { //fetch values
        $order_id = $oResult->order_id;
        $proposal_id = $oResult->proposal_id;
        $order_price = $oResult->order_price;
        $order_status = $oResult->order_status;
        $order_number = $oResult->order_number;
        $order_duration = substr($oResult->order_duration, 0, 1);
        $order_date = $oResult->order_date;
        $order_due = date("F d, Y", strtotime($order_date . " + $order_duration days"));

        $select_proposals = $db->select("proposals", array("proposal_id" => $proposal_id));
        $row_proposals = $select_proposals->fetch();
        $proposal_title = $row_proposals->proposal_title;

        $proposal_img1 = getImageUrl2("proposals", "proposal_img1", $row_proposals->proposal_img1);
        $data .= "<tr>";
        $data .= "<td>";
        $data .= "<a href='" . $site_url . "/order_details?order_id=" . $order_id . "' class='make-black'>
        <img class='order-proposal-image' src='" . $proposal_img1 . "'>
        <p class='order-proposal-title'>" . $proposal_title . "</p>
        </a>";
        $data .= "</td>";
        $data .= "<td>" . $order_date . "</td>";
        $data .= "<td>" . $order_due . "</td>";
        $data .= "<td>" . showPrice($order_price) . "</td>";
        $data .= "<td><button class='btn btn-success'>" . ucwords($order_status) . "</button></td>";
        $data .= "</tr>";
    }

    /* We call the pagination function here to generate Pagination link for us.
As you can see I have passed several parameters to the function. */
    $paginationData = paginate($limit, $pageNumber, $rowCount, $totalPages);
} else {
    $data = "
    <tr class='table-danger'>
        <td colspan='5'><center><h3 class='pb-4 pt-4'><i class='fa fa-meh-o'></i> {$noResult}</h3></center></td>
    </tr>
    ";
    $paginationData = null;
}

echo json_encode(["data" => $data, "pagination" => $paginationData]);
exit;


function paginate($itemPerPage, $currentPage, $totalRecords, $totalPages)
{
    $pagination = '';
    if ($totalPages > 0 && $totalPages != 1 && $currentPage <= $totalPages) { //verify total pages and current page number
        $pagination .= '<ul class="pagination justify-content-center">';

        $right_links = $currentPage + 3;
        $previous = $currentPage - 3; //previous link
        $nex = $currentPage + 1; //next link
        $first_link = true; //boolean var to decide our first link

        if ($currentPage > 1) {
            $previous_link = ($previous == 0) ? 1 : $previous;
            $pagination .= '<li class="page-item first"><a class="page-link" href="#" data-page="1" title="First">&laquo;</a></li>'; //first link
            $pagination .= '<li class="page-item"><a class="page-link" href="#" data-page="' . abs($previous_link) . '" title="Previous">&lt;</a></li>'; //previous link
            for ($i = ($currentPage - 2); $i < $currentPage; $i++) { //Create left-hand side links
                if ($i > 0) {
                    $pagination .= '<li class="page-item"><a class="page-link" href="#" data-page="' . $i . '" title="Page' . $i . '">' . $i . '</a></li>';
                }
            }
            $first_link = false; //set first link to false
        }

        if ($first_link) { //if current active page is first link
            $pagination .= '<li class="page-item first active disabled"><a class="page-link" href="#">' . $currentPage . '<span class="sr-only">(current)</span></li>';
        } elseif ($currentPage == $totalPages) { //if it's the last active link
            $pagination .= '<li class="page-item last active disabled"><a class="page-link" href="#">' . $currentPage . '<span class="sr-only">(current)</span></li>';
        } else { //regular current link
            $pagination .= '<li class="page-item active disabled"><a class="page-link" href="#">' . $currentPage . '</a></li>';
        }

        for ($i = $currentPage + 1; $i < $right_links; $i++) { //create right-hand side links
            if ($i <= $totalPages) {
                $pagination .= '<li class="page-item"><a class="page-link" href="#" data-page="' . $i . '" title="Page ' . $i . '">' . $i . '</a></li>';
            }
        }
        if ($currentPage < $totalPages) {
            $next_link = ($i > $totalPages) ? $totalPages : $i;
            $pagination .= '<li class="page-item"><a class="page-link" href="#" data-page="' . $next_link . '" title="Next">&gt;</a></li>'; //next link
            $pagination .= '<li class="page-item last"><a class="page-link" href="#" data-page="' . $totalPages . '" title="Last">&raquo;</a></li>'; //last link
        }

        $pagination .= '</ul>';
    }
    return $pagination; //return pagination links
}
