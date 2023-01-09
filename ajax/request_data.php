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
$sellerId = $_REQUEST['user_id'];
$status = $_REQUEST['status'];

//get starting position to fetch the records
$pagePosition = (($pageNumber - 1) * $limit);

$spQuery = "SELECT * FROM buyer_requests WHERE seller_id=:seller_id  AND request_status=:request_status";
$sQuery = "SELECT * FROM buyer_requests WHERE seller_id=:seller_id  AND request_status=:request_status LIMIT " . $pagePosition . ", " . $limit;
$sBind = ["seller_id" => $sellerId, "request_status" => $status];
$noResult = $status == 'active' ? $lang['manage_requests']['no_active'] :
    ($status == 'pause' ? $lang['manage_requests']['no_pause'] :
        ($status == 'pending' ? $lang['manage_requests']['no_pending'] :
            ( $status == 'unapproved'  ? $lang['manage_requests']['no_unapproved'] :
                ( $status == 'modification'  ? $lang['manage_requests']['no_modification'] : ''))));

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
    if ($status == 'modification') {
        while ($oResult = $query->fetch()) { //fetch values
            $request_id = $oResult->request_id;
            $request_title = $oResult->request_title;

            $select_modification = $db->select("request_modifications", array("request_id" => $request_id));
            $row_modification = $select_modification->fetch();
            $modification_message = $row_modification->modification_message;

            $data .= "<tr>";
            $data .= "<td>" . $request_title . "</td>";
            $data .= "<td>" . $modification_message . "</td>";
            $data .= '<td class="text-center">
                <div class="dropdown">
                <button class="btn btn-success dropdown-toggle" data-toggle="dropdown"></button>
                <div class="dropdown-menu">';
            $data .= '<a href="' . $site_url . '/requests/active_request?request_id=' .$request_id .'" class="dropdown-item">
            Submit for Approval
                </a>';
            $data .= '<a href="' . $site_url . '/requests/edit_request?request_id=' .$request_id .'" class="dropdown-item">
                Edit
                    </a>';
            $confirm = 'Are you sure to delete this request?';
            $data .= '<a href="' . $site_url . '/requests/delete_request?request_id=' . $request_id .'" class="dropdown-item" onclick="return confirm(\'Are you sure you want to delete?\');">
                        Delete
                    </a>';
            $data .= '</div>
            </div>
        </td>';
            $data .= "</tr>";

        }
    } else {
        while ($oResult = $query->fetch()) { //fetch values
            $request_id = $oResult->request_id;
            $request_title = $oResult->request_title;
            $request_description = $oResult->request_description;
            $request_date = $oResult->request_date;
            $request_budget = $oResult->request_budget;
            $count_offers = $db->count("send_offers", array("request_id" => $request_id, "status" => 'active'));
            $data .= "<tr>";
            $data .= "<td>" . $request_title . "</td>";
            $data .= "<td>" . $request_description . "</td>";
            $data .= "<td>" . $request_date . "</td>";
            $data .= "<td>" . $count_offers . "</td>";
            $data .= "<td class='text-success'>" . showPrice($request_budget) . "</td>";
            $data .= '<td class="text-center">
                <div class="dropdown">
                <button class="btn btn-success dropdown-toggle" data-toggle="dropdown"></button>
                <div class="dropdown-menu">';
            if ($status == 'active') {
                $data .= '<a href="' . $site_url . '/requests/view_offers?request_id=' .$request_id .'" target="blank" class="dropdown-item">View Offers</a>';
                $data .= '<a href="' . $site_url . '/requests/pause_request?request_id=' .$request_id .'" class="dropdown-item">
                        Pause
                    </a>';
            }
            if ($status == 'pause') {
                $data .= '<a href="' . $site_url . '/requests/active_request?request_id=' .$request_id .'" class="dropdown-item">
                Submit for Approval
                    </a>';
            }
            $data .= '<a href="' . $site_url . '/requests/edit_request?request_id=' .$request_id .'" class="dropdown-item">
                Edit
                    </a>';
            $confirm = 'Are you sure to delete this request?';
            $data .= '<a href="' . $site_url . '/requests/delete_request?request_id=' . $request_id .'" class="dropdown-item" onclick="return confirm(\'Are you sure you want to delete?\');">
                        Delete
                    </a>';
            $data .= '</div>
            </div>
        </td>';
            $data .= "</tr>";
        }
    }
    $paginationData = paginate($limit, $pageNumber, $rowCount, $totalPages);
} else {
    if ($status == 'modification')
        $data = "
        <tr class='table-danger'>
            <td colspan='3'><center><h3 class='pb-4 pt-4'><i class='fa fa-meh-o'></i> {$noResult}</h3></center></td>
        </tr>
        ";
    else
        $data = "
        <tr class='table-danger'>
            <td colspan='6'><center><h3 class='pb-4 pt-4'><i class='fa fa-meh-o'></i> {$noResult}</h3></center></td>
        </tr>
        ";
    $paginationData = null;
}
header("Content-type: application/json");
echo json_encode(["data" => $data, "pagination" => $paginationData]);
exit;


// function paginate($itemPerPage, $currentPage, $totalRecords, $totalPages)
// {
//     $pagination = '';
//     if ($totalPages > 0 && $totalPages != 1 && $currentPage <= $totalPages) { //verify total pages and current page number
//         $pagination .= '<ul class="pagination justify-content-center">';

//         $right_links = $currentPage + 3;
//         $previous = $currentPage - 3; //previous link
//         $nex = $currentPage + 1; //next link
//         $first_link = true; //boolean var to decide our first link

//         if ($currentPage > 1) {
//             $previous_link = ($previous == 0) ? 1 : $previous;
//             $pagination .= '<li class="page-item first"><a class="page-link" href="#" data-page="1" title="First">&laquo;</a></li>'; //first link
//             $pagination .= '<li class="page-item"><a class="page-link" href="#" data-page="' . abs($previous_link) . '" title="Previous">&lt;</a></li>'; //previous link
//             for ($i = ($currentPage - 2); $i < $currentPage; $i++) { //Create left-hand side links
//                 if ($i > 0) {
//                     $pagination .= '<li class="page-item"><a class="page-link" href="#" data-page="' . $i . '" title="Page' . $i . '">' . $i . '</a></li>';
//                 }
//             }
//             $first_link = false; //set first link to false
//         }

//         if ($first_link) { //if current active page is first link
//             $pagination .= '<li class="page-item first active disabled"><a class="page-link" href="#">' . $currentPage . '<span class="sr-only">(current)</span></li>';
//         } elseif ($currentPage == $totalPages) { //if it's the last active link
//             $pagination .= '<li class="page-item last active disabled"><a class="page-link" href="#">' . $currentPage . '<span class="sr-only">(current)</span></li>';
//         } else { //regular current link
//             $pagination .= '<li class="page-item active disabled"><a class="page-link" href="#">' . $currentPage . '</a></li>';
//         }

//         for ($i = $currentPage + 1; $i < $right_links; $i++) { //create right-hand side links
//             if ($i <= $totalPages) {
//                 $pagination .= '<li class="page-item"><a class="page-link" href="#" data-page="' . $i . '" title="Page ' . $i . '">' . $i . '</a></li>';
//             }
//         }
//         if ($currentPage < $totalPages) {
//             $next_link = ($i > $totalPages) ? $totalPages : $i;
//             $pagination .= '<li class="page-item"><a class="page-link" href="#" data-page="' . $next_link . '" title="Next">&gt;</a></li>'; //next link
//             $pagination .= '<li class="page-item last"><a class="page-link" href="#" data-page="' . $totalPages . '" title="Last">&raquo;</a></li>'; //last link
//         }

//         $pagination .= '</ul>';
//     }
//     return $pagination; //return pagination links
// }
