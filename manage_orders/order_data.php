<?php
require_once("../includes/db.php");
print_r($_REQUEST);
// if (isset($_POST)) {
//     $data = [];
//     $limit = isset($_POST['limit']) ? $_POST['limit'] : 10;
//     $page = 1;
//     $_loader = $_POST['_loader'];

//     if ($_POST["page"] > 1) {
//         $start = (($_POST["page"] - 1) * $limit);
//         $page = $_POST["page"];
//     } else {
//         $start = 0;
//     }

//     $buyerId = $_POST['buyer_id'];
//     $status = $_POST['status'];

//     $query = $db->query("SELECT * FROM orders WHERE buyer_id=:buyer_id AND order_active=:order_active LIMIT 0, " . $limit, ["buyer_id" => $buyerId, "order_active" => $status]);
//     $data = $query->fetch();
//     $rowCount = $query->rowCount();

//     $pagination_html = '
// 	<div align="center">
//   		<ul class="pagination">
// 	';

//     $total_links = ceil($rowCount / $limit);
//     $previous_link = '';
//     $next_link = '';
//     $page_link = '';

//     if ($total_links > 4) {
//         if ($page < 5) {
//             for ($count = 1; $count <= 5; $count++) {
//                 $page_array[] = $count;
//             }
//             $page_array[] = '...';
//             $page_array[] = $total_links;
//         } else {
//             $end_limit = $total_links - 5;
//             if ($page > $end_limit) {
//                 $page_array[] = 1;

//                 $page_array[] = '...';

//                 for ($count = $end_limit; $count <= $total_links; $count++) {
//                     $page_array[] = $count;
//                 }
//             } else {
//                 $page_array[] = 1;

//                 $page_array[] = '...';

//                 for ($count = $page - 1; $count <= $page + 1; $count++) {
//                     $page_array[] = $count;
//                 }

//                 $page_array[] = '...';

//                 $page_array[] = $total_links;
//             }
//         }
//     } else {
//         for ($count = 1; $count <= $total_links; $count++) {
//             $page_array[] = $count;
//         }
//     }

//     for ($count = 0; $count < count($page_array); $count++) {
//         if ($page == $page_array[$count]) {
//             $page_link .= '
// 			<li class="page-item active">
// 	      		<a class="page-link" href="#">' . $page_array[$count] . ' <span class="sr-only">(current)</span></a>
// 	    	</li>
// 			';

//             $previous_id = $page_array[$count] - 1;

//             if ($previous_id > 0) {
//                 $previous_link = '<li class="page-item"><a class="page-link" href="javascript:`' . $_loader .  '`(`' . $_POST["query"] . '`, ' . $previous_id . ')">Previous</a></li>';
//             } else {
//                 $previous_link = '
// 				<li class="page-item disabled">
// 			        <a class="page-link" href="#">Previous</a>
// 			    </li>
// 				';
//             }

//             $next_id = $page_array[$count] + 1;
//             if ($next_id >= $total_links) {
//                 $next_link = '
// 				<li class="page-item disabled">
// 	        		<a class="page-link" href="#">Next</a>
// 	      		</li>
// 				';
//             } else {
//                 $next_link = '
// 				<li class="page-item"><a class="page-link" href="javascript:`' . $_loader .  '`(`' . $_POST["query"] . '`, ' . $next_id . ')">Next</a></li>
// 				';
//             }
//         } else {
//             if ($page_array[$count] == '...') {
//                 $page_link .= '
// 				<li class="page-item disabled">
// 	          		<a class="page-link" href="#">...</a>
// 	      		</li>
// 				';
//             } else {
//                 $page_link .= '
// 				<li class="page-item">
// 					<a class="page-link" href="javascript:`' . $_loader .  '`(`' . $_POST["query"] . '`, ' . $page_array[$count] . ')">' . $page_array[$count] . '</a>
// 				</li>
// 				';
//             }
//         }
//     }

//     $pagination_html .= $previous_link . $page_link . $next_link;


//     $pagination_html .= '
// 		</ul>
// 	</div>
// 	';

//     $output = array(
//         'data' => $data,
//         'pagination' => $pagination_html,
//         'total_data' => $total_data
//     );

//     echo json_encode($output);
// }
