<div class="table-responsive box-table">
   <h4 class="mt-3 mb-3 ml-2"> <?= $lang['manage_contacts']['my_buyers']; ?> </h4>
   <table class="table table-bordered">
      <!-- table table-hover Starts -->
      <thead>
         <tr>
            <th><?= $lang['th']['buyer_name']; ?></th>
            <th><?= $lang['th']['completed_orders']; ?></th>
            <th><?= $lang['th']['amount_spent']; ?></th>
            <th><?= $lang['th']['last_order_date']; ?></th>
            <th></th>
         </tr>
      </thead>
      <tbody>
         <?php
         $limit = 10;
         if (isset($_GET["page"])) {
            $pageNumber = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
            if (!is_numeric($pageNumber)) {
                die('Invalid page number!');
            } //incase of invalid page number
        } else {
            $pageNumber = 1; //if there's no page number, set it to 1
        }
         $start_from =  (($pageNumber - 1) * $limit);
         $where_limit = " order by id DESC LIMIT $start_from, $limit";

         $sel_my_buyers_page =  $db->query("SELECT * FROM my_buyers WHERE seller_id=:seller_id", array("seller_id" => $login_seller_id));
         $totalRows = $sel_my_buyers_page->rowCount();
         $row_my_buyers_page = $sel_my_buyers_page->fetch();

         //break records into pages
         $totalPages = ceil($totalRows / $limit);
         if ($totalRows > 0) {
            $sel_my_buyers =  $db->query("SELECT * FROM my_buyers WHERE seller_id=:seller_id $where_limit", array("seller_id" => $login_seller_id));

            while ($row_my_buyers = $sel_my_buyers->fetch()) {
               $buyer_id = $row_my_buyers->buyer_id;
               $completed_orders = $row_my_buyers->completed_orders;
               $amount_spent = $row_my_buyers->amount_spent;
               $last_order_date = $row_my_buyers->last_order_date;
               $select_buyer = $db->select("sellers", array("seller_id" => $buyer_id));
               $row_buyer = $select_buyer->fetch();
               $buyer_user_name = $row_buyer->seller_user_name;
               $buyer_image = getImageUrl2("sellers", "seller_image", $row_buyer->seller_image);
         ?>
            <tr>
               <td>
                  <?php if (!empty($buyer_image)) { ?>
                     <img src="<?= $buyer_image; ?>" class="rounded-circle contact-image">
                  <?php } else { ?>
                     <img src="user_images/empty-image.png" class="rounded-circle contact-image">
                  <?php } ?>
                  <div class="contact-title">
                     <h6> <?= $buyer_user_name; ?> </h6>
                     <a href="<?= $buyer_user_name; ?>" target="blank" class="text-success"> User Profile </a> |
                     <a href="buying_history?buyer_id=<?= $buyer_id; ?>" class="text-success"> History </a>
                  </div>
               </td>
               <td><?= $completed_orders; ?></td>
               <td><?= showPrice($amount_spent); ?></td>
               <td>
                  <?= $last_order_date; ?>
               </td>
               <td class="text-center">
                  <a href="conversations/message?seller_id=<?= $buyer_id; ?>" target="blank" class="btn btn-success">
                     <i class="fa fa-comment"></i>
                  </a>
               </td>
            </tr>
         <?php
         }
      } else {
      ?>
      <tr class="table-danger">
               <td colspan="5">
                  <center>
                     <h3 class='pb-4 pt-4'>
                        <i class='fa fa-meh-o'></i> <?= $lang['manage_contacts']['no_buyers'] ?>
                     </h3>
                  </center>
               </td>
            </tr>
         <?php } ?>
      </tbody>
   </table>
   <nav id="pagination-seller-contacts" aria-label="Active request navigation">
      <?=pagination($limit, $pageNumber, $totalRows, $totalPages, $site_url . "/manage_contacts?page=");?>
   </nav>
</div>