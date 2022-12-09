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
         $sel_my_buyers =  $db->select("my_buyers", array("seller_id" => $login_seller_id));
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
         <?php } ?>
      </tbody>
   </table>
   <?php
   $count_my_buyers = $db->count("my_buyers", array("seller_id" => $login_seller_id));
   if ($count_my_buyers == 0) {
      echo "<center><h3 class='pb-4 pt-4'><i class='fa fa-meh-o'></i> {$lang['manage_contacts']['no_buyers']} </h3></center>";
   }
   ?>
</div>