<ul class="nav nav-tabs flex-column flex-sm-row ">
	<li class="nav-item">
        <?php
        $count_orders = $db->count("orders",array("seller_id" => $login_seller_id, "order_active" => 'yes'));
        ?>                   
		<a href="#seller_active" data-toggle="tab" class="nav-link make-black active ">
			<?= $lang['tabs']['active']; ?> <span class="badge badge-success"><?= $count_orders; ?></span>
		</a>
	</li>
	<li class="nav-item">
        <?php
        $count_orders = $db->count("orders",array("seller_id" => $login_seller_id, "order_status" => 'delivered'));
        ?>
		<a href="#seller_delivered" data-toggle="tab" class="nav-link make-black">
			<?= $lang['tabs']['delivered']; ?> <span class="badge badge-success"><?= $count_orders; ?></span>			
		</a>
	</li>
	<li class="nav-item">        
        <?php
        $count_orders = $db->count("orders",array("seller_id" => $login_seller_id, "order_status" => 'completed'));
        ?>
		<a href="#seller_completed" data-toggle="tab" class="nav-link make-black">
			<?= $lang['tabs']['completed']; ?> <span class="badge badge-success"><?= $count_orders; ?></span>
		</a>
	</li>
	<li class="nav-item">
        <?php
  		$count_orders = $db->count("orders",array("seller_id" => $login_seller_id, "order_status" => 'cancelled'));
        ?>
		<a href="#seller_cancelled" data-toggle="tab" class="nav-link make-black">
			<?= $lang['tabs']['cancelled']; ?> <span class="badge badge-success"><?= $count_orders; ?></span>
		</a>
	</li>
	<li class="nav-item">
        <?php
        $count_orders = $db->count("orders",array("seller_id" => $login_seller_id));
        ?>
		<a href="#seller_all" data-toggle="tab" class="nav-link make-black">
			<?= $lang['tabs']['all']; ?> <span class="badge badge-success"><?= $count_orders; ?></span>
		</a>
	</li>
</ul>
<div class="tab-content">
	<div class="tab-pane fade show active" id="seller_active">
		<?php require_once("manage_orders/order_active_selling.php") ?>
	</div>
	<div class="tab-pane" id="seller_delivered">
		<?php require_once("manage_orders/order_delivered_selling.php") ?>
	</div>
	<div class="tab-pane" id="seller_completed">
		<?php require_once("manage_orders/order_completed_selling.php") ?>
	</div>
	<div class="tab-pane" id="seller_cancelled">
		<?php require_once("manage_orders/order_cancelled_selling.php") ?>
	</div>
	<div class="tab-pane" id="seller_all">
		<?php require_once("manage_orders/order_all_selling.php") ?>
	</div>
</div>