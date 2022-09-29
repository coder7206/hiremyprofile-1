<ul class="nav nav-tabs flex-column flex-sm-row">
	<li class="nav-item">
		<?php
		$count_orders = $db->count("orders",array("buyer_id" => $login_seller_id, "order_active" => 'yes'));
		?>
		<a href="#active" data-toggle="tab" class="nav-link active make-black">
			<?= $lang['tabs']['active']; ?> <span class="badge badge-success"> <?= $count_orders; ?></span>

		</a>
	</li>
	<li class="nav-item">

		<?php
		$count_orders = $db->count("orders",array("buyer_id" => $login_seller_id, "order_status" => 'delivered'));
		?>
		<a href="#delivered" data-toggle="tab" class="nav-link make-black">
			<?= $lang['tabs']['delivered']; ?> <span class="badge badge-success"><?= $count_orders; ?> </span>
		</a>
	</li>
	<li class="nav-item">

		<?php
		$count_orders = $db->count("orders",array("buyer_id" => $login_seller_id, "order_status" => 'completed'));
		?>
		<a href="#completed" data-toggle="tab" class="nav-link make-black">
			<?= $lang['tabs']['completed']; ?> <span class="badge badge-success"><?= $count_orders; ?></span>

		</a>

	</li>
	<li class="nav-item">

		<?php
		$count_orders = $db->count("orders",array("buyer_id" => $login_seller_id, "order_status" => 'cancelled'));
		?>
		<a href="#cancelled" data-toggle="tab" class="nav-link make-black">
			<?= $lang['tabs']['cancelled']; ?> <span class="badge badge-success"><?= $count_orders; ?> </span>

		</a>
	</li>
	<li class="nav-item">

		<?php
		$count_orders = $db->count("orders",array("buyer_id" => $login_seller_id));
		?>
		<a href="#all" data-toggle="tab" class="nav-link make-black">
			<?= $lang['tabs']['all']; ?> <span class="badge badge-success"><?= $count_orders; ?></span>

		</a>

	</li>
</ul>
<div class="tab-content">
	<div class="tab-pane fade show active" id="active">
		<?php require_once("manage_orders/order_active_buying.php") ?>
	</div>

	<div class="tab-pane" id="delivered">
		<?php require_once("manage_orders/order_delivered_buying.php") ?>
	</div>

	<div class="tab-pane" id="completed">
		<?php require_once("manage_orders/order_completed_buying.php") ?>
	</div>
	<div class="tab-pane" id="cancelled">
		<?php require_once("manage_orders/order_cancelled_buying.php") ?>
	</div>
	<div class="tab-pane" id="all">
		<?php require_once("manage_orders/order_all_buying.php") ?>
	</div>
</div>