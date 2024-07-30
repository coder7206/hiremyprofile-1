<style>
	@media (max-width:768px) {
		.badge-float-right {
			float: right;
			margin-top: -3px;
			padding-top: 5px;
			margin-right: -9px !important;
		}

		.font-size-3 {
			font-size: 13px !important;
			padding: 10px !important;
			text-align: center;
		}
	}
@media(min-width:550px) and (max-width:768px){
	.width-increase {
			/* border:1px solid green; */
			width: 150px;
			text-align: center;
		}
	}
	@media(min-width:768px) {
		.width-increase {
			/* border:1px solid green; */
			width: 170px;
			text-align: center;
		}
	}

	.badge-float-right {
		float: right;
		margin-top: -3px;
		padding-top: 5px;
		margin-right: -9px !important;
	}

	.padding-13 {
		padding: 9px 15px;
	}

	.font-size-3 {
		/* font-size: 11px !important; */
		padding: 13px !important;
		text-align: center;
		/* box-shadow: 0px 0px 2px black, inset 0px 0px 15px #f5fffe; */
	}

	.box-shadow-buyer-order {
		/* box-shadow: 0px 0px 5px black, inset 0px 0px 15px #f5fffe; */
	}

	.box-shadow-ord-data {
		/* box-shadow: 0px 0px 5px black, inset 0px 0px 75px red; */
	}
</style>
<ul class="nav nav-tabs flex-column flex-sm-row  box-shadow-buyer-order">
	<li class="nav-item width-increase">
		<?php
		$count_orders = $db->count("orders", array("buyer_id" => $login_seller_id, "order_active" => 'yes'));
		?>
		<a href="#active" data-toggle="tab" class="nav-link active make-black padding-13">
			<?= $lang['tabs']['active']; ?> <span class="badge badge-success badge-float-right"> <?= $count_orders; ?></span>

		</a>
	</li>
	<li class="nav-item width-increase">

		<?php
		$count_orders = $db->count("orders", array("buyer_id" => $login_seller_id, "order_status" => 'delivered'));
		?>
		<a href="#delivered" data-toggle="tab" class="nav-link make-black padding-13">
			<?= $lang['tabs']['delivered']; ?> <span class="badge badge-success badge-float-right"><?= $count_orders; ?> </span>
		</a>
	</li>
	<li class="nav-item width-increase">

		<?php
		$count_orders = $db->count("orders", array("buyer_id" => $login_seller_id, "order_status" => 'completed'));
		?>
		<a href="#completed" data-toggle="tab" class="nav-link make-black padding-13">
			<?= $lang['tabs']['completed']; ?> <span class="badge badge-success badge-float-right"><?= $count_orders; ?></span>

		</a>

	</li>
	<li class="nav-item width-increase">

		<?php
		$count_orders = $db->count("orders", array("buyer_id" => $login_seller_id, "order_status" => 'cancelled'));
		?>
		<a href="#cancelled" data-toggle="tab" class="nav-link make-black padding-13">
			<?= $lang['tabs']['cancelled']; ?> <span class="badge badge-success badge-float-right"><?= $count_orders; ?> </span>

		</a>
	</li>
	<li class="nav-item width-increase">

		<?php
		$count_orders = $db->count("orders", array("buyer_id" => $login_seller_id));
		?>
		<a href="#all" data-toggle="tab" class="nav-link make-black padding-13">
			<?= $lang['tabs']['all']; ?> <span class="badge badge-success badge-float-right"><?= $count_orders; ?></span>

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