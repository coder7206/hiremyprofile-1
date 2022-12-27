<div class="table-responsive box-table mt-3">
	<table class="table table-bordered" id="orderSellerDelivered">
		<thead>
			<tr>
				<th><?= $lang['th']['order_summary']; ?></th>
				<th><?= $lang['th']['order_date']; ?></th>
				<th><?= $lang['th']['due_on']; ?></th>
				<th><?= $lang['th']['total']; ?></th>
				<th><?= $lang['th']['status2']; ?></th>
			</tr>
		</thead>
		<tbody>
			<tr class="table-info">
				<td colspan="5">
					data fetching...
				</td>
			</tr>
		</tbody>
	</table>
	<nav id="pagination-seller-order-delivered" aria-label="Active order navigation">
	</nav>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		var deliveredSellerOrder = function(userId, status, limit, page = 1) {
			return $.ajax({
				url: "<?= $site_url ?>/ajax/order_seller_data.php",
				dataType: "json",
				data: {
					user_id: userId,
					status: status,
					limit: limit,
					page: page,
				}
			}).done(function(data) {
				$('body #orderSellerDelivered tbody').html(data.data);
				$('body #pagination-seller-order-delivered').html(data.pagination);
				$('body #wait').removeClass("loader");
			});
		}
		deliveredSellerOrder(<?= $login_seller_id ?>, 'delivered', <?= isset($homePerPage) ? $homePerPage : 10 ?>);

		//executes code below when user click on pagination links
		$("body #pagination-seller-order-delivered").on("click", ".pagination a", function(e) {
			e.preventDefault();
			var page = $(this).attr("data-page"); //get page number from link
			$('body #wait').addClass("loader");
			deliveredSellerOrder(<?= $login_seller_id ?>, 'delivered', <?= isset($homePerPage) ? $homePerPage : 10 ?>, page);
		})
	});
</script>