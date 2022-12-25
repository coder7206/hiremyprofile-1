<div class="table-responsive box-table mt-3">
	<table class="table table-bordered" id="orderAll">
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
	<nav id="pagination-order-all" aria-label="all order navigation">
	</nav>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		var activeOrder = function(userId, status, limit, page = 1) {
			return $.ajax({
				url: "<?= $site_url ?>/ajax/order_data.php",
				dataType: "json",
				data: {
					user_id: userId,
					status: status,
					limit: limit,
					page: page,
				}
			}).done(function(data) {
				$('body #orderAll tbody').html(data.data);
				$('body #pagination-order-all').html(data.pagination);
				$('body #wait').removeClass("loader");
			});
		}
		activeOrder(<?= $login_seller_id ?>, 'all', <?= isset($homePerPage) ? $homePerPage : 10 ?>);

		//executes code below when user click on pagination links
		$("body #pagination-order-all").on("click", ".pagination a", function(e) {
			e.preventDefault();
			var page = $(this).attr("data-page"); //get page number from link
			$('body #wait').addClass("loader");
			activeOrder(<?= $login_seller_id ?>, 'all', <?= isset($homePerPage) ? $homePerPage : 10 ?>, page);
		})
	});
</script>