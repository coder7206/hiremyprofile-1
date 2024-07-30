<style>
	@media (max-width:768px) {
		.font-size-3 {
			font-size: 13px !important;
			padding: 10px !important;
		}

		.heading_3 {
			font-size: 20px;
			width: 100%;
		}
	}
	.font-size-3 {
			/* font-size: 11px !important; */
			padding: 13px !important;
			text-align: center;
			/* box-shadow: 0px 0px 5px black, inset 0px 0px 15px #00c8d4; */
		}
		.box-shadow-req-act{
			/* box-shadow:0px 0px 5px black; */
			/* border:2px solid green !important; */
		}
		.box-shadow-manage{
			/* box-shadow: 0px 0px 5px black, inset 0px 0px 70px red; */
		}
</style>
<div class="table-responsive box-table  box-shadow-req-act">
	<table class="table table-bordered" id="requestActive">
		<thead>
			<tr>
				<th class="font-size-3"><?= $lang['th']['title']; ?></th>
				<th class="font-size-3"><?= $lang['th']['description']; ?></th>
				<th class="font-size-3"><?= $lang['th']['date']; ?></th>
				<th class="font-size-3"><?= $lang['th']['offers']; ?></th>
				<th class="font-size-3"><?= $lang['th']['budget']; ?></th>
				<th class="font-size-3"><?= $lang['th']['actions']; ?></th>
			</tr>
		</thead>
		<tbody>
			<tr class="table-info">
				<td colspan="6">
					data fetching...
				</td>
			</tr>
		</tbody>
	</table>
	<nav id="pagination-request-active" aria-label="Active request navigation"></nav>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		var activeRequest = function(userId, status, limit, page = 1) {
			return $.ajax({
				url: "<?= $site_url ?>/ajax/request_data.php",
				dataType: "json",
				data: {
					user_id: userId,
					status: status,
					limit: limit,
					page: page,
				}
			}).done(function(data) {
				$('body #requestActive tbody').html(data.data);
				$('body #pagination-request-active').html(data.pagination);
				$('body #wait').removeClass("loader");
			});
		}
		activeRequest(<?= $login_seller_id ?>, 'active', <?= isset($homePerPage) ? $homePerPage : 10 ?>);

		//executes code below when user click on pagination links
		$("body #pagination-request-active").on("click", ".pagination a", function(e) {
			e.preventDefault();
			var page = $(this).attr("data-page"); //get page number from link
			$('body #wait').addClass("loader");
			activeRequest(<?= $login_seller_id ?>, 'active', <?= isset($homePerPage) ? $homePerPage : 10 ?>, page);
		})
	});
</script>