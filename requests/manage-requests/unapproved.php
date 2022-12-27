<div class="table-responsive box-table">
    <table class="table table-bordered" id="requestUnapproved">
        <thead>
            <tr>
                <th><?= $lang['th']['title']; ?></th>
                <th><?= $lang['th']['description']; ?></th>
                <th><?= $lang['th']['date']; ?></th>
                <th><?= $lang['th']['offers']; ?></th>
                <th><?= $lang['th']['budget']; ?></th>
                <th><?= $lang['th']['actions']; ?></th>
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
    <nav id="pagination-request-unapproved" aria-label="unapproved request navigation"></nav>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		var unapprovedRequest = function(userId, status, limit, page = 1) {
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
				$('body #requestUnapproved tbody').html(data.data);
				$('body #pagination-request-unapproved').html(data.pagination);
				$('body #wait').removeClass("loader");
			});
		}
		unapprovedRequest(<?= $login_seller_id ?>, 'unapproved', <?= isset($homePerPage) ? $homePerPage : 10 ?>);

		//executes code below when user click on pagination links
		$("body #pagination-request-unapproved").on("click", ".pagination a", function(e) {
			e.preventDefault();
			var page = $(this).attr("data-page"); //get page number from link
			$('body #wait').addClass("loader");
			unapprovedRequest(<?= $login_seller_id ?>, 'unapproved', <?= isset($homePerPage) ? $homePerPage : 10 ?>, page);
		})
	});
</script>