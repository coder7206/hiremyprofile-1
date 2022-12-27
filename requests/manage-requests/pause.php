<div class="table-responsive box-table">
    <table class="table table-bordered" id="requestPause">
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
    <nav id="pagination-request-pause" aria-label="pause request navigation"></nav>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		var pauseRequest = function(userId, status, limit, page = 1) {
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
				$('body #requestPause tbody').html(data.data);
				$('body #pagination-request-pause').html(data.pagination);
				$('body #wait').removeClass("loader");
			});
		}
		pauseRequest(<?= $login_seller_id ?>, 'pause', <?= isset($homePerPage) ? $homePerPage : 10 ?>);

		//executes code below when user click on pagination links
		$("body #pagination-request-pause").on("click", ".pagination a", function(e) {
			e.preventDefault();
			var page = $(this).attr("data-page"); //get page number from link
			$('body #wait').addClass("loader");
			pauseRequest(<?= $login_seller_id ?>, 'pause', <?= isset($homePerPage) ? $homePerPage : 10 ?>, page);
		})
	});
</script>