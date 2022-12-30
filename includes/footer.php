<!-- start footer -->
<footer class="footer">
	<div class="container">
		<div class="row">
			<!--- row Starts --->
			<div class="col-md-3 col-12">
				<img class="img-fluid mb-4" src="images/hmp/logo.jpeg" alt="" width="150px">
				<p class="text-muted">Dolor magna eget est lorem. Eu augue ut lectus arcu. Aliquet risus feugiat in ante metus dictum</p>
				<ul class="list-unstyled">

					<li class="list-unstyled-item d-flex align-items-center">
						<span class="mr-2 font-weight-bold text-white">Address: </span>
						<a href="">555 Wall Street, USA, NY</a>
					</li>
					<li class="list-unstyled-item d-flex align-items-center">
						<span class="mr-2 font-weight-bold text-white">Email:</span>
						<a href="">support@workio.com</a>
					</li>
					<li class="list-unstyled-item d-flex align-items-center">
						<span class="mr-2 font-weight-bold text-white">Call: </span>
						<a href="">555-555-1234</a>
					</li>

				</ul>
			</div>
			<div class="col-md-3 col-12">
				<h3 class="mb-lg-4" data-toggle="collapse" data-target="#collapsecategories"><?= $lang['categories']; ?></h3>
				<ul class=" show list-unstyled" id="collapsecategories">
					<?php
					$get_footer_links = $db->query("select * from footer_links where link_section='categories' AND language_id='$siteLanguage'");
					while ($row_footer_links = $get_footer_links->fetch()) {
						$link_id = $row_footer_links->link_id;
						$link_title = $row_footer_links->link_title;
						$link_url = $row_footer_links->link_url;
					?>
						<li class="list-unstyled-item"><a href="<?= $site_url . $link_url; ?>"><?= $link_title; ?></a></li>
					<?php } ?>
				</ul>
			</div>

			<div class="col-md-3 col-12">
				<h3 class="h3Border mb-lg-4" data-toggle="collapse" data-target="#collapseabout"><?= $lang['about']; ?></h3>
				<ul class=" show list-unstyled" id="collapseabout">
					<?php
					$get_footer_links = $db->select("footer_links", array("link_section" => "about", "language_id" => $siteLanguage));
					while ($row_footer_links = $get_footer_links->fetch()) {
						$link_id = $row_footer_links->link_id;
						$icon_class = $row_footer_links->icon_class;
						$link_title = $row_footer_links->link_title;
						$link_url = $row_footer_links->link_url;
					?>
						<li class="list-unstyled-item"><a href="<?= $site_url . $link_url; ?>"><i class="fa <?= $icon_class; ?>"></i> <?= $link_title; ?></a></li>
					<?php } ?>
				</ul>
			</div>



			<div class="col-md-3 col-12 ">
				<!--- col-md-4 Starts --->
				<h3 class="h3Border mb-lg-4">Download </h3>
				<button class="btn btn-outline-dark text-white w-100 py-4 px-4 mb-4">
					<div class="d-flex align-items-center ">
						<i class="fa  fa-apple fa-3x text-green1"></i>
						<div class="d-flex flex-column pl-4 align-items-flex-start">
							<label class="mb-0 font-weight-bold">Google Play</label>
							<span class="text-muted">Get It Now</span>
						</div>
					</div>
				</button>
				<button class="btn btn-outline-dark text-white w-100 py-4 px-4 mb-4">
					<div class="d-flex align-items-center">
						<i class="fa fa-android fa-3x text-green1"></i>
						<div class="d-flex flex-column pl-4 align-items-flex-start">
							<label class="mb-0 font-weight-bold">App Store</label>
							<span class="text-muted">Now It Available</span>
						</div>
					</div>
				</button>


			</div>

		</div>
	</div>
	<br>
</footer>
<!-- end footer -->
<section class="post_footer d-none">
	<?= $db->select("general_settings")->fetch()->site_copyright; ?>
</section>

<?php if (!isset($_COOKIE['close_cookie'])) { ?>
	<section class="clearfix cookies_footer row animated slideInLeft">
		<div class="col-md-4">
			<img src="<?= $site_url; ?>/images/cookie.png" class="img-fluid" alt="">
		</div>
		<div class="col-md-8">
			<div class="float-right close btn btn-sm"><i class="fa fa-times"></i></div>
			<h4 class="mt-0 mt-lg-2 <?= ($lang_dir == "right" ? 'text-right' : '') ?>"><?= $lang["cookie_box"]['title']; ?></h4>
			<p class="mb-1 "><?= str_replace('{link}', "$site_url/terms_and_conditions", $lang["cookie_box"]['desc']); ?></p>
			<a href="#" class="btn btn-success btn-sm"><?= $lang["cookie_box"]['button']; ?></a>
		</div>
	</section>
<?php } ?>
<section class="messagePopup animated slideInRight"></section>

<div id="report-modal-uni" class="modal fade" role="dialog">
	<!-- report-modal modal fade Starts -->
	<div class="modal-dialog">
		<!-- modal-dialog Starts -->
		<div class="modal-content">
			<!-- modal-content Starts -->
			<div class="modal-header p-2 pl-3 pr-3">
				<!-- modal-header Starts -->
				Report this item
				<button class="close" data-dismiss="modal"><span>&times;</span></button>
			</div><!-- modal-header Ends -->
			<div class="modal-body">
				<!-- modal-body p-0 Starts -->
				<h6>Let us know why you would like to report this item.</h6>
				<form action="#" method="post" id="reportUni">
					<div class="form-group mt-3">
						<!--- form-group Starts --->
						<select class="form-control float-right" name="reason" required="">
							<option value="">Select</option>
							<option>Non Original Content</option>
							<option>Inappropriate Proposal</option>
							<option>Trademark Violation</option>
							<option>Copyrights Violation</option>
							<option>Other</option>
						</select>
					</div>
					<!--- form-group Ends --->
					<br>
					<br>
					<div class="form-group mt-1 mb-3">
						<!--- form-group Starts --->
						<label> Additional Information </label>
						<textarea name="additional_information" rows="3" class="form-control" required=""></textarea>
					</div>
					<!--- form-group Ends --->
					<button type="submit" name="submit_report" class="float-right btn btn-sm btn-success">
						Submit Report
					</button>
					<input type="hidden" name="reporter_id" value="<?=$login_seller_id?>" required />
					<input type="hidden" name="content_id" value="" required />
					<input type="hidden" name="content_type" value="" required />
					<input type="hidden" name="url" value="" required />
				</form>
			</div><!-- modal-body p-0 Ends -->
		</div><!-- modal-content Ends -->
	</div><!-- modal-dialog Ends -->
</div><!-- report-modal modal fade Ends -->

<link rel="stylesheet" href="<?= $site_url; ?>/styles/msdropdown.css" />
<?php

if ($videoPlugin == 1) {
	require("$dir/plugins/videoPlugin/footer/videoCall.php");
}
require("footerJs.php");

?>