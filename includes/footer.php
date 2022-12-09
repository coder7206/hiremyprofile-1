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
						<li class="list-unstyled-item"><a href="<?= $site_url.$link_url; ?>"><?= $link_title; ?></a></li>
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
						<li class="list-unstyled-item"><a href="<?= $site_url.$link_url; ?>"><i class="fa <?= $icon_class; ?>"></i> <?= $link_title; ?></a></li>
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

<link rel="stylesheet" href="<?= $site_url; ?>/styles/msdropdown.css" />
<?php

if ($videoPlugin == 1) {
	require("$dir/plugins/videoPlugin/footer/videoCall.php");
}
require("footerJs.php");

?>