<?php
$get_section = $db->select("home_section", array("language_id" => $siteLanguage));
$row_section = $get_section->fetch();
$count_section = $get_section->rowCount();
@$section_heading = $row_section->section_heading;
@$section_short_heading = $row_section->section_short_heading;

// Home Section 5

$get_section_5 = $db->select("home_section_5", array("language_id" => $siteLanguage));
$row_section_5 = $get_section_5->fetch();
$count_section_5 = $get_section_5->rowCount();
@$section_heading_5 = $row_section_5->section_heading;
@$section_short_heading_5 = $row_section_5->section_short_heading;
@$section_video_url_5 = $row_section_5->video_url;


$get_slides = $db->query("select * from home_section_slider LIMIT 0,1");
$row_slides = $get_slides->fetch();
$slide_id = $row_slides->slide_id;
$slide_image = $row_slides->slide_image;
?>
<!-- start main -->

<!-- ############### NEW HTML CODE: START ############### -->
<div class="body-max-width px-5 py-lg-5 home-section1">
  <div class="row align-items-center py-lg-5 justify-justify-content-between">
    <div class="col-lg-7 pt-5">
      <h1 class="text-headline-larger font-weight-bold">
        Powerful Job Board WordPress Ther
      </h1>
      <p class="font-italic font-weight-bold text-secondary my-4">Suitable for Job Board,<br>
        Job Portal website. Included With Awesome Dashboard.</p>
      <div class="d-flex">
        <button class="btn bg-blue-lighter text-white rounded-0 py-3 mr-md-5 mr-2">Post Job Free</button>
        <button class="btn bg-blue-lighter-border rounded-0 py-3">Find Job</button>
      </div>
    </div>
    <div class="col-lg-5 pt-5">
      <img class="img-fluid" src="images/hmp/main-banner.png" alt="">
    </div>
  </div>
</div>

<div class="home-section2 py-5 ">
  <div class="body-max-width px-3">
    <div class="text-center">
      <h1>HOW DOES IT WORK?</h1>
      <P>A better career is out there. We'll help you find it. We're your first step to becoming everything you want to be.</P>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="p-5 p-lg-0 position-relative d-flex justify-content-center">
          <img class="img-fluid p-lg-5" src="images/hmp/Circle-Designs.png" alt="">
          <div class="position-absolute center-icons shadow bg-white rounded-circle d-flex justify-content-center align-items-center">
            <i class="fa fa-check-square-o fa-3x theme-text"></i>
          </div>
          <label class="position-absolute text-nowrap  px-2 py-1 text-white mb-0 pos1 theme-bg">JUST A SINGLE CLICK</label>
        </div>
        <div>
          <h5 class="text-center">POST</h5>
          <P class="text-center">Post your requirements in detaill. Define your budget. Best candidates will reach out to you directly</P>
        </div>
        <div class="wizard-steps text-center d-md-block d-none">
          <div>1</div>
        </div>
      </div>
      <div class="col-md-4 ">
        <div class="p-5 p-lg-0 position-relative d-flex justify-content-center">
          <img class="img-fluid p-lg-5" src="images/hmp/Circle-Designs.png" alt="">
          <div class="position-absolute center-icons shadow bg-white rounded-circle d-flex justify-content-center align-items-center">
            <i class="fa fa-search fa-3x theme-text"></i>
          </div>
          <!-- <span>JUST A SINGLE CLICK</span> -->
          <label class="position-absolute text-nowrap  px-2 py-1 text-white mb-0 pos2 text-uppercase theme-bg">Select a Service</label>
        </div>
        <div>
          <h5 class="text-center">Select POST</h5>
          <P class="text-center">Post your requirements in detaill. Define your budget. Best candidates will reach out to you directly</P>
        </div>
        <div class="wizard-steps text-center  d-md-block d-none">
          <div>2</div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-5 p-lg-0 position-relative d-flex justify-content-center">
          <img class="img-fluid p-lg-5" src="images/hmp/Circle-Designs.png" alt="">
          <div class="position-absolute center-icons shadow bg-white rounded-circle d-flex justify-content-center align-items-center">
            <i class="fa fa-shopping-bag fa-3x theme-text"></i>
          </div>
          <label class="position-absolute text-nowrap  px-2 py-1 text-white mb-0 pos3 text-uppercase theme-bg">Hire a Freelancer</label>
        </div>
        <div>
          <h5 class="text-center">HIRE</h5>
          <P class="text-center">Hiring made easy. Hire perfect candidate for your job with in seconds.</P>
        </div>
        <div class="wizard-steps text-center last-child  d-md-block d-none">
          <div>3</div>
        </div>
      </div>

    </div>
  </div>
</div>
<div class="home-section3 body-max-width px-3 pt-4">
  <div class="cards">
    <div class="d-flex justify-content-between align-items-center pb-4">
      <h1 class="my-0">Top Proposals/Services</h1>
      <a class="btn theme-bg text-white" href="featured_proposals">
        VIEW ALL
      </a>
    </div>
    <div class="row">
    <?php
      $get_proposals = $db->query("select * from proposals where proposal_featured='yes' AND proposal_status='active' LIMIT 0,10");
      while($row_proposals = $get_proposals->fetch()){
      $proposal_id = $row_proposals->proposal_id;
      $proposal_title = $row_proposals->proposal_title;
      $proposal_title = strlen($proposal_title) > 40 ? substr($proposal_title,0,40)."..." : $proposal_title;
      $proposal_price = $row_proposals->proposal_price;
      if($proposal_price == 0){
      $get_p_1 = $db->select("proposal_packages",array("proposal_id" => $proposal_id,"package_name" => "Basic"));
      $proposal_price = $get_p_1->fetch()->price;
      }
      $proposal_img1 = getImageUrl2("proposals","proposal_img1",$row_proposals->proposal_img1);
      $proposal_video = $row_proposals->proposal_video;
      $proposal_seller_id = $row_proposals->proposal_seller_id;
      $proposal_rating = $row_proposals->proposal_rating;
      $proposal_url = $row_proposals->proposal_url;
      $proposal_featured = $row_proposals->proposal_featured;
      $proposal_enable_referrals = $row_proposals->proposal_enable_referrals;
      $proposal_referral_money = $row_proposals->proposal_referral_money;
      if(empty($proposal_video)){
      $video_class = "";
      }else{
      $video_class = "video-img";
      }
      $get_seller = $db->select("sellers",array("seller_id" => $proposal_seller_id));
      $row_seller = $get_seller->fetch();
      $seller_user_name = $row_seller->seller_user_name;
      $seller_image = getImageUrl2("sellers","seller_image",$row_seller->seller_image);
      $seller_level = $row_seller->seller_level;
      $seller_status = $row_seller->seller_status;
      if(empty($seller_image)){
      $seller_image = "empty-image.png";
      }
      // Select Proposal Seller Level
      @$seller_level = $db->select("seller_levels_meta",array("level_id"=>$seller_level,"language_id"=>$siteLanguage))->fetch()->title;
      $proposal_reviews = array();
      $select_buyer_reviews = $db->select("buyer_reviews",array("proposal_id" => $proposal_id));
      $count_reviews = $select_buyer_reviews->rowCount();
      while($row_buyer_reviews = $select_buyer_reviews->fetch()){
        $proposal_buyer_rating = $row_buyer_reviews->buyer_rating;
        array_push($proposal_reviews,$proposal_buyer_rating);
      }
      $total = array_sum($proposal_reviews);
      @$average_rating = $total/count($proposal_reviews);
    ?>  
      <?php require('includes/proposals_new.php');?>
    <?php } ?>
    </div>
  </div>
</div>
<div class="body-max-width px-3 py-5 home-section4">
  <div id="carouselExampleControls" class="carousel slide py-5" data-ride="carousel">
    <div class="carousel-inner">
      <?php include('home_videos.php');?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="fa fa-chevron-left" aria-hidden="true">
      </span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="fa fa-chevron-right" aria-hidden="true"></span>
    </a>
  </div>
</div>

<div class=" py-5 home-section5">
  <div class="body-max-width px-3">
    <div class="row align-items-center justify-content-between">
      <div class="col-md-6">
        <h2><?= $section_heading_5;?></h2>
        <?php 
        echo html_entity_decode($section_short_heading_5);?>

      </div>
      <div class="col-md-6">
        <iframe width="100%" height="100%" src="<?= $section_video_url_5;?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>

<div class=" pt-5 home-section6">
  <div class="body-max-width px-3">
    <div class="text-center">
      <h2 class="font-weight-bold">Featured Candidates</h2>
      <P class="text-muted">Leading Employers already using job and talent.</P>
    </div>
    <div class="row align-items-center justify-content-center">
      <div class="col-xl-9">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-4 mb-5">
            <div class="card pt-0">
              <div class="d-flex justify-content-between px-4 align-items-center position-relative" style="top: 15px;">
                <label class="mb-0 text-secondary font-weight-bold">$60/Hr</label>
                <i class="fa fa-heart rounded-circle d-flex justify-content-center align-items-center"></i>
              </div>
              <div class="d-flex flex-column align-items-center">
                <div class="rounded-circle overflow-hidden d-flex justify-content-center align-items-center user-pic">
                  <img class="w-100 h-100" src="images/hmp/user-pic.jpg" alt="">
                </div>
                <div class="my-4 text-center">
                  <h3 class="mb-0 ">Lori Ramos</h3>
                  <p class="mb-0 text-primary">Property Agent</p>
                </div>

              </div>

              <div class="d-flex justify-content-between px-4">
                <ul class="list-inline text-muted">
                  <li class="list-inline-item">
                    <i class="fa fa-star"></i>
                  </li>
                  <li class="list-inline-item">
                    <i class="fa fa-star"></i>
                  </li>
                  <li class="list-inline-item">
                    <i class="fa fa-star"></i>
                  </li>
                  <li class="list-inline-item">
                    <i class="fa fa-star"></i>
                  </li>
                  <li class="list-inline-item">
                    <i class="fa fa-star"></i>
                  </li>
                </ul>

                <span class="font-weight-bold"><i class="fa fa-map-marker mr-2"></i>United Kingdom</span>
              </div>
              <div class="d-flex">
                <button class="btn w-100 py-3 theme-btn text-white rounded-0">View Profile</button>
                <button class="btn w-100 py-3 btn-dark text-white rounded-0">Hire Me</button>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-5">
            <div class="card pt-0">
              <div class="d-flex justify-content-between px-4 align-items-center position-relative" style="top: 15px;">
                <label class="mb-0 text-secondary font-weight-bold">$60/Hr</label>
                <i class="fa fa-heart rounded-circle d-flex justify-content-center align-items-center"></i>
              </div>
              <div class="d-flex flex-column align-items-center">
                <div class="rounded-circle overflow-hidden d-flex justify-content-center align-items-center user-pic">
                  <img class="w-100 h-100" src="images/hmp/user-pic.jpg" alt="">
                </div>
                <div class="my-4 text-center">
                  <h3 class="mb-0 ">Lori Ramos</h3>
                  <p class="mb-0 text-primary">Property Agent</p>
                </div>

              </div>

              <div class="d-flex justify-content-between px-4">
                <ul class="list-inline text-muted">
                  <li class="list-inline-item">
                    <i class="fa fa-star"></i>
                  </li>
                  <li class="list-inline-item">
                    <i class="fa fa-star"></i>
                  </li>
                  <li class="list-inline-item">
                    <i class="fa fa-star"></i>
                  </li>
                  <li class="list-inline-item">
                    <i class="fa fa-star"></i>
                  </li>
                  <li class="list-inline-item">
                    <i class="fa fa-star"></i>
                  </li>
                </ul>

                <span class="font-weight-bold"><i class="fa fa-map-marker mr-2"></i>United Kingdom</span>
              </div>
              <div class="d-flex">
                <button class="btn w-100 py-3 theme-btn  text-white rounded-0">View Profile</button>
                <button class="btn w-100 py-3 btn-dark text-white rounded-0">Hire Me</button>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-5">
            <div class="card pt-0">
              <div class="d-flex justify-content-between px-4 align-items-center position-relative" style="top: 15px;">
                <label class="mb-0 text-secondary font-weight-bold">$60/Hr</label>
                <i class="fa fa-heart rounded-circle d-flex justify-content-center align-items-center"></i>
              </div>
              <div class="d-flex flex-column align-items-center">
                <div class="rounded-circle overflow-hidden d-flex justify-content-center align-items-center user-pic">
                  <img class="w-100 h-100" src="images/hmp/user-pic.jpg" alt="">
                </div>
                <div class="my-4 text-center">
                  <h3 class="mb-0 ">Lori Ramos</h3>
                  <p class="mb-0 text-primary">Property Agent</p>
                </div>

              </div>

              <div class="d-flex justify-content-between px-4">
                <ul class="list-inline text-muted">
                  <li class="list-inline-item">
                    <i class="fa fa-star"></i>
                  </li>
                  <li class="list-inline-item">
                    <i class="fa fa-star"></i>
                  </li>
                  <li class="list-inline-item">
                    <i class="fa fa-star"></i>
                  </li>
                  <li class="list-inline-item">
                    <i class="fa fa-star"></i>
                  </li>
                  <li class="list-inline-item">
                    <i class="fa fa-star"></i>
                  </li>
                </ul>

                <span class="font-weight-bold"><i class="fa fa-map-marker mr-2"></i>United Kingdom</span>
              </div>
              <div class="d-flex">
                <button class="btn w-100 py-3 theme-btn  text-white rounded-0">View Profile</button>
                <button class="btn w-100 py-3 btn-dark text-white rounded-0">Hire Me</button>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- ############### NEW HTML CODE: END ############### -->


<!-- end main -->
<!-- start market -->

<!-- start market -->
<section class="market d-none">
  <div class="container" style="max-width: 1360px !important;">
    <div class="row">
      <div class="col-md-12">
        <h2><?= $lang['home']['categories']['title']; ?></h2>
        <h4><?= $lang['home']['categories']['desc']; ?></h4>
        <div class="row space80">
          <?php
          $get_categories = $db->query("select * from categories where cat_featured='yes' " . ($lang_dir == "right" ? 'order by 1 DESC LIMIT 4,4' : ' LIMIT 0,4') . "");
          while ($row_categories = $get_categories->fetch()) {
            $cat_id = $row_categories->cat_id;
            $cat_image = getImageUrl("categories", $row_categories->cat_image);
            $cat_url = $row_categories->cat_url;
            $get_meta = $db->select("cats_meta", array("cat_id" => $cat_id, "language_id" => $siteLanguage));
            $row_meta = $get_meta->fetch();
            $cat_title = $row_meta->cat_title;
          ?>
            <div class="col-md-3 col-6">
              <a href="categories/<?= $cat_url; ?>">
                <div class="grn_box">
                  <img src="<?= $cat_image; ?>" class="mx-auto d-block">
                  <p><?= $cat_title; ?></p>
                </div>
              </a>
            </div>
          <?php
          } ?>
        </div>
        <div class="space80 hidden-xs"></div>
        <div class="space20 visible-xs"></div>
        <div class="row space80">
          <?php
          $get_categories = $db->query("select * from categories where cat_featured='yes' " . ($lang_dir == "right" ? 'order by 1 DESC LIMIT 0,4' : ' LIMIT 4,4') . "");
          while ($row_categories = $get_categories->fetch()) {
            $cat_id = $row_categories->cat_id;
            $cat_image = getImageUrl("categories", $row_categories->cat_image);
            $cat_url = $row_categories->cat_url;
            $get_meta = $db->select("cats_meta", array("cat_id" => $cat_id, "language_id" => $siteLanguage));
            $row_meta = $get_meta->fetch();
            $cat_title = $row_meta->cat_title;
          ?>
            <div class="col-md-3 col-6">
              <a href="categories/<?= $cat_url; ?>">
                <div class="grn_box">
                  <img src="<?= $cat_image; ?>" class="mx-auto d-block" />
                  <p><?= $cat_title; ?></p>
                </div>
              </a>
            </div>
          <?php
          } ?>
        </div>

      </div>
    </div>
  </div>
</section>
<!-- end market -->
<!-- start timer -->
<section class="timer d-none">
  <div class="container" style="max-width: 1335px !important;">
    <div class="row">
      <?php
      $get_boxes = $db->query("select * from section_boxes where language_id='$siteLanguage' LIMIT 0,1");
      while ($row_boxes = $get_boxes->fetch()) {
        $box_id = $row_boxes->box_id;
        $box_title = $row_boxes->box_title;
        $box_desc = $row_boxes->box_desc;
        $box_image = getImageUrl("section_boxes", $row_boxes->box_image);
      ?>
        <div class="col-md-4 pad0">
          <div class="box">
            <h5><?= $box_title; ?></h5>
            <p><?= $box_desc; ?></p>
          </div>
        </div>
        <div class="col-md-4 pad0">
          <div class="blu_box">
            <img src="<?= $box_image; ?>" class="img-fluid mx-auto d-block">
          </div>
        </div>
      <?php
      } ?>
      <?php
      $get_boxes = $db->query("select * from section_boxes where language_id='$siteLanguage' LIMIT 1,100");
      while ($row_boxes = $get_boxes->fetch()) {
        $box_id = $row_boxes->box_id;
        $box_title = $row_boxes->box_title;
        $box_desc = $row_boxes->box_desc;
        $box_image = getImageUrl("section_boxes", $row_boxes->box_image);
      ?>
        <div class="col-md-4 pad0">
          <div class="box">
            <h5><?= $box_title; ?></h5>
            <p><?= $box_desc; ?></p>
          </div>
        </div>
        <div class="col-md-4 pad0">
          <div class="blu_box1">
            <img src="<?= $box_image; ?>" class="img-fluid mx-auto d-block">
          </div>
        </div>
      <?php
      } ?>
    </div>
  </div>
</section>
<!-- end timer -->
<!-- start top -->
<section class="top mb-0 d-none">
  <div class="container" style="max-width: 1360px !important;">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center"><?= $lang['home']['proposals']['title']; ?></h1>
        <h4 class="text-center"><?= $lang['home']['proposals']['desc']; ?></h4>
        <?php
        $get_proposals = $db->query("select * from proposals where proposal_featured='yes' AND proposal_status='active'");
        $count_proposals = $get_proposals->rowCount();
        if ($count_proposals > 1) {
        ?>
          <span class="pull-right text-success"><a href="featured_proposals">View More</a></span>
        <?php
        } ?>
        <div class="mt-5">
          <!--- home-featured-carousel Starts --->
          <div class="row">
            <!--- row Starts -->
            <?php
            $get_proposals = $db->query("select * from proposals where proposal_featured='yes' AND proposal_status='active' LIMIT 0,10");
            while ($row_proposals = $get_proposals->fetch()) {
              $proposal_id = $row_proposals->proposal_id;
              $proposal_title = $row_proposals->proposal_title;
              $proposal_price = $row_proposals->proposal_price;
              if ($proposal_price == 0) {
                $get_p_1 = $db->select("proposal_packages", array("proposal_id" => $proposal_id, "package_name" => "Basic"));
                $proposal_price = $get_p_1->fetch()->price;
              }
              $proposal_img1 = getImageUrl2("proposals", "proposal_img1", $row_proposals->proposal_img1);
              $proposal_video = $row_proposals->proposal_video;
              $proposal_seller_id = $row_proposals->proposal_seller_id;
              $proposal_rating = $row_proposals->proposal_rating;
              $proposal_url = $row_proposals->proposal_url;
              $proposal_featured = $row_proposals->proposal_featured;
              $proposal_enable_referrals = $row_proposals->proposal_enable_referrals;
              $proposal_referral_money = $row_proposals->proposal_referral_money;
              if (empty($proposal_video)) {
                $video_class = "";
              } else {
                $video_class = "video-img";
              }
              $get_seller = $db->select("sellers", array("seller_id" => $proposal_seller_id));
              $row_seller = $get_seller->fetch();
              $seller_user_name = $row_seller->seller_user_name;
              $seller_image = getImageUrl2("sellers", "seller_image", $row_seller->seller_image);
              $seller_level = $row_seller->seller_level;
              $seller_status = $row_seller->seller_status;
              if (empty($seller_image)) {
                $seller_image = "empty-image.png";
              }
              // Select Proposal Seller Level
              @$seller_level = $db->select("seller_levels_meta", array("level_id" => $seller_level, "language_id" => $siteLanguage))->fetch()->title;
              $proposal_reviews = array();
              $select_buyer_reviews = $db->select("buyer_reviews", array("proposal_id" => $proposal_id));
              $count_reviews = $select_buyer_reviews->rowCount();
              while ($row_buyer_reviews = $select_buyer_reviews->fetch()) {
                $proposal_buyer_rating = $row_buyer_reviews->buyer_rating;
                array_push($proposal_reviews, $proposal_buyer_rating);
              }
              $total = array_sum($proposal_reviews);
              @$average_rating = $total / count($proposal_reviews);
            ?>
              <div class="col-xl-2dot4 col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-4">
                <?php require("includes/proposals.php"); ?>
              </div>
            <?php
            } ?>
          </div>
          <!--- row Ends -->
        </div>
        <!--- home-featured-carousel Ends --->
      </div>
    </div>
  </div>
</section>

<script>
  $(document).ready(function() {

    var slider = $('#demo1').carousel({
      interval: 4000
    });

    var active = $(".carousel-item.active").find("video");
    var active_length = active.length;

    if (active_length == 1) {
      slider.carousel('pause');
      console.log('paused');
      $(".carousel-indicators").css({
        "bottom": "90px"
      });
    }

    $("#demo1").on('slide.bs.carousel', function(event) {
      var eq = event.to;
      // console.log(event.from);
      // console.log(event.to);
      var video = $(event.relatedTarget).find("video");
      if (video.length == 1) {
        slider.carousel('pause');
        console.log('paused');
        $(".carousel-indicators").css({
          "bottom": "90px"
        });
        video.trigger('play');
      } else {
        $(".carousel-indicators").css({
          "bottom": "20px"
        });
      }
    });

    $('video').on('ended', function() {
      slider.carousel({
        'pause': false
      });
      console.log('started');
    });

  });
</script>