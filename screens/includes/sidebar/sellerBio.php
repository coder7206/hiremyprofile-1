  <?php
  // USER RATING
  $select_buyer_reviews = $db->select("buyer_reviews", array("review_seller_id" => $proposal_seller_id));
  $count_reviews = $select_buyer_reviews->rowCount();

  if (!$count_reviews == 0) {
    $rattings = array();
    while ($row_buyer_reviews = $select_buyer_reviews->fetch()) {
      $buyer_rating = $row_buyer_reviews->buyer_rating;
      array_push($rattings, $buyer_rating);
    }
    $total = array_sum($rattings);
    @$average = $total / count($rattings);
    $average_rating = substr($average, 0, 1);
  } else {
    $average = "0";
    $average_rating = "0";
  }
  ?>
  <style>
    .profile_image_round_circle {
      width: 130px;
      height: 130px;
      overflow: hidden;
      border-radius: 100px;
    }
  </style>
  <div class="card seller-bio mb-3 rounded-0 box-shadow-cbody2">
    <div class="card-body <?= ($lang_dir == "right" ? 'text-right' : '') ?>">

      <?php if (check_status($proposal_seller_id) == "Online") { ?>
        <div class="is-online"> <i class="fa fa-circle"></i> <?= check_status($proposal_seller_id); ?> </div>
      <?php } ?>

      <center class="mb-4">
        <?php if (!empty($proposal_seller_image)) { ?>
          <div class="profile_image_round_circle">
            <img src="<?= getImageUrl2("sellers", "seller_image", $proposal_seller_image); ?>" width="100%" height="100%" class="">
          </div>
        <?php } else { ?>
          <div class="profile_image_round_circle">
            <img src="<?= $site_url ?>/user_images/empty-image.png" width="100%" height="100%" class="">
          </div>
        <?php } ?>
      </center>
      <h3 class="text-center h3">
        <a class="text-success" href="<?= $site_url ?>/<?= $proposal_seller_user_name; ?>">
          <?= ucfirst($proposal_seller_user_name); ?>
        </a> <span class="divider"> </span> <span class="text-muted"><?= $level_title; ?></span>
      </h3>
      <div class="star-rating text-warning text-center pb-1">
        <?php
        for ($seller_i = 0; $seller_i < $average_rating; $seller_i++) {
          echo " <i class='fa fa-star'></i> ";
        }
        for ($seller_i = $average_rating; $seller_i < 5; $seller_i++) {
          echo " <i class='fa fa-star-o'></i> ";
        }
        ?>
        <span class="text-dark m-1"><strong>
            <?php printf("%.1f", $average); ?></strong> (<?= $count_reviews; ?>)</span>
      </div>
      <p><small><i class="fa fa-thumbs-o-up" data-toggle="tooltip" data-placement="top" title="Recommend"></i> 0 recommendation</small></p>
      <?php

      if (!isset($_SESSION['seller_user_name'])) { ?>
        <a href="#" data-toggle="modal" data-target="#login-modal" class="btn btn-lg btn-block btn-success rounded-0 box-shadow-cheader">Message me</a>
      <?php } else { ?>
        <a href="<?= $site_url ?>/conversations/message?seller_id=<?= $proposal_seller_id; ?>" class="btn btn-lg btn-block btn-success rounded-0 box-shadow-cheader">Message me</a>
      <?php } ?>
      <hr>
      <div class="row">
        <div class="col-md-6">
          <p class="text-muted"><i class="fa fa-check pr-1"></i> From</p>
        </div>
        <div class="col-md-6">
          <p> <?= $proposal_seller_country; ?></p>
        </div>
        <div class="col-md-6">
          <p class="text-muted"><i class="fa fa-check pr-1"></i> Speaks</p>
        </div>
        <div class="col-md-6">
          <p>
            <?php
            $select_languages_relation = $db->select("languages_relation", array("seller_id" => $proposal_seller_id));
            while ($row_languages_relation = $select_languages_relation->fetch()) {
              $language_id = $row_languages_relation->language_id;

              $get_language = $db->select("seller_languages", array("language_id" => $language_id));
              $row_language = $get_language->fetch();
              $language_title = @$row_language->language_title;

            ?>
              <span><?= $language_title; ?></span>
            <?php } ?>
          </p>
        </div>
        <div class="col-md-6">
          <p class="text-muted"><i class="fa fa-check pr-1"></i> Positive Reviews</p>
          <p class="text-muted"><i class="fa fa-check pr-1"></i> Recent Delivery</p>
        </div>
        <div class="col-md-6">
          <p> <?= $proposal_seller_rating; ?>% </p>
          <p> <?= $proposal_seller_recent_delivery; ?> </p>
        </div>
      </div>
      <hr>
      <p class="text-left <?= ($lang_dir == "right" ? 'text-right' : '') ?>"> <?= $proposal_seller_about; ?> </p>
      <a href="<?= $site_url ?>/<?= $proposal_seller_user_name; ?>" class="text-success"> Read More </a>
    </div>

  </div>

  <style>
    .portfolio_card_style_outer {
      /* background-color: lightcyan; */
      width: 100%;
    }

    .portfolio_card_style {
      border: 1px solid lightgray;
      height: 450px;
      width: 100%;
      margin: auto;
      padding: 17px;
      border-radius: 15px;
    }

    .top_portfolio_card {
      width: 100%;
      /* Container ki width set kare */
      /* height: 200px; */
      /* Container ki height set kare */
      overflow: hidden;
      /* Overflow content ko hide kare */
      position: relative;
      /* Position ko relative set kare */
      border: 1px solid #ccc;
      /* Border add kare */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      /* Shadow effect ke liye */
      border-radius: 15px;

      /* Rounded corners ke liye */
    }


    .top_portfolio_card img {
      width: 100%;
      /* Image ko container ke width ke hisaab se fit kare */
      height: 100%;
      /* Image ko container ke height ke hisaab se fit kare */
      object-fit: cover;
      /* Image ko container me fit karne ke liye */
      display: block;
      /* Image ko block element banaye */
    }

    .bottom_portfolio_card {
      padding: 1rem 0px;
    }
  </style>
  <!-- portfolio -->

  <h2 class="mt-5 text-center"><u>Portfolio</u></h2>
  <?php
  $portfolio_current = $db->select("portfolios", array("seller_id" => $login_seller_id));
  while ($portfolio_current_get = $portfolio_current->fetch()) {
    $project_title = $portfolio_current_get->project_title;
    $description = $portfolio_current_get->description;

    if ($project_title != "") {
  ?>
      <div class="portfolio_card_style_outer mt-4 mb-4">
        <div class="portfolio_card_style">
          <div class="top_portfolio_card">
            <img src="../../images/hmp/mugdesignimage.png" alt="">
          </div>
          <div class="bottom_portfolio_card mt-3">
            <?php echo "<h5>" . $project_title . "</h5>";
            ?>
            <?php
            echo "<p>" . $description  . "</p>";
            ?>
            <a href=""> link </a>
          </div>
        </div>
      </div>

    <?php } else { ?>
      <a href="">
        <h5>Add portfolio</h5>
      </a>
  <?php }
  } ?>
  <!-- portfolio -->