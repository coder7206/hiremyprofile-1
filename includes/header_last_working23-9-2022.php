<?php
require_once("db.php");
require_once("extra_script.php");
if (!isset($_SESSION['error_array'])) {
  $error_array = array();
} else {
  $error_array = $_SESSION['error_array'];
}

if (isset($_SESSION['seller_user_name'])) {
  require_once("seller_levels.php");
  $seller_user_name = $_SESSION['seller_user_name'];
  $get_seller = $db->select("sellers", array("seller_user_name" => $seller_user_name));
  $row_seller = $get_seller->fetch();
  $seller_id = $row_seller->seller_id;
  $seller_email = $row_seller->seller_email;
  $seller_verification = $row_seller->seller_verification;
  $seller_image = getImageUrl2("sellers", "seller_image", $row_seller->seller_image);
  $count_cart = $db->count("cart", array("seller_id" => $seller_id));
  $select_seller_accounts = $db->select("seller_accounts", array("seller_id" => $seller_id));
  $count_seller_accounts = $select_seller_accounts->rowCount();
  if ($count_seller_accounts == 0) {
    $db->insert("seller_accounts", array("seller_id" => $seller_id));
  }
  $row_seller_accounts = $select_seller_accounts->fetch();
  $current_balance = $row_seller_accounts->current_balance;

  $get_general_settings = $db->select("general_settings");
  $row_general_settings = $get_general_settings->fetch();
  $enable_referrals = $row_general_settings->enable_referrals;
  $count_active_proposals = $db->count("proposals", array("proposal_seller_id" => $seller_id, "proposal_status" => 'active'));
}

function get_real_user_ip()
{
  //This is to check ip from shared internet network
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}
$ip = get_real_user_ip();

if (!isset($_COOKIE['close_announcement']) or @$_COOKIE['close_announcement'] != $bar_last_updated) {
  include("comp/announcement_bar.php");
}
$get_general_settings = $db->select("general_settings");
$row_general_settings = $get_general_settings->fetch();
$site_color = $row_general_settings->site_color;
$site_hover_color = $row_general_settings->site_hover_color;
$site_border_color = $row_general_settings->site_border_color;
?>
<link href="<?= $site_url; ?>/styles/scoped_responsive_and_nav.css" rel="stylesheet">
<link href="<?= $site_url; ?>/styles/vesta_homepage.css" rel="stylesheet">
<?php
if (isset($_SESSION['seller_user_name'])) {
  if ($seller_verification != "ok") {
?>
    <div class="alert alert-warning clearfix activate-email-class mb-0">
      <div class="float-left mt-2">
        <i style="font-size: 125%;" class="fa fa-exclamation-circle"></i>
        <?php
        $message = $lang['popup']['email_confirm']['text'];
        $message = str_replace('{seller_email}', $seller_email, $message);
        $message = str_replace('{link}', "$site_url/customer_support", $message);
        echo $message;
        ?>
      </div>
      <div class="float-right">
        <button id="send-email" class="btn btn-success btn-sm float-right text-white"><?= $lang["popup"]["email_confirm"]['button']; ?></button>
      </div>
    </div>
    <script>
      $(document).ready(function() {
        $("#send-email").click(function() {
          $("#wait").addClass('loader');
          $.ajax({
            method: "POST",
            url: "<?= $site_url; ?>/includes/send_email",
            success: function() {
              $("#wait").removeClass('loader');
              $("#send-email").html("Resend Email");
              swal({
                type: 'success',
                text: '<?= $lang['alert']['confirmation_email']; ?>',
              });
            }
          });
        });
      });
    </script>
<?php  }
} ?>


<div id="gnav-header" class="gnav-header global-nav clear gnav-3">
    <header id="gnav-header-inner" class="gnav-header-inner clear apply-nav-height col-group has-svg-icons body-max-width">
        <div class="col-xs-12">
            <div id="gigtodo-logo" class="apply-nav-height gigtodo-logo-svg gigtodo-logo-svg-logged-in
            <?php if(isset($_SESSION["seller_user_name"])){echo"loggedInLogo";} ?>" style="    width: 283px;
    top: -50px;
    left: 40px;">
                <a href="<?= $site_url; ?>">
                    <?php if($site_logo_type == "image"){ ?>
                       <!-- <img class="desktop" src="<?/*= $site_logo_image; */?>" width="150">-->
                        <img class="desktop m-0" src="<?= $site_url; ?>/images/hmp/logo.jpeg" width="150%"
                        style="        width: 242px;
    height: 61px;
    left: 40px;">
                    <?php }else{ ?>
                        <span class="desktop text-logo"><?= $site_logo_text; ?></span>
                    <?php } ?>
                    <?php if($enable_mobile_logo == 1){ ?>
                        <img class="mobile" src="<?= $site_mobile_logo; ?>" height="25">

                    <?php } ?>
                </a>
            </div>
            <button id="mobilemenu" class="unstyled-button mobile-catnav-trigger apply-nav-height icon-b-1 tablet-catnav-enabled <?= ($enable_mobile_logo == 0)?"left":""; ?>">
                <span class="screen-reader-only"></span>
                <div class="text-gray-lighter text-body-larger">
          <span class="gigtodo-icon hamburger-icon nav-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <path d="M20,6H4A1,1,0,1,1,4,4H20A1,1,0,0,1,20,6Z" />
              <path d="M20,13H4a1,1,0,0,1,0-2H20A1,1,0,0,1,20,13Z" />
              <path d="M20,20H4a1,1,0,0,1,0-2H20A1,1,0,0,1,20,20Z" />
            </svg>
          </span>
                </div>
            </button>
            <div class="catnav-search-bar search-browse-wrapper with-catnav">
                <div class="search-browse-inner">
                    <form id="gnav-search" class="search-nav expanded-search apply-nav-height" method="post">
                        <div class="gnav-search-inner clearable">
                            <label for="search-query" class="screen-reader-only">Search for items</label>
                            <div class="search-input-wrapper text-field-wrapper">
                                <input id="search-query" class="rounded" name="search_query"
                                       placeholder="<?= $lang['search']['placeholder']; ?>" value="<?= @$_SESSION["search_query"]; ?>"  autocomplete="off">
                            </div>
                            <div class="search-button-wrapper hide">
                                <button class="btn btn-primary" style="color:#FFF;background-color: <?php echo $site_color;?>" name="search" type="submit" value="Search">
                                    <?= $lang['search']['button']; ?>
                                </button>
                            </div>
                        </div>
                        <ul class="search-bar-panel d-none"></ul>
                    </form>
                </div>
            </div>
            <?php
            if (isset($_POST['search'])) {
                $search_query = $input->post('search_query');
                $_SESSION['search_query'] = $search_query;
                echo "<script>window.open('$site_url/search.php','_self')</script>";
            }
            ?>
            <ul class="account-nav apply-nav-height">
                <?php if (!isset($_SESSION["seller_user_name"])){ ?>
                    <li class="register-link">
                        <a href="<?= $site_url; ?>/freelancers" style="color: #868e96; font-weight: bold">Find Job</a>
                    </li>
                    <li class="sell-on-gigtodo-link d-none d-lg-block">
                        <a href="#" style="color: #868e96; font-weight: bold">
                            <span class="sell-copy" >
                                How it works?
                                <?/*= $lang['become_seller']; */?></span>

                        </a>
                    </li>
                    <li class="register-link">
                        <!--<a href="#" data-toggle="modal" data-target="#login-modal"><?/*= $lang['sign_in']; */?></a>-->
                        <a data-toggle="modal" data-target="#login-modal" style="color: #868e96; font-weight: bold">Log In</a>
                    </li>
                    <li class="sign-in-link mr-lg-0 mr-3">
                        <a href="#" class="btn btn_join" style="color: white;background-color: <?php echo $site_color;?>" data-toggle="modal" data-target="#register-modal">
                            <?php if ($deviceType == "phone") { echo $lang['mobile_join_now']; } else { echo $lang['join_now']; } ?>
                        </a>
                    </li>
                    <?php
                }else{
                    require_once("comp/UserMenu.php");
                }
                ?>
            </ul>
        </div>

    </header>


    <div class="row body-max-width" style="background-color: #f1f1f1; border-bottom: 1px solid lightgray;">
        <div class="row position-relative mb-2 mt-2 align-items-center justify-content-between w-100">
            <div class="col-lg-12 z-index-4 position-static col-auto padding-right-xs-0" style="margin-left: 52px">

                <ul class="list-unstyled d-flex mb-0 justify-content-lg-start padding-left-xs-0">

                    <li class="mr-4 d-lg-block d-none">
                        <div id="gigtodo-logo" class="d-lg-none d-flex align-items-center m-0 gigtodo-logo-svg gigtodo-logo-svg-logged-in  <?php if (isset($_SESSION["seller_user_name"])) {echo "loggedInLogo";} ?>">
                            <a href="<?= $site_url; ?>">
                                <?php if ($site_logo_type == "image") { ?>
                                    <!-- <img class="desktop" src="<?= $site_logo_image; ?>" width="150"> -->
                                    <img class="desktop m-0" src="<?= $site_url; ?>/images/hmp/logo.jpeg" width="250">
                                <?php } else { ?>
                                    <span class="desktop text-logo"><?= $site_logo_text; ?></span>
                                <?php } ?>
                                <?php if ($enable_mobile_logo == 1) { ?>
                                    <img class="mobile m-0" src="<?= $site_mobile_logo; ?>" height="25">
                                <?php } ?>
                            </a>
                        </div>

                        </span>
                        <!-- <span class="text-secondary">Hire by category</span> -->
                        </a>
                    </li>
                    <li class="mr-4 d-lg-block d-none">
                        <a data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                            <svg  width="16px" height="12px">
                                <path d="M0,7L0,5L16,5L16,7L0,7ZM0,0L16,0L16,2L0,2L0,0ZM12,12L0,12L0,10L12,10L12,12Z"></path>
                            </svg>
                            <span class="text-secondary">Hire by category</span>
                        </a>
                    </li>
                    <li class="mr-4 d-lg-block d-none">
                        <a data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">

                            <span class="text-secondary">Post Free Job</span>
                        </a>
                    </li>
                    <li class="mr-4 d-lg-block d-none">
                        <a data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">

                        <span class="text-secondary"><img src="<?= $site_url; ?>/images/hmp/hirexpert.jpeg" width="130px"
                                                          style="    margin-top: -5px;
    margin-bottom: -4px;
}"> </span>
                        </a>
                    </li>

                    <li class="mr-4 d-lg-block d-none">
                        <span class="text-secondary float-right">Post free job in minutes. Make a great hire fast!</span>
                    </li>

                    <li class="mr-4 d-lg-block d-none">
                        <a href="#" class="fa fa-facebook social_fig"></a>
                        <a href="#" class="fa fa-twitter social_fig"></a>
                        <a href="#" class="fa fa-linkedin social_fig"></a>
                    </li>

                </ul>

                <div class="collapse position-absolute w-100" id="navbarToggleExternalContent" style="top: 70%;">
                    <div data-ui="cat-nav" id="desktop-category-nav" class="ui-toolkit cat-nav">
                        <div class=" bg-transparent-homepage-experiment hide-xs hide-sm hide-md ">
                            <div class="body-max-width row">
                                <ul class="col-xs-2 body-max-width display-flex-xs  bg-white flex-column font-weight-bold py-3 px-0 pr-0 up-arrow position-relative" style="box-shadow: 0px 0px 5px rgb(0 0 0 / 20%), 0px 0px 5px rgb(0 0 0 / 20%);" role="menubar" data-ui="top-nav-category-list" aria-activedescendant="catnav-primary-link-10855">
                                    <?php
                                    $get_categories = $db->query("select * from categories where cat_featured='yes'" . ($lang_dir == "right" ? 'order by 1 DESC' : '') . " LIMIT 0,9");
                                    while ($row_categories = $get_categories->fetch()) {
                                        $cat_id = $row_categories->cat_id;
                                        $cat_url = $row_categories->cat_url;
                                        $get_meta = $db->select("cats_meta", array("cat_id" => $cat_id, "language_id" => $siteLanguage));
                                        $row_meta = $get_meta->fetch();
                                        @$cat_title = $row_meta->cat_title;
                                        ?>
                                        <li class="top-nav-item pt-xs-1 pb-xs-1 pl-xs-2 pr-xs-2 display-flex-xs align-items-center text-center " data-linkable="true" data-ui="top-nav-category-link" data-node-id="c-<?= $cat_id; ?>">
                                            <a class="px-3 py-1 d-flex justify-content-between align-items-center w-100" href="<?= $site_url; ?> /categories/<?= $cat_url; ?>">
                        <span>
                          <?= @$cat_title; ?>
                        </span>

                                                <svg class="" xmlns="http://www.w3.org/2000/svg" width="7" height="11">
                                                    <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9C-0.1,9.8-0.1,10.4,0.3,10.7z"></path>
                                                </svg>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <?php
                                    $count = $db->count("categories", array("cat_featured" => "yes"));
                                    if ($count > 10) {
                                        ?>
                                        <li class="top-nav-item pt-xs-1 pb-xs-1 pl-xs-2 pr-xs-2 display-flex-xs align-items-center text-center" data-linkable="true" data-ui="top-nav-category-link" data-node-id="c-more">
                                            <a href="#"><?= $lang['more']; ?></a>
                                        </li>
                                        <?php
                                    } else {
                                        $get_categories = $db->query("select * from categories where cat_featured='yes'" . ($lang_dir == "right" ? 'order by 1 DESC' : '') . " LIMIT 9,1");
                                        while ($row_categories = $get_categories->fetch()) {
                                            $cat_id = $row_categories->cat_id;
                                            $cat_url = $row_categories->cat_url;
                                            $get_meta = $db->select("cats_meta", array("cat_id" => $cat_id, "language_id" => $siteLanguage));
                                            $row_meta = $get_meta->fetch();
                                            @$cat_title = $row_meta->cat_title;
                                            ?>
                                            <li class="top-nav-item pt-xs-1 pb-xs-1 pl-xs-2 pr-xs-2 display-flex-xs align-items-center text-center" data-linkable="true" data-ui="top-nav-category-link" data-node-id="c-<?= $cat_id; ?>">
                                                <a href="<?= $site_url; ?>/categories/<?= $cat_url; ?>">
                                                    <?= @$cat_title; ?>
                                                </a>
                                            </li>
                                        <?php }
                                    } ?>
                                </ul>
                                <div class="col-centered col-xs-10 pl-0">
                                    <div class="h-100">
                                        <?php
                                        $get_categories = $db->query("select * from categories where cat_featured='yes'" . ($lang_dir == "right" ? 'order by 1 DESC' : '') . " LIMIT 0,10");
                                        while ($row_categories = $get_categories->fetch()) {
                                            $cat_id = $row_categories->cat_id;
                                            $cat_url = $row_categories->cat_url;
                                            $get_meta = $db->select("cats_meta", array("cat_id" => $cat_id, "language_id" => $siteLanguage));
                                            $row_meta = $get_meta->fetch();
                                            @$cat_title = $row_meta->cat_title;
                                            $count = $db->count("categories_children", array("child_parent_id" => $cat_id));
                                            if ($count > 0) {
                                                ?>
                                                <div class="body-sub-width vertical-align-top sub-nav-container bg-white overflow-hidden  catnav-mott-control display-none h-100" style="box-shadow: 15px 0px 5px rgb(0 0 0 / 20%), 0px 0px 5px rgb(0 0 0 / 20%);" data-ui="sub-nav" aria-hidden="true" data-node-id="c-<?= $cat_id; ?>">
                                                    <div class="width-full h-100">
                                                        <div class="row h-100">
                                                            <ul class="list-unstyled   p-xs-3 pl-xs-5  col-xs-6 align-content-flex-start row" role="presentation">
                                                                <?php
                                                                $get_child_cat = $db->query("select * from categories_children where child_parent_id='$cat_id' LIMIT 0,10");
                                                                while ($row_child_cat = $get_child_cat->fetch()) {
                                                                    $child_id = $row_child_cat->child_id;
                                                                    $child_url = $row_child_cat->child_url;
                                                                    $get_meta = $db->select("child_cats_meta", array("child_id" => $child_id, "language_id" => $siteLanguage));
                                                                    $row_meta = $get_meta->fetch();
                                                                    $child_title = $row_meta->child_title;
                                                                    ?>
                                                                    <li class="col-xs-6 text-nowrap ">
                                                                        <a class="display-block text-gray text-body-larger pt-xs-1" href="<?= $site_url; ?>/categories/<?= $cat_url; ?>/<?= $child_url; ?>">
                                                                            <?= $child_title; ?>
                                                                        </a>
                                                                    </li>
                                                                <?php } ?>
                                                            </ul>
                                                            <!-- <div class="b-lg-1 h-100"></div> -->
                                                            <ul class="list-unstyled   p-xs-3 pl-xs-5  row col-xs-6 align-content-flex-start " role="presentation">
                                                                <?php
                                                                $get_child_cat = $db->query("select * from categories_children where child_parent_id='$cat_id' LIMIT 10,10");
                                                                while ($row_child_cat = $get_child_cat->fetch()) {
                                                                    $child_id = $row_child_cat->child_id;
                                                                    $child_url = $row_child_cat->child_url;
                                                                    $get_meta = $db->select("child_cats_meta", array("child_id" => $child_id, "language_id" => $siteLanguage));
                                                                    $row_meta = $get_meta->fetch();
                                                                    $child_title = $row_meta->child_title;
                                                                    ?>
                                                                    <li class="col-xs-6 text-nowrap">
                                                                        <a class="display-block text-gray text-body-larger pt-xs-1" href="<?= $site_url; ?>/categories/<?= $cat_url; ?>/<?= $child_url; ?>">
                                                                            <?= $child_title; ?>
                                                                        </a>
                                                                    </li>
                                                                <?php } ?>
                                                            </ul>
                                                        </div>
                                                        <div class="row">
                                                            <ul class="list-unstyled  col-xs-6 row p-xs-3 pl-xs-5 align-content-flex-start" role="presentation">
                                                                <?php
                                                                $get_child_cat = $db->query("select * from categories_children where child_parent_id='$cat_id' LIMIT 20,10");
                                                                while ($row_child_cat = $get_child_cat->fetch()) {
                                                                    $child_id = $row_child_cat->child_id;
                                                                    $child_url = $row_child_cat->child_url;
                                                                    $get_meta = $db->select("child_cats_meta", array("child_id" => $child_id, "language_id" => $siteLanguage));
                                                                    $row_meta = $get_meta->fetch();
                                                                    $child_title = $row_meta->child_title;
                                                                    ?>
                                                                    <li>
                                                                        <a class="display-block text-gray text-body-larger pt-xs-1" href="<?= $site_url; ?>/categories/<?= $cat_url; ?>/<?= $child_url; ?>">
                                                                            <?= $child_title; ?>
                                                                        </a>
                                                                    </li>
                                                                <?php } ?>
                                                            </ul>
                                                            <ul class="list-unstyled  col-xs-6 row p-xs-3 pl-xs-5 align-content-flex-start" role="presentation">
                                                                <?php
                                                                $get_child_cat = $db->query("select * from categories_children where child_parent_id='$cat_id' LIMIT 30,10");
                                                                while ($row_child_cat = $get_child_cat->fetch()) {
                                                                    $child_id = $row_child_cat->child_id;
                                                                    $child_url = $row_child_cat->child_url;
                                                                    $get_meta = $db->select("child_cats_meta", array("child_id" => $child_id, "language_id" => $siteLanguage));
                                                                    $row_meta = $get_meta->fetch();
                                                                    $child_title = $row_meta->child_title;
                                                                    ?>
                                                                    <li>
                                                                        <a class="display-block text-gray text-body-larger pt-xs-1" href="<?= $site_url; ?>/categories/<?= $cat_url; ?>/<?= $child_url; ?>">
                                                                            <?= $child_title; ?>
                                                                        </a>
                                                                    </li>
                                                                <?php } ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                        <div class="body-sub-width vertical-align-top sub-nav-container bg-white overflow-hidden bl-xs-1 bb-xs-1 br-xs-1 catnav-mott-control display-none" data-ui="sub-nav" aria-hidden="true" data-node-id="c-more">
                                            <div class="width-full display-flex-xs">
                                                <ul class="list-unstyled display-inline-block col-xs-3 p-xs-3 pl-xs-5" role="presentation">
                                                    <?php
                                                    $get_categories = $db->query("select * from categories where cat_featured='yes' LIMIT 9,19");
                                                    while ($row_categories = $get_categories->fetch()) {
                                                        $cat_id = $row_categories->cat_id;
                                                        $cat_url = $row_categories->cat_url;
                                                        $get_meta = $db->select("cats_meta", array("cat_id" => $cat_id, "language_id" => $siteLanguage));
                                                        $row_meta = $get_meta->fetch();
                                                        $cat_title = $row_meta->cat_title;
                                                        ?>
                                                        <li>
                                                            <a class="display-block text-gray text-body-larger pt-xs-1" href="<?= $site_url; ?>/categories/<?= $cat_url; ?>">
                                                                <?= @$cat_title; ?>
                                                            </a>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                                <ul class="list-unstyled display-inline-block col-xs-3 p-xs-3 pl-xs-5" role="presentation">
                                                    <?php
                                                    $get_categories = $db->query("select * from categories where cat_featured='yes' LIMIT 19,29");
                                                    while ($row_categories = $get_categories->fetch()) {
                                                        $cat_id = $row_categories->cat_id;
                                                        $cat_url = $row_categories->cat_url;
                                                        $get_meta = $db->select("cats_meta", array("cat_id" => $cat_id, "language_id" => $siteLanguage));
                                                        $row_meta = $get_meta->fetch();
                                                        $cat_title = $row_meta->cat_title;
                                                        ?>
                                                        <li>
                                                            <a class="display-block text-gray text-body-larger pt-xs-1" href="<?= $site_url; ?>/categories/<?= $cat_url; ?>">
                                                                <?= @$cat_title; ?>
                                                            </a>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                                <ul class="list-unstyled display-inline-block col-xs-3 p-xs-3 pl-xs-5" role="presentation">
                                                    <?php
                                                    $get_categories = $db->query("select * from categories where cat_featured='yes' LIMIT 29,39");
                                                    while ($row_categories = $get_categories->fetch()) {
                                                        $cat_id = $row_categories->cat_id;
                                                        $cat_url = $row_categories->cat_url;
                                                        $get_meta = $db->select("cats_meta", array("cat_id" => $cat_id, "language_id" => $siteLanguage));
                                                        $row_meta = $get_meta->fetch();
                                                        $cat_title = $row_meta->cat_title;
                                                        ?>
                                                        <li>
                                                            <a class="display-block text-gray text-body-larger pt-xs-1" href="<?= $site_url; ?>/categories/<?= $cat_url; ?>">
                                                                <?= @$cat_title; ?>
                                                            </a>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>



    </div>


</div>





<div class="clearfix"></div>
<?php include("comp/categories_nav.php"); ?>
<div class="clearfix"></div>
<?php if (isset($_GET['not_available'])) { ?>
  <!-- Alert to show wrong url or unregistered account end -->
  <div class="alert alert-danger text-center mb-0 h6">
    <?= $lang['not_availble']; ?>
  </div>
<?php } ?>
<?php require_once("register_login_forgot_modals.php"); ?>
<?php require_once("register_login_forgot.php"); ?>
<?php require_once("external_stylesheet.php"); ?>

<?php /*include("includes/navigations.php"); */?>
