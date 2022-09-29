<?php
session_start();
require_once("../includes/db.php");
require_once("../functions/functions.php");

if (isset($_GET['cat_url'])) {
  if (isset($_GET['cat_child_url'])) {
    $array = explode("/", $input->get('cat_url'));
    $cat_url = $array[0];
  } else {
    $cat_url = $input->get('cat_url');
  }
  unset($_SESSION['cat_child_id']);
  $get_cat = $db->select("categories", array('cat_url' => urlencode($cat_url)));
  $count_cat = $get_cat->rowCount();
  if ($count_cat == 0) {
    echo "<script>window.open('$site_url/index?not_available','_self');</script>";
  }
  $cat_id = $get_cat->fetch()->cat_id;
  $_SESSION['cat_id'] = $cat_id;
}
if (isset($_GET['cat_child_url'])) {
  unset($_SESSION['cat_id']);
  $get_cat = $db->select("categories", array('cat_url' => urlencode($cat_url)));
  $cat_id = $get_cat->fetch()->cat_id;

  $get_child = $db->select("categories_children", array('child_parent_id' => $cat_id, 'child_url' => urlencode($input->get('cat_child_url'))));
  $count_child = $get_child->rowCount();
  if ($count_child == 0) {
    echo "<script>window.open('$site_url/index?not_available','_self');</script>";
  }
  $_SESSION['cat_child_id'] = $get_child->fetch()->child_id;
}
?>
<!DOCTYPE html>
<html lang="en" class="ui-toolkit">

<head>
  <?php
  if (isset($_SESSION['cat_id'])) {
    $cat_id = $_SESSION['cat_id'];
    $get_meta = $db->select("cats_meta", array("cat_id" => $cat_id, "language_id" => $siteLanguage));
    $row_meta = $get_meta->fetch();
    $cat_title = $row_meta->cat_title;
    $cat_desc = $row_meta->cat_desc;
  ?>
    <title><?= $site_name; ?> - <?= $cat_title; ?> </title>
    <meta name="description" content="<?= $cat_desc; ?>">
  <?php } ?>
  <?php
  if (isset($_SESSION['cat_child_id'])) {
    $cat_child_id = $_SESSION['cat_child_id'];
    $get_meta = $db->select("child_cats_meta", array("child_id" => $cat_child_id, "language_id" => $siteLanguage));
    $row_meta = $get_meta->fetch();
    $child_title = $row_meta->child_title;
    $child_desc = $row_meta->child_desc;
  ?>
    <title><?= $site_name; ?> - <?= $child_title; ?></title>
    <meta name="description" content="<?= $child_desc; ?>">
  <?php } ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="<?= $site_author; ?>">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet">
  <link href="<?= $site_url; ?>/styles/bootstrap.css" rel="stylesheet">
  <link href="<?= $site_url; ?>/styles/custom.css" rel="stylesheet">
  <!-- Custom css code from modified in admin panel --->
  <link href="<?= $site_url; ?>/styles/styles.css" rel="stylesheet">
  <link href="<?= $site_url; ?>/styles/categories_nav_styles.css" rel="stylesheet">
  <link href="<?= $site_url; ?>/font_awesome/css/font-awesome.css" rel="stylesheet">
  <link href="<?= $site_url; ?>/styles/sweat_alert.css" rel="stylesheet">
  <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
  <script src="<?= $site_url; ?>/js/ie.js"></script>
  <script type="text/javascript" src="<?= $site_url; ?>/js/sweat_alert.js"></script>
  <script type="text/javascript" src="<?= $site_url; ?>/js/jquery.min.js"></script>
  <?php if (!empty($site_favicon)) { ?>
    <link rel="shortcut icon" href="<?= $site_favicon; ?>" type="image/x-icon">
  <?php } ?>
</head>

<body class="bg-white is-responsive">
  <?php require_once("../includes/header.php"); ?>

  <!-- ############### NEW HTML CODE: START ############### -->

  <div class="about-section-1 container-fluid pt-5">
    <div class="row">
      <div class="col-xl-3 col-lg-4">
        <div class="card card1 theme-bg text-white border-0 px-sm-4 px-2  py-3 w-100 mb-4">
          <label class="mb-0">Welcome back.</label>
          <h4>Nishtha</h4>
          <div class="d-flex align-items-center justify-content-space-between">
            <h5><a class="text-white" href="">@nishthadhanwan20</a></h5>
            <h6>FREE MEMBER</h6>
          </div>

        </div>
        <div class="card card1 theme-bg text-white border-0 px-sm-4 px-2  py-3">

          <div class="d-flex align-items-center justify-content-space-between">
            <h6 class="pr-4">Accelerate your career by upgrading to a membership today.<a class="text-white" href=""> Get started <i class="fa fa-arrow-right"></i></a></h6>
            <svg fill="#fff" width="50px" x="0px" y="0px" viewBox="0 0 490 490" style="enable-background:new 0 0 490 490;">
              <path d="M122.5,34.031L0,245.001l122.5,210.968h245L490,245.001L367.5,34.031H122.5z M287.558,318.293h-85.116l-42.557-73.292l42.557-73.292h85.116l42.557,73.292L287.558,318.293z" />
            </svg>
          </div>

        </div>
        <div class="card card1  text-dark border-0 px-0 py-3 mb-4">
          <div class="d-flex align-items-center justify-content-space-between">
            <h6>Set up your account</h6>
            <h6>56%</h6>
          </div>
          <div class="progress" style="height: 10px; border-radius: 1rem;">
            <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
        <div class="card card1 theme-bg text-white border-0  px-sm-4 px-2  py-3 d-flex align-items-center justify-content-space-between w-100 flex-row mb-4">
          <h6 class="mb-0 text-white"> <i class="fa fa-address-card mr-3"></i> <span>Add your address</span></h6>
          <label class="mb-0 text-white font-weight-bold">+5 %</label>
        </div>
        <div class="card card1 bg-white theme-text  px-0 py-3 bl-xs-0 br-xs-0 rounded-0 mb-4">
          <h3>Try Corporate Membership for FREE</h3>
        </div>
        <div class="card card1 theme-bg font-weight-bold border-0 px-sm-4 px-2 py-3 d-flex align-items-center justify-content-space-between w-100 flex-row mb-4 text-largest ">
          <div class="row middle-border position-relative ">
            <a class="col-6 py-2 text-white ">Post a Job Free</a>
            <a class="col-6 py-2 text-white ">Find a Service</a>
            <a class="col-6 py-2 text-white">Hire an Expert</a>
            <a class="col-6 py-2 text-white">Contact Support</a>
          </div>
        </div>
      </div>

      <div class="col-xl-9 col-lg-8 pb-5">
        <div class="nav nav-tabs font-weight-bold text-largest" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" data-toggle="tab" href="#Buyer" role="tab" aria-selected="true">Buyer </a>
          <a class="nav-item nav-link" data-toggle="tab" href="#Seller" role="tab" aria-selected="false">Seller</a>
        </div>
        <div class="pt-5">
          <p>Whether you need a logo designed for your new website, or a video presenter who will help you introduce your company to potential clients, or even a tutor to help you with school assignments, you are at the right place. For everything that you do not know how to do yourself, or you simply don't have the time, GigToDo sellers are at your service.</p>
          <div class="row ">
            <div class="col-md-6 pt-5">
              <div class="d-flex">
                <div class="pr-5">
                  <i class="fa fa-search fa-3x text-primary"></i>
                </div>
                <div>
                  <h3>1) Find a service that you need</h3>
                  <p>Compare prices, portfolios, delivery time, ratings and community recommendations in order to find a seller that best suits your needs. If you have a specific question, simply send them an enquiry. You can also post a request.</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 pt-5">
              <div class="d-flex">
                <div class="pr-5">
                  <i class="fa fa-file-text-o fa-3x text-warning"></i>
                </div>
                <div>
                  <h3>2) Submit your details</h3>
                  <p>Be as detailed as possible so the seller can provide you with the quality service that you are expecting. Your payment is held secure until you confirm that the service is performed to your satisfaction.</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 pt-5">
              <div class="d-flex">
                <div class="pr-5">
                  <i class="fa  fa-3x fa-comments-o text-danger"></i>
                </div>
                <div>
                  <h3>3) Follow up the transaction</h3>
                  <p>Exchange files and feedback with the seller via the built-in conversation and transaction management system. The seller will deliver service within a specified time frame.</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 pt-5">
              <div class="d-flex">
                <div class="pr-5">
                  <i class="fa  fa-3x fa-check-square-o text-green1"></i>
                </div>
                <div>
                  <h3>4) Proposal/Service Delivered</h3>
                  <p>Once you are happy with the service performed & delivered, you can mark the transaction complete, and we'll make sure that the seller gets paid. Help the community by leaving a feedback for the seller.</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 pt-5">
              <div class="d-flex">
                <div class="pr-5">
                  <i class="fa  fa-3x fa-refresh text-purple"></i>
                </div>
                <div>
                  <h3>5) Request For Modification</h3>
                  <p>If for some reason you are not satisfied with the work delivered. you can go ahead and request for modification, and your seller will</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 pt-5">
              <div class="d-flex">
                <div class="pr-5">
                  <i class="fa  fa-3x fa-star text-nacho-cheese"></i>
                </div>
                <div>
                  <h3>6) Rate Your Seller</h3>
                  <p>Once completed, please rate and provide feedback about your seller. This will help inform the decisions of other buyers looking</p>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>


  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="Buyer" role="tabpanel">
      <div class="about-section-2 pt-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-6">
              <h1 class="font-weight-normal mb-lg-4 mb-0">Manage Orders</h1>
              <div class="nav  nav-tabs2  d-lg-flex d-none flex-nowrap  text-center" id="nav-tab" role="tablist">
                <a class="nav-item d-flex align-items-center pb-4 nav-link active" data-toggle="tab" href="#home" role="tab">ACTIVE</a>
                <a class="nav-item d-flex align-items-center pb-4 nav-link" data-toggle="tab" href="#MissingDetails" role="tab">MISSING DETAILS</a>
                <a class="nav-item d-flex align-items-center pb-4 nav-link" data-toggle="tab" href="#AwaitingMyReview" role="tab">AWAITING MY REVIEW</a>
                <a class="nav-item d-flex align-items-center pb-4 nav-link" data-toggle="tab" href="#Delivered" role="tab">DELIVERED</a>
                <a class="nav-item d-flex align-items-center pb-4 nav-link" data-toggle="tab" href="#Completed" role="tab">COMPLETED <span class="ml-2 badge p-1 text-white d-inline-flex justify-content-center align-items-center rounded-circle">66</span></a>
                <a class="nav-item d-flex align-items-center pb-4 nav-link" data-toggle="tab" href="#Cance" role="tab">CANCE</a>
              </div>
              <div class="accordion" id="ManageOrders">
                <div class="tab-content px-3  pb-5 pt-lg-5 pt-0" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel">
                    <button class="btn rounded-0 d-lg-none d-flex w-100 mt-3 mt-lg-0 align-align-items-center py-3 btn-accordion" type="button" data-toggle="collapse" data-target="#home1">ACTIVE</button>
                    <div id="home1" class="collapse show d-lg-block" data-parent="#ManageOrders">

                      <ul class="list-group">
                        <li class="list-group-item theme-bg text-white theme-border-o">
                          <h5 class="mb-0">ORDERS AWAITING REVIEW</h5>
                        </li>
                        <!-- <li class="list-group-item theme-bg text-white theme-border-o"></li> -->
                        <li class="list-group-item theme-bg text-white theme-border-o">
                          <picture class="d-inline-block vertical-align-middle overflow-hidden mr-4 bg-light">
                            <source srcset="<?= $site_url; ?>/images/hmp/main-banner.png">
                            <img src="<?= $site_url; ?>/images/hmp/main-banner.png">
                          </picture>
                          <button class="btn btn-small px-1 py-0 text-smallest font-weight-bold position-static btn-twitter">CUSTOM ORDER </button>
                          <button class="btn btn-small px-1 py-0 text-smallest font-weight-bold position-static btn-facebook">TEAM ORDER </button>
                          <span class="d-lg-inline-block d-block">be your full time customer support agent</span>
                        </li>
                        <li class="list-group-item theme-bg text-white theme-border-o">
                          <picture class="d-inline-block vertical-align-middle overflow-hidden mr-4 bg-light">
                            <source srcset="<?= $site_url; ?>/images/hmp/user-pic.jpg">
                            <img src="<?= $site_url; ?>/images/hmp/user-pic.jpg">
                          </picture>
                          <button class="btn btn-small px-1 py-0 text-smallest font-weight-bold position-static btn-twitter">CUSTOM ORDER </button>
                          <button class="btn btn-small px-1 py-0 text-smallest font-weight-bold position-static btn-facebook">TEAM ORDER </button>
                          <span class="d-lg-inline-block d-block">resolve laravel, PHP, HTML, CSS, javascript and mysql bugs</span>
                        </li>


                      </ul>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="MissingDetails" role="tabpanel">
                    <button class="btn rounded-0 d-lg-none d-flex w-100 mt-3 mt-lg-0 align-align-items-center py-3 btn-accordion" type="button" data-toggle="collapse" data-target="#MissingDetails1" aria-expanded="false">
                      MISSING DETAILS
                    </button>
                    <div id="MissingDetails1" class="collapse d-lg-block" data-parent="#ManageOrders">
                      MISSING DETAILS
                    </div>
                  </div>
                  <div class="tab-pane fade" id="AwaitingMyReview" role="tabpanel">
                    <button class="btn rounded-0 d-lg-none d-flex w-100 mt-3 mt-lg-0 align-align-items-center py-3 btn-accordion" type="button" data-toggle="collapse" data-target="#AwaitingMyReview1" aria-expanded="false">
                      AWAITING MY REVIEW
                    </button>
                    <div id="AwaitingMyReview1" class="collapse d-lg-block" data-parent="#ManageOrders">tst3</div>
                  </div>
                  <div class="tab-pane fade" id="Delivered" role="tabpanel">
                    <button class="btn rounded-0 d-lg-none d-flex w-100 mt-3 mt-lg-0 align-align-items-center py-3 btn-accordion" type="button" data-toggle="collapse" data-target="#Delivered1" aria-expanded="false">
                      DELIVERED
                    </button>
                    <div id="Delivered1" class="collapse d-lg-block" data-parent="#ManageOrders">tst4</div>
                  </div>
                  <div class="tab-pane fade" id="Completed" role="tabpanel">
                    <button class="btn rounded-0 d-lg-none d-flex w-100 mt-3 mt-lg-0 align-align-items-center py-3 btn-accordion" type="button" data-toggle="collapse" data-target="#Completed1" aria-expanded="false">
                      COMPLETED <span class="p-1 text-white d-inline-flex justify-content-center align-items-center rounded-circle badge ml-2">66</span>
                    </button>
                    <div id="Completed1" class="collapse d-lg-block" data-parent="#ManageOrders">tst5</div>
                  </div>
                  <div class="tab-pane fade" id="Cance" role="tabpanel">
                    <button class="btn rounded-0 d-lg-none d-flex w-100 mt-3 mt-lg-0 align-align-items-center py-3 btn-accordion" type="button" data-toggle="collapse" data-target="#Cance1" aria-expanded="false">
                      CANCE
                    </button>
                    <div id="Cance1" class="collapse d-lg-block" data-parent="#ManageOrders">tst6</div>
                  </div>
                </div>
              </div>

            </div>

            <div class="col-xl-6">
              <h1 class="font-weight-normal mb-lg-4 mb-0">Manage Requests</h1>
              <div class="nav  nav-tabs2  d-lg-flex d-none flex-nowrap  text-center" id="nav-tab" role="tablist">
                <a class="nav-item d-flex align-items-center pb-4 nav-link active" data-toggle="tab" href="#home-active" role="tab">ACTIVE <span class="ml-2 badge p-1 text-white d-inline-flex justify-content-center align-items-center rounded-circle">66</span></a>
                <a class="nav-item d-flex align-items-center pb-4 nav-link" data-toggle="tab" href="#PAUSED" role="tab">PAUSED </a>
                <a class="nav-item d-flex align-items-center pb-4 nav-link" data-toggle="tab" href="#PENDING" role="tab">PENDING</a>
                <a class="nav-item d-flex align-items-center pb-4 nav-link" data-toggle="tab" href="#UNAPPROVED" role="tab">UNAPPROVED</a>
              </div>
              <div class="accordion" id="MISSINGDETAILS">
                <div class="tab-content px-3 pb-5 pt-lg-5 pt-0" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="home-active" role="tabpanel">
                    <button class="btn rounded-0 d-lg-none d-flex w-100 mt-3 mt-lg-0 align-align-items-center py-3 btn-accordion" type="button" data-toggle="collapse" data-target="#home-active1">ACTIVE</button>
                    <div id="home-active1" class="collapse show d-lg-block" data-parent="#MISSINGDETAILS">

                      <div class="table-responsive bg-white">
                        <table class="table table-bordered mb-0 theme-bg text-white">
                          <thead>
                            <tr>
                              <th class="text-white" scope="col">DATE</th>
                              <th class="text-white" scope="col">REQUEST</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="text-nowrap">Jun 19, 22</td>
                              <td>
                                <div class="d-block">
                                  hi, could you develop a ebook subscription based website, in which there will be quiz and gamification of quiz also needs to be...
                                  <a data-toggle="collapse" data-target="#seemore" class="font-weight-bold theme-text-o">See more
                                    <i class="fa fa-chevron-circle-down"></i>
                                  </a>
                                </div>
                                <div class="collapse text-white" id="seemore">
                                  See more
                                </div>
                                <div class="d-block">
                                  <span class="d-block my-2 text-white">Delivery Time 30 days Budget-$1,000</span>
                                  <a class="d-flex text-smaller theme-text-o"><i class="fa fa-arrow-circle-down mr-1"></i> ADMIN_ Business DASH... <span class="text-white ml-3">(19.3 KB)</span> </a>
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="PAUSED" role="tabpanel">
                    <button class="btn rounded-0 d-lg-none d-flex w-100 mt-3 mt-lg-0 align-align-items-center py-3 btn-accordion" type="button" data-toggle="collapse" data-target="#PAUSED1" aria-expanded="false">
                      MISSING DETAILS
                    </button>
                    <div id="PAUSED1" class="collapse d-lg-block" data-parent="#MISSINGDETAILS">
                      sss
                    </div>
                  </div>
                  <div class="tab-pane fade" id="PENDING" role="tabpanel">
                    <button class="btn rounded-0 d-lg-none d-flex w-100 mt-3 mt-lg-0 align-align-items-center py-3 btn-accordion" type="button" data-toggle="collapse" data-target="#PENDING1" aria-expanded="false">
                      AWAITING MY REVIEW
                    </button>
                    <div id="PENDING1" class="collapse d-lg-block" data-parent="#MISSINGDETAILS">tst3</div>
                  </div>
                  <div class="tab-pane fade" id="UNAPPROVED" role="tabpanel">
                    <button class="btn rounded-0 d-lg-none d-flex w-100 mt-3 mt-lg-0 align-align-items-center py-3 btn-accordion" type="button" data-toggle="collapse" data-target="#UNAPPROVED1" aria-expanded="false">
                      UNAPPROVED
                    </button>
                    <div id="UNAPPROVED1" class="collapse d-lg-block" data-parent="#MISSINGDETAILS">tst4</div>
                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>

      </div>

      <div class="about-section3 py-5 container-fluid">
        <div class="body-max-width">
          <div class="d-flex align-items-end justify-content-between mb-4">
            <div>
              <h3>Top Pro services in <span class="theme-text">WordPress</span></h3>
              <p class="mb-0">Hand-vetted talent for all your professional needs.</p>
            </div>
            <a class="btn theme-btn text-white">See All</a>
          </div>
          <!-- <span class="online position-absolute fa fa-circle">test</span> -->
          <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
              <div class="card-box card">
                <div class="subcategory">
                  <picture class="card-img-top">
                    <img class="rounded-0" src="<?= $site_url; ?>/card_images/1.jpg">
                  </picture>
                  <div class="card-body">
                    <div class="d-flex">
                      <div class="rounded-circle overflow-hidden d-flex justify-content-center align-items-center user-pic">
                        <img class="w-100 h-100 " src="<?= $site_url; ?>/images/hmp/user-pic.jpg" alt="">
                      </div>
                      <div class="px-3 d-flex justify-content-between w-100 align-items-center">
                        <div class="">
                          <h5 class="card-title font-weight-bold mb-0">taibacreation</h5>
                          <!-- <small class="text-secondary">New Seller</small> -->
                        </div>
                        <!-- <div class="text-secondary">
                <i class="fa fa-heart"></i>
              </div> -->
                      </div>
                    </div>
                    <p class="my-4">I will create a responsive wordpress website design</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="font-weight-bold text-info">
                        <i class="fa fa-star"></i>
                        <span>4.9</span>
                        <span class="font-weight-normal text-secondary">(66)</span>
                      </div>
                      <div class="brand-logo">
                        Pro VERIFIED
                      </div>
                    </div>
                  </div>
                  <div class=" d-flex justify-content-between align-items-center py-3 px-3 bt-xs-1 ">
                    <ul class="list-inline mb-0">
                      <li class="list-inline-item dropdown">
                        <a id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="text-muted fa fa-bars"></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </li>
                      <li class="list-inline-item">
                        <a class="text-muted fa fa-heart"></a>
                      </li>
                    </ul>
                    <div>
                      <span class="text-secondary">STARTING AT </span>
                      <strong class="text-largest pl-2">$20.00</strong>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
              <div class="card-box card">
                <div class="subcategory">
                  <picture class="card-img-top">
                    <img class="rounded-0" src="<?= $site_url; ?>/card_images/2.jpg">
                  </picture>
                  <div class="card-body">
                    <div class="d-flex">
                      <div class="rounded-circle overflow-hidden d-flex justify-content-center align-items-center user-pic">
                        <img class="w-100 h-100 " src="<?= $site_url; ?>/images/hmp/user-pic.jpg" alt="">
                      </div>
                      <div class="px-3 d-flex justify-content-between w-100 align-items-center">
                        <div class="">
                          <h5 class="card-title font-weight-bold mb-0">taibacreation</h5>
                          <!-- <small class="text-secondary">New Seller</small> -->
                        </div>
                        <!-- <div class="text-secondary">
                <i class="fa fa-heart"></i>
              </div> -->
                      </div>
                    </div>
                    <p class="my-4">I will create a responsive wordpress website design</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="font-weight-bold text-info">
                        <i class="fa fa-star"></i>
                        <span>4.9</span>
                        <span class="font-weight-normal text-secondary">(66)</span>
                      </div>
                      <div class="brand-logo">
                        Pro VERIFIED
                      </div>
                    </div>
                  </div>
                  <div class=" d-flex justify-content-between align-items-center py-3 px-3 bt-xs-1 ">
                    <ul class="list-inline mb-0">
                      <li class="list-inline-item dropdown">
                        <a id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="text-muted fa fa-bars"></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </li>
                      <li class="list-inline-item">
                        <a class="text-muted fa fa-heart"></a>
                      </li>
                    </ul>
                    <div>
                      <span class="text-secondary">STARTING AT </span>
                      <strong class="text-largest pl-2">$20.00</strong>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
              <div class="card-box card">
                <div class="subcategory">
                  <picture class="card-img-top">
                    <img class="rounded-0" src="<?= $site_url; ?>/card_images/3.jpg">
                  </picture>
                  <div class="card-body">
                    <div class="d-flex">
                      <div class="rounded-circle overflow-hidden d-flex justify-content-center align-items-center user-pic">
                        <img class="w-100 h-100 " src="<?= $site_url; ?>/images/hmp/user-pic.jpg" alt="">
                      </div>
                      <div class="px-3 d-flex justify-content-between w-100 align-items-center">
                        <div class="">
                          <h5 class="card-title font-weight-bold mb-0">taibacreation</h5>
                          <!-- <small class="text-secondary">New Seller</small> -->
                        </div>
                        <!-- <div class="text-secondary">
                <i class="fa fa-heart"></i>
              </div> -->
                      </div>
                    </div>
                    <p class="my-4">I will create a responsive wordpress website design</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="font-weight-bold text-info">
                        <i class="fa fa-star"></i>
                        <span>4.9</span>
                        <span class="font-weight-normal text-secondary">(66)</span>
                      </div>
                      <div class="brand-logo">
                        Pro VERIFIED
                      </div>
                    </div>
                  </div>
                  <div class=" d-flex justify-content-between align-items-center py-3 px-3 bt-xs-1 ">
                    <ul class="list-inline mb-0">
                      <li class="list-inline-item dropdown">
                        <a id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="text-muted fa fa-bars"></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </li>
                      <li class="list-inline-item">
                        <a class="text-muted fa fa-heart"></a>
                      </li>
                    </ul>
                    <div>
                      <span class="text-secondary">STARTING AT </span>
                      <strong class="text-largest pl-2">$20.00</strong>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
              <div class="card-box card">
                <div class="subcategory">
                  <picture class="card-img-top">
                    <img class="rounded-0" src="<?= $site_url; ?>/card_images/4.jpg">
                  </picture>
                  <div class="card-body">
                    <div class="d-flex">
                      <div class="rounded-circle overflow-hidden d-flex justify-content-center align-items-center user-pic">
                        <img class="w-100 h-100 " src="<?= $site_url; ?>/images/hmp/user-pic.jpg" alt="">
                      </div>
                      <div class="px-3 d-flex justify-content-between w-100 align-items-center">
                        <div class="">
                          <h5 class="card-title font-weight-bold mb-0">taibacreation</h5>
                          <!-- <small class="text-secondary">New Seller</small> -->
                        </div>
                        <!-- <div class="text-secondary">
                <i class="fa fa-heart"></i>
              </div> -->
                      </div>
                    </div>
                    <p class="my-4">I will create a responsive wordpress website design</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="font-weight-bold text-info">
                        <i class="fa fa-star"></i>
                        <span>4.9</span>
                        <span class="font-weight-normal text-secondary">(66)</span>
                      </div>
                      <div class="brand-logo">
                        Pro VERIFIED
                      </div>
                    </div>
                  </div>
                  <div class=" d-flex justify-content-between align-items-center py-3 px-3 bt-xs-1 ">
                    <ul class="list-inline mb-0">
                      <li class="list-inline-item dropdown">
                        <a id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="text-muted fa fa-bars"></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </li>
                      <li class="list-inline-item">
                        <a class="text-muted fa fa-heart"></a>
                      </li>
                    </ul>
                    <div>
                      <span class="text-secondary">STARTING AT </span>
                      <strong class="text-largest pl-2">$20.00</strong>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="about-section3 container-fluid">
        <div class="body-max-width">
          <h3 class="mb-4">Buy again from your favorite sellers</h3>
          <div id="favoritesellers" class="owl-carousel owl-theme position-relative">
            <div class="card-box card">
              <div class="subcategory">
                <picture class="card-img-top">
                  <img class="rounded-0" src="<?= $site_url; ?>/card_images/1.jpg">
                </picture>
                <div class="card-body">
                  <div class="d-flex">
                    <div class="rounded-circle overflow-hidden d-flex justify-content-center align-items-center user-pic">
                      <img class="w-100 h-100 " src="<?= $site_url; ?>/images/hmp/user-pic.jpg" alt="">
                    </div>
                    <div class="px-3 d-flex justify-content-between w-100 align-items-center">
                      <div class="">
                        <h5 class="card-title font-weight-bold mb-0">taibacreation</h5>
                        <small class="text-secondary">New Seller</small>
                      </div>
                    </div>
                  </div>
                  <p class="my-4">I will create a responsive wordpress website design</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="font-weight-bold text-yellow">
                      <i class="fa fa-star"></i>
                      <span>4.9</span>
                      <span class="font-weight-normal text-secondary">(66)</span>
                    </div>
                    <div class="">
                      <button class="btn text-uppercase theme-border theme-text bg-white font-weight-bold ">buy it again</button>
                    </div>
                  </div>
                </div>
                <div class=" d-flex justify-content-between align-items-center py-3 px-3 bt-xs-1 ">
                  <ul class="list-inline mb-0">
                    <li class="list-inline-item dropdown">
                      <a id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="text-muted fa fa-bars"></a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </li>
                    <li class="list-inline-item">
                      <a class="text-muted fa fa-heart"></a>
                    </li>
                  </ul>
                  <div>
                    <span class="text-secondary text-uppercase">bought for</span>
                    <strong class="text-largest pl-2">$20.00</strong>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-box card">
              <div class="subcategory">
                <picture class="card-img-top">
                  <img class="rounded-0" src="<?= $site_url; ?>/card_images/2.jpg">
                </picture>
                <div class="card-body">
                  <div class="d-flex">
                    <div class="rounded-circle overflow-hidden d-flex justify-content-center align-items-center user-pic">
                      <img class="w-100 h-100 " src="<?= $site_url; ?>/images/hmp/user-pic.jpg" alt="">
                    </div>
                    <div class="px-3 d-flex justify-content-between w-100 align-items-center">
                      <div class="">
                        <h5 class="card-title font-weight-bold mb-0">taibacreation</h5>
                        <small class="text-secondary">New Seller</small>
                      </div>
                    </div>
                  </div>
                  <p class="my-4">I will create a responsive wordpress website design</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="font-weight-bold text-yellow">
                      <i class="fa fa-star"></i>
                      <span>4.9</span>
                      <span class="font-weight-normal text-secondary">(66)</span>
                    </div>
                    <div class="">
                      <button class="btn text-uppercase theme-border theme-text bg-white font-weight-bold ">buy it again</button>
                    </div>
                  </div>
                </div>
                <div class=" d-flex justify-content-between align-items-center py-3 px-3 bt-xs-1 ">
                  <ul class="list-inline mb-0">
                    <li class="list-inline-item dropdown">
                      <a id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="text-muted fa fa-bars"></a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </li>
                    <li class="list-inline-item">
                      <a class="text-muted fa fa-heart"></a>
                    </li>
                  </ul>
                  <div>
                    <span class="text-secondary text-uppercase">bought for</span>
                    <strong class="text-largest pl-2">$20.00</strong>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-box card">
              <div class="subcategory">
                <picture class="card-img-top">
                  <img class="rounded-0" src="<?= $site_url; ?>/card_images/3.jpg">
                </picture>
                <div class="card-body">
                  <div class="d-flex">
                    <div class="rounded-circle overflow-hidden d-flex justify-content-center align-items-center user-pic">
                      <img class="w-100 h-100 " src="<?= $site_url; ?>/images/hmp/user-pic.jpg" alt="">
                    </div>
                    <div class="px-3 d-flex justify-content-between w-100 align-items-center">
                      <div class="">
                        <h5 class="card-title font-weight-bold mb-0">taibacreation</h5>
                        <small class="text-secondary">New Seller</small>
                      </div>
                    </div>
                  </div>
                  <p class="my-4">I will create a responsive wordpress website design</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="font-weight-bold text-yellow">
                      <i class="fa fa-star"></i>
                      <span>4.9</span>
                      <span class="font-weight-normal text-secondary">(66)</span>
                    </div>
                    <div class="">
                      <button class="btn text-uppercase theme-border theme-text bg-white font-weight-bold ">buy it again</button>
                    </div>
                  </div>
                </div>
                <div class=" d-flex justify-content-between align-items-center py-3 px-3 bt-xs-1 ">
                  <ul class="list-inline mb-0">
                    <li class="list-inline-item dropdown">
                      <a id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="text-muted fa fa-bars"></a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </li>
                    <li class="list-inline-item">
                      <a class="text-muted fa fa-heart"></a>
                    </li>
                  </ul>
                  <div>
                    <span class="text-secondary text-uppercase">bought for</span>
                    <strong class="text-largest pl-2">$20.00</strong>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-box card">
              <div class="subcategory">
                <picture class="card-img-top">
                  <img class="rounded-0" src="<?= $site_url; ?>/card_images/4.jpg">
                </picture>
                <div class="card-body">
                  <div class="d-flex">
                    <div class="rounded-circle overflow-hidden d-flex justify-content-center align-items-center user-pic">
                      <img class="w-100 h-100 " src="<?= $site_url; ?>/images/hmp/user-pic.jpg" alt="">
                    </div>
                    <div class="px-3 d-flex justify-content-between w-100 align-items-center">
                      <div class="">
                        <h5 class="card-title font-weight-bold mb-0">taibacreation</h5>
                        <small class="text-secondary">New Seller</small>
                      </div>
                    </div>
                  </div>
                  <p class="my-4">I will create a responsive wordpress website design</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="font-weight-bold text-yellow">
                      <i class="fa fa-star"></i>
                      <span>4.9</span>
                      <span class="font-weight-normal text-secondary">(66)</span>
                    </div>
                    <div class="">
                      <button class="btn text-uppercase theme-border theme-text bg-white font-weight-bold ">buy it again</button>
                    </div>
                  </div>
                </div>
                <div class=" d-flex justify-content-between align-items-center py-3 px-3 bt-xs-1 ">
                  <ul class="list-inline mb-0">
                    <li class="list-inline-item dropdown">
                      <a id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="text-muted fa fa-bars"></a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </li>
                    <li class="list-inline-item">
                      <a class="text-muted fa fa-heart"></a>
                    </li>
                  </ul>
                  <div>
                    <span class="text-secondary text-uppercase">bought for</span>
                    <strong class="text-largest pl-2">$20.00</strong>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-box card">
              <div class="subcategory">
                <picture class="card-img-top">
                  <img class="rounded-0" src="<?= $site_url; ?>/card_images/5.jpg">
                </picture>
                <div class="card-body">
                  <div class="d-flex">
                    <div class="rounded-circle overflow-hidden d-flex justify-content-center align-items-center user-pic">
                      <img class="w-100 h-100 " src="<?= $site_url; ?>/images/hmp/user-pic.jpg" alt="">
                    </div>
                    <div class="px-3 d-flex justify-content-between w-100 align-items-center">
                      <div class="">
                        <h5 class="card-title font-weight-bold mb-0">taibacreation</h5>
                        <small class="text-secondary">New Seller</small>
                      </div>
                    </div>
                  </div>
                  <p class="my-4">I will create a responsive wordpress website design</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="font-weight-bold text-yellow">
                      <i class="fa fa-star"></i>
                      <span>4.9</span>
                      <span class="font-weight-normal text-secondary">(66)</span>
                    </div>
                    <div class="">
                      <button class="btn text-uppercase theme-border theme-text bg-white font-weight-bold ">buy it again</button>
                    </div>
                  </div>
                </div>
                <div class=" d-flex justify-content-between align-items-center py-3 px-3 bt-xs-1 ">
                  <ul class="list-inline mb-0">
                    <li class="list-inline-item dropdown">
                      <a id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="text-muted fa fa-bars"></a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </li>
                    <li class="list-inline-item">
                      <a class="text-muted fa fa-heart"></a>
                    </li>
                  </ul>
                  <div>
                    <span class="text-secondary text-uppercase">bought for</span>
                    <strong class="text-largest pl-2">$20.00</strong>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-box card">
              <div class="subcategory">
                <picture class="card-img-top">
                  <img class="rounded-0" src="<?= $site_url; ?>/card_images/6.jpg">
                </picture>
                <div class="card-body">
                  <div class="d-flex">
                    <div class="rounded-circle overflow-hidden d-flex justify-content-center align-items-center user-pic">
                      <img class="w-100 h-100 " src="<?= $site_url; ?>/images/hmp/user-pic.jpg" alt="">
                    </div>
                    <div class="px-3 d-flex justify-content-between w-100 align-items-center">
                      <div class="">
                        <h5 class="card-title font-weight-bold mb-0">taibacreation</h5>
                        <small class="text-secondary">New Seller</small>
                      </div>
                    </div>
                  </div>
                  <p class="my-4">I will create a responsive wordpress website design</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="font-weight-bold text-yellow">
                      <i class="fa fa-star"></i>
                      <span>4.9</span>
                      <span class="font-weight-normal text-secondary">(66)</span>
                    </div>
                    <div class="">
                      <button class="btn text-uppercase theme-border theme-text bg-white font-weight-bold ">buy it again</button>
                    </div>
                  </div>
                </div>
                <div class=" d-flex justify-content-between align-items-center py-3 px-3 bt-xs-1 ">
                  <ul class="list-inline mb-0">
                    <li class="list-inline-item dropdown">
                      <a id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="text-muted fa fa-bars"></a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </li>
                    <li class="list-inline-item">
                      <a class="text-muted fa fa-heart"></a>
                    </li>
                  </ul>
                  <div>
                    <span class="text-secondary text-uppercase">bought for</span>
                    <strong class="text-largest pl-2">$20.00</strong>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <!-- <span class="online position-absolute fa fa-circle">test</span> -->

        </div>
      </div>

    </div>
    <div class="tab-pane fade" id="Seller" role="tabpanel">
      <div class="about-section5 container-fluid">
        <div class="body-max-width">
          <div class="d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Recent Jobs</h3>
            <div class="input-group width-auto overflow-hidden">
              <input type="search" placeholder="Search Buyer Requests" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2">
              <div class=" bg-danger d-flex align-items-center justify-conten-center rounded-0">
                <button class="btn btn-transparent text-white fa fa-search w-100 h-100 rounded-0" type="button" id="button-addon2"></button>
              </div>
            </div>
          </div>
          <h5 class="d-flex justify-content-end my-4 align-items-center"><i class="fa fa-calendar mr-2"></i> 10 Offers Left Today</h5>
          <div class="nav nav-tabs font-weight-bold text-largest" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" data-toggle="tab" href="#ActiveTabs" role="tab" aria-selected="true">Active </a>
            <a class="nav-item nav-link" data-toggle="tab" href="#OffersSent" role="tab" aria-selected="false">Offers Sent</a>
          </div>
          <div class="tab-content pt-5" id="nav-tabContent">
            <div class="tab-pane fade show active" id="ActiveTabs" role="tabpanel">
              <div class="b-xs-1">

                <div class="p-3 d-flex justify-content-between align-items-center">
                  <h4 class="mb-0">Buyer Requests</h4>
                  <select class="form-control width-auto" name="" id="">
                    <option value="">All Subcategories</option>
                    <option value="">All Subcategories-1</option>
                    <option value="">All Subcategories-2</option>
                  </select>
                </div>

                <div class="table-responsive">
                  <table class="table table-bordered border-0">
                    <thead>
                      <tr>
                        <th scope="col"> Request</th>
                        <th scope="col">Offers</th>
                        <th scope="col">Datet</th>
                        <th scope="col">Duratione</th>
                        <th scope="col">Budget</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td> Request</td>
                        <td>Offers</td>
                        <td>Datet</td>
                        <td>Duratione</td>
                        <td>Budget</td>
                      </tr>
                      <tr>
                        <td>1.Request</td>
                        <td>1.Offers</td>
                        <td>1.Datet</td>
                        <td>1.Duratione</td>
                        <td>1.Budget</td>
                      </tr>
                      <tr>
                        <td>2.Request</td>
                        <td>2.Offers</td>
                        <td>2.Datet</td>
                        <td>2.Duratione</td>
                        <td>2.Budget</td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>


            </div>
            <div class="tab-pane fade" id="OffersSent" role="tabpanel">2</div>
          </div>
        </div>
      </div>
      <div class="about-section-6 py-5 container-fluid">
        <div class=" body-max-width">
          <h3 class="mb-lg-4 mb-0">Manage Proposal/Service Orders</h3>
          <div class="nav  nav-tabs  d-lg-flex d-none flex-nowrap  text-center" id="nav-tab" role="tablist">
            <a class="nav-item d-flex align-items-center pb-4 nav-link active" data-toggle="tab" href="#home-active2" role="tab">ACTIVE <span class="ml-2 badge2 text-smaller py-1 px-1  text-white d-inline-flex justify-content-center align-items-center rounded theme-bg-sky">59</span></a>
            <a class="nav-item d-flex align-items-center pb-4 nav-link" data-toggle="tab" href="#DELIVERED2" role="tab">DELIVERED <span class="ml-2 badge2 text-smaller py-1 px-1  text-white d-inline-flex justify-content-center align-items-center rounded theme-bg-sky">1</span></a>
            <a class="nav-item d-flex align-items-center pb-4 nav-link" data-toggle="tab" href="#COMPLETED2" role="tab">COMPLETED <span class="ml-2 badge2 text-smaller py-1 px-1  text-white d-inline-flex justify-content-center align-items-center rounded theme-bg-sky">113</span></a>
            <a class="nav-item d-flex align-items-center pb-4 nav-link" data-toggle="tab" href="#CANCELLED2" role="tab">CANCELLED <span class="ml-2 badge2 text-smaller py-1 px-1  text-white d-inline-flex justify-content-center align-items-center rounded theme-bg-sky">63</span></a>
            <a class="nav-item d-flex align-items-center pb-4 nav-link" data-toggle="tab" href="#ALL2" role="tab">ALL <span class="ml-2 badge2 text-smaller py-1 px-1  text-white d-inline-flex justify-content-center align-items-center rounded theme-bg-sky">253</span></a>
          </div>


          <div class="accordion" id="ManageProposalServiceOrders">
            <div class="tab-content  pt-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="home-active2" role="tabpanel">
                <button class="btn rounded-0 d-lg-none d-flex w-100 mt-3 mt-lg-0 align-align-items-center py-3 btn-accordion" type="button" data-toggle="collapse" data-target="#home-active2_2">ACTIVE
                  <span class="ml-2 badge2 text-smaller py-1 px-1  text-white d-inline-flex justify-content-center align-items-center rounded theme-bg-sky">59</span>
                </button>
                <div id="home-active2_2" class="collapse show d-lg-block" data-parent="#ManageProposalServiceOrders">
                  <div class="table-responsive bg-white pb-1">
                    <table class="table table-bordered mb-0 text-nowrap">
                      <thead>
                        <tr>
                          <th scope="col">ORDER </th>
                          <th scope="col">CLIENT NAME</th>
                          <th scope="col">ORDER DATE </th>
                          <th scope="col">DUE ON </th>
                          <th scope="col"> TOTAL</th>
                          <th scope="col"> STATUS</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <div class="d-flex align-items-center">
                              <picture class="overflow-hidden d-block h-100 w-100 mr-3">
                                <img class="w-100 h-100" src="<?= $site_url; ?>/card_images/1.jpg" alt="" srcset="">
                              </picture> Sell your house for you
                            </div>
                          </td>
                          <td class="align-middle font-weight-bold">RAJ</td>
                          <td>July 10, 2022</td>
                          <td>July 11, 2022</td>
                          <td>$5.00</td>
                          <td><label class="theme-bg-danger p-1 text-white">Delivered</label></td>
                        </tr>
                        <tr>
                          <td>
                            <div class="d-flex align-items-center">
                              <picture class="overflow-hidden d-block h-100 w-100 mr-3">
                                <img class="w-100 h-100" src="<?= $site_url; ?>/card_images/2.jpg" alt="" srcset="">
                              </picture> make business card
                            </div>
                          </td>
                          <td class="align-middle font-weight-bold">PAT</td>
                          <td>July 10, 2022</td>
                          <td>July 11, 2022</td>
                          <td>$5.00</td>
                          <td><label class="mb-0 rounded theme-bg-sky p-1 text-white">Pending</label> </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="d-flex align-items-center">
                              <picture class="overflow-hidden d-block h-100 w-100 mr-3">
                                <img class="w-100 h-100" src="<?= $site_url; ?>/card_images/3.jpg" alt="" srcset="">
                              </picture> make business card
                            </div>
                          </td>
                          <td class="align-middle font-weight-bold"></td>
                          <td>July 10, 2022</td>
                          <td>July 11, 2022</td>
                          <td>$5.00</td>
                          <td><label class="mb-0 rounded theme-bg-sky p-1 text-white">Progress</label> </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="DELIVERED2" role="tabpanel">
                <button class="btn rounded-0 d-lg-none d-flex w-100 mt-3 mt-lg-0 align-align-items-center py-3 btn-accordion" type="button" data-toggle="collapse" data-target="#DELIVERED2_2" aria-expanded="false">
                  DELIVERED
                  <span class="ml-2 badge2 text-smaller py-1 px-1  text-white d-inline-flex justify-content-center align-items-center rounded theme-bg-sky">1</span>
                </button>
                <div id="DELIVERED2_2" class="collapse d-lg-block" data-parent="#ManageProposalServiceOrders">
                  sss
                </div>
              </div>
              <div class="tab-pane fade" id="COMPLETED2" role="tabpanel">
                <button class="btn rounded-0 d-lg-none d-flex w-100 mt-3 mt-lg-0 align-align-items-center py-3 btn-accordion" type="button" data-toggle="collapse" data-target="#COMPLETED2_2" aria-expanded="false">
                  COMPLETED
                  <span class="ml-2 badge2 text-smaller py-1 px-1  text-white d-inline-flex justify-content-center align-items-center rounded theme-bg-sky">113</span>
                </button>
                <div id="COMPLETED2_2" class="collapse d-lg-block" data-parent="#ManageProposalServiceOrders">tst3</div>
              </div>
              <div class="tab-pane fade" id="CANCELLED2" role="tabpanel">
                <button class="btn rounded-0 d-lg-none d-flex w-100 mt-3 mt-lg-0 align-align-items-center py-3 btn-accordion" type="button" data-toggle="collapse" data-target="#CANCELLED2_2" aria-expanded="false">
                  CANCELLED
                  <span class="ml-2 badge2 text-smaller py-1 px-1  text-white d-inline-flex justify-content-center align-items-center rounded theme-bg-sky">63</span>
                </button>
                <div id="CANCELLED2_2" class="collapse d-lg-block" data-parent="#ManageProposalServiceOrders">tst4</div>
              </div>
              <div class="tab-pane fade" id="ALL2" role="tabpanel">
                <button class="btn rounded-0 d-lg-none d-flex w-100 mt-3 mt-lg-0 align-align-items-center py-3 btn-accordion" type="button" data-toggle="collapse" data-target="#ALL2_2" aria-expanded="false">
                  ALL
                  <span class="ml-2 badge2 text-smaller py-1 px-1  text-white d-inline-flex justify-content-center align-items-center rounded theme-bg-sky">253</span>
                </button>
                <div id="ALL2_2" class="collapse d-lg-block" data-parent="#ManageProposalServiceOrders">tst4</div>
              </div>

            </div>
          </div>
        </div>
      </div>
      <div class="about-section-7 pb-5 container-fluid">
        <div class=" body-max-width">
          <div class="d-sm-flex justify-content-between">
            <h3 class="mb-0">View My Proposals</h3>
            <div class="d-flex align-items-center mt-sm-0 mt-4">
              <label class="mb-0 mr-3">Vacation Mode</label>
              <label class="switch mb-0">
                <input type="checkbox">
                <span class="slider round"></span>
              </label>
            </div>


          </div>
          <div class="d-sm-flex justify-content-end my-4">
            <button class="btn theme-bg-sky text-white"><i class="fa fa-plus-circle"></i> Add New Proposal</button>
          </div>

          <div class="nav  nav-tabs  d-lg-flex d-none flex-nowrap  text-center" id="nav-tab" role="tablist">
            <a class="nav-item d-flex align-items-center pb-4 nav-link active" data-toggle="tab" href="#ActiveProposals" role="tab">Active Proposals<span class="ml-2 badge2 text-smaller py-1 px-1  text-white d-inline-flex justify-content-center align-items-center rounded theme-bg-sky">59</span></a>
            <a class="nav-item d-flex align-items-center pb-4 nav-link" data-toggle="tab" href="#PausedProposals" role="tab">Paused Proposals <span class="ml-2 badge2 text-smaller py-1 px-1  text-white d-inline-flex justify-content-center align-items-center rounded theme-bg-sky">1</span></a>
            <a class="nav-item d-flex align-items-center pb-4 nav-link" data-toggle="tab" href="#PendingProposals" role="tab">Pending Proposals <span class="ml-2 badge2 text-smaller py-1 px-1  text-white d-inline-flex justify-content-center align-items-center rounded theme-bg-sky">113</span></a>
            <a class="nav-item d-flex align-items-center pb-4 nav-link" data-toggle="tab" href="#RequiresModification" role="tab">Requires Modification <span class="ml-2 badge2 text-smaller py-1 px-1  text-white d-inline-flex justify-content-center align-items-center rounded theme-bg-sky">63</span></a>
            <a class="nav-item d-flex align-items-center pb-4 nav-link" data-toggle="tab" href="#Draft" role="tab">Draft<span class="ml-2 badge2 text-smaller py-1 px-1  text-white d-inline-flex justify-content-center align-items-center rounded theme-bg-sky">253</span></a>
            <a class="nav-item d-flex align-items-center pb-4 nav-link" data-toggle="tab" href="#Declined" role="tab">Declined<span class="ml-2 badge2 text-smaller py-1 px-1  text-white d-inline-flex justify-content-center align-items-center rounded theme-bg-sky">253</span></a>
          </div>
          <div class="accordion" id="ManageProposalServiceOrders">
            <div class="tab-content  pt-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="ActiveProposals" role="tabpanel">
                <button class="btn rounded-0 d-lg-none d-flex w-100 mt-3 mt-lg-0 align-align-items-center py-3 btn-accordion" type="button" data-toggle="collapse" data-target="#ActiveProposals_2">Active Proposals
                  <span class="ml-2 badge2 text-smaller py-1 px-1  text-white d-inline-flex justify-content-center align-items-center rounded theme-bg-sky">59</span>
                </button>
                <div id="ActiveProposals_2" class="collapse show d-lg-block" data-parent="#ManageProposalServiceOrders">
                  <div class="table-responsive bg-white">
                    <table class="table table-bordered mb-0 text-nowrap">
                      <thead>
                        <tr>
                          <th scope="col">Proposal's Title </th>
                          <th scope="col">Proposal's Price</th>
                          <th scope="col">Views </th>
                          <th scope="col">Orders</th>
                          <th class="text-center" scope="col"> Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            make business card
                          </td>
                          <td class="text-danger">$5.00</td>
                          <td>8</td>
                          <td>10</td>
                          <td class="text-center">
                            <div class="dropdown">
                              <button class="btn theme-bg-sky dropdown-toggle text-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            I will write a restful API for your project
                          </td>
                          <td class="text-danger">$500.00</td>
                          <td>8</td>
                          <td>10</td>
                          <td class="text-center">
                            <div class="dropdown">
                              <button class="btn theme-bg-sky dropdown-toggle text-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                              </div>
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <td>
                            Sell your house for you
                          </td>
                          <td class="text-danger">$5.00</td>
                          <td>8</td>
                          <td>10</td>
                          <td class="text-center">
                            <div class="dropdown">
                              <button class="btn theme-bg-sky dropdown-toggle text-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            I will design a cool logo for you
                          </td>
                          <td class="text-danger">$10.00</td>
                          <td>8</td>
                          <td>10</td>
                          <td class="text-center">
                            <div class="dropdown">
                              <button class="btn theme-bg-sky dropdown-toggle text-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            teach tutorial
                          </td>
                          <td class="text-danger">$4.00</td>
                          <td>8</td>
                          <td>10</td>
                          <td class="text-center">
                            <div class="dropdown">
                              <button class="btn theme-bg-sky dropdown-toggle text-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                              </div>
                            </div>
                          </td>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="PausedProposals" role="tabpanel">
                <button class="btn rounded-0 d-lg-none d-flex w-100 mt-3 mt-lg-0 align-align-items-center py-3 btn-accordion" type="button" data-toggle="collapse" data-target="#PausedProposals_2" aria-expanded="false">
                  Paused Proposals
                  <span class="ml-2 badge2 text-smaller py-1 px-1  text-white d-inline-flex justify-content-center align-items-center rounded theme-bg-sky">1</span>
                </button>
                <div id="PausedProposals_2" class="collapse d-lg-block" data-parent="#ManageProposalServiceOrders">
                  Paused Proposals
                </div>
              </div>
              <div class="tab-pane fade" id="PendingProposals" role="tabpanel">
                <button class="btn rounded-0 d-lg-none d-flex w-100 mt-3 mt-lg-0 align-align-items-center py-3 btn-accordion" type="button" data-toggle="collapse" data-target="#PendingProposals_2" aria-expanded="false">
                  Pending Proposals
                  <span class="ml-2 badge2 text-smaller py-1 px-1  text-white d-inline-flex justify-content-center align-items-center rounded theme-bg-sky">113</span>
                </button>
                <div id="PendingProposals_2" class="collapse d-lg-block" data-parent="#ManageProposalServiceOrders">pending Proposals</div>
              </div>
              <div class="tab-pane fade" id="RequiresModification" role="tabpanel">
                <button class="btn rounded-0 d-lg-none d-flex w-100 mt-3 mt-lg-0 align-align-items-center py-3 btn-accordion" type="button" data-toggle="collapse" data-target="#RequiresModification_2" aria-expanded="false">
                  Requires Modification
                  <span class="ml-2 badge2 text-smaller py-1 px-1  text-white d-inline-flex justify-content-center align-items-center rounded theme-bg-sky">63</span>
                </button>
                <div id="RequiresModification_2" class="collapse d-lg-block" data-parent="#ManageProposalServiceOrders">Requires Modification</div>
              </div>
              <div class="tab-pane fade" id="Draft" role="tabpanel">
                <button class="btn rounded-0 d-lg-none d-flex w-100 mt-3 mt-lg-0 align-align-items-center py-3 btn-accordion" type="button" data-toggle="collapse" data-target="#Draft_2" aria-expanded="false">
                  Draft
                  <span class="ml-2 badge2 text-smaller py-1 px-1  text-white d-inline-flex justify-content-center align-items-center rounded theme-bg-sky">253</span>
                </button>
                <div id="Draft_2" class="collapse d-lg-block" data-parent="#ManageProposalServiceOrders">Draft</div>
              </div>
              <div class="tab-pane fade" id="Declined" role="tabpanel">
                <button class="btn rounded-0 d-lg-none d-flex w-100 mt-3 mt-lg-0 align-align-items-center py-3 btn-accordion" type="button" data-toggle="collapse" data-target="#Declined_2" aria-expanded="false">
                  Declined
                  <span class="ml-2 badge2 text-smaller py-1 px-1  text-white d-inline-flex justify-content-center align-items-center rounded theme-bg-sky">253</span>
                </button>
                <div id="Declined_2" class="collapse d-lg-block" data-parent="#ManageProposalServiceOrders">Declined</div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="about-section4 py-5 container-fluid">
    <div class="body-max-width">
      <div class="row justify-content-center align-items-center">
        <div class="col-md-4">
          <h1>
            Set success on repeat with Subscriptions
          </h1>
          <p>
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
          </p>
        </div>
        <div class="col-md-6">
          <div class="box-cards-1 theme-bg py-5 position-relative">
            <div class="d-flex justify-content-center align-items-center py-5">
              <span class="position-relative rounded-circle bg-white text-headline font-weight-bold theme-text d-flex justify-content-center align-items-center">2</span>
              <div class="theme-bg rounded border px-sm-5 px-2 py-3 text-white mx-3 position-relative">
                <div class="month-choose mb-4">
                  <input class="d-none" type="radio" name="months" id="3months">
                  <label class="font-weight-bold d-flex align-items-center mb-0" for="3months">
                    <i class="fa fa-check d-flex justify-content-lg-center align-items-center position-relative"> </i>
                    <em class="ml-3">3 months</em>
                  </label>
                </div>
                <div class="month-choose">
                  <input class="d-none" type="radio" name="months" id="6months">
                  <label class="font-weight-bold d-flex align-items-center mb-0" for="6months">
                    <i class="fa fa-check d-flex justify-content-lg-center align-items-center position-relative"> </i>
                    <em class="ml-3">6 months</em>
                  </label>
                </div>

              </div>
              <button class="btn btn-transparent bg-white theme-text rounded-0 position-relative font-weight-bold px-4">Subscribe</button>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>


  <div class="pricing-box">
    <div class="body-max-width container-fluid">
      <div class="text-center">
        <h3>Pricing Table</h3>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
      </div>
      <div class="d-lg-flex justify-content-center py-5">
        <ul class="list-unstyled m-0 p-0 text-capitalize d-lg-block d-none">
          <li class="py-3 bb-xs-1 "></li>
          <li class="d-flex justify-content-start px-5 bb-xs-1 py-3 align-items-center">
            <span class="font-weight-bold">Monthly</span>
          </li>
          <li class="d-flex justify-content-start px-5 bb-xs-1 py-3 align-items-center">
            <span class="font-weight-bold">Annual</span>
          </li>
          <li class="d-flex justify-content-start px-5 bb-xs-1 py-3 align-items-center">
            <span class="font-weight-bold">Bids per month</span>
          </li>
          <li class="d-flex justify-content-start px-5 bb-xs-1 py-3 align-items-center">
            <span class="font-weight-bold">Skills</span>
          </li>
          <li class="d-flex justify-content-start px-5 bb-xs-1 py-3 align-items-center">
            <span class="font-weight-bold">Client Engagement</span>
          </li>
          <li class="d-flex justify-content-start px-5 bb-xs-1 py-3 align-items-center">
            <span class="font-weight-bold">Daily withdrawal requests</span>
          </li>
          <li class="d-flex justify-content-start px-5 bb-xs-1 py-3 align-items-center">
            <span class="font-weight-bold">Unlock rewards</span>
          </li>
          <li class="d-flex justify-content-start px-5 bb-xs-1 py-3 align-items-center">
            <span class="font-weight-bold">project bookmarks</span>
          </li>
          <li class="d-flex justify-content-start px-5 bb-xs-1 py-3 align-items-center">
            <span class="font-weight-bold">Custom cover photo</span>
          </li>
          <li class="d-flex justify-content-start px-5 bb-xs-1 py-3 align-items-center">
            <span class="font-weight-bold">Free highlighted bids </span>
          </li>
          <li class="d-flex justify-content-start px-5 bb-xs-1 py-3 align-items-center">
            <span class="font-weight-bold">Employer followings</span>
          </li>
          <li class="d-flex justify-content-start px-5 bb-xs-1 py-3 align-items-center">
            <span class="font-weight-bold">Project extension</span>
          </li>
          <li class="d-flex justify-content-start px-5 bb-xs-1 py-3 align-items-center">
            <span class="font-weight-bold">Sealed projects</span>
          </li>
          <li class="d-flex justify-content-start px-5 bb-xs-1 py-3 align-items-center">
            <span class="font-weight-bold">Free NDA projects</span>
          </li>
          <li class="d-flex justify-content-start px-5 bb-xs-1 py-3 align-items-center">
            <span class="font-weight-bold">High value project bidding*</span>
          </li>
          <li class="d-flex justify-content-start px-5 bb-xs-1 py-3 align-items-center">
            <span class="font-weight-bold">Create active Services</span>
          </li>
          <li class="d-flex justify-content-start px-5 bb-xs-1 py-3 align-items-center">
            <span class="font-weight-bold">Create custom offers</span>
          </li>
          <li class="d-flex justify-content-start px-5 bb-xs-1 py-3 align-items-center">
            <span class="font-weight-bold">Percentage Per project</span>
          </li>
          <li class="d-flex justify-content-start px-5 bb-xs-1 py-3 align-items-center">
            <span class="font-weight-bold">Select type of account <br> <span class="text-smaller">( Business or personal)</span></span>
          </li>
          <li class="d-flex justify-content-start px-5 bb-xs-1 py-3 align-items-center">
            <span class="font-weight-bold">Get recommendation</span>
          </li>
          <li class="d-flex justify-content-start px-5 bb-xs-1 py-3 align-items-center">
            <span class="font-weight-bold">Create portfolio </span>
          </li>
          <li class="d-flex justify-content-start px-5 bb-xs-1 py-3 align-items-center">
            <span class="font-weight-bold">Custom description</span>
          </li>


        </ul>
        <ul class="list-unstyled m-0 p-0 text-capitalize pricing-box-shadow bg-white ">
          <li class="title text-center font-weight-bold bb-xs-1 py-3 align-items-center text-white" style="background-color: #57797b;">Free</li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
            <span class="font-weight-bold d-lg-none">Monthly</span>
            <span>One month trial</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
            <span class="font-weight-bold d-lg-none">Annual</span>
            <span>-</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Bids per month</span>
            <span>20</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Skills</span>
            <span>20</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Client Engagement</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Daily withdrawal requests</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Unlock rewards</span>
            <span>no</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">project bookmarks</span>
            <span>no</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Custom cover photo</span>
            <span>no</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Free highlighted bids </span>
            <span>no</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Employer followings</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Project extension</span>
            <span>no</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Sealed projects</span>
            <span>no</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Free NDA projects</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">High value project bidding*</span>
            <span>no</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Create active Services</span>
            <span>no</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Create custom offers</span>
            <span>no</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Percentage Per project</span>
            <span>10%</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Select type of account <br> <span class="text-smaller">( Business or personal)</span></span>
            <span>no</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Get recommendation</span>
            <span>no</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Create portfolio </span>
            <span>upto 5</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Custom description</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-center  py-3 px-5 align-items-center">
            <button class="btn theme-btn font-weight-bold">Select Plan</button>
          </li>
        </ul>
        <ul class="list-unstyled m-0 p-0 text-capitalize pricing-box-shadow bg-white ">

          <li class="title text-center font-weight-bold bb-xs-1 py-3 text-white" style="background-color:#5868a5;">Basic</li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Monthly</span>
            <span>₹499</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Annual</span>
            <span>₹399</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Bids per month</span>
            <span>150</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Skills</span>
            <span>50</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Client Engagement</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Daily withdrawal requests</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Unlock rewards</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">project bookmarks</span>
            <span>20</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Custom cover photo</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Free highlighted bids </span>
            <span>5</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Employer followings</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Project extension</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Sealed projects</span>
            <span>25</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Free NDA projects</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">High value project bidding*</span>
            <span>no</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Create active Services</span>
            <span>5</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Create custom offers</span>
            <span>Upto $1000</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Percentage Per project</span>
            <span>8.5</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Select type of account <br> <span class="text-smaller">( Business or personal)</span></span>
            <span>no</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Get recommendation</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Create portfolio </span>
            <span>upto 10</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Custom description</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-center  py-3 px-5 align-items-center">
            <button class="btn theme-btn font-weight-bold">Select Plan</button>
          </li>
        </ul>
        <ul class="list-unstyled m-0 p-0 text-capitalize pricing-box-shadow bg-white ">

          <li class="title text-center font-weight-bold bb-xs-1 py-3 text-white" style="background-color: #213456;">Professional</li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Monthly</span>
            <span>₹999</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Annual</span>
            <span>₹799</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Bids per month</span>
            <span>500</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Skills</span>
            <span>200</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Client Engagement</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Daily withdrawal requests</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Unlock rewards</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">project bookmarks</span>
            <span>50</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Custom cover photo</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Free highlighted bids </span>
            <span>20</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Employer followings</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Project extension</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Sealed projects</span>
            <span>75</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Free NDA projects</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">High value project bidding*</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Create active Services</span>
            <span>10</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Create custom offers</span>
            <span>upto $2500</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Percentage Per project</span>
            <span>8</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Select type of account <br> <span class="text-smaller">( Business or personal)</span></span>
            <span>no</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Get recommendation</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Create portfolio </span>
            <span>upto 10</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Custom description</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-center  py-3 px-5 align-items-center">
            <button class="btn theme-btn font-weight-bold">Select Plan</button>
          </li>
        </ul>
        <ul class="list-unstyled m-0 p-0 text-capitalize pricing-box-shadow bg-white ">

          <li class="title text-center font-weight-bold bb-xs-1 py-3 text-white" style="background-color: #972923;">Premium</li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Monthly</span>
            <span>₹1499</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Annual</span>
            <span>₹1199</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Bids per month</span>
            <span>1500</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Skills</span>
            <span>400</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Client Engagement</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Daily withdrawal requests</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Unlock rewards</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">project bookmarks</span>
            <span>unlimited</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Custom cover photo</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Free highlighted bids </span>
            <span>50</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Employer followings</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Project extension</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Sealed projects</span>
            <span>unlimited</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Free NDA projects</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">High value project bidding*</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Create active Services</span>
            <span>20</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Create custom offers</span>
            <span>unlimited</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Percentage Per project</span>
            <span>7</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Select type of account <br> <span class="text-smaller">( Business or personal)</span></span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Get recommendation</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Create portfolio </span>
            <span>unlimited</span>
          </li>
          <li class="d-flex justify-content-lg-center justify-content-between bb-xs-1 py-3 px-xl-5 px-lg-4 px-3 align-items-center">
          <span class="font-weight-bold d-lg-none">Custom description</span>
            <span>yes</span>
          </li>
          <li class="d-flex justify-content-center  py-3 px-5 align-items-center">
            <button class="btn theme-btn font-weight-bold">Select Plan</button>
          </li>
        </ul>
      </div>
    </div>
  </div>


  <!-- ############### NEW HTML CODE: END ############### -->

  








  <div class="container-fluid mt-5 d-none">
    <!-- Container start -->
    <div class="row">

      <div class="col-md-12">
        <center>
          <?php
          if (isset($_SESSION['cat_id'])) {
            $cat_id = $_SESSION['cat_id'];
            $get_meta = $db->select("cats_meta", array("cat_id" => $cat_id, "language_id" => $siteLanguage));
            $row_meta = $get_meta->fetch();
            $cat_title = $row_meta->cat_title;
            $cat_desc = $row_meta->cat_desc;
          ?>
            <h1> <?= $cat_title; ?> </h1>
            <p class="lead"><?= $cat_desc; ?></p>
          <?php } ?>
          <?php
          if (isset($_SESSION['cat_child_id'])) {
            $cat_child_id = $_SESSION['cat_child_id'];
            $get_meta = $db->select("child_cats_meta", array("child_id" => $cat_child_id, "language_id" => $siteLanguage));
            $row_meta = $get_meta->fetch();
            $child_title = $row_meta->child_title;
            $child_desc = $row_meta->child_desc;
          ?>
            <h1> <?= $child_title; ?> </h1>
            <p class="lead"><?= $child_desc; ?></p>
          <?php } ?>
        </center>
        <hr class="mt-5 pt-2">
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-lg-3 col-md-4 col-sm-12 <?= ($lang_dir == "right" ? 'order-2 order-sm-1' : '') ?>">
        <?php require_once("../includes/category_sidebar.php"); ?>
      </div>
      <div class="col-lg-9 col-md-8 col-sm-12 <?= ($lang_dir == "right" ? 'order-1 order-sm-2' : '') ?>">
        <div class="row flex-wrap proposals <?= ($lang_dir == "right" ? 'justify-content' : '') ?>" id="category_proposals">
          <?php get_category_proposals(); ?>
        </div>
        <div id="wait"></div>
        <br>
        <div class="row justify-content-center mb-5 mt-0">
          <!-- row justify-content-center Starts -->
          <nav>
            <!-- nav Starts -->
            <ul class="pagination" id="category_pagination">
              <?php get_category_pagination(); ?>
            </ul>
          </nav>
          <!-- nav Ends -->
        </div>
      </div>
    </div>
  </div>
  <!-- Container ends -->
  <div class="append-modal"></div>
  <?php require_once("../includes/footer.php"); ?>
  <script>
    function get_category_proposals() {

      var sPath = '';

      var aInputs = $('li').find('.get_online_sellers');
      var aKeys = Array();
      var aValues = Array();

      iKey = 0;

      $.each(aInputs, function(key, oInput) {

        if (oInput.checked) {
          aKeys[iKey] = oInput.value
        };

        iKey++;

      });

      if (aKeys.length > 0) {

        var sPath = '';

        for (var i = 0; i < aKeys.length; i++) {

          sPath = sPath + 'online_sellers[]=' + aKeys[i] + '&';

        }

      }

      var instant_delivery = $('.get_instant_delivery:checked').val();
      sPath = sPath + 'instant_delivery[]=' + instant_delivery + '&';

      var order = $('.get_order:checked').val();
      sPath = sPath + 'order[]=' + order + '&';

      var aInputs = $('li').find('.get_seller_country');
      var aKeys = Array();
      var aValues = Array();
      iKey = 0;
      $.each(aInputs, function(key, oInput) {
        if (oInput.checked) {
          aKeys[iKey] = oInput.value
        };
        iKey++;
      });
      if (aKeys.length > 0) {
        for (var i = 0; i < aKeys.length; i++) {
          sPath = sPath + 'seller_country[]=' + aKeys[i] + '&';
        }
      }

      var aInputs = $('li').find('.get_seller_city');
      var aKeys = Array();
      var aValues = Array();
      iKey = 0;
      $.each(aInputs, function(key, oInput) {
        if (oInput.checked) {
          aKeys[iKey] = oInput.value
        };
        iKey++;
      });
      if (aKeys.length > 0) {
        for (var i = 0; i < aKeys.length; i++) {
          sPath = sPath + 'seller_city[]=' + aKeys[i] + '&';
        }
      }


      var cat_url = "<?= $input->get('cat_url'); ?>";

      sPath = sPath + 'cat_url=' + cat_url + '&';

      <?php if (isset($_REQUEST['cat_child_url'])) { ?>

        var cat_child_url = "<?= $input->get('cat_child_url'); ?>";

        sPath = sPath + 'cat_child_url=' + cat_child_url + '&';

        var url_plus = "../";

      <?php } else { ?>

        var url_plus = "";

      <?php } ?>


      var aInputs = Array();

      var aInputs = $('li').find('.get_delivery_time');

      var aKeys = Array();

      var aValues = Array();

      iKey = 0;

      $.each(aInputs, function(key, oInput) {

        if (oInput.checked) {

          aKeys[iKey] = oInput.value

        };

        iKey++;

      });

      if (aKeys.length > 0) {

        for (var i = 0; i < aKeys.length; i++) {

          sPath = sPath + 'delivery_time[]=' + aKeys[i] + '&';

        }

      }

      var aInputs = Array();

      var aInputs = $('li').find('.get_seller_level');

      var aKeys = Array();

      var aValues = Array();

      iKey = 0;

      $.each(aInputs, function(key, oInput) {

        if (oInput.checked) {

          aKeys[iKey] = oInput.value

        };

        iKey++;

      });

      if (aKeys.length > 0) {

        for (var i = 0; i < aKeys.length; i++) {

          sPath = sPath + 'seller_level[]=' + aKeys[i] + '&';

        }

      }

      var aInputs = Array();

      var aInputs = $('li').find('.get_seller_language');

      var aKeys = Array();

      var aValues = Array();

      iKey = 0;

      $.each(aInputs, function(key, oInput) {

        if (oInput.checked) {

          aKeys[iKey] = oInput.value

        };

        iKey++;

      });

      if (aKeys.length > 0) {

        for (var i = 0; i < aKeys.length; i++) {

          sPath = sPath + 'seller_language[]=' + aKeys[i] + '&';

        }

      }

      $('#wait').addClass("loader");

      $.ajax({

        url: url_plus + "../category_load",
        method: "POST",
        data: sPath + 'zAction=get_category_proposals',
        success: function(data) {

          $('#category_proposals').html('');

          $('#category_proposals').html(data);

          $('#wait').removeClass("loader");

        }

      });

      $.ajax({

        url: url_plus + "../category_load",
        method: "POST",
        data: sPath + 'zAction=get_category_pagination',
        success: function(data) {

          $('#category_pagination').html('');

          $('#category_pagination').html(data);

        }

      });

    }

    $('.get_instant_delivery').click(function() {
      get_category_proposals();
    });

    $('.get_order').click(function() {
      get_category_proposals();
    });

    $('.get_seller_country').click(function() {
      get_category_proposals();
    });

    $('.get_seller_city').click(function() {
      get_category_proposals();
    });

    $('.get_online_sellers').click(function() {
      get_category_proposals();
    });

    $('.get_delivery_time').click(function() {
      get_category_proposals();
    });

    $('.get_seller_level').click(function() {
      get_category_proposals();
    });

    $('.get_seller_language').click(function() {
      get_category_proposals();
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {

      $(".get_seller_country").click(function() {
        if ($(".get_seller_country:checked").length > 0) {

          $(".clear_seller_country").show();
          $('.seller-cities li').addClass('d-none');

          var aInputs = $('li').find('.get_seller_country');
          var cities = Array();
          iKey = 0;
          $.each(aInputs, function(key, oInput) {
            if (oInput.checked) {
              var country = oInput.value
              var city = $('.seller-cities li[data-country="' + country + '"]');
              var city_name = city.find("label input").val();
              city.removeClass('d-none');
              if (city.length) {
                cities[iKey] = city_name;
                console.log(city_name);
              }
              iKey++;
            };
          });

          if (cities.length > 0) {
            $(".seller-cities").removeClass('d-none');
          } else {
            $(".seller-cities").addClass('d-none');
          }

        } else {
          $(".seller-cities").addClass('d-none');
          $(".clear_seller_country").hide();
          clearCity();
        }
      });

      $(".get_seller_city").click(function() {
        if ($(".get_seller_city:checked").length > 0) {
          $(".clear_seller_city").show();
        } else {
          $(".clear_seller_city").hide();
        }
      });

      $(".get_cat_id").click(function() {
        if ($(".get_cat_id:checked").length > 0) {
          $(".clear_cat_id").show();
        } else {
          $(".clear_cat_id").hide();
        }
      });
      $(".get_delivery_time").click(function() {
        if ($(".get_delivery_time:checked").length > 0) {
          $(".clear_delivery_time").show();
        } else {
          $(".clear_delivery_time").hide();
        }
      });
      $(".get_seller_level").click(function() {
        if ($(".get_seller_level:checked").length > 0) {
          $(".clear_seller_level").show();
        } else {
          $(".clear_seller_level").hide();
        }
      });
      $(".get_seller_language").click(function() {
        if ($(".get_seller_language:checked").length > 0) {
          $(".clear_seller_language").show();
        } else {
          $(".clear_seller_language").hide();
        }
      });
      $(".clear_seller_country").click(function() {
        $(".clear_seller_country").hide();
      });
      $(".clear_seller_city").click(function() {
        $(".clear_seller_city").hide();
      });
      $(".clear_cat_id").click(function() {
        $(".clear_cat_id").hide();
      });
      $(".clear_delivery_time").click(function() {
        $(".clear_delivery_time").hide();
      });
      $(".clear_seller_level").click(function() {
        $(".clear_seller_level").hide();
      });
      $(".clear_seller_language").click(function() {
        $(".clear_seller_language").hide();
      });
    });

    function clearCountry() {
      $('.get_seller_country').prop('checked', false);
      $('.get_seller_city').prop('checked', false);
      $(".seller-cities").addClass('d-none');
      get_category_proposals();
    }

    function clearCity() {
      $('.get_seller_city').prop('checked', false);
      get_category_proposals();
    }

    function clearCat() {
      $('.get_cat_id').prop('checked', false);
      get_category_proposals();
    }

    function clearDelivery() {
      $('.get_delivery_time').prop('checked', false);
      get_category_proposals();
    }

    function clearLevel() {
      $('.get_seller_level').prop('checked', false);
      get_category_proposals();
    }

    function clearLanguage() {
      $('.get_seller_language').prop('checked', false);
      get_category_proposals();
    }
  </script>

  <script>
    jQuery(document).ready(function($) {
      var owl = $("#favoritesellers");
      owl.owlCarousel({
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        items: 3,
        loop: true,
        center: false,
        rewind: false,
        mouseDrag: true,
        touchDrag: true,
        pullDrag: true,
        freeDrag: false,
        margin: 0,
        stagePadding: 0,
        merge: false,
        mergeFit: true,
        autoWidth: false,
        startPosition: 0,
        rtl: false,
        smartSpeed: 1000,
        fluidSpeed: false,
        dots: false,
        dragEndSpeed: false,
        responsive: {
          0: {
            items: 1,
            dots: false
            // nav: true
          },
          480: {
            items: 2,
            nav: false,
            dots: false
          },
          768: {
            items: 3,
            // nav: true,
            loop: false,
            dots: false
          },
          992: {
            items: 4,
            // nav: true,
            loop: true,
            dots: false
          }
        },
        responsiveRefreshRate: 500,
        responsiveBaseElement: window,
        fallbackEasing: "swing",
        info: false,
        nestedItemSelector: false,
        itemElement: "div",
        stageElement: "div",
        refreshClass: "owl-refresh",
        loadedClass: "owl-loaded",
        loadingClass: "owl-loading",
        rtlClass: "owl-rtl",
        responsiveClass: "owl-responsive",
        dragClass: "owl-drag",
        itemClass: "owl-item",
        stageClass: "owl-stage",
        stageOuterClass: "owl-stage-outer",
        grabClass: "owl-grab",
        autoHeight: false,
        lazyLoad: false
      });

      $(".next").click(function() {
        owl.trigger("owl.next");
      });
      $(".prev").click(function() {
        owl.trigger("owl.prev");
      });
    });
  </script>
</body>

</html>