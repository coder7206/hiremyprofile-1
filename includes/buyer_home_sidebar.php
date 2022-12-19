<div class="card card1 theme-bg text-white border-0 px-sm-4 px-2  py-3 w-100 mb-4">
  <label class="mb-0"><?= $lang['welcome']; ?>.</label>
  <h4><?= ucfirst($login_user_name); ?></h4>
  <div class="d-flex align-items-center justify-content-space-between">
    <h5><a class="text-white" href="">@<?=($login_user_name); ?></a></h5>
    <h6><?php echo strtoupper($row_purchsed_plan->plan_name); ?></h6>
  </div>
</div>

<div class="card card1 bg-info font-weight-bold border-0 px-sm-4 px-2 py-3 d-flex align-items-center justify-content-space-between w-100 flex-row mb-4">
<div class="row">
    <div class="col mb-2">
      <a class="py-2 text-white " href="<?= $site_url; ?>/requests/post_request" title="Post a Job Free">
        <i class="fa fa-plus-square" aria-hidden="true"></i>
        Post a Job Free
      </a>
    </div>
    <div class="col mb-2">
      <a class="py-2 text-white" href="<?= $site_url; ?>/search" title="Find a Service">
      <i class="fa fa-search" aria-hidden="true"></i>
        Find a Service
      </a>
    </div>
    <div class="w-100"></div>
    <div class="col">
      <a class="py-2 text-white" href="<?= $site_url; ?>/freelancers" title="Hire an Expert">
      <i class="fa fa-user" aria-hidden="true"></i>
        Hire an Expert
      </a>
    </div>
    <div class="col">
      <a class="py-2 text-white" href="<?= $site_url; ?>/customer_support" title="Contact Support">
      <i class="fa fa-phone-square" aria-hidden="true"></i>
        Contact Support
      </a>
    </div>
  </div>
</div>

<style>
  .bbw {
    border-bottom: 1px solid #fff !important;
  }
</style>
<div class="card card1 theme-bg text-white border-0  px-sm-4 px-2  py-3 d-flex align-items-center justify-content-space-between w-100 flex-row bbw">
  <h6 class="mb-0 text-white"> <i class="fa fa-list-ol"></i> <span>Available Proposal Points</span></h6>
  <label class="mb-0 text-white font-weight-bold"><?php echo $row_sellers->no_of_gigs; ?></label>
</div>

<div class="card card1 theme-bg text-white border-0  px-sm-4 px-2  py-3 d-flex align-items-center justify-content-space-between w-100 flex-row bbw">
  <h6 class="mb-0 text-white"> <i class="fa fa-hand-o-up"></i> <span>Available Bids Credit</span></h6>
  <label class="mb-0 text-white font-weight-bold"><?php echo $row_sellers->bids_per_month; ?></label>
</div>

<div class="card card1 theme-bg text-white border-0  px-sm-4 px-2  py-3 d-flex align-items-center justify-content-space-between w-100 flex-row bbw">
  <h6 class="mb-0 text-white"> <i class="fa fa-plus"></i> <span>No of skills to be listed</span></h6>
  <label class="mb-0 text-white font-weight-bold"><?php echo $row_sellers->skills; ?></label>
</div>

<div class="card card1 theme-bg text-white border-0  px-sm-4 px-2  py-3 d-flex align-items-center justify-content-space-between w-100 flex-row bbw">
  <h6 class="mb-0 text-white"> <i class="fa fa-dollar"></i> <span>Order Processing Fee</span></h6>
  <label class="mb-0 text-white font-weight-bold"><?php echo $row_sellers->comission_per_sale; ?>%</label>
</div>

<!-- <div class="card card1 theme-bg text-white border-0  px-sm-4 px-2  py-3 d-flex align-items-center justify-content-space-between w-100 flex-row bbw">
  <h6 class="mb-0 text-white"> <i class="fa fa-credit-card"></i> <span>Number of portfolios remaining</span></h6>
  <label class="mb-0 text-white font-weight-bold"><?php echo $row_sellers->create_porfolio; ?></label>
</div>
<div class="card card1 theme-bg text-white border-0  px-sm-4 px-2  py-3 d-flex align-items-center justify-content-space-between w-100 flex-row bbw">
  <h6 class="mb-0 text-white"> <i class="fa fa-bookmark"></i> <span>Can bookmark projects</span></h6>
  <label class="mb-0 text-white font-weight-bold"><?php echo $row_sellers->project_bookmarks; ?></label>
</div> -->
<div class="card card1 theme-bg text-white border-0 px-sm-4 px-2  py-3">
  <div class="d-flex align-items-center justify-content-space-between">
    <h6 class="pr-4">Accelerate your career by upgrading to a membership today.<a class="text-white" href="<?=$site_url?>/membership_subs"> Get started <i class="fa fa-arrow-right"></i></a></h6>
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
<br>
<div class="card card1 theme-bg text-white border-0  px-sm-4 px-2  py-3 d-flex align-items-center justify-content-space-between w-100 flex-row mb-4">
  <h6 class="mb-0 text-white"> <i class="fa fa-address-card mr-3"></i> <span>Add your address</span></h6>
  <label class="mb-0 text-white font-weight-bold">+5 %</label>
</div>
<!-- <div class="card card1 bg-white theme-text  px-0 py-3 bl-xs-0 br-xs-0 rounded-0 mb-4">
  <h3>Try Corporate Membership for FREE</h3>
</div> -->