<ul class="list-inline mb-0">
  <li class="list-inline-item align-middle position-relative">
    <!-- <label class="rounded-circle  theme-bg text-white position-absolute text-smaller mb-0 badge-custm d-flex align-items-center justify-content-center d-flex total-user-count count c-notifications-header"></label> -->
    <span class="total-user-count count c-notifications-header"></span>
    <a class="fa fa-bell-o fa-2x bell menuItem" data-toggle="dropdown" title="<?= $lang['popup']['notifications']; ?>"></a>
    <div class="dropdown-menu notifications-dropdown">
    </div>
  </li>
  <li class="list-inline-item align-middle position-relative">
    <span class="total-user-count count c-messages-header"></span>
    <a data-toggle="dropdown" title="<?= $lang['popup']['inbox']; ?>" class="fa fa-envelope-o fa-2x message menuItem"></a>
    <div class="dropdown-menu messages-dropdown">
    </div>
  </li>
  <li class="list-inline-item align-middle position-relative">
    <a href="<?= $site_url; ?>/favorites" class="fa fa-heart-o fa-2x" title="<?= $lang["menu"]["favorites"]; ?>"></a>
    <span class="total-user-count count c-favorites"></span>
    </span>
  </li>
  <li class="list-inline-item align-middle px-lg-3 px-1">
  <div class="dropdown">
    <!-- <a class="dropdown-toggle d-flex align-items-center" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fa fa-user-circle-o fa-2x mr-lg-2"></i>
      <span class="text-capitalize text-largest d-xl-block d-none">testseller</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
      <a class="dropdown-item" href="#">Something else here</a>
    </div> -->
    <?php require_once("userMenuLinks.php"); ?>
  </div>
  </li>
  <li class="list-inline-item align-middle">
    <a href="" class="btn theme-btn m-0">
      <?= showPrice($current_balance); ?>
    </a>
  </li>
</ul>
