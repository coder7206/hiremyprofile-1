<?php

@session_start();

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login','_self');</script>";

}else{



    if(isset($_GET['alter_plan'])){
        $edit_plan_id = $input->get('alter_plan');
        $edit_plan = $db->select("membership_table",array('id' => $edit_plan_id));
        if($edit_plan->rowCount() == 0){
            echo "<script>window.open('index?dashboard','_self');</script>";
        }
        $row_plan = $edit_plan->fetch();
        $s_name = $row_edit->slide_name;
        $s_desc = $row_edit->slide_desc;
        $s_image = $row_edit->slide_image;
        $s_url = $row_edit->slide_url;
        $isS3 = $row_edit->isS3;
        $s_extension = pathinfo($s_image, PATHINFO_EXTENSION);


        $plan_name = $row_plan->plan_name;
        $create_active_service = $row_plan->create_active_service;
        $bids_per_month = $row_plan->bids_per_month;
        $skills = $row_plan->skills;
        $client_engagement = $row_plan->client_engagement;
        $daily_withdrawal_req = $row_plan->daily_withdrawal_req;
        $employer_follow = $row_plan->employer_follow;
        $percentage_per_project = $row_plan->percentage_per_project;
        $get_recom = $row_plan->get_recom;
        $create_portfolio = $row_plan->create_portfolio;
        $custome_desc = $row_plan->custome_desc;
        $referrals = $row_plan->referrals;
        $project_bookmark = $row_plan->project_bookmark;
        $custom_cover_photo = $row_plan->custom_cover_photo;
        $create_offer_coupon = $row_plan->create_offer_coupon;
        $free_highlight_bids = $row_plan->free_highlight_bids;
        $hide_project_others = $row_plan->hide_project_others;
        $account_type = $row_plan->account_type;

        $plan_price_month = $row_plan->plan_price_month;
        $plan_discount_month = $row_plan->plan_discount_month;

        $plan_price_annuel = $row_plan->plan_price_annuel;
        $plan_discount_annuel = $row_plan->plan_discount_annuel;

        $plan_status = $row_plan->plan_status;



    }

    ?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1><i class="menu-icon fa fa-picture-o"></i> Add Plan </h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Add New Plan</li>
                </ol>
            </div>
        </div>
    </div>

</div>


<div class="container">


<div class="row">
<!--- 2 row Starts --->
<div class="col-lg-12">
    <!--- col-lg-12 Starts --->
<?php 
$form_errors = Flash::render("form_errors");
$form_data = Flash::render("form_data");
if(is_array($form_errors)){
?>
<div class="alert alert-danger"><!--- alert alert-danger Starts --->
<ul class="list-unstyled mb-0">
<?php $i = 0; foreach ($form_errors as $error) { $i++; ?>
<li class="list-unstyled-item"><?= $i ?>. <?= ucfirst($error); ?></li>
<?php } ?>
</ul>
</div><!--- alert alert-danger Ends --->
<?php } ?>
    <div class="card">
        <!--- card Starts --->
        <div class="card-header">
            <!--- card-header Starts --->
            <h4 class="h4">
               Add New Plan <br>
                <small>This Plan will show in logged in homepage</small>
            </h4>
        </div>
        <!--- card-header Ends --->
        <div class="card-body">
            <!--- card-body Starts --->
            <form action="" method="post" enctype="multipart/form-data">
                <!--- form Starts --->


                <div class="form-group row">
                    <!--- form-group row Starts --->
                    <label class="col-md-3 control-label"> Plan Name : </label>
                    <div class="col-md-6">
                        <input required type="text" name="plan_name" class="form-control" value="<?= $plan_name; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <!--- form-group row Starts --->
                    <label class="col-md-3 control-label"> Create Active Service : </label>
                    <div class="col-md-6">
                        <input required type="text" name="create_active_service" class="form-control" value="<?= $create_active_service; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <!--- form-group row Starts --->
                    <label class="col-md-3 control-label"> Bids Per Month : </label>
                    <div class="col-md-6">
                        <input required type="text" name="bids_per_month" class="form-control" value="<?= $bids_per_month; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <!--- form-group row Starts --->
                    <label class="col-md-3 control-label"> No. Skills : </label>
                    <div class="col-md-6">
                        <input required type="text" name="skills" class="form-control" value="<?= $skills; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <!--- form-group row Starts --->
                    <label class="col-md-3 control-label"> Client Engagement : </label>
                    <div class="col-md-6">
                        <input required type="text" name="client_engagement" class="form-control" value="<?= $client_engagement; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <!--- form-group row Starts --->
                    <label class="col-md-3 control-label"> Daily Withdrawl Request : </label>
                    <div class="col-md-6">
                        <input required type="text" name="daily_withdrawal_req" class="form-control" value="<?= $daily_withdrawal_req; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <!--- form-group row Starts --->
                    <label class="col-md-3 control-label"> Employer Followings : </label>
                    <div class="col-md-6">
                        <input required type="text" name="employer_follow" class="form-control" value="<?= $employer_follow; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <!--- form-group row Starts --->
                    <label class="col-md-3 control-label"> Percentage Per Project : </label>
                    <div class="col-md-6">
                        <input required type="text" name="percentage_per_project" class="form-control" value="<?= $percentage_per_project; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <!--- form-group row Starts --->
                    <label class="col-md-3 control-label"> Get Recommendation : </label>
                    <div class="col-md-6">
                        <input required type="text" name="get_recom" class="form-control" value="<?= $get_recom; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <!--- form-group row Starts --->
                    <label class="col-md-3 control-label"> Create Portfolio : </label>
                    <div class="col-md-6">
                        <input required type="text" name="create_portfolio" class="form-control" value="<?= $create_portfolio; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <!--- form-group row Starts --->
                    <label class="col-md-3 control-label"> Custom Description : </label>
                    <div class="col-md-6">
                        <input required type="text" name="custome_desc" class="form-control" value="<?= $custome_desc; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <!--- form-group row Starts --->
                    <label class="col-md-3 control-label"> Referrals : </label>
                    <div class="col-md-6">
                        <input required type="text" name="referrals" class="form-control" value="<?= $referrals; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <!--- form-group row Starts --->
                    <label class="col-md-3 control-label"> Project Bookmarks : </label>
                    <div class="col-md-6">
                        <input required type="text" name="project_bookmark" class="form-control" value="<?= $project_bookmark; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <!--- form-group row Starts --->
                    <label class="col-md-3 control-label"> Custom Cover Photo : </label>
                    <div class="col-md-6">
                        <input required type="text" name="custom_cover_photo" class="form-control" value="<?= $custom_cover_photo; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <!--- form-group row Starts --->
                    <label class="col-md-3 control-label"> Create A Offer Coupon : </label>
                    <div class="col-md-6">
                        <input required type="text" name="create_offer_coupon" class="form-control" value="<?= $create_offer_coupon; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <!--- form-group row Starts --->
                    <label class="col-md-3 control-label"> Free Highlighted Bids : </label>
                    <div class="col-md-6">
                        <input required type="text" name="free_highlight_bids" class="form-control" value="<?= $free_highlight_bids; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <!--- form-group row Starts --->
                    <label class="col-md-3 control-label"> Hide Project Offer for Other Freelancers : </label>
                    <div class="col-md-6">
                        <input required type="text" name="hide_project_others" class="form-control" value="<?= $hide_project_others; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <!--- form-group row Starts --->
                    <label class="col-md-3 control-label"> Select Type of Account - Business Or Personal : </label>
                    <div class="col-md-6">
                        <input required type="text" name="account_type" class="form-control" value="<?= $account_type; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <!--- form-group row Starts --->
                    <label class="col-md-3 control-label"> Plan Price Month : </label>
                    <div class="col-md-6">
                        <input required type="text" name="plan_price_month" class="form-control" value="<?= $plan_price_month; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <!--- form-group row Starts --->
                    <label class="col-md-3 control-label"> Discount on Plan/Month: </label>
                    <div class="col-md-6">
                        <input required type="text" name="plan_discount_month" class="form-control" value="<?= $plan_discount_month; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <!--- form-group row Starts --->
                    <label class="col-md-3 control-label"> Plan Price Annuel: </label>
                    <div class="col-md-6">
                        <input required type="text" name="plan_price_annuel" class="form-control" value="<?= $plan_price_annuel; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <!--- form-group row Starts --->
                    <label class="col-md-3 control-label"> Discount on Plan/Annuel: </label>
                    <div class="col-md-6">
                        <input required type="text" name="plan_discount_annuel" class="form-control" value="<?= $plan_discount_annuel; ?>">
                    </div>
                </div>

               <!-- <div class="form-group row">

                    <label class="col-md-3 control-label"> Plan Price in USD : </label>
                    <div class="col-md-6">
                        <input required type="text" name="plan_price_usd" class="form-control" value="<?/*= $plan_price_usd; */?>">
                    </div>
                </div>

                <div class="form-group row">

                    <label class="col-md-3 control-label"> Discount on Plan: </label>
                    <div class="col-md-6">
                        <input required type="text" name="plan_discount_price" class="form-control" value="<?/*= $plan_discount_price; */?>">
                    </div>
                </div>-->

                <div class="form-group row">
                    <!--- form-group row Starts --->
                    <label class="col-md-3 control-label"> Plan Status (Active/De-active) : </label>
                    <div class="col-md-6">
                        <input required type="text" name="plan_status" class="form-control" value="<?= $plan_status; ?>">
                    </div>
                </div>

                <!--<div class="form-group row">

                    <label class="col-md-3 checkbox-label"> Are You Sure Want to Add This Plan : </label>
                    &nbsp  &nbsp<div class="col-md-0 checkbox">
                         <input required type="checkbox" name="confirm" class="form-control">
                    </div>
                </div>
               --> <!--- form-group row Ends --->



                <!--- form-group row Ends --->
                <div class="form-group row">
                    <!--- form-group row Starts --->
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-6">
                        <input required type="submit" name="submit" class="btn btn-success form-control" value="Update Plan">
                    </div>
                </div>
                <!--- form-group row Ends --->
            </form>
            <!--- form Ends --->
        </div>
        <!--- card-body Ends --->
    </div>
    <!--- card Ends --->
</div>
<!--- col-lg-12 Ends --->
</div>
<!--- 2 row Ends --->

</div><!--- Container Ends --->

<?php

if(isset($_POST['submit'])){




    $plan_name = $input->post('plan_name');
    $create_active_service = $input->post('create_active_service');
    $bids_per_month = $input->post('bids_per_month');
    $skills = $input->post('skills');
    $client_engagement = $input->post('client_engagement');
    $daily_withdrawal_req = $input->post('daily_withdrawal_req');
    $employer_follow = $input->post('employer_follow');
    $percentage_per_project = $input->post('percentage_per_project');
    $get_recom = $input->post('get_recom');
    $create_portfolio = $input->post('create_portfolio');
    $custome_desc = $input->post('custome_desc');
    $referrals = $input->post('referrals');

    $project_bookmark = $input->post('project_bookmark');
    $custom_cover_photo = $input->post('custom_cover_photo');

    $create_offer_coupon = $input->post('create_offer_coupon');
    $free_highlight_bids = $input->post('free_highlight_bids');
    $hide_project_others = $input->post('hide_project_others');
    $account_type = $input->post('account_type');
    $plan_price_month = $input->post('plan_price_month');
    $plan_discount_month = $input->post('plan_discount_month');

    $plan_price_annuel = $input->post('plan_price_annuel');
    $plan_discount_annuel = $input->post('plan_discount_annuel');

    $plan_status = $input->post('plan_status');



             $update_plan = $db->update("membership_table",array("plan_name" => $plan_name,"create_active_service" => $create_active_service,
             "bids_per_month" => $bids_per_month,"skills" => $skills,"client_engagement" => $client_engagement,"daily_withdrawal_req"=>$daily_withdrawal_req,
             "employer_follow" => $employer_follow, "percentage_per_project"=> $percentage_per_project, "get_recom"=> $get_recom, "create_portfolio"=> $create_portfolio,
             "custome_desc"=>$custome_desc, "referrals"=>$referrals, "project_bookmark"=> $project_bookmark, "custom_cover_photo"=> $custom_cover_photo,
             "create_offer_coupon"=> $create_offer_coupon, "free_highlight_bids"=>$free_highlight_bids, "hide_project_others"=>$hide_project_others, "account_type"=>$account_type,
             "plan_price_month"=>$plan_price_month, "plan_discount_month"=> $plan_discount_month, "plan_price_annuel"=>$plan_price_annuel, "plan_discount_annuel"=> $plan_discount_annuel, "plan_status"=>$plan_status), array('id'=>$edit_plan_id));


//    $update_slide = $db->update("slider",array("slide_name"=>$slide_name,"slide_desc"=>$slide_desc,"slide_image"=>$slide_image,"slide_url"=>$slide_url,"isS3"=>$isS3),array("slide_id" => $edit_id));


    //         die($insert_plan);

         if($update_plan){
//            $insert_id = $db->lastInsertId();
  //          $insert_log = $db->insert_log($admin_id,"slide",$insert_id,"inserted");
            echo "<script>alert('Your Plan has been Updated.');</script>";
            echo "<script>window.open('index?membership_plans','_self');</script>";
         }

//      }

  // }

}

?>

<?php } ?>