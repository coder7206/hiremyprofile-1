<?php

session_start();

require_once("db.php");

if(isset($_SESSION['seller_user_name'])){

    $followed_id = $input->post('followed_id');

    $follower_id = $input->post('follower_id');

   // $delete_plan = $db->delete("membership_table",array('id' => $delete_id));

    /*echo $follower_id;
    die();*/

    $follow_data = $db->select('follow_following_unfllow', array('followed_id'=> $followed_id, 'follower_id'=>$follower_id));
    $follow_tbl_data = $follow_data->fetch();
    //$follow_tbl_data->id;
    if($follow_tbl_data->id){
        $delete_plan = $db->delete("follow_following_unfllow",array('followed_id'=> $followed_id, 'follower_id'=>$follower_id));

    }


    $follower_insert = $db->insert("follow_following_unfllow",array("follower_id" => $follower_id,
        "followed_id" => $followed_id, 'status'=>'active'));


    if($follower_insert)
    {
        return "success";
    }





}


?>