<?php

$isAjax = 'xmlhttprequest' == strtolower($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '');
if (!$isAjax)
    die("No direct access.");

require_once("../includes/db.php");

$userId = $_POST['user_id'];

$membershipData = get_memebership_data($userId);
$now = date("Y-m-d H:i:s");

$update['no_of_gigs'] = $membershipData['pending_gig'];
$update['seller_offers'] = $membershipData['pending_offer'];
$update['seller_activity'] = $now;

$db->update("sellers", $update, ["seller_id" => $userId]);



// OFFLINE Mechanism
$tm = date('Y-m-d H:i:s', strtotime('-1 minutes'));
$db->query("UPDATE sellers SET seller_status = 'offline' WHERE seller_activity < '{$tm}'");
