<?php

$isAjax = 'xmlhttprequest' == strtolower($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '');
if (!$isAjax)
    die("No direct access.");

require_once("../includes/db.php");

$userId = $_POST['user_id'];

$membershipData = get_memebership_data($userId);

$update['no_of_gigs'] = $membershipData['pending_gig'];

$db->update("sellers", $update, ["seller_id" => $userId]);

