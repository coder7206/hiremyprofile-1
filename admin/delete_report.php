<?php

@session_start();

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login','_self');</script>";
} else {


    if (isset($_GET['delete_report'])) {

        $report_id = $input->get('delete_report');
        $type = $input->get('type');

        $delete_report =  $db->delete("reports", array('id' => $report_id));

        if ($delete_report) {

            $insert_log = $db->insert_log($admin_id, "{$type}_report", $report_id, "deleted");


            echo "<script>alert('One {$type} Report Has Been Deleted Successfully.');</script>";

            echo "<script>window.open('index?{$type}_reports','_self');</script>";
        }
    }

?>

<?php } ?>