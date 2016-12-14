<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 14/12/16
 * Time: 3:32 PM
 */

$host = 'localhost';
$username = 'root';
$password = 'Aaaa1234';
$db_name = 'Dhareshwar';

$conn = new mysqli($host,$username,$password,$db_name);
if($conn->connect_error) {
    die("Error in connecting to database.".$conn->connect_error);
}

//$username = $_POST['username'];
$payment_id = $_POST['payment_id'];
//$flat_no = substr($username,6);
//$payment_id = 1;

$query = 'UPDATE payment_records SET receipt_requested = 1 WHERE payment_id = ' . $payment_id;
if ($conn->query($query) == true) {
    $return_msg = new stdClass();
    $return_msg->success = true;
    echo json_encode($return_msg);
}
else {
    $return_msg = new stdClass();
    $return_msg->success = false;
    echo json_encode($return_msg);
}