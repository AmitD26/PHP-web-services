<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 17/12/16
 * Time: 3:33 PM
 */

$host = 'localhost';
$username = 'root';
$password = 'Aaaa1234';
$db_name = 'Dhareshwar';

$conn = new mysqli($host,$username,$password,$db_name);
if($conn->connect_error) {
    die("Error in connecting to database.".$conn->connect_error);
}

$flat_no = $_POST['flat_no'];
$payment_method = $_POST['payment_method'];
$payment_type = $_POST['payment_type'];
$amount = $_POST['amount'];
$date_of_payment = $_POST['date_of_payment'];


$query = 'INSERT INTO payment_records (flat_no, amount_paid, payment_type, payment_method, date_of_payment) VALUES (' . $flat_no . ',' . $amount . ',' . $payment_type . ',' . $payment_method . ',' . $date_of_payment . ')';
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