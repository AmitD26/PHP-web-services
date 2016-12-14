<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/12/16
 * Time: 12:44 PM
 */

$host = 'localhost';
$username = 'root';
$password = 'Aaaa1234';
$db_name = 'Dhareshwar';

$conn = new mysqli($host,$username,$password,$db_name);
if($conn->connect_error) {
    die("Error in connecting to database.".$conn->connect_error);
}

$username = $_POST['username'];
//$username = 'all';
//$username = 'flatno02';
$flat_no = substr($username,6);
if ($username == 'all') {
    $query = 'SELECT payment_id, amount_paid, date_of_payment, payment_type, payment_method, confirmed_flag, payment_confirmation_date, receipt_given, receipt_given_date, receipt_received, receipt_received_date, receipt_requested FROM payment_records';
} else if ($username == 'to_be_confirmed') {
    $query = 'SELECT payment_id, amount_paid, date_of_payment, payment_type, payment_method, confirmed_flag, payment_confirmation_date, receipt_given, receipt_given_date, receipt_received, receipt_received_date, receipt_requested FROM payment_records WHERE confirmed_flag = 0';
} else if ($username == 'receipts_to_be_sent') {
    $query = 'SELECT payment_id, amount_paid, date_of_payment, payment_type, payment_method, confirmed_flag, payment_confirmation_date, receipt_given, receipt_given_date, receipt_received, receipt_received_date, receipt_requested FROM payment_records WHERE confirmed_flag = 1 AND receipt_given = 0';
} else if ($username == 'requests_for_receipts') {
    $query = 'SELECT payment_id, amount_paid, date_of_payment, payment_type, payment_method, confirmed_flag, payment_confirmation_date, receipt_given, receipt_given_date, receipt_received, receipt_received_date, receipt_requested FROM payment_records WHERE confirmed_flag = 1 AND receipt_requested = 1';
} else {
    $query = 'SELECT payment_id, amount_paid, date_of_payment, payment_type, payment_method, confirmed_flag, payment_confirmation_date, receipt_given, receipt_given_date, receipt_received, receipt_received_date, receipt_requested FROM payment_records WHERE flat_no = ' . $flat_no;

}
$result = $conn->query($query);

$index = 0;
while ($row = $result->fetch_assoc()) {
    $data[$index] = $row;
    $index++;
}
//echo print_r($data);
echo json_encode($data);
