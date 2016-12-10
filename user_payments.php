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

//$username = $_POST['username'];
$username = 'flatno02';
$flat_no = substr($username,6);
$query = 'SELECT payment_id, amount_paid, date_of_payment, payment_type, payment_method, confirmed_flag, payment_confirmation_date FROM payment_records WHERE flat_no = ' . $flat_no;
$result = $conn->query($query);

$data = new stdClass();
while ($row = $result->fetch_assoc()) {
    $payment_id = $row['payment_id'];
    unset($row['payment_id']);
    $data->$payment_id = $row;
}
echo json_encode($data);