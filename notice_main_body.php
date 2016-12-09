<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/12/16
 * Time: 2:29 PM
 */

$host = 'localhost';
$username = 'root';
$password = 'Aaaa1234';
$db_name = 'Dhareshwar';

$conn = new mysqli($host,$username,$password,$db_name);
if($conn->connect_error) {
    die("Error in connecting to database.".$conn->connect_error);
}

//$notice_id = $_POST['notice_id'];
$notice_id = 2;

$query = 'SELECT main_body FROM notices WHERE notice_id = ' . $notice_id;
$result = $conn->query($query);

$row = $result->fetch_assoc();
echo json_encode($row);