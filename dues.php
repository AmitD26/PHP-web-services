<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/12/16
 * Time: 3:23 PM
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
$flat_no = substr($username,6);
$query = 'SELECT * FROM record_of_dues WHERE flat_no = ' . $flat_no;
$result = $conn->query($query);

echo json_encode($result->fetch_assoc());