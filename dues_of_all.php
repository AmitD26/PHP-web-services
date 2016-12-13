<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/12/16
 * Time: 8:25 PM
 */

$host = 'localhost';
$username = 'root';
$password = 'Aaaa1234';
$db_name = 'Dhareshwar';

$conn = new mysqli($host,$username,$password,$db_name);
if($conn->connect_error) {
    die("Error in connecting to database.".$conn->connect_error);
}

$query = 'SELECT * FROM record_of_dues';
$index = 0;
$result = $conn->query($query);
while ($row = $result->fetch_assoc()) {
    $data[$index] = $row;
    $index++;
}
echo json_encode($data);