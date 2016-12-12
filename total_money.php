<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/12/16
 * Time: 6:42 PM
 */

$host = 'localhost';
$username = 'root';
$password = 'Aaaa1234';
$db_name = 'Dhareshwar';

$conn = new mysqli($host,$username,$password,$db_name);
if($conn->connect_error) {
    die("Error in connecting to database.".$conn->connect_error);
}

$query = 'SELECT * FROM total_collected_money';
$result = $conn->query($query);
echo json_encode($result->fetch_assoc());