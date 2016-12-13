<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 13/12/16
 * Time: 2:06 PM
 */

$host = 'localhost';
$username = 'root';
$password = 'Aaaa1234';
$db_name = 'Dhareshwar';

$conn = new mysqli($host,$username,$password,$db_name);
if($conn->connect_error) {
    die("Error in connecting to database.".$conn->connect_error);
}

$query = 'UPDATE total_collected_money SET cash = 0';
$result = $conn->query($query);
$query = 'UPDATE total_collected_money SET cheque = 0';
$result = $conn->query($query);

