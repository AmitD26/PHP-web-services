<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/12/16
 * Time: 3:48 PM
 */

$host = 'localhost';
$username = 'root';
$password = 'Aaaa1234';
$db_name = 'Dhareshwar';

$conn = new mysqli($host,$username,$password,$db_name);
if($conn->connect_error) {
    die("Error in connecting to database.".$conn->connect_error);
}

$query = 'SELECT notice_id, notice_date, notice_subject, sender_flat_no, sender_privilege_level FROM notices';
$result = $conn->query($query);

$data = new stdClass();
while ($row = $result->fetch_assoc()) {
    $notice_id = $row['notice_id'];
    unset($row['notice_id']);
    $data->$notice_id = $row;
}
echo json_encode($data);