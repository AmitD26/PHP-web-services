<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15/12/16
 * Time: 4:36 PM
 */

$host = 'localhost';
$username = 'root';
$password = 'Aaaa1234';
$db_name = 'Dhareshwar';

$conn = new mysqli($host,$username,$password,$db_name);
if($conn->connect_error) {
    die("Error in connecting to database.".$conn->connect_error);
}

$notice_subject = $_POST['notice_subject'];
$notice_main_body = $_POST['notice_main_body'];
$notice_date = $_POST['notice_date'];
$sender_flat_no = $_POST['sender_flat_no'];
//$notice_subject = "hello";
//$notice_main_body = "it's a notice";
//$notice_date = "2016-01-01 17:11";
//$sender_flat_no = "02";
$sender_privilege_level_query = 'SELECT privilege_level FROM residents_info WHERE flat_no =' . $sender_flat_no;
$sender_privilege_level = $conn->query($sender_privilege_level_query)->fetch_assoc()['privilege_level'];
$query = 'INSERT INTO notices (notice_date, notice_subject, main_body, sender_flat_no, sender_privilege_level) VALUES ("' . $notice_date . '","' . $notice_subject . '","' . $notice_main_body . '",' . $sender_flat_no . ',"' . $sender_privilege_level . '")';
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