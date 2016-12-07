<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 4/12/16
 * Time: 7:23 PM
 */

$host = 'localhost';
$username = 'root';
$password = 'Aaaa1234';
$db_name = 'Dhareshwar';

$conn = new mysqli($host,$username,$password,$db_name);
if($conn->connect_error) {
    die("Error in connecting to database.".$conn->connect_error);
}

$received_json = $_POST['changed_password'];
$login_username_password = json_decode($received_json);
$login_username = $login_username_password->username;
$login_password = $login_username_password->password;

$query = 'UPDATE login_info SET password = "' . $login_password . '" WHERE username = "' . $login_username . '";';
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