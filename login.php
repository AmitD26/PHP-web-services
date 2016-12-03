<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/12/16
 * Time: 11:27 AM
 */

$host = 'localhost';
$username = 'root';
$password = 'Aaaa1234';
$db_name = 'Dhareshwar';

$conn = new mysqli($host,$username,$password,$db_name);
if($conn->connect_error) {
    die("Error in connecting to database.".$conn->connect_error);
}

$login_username = $_POST['username'];
$login_password = $_POST['password'];

//echo "Username: " . $login_username . "Password:" . $login_password;

$query = "select password from login_info where username = '" . $login_username . "'";

$result = $conn->query($query);
if($result->num_rows == 1) {
    $stored_password = $result->fetch_assoc()['password'];
    if ($stored_password == $login_password) {
        echo 'Login successful!';
    } else {
        echo 'Login unsuccessful.';
    }
}
else {
    echo "Invalid username.";
}

$conn->close();

?>