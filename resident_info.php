<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/12/16
 * Time: 12:03 PM
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
//$username = 'flatno07';
$flat_no = substr($username,6);

$query = 'SELECT * FROM residents_info WHERE flat_no = ' . $flat_no;
$result = $conn->query($query);

$data = $result->fetch_assoc();
if ($data['status'] == 'Tenant living') {
    $tenant_name_query = 'SELECT tenant_name from tenants_info WHERE flat_no = ' . $flat_no;
    $tenant_name = $conn->query($tenant_name_query)->fetch_assoc()['tenant_name'];
    $data['tenant_name'] = $tenant_name;
}
echo json_encode($data);