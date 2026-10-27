<?php
require 'C:/xampp/htdocs/employee_system/db.php';
?>
<?php /* Legacy content retained below for local history. */

$host = "localhost";
$username = "root";
$password = "";
$database = "employee_db";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

?>