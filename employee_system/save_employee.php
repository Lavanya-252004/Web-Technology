<?php
require 'C:/xampp/htdocs/employee_system/save_employee.php';
exit;
?>
<?php

include "db.php";

$employee_name = $_POST['employee_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$department = $_POST['department'];
$designation = $_POST['designation'];
$salary = $_POST['salary'];
$joining_date = $_POST['joining_date'];
$address = $_POST['address'];

$sql = "INSERT INTO employees
        (employee_name, email, phone, department, designation, salary, joining_date, address)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "sssssiss",
    $employee_name,
    $email,
    $phone,
    $department,
    $designation,
    $salary,
    $joining_date,
    $address
);

if ($stmt->execute()) {
    echo "<h2>Employee saved successfully!</h2>";
    echo "<a href='index.php'>Add Another Employee</a>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>