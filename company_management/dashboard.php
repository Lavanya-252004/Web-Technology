<?php
session_start();
include "db.php";

if (!isset($_SESSION['role'])) {
    header("Location: login.php");
    exit();
}

$role = $_SESSION['role'];

if ($role == "Admin") {
    $show = "Employee";
} else {
    $show = "Admin";
}

$result = mysqli_query($conn,
    "SELECT name,email,role FROM users WHERE role='$show'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Welcome <?php echo $_SESSION['name']; ?></h2>

<h3><?php echo $show; ?> Details</h3>

<table>
<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Role</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>

<tr>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['role']; ?></td>
</tr>

<?php } ?>

</table>

<br>
<a href="logout.php">Logout</a>

</body>
</html>