<?php
include "db.php";

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM contacts WHERE id=$id");
$row = mysqli_fetch_assoc($result);

$name = $row['name'];
$email = $row['email'];
$phone = $row['phone'];
$address = $row['address'];
$error = "";

if (isset($_POST['update'])) {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);

    // Validate name
    if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $error = "Name should contain only letters and spaces.";
    }

    // Validate email
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    }

    // Validate phone
    elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
        $error = "Phone number must contain exactly 10 digits.";
    }

    // Validate address
    elseif (empty($address)) {
        $error = "Address cannot be empty.";
    }

    // Update only if everything is valid
    else {
        $sql = "UPDATE contacts SET
                name='$name',
                email='$email',
                phone='$phone',
                address='$address'
                WHERE id=$id";

        if (mysqli_query($conn, $sql)) {
            header("Location: index.php");
            exit();
        } else {
            $error = "Error updating contact.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Contact</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="form-container">

    <h1>Edit Contact</h1>

    <?php if (!empty($error)) { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>

    <form method="POST" onsubmit="return validateForm();">

        <label>Name</label>
        <input
            type="text"
            name="name"
            id="name"
            value="<?php echo htmlspecialchars($name); ?>"
            required
        >

        <label>Email</label>
        <input
            type="text"
            name="email"
            id="email"
            value="<?php echo htmlspecialchars($email); ?>"
            required
        >

        <label>Phone</label>
        <input
            type="text"
            name="phone"
            id="phone"
            value="<?php echo htmlspecialchars($phone); ?>"
            maxlength="10"
            required
        >

        <label>Address</label>
        <textarea
            name="address"
            id="address"
            required
        ><?php echo htmlspecialchars($address); ?></textarea>

        <button type="submit" name="update">Update Contact</button>

    </form>

    <a href="index.php">Back to Contacts</a>

</div>

<script src="script.js"></script>

</body>
</html>