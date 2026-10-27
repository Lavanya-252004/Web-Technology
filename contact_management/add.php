<?php
include "db.php";

$name = "";
$email = "";
$phone = "";
$address = "";
$error = "";

if (isset($_POST['submit'])) {

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

    // Insert only if everything is valid
    else {
        $sql = "INSERT INTO contacts (name, email, phone, address)
                VALUES ('$name', '$email', '$phone', '$address')";

        if (mysqli_query($conn, $sql)) {
            header("Location: index.php");
            exit();
        } else {
            $error = "Error adding contact.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Contact</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="form-container">

    <h1>Add Contact</h1>

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

        <button type="submit" name="submit">Add Contact</button>

    </form>

    <a href="index.php">Back to Contacts</a>

</div>

<script src="script.js"></script>

</body>
</html>