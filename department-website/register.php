<?php

include "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if (
        empty($name) ||
        empty($email) ||
        empty($password)
    ) {

        $message = "Please fill all fields.";

    } else {

        $check = $conn->prepare(
            "SELECT id FROM users WHERE email = ?"
        );

        $check->bind_param("s", $email);

        $check->execute();

        $result = $check->get_result();

        if ($result->num_rows > 0) {

            $message = "Email already registered.";

        } else {

            $hashedPassword =
                password_hash(
                    $password,
                    PASSWORD_DEFAULT
                );

            $stmt = $conn->prepare(
                "INSERT INTO users
                (name, email, password)
                VALUES (?, ?, ?)"
            );

            $stmt->bind_param(
                "sss",
                $name,
                $email,
                $hashedPassword
            );

            if ($stmt->execute()) {

                $message =
                    "Registration successful!";

            } else {

                $message =
                    "Registration failed.";
            }

            $stmt->close();
        }

        $check->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Registration</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<header>

    <h1>Computer Science Department</h1>

    <nav>

        <a href="index.php">Home</a>

        <a href="about.php">About Us</a>

        <a href="login.php">Login</a>

        <a href="register.php">Register</a>

    </nav>

</header>

<div class="form-container">

    <h2>Student Registration</h2>

    <?php if ($message != ""): ?>

        <p class="message">
            <?php
            echo htmlspecialchars($message);
            ?>
        </p>

    <?php endif; ?>

    <form method="POST">

        <label>Name</label>

        <input
            type="text"
            name="name"
            required
        >

        <label>Email</label>

        <input
            type="email"
            name="email"
            required
        >

        <label>Password</label>

        <input
            type="password"
            name="password"
            required
        >

        <button type="submit">
            Register
        </button>

    </form>

    <p style="margin-top: 15px;">

        Already registered?

        <a href="login.php">
            Login here
        </a>

    </p>

</div>

</body>

</html>
