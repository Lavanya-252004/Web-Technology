<?php

session_start();

include "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    $stmt = $conn->prepare(
        "SELECT id, name, email, password
         FROM users
         WHERE email = ?"
    );

    $stmt->bind_param("s", $email);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {

        $user = $result->fetch_assoc();

        if (
            password_verify(
                $password,
                $user["password"]
            )
        ) {

            $_SESSION["user_id"] =
                $user["id"];

            $_SESSION["user_name"] =
                $user["name"];

            header(
                "Location: dashboard.php"
            );

            exit();

        } else {

            $message =
                "Invalid email or password.";
        }

    } else {

        $message =
            "Invalid email or password.";
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login</title>

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

    <h2>Student Login</h2>

    <?php if ($message != ""): ?>

        <p class="error">

            <?php
            echo htmlspecialchars($message);
            ?>

        </p>

    <?php endif; ?>

    <form method="POST">

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
            Login
        </button>

    </form>

    <p style="margin-top: 15px;">

        Don't have an account?

        <a href="register.php">
            Register here
        </a>

    </p>

</div>

</body>

</html>
