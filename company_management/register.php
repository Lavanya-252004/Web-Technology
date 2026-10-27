<!DOCTYPE html>
<html>
<head>
    <title>TechNova - Register</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="box">

    <h1>TechNova</h1>
    <p>Create your account</p>

    <form method="post" onsubmit="return validateForm()">

        <label>Full Name</label>
        <input type="text" name="name" id="name"
               placeholder="Enter your name" required>

        <label>Email</label>
        <input type="email" name="email"
               placeholder="Enter email" required>

        <label>Password</label>

        <div class="pass">
            <input type="password" name="password" id="password"
                   placeholder="Enter password" required>
            <button type="button" onclick="showPassword()">Show</button>
        </div>

        <small id="strength"></small>

        <label>Role</label>
        <select name="role" id="role" required>
            <option value="">Select Role</option>
            <option value="Employee">Employee</option>
            <option value="Admin">Admin</option>
        </select>

        <label>Department</label>
        <select name="department" required>
            <option value="">Select Department</option>
            <option value="HR">HR</option>
            <option value="IT">IT</option>
            <option value="Finance">Finance</option>
            <option value="Marketing">Marketing</option>
        </select>

        <label>Phone</label>
        <input type="text" name="phone" id="phone"
               placeholder="Enter phone number" required>

        <button class="register" type="submit" name="register">
            Create Account
        </button>

    </form>

    <p>
        Already have an account?
        <a href="login.php">Login</a>
    </p>

</div>

<script src="script.js"></script>

</body>
</html>