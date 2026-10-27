<?php require 'C:/xampp/htdocs/employee_system/index.php';
exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Employee Details Form</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 40px;
            font-family: Arial, sans-serif;
            background: #f2f5f9;
        }

        .container {
            width: 700px;
            max-width: 100%;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
            color: #444;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 11px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Employee Details Form</h2>

    <form action="save_employee.php" method="POST">

        <div class="form-group">
            <label>Employee Name</label>
            <input type="text" name="employee_name" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone">
        </div>

        <div class="form-group">
            <label>Department</label>
            <select name="department">
                <option value="">Select Department</option>
                <option value="HR">HR</option>
                <option value="IT">IT</option>
                <option value="Finance">Finance</option>
                <option value="Sales">Sales</option>
                <option value="Marketing">Marketing</option>
            </select>
        </div>

        <div class="form-group">
            <label>Designation</label>
            <input type="text" name="designation">
        </div>

        <div class="form-group">
            <label>Salary</label>
            <input type="number" name="salary" step="0.01">
        </div>

        <div class="form-group">
            <label>Joining Date</label>
            <input type="date" name="joining_date">
        </div>

        <div class="form-group">
            <label>Address</label>
            <textarea name="address" rows="4"></textarea>
        </div>

        <button type="submit">Save Employee</button>

    </form>

</div>

</body>
</html>