<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Department Dashboard</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<header>

    <h1>Department Dashboard</h1>

    <nav>

        <a href="index.php">Home</a>

        <a href="about.php">About Us</a>

        <a href="dashboard.php">Dashboard</a>

        <a href="logout.php">Logout</a>

    </nav>

</header>


<section class="dashboard">

    <h2>
        Welcome,
        <?php echo htmlspecialchars($_SESSION["user_name"]); ?>!
    </h2>

    <p>Select an option below:</p>


    <!-- MENU BUTTONS -->

    <div class="dashboard-menu">

        <button onclick="showSection('courses')">
            Courses
        </button>

        <button onclick="showSection('faculty')">
            Faculty
        </button>

        <button onclick="showSection('announcements')">
            Announcements
        </button>

    </div>


    <!-- COURSES -->

    <div id="courses" class="dashboard-section">

        <h2>Courses</h2>

        <div class="info-card">

            <h3>B.Sc Computer Science</h3>

            <p>
                Duration: 3 Years
            </p>

            <p>
                Subjects include programming, databases,
                web development and computer networks.
            </p>

        </div>


        <div class="info-card">

            <h3>BCA</h3>

            <p>
                Duration: 3 Years
            </p>

            <p>
                Learn software development, programming,
                databases and web technologies.
            </p>

        </div>

        <div class="info-card">

            <h3>BTECH</h3>

            <p>
                Duration: 4 Years
            </p>

            <p>
                Learn software development, programming,
                databases and web technologies.
            </p>

        </div>



        <div class="info-card">

            <h3>M.Sc Computer Science</h3>

            <p>
                Duration: 2 Years
            </p>

            <p>
                Advanced computer science and software
                development studies.
            </p>

        </div>

        <div class="info-card">

            <h3>MCA</h3>

            <p>
                Duration: 2 Years
            </p>

            <p>
                Learn software development, programming,
                databases and web technologies.
            </p>

        </div>

        <div class="info-card">

            <h3>MTECH</h3>

            <p>
                Duration: 2 Years
            </p>

            <p>
                Learn software development, programming,
                databases and web technologies.
            </p>

        </div>



    </div>


    <!-- FACULTY -->

    <div id="faculty" class="dashboard-section">

        <h2>Faculty Members</h2>

        <div class="info-card">

            <h3>Dr. Suresh joseph</h3>

            <p>
                Head of the Department
            </p>

            <p>
                Specialization: Web Development
            </p>

        </div>


        <div class="info-card">

            <h3>Dr. Sunitha</h3>

            <p>
                Course coordinator
            </p>

            <p>
                Specialization: Database Management
            </p>

        </div>

        <div class="info-card">

            <h3>Dr. Sukhvinder Singh</h3>

            <p>
                Assistant Professor
            </p>

            <p>
                Specialization: Software Engineering
            </p>

        </div>


        <div class="info-card">

            <h3>Dr. Chitralekha</h3>

            <p>
                Assistant Professor
            </p>

            <p>
                Specialization:  Computer Networks
            </p>

        </div>

    </div>


    <!-- ANNOUNCEMENTS -->

    <div id="announcements" class="dashboard-section">

        <h2>Announcements</h2>

        <div class="info-card">

            <h3>Internal Examination</h3>

            <p>
                Internal examination will be conducted
                next week.
            </p>

        </div>


        <div class="info-card">

            <h3>Web Development Workshop</h3>

            <p>
                A web development workshop will be
                conducted this month.
            </p>

        </div>


        <div class="info-card">

            <h3>Project Submission</h3>

            <p>
                Final year project submission deadline
                will be announced soon.
            </p>

        </div>

    </div>

</section>


<script src="script.js"></script>

</body>

</html>
