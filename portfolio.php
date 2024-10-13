<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Portfolio</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <h1>Your Portfolio</h1>

    <!-- Display Profile Photo -->
    <div>
        <?php
        session_start();
        if (isset($_SESSION['profile_photo'])) {
            echo '<img src="'.$_SESSION['profile_photo'].'" alt="Profile Photo" style="width:150px;height:150px;"/>';
        } else {
            echo "No profile photo uploaded.";
        }
        ?>
    </div>

    <!-- Other Portfolio Content Here -->
    <h2>About Me</h2>
    <p>Your description here...</p>

    <h2>Education</h2>
    <p>Your education details here...</p>

    <!-- Continue with other sections like Skills, Projects, etc. -->

</body>
</html>
