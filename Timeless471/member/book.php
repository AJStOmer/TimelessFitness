<!DOCTYPE html>
<?php
// Start Require Login
session_set_cookie_params(0);
session_start();

if(empty($_SESSION['user']))
{
    header("Location: /Timeless471/login/loginForm.php");
    die("Redirecting to login.php");
}

unset($_SESSION["bookingErrM"]);
?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="memberStyle.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Book</title>
    </head>
    <body class="parent">
         <nav class="nav">
            <div class="navName"><h5 class="title">Timeless Fitness</h5> </div>
            <a class="toggle">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>
            <ul class="nav-links">
                <li>
                    <a href="memberHome.php" class="homelink">Home</a>
                </li>
                <li>
                    <a href="programs.php" class="ProgramsLink">Programs</a>
                </li>
                <li>
                    <a href="book.php" class="booklink">Book</a>
                </li>
                <li>
                    <a href="logOut.php" class="Logoutlink">Logout</a>
                </li>
            </ul>
            <img class="image" src="images/471logo2.png" alt="logo">  
        </nav>
        <div class="separatorBook"></div>
        <div class="bookT">
            <form action="bookTypeSelect.php" method="post" class="bForm">
                <h1 class="SbookT">Select a Booking Type</h1>
                <br>
                <input type="submit" name='choice' class="booksubmit" value="Machine">
                <input type="submit" name='choice' class="booksubmit1" value="Court">
                <input type="submit" name='choice' class="booksubmit2" value="Personal Trainer Session">
            </form>
        </div>
        <script src="app.js"></script>
    </body>
</html>