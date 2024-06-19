<?php
// Start Require Login
session_set_cookie_params(0);
session_start();
if(empty($_SESSION['user']))
{
    header("Location: /Timeless471/login/loginForm.php");
    die("Redirecting to login.php");
}

// get current logged in user   
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="memberStyle.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Programs</title>
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
        <div class="progT">
            <form action="programInfo.php" method="post" class="pForm">
                <h1 class = "SelProg" >Select a Program</h1>
                <select name= "programSelect" class="BookSelections" multiple>
                    <?php
                        $con = mysqli_connect("localhost","root","root","TimelessFitnessDB");
                        // Check connection
                        if ($con -> connect_errno)
                        {
                            echo "Failed to connect to MySQL: " . $con -> connect_error;
                        }
                        $Programresult = mysqli_query($con, "SELECT * FROM Program, Personal_Trainer, Person where Program.PT_email = Personal_Trainer.email
                        and Person.email = Personal_Trainer.email");   //Add to DB
                        $count = 0;
                        while($mrow = mysqli_fetch_array($Programresult)){
                            $mname = $mrow['Program_name'];
                            $fn = $mrow['Fname'];
                            $ln = $mrow['Lname'];
                            if($count == 0){
                                echo "<option value= '$mname' selected>$mname by $fn $ln </option>";
                            }else{
                                echo "<option value='$mname'>$mname by $fn $ln </option>";
                            }
                            $count++;
                        }
                    ?>
                </select>
                <br>
                <input type="submit" class="machinesubmit" value="View">
                <?php
                    if(isset($_SESSION['bookRes']))
                    {
                        $err = $_SESSION['bookRes'];
                        echo "<h4 class='errSelect'>Please Select Valid Bookable</h4>";
                    }
                ?>
            </form>
        </div>
        <script src="app.js"></script>
    </body>
</html>