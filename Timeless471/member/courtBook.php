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
        <form action="bookSuccess.php" method="post" class="cForm">
            <h1 class="Scourt">Select a Court</h1>
            <select name= "bookableSelect" class="CourtSelections" multiple>
                    <?php
                        $con = mysqli_connect("localhost","root","root","TimelessFitnessDB");
                        // Check connection
                        if ($con -> connect_errno)
                        {
                        echo "Failed to connect to MySQL: " . $con -> connect_error;
                        }
                        $Courtresult = mysqli_query($con, "SELECT distinct Court.sport FROM Court");
                        $count = 0;
                        while($crow = mysqli_fetch_array($Courtresult)){
                            $cname = $crow['sport'];
                            if($count == 0){
                                echo "<option value='$cname' selected>$cname</option>";
                            }else{
                                echo "<option value='$cname'>$cname</option>";
                            }
                            $count++;
                        }
                    ?>
            </select>
            <br>
            <?php 
                $max = new DateTime();
                $max->modify("+7 days");
                $min = new DateTime();
                $min->modify("+1 days");
            ?>
                <label class = "Stitle">Select Date:</label>
                <input type="date" value="<?php echo date("Y-m-d");?>" min=<?=$min->format("Y-m-d")?> max=<?=$max->format("Y-m-d")?> name="date" class="dateS">  
                <br>
                <label class = "Stitle">Select Time:</label>
                <select name= "TimeSelect" class="timeSelections">
                    <option value='10:00-10:30'>10:00-10:30</option>
                    <option value='10:30-11:00'>10:30-11:00</option>
                    <option value='11:00-11:30'>11:00-11:30</option>
                    <option value='11:30-12:00'>11:30-12:00</option>
                    <option value='12:00-12:30'>12:00-12:30</option>
                    <option value='12:30-1:00'>12:30-1:00</option>
                    <option value='1:00-1:30'>1:00-1:30</option>
                    <option value='1:30-2:00'>1:30-2:00</option>
                    <option value='2:00-2:30'>2:00-2:30</option>
                    <option value='2:30-3:00'>2:30-3:00</option>
                    <option value='3:00-3:30'>3:00-3:30</option>
                    <option value='3:30-4:00'>3:30-4:00</option>
                    <option value='4:00-4:30'>4:00-4:30</option>
                    <option value='4:30-5:00'>4:30-5:00</option>
                    <option value='5:00-5:30'>5:00-5:30</option>
                    <option value='5:30-6:00'>5:30-6:00</option>
                    <option value='6:00-6:30'>6:00-6:30</option>
                    <option value='6:30-7:00'>6:30-7:00</option>
                    <option value='7:00-7:30'>7:00-7:30</option>
                    <option value='7:30-8:00'>7:30-8:00</option>
                    <option value='8:00-8:30'>8:00-8:30</option>
                    <option value='8:30-9:00'>8:30-9:00</option>
                    <option value='9:00-9:30'>9:00-9:30</option>
                    <option value='9:30-10:00'>9:30-10:00</option>
            </select>   
                <input type="submit" name='choice' class="machineBooksubmit" value="Book Court">
                <?php
                    if(isset($_SESSION['bookingErrM']))
                    {
                        $err = $_SESSION['bookingErrM'];
                        echo "<h4 class='errSelectC'>{$err}</h4>";
                    }
                ?>
                </form>

        </div>
        <script src="app.js"></script>
    </body>
</html>
