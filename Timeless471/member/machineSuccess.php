<?php
session_start();
if(empty($_SESSION['user']))
{
    header("Location: /Timeless471/login/loginForm.php");
    die("Redirecting to login.php");
}
unset($_SESSION["bookingErrM"]);
if(isset($_POST['date']) && isset($_POST['TimeSelect'])){
    // Create connection
    $con = mysqli_connect("localhost","root","root","TimelessFitnessDB");
    // Check connection
    if ($con -> connect_errno)
    {
    echo "Failed to connect to MySQL: " . $con -> connect_error;
    }
    $machineN = $_SESSION["mSelect"];
    $time = explode("-",$_POST['TimeSelect']);
    $timeIN = $time[0];
    $timeOut = $time[1];
    $bdate = $_POST['date'];
    $result = mysqli_query($con, "SELECT Machine.bookable_id, Machine.location from Machine, Bookable where Machine.name = '{$machineN}' and Machine.bookable_id = Bookable.bookable_id
    and Bookable.status = 'Active' and Machine.bookable_id NOT IN (Select Booking.bookableid from Booking where Booking.Time_In = '{$timeIN}' and Booking.Booking_Date = '{$bdate}')");
    while($rowm = mysqli_fetch_array($result))
    {       
            $mid = $rowm['bookable_id'];
            $uEmail = $_SESSION['user'];
            $highest = mysqli_query($con, "SELECT Max(Booking.bookingid) from Booking");
            $vals = mysqli_fetch_array($highest);
            global $val;
            global $loc;
            $loc = $rowm['location'];
            $val = $vals[0];
            $val += 1;
            //echo $val;
            $sql = "INSERT INTO Booking VALUES ('{$uEmail}', '{$val}', '{$mid}',Null, 'Active', '{$timeOut}', '{$timeIN}', '{$bdate}')";
            if (!mysqli_query($con,$sql))
            {
                die('Error: ' . mysqli_error($con));
            }
            else
            break;
    }
    if(is_null($rowm)){
        $_SESSION["bookingErrM"] = "No Available bookings, please reselect";
        header('Location: /Timeless471/member/machineInfo.php');
    }
}
?>


<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="memberStyle.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>
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
        <div class="separator"></div>
        <div class ="SuccessDiv">
                <h1 class = "St">Booking Confirmation</h1>
                <ul class="successMsg">
                    <?php                    
                        echo "<header class = 'sHeader2'>$machineN</header>";
                        echo "<header class = 'sHeader1'> <i class='fa fa-regular fa-calendar'></i> Time In: $timeIN 
                        </header> <header class = 'sHeader1'> <i class='fa fa-regular fa-calendar'></i> Time Out: $timeOut </header>
                        </header> <header class = 'sHeader1'> <i class='fa fa-regular fa-calendar'></i> Date: $bdate </header>
                        <header class = 'sHeader1'>Location: $loc </header>
                         <header class = 'sHeader1'>Booking ID: #$val </header>";
                    ?>
                </ul>
        </div>
        <script src="app.js"></script>
    </body>
</html>
