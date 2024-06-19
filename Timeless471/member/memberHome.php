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

// get current logged in user   
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
            <?php
                $loggedInEmail = $_SESSION['user'];
                // Create connection
                $con = mysqli_connect("localhost","root","root","TimelessFitnessDB");
                // Check connection
                if ($con -> connect_errno)
                {
                echo "Failed to connect to MySQL: " . $con -> connect_error;
                }
                
                $result = mysqli_query($con, "SELECT * FROM Person, Member Where Person.email = '$loggedInEmail' and Person.email = Member.email");
                while($row = mysqli_fetch_array($result))
                {
                    $fn = $row['Fname'];
                    $ln = $row['Lname'];
                    $prog = $row['ProgramName'];
                    if($prog == ""){
                        echo "<h2> Welcome back $fn $ln </h2>";                
                    }else{
                        echo "<h2> Welcome back $fn $ln <br> Current Program: $prog</h2>";                
                    }
                }
            ?>
            <div class="AnnounceDiv">
                <header class = 'aHeader'>Announcements</header>
                <ul class="announcements">
                    <?php                    
                    // Create connection
                    $con = mysqli_connect("localhost","root","root","TimelessFitnessDB");
                    // Check connection
                    if ($con -> connect_errno)
                    {
                    echo "Failed to connect to MySQL: " . $con -> connect_error;
                    }
                    $count = 0;
                    $max = new DateTime();
                    $result = mysqli_query($con, "SELECT * FROM Announcement order by Announcement.date DESC");
                    while($row = mysqli_fetch_array($result))
                    {
                        $count++;
                        $msg = $row['message'];
                        $email = $row['Employees_email'];
                        $date = $row['date'];
                            $empN = mysqli_query($con, "SELECT * FROM Person Where email = '{$email}'");
                            $empNResult = mysqli_fetch_array($empN);
                            $fn = $empNResult['Fname'];
                            $ln = $empNResult['Lname'];
                            echo "<li> $msg <br> &emsp; <h8> <i class='fa fa-lg fa-solid fa-user'></i> $fn $ln, $date </h8>";    
                    }
                    if($count == 0){
                        echo  "<h1>No Bookings</h1>";
                    }

                    ?>
                </ul>
            </div>

            <div class="BookingDiv">
            <header class = 'bHeader'>Your Bookings</header>
                <ul class="bookings">
                    <?php
                        $con = mysqli_connect("localhost","root","root","TimelessFitnessDB");
                        // Check connection
                        if ($con -> connect_errno)
                        {
                        echo "Failed to connect to MySQL: " . $con -> connect_error;
                        }
                        $mEmail = $_SESSION['user'];
                        $count = 0;
                        $Bookingresult = mysqli_query($con, "SELECT * FROM Booking Where Member_email = '$mEmail' order by Booking.Booking_date DESC");
                        while($row = mysqli_fetch_array($Bookingresult))
                        {
                           // $result = mysqli_query($con, "SELECT * FROM Booking Where email = '$mEmail'");   
                            $bid = $row['bookableid'];
                            $ti = $row["Time_In"];
                            $to = $row["Time_Out"];
                            $status = $row["status"];
                            $date = $row['Booking_Date'];
                            $Bookableresult = mysqli_query($con, "SELECT * FROM Bookable Where bookable_id = '$bid'");
                            while($brow = mysqli_fetch_array($Bookableresult))  //TODO if active booking or inactive
                            {
                                $count++;
                                if($brow['type'] == "Machine"){
                                    $Machineresult = mysqli_query($con, "SELECT * FROM Machine Where bookable_id = '$bid'");
                                    while($mrow = mysqli_fetch_array($Machineresult)){
                                        $mname = $mrow['name'];
                                        echo  "<li>  $mname <br> <i class='fa fa-regular fa-calendar'></i> $date <br> <h8>Time-In: $ti  <br> Time-Out $to </h8> <br> <h8> Status: $status </h8> ";
                                    }
                                }elseif ($brow['type'] == "Court"){
                                    $courtresult = mysqli_query($con, "SELECT * FROM Court Where bookable_id = '$bid'");
                                    while($crow = mysqli_fetch_array($courtresult)){
                                        $cname = $crow['sport'];
                                        echo  "<li>  $cname <br> <i class='fa fa-regular fa-calendar'></i> $date <br> <h8>Time-In: $ti  <br> Time-Out $to </h8> <br> <h8> Status: $status </h8> ";
                                    }
                                }elseif ($brow['type'] == "PT_Session"){
                                    $ptresult = mysqli_query($con, "SELECT * FROM PT_Session ps, Personal_Trainer pt, Person p Where ps.bookable_id = '$bid' 
                                    And ps.PT_email = p.email And p.email = pt.email");
                                    while($prow = mysqli_fetch_array($ptresult)){
                                        $focus = $prow['Session_Focus'];
                                        $ptFn = $prow['Fname'];
                                        $ptLn = $prow['Lname'];
                                        echo  "<li>  $focus Session <br> by $ptFn $ptLn <br> <i class='fa fa-regular fa-calendar'></i> $date <br> <h8>Time-In: $ti  <br> Time-Out $to </h8> <br> <h8> Status: $status </h8> ";
                                    }
                                }
                            }
                        }
                        if($count == 0){
                            echo  "<h1>No Bookings</h1>";
                        }
                    //for ($i=0; $i < 13; $i++) { 
                      //  echo  "<li>  Bench Press <br> <i class='fa fa-regular fa-calendar'></i> April 6, 2023 <br> <h8>Time-In: 7:30  <br> Time-Out 8:00 </h8>";
                    //}
                    ?>

                </ul>
            </div>

        <script src="app.js"></script>
    </body>
</html>