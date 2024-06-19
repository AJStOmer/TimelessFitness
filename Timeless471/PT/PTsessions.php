<?php
session_start();
    if(empty($_SESSION['pt']))
{
    header("Location: /Timeless471/login/loginForm.php");
    die("Redirecting to login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="viewPTS.css">
        <title>PT Sessions</title>
        <?php include 'PTNavbar.php' ?>
    <body class ="background-image">
        <?php
		    echo "<h1>PT Sessions:</h1>";
	    ?>
        <div class ="viewPTDIV">
        <ul class = "viewPT">
        <?php
            // Create connection
            $con = mysqli_connect("localhost","root","root","TimelessFitnessDB");
            // Check connection
            if ($con -> connect_errno)
            {
            echo "Failed to connect to MySQL: " . $con -> connect_error;
            }
            //query for email, type, status, focus, id and date by joining bookable and ptsession
            $result = mysqli_query($con, "SELECT * FROM 
                                    PT_Session AS pt 
                                    LEFT JOIN Booking AS book 
                                    ON pt.bookable_id = book.bookableId");
            echo "<li> Customer Email &emsp; &emsp; Focus &emsp; &emsp;  &emsp;Booking ID  &emsp; &emsp; Date";
            while($row = mysqli_fetch_array($result))
            {
                $email = $row['PT_email'];
                $Memail = $row['Member_email'];
                //$type = $row['type'];
                $status = $row['status']; //change PT1@gmail.com to session variable
                $em = $_SESSION['pt'];
                if($email == $em && $status == "Active"){
                    $Focus = $row['Session_Focus'];
                    $ID = $row['bookingId'];
                    $Date = $row['Booking_Date'];
                    echo "<li> $Memail  &emsp; $Focus &emsp; &emsp; &emsp; &emsp; $ID &emsp; &emsp; $Date </h8>";
                }
            }
        ?>
        </ul>
        </div>
    </body>
</html>