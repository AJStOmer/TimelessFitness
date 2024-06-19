<?php
session_start();
$booking_id = $_GET['edit'];

if(isset($_POST['update_booking'])){
    $conn = mysqli_connect("localhost","root","root","TimelessFitnessDB");
    // Check connection
    if ($conn -> connect_errno)
    {
    echo "Failed to connect to MySQL: " . $conn -> connect_error;
    }
        //$bookable_id = $_POST['bookable_id'];
        $bookable_status = $_POST['booking_status'];
        //$bookable_type = $_POST['bookable_type'];
        $bookable_Emp_email = $_SESSION['admin'];
        //$bookable_Service_date = new DateTime();
        

        if(empty($bookable_status)){
            $message[] = 'please fill out all the required information';
        }else{
          //  $sql = "INSERT INTO announcement VALUES ('$announcement_title',
            //    '$announcement_date','$announcement_message','$announcement_email')";
             
          //  if(mysqli_query($conn, $sql)){
          //      echo "<h3>data stored in a database successfully."
            //        . " Please browse your localhost php my admin"
         //           . " to view the updated data</h3>";
          //  } else{
          //      echo "ERROR: Hush! Sorry $sql. "
           //         . mysqli_error($conn);
            //}
            $update_an = "UPDATE Booking SET status='{$bookable_status}', employees_email= '{$bookable_Emp_email}' WHERE bookingId = '{$booking_id}'";
            $upload = mysqli_query($conn,$update_an);
            $message[] = 'booking changed sucessfully';
            header('location:booking_view.php');
        }
    
    
    };
 
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking updates</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style2.css">

</head>
<body>

<?php
/* if message is called then do the following */
if(isset($message)){
    foreach($message as $message){
        echo '<span class="message">'.$message.'</span>';
    }

}

?>

<div class="container">

<div class="admin-machine-form-container centered">

    <?php
    $conn = mysqli_connect("localhost","root","root","TimelessFitnessDB");
    $select = mysqli_query($conn, "SELECT * FROM Booking WHERE bookingId = '{$booking_id}'");
    while($row = mysqli_fetch_assoc($select)){

    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <h3> Update status of a booking</h3>
        <!-- add a new type input box -->

        <select name="booking_status">
            <!-- drop down box with multiple options -->
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
        </select>
        <input type="submit" class="btn" name="update_booking" value="update status">
        <a href="booking_view.php" class="btn">go back</a>
    </form>

    <?php }; ?>
    


</div>

</div>

</body>
</html>