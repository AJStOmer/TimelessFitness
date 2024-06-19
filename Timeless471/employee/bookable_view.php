<?php

$conn = mysqli_connect("localhost","root","root","TimelessFitnessDB");
// Check connection
if ($conn -> connect_errno)
{
echo "Failed to connect to MySQL: " . $conn -> connect_error;
}
  //  $bookable_id = $_GET['bookable-id'];
  //  $announcement_date = $_POST['announcement_date'];
  //  $announcement_message = $_POST['announcement_message'];
   // $announcement_email = $_POST['announcement_email'];
   if(isset($_GET["bookable_id"])){
    $conn = mysqli_connect("localhost","root","root","TimelessFitnessDB");
    $idd = $_GET["bookable_id"];
    $Del = "DELETE FROM Bookable WHERE Bookable.bookable_id = '{$idd}'";
    if (mysqli_query($conn, $Del)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

//if(isset($_GET['delete'])){
   // $bookable_id = $_GET['delete'];
    //$conn = mysqli_connect("localhost","root","root","user_db");
    //mysqli_query($conn, "DELETE FROM bookable WHERE bookable-id = '{$bookable_id}'");
  //  header('location:bookable_view.php');
//}
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements</title>

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



    <!-- displaying the announcements from database -->
    <?php 
        //issue for display
        $conn = mysqli_connect("localhost","root","root","TimelessFitnessDB");
        $result = mysqli_query($conn, "SELECT * FROM Bookable")     
    
    ?>
<?php include 'Navbar.php' ?>

    <div class="announcement-display">
        <table class="announcement-display-table">
        <!-- table head element -->
            <thead>
                <!-- setting up the table to preview the annoucements added -->
            <tr>
                <th>Bookable id</th>
                <th>Bookable status</th>
                <th>Bookable type</th>
                <th>Bookable Emp email</th>
                <th>Bookable service date</th>
                <th>action</th>
            </tr>

            </thead>

            <?php
            
                while($row = mysqli_fetch_assoc($result)){

                
            
            ?>

            <tr>
                <td><?php echo $row['bookable_id']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['type']; ?></td>
                <td><?php echo $row['Employees_email']; ?></td>
                <td><?php echo $row['service_date']; ?></td>
                <td> 
                    <a href="bookable_update.php?edit=<?php echo $row['bookable_id']; ?>" class="btn"> <i class="fas
                    fa-edit"></i> edit </a>
                </td>
            </tr>

            <?php } ?> 

        </table>
    </div>

</div>

</body>

</html>