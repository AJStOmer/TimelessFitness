<?php

$conn = mysqli_connect("localhost","root","root","timelessfitnessdb");
// Check connection
if ($conn -> connect_errno)
{
echo "Failed to connect to MySQL: " . $conn -> connect_error;
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
?>
    <!-- displaying the announcements from database -->
    <?php 
        //issue for display
        $conn = mysqli_connect("localhost","root","root","timelessfitnessdb");
        $result = mysqli_query($con, "SELECT * FROM 
        ptsession AS pt 
        LEFT JOIN bookable AS book 
        ON pt.bookableID = book.bookableID");   
    ?>
<?php include 'Navbar.php' ?>

    <div class="announcement-display">
        <table class="announcement-display-table">
        <!-- table head element -->
            <thead>
                <!-- setting up the table to preview the annoucements added -->
            <tr>
                <th>Email</th>
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
                <td><?php echo $row['PT_email']; ?></td>
                <td><?php echo $row['type']; ?></td>
                <td><?php echo $row['Status']; ?></td>

            </tr>

            <?php } ?> 

        </table>
    </div>

</div>

</body>

</html>