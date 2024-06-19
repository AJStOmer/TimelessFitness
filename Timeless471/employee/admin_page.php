<?php
    session_start();
    if(empty($_SESSION['admin']))
{
    header("Location: /Timeless471/login/loginForm.php");
    die("Redirecting to login.php");
}

if(isset($_POST['add_announcement'])){
$conn = mysqli_connect("localhost","root","root","TimelessFitnessDB");
// Check connection
if ($conn -> connect_errno)
{
echo "Failed to connect to MySQL: " . $conn -> connect_error;
}
    $announcement_title = $_POST['announcement_title'];
    $announcement_date = $_POST['announcement_date'];
    $announcement_message = $_POST['announcement_message'];
    $announcement_email = $_SESSION['admin'];

    if(empty($announcement_title) || empty($announcement_date) || empty($announcement_message) || empty($announcement_email)){
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
        $insert = "INSERT INTO Announcement(title,date,message,Employees_email) VALUES('{$announcement_title}', '{$announcement_date}', '{$announcement_message}', '{$announcement_email}')";
        $upload = mysqli_query($conn,$insert);
        $message[] = 'new announcement added sucessfully';
    }


};

if(isset($_GET['delete'])){
    $announcement_title = $_GET['delete'];
    $conn = mysqli_connect("localhost","root","root","TimelessFitnessDB");
    mysqli_query($conn, "DELETE FROM Announcement WHERE title = '{$announcement_title}'");
    header('location:admin_page.php');
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
<?php include 'Navbar.php' ?>
<div class="container">

    <div class="admin-machine-form-container">

        <?php
            $max = new DateTime();
            $max->modify("+7 days");
            $min = new DateTime();
            $min->modify("+1 days");
        ?>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <h3>Add a new announcement</h3>
            <!-- add a new type input box -->
            <input type="text" placeholder="Enter annoucement title" name="announcement_title" class="box">
            <input type="date" placeholder="Enter annoucement date" name="announcement_date" min=<?=$min->format("Y-m-d")?> max=<?=$max->format("Y-m-d")?> class="box">
            <input type="text" placeholder="Enter annoucement" name="announcement_message" class="box">
            <!--<input type="email" placeholder="Enter your email" name="announcement_email" class="box">-->
            <input type="submit" class="btn" name="add_announcement" value="add an announcement">
            <a href="adminPage.php" class="btn">go back</a>
        </form>
    </div>

    <!-- displaying the announcements from database -->
    <?php 
        //issue for display
        $conn = mysqli_connect("localhost","root","root","TimelessFitnessDB");
        $select = mysqli_query($conn, "SELECT * FROM Announcement");        
    
    ?>

    <div class="announcement-display">
        <table class="announcement-display-table">
        <!-- table head element -->
            <thead>
                <!-- setting up the table to preview the annoucements added -->
            <tr>
                <th>announcement title</th>
                <th>announcement date</th>
                <th>announcement message</th>
                <th>announcement email</th>
                <th>action</th>
            </tr>

            </thead>

            <?php
            
                while($row = mysqli_fetch_assoc($select)){

                
            
            ?>

            <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['message']; ?></td>
                <td><?php echo $row['Employees_email']; ?></td>
                <td> 
                    <a href="announcement_update.php?edit=<?php echo $row['title']; ?>" class="btn"> <i class="fas
                    fa-edit"></i> edit </a>
                    <a href="admin_page.php?delete=<?php echo $row['title']; ?>" class="btn"> <i class="fas
                    fa-trash"></i> delete </a>
                </td>
            </tr>

            <?php } ?> 

        </table>
    </div>

</div>

</body>

</html>