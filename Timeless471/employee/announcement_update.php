<?php
    session_start();
    if(empty($_SESSION['admin']))
{
    header("Location: /Timeless471/login/loginForm.php");
    die("Redirecting to login.php");
}

$announcement_title = $_GET['edit'];

if(isset($_POST['update_announcement'])){
    $conn = mysqli_connect("localhost","root","root","TimelessFitnessDB");
    // Check connection
    if ($conn -> connect_errno)
    {
    echo "Failed to connect to MySQL: " . $conn -> connect_error;
    }
        //$announcement_title = $_POST['announcement_title'];
        $announcement_date = $_POST['announcement_date'];
        $announcement_message = $_POST['announcement_message'];
        $announcement_email = $_SESSION['admin'];
    
        if(empty($announcement_date) || empty($announcement_message) || empty($announcement_email)){
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
            $update_ann = "UPDATE Announcement SET date='{$announcement_date}',message='{$announcement_message}',Employees_email='{$announcement_email}' WHERE title = '{$announcement_title}'";
            $upload = mysqli_query($conn,$update_ann);
            $message[] = 'new announcement updated sucessfully';
            //header('location:admin_page.php');
        }
    
    
    };


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcement updates</title>

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
    $select = mysqli_query($conn, "SELECT * FROM Announcement WHERE title = '{$announcement_title}'");
    $max = new DateTime();
    $max->modify("+7 days");
    $min = new DateTime();
    $min->modify("+1 days");
    while($row = mysqli_fetch_assoc($select)){

    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <h3>Update an annoucement</h3>
        <!-- add a new type input box -->
        <input disabled type="text" placeholder="Enter annoucement title" value="<?php echo $row['title']; ?>"name="announcement_title" class="box">
        <input type="date" placeholder="Enter annoucement date" value="<?php echo $row['date']; ?>  min=<?=$min->format("Y-m-d")?> max=<?=$max->format("Y-m-d")?> "name="announcement_date" class="box">
        <input type="text" placeholder="Enter annoucement" value="<?php echo $row['message']; ?> "name="announcement_message" class="box">
        <!--<input type="email" placeholder="Enter your email" value="<?php echo $row['Employees_email']; ?> "name="announcement_email" class="box"> -->
        <input type="submit" class="btn" name="update_announcement" value="update an announcement">
        <a href="admin_page.php" class="btn">go back</a>
    </form>

    <?php }; ?>
    


</div>

</div>

</body>
</html>