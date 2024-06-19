<?php

//@include 'config.php';
//if the button register is pressed
session_start();
if(isset($_POST['submit'])){
// Create connection
$conn = mysqli_connect("localhost","root","root","TimelessFitnessDB");
// Check connection
if ($conn -> connect_errno)
{
echo "Failed to connect to MySQL: " . $conn -> connect_error;
}

    /**$Fname = mysqli_real_escape_string($conn, $_POST['Fname']);
    $Lname = mysqli_real_escape_string($conn, $_POST['Lname']);
    $cpass = md5($_POST['Cpassword']);
    $user_type = $_POST["user_type"];*/
    //user-form name of the database

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = $_POST['password'];

    $select = " SELECT * FROM Person WHERE email = '$email' && password = '$pass'";

    $result = mysqli_query($conn, $select);

    //Gain error message used for throwing the error option

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_array($result);

        if($row['user_type'] == 'employee'){

            $_SESSION['admin'] = $row['email'];
            header('location: /Timeless471/employee/adminPage.php'); //change address

        }elseif($row['user_type'] == 'member'){

            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user'] = $row['email'];
            header('Location: /Timeless471/member/memberHome.php');

        }elseif($row['user_type'] == 'personalTrainer'){
            $_SESSION['pt'] = $row['email'];
            $_SESSION['personalTrainer_name'] = $row['name'];  
            header('location:/Timeless471/PT/PTHome.php'); //change address
            }
   
     }else{
        $error[] = 'incorrect email or password!';
     }
        
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login form</title>

 <!-- custom css file link  -->
 <link rel="stylesheet" href="/Timeless471/employee/style.css">

</head>
<body class ="lbody">
<header class = "header">Timeless Fitness </header>
<!-- Create a form with a name box, 2 password and option of user or admin -->
<div class="form-container">
    <form action="" method= "post">
        <h3>Login now</h3>
        <?php 
        if(isset($error)){
            foreach($error as $error ){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        };
        ?>
        <input type="email" name="email" required placeholder="enter your email">
        <input type="password" name="password" required placeholder="enter your password">
        <input type="submit" name="submit" value="login now" class="form-btn">
        <!-- Login now button created which leads you to loginForm.php -->
    </form>
</div>

</body>
</html>