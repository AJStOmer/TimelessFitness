<?php
    session_start();
    if(empty($_SESSION['admin']))
{
    header("Location: /Timeless471/login/loginForm.php");
    die("Redirecting to login.php");
}

//@include 'config.php';
//if the button register is pressed
if(isset($_POST['submit'])){
// Create connection
$conn = mysqli_connect("localhost","root","root","TimelessFitnessDB");
// Check connection
if ($conn -> connect_errno)
{
echo "Failed to connect to MySQL: " . $conn -> connect_error;
}

    $Fname = mysqli_real_escape_string($conn, $_POST['Fname']);
    $Lname = mysqli_real_escape_string($conn, $_POST['Lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['Phone']);
    $address = mysqli_real_escape_string($conn, $_POST['Address']);
    $age = $_POST['Age'];
    $pass = $_POST['password'];
    $cpass = $_POST['Cpassword'];
    $user_type = $_POST["user_type"];
    //user-form name of the database
    $select = " SELECT * FROM Person WHERE email = '{$email}'";

    $result = mysqli_query($conn, $select);

    //Gain error message used for throwing the error option

    if(mysqli_num_rows($result) > 0){

        $error[] = 'This user already exists';

    }else{

        if($pass != $cpass){
            $error[] = 'The password does not match';
         }else{
             // 	id 	name 	email 	password 	user_type 	(database attributes)
             $insert = "INSERT INTO Person VALUES('{$email}','{$pass}','{$phone}', '{$Fname}','{$Lname}','{$address}','{$age}','{$user_type}')";
             mysqli_query($conn, $insert);
             if($user_type == 'employee'){
                $insertE = "INSERT INTO Employee VALUES('{$email}', 'Full')";
                mysqli_query($conn, $insertE);
       
            }elseif($user_type == 'member'){
                $memb = 3;
                $insertM = "INSERT INTO Member VALUES('{$email}','' , '' , '{$memb}')";
                mysqli_query($conn, $insertM);
    
            }elseif($user_type == 'personalTrainer'){
                $insertP = "INSERT INTO Personal_Trainer VALUES('{$email}', 'Fitness')";
                mysqli_query($conn, $insertP);
         }
         header('Location: /Timeless471/employee/adminPage.php');
     }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

 <!-- custom css file link  -->
 <link rel="stylesheet" href="style.css">

</head>
<body>

<!-- Create a form with a name box, 2 password and option of user or admin, and set up the error message if error is thrown -->
<div class="form-container">
    <form action="" method= "post">
        <h3>register now</h3>
        
         <?php 
        if(isset($error)){
            foreach($error as $error ){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        };
        ?>
        
        <input type="text" name="Fname" required placeholder="enter your first name">
        <input type="text" name="Lname" required placeholder="enter your last name">
        <input type="email" name="email" required placeholder="enter your email">
        <input type="text" name="Address" required placeholder="enter your address">
        <input type="text" name="Phone" required placeholder="enter the phone number">
        <input min = "0" type="number" name="Age" required placeholder="enter his/her age">
        <input type="password" name="password" required placeholder="enter your password">
        <input type="password" name="Cpassword" required placeholder="verify password">
        <select name="user_type">
            <!-- drop down box with multiple options -->
            <option value="member">Member</option>
            <option value="employee">Employee</option>
            <option value="personalTrainer">Personal Trainer</option>
        </select>
        <input type="submit" name="submit" value="register now" class="form-btn">
        <!-- Login now button created which leads you to loginForm.php -->
        <p>Cancel registration? <a href="adminPage.php">Cancel</a></p>
    </form>
</div>

</body>
</html>