<?php
    session_start();
    if(empty($_SESSION['pt']))
{
    header("Location: /Timeless471/login/loginForm.php");
    die("Redirecting to login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>PT Page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="PThome.css">
</head>
<body>

<!-- navigation bar -->
<?php include 'PTNavbar.php' ?>
<!-- container with all the buttons -->

<div class="container">
    <div class="content">
        <h3>Hello <span>Personal Trainer</span></h3>
        <h1>Welcome<span></span></h1>
        <!-- h3 marks a paragraph and p marks text -->
        <p>to where fitness is timeless </p>
       <!-- <a href="loginForm.php" class='btn'>Login</a> -->
        <a href="/Timeless471/member/logOut.php" class='btn'>Logout</a>
    </div>
</div>

</body>
</html>