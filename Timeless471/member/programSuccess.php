<?php
    session_start();
    if(empty($_SESSION['user']))
{
    header("Location: /Timeless471/login/loginForm.php");
    die("Redirecting to login.php");
}
$con = mysqli_connect("localhost","root","root","TimelessFitnessDB");
// Check connection
if ($con -> connect_errno)
{
echo "Failed to connect to MySQL: " . $con -> connect_error;
}
$loggedInEmail = $_SESSION['user'];
$pName = $_SESSION["mSelect"];
$progSel = mysqli_query($con, "SELECT * FROM Program where Program.Program_name = '{$pName}'"); 
while($row = mysqli_fetch_array($progSel)){
    $ptemail = $row['PT_email'];
}

$upUser = mysqli_query($con, "UPDATE Member set ProgramName ='{$pName}', Program_PT_email = '{$ptemail}' where Member.email = '{$loggedInEmail}'"); 
header('Location: /Timeless471/member/memberHome.php');
?>
