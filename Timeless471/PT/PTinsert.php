<?php
session_start();
if(empty($_SESSION['pt']))
{
header("Location: /Timeless471/login/loginForm.php");
die("Redirecting to login.php");
}
//db pass is root
$ProgramName = $_POST["ProgramName"];
$Duration = $_POST["Duration"];
$DaysPerWeek = $_POST["DaysPerWeek"];
$E1 = $_POST["E1"];
$E2 = $_POST["E2"];
$E3 = $_POST["E3"];
$Meal = $_POST["Meal"];
$Difficulty = $_POST["Difficulty"];


if( $ProgramName == null || $Duration == null || $DaysPerWeek == null || $E1 == $E2 || $E2 == $E3 || $E1 == $E3 || $Meal == null || $Difficulty == null){
    die("Please Fill out the Entire Form");
    header('location:PTnewProgram.php');  
}

$host = "localhost";
$dbname = "TimelessFitnessDB";
$username = "root";
$password = "root";
$ptEmail = $_SESSION['pt']; // change this to a session variable

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()){
    die("Connection error: " .mysqli_connect_error());
}

$stmt = mysqli_stmt_init($conn);


//Insert new Program
$sql = "INSERT INTO Program (Program_name , PT_email, difficulty, duration, mealPlan_name)
        VALUES (?, ?, ?, ?, ?)";
if( ! mysqli_stmt_prepare($stmt, $sql)){
    die(mysqli_error($conn));
}        
mysqli_stmt_bind_param($stmt, "sssis", $ProgramName, $ptEmail, $Difficulty, $Duration, $Meal);
mysqli_stmt_execute($stmt);

//Insert E1
$sql = "INSERT INTO Includes (Exercise_Name, program_name, PT_email, daysperWeek)
        VALUES (?, ?, ?, ?)";
if( ! mysqli_stmt_prepare($stmt, $sql)){
    die(mysqli_error($conn));
}        
mysqli_stmt_bind_param($stmt, "sssi", $E1, $ProgramName, $ptEmail, $DaysPerWeek);
mysqli_stmt_execute($stmt);

//Insert E2
$sql = "INSERT INTO Includes (Exercise_Name, program_name, PT_email, daysperWeek)
        VALUES (?, ?, ?, ?)";
if( ! mysqli_stmt_prepare($stmt, $sql)){
    die(mysqli_error($conn));
}        
mysqli_stmt_bind_param($stmt, "sssi", $E2, $ProgramName, $ptEmail, $DaysPerWeek);
mysqli_stmt_execute($stmt);

//Insert E3
$sql = "INSERT INTO Includes (Exercise_Name, program_name, PT_email, daysperWeek)
        VALUES (?, ?, ?, ?)";
if( ! mysqli_stmt_prepare($stmt, $sql)){
    die(mysqli_error($conn));
}        
mysqli_stmt_bind_param($stmt, "sssi", $E3, $ProgramName, $ptEmail, $DaysPerWeek);
mysqli_stmt_execute($stmt);

header('location:PTHome.php');

?>

<html>
    <h1>Exercise Saved</h1>

</html>