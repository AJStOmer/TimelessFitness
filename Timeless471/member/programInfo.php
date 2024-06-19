<!DOCTYPE html>
<?php
// Start Require Login
session_set_cookie_params(0);
session_start();
if(empty($_SESSION['user']))
{
    header("Location: /Timeless471/login/loginForm.php");
    die("Redirecting to login.php");
}

if(isset($_POST['programSelect'])){
    unset($_SESSION["bookingErrM"]);
    $_SESSION["mSelect"] = $_POST['programSelect'];
}else{
    header('Location: /Timeless471/member/programs.php');
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="memberStyle.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Program</title>
    </head>
    <body class="parent">
         <nav class="nav">
            <div class="navName"><h5 class="title">Timeless Fitness</h5> </div>
            <a class="toggle">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>
            <ul class="nav-links">
                <li>
                    <a href="memberHome.php" class="homelink">Home</a>
                </li>
                <li>
                    <a href="programs.php" class="ProgramsLink">Programs</a>
                </li>
                <li>
                    <a href="book.php" class="booklink">Book</a>
                </li>
                <li>
                    <a href="logOut.php" class="Logoutlink">Logout</a>
                </li>
            </ul>
            <img class="image" src="images/471logo2.png" alt="logo">  
        </nav>
        <div class="separatorProg"></div>
        <div class="ProgramT">
            <div class="pInfo">
            <?php
                $mName = $_SESSION["mSelect"];
                // Create connection
                $con = mysqli_connect("localhost","root","root","TimelessFitnessDB");
                // Check connection
                if ($con -> connect_errno)
                {
                echo "Failed to connect to MySQL: " . $con -> connect_error;
                }
                $mName = $_SESSION["mSelect"];
                //$mName = $_SESSION["bookableSelect"];
                $result = mysqli_query($con, "SELECT distinct * FROM Program where Program.Program_name = '{$mName}'"); //TODO add machone.out
                while($row = mysqli_fetch_array($result))
                {
                    $diff = $row['difficulty'];
                    $dur = $row['duration'];
                    $email = $row['PT_email'];
                    echo "<h4 class = 'mSName'> {$mName} Program <br> Difficulity: $diff <br> Duration: $dur Weeks</h4> ";
                }
            
                //echo "{$_SESSION["mSelect"]} Machine";
                //show exercises
            ?>
            <ul class="exercises">
                    <h4 class = "Pexerc"> Recommmended Meal Plan </h4>
                    <?php                    
                    // Create connection
                    $con = mysqli_connect("localhost","root","root","TimelessFitnessDB");
                    // Check connection
                    if ($con -> connect_errno)
                    {
                    echo "Failed to connect to MySQL: " . $con -> connect_error;
                    }
                    $mName = $_SESSION["mSelect"];
                    //$mName = $_SESSION["bookableSelect"];
                    $result = mysqli_query($con, "SELECT distinct * FROM Meal_plan,Meal_Plan_Meals,Program where Program.Program_name = '{$mName}' 
                    and Meal_plan.plan_name = Program.mealPlan_name and Meal_plan.plan_name = Meal_Plan_Meals.plan_name"); //TODO add machone.out
                    while($row = mysqli_fetch_array($result))
                    {
                        $Pname = $row['plan_name'];
                        $time = $row['time'];
                        $meal = $row['meal_name'];
                        //$mgroup = $row['Muscle_Group'];
                        //$desc = $row['description'];
                        echo "<li> $Pname - $time <br> &emsp; <h8> <i class='fa fa-lg fa-solid fa-user'></i> $meal </h8>";
                    }
                    ?>
            </ul>

            <ul class="exercises">
                    <h4 class = "Pexerc"> Possible Exercises </h4>
                    <?php                    
                    // Create connection
                    $con = mysqli_connect("localhost","root","root","TimelessFitnessDB");
                    // Check connection
                    if ($con -> connect_errno)
                    {
                    echo "Failed to connect to MySQL: " . $con -> connect_error;
                    }
                    $mName = $_SESSION["mSelect"];
                    //$mName = $_SESSION["bookableSelect"];
                    $result = mysqli_query($con, "SELECT distinct Exercise.name, Exercise.Muscle_Group, Exercise.description, Includes.daysperWeek FROM Exercise,Includes, Program where Program.Program_name = '{$mName}' 
                    and Includes.program_name = Program.Program_name and Exercise.name = Includes.Exercise_Name"); //TODO add machone.out
                    while($row = mysqli_fetch_array($result))
                    {
                        $Ename = $row['name'];
                        $dpw = $row['daysperWeek'];
                        $mgroup = $row['Muscle_Group'];
                        $desc = $row['description'];
                        echo "<li> $Ename - $mgroup - $dpw Days/Week <br> &emsp; <h8> <i class='fa fa-lg fa-solid fa-user'></i> $desc </h8>";
                    }
                    ?>
                </ul>
            <form action="programSuccess.php" method="post" class="">
                <input type="submit" class="machineBooksubmit" value="Register">
                </form>
                <?php
                    if(isset($_SESSION['bookingErrM']))
                    {
                        $err = $_SESSION['bookingErrM'];
                        echo "<h4 class='errSelect'>{$err}</h4>";
                    }
                ?>
            </div>
        </div>
        <script src="app.js"></script>
    </body>
</html>