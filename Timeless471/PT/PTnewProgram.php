<?php
    session_start();
    if(empty($_SESSION['pt']))
{
    header("Location: /Timeless471/login/loginForm.php");
    die("Redirecting to login.php");
}
?>

<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="newPRG.css">
<head>
<title>PT Program</title>
<?php include 'PTNavbar.php' ?>
	<title>New Routine</title>
</head>

<body class ="background-image">
	<h1>Create New Program:</h1>

		<!--beginning of the form-->
		<form action="PTinsert.php" method="post">
			<!--text form for Program Name-->	
			<label for="ProgramName">Program Name:</label>
			<input type="text" id="ProgramName" name="ProgramName" required>
			<br>
			<!--text form for Duration-->	
			<label for="Duration">Duration (Weeks):</label>
			<br>
			<input type="number" min = "1" id="Duration" name="Duration" required>

			<!--text form for Days per Week-->	
			<label for="DaysPerWeek">Days Per Week:</label>
			<input type="number"  min = "1" id="DaysPerWeek" name="DaysPerWeek" required>
			<br>


		<!--multiple select form for Exercise 1-->	
		<label for="E1">Exercise 1:</label>
		<select id="E1" name="E1" multiple>
		<?php
            // Create connection
            $con = mysqli_connect("localhost","root","root","TimelessFitnessDB");
            // Check connection
            if ($con -> connect_errno)
            {
            echo "Failed to connect to MySQL: " . $con -> connect_error;
            }
			$c1 = 0;
			//query from exercise		
			$result = mysqli_query($con, "SELECT * FROM 
                                    Exercise");
			while($row = mysqli_fetch_array($result))
            {
                $exercise = $row['name']; 
				if($c1 == 0){
					echo "<option selected>$exercise</option>"; //. "<br /><br />";
				}else{
					echo "<option>$exercise</option>"; //. "<br /><br />";
				}
				$c1++;

            }							
		?>
		</select>



		<!--multiple select form for Exercise 2-->	
		<label for="E2">Exercise 2:</label>
		<select id="E2" name="E2" multiple>
		<?php
            // Create connection
            $con = mysqli_connect("localhost","root","root","TimelessFitnessDB");
            // Check connection
            if ($con -> connect_errno)
            {
            echo "Failed to connect to MySQL: " . $con -> connect_error;
            }
			$c2 = 0;
			//query from exercise 		
			$result = mysqli_query($con, "SELECT * FROM 
                                    Exercise");
			while($row = mysqli_fetch_array($result))
            {
                $exercise = $row['name']; 
				if($c2 == 1){
					echo "<option selected>$exercise</option>"; //. "<br /><br />";
				}else{
					echo "<option>$exercise</option>"; //. "<br /><br />";
				}
				$c2++;
            }							
		?>
		</select>



		<!--multiple select form for Exercise 3-->	
		<label for="E3">Exercise 3:</label>
		<select id="E3" name="E3" multiple>
		<?php
            // Create connection
            $con = mysqli_connect("localhost","root","root","TimelessFitnessDB");
            // Check connection
            if ($con -> connect_errno)
            {
            echo "Failed to connect to MySQL: " . $con -> connect_error;
            }
			$c3 = 0;
			//query from exercise 	
			$result = mysqli_query($con, "SELECT * FROM 
                                    Exercise");
			while($row = mysqli_fetch_array($result))
            {
                $exercise = $row['name']; 
                $exercise = $row['name']; 
				if($c3 == 2){
					echo "<option selected>$exercise</option>"; //. "<br /><br />";
				}else{
					echo "<option>$exercise</option>"; //. "<br /><br />";
				}
				$c3++;

            }							
		?>
		</select>

		<!--multiple select form for Meal-->	
		<label for="Meal">Meal Plan:</label>
		<select id="Meal" name="Meal" multiple>
		<?php
            // Create connection
            $con = mysqli_connect("localhost","root","root","TimelessFitnessDB");
            // Check connection
            if ($con -> connect_errno)
            {
            echo "Failed to connect to MySQL: " . $con -> connect_error;
            }
			$c4 = 0;
			//query from mealplan 	
			$result = mysqli_query($con, "SELECT * FROM 
                                    Meal_plan");
			while($row = mysqli_fetch_array($result))
            {
                $meal = $row['plan_name']; 
				if($c4 == 0){
					echo "<option selected>$meal</option>"; //. "<br /><br />";
				}else{
					echo "<option>$meal</option>"; //. "<br /><br />";
				}
				$c4++;

            }							
		?>
		</select>
		
		<!--multiple select form for Difficulty-->	
		<label for="Difficulty">Difficulty:</label>
		<select id="Difficulty" name="Difficulty" multiple>
				<option value="Easy" selected>Easy</option>
				<option value="Medium">Medium</option>
				<option value="Hard">Hard</option>
		</select>


		<br>
		<button>Create</button>
	</form>	<!--end form-->	
</body>
</html>
