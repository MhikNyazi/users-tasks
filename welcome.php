<?php
session_start();
//echo "<pre>";
//var_dump($_SESSION);die;

$conn = mysqli_connect("localhost","root","","login_register");
//ini_set('display_error',1);
//ini_set('display_startup_errors',1);
//error_reporting(E_ALL);




if(isset($_POST['answer'])){
	
	$problem = $_POST['problem'];
	$description = $_POST['description'];
     $user_id =$_SESSION["id"];
	

	$sql = "INSERT INTO tasks(user_id,problem,description,status)VALUES('".$user_id."','".$problem."','".$description."','completed')";
	$result = mysqli_query($conn,$sql);
	
	if($result)
	{
		echo "";
	}
	else
	{
		 mysqli_error($conn);
	}
	//var_dump($result);
	//mysqli_error($conn);

}


$user_id =$_SESSION["id"];
$qry = "SELECT problem,description FROM tasks WHERE user_id = '$user_id' ";
$result = mysqli_query($conn,$qry);

	




?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<link rel="stylesheet" href="css/aos.css" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>


	<br><br><br><br>
	<div class="container">
	<div class="col-md-6">
		<form action="" method="post">
			<div class="col-md-12">
				<div class="text-light bg-success">
					<h1>Welcome! <?php echo $_SESSION['name']; ?></h1> <a href="index.php">Logout</a>
				</div>
				<div><h2 class="text-center">Complete You Task</h2></div>
				
				<div class="form-group">
					<label>Problem</label>
					<input class="form-control" type="text" name="problem" placeholder="Problem">
				</div>
				
				
				<div class="form-group">
					<label>Enter Your Answer</label>
					<textarea class="form-control" type="text" name="description" rows="5" cols="50" placeholder="Enter Your Answer"></textarea>
				</div>

				<div class="form-group">
						<input class="btn btn-success pull-right" type="submit" id="btnsubmit" name="answer" value="Submit Your Answer">
					</div>

				
			</div>

		</form>
	</div>
	<div class="col-md-6">
	
	  <h2 class="text-center text-light bg-primary">Your tasks</h2>
	  <div>
	        <?php
			 while($row=mysqli_fetch_assoc($result))
			 //var_dump($result);
			 
            {
             ?>
             <div class="bg-primary"><h3>problem: <?php echo $row["problem"]; ?></h3></div>
             <div class="bg-success"> <p>Your description:  <?php echo $row["description"]; ?></p></div>
             <?php   }    ?>
	  </div>
	
	
	</div>
	</div>

	

	<div class="container">

		
	</div>
				

						
					
	
	

</body>
</html>