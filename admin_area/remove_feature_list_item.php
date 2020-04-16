<?php 
	
	session_start();

	include("includes/db.php");


	// if condition is for security so no unauthorized person see this

	if (!isset($_SESSION["admin_email"])) 
	{
		echo 
		"
			<script>window.open('login.php','_self');</script>
		";	
	}
	
	if (isset($_GET["removeId"])) 
	{
		$remove_id = $_GET["removeId"];

		$get_remove = "UPDATE products SET featured=0 WHERE p_id = $remove_id";

		$run_remove = mysqli_query($con,$get_remove);

		if ($run_remove) 
		{
			echo "<script>alert('One product removed from featured list');</script>";

			echo "<script>window.open('index.php?dashboard','_self');</script>";

		}
	}

?>