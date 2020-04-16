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
	
	if (isset($_GET["deactiveateId"])) 
	{
		$deactiveate_id = $_GET["deactiveateId"];
			
		$get_deactiveate = "UPDATE product_cat SET status=0 WHERE cat_id = $deactiveate_id";

		$run_deactiveate = mysqli_query($con,$get_deactiveate);

		if ($run_deactiveate) 
		{
			echo "<script>alert('One product category has been deactivated');</script>";

			echo "<script>window.open('index.php?view_p_cats','_self');</script>";

		}

	

		
	}

?>