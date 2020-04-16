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
	
	if (isset($_GET["activeateId"])) 
	{
		$activeate_id = $_GET["activeateId"];

		$get_activeate = "UPDATE product_cat SET status=1 WHERE cat_id = $activeate_id";

		$run_activeate = mysqli_query($con,$get_activeate);

		if ($run_activeate) 
		{
			echo "<script>alert('One product category has been activated');</script>";

			echo "<script>window.open('index.php?view_p_cats','_self');</script>";

		}
	}

?>