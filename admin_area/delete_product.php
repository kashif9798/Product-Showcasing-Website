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
	
	if (isset($_GET["delete_pro"])) 
	{
		$delete_id = $_GET["delete_pro"];

		$delete_pro = "DELETE FROM products WHERE p_id = '$delete_id'";

		$run_delete = mysqli_query($con,$delete_pro);

		if ($run_delete) 
		{
			echo "<script>alert('One of your product has successfully been deleted');</script>";

			echo "<script>window.open('view_products.php','_self');</script>";

		}
	}

?>